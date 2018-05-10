<?php

/**
 * Created by PhpStorm.
 * User: samed
 * Date: 08/05/2018
 * Time: 22:03
 */
class Safe
{
    const DEFAULT_SAFE_COUNT = 3;

    /** @var Shelf[] $shelfs */
    private $shelfs = [];

    /** @var int $safeStock */
    private $safeStock = 0;

    /** @var int $status */
    private $status = Shelf::SHELF_STATUS_EMPTY;

    /** @var bool $doorClosed */
    private $doorClosed = true;

    public function __construct()
    {
        for ($i=0;$i<self::DEFAULT_SAFE_COUNT;$i++) {
            $shelf = new Shelf();
            $this->shelfs[] = $shelf;
        }
        $this->setDoorClosed(false);
    }

    /**
     * @return Shelf[]
     */
    public function getShelfs()
    {
        return $this->shelfs;
    }

    /**
     * @param Shelf[] $shelfs
     */
    public function setShelfs($shelfs)
    {
        $this->shelfs = $shelfs;
    }

    /**
     * @return int
     */
    public function getSafeStock()
    {
        return $this->safeStock;
    }

    /**
     * @param int $safeStock
     */
    public function setSafeStock($safeStock)
    {
        $this->safeStock = $safeStock;
    }

    /**
     * @return bool
     */
    public function isDoorClosed()
    {
        return $this->doorClosed;
    }

    /**
     * @param bool $doorClosed
     */
    public function setDoorClosed($doorClosed)
    {
        $this->doorClosed = $doorClosed;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param Bottle $bottle
     * @return bool
     */
    public function addBottle(Bottle $bottle) {
        if ($this->isDoorClosed()) {
            return false;
        }

        if ($this->getStatus() == Shelf::SHELF_STATUS_FULL) {
            return false;
        }

        $success = false;

        /** @var Shelf $shelf */
        foreach ($this->shelfs as $shelf) {
            if ($shelf->getStatus() != Shelf::SHELF_STATUS_FULL && $shelf->addBottle($bottle)) {
                $this->setSafeStock($this->getSafeStock() + $bottle->getVolume());
                $success = true;
                break;
            }
        }

        if ($success) {
            $this->checkSafeStatus();
            return $success;
        }

        $this->setStatus(Shelf::SHELF_STATUS_FULL);
        return $success;
    }

    /**
     * @param Bottle $bottle
     * @return bool
     */
    public function removeBottle(Bottle $bottle) {

        if ($this->isDoorClosed()) {
            return false;
        }

        $success = false;

        /** @var Shelf $shelf */
        foreach ($this->shelfs as $shelf) {
            if ($shelf->getStatus() != Shelf::SHELF_STATUS_EMPTY && $shelf->removeBottle($bottle)) {
                $this->setSafeStock($this->getSafeStock() - $bottle->getVolume());
                $success = true;
                break;
            }
        }

        if ($success) {
            $this->checkSafeStatus();
            return $success;
        }

        return $success;
    }

    private function checkSafeStatus() {
        $hasFull = false;
        $hasEmpty = false;
        $hasPartly = false;
        foreach ($this->shelfs as $shelf) {
            if ($shelf->getStatus() == Shelf::SHELF_STATUS_FULL) {
                $hasFull = true;
            }
            if ($shelf->getStatus() == Shelf::SHELF_STATUS_EMPTY) {
                $hasEmpty = true;
            }
            if ($shelf->getStatus() == Shelf::SHELF_STATUS_PARTLY_FULL) {
                $hasPartly = true;
            }
        }

        if ($hasFull && !$hasEmpty && !$hasPartly) {
            $this->setStatus(Shelf::SHELF_STATUS_FULL);
        }
        else if ($hasPartly) {
            $this->setStatus(Shelf::SHELF_STATUS_PARTLY_FULL);
        }
        else if (!$hasFull && $hasEmpty && !$hasPartly) {
            $this->setStatus(Shelf::SHELF_STATUS_EMPTY);
        }
    }


}