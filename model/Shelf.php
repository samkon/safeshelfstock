<?php

/**
 * Created by PhpStorm.
 * User: samed
 * Date: 08/05/2018
 * Time: 22:03
 */
class Shelf
{
    const MAX_BOTTLE_COUNT_PER_SHELF = 20;

    const SHELF_STATUS_EMPTY = 0;
    const SHELF_STATUS_PARTLY_FULL = 1;
    const SHELF_STATUS_FULL = 2;

    /** @var int $stock */
    private $stock = 0;

    /** @var int $status */
    private $status;

    /** @var $bottles[] array */
    private $bottles = [];

    /** @var int $shelfVolume */
    private $shelfVolume = 0;

    public function __construct()
    {
        $this->setStatus(self::SHELF_STATUS_EMPTY);
    }

    /**
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
        if ($stock == 0) {
            $this->setStatus(self::SHELF_STATUS_EMPTY);
        }
        else if ($stock > 0 && $stock < self::MAX_BOTTLE_COUNT_PER_SHELF) {
            $this->setStatus(self::SHELF_STATUS_PARTLY_FULL);
        }
        else if ($stock == self::MAX_BOTTLE_COUNT_PER_SHELF) {
            $this->setStatus(self::SHELF_STATUS_FULL);
        }
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
     * @return mixed
     */
    public function getBottles()
    {
        return $this->bottles;
    }

    /**
     * @param mixed $bottles
     */
    public function setBottles($bottles)
    {
        $this->bottles = $bottles;
    }

    /**
     * @return int
     */
    public function getShelfVolume()
    {
        return $this->shelfVolume;
    }

    /**
     * @param int $shelfVolume
     */
    public function setShelfVolume($shelfVolume)
    {
        $this->shelfVolume = $shelfVolume;
    }

    /**
     * @param Bottle $bottle
     * @return bool
     */
    public function addBottle(Bottle $bottle) {
        if ($this->getStatus() == self::SHELF_STATUS_FULL) {
            return false;
        }
        if ($this->getShelfVolume() == self::MAX_BOTTLE_COUNT_PER_SHELF) {
            return false;
        }
        if ($this->getShelfVolume() + $bottle->getVolume() > self::MAX_BOTTLE_COUNT_PER_SHELF) {
            return false;
        }

        $this->bottles[] = $bottle;
        $this->setStock($this->getStock() + 1);
        $this->setShelfVolume($this->getShelfVolume() + $bottle->getVolume());

        return true;
    }

    /**
     * @param Bottle $bottle
     * @return bool
     */
    public function removeBottle(Bottle $bottle) {
        if ($this->getStatus() == self::SHELF_STATUS_EMPTY) {
            $this->setStock(0);
            $this->setShelfVolume(0);
            return false;
        }
        else if ($this->getStock() == 0) {
            $this->setStatus(self::SHELF_STATUS_EMPTY);
            return false;
        }
        else {
            $this->setStatus(self::SHELF_STATUS_PARTLY_FULL);
        }

        if ($this->getShelfVolume() - $bottle->getVolume() < 0) {
            return false;
        }

        /** @var Bottle $b */
        foreach ($this->getBottles() as $key => $b) {
            if ($bottle->getCl() == $b->getCl()) {
                unset($this->bottles[$key]);
                $this->setStock($this->getStock() - 1);
                $this->setShelfVolume($this->getShelfVolume() - $bottle->getVolume());

                return true;
            }
        }

        return false;
    }


}