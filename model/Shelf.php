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
     * @return bool
     */
    public function addBottle() {
        if ($this->getStatus() == self::SHELF_STATUS_FULL) {
            return false;
        }
        if ($this->stock == self::MAX_BOTTLE_COUNT_PER_SHELF) {
            return false;
        }

        $this->setStock($this->getStock() + 1);

        return true;
    }

    /**
     * @return bool
     */
    public function removeBottle() {
        if ($this->getStatus() == self::SHELF_STATUS_EMPTY) {
            $this->setStock(0);
            return false;
        }
        else if ($this->getStock() == 0) {
            $this->setStatus(self::SHELF_STATUS_EMPTY);
            return false;
        }
        else {
            $this->setStatus(self::SHELF_STATUS_PARTLY_FULL);
        }

        $this->setStock($this->getStock() - 1);

        return true;
    }


}