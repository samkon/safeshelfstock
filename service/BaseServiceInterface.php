<?php

/**
 * Created by PhpStorm.
 * User: samed
 * Date: 08/05/2018
 * Time: 22:22
 */
interface BaseServiceInterface
{
    /**
     * @return Safe
     */
    public function createSafe();

    /**
     * @param Safe $safe
     * @param Bottle $bottle
     * @return bool
     */
    public function addBottle(Safe $safe, Bottle $bottle);

    /**
     * @param Safe $safe
     * @param Bottle $bottle
     * @return bool
     */
    public function removeBottle(Safe $safe, Bottle $bottle);

    /**
     * @param Safe $safe
     * @param Bottle $bottle
     * @param int $count
     * @return Safe
     */
    public function addMultipleBottles(Safe $safe, Bottle $bottle, int $count);

    /**
     * @param Safe $safe
     * @param Bottle $bottle
     * @param int $count
     * @return Safe
     */
    public function removeMultipleBottles(Safe $safe, Bottle $bottle, int $count);
}