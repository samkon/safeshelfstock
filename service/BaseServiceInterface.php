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
     * @param int $count
     * @return Safe
     */
    public function addBottles(Safe $safe, int $count);

    /**
     * @param $safe
     * @return Safe
     */
    public function addSingleBottle($safe);

    /**
     * @param Safe $safe
     * @param int $count
     * @return Safe
     */
    public function removeBottles(Safe $safe, int $count);

    /**
     * @param $safe
     * @return Safe
     */
    public function removeSingleBottle($safe);
}