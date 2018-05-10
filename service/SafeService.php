<?php

/**
 * Created by PhpStorm.
 * User: samed
 * Date: 08/05/2018
 * Time: 22:21
 */
class SafeService extends BaseService implements BaseServiceInterface
{

    /**
     * @return Safe
     */
    public function createSafe()
    {
        return new Safe();
    }


    /**
     * @param Safe $safe
     * @param Bottle $bottle
     * @return bool
     */
    public function addBottle(Safe $safe, Bottle $bottle)
    {
        return $safe->addBottle($bottle);
    }

    /**
     * @param Safe $safe
     * @param Bottle $bottle
     * @return bool
     */
    public function removeBottle(Safe $safe, Bottle $bottle)
    {
        return $safe->removeBottle($bottle);
    }

    /**
     * @param Safe $safe
     * @param Bottle $bottle
     * @param int $count
     * @return Safe
     */
    public function addMultipleBottles(Safe $safe, Bottle $bottle, int $count)
    {
        for ($i=0;$i<$count;$i++) {
            $this->addBottle($safe, $bottle);
        }

        return $safe;
    }

    /**
     * @param Safe $safe
     * @param Bottle $bottle
     * @param int $count
     * @return Safe
     */
    public function removeMultipleBottles(Safe $safe, Bottle $bottle, int $count)
    {
        for ($i=0;$i<$count;$i++) {
            $this->removeBottle($safe, $bottle);
        }

        return $safe;
    }
}