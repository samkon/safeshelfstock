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
     * @param int $count
     * @return Safe
     */
    public function addBottles(Safe $safe, int $count)
    {
        // add bottles
        for ($i=0;$i<$count;$i++) {
            $safe->addBottle();
        }

        return $safe;
    }

    /**
     * @param Safe $safe
     * @param int $count
     * @return Safe
     */
    public function removeBottles(Safe $safe, int $count)
    {
        // remove bottles
        for ($i=0;$i<$count;$i++) {
            $safe->removeBottle();
        }

        return $safe;
    }

    /**
     * @param $safe
     * @return Safe
     */
    public function addSingleBottle($safe)
    {
        $this->addBottles($safe, 1);
    }

    /**
     * @param $safe
     * @return Safe
     */
    public function removeSingleBottle($safe)
    {
        $this->removeBottles($safe, 1);
    }
}