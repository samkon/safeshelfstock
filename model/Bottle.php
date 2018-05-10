<?php

/**
 * Created by PhpStorm.
 * User: samed
 * Date: 10/05/2018
 * Time: 23:36
 */
class Bottle
{
    const BOTTLE_CL_33 = '33Cl';
    const BOTTLE_CL_50 = '50Cl';
    public static $cl2Volume = [
        self::BOTTLE_CL_33 => 1,
        self::BOTTLE_CL_50 => 2
    ];

    public function __construct($cl)
    {
      if (array_key_exists($cl, self::$cl2Volume)) {
          $this->setCl($cl);
          $this->setVolume(self::$cl2Volume[$cl]);
      }
    }

    /** @var string $cl  */
    private $cl = null;

    /** @var int $volume */
    private $volume = null;

    /**
     * @return string
     */
    public function getCl()
    {
        return $this->cl;
    }

    /**
     * @param string $cl
     */
    public function setCl($cl)
    {
        $this->cl = $cl;
    }

    /**
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param int $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }
}