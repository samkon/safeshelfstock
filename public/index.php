<?php
/**
 * Created by PhpStorm.
 * User: samed
 * Date: 08/05/2018
 * Time: 22:18
 */

define('BASE_PATH', dirname(__DIR__));
require BASE_PATH . "/vendor/autoload.php";

$safeService = new SafeService();

/** @var Safe $safe */
$safe = $safeService->createSafe();

$bottle = new Bottle(Bottle::BOTTLE_CL_33);

// add 25 33cl bottle
$safeService->addMultipleBottles($safe, $bottle,25);

$bottle = new Bottle(Bottle::BOTTLE_CL_50);

// add 6 50cl bottle
$safeService->addMultipleBottles($safe, $bottle,6);

$bottle = new Bottle(Bottle::BOTTLE_CL_33);

// remove 5 33cl bottle
$safeService->removeMultipleBottles($safe, $bottle,5);

$bottle = new Bottle(Bottle::BOTTLE_CL_50);

// add single 50cl bottle
$safeService->addBottle($safe, $bottle);

// add 15 50cl bottle
$safeService->addMultipleBottles($safe, $bottle, 15);

// remove 12 50cl bottle
$safeService->removeMultipleBottles($safe, $bottle, 12);

$bottle = new Bottle(Bottle::BOTTLE_CL_33);

// remove single 33cl bottle
$safeService->removeBottle($safe, $bottle);

/*
 * also object can be used directly in similar way
 * add 34 bottle
 */
/*for ($i=0;$i<34;$i++) {
    $safe->addBottle();
}*/

echo'<pre>';
print_r($safe);