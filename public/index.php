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

// add 21 bottle
$safeService->addBottles($safe, 21);

// remove 5 bottle
$safeService->removeBottles($safe, 5);

// add single bottle
$safeService->addSingleBottle($safe);

// add 40 bottle
$safeService->addBottles($safe, 40);

// remove 12 bottle
$safeService->removeBottles($safe,  12);

// remove single bottle
$safeService->removeSingleBottle($safe);

/*
 * also object can be used directly in similar way
 * add 34 bottle
 */
/*for ($i=0;$i<34;$i++) {
    $safe->addBottle();
}*/

echo'<pre>';
print_r($safe);