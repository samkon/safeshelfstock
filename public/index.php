<?php
/**
 * Created by PhpStorm.
 * User: samed
 * Date: 08/05/2018
 * Time: 22:18
 */

define('BASE_PATH', dirname(__DIR__));
require BASE_PATH . "/vendor/autoload.php";

$safe = new Safe();

// add 21 bottle
for ($i=0;$i<21;$i++) {
    $safe->addBottle();
}

// remove 5 bottle
for ($i=0;$i<5;$i++) {
    $safe->removeBottle();
}

// add 40 bottle
for ($i=0;$i<40;$i++) {
    $safe->addBottle();
}

// remove 12 bottle
for ($i=0;$i<12;$i++) {
    $safe->removeBottle();
}

// add 34 bottle
/*for ($i=0;$i<34;$i++) {
    $safe->addBottle();
}*/

echo'<pre>';
print_r($safe);