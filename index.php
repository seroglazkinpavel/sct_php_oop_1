<?php

use lib\Car;
use lib\Aircraft;

//require_once 'Car.php';
//require_once 'Aircraft.php';
set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
spl_autoload_extensions('.php');
spl_autoload_register();

$car = new Car();
$car->move();
echo '<br>';
$aircraft = new Aircraft();
$aircraft->fly();
