<?php
use ru\car\Car;
use ru\air\Aircraft;
require_once 'Car.php';
require_once 'Aircraft.php';

$car = new Car();
$car->move();
echo '<br>';
$aircraft = new Aircraft();
$aircraft->fly();