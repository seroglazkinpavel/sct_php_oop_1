<?php

interface СanMove
{
    public function move();
}

interface СanFly
{
    public function fly();
}

class Car implements СanMove
{
    public function move()
    {
        echo 'Движение автомобиля';
    }
}

class Aircraft implements СanFly
{
    public function fly()
    {
        echo 'Полёт самолёта';
    }
}

$car = new Car();
$car->move();
echo '<br>';
$aircraft = new Aircraft();
$aircraft->fly();