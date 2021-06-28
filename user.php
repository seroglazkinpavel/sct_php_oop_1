<?php

trait СanMove
{
    public function move()
    {
        echo 'Движение автомобиля';
    }
}

trait СanFly
{
    public function fly()
    {
        echo 'Полёт самолёта';
    }
}

class Car
{
    use СanMove;
}

class Aircraft
{
    use СanFly;
}

$car = new Car();
$car->move();
echo '<br>';
$aircraft = new Aircraft();
$aircraft->fly();