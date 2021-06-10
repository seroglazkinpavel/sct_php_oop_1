<?php

class Point
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function __toString()
    {
        return "Точка с координатами ({$this->x}, {$this->y})";
    }

    public function __get($z)
    {
        return  'Класс Point работает только в двумерном пространстве';
    }

    public function __set($name, $value)
    {
        $this->name = $value;
    }

    public function __call($x, $y)
    {
        return "Точка с координатами ({$this->x}, {$this->y})";
    }
}

$point = new Point(15, 32);
$point1 = new Point(14, 2);
$point2 = new Point(6, 3);

echo $point.'<br>';
echo $point1.'<br>';
echo $point2.'<br>';

echo $point->z .'<br>';
echo $point->z = 7 .'<br>';
echo $point->setZ(67, 34) .'<br>';

$point3 = clone $point2;
$point2->x = 8 .'<br>';
echo $point3->x .'<br>';
echo $point2->x;