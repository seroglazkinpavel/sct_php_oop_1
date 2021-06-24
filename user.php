<?php

abstract class Vehicle
{

    abstract public function getName();

}

class Bus extends Vehicle
{
    public $year_of_issue;
    public $weight;

    public function __construct($weight, $year_of_issue)
    {
        $this->weight = $weight;
        $this->year_of_issue = $year_of_issue; 
    }

    public function getName()
    {
        echo 'Автобус весом '.$this->weight. ' кг и '.$this->year_of_issue.' года выпуска';
    }
}

$bus = new Bus(700, 2002);
/*Если не реализовать абстрактный метод в дочерних классах то возникает ошибка (Fatal error: Class Bus contains 1 abstract
method and must therefore be declared abstract or implement the remaining methods (Vehicle::getName)
in C:\OpenServer\domains\oop\user.php on line 16)*/
$bus->getName();
