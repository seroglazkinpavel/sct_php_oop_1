<?php

abstract class Vehicle
{

    abstract public function getName($weight, $year_of_issue);

}

class Bus extends Vehicle
{

    public $year_of_issue;
    public $weight;

    public function getName($weight, $year_of_issue)
    {
        $this->weight = $weight;
        $this->year_of_issue = $year_of_issue;
        echo 'Автобус весом '.$weight. ' кг и '.$year_of_issue.' года выпуска';
    }

}

$bus = new Bus();
/*Если не реализовать абстрактный метод в дочерних классах то возникает ошибка (Fatal error: Class Bus contains 1 abstract
method and must therefore be declared abstract or implement the remaining methods (Vehicle::getName)
in C:\OpenServer\domains\oop\user.php on line 16)*/
$bus = new Bus();
$bus->getName(700, 2002);