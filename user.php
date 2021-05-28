<?php

class User
{
    public $lastname;
    public $email;
    public $firstname;
    public $age;

    public function __construct($lastname, $email, $firstname, $age){
       $this->lastname = $lastname;
       $this->email = $email;
       $this->firstname = $firstname;
       $this->age = $age;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function getAge(){
        return $this->age;
    }

    public function setLastname($Lastname){
        $this->lastname = $Lastname;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }

    public function setAge($age){
        $this->age = $age;
    }
}

$user = new User('Иванов', 'abc1@mail.ru', 'Виктор', 32);

echo $user->lastname . '<br />';
echo $user->email . '<br />';
echo $user->firstname . '<br />';
echo $user->age . '<br />';

echo $user->getLastname() . '<br />';
echo $user->getEmail() . '<br />';
echo $user->getFirstname() . '<br />';
echo $user->getAge();

$user->setLastname('Иванов') . '<br />';
$user->setEmail('qwer@mail.ru') . '<br />';
$user->setFirstname('Виталий') . '<br />';
$user->setAge(58);

echo $user->getLastname() . '<br />';
echo $user->getEmail() . '<br />';
echo $user->getFirstname() . '<br />';
echo $user->getAge();
