<?php

class User
{
    private $lastname;
    private $email;
    private $firstname;
    private $age;

    public function __construct($lastname, $email, $firstname, $age){
        if (!empty($lastname)) $this->lastname = $lastname;
        if (!empty($email)) $this->email = $email;
        if (!empty($firstname)) $this->firstname = $firstname;
        if (!empty($age)) $this->age = $age;
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

echo $user->getLastname() . '<br />';
echo $user->getEmail() . '<br />';
echo $user->getFirstname() . '<br />';
echo $user->getAge();

$user->setLastname('Сидоров') . '<br />';
$user->setEmail('qwer@mail.ru') . '<br />';
$user->setFirstname('Виталий') . '<br />';
$user->setAge(58) . '<br />';

echo $user->getLastname() . '<br />';
echo $user->getEmail() . '<br />';
echo $user->getFirstname() . '<br />';
echo $user->getAge();
