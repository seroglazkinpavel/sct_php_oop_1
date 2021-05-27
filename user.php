<?php

class User
{
    public $lastname;
    public $email;
    public $firstname;
    public $age;

}

$user = new User();
$user->lastname = 'Иванов' . '<br />';
$user->email = 'abc1@mail.ru' . '<br />';
$user->firstname = 'Виктор' . '<br />';
$user->age = 32 . '<br />';
echo $user->lastname . '<br />';
echo $user->email . '<br />';
echo $user->firstname . '<br />';
echo $user->age;
