<?php

class User
{
    private $lastname;
    private $email;
    private $firstname;
    private $age;
    public static $counter = 0;

    public function __construct($lastname, $email, $firstname, $age){
        if (!empty($lastname)) $this->lastname = $lastname;
        if (!empty($email)) $this->email = $email;
        if (!empty($firstname)) $this->firstname = $firstname;
        if (!empty($age)) $this->age = $age;
        self::$counter++;
    }

    public static function getCounter()
    {
        return self::$counter;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($Lastname)
    {
        $this->lastname = $Lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
}

$user = new User('Иванов', 'abc1@mail.ru', 'Виктор', 32);
$user1 = new User('Иванов', 'abc1@mail.ru', 'Виктор', 32);
$user2 = new User('Иванов', 'abc1@mail.ru', 'Виктор', 32);

echo $user::getCounter();
