<?php

class  EmptyException extends Exception
{

}

class  LongException extends Exception
{

}

class   InvalidException extends Exception
{

}

class  Valid
{

    public static function validEmail($email)
    {

        if ($email == '') {
            throw new EmptyException('E-mail не указан');
        } elseif (mb_strlen($email) > 255) {
            throw new LongException('Слишком длинный e-mail');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidException('E-mail указан неправильно');
        } else return $email;
    }
}

try {
    echo Valid::validEmail('');
} catch (Exception $e) {
    echo '<br />Возникла ошибка: ' . $e->getMessage();
}