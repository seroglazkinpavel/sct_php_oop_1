<?php

class  Valid
{

    public static function validEmail($email)
    {

        if ($email == '') {
            throw new Exception('E-mail не указан');
        } elseif (mb_strlen($email) > 255) {
            throw new Exception('Слишком длинный e-mail');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('E-mail указан неправильно');
        } else return $email;
    }
}

try {
    echo Valid::validEmail('eeeeeee');
} catch (Exception $e) {
    echo '<br />Возникла ошибка: ' . $e->getMessage();
}