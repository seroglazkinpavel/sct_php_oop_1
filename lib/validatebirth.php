<?php

namespace lib;

use lib\Validator;

class ValidateBirth extends Validator
{
    const CODE_EMPTY = 'Вы не ввели дату дня рождения!';
    const CODE_INVALID = 'Некорректная дата дня рождения!';
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (isset($req['date_of_birth'])) {
            if (empty($req['date_of_birth'])) {
                $this->addError(self::CODE_EMPTY);
            } elseif (!preg_match("/^(0[1-9]|[12][0-9]|3[01])[\.](0[1-9]|1[012])[\.](19|20)\d\d$/", $req['date_of_birth'])) {
                $this->addError(self::CODE_INVALID);
            }
        }
        return $this->getErrors();
    }

    public function check()
    {
        $errors = join(',', $this->validate());
        return $errors;
    }
}