<?php

namespace lib;

use lib\Validator;

class ValidateHouse extends Validator
{
    const CODE_EMPTY = 'Вы не ввели номер дома!';
    const CODE_INVALID = 'Некорректный номер дома!';
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (isset($req['house'])) {
            if (empty($req['house'])) {
                $this->addError(self::CODE_EMPTY);
            } elseif (!preg_match("/^\d+$/", $req['house'])) {
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