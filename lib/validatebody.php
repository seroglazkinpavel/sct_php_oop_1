<?php

namespace lib;

use lib\Validator;

class ValidateBody extends Validator
{
    const CODE_EMPTY = 'Вы не ввели корпус дома!';
    const CODE_INVALID = 'Некорректный корпус дома!';
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (isset($req['body'])) {
            if (empty($req['body'])) {
                $this->addError(self::CODE_EMPTY);
            } elseif (!preg_match("/^\d+$/", $req['body'])) {
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