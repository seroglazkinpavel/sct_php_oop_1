<?php

namespace lib;

use lib\Validator;

class ValidateBody extends Validator
{
    const CODE_INVALID = 'Некорректный корпус дома!';
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (!preg_match("/^\d+$/", $req['body'])) $this->addError(self::CODE_INVALID);
        return $this->getErrors();
    }
}