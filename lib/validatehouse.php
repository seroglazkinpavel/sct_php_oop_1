<?php

namespace lib;

use lib\Validator;

class ValidateHouse extends Validator
{
    const CODE_INVALID = 'Некорректный номер дома!';
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (!preg_match("/^\d+$/", $req['house'])) $this->addError(self::CODE_INVALID);
        return $this->getErrors();
    }
}