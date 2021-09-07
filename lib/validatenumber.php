<?php

namespace lib;

use lib\Validator;

class ValidateNumber extends Validator
{
    const CODE_INVALID = 'Некорректный номер паспорта!';
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (!preg_match("/^\d{6}$/", $req['number'])) $this->addError(self::CODE_INVALID);
        return $this->getErrors();
    }
}