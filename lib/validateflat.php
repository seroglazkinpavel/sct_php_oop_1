<?php

namespace lib;

use lib\Validator;

class ValidateFlat extends Validator
{
    const CODE_EMPTY = 'Вы не ввели номер квартиры!';
    const CODE_INVALID = 'Некорректный номер квартиры!';
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (mb_strlen($req['flat']) == 0) $this->addError(self::CODE_EMPTY);
        elseif (!preg_match("/^\d+$/", $req['flat'])) $this->addError(self::CODE_INVALID);
        return $this->getErrors();
    }
}