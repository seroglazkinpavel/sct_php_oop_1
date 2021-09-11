<?php

namespace lib;

use lib\Validator;

class ValidateCity extends Validator
{
    const CODE_EMPTY = 'Вы не ввели название города!';
    const CODE_INVALID = 'Некорректное название города!';
    const CODE_MAX_LEN = 'Длина название города не может превышать 60 или быть менне 3 символов!';
    const CODE_MIN = 3;
    const CODE_MAX = 60;
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (mb_strlen($req['city']) == 0) $this->addError(self::CODE_EMPTY);
        elseif (!preg_match("/^([a-z]|[а-я])*$/iu", $req['city'])) $this->addError(self::CODE_INVALID);
        else {
            $nameLen = mb_strlen($req['city']);
            if ($nameLen < self::CODE_MIN or $nameLen > self::CODE_MAX) {
                $this->addError(self::CODE_MAX_LEN);
            }
        }
        return $this->getErrors();
    }
}