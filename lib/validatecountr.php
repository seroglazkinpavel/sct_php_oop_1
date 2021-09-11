<?php

namespace lib;

use lib\Validator;

class ValidateCountr extends Validator
{
    const CODE_EMPTY = 'Вы не ввели название страны!';
    const CODE_INVALID = 'Некорректное название страны!';
    const CODE_MAX_LEN = 'Длина название страны не может превышать 60 или быть менне 3 символов!';
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
        if (mb_strlen($req['countr']) == 0) $this->addError(self::CODE_EMPTY);
        elseif ($this->isContainQuotes($req['countr'])) $this->addError(self::CODE_INVALID);
        elseif (!preg_match("/^([a-zA-Z' -]|[а-яА-ЯЁёІіЇїҐґЄє' -])*$/", $req['countr'])) $this->addError(self::CODE_INVALID);
        else {
            $nameLen = mb_strlen($req['countr']);
            if ($nameLen < self::CODE_MIN or $nameLen > self::CODE_MAX) {
                $this->addError(self::CODE_MAX_LEN);
            }
        }

        return $this->getErrors();
    }

}