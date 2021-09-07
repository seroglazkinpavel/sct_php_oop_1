<?php

namespace lib;

use lib\Validator;

class ValidateStreet extends Validator
{
    const CODE_INVALID = 'Некорректное название улицы!';
    const CODE_MAX_LEN = 'Длина название улицы не может превышать 60 или быть менне 3 символов!';
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
        if ($this->isContainQuotes($req['street'])) $this->addError(self::CODE_INVALID);
        elseif (!preg_match("/^([a-zA-Z' -]|[а-яА-ЯЁёІіЇїҐґЄє' -])*$/", $req['street'])) $this->addError(self::CODE_INVALID);
        else {
            $nameLen = mb_strlen($req['street']);
            if ($nameLen < self::CODE_MIN or $nameLen > self::CODE_MAX) {
                $this->addError(self::CODE_MAX_LEN);
            }
        }
        return $this->getErrors();
    }
}