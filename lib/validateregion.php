<?php

namespace lib;

use lib\Validator;

class ValidateRegion extends Validator
{
    const CODE_INVALID = 'Некорректное название региона!';
    const CODE_MAX_LEN = 'Длина название региона не может превышать 60 или быть менне 3 символов!';
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
        if (!preg_match("/^([a-z]|[а-я])*$/iu", $req['region'])) $this->addError(self::CODE_INVALID);
        else {
            $nameLen = mb_strlen($req['region']);
            if ($nameLen < self::CODE_MIN or $nameLen > self::CODE_MAX) {
                $this->addError(self::CODE_MAX_LEN);
            }
        }
        return $this->getErrors();
    }
}