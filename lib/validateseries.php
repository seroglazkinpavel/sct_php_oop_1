<?php

namespace lib;

use lib\Validator;

class ValidateSeries extends Validator
{
	const CODE_EMPTY = 'Вы не ввели серию паспорта!';
    const CODE_INVALID = 'Некорректная серия паспорта!';
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;

    }

    public function validate(): array
    {

        $req = $this->request;

        if (mb_strlen($req['series']) == 0) $this->addError(self::CODE_EMPTY);
        elseif (!preg_match("/^\d{4}$/", $req['series'])) $this->addError(self::CODE_INVALID);
        //else $this->isContainQuotes($req['series']) $this-> addError(self::CODE_INVALID);
        return $this->getErrors();
    }
}