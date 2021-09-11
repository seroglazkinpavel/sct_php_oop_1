<?php

namespace lib;
use lib\Validator;

class ValidateNumber extends Validator
{
	const CODE_EMPTY = 'Вы не ввели номер паспорта!';
	const CODE_INVALID = 'Некорректный номер паспорта!';
	private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (mb_strlen($req['number']) == 0) $this->addError(self::CODE_EMPTY);
        elseif (!preg_match("/^\d{6}$/", $req['number'])) $this->addError(self::CODE_INVALID);
        return $this->getErrors();
    }
}