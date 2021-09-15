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
        if (isset($req['series'])) {
            if (empty($req['series'])) {
                $this->addError(self::CODE_EMPTY);
            } elseif (!preg_match("/^\d{4}$/", $req['series'])) {
                $this->addError(self::CODE_INVALID);
            }
        }
        return $this->getErrors();
    }

    public function check()
    {
        $errors = join(',', $this->validate());
        return $errors;
    }
}