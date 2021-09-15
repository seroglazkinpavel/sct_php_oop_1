<?php

namespace lib;

use lib\Validator;

class ValidateGender extends Validator
{
    const CODE_EMPTY = 'Вы не ввели пол!';

    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (isset($req['gender'])) {
            if (empty($req['gender'])) {
                $this->addError(self::CODE_EMPTY);
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