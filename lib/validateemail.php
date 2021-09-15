<?php

namespace lib;

use lib\Validator;

class ValidateEmail extends Validator
{

    const MAX_LEN = 100;
    const CODE_EMPTY = 'Вы не ввели e-mail!';
    const CODE_INVALID = 'Некорректный e-mail!';
    const CODE_MAX_LEN = 'E-mail слишком длинный!';
    private $request = [];// массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {

        $req = $this->request;
        if (isset($req['email'])) {
            if (empty($req['email'])) $this->addError(self::CODE_EMPTY);
            else {
                if (mb_strlen($req['email']) > self::MAX_LEN) $this->addError(self::CODE_MAX_LEN);
                else {
                    $pattern = "/^[a-z0-9_][a-z0-9\._-]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+$/i";
                    if (!preg_match($pattern, ($req['email']))) $this->addError(self::CODE_INVALID);
                }
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