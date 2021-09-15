<?php

namespace lib;

use lib\Validator;

class ValidateSnils extends Validator
{
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function validate(): array
    {
        $req = $this->request;
        if (isset($req['SNILS'])) {
            $error_message = null;
            $error_code = null;
            $result = false;
            $snils = (string)$req['SNILS'];
            if (!$snils) {
                $error_code = 1;
                $this->addError('СНИЛС пуст');
            } elseif (preg_match('/[^0-9]/', $snils)) {
                $error_code = 2;
                $this->addError('СНИЛС может состоять только из цифр');
            } elseif (strlen($snils) !== 11) {
                $error_code = 3;
                $this->addError('СНИЛС может состоять только из 11 цифр');
            } else {
                $sum = 0;
                for ($i = 0; $i < 9; $i++) {
                    $sum += (int)$snils[$i] * (9 - $i);
                }
                $check_digit = 0;
                if ($sum < 100) {
                    $check_digit = $sum;
                } elseif ($sum > 101) {
                    $check_digit = $sum % 101;
                    if ($check_digit === 100) {
                        $check_digit = 0;
                    }
                }
                if ($check_digit === (int)substr($snils, -2)) {
                    $result = true;
                } else {
                    $error_code = 4;
                    $this->addError('Неправильное контрольное число');
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