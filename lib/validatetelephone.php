<?php

namespace lib;
use lib\Validator;

class ValidateTelephone extends Validator
{
    const CODE_EMPTY = 'Вы не ввели номер телефона!';
	const CODE_INVALID = 'Некорректный номер телефона!';
	const CODE_MAX_LEN = 'Длина номера телефона не может превышать 16 или быть менне 9 символов!';
    private $request = []; // массив значений формы
   
    public function __construct(array $request) {
        $this -> request = $request;
    }
   
    public function validate() : array  {
       
        $req = $this -> request;
       
        if(mb_strlen($req['telephone']) == 0) $this -> addError(self::CODE_EMPTY);
        elseif
			(!preg_match("/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", ($req['telephone']))) $this->addError(self::CODE_INVALID);
		else {    
            $telephoneLen = mb_strlen( $req["telephone"] );			
			if( $telephoneLen < 9 or $telephoneLen > 16 ) {
				$this -> addError(self::CODE_MAX_LEN);  			
			}
        }           
        return $this->getErrors();
    }  
}
