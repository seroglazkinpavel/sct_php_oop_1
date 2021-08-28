<?php

namespace lib;
use lib\Validator;

class ValidateName extends Validator
{
    const CODE_EMPTY = 'Вы не ввели имя!';
	const CODE_INVALID = 'Некорректное имя!';
	const CODE_MAX_LEN = 'Длина имени не может превышать 60 или быть менне 3 символов!';
    private $request = []; // массив значений формы
   
    public function __construct(array $request) {
        $this -> request = $request;
    }
   
    public function validate() : array  {
       
        $req = $this -> request;
       
        if(mb_strlen($req['name']) == 0) $this -> addError(self::CODE_EMPTY);
        elseif ($this->isContainQuotes($req['name'])) $this-> addError(self::CODE_INVALID);// если строка содержит кавычки мы ошибку ставим и наобарот
		else {    
            $nameLen = mb_strlen( $req["name"] );			
			if( $nameLen < 3 or $nameLen > 60 ) {
				$this -> addError(self::CODE_MAX_LEN);  			
			}
        }           
        return $this->getErrors();
    }  
}