<?php

namespace lib;

class Validator
{
    private $errors = [];
	private $request = []; // массив значений формы

	public function __construct(array $request){
		$this -> request = $request;		
	}
	
    /**
    * Проверяет значения на соответствие условию,
    * если условия нарушаются, помещает в массив $errors
    * сообщение об ошибке
    */
    public function validate() : array {
				
		if(!empty($this->name())) $this->addError($this->name());
		if(!empty($this->email())) $this->addError($this->email());		
		if(!empty($this->telephone())) $this->addError($this->telephone());
		if(!empty($this->birth())) $this->addError($this->birth());
		if(!empty($this->snils())) $this->addError($this->snils());
		if(!empty($this->series())) $this->addError($this->series());
		if(!empty($this->number())) $this->addError($this->number());
		if(!empty($this->countr())) $this->addError($this->countr());
		if(!empty($this->region())) $this->addError($this->region());
		if(!empty($this->city())) $this->addError($this->city());
		if(!empty($this->street())) $this->addError($this->street());
		if(!empty($this->house())) $this->addError($this->house());
		if(!empty($this->body())) $this->addError($this->body());
		if(!empty($this->flat())) $this->addError($this->flat());		
		return $this->getErrors();
	}
	
	public function name() {
		$name = (new ValidateName($_POST))->check();
		return $name;
	}
	
	public function email() {
		$email = (new ValidateEmail($_POST))->check();
		return $email;
	}
	
	public function telephone() {
		$telephone = (new ValidateTelephone($_POST))->check();
		return $telephone;
	}
		
	public function birth() {
		$birth = (new ValidateBirth($_POST))->check();
		return $birth;
	}	
		
	public function snils() {
		$snils = (new ValidateSnils($_POST))->check();
		return $snils;
	}	
			
	public function series() {
		$series = (new ValidateSeries($_POST))->check();
		return $series;
	}
				
	public function number() {
		$number = (new ValidateNumber($_POST))->check();
		return $number;
	}
					
	public function countr() {
		$countr = (new ValidateCountr($_POST))->check();
		return $countr;
	}	
						
	public function region() {
		$region = (new ValidateRegion($_POST))->check();
		return $region;
	}	
							
	public function city() {
		$city = (new ValidateCity($_POST))->check();
		return $city;
	}	
								
	public function street() {
		$street = (new ValidateStreet($_POST))->check();
		return $street;
	}	
									
	public function house() {
		$house = (new ValidateHouse($_POST))->check();
		return $house;
	}	
										
	public function body() {
		$body = (new ValidateBody($_POST))->check();
		return $body;
	}	
											
	public function flat() {
		$flat = (new ValidateFlat($_POST))->check();
		return $flat;
	}	
	
	/**
    * Убрать ненужные символы (лишний пробел, табуляцию, символ новой строки)
    * Удалить обратную косую черту (\) 
    * Преобразует специальные символы в объекты HTML
    */
    function test_input($data) {
		$data = trim($data);   
		$data = stripslashes($data);  
		$data = htmlspecialchars($data);  
		return $data;
	}
	
    /**
	* добавляет сообщение об ошибке в массив
	*/ 
    public function addError($message) {
        $this -> errors[] = $message;
    }

    /**
	* возвращает список всех найденных ошибок
	*/ 
    public function getErrors() {
        return $this -> errors;
    }

	/**
	* указывает на присутствие кавычек (если они есть указываем true, иначе false)
	*/ 
	protected function isContainQuotes($string) {
		$array = array("\"", "'", "`", "&quot;", "&apos;");
		foreach ($array as $value) {
			if(strpos($string, $value) !== false) return true;
		}
		return false;
	}
}