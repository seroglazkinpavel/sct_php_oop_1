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
		if(!empty((new ValidateName($_POST))->check())) $this->addError((new ValidateName($_POST))->check());
		if(!empty((new ValidateEmail($_POST))->check())) $this->addError((new ValidateEmail($_POST))->check());		
		if(!empty((new ValidateTelephone($_POST))->check())) $this->addError((new ValidateTelephone($_POST))->check());
		if(!empty((new ValidateBirth($_POST))->check())) $this->addError((new ValidateBirth($_POST))->check());			
		if(!empty((new ValidateSnils($_POST))->check())) $this->addError((new ValidateSnils($_POST))->check());			
		if(!empty((new ValidateSeries($_POST))->check())) $this->addError((new ValidateSeries($_POST))->check());			
		if(!empty((new ValidateNumber($_POST))->check())) $this->addError((new ValidateNumber($_POST))->check());
		if(!empty((new ValidateCountr($_POST))->check())) $this->addError((new ValidateCountr($_POST))->check());
		if(!empty((new ValidateRegion($_POST))->check())) $this->addError((new ValidateRegion($_POST))->check());
		if(!empty((new ValidateCity($_POST))->check())) $this->addError((new ValidateCity($_POST))->check());
		if(!empty((new ValidateStreet($_POST))->check())) $this->addError((new ValidateStreet($_POST))->check());
		if(!empty((new ValidateHouse($_POST))->check())) $this->addError((new ValidateHouse($_POST))->check());
		if(!empty((new ValidateBody($_POST))->check())) $this->addError((new ValidateBody($_POST))->check());
		if(!empty((new ValidateFlat($_POST))->check())) $this->addError((new ValidateFlat($_POST))->check());
		return $this->getErrors();
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