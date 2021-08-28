<?php

/*abstract class Validator {
	
	const CODE_UNKNOWN = "UNKNOWN_ERROR";
	
	protected $data; // данные (полученные от пользователя) которые будут проверяться перед отправкой
	private $errors = array(); // массив ошибок, найденные у данного значения $data
	
	public function __construct($data) {
		$this->data = $data;
		$this->validate();
	}
	
	abstract protected function validate(); // необходимо реализовать в дочерних классах
	
	// возвращает массив ошибок
	public function getErrors() {
		return $this->errors;
	}
	
	public function isValid() {
		return count($this->errors) == 0;
	}
	
	// добавление кода ошибок метод используется в нутри метода validate()
	protected function setError($code) {
		$this->errors[] = $code;
	}
	
	// указывает на присутствие кавычек (если они есть указываем true, иначе false)
	protected function isContainQuotes($string) {
		$array = array("\"", "'", "`", "&quot;", "&apos;");
		foreach ($array as $value) {
			if (strpos($string, $value) !== false) return true;
		}
		return false;
	}
	
}*/
namespace lib;

abstract class Validator
{
    private $errors = [];
     
    /**
    *
    * Проверяет значения на соответствие условию,
    * если условия нарушаются, помещает в массив $errors
    * сообщение об ошибке
    */
    abstract function validate() : array;
      
    // добавляет сообщение об ошибке в массив
    public function addError($message) {
        $this -> errors[] = $message;
    }

    // влзвращает список всех найденных ошибок
    public function getErrors() {
        return $this -> errors;
    }
	
	// указывает на присутствие кавычек (если они есть указываем true, иначе false)
	protected function isContainQuotes($string) {
		$array = array("\"", "'", "`", "&quot;", "&apos;");
		foreach ($array as $value) {
			if(strpos($string, $value) !== false) return true;
		}
		return false;
	}
}