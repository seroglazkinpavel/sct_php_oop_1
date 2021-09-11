<?php

namespace lib;

class Validator
{
    private $errors = [];
    private $request = []; // массив значений формы

    public function __construct(array $request)
    {
        $this->request = $request;


        $countr = $this->test_input($request['countr'] ?? false);
        $region = $this->test_input($request['region'] ?? false);
        $city = $this->test_input($request['city'] ?? false);
        $street = $this->test_input($request['street'] ?? false);
        $house = $this->test_input($request['house'] ?? false);
        $body = $this->test_input($request['body'] ?? false);
        $flat = $this->test_input($request['flat'] ?? false);
    }

    /**
     * Проверяет значения на соответствие условию,
     * если условия нарушаются, помещает в массив $errors
     * сообщение об ошибке
     */
    public function validate(): array
    {

        return $this->getErrors();
    }

    /**
     * Убрать ненужные символы (лишний пробел, табуляцию, символ новой строки)
     * Удалить обратную косую черту (\)
     * Преобразует специальные символы в объекты HTML
     */
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * объединяем массив в строку для передачи обратно на форму
     * из строк создаем массив используя разделитель
     */
    public function unification($request)
    {
        if (isset($request['name']) && isset($request['email']) && isset($request['telephone'])) {
            $errors1 = (new ValidateName($_POST))->check();
            $errors2 = (new ValidateEmail($_POST))->check();
            $errors3 = (new ValidateTelephone($_POST))->check();
            $errors = explode(',', "$errors1,$errors2,$errors3");
        }

        if (isset($request['date_of_birth']) && isset($request['SNILS']) && isset($request['series']) && isset($request['number'])) {
            $errors1 = (new ValidateBirth($_POST))->check();
            $errors2 = (new ValidateSnils($_POST))->check();
            $errors3 = (new ValidateSeries($_POST))->check();
            $errors4 = (new ValidateNumber($_POST))->check();
            //$errors5 = (new ValidateGender($_POST)) -> check();// не мог понять почему с ним не работает(сам валидатор new ValidateNumber($_POST)) -> check() работает)
            //var_dump($errors5);exit;
            $errors = explode(',', "$errors1,$errors2,$errors3,$errors4");
        }

        if (isset($request['countr']) && isset($request['region']) && isset($request['city']) && isset($request['street']) && isset($request['house']) && isset($request['body']) && isset($request['flat'])) {
            $errors1 = (new ValidateCountr($_POST))->check();
            $errors2 = (new ValidateRegion($_POST))->check();
            $errors3 = (new ValidateCity($_POST))->check();
            $errors4 = (new ValidateStreet($_POST))->check();
            $errors5 = (new ValidateHouse($_POST))->check();
            $errors6 = (new ValidateBody($_POST))->check();
            $errors7 = (new ValidateFlat($_POST))->check();
            $errors = explode(',', "$errors1,$errors2,$errors3,$errors4,$errors5,$errors6,$errors7");
        }
        return $errors;
	}	
	
    /**
	* добавляет сообщение об ошибке в массив
	*/
    public function addError($message)
    {
        $this -> errors[] = $message;
    }

    /**
	* возвращает список всех найденных ошибок
	*/
    public function getErrors()
    {
        return $this -> errors;
    }

	/**
	* проверяем на ошибки
	* объединяем массив в строку для передачи обратно на форму
	 */
	 public function check()
     {
		 $errors = $this -> validate();
		 $errors = join(',',$errors);
        return $errors;
    }

	/**
	* указывает на присутствие кавычек (если они есть указываем true, иначе false)
	*/
	protected function isContainQuotes($string)
    {
		$array = array("\"", "'", "`", "&quot;", "&apos;");
		foreach ($array as $value) {
			if(strpos($string, $value) !== false) return true;
		}
		return false;
	}
}