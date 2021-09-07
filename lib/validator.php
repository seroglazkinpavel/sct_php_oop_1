<?php

namespace lib;

class Validator
{
    private $errors = [];

    /**
     *
     * Проверяет значения на соответствие условию,
     * если условия нарушаются, помещает в массив $errors
     * сообщение об ошибке
     */
    public function validate(): array
    {
        return $this->getErrors();
    }

    function test_input($data)
    {
        $data = trim($data);  // Убрать ненужные символы (лишний пробел, табуляцию, символ новой строки)
        $data = stripslashes($data); // Удалить обратную косую черту (\)
        $data = htmlspecialchars($data); // преобразует специальные символы в объекты HTML
        return $data;
    }

    //Проверка на пустоту поля
    public function checkingForEmptiness($name = null, $email = null, $telephone = null, $date_of_birth = null, $SNILS = null, $series = null, $number = null, $gender = null)
    {
        if ($name == '' || $email == '' || $telephone == '') {
            $_SESSION['mistakes'] = 'Заполните пропущенные поля';
            header("Location: index.php");
            exit;
            return $_SESSION['mistakes'];
            /*}elseif($date_of_birth == '' || $SNILS == '' || $series == '' || $number == '' || $gender == ''){
                $_SESSION['empty'] = 'Заполните пропущенные поля';
                header("Location: index_1.php");
                exit;
                return $_SESSION['empty'];*/
        }

    }

    // добавляет сообщение об ошибке в массив
    public function addError($message)
    {
        $this->errors[] = $message;
    }

    // возвращает список всех найденных ошибок
    public function getErrors()
    {
        return $this->errors;
    }

    /*
    * проверяем на ошибки
    * объединяем массив в строку для передачи обратно на форму
     */
    public function check()
    {
        $errors = $this->validate();
        $errors = join(',', $errors);
        return $errors;
    }

    // указывает на присутствие кавычек (если они есть указываем true, иначе false)
    protected function isContainQuotes($string)
    {
        $array = array("\"", "'", "`", "&quot;", "&apos;");
        foreach ($array as $value) {
            if (strpos($string, $value) !== false) return true;
        }
        return false;
    }
}