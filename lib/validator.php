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

    //Проверка на пустоту поля
    public function checkingForEmptiness($name, $email, $telephone, $date_of_birth, $SNILS)
    {
        if ($name == '' || $email == '' || $telephone == '' || $date_of_birth == '' || $SNILS == '') {
            $_SESSION['mistakes'] = 'Заполните пропущенные поля';
            header("Location: index.php");
            exit;
            return $_SESSION['mistakes'];
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