<?php
session_start();

use lib\Validator;
use lib\ValidateName;
use lib\ValidateEmail;
use lib\ValidateTelephone;

//use lib\ValidateBirth;
//use lib\ValidateSnils;

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
spl_autoload_extensions('.php');
spl_autoload_register();


// если форма заполнена
if (isset($_POST['enter'])) {
    $validator = new Validator();
    $_SESSION['form']['name'] = $name = $validator->test_input($_POST['name'] ?? false);
    $_SESSION['form']['email'] = $email = $validator->test_input($_POST['email'] ?? false);
    $_SESSION['form']['telephone'] = $telephone = $validator->test_input($_POST['telephone'] ?? false);

    $validator->checkingForEmptiness($name, $email, $telephone);

    // создаем классы-валидаторы форм
    $Name = new ValidateName($_POST);
    $Email = new ValidateEmail($_POST);
    $Telephone = new ValidateTelephone($_POST);

    // объединяем массив в строку для передачи обратно на форму
    $errors1 = $Name->check();
    $errors2 = $Email->check();
    $errors3 = $Telephone->check();

    // из строк создаем массив используя разделитель
    $errors = explode(',', "$errors1,$errors2,$errors3");

    if ($errors[0] == '' && $errors[1] == '' && $errors[2] == '') {
        /*$_SESSION['form']['name'] = $name;
        $_SESSION['form']['email'] = $email;
        $_SESSION['form']['telephone'] = $telephone;*/
        header("Location: index_1.php");
        exit;
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: index.php");
        exit;
    }

}