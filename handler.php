<?php
session_start();

use lib\Validator;
use lib\ValidateName;
use lib\ValidateEmail;
use lib\ValidateTelephone;
use lib\ValidateBirth;
use lib\ValidateSnils;

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
spl_autoload_extensions('.php');
spl_autoload_register();


// если форма заполнена
if (isset($_POST['enter'])) {
    $name = htmlspecialchars(trim($_POST['name'] ?? false));
    $email = htmlspecialchars(trim($_POST['email'] ?? false));
    $telephone = htmlspecialchars(trim($_POST['telephone'] ?? false));
    $date_of_birth = htmlspecialchars(trim($_POST['date_of_birth'] ?? false));
    $SNILS = htmlspecialchars(trim($_POST['SNILS'] ?? false));
    $validator = new Validator();
    $validator->checkingForEmptiness($name, $email, $telephone, $date_of_birth, $SNILS);

    // создаем классы-валидаторы форм
    $name = new ValidateName($_POST);
    $email = new ValidateEmail($_POST);
    $telephone = new ValidateTelephone($_POST);
    $birth = new ValidateBirth($_POST);
    $snils = new ValidateSnils($_POST);

    // объединяем массив в строку для передачи обратно на форму
    $errors1 = $name->check();
    $errors2 = $email->check();
    $errors3 = $telephone->check();
    $errors4 = $birth->check();
    $errors5 = $snils->check();

    // из строк создаем массив используя разделитель
    $errors = explode(',', "$errors1,$errors2,$errors3,$errors4,$errors5");

    if ($errors[0] == '' && $errors[1] == '' && $errors[2] == '' && $errors[3] == '' && $errors[4] == '') {
        $errors = 'Вы успешно прошли регистрацию!';
        $_SESSION['user'] = $errors;
    } else {
        $_SESSION['errors'] = $errors;
    }
    header("Location: index.php");
    exit;
}