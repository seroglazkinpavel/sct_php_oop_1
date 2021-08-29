<?php
session_start();

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
    $_SESSION['$name'] = htmlspecialchars(trim($_POST['name'] ?? false));
    $_SESSION['$email'] = htmlspecialchars(trim($_POST['email'] ?? false));
    $_SESSION['$telephone'] = htmlspecialchars(trim($_POST['telephone'] ?? false));
    $_SESSION['$date_of_birth'] = htmlspecialchars(trim($_POST['date_of_birth'] ?? false));
    $_SESSION['$SNILS'] = htmlspecialchars(trim($_POST['SNILS'] ?? false));
    if ($_SESSION['$name'] == '' || $_SESSION['$email'] == '' || $_SESSION['$telephone'] == '' || $_SESSION['$date_of_birth'] == '' || $_SESSION['$SNILS'] == '') {
        $_SESSION['mistakes'] = 'Заполните пропущенные поля';
        header("Location: index.php");
        exit;
    }

    // создаем классы-валидаторы форм
    $validator = new ValidateName($_POST);
    $validator1 = new ValidateEmail($_POST);
    $validator2 = new ValidateTelephone($_POST);
    $validator3 = new ValidateBirth($_POST);
    $validator4 = new ValidateSnils($_POST);

    // проверяем на ошибки
    $err = $validator->validate();
    $err1 = $validator1->validate();
    $err2 = $validator2->validate();
    $err3 = $validator3->validate();
    $err4 = $validator4->validate();

    // объединяем массив в строку для передачи обратно на форму логина
    $errors1 = join(',', $err);
    $errors2 = join(',', $err1);
    $errors3 = join(',', $err2);
    $errors4 = join(',', $err3);
    $errors5 = join(',', $err4);

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