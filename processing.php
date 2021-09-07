<?php
session_start();

use lib\Validator;
use lib\ValidateBirth;
use lib\ValidateSnils;
use lib\ValidateSeries;
use lib\ValidateNumber;
use lib\ValidateGender;

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
spl_autoload_extensions('.php');
spl_autoload_register();


// если форма заполнена
if (isset($_POST['enter'])) {
    $validator = new Validator();
    $date_of_birth = $validator->test_input($_POST['date_of_birth'] ?? false);
    $SNILS = $validator->test_input($_POST['SNILS'] ?? false);
    $series = $validator->test_input($_POST['series'] ?? false);
    $number = $validator->test_input($_POST['number'] ?? false);
    $gender = $validator->test_input($_POST['gender'] ?? false);
    if ($date_of_birth == '' || $SNILS == '' || $series == '' || $number == '' || $gender == '') {
        $_SESSION['empty'] = 'Заполните пропущенные поля';
        header("Location: index_1.php");
        exit;
    }

    // объединяем массив в строку для передачи обратно на форму
    $errors1 = (new ValidateBirth($_POST))->check();
    $errors2 = (new ValidateSnils($_POST))->check();
    $errors3 = (new ValidateSeries($_POST))->check();
    $errors4 = (new ValidateNumber($_POST))->check();
    //$errors5 = (new ValidateGender($_POST))->check();

    // из строк создаем массив используя разделитель
    $errors = explode(',', "$errors1,$errors2,$errors3,$errors4");

    if ($errors[0] == '' && $errors[1] == '' && $errors[2] == '' && $errors[3] == '') {

        $_SESSION['form']['date_of_birth'] = $date_of_birth;
        $_SESSION['form']['SNILS'] = $SNILS;
        $_SESSION['form']['series'] = $series;
        $_SESSION['form']['number'] = $number;
        $_SESSION['form']['gender'] = $gender;
        header("Location: index_2.php");
        exit;
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: index_1.php");
        exit;
    }
}