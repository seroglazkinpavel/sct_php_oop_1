<?php
session_start();

use lib\Validator;

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
spl_autoload_extensions('.php');
spl_autoload_register();

/**
 * если форма заполнена
 */
if (isset($_POST['enter'])) {
    $validator = new Validator($_POST);
    $date_of_birth = $validator->test_input($_POST['date_of_birth'] ?? false);
    $SNILS = $validator->test_input($_POST['SNILS'] ?? false);
    $series = $validator->test_input($_POST['series'] ?? false);
    $number = $validator->test_input($_POST['number'] ?? false);
    $gender = $validator->test_input($_POST['gender'] ?? false);

    $errors = $validator->validate();
    if ($gender == '') $errors[] = 'Укажите пол';
    if (empty($errors)) {
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