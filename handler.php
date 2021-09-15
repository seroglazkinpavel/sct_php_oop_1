<?php
session_start();

use lib\Validator;

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
spl_autoload_extensions('.php');
spl_autoload_register();

/**
 *  если форма заполнена
 */
if (isset($_POST['enter'])) {
    $validator = new Validator($_POST);
    $name = $validator->test_input($_POST['name'] ?? false);
    $email = $validator->test_input($_POST['email'] ?? false);
    $telephone = $validator->test_input($_POST['telephone'] ?? false);
    $errors = $validator->validate();

    if (empty($errors)) {
        $_SESSION['form']['name'] = $name;
        $_SESSION['form']['email'] = $email;
        $_SESSION['form']['telephone'] = $telephone;
        header("Location: index_1.php");
        exit;
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: index.php");
        exit;
    }
}