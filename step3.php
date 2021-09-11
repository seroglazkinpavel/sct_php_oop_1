<?php
session_start();

use lib\Validator;
use lib\ValidateCountr;
use lib\ValidateRegion;
use lib\ValidateCity;
use lib\ValidateStreet;
use lib\ValidateHouse;
use lib\ValidateBody;
use lib\ValidateFlat;

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
spl_autoload_extensions('.php');
spl_autoload_register();


// если форма заполнена
if (isset($_POST['entrance'])) {
    $validator = new Validator($_POST);
    $countr = $validator->test_input($_POST['countr'] ?? false);
    $region = $validator->test_input($_POST['region'] ?? false);
    $city = $validator->test_input($_POST['city'] ?? false);
    $street = $validator->test_input($_POST['street'] ?? false);
    $house = $validator->test_input($_POST['house'] ?? false);
    $body = $validator->test_input($_POST['body'] ?? false);
    $flat = $validator->test_input($_POST['flat'] ?? false);
    $errors = $validator->unification($_POST);

    if ($errors[0] == '' && $errors[1] == '' && $errors[2] == '' && $errors[3] == '' && $errors[4] == '' && $errors[5] == '' && $errors[6] == '') {

        $_SESSION['form']['countr'] = $countr;
        $_SESSION['form']['region'] = $region;
        $_SESSION['form']['city'] = $city;
        $_SESSION['form']['street'] = $street;
        $_SESSION['form']['house'] = $house;
        $_SESSION['form']['body'] = $body;
        $_SESSION['form']['flat'] = $flat;

        header("Location: index_3.php");
        exit;

    } else {
        $_SESSION['errors'] = $errors;

        header("Location: index_2.php");
        exit;
    }

}