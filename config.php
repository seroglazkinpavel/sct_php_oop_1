<?php
//session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'validation');

$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
$mysqli->set_charset('utf8');
	
/**
 * Редирект
 **/
function redirect()
{
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : index . php;
    header("Location: $redirect");
    exit;
}

if (!empty($_GET['page'])) {
    global $mysqli;
	$name = $_SESSION['form']['name'];
    $email = $_SESSION['form']['email'];
    $telephone = $_SESSION['form']['telephone'];
	$query = "INSERT INTO `user`
        (`name`, `email`, `telephone`)
        VALUES ('$name', '$email', '$telephone')";		
    $result_1 = $mysqli->query($query);
	if (!$result_1) {
		die('Неверный запрос: ' . mysql_error());
	}
	$id_user = $mysqli->insert_id;
	
	$countr = $_SESSION['form']['countr'];
    $region = $_SESSION['form']['region'];
    $city = $_SESSION['form']['city'];
    $street = $_SESSION['form']['street'];
    $house = $_SESSION['form']['house'];
    $body = $_SESSION['form']['body'];
    $flat = $_SESSION['form']['flat'];
	$query_3 = "INSERT INTO `address`
        (`country`, `region`, `city`, `street`, `house`, `body`, `flat`)
        VALUES ('$countr', '$region', '$city', '$street', '$house', '$body', '$flat')";
    $result_3 = $mysqli->query($query_3);
	if (!$result_3) {
		die('Неверный запрос: ' . mysql_error());
	}
	$address_reg_id = $mysqli->insert_id;

	$date_of_birth = $_SESSION['form']['date_of_birth'];
    $SNILS = $_SESSION['form']['SNILS'];
    $series = $_SESSION['form']['series'];
    $number = $_SESSION['form']['number'];
    $gender = $_SESSION['form']['gender'];	
	$query_2 = "INSERT INTO `passport`
        (`birth`, `snils`, `series`, `number`, `gender`, `id_user`, `address_reg_id`)
        VALUES (CURRENT_DATE(), '$SNILS', '$series', '$number', '$gender', '$id_user', '$address_reg_id')";
    $result_2 = $mysqli->query($query_2);
	if (!$result_2) {
		die('Неверный запрос: ' . mysql_error());
	}
	if($result_1 && $result_2 && $result_3){
		$_SESSION['result'] = 'Запись в базу данных прошла успешно!';
	}else $_SESSION['error'] = 'Ошибка при записи в базу данных!';
	redirect();   
}
$mysqli->close();
	