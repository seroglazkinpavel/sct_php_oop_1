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

    $res = mysqli_query($mysqli, "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 1");
    $row = mysqli_fetch_assoc($res);
    $id_user = $row['id_user'];
    $date_of_birth = $_SESSION['form']['date_of_birth'];
    $SNILS = $_SESSION['form']['SNILS'];
    $series = $_SESSION['form']['series'];
    $number = $_SESSION['form']['number'];
    $gender = $_SESSION['form']['gender'];
    $query_2 = "INSERT INTO `passport`
        (`birth`, `snils`, `series`, `number`, `gender`, `id_user`)
        VALUES (CURRENT_DATE(), '$SNILS', '$series', '$number', '$gender', '$id_user')";
    $result_2 = $mysqli->query($query_2);

    $countr = $_SESSION['form']['countr'];
    $region = $_SESSION['form']['region'];
    $city = $_SESSION['form']['city'];
    $street = $_SESSION['form']['street'];
    $house = $_SESSION['form']['house'];
    $body = $_SESSION['form']['body'];
    $flat = $_SESSION['form']['flat'];
    $query_3 = "INSERT INTO `address`
        (`country`, `region`, `city`, `street`, `house`, `body`, `flat`, `id_user`)
        VALUES ('$countr', '$region', '$city', '$street', '$house', '$body', '$flat', '$id_user')";
    $result_3 = $mysqli->query($query_3);

    if ($result_1 && $result_2 && $result_3) {
        $_SESSION['result'] = 'Запись в базу данных прошла успешно!';
    } else $_SESSION['error'] = 'Ошибка при записи в базу данных!';
    redirect();
}
$mysqli->close();
	