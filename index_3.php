<?php
session_start();
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Вход на сайт</title>
</head>
<body>
<div>
    <?php if (isset($_SESSION['result'])) : ?>		
	<p class="result"><strong><i><?=($_SESSION['result']);?></i></strong></p>
    <?php unset($_SESSION['result']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])) : ?>
	<p class="result1"><strong><i><?=($_SESSION['error']);?></i></strong></p>
	<?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    <table>
        <tr>
            <th>Наименование поля</th>
            <th>Значение</th>
        </tr>
        <tr>
            <td>Имя</td>
            <td><?= $_SESSION['form']['name'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $_SESSION['form']['email'] ?></td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td><?= $_SESSION['form']['telephone'] ?></td>
        </tr>
        <tr>
            <td>Дата рождения</td>
            <td><?= $_SESSION['form']['date_of_birth'] ?></td>
        </tr>
        <tr>
            <td>СНИЛС</td>
            <td><?= $_SESSION['form']['SNILS'] ?></td>
        </tr>
        <tr>
            <td>Серия паспорта</td>
            <td><?= $_SESSION['form']['series'] ?></td>
        </tr>
        <tr>
            <td>Номер паспорта</td>
            <td><?= $_SESSION['form']['number'] ?></td>
        </tr>
        <tr>
            <td>Пол</td>
            <td><?= $_SESSION['form']['gender'] ?></td>
        </tr>
        <tr>
            <td>Cтрана</td>
            <td><?= $_SESSION['form']['countr'] ?></td>
        </tr>
        <tr>
            <td>Регион</td>
            <td><?= $_SESSION['form']['region'] ?></td>
        </tr>
        <tr>
            <td>Город</td>
            <td><?= $_SESSION['form']['city'] ?></td>
        </tr>
        <tr>
            <td>Улица</td>
            <td><?= $_SESSION['form']['street'] ?></td>
        </tr>
        <tr>
            <td>Дом</td>
            <td><?= $_SESSION['form']['house'] ?></td>
        </tr>
        <tr>
            <td>Корпус</td>
            <td><?= $_SESSION['form']['body'] ?></td>
        </tr>
        <tr>
            <td>Квартира</td>
            <td><?= $_SESSION['form']['flat'] ?></td>
        </tr>		
    </table>	
    <button class="back"><a href="index_2.php">Назад</a></button>
    <a href="index_3.php/?page=send">Отправить в бд</a>	
    <a href="index.php">Ссылка на шаг 1</a>	
</div>
</body>
</html>
