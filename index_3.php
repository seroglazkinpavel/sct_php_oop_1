<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Вход на сайт</title>
    <style>
        body {
            background: #f0f0f0;
        }

        div {
            margin: 40px auto;
            width: 600px;
        }

        table {
            width: 600px;
            border: 1px solid grey;
            background: #fff;
        }

        td {
            padding-left: 10px;
            border: 1px solid grey;
        }

        a {
            font: 18px Open Sans;
            /*font-weight: Regular;*/

            display: block;
            margin-top: 20px;
            text-decoration: none;

        }
    </style>
</head>
<body>
<div>
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
            <td><?= $_SESSION['form']['number'] ?></td>
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
            <td>house</td>
            <td><?= $_SESSION['form']['house'] ?></td>
        </tr>
        <tr>
            <td>body</td>
            <td><?= $_SESSION['form']['body'] ?></td>
        </tr>
        <tr>
            <td>flat</td>
            <td><?= $_SESSION['form']['flat'] ?></td>
        </tr>
        <? unset ($_SESSION['form']); ?>
    </table>
    <a href="index.php">Ссылка на шаг 1</a>
</div>

</body>
</html>