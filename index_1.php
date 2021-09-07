<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход на сайт</title>
    <style>
        body {
            background: #f0f0f0;
        }

        form {
            margin: 100px auto;
            text-align: center;
            border: 1px solid #dee;
            padding: 10px;
            width: 300px;
            background: #fff;
        }

        label, input[type="submit"] {
            display: block;
            margin: 5px;
        }

        input[type="submit"] {
            margin: 10px auto;
        }

        .form-error {
            padding: 5px;
            color: red;
        }
    </style>
</head>
<body>
<form action="processing.php" method="post">
    <h3>Вход на сайт</h3>
    <?php if (isset($_SESSION['empty'])): ?>
        <p style="color:red;"><b>Заполните пропущенные поля!</b></p>
        <?php unset ($_SESSION['empty']); ?>
    <?php endif ?>

    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <p class="form-error"><?= $error ?></p>
        <?php endforeach ?>
        <?php unset ($_SESSION['errors']); ?>
    <?php endif ?>
    <label for="date_of_birth">Дата рождения ( Формат DD.MM.YYYY )</label>
    <input type="text" name="date_of_birth" id="date_of_birth"
           value="<?php if (isset($_SESSION['form']['date_of_birth'])) $_SESSION['form']['date_of_birth'] ?>">
    <label for="SNILS">СНИЛС</label>
    <input type="text" name="SNILS" id="SNILS"
           value="<?php if (isset($_SESSION['form']['SNILS'])) $_SESSION['form']['SNILS'] ?>">
    <label for="series">Серия паспорта</label>
    <input type="text" name="series" id="series"
           value="<?php if (isset($_SESSION['form']['series'])) $_SESSION['form']['series'] ?>">
    <label for="number">Номер паспорта</label>
    <input type="text" name="number" id="number"
           value="<?php if (isset($_SESSION['form']['number'])) $_SESSION['form']['number'] ?>">
    <label for="number">Пол</label>
    <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == "Женски") echo "checked"; ?>
           value="Женски">Женски
    <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == "Мужской") echo "checked"; ?>
           value="Мужской">Мужской
    <input type="submit" value="Вход" name="enter">
</form>
</body>
</html>
