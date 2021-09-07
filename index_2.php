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
<form action="step3.php" method="post">
    <h3>Вход на сайт</h3>
    <?php if (isset($_SESSION['skipped'])): ?>
        <p style="color:red;"><b>Заполните пропущенные поля!</b></p>
        <?php unset ($_SESSION['skipped']); ?>
    <?php endif ?>

    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <p class="form-error"><?= $error ?></p>
        <?php endforeach ?>
        <?php unset ($_SESSION['errors']); ?>
    <?php endif ?>
    <label for="countr">Cтрана</label>
    <input type="text" name="countr" id="countr"
           value="<?php if (isset($_SESSION['form']['countr'])) echo $_SESSION['form']['countr']; ?>">
    <label for="region">Регион</label>
    <input type="text" name="region" id="region"
           value="<?php if (isset($_SESSION['form']['region'])) echo $_SESSION['form']['region'] ?>">
    <label for="city">Город</label>
    <input type="text" name="city" id="city"
           value="<?php if (isset($_SESSION['form']['city'])) echo $_SESSION['form']['city'] ?>">
    <label for="street">Улица</label>
    <input type="text" name="street" id="street"
           value="<?php if (isset($_SESSION['form']['street'])) echo $_SESSION['form']['street']; ?>">
    <label for="house">Дом</label>
    <input type="text" name="house" id="house"
           value="<?php if (isset($_SESSION['form']['house'])) echo $_SESSION['form']['house'] ?>">
    <label for="body">Корпус</label>
    <input type="text" name="body" id="body"
           value="<?php if (isset($_SESSION['form']['body'])) echo $_SESSION['form']['body'] ?>">
    <label for="flat">Квартира</label>
    <input type="text" name="flat" id="flat"
           value="<?php if (isset($_SESSION['form']['flat'])) echo $_SESSION['form']['flat'] ?>">
    <input type="submit" value="Вход" name="entrance">

</form>
</body>
</html>
