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
<form action="handler.php" method="post">
    <h3>Вход на сайт</h3>

    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <p class="form-error"><?= $error ?></p>
        <?php endforeach ?>
        <?php unset ($_SESSION['errors']); ?>
    <?php endif ?>
    <label for="name">Имя</label>
    <input type="text" name="name" id="name"
           value="<?php if (isset($_SESSION['form']['name'])) echo $_SESSION['form']['name']; ?>">
    <label for="email">Email</label>
    <input type="text" name="email" id="email"
           value="<?php if (isset($_SESSION['form']['email'])) echo $_SESSION['form']['email'] ?>">
    <label for="telephone">Телефон</label>
    <input type="text" name="telephone" id="telephone"
           value="<?php if (isset($_SESSION['form']['telephone'])) echo $_SESSION['form']['telephone'] ?>">
    <input type="submit" value="Вход" name="enter">

</form>
</body>
</html>
