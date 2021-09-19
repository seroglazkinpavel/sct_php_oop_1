<?php
session_start();
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
