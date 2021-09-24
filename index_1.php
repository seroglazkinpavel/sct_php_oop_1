<?php
session_start();
const CODE_FEMALE = 'Женский';
const CODE_MALE = 'Мужской';
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
<form action="processing.php" method="post">
    <h3>Вход на сайт</h3>
    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <p class="form-error"><?= $error ?></p>
        <?php endforeach ?>
        <?php unset ($_SESSION['errors']); ?>
    <?php endif ?>
    <label for="date_of_birth">Дата рождения ( Формат DD.MM.YYYY )</label>
    <input type="text" name="date_of_birth" id="date_of_birth"
           value="<?php if (isset($_SESSION['form']['date_of_birth'])) echo $_SESSION['form']['date_of_birth'] ?>">
    <label for="SNILS">СНИЛС</label>
    <input type="text" name="SNILS" id="SNILS"
           value="<?php if (isset($_SESSION['form']['SNILS'])) echo $_SESSION['form']['SNILS'] ?>">
    <label for="series">Серия паспорта</label>
    <input type="text" name="series" id="series"
           value="<?php if (isset($_SESSION['form']['series'])) echo $_SESSION['form']['series'] ?>">
    <label for="number">Номер паспорта</label>
    <input type="text" name="number" id="number"
           value="<?php if (isset($_SESSION['form']['number'])) echo $_SESSION['form']['number'] ?>">
    <label for="number">Пол</label>
    <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == self::CODE_FEMALE) echo "checked"; ?>
           value="Женский">Женский
    <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == self::CODE_MALE) echo "checked"; ?>
           value="Мужской">Мужской
    <input type="submit" value="Вход" name="enter">    
    <button class="back"><a href="/">Назад</a></button>
</form>
</body>
</html>
