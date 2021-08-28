<?php

use lib\ValidateName;
use lib\ValidateEmail;
use lib\ValidateTelephone;
use lib\ValidateBirth;
use lib\ValidateSnils;

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
spl_autoload_extensions('.php');
spl_autoload_register();


// если форма заполнена
if (!empty($_POST)) {

    // создаем классы-валидаторы форм
    $validator = new ValidateName($_POST);
    $validator1 = new ValidateEmail($_POST);
    $validator2 = new ValidateTelephone($_POST);
    $validator3 = new ValidateBirth($_POST);
    $validator4 = new ValidateSnils($_POST);

    // проверяем на ошибки
    $err = $validator->validate();
    $err1 = $validator1->validate();
    $err2 = $validator2->validate();
    $err3 = $validator3->validate();
    $err4 = $validator4->validate();

    // объединяем массив в строку для передачи обратно на форму логина
    $errors1 = join(',', $err);
    $errors2 = join(',', $err1);
    $errors3 = join(',', $err2);
    $errors4 = join(',', $err3);
    $errors5 = join(',', $err4);

    // из строк создаем массив используя разделитель
    $errors = explode(',', "$errors1,$errors2,$errors3,$errors4,$errors5");
    //echo'<pre>'.print_r($errors,true).'</pre><br>';
    //die;
    if (empty($errors))

        header("Location: /");
}

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
		<form action="" method="post">
			<h3>Вход на сайт</h3>
			<?php if (isset($errors)): ?>
				<?php foreach ($errors as $error): ?>
					<p class="form-error"><?= $error ?></p>
				<?php endforeach ?>
			<?php else : ?>
				<p class="form">Bы успешно зарегестрировались!</p>
			<?php endif ?>
			<label for="name">Имя</label>
			<input type="text" name="name" id="name">
			<label for="email">Email</label>
			<input type="text" name="email" id="email">
			<label for="telephone">Телефон</label>
			<input type="text" name="telephone" id="telephone">
			<label for="date_of_birth">Дата рождения ( Формат DD.MM.YYYY )</label>
			<input type="text" name="date_of_birth" id="date_of_birth">
			<label for="SNILS">СНИЛС</label>
			<input type="text" name="SNILS" id="SNILS">
			<input type="submit" value="Вход" name="enter">
		</form>
	</body>
</html>