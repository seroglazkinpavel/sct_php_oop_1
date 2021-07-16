<?php
// Если мы в файле .htaccess в php_value error_reporting 0; установим 0, ошибки не будут  показываться
	error_reporting(0);
	$array = [1, 2, 3,];
	print_r($array)  

// Если мы в файле .htaccess в php_value error_reporting -1; установим -1, ошибки будут  показываться
	error_reporting(E_ALL);
	$array = [1, 2, 3,];
	print_r($array)  // Parse error: syntax error, unexpected end of file in C:\OpenServer\domains\oop\index.php on line 23

	// error_reporting — Задаёт, какие ошибки PHP попадут в отчёт
	// error_reporting(E_ERROR | E_WARNING | E_PARSE)-так можно указать несколько констант в функции error_reporting;