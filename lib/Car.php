<?php

namespace lib;
use lib\CanMove;
//require_once 'CanMove.php';

/*function autoloder($class)
{
	$file = __DIR__ ."/lib/{$class}.php";
	if(file_exists($file)){
		require_once $file;
	}
}
spl_autoload_register('autoloder');*/

class Car
{
	use CanMove;
}