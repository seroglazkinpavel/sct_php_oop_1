<?php
try {
    $x = 5 % 0;
    //intdiv(5, 0);
    //$str = 'Hello';
    //$str[] = 2;
    //intdiv(PHP_INT_MIN, -1);
    //eval("5 + '");
    //AssertionError assert()
} catch (Error $e) {
    echo $e->getMessage() . '<br>';
    echo $e->getCode() . '<br>';
    echo $e->getFile() . '<br>';
    echo $e->getLine();
}

/*
Error - базовый класс для всех внутренних ошибок PHP.
Error
Добавлено в PHP7 для обработки фатальных ошибок. То есть многие из ошибок, которые раньше приводили к Fatal Error,
в PHP7 могут обрабатываться в блоках try/catch. Эти ошибки вызываются самим PHP, нет нужды их вызывать, как Exception.
Класс Error имеет три подкласса:

AssertionError
Вызывается, когда условие, заданное методом assert(), не выполняется.

ParseError
Для ошибок парсинга, когда подключаемый по include/require код вызывает ошибку синтаксиса, ошибок функции eval() и т.п.

try {
   require 'file-with-syntax-error.php';
} catch (ParseError $e) {
   // обработка ошибки
}
TypeError
Используется для ошибок несоответствия типов данных. В PHP7 введена опциональная строгая типизация. Вот для поддержки
ошибок, связанных с ней, и служит этот класс. Например, если функция ожидает на входе аргумент типа int, а вы ее
вызываете со строковым аргументом.

if (!is_string($name)) throw new TypeError('Имя должно быть стройкой!');*/