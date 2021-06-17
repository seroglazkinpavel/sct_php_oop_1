<?php

session_start();

class Point
{
    public $x;
    public $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function __sleep()
    {
        return ['x', 'y'];
    }

    public function __wakeup()
    {
        $this->x;
        $this->y;
    }
}

$ser = '';
if (isset($_POST['myform'])) {
    $x = $_POST['x'] ?? false;
    $y = $_POST['y'] ?? false;
    if ($x !== false && $y !== false && is_numeric($x) && is_numeric($y)) {
        $point = new Point($x, $y);
        $str = serialize($point);
        $_SESSION['point'] = $str;
        $ser = 'Объект сохранен.';
    } else $ser = 'Введите числа.';
} elseif (!empty($_POST['download']) && !empty($_SESSION['point'])) {
    $unser = unserialize($_SESSION['point']);
    $ser = 'Поля заполнены: где x = ' . $unser->x . ' и y = ' . $unser->y;
    unset($_SESSION['point']);
}
//else $ser = 'Объект не сохранен.';

?>
<?php if ($ser !== '') : ?>
    <p><?= $ser ?></p>
<?php endif ?>
<form name="myform" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" style="margin:20px;">
    <div>
        <label for="number">X:</label>
        <input id="number" type="text" name="x" value="<?= $x ?>" style="margin-bottom:5px;">
    </div>
    <div>
        <label for="figure">Y:</label>
        <input id="figure" type="text" name="y" value="<?= $y ?>">
    </div>
    <div>
        <input type="submit" name="myform" value="Сохранить" style="margin:5px 20px;">
    </div>
    <div>
        <input type="submit" name="download" value="Загрузить" style="margin-left:20px;">
    </div>
</form>
