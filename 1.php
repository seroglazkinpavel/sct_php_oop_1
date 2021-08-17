<?php

class  User implements ArrayAccess
{
    private $arr = [];

    public function offsetExists($offset)
    {
        return isset($this->arr[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->arr[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->arr[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->arr[$offset]);
    }

}

$user = new  User();
$user['Name'] = 'Pavel';
$user['Age'] = 56;
echo $user['Name'] . ' - ' . $user['Age'] . '<br />';
if (isset($user['Name'])) {
    echo ' Имя ' . $user['Name'] . ' существует.<br />';
}
unset($user['Name']);
echo isset($user['Name']);