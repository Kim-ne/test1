<?php
function getListUser($path = 'data/user.txt')
{ //phải có để biết user tồn tại hay chưa step 2
    $f = fopen($path, 'r');
    $list = [];
    while (!feof($f)) {
        $r = trim(fgets($f));
        $ar = explode('|', $r);
        $username = trim($ar[1]);
        $list[$username] = [
            'image' => trim($ar[0]),
            'username' => $username,
            'password' => $ar[2],
            'name' => trim($ar[3]),
            'status' => trim($ar[4]),
            'key_cookie' => trim($ar[5]),
        ];
    }
    unset($list['username']);
    return $list;

}

function saveData($data, $path = 'data/user.txt')
{
    $f = fopen($path, 'w');
    $string = 'image|username|password|name|status|key_cookie' . PHP_EOL; // dấu enter đc định nghĩa sẵn trong PHP, string này phải có để save lại
    foreach ($data as $item) {
        $string .= implode("|", $item) . PHP_EOL;
    }
    $string = rtrim($string);
    fwrite($f, $string); // ghi
    return true;
}

function addUser($username, $password, $name, $image, &$list, $status = 1, $key_cookie = '')
{ // adduser phải thêm đủ thông tin vừa cần list và cần T/F nên phải tham chiếu
    if (!isset($list[$username])) {
        // tiến hành ghi mới
        $list[$username] = [
            'image' => trim($image),
            'username' => $username,
            'password' => $password,
            'name' => trim($name),
            'status' => trim($status),
            'key_cookie' => trim($key_cookie),
        ];
        saveData($list);
        return true;
    }
    return false;
}

function editUser($username, $password, $name, $image, &$list, $status = 1, $key_cookie = '',&$rf = null)
{ // adduser phải thêm đủ thông tin vừa cần list và cần T/F nên phải tham chiếu
    if (isset($list[$username])) {
        // tiến hành up mới
        $list[$username] = [
            'image' => trim($image),
            'username' => $username,
            'password' => $password,
            'name' => trim($name),
            'status' => trim($status),
            'key_cookie' => trim($key_cookie),
        ];
        saveData($list);
        $rf = $list;
        return true;
    }
    return false;
}
?>