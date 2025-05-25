<?php
session_start();
// nhúng file vào vị trí cần thiết để sd lại : include (path)
include('lib/functions.php');
include('core/user.php');
// kiểm tra user đăng nhập chưa trc khi ktra dữ liệu đầu vào
if (!isLogin()) { //step 1 bắt buộc phải kiểm tra đăng nhập 
    reDirect(' login1.php');
    exit;
}
// Kiểm tra dữ liệu trc khi làm, thao tác này giúp cho việc ngăn chặn việc nhập tay từ url
if (!isset($_GET['id']) || !$_GET['id']) {
    reDirect('listuser.php');
}
// Tìm user muốn xóa
$list = getListUser();
$user = $list[$_GET['id']] ?? null; // lấy ra user muốn xóa

if($user){
    unset($list[$_GET['id']]);
    savedata($list);
}
reDirect('listuser.php')









?>
