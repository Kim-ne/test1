<?php
session_start();
require('lib/functions.php');
include('core/user.php');
// kiểm tra user đăng nhập chưa
if(!isset($_SESSION['status_login']) || !$_SESSION['status_login']){ //step 4
    header('location: login1.php');
    exit;
}

$user = $_SESSION['user'];
    if (isset($_POST['username'], $_POST['password'], $_POST['name'])) {
        // đọc dữ liệu ra
        $er = '';
        
        // kiểm tra username có thì tạo không thì thôi
        // upload user nếu có
        if($_FILES['image']['error'] === 0)
        $image = myUpLoad($_FILES['image']??'','images/user',$er); // thêm ??'' để khi không thêm thì ko bị lỗi
        if(!isset($image) || !$image)
        $image = $user['image'];
        if($_POST['password'])
        $password = $_POST['password'];
        else
        $password = $user['password'];
        if (editUser($_POST['username'], $_POST['password'], $_POST['name'], $image, $list,$_POST['status'],$_POST['key_cookie'],$rf)) {
            $_SESSION['user']['name'] = $rf[$_POST['name']];
            $user = $_SESSION['user']['name'];

            $msg = alert('Cập nhật thành công'.$er);
        } else {
            $msg = alert('Cập nhật bại'.$er, 'danger');
            var_dump($_POST);
        }
    }   
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Thông tin user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php include('widgets/form-gr.php');?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>