<?php
session_start();
// nhúng file vào vị trí cần thiết để sd lại : include (path)
include('lib/functions.php');
include('core/user.php');
//xử lý với tập tin


// kiểm tra user đăng nhập chưa
if (!isLogin()) { //step 1 bắt buộc phải kiểm tra đăng nhập 
    reDirect(' login1.php');
    exit;
}

// Kiểm tra dữ liệu trc khi làm, thao tác này giúp cho việc ngăn chặn việc nhập tay từ url
if (!isset($_GET['id']) || !$_GET['id']) {
    reDirect('listuser.php');
}
// Tìm user muốn sửa
$list = getListUser();
$user = $list[$_GET['id']] ?? null; // lấy ra user muốn xóa

if(!$user){
    reDirect('listuser.php');
}
// đăng ký bình thường
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
        $user = $rf[$user['username']];
        $msg = alert('Cập nhật thành công'.$er);
    } else {
        $msg = alert('Cập nhật bại'.$er, 'danger');
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Cập nhật người dùng - <?=$user['username'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <div class="container mt-3">
            <?= $msg ?? '' ?>
            <div class="col-xl-4">
                <h4 class="text-center my-4 text-uppercase">Update User</h4>
                <div class="form-group">
                    <label for="">User:</label>
                    <input type="text" class="form-control" readonly name="username" id="" aria-describedby="helpId"
                        placeholder="" value="<?=$user['username']?>">
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="text" class="form-control" name="password" id="" placeholder=""
                        value="">
                </div>
                <div class="form-group">
                    <label for="">image</label>
                    <input type="file" class="form-control" name="image" id="" placeholder="" value="" multiple>
                    <img src="<?=$user['image']?>" width="70" alt="">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="" placeholder=""
                        value="<?=$user['name']?>">
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" <?=$user['status']==0?'checked':''?> name="status" id="" value="0">Khóa
                    </label>
                    <label class="form-check-label ml-3">
                        <input class="form-check-input" type="checkbox" <?=$user['status']==1?'checked':''?> name="status" id="" value="1">Kích hoạt
                    </label>
                </div>
                <div class="form-group">
                    <label for="">Mã cookie</label>
                    <input type="text" class="form-control" name="key_cookie" id="" placeholder=""
                        value="<?=$user['key_cookie']?>">
                </div>
                <div class="row">
                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="login1.php" class="btn btn-secondary">Skip</a>
                    </div>
                </div>



            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</body>

</html>