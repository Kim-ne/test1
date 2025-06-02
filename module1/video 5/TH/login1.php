<?php
session_start();
include('lib/functions.php'); // nhúng cơ bản
require('core/user.php'); // require(); nhúng ko có thì bắt buộc dừng (quan trọng)
// xử lý với tập tin
// đọc dữ liệu từ tập tin để kiểm tra đăng nhập step 6


// var_dump(getListUser());
// exit;
// ưu tiên xử lý đăng nhập cookie trc
if (isset($_COOKIE['src']) && $_COOKIE['src'] == 1) { //step 6 
    // đăng nhập login rồi đưa về lại session để hệ thống chạy lại như cũ
    $_SESSION['status_login'] = true;
    $_SESSION['username_login'] = $_COOKIE['src2']; // Không đưa về Post như step 3 vì ko cần bắt ng dùng phải nhập lại, đưa về src 2 vì chưa có nơi để lưu trữ
}
// kiểm tra user đăng nhập chưa
if (isLogin()) { //step 4
    reDirect('profile1.php');
}

// đăng nhập bình thường
if (isset($_POST['username'], $_POST['password'])) { //step 1
    if ($_POST['username'] && $_POST['password']) {   //step 2

        // đọc dữ liệu ra step 7
        $list = getListUser();

        // xử lý chính
        // đổi qua xử lý với file
        // if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){ //step 3
        // Tìm xem user có trong danh sách không
        if ($list && isset($list[$_POST['username']])) { // step 8
            // có user rồi nhưng chưa biết pass đúng không // step 9
            $user = $list[$_POST['username']];

            // kiểm tra pass đúng hay sai 
            if ($user['password'] == $_POST['password']) {
                // đăng nhập đúng thông tin
                // kiểm tra trạng thái user có đc đăng nhập không
                if ($user['status'] == 1) {
                    // tiến hành khởi tạo các dữ liệu cần thiết để sử dụng cho các trang sau và cờ trạng thái đăng nhập
                    $_SESSION['status_login'] = true; // step 3
                    $_SESSION['user'] = $user;
                    // Kiểm tra ng dùng có lưu login ko (đặt ở đây là vid thông tin đã đúng rồi mới tiến hành lưu)
                    if (isset($_POST['remember']) && $_POST['remember'] == 1) { // step 5 remember me vơi value = 1 đã set phần html
                        $time = time() + 300;
                        setcookie('src', 1, $time); // src = status login có value là 1 không nên lưu chi tiết vì dễ bị hack
                        setcookie('src2', $_SESSION['username_login'], $time);
                    }
                    // tiến hành chuyển hướng người dùng đến trang thông tin
                    reDirect('profile1.php');
                } else {
                    $msg = alert('Tài khoản đã bị khóa bởi QTV','danger');
                }
            } else {
                $msg = alert('Thông tin đăng nhập không đúng','danger');

            }
        } else {
            $msg = alert('Thông tin đăng nhập không đúng','danger');
        }
    } else {
        $msg = alert('Thông tin đăng nhập không đúng','danger');
    }

}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Sign in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form method="post">
        <div class="container mt-3">
            <?= $msg ?? '' ?>
            <div class="col-xl-4">
                <h4 class="text-center my-4 text-uppercase">Sign in</h4>
                <div class="form-group">
                    <label for="">User:</label>
                    <input type="text" class="form-control" name="username" id="" aria-describedby="helpId"
                        placeholder="" value="<?php echo $_POST['username'] ?? '' ?>">
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="text" class="form-control" name="password" id="" placeholder=""
                        value="<?php echo $_POST['password'] ?? '' ?>">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remember" id="" value="1" checked>
                        Nhớ đăng nhập
                    </label>
                </div>
                <div class="row">
                    <div class="text-right mx-5 mt-3">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                    <div class="mx-5 mt-3">
                        <a class="btn btn-primary" href="signup.php" role="button">Sign up</a>
                    </div>
                </div>



            </div>
        </div>
    </form>

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