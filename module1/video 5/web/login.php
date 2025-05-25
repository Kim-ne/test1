<?php
session_start();
// xử lý đăng nhập cookie
// đọc dữ liệu từ tập tin lên để đăng nhập
function get_list_user($path = 'data/user.txt')
{
    $f = fopen($path, 'r');
    $list = [];
    while (!feof($f)) {
        $r = trim(fgets($f)); //admin|123456|Kim|1|
        // Tách chuỗi thành mảng user
        $ar = explode('|', $r);
        $username = trim($ar[1]);
        $list[$username] = [
            'image' => trim($ar[0]),
            'username' => $username,
            'password' => $ar[2],
            'name' => trim($ar[3]),
            'status' => trim($ar[4]),
            'key_cookie' => trim($ar[5])
        ];

    }
    // xoa tittle trong data
    unset($list['username']);
    return $list;
}

// echo '<pre>' ,print_r(get_list_user());
// exit;

if (isset($_COOKIE['src']) && $_COOKIE['src'] == 1) {
    // Đã login rồi đưa luồng về lại session
   
    $_SESSION['status_login'] = true;
    $_SESSION['username_login'] = $_COOKIE['src2'];
    
}
// Kiểm tra đã đăng nhập hay chưa
if (isset($_SESSION['status_login']) && $_SESSION['status_login']) {
    header('location: profile.php');
    exit();
}
// đăng nhập bình thường
if (isset($_POST['username'], $_POST['password'])) {

    // khai báo chi tiết

    // $tb='';
    // $msgi = '';
    // $msgp = '';

    // if($_POST['p'] == 'admin' &&  $_POST['i'] == 'admin') { //phải gán && không được gộp

    //     $tb = 'Đăng nhập thành công';
    //     $_SESSION['a'] = $_POST['i'] ??'';
    //     $_SESSION['b'] = $_POST['p'] ??'';


    // } else if($_POST['i'] !== 'admin'){
    //     $msgi = 'ID không hợp lệ';
    //     unset($_SESSION['a']);  
    // } else{
    //     $msgp = 'Pass không hợp lệ';
    // }

    // Phải báo chung chung để khó bị tấn công

    if ($_POST['username'] && $_POST['password']) {
        // đọc dữ liệu ra
        $list = get_list_user();
        
        // xử lý chính
        // đổi qua xử lý với dữ liệu
        // if ($_POST['i'] == 'admin' && $_POST['p'] == 'admin') {
        // if ($list && isset($list[$_POST['username']]) && $list[$_POST['username']]['password'] == $_POST['password']) { gộp code
        if ($list && isset($list[$_POST['username']])) {

            //có user nhưng chưa biết pass đúng không
            $user = $list[$_POST['username']];
            // kiểm tra pass đúng hay sai
            if ($user['password'] == $_POST['password']) {
                // đăng nhập đúng thông tin
                // Kiểm tra trạng thái user có đăng nhập đc không
                if ($user['status'] == 1) {


                    // Tiến hành khởi tạo các dữ liệu cần thiết để sử dụng cho các trang sau và cờ trạng thái đẫ đăng nhập
                    $_SESSION['status_login'] = true;
                    $_SESSION['user'] = $user;
                    // kiểm tra user có lưu login không 
                    if (isset($_POST['remember']) && $_POST['remember'] == 1) {

                        $time = time() + 300;
                        setcookie('src', 1, $time);
                        setcookie('src2', $_SESSION['username_login'],$time);
                    }

                    // Tiến hành chuyển hướng người dùng sang trang thông tin
                    header('location: profile.php');
                    exit;
                } else{  $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Tài khoản đang bị khóa bởi QTV</strong> 
                  </div>
                  
                  <script>
                    $(".alert").alert();
                  </script>';}
            }  else {
                $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Sai pass.</strong> 
            </div>
            
            <script>
              $(".alert").alert();
            </script>';
            }
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Thông tin đăng nhập không đúng</strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>';
        }

    } else {
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Thông tin đăng nhập không đúng</strong> 
        </div>
        
        <script>
          $(".alert").alert();
        </script>';
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
                    <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder=""
                        value="<?php echo $_POST['username'] ?? '' ?>">
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
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Sign in</button>
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