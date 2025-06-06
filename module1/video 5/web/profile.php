<?php
session_start();
// Kiểm tra đã đăng nhập hay chưa
if(!isset($_SESSION['status_login']) || !$_SESSION['status_login']){
header('location: login.php');
exit(); 
}

// if ($_SESSION['a'] == true && $_SESSION['b'] == true) {
//     echo 'Chào mừng bạn ' . $_SESSION['a'];
// } ?>

<!-- <form action="">
    <button type="submit" class="btn btn-danger"> Thoát </button>
</form> -->

<!doctype html>
<html lang="en">

<head>
    <title>Thông tin cá nhân</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<div class="container">

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">admin</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quản lý sản phẩm</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Thêm sản phẩm</a>
                    
                </div>
            </li>
        </ul>
      <nav class="navbar navbar-expand navbar-light bg-light form-inline">
          <ul class="nav navbar-nav">
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chào: <img width="20" src="<?=$_SESSION['user']['image']?>"> <?= $_SESSION['user']['name']?> </a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="changepass.php">Đổi mật khẩu</a>
                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                </div>
            </li>
          </ul>
      </nav>
    </div>
</nav>
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