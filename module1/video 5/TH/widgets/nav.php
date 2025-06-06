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
                    <a class="dropdown-item" href="add.php">Thêm sản phẩm</a>
                    <a class="dropdown-item" href="listitem.php">Danh sách sản phẩm</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Quản lý user</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="add.php">Thêm user</a>
                    <a class="dropdown-item" href="listuser.php">Danh sách user</a>
                </div>
            </li>
        </ul>
      <nav class="navbar navbar-expand navbar-light bg-light form-inline">
          <ul class="nav navbar-nav">
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chào: <img width="20" src="<?=$_SESSION['user']['image']?>"/><?=$_SESSION['user']['name']?></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="profile.php">Thông tin cá nhân</a>
                    <a class="dropdown-item" href="changepass.php">Đổi mật khẩu</a>
                    <a class="dropdown-item" href="logout_1.php">Đăng xuất</a>
                </div>
            </li>
          </ul>
      </nav>
    </div>
</nav>
</div>