<?php
session_start();
// nhúng file vào vị trí cần thiết để sd lại : include (path)
include('lib/functions.php');
include('core/user.php');
// kiểm tra user đăng nhập chưa
if (!isset($_SESSION['status_login']) || !$_SESSION['status_login']) { //step 4
    header('location: login1.php');
    exit;
}

$list = getListUser();
?>



<!doctype html>
<html lang="en">

<head>
    <title>Danh sách người dùng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php include('widgets/nav.php'); ?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                Danh sách người dùng (<?= number_format(count($list)); ?>)
                <a href="adduser.php" class="btn btn-primary btn-sm float-right">Thêm mới</a>
            </div>
            <div class="card-body">
                <table class="table table-striped ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Hình đại diện</th>
                            <th>username</th>
                            <th>Họ và tên</th>
                            <th>Trạng thái</th>
                            <th>Trạng thái</th>
                            <th class="text-right">Tác vụ</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $item) {
                            ?>
                            <tr>
                                <td scope="row">
                                    <?php
                                    foreach (explode(';', $item['image']) as $img) {
                                        ?>
                                        <img src="<?= $img ?>" width="50" alt="">
                                    <?php }
                                    ?>
                                </td>
                                <td><?= $item['username'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td align="center"><img src="images/<?= $item['status'] ?>.png" width="20" alt=""></td>
                                <td><?= $item['status'] == 1 ? '<span class="badge badge-primary">Hoạt động</span>' : '<span class="badge badge-secondary">Khóa</span>' ?>
                                </td>
                                <td align="right">
                                    <a name="" id="" class="btn btn-primary btn-sm"
                                        href="edituser.php?id=<?= $item['username'] ?>" role="button">Sửa</a>
                                    <a name="" id="" class="btn btn-info btn-sm" href="viewuser.php" role="button">Xem</a>
                                    <a onclick="return confirm('Bạn có muốn xóa dòng này không?')" name="" id=""
                                        class="btn btn-danger btn-sm" href="deluser.php?id=<?= $item['username'] ?>"
                                        role="button">Xóa</a>
                                </td>
                            </tr>
                        <?php }
                        ?>

                    </tbody>
                </table>
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