<?php
session_start();
$mang = [];
// ghi mang ss lưu lại
if(!isset($_SESSION['mang']))
$_SESSION['mang'] = $mang;
else    
$mang = $_SESSION['mang'];

function xem($mang)
{
    echo '<pre>';
    print_r($mang);
    echo '</pre>';
}

function them($ma, $ten, $dongia, $soluong, &$mang)
{
    $mang[$ma] = [
        'ten' => $ten,
        'don_gia' => $dongia,
        'so_luong' => $soluong,
        'thanh_tien' => $soluong * $dongia

    ];
}

function sua($ma, $soluong, $dongia, $ten, &$mang)
{
    $mang[$ma]['so_luong'] = $soluong;
    $mang[$ma]['don_gia'] = $dongia;
    $mang[$ma]['ten'] = $ten;
    $mang[$ma]['thanh_tien'] = $dongia * $soluong;
}

function xoa($ma, &$mang)
{
    unset($mang[$ma]);
}

// kiểm tra khi nào yêu cầu mới làm
if (isset($_POST['hanhdong'])) {
    switch ($_POST['hanhdong']) {
        case 'Thêm':
            them($_POST['ma'], $_POST['ten'], $_POST['don_gia'], $_POST['so_luong'], $mang);
            break;
        case 'Sửa':
            sua($_POST['ma'], $_POST['so_luong'], $_POST['don_gia'],$_POST['ten'], $mang);
            break;
        case 'Xóa':
            xoa($_POST['ma'], $mang);
            break;
    }
}
// ghi mang ss lưu lại
$_SESSION['mang'] = $mang;
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type=text/css>
        table.bang {
            width: 700px;
            border-collapse: collapse;
        }

        table.bang td {
            padding: 3px;
        }

        table.bang tr.header {
            background-color: #69f;
            color: #f00;
        }
    </style>

</head>

<body>

    <table class="bang" align="center" border="1" cellspacing="0" cellpadding="2">
        <thead>
            <tr class="header" align="center">
                <th>Mã</th>
                <th>Tên</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền(VNĐ)</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $tong = 0;

            foreach ($mang as $masp => $sanpham) {

                $tong += $sanpham['thanh_tien'];

                    //         Array
                    // (
                    //     [ten] => Canon Scanner Lide 100
                    //     [don_gia] => 234234
                    //     [so_luong] => 1
                    //     [thanh_tien] => 20000000
                    // )
            
                    ?>
                <tr align="center">
                    <td> <?= $masp ?></td>
                    <td align="left"><?= $sanpham['ten'] ?></td>
                    <td align="right"><?= number_format($sanpham['don_gia']) ?></td>
                    <td><?= number_format($sanpham['so_luong']) ?></td>
                    <td align="right"><?= number_format($sanpham['thanh_tien']) ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        <tr align="right">
            <td colspan="5">Tổng cộng: <?= number_format($tong) ?></td>
        </tr>
    </table>
    <div style="margin-top: 10px">
        <?= $tb??''; ?>
        <form action="" method="post">
            <table class="bang" align="center" border="1" cellspacing="0" cellingpadding="2">
                <tr>
                    <td>Mã SP</td>
                    <td>Tên SP</td>
                    <td>Đơn giá</td>
                    <td>Số lượng</td>
                </tr>
                <tr>
                    <td><input type="text" name="ma" /></td>
                    <td><input type="text" name="ten" /></td>
                    <td><input type="text" name="don_gia" /></td>
                    <td><input type="text" name="so_luong" />
                        <input type="hidden" name="mang_an" value="" />
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="4">
                        <input type="submit" name="hanhdong" value="Thêm" />
                        <input type="submit" name="hanhdong" value="Sửa" />
                        <input type="submit" name="hanhdong" value="Xóa" />
                    </td>
                </tr>
            </table>

        </form>
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