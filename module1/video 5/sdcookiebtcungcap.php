<?php
$mang = array(
    'sp001' => array('ten' => 'Canon MTL-24323', 'don_gia' => 10000000, 'so_luong' => 1, 'thanh_tien' => 10000000),
    'sp002' => array('ten' => 'SamSung ML-1640', 'don_gia' => 15000000, 'so_luong' => 2, 'thanh_tien' => 30000000),
    'sp003' => array('ten' => 'HP ATE Lide 100', 'don_gia' => 17000000, 'so_luong' => 1, 'thanh_tien' => 17000000),
    'sp004' => array('ten' => 'Canon Scanner A', 'don_gia' => 20000000, 'so_luong' => 1, 'thanh_tien' => 20000000),
    'sp014' => array('ten' => 'Canon Scanner Lide 100', 'don_gia' => 234234, 'so_luong' => 1, 'thanh_tien' => 20000000),
    'sp015' => array('ten' => 'Iphone', 'don_gia' => 1000000, 'so_luong' => 1000, 'thanh_tien' => 1000000000),
);
// echo '<pre>', print_r($_POST), '</pre>';

/*
sp001|Canon MTL-24323|10000000|1|10000000||sp002|Canon MTL-24323|10000000|1|10000000
nếu dùng cookie thì thêm bước chuyển mảng thành chuỗi tương tự như trên để lưu về cookie,
sau đó đọc lại cookie để tách chuỗi trên thành mảng y chang như trên để xử lý hiện tại vẫn chạy được
*/
$s = 'sp001|Canon MTL-24323|10000000|1|10000000||sp002|Canon MTL-24323|10000000|1|10000000';
// kiểm tra cookie có tồn tại và nó không rỗng
// if (isset($_COOKIE['mh']) && !empty($_COOKIE['mh'])) {
//     $tmp = tachchuoithanhmang($_COOKIE['mh']);
//     if (is_array($tmp) && count($tmp) > 0) {
//         $mang = $tmp;
//     }

function gopmangthanhchuoi($mang){
    $str = '';
    foreach($mang as $k => $v){ 
        $str .= $k . '|'.implode('|',$v) .'||'; 
    }
    return rtrim($str,'||');
}
// var_dump(gopmangthanhchuoi($mang));

// setcookie('mh',gopmangthanhchuoi($mang),time()+300); phải bỏ cuối để cập nhật

function tachchuoithanhmang($s){
$mang = []; 
    $ar = explode('||', $s);
    foreach($ar as $v){
        $a = explode('|', $v);
        $mang[$a[0]] = array('ten' => $a[1], 'don_gia' => $a[2], 'so_luong' => $a[3], 'thanh_tien' => $a[4]) ;
    }
    return $mang;
}
// var_dump(tachchuoithanhmang($s));
// echo $_COOKIE['mh'];

if(isset($_COOKIE['kho'])) {
   
    $mang = tachchuoithanhmang($_COOKIE['kho']);
}
// xử lý kho chung ban đầu hoặc kho sử dụng sau khi có kho
// if(!isset($_SESSION['kho'])){
//     $_SESSION['kho'] = $mang;
// }else {
//     $mang = $_SESSION['kho'];
// }
if (isset($_POST['hanhdong'])) {
    switch ($_POST['hanhdong']) {
        case 'Thêm':
            if(!isset($mang[$_POST['hanhdong']])){

                $mang[$_POST['ma']] = array('ten' => $_POST['ten'], 'don_gia' => $_POST['don_gia'],
                 'so_luong' => $_POST['so_luong'], 'thanh_tien' => $_POST['so_luong'] * $_POST['don_gia']);
                
                 $tb = 'Sản phẩm đã thêm';

            } else{
                $tb = 'Sản phẩm đã tồn tại';
            }
            break;
        case 'Sửa':

            if(isset($mang[$_POST['ma']])){
                $mang[$_POST['ma']]['so_luong'] = $_POST['so_luong'];
                $mang[$_POST['ma']]['thanh_tien'] = $_POST['so_luong'] * $mang[$_POST['ma']]['don_gia'];
                $tb = 'Sản phẩm đã sửa';
            } else {
                $tb = 'Sản phẩm không tồn tại';
            }
            break;
        case 'Xóa':
            if(isset($mang[$_POST['ma']])) {  
                unset($mang[$_POST['ma']]);
                $tb = 'Sản phẩm đã xóa';

            } else {
                $tb = 'Sản phẩm không tồn tại';
            }
            break;
    }
}
// cập nhật kho sau khi tất cả mọi hành động đã hoàn tất
// $_SESSION['kho'] = $mang;
$value = gopmangthanhchuoi($mang);
setcookie('kho',$value,time() + 300);
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

    <table class="bang" align="center" border="1" cellspacing="0" cellingpadding="2">
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

                $tong += $sanpham['thanh_tien']

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