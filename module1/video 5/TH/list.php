<?php
$mang = [];
?>
<!doctype html>
<html lang="en">

<head>
    <title>List of product</title>
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
                <th>Trạng thái</th>
                <th>Tác vụ</th>
            </tr>
            <div class="mt-5">
            <a class="btn btn-primary" href="add.php" role="button">Thêm</a>
            </div>
        </thead>
        <tbody>
            <?php

            foreach ($mang as $masp => $sanpham) {


                ?>
                <tr align="center">
                    <td> <?= $masp ?></td>
                    <td align="left"><?= $sanpham['ten'] ?></td>
                    <td align="right"><?= number_format($sanpham['don_gia']) ?></td>
                    <td><?= number_format($sanpham['so_luong']) ?></td>
                    <td align="right"><?= $sanpham['trang_thai'] ?></td>
                    <td> <?= $sanpham['tac_vu'] ?></td>
                    
                </tr>
                
                <?php
            }
            ?>
        </tbody>

    </table>
    

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