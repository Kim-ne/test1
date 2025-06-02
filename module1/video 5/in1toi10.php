<?php

// Xuất 1 - 10 ra màn hình

// for($i = 1; $i <= 10; $i++){
// echo $i;}

// $i=1 => False => 0
// $i = 1;
// while ($i <= 10) { // => True

//     echo $i;
//     $i++;
// }

// $i = 1;

// do{
//     echo $i ;
//     $i ++ ;
// } while ( $i <= 10);

// foreach([1,2,3,4,5,6,7,8,9,10] as $i){
//     echo $i ;
// }

// BT1

if(isset($_GET['tu'], $_GET['den'])){
    $flag = true;
    $msgt = '';
    $msgd = ''; 
   

    if (!is_numeric($_GET['tu'])){
        $msgt = 'Từ không hợp lệ';
        $flag = false;
    }

    if (!is_numeric($_GET['den'])){
        $msgd = 'Đến không hợp lệ';
        $flag = false;
    }

    if ($_GET['tu'] > $_GET['den']){
        $msgt = 'Từ nhỏ hơn đến';
        $flag = false;
    }

    if ($flag) {
        $tong = $chan = $le = 0;
        for ( $i = $_GET['tu']; $i <= $_GET['den']; $i ++)
        {
            if($i % 2 == 0){

                $chan += $i;

            } else {

                $le += $i;

            }

            $tong += $i;
        }
    }

}

?>


<html>
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
</head>

<body>
    <form class="container">
    <h4 class="text-center">TÍNH TỔNG DÃY SỐ</h4>
        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label for="">Từ</label>
                    <input type="text" class="form-control <?php echo ($msgt ?? '') ?>" name="tu" id="" aria-describedby="helpId" placeholder=""
                        style="width: 90%" value=" <?php echo $_GET['tu'] ?? '' ?>" >
                <small class="text-danger"><?php echo $msgt ?? '' ?></small>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="form-group">
                    <label for="">Đến</label>
                    <input type="text" class="form-control  <?php echo ($msgd ?? '') ?>" name="den" id="" aria-describedby="helpId" placeholder=""
                        style="width: 90%" value="<?php echo $_GET['den'] ?? '' ?>">
                    <small class="text-danger"><?php echo $msgd ?? '' ?></small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tinh</button>
        <div class="form-group mt-5">
            <label for="">chẵn</label>
            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder=""
                style="width: 10%" readonly value="<?php echo $chan ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="">lẻ</label>
            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder=""
                style="width: 10%" readonly value="<?php echo $le ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="">tổng</label>
            <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder=""
                style="width: 10%" readonly value="<?php echo $tong ?? ''?>">
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