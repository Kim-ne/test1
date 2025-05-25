<?php

    if(isset($_GET['tu'])){

        $flag = true;
        $msga = '';

        if(!is_numeric($_GET['tu'])){
            $msga = 'Số không hợp lệ';
            $flag = false;
        }

        if($flag){
            $tich = '';

            for ($i = 1; $i <= 10; $i ++){
                $tich .=  $_GET['tu']. ' x ' .$i .' = ' . ($_GET['tu'] * $i).'<br>';
            }

        }
    }
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
</head>

<body>

    <form class="container">
        <h4 class="text-center">Bảng cửu chương</h4>
        <div class="form-group">
            <div class="row">
                <label for="">số bảng cửu chương</label>
                <input type="text" class="form-control <?php echo ($msga ?? '') ?> border border-danger" name="tu" id="tu" 
                value="<?php echo $_GET['tu'] ??'' ?>">
                <small class="text-danger"> <?php echo $msga??'' ?></small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tính</button>
        <div class="form-group">
          <?php
            echo $tich;
        ?>
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