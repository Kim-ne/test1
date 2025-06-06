<?php
//khởi tạo 2 khóa từ querystring cho người dùng nhập 2 số a và b
// tính tổng 2 số a và b
// ULR: http://localhost/PHP/module1/tinhtong2so.php?a=soa&b=sob


// echo $_GET['a'] + $_GET['b']

if(isset($_GET['a'], $_GET['b'])){

    // Kiểm tra dữ liệu đầu vào hợp lệ
    if(is_numeric($_GET['a']) && is_numeric($_GET['b'])){
         $ketqua = $_GET['a'] + $_GET['b'];
    } else{
        $thongbao = ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         
          <strong> Dữ liệu không hợp lệ</strong> 
        </div>
        <div form-group>
         <input style="background-color:red" id="1" ></input>;
        </div>
        
        <script>
          $(".alert").alert();
        </script>' ;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <form class="container">
        <h4>Tính tổng 2 số</h4>
        <?php echo $thongbao??'' ?>
        <div class="form-group">
            <label for="">Số A</label>
            <input type="text" class="form-control" name="a" 
            value="<?php echo $_GET['a'] ??'' ?> " 
            id="1" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Số B</label>
            <input type="text" class="form-control" name="b"
            value="<?php echo $_GET['b'] ??'' ?>" 
            id="" aria-describedby="helpId" placeholder=""
            >
        </div>
        <div class="form-group">
            <label for="">Kết quả</label>
            <input type="text" class="form-control" value="<?php echo $ketqua?? '' ?>" readonly id="" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-danger" name="tinh" value="tinh">tinh</button>
    </form>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>