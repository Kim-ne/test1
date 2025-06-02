<?php

echo '<pre>', print_r($_POST), '</pre>';
// nơi chứa thông tin dữ liệu của tập tin đc upload tạm thời
echo '<pre>', print_r($_FILES), '</pre>';
// chuyển file tmp về file gốc để lưu trữ và sử dụng trên sv
// move_uploaded_file(tmp_path,fullpath)
// kiểm tra dữ liệu
// dữ liệu hợp lệ => phải đc đưa lên tmp và error = 0
// Kiểm soát đc loại file cho phép up lên sever
// Kiểm soát đc dung lượng file tối đa cho phép upload
// Kiểm soát đc nơi lưu trữ trên sv
// Kiểm soát đc tên file (xử lý tránh ghi đè tập tin và dễ quản lý trên sv sau này)
// ok hết các bước trên thì mới tiến hành chuyển đổi thành file gốc để sử dụng
/**
 * My upload
 * $file: array file
 * [taptin] => Array
        (
            [name] => 000472928.pdf
            [full_path] => 000472928.pdf
            [type] => application/pdf
            [tmp_name] => C:\wamp64\tmp\phpDC79.tmp
            [error] => 0
            [size] => 66084
        )
 * $type: danh sách loại file đc phép đưa lên sever (đuôi hoặc type); mặc định upload hình 3 đuôi : jpeg, jpg, png
 * $maxsize: dung lượng tối đa cho phép là 2mb
 * $folder: nơi lưu trên website
 * $filename: tên file xử lý ở sever để quản lý riêng
 * 
 */
function myUpLoad($file, $folder, &$error = '', $type = ['.jpeg', '.jpg', '.png'], $maxsize = 2, $filename = 'file_')// vừa cần T/F vừa cần chuỗi thì dùng tham chiếu
{
  $flag = true;
  //check tmp
  if (!$file || $file['error'] != 0 || !$file['tmp_name'] || !$file['size']) {
    $flag = false;
    $error = 'upload thất bại';
  }
  //filetype
  $ext = strtolower(substr($file['name'], strrpos($file['name'], '.'))); // strtolower tìm chuỗi in thường
  if (!in_array($ext, $type)) {
    $flag = false;
    $error = 'chỉ cho phép các loại tập tin sau: ' . implode(', ', $type);
  }
  // filesize
  $msize = 2 * 1024 * 1024;
  if ($file['size'] > $msize) {
    $flag = false;
    $error = 'Dung lượng upload cho phép' . $msize . 'mb';
  }
  // tiến hành check và upload
  if ($flag) {
    $fullpath = $folder . '/' . $filename . time() . $ext;
    if (move_uploaded_file($file['tmp_name'], $fullpath)) {
      return $fullpath;
    } else {
      $error = 'xảy ra lỗi trong quá trinh upload vui lòng kiểm tra lại';
      return false;
    }
  } else {
    return false;
  }


}

function myUpLoads($files, $folder, &$errors = [], $type = ['.jpeg', '.jpg', '.png'], $maxsize = 2, $filename = 'file_')
{
  $data = [];
  if ($files && isset($files['error']) && is_array($files['error']) && $files['error']) {
    foreach ($files['name'] as $key => $name) {
      // tạo mảng cho nhiều file như cấu trúc 1 file
      $error = '';
      $file = [
        'name' => $name,
        'type' => $files['type'][$key],
        'tmp_name' => $files['tmp_name'][$key],
        'error' => $files['error'][$key],
        'size' => $files['size'][$key]
      ];
      $newname = $filename.$key.'_';
      $rs = myUpLoad($file,$folder,$error,$type,$maxsize,$newname); // không cần phải gắn cờ và viết lại. tận dụng hàm trên
      if($error)
        $errors [] = $name.': '.$error;
      if($rs)
        $data[] = $rs;

    }
  }else{
    $errors [] = 'Upload thất bại';
  }
   return $data;
}
// move_uploaded_file($_FILES['taptin']['tmp_name'],'files/'.$_FILES['taptin']['name']);
// if(isset($_POST['ten']))
// {
//     $kq = myUpLoad($_FILES['taptin'],'files',$error);
//     if($kq)
//     {
//         echo 'Upload thành công';
//         echo '<img src=" '.$kq.' " width="150"/>';
//     } else{
//         echo $error ;
//     }
// }
// Xây dựng hàm upload nhiều tập tin cùng 1 lúc
if(isset($_POST['ten']))
{
    $kq = myUpLoads($_FILES['taptin'],'files',$errors);
    if($kq)
    {
        echo 'Upload thành công';
        foreach($kq as $k)
        echo '<img src=" '.$k.' " width="150"/>';
      echo implode('<br>',$errors );
    } else
        echo implode('<br>',$errors );
    
}


// ?>
<form action="" method="post" enctype="multipart/form-data">
  <input type="text" name="ten" />
  <input type="file" name="taptin[]" multiple />
  <button type="submit">Upload</button>
</form>