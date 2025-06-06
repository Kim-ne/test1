<?php

function xemmang($a)
{
  echo '<pre>', print_r($a), '<pre>';
}

function alert($content, $type = 'success')
{
  return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>' . $content . '</strong> 
  </div>
  
  <script>
    $(".alert").alert();
  </script>';
}

function isLogin()
{
  return isset($_SESSION['status_login']) && $_SESSION['status_login'];
}

function reDirect($url)
{
  header('location:' . $url);
  exit;
}

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
 * $type: danh sách loại file đc phép đưa lên sever (đuôi hoặc type); mặc định upload hình 3 đuôi : jpèg, jpg, png
 * $maxsize: dung lượng tối đa cho phép là 2mb
 * $folder: nơi lưu trên website
 * $filename: tên file xử lý ở sever để quản lý riêng
 * $error: thông báo lỗi
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
?>