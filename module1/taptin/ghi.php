<?php
/**
 * Thư viện xử lý tập tin trong php: file
 * 1. tìm đường dẫn lưu file: path
 * 2. Mở tập tin ra với chế độ tương ứng đang cần làm việc là gì: đọc -> r, ghi -> w=> (xóa hết dữ liệu cũ ghi mới)
 *      đọc và ghi a => ghi cuối và giữ lại nội dung cũ
 *      fopen(path,mode): return resource hoặc lỗi lúc mở 
 * 3. tiến hành xử lý nội dung theo yêu cầu và ghi mới nội dung vào tập tin
 *      fwrite(rs,noidung);
 * 4. đóng tập lại sau khi xử lý xong giải phóng bộ nhớ
 *      fclose(resource);
 */
$path = 'data/user.data.txt';
// $f = fopen($path,'w'); // resource id w:ghi đè
$f = fopen($path,'a'); // resource id a:ghi cuối
// ghi mới nội dung: mới cập nhật
    $data = "\n".'mới cập nhật';
fwrite($f, $data);
fclose($f);

// echo 123,456,789;  // ',' tách giá trị 1 nhóm lệnh thay vì echo 123; echo 456; echo 789; thì gộp lại thành dòng này
// echo '123' . '456'.'789'; // '.' nối giá trị
// echo '<pre>' , print_r($a), '<pre>';
?>