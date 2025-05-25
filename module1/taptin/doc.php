<?php
/**
 * Thư viện xử lý tập tin trong php: file
 * 1. tìm đường dẫn lưu file: path
 * 2. Mở tập tin ra với chế độ tương ứng đang cần làm việc là gì: đọc -> r, ghi -> w=> (xóa hết dữ liệu cũ ghi mới)
 *      đọc và ghi a => ghi cuối và giữ lại nội dung cũ
 *      fopen(path,mode): return resource hoặc lỗi lúc mở
 * 2.2 Chuyển resource thành nội dung bên trong tập tin để sử dụng
 *      1. fgets(resource, dungluong=0) => nội dung của 1 dòng
 *      2. fgetc(resource) => nội dung của 1 ký tự
 *      * kiểm tra xem con trỏ văn bản đã ở cuối file chưa 
 *          feof(res) = t/f (feof = end of file)
 * 3. tiến hành xử lý nội dung theoyêu cầu đang cần của chế độ đang sử dụng tùy vào chức năng
 * 4. đóng tập lại sau khi xử lý xong giải phóng bộ nhớ
 *      fclose(resource);
 */
$path = 'data/user.data.txt';
$f = fopen($path,'r'); // resource id
// vog lăp => while (T/F)=>
$i = 1; 
while(!feof($f)) { //Tìm điều kiện đã đọc hết nội dung
    //1: false
    $s = fgets($f);
    echo $i.'.'.$s .'<br>';
    $i++;
}
fclose($f);