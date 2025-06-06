<?php  
    /** 
     * Mảng - array
     * các thao tác cần biết và xử lý được
     * 1. khai báo 1 mảng
     *      1.1: $mang = array ([key=>]giatri1, [key=>]giatri2, [key=>]giatrin,....)
     *      1.2: $mang = [[key=>]giatri1, [key=>]giatri2, [key=>]giatrin,.....]
     *      1.3: $mang = explode(<ky tu dung de tach>, <chuoi>); => mảng gồm các phần tử là chuỗi con đã được tách theo ký tự đã định nghĩa
     
     * 2. truy xuất phần tử trong mảng
     *      $mang[khóa] => giá trị của cái khóa đó
     
     * 3. xuất được cấu trúc nội bộ của mảng (xem và phân tích để có hướng xử lý thích hợp)
     *      print_r($mang) => xuất toàn bộ các khóa và giá trị có trong mảng
     *      var_dump($mang) => tương tụ nhưng xuất ra kết quả chi tiết hơn
     
     * 4. duyệt mảng dùng vòng lặp => ưu tiên dùng foreach vì (chỉ có foreach mới có thể lấy được khóa của phần tử)
     
     * 5. đếm số lượng phần tử của mảng
     *      count($mang) => số lượng phần tử của 1 cấp

     * 6. thêm 1 phần tử mới vào mảng
     *      $mang[] = giatri mới thêm; => tạo 1 phần tử mới với key tự động
     *      $mang[keymoi] = giatri mới thêm => tạo 1 phần tử với key tự định nghĩa
     
     * 7. cập nhật giá trị mới của 1 phần tử trong mảng đang có
     *      $mang[keycancapnhat] => giatrimoi
     
     * 8. xóa phần tử bất kỳ trong mảng
     *      unset($mang[khoa]) => hủy ô bất kỳ
     
     * 9. kiểm tra giá trị (value) trong mảng
     *      in_array(value,$mang) => T/F
     
     * 10. kiểm tra khóa (key) tồn tại trong mảng
     *      isset($mang[khoa]) => T/F
     * 
     * 11. kiểm tra dữ liệu có phải 1 mảng hay không
     *      is_array(giatri) => T/F
     * $_GET[khoa] => mảng của PHP
     * $_POST['key']
     * 
     * xây dựng 1 hàm riêng có thể sử dụng xử lý nhiều lần giống như php cung cấp
     * cú pháp:
     *          function <tenham>([ds tham số đầu vào để hàm có dữ liệu xử lý])
     *              {
     *                  đoạn code muốn lưu trữ cho xử lý đang cần
     *                  [return giá trị nếu có]
     *              }
     
     
    */

// $mang = [1,2,'hai'=>3,4,5, [1,2,'hai'=> [1,2,'hai'=>3, [1,2,'hai'=>3,4,5],5],4,5]];
// echo '<pre>' , print_r($mang) , '</pre>';
// // var_dump($mang);
// // echo $mang[2],[3],[2];
// //  $tong = 0;
// foreach( $mang as $key=>$value)
// {
    
//     echo $key.'=>'.$value.'<br>';
    
//     $tong += $value;
// }
// echo $tong;
// for( $i=0; $i<count($mang); $i++ )
// {
//     echo $mang[$i].'<br>';  
// }
// thêm vào phần tử 'abc' có key là keymoi
// $mang['keymoi'] = 'a,b,c';
// echo '<pre>', print_r($mang) , '</pre>';
// // cập nhật lại phần tử số 3 thành giá trị mới cập nhật
// $mang[3] = 'gia tri moi cap nhat';
// echo '<pre>', print_r($mang) ,'</pre>';
// // xóa keymoi ra khỏi danh sách
// unset($mang['keymoi']);
// echo '<pre>', print_r($mang) ,'</pre>';
// Định dạng số: number_format(so,soluongkytuthapphan,dauphancachthapphan,dauphancachthapphannghin)

function cauchao($noidung){
    return 'xin chao noi dung'.$noidung;
}

echo cauchao (' Kim');