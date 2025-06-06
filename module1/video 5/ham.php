<?php

/**
 * Hàm
 * 2 nhóm:
 * 1: Hàm có sẵn trong hệ thống : 700 hàm
 * 2: hàm mình tự xây => tùy vào trường hợp và mục đích khác nhau của dự án
 * function tenham(dsthamsodauvao)
 * {
 * code xử lý cho hàm
 * return về giá trị nếu có
 * }
 */

/**
 * Đầu vào họ tên đầy đủ
 * xử lý: tách các họ tên đó ra
 * họ, tên , lót
 * 
 * vd: Nguyễn Văn Hiếu Anh
 * ho: Nguyen
 * ten: Anh
 * lot: Van Hieu
 * 
 * strlen(s) => đếm ký tự
 * strpos(s,'kytucantim',vitribatdautim = 0) =>vitri cua ky tu ban dang tim trong chuoi (vi tri dau tiên)
 * strrpos(s,'kytucantim',vitribatdautim = 0) =>vitri cua ky tu ban dang tim trong chuoi (vi tri cuối)
 * substr(s,vitribatdaucat,đoaichuoicat = n (n - vitrivao))
 * 
 * 
 */
// $s = '        nguyen          van         hieu        anh        ';
// function tachhoten($s, &$h, &$t, &$l)
// {
//     $s = trim($s);

//     //rtrim(s,kytu)
// //ltrim(s,kytu)

//     // echo $s . '<br>';
// // echo strpos($s, 'a');
// // echo strrpos($s,'a');
// // echo substr($s,strrpos($s,'a')) .'<br>';

//     $vt1 = strpos($s, ' ');
//     $h = trim(substr($s, 0, $vt1)) . '<br>';

//     $vt2 = strrpos($s, ' ');
//     $t = trim(substr($s, $vt2)) . '<br>';
//     $l = trim(substr($s, $vt1, $vt2 - $vt1));
//     // echo $lot;
// echo '<input value= " ' .$lot.'"/>';

    // $a = explode(' ', $s);
// // ham dung cac loai phan tu null, rong trong mang
// $a = array_values(array_filter($a));
// var_dump($a);
// echo $a[0];
// echo '<br>';
// echo $a[count($a)-1];
// echo '<br>';
// unset($a[count($a)-1]);
// unset($a[0]);
// var_dump($a);
// echo implode(' ' $a);
// return $ho;
// }

// echo $ho = tachhoten($s);

// $ho = $ten = $lot = ' ';
// tachhoten($s, $ho, $ten, $lot);
// echo $ho . '<br>';
// echo $ten . '<br>';
// echo $lot . '<br>';


/**
 * viết hàm tìm tất cả các vị trí của chuỗi con trong chuỗi cha
 * đầu vào: chuỗi cha, chuỗi cần tìm
 * xử lý tìm hết vị trí
 * đầu ra: danh sach vị trí tìm đc chuỗi con (array)
 * 
 * vd chào bạn a b c d e f a
 * tìm chữ 'a'
 * =>[2,6,9,21];
 * <= [];
 * 
 */



// function vitri($s, $k)
// {

//     $ketqua = [];
//     $vt = 0;

//     while (($vttim = strpos($s, $k, $vt)) !== false) {

//         // 0
//         // $vttim != false => 0 != false => F
//         // $vttim !== false => 0 !== false => T
        
//         $ketqua[] = $vttim;
//         $vt = $vttim + 1;

//     }

//     return $ketqua;
// }

// $s = 'achao ban a b c d e f a';
// $k = 'a';

// $ketqua = vitri($s, $k);

// echo 'kết quả là:'; 
// print_r($ketqua);

// ==, ===,!=, !===
// false = 0
// $a = 1;
// $b = 1;
// gia tri luu tru 1, kieu du lieu: so
// lan 1: $a = 1;
// $a == $b => T
// $a != $b => F
// $a === $b => T
// $a !== $b => F

// gia tri luu tru 1, kieu du lieu : so, chuoi
// lan 2: $a = '1';
// $a == $b => T
// $a != $b => F
// $a === $b => F
// $a !== $b => T

/**
 * Số, chuỗi, mảng, null, rỗng, boolean
 * 
 * Ngày tháng: hiển thị cấu trúc như chuỗi, khác nhau về mặt cấu trúc dữ liệu bên trong
 * Cấu trúc: ngày, tháng, năm, giờ, phút, giây, tích tắc, quý, ngày của tháng,....
 * - mốc bắt đầu: 1970-01-01 0:0:0
 * - khi muốn xử lý dữ liệu bạn phải chuyển đổi về đơn vị giây để tính toán.
 *                        4 số năm  2 số tháng 2 số ngày 2sogio 2sophut 2sogiay
 * - định dạng chuẩn của hệ thống: Y-m-d H:i:s
 * 
 * -- hàm xử lý ngày tháng
 * + time(): lấy số giây của thời điểm hiện tại
 * + date(format, sogiay = hientai): chuyển dổi số giây về 1 phần hoặc ngày cụ thể nào đó tương ứng
 * + cài lại múi giờ hệ thống: date_default_timezone_set(mã khu vực)
 * + strtotime(chuoingay): đổi ngày về số giây tương ứng
 *                          chỉ chấp nhận các định dạng của của hệ thống
 * + mktime(h,i,s,m,d,y): chuyen về giây nhưng phải tách các thành phần ra độc lập
 * 
 * 
 */

//  echo date_default_timezone_get();
// date_default_timezone_set('asia/Ho_Chi_Minh');
// $d = '2024-08-03 18:55:59';
// // echo date('Y-m-d H:i:s');
// // $time = time();
// // echo $time;
// $time2 = 1722772588;
// $date = date('Y-m-d H:i:s',$time2);
// // echo $date;
// // echo '<br>';
// $time3 = strtotime($date);
// echo $time3;

/**
 * yêu cầu 1: có 2 ngày bắt đầu và kết thúc,
 * xử lý: tính toán khoảng cách giữa 2 ngày trên là bao nhiêu ngày
 * 
 * vd: n1:2024-08-04 n2: 2024-08-02 => 2ngày
 * 
 * yêu cầu 2: làm hệ thống chúc mừng sinh nhật cho khách hàng
 * xử lý: cung cấp ngày sn của kh sau đó xử lý
 *         nếu hôm nay là ngày sinh nhật => chúc mừng sn
 *          nếu hôm nay vượt quá ngày sn => sinh nhật của bạn đã qua n ngày
 *          nếu hôm nay chưa đến ngày sn => sinh nhật của bạn còn n ngày
 */

 // yêu cầu 1:

 function tinhngay($n1,$n2) {
    $time1 = strtotime($n1);

    $time2 = strtotime($n2);

    $time3 = $time1 - $time2;

// $date = date('Y-m-d',$time3);

return $time3 / (60*60*24) ;

}
$n1 = '2024-08-04 ';
$n2 = '2024-08-02 ';

echo   tinhngay($n1,$n2) . ' ngày <br>';

// yêu cầu 2:

function birthDayFind($bd) {

    $birthTime = strtotime($bd);

    $birthDay = date('d',$birthTime);    

    $birthMonth = date('m',$birthTime);

    $currentYear = date('Y');

    $currentBirth = strtotime("$currentYear-$birthMonth-$birthDay"); // Nối chuỗi lấy thời điểm sn năm nay

    $toDay = strtotime(date("Y-m-d")); //lấy tg cho hôm nay

    $birthCal = ($toDay - $currentBirth) / (60*60*24);


    if ($birthCal == 0){

        return 'Chúc mừng sinh nhật';

    } else if($birthCal > 0) {

        return 'Đã qua ngày sinh nhật ' .floor($birthCal).' ngày';

    } else {

        return 'còn ' .abs(floor ($birthCal)) .' ngày là đến sinh nhật';
    }

    
}


$bd = '1994-04-14' ;

echo birthDayFind($bd);

?>