<?php

/**
 * session: 1 phiên làm việc của người dùng bắt đầu tử lúc truy cập web tới lúc tắt hết trình duyệt đi
 *          tất cả dữ liệu lưu trữ ở đây sẽ có thời gian sống lâu hơn so với các biến bình thường
 * lưu ý:
 *          phải bật cờ của bộ nhớ lên thì mới dùng được các giá trị này, phải đc bật ở đầu đoạn code
 *          session_start()
 * xử lý: 
 *          lưu giá trị vào vùng nhớ ss:
 *          $_SESSION[key] = giatri;
 *          lấy giá trị ra để sử dụng:
 *          $_SESSION[key]
 *          hủy toàn bộ giá trị có trong session
 *          session_destroy();
 *          hủy từng cái
 *          unset(khoa)
 *          chuyển hướng thông tin sang trang khác
 *          header('location: url');
 */

// session_start();
// $_SESSION['a'] = 1;
// header('location: http://google.com');

date_default_timezone_set("Asia/Ho_Chi_Minh");
$time = time() + 60;
setcookie("hoten", 'Nguyen Van A', $time);
?>