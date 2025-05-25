<?php
    // echo $_GET['nội dung']; ==> chuỗi từ ng dùng
    echo '<html>
            <head><head/>
            <body style="background-color: blue">
                <h4 style="color:red" >' .$_GET['noidung'] .'</h4>
            </body>
        </html>' ;

    /* xử lý kiểm tra thông số tồn tại trên sever
    - isset(khoacankiemtra,...) =>true nếu tồn tại rồi <= false

    -- toán tử ?? : Khoa??giatrithaythe
    -- Kiểm tra giá trị có phải là 1 só hay không: is_numeric(giatri); => T/F

    Toán tử kết hợp
        && (and) ,  || (or)

    Khoa??giatrithaythe <=> if(isset(khoa)){khoa = khoa} else{khoa = thaythe}
    -- toán tử ba ngôi
    --- bieuthucsosanh?lamgioday:lamdayneusai
    -- strlen(giatri)=> độ dài ký tự là bao nhiêu

    * biến số: nơi chứa giá trị cần thiết trên ô nhớ tạm thời của RAM để dùng lại trong quá trình xử lý
    cú pháp: $tenbien = giatri;
        $_GET
    
    Vòng lặp
    #############
    giúp thực hiện 1 công việc hoặc 1 nhóm công việc nhiều lần do bạn định nghĩa
    1. for: thực hiện 1 công việc với yêu cầu biết trước số lần cần thực hiện thì mới dùng được
        cú pháp vitribatdauchay: con tro vong lap
            for(<vitribatdauchay>;<xác định điều kiện dừng vòng lặp dựa vào vị trí con trỏ đang chạy>;<bước nhảy con trỏ trong lúc chạy>)
            {
                Khối lệnh công việc cần thực hiện
            }
    
    2. while: chạy theo điều kiện
        cú pháp: 
            while(<bieuthucdieukien>)
                {
                    Khối lệnh cần thực hiện
                }

    3. do ... while: giống while nhưng khác ở chỗ khôg cần biết đúng sai luôn chị trc 1 lần trc khi quyết định có chạy tiếp hay không
        cú pháp:
            do {
                    khối lệnh
            } while(bieuthucdieukien);
    
    4. foreach: xử lý riêng cho kiểu array
        cú pháp:
            foreach($array as $key=>$value)
            {
                Khối lệnh xử lý
            }

            bộ toán tử trong vòng lặp:
            toán tử bước nhảy cho con trỏ : ++, --, += cộng dồn số trong vòng lặp, .= nối dồn chuỗi trong vòng lặp
                                            $i++ => $i += 1
    */
?>

