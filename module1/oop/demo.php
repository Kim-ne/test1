<?php
/**
 * 1 file chỉ xây dựng 1 lớp
 * 2 đặt tên file trùng tên với lớp
 * 3 hạn chế sử dụng các hàm xuất dữ liệu trong phương thức xây dựng nên sử dụng return
 * 4 cố gắng hiểu bản chất của đối tượng để không bị mất an toàn dữ liệu trong đối tượng
 * 
 * cú pháp mới: -> : dùng để truy xuất các tphần trong lớp
 * không cần thêm class mà muốn truy xuất thành phần: tenclass ::thanhphan
 * $this: đại diện cho lớp đnag xây dựng
 * $new: để tạo mới dữ liệu thuộc đối tượng đó sau khi xây dựng 
 * 
 */

class sinhvien
{
    // khai báo thành viên
    var $ma;
    var $ten;
    var $gioitinh;
    var $diachi;
    // xây dựng phương thức cho lớp
    // phương thức khởi tạo: định nghĩa các giá trị thành phần khi new lớp mới lúc sdung (phải có bước này thì mới có ý nghĩa)
    function __construct($ma, $ten, $gioitinh, $diachi)
    {
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gioitinh = $gioitinh;
        $this->diachi = $diachi;
    }

    function dangkymonhoc()
    {
        return 'ok';
    }
    function xemthongtin()
    {
        echo $this->ma; // truy xuất ko cần $
        echo '<br>';
        echo $this->ten;
        echo '<br>';
        echo $this->gioitinh;
        echo '<br>';
        echo $this->diachi;

    }
}

// sử dụng kiểu vừa tạo ra (thêm mới 1 đối tượng)
// $svmoi = new sinhvien('01', 'new', 'nam', 'hcm');
// //var_dump($svmoi);
// $svmoi->xemthongtin();

// xây dựng đối tượng sau
/**
 * phép tính
 * tv: so a, so b
 * PThuc: cong, tru, nhan, chia, xemthongtin
 * 
 * phan so
 * tv: tử mẫu
 * PThuc: cong, tru, nhan, chia, xemthongtin
 * 
 */

// class pheptinh
// {
//     var $soA;
//     var $soB;
//     var $dau;
//     var $kq;
//     // khởi tạo
//     function __construct($soA,$dau, $soB)
//     {
//         $this->soA = $soA;
//         $this->dau = $dau;
//         $this->soB = $soB;

//     }
//     function cong($soA, $soB)
//     {
//         $kq = $soA + $soB;
//         return $kq;
//     }
//     function tru($soA, $soB)
//     {
//         $kq = $soA - $soB;
//         return $kq;
//     }
//     function nhan($soA, $soB)
//     {
//         $kq = $soA * $soB;
//         return $kq;
//     }
//     function chia($soA, $soB)
//     {
//         $kq = $soA / $soB;
//         return $kq;
//     }
//     function xemthongtin()
//     {
//         echo $this->soA;
//         echo $this->dau;
//         echo $this->soB;
//         echo '=';
//         echo $this->kq;
//     }
// }
// $pheptinhcong = new pheptinh('2','+','3');
// $pheptinhtru = new pheptinh('6','-','3');
// $pheptinhnhan = new pheptinh('3','*','5');
// $pheptinhchia = new pheptinh('4','/','4');
// // var_dump($pheptinhcong);
// $pheptinhcong->xemthongtin();
// echo $pheptinhcong->cong('2','3');
// echo '  <br>';
// $pheptinhtru->xemthongtin();
// echo $pheptinhtru->tru('6','3');
// echo '  <br>';
// $pheptinhnhan->xemthongtin();
// echo $pheptinhnhan->nhan('3','5');
// echo '  <br>';
// $pheptinhchia->xemthongtin();
// echo $pheptinhchia->chia('4','4');
// echo '  <br>';

/**
 * sửa bài cộng sai do ở trên sd hàm chứ khôg phải pt
 */
class pheptinh
{
    //khởi tạo thành viên
    var $soa;
    var $sob;
    //xây dựng các phương thức hỗ trợ cho lớp
    function __construct($soa, $sob)
    {
        $this->soa = $soa;
        $this->sob = $sob;
    }
    // xây dựng các phương thức lớp
    function cong()
    {
        return $this->soa + $this->sob;
    }
    function tru()
    {
        return $this->soa - $this->sob;
    }
    function nhan()
    {
        return $this->soa * $this->sob;
    }
    function chia()
    {
        return $this->soa / $this->sob;
    }
    function xem()
    {
        echo 'soa: ' . $this->soa;
        echo '<br>';
        echo 'sob: ' . $this->sob;
        echo '<br>';
        echo '=';
    }

}
// sử dụng thử
$pt = new pheptinh(3, 5);
// $pt->xem();
// echo $pt->cong();

// class phanso
// {
//     var $tuA;
//     var $mauA;
//     var $daups;
//     var $tuB;
//     var $mauB;
//     var $daupt;
//     var $kq;

//     // khởi tạo
//     function __construct($tuA, $daups, $mauA, $daupt, $tuB, $mauB)
//     {
//         $this->tuA = $tuA;
//         $this->tuB = $tuB;
//         $this->mauA = $mauA;
//         $this->mauB = $mauB;
//         $this->daups = $daups;
//         $this->daupt = $daupt;
//     }
//     function cong($tuA, $mauA, $tuB, $mauB)
//     {
//         $kq = (($tuA * $mauB) + ($tuB * $mauA)) / ($mauA * $mauB);
//         return $kq;
//     }
//     function tru($tuA, $mauA, $tuB, $mauB)
//     {
//         $kq = (($tuA * $mauB) - ($tuB * $mauA)) / ($mauA * $mauB);
//         return $kq;
//     }
//     function nhan($tuA, $mauA, $tuB, $mauB)
//     {
//         $kq = ($tuA * $tuB) / ($mauA * $mauB);
//         return $kq;
//     }
//     function chia($tuA, $mauA, $tuB, $mauB)
//     {
//         $kq = ($tuA * $mauB) / ($mauA * $tuB);
//         return $kq;
//     }
//     function xemthongtin()
//     {
//         echo $this->tuA;
//         echo $this->daups;
//         echo $this->mauA;
//         echo ' ';
//         echo $this->daupt;
//         echo ' ';
//         echo $this->tuB;
//         echo $this->daups;
//         echo $this->mauB;

//         echo '=';
//         echo $this->kq;
//     }


// }
// $congphanso = new phanso('1', '/', '2', '+', '1', '2');
// $truphanso = new phanso('2', '/', '2', '-', '1', '2');
// $nhanphanso = new phanso('3', '/', '2', '*', '3', '2');
// $chiaphanso = new phanso('1', '/', '2', '/', '4', '2');
// $congphanso->xemthongtin();
// echo $congphanso->cong('1', '2', '1', '2');
// echo '  <br>';
// $truphanso->xemthongtin();
// echo $truphanso->tru('2', '2', '1', '2');
// echo '  <br>';
// $nhanphanso->xemthongtin();
// echo $nhanphanso->nhan('3', '2', '3', '2');
// echo '  <br>';
// $chiaphanso->xemthongtin();
// echo $chiaphanso->chia('1', '2', '4', '2');


class phanso
{
    // khởi tạo thành viên
    var $tu;
    var $mau;
    // xây dựng phương thức hỗ trợ cho lớp
    function __construct($tu, $mau)
    {
        $this->tu = $tu;
        $this->mau = $mau;
    }
    // xây dựng phương thức các lớp
    // $phanso là 1 class phan số đang xây dựng nhưng ở dạng đã hoàn chỉnh như khi sd
    function congps($phanso)
    {
        $tumoi = $this->tu * $phanso->mau + $this->mau * $phanso->tu;
        $maumoi = $this->mau * $phanso->mau;
        // trả về 1 phân số
        $kq = new phanso($tumoi, $maumoi);
        return $kq;
    }
    function trups($phanso)
    {
        $tumoi = $this->tu * $phanso->mau - $this->mau * $phanso->tu;
        $maumoi = $this->mau * $phanso->mau;
        // trả về 1 phân số
        return new phanso($tumoi, $maumoi);
       
    }
    function nhanps($phanso)
    {
        $tumoi = $this->tu * $phanso->tu;
        $maumoi = $this->mau * $phanso->mau;
        // trả về 1 phân số
        $kq = new phanso($tumoi, $maumoi);
        return $kq;
    }
    function chiaps($phanso)
    {
        $tumoi = $this->tu * $phanso->mau;
        $maumoi = $this->mau * $phanso->tu;
        // trả về 1 phân số
        $kq = new phanso($tumoi, $maumoi);
        return $kq;
    }
        function xem()
    {
        echo "{$this->tu}/{$this->mau}";
    }
}
// sử dụng thử

$ps1 = new phanso(2, 3);
$ps2 = new phanso(1, 2);
$ps3 = new phanso(3,4);
// $kq = $ps1->congps($ps2);
// $kq2 = $kq->congps($ps3);
// echo $kq2->xem();
// $ps1 -> congps($ps2)->congps($ps3)->xem();


/**
 * Đối tượng: nhân viênvp
 * Thành viên: mã, tên, giới tính,ngày sinh, ngày vào làm, số con, số ngày vắng,hệ số lương, định mức vắng = 12, lương căn bản = 4.000.000
 * Phương thức: +khởi tạo nhưng không cho phép thay đổi giá trị các thành viên có giá trị mặc định
 *              + trợ cấp: đối với nv nữ thì đc 1000000/con chỉ tính cho con thứ 3 trở lên
 *              + thường phạt: nếu vắng quá định mức thì trừ 100000/ngày vượt, còn thừa thì +100000/ngày
 *              + lương: bằng cách nhân hệ số với lương cb
 *              + thực nhận: tổng hết các tiền nhận ở trên để ra kq cuối cùng
 *              + xem : xem thông tin nv
 * 
 */

 class nhanvien
{
    // privite: chỉ sử dụng nội bộ lớp
    // protected: chỉ đc dùng khi có kế thừa
    // public: sử dụng đc cho tất cả mọi nơi
    protected $ma,$ten,$gioitinh,$ngaysinh,$ngayvaolam;
    // thuộc tính property
    function __construct($ma,$ten,$gioitinh,$ngaysinh,$ngayvaolam)
    {
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gioitinh = $gioitinh;
        $this->ngaysinh = $ngaysinh;
        $this->ngayvaolam = $ngayvaolam;
    }
// xây dựng phương thức lơp
    function trocap()
    {
      
    }

    function thuongphat()
    {
        return 0;
    }

    function luong()
    {
        
    }

    function thucnhan()
    {
       
    }

    function xem()
    {
        var_dump($this);
        echo '<br>Lương:' .$this->luong();
        echo '<br>Trợ cấp:' .$this->trocap();
        echo '<br>Thưởng/phạt:' .$this->thuongphat();
        echo '<br>Thực nhận:' .$this->thucnhan();
        
    }

}


class nhanvienvp extends nhanvien //kế thừa
{
    // phạm vi sử dụng và thuộc tính thành viên
    var $socon,$songayvang,$hesoluong;
    var $luongcoban = 4000000 ;
    var $dinhmucvang = 12;

    function __construct($ma,$ten,$gioitinh,$ngaysinh,$ngayvaolam,$socon,$songayvang,$hesoluong)
    {
        parent ::__construct($ma,$ten,$gioitinh,$ngaysinh,$ngayvaolam); //khởi tạo lớp cha để có tt sử dụng chung
        $this->socon = $socon;
        $this->songayvang = $songayvang;
        $this->hesoluong = $hesoluong;
    }
// xây dựng phương thức lơp
    function trocap()
    {
       if ($this->gioitinh == 'nu' && $this->socon > 2) 
       {
            return  1000000 * ($this->socon - 2);
       } else{
            return 0;
       }
    }

    function thuongphat()
    {
    
        return ($this->songayvang - $this->dinhmucvang)*100000;
    }

    function luong()
    {
        return  $this->hesoluong * $this->luongcoban ; // đa hình: cùng 1 phương thức nhưng nhiều cách xử lý khác cho từng đối tượng con
    }

    function thucnhan()
    {
        return ($this->luong()+$this->trocap()+$this->thuongphat());
    }
    function xemten()
    {
        echo $this->ten;
    }

}

$nvK = new nhanvienvp('1','Kim','nam','08/08/1994','05/10/2022',socon: '0',songayvang: '3',hesoluong: '3');
$nvK->xem();
// echo 'số tiền trợ cấp: ' .$nvK->trocap() .'đ';
// echo '<br>';
// echo 'số tiền thưởng/phạt: '.$nvK->thuongphat().'đ';
// echo '<br>';
// echo 'lương: ' .$nvK->luong() .'đ';
// echo '<br>';
// echo $nvK->thucnhan() .'<br><br>';

$nvM = new nhanvienvp('2','M','nu','08/08/1994','05/10/2022',socon: '3',songayvang: '13',hesoluong: '3.5');
$nvM->xem();
// echo 'số tiền trợ cấp: ' .$nvM->trocap() .'đ';
// echo '<br>';
// echo 'số tiền thưởng/phạt: '.$nvM->thuongphat().'đ';
// echo '<br>';
// echo 'lương: ' .$nvM->luong() .'đ';
// echo '<br>';
// echo $nvM->thucnhan();

// $nvK->ten = 'Khác';
// $nvK->xemten();

/** 
 * Đối tượng: nhân viên sx
 * Thành viên: mã, tên, giới tính,ngày sinh, ngày vào làm, số lượng sp, tăng ca, định mức sp = 1000, đơn giá = 12000
 * Phương thức: + khởi tạo nhưng không cho phép thay đổi giá trị các thành viên có giá trị mặc định
 *              + trợ cấp: nếu có tăng ca thì đc + 5% của lương
 *              + thường phạt: nếu làm không đủ định mức thì trừ 10000/sp không đủ, còn vượt định mức thì +10000/sp vượt
 *              + lương: đc bằng cách nhân hệ số lượng sp với đơn giá
 *              + thực nhận: tổng hết các tiền nhận ở trên để ra kq cuối cùng
 *              + xem : xem thông tin nv
 */

 class nhanviensx extends nhanvien //kế thừa
{
    // phạm vi sử dụng và thuộc tính thành viên
    var $soluongsp,$tangca;
    var $dinhmucsp = 1000;
    var $dongia = 12000;

    function __construct($ma,$ten,$gioitinh,$ngaysinh,$ngayvaolam,$soluongsp,$tangca)
    {
        parent ::__construct($ma,$ten,$gioitinh,$ngaysinh,$ngayvaolam); //khởi tạo lớp cha để có tt sử dụng chung
        $this->soluongsp = $soluongsp;
        $this->tangca = $tangca;
    }
// xây dựng phương thức lơp
    function trocap()
    {
       if ($this->tangca == 'co' ) 
       {
            return  0.05 * $this->luong();
       }
             return 0;
       
    }

    function thuongphat()
    {
        return ($this->soluongsp - $this->dinhmucsp)*10000;
    }

    function luong()
    {
        return  $this->soluongsp * $this->dongia ; // đa hình: cùng 1 phương thức nhưng nhiều cách xử lý khác cho từng đối tượng con
    }

    function thucnhan()
    {
        return ($this->luong()+$this->trocap()+$this->thuongphat());
    }
    function xemten()
    {
        echo $this->ten;
    }

}

$nvM = new nhanviensx('2','M','nu','08/08/1994','05/10/2022', '1100', 'co');
$nvM->xem();
// echo 'số tiền trợ cấp: ' .$nvM->trocap() .'đ';
// echo '<br>';
// echo 'số tiền thưởng/phạt: '.$nvM->thuongphat().'đ';
// echo '<br>';
// echo 'lương: ' .$nvM->luong() .'đ';
// echo '<br>';
// echo $nvM->thucnhan();

$nvK = new nhanviensx('1','Kim','nam','08/08/1994','05/10/2022', '900','khong');
$nvK->xem();
// echo 'số tiền trợ cấp: ' .$nvK->trocap() .'đ';
// echo '<br>';
// echo 'số tiền thưởng/phạt: '.$nvK->thuongphat().'đ';
// echo '<br>';
// echo 'lương: ' .$nvK->luong() .'đ';
// echo '<br>';
// echo $nvK->thucnhan() .'<br><br>';

// $nvK->ten = 'Khác';
// $nvK->xemten();
//demo 1
?>

