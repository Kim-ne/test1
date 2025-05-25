<?php
/**
 * 1 file chỉ xây dựng 1 lớp
 * 2 đặt tên file trùng tên với lớp
 * 3 hạn chế sử dụng các hàm xuất dữ liệu trong phương thức xây dựng nên sử dụng return
 * 4 cố gắng hiểu bản chất của đối tượng để không bị mất an toàn dữ liệu trong đối tượng
 * 
 * cú pháp mới: -> : dùng để truy xuất các tphần trong lớp
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

class pheptinh
{
    var $soA;
    var $soB;
    var $dau;
    var $kq;
    // khởi tạo
    function __construct($soA,$dau, $soB)
    {
        $this->soA = $soA;
        $this->dau = $dau;
        $this->soB = $soB;

    }
    function cong($soA, $soB)
    {
        $kq = $soA + $soB;
        return $kq;
    }
    function tru($soA, $soB)
    {
        $kq = $soA - $soB;
        return $kq;
    }
    function nhan($soA, $soB)
    {
        $kq = $soA * $soB;
        return $kq;
    }
    function chia($soA, $soB)
    {
        $kq = $soA / $soB;
        return $kq;
    }
    function xemthongtin()
    {
        echo $this->soA;
        echo $this->dau;
        echo $this->soB;
        echo '=';
        echo $this->kq;
    }
}
$pheptinhcong = new pheptinh('2','+','3');
$pheptinhtru = new pheptinh('6','-','3');
$pheptinhnhan = new pheptinh('3','*','5');
$pheptinhchia = new pheptinh('4','/','4');
// var_dump($pheptinhcong);
$pheptinhcong->xemthongtin();
echo $pheptinhcong->cong('2','3');
echo '  <br>';
$pheptinhtru->xemthongtin();
echo $pheptinhtru->tru('6','3');
echo '  <br>';
$pheptinhnhan->xemthongtin();
echo $pheptinhnhan->nhan('3','5');
echo '  <br>';
$pheptinhchia->xemthongtin();
echo $pheptinhchia->chia('4','4');
echo '  <br>';

class phanso
{
    var $tuA;
    var $mauA;
    var $daups;
    var $tuB;
    var $mauB;
    var $daupt;
    var $kq;

// khởi tạo
    function __construct($tuA,$daups,$mauA,$daupt,$tuB,$mauB)
    {
        $this->tuA = $tuA;
        $this->tuB = $tuB;
        $this->mauA = $mauA;
        $this->mauB = $mauB;
        $this->daups = $daups;
        $this->daupt = $daupt;
    }
    function cong($tuA,$mauA,$tuB,$mauB)
    {
        $kq = (($tuA*$mauB) + ($tuB*$mauA)) / ($mauA*$mauB);
        return $kq;
    }
     function tru($tuA,$mauA,$tuB,$mauB)
    {
        $kq = (($tuA*$mauB) - ($tuB*$mauA)) / ($mauA*$mauB);
        return $kq;
    }
     function nhan($tuA,$mauA,$tuB,$mauB)
    {
        $kq = ($tuA * $tuB) / ($mauA * $mauB);
        return $kq;
    }
     function chia($tuA,$mauA,$tuB,$mauB)
    {
        $kq = ($tuA * $mauB) / ($mauA * $tuB);
        return $kq;
    }
     function xemthongtin()
    {
        echo $this->tuA;
        echo $this->daups;
        echo $this->mauA;
        echo ' ';
        echo $this->daupt;
          echo ' ';
           echo $this->tuB;
        echo $this->daups;
        echo $this->mauB;
        
        echo '=';
        echo $this->kq;
    }

    
}
$congphanso = new phanso('1','/','2','+','1','2');
$truphanso = new phanso('2','/','2','-','1','2');
$nhanphanso = new phanso('3','/','2','*','3','2');
$chiaphanso = new phanso('1','/','2','/','4','2');
$congphanso->xemthongtin();
echo $congphanso->cong('1','2','1','2');
echo '  <br>';
$truphanso->xemthongtin();
echo $truphanso->tru('2','2','1','2');
echo '  <br>';
$nhanphanso->xemthongtin();
echo $nhanphanso->nhan('3','2','3','2');
echo '  <br>';
$chiaphanso->xemthongtin();
echo $chiaphanso->chia('1','2','4','2');
?>