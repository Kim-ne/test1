<?php
class nhanvien
{
    // khởi tạo tv
    var $ma;
    var $ten;
    var $gioitinh;
    var $ngaysinh;
    var $ngayvaolam;
    var $socon;
    var $songayvang;
    var $hesoluong;
    var $luongcoban = 4000000 ;
    var $dinhmucvang = 12;
// xây dựng phương thức hỗ trọ
    function __construct($ma,$ten,$gioitinh,$ngaysinh,$ngayvaolam,$socon,$songayvang,$hesoluong,$luongcoban,$dinhmucvang)
    {
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gioitinh = $gioitinh;
        $this->ngaysinh = $ngaysinh;
        $this->ngayvaolam = $ngayvaolam;
        $this->socon = $socon;
        $this->songayvang = $songayvang;
        $this->hesoluong = $hesoluong;
        // $this->luongcoban = $luongcoban = 4000000;
        // $this->dinhmucvang = $dinhmucvang = 12;

    }
// xây dựng phương thức lơp
    function khoitao()
    {
        if (strpos($this->ma,'N' ) === 0)
        {
            return true;
        } else{
            echo 'thêm nhân viên phải bắt đẩu từ chữ N';
            return false;
        } 
    }

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
        // if($this->songayvang > $this->dinhmucvang)
        // {
        //     $phat = ($this->songayvang - $this->dinhmucvang) * 100000;
        //     return -$phat;
        // } else{
        //     $thuong = ($this->dinhmucvang - $this->songayvang) * 100000;
        //       return $thuong;
        // }
        return ($this->songayvang - $this->dinhmucvang)*100000;
    }

    function luong()
    {
        return  $this->hesoluong * $this->luongcoban ;
    }

    function thucnhan()
    {
    //    $luong = $this->luong();
    //    $trocap = $this->trocap();
    //    $thuongphat = $this->thuongphat();
    //    $thucnhan = $luong + $trocap + $thuongphat;
    //    return 'Thực nhận: ' .$thucnhan .'đ';
        return ($this->luong()+$this->trocap()+$this->thuongphat());
    }

    function xem()
    {
        echo 'Mã NV:' .$this->ma;
        echo '<br>';
        echo 'Tên NV:' .$this->ten;
        echo '<br>';
        echo 'Giới tính:' .$this->gioitinh;
        echo '<br>';
        echo 'Ngày sinh:' .$this->ngaysinh;
        echo '<br>';
        echo 'Ngày vào làm:' .$this->ngayvaolam;
        echo '<br>';
        echo 'Số con:' .$this->socon;
        echo '<br>';
        echo 'Số ngày vắng:' .$this->songayvang;
        echo '<br>';
        echo 'Hệ số lương:' .$this->hesoluong;
        echo '<br>';
        echo 'Lương cơ bản:' .$this->luongcoban .'đ';
        echo '<br>';
        echo 'Định mức vắng:' .$this->dinhmucvang;
        echo '<br>';
        
    }

}

$nvK = new nhanvien('1','Kim','nam','08/08/1994','05/10/2022',socon: '0',songayvang: '3',hesoluong: '3');
$nvK->xem();
echo 'số tiền trợ cấp: ' .$nvK->trocap() .'đ';
echo '<br>';
echo 'số tiền thưởng/phạt: '.$nvK->thuongphat().'đ';
echo '<br>';
echo 'lương: ' .$nvK->luong() .'đ';
echo '<br>';
echo $nvK->thucnhan() .'<br><br>';

$nvM = new nhanvien('2','M','nu','08/08/1994','05/10/2022',socon: '3',songayvang: '13',hesoluong: '3.5');
$nvM->xem();
echo 'số tiền trợ cấp: ' .$nvM->trocap() .'đ';
echo '<br>';
echo 'số tiền thưởng/phạt: '.$nvM->thuongphat().'đ';
echo '<br>';
echo 'lương: ' .$nvM->luong() .'đ';
echo '<br>';
echo $nvM->thucnhan();
?>