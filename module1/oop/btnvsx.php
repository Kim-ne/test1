<?php
class nhanviensx
{
    // khởi tạo tv
    var $ma;
    var $ten;
    var $gioitinh;
    var $ngaysinh;
    var $ngayvaolam;
    var $soluongsp;
    var $tangca;
    var $dinhmucsp = 1000;
    var $dongia = 12000 ;
    
// xây dựng phương thức hỗ trọ
    function __construct($ma,$ten,$gioitinh,$ngaysinh,$ngayvaolam,$soluongsp,$tangca)
    {
        $this->ma = $ma;
        $this->ten = $ten;
        $this->gioitinh = $gioitinh;
        $this->ngaysinh = $ngaysinh;
        $this->ngayvaolam = $ngayvaolam;
        $this->soluongsp = $soluongsp;
        $this->tangca = $tangca;
        // $this->dinhmucsp = $dinhmucsp = 1000;
        // $this->dongia = $dongia = 12000;
        

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
       if ($this->tangca == 'có') 
       {
            return  1.05 * $this->luong();
       } else{
            return 0;
       }
    }

    function thuongphat()
    {
        
        return  ($this->soluongsp - $this->dinhmucsp) * 10000;
    
    
        
    }

    function luong()
    {
        return  $this->soluongsp * $this->dongia ;
    }

    function thucnhan()
    {
       $luong = $this->luong();
       $trocap = $this->trocap();
       $thuongphat = $this->thuongphat();
       $thucnhan = $luong + $trocap + $thuongphat;
       return 'Thực nhận: ' .$thucnhan .'đ';
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
        echo 'Số lượng sp:' .$this->soluongsp;
        echo '<br>';
        echo 'tăng ca:' .$this->tangca;
        echo '<br>';
        echo 'Định mức sp:' .$this->dinhmucsp .'pcs';
        echo '<br>';
        echo 'Đơn giá:' .$this->dongia .'đ';
        echo '<br>';

        
    }

}

$nvK = new nhanviensx('1','Kim','nam','08/08/1994','05/10/2022','1100','có');
$nvK->xem();
echo 'số tiền trợ cấp: ' .$nvK->trocap() .'đ';
echo '<br>';
echo 'số tiền thưởng/phạt: '.$nvK->thuongphat().'đ';
echo '<br>';
echo 'lương: ' .$nvK->luong() .'đ';
echo '<br>';
echo $nvK->thucnhan() .'<br><br>';

$nvM = new nhanviensx('2','M','nu','08/08/1994','05/10/2022','900','không');
$nvM->xem();
echo 'số tiền trợ cấp: ' .$nvM->trocap() .'đ';
echo '<br>';
echo 'số tiền thưởng/phạt: '.$nvM->thuongphat().'đ';
echo '<br>';
echo 'lương: ' .$nvM->luong() .'đ';
echo '<br>';
echo $nvM->thucnhan();
?>