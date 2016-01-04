<?php
    echo $this->headMeta();
    echo $this->headLink();

    $loaivai = new Model_Loaivai();
    $mau = new Model_Mau();
    $donxuat = new Model_Donxuat();
    $dh= new Model_Donhang();
    $donhang = $dh->getAll();

    $data = new My_Data();
    if($donhang){
    
        $title = array("Mã Đơn Hàng","Loại Vải","Màu Vải","Số Mét Vải","Ngày Đặt","Khách Hàng","Tùy Chỉnh","Giao Hàng");
        $content = array();
    
        foreach($donhang as $item)
        {
            $donxuatrow = $donxuat->getWhere_donhang($item['MaDonHang']);
            if(!$donxuatrow)
            {
                $mydate = Zend_Locale_Format::getDate($item['NgayDat'],array("date_format"=>"yyyy.MM.dd"));
                $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
                //$tien = $data->convertCurrency($item['TienDatHang']);
                $kh = new Model_Khachhang();
                $khachhang = $kh->getWhere($item['MaKhachHang']);
                $loaivairow = $loaivai->getWhere($item['MaVai']);
                $maurow = $mau->getWhereIdMau($item['MaMau']);
                $chinhsua = '<a href="'.HOST_PROJECT."/index/xem/donhang/true/chinhsua/true/madonhang/".$item['MaDonHang'].'">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xem/donhang/true/xoa/true/madonhang/".$item["MaDonHang"].'" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>';
                $giaohang = '<div class="giaohang"><a href="'.HOST_PROJECT."/index/xem/donhang/true/giaohangf/true/madonhang/".$item['MaDonHang'].'">Giao Hàng</a></div>';
                
                $subcontent = array(
                    $item['MaDonHang'],$loaivairow['TenLoaiVai'],$maurow['TenMau'],$item['SoMetVai'],
                    $date_str,$khachhang['TenKhachHang'],$chinhsua,$giaohang
                );
                $content[] = $subcontent;
            }
        }
        $data = new My_Data();
        $table = $data->createTable($title,$content,"1000px");
        echo $table;
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại đơn hàng";
        echo "</div>";
    }
    
?>