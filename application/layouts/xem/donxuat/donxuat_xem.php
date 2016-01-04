<?php
    echo $this->headMeta();
    echo $this->headLink();

    $khachhang = new Model_Khachhang();
    $donhang = new Model_Donhang();
    $loaivai = new Model_Loaivai();
    $donxuat= new Model_Donxuat();
    $donxuatall = $donxuat->getAll();
    if($donxuatall)
    {
        $data = new My_Data();
        $maincontent = array();
        $title = array("Mã Đơn Xuất","Khách Hàng","Ngày Xuất","Loại Vải","Số Mét","Thành Tiền", "Xuất File");
        
        foreach ($donxuatall as $donxuatrow)
        {
            $mydate = Zend_Locale_Format::getDate($donxuatrow['NgayXuat'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
            $button= "<a class ='thembutton' href='".HOST_PROJECT."/index/export/madonxuat/".$donxuatrow['MaDonXuat']."'/>Xuất File</a>";
            
            $donhangrow = $donhang->getWhere($donxuatrow['MaDonHang']);
            $khachhangrow =$khachhang->getWhere($donhangrow['MaKhachHang']);
            $loaivairow = $loaivai->getWhere($donxuatrow['MaVai']);
            $tien = $data->convertCurrency(($donxuatrow['TongSoMet']*$donxuatrow['Gia']));
            $content = array(
                $donxuatrow['MaDonXuat'],$khachhangrow['TenKhachHang'],
                $date_str, $loaivairow['TenLoaiVai'],$donxuatrow['TongSoMet'],
                $tien,$button
            );
            $maincontent[] = $content;
        }
        
        
        $table = $data->createTable($title, $maincontent,"750px");
        echo $table;
    
    }
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Đơn Xuất";
        echo "</div>";
    }
    ?>