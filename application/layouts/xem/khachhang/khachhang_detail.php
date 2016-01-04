<?php
    
    $param = $this->param->getParams();

    $data = new My_Data();
    $makhachhang = $this->param->getParam("makhachhang");
    $khachhang = new Model_Khachhang();
    $khachhangrow = $khachhang->getWhere($makhachhang);
    
    //thông tin chung

    $title = array('Tên Khách Hàng',"Địa Chỉ","Số Điện Thoại", "Công Nợ", "Thanh Toán");
    
    $thanhtoan = 'Đã Trả Hết';
    if($khachhangrow['CongNo'] > 0)
        $thanhtoan ='<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/xem/khachhang/true/detail/true/tt/true/makhachhang/".$khachhangrow['MaKhachHang'].'/">Thanh Toán</a>';
    
    $content = array($khachhangrow['TenKhachHang'],$khachhangrow['DiaChi'],
                    $khachhangrow['SoDienThoai'],($data->convertCurrency($khachhangrow['CongNo'])),$thanhtoan);
    
    
    $query = $data->createRightTable($title, $content, "400px");
    //echo $query;
    ?>
    
     <div style ="height:250px !important">
            <div style='float: left'>
            <?php 
                echo '<h1 class="title">Thông Tin Chi Tiết</h1>';
                echo $query;
            ?>
            </div>
            
            <div class = "right">
            <?php 
            
                if(isset($param['tt']))
                {
                    $formtt = new Form_Formmoi_Thanhtoan();
                    if($this->param->isPost())
                    {
                        $ngaythanhtoan = $param['ngaythanhtoan'];
                        $tienthanhtoan = $param['tienthanhtoan'];
                        
                        $check = new Form_Valid_Thanhtoan($param,$khachhangrow['CongNo']);
                        if($check->valid())
                        {
//                             echo "nhap dung";
//                             $formtt->populate($param);
//                             echo $formtt;
                            
                            $mydate = Zend_Locale_Format::getDate($ngaythanhtoan,array("date_format"=>"dd.MM.yyyy"));
                            $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                            
                            $hoadonkh = new Model_Hoadonkhachhang();
                            $mydata = array(
                                'MaHoaDon'=>null,
                                'NgayThanhToan'=>$date_str,
                                'SoTien'=>$tienthanhtoan,
                                'MaKhachHang'=>$makhachhang
                            );
                            $hoadonkh->insert_hoadon($mydata);
                            $khachhang->update_data($makhachhang, array('CongNo'=>($khachhangrow['CongNo'] - $tienthanhtoan)));
                            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/khachhang/true/detail/true/makhachhang/".$makhachhang."';</script>";
                        }
                        else 
                        {
                            $formtt->populate($param);
                            echo $formtt;
                            
                            echo "<div class='message'>";
                            foreach($check->messages as $item)
                            {
                                echo $item."<br/>";
                            }
                            echo "</div>";
                        }
                    }
                    else
                    {
                        echo $formtt;
                    } 
                }
                
            ?>
            </div>
            <span style='clear: both;'></span>
        </div>
    <span style='clear: both;'></span>
    <br>
    
    <?php     
    // các đơn hàng
    
    $loaivai = new Model_Loaivai();
    $mau = new Model_Mau();
    $donxuat = new Model_Donxuat();
    $dh= new Model_Donhang();
    $donhang = $dh->getWhereIdKH($makhachhang);
    
    $data = new My_Data();
    if($donhang){
    
        echo "<br>";
        echo '<h1 class="title">Thông Tin Đơn Hàng</h1>';
        $madonhangarr = array();
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
            else 
            {
                $madonhangarr[] =  $item['MaDonHang'];
            }
        }
        $data = new My_Data();
        $table = $data->createTable($title,$content,"1000px");
        echo $table;
        
        
        //thông tin đơn xuất

        if($madonhangarr != null)
        {
            echo '<h1 class="title">Thông Tin Đơn Xuất</h1>';
            $maincontent = array();
            $title = array("Mã Đơn Xuất","Ngày Xuất","Loại Vải","Số Mét","Thành Tiền", "Xuất File");
            foreach ($madonhangarr as $item)
            {
                $donxuatrow = $donxuat->getWhere_donhang($item);
                $mydate = Zend_Locale_Format::getDate($donxuatrow['NgayXuat'],array("date_format"=>"yyyy.MM.dd"));
                $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
                $button= "<a class ='thembutton' href='".HOST_PROJECT."/index/xem/donxuat/true/xuatfile/true/madonxuat/".$donxuatrow['MaDonXuat']."'/>Xuất File</a>";
                
                $loaivairow = $loaivai->getWhere($donxuatrow['MaVai']);
                $tien = $data->convertCurrency(($donxuatrow['TongSoMet']*$donxuatrow['Gia']));
                $content = array(
                    $donxuatrow['MaDonXuat'],
                    $date_str, $loaivairow['TenLoaiVai'],$donxuatrow['TongSoMet'],
                    $tien,$button
                );
                $maincontent[] = $content;
            }
            $table = $data->createTable($title, $maincontent,"750px");
            echo $table;
                
        }
    }
    
    $hoadon = new Model_Hoadonkhachhang();
    $hoadonall = $hoadon->getWhere_khachhang($makhachhang);
    if($hoadonall)
    {
        echo '<h1 class="title">Lịch Sử Thanh Toán</h1>';
        
        $title = array("Mã Hóa Đơn","Ngày Thanh Toán","Số Tiền");
        $content= array();
        
        foreach ($hoadonall as $item)
        {
            $mydate = Zend_Locale_Format::getDate($item['NgayThanhToan'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
            $tien = $data->convertCurrency($item['SoTien']);
            $sub = array($item['MaHoaDon'],$date_str,$tien);
            $content[] = $sub;
        }
        
        $query= $data->createTable($title, $content, "430px");
        echo $query;
    }
    