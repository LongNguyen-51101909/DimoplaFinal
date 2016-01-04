<?php
    Zend_Session::start();
    $mysession = new Zend_Session_Namespace('XuLyDonHang');

    $param = $this->param->getParams();
    
//     echo "<pre>";
//     print_r($param);
//     echo "</pre>";
    
//     echo "<pre>";
//     print_r($mysession->checktp);
//     echo "</pre>";
    
    $madonhang = $param['madonhang'];
    $num = new Zend_Validate_Digits();
    $data = new My_Data();
    
    if($mysession->checktp != null)
    {
        if($mysession->checktp['madonhang'] != $madonhang)
        {
            unset($mysession->checktp);
            $mysession->checktp['madonhang'] = $madonhang;
        }    
    }
    else 
    {
        $mysession->checktp['madonhang'] = $madonhang;
    }
    
    
    
    if(array_key_exists('chon', $param))
    {
        // them cac phan tu chon vao mysession
        foreach ($param as $key=>$item)
        {
            if($num->isValid($key) && $item==1 && !in_array($key, $mysession->checktp))
            {
                $mysession->checktp[] = $key;
            }
        }
        $data->mysort();
    }
    else if(array_key_exists('bochon', $param))
    {
        // them cac phan tu chon vao mysession
        foreach ($param as $key=>$item)
        {
            if($num->isValid($key) && $item==1 && in_array($key, $mysession->checktp))
            {
                foreach ($mysession->checktp as $skey => $sitem)
                {
                    if($key== $sitem)
                        unset($mysession->checktp[$skey]);
                }
            }
        }
    }
    
    if(array_key_exists('giaohang', $param))
    {
        // giao hang
        $formgiaohang = new Form_Formmoi_Giaohang();
        $formgiaohang->createForm($madonhang);
        echo $formgiaohang;
    }
    else if(array_key_exists('giao', $param))
    {
        echo "giaohang";
        echo "<pre>";
        print_r($param);
        echo "</pre>";
        
        $date = new Zend_Validate_Date(array('format' => 'dd/MM/yyyy'));
        $ngayxuat = $param['ngayxuat'];
        $messages= '';
        
        if($date->isValid($ngayxuat)==false)
            $messages = "Ngày nhuộm không đúng";
        
        if($messages != '')
        {
            $formgiaohang = new Form_Formmoi_Giaohang();
            $formgiaohang->createForm($madonhang);
            $formgiaohang->populate($param);
            echo $formgiaohang;
            echo "<br>";
            echo "<div class='message' style='margin-top:400px !important;'>";
            echo $messages;
            echo "</div>";
        }
        else
        {
            $donhang= new Model_Donhang();
            $donxuat = new Model_Donxuat();
            $loaivai = new Model_Loaivai();
            $caymoc = new Model_Caymoc();
            $caytp = new Model_Caythanhpham();
            $khachhang = new Model_Khachhang();

            // update caythanhpham
            $sometvai = 0;
            foreach ($mysession->checktp as $key => $item)
            {
                if($num->isValid($key))
                {
                    $caytprow = $caytp->getWhere($item);
                    $sometvai+=$caytprow['SoMetVai'];
                }
            }
            
            
            //them don xuat  
            
            $mydate = Zend_Locale_Format::getDate($ngayxuat,array("date_format"=>"dd.MM.yyyy"));
            $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
            
            $donhangrow = $donhang->getWhere($madonhang);
            $loaivairow = $loaivai->getWhere($donhangrow['MaVai']);
            
            $mydata = array(
                'MaDonXuat'=>null,'NgayXuat'=>$date_str,
                'MaDonHang'=>$madonhang,'MaVai'=>$donhangrow['MaVai'],'TongSoMet'=>$sometvai,'Gia'=>$loaivairow['Gia']
            );  
            
            $donxuat->insert_donxuat($mydata);
            
            $maxindex =$donxuat->getMaxIndex();
            $update = array('MaDonXuat'=>$maxindex);
            
            // update caythanhpham
            foreach ($mysession->checktp as $key => $item)
            {
                if($num->isValid($key))
                {
                    $caytp->update_data($item, $update);
                }
            }
            
            // them cong no cho khach hang
            
            $khachhangrow = $khachhang->getWhere($donhangrow['MaKhachHang']);
            $updateKH = array('CongNo'=>($khachhangrow['CongNo']+$sometvai*$loaivairow['Gia']));
            $khachhang->update_data($khachhangrow['MaKhachHang'], $updateKH);
            
            // xoa session
            unset($mysession->checktp);
        }
        
    }
    else 
    {
        $dh= new Model_Donhang();
        $donhang = $dh->getWhere($madonhang);
        $loaivai = new Model_Loaivai();
        $mau = new Model_Mau();
        $kh = new Model_Khachhang();
        $data = new My_Data();
        
        // thong tin don hang
        $title = array("Mã Đơn Hàng","Loại Vải","Màu Vải","Số Mét Vải","Ngày Đặt","Tiền Đặt Hàng","Khách Hàng");
        $loaivairow = $loaivai->getWhere($donhang['MaVai']);
        $maurow = $mau->getWhereIdMau($donhang['MaMau']);
        $khachhang = $kh->getWhere($donhang['MaKhachHang']);
        $mydate = Zend_Locale_Format::getDate($donhang['NgayDat'],array("date_format"=>"yyyy.MM.dd"));
        $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
        $tien = $data->convertCurrency($donhang['TienDatHang']);
        $content = array(
            $donhang['MaDonHang'],$loaivairow['TenLoaiVai'],$maurow['TenMau'],$donhang['SoMetVai'],
            $date_str,$tien,
            $khachhang['TenKhachHang']
        );
        
        $query = $data->createTable($title, $content, '750');
        echo $query;
    
        
        $form = new Form_Formmoi_Chonkhotp();
        if($this->param->isPost())
        {
            $param = $this->param->getPost();
            $form->populate($param);
            echo $form;
        
            $makho = $this->param->getParam("mykhohang");
        
            $ctp= new Model_Caythanhpham();
            $loaivai = new Model_Loaivai();
            $lonhuom = new Model_Lonhuom();
            $mau = new Model_Mau();
            $caymoc = new Model_Caymoc();
            $khohang = new Model_Khohang();
    ?>
    
    <div class="main">
                <div style='float: left'>
                <?php 
                    $formctp = new Form_Formmoi_Choncaytp();
                    $formctp->createForm($makho,$madonhang);
                    echo $formctp;
                ?>
                </div>
                
                <div class = "right">
                <?php 
                
                    if(count($mysession->checktp)>1)
                    {
                        $formsession = new Form_Formmoi_Ctpsession();
                        $formsession->createForm($makho);
                        echo $formsession;
                    }
                ?>
                </div>
    </div>
<?php 
        }
        else{
            echo $form;
        }
    }
?>
