<?php
    echo $this->headMeta();
    echo $this->headLink();

    $madonhang = $this->param->getParam('madonhang');
    $fupdate = new Form_Formmoi_Donhang();
    $fupdate->updateform($madonhang);
    
    if($this->param->isPost()){
        
            $param = $this->param->getPost();
            
            echo "<pre>";
            print_r($param);
            echo "</pre>";
        
            $check = new Form_Valid_Donhang($param);
            
            if($check->valid($param))
            {
                $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngaydathang"),array("date_format"=>"dd.MM.yyyy"));
                $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                
                $mavai = $this->param->getParam("mavai");
                $sometvai = $this->param->getParam("sometvai");
                $vai = new Model_Loaivai();
                $loaivai = $vai->getWhere($mavai);
                $tongtien = $sometvai * $loaivai['Gia'];
                $data = array(
                    "MaDonHang"=>$madonhang,
                    "MaVai"=>$mavai,
                    "MaMau"=>$this->param->getParam("mamau"),
                    "NgayDat"=>$date_str,
                    "TienDatHang"=>$tongtien,
                    "SoMetVai"=>$sometvai,
                );
                
                $donhang = new Model_Donhang();
                $donhang->update_data($madonhang, $data);
                    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/donhang/true';</script>";
            }
            else 
            {
                echo $fupdate;
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
            echo $fupdate;
        }