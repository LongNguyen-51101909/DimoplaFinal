<?php
    echo $this->headMeta();
    echo $this->headLink();

    $mahopdong = $this->param->getParam('mahopdong');
    $hopdong = new Model_Hopdong();
    $hopdongrow = $hopdong->getWhere($mahopdong);
    if(!$hopdongrow['TrangThai'])
    {
        // sua doi hop dong
        $form = new Form_Formmoi_MuaSoi();
        $form->updateform($mahopdong);
        
        if($this->param->isPost()){
            $param = $this->param->getPost();

            $check = new Form_Valid_Hopdong($param);
            if($check->valid($param))
            {
                $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngaymua"),array("date_format"=>"dd.MM.yyyy"));
                $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                $data = array(
                    "MaHopDong"=>$mahopdong,
                    "SoTanSoi"=>$this->param->getParam("sotansoi"),
                    "ThanhTien"=>$this->param->getParam("thanhtien"),
                    "NgayMua"=>$date_str,
                    "MaSoi"=>$this->param->getParam("loaisoi"),
                    "MaKho"=>$this->param->getParam("nhapkhosoi"),
                    "MaNhaCungCap"=>$this->param->getParam("nhacungcap"),
                );
                $hopdong->update_data($mahopdong, $data);
        
                echo "<script>window.location.href='".HOST_PROJECT."/index/xem/hopdong/true';</script>";
            }
            else
            {
                $form->populate($param);
                echo $form;
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
            echo $form;
        } 
    }
    else 
    {
        echo "<div class = 'long_message' style='width:500px !important;'>";
        echo "Không thế sửa đổi vì nguyên liệu đã nhập vào kho sợi";
        echo "</div>";
    }
    