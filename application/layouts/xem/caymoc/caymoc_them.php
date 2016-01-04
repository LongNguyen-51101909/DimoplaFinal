<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $caymoc =new Model_Caymoc();
    
    $makhosoi = $this->param->getParam("makhoisoi");
    $khosoi = new Model_Khosoi();
    $khosoirow = $khosoi->getWhere($makhosoi);

    // form Caymoc co 2 phan
    // createForm de tao ra form tren
    // createCayMoc de tao ra form duoi
    
    $form = new Form_Formmoi_Caymoc(); 
    $form->createForm($makhosoi);
    
    $formmoc = new Form_Formmoi_Caymoc();
    
    if($this->param->isPost())
    {   
        $param = $this->param->getPost();

        if(!array_key_exists('1', $param))
        {
            // tao form cay moc
            $check = new Form_Valid_Caymoc($param,$khosoirow['SoTanSoi']); 
            if($check->valid($param)){
                
                $form->populate($param);
                echo $form;
                $socaymoc = $this->param->getParam("socaymoc");
                $mavai =  $this->param->getParam("mavai");
                $sotansoi =  $this->param->getParam("sotansoi");
                $tongsomet =  $this->param->getParam("tongsometvai");
                $khomoc = $this->param->getParam("khomoc");
                $formmoc->createCayMoc($socaymoc,$mavai,$sotansoi,$tongsomet,$khomoc);
                echo $formmoc;
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
            //giữ thông số form phía trên
            $socaymoc = $param["soluong"];
            $mavai =  $param["mavai"];
            $sotansoi =  $param["sotan"];
            $tongsomet =  $param["tongsomet"];
            $khomoc =  $param["khomoc"];
            
            $thongso = array('sotansoi'=>$sotansoi,'mavai'=>$mavai,
                             'socaymoc'=>$socaymoc,'tongsometvai'=>$tongsomet,
                             'khomoc'=>$khomoc
                            );
            $form->populate($thongso);
            echo $form;

            // tạo form phía dưới
            $formmoc->createCayMoc($socaymoc,$mavai,$sotansoi,$tongsomet,$khomoc);
            
            $data = new My_Data();
            $valid = $data->isValidCaymoc($param);
            
            $change = false;
            $num = new Zend_Validate_Digits();
            
            if(!is_array($valid))
            {
                // TH các thông số đều đúng
                foreach ($param as $key=>$item)
                {
                    if($num->isValid($key))
                    {
                        $change = true;
                        $data = array(
                            "MaMoc"=>null,
                            "MaVai"=>$mavai,
                            "SoMetVai"=>$item,
                            "MaKhoSoi"=>$khosoirow['MaKho'],
                            'MaKhoMoc'=>$khomoc
                        );
                        $caymoc->insert_caymoc($data);
                    }
                }
                if($change)
                {
                    $update = array("SoTanSoi"=>($khosoirow['SoTanSoi'] - $param['sotan']));
                    $khosoi->update_data($khosoirow['MaKhoSoi'], $update);
                }
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT."/index/xem/caymoc/true");               
            }
            else 
            {
                // nếu sai thì ra thông báo
                $formmoc->populate($param);
                echo $formmoc;
                echo "<div class='small_message'> ";
                echo $valid[0];
                echo "</div>";
            }
        }
    }
    else{
        echo $form;
    }
?>
