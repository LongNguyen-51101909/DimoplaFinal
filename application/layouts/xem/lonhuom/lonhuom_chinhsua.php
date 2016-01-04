<?php
    echo $this->headMeta();
    echo $this->headLink();

    $malonhuom = $this->param->getParam('malonhuom');
    $fupdate = new Form_Update_Lonhuom();
    $fupdate->createForm($malonhuom);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_Lonhuom($param);
          
            if($check->valid($param))
            {
                $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngaynhuom"),array("date_format"=>"dd.MM.yyyy"));
                $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                $data = array(
                    "MaLoNhuom"=>$malonhuom,
                    "SoCayNhuom"=>$this->param->getParam("socaynhuom"),
                    "NgayNhuom" => $date_str,
                    "MaMau" => $this->param->getParam("mamau"),
                );
                $kh = new Model_Lonhuom();
                $kh->update_data($malonhuom, $data);
                echo "<script>window.location.href='".HOST_PROJECT."/index/xem/lonhuom/true';</script>";
               
            }
            else 
            {
                echo $fupdate;
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