<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_kho = $this->param->getParam('makho');
   
    $fupdate = new Form_Update_KhoHang();
    $fupdate->createForm($id_kho);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();

            $check = new Form_Valid_Khohang($param);
            
            if($check->valid($param))
            {
                $data = array(
                    "MaKho"=>$id_kho,
                    "TenKho"=>$this->param->getParam("tenkhohang"),
                    "Diachi" => $this->param->getParam("diachi"),
                    "sdt" => $this->param->getParam("sdt"),
                    "MaLoaiKho"=>$this->param->getParam("loaikho"),
                );
            
                $kh = new Model_Khohang();
                $kh->update_data($id_kho, $data);
                echo "<script>window.location.href='".HOST_PROJECT."/index/xem/khohang/true/';</script>";
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
