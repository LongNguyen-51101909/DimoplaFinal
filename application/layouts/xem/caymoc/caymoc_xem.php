<?php
    echo $this->headMeta();
    echo $this->headLink();

    $cm= new Model_Caymoc();
    $caymocall = $cm->getAll();
    if($caymocall)
    {    
        $maincontent = array();
        $title = array("Mã Mộc","Loại Vải","Số Mét Vải","Kho Sợi","Kho Mộc");
        
        $loaivai = new Model_Loaivai();
        
        $data = new My_Data();
        $khohang = new Model_Khohang();
        foreach ($caymocall as $caymoc)
        {
            $loaivairow = $loaivai->getWhere($caymoc['MaVai']);
            $khosoirow = $khohang->getWhere($caymoc['MaKhoSoi']);
            $khomocrow = $khohang->getWhere($caymoc['MaKhoMoc']);
            $content = array(
                $caymoc['MaMoc'],$loaivairow['TenLoaiVai'],
                $caymoc['SoMetVai'],$khosoirow['TenKho'],$khomocrow['TenKho'],
            );
            $maincontent[] = $content;
        }
        $table = $data->createTable($title, $maincontent,"600px");
        echo $table;
    }
    
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Cây Mộc";
        echo "</div>";
    }
    
    $mamoc = $this->param->getParam("mamoc");
    ?>

    <?php 
        if($mamoc)
        {
            require_once APPLICATION_PATH.'/layouts/nhap/chonkhomoc.php';
        }
    ?>
    
 
    