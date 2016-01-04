<?php
    echo $this->headMeta();
    echo $this->headLink();

    $lv= new Model_Loaivai();
    $loaivaiall = $lv->getAll();
    $lsoi = new Model_Loaisoi();
    $data = new My_Data();

    if($loaivaiall)
    {
        $maincontent = array();
        $title = array("Tên Vải","Giá / Mét","Làm Từ Sợi","Tùy Chỉnh");
    
        $data = new My_Data();
    
        foreach ($loaivaiall as $loaivai)
        {
            $loaisoi = $lsoi->getWhere($loaivai['MaSoi']);
            $tien = $data->convertCurrency($loaivai['Gia']);
    
            $content = array(
                $loaivai['TenLoaiVai'],$tien , $loaisoi['TenSoi'], 
                '<a href="'.HOST_PROJECT."/index/xem/loaivai/true/chinhsua/true/maloaivai/".$loaivai['MaVai'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xem/loaivai/true/xoa/true/maloaivai/".$loaivai['MaVai'].'" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"500px");
        echo $table;
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Loại Vải";
        echo "</div>";
    }
    
?>
