<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ls= new Model_Loaisoi();
    $loaisoiall = $ls->getAll();
    $data = new My_Data();
    
    if($loaisoiall)
    {
        $maincontent = array();
        $title = array("Tên Sợi","Giá/Tấn","Chỉnh Sửa");
    
        $data = new My_Data();
    
        foreach ($loaisoiall as $loaisoi)
        {
            $tien = $data->convertCurrency($loaisoi['Gia']);
            $content = array(
                $loaisoi['TenSoi'],$tien ,
                '<a href="'.HOST_PROJECT."/index/xem/loaisoi/true/chinhsua/true/masoi/".$loaisoi['MaSoi'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xem/loaisoi/true/xoa/true/masoi/".$loaisoi['MaSoi'].'" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"300px");
        echo $table;
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Loại Sợi";
        echo "</div>";
    }
?>