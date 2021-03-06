<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ln= new Model_Lonhuom();
    $lonhuomall = $ln->getAll();

    if($lonhuomall)
    {
        $maincontent = array();
        $title = array("Mã Lô","Ngày Nhuộm","Màu","Số Cây","Tùy Chỉnh","Trạng Thái");
                    
        $data = new My_Data();
        
        foreach ($lonhuomall as $lonhuom)
        if(!$lonhuom['TrangThai'])
        {
            $mydate = Zend_Locale_Format::getDate($lonhuom['NgayNhuom'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;

            $cm = new Model_Caymoc();
            $caymoc= $cm->getWhere_lonhuom($lonhuom['MaLoNhuom']); 
            $trangthai = "<a class ='thembutton' href='#'/>Sẵn Sàng</a>";
            $content = array(
                $lonhuom['MaLoNhuom'], $date_str, $data->getNameMau($lonhuom['MaMau']),
                $lonhuom['SoCayNhuom'],
                '<a href="'.HOST_PROJECT."/index/xem/lonhuom/true/chinhsua/true/malonhuom/".$lonhuom['MaLoNhuom'].'">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xem/lonhuom/true/xoa/true/malonhuom/".$lonhuom['MaLoNhuom'].'" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
                $trangthai
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"670px");
        echo $table;
    
    }
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Lô Nhuộm";
        echo "</div>";
    }
    ?>