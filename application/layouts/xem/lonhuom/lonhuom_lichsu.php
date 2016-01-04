<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ln= new Model_Lonhuom();
    $lonhuomall = $ln->getAll();

    if($lonhuomall)
    {
        $maincontent = array();
        $title = array("Mã Lô","Ngày Nhuộm","Màu","Số Cây","Trạng Thái");
                    
        $data = new My_Data();
        
        foreach ($lonhuomall as $lonhuom)
        if($lonhuom['TrangThai'])
        {
            $mydate = Zend_Locale_Format::getDate($lonhuom['NgayNhuom'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;

            $cm = new Model_Caymoc();
            $caymoc= $cm->getWhere_lonhuom($lonhuom['MaLoNhuom']); 
            $trangthai = "<a class ='thembutton' href='#'/>Đã Nhuộm</a>";
            $content = array(
                $lonhuom['MaLoNhuom'], $date_str, $data->getNameMau($lonhuom['MaMau']),
                $lonhuom['SoCayNhuom'],
                $trangthai
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"550px");
        echo $table;
    
    }
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Lô Nhuộm";
        echo "</div>";
    }
    ?>