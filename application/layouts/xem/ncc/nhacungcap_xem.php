<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ncc= new Model_Nhacungcap();
    $nhacungcapall = $ncc->getAll();

    if($nhacungcapall)
    {
        $maincontent = array();
        $title = array("Nhà Cung Cấp","Số Điện Thoại","Địa Chỉ","Fax","Nợ","Tùy Chỉnh",);
    
        $data = new My_Data();
    
        foreach ($nhacungcapall as $nhacungcap)
        {
            $ten = "<a href='".HOST_PROJECT."/index/xem/nhacungcap/true/detail/true/mancc/".$nhacungcap['MaNhaCungCap']."/'>".$nhacungcap['TenNhaCungCap']."</a>";
            $tien = $data->convertCurrency($nhacungcap['No']);
            $content = array(
                $ten, $nhacungcap['Sdt'], $nhacungcap['DiaChi'],$nhacungcap['Fax'],$tien,
                '<a href="'.HOST_PROJECT."/index/xem/nhacungcap/true/chinhsua/true/mancc/".$nhacungcap['MaNhaCungCap'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xem/nhacungcap/true/xoa/true/mancc/".$nhacungcap['MaNhaCungCap'].'" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"750px");
        echo $table;
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Nhà Cung Cấp";
        echo "</div>";
    }
?>
