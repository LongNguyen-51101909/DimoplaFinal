<?php
echo $this->headMeta();
echo $this->headLink();

    $makho = $this->param->getParam('makho');
    $khohang = new Model_Khohang();
    $khohangrow = $khohang->getWhere($makho);
    $loaikho = new Model_Loaikho();
    $loaikhorow = $loaikho->getWhere($khohangrow['MaLoaiKho']);
    $IsUsed = false;
    switch($loaikhorow['TenLoaiKho']) 
    {
        case "Kho Sợi":
            $khosoi = new Model_Khosoi();
            $khosoirow = $khosoi->getWhere_khohang($makho);
            if($khosoirow)
                $IsUsed = true;
            break;
            
        case "Kho Mộc":
            $caymoc = new Model_Caymoc();
            $caymocrow = $caymoc->getWhere_khomoc($makho);
            if($caymocrow)
                $IsUsed = true;
            break;
            
        case "Kho Thành Phẩm":
            $ctp = new Model_Caythanhpham();
            $caytp = $ctp->getWhere_khohang($makho);
            if($caytp)
                $IsUsed = true;
            break;
    }
    
    if($IsUsed)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa Kho hàng đã được sử dụng!";
        echo "</div>";
    }
    else 
    {
        $khohang = new Model_Khohang();
        $khohang->delete_kho($makho);

        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/khohang/true';</script>";
    }
    
    