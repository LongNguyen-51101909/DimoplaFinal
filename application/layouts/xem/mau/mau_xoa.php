<?php
    echo $this->headMeta();
    echo $this->headLink();

    $mamau = $this->param->getParam('mamau');
    
    $lonhuom = new Model_Lonhuom();    
    $lonhuomall = $lonhuom->getWhere_mau($mamau);

    
    if($lonhuomall)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa màu vải đã được dùng để nhuộm!";
        echo "</div>";
    }
    else 
    {
        $mau = new Model_Mau();
        $mau->delete_mau($mamau);
        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/mau/true';</script>";
    }
    
    