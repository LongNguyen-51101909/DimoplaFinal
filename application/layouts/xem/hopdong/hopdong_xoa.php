<?php
    echo $this->headMeta();
    echo $this->headLink();

    $mahopdong = $this->param->getParam('mahopdong');
    $hopdong = new Model_Hopdong();
    $hopdongrow = $hopdong->getWhere($mahopdong);
    if(!$hopdongrow['TrangThai'])
    {
        $hopdong->delete_hopdong($mahopdong);
        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/hopdong/true';</script>";
    }
    else
    {
        echo "<div class = 'long_message' style='width:500px !important;'>";
        echo "Không thế xóa vì nguyên liệu đã nhập vào kho sợi";
        echo "</div>";
    }
