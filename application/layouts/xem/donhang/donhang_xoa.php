<?php
echo $this->headMeta();
echo $this->headLink();

    $madonhang = $this->param->getParam('madonhang');
    $donhang = new Model_Donhang();
    $donhang->delete_donhang($madonhang);
    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/donhang/true';</script>";
    
    