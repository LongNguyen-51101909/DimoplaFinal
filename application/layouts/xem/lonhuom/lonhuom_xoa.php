<?php
echo $this->headMeta();
echo $this->headLink();

    $malonhuom = $this->param->getParam('malonhuom');

    $ln = new Model_Lonhuom();
    $ln->delete_lonhuom($malonhuom);
    
    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/lonhuom/true';</script>";
    