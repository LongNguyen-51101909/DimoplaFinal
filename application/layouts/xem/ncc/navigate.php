<?php

    // navigate nhacungcap

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'nhacungcap_chinhsua.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'nhacungcap_them.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'nhacungcap_xoa.php';
    }
    else if(array_key_exists("detail", $param))
    {
        require_once 'ncc_detail.php';
    }
    else
    {
        require_once 'nhacungcap_xem.php';
    }