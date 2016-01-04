<?php

    // navigate khachhang

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'khachhang_chinhsua.php';
    }
    else if(array_key_exists("taodonhang", $param))
    {
        require_once 'taodonhang.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'khachhang_them.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'khachhang_xoa.php';
    }
    else if(array_key_exists("detail", $param))
    {
        require_once 'khachhang_detail.php';
    }
    else
    {
        require_once 'khachhang_xem.php';
    }