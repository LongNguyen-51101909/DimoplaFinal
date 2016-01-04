<?php

    // navigate loaisoi

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'loaisoi_chinhsua.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'loaisoi_them.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'loaisoi_xoa.php';
    }
    else
    {
        require_once 'loaisoi_xem.php';
    }