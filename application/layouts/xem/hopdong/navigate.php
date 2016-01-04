<?php

    // navigate hopdong

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'hopdong_chinhsua.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'hopdong_them.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'hopdong_xoa.php';
    }
    else if(array_key_exists("nhapsoi", $param))
    {
        require_once 'nhapsoi.php';
    }
    else
    {
        require_once 'hopdong_xem.php';
    }