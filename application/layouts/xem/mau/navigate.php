<?php

    // navigate mau

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'mau_chinhsua.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'mau_them.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'mau_xoa.php';
    }
    else
    {
        require_once 'mau_xem.php';
    }