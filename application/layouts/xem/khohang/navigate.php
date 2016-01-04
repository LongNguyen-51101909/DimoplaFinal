<?php

    // navigate khohang

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'khohang_chinhsua.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'khohang_them.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'khohang_xoa.php';
    }
    else
    {
        require_once 'khohang_xem.php';
    }