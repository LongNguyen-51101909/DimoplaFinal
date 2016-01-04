<?php

    // navigate donxuat

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'donxuat_chinhsua.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'donxuat_them.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'donxuat_xoa.php';
    }
    else if(array_key_exists("xuatfile", $param))
    {
        require_once 'xuatfile.php';
    }
    else
    {
        require_once 'donxuat_xem.php';
    }