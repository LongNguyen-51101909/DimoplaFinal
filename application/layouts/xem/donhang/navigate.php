<?php
    $param = $this->param->getParams();
    
    if(array_key_exists("giaohangf", $param))
    {
        require_once 'giaohang.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'donhang_xoa.php';
    }
    else if(array_key_exists("chinhsua", $param))
    {
        require_once 'donhang_chinhsua.php';
    }
    else if(array_key_exists("donhang", $param))
    {
        require_once 'donhang_xem.php';
    }