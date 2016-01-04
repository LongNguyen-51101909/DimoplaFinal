<?php

    // navigate lonhuom

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'lonhuom_chinhsua.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'lonhuom_them.php';
    }
    else if(array_key_exists("lichsu", $param))
    {
        require_once 'lonhuom_lichsu.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'lonhuom_xoa.php';
    }
    else
    {
        require_once 'lonhuom_xem.php';
    }