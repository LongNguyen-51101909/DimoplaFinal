<?php

    // navigate loaivai

    $param = $this->param->getParams();
    
    if(array_key_exists("chinhsua", $param))
    {
        require_once 'loaivai_chinhsua.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'loaivai_them.php';
    }
    else if(array_key_exists("xoa", $param))
    {
        require_once 'loaivai_xoa.php';
    }
    else
    {
        require_once 'loaivai_xem.php';
    }