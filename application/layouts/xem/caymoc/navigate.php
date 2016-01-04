<?php

    // navigate caymoc

    $param = $this->param->getParams();
    
  
    if(array_key_exists("chonnguyenlieu", $param))
    {
        require_once 'chonnguyenlieu.php';
    }
    else if(array_key_exists("them", $param))
    {
        require_once 'caymoc_them.php';
    }
    else
    {
        require_once 'caymoc_xem.php';
    }