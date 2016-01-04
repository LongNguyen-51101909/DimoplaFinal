<?php
    $myparam = $this->param->getParams();
    
    if(array_key_exists('khachhang',$myparam))
    {
        require_once 'khachhang/navigate.php';
    }
    else if(array_key_exists('donhang',$myparam))
    {
        require_once "donhang/navigate.php";
    }
    else if(array_key_exists('hopdong',$myparam))
    {
        require_once "hopdong/navigate.php";
    }
    else if(array_key_exists('caymoc',$myparam))
    {
        require_once "caymoc/navigate.php";
    }
    else if(array_key_exists('lonhuom',$myparam))
    {
        require_once "lonhuom/navigate.php";
    }
    else if(array_key_exists('ctp_detail',$myparam))
    {
        require_once "ctp_detail.php";
    }
    else if(array_key_exists('caythanhpham',$myparam))
    {
        require_once "caythanhpham_xem.php";
    }
    else if(array_key_exists('donxuat',$myparam))
    {
        require_once "donxuat/navigate.php";
    }
    else if(array_key_exists('khohang',$myparam))
    {
        require_once "khohang/navigate.php";
    }
    else if(array_key_exists('hoadon',$myparam))
    {
        require_once "hoadon_xem.php";
    }
    else if(array_key_exists('loaivai',$myparam))
    {
        require_once "loaivai/navigate.php";
    }
    else if(array_key_exists('loaisoi',$myparam))
    {
        require_once "loaisoi/navigate.php";
    }
    else if(array_key_exists('mau',$myparam))
    {
        require_once "mau/navigate.php";
    }
    else if(array_key_exists('nhacungcap',$myparam))
    {
        require_once "ncc/navigate.php";
    }
    else if(array_key_exists('khosoi',$myparam))
    {
        require_once "khosoi.php";
    }
    else if(array_key_exists('chonnhuom',$myparam))
    {
        require_once "/khomoc/chonnhuom.php";
    }
    else if(array_key_exists('chonmoc',$myparam))
    {
        require_once "/khomoc/chonmoc.php";
    }
    else if(array_key_exists('khomoc',$myparam))
    {
        require_once "khomoc/khomoc.php";
    }
    else if(array_key_exists('khotp',$myparam))
    {
        require_once "khotp.php";
    }
    else
    {
        require_once 'khachhang/navigate.php';
    }