<?php
    $myparam = $this->param->getParams();
    
    if(array_key_exists('khachhang',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/khachhang.php';
    }
    else if(array_key_exists('donhang',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/donhang.php';
    }
    else if(array_key_exists('hopdong',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/hopdong.php';
    }
//     else if(array_key_exists('makhoisoi',$myparam))
//     {
//         require_once '/caymoc/caymoc_them.php';
//     }
//     else if(array_key_exists('caymoc',$myparam))
//     {
//         require_once '/caymoc/chonnguyenlieu.php';
//     }
    else if(array_key_exists('lonhuom',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/lonhuom.php';
    }
    else if(array_key_exists('taoctp',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/xem/taoctp.php';
    }
    else if(array_key_exists('caythanhpham',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/caythanhpham.php';
    }
    else if(array_key_exists('donxuat',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/donxuat.php';
    }
    else if(array_key_exists('khohang',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/khohang.php';
    }
    else if(array_key_exists('hoadon',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/hoadon.php';
    }
    
    else
        {
            require_once APPLICATION_PATH.'/layouts/nhap/khachhang.php';
        }