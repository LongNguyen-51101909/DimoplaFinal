<?php
class Form_Formmoi_Giaohang extends Zend_Form{
    public function init(){
       
    }
    
    public function createForm($madonhang)
    {
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formmoi/giaohang.phtml')),
                'Form'
        ));
        
        Zend_Session::start();
        $mysession = new Zend_Session_Namespace('XuLyDonHang');
    
        $donhang = $this->createElement('hidden', 'madonhang', array('decorators' => array('ViewHelper'),));
        $ngaygiao = $this->createElement('text', 'ngayxuat', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $them =  $this->createElement('submit', 'giao', array('decorators' => array('ViewHelper'),'label'=>'Tạo Đơn Xuất'));
        
        $ngaygiao->setAttrib('class', 'thanhpham');
        $donhang->setAttrib('class', 'formEdit')->setValue($madonhang);
        $them->setAttrib('class', 'btn btn-primary');
        
        $this->addElement($ngaygiao)
             ->addElement($donhang)
             ->addElement($them)
             ;        
    }
    
    
}
