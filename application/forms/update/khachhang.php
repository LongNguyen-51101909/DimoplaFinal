<?php
class Form_Update_Khachhang extends Zend_Form{
    public function init(){
        
    }
    
    public function createForm($makhachhang)
    {
        $kh = new Model_Khachhang();
        $khachhang = $kh->getWhere($makhachhang);
    
        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/khachhang_layout.phtml')),
                'Form'
        ));
    
        
        $ten= $this->createElement('text', 'ten', array('decorators' => array('ViewHelper'),));
        $sdt = $this->createElement('text', 'sdt', array('decorators' => array('ViewHelper'),));
        $diachi =  $this->createElement('text', 'diachi', array('decorators' => array('ViewHelper'),));
        $them = $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh Sửa'));
        
        $ten->setAttrib('class', 'formEdit')
        ->setValue($khachhang['TenKhachHang']);
        $sdt->setAttrib('class', 'formEdit')
        ->setValue($khachhang['SoDienThoai']);
        $diachi->setAttrib('class', 'formEdit')
        ->setValue($khachhang['DiaChi']);
        
        $this->addElement($ten)
        ->addElement($sdt)
        ->addElement($diachi)
        ->addElement($them);
    }
}