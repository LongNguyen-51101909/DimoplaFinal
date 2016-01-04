<?php
class Form_Formmoi_Thanhtoan extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formmoi/thanhtoan.phtml')),
                'Form'
        ));
        
        $thanhtoan= $this->createElement('text', 'tienthanhtoan', array('decorators' => array('ViewHelper'),));
        $ngay = $this->createElement('text', 'ngaythanhtoan', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'thanhtoan', array('decorators' => array('ViewHelper'),'label'=>'Thanh Toán'));
        
        $them->setAttrib('class', 'btn btn-primary');
        $thanhtoan->setAttrib('class', 'formEdit');
        
        $this->addElement($ngay)
             ->addElement($thanhtoan)
             ->addElement($them)
             ;
    }
}