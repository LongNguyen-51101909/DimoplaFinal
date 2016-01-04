<?php
class Form_Formmoi_Donhang extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formmoi/donhang_layout.phtml')),
                'Form'
        ));
        
        $data = new My_Data();
        $opvai = $data->getOptionLoaiVai();
        $opmau = $data->getOpMau();
        
        $mavai= $this->createElement('select', 'mavai', array('multioptions'=>$opvai,'decorators' => array('ViewHelper'),));
        $mamau= $this->createElement('select', 'mamau', array('multioptions'=>$opmau,'decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $ngaydathang = $this->createElement('text', 'ngaydathang', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        //$tiendathang = $this->createElement('text', 'tiendathang', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));

        $mavai->setAttrib('class', 'formEdit');//->setValue($khohang['TenKho']);
        $mamau->setAttrib('class', 'formEdit');//->setValue($khohang['TenKho']);
        
        $this->addElement($mavai)
             ->addElement($mamau)
             ->addElement($sometvai)
             ->addElement($ngaydathang)
             //->addElement($tiendathang)
             ->addElement($them)
             ;
    }
    
    public function updateform($madonhang)
    {
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'formmoi/donhang_layout.phtml')),
            'Form'
        ));
        
        $data = new My_Data();
        $opvai = $data->getOptionLoaiVai();
        $opmau = $data->getOpMau();
        
        $mavai= $this->createElement('select', 'mavai', array('multioptions'=>$opvai,'decorators' => array('ViewHelper'),));
        $mamau= $this->createElement('select', 'mamau', array('multioptions'=>$opmau,'decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $ngaydathang = $this->createElement('text', 'ngaydathang', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh Sửa'));
        
        $donhang = new Model_Donhang();
        $donhangrow = $donhang->getWhere($madonhang);
        
        $mydate = Zend_Locale_Format::getDate($donhangrow['NgayDat'],array("date_format"=>"yyyy.MM.dd"));
        $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
        
        $mavai->setAttrib('class', 'formEdit')->setValue($donhangrow['MaVai']);
        $mamau->setAttrib('class', 'formEdit')->setValue($donhangrow['MaMau']);
        $sometvai->setAttrib('class', 'formEdit')->setValue($donhangrow['SoMetVai']);
        $ngaydathang->setAttrib('class', 'formEdit')->setValue($date_str);
        
        $this->addElement($mavai)
        ->addElement($mamau)
        ->addElement($sometvai)
        ->addElement($ngaydathang)
        ->addElement($them)
        ;
    }
}