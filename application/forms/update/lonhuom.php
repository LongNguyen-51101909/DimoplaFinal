<?php
class Form_Update_Lonhuom extends Zend_Form{
    public function createLonhuom(){
        
    }
    
    public function createForm($id_lonhuom)
    {
        $kh = new Model_Lonhuom();
        $lonhuom = $kh->getWhere($id_lonhuom);
    
        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'formmoi/lonhuom_layout.phtml')),
            'Form'
        ));
        $data = new My_Data();
        $opMau = $data->getOptionMau();
       
        $ngaynhuom = $this->createElement('text', 'ngaynhuom', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $mamau = $this->createElement('select', 'mamau', array('decorators' => array('ViewHelper'),'multioptions'=>$opMau));
        $socaynhuom= $this->createElement('text', 'socaynhuom', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh sửa'));
        
        
        $mydate = Zend_Locale_Format::getDate($lonhuom['NgayNhuom'],array("date_format"=>"yyyy.MM.dd"));
        $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
        
        $socaynhuom->setAttrib('class', 'formEdit')->setValue($lonhuom['SoCayNhuom']);
        $ngaynhuom->setAttrib('class', 'formEdit')->setValue($date_str);
        $mamau->setAttrib('class', 'formEdit')->setValue($lonhuom['MaMau']);
        
        $this->addElement($socaynhuom)
             ->addElement($ngaynhuom)
             ->addElement($mamau)
             ->addElement($them)
             ;
    }
}