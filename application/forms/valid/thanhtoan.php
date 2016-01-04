<?php
class Form_Valid_Thanhtoan{
    
    public $messages;
    
    public function __construct($data,$tien){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        $date = new Zend_Validate_Date(array('format' => 'dd/MM/yyyy'));
        
        $mydata= new My_Data();
        if($val->isValid($data['ngaythanhtoan'])==false)
            $this->messages[] = "Ngày thanh toán không được trống";
        else if($date->isValid($data['ngaythanhtoan'])==false)
            $this->messages[] = "Ngày thanh toán không đúng";
        
        if($val->isValid($data['tienthanhtoan'])==false)
            $this->messages[] = "Tiền thanh toán không được trống";
        else if($data['tienthanhtoan']<=0)
            $this->messages[] = "Tiền thanh toán phải là số dương";
        else if($num->isValid($data['tienthanhtoan'])==false)
            $this->messages[] = "Tiền thanh toán phải là số";
        else if($data['tienthanhtoan']>$tien)
            $this->messages[] = "Tiền thanh toán không được vượt quá ".($mydata->convertCurrency($tien));
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}