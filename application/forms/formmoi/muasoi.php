<?php

class Form_Formmoi_MuaSoi extends Zend_Form
{

    public function init()
    {
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
            array(
                'ViewScript',
                array(
                    'viewScript' => 'formmoi/muasoi_layout.phtml'
                )
            ),
            'Form'
        ));
        
        $data = new My_Data();
        $opSoi = $data->getOptionLoaiSoi();
        $opNCC = $data->getOptionNCC();
        $opKhoSoi = $data->getOpKhoSoi();
        
        $nhacungcap = $this->createElement('select', 'nhacungcap', array(
            'multioptions' => $opNCC,
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $loaisoi = $this->createElement('select', 'loaisoi', array(
            'multioptions' => $opSoi,
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $sotansoi = $this->createElement('text', 'sotansoi', array(
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $ngaymua = $this->createElement('text', 'ngaymua', array(
            'decorators' => array(
                'ViewHelper'
            ),
            'data-type' => 'date'
        ));
        $tongtien = $this->createElement('text', 'thanhtien', array(
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $nhapkhosoi = $this->createElement('select', 'nhapkhosoi', array(
            'multioptions' => $opKhoSoi,
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $them = $this->createElement('submit', 'them', array(
            'decorators' => array(
                'ViewHelper'
            ),
            'label' => 'Thêm'
        ));
        
        $nhacungcap->setAttrib('class', 'formEdit');
        $loaisoi->setAttrib('class', 'formEdit');
        $nhapkhosoi->setAttrib('class', 'formEdit');
        
        $this->addElement($nhacungcap)
            ->addElement($loaisoi)
            ->addElement($sotansoi)
            ->addElement($tongtien)
            ->addElement($ngaymua)
            ->addElement($nhapkhosoi)
            ->addElement($them);
    }

    public function updateform($mahopdong)
    {
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
            array(
                'ViewScript',
                array(
                    'viewScript' => 'formmoi/muasoi_layout.phtml'
                )
            ),
            'Form'
        ));
        
        $data = new My_Data();
        $opSoi = $data->getOptionLoaiSoi();
        $opNCC = $data->getOptionNCC();
        $opKhoSoi = $data->getOpKhoSoi();
        
        $nhacungcap = $this->createElement('select', 'nhacungcap', array(
            'multioptions' => $opNCC,
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $loaisoi = $this->createElement('select', 'loaisoi', array(
            'multioptions' => $opSoi,
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $sotansoi = $this->createElement('text', 'sotansoi', array(
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $ngaymua = $this->createElement('text', 'ngaymua', array(
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $tongtien = $this->createElement('text', 'thanhtien', array(
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $nhapkhosoi = $this->createElement('select', 'nhapkhosoi', array(
            'multioptions' => $opKhoSoi,
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $them = $this->createElement('submit', 'them', array(
            'decorators' => array(
                'ViewHelper'
            ),
            'label' => 'Chỉnh Sửa'
        ));
        
        $hopdong = new Model_Hopdong();
        $hopdongrow = $hopdong->getWhere($mahopdong);
        
        $mydate = Zend_Locale_Format::getDate($hopdongrow['NgayMua'], array(
            "date_format" => "yyyy.MM.dd"
        ));
        $date_str = $mydate['day'] . "/" . $mydate['month'] . "/" . $mydate['year'];
        
        $nhacungcap->setAttrib('class', 'formEdit')->setValue($hopdongrow['MaNhaCungCap']);
        $loaisoi->setAttrib('class', 'formEdit')->setValue($hopdongrow['MaSoi']);
        $sotansoi->setValue($hopdongrow['SoTanSoi']);
        $ngaymua->setValue($date_str);
        $tongtien->setValue($hopdongrow['ThanhTien']);
        $nhapkhosoi->setAttrib('class', 'formEdit')->setValue($hopdongrow['MaSoi']);
        
        $this->addElement($nhacungcap)
            ->addElement($loaisoi)
            ->addElement($sotansoi)
            ->addElement($tongtien)
            ->addElement($ngaymua)
            ->addElement($nhapkhosoi)
            ->addElement($them);
    }
}