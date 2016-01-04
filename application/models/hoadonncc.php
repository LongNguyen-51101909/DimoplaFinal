<?php
class Model_Hoadonncc extends Zend_Db_Table_Abstract
{
    public $_name = "hoadonncc";
    public $_primary = "MaHoaDon";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function getWhere($id_ncc)
    {
        $se = $this->select()->where("MaHoaDon = ?",$id_ncc);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_ncc($mancc)
    {
        $se = $this->select()->where("MaNhaCungCap = ?",$mancc);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function insert_hoadon($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function update_data($MaNcc, $data){
        $kq = $this->update($data, "MaHoaDon = '$MaNcc'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_hoadong($id){
        $kq = $this->delete("MaHoaDon = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}