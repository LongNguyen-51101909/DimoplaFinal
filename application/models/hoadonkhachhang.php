<?php
class Model_Hoadonkhachhang extends Zend_Db_Table_Abstract
{
    public $_name = "hoadonkhachhang";
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
    
    public function getWhere($mahoadon)
    {
        $se = $this->select()->where("MaHoaDon = ?",$mahoadon);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_khachhang($makhachhang)
    {
        $se = $this->select()->where("MaKhachHang = ?",$makhachhang);
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
    
    public function update_data($mahoadon, $data){
        $kq = $this->update($data, "MaHoaDon = '$mahoadon'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_hoadong($mahoadon){
        $kq = $this->delete("MaHoaDon = '$mahoadon'");
        if($kq)
            return true;
        else
            return false;
    }
}