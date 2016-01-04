<?php
    echo $this->headMeta();
    echo $this->headLink();

    $kh= new Model_Khachhang();
    $khachhang = $kh->getAll();
?>

<?php 
if($khachhang != false){
    $data = new My_Data();
    $title = array("Tên Khách Hàng","Số Điện Thoại","Địa Chỉ","Công Nợ","Tùy Chỉnh","Tạo Đơn Hàng");
    $maincontent = array();
    foreach ($khachhang as $item)
    {
        $thanhtoan = "<a class ='thembutton' href='".HOST_PROJECT."/index/xem/khachhang/true/thanhtoan/true/makhachhang/".$item['MaKhachHang']."'/>Nhập Kho</a>";
        $taodonhang ="<a class ='thembutton' href='".HOST_PROJECT."/index/xem/khachhang/true/taodonhang/true/makhachhang/".$item['MaKhachHang']."'/>Tạo Đơn Hàng</a>";
        $tien = $data->convertCurrency($item['CongNo']);
        $content = array(
            "<a href='".HOST_PROJECT."/index/xem/khachhang/true/detail/true/makhachhang/".$item['MaKhachHang']."/'>".$item['TenKhachHang']."</a>",
    
            $item['SoDienThoai'],
            $item['DiaChi'],
            $tien,
            '<a href="'.HOST_PROJECT."/index/xem/khachhang/true/chinhsua/true/makhachhang/".$item["MaKhachHang"].'">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xem/khachhang/true/xoa/true/makhachhang/".$item["MaKhachHang"].'" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            '<button type="button" class="btn btn-primary"><a class ="axem" href="'.HOST_PROJECT."/index/xem/khachhang/true/taodonhang/true/makhachhang/".$item['MaKhachHang'].'/">Tạo Đơn Hàng</a>',
        );
        $maincontent[] = $content;
    }
    
    
    $table = $data->createTable($title,$maincontent,"800px");
    echo $table;
}    
else 
{
    echo "<div class='message'>";
    echo "Chưa tồn tại Khách Hàng";
    echo "</div>";
}
?>
