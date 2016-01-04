<?php
require_once 'Zend/Loader/Autoloader.php';
// register auto-loader
$loader = Zend_Loader_Autoloader::getInstance();
// Create a new PDF document
const NUM_PAGE_LEFT = 40;

const NUM_PAGE_RIGHT = 1;

const NUM_PAGE_TOP = 830;
$madx = $this->param->getParam("madonxuat");
$modelDx = new Model_Donxuat();
$dataGetDh = $modelDx->getWhere($madx);
// print_r($dataGetDh);
// echo $dataGetDh[0]['MaDonHang'];
$modelDh = new Model_Donhang();
$dataGetKh = $modelDh->getWhere($dataGetDh[0]['MaDonHang']);
// print_r($dataGetKh);
$postMaKH = $dataGetKh['MaKhachHang']; 
// $postMaKH = 1234;
$modelKhachhang = new Model_Khachhang();
$thongtinkh = $modelKhachhang->getByMakh($postMaKH);

$modelCtp = new Model_Caythanhpham();
$thongtinctp = $modelCtp->getByMaDX($madx);

// Thong tin mau
$modelMau = new Model_Mau();
$maMau = $dataGetKh['MaMau'];
$dataMau = $modelMau->getWhereIdMau($maMau);
// print_r($dataMau);
$mau = $dataMau['TenMau'];
// echo "Mã đơn xuất" . $madx;
$sometvai = 0;
$socayvai = sizeof($thongtinctp);
foreach ($thongtinctp as $ctp) {
//     print_r($ctp);
    $sometvai = $sometvai + $ctp['SoMetVai'];
}
// echo $socayvai;
$giatien = $dataGetKh['TienDatHang']/$dataGetKh['SoMetVai'];

try {
    $pdf = new Zend_Pdf();
    
    $page1 = $pdf->newPage(Zend_Pdf_Page::SIZE_A4);
    $page2 = $pdf->newPage(Zend_Pdf_Page::SIZE_A4);
    $page3 = $pdf->newPage(Zend_Pdf_Page::SIZE_A4);
    // Page created, but not included into pages list
    $width = $page1->getWidth(); // 842
    $height = $page1->getHeight(); // 595
                                   
    // Create new Style
    $style = new Zend_Pdf_Style();
    $style->setFillColor(new Zend_Pdf_Color_Rgb(0, 0, 0));
    $style->setLineColor(new Zend_Pdf_Color_GrayScale(0.2));
//     $style->setLineWidth(3);
    $style->setLineDashingPattern(array(
        3,
        2,
        3,
        4
    ), 1.6);
    $fontH = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_COURIER);
    $fontName = $fontH->getFontName(Zend_Pdf_Font::FONT_HELVETICA, 'vi', 'UTF-8');
    $style->setFont($fontH, 12);
    
    $page1->setStyle($style)->drawText('DAI HOC BACH KHOA TP.HO CHI MINH', 180, 800, $charEncoding = 'UTF-8');
    // define image resource
    $image = Zend_Pdf_Image::imageWithPath('./public/image/logo1.png');
    // write image to page
    $page1->drawImage($image, 240, 668, 360, 790);
    $diaChi = "Dia Chi: 268 Lý Thường Kiệt, Phường 9, Quận 10, TP. Hồ Chí Minh";
    $sdt = "SDT: 08 3568256";
    
    $page1->setStyle($style)->drawText($diaChi, 50, 650, $charEncoding = 'UTF-8');
    $page1->setStyle($style)->drawText($sdt, 50, 630, $charEncoding = 'UTF-8');
    $title = "THONG TIN DON XUAT";
    // Create new Style
    $styleTitle = new Zend_Pdf_Style();
    $styleTitle->setFillColor(new Zend_Pdf_Color_Rgb(0, 0, 0));
    $styleTitle->setLineColor(new Zend_Pdf_Color_GrayScale(0.2));
    $styleTitle->setLineWidth(3);
    $styleTitle->setLineDashingPattern(array(
        3,
        2,
        3,
        4
    ), 1.6);
    $fontTitle = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA);
    
    $styleTitle->setFont($fontTitle, 30);
    $page1->setLineWidth(0.5);
    $page1->setLineWidth(0.5)
        ->setStyle($styleTitle)
        ->drawText($title, 130, 600, $charEncoding = 'UTF-8');
    // add footer text
    $page1->setLineWidth(0.5)->drawLine(80, 25, ($page2->getWidth() - 10), 25);
    $page1->drawImage($image, 20, 10, ($image->getPixelWidth()), ($image->getPixelHeight()));
    $page1->setStyle($style)->drawText('Copyright @HCMUT. All rights reserved.', 200, 10);
    $page1->setLineWidth(0.5)->drawLine(40, 580, ($page2->getWidth() - 10), 580);
    // 25 --> 580
    // Thông tin khach hang, Get thông tin theo mã khách hàng. Đơn xuất->Mã Đơn Hàng-> Mã Khách hàng
//     $postMaKH = 1234; // Dữ liệu giả.
//     $modelKhachhang = new Model_Khachhang();
//     $thongtinkh = $modelKhachhang->getByMakh($postMaKH);
    
    foreach ($thongtinkh as $data) {
        $tenkh = $data['TenKhachHang'];
        $diachikh = $data['DiaChi'];
        $sdtkh = $data['SoDienThoai'];
    }
    
    $page1->drawText("Ten Khach hang: " . $tenkh, 50, 560, 'UTF-8');
    $page1->drawText("Dia Chi: " . $diachikh, 50, 540, 'UTF-8');
    $page1->drawText("So Dien Thoai: " . $sdtkh, 50, 520, 'UTF-8');
    $page1->setLineWidth(0.5)->drawLine(40, 500, ($page2->getWidth() - 10), 500);
    // Thong tin don xuat
    // get by ma don xuat = 1
    $postMadx = 1;
    $modelDonXuat = new Model_Donxuat();
    $thongtindx = $modelDonXuat->getWhere($postMadx);
    foreach ($thongtindx as $data) {
        // $tendx = $data['TenDonXuat'];
        $ngayxuat = $data['NgayXuat'];
    }
    

    // $page1->drawText("Ten Don Hàng: " . $tendx, 50, 480, 'UTF-8');
    $page1->drawText("Ngay Xuat: " . $ngayxuat, 50, 460, 'UTF-8');
    $page1->drawText("Tong So Met Vai: " . $sometvai, 50, 440, 'UTF-8');
    $page1->drawText("Tong So Cay Vai: " . $socayvai, 50, 420, 'UTF-8');
    $page1->drawText("Gia Tien Moi Met Vai: ".$giatien, 50, 400, 'UTF-8');
    $page1->setLineWidth(0.5)->drawLine(40, 380, ($page2->getWidth() - 10), 380);
    // Thoong tin cay vai
    $page1->drawText("THONG TIN CAY VAI", 50, 360, 'UTF-8');
    
    // TH table
    $page1->drawLine(40, 350, ($page2->getWidth() - 10), 350);
    $page1->drawText("STT", 50, 340, 'UTF-8');
    $page1->drawText("Ma Cay Vai", 90, 340, 'UTF-8');
    $page1->drawText("Mau", $page1->getWidth() / 3, 340, 'UTF-8');
    $page1->drawText("So Met Vai", $page1->getWidth() / 3 * 2, 340, 'UTF-8');
    $page1->drawLine(40, 150, ($page2->getWidth() - 10), 150);
    // Draw line hornize(doc)
    $page1->setLineWidth(0.5);
    $page1->drawLine(40, 350, 40, 150);
    $page1->drawLine(80, 350, 80, 150);
    $page1->drawLine($page1->getWidth() / 3 - 10, 350, $page1->getWidth() / 3 - 10, 150);
    $page1->drawLine($page1->getWidth() / 3 * 2 - 10, 350, $page1->getWidth() / 3 * 2 - 10, 150);
    $page1->drawLine($page1->getWidth() - 10, 350, $page1->getWidth() - 10, 150);
    // Thoong tin cay vai dua vao thong tin ma don xuat
    // Get information flow MaDonXuat = 1;
    
    $page2Flag = false;
    foreach ($thongtinctp as $data) {
        // print_r($data);
        static $page = 20;
        static $i = 1;
        $mactp = $data['MaCTP'];
        $sometvai = $data['SoMetVai'];
        $y = 340 - $page;
        if ($y > 150) {
            $page1->setStyle($style)
                ->setLineWidth(0.5)
                ->drawLine(40, $y + 10, ($page2->getWidth() - 10), $y + 10)
                ->drawText($i, 50, $y, $charEncoding = 'UTF-8')
                ->drawText($mactp, 90, $y, $charEncoding = 'UTF-8')
                ->drawText($mau, $page1->getWidth() / 3, $y, $charEncoding = 'UTF-8')
                ->drawText($sometvai, $page1->getWidth() / 3 * 2, $y, $charEncoding = 'UTF-8');
            $page = $page + 20;
        } else {
            $page2Flag = true;
            
            static $paged = 20;
            $sy = 840 - $paged;
            $page2->setStyle($style)
                ->setLineWidth(0.5)
                ->drawLine(40, $sy - 10, ($page2->getWidth() - 10), $sy - 10)
                ->drawText($i, 50, $sy, $charEncoding = 'UTF-8')
                ->drawText($mactp, 90, $sy, $charEncoding = 'UTF-8')
                ->drawText($mau, $page2->getWidth() / 3, $sy, $charEncoding = 'UTF-8')
                ->drawText($sometvai, $page2->getWidth() / 3 * 2, $sy, $charEncoding = 'UTF-8');
            $paged = $paged + 20;
        }
        $i ++;
    }
    
    // Draw line hornize(doc)
    if ($page2Flag) {
        $page2->setLineWidth(0.5)
        ->drawLine(40, 830, 40, 150)
        ->drawLine(40, NUM_PAGE_TOP, ($page2->getWidth() - 10), NUM_PAGE_TOP);
        $page2->drawLine(80, 830, 80, 150);
        $page2->drawLine($page2->getWidth() / 3 - 10, 830, $page2->getWidth() / 3 - 10, 150);
        $page2->drawLine($page2->getWidth() / 3 * 2 - 10, 830, $page2->getWidth() / 3 * 2 - 10, 150);
        $page2->drawLine($page2->getWidth() - 10, 830, $page2->getWidth() - 10, 150);
        $page2->drawLine(40, 150, ($page2->getWidth() - 10), 150);
    }

    
    $page2->setStyle($style);
    $page2->setLineWidth(0.5)->drawLine(80, 25, ($page2->getWidth() - 10), 25);
    $page2->drawImage($image, 20, 10, ($image->getPixelWidth()), ($image->getPixelHeight()));
    $page2->drawText('Copyright @HCMUT. All rights reserved.', 200, 10);
    
    $pdf->pages[] = $page1;
    $pdf->pages[] = $page2;
    $pdf->properties['Title'] = 'DIMOPLA-2016';
    $donxuat = "donxuat".$madx;
    $pdf->save($donxuat. '.pdf');
    // $pdf->save('./file.pdf', true);
} catch (Zend_Pdf_Exception $e) {
    die('PDF error: ' . $e->getMessage());
} catch (Exception $e) {
    die('Application error: ' . $e->getMessage());
}
?>
<script type="text/javascript">
    alert("File đã xuất thành công. Lưu ở thư mục project");
</script>
