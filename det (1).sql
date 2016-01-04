-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2016 at 10:04 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `det`
--

-- --------------------------------------------------------

--
-- Table structure for table `caymoc`
--

CREATE TABLE IF NOT EXISTS `caymoc` (
  `MaMoc` int(11) NOT NULL,
  `MaVai` varchar(256) DEFAULT NULL,
  `SoMetVai` float NOT NULL,
  `MaLoNhuom` int(11) NOT NULL,
  `MaCTP` int(11) DEFAULT NULL,
  `MaKhoSoi` int(11) NOT NULL,
  `MaKhoMoc` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `caymoc`
--

INSERT INTO `caymoc` (`MaMoc`, `MaVai`, `SoMetVai`, `MaLoNhuom`, `MaCTP`, `MaKhoSoi`, `MaKhoMoc`) VALUES
(65, '7', 5, 2, 13, 1, 2),
(66, '7', 5, 2, 14, 1, 2),
(67, '7', 5, 2, 15, 1, 2),
(68, '17', 3, 2, 16, 5, 2),
(69, '17', 5, 2, 18, 5, 2),
(70, '17', 2, 1, 7, 5, 2),
(71, '17', 5, 1, 8, 5, 2),
(72, '9', 5, 6, 19, 1, 6),
(73, '9', 5, 6, 20, 1, 6),
(74, '9', 5, 6, 21, 1, 6),
(75, '9', 5, 6, 22, 1, 6),
(76, '9', 5, 0, NULL, 1, 6),
(77, '9', 5, 0, NULL, 1, 6),
(78, '9', 5, 0, NULL, 1, 6),
(79, '9', 5, 0, NULL, 1, 6),
(80, '9', 5, 0, NULL, 1, 6),
(81, '9', 5, 0, NULL, 1, 6),
(82, '9', 5, 1, 9, 1, 2),
(83, '9', 5, 1, 10, 1, 2),
(84, '9', 5, 1, 11, 1, 2),
(85, '9', 5, 1, 12, 1, 2),
(86, '9', 5, 2, 17, 1, 2),
(87, '7', 10, 6, 23, 1, 2),
(88, '7', 10, 6, 24, 1, 2),
(89, '7', 10, 6, 25, 1, 2),
(90, '7', 10, 6, 26, 1, 2),
(91, '7', 10, 6, 27, 1, 2),
(92, '7', 5, 6, 28, 1, 2),
(93, '7', 5, 10, 39, 1, 2),
(94, '7', 5, 10, 40, 1, 2),
(95, '7', 5, 10, 41, 1, 2),
(96, '7', 5, 0, NULL, 1, 2),
(97, '7', 5, 0, NULL, 1, 2),
(98, '7', 5, 0, NULL, 1, 2),
(99, '7', 5, 0, NULL, 1, 2),
(100, '7', 5, 0, NULL, 1, 2),
(101, '7', 5, 0, NULL, 1, 2),
(102, '13', 50, 9, 34, 1, 2),
(103, '13', 49, 9, 35, 1, 2),
(104, '13', 51, 9, 36, 1, 2),
(105, '13', 48, 9, 37, 1, 2),
(106, '13', 50, 9, 38, 1, 2),
(107, '13', 50, 8, 29, 1, 2),
(108, '13', 50, 8, 30, 1, 2),
(109, '13', 49, 8, 31, 1, 2),
(110, '13', 51, 8, 32, 1, 2),
(111, '13', 52, 8, 33, 1, 2),
(112, '7', 7, 0, NULL, 5, 2),
(113, '7', 8, 0, NULL, 5, 2),
(114, '16', 20, 0, NULL, 1, 2),
(115, '16', 20, 0, NULL, 1, 2),
(116, '16', 20, 0, NULL, 1, 2),
(117, '16', 20, 0, NULL, 1, 2),
(118, '16', 20, 0, NULL, 1, 2),
(119, '7', 10, 0, NULL, 5, 2),
(120, '7', 10, 0, NULL, 5, 2),
(121, '7', 10, 0, NULL, 5, 2),
(122, '7', 5, 0, NULL, 1, 2),
(123, '7', 5, 0, NULL, 1, 2),
(124, '7', 5, 0, NULL, 1, 2),
(125, '7', 5, 0, NULL, 1, 2),
(126, '7', 10, 4, 42, 1, 2),
(127, '7', 10, 4, 43, 1, 2),
(128, '7', 10, 4, 44, 1, 2),
(129, '7', 10, 4, 45, 1, 2),
(130, '7', 10, 4, 46, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `caythanhpham`
--

CREATE TABLE IF NOT EXISTS `caythanhpham` (
  `MaCTP` int(11) NOT NULL,
  `SoMetVai` int(11) NOT NULL,
  `MaKhoTP` int(11) DEFAULT NULL,
  `MaDonXuat` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `caythanhpham`
--

INSERT INTO `caythanhpham` (`MaCTP`, `SoMetVai`, `MaKhoTP`, `MaDonXuat`) VALUES
(7, 1, 3, NULL),
(8, 2, 3, NULL),
(9, 3, 3, NULL),
(10, 4, 3, NULL),
(11, 5, 3, NULL),
(12, 6, 3, NULL),
(13, 15, 7, NULL),
(14, 13, 7, NULL),
(15, 51, 7, NULL),
(16, 43, 7, NULL),
(17, 51, 7, NULL),
(18, 34, 7, NULL),
(19, 7, 3, NULL),
(20, 9, 3, NULL),
(21, 6, 3, NULL),
(22, 7, 3, NULL),
(23, 12, 3, 1),
(24, 12, 3, 1),
(25, 10, 3, 3),
(26, 14, 3, 1),
(27, 15, 3, 1),
(28, 8, 3, 3),
(29, 48, 3, 2),
(30, 47, 3, 2),
(31, 49, 3, 2),
(32, 50, 3, 2),
(33, 50, 3, NULL),
(34, 52, 3, NULL),
(35, 48, 3, NULL),
(36, 47, 3, NULL),
(37, 59, 3, NULL),
(38, 54, 3, NULL),
(39, 4, 3, 3),
(40, 4, 3, 3),
(41, 4, 3, 3),
(42, 9, 3, NULL),
(43, 9, 3, NULL),
(44, 9, 3, NULL),
(45, 9, 3, NULL),
(46, 9, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaVai` int(11) NOT NULL,
  `MaMau` int(11) NOT NULL,
  `SoMetVai` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `TienDatHang` bigint(20) NOT NULL,
  `MaKhachHang` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaVai`, `MaMau`, `SoMetVai`, `NgayDat`, `TienDatHang`, `MaKhachHang`) VALUES
(2, 7, 1, 20, '2015-12-22', 5000000, 1234),
(3, 13, 3, 300, '2015-10-22', 5000000, 1234),
(4, 7, 1, 100, '2015-10-22', 3600000, 1234),
(5, 7, 1, 200, '2015-12-22', 7200000, 1235),
(8, 7, 1, 300, '2015-10-23', 10800000, 1235),
(9, 7, 1, 100, '2016-01-04', 3600000, 1241);

-- --------------------------------------------------------

--
-- Table structure for table `donxuat`
--

CREATE TABLE IF NOT EXISTS `donxuat` (
  `MaDonXuat` int(11) NOT NULL,
  `NgayXuat` date NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaVai` int(11) NOT NULL,
  `TongSoMet` int(11) NOT NULL,
  `Gia` bigint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donxuat`
--

INSERT INTO `donxuat` (`MaDonXuat`, `NgayXuat`, `MaDonHang`, `MaVai`, `TongSoMet`, `Gia`) VALUES
(1, '2015-10-22', 2, 7, 53, 36000),
(2, '2015-10-22', 3, 13, 194, 23000),
(3, '2016-01-04', 9, 7, 30, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `hinhthuc`
--

CREATE TABLE IF NOT EXISTS `hinhthuc` (
  `MaHinhThuc` int(11) NOT NULL,
  `TenHinhThuc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hinhthuc`
--

INSERT INTO `hinhthuc` (`MaHinhThuc`, `TenHinhThuc`) VALUES
(3, 'Tiền mặt'),
(4, 'Chuyển khoản');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonkhachhang`
--

CREATE TABLE IF NOT EXISTS `hoadonkhachhang` (
  `MaHoaDon` int(11) NOT NULL,
  `NgayThanhToan` date NOT NULL,
  `SoTien` bigint(20) NOT NULL,
  `MaKhachHang` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadonkhachhang`
--

INSERT INTO `hoadonkhachhang` (`MaHoaDon`, `NgayThanhToan`, `SoTien`, `MaKhachHang`) VALUES
(1, '2012-12-22', 370000, 1234),
(2, '2012-12-22', 1000000, 1234),
(3, '2012-12-22', 1000000, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `hoadonncc`
--

CREATE TABLE IF NOT EXISTS `hoadonncc` (
  `MaHoaDon` int(11) NOT NULL,
  `NgayThanhToan` date NOT NULL,
  `SoTien` bigint(20) NOT NULL,
  `MaNhaCungCap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hopdong`
--

CREATE TABLE IF NOT EXISTS `hopdong` (
  `MaHopDong` int(11) NOT NULL,
  `SoTanSoi` float NOT NULL,
  `ThanhTien` float NOT NULL,
  `NgayMua` date NOT NULL,
  `MaSoi` int(11) NOT NULL,
  `MaKho` int(11) NOT NULL,
  `MaNhaCungCap` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hopdong`
--

INSERT INTO `hopdong` (`MaHopDong`, `SoTanSoi`, `ThanhTien`, `NgayMua`, `MaSoi`, `MaKho`, `MaNhaCungCap`, `TrangThai`) VALUES
(23, 3, 5000000, '2015-10-22', 5, 1, 4, 1),
(24, 5, 6000000, '2014-12-22', 5, 5, 3, 1),
(25, 5, 5000000, '2012-05-22', 5, 1, 4, 1),
(26, 5, 12000000, '2015-12-22', 5, 5, 3, 1),
(27, 2, 3000000, '2015-10-22', 10, 1, 3, 1),
(28, 3, 4500000, '2015-10-22', 8, 5, 4, 1),
(29, 100, 50000000, '2014-12-22', 8, 5, 5, 1),
(30, 5, 5000000, '2015-10-22', 5, 1, 3, 1),
(31, 10, 50000000, '2015-10-22', 5, 5, 3, 1),
(32, 4, 5000000, '2015-10-22', 5, 1, 3, 1),
(33, 8, 50000000, '2014-12-22', 5, 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `MaKhachHang` mediumint(9) NOT NULL,
  `TenKhachHang` varchar(256) NOT NULL,
  `DiaChi` varchar(256) NOT NULL,
  `SoDienThoai` varchar(256) NOT NULL,
  `CongNo` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1242 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKhachHang`, `DiaChi`, `SoDienThoai`, `CongNo`) VALUES
(1234, 'Lê Thanh Mỹ', '123 Trần Hưng Đạo', '4444', 4000000),
(1235, 'Trần Nhật Tân', '123 Nhật Tảo', '092783912833', 0),
(1240, 'Trần Long', '123 Trần Phú', '12345', 0),
(1241, 'Thanh Mỹ Bá', '145 Lý Thường Kiệt, Quận 10, TP.Hồ Chí Minh', '0932467086', 1080000);

-- --------------------------------------------------------

--
-- Table structure for table `khohang`
--

CREATE TABLE IF NOT EXISTS `khohang` (
  `MaKho` int(11) NOT NULL,
  `TenKho` varchar(256) NOT NULL,
  `Diachi` varchar(256) NOT NULL,
  `sdt` varchar(256) DEFAULT NULL,
  `MaLoaiKho` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khohang`
--

INSERT INTO `khohang` (`MaKho`, `TenKho`, `Diachi`, `sdt`, `MaLoaiKho`) VALUES
(1, 'Kho Sợi B', '123 Lý Thái Tổ', '22222', '1'),
(2, 'Kho Mộc', '123 Trần Phú', '2222', '2'),
(3, 'Kho TP B', '123 Trần Phú', '0123234212', '3'),
(5, 'Kho Sợi A', '123 Trần Phú', '0123234212', '1'),
(6, 'Kho Mộc A', '123 Lê Lợi', '0123234212', '2'),
(7, 'Kho TP A', '123 Trần Phú', '0123234212', '3');

-- --------------------------------------------------------

--
-- Table structure for table `khosoi`
--

CREATE TABLE IF NOT EXISTS `khosoi` (
  `MaKhoSoi` int(11) NOT NULL,
  `MaSoi` int(11) NOT NULL,
  `SoTanSoi` float NOT NULL,
  `MaKho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khosoi`
--

INSERT INTO `khosoi` (`MaKhoSoi`, `MaSoi`, `SoTanSoi`, `MaKho`) VALUES
(1, 5, 1, 1),
(2, 5, 20.8, 5),
(3, 10, 0, 1),
(4, 8, 103, 5);

-- --------------------------------------------------------

--
-- Table structure for table `loaikho`
--

CREATE TABLE IF NOT EXISTS `loaikho` (
  `MaLoaiKho` int(11) NOT NULL,
  `TenLoaiKho` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaikho`
--

INSERT INTO `loaikho` (`MaLoaiKho`, `TenLoaiKho`) VALUES
(1, 'Kho Sợi'),
(2, 'Kho Mộc'),
(3, 'Kho Thành Phẩm');

-- --------------------------------------------------------

--
-- Table structure for table `loaisoi`
--

CREATE TABLE IF NOT EXISTS `loaisoi` (
  `MaSoi` int(11) NOT NULL,
  `TenSoi` varchar(256) NOT NULL,
  `Gia` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisoi`
--

INSERT INTO `loaisoi` (`MaSoi`, `TenSoi`, `Gia`) VALUES
(5, 'Sợi Lụa', 30000000),
(6, 'Sợi Mưa', 45000000),
(7, 'Sợi Gân', 25000000),
(8, 'Sợi Kaki', 40000000),
(9, 'Sợi Kate', 10000000),
(10, 'Sợi Sẹc', 25000000),
(11, 'Sợi Ngựa', 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `loaivai`
--

CREATE TABLE IF NOT EXISTS `loaivai` (
  `MaVai` int(11) NOT NULL,
  `TenLoaiVai` varchar(256) NOT NULL,
  `Gia` float NOT NULL,
  `MaSoi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaivai`
--

INSERT INTO `loaivai` (`MaVai`, `TenLoaiVai`, `Gia`, `MaSoi`) VALUES
(7, 'Chéo', 36000, 5),
(8, 'Lụa', 36000, 5),
(9, 'Tuyết', 28000, 5),
(10, 'Mưa', 50000, 6),
(11, 'Gân', 26000, 7),
(12, 'Gân TC', 32000, 7),
(13, 'Siêu Cờ', 23000, 5),
(14, 'Kaki', 60000, 8),
(15, 'Kate', 20000, 9),
(16, 'Sẹc chữ', 25000, 10),
(17, 'Sẹc Trơn', 24000, 10),
(18, 'Me Ngựa', 43000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `lonhuom`
--

CREATE TABLE IF NOT EXISTS `lonhuom` (
  `MaLoNhuom` int(11) NOT NULL,
  `NgayNhuom` date NOT NULL,
  `SoCayNhuom` int(11) NOT NULL,
  `MaMau` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lonhuom`
--

INSERT INTO `lonhuom` (`MaLoNhuom`, `NgayNhuom`, `SoCayNhuom`, `MaMau`, `TrangThai`) VALUES
(1, '2015-03-02', 10, 3, 1),
(2, '2015-03-22', 10, 1, 1),
(3, '2015-12-22', 10, 1, 0),
(4, '2015-05-04', 10, 1, 1),
(5, '2015-03-02', 20, 1, 0),
(6, '2012-03-12', 10, 1, 1),
(8, '2015-03-02', 5, 3, 1),
(9, '2015-05-04', 5, 3, 1),
(10, '2015-05-04', 10, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mau`
--

CREATE TABLE IF NOT EXISTS `mau` (
  `MaMau` int(11) NOT NULL,
  `TenMau` varchar(256) NOT NULL,
  `CongThuc` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mau`
--

INSERT INTO `mau` (`MaMau`, `TenMau`, `CongThuc`) VALUES
(1, 'Xanh Da Trời', '3g màu A+ 5g màu d'),
(2, 'Vàng', '3g màu A+ 5g màu b'),
(3, 'Xanh Lá', '12g đỏ + 5g xanh');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `MaNhaCungCap` int(11) NOT NULL,
  `TenNhaCungCap` varchar(256) NOT NULL,
  `Sdt` varchar(256) NOT NULL,
  `DiaChi` varchar(256) NOT NULL,
  `Fax` varchar(256) NOT NULL,
  `No` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCungCap`, `TenNhaCungCap`, `Sdt`, `DiaChi`, `Fax`, `No`) VALUES
(3, 'Văn Long', '0123234212', '123 Trần Phú', '22222222233', 131000000),
(4, 'Sợi Vĩ Sơn', '0123234212', '123 Lê Lợi', '2314212', 14500000),
(5, 'Đông Phong', '0123234212', '123 Trần Phú', '23142123', 50000000);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE IF NOT EXISTS `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `SoDu` bigint(20) NOT NULL,
  `TongNo` bigint(20) NOT NULL,
  `VonDieuLe` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `SoDu`, `TongNo`, `VonDieuLe`) VALUES
(1, 989995000, -10005000, 1000000000);

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
  `MaUser` int(11) NOT NULL,
  `Ten` varchar(256) NOT NULL,
  `MatKhau` varchar(256) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`MaUser`, `Ten`, `MatKhau`, `Level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'mod', 'mod', 2),
(3, 'user', 'user', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caymoc`
--
ALTER TABLE `caymoc`
  ADD PRIMARY KEY (`MaMoc`);

--
-- Indexes for table `caythanhpham`
--
ALTER TABLE `caythanhpham`
  ADD PRIMARY KEY (`MaCTP`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`);

--
-- Indexes for table `donxuat`
--
ALTER TABLE `donxuat`
  ADD PRIMARY KEY (`MaDonXuat`);

--
-- Indexes for table `hinhthuc`
--
ALTER TABLE `hinhthuc`
  ADD PRIMARY KEY (`MaHinhThuc`);

--
-- Indexes for table `hoadonkhachhang`
--
ALTER TABLE `hoadonkhachhang`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Indexes for table `hoadonncc`
--
ALTER TABLE `hoadonncc`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Indexes for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`MaHopDong`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Indexes for table `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`MaKho`);

--
-- Indexes for table `loaikho`
--
ALTER TABLE `loaikho`
  ADD PRIMARY KEY (`MaLoaiKho`);

--
-- Indexes for table `loaisoi`
--
ALTER TABLE `loaisoi`
  ADD PRIMARY KEY (`MaSoi`);

--
-- Indexes for table `loaivai`
--
ALTER TABLE `loaivai`
  ADD PRIMARY KEY (`MaVai`);

--
-- Indexes for table `lonhuom`
--
ALTER TABLE `lonhuom`
  ADD PRIMARY KEY (`MaLoNhuom`);

--
-- Indexes for table `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`MaMau`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNhaCungCap`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`MaUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caymoc`
--
ALTER TABLE `caymoc`
  MODIFY `MaMoc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `caythanhpham`
--
ALTER TABLE `caythanhpham`
  MODIFY `MaCTP` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `donxuat`
--
ALTER TABLE `donxuat`
  MODIFY `MaDonXuat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hinhthuc`
--
ALTER TABLE `hinhthuc`
  MODIFY `MaHinhThuc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hoadonkhachhang`
--
ALTER TABLE `hoadonkhachhang`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hoadonncc`
--
ALTER TABLE `hoadonncc`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `MaHopDong` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1242;
--
-- AUTO_INCREMENT for table `khohang`
--
ALTER TABLE `khohang`
  MODIFY `MaKho` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `loaikho`
--
ALTER TABLE `loaikho`
  MODIFY `MaLoaiKho` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loaisoi`
--
ALTER TABLE `loaisoi`
  MODIFY `MaSoi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loaivai`
--
ALTER TABLE `loaivai`
  MODIFY `MaVai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `lonhuom`
--
ALTER TABLE `lonhuom`
  MODIFY `MaLoNhuom` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mau`
--
ALTER TABLE `mau`
  MODIFY `MaMau` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNhaCungCap` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `MaUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
