-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 31, 2021 at 03:07 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldiscount`
--

DROP TABLE IF EXISTS `tbldiscount`;
CREATE TABLE IF NOT EXISTS `tbldiscount` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `phantram` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldiscount`
--

INSERT INTO `tbldiscount` (`ID`, `phantram`) VALUES
(1, 10),
(2, 20),
(3, 30),
(4, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tblgiohang`
--

DROP TABLE IF EXISTS `tblgiohang`;
CREATE TABLE IF NOT EXISTS `tblgiohang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MaKH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaSP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuonghang` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `MaSP` (`MaSP`),
  KEY `MaKH` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblhoadon`
--

DROP TABLE IF EXISTS `tblhoadon`;
CREATE TABLE IF NOT EXISTS `tblhoadon` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MaHD` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_GioHang` int(11) NOT NULL,
  `MaSP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaKH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongXuat` int(100) DEFAULT NULL,
  `TrangThaiXuat` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayHD` date NOT NULL,
  `ThanhTien` double NOT NULL,
  PRIMARY KEY (`MaHD`),
  UNIQUE KEY `ID` (`ID`) USING BTREE,
  KEY `id_GioHang` (`id_GioHang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblkhachhang`
--

DROP TABLE IF EXISTS `tblkhachhang`;
CREATE TABLE IF NOT EXISTS `tblkhachhang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MaKH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenDN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenKH` text COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` text COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` text COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiKH` text COLLATE utf8_unicode_ci NOT NULL,
  `SDT` text COLLATE utf8_unicode_ci NOT NULL,
  `EmailKH` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaKH`),
  UNIQUE KEY `ID` (`ID`),
  KEY `TenDN` (`TenDN`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblkhachhang`
--

INSERT INTO `tblkhachhang` (`ID`, `MaKH`, `TenDN`, `TenKH`, `NgaySinh`, `GioiTinh`, `DiaChiKH`, `SDT`, `EmailKH`) VALUES
(6, 'knuw1dMlI', 'nguyenpro1081111', 'Lương Nguyễn111', '', '', '', '', '01689746446az@gmail.com'),
(1, 'mtaheLdE7', 'test123456', 'test1', '2001-03-04', 'Nam', 'QN', '0123456789', 'test1@gmail.com'),
(2, 'TYXqb0WxG', 'tranvantoi', 'Trần Văn Tới', '', '', '', '', 'vantoicntt06@gmail.com'),
(3, 'UyvgbwVvN', 'test345678', 'test3', '', '', '', '', 'test3@gmail.com'),
(4, 'wuS9KVLC4', 'nguyentrungkien', 'Nguyễn Trung Kiên', '', '', '', '', 'kien2k1pro@gmail.com'),
(5, 'ZVEGTC23U', 'test234567', 'test2', '', '', '', '', 'test2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblloaisp`
--

DROP TABLE IF EXISTS `tblloaisp`;
CREATE TABLE IF NOT EXISTS `tblloaisp` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `loaisp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoaiSP` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`loaisp`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblloaisp`
--

INSERT INTO `tblloaisp` (`ID`, `loaisp`, `TenLoaiSP`) VALUES
(1, 'DT01', 'apple'),
(2, 'DT02', 'ViVo'),
(3, 'DT03', 'SamSung'),
(4, 'DT04', 'Xiaomi'),
(7, 'DT05', 'oppo'),
(8, 'DT06', 'huawei'),
(11, 'DT07', 'realme'),
(5, 'PK01', 'Tai Nghe'),
(6, 'PK02', 'Wifi'),
(12, 'PK03', 'chuột'),
(13, 'PK04', 'Ban Phim'),
(14, 'PK05', 'sac du phong');

-- --------------------------------------------------------

--
-- Table structure for table `tblmaxacnhan`
--

DROP TABLE IF EXISTS `tblmaxacnhan`;
CREATE TABLE IF NOT EXISTS `tblmaxacnhan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TenDN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maxacnhan` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblnhacungcap`
--

DROP TABLE IF EXISTS `tblnhacungcap`;
CREATE TABLE IF NOT EXISTS `tblnhacungcap` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MaNCC` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenNCC` text COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiNCC` text COLLATE utf8_unicode_ci NOT NULL,
  `SDTNCC` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `EmailNCC` text COLLATE utf8_unicode_ci NOT NULL,
  `ThongTinThemNCC` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayHopDongNCC` date DEFAULT NULL,
  PRIMARY KEY (`MaNCC`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblnhacungcap`
--

INSERT INTO `tblnhacungcap` (`ID`, `MaNCC`, `TenNCC`, `DiaChiNCC`, `SDTNCC`, `EmailNCC`, `ThongTinThemNCC`, `NgayHopDongNCC`) VALUES
(1, '001IP', 'P/Vũ Tiến', 'Quy Nhơn', '0123456789', 'phamvutien@gmail.com', 'Sản Xuất Điện Thoại', '2022-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `tblsanpham`
--

DROP TABLE IF EXISTS `tblsanpham`;
CREATE TABLE IF NOT EXISTS `tblsanpham` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MaSP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` text COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongSP` int(11) NOT NULL,
  `DonViTinh` text COLLATE utf8_unicode_ci NOT NULL,
  `MaNCC` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GiaDauVao` double NOT NULL,
  `GiaDauRa` double NOT NULL,
  `ThongTinSP` text COLLATE utf8_unicode_ci NOT NULL,
  `HinhSP` text COLLATE utf8_unicode_ci NOT NULL,
  `loaiSP` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `spNB` int(11) NOT NULL,
  `id_discount` int(11) NOT NULL,
  PRIMARY KEY (`MaSP`),
  UNIQUE KEY `ID` (`ID`),
  KEY `MaNCC` (`MaNCC`),
  KEY `loaiSP` (`loaiSP`),
  KEY `id_discount` (`id_discount`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblsanpham`
--

INSERT INTO `tblsanpham` (`ID`, `MaSP`, `TenSP`, `SoLuongSP`, `DonViTinh`, `MaNCC`, `GiaDauVao`, `GiaDauRa`, `ThongTinSP`, `HinhSP`, `loaiSP`, `spNB`, `id_discount`) VALUES
(1, 'SP_5MXKanO', 'Iphone 13', 30, 'cái', '001IP', 23000000, 25000000, '<p>h&agrave;ng mới nhập.</p>\r\n', 'image/dienthoai1.jpg', 'DT01', 1, 0),
(11, 'SP_9AbEa6a', 'phím cơ gamming', 30, 'cái', '001IP', 200000, 300000, '', 'image/banphim1.jpg', 'PK04', 0, 2),
(2, 'SP_dWip1Wo', 'samsung', 30, 'cái', '001IP', 13000000, 15000000, '<p>h&agrave;ng tồn.</p>\r\n', 'image/samsung2.jpg', 'DT03', 1, 1),
(9, 'SP_e1Lr4CR', 'route wife', 10, 'cái', '001IP', 200000, 250000, '', 'image/mang1.jpg', 'PK02', 0, 0),
(4, 'SP_fKshjiu', 'huawei', 10, 'cái', '001IP', 12000000, 14000000, '<p>game mượt</p>\r\n', 'image/maycu52.jpg', 'DT06', 1, 0),
(3, 'SP_hBHkIHg', 'oppo', 30, 'cái', '001IP', 6000000, 700000, '', 'image/oppo12.jpg', 'DT05', 0, 0),
(5, 'SP_JHmnzlM', 'vivo', 10, 'cái', '001IP', 1000000, 1100000, '', 'image/vivo12.jpg', 'DT02', 0, 2),
(7, 'SP_kF9f560', 'realme', 10, 'cái', '001IP', 13000000, 15000000, '', 'image/maycu24.jpg', 'DT07', 0, 0),
(10, 'SP_L5n6Scy', 'chuột logitech', 30, 'cái', '001IP', 120000, 130000, '', 'image/chuot1.jpg', 'PK03', 0, 0),
(8, 'SP_nCH6TUe', 'bluetooth xịn', 20, 'cái', '001IP', 1200000, 1300000, '', 'image/tai-nghe33.jpg', 'PK01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltaikhoan`
--

DROP TABLE IF EXISTS `tbltaikhoan`;
CREATE TABLE IF NOT EXISTS `tbltaikhoan` (
  `TenDN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `LoaiTaiKhoan` text CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`TenDN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbltaikhoan`
--

INSERT INTO `tbltaikhoan` (`TenDN`, `MatKhau`, `Email`, `LoaiTaiKhoan`) VALUES
('Admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'shopmobile.0403@gmail.com', 'Admin'),
('nguyenpro1081111', 'e10adc3949ba59abbe56e057f20f883e', '01689746446az@gmail.com', 'Khách Hàng'),
('nguyentrungkien', 'fcea920f7412b5da7be0cf42b8c93759', 'kien2k1pro@gmail.com', 'Khách Hàng'),
('test123456', 'e10adc3949ba59abbe56e057f20f883e', 'test1@gmail.com', 'Khách Hàng'),
('test234567', '508df4cb2f4d8f80519256258cfb975f', 'test2@gmail.com', 'Khách Hàng'),
('test345678', '5bd2026f128662763c532f2f4b6f2476', 'test3@gmail.com', 'Khách Hàng'),
('tranvantoi', '2e82efb250fd742b21b7d4f868b984f8', 'vantoicntt06@gmail.com', 'Khách Hàng');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblgiohang`
--
ALTER TABLE `tblgiohang`
  ADD CONSTRAINT `tblgiohang_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `tblsanpham` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblgiohang_ibfk_2` FOREIGN KEY (`MaKH`) REFERENCES `tblkhachhang` (`MaKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblhoadon`
--
ALTER TABLE `tblhoadon`
  ADD CONSTRAINT `tblhoadon_ibfk_1` FOREIGN KEY (`id_GioHang`) REFERENCES `tblgiohang` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  ADD CONSTRAINT `tblkhachhang_ibfk_1` FOREIGN KEY (`TenDN`) REFERENCES `tbltaikhoan` (`TenDN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsanpham`
--
ALTER TABLE `tblsanpham`
  ADD CONSTRAINT `tblsanpham_ibfk_1` FOREIGN KEY (`MaNCC`) REFERENCES `tblnhacungcap` (`MaNCC`),
  ADD CONSTRAINT `tblsanpham_ibfk_2` FOREIGN KEY (`loaiSP`) REFERENCES `tblloaisp` (`loaisp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
