-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 12:59 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnmart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anh`
--

CREATE TABLE IF NOT EXISTS `anh` (
  `PK_iMaAnh` int(11) NOT NULL,
  `sLink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FK_sMaSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anh`
--

INSERT INTO `anh` (`PK_iMaAnh`, `sLink`, `FK_sMaSP`) VALUES
(1, 'assets/anhsanpham/tao-gala-size-100-125-xx-my_15675868371.jpg', 'MSP003'),
(2, 'assets/anhsanpham/tao-gala-size-100-125-xx-my_15675868373.jpg', 'MSP003'),
(3, 'assets/anhsanpham/tao-gala-size-100-125-xx-my_15675868374.jpg', 'MSP003'),
(4, 'assets/anhsanpham/banh-mochi-tron-dai-loan-mix-4-vi_15694047181.jpg', 'MSP004'),
(5, 'assets/anhsanpham/banh-mochi-tron-dai-loan-mix-4-vi_15694047182.jpeg', 'MSP004'),
(6, 'assets/anhsanpham/banh-mochi-tron-dai-loan-mix-4-vi_15694047183.jpg', 'MSP004'),
(7, 'assets/anhsanpham/banh-mochi-tron-dai-loan-mix-4-vi_15694047184.jpg', 'MSP004'),
(8, 'assets/anhsanpham/mit-giong-thai_15694659881.jpg', 'MSP005'),
(9, 'assets/anhsanpham/mit-giong-thai_15694659882.jpg', 'MSP005'),
(10, 'assets/anhsanpham/mit-giong-thai_15694659883.jpg', 'MSP005'),
(11, 'assets/anhsanpham/mit-giong-thai_15694659884.jpg', 'MSP005'),
(12, 'assets/anhsanpham/nho-den-khong-hat-uc_15694667891.jpg', 'MSP007'),
(13, 'assets/anhsanpham/nho-den-khong-hat-uc_15694667892.jpg', 'MSP007'),
(14, 'assets/anhsanpham/nho-den-khong-hat-uc_15694667893.jpg', 'MSP007'),
(15, 'assets/anhsanpham/nho-den-khong-hat-uc_15694667894.jpg', 'MSP007'),
(28, 'assets/anhsanpham/nuoc-dau-sua-vfresh-hop-180ml_15677400601.jpg', 'MSP008'),
(29, 'assets/anhsanpham/nuoc-dau-sua-vfresh-hop-180ml_15712183322.png', 'MSP008'),
(30, 'assets/anhsanpham/nuoc-dau-sua-vfresh-hop-180ml_15712183323.jpg', 'MSP008'),
(31, 'assets/anhsanpham/nuoc-hat-e-vi-dau-18-khong-gas-chai-300ml_15731107431.jpg', 'MSP009'),
(32, 'assets/anhsanpham/nuoc-hat-e-vi-dau-18-khong-gas-chai-300ml_15731107432.jpg', 'MSP009'),
(33, 'assets/anhsanpham/nuoc-hat-e-vi-dau-18-khong-gas-chai-300ml_15731109043.jpg', 'MSP009'),
(35, 'assets/anhsanpham/nuoc-giai-khat-co-gas-mirinda-vi-soda-kem-lon-330ml_15731111651.jpg', 'MSP010'),
(36, 'assets/anhsanpham/nuoc-giai-khat-co-gas-mirinda-vi-soda-kem-lon-330ml_15731111652.jpg', 'MSP010'),
(37, 'assets/anhsanpham/nuoc-giai-khat-co-gas-mirinda-vi-soda-kem-lon-330ml_15731111653.jpg', 'MSP010'),
(38, 'assets/anhsanpham/nuoc-giai-khat-co-gas-mirinda-vi-soda-kem-lon-330ml_15743051014.jpg', 'MSP010'),
(39, 'assets/anhsanpham/nuoc-ep-tao-nam-viet-quat-100-marigold-hop-1l_15731114321.jpg', 'MSP011'),
(40, 'assets/anhsanpham/nuoc-ep-tao-nam-viet-quat-100-marigold-hop-1l_15731114322.jpg', 'MSP011'),
(41, 'assets/anhsanpham/nuoc-dau-sua-vfresh-hop-180ml_15778638393.jpg', 'MSP011'),
(43, 'assets/anhsanpham/sua-dau-nanh-dau-do-vinamilk-loc-4-hop-x-180ml_15743042241.jpg', 'MSP012'),
(44, 'assets/anhsanpham/sua-dau-nanh-dau-do-vinamilk-loc-4-hop-x-180ml_15743049142.jpg', 'MSP012'),
(45, 'assets/anhsanpham/sua-dau-nanh-dau-do-vinamilk-loc-4-hop-x-180ml_15743049143.jpg', 'MSP012'),
(46, 'assets/anhsanpham/sua-dau-nanh-dau-do-vinamilk-loc-4-hop-x-180ml_15743049144.jpg', 'MSP012'),
(47, 'assets/anhsanpham/kem-so-co-la-hanh-nhan-celano-hop-400ml_15848616211.png', 'MSP013'),
(48, 'assets/anhsanpham/kem-so-co-la-hanh-nhan-celano-hop-400ml_15758967572.jpg', 'MSP013'),
(49, 'assets/anhsanpham/kem-so-co-la-hanh-nhan-celano-hop-400ml_15848616213.png', 'MSP013'),
(50, 'assets/anhsanpham/kem-so-co-la-hanh-nhan-celano-hop-400ml_15758967574.jpg', 'MSP013'),
(51, 'assets/anhsanpham/bach-tuoc-tuoi_15848620521.png', 'MSP014'),
(52, 'assets/anhsanpham/bach-tuoc-tuoi_15848620522.png', 'MSP014'),
(53, 'assets/anhsanpham/bach-tuoc-tuoi_15848620523.png', 'MSP014'),
(54, 'assets/anhsanpham/bach-tuoc-tuoi_15848620524.png', 'MSP014'),
(59, 'assets/anhsanpham/banh-quy-oreo-kem-vani-hop-352.8g_15760307111.jpg', 'MSP002'),
(60, 'assets/anhsanpham/banh-quy-oreo-kem-vani-hop-352.8g_15760307112.jpg', 'MSP002'),
(61, 'assets/anhsanpham/banh-quy-oreo-kem-vani-hop-352.8g_15760307113.jpg', 'MSP002'),
(62, 'assets/anhsanpham/banh-quy-oreo-kem-vani-hop-352.8g_15760307114.jpg', 'MSP002'),
(71, 'assets/anhsanpham/tao-gala-size-100-125-xx-my_15845141164.jpg', 'MSP003'),
(72, 'assets/anhsanpham/banh-quy-cheese-cracker-gery-garudafood-hop-300g_15845171481.jpg', 'MSP001'),
(73, 'assets/anhsanpham/banh-quy-cheese-cracker-gery-garudafood-hop-300g_15845171482.jpg', 'MSP001'),
(74, 'assets/anhsanpham/banh-quy-cheese-cracker-gery-garudafood-hop-300g_15845171483.jpg', 'MSP001'),
(75, 'assets/anhsanpham/banh-quy-cheese-cracker-gery-garudafood-hop-300g_15845171484.jpg', 'MSP001'),
(76, 'assets/anhsanpham/ga-ta-nguyen-con-cp_15846859381.jpg', 'MSP015'),
(77, 'assets/anhsanpham/ga-ta-nguyen-con-cp_15846859382.jpg', 'MSP015'),
(78, 'assets/anhsanpham/ga-ta-nguyen-con-cp_15846859383.jpg', 'MSP015'),
(79, 'assets/anhsanpham/ga-ta-nguyen-con-cp_15846859384.jpg', 'MSP015'),
(80, 'assets/anhsanpham/ca-dieu-hong-tuoi_15846862741.jpg', 'MSP016'),
(81, 'assets/anhsanpham/ca-dieu-hong-tuoi_15846862742.jpg', 'MSP016'),
(82, 'assets/anhsanpham/ca-dieu-hong-tuoi_15846862743.jpg', 'MSP016'),
(83, 'assets/anhsanpham/ca-dieu-hong-tuoi_15846862744.jpg', 'MSP016'),
(84, 'assets/anhsanpham/trung-ga-dha-dabaco-hop-10-qua_15846867221.jpg', 'MSP017'),
(85, 'assets/anhsanpham/trung-ga-dha-dabaco-hop-10-qua_15846867222.jpg', 'MSP017'),
(86, 'assets/anhsanpham/trung-ga-dha-dabaco-hop-10-qua_15846867223.jpg', 'MSP017'),
(87, 'assets/anhsanpham/trung-ga-dha-dabaco-hop-10-qua_15846867224.jpg', 'MSP017'),
(88, 'assets/anhsanpham/banh-tipo-huu-nghi-tra-xanh-hop-90g_15846874181.jpg', 'MSP018'),
(89, 'assets/anhsanpham/banh-tipo-huu-nghi-tra-xanh-hop-90g_15846874182.jpg', 'MSP018'),
(90, 'assets/anhsanpham/banh-tipo-huu-nghi-tra-xanh-hop-90g_15846874183.jpg', 'MSP018'),
(91, 'assets/anhsanpham/banh-tipo-huu-nghi-tra-xanh-hop-90g_15846876134.jpg', 'MSP018'),
(92, 'assets/anhsanpham/tra-sua-matcha-lipton-hop-136g-8-tui-x-17g_15846880091.jpg', 'MSP019'),
(93, 'assets/anhsanpham/tra-sua-matcha-lipton-hop-136g-8-tui-x-17g_15846880092.jpg', 'MSP019'),
(94, 'assets/anhsanpham/tra-sua-matcha-lipton-hop-136g-8-tui-x-17g_15846880093.jpg', 'MSP019'),
(95, 'assets/anhsanpham/tra-sua-matcha-lipton-hop-136g-8-tui-x-17g_15846880094.jpg', 'MSP019'),
(96, 'assets/anhsanpham/ca-phe-passiona-g7-trung-nguyen-hop-224g_15846883341.jpg', 'MSP020'),
(97, 'assets/anhsanpham/ca-phe-passiona-g7-trung-nguyen-hop-224g_15846883342.jpg', 'MSP020'),
(98, 'assets/anhsanpham/ca-phe-passiona-g7-trung-nguyen-hop-224g_15846883343.jpg', 'MSP020'),
(99, 'assets/anhsanpham/ca-phe-passiona-g7-trung-nguyen-hop-224g_15846883344.jpg', 'MSP020'),
(100, 'assets/anhsanpham/xoai-dai-loan-trai-dai_15846887481.jpg', 'MSP021'),
(101, 'assets/anhsanpham/xoai-dai-loan-trai-dai_15846887482.jpg', 'MSP021'),
(102, 'assets/anhsanpham/xoai-dai-loan-trai-dai_15846887483.jpg', 'MSP021'),
(103, 'assets/anhsanpham/xoai-dai-loan-trai-dai_15846887484.jpg', 'MSP021'),
(108, 'assets/anhsanpham/banh-quy-marie-cosy-kinh-do-goi-450g-432g_15847819141.jpg', 'MSP023'),
(109, 'assets/anhsanpham/banh-quy-marie-cosy-kinh-do-goi-450g-432g_15847819142.jpg', 'MSP023'),
(110, 'assets/anhsanpham/banh-quy-marie-cosy-kinh-do-goi-450g-432g_15847819143.jpg', 'MSP023'),
(111, 'assets/anhsanpham/banh-quy-marie-cosy-kinh-do-goi-450g-432g_15847819144.jpg', 'MSP023');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE IF NOT EXISTS `binhluan` (
  `PK_iMaBL` int(11) NOT NULL,
  `sNoiDungBL` text COLLATE utf8_unicode_ci NOT NULL,
  `dThoiGianBL` date NOT NULL,
  `FK_sMaSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_iMaTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`PK_iMaBL`, `sNoiDungBL`, `dThoiGianBL`, `FK_sMaSP`, `FK_iMaTaiKhoan`) VALUES
(1, 'Nho ngon lắm, sẽ ủng hộ shop nữa', '2020-03-10', 'MSP007', 4),
(3, 'Test bình luận', '2020-03-18', 'MSP007', 5),
(4, 'Sản phẩm tốt, sẽ ủng hộ tiếp', '2020-03-19', 'MSP007', 11),
(6, 'Ngon lắm, hihi', '2020-03-19', 'MSP005', 4),
(7, 'Sản phẩm chất lượng. Cảm ơn tnmart nhé!', '2020-03-21', 'MSP005', 17);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `FK_sMaDonHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_sMaSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `iSoLuong` int(11) NOT NULL,
  `fDonGia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`FK_sMaDonHang`, `FK_sMaSP`, `iSoLuong`, `fDonGia`) VALUES
('MDH001', 'MSP005', 1, 0),
('MDH003', 'MSP007', 2, 195300),
('MDH003', 'MSP011', 1, 36900),
('MDH003', 'MSP014', 2, 77200),
('MDH005', 'MSP002', 1, 47600),
('MDH005', 'MSP011', 1, 36900),
('MDH005', 'MSP014', 2, 77200),
('MDH006', 'MSP003', 4, 69900),
('MDH006', 'MSP005', 3, 32800),
('MDH006', 'MSP007', 2, 195300),
('MDH006', 'MSP008', 3, 35000),
('MDH006', 'MSP014', 1, 77200),
('MDH007', 'MSP007', 1, 195300),
('MDH007', 'MSP013', 1, 58400),
('MDH011', 'MSP005', 1, 32800),
('MDH011', 'MSP007', 2, 195300),
('MDH012', 'MSP002', 1, 47600),
('MDH012', 'MSP007', 2, 195300),
('MDH015', 'MSP001', 1, 50600),
('MDH015', 'MSP004', 1, 125000),
('MDH015', 'MSP005', 1, 32800),
('MDH015', 'MSP007', 1, 195300),
('MDH015', 'MSP008', 1, 35000),
('MDH015', 'MSP013', 2, 58400),
('MDH017', 'MSP007', 2, 195300),
('MDH017', 'MSP012', 2, 26400),
('MDH017', 'MSP015', 1, 82900),
('MDH017', 'MSP018', 1, 21300),
('MDH017', 'MSP021', 3, 27600),
('MDH018', 'MSP007', 1, 195300),
('MDH018', 'MSP013', 1, 58400),
('MDH019', 'MSP001', 1, 50600),
('MDH019', 'MSP007', 1, 195300),
('MDH019', 'MSP013', 2, 58400),
('MDH019', 'MSP018', 2, 21300),
('MDH020', 'MSP014', 1, 149900),
('MDH020', 'MSP015', 1, 82900);

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE IF NOT EXISTS `chitietphieunhap` (
  `FK_sMaPN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_sMaSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `iSoLuongNhap` int(11) NOT NULL,
  `fDonGiaNhap` float NOT NULL,
  `dNgaySanXuat` date NOT NULL,
  `dHanSuDung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`FK_sMaPN`, `FK_sMaSP`, `iSoLuongNhap`, `fDonGiaNhap`, `dNgaySanXuat`, `dHanSuDung`) VALUES
('MPN001', 'MSP005', 300, 90000, '2020-02-22', '2020-06-25'),
('MPN002', 'MSP007', 50, 50000, '2020-03-27', '2020-05-30'),
('MPN003', 'MSP004', 35, 56788, '2020-01-01', '2020-05-16'),
('MPN003', 'MSP007', 100, 160000, '2020-01-09', '2020-05-30'),
('MPN004', 'MSP003', 210, 45500, '2020-01-10', '2020-04-10'),
('MPN005', 'MSP002', 232, 40000, '0000-00-00', '0000-00-00'),
('MPN005', 'MSP008', 50, 32000, '0000-00-00', '0000-00-00'),
('MPN006', 'MSP002', 100, 34000, '0000-00-00', '0000-00-00'),
('MPN006', 'MSP009', 140, 4000, '0000-00-00', '0000-00-00'),
('MPN007', 'MSP003', 150, 45000, '0000-00-00', '0000-00-00'),
('MPN008', 'MSP001', 125, 45500, '0000-00-00', '0000-00-00'),
('MPN008', 'MSP003', 12, 45600, '0000-00-00', '0000-00-00'),
('MPN009', 'MSP004', 225, 100000, '0000-00-00', '0000-00-00'),
('MPN010', 'MSP002', 5, 48000, '2019-12-25', '2020-04-05'),
('MPN010', 'MSP010', 145, 7800, '2020-02-14', '2020-07-09'),
('MPN011', 'MSP011', 235, 25000, '0000-00-00', '0000-00-00'),
('MPN011', 'MSP013', 230, 55000, '0000-00-00', '0000-00-00'),
('MPN011', 'MSP014', 125, 47000, '0000-00-00', '0000-00-00'),
('MPN011', 'MSP015', 100, 77000, '0000-00-00', '0000-00-00'),
('MPN012', 'MSP012', 240, 25000, '2020-01-01', '2020-07-19'),
('MPN012', 'MSP016', 120, 90000, '2020-01-31', '2020-04-02'),
('MPN012', 'MSP017', 35, 23000, '2020-02-13', '2020-04-05'),
('MPN012', 'MSP018', 150, 23500, '2020-01-20', '2020-04-30'),
('MPN013', 'MSP001', 10, 35000, '2019-03-04', '2020-03-31'),
('MPN013', 'MSP019', 150, 41000, '2020-03-03', '2020-05-23'),
('MPN013', 'MSP020', 230, 40000, '2020-01-15', '2020-08-30'),
('MPN013', 'MSP021', 215, 25000, '2020-02-14', '2020-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE IF NOT EXISTS `danhgia` (
  `PK_iMaDG` int(11) NOT NULL,
  `sNoiDungDG` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iDiemSo` int(11) NOT NULL,
  `FK_sMaSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_iMaTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`PK_iMaDG`, `sNoiDungDG`, `iDiemSo`, `FK_sMaSP`, `FK_iMaTaiKhoan`) VALUES
(1, 'Đánh giá 5*', 5, 'MSP007', 4),
(2, 'Đánh giá 5*', 5, 'MSP007', 5),
(3, 'Đánh giá 4*', 4, 'MSP005', 4),
(4, 'Đánh giá 5*', 5, 'MSP014', 4),
(5, 'Đánh giá 3*', 3, 'MSP007', 11),
(6, 'Đánh giá 2*', 2, 'MSP005', 11),
(8, 'Đánh giá 5*', 5, 'MSP002', 4),
(9, 'Đánh giá 5*', 5, 'MSP005', 17),
(10, 'Đánh giá 5*', 5, 'MSP021', 17);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `PK_sMaDonHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dNgayLap` date NOT NULL,
  `sThanhToan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sThoiGianXuLy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FK_iMaTrangThai` int(11) NOT NULL,
  `FK_iMaHinhThuc` int(11) NOT NULL,
  `FK_iMaThongTinGH` int(11) NOT NULL,
  `FK_iMaTaiKhoan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`PK_sMaDonHang`, `dNgayLap`, `sThanhToan`, `sThoiGianXuLy`, `FK_iMaTrangThai`, `FK_iMaHinhThuc`, `FK_iMaThongTinGH`, `FK_iMaTaiKhoan`) VALUES
('MDH001', '2020-02-11', 'Chưa thanh toán', '', 5, 1, 2, 1),
('MDH003', '2020-02-20', 'Đã thanh toán', '', 4, 1, 3, 2),
('MDH005', '2020-02-22', 'Đã thanh toán', '', 5, 1, 3, 3),
('MDH006', '2020-02-22', 'Chưa thanh toán', '', 3, 1, 3, 6),
('MDH007', '2020-02-22', 'Chưa thanh toán', '', 3, 1, 3, 1),
('MDH011', '2020-03-10', 'Chưa thanh toán', '', 2, 2, 4, 2),
('MDH012', '2020-03-18', 'Đã thanh toán', '', 4, 1, 1, 3),
('MDH015', '2020-03-19', 'Đã thanh toán', '', 4, 1, 4, 6),
('MDH017', '2020-03-20', 'Đã thanh toán', '', 4, 1, 12, 1),
('MDH018', '2020-03-20', 'Chưa thanh toán', '', 5, 2, 12, 1),
('MDH019', '2020-03-22', 'Chưa thanh toán', '', 2, 1, 20, 2),
('MDH020', '2020-03-23', 'Chưa đặt hàng', '', 1, 1, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hinhthucthanhtoan`
--

CREATE TABLE IF NOT EXISTS `hinhthucthanhtoan` (
  `PK_iMaHinhThuc` int(11) NOT NULL,
  `sTenHinhThuc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sMoTa` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinhthucthanhtoan`
--

INSERT INTO `hinhthucthanhtoan` (`PK_iMaHinhThuc`, `sTenHinhThuc`, `sMoTa`) VALUES
(1, 'Thanh toán khi nhận hàng', 'Quý khách sẽ thanh toán bằng tiền mặt khi nhận được hàng từ TnMart'),
(2, 'Thanh toán qua ngân hàng NCB', 'Quý khách sẽ thực hiện thanh toán qua ngân hàng NCB');

-- --------------------------------------------------------

--
-- Table structure for table `huysanpham`
--

CREATE TABLE IF NOT EXISTS `huysanpham` (
  `PK_iMaHuySP` int(11) NOT NULL,
  `dNgaySanXuat` date NOT NULL,
  `dHanSuDung` date NOT NULL,
  `dNgayHuySP` date NOT NULL,
  `iSoLuongHuy` int(11) NOT NULL,
  `sNguoiHuy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_sMaSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `PK_sMaKM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sTenKM` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`PK_sMaKM`, `sTenKM`) VALUES
('MKM001', 'Khuyến mại giảm giá'),
('MKM002', 'Khuyến mại tặng kèm');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai_sp`
--

CREATE TABLE IF NOT EXISTS `khuyenmai_sp` (
  `PK_sMaKM_SP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dThoiGianBD` date NOT NULL,
  `dThoiGianKT` date NOT NULL,
  `sNoiDungKM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `iSoLuongApDung` int(11) NOT NULL,
  `FK_sMaKM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_sMaSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
  `PK_sMaND` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sAnhDaiDien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sTenNguoiDung` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dNgaySinh` date DEFAULT NULL,
  `sGioiTinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sDienThoai` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sCMND` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sDiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sQueQuan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sHoKhau` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`PK_sMaND`, `sAnhDaiDien`, `sTenNguoiDung`, `dNgaySinh`, `sGioiTinh`, `sDienThoai`, `sCMND`, `sEmail`, `sDiaChi`, `sQueQuan`, `sHoKhau`) VALUES
('MND001', 'assets/img/avatars/tuyen-do.jpeg', 'admin', '1998-10-22', 'Nữ', '0353924400', '122233344', 'dotuyen221098@gmail.com', 'Hoàng Mai - Hà Nội', 'Bắc Giang', 'Lạng Giang - Bắc Giang'),
('MND002', 'assets/img/avatars/totoro.gif', 'Thành Nguyễn Duy', '1998-05-07', 'Nam', '0961787598', '122765489', 'ndthanh.7598@gmail.com', 'Hoàng Mai - Hà Nội', 'Mê Linh', 'Phúc Yên - Vĩnh Phúc'),
('MND003', 'assets/img/avatars/thopink_1584945014.png', 'Hồng Đỗ Thị', '2001-09-05', 'Nữ', '0343641916', '125678932', 'hongdothi0509@gmail.com', 'Quang Thịnh - Lạng Giang - Bắc Giang', 'Bắc Giang', 'Lạng Giang - Bắc Giang'),
('MND004', 'assets/img/avatars/nhung-tuyen-do.jpg', 'Nhung Tuyên Đỗ', '1998-10-22', 'Nữ', '0967888280dv', '120345212', 'nhungtuyendo@gmail.com', 'Hà Nội', 'Bắc Giang', 'Bắc Giang'),
('MND005', 'assets/img/avatars/thuy-thu.png', 'Thuý Thu', '1998-09-06', 'Nữ', '0968478845', '123444678', 'nguyenthithuy6998@gmail.com', 'Nam Định', 'Nam Định', 'Nam Định'),
('MND006', 'assets/img/avatars/totoro_1584945038.png', 'Minh Anh', '2015-10-12', 'Nữ', '0967854789', '333444555', 'minhanh@gmail.com', 'Hà Nội', 'BG', 'BG'),
('MND007', 'assets/img/avatars/bodangyeu_1584944997.jpg', 'Triệu Minh Khôi', '2019-07-16', 'Nam', '0987654321', '123456789', 'minhkhoi@gmail.com', 'An Hà - Lạng Giang - Bắc Giang', 'Nam Định', 'BG'),
('MND008', 'assets/img/avatars/nam_1584944984.jpg', 'Triệu Minh Khang', '2019-07-16', 'Nam', '0987654321', '112456333', 'minhkhang@gmail.com', 'An Hà - Lạng Giang - Bắc Giang', 'Bắc Giang', 'Lạng Giang - Bắc Giang'),
('MND009', 'assets/img/avatars/pikachu_1584944974.jpg', 'Đỗ Thị Thu Huyền', '1995-08-28', 'Nữ', '0976543123', '122786543', 'huyendo@gmail.com', 'Lạng Giang - Bắc Giang', 'Bắc Giang', 'Bắc Giang'),
('MND010', 'assets/img/avatars/nobita_1584944964.png', 'Đỗ Văn Tuấn', '1992-12-24', 'Nam', '0343641916', '122454555', 'tuando.haui@gmail.com', 'Bắc Giang', 'Bắc Giang', 'Bắc Giang'),
('MND011', 'assets/img/avatars/gaugau_1584944953.webp', 'Nguyễn Văn Minh', '1994-05-07', 'Nam', '0234567897', '123432123', 'vanminh@gmail.com', 'Hà Nội', 'Thái Bình', 'Thái Bình'),
('MND012', 'assets/img/avatars/khoaitay_1584944943.jpg', 'Nguyễn Minh Huy', '1994-05-07', 'Nam', '0353924400', '122543678', 'minhhuy@gmail.com', 'Mê Linh', 'Hà Nội', 'Hà Nội'),
('MND013', 'assets/img/avatars/doremon_1584944932.jpg', 'Tuyên Đỗ Thị', '1998-10-22', 'Nữ', '0353924400', '123456789', 'tuyen221098@gmail.com', '96B Định Công, Hoàng Mai, Hà Nội', 'Bắc Giang', 'Lạng Giang - Bắc Giang'),
('MND014', 'assets/img/avatars/hihi_1584944913.png', 'Nguyễn Thị Kim Ngân', '1994-11-25', 'Nữ', '0961787598', '123432222', 'ngannguyen@gmail.com', 'Mê Linh', 'Mê Linh', 'Vĩnh Phúc'),
('MND015', 'assets/img/avatars/daube_1584944898.jpg', 'Đỗ Tuyết Nhung', '1998-10-22', 'Nữ', '0353924400', '123456789', 'do.thi.tuyen@sun-asterisk.com', '96 Định Công - Hoàng Mai - Hà Nội', 'Bắc Giang', 'Bắc Giang'),
('MND016', 'assets/img/avatars/nguyen-tuan-anh.jpg', 'Nguyễn Tuấn Anh', '1996-10-12', 'Nam', '0987654321', '123321111', 'tuananh@gmail.com', 'Hà Nội', 'Hà Nội', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `PK_sMaNCC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sTenNCC` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sLogoNCC` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sSoDienThoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sDiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`PK_sMaNCC`, `sTenNCC`, `sLogoNCC`, `sSoDienThoai`, `sDiaChi`, `sEmail`) VALUES
('NCC001', 'Công Ty TNHH Thực Phẩm Hoàng Đông', 'assets/img/nhacungcap/1569381961.gif', '0982341260', 'Phòng 201, Nhà C6 Mai Động, Hoàng Mai, Hà Nội', 'ngochuyhd@gmail.com'),
('NCC002', 'Công Ty Cổ Phần Bánh Kẹo Hải Châu', 'assets/img/nhacungcap/1568877907.gif', '0987654321', 'Vĩnh Tuy - Hai Bà Trưng - Hà Nội', 'haichau@gmail.com'),
('NCC003', 'Công Ty Cổ Phần Vilaconic', 'assets/img/nhacungcap/1568878249.gif', '0986778999', 'Số 9, Nguyễn Khoái, P.1, Q. 4, TP. Hồ Chí Minh', 'vilaconic@gmail.com'),
('NCC004', 'Công Ty TNHH An Đại Hải', 'assets/img/nhacungcap/1584783499.png', '0963902699', 'Niệm Nghĩa, Lê Chân, TP. Hải Phòng', 'ctyandaihai@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `PK_sMaNSX` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sTenNSX` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sLogoNSX` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sSoDienThoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sDiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`PK_sMaNSX`, `sTenNSX`, `sLogoNSX`, `sSoDienThoai`, `sDiaChi`, `sEmail`) VALUES
('NSX001', 'Công ty xuất Thực phẩm Tân Việt', 'assets/img/avatars/cty_tanviet.jpg', '0397086390', 'Tân Việt, TP. Hồ Chí Minh', 'tanviet@gmail.com'),
('NSX002', 'Công Ty TNHH Thực Phẩm Thương Mại Thành Lợi', 'assets/img/nhasanxuat/1569314236.gif', '0982023338', 'Thôn Đỗ Xá, X.Yên Thường, H.Gia Lâm, Hà Nội', 'thanhloi8668@gmail.com'),
('NSX003', 'Nhà máy sữa Dutch Lady (Sữa Cô Gái Hà Lan)', 'assets/img/nhasanxuat/1584783275.jpg', '0937739067', '497/6 Sư vạn Hạnh, P12, Q10, TP HCM', 'info@hvac.vn'),
('NSX004', 'Công ty cổ phần Kinh Đô', 'assets/img/nhasanxuat/1584783212.png', '0347326062', 'Hai Bà Trưng, Phường Đa Kao, Quận 1, TP.HCM', 'Customercare.MKD@mdlz.com');

-- --------------------------------------------------------

--
-- Table structure for table `nhomdanhmuc`
--

CREATE TABLE IF NOT EXISTS `nhomdanhmuc` (
  `PK_iMaNhomDM` int(11) NOT NULL,
  `sTenNhomDM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sTrangThai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomdanhmuc`
--

INSERT INTO `nhomdanhmuc` (`PK_iMaNhomDM`, `sTenNhomDM`, `sTrangThai`) VALUES
(1, 'Danh mục sản phẩm', 'Có menu con'),
(2, 'Sản phẩm', 'Không có menu con'),
(3, 'Giới thiệu', 'Không có menu con'),
(4, 'Tin tức', 'Có menu con'),
(5, 'Liên hệ', 'Không có menu con');

-- --------------------------------------------------------

--
-- Table structure for table `nhomsanpham`
--

CREATE TABLE IF NOT EXISTS `nhomsanpham` (
  `PK_sMaNhomSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sTenNhomSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sAnhQC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sTrangThai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_iMaNhomDM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomsanpham`
--

INSERT INTO `nhomsanpham` (`PK_sMaNhomSP`, `sTenNhomSP`, `sAnhQC`, `sTrangThai`, `FK_iMaNhomDM`) VALUES
('NSP001', 'Quầy thực phẩm tươi', 'assets/img/slider/quay-thuc-pham-tuoi_1569385176.png', 'show', 1),
('NSP002', 'Quầy rau quả sạch', 'assets/img/slider/banner_coltab.png', 'show', 1),
('NSP003', 'Quầy đồ uống', 'assets/img/slider/slider_drink.png', 'show', 1),
('NSP004', 'Quầy bánh kẹo', NULL, 'show', 1),
('NSP005', 'Tin nổi bật hot', NULL, 'hidden', 4);

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE IF NOT EXISTS `phieunhap` (
  `PK_sMaPN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dNgaynhap` date NOT NULL,
  `FK_iMaTaiKhoan` int(11) NOT NULL,
  `FK_sMaNCC` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`PK_sMaPN`, `dNgaynhap`, `FK_iMaTaiKhoan`, `FK_sMaNCC`) VALUES
('MPN001', '2019-10-17', 1, 'NCC001'),
('MPN002', '2019-10-03', 2, 'NCC003'),
('MPN003', '2019-10-15', 3, 'NCC002'),
('MPN004', '2019-10-16', 1, 'NCC001'),
('MPN005', '2020-01-29', 6, 'NCC004'),
('MPN006', '2020-03-03', 1, 'NCC003'),
('MPN007', '2020-03-09', 1, 'NCC004'),
('MPN008', '2020-03-18', 2, 'NCC002'),
('MPN009', '2020-03-20', 6, 'NCC002'),
('MPN010', '2020-03-20', 1, 'NCC004'),
('MPN011', '2020-03-20', 18, 'NCC003'),
('MPN012', '2020-03-20', 7, 'NCC004'),
('MPN013', '2020-03-20', 3, 'NCC001');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE IF NOT EXISTS `quyen` (
  `PK_iMaQuyen` int(11) NOT NULL,
  `sTenQuyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`PK_iMaQuyen`, `sTenQuyen`) VALUES
(1, 'Quản lý'),
(2, 'Khách hàng'),
(3, 'Bán hàng'),
(4, 'Kế toán');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `PK_sMaSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sTenSP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fGiaSP` float NOT NULL,
  `sMoTa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sThongTinSP` text COLLATE utf8_unicode_ci NOT NULL,
  `sAnhDaiDien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sDonViTinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FK_sMaNhomSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FK_sMaNSX` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`PK_sMaSP`, `sTenSP`, `fGiaSP`, `sMoTa`, `sThongTinSP`, `sAnhDaiDien`, `sDonViTinh`, `FK_sMaNhomSP`, `FK_sMaNSX`) VALUES
('MSP001', 'Bánh quy Cheese Cracker Gery GarudaFood hộp 300g', 50600, 'Chất lượng hoàn hảo, thơm ngon, bổ dưỡng . Được sản xuất bởi công nghệ hiện đại, an toàn và tốt cho sức khỏe. Đóng hợp tiện lợi, dễ dàng sử dụng và bảo quản', '<p>B&aacute;nh quy Cheese Cracker Grey GarudaFood được sản xuất theo c&ocirc;ng nghệ hiện đại, mọi kh&acirc;u từ tuyển chọn nguy&ecirc;n liệu tới chế biến, đ&oacute;ng g&oacute;i đều diễn ra kh&eacute;p k&iacute;n dưới sự gi&aacute;m s&aacute;t v&agrave; kiểm tra nghi&ecirc;m ngặt. Sản phẩm kh&ocirc;ng chứa h&oacute;a chất, chất bảo quản độc hại, đảm bảo an to&agrave;n cho sức khỏe người ti&ecirc;u d&ugrave;ng. Sản phẩm c&oacute; hương vị thơm ngon của những nguy&ecirc;n liệu tự nhi&ecirc;n được chọn lọc kỹ c&agrave;ng, sẽ mang lại cho bạn những ph&uacute;t giải tr&iacute; v&agrave; thưởng thức thật tuyệt vời b&ecirc;n cạnh bạn b&egrave; hoặc người th&acirc;n. B&aacute;nh thường được d&ugrave;ng trong bữa s&aacute;ng hoặc bữa ăn nhẹ để bổ sung dinh dưỡng, gi&uacute;p cơ thể lu&ocirc;n sẵn s&agrave;ng năng lượng cho c&aacute;c hoạt động h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/1752bd6b0342f81ca153.jpg" /><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/1112.jpg" style="height:820px; width:820px" /></p>\r\n\r\n<p>B&aacute;nh quy Cheese Cracker Grey GarudaFood được đ&oacute;ng hộp lịch sự, k&iacute;n đ&aacute;o gi&uacute;p lưu giữ trọn vẹn độ gi&ograve;n thơm của sản phẩm. Ngo&agrave;i d&ugrave;ng trong gia đ&igrave;nh, bạn cũng c&oacute; thể sử dụng b&aacute;nh để l&agrave;m qu&agrave; tặng trong những dịp lễ, Tết hay mang theo nh&acirc;m nhi trong những chuyến du lịch, d&atilde; ngoại. Sản phẩm do VinMart ph&acirc;n phối lu&ocirc;n mang đến chất lượng tốt nhất cho người ti&ecirc;u d&ugrave;ng.</p>\r\n', 'assets/anhsanpham/banh-quy-cheese-cracker-gery-garudafood-hop-300g_1584517148.jpg', 'hộp', 'NSP004', 'NSX001'),
('MSP002', 'Bánh quy Oreo kem vani hộp 352.8g', 50000, '', '<p style="text-align:justify"><strong><a href="https://www.adayroi.com/banh-quy-c701" target="_blank">B&aacute;nh quy</a>&nbsp;<a href="https://www.adayroi.com/oreo-br1251" target="_blank">Oreo</a>&nbsp;kem vani</strong>&nbsp;được sản xuất tr&ecirc;n d&acirc;y chuyền c&ocirc;ng nghệ hiện đại,&nbsp;<strong>đảm bảo vệ sinh an to&agrave;n thực phẩm</strong>. C&aacute;c nguy&ecirc;n liệu ch&iacute;nh được l&agrave;m từ bột m&igrave;, đường, dầu thực vật kh&ocirc;ng hydro h&oacute;a, bột cacao, chất tạo xốp, bột bắp, muối&hellip; mang lại hương vị b&aacute;nh thơm ngon c&ugrave;ng&nbsp;<strong>lớp kem vani tươi m&aacute;t&nbsp;</strong>cho bạn những trải nghiệm mới ngay từ lần thưởng thức đầu ti&ecirc;n. B&aacute;nh th&iacute;ch hợp d&ugrave;ng l&agrave;m&nbsp;<strong>đồ ăn vặt, bữa ăn s&aacute;ng</strong>&nbsp;k&egrave;m với ly sữa hoặc cacao gi&uacute;p bạn bổ sung năng lượng cho ng&agrave;y mới.</p>\n\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/oreo2.jpg" style="float:left; height:460px; width:460px" /></p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify">&nbsp;</p>\n\n<p style="text-align:justify"><strong><a href="https://www.adayroi.com/banh-quy-c701" target="_blank">B&aacute;nh quy</a>&nbsp;<a href="https://www.adayroi.com/oreo-br1251" target="_blank">Oreo</a>&nbsp;kem vani</strong>&nbsp;l&agrave; nguồn&nbsp;<strong>cung cấp c&aacute;c kho&aacute;ng chất v&agrave; Vitamin</strong>&nbsp;thiết yếu cho cơ thể. Sản phẩm được sản xuất theo c&ocirc;ng nghệ hiện đại, kh&ocirc;ng chứa h&oacute;a chất, chất bảo quản độc hại,&nbsp;<strong>đảm bảo an to&agrave;n cho sức khỏe</strong>&nbsp;người ti&ecirc;u d&ugrave;ng. Sản phẩm được&nbsp;<strong>đ&oacute;ng hộp đẹp mắt</strong>, tiện lợi khi sử dụng v&agrave;&nbsp;<strong>dễ d&agrave;ng mang theo trong những chuyến du lịch</strong>, d&atilde; ngoại hoặc th&ecirc;m v&agrave;o c&aacute;c giỏ qu&agrave; biếu, tặng bạn b&egrave;, người th&acirc;n v&agrave;o c&aacute;c dịp đặc biệt.</p>\n', 'assets/anhsanpham/banh-quy-oreo-kem-vani-hop-352.8g_1568858986.jpg', 'hộp', 'NSP004', 'NSX002'),
('MSP003', 'Táo Gala Size 100-125 (Xx My)', 69900, 'Thịt táo mịn, nhiều nước, vị ngọt đậm.', '<p>T&aacute;o được ca ngợi l&agrave; &ldquo;vua tr&aacute;i c&acirc;y&rdquo; v&agrave; rất được nhiều người ưa chuộng. Trong t&aacute;o c&oacute; chứa nhiều th&agrave;nh phần vitamin C, lượng pectin đ&aacute;p ứng nhu cầu h&agrave;ng ng&agrave;y. Kh&ocirc;ng những thế t&aacute;o c&ograve;n chứa kho&aacute;ng chất boron - gi&uacute;p xương cứng c&aacute;p mạnh mẽ, nhiều antioxidants - chất bảo vệ tim, tăng sức đề kh&aacute;ng v&agrave; chống một số loại ung thư.&nbsp;</p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/tao-gala-size-100-125-xx-my_15675868373.jpg" style="height:820px; width:820px" />Thịt t&aacute;o mịn, nhiều nước v&agrave; ngọt đặc biệt. Sản phẩm t&aacute;o c&oacute; lớp vỏ m&agrave;u đỏ đậm qu&yacute; ph&aacute;i hay thỉnh thoảng l&agrave; đỏ pha sắc v&agrave;ng. Phần thịt t&aacute;o c&oacute; m&agrave;u trắng kem c&oacute; sức chịu oxy h&oacute;a cao. Quy tr&igrave;nh canh t&aacute;c t&aacute;o Pinata ho&agrave;n to&agrave;n hữu cơ, kh&ocirc;ng chứa chất bảo quản, kh&ocirc;ng h&oacute;a chất, đảm bảo an to&agrave;n tuyệt đối cho người sử dụng.</p>\r\n', 'assets/anhsanpham/tao-gala-size-100-125-xx-my_1567678831.jpg', 'kg', 'NSP002', 'NSX002'),
('MSP004', 'Bánh mochi tròn Đài Loan mix 4 vị', 125000, 'Là loại bánh truyền thống của Nhật Bản.', '<p>B&aacute;nh mochi Đ&agrave;i Loan hộp 2kg đ&atilde; mix sẵn 4 vị vừng đen, vừng trắng, khoai m&ocirc;n, đậu đỏ ăn cực ngon lu&ocirc;n ạ.</p>\r\n\r\n<p>B&aacute;nh mềm mại c&ugrave;ng lớp nh&acirc;n d&agrave;y n&ecirc;n ăn m&atilde;i kh&ocirc;ng thấy ng&aacute;n.</p>\r\n\r\n<p>- Xuất xứ: Đ&agrave;i Loan</p>\r\n\r\n<p>- Đ&oacute;ng g&oacute;i: Hộp 2kg (68-70c)</p>\r\n\r\n<p>- HSD: 6 th&aacute;ng</p>\r\n', 'assets/anhsanpham/banh-mochi-tron-dai-loan-mix-4-vi_1569404718.jpg', 'hộp', 'NSP004', 'NSX002'),
('MSP005', 'Mít giống thái', 32800, 'Hương vị đặc trưng thơm ngon, hấp dẫn.', '<p style="text-align: justify;"><span style="color:rgb(51, 51, 51); font-family:roboto,helvetica neue,helvetica,arial,sans-serif">M&iacute;t l&agrave; loại tr&aacute;i c&acirc;y&nbsp;</span><span style="color:rgb(51, 51, 51); font-family:roboto,helvetica neue,helvetica,arial,sans-serif">phổ biến ở Việt Nam. C&oacute; rất nhiều giống m&iacute;t kh&aacute;c nhau, nhưng&nbsp;</span><strong>m&iacute;t giống Th&aacute;i</strong><span style="color:rgb(51, 51, 51); font-family:roboto,helvetica neue,helvetica,arial,sans-serif">&nbsp;l&agrave; giống m&iacute;t c&oacute; chất lượng&nbsp;nổi trội hơn cả.&nbsp;</span><strong>M&iacute;t giống Th&aacute;i</strong><span style="color:rgb(51, 51, 51); font-family:roboto,helvetica neue,helvetica,arial,sans-serif">&nbsp;rất &iacute;t xơ, nhiều m&uacute;i, m&uacute;i to, d&agrave;y, m&ugrave;i thơm nhẹ tho&aacute;ng m&ugrave;i dầu chuối, cơm m&agrave;u v&agrave;ng cam, thịt mịn, gi&ograve;n, ngọt m&aacute;t, khi ăn kh&ocirc;ng bị d&iacute;nh tay v&agrave; miệng.</span></p>\r\n\r\n<p><span style="color:rgb(51, 51, 51); font-family:roboto,helvetica neue,helvetica,arial,sans-serif"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/1(1).jpg" style="height:475px; width:675px" /></span></p>\r\n\r\n<h4 style="text-align: justify;">M&iacute;t v&agrave; những gi&aacute; trị dinh dưỡng tốt cho sức khỏe</h4>\r\n\r\n<p style="text-align: justify;">Về gi&aacute; trị dinh dưỡng, trong thịt m&uacute;i m&iacute;t ch&iacute;n c&oacute; protein 0.6 - 1.5%, glucid 11 - 14% (bao gồm nhiều đường đơn như fructose, glucose, cơ thể dễ hấp thụ), caroten, vitamin C, B2...&nbsp;v&agrave; c&aacute;c chất kho&aacute;ng như sắt, canxi, phốt pho... Do đ&oacute;, kh&ocirc;ng chỉ l&agrave; một m&oacute;n tr&aacute;ng miệng thơm ngon m&agrave;&nbsp;<strong>m&iacute;t giống Th&aacute;i</strong><strong>&nbsp;</strong>c&ograve;n l&agrave; loại tr&aacute;i c&acirc;y c&oacute; nhiều lợi &iacute;ch cho sức khỏe. Bạn c&oacute; thể bỏ&nbsp;t&aacute;ch m&uacute;i m&iacute;t ăn trực tiếp hay x&eacute; sợi cho v&agrave;o ch&egrave;, tr&aacute;i c&acirc;y dầm hoặc d&ugrave;ng để l&agrave;m m&oacute;n x&ocirc;i m&iacute;t, kem m&iacute;t đều rất thơm ngon.</p>\r\n\r\n<h4 style="text-align: justify;">Hướng dẫn sử dụng</h4>\r\n\r\n<p style="text-align: justify;">D&ugrave;ng ăn trực tiếp hoặc chế biến c&aacute;c m&oacute;n x&ocirc;i, ch&egrave;.</p>\r\n', 'assets/anhsanpham/mit-giong-thai_1569465988.jpg', 'kg', 'NSP002', 'NSX002'),
('MSP007', 'Nho đen không hạt Úc', 195300, 'Sản phẩm được nhập khẩu trực tiếp từ Úc', '<p><strong>Nho đen kh&ocirc;ng hạt</strong><span style="color:rgb(51, 51, 51); font-family:roboto,helvetica neue,helvetica,arial,sans-serif">&nbsp;được nhập khẩu trực tiếp từ &Uacute;c, đ&atilde; trải qua kiểm định chất lượng kỹ c&agrave;ng trước khi vận chuyển, đảm bảo độ tươi ngon khi đưa đến tay người ti&ecirc;u d&ugrave;ng. Sản phẩm sạch&nbsp;tự nhi&ecirc;n, kh&ocirc;ng chứa chất bảo quản, n&ecirc;n bạn c&oacute; thể ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m sử dụng.&nbsp;</span><strong>Nho đen kh&ocirc;ng hạt&nbsp;</strong><span style="color:rgb(51, 51, 51); font-family:roboto,helvetica neue,helvetica,arial,sans-serif">c&oacute; quả m&agrave;u đỏ tươi, vỏ mỏng, vị ngọt. Với sản phẩm, bạn c&oacute; thể d&ugrave;ng ăn trực tiếp, &eacute;p lấy nước hoặc sử dụng l&agrave;m b&aacute;nh, sinh tố... đặc biệt nước nho &eacute;p cũng chứa rất nhiều chất dinh dưỡng c&oacute; t&aacute;c dụng chống ung thư v&agrave; c&aacute;c bệnh về tim mạch hiệu quả.</span></p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/nho-den-khong-hat-uc_15694667892.jpg" style="float:left; height:820px; width:820px" /></p>\r\n', 'assets/anhsanpham/nho-den-khong-hat-uc_1569466789.jpg', 'kg', 'NSP002', 'NSX003'),
('MSP008', 'Nước dâu sữa Vfresh hộp 180ml', 35000, 'Sự kết hợp hài hòa của trái cây và sữa nguyên chất. Cung cấp nhiều dưỡng chất cho cơ thể. Sản xuất theo quy trình công nghệ hiện đại của Vinamilk', '<p style="text-align:justify"><strong>Sự kết hợp h&agrave;i h&ograve;a của tr&aacute;i c&acirc;y v&agrave; sữa nguy&ecirc;n chất<br />\r\nNước d&acirc;u sữa Vfresh&nbsp;</strong>l&agrave; sự kết hợp độc đ&aacute;o giữa hương d&acirc;u thanh m&aacute;t v&agrave; vị sữa dịu nhẹ cho bạn một thức ho&agrave;n to&agrave;n mới lạ. Tất cả th&agrave;nh phần nguy&ecirc;n liệu như sữa bột, nước &eacute;p d&acirc;u đều được chọn lọc v&agrave; chế biến nguy&ecirc;n chất từ tự nhi&ecirc;n, đảm bảo gi&aacute; trị dinh dưỡng cũng như an to&agrave;n cho người d&ugrave;ng.</p>\r\n\r\n<p style="text-align:justify"><strong>Cung cấp nhiều dưỡng chất cho cơ thể</strong><br />\r\nUống nước d&acirc;u sữa sẽ gi&uacute;p&nbsp;th&uacute;c đẩy chuyển h&oacute;a c&aacute;c chất trong cơ thể, l&agrave;m m&aacute;u huyết lưu th&ocirc;ng, đồng thời c&oacute; t&aacute;c dụng trấn tĩnh an thần. Sử dụng Nước d&acirc;u sữa Vfresh mỗi ng&agrave;y đem đến nguồn năng lượng cho cơ thể khỏe mạnh v&agrave; tr&agrave;n đầy sức sống.</p>\r\n\r\n<p style="text-align:justify"><strong>Sản xuất theo quy tr&igrave;nh c&ocirc;ng nghệ hiện đại của Vinamilk<br />\r\nNước d&acirc;u sữa Vfresh</strong>&nbsp;được sản xuất v&agrave; đ&oacute;ng hộp dưới quy tr&igrave;nh nghi&ecirc;m ngặt của Vinamilk. Sản phẩm với thiết kế hộp giấy ho&agrave;n to&agrave;n mới v&agrave; c&oacute; nắp tiện dụng, bạn c&oacute; thể thưởng thức nước d&acirc;u sữa mọi l&uacute;c mọi nơi.</p>\r\n', 'assets/anhsanpham/nuoc-dau-sua-vfresh-hop-180ml_1567740060.jpg', 'ml', 'NSP003', 'NSX002'),
('MSP009', 'Nước hạt é vị dâu 18% không gas chai 300ml', 20000, 'Nước giải khát giúp bổ sung năng lượng và khoáng chất', '<p><strong>Nước hạt &eacute; vị d&acirc;u&nbsp;18% kh&ocirc;ng gas</strong>&nbsp;l&agrave; sản phẩm nước giải kh&aacute;t được sản xuất trực tiếp từ Th&aacute;i Lan v&agrave; nhập khẩu nguy&ecirc;n chai.&nbsp;Sản phẩm kh&ocirc;ng chỉ gi&uacute;p giải tỏa cơn kh&aacute;t trong những ng&agrave;y n&oacute;ng nực m&agrave; c&ograve;n cung cấp nguồn năng lượng c&ugrave;ng h&agrave;m lượng kho&aacute;ng chất dồi d&agrave;o, cho bạn lu&ocirc;n c&oacute; đủ sức khỏe phục vụ mọi hoạt động trong ng&agrave;y. Sản phẩm c&oacute; vị ngọt hấp dẫn c&ugrave;ng hương tr&aacute;i c&acirc;y d&acirc;u t&acirc;y&nbsp;thơm ngon, gi&uacute;p k&iacute;ch th&iacute;ch vị gi&aacute;c v&agrave; đem lại cảm gi&aacute;c thoải m&aacute;i mỗi khi thưởng thức.</p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/1.jpg" style="height:820px; width:820px" /></p>\r\n', 'assets/anhsanpham/nuoc-hat-e-vi-dau-18-khong-gas-chai-300ml_1573110743.jpg', 'lon', 'NSP003', 'NSX002'),
('MSP010', 'Nước giải khát có gas Mirinda vị soda kem lon 330ml', 8500, '', '<p style="text-align: justify;"><strong>Nước giải kh&aacute;t c&oacute; gas Mirinda vị soda kem lon 330ml</strong>&nbsp;với nguồn nguy&ecirc;n liệu được sản xuất theo d&acirc;y chuyền c&ocirc;ng nghệ hiện đại dưới quy tr&igrave;nh kiểm định nghi&ecirc;m ngặt, đảm bảo an to&agrave;n khi sử dụng. Sản phẩm cho cảm gi&aacute;c&nbsp;thanh m&aacute;t với vị soda kem&nbsp;mang đến cho bạn cảm gi&aacute;c m&aacute;t lạnh,&nbsp;sảng kho&aacute;i khi thưởng thức.</p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/23.jpg" style="height:567px; width:650px" /></p>\r\n', 'assets/anhsanpham/nuoc-giai-khat-co-gas-mirinda-vi-soda-kem-lon-330ml_1573111165.jpg', 'lon', 'NSP003', 'NSX001'),
('MSP011', 'Nước ép táo nam việt quất 100% MariGold hộp 1L', 36900, 'Hương vị kết hợp giữa táo và trái nam việt quất thơm ngon.', '<p style="text-align:justify"><strong>Nước &eacute;p t&aacute;o nam việt quất 100%&nbsp;<a href="http://www.adayroi.com/marigold-br17397" target="_blank">MariGold</a>​</strong>&nbsp;l&agrave;&nbsp;<a href="http://www.adayroi.com/nuoc-trai-cay-c1977" target="_blank">nước tr&aacute;i c&acirc;y</a>&nbsp;&eacute;p được sản xuất&nbsp;tr&ecirc;n d&acirc;y chuyền c&ocirc;ng nghệ hiện đại của Malaysia n&ecirc;n kh&ocirc;ng l&agrave;m mất đi chất dinh dưỡng vốn c&oacute;.&nbsp;Sản phẩm<strong>&nbsp;</strong>l&agrave; sự kết hợp hương vị thơm ngon của hai loại tr&aacute;i c&acirc;y bổ dưỡng cho cơ thể l&agrave; t&aacute;o đỏ v&agrave; tr&aacute;i nam việt quất, kh&ocirc;ng đường, kh&ocirc;ng c&oacute; chất bảo quản hay m&agrave;u nh&acirc;n tạo, đem đến cho bạn kh&ocirc;ng chỉ l&agrave; một cơ thể khỏe mạnh m&agrave; c&ograve;n l&agrave; v&oacute;c d&aacute;ng khỏe khoắn v&agrave; l&agrave;n da căng tr&agrave;n sức sống.&nbsp;Trong đ&oacute;,&nbsp;nước t&aacute;o &eacute;p c&oacute;&nbsp;chứa nhi&ecirc;̀u khoáng ch&acirc;́t, dinh dưỡng, đặc biệt l&agrave; h&agrave;m&nbsp;lượng vitamin C cao gi&uacute;p da khỏe đẹp, v&oacute;c d&aacute;ng c&acirc;n đối; nước &eacute;p nam việt quất th&igrave;&nbsp;được coi l&agrave; một loại thực phẩm tuyệt vời cho sức khỏe tốt v&igrave; chứa phenol &ndash; một chống oxy h&oacute;a mạnh mẽ, gi&uacute;p chống lại c&aacute;c tế b&agrave;o gốc tự do trong cơ thể.</p>\r\n\r\n<p style="text-align:justify"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/35.jpg" style="height:475px; width:675px" /></p>\r\n\r\n<p style="text-align:justify"><strong>Nước &eacute;p t&aacute;o nam việt quất 100% MariGold​&nbsp;</strong>được đ&oacute;ng g&oacute;i dưới dạng&nbsp;hộp giấy 1 l&iacute;t với nắp nhựa xo&aacute;y, tiện lợi&nbsp;cho bạn mang theo đi học, đi l&agrave;m hay những chuyến đi chơi xa, tiết kiệm cho gia đ&igrave;nh bạn. Vỏ hộp được l&agrave;m bằng giấy tr&aacute;ng nh&ocirc;m, gi&uacute;p bảo quản nước &eacute;p lu&ocirc;n giữ được hương vị tự nhi&ecirc;n thơm ngon l&acirc;u d&agrave;i, đem lại sự y&ecirc;n t&acirc;m mỗi khi sử dụng.&nbsp;Bạn c&oacute; thể thưởng thức ngon hơn khi được ướp lạnh, ph&ugrave; hợp với khẩu vị của cả gia đ&igrave;nh.</p>\r\n', 'assets/anhsanpham/nuoc-ep-tao-nam-viet-quat-100-marigold-hop-1l_1573111432.jpg', 'hộp', 'NSP003', 'NSX003'),
('MSP012', 'Sữa đậu nành đậu đỏ Vinamilk lốc 4 hộp x 180ml', 26400, 'Thành phần nguyên liệu an toàn.\r\nMùi vị thơm ngon, bổ dưỡng.\r\nĐóng hộp tiện dụng, đảm bảo vệ sinh', '<p style="text-align:justify"><strong>Sữa đậu n&agrave;nh đậu đỏ Vinamilk</strong>&nbsp;được l&agrave;m từ sữa đậu n&agrave;nh nguy&ecirc;n chất, kh&ocirc;ng biến đổi gen kết hợp c&ugrave;ng c&aacute;c vitamin v&agrave; chất kho&aacute;ng. Sản phẩm kh&ocirc;ng chất bảo quản v&agrave; kh&ocirc;ng c&oacute; cholesterol, bổ sung nhiều canxi v&agrave; vitamin D c&oacute; lợi cho sức khỏe, gi&uacute;p tăng cường sức đề kh&aacute;ng, hệ xương rắn chắc v&agrave; l&agrave;m đẹp da hiệu quả. Với&nbsp;<strong>Sữa đậu n&agrave;nh đậu đỏ Vinamilk</strong>, bạn c&oacute; thể d&ugrave;ng uống trong bữa s&aacute;ng, bữa trưa hay tối đều th&iacute;ch hợp cũng như c&oacute; thể kết hợp với đa dạng c&aacute;c loại thực phẩm kh&aacute;c như b&aacute;nh bao, b&aacute;nh m&igrave;, đồ nướng, chi&ecirc;n, hấp...</p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/suadau.jpg" style="height:820px; width:820px" /></p>\r\n', 'assets/anhsanpham/sua-dau-nanh-dau-do-vinamilk-loc-4-hop-x-180ml_1574304224.jpg', 'dây', 'NSP003', 'NSX003'),
('MSP013', 'Kem sô cô la hạnh nhân Celano hộp 400ml', 58400, 'Thương hiệu Celano\r\nĐảm bảo vệ sinh an toàn thực phẩm\r\nHương vị thơm ngon, hấp dẫn\r\nCung cấp năng lượng, tiện lợi khi sử dụng', '<p style="text-align: justify;">Kem l&agrave; thực phẩm y&ecirc;u th&iacute;ch của hầu hết mọi người, đặc biệt trong những ng&agrave;y nắng n&oacute;ng. Sản phẩm được sản xuất tr&ecirc;n d&acirc;y chuyền hiện đại, c&ocirc;ng nghệ ti&ecirc;n tiến với những th&agrave;nh phần được lựa chọn kỹ. Sản phẩm kh&ocirc;ng chứa đường h&oacute;a học, chất tạo ngọt, phẩm m&agrave;u, an to&agrave;n cho người sử dụng.&nbsp;<strong>Kem s&ocirc; c&ocirc; la hạnh nh&acirc;n Celano</strong>&nbsp;được sản xuất từ nguồn nguy&ecirc;n liệu tươi ngon, đảm bảo chất lượng. Vị kem m&aacute;t lạnh, kết hợp với vị ngọt ng&agrave;o của s&ocirc; c&ocirc; la v&agrave; hương hạnh nh&acirc;n, mang lại sự ngon miệng, sảng kho&aacute;i cho người thưởng thức.</p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/kemsocola5.jpg" style="height:475px; width:675px" /></p>\r\n\r\n<p style="text-align: justify;"><strong>Kem s&ocirc; c&ocirc; la hạnh nh&acirc;n Celano&nbsp;</strong>c&ograve;n cung cấp năng lượng v&agrave; một số vitamin cần thiết cho cơ thể. Sản phẩm được đ&oacute;ng hộp đẹp mắt, dễ sử dụng. Bạn c&oacute; thể dễ d&agrave;ng bảo quản kem trong tủ lạnh để d&ugrave;ng bất cứ khi n&agrave;o.</p>\r\n', 'assets/anhsanpham/kem-so-co-la-hanh-nhan-celano-hop-400ml_1584861621.png', 'hộp', 'NSP001', 'NSX001'),
('MSP014', 'Bạch tuộc tươi', 149900, 'Sản phẩm có thể cắt nhỏ hoặc làm sạch tùy vào khối lượng. Bạch tuộc loại vừa, tươi ngon. Cung cấp dinh dưỡng tốt cho cơ thể. Dùng chế biến thành nhiều món ăn', '<p style="text-align:justify"><strong>Bạch tuộc tươi</strong>&nbsp;được xem l&agrave; một m&oacute;n ăn nhiều dinh dưỡng với hương vị thơm ngon. Khi thưởng thức bạch tuộc bạn sẽ cảm nhận được vị gi&ograve;n, thơm rất đặc trưng m&agrave; kh&ocirc;ng loại hải sản n&agrave;o c&oacute; được.&nbsp;Kh&ocirc;ng chỉ chế biến nhiều m&oacute;n ăn ngon, đ&acirc;y c&ograve;n được xem l&agrave; nguồn thực phẩm c&oacute; nhiều chất dinh dưỡng.</p>\r\n\r\n<p style="text-align:justify"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/1458632813923_8284842.jpg" style="height:475px; width:675px" /></p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify">Thịt bạch tuộc c&oacute; nhiều chất bổ &iacute;ch cho sự ph&aacute;t triển của cơ thể như sắt, đồng, kẽm&hellip; v&agrave; c&oacute; th&ecirc;m i-ốt rất tốt cho sự ph&aacute;t triển tr&iacute; n&atilde;o. Sản phẩm được bảo quản kỹ lưỡng, đảm bảo độ tươi ngon vốn c&oacute;.</p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n', 'assets/anhsanpham/bach-tuoc-tuoi_1584863215.png', 'kg', 'NSP001', 'NSX001'),
('MSP015', 'Gà ta nguyên con CP', 82900, 'Sản phẩm có thể cắt nhỏ hoặc làm sạch tùy vào khối lượng. Được nuôi theo phương pháp chăn thả tự nhiên. Có thể chế biến thành nhiều món ăn ngon khác nhau. Thịt gà thơm ngọt, chắc, cung cấp nhiều năng lượng cho cơ thể', '<p style="text-align:justify">Trong cuộc sống bận rộn những m&oacute;n ăn được chế biến sẵn v&agrave; đảm bảo vệ sinh l&agrave; lựa chọn hữu &iacute;ch của nhiều người.&nbsp;<strong>Thịt g&agrave; ta</strong>&nbsp;đ&atilde; được l&agrave;m sạch, gi&uacute;p bạn tiết kiệm thời gian trong kh&acirc;u sơ chế, chế biến m&agrave; vẫn c&oacute; được m&oacute;n ăn hợp khẩu vị. Kh&ocirc;ng những thế&nbsp;<em><strong><a href="https://vinmart.com/products/ga-ta-nguyen-con-cp-1984/#">thịt g&agrave;</a></strong></em>&nbsp;gi&agrave;u c&aacute;c loại axit amin c&oacute; c&ocirc;ng dụng tốt cho n&atilde;o bộ. Ngo&agrave;i ra, với gi&aacute; trị dinh dưỡng cao, thịt g&agrave; c&ograve;n rất tốt cho sức khỏe tim mạch, gi&uacute;p hỗ trợ răng v&agrave; xương lu&ocirc;n chắc khỏe, th&uacute;c đẩy trao đổi chất...</p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/ea7b31f382c1799f20d0.jpg" style="height:627px; width:622px" /></p>\r\n\r\n<p style="text-align:justify">Sản phẩm&nbsp;<strong>g&agrave; ta nguy&ecirc;n con&nbsp;</strong>đảm bảo cung cấp đến người ti&ecirc;u d&ugrave;ng loại thịt g&agrave; sạch, đ&aacute;p ứng đầy đủ c&aacute;c ti&ecirc;u chuẩn về vệ sinh an to&agrave;n thực phẩm. Bạn ho&agrave;n to&agrave;n c&oacute; thể y&ecirc;n t&acirc;m khi sử dụng&nbsp;<strong>g&agrave; ta nguy&ecirc;n con</strong>​ để chế biến những m&oacute;n ăn thơm ngon, hấp dẫn cho gia đ&igrave;nh.</p>\r\n', 'assets/anhsanpham/ga-ta-nguyen-con-cp_1584863358.jpg', 'kg', 'NSP001', 'NSX002'),
('MSP016', 'Cá diêu hồng tươi', 92000, 'Sản phẩm có thể cắt nhỏ hoặc làm sạch tùy vào khối lượng. Nguồn nguyên liệu đảm bảo sạch sẽ, an toàn. Cung cấp nhiều giá trị dinh dưỡng. Chế biến được nhiều món ăn tùy khẩu vị người dùng', '<p style="text-align: justify;"><strong>C&aacute; di&ecirc;u hồng&nbsp;</strong>l&agrave; loại c&aacute; nước ngọt, gi&agrave;u dinh dưỡng, thịt mềm, l&agrave; thực phẩm rất tốt cho sức khỏe. C&aacute;c m&oacute;n ăn chế biến từ<strong>&nbsp;C&aacute; di&ecirc;u hồng</strong>&nbsp;thơm ngon đặc trưng v&agrave; dễ ăn, c&aacute;ch chế biến cũng dễ d&agrave;ng. Thịt c&aacute; di&ecirc;u hồng c&oacute; m&agrave;u trắng, c&aacute;c thớ thịt được cấu tr&uacute;c chắc v&agrave; đặc biệt l&agrave; thịt kh&ocirc;ng qu&aacute; nhiều xương.&nbsp;Thực phẩm đ&atilde; được sơ chế v&agrave; bảo quản theo ti&ecirc;u chuẩn vệ sinh an to&agrave;n, sẽ l&agrave; lựa chọn th&ocirc;ng minh cho c&aacute;c b&agrave; nội trợ c&oacute; m&oacute;n ăn bổ dưỡng m&agrave; kh&ocirc;ng mất nhiều thời gian chế biến.</p>\r\n\r\n<p><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/51325e06db34206a7925.jpg" style="height:469px; width:667px" /></p>\r\n\r\n<p style="text-align: justify;"><strong>C&aacute; di&ecirc;u hồng</strong>&nbsp;thường được chế biến th&agrave;nh c&aacute;c m&oacute;n ăn ngon v&agrave; hấp dẫn như c&aacute; di&ecirc;u hồng hấp tương, c&aacute; di&ecirc;u hồng nấu ri&ecirc;u, lẩu c&aacute; di&ecirc;u hồng, c&aacute; di&ecirc;u hồng nướng l&aacute; sen... Ngo&agrave;i ra, c&aacute; c&ograve;n được sử dụng để l&agrave;m c&aacute;c m&oacute;n ăn th&ocirc;ng dụng kh&aacute;c như c&aacute;c m&oacute;n luộc, chi&ecirc;n, r&aacute;n, kho&hellip; gi&uacute;p gia đ&igrave;nh bạn c&oacute; những bữa ăn ho&agrave;n hảo, đảm bảo cung cấp đầy đủ c&aacute;c dưỡng chất cho cơ thể.</p>\r\n', 'assets/anhsanpham/ca-dieu-hong-tuoi_1584686274.jpg', 'kg', 'NSP001', 'NSX001'),
('MSP017', 'Trứng gà DHA Dabaco hộp 10 quả', 49900, 'Chứa hàm lượng DHA cao gấp 3 lần trứng thường. Nhiều công dụng tốt cho sức khỏe, đặc biệt là trẻ em. Đóng hộp tiện lợi cho việc sử dụng và bảo quản', '<p style="text-align:justify"><strong>Trứng g&agrave; DHA Dabaco</strong>&nbsp;chứa h&agrave;m lượng DHA cao gấp 3 lần trứng g&agrave; thường. DHA l&agrave; axit b&eacute;o kh&ocirc;ng no thuộc nh&oacute;m axit b&eacute;o Omega 3, cần thiết cho sự ph&aacute;t triển, ho&agrave;n thiện chức năng nh&igrave;n của mắt, sự ph&aacute;t triển ho&agrave;n hảo hệ thần kinh. Đối với trẻ em c&oacute; chế độ ăn đủ DHA sẽ gi&uacute;p chỉ số IQ cao hơn so với trẻ kh&ocirc;ng được cung cấp đầy đủ DHA. C&ograve;n đối với người trưởng th&agrave;nh, DHA c&oacute; t&aacute;c dụng giảm cholesterol to&agrave;n phần, triglyceride m&aacute;u, cholesterol xấu g&acirc;y xơ vữa động mạch (căn nguy&ecirc;n của bệnh nhồi m&aacute;u cơ tim).</p>\r\n\r\n<p style="text-align:justify"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/1a4ff919662b9d75c43a.jpg" style="height:474px; width:670px" /></p>\r\n\r\n<p style="text-align:justify"><strong>Trứng g&agrave; DHA Dabaco</strong>&nbsp;được sản sinh ra từ những đ&agrave;n g&agrave; c&oacute; chế độ chăm s&oacute;c nu&ocirc;i dưỡng đặc biệt từ m&ocirc;i trường sống cho đến vệ sinh th&uacute; y được kiểm so&aacute;t chặt chẽ, đặc biệt l&agrave; thức ăn cho g&agrave; được bổ sung nhiều dầu c&aacute; biển, tảo biển v&agrave; c&aacute;c vitamin, từ đ&oacute; cơ thể g&agrave; sẽ hấp thụ v&agrave; chuyển h&oacute;a DHA v&agrave;o trong quả trứng.&nbsp;<strong>Trứng g&agrave; DHA Dabaco</strong>&nbsp;c&oacute; vỏ m&agrave;u hồng nhạt, l&ograve;ng đỏ m&agrave;u v&agrave;ng tươi sau khi chế biến c&oacute; m&ugrave;i vị thơm ngon đặc trưng. Sử dụng&nbsp;<strong>Trứng g&agrave; DHA Dabaco</strong>&nbsp;trong c&aacute;c bữa ăn l&agrave; sự lựa chọn th&ocirc;ng minh cho sức khỏe của cả gia đ&igrave;nh.</p>\r\n', 'assets/anhsanpham/trung-ga-dha-dabaco-hop-10-qua_1584686722.jpg', 'hộp', 'NSP001', 'NSX002'),
('MSP018', 'Bánh Tipo Hữu Nghị trà xanh hộp 90g', 21300, 'Bao bì sản phẩm có thể thay đổi theo nhà cung cấp. Thành phần tự nhiên, an toàn. Hương vị trà xanh mới lạ, thơm ngon. Đóng hộp đẹp mắt, thích hợp làm quà tặng', '<p style="text-align:justify"><strong>B&aacute;nh Tipo Hữu Nghị tr&agrave; xanh</strong>&nbsp;được l&agrave;m từ th&agrave;nh phần trứng, đường, bột m&igrave;, sữa bột, bột tr&agrave; xanh Matcha... chất lượng tốt v&agrave; c&ocirc;ng thức chế biến đặc biệt, cho b&aacute;nh c&oacute; hương vị thơm ngon v&agrave; bổ dưỡng. Từng miếng b&aacute;nh gi&ograve;n tan, b&eacute;o ngậy, thơm vị tr&agrave; xanh mới lạ mang lại trải nghiệm th&uacute; vị khi thưởng thức. Sản phẩm kh&ocirc;ng chứa chất bảo quản, chất tạo ngọt, m&agrave;u nh&acirc;n tạo, đảm bảo an to&agrave;n tuyệt đối cho người sử dụng.&nbsp;</p>\r\n\r\n<p style="text-align:justify"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/2-9f55dc02-63dd-4d44-9fe2-27041c8cb27f.jpg" style="height:1000px; width:1000px" /><br />\r\n<strong>B&aacute;nh Tipo Hữu Nghị tr&agrave; xanh</strong>&nbsp;được đ&oacute;ng hộp tiện lợi. Sản phẩm c&oacute; gi&aacute; trị dinh dưỡng cao do đ&oacute; bạn c&oacute; thể d&ugrave;ng trong những bữa ăn nhẹ để bổ sung năng lượng cho cơ thể ngay khi cần thiết. Ngo&agrave;i ra, đ&acirc;y cũng l&agrave; m&oacute;n qu&agrave; đặc biệt ngọt ng&agrave;o d&agrave;nh tặng người th&acirc;n, bạn b&egrave;, đồng nghiệp trong dịp lễ Tết.</p>\r\n', 'assets/anhsanpham/banh-tipo-huu-nghi-tra-xanh-hop-90g_1584687418.jpg', 'hộp', 'NSP004', 'NSX002'),
('MSP019', 'Trà sữa Matcha Lipton hộp 136g (8 túi x 17g)', 43300, 'Thành phần tự nhiên, không chứa hợp chất hóa học. Là loại nước giải khát có lợi cho sức khỏe. Sản xuất trên dây chuyền công nghệ hiện đại', '<p style="text-align: justify;"><strong><a href="https://vinmart.com/products/tra-sua-matcha-lipton-hop-136g-8-tui-x-17g-3209/#">Tr&agrave;</a>&nbsp;sữa Matcha Lipton hộp 136g&nbsp;</strong>được sản xuất từ th&agrave;nh phần bột Matcha nguy&ecirc;n chất kết hợp c&ugrave;ng vị sữa dịu ngọt sẽ đem đến cho bạn những trải nghiệm mới về hương vị, mang lại gi&aacute; trị thư th&aacute;i cho t&acirc;m hồn v&agrave; lợi &iacute;ch cho sức khỏe.</p>\r\n\r\n<p style="text-align: justify;"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/7b7e4e1bb0294b771238.jpg" style="height:619px; width:616px" /></p>\r\n\r\n<p style="text-align: justify;"><strong>Tr&agrave; sữa Matcha Lipton</strong>&nbsp;được đ&oacute;ng hộp với nhiều g&oacute;i nhỏ, tiện lợi khi pha chế, thật đơn giản để thưởng thức một t&aacute;ch tr&agrave; sữa ngon đ&uacute;ng điệu, cho cả ng&agrave;y d&agrave;i sảng kho&aacute;i v&agrave; tỉnh t&aacute;o. Hơn nữa sản phẩm với mẫu m&atilde; hộp sang trọng rất th&iacute;ch hợp để v&agrave;o những giỏ qu&agrave; d&agrave;nh tặng bạn b&egrave;, người th&acirc;n những dịp lễ, Tết.</p>\r\n', 'assets/anhsanpham/tra-sua-matcha-lipton-hop-136g-8-tui-x-17g_1584688009.jpg', 'hộp', 'NSP003', 'NSX003'),
('MSP020', 'Cà phê Passiona G7 Trung Nguyên hộp 224g', 51800, 'Hàm lượng caffein thấp, bổ sung collagen. Nguyên liệu từ những hạt cà phê nguyên chất. Sản phẩm dành riêng cho phái đẹp', '<p style="text-align: justify;"><strong>C&agrave; ph&ecirc; Passiona G7 Trung Nguy&ecirc;n</strong>&nbsp;l&agrave; sản phẩm c&agrave; ph&ecirc; cho ph&aacute;i đẹp với c&ocirc;ng thức huyền b&iacute; phương Đ&ocirc;ng, nay tăng cường h&agrave;m lượng collagen gi&uacute;p da s&aacute;ng đẹp tự nhi&ecirc;n. Với mỗi t&aacute;ch&nbsp;<strong>C&agrave; ph&ecirc; Passiona G7 Trung Nguy&ecirc;n</strong>&nbsp;h&agrave;ng ng&agrave;y, ph&aacute;i đẹp ho&agrave;n to&agrave;n an t&acirc;m thưởng thức hương vị c&agrave; ph&ecirc; y&ecirc;u th&iacute;ch.</p>\r\n\r\n<p style="text-align: justify;"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/8984957a62489916c059.jpg" style="height:621px; width:616px" /></p>\r\n\r\n<p style="text-align: justify;"><strong>C&agrave; ph&ecirc; Passiona G7 Trung Nguy&ecirc;n</strong>&nbsp;với h&agrave;m lượng cafein thấp, bổ sung vitamin PP, c&ugrave;ng với một số loại thảo mộc&nbsp;qu&yacute; hiếm v&agrave; đường ăn ki&ecirc;ng đem lại những hiệu quả t&iacute;ch cực gi&uacute;p l&agrave;m đẹp, chống l&atilde;o ho&aacute; v&agrave; tăng t&iacute;nh đ&agrave;n hồi da cho người sử dụng, Trung Nguy&ecirc;n đ&atilde; tạo ra một sản phẩm c&agrave; ph&ecirc; đặc biệt với hương vị nồng n&agrave;n v&agrave; quyến rũ d&agrave;nh cho những người phụ nữ đam m&ecirc; hương vị c&agrave; ph&ecirc;.</p>\r\n', 'assets/anhsanpham/ca-phe-passiona-g7-trung-nguyen-hop-224g_1584688334.jpg', 'hộp', 'NSP003', 'NSX001'),
('MSP021', 'Xoài Đài Loan trái dài', 27600, 'Chứa hàm lượng chất dinh dưỡng cao. Xoài là loại trái cây giúp chúng ta chống nhiều bệnh tật\r\nKhông chứa chất độc hại, an toàn cho sức khỏe', '<p style="text-align:justify"><strong>Xo&agrave;i d&agrave;i giống Đ&agrave;i Loan</strong>&nbsp;l&agrave; giống xo&agrave;i ăn xanh được nhập từ Th&aacute;i Lan. Vỏ tr&aacute;i c&oacute; m&agrave;u xanh đậm v&agrave; rất d&agrave;y, trọng lượng tr&aacute;i trung b&igrave;nh 300 &ndash; 350gr, khi tr&aacute;i ch&iacute;n&nbsp; c&oacute; vị ngọt.&nbsp;<strong>Xo&agrave;i d&agrave;i giống Đ&agrave;i Loan</strong>&nbsp;ăn rất gi&ograve;n v&agrave; thơm; do đ&oacute; bạn c&oacute; thể d&ugrave;ng ăn liền hoặc chế biến nhiều m&oacute;n ăn kh&aacute;c nhau từ xo&agrave;i.</p>\r\n\r\n<p style="text-align:justify"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/7d80597c934e6810315f.jpg" style="height:622px; width:621px" /></p>\r\n\r\n<p style="text-align:justify"><strong>Xo&agrave;i d&agrave;i giống Đ&agrave;i Loan</strong>&nbsp;l&agrave; loại&nbsp;<a href="https://vinmart.com/products/xoai-dai-loan-trai-dai-2498/#"><strong>tr&aacute;i c&acirc;y</strong></a>&nbsp;rất gi&agrave;u vitamin A, C v&agrave; D. Với vị ngọt pha ch&uacute;t vị chua đặc trưng, xo&agrave;i keo được nhiều đối tượng người ti&ecirc;u d&ugrave;ng y&ecirc;u th&iacute;ch. Bạn c&oacute; thể chọn&nbsp;<strong>Xo&agrave;i d&agrave;i giống Đ&agrave;i Loan</strong>&nbsp;non,&nbsp;da xanh chưa ngả sang v&agrave;ng&nbsp;để chế biến c&aacute;c m&oacute;n ăn như gỏi xo&agrave;i, xo&agrave;i ng&acirc;m chua&hellip;&nbsp;Nếu người ti&ecirc;u d&ugrave;ng ưa th&iacute;ch ăn&nbsp;<strong>Xo&agrave;i d&agrave;i giống Đ&agrave;i Loan</strong>&nbsp;ch&iacute;n m&agrave; kh&ocirc;ng mua được loại như &yacute; muốn, c&oacute; thể mua xo&agrave;i keo gi&agrave;, bỏ trong t&uacute;i giấy, bảo quản đến khi đạt độ ch&iacute;n t&ugrave;y &yacute; th&iacute;ch đem ra d&ugrave;ng để xay sinh tố hay l&agrave;m ch&egrave;,&nbsp;<a href="https://vinmart.com/products/xoai-dai-loan-trai-dai-2498/#"><strong>b&aacute;nh</strong></a>... đều rất thơm ngon.</p>\r\n', 'assets/anhsanpham/xoai-dai-loan-trai-dai_1584688748.jpg', 'kg', 'NSP002', 'NSX002'),
('MSP023', 'Bánh quy Marie Cosy Kinh Đô gói 432g', 36000, 'Bổ sung dưỡng chất cho cơ thể. Hương vị thơm ngon, bổ dưỡng. Đóng gói đẹp mắt, tiện dụng', '<p style="text-align:justify">B&aacute;nh quy Marie Cosy Kinh Đ&ocirc; c&oacute; th&agrave;nh phần l&agrave;m từ nguy&ecirc;n liệu được chọn lọc kĩ c&agrave;ng như: bột m&igrave;, đường, bột bắp, bơ, mạch nha&hellip; đ&atilde; qua qu&aacute; tr&igrave;nh kiểm định độ an to&agrave;n cho sức khỏe người d&ugrave;ng. B&aacute;nh gi&ograve;n xốp, ngọt dịu, thơm vị sữa sẽ mang lại cho bạn những ph&uacute;t thư gi&atilde;n tuyệt vời b&ecirc;n cạnh bạn b&egrave; hoặc người th&acirc;n.</p>\r\n\r\n<p style="text-align:justify"><img alt="" src="http://tnmart.tn/assets/anhsanpham/Images/8QrRzVA.jpg" style="height:475px; width:675px" /></p>\r\n\r\n<p style="text-align:justify">B&aacute;nh quy Marie Cosy Kinh Đ&ocirc; được đ&oacute;ng g&oacute;i an to&agrave;n, hợp vệ sinh, thuận tiện cho việc sử dụng v&agrave; bảo quản. Bạn c&oacute; thể sử dụng sản phẩm như m&oacute;n ăn vặt hay bữa ăn phụ để bổ sung năng lượng cho cơ thể.</p>\r\n', 'assets/anhsanpham/banh-quy-marie-cosy-kinh-do-goi-450g-432g_1584781914.jpg', 'gói', 'NSP004', 'NSX001');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `PK_iMaSlide` int(11) NOT NULL,
  `sLink` text COLLATE utf8_unicode_ci NOT NULL,
  `sDoUuTien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FK_iMaTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE IF NOT EXISTS `taikhoan` (
  `PK_iMaTaiKhoan` int(11) NOT NULL,
  `sTenTaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sMatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sTrangThai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FK_iMaQuyen` int(11) NOT NULL,
  `FK_sMaND` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`PK_iMaTaiKhoan`, `sTenTaiKhoan`, `sMatKhau`, `sTrangThai`, `FK_iMaQuyen`, `FK_sMaND`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 1, 'MND001'),
(2, 'ndthanh.7598@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 4, 'MND002'),
(3, 'hongdothi0509@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 3, 'MND003'),
(4, 'nhungtuyendo@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 2, 'MND004'),
(5, 'nguyenthithuy6998@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 2, 'MND005'),
(6, 'minhanh@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 3, 'MND006'),
(7, 'minhkhoi@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Khoá', 4, 'MND007'),
(8, 'tuando.haui@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 2, 'MND010'),
(10, 'vanminh@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 2, 'MND011'),
(11, 'minhhuy@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 2, 'MND012'),
(14, 'ngannguyen@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 2, 'MND014'),
(17, 'do.thi.tuyen@sun-asterisk.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 2, 'MND015'),
(18, 'tuyen221098@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 4, 'MND013'),
(21, 'tuananh@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Bình thường', 2, 'MND016');

-- --------------------------------------------------------

--
-- Table structure for table `thongtingiaohang`
--

CREATE TABLE IF NOT EXISTS `thongtingiaohang` (
  `PK_iMaThongTinGH` int(11) NOT NULL,
  `sHoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sDiaChiNhanHang` text COLLATE utf8_unicode_ci NOT NULL,
  `sSoDienThoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `iDoUuTien` int(11) DEFAULT NULL,
  `FK_iMaTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtingiaohang`
--

INSERT INTO `thongtingiaohang` (`PK_iMaThongTinGH`, `sHoTen`, `sDiaChiNhanHang`, `sSoDienThoai`, `iDoUuTien`, `FK_iMaTaiKhoan`) VALUES
(1, 'Đỗ Tuyết Nhung', '175/5 Định Công - Hoàng Mai - Hà Nội', '0353924400', 1, 4),
(2, 'Thuý Thu', '96 Định Công, Hoàng Mai, Hà Nội', '0353924400', 5, 5),
(3, 'Nhung Tuyên Đỗ', 'Cầu Đen, Quang Thịnh, Lạng Giang, Bắc Giang', '0353924400', 7, 4),
(4, 'Nhung Tuyên Đỗ', 'Toà nhà HTP, 434 Trần Khát Chân, Hai Bà Trưng, Hà Nội', '0353924400', 8, 4),
(8, 'Nguyễn Minh Huy', '96 Định Công, Hoàng Mai, Hà Nội', '0353924400', 1, 11),
(9, 'Nguyễn Minh Huy', '175/5 Định Công - Hoàng Mai - Hà Nội', '01234567895', 3, 11),
(12, 'Nguyễn Thị Kim Ngân', 'Mê Linh - Hà Nội', '0961787598', 1, 14),
(15, 'Đỗ Tuyết Nhung', '96 Định Công, Hoàng Mai, Hà Nội', '0353924400', 3, 17),
(16, 'Đỗ Tuyết Nhung', 'Toà nhà HTP, 434 Trần Khát Chân, Hai Bà Trưng, Hà Nội', '0353924400', 2, 17),
(20, 'Nguyễn Tuấn Anh', '96 Định Công, Hoàng Mai, Hà Nội', '0987654321', 1, 21),
(21, 'Nguyễn Tuấn Anh', 'Toà nhà HTP, 434 Trần Khát Chân, Hai Bà Trưng, Hà Nội', '0987654321', 2, 21),
(24, 'Nguyễn Văn Minh', '96 Định Công, Hoàng Mai, Hà Nội', '0967543123', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE IF NOT EXISTS `trangthai` (
  `PK_iMaTrangThai` int(11) NOT NULL,
  `sTenTrangThai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`PK_iMaTrangThai`, `sTenTrangThai`) VALUES
(1, 'Chưa xử lý'),
(2, 'Đang xử lý'),
(3, 'Đang giao hàng'),
(4, 'Đã hoàn thành'),
(5, 'Đã huỷ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`PK_iMaAnh`),
  ADD KEY `FK_iMaSP` (`FK_sMaSP`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`PK_iMaBL`),
  ADD KEY `FK_iMaSP` (`FK_sMaSP`),
  ADD KEY `FK_iMaUser` (`FK_iMaTaiKhoan`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`FK_sMaDonHang`,`FK_sMaSP`),
  ADD KEY `FK_iMaSP` (`FK_sMaSP`);

--
-- Indexes for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`FK_sMaPN`,`FK_sMaSP`),
  ADD KEY `FK_iMaSP` (`FK_sMaSP`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`PK_iMaDG`),
  ADD KEY `FK_iMaSP` (`FK_sMaSP`),
  ADD KEY `FK_iMaUser` (`FK_iMaTaiKhoan`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`PK_sMaDonHang`),
  ADD KEY `FK_iMaTrangThai` (`FK_iMaTrangThai`),
  ADD KEY `FK_iMaHinhThuc` (`FK_iMaHinhThuc`),
  ADD KEY `FK_iMaThongTinGH` (`FK_iMaThongTinGH`),
  ADD KEY `FK_iMaTaiKhoan` (`FK_iMaTaiKhoan`);

--
-- Indexes for table `hinhthucthanhtoan`
--
ALTER TABLE `hinhthucthanhtoan`
  ADD PRIMARY KEY (`PK_iMaHinhThuc`);

--
-- Indexes for table `huysanpham`
--
ALTER TABLE `huysanpham`
  ADD PRIMARY KEY (`PK_iMaHuySP`),
  ADD KEY `FK_iMaSP` (`FK_sMaSP`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`PK_sMaKM`);

--
-- Indexes for table `khuyenmai_sp`
--
ALTER TABLE `khuyenmai_sp`
  ADD PRIMARY KEY (`PK_sMaKM_SP`),
  ADD KEY `FK_sMaKM` (`FK_sMaKM`),
  ADD KEY `FK_sMaSP` (`FK_sMaSP`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`PK_sMaND`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`PK_sMaNCC`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`PK_sMaNSX`);

--
-- Indexes for table `nhomdanhmuc`
--
ALTER TABLE `nhomdanhmuc`
  ADD PRIMARY KEY (`PK_iMaNhomDM`);

--
-- Indexes for table `nhomsanpham`
--
ALTER TABLE `nhomsanpham`
  ADD PRIMARY KEY (`PK_sMaNhomSP`),
  ADD KEY `FK_iMaNhomDM` (`FK_iMaNhomDM`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`PK_sMaPN`),
  ADD KEY `FK_iMaNCC` (`FK_sMaNCC`),
  ADD KEY `FK_iMaUser` (`FK_iMaTaiKhoan`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`PK_iMaQuyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`PK_sMaSP`),
  ADD KEY `FK_iMaNhomSP` (`FK_sMaNhomSP`),
  ADD KEY `FK_iMaNSX` (`FK_sMaNSX`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`PK_iMaSlide`),
  ADD UNIQUE KEY `FK_iMaTaiKhoan` (`FK_iMaTaiKhoan`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`PK_iMaTaiKhoan`),
  ADD KEY `FK_iMaQuyen` (`FK_iMaQuyen`),
  ADD KEY `FK_iMaUser` (`FK_sMaND`);

--
-- Indexes for table `thongtingiaohang`
--
ALTER TABLE `thongtingiaohang`
  ADD PRIMARY KEY (`PK_iMaThongTinGH`),
  ADD KEY `FK_iMaUser` (`FK_iMaTaiKhoan`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`PK_iMaTrangThai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anh`
--
ALTER TABLE `anh`
  MODIFY `PK_iMaAnh` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `PK_iMaBL` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `PK_iMaDG` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hinhthucthanhtoan`
--
ALTER TABLE `hinhthucthanhtoan`
  MODIFY `PK_iMaHinhThuc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `huysanpham`
--
ALTER TABLE `huysanpham`
  MODIFY `PK_iMaHuySP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhomdanhmuc`
--
ALTER TABLE `nhomdanhmuc`
  MODIFY `PK_iMaNhomDM` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `PK_iMaQuyen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `PK_iMaSlide` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `PK_iMaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `thongtingiaohang`
--
ALTER TABLE `thongtingiaohang`
  MODIFY `PK_iMaThongTinGH` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `PK_iMaTrangThai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anh`
--
ALTER TABLE `anh`
  ADD CONSTRAINT `anh_ibfk_1` FOREIGN KEY (`FK_sMaSP`) REFERENCES `sanpham` (`PK_sMaSP`) ON UPDATE CASCADE;

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`FK_sMaSP`) REFERENCES `sanpham` (`PK_sMaSP`) ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`FK_iMaTaiKhoan`) REFERENCES `taikhoan` (`PK_iMaTaiKhoan`) ON UPDATE CASCADE;

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`FK_sMaSP`) REFERENCES `sanpham` (`PK_sMaSP`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`FK_sMaDonHang`) REFERENCES `donhang` (`PK_sMaDonHang`) ON UPDATE CASCADE;

--
-- Constraints for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`FK_sMaPN`) REFERENCES `phieunhap` (`PK_sMaPN`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`FK_sMaSP`) REFERENCES `sanpham` (`PK_sMaSP`) ON UPDATE CASCADE;

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`FK_sMaSP`) REFERENCES `sanpham` (`PK_sMaSP`) ON UPDATE CASCADE,
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`FK_iMaTaiKhoan`) REFERENCES `taikhoan` (`PK_iMaTaiKhoan`) ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`FK_iMaTrangThai`) REFERENCES `trangthai` (`PK_iMaTrangThai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`FK_iMaHinhThuc`) REFERENCES `hinhthucthanhtoan` (`PK_iMaHinhThuc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`FK_iMaThongTinGH`) REFERENCES `thongtingiaohang` (`PK_iMaThongTinGH`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_4` FOREIGN KEY (`FK_iMaTaiKhoan`) REFERENCES `taikhoan` (`PK_iMaTaiKhoan`);

--
-- Constraints for table `huysanpham`
--
ALTER TABLE `huysanpham`
  ADD CONSTRAINT `huysanpham_ibfk_1` FOREIGN KEY (`FK_sMaSP`) REFERENCES `sanpham` (`PK_sMaSP`) ON UPDATE CASCADE;

--
-- Constraints for table `khuyenmai_sp`
--
ALTER TABLE `khuyenmai_sp`
  ADD CONSTRAINT `khuyenmai_sp_ibfk_1` FOREIGN KEY (`FK_sMaKM`) REFERENCES `khuyenmai` (`PK_sMaKM`) ON UPDATE CASCADE,
  ADD CONSTRAINT `khuyenmai_sp_ibfk_2` FOREIGN KEY (`FK_sMaSP`) REFERENCES `sanpham` (`PK_sMaSP`) ON UPDATE CASCADE;

--
-- Constraints for table `nhomsanpham`
--
ALTER TABLE `nhomsanpham`
  ADD CONSTRAINT `nhomsanpham_ibfk_1` FOREIGN KEY (`FK_iMaNhomDM`) REFERENCES `nhomdanhmuc` (`PK_iMaNhomDM`) ON UPDATE CASCADE;

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`FK_sMaNCC`) REFERENCES `nhacungcap` (`PK_sMaNCC`) ON UPDATE CASCADE,
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`FK_iMaTaiKhoan`) REFERENCES `taikhoan` (`PK_iMaTaiKhoan`) ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`FK_sMaNhomSP`) REFERENCES `nhomsanpham` (`PK_sMaNhomSP`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`FK_sMaNSX`) REFERENCES `nhasanxuat` (`PK_sMaNSX`) ON UPDATE CASCADE;

--
-- Constraints for table `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `slide_ibfk_1` FOREIGN KEY (`FK_iMaTaiKhoan`) REFERENCES `taikhoan` (`PK_iMaTaiKhoan`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`FK_iMaQuyen`) REFERENCES `quyen` (`PK_iMaQuyen`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`FK_sMaND`) REFERENCES `nguoidung` (`PK_sMaND`) ON UPDATE CASCADE;

--
-- Constraints for table `thongtingiaohang`
--
ALTER TABLE `thongtingiaohang`
  ADD CONSTRAINT `thongtingiaohang_ibfk_1` FOREIGN KEY (`FK_iMaTaiKhoan`) REFERENCES `taikhoan` (`PK_iMaTaiKhoan`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
