-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2022 lúc 05:19 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobileshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `activity_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `code`, `user`, `activity_brand`) VALUES
(1, 'EDRA', '###EDRA###', 'Nguyen Sy Hoang', 1),
(2, 'WARIOR', '###WARIOR###', 'Nguyen Sy Hoang', 1),
(3, 'MSI', '###MSI###', 'Nguyen Sy Hoang', 1),
(4, 'Vertagear', '###Vertagear###', 'Nguyen Sy Hoang', 1),
(5, 'Gigabyte', '###Gigabyte###', 'Nguyen Sy Hoang', 1),
(6, 'SEKAN', '###SEKAN###', 'Nguyen Sy Hoang', 1),
(8, 'LG', '###LG###', 'Nguyen Sy Hoang', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `total_num` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_customer`, `total_num`, `total_price`) VALUES
(2, 2, 8, 71970000),
(7, 1, 0, 0),
(8, 3, 0, 0),
(10, 10, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `activity_cate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `user`, `activity_cate`) VALUES
(12, 'BanGaming', '1', 'Nguyen Sy Hoang', 1),
(13, 'GheGaming', '2', 'Nguyen Sy Hoang', 1),
(14, 'GHECTH', '3', 'Nguyen Sy Hoang', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_cart`
--

CREATE TABLE `detail_cart` (
  `id` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `num_total` int(11) NOT NULL,
  `sub_total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail_cart`
--

INSERT INTO `detail_cart` (`id`, `id_cart`, `id_product`, `num_total`, `sub_total_price`) VALUES
(142, 2, 21, 1, 18490000),
(143, 2, 30, 1, 25990000),
(144, 2, 54, 1, 2600000),
(145, 2, 28, 1, 14490000),
(146, 2, 52, 4, 10400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail_order`
--

INSERT INTO `detail_order` (`id`, `id_order`, `id_product`, `qty`, `sub_total_price`) VALUES
(13, 12, 21, 3, 58470000),
(14, 12, 6, 1, 33990000),
(15, 12, 22, 1, 27990000),
(20, 15, 10, 1, 17990000),
(21, 16, 11, 10, 159900000),
(22, 17, 6, 2, 67980000),
(23, 17, 27, 1, 10990000),
(25, 29, 31, 1, 16990000),
(26, 30, 31, 1, 16990000),
(27, 31, 23, 1, 6790000),
(33, 33, 10, 1, 17490000),
(34, 33, 7, 1, 25990000),
(35, 33, 8, 1, 24990000),
(36, 33, 22, 1, 27490000),
(37, 33, 23, 3, 6790000),
(38, 34, 10, 1, 17490000),
(39, 34, 7, 1, 25990000),
(40, 34, 8, 1, 24990000),
(41, 34, 22, 1, 27490000),
(53, 39, 6, 2, 60980000),
(54, 40, 6, 2, 60980000),
(55, 40, 7, 2, 51980000),
(56, 41, 23, 1, 6790000),
(57, 42, 12, 1, 14490000),
(58, 43, 11, 1, 13990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `custom_id` int(11) NOT NULL,
  `total_price` float DEFAULT NULL,
  `total_num_product` int(11) DEFAULT NULL,
  `create_date` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` enum('Thành công','Chờ xác nhận','Hủy','') NOT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `date_confirm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `custom_id`, `total_price`, `total_num_product`, `create_date`, `note`, `payment_method`, `status`, `id_cart`, `time`, `code`, `date_confirm`) VALUES
(12, 1, 120450000, 5, '17/07/2020', '', 'card_payment', 'Hủy', 7, '1594998116', 'trantruong(1594998116)', ''),
(15, 2, 17990000, 1, '18/07/2020', '', 'card_payment', 'Thành công', 2, '1595060286', 'admin(1595060286)', '18/07/2020'),
(16, 1, 159900000, 10, '18/07/2020', '', 'home_payment', 'Thành công', 7, '1595089220', 'trantruong(1595089220)', '18/07/2020'),
(17, 3, 78970000, 3, '18/07/2020', 'giao hàng đúng hạn', 'home_payment', 'Thành công', 8, '1595096077', 'truongnd(1595096077)', '18/07/2020'),
(29, 2, 16990000, 1, '2022/05/11', '', 'card_payment', 'Thành công', NULL, NULL, NULL, NULL),
(30, 2, 16990000, 1, '2022/05/11', '', 'card_payment', 'Thành công', NULL, NULL, NULL, NULL),
(31, 2, 6790000, 1, '2022/05/11', '', 'card_payment', 'Hủy', NULL, NULL, NULL, NULL),
(33, 2, 102750000, 7, '2022/05/11', '', 'card_payment', 'Chờ xác nhận', NULL, NULL, NULL, NULL),
(34, 2, 102750000, 7, '2022/05/11', '', 'card_payment', 'Chờ xác nhận', NULL, NULL, NULL, NULL),
(39, 2, 60980000, 2, '2022/05/12', '', 'card_payment', 'Chờ xác nhận', NULL, NULL, NULL, NULL),
(40, 2, 112960000, 4, '2022/05/12', '', 'card_payment', 'Chờ xác nhận', NULL, NULL, NULL, NULL),
(41, 2, 6790000, 1, '2022/05/12', '', 'card_payment', 'Chờ xác nhận', NULL, NULL, NULL, NULL),
(42, 2, 14490000, 1, '2022/05/12', '', 'card_payment', 'Chờ xác nhận', NULL, NULL, NULL, NULL),
(43, 2, 13990000, 1, '2022/05/12', '', 'home_payment', 'Chờ xác nhận', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `price_sale` float DEFAULT NULL,
  `status` enum('còn hàng','hết hàng','hàng sắp về') NOT NULL,
  `description` text NOT NULL,
  `createBy` varchar(255) DEFAULT NULL,
  `Waterproofing` varchar(255) DEFAULT NULL,
  `size_pr` varchar(255) DEFAULT NULL,
  `describes` text DEFAULT NULL,
  `create_date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `id_category`, `id_brand`, `name`, `code`, `price`, `price_sale`, `status`, `description`, `createBy`, `Waterproofing`, `size_pr`, `describes`, `create_date`, `image`, `activity`) VALUES
(6, 13, 2, 'GHẾ GAME E-DRA CHAMPION EGC2022 NAPPA', 'GHEGAMING#02', 33990000, 30490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming3.jpg', 1),
(7, 13, 2, 'GHẾ GAME E-DRA CHAMPION EGC2022 NAPPA ', 'GHEGAMING#03', 30990000, 25990000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming7.jpg', 1),
(8, 13, 2, 'GHẾ GAME VITRA XRACING HECTOR Z150 BLACK', 'GHEGAMING#04', 25990000, 24990000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming3.jpg', 1),
(9, 13, 2, 'GHẾ GAME VITRA XRACING HECTOR Z150 BLACK', 'GHEGAMING#05', 19990000, 19490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming5.jpg', 1),
(10, 13, 2, 'GHẾ GAME VITRA XRACING HECTOR Z150 BLACK', 'GHEGAMING#06', 17990000, 17490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming7.jpg', 1),
(11, 13, 2, 'GHẾ GAME VITRA XRACING HECTOR Z150 BLACK', 'GHEGAMING#07', 15990000, 13990000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming3.jpg', 1),
(12, 13, 2, 'GHẾ GAME VITRA XRACING HECTOR Z150 BLACK', 'GHEGAMING#08', 14990000, 14490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming.jpg', 1),
(13, 13, 2, 'Ghế Warrior Raider Series TOWEQ9 Back/RED', 'GHEGAMING#09', 12990000, 12500000, 'còn hàng', '<p>Hệ thống hỗ trợ xoay lưng độc đ&aacute;o,Hệ thống điều chỉnh độ cao của lưng,chống tho&aacute;t vị nghĩa đệm</p>\r\n', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm', NULL, '14/07/2020', '../public/uploads/ghegaming5.jpg', 1),
(14, 13, 2, 'GHẾ GAME VITRA XRACING HECTOR Z150 BLACK', 'GHEGAMING#10', 12990000, 10490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming8.jpg', 1),
(15, 13, 1, 'GHẾ GAME CORSAIR T3 RUSH CHARCOAL ', 'GHEGAMING#01', 5690000, 5120000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '', '../public/uploads/ghegaming7.jpg', 1),
(16, 13, 1, 'GHẾ GAME CORSAIR T3 RUSH CHARCOAL ', 'GHEGAMING#11', 8390000, 7790000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming2.jpg', 1),
(17, 13, 1, 'GHẾ GAME DXRACER - MASTER SERIES DMC/IA233S/W (DMC-I233S-W-A2)', 'GHEGAMING#12', 6490000, 5840000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming3.jpg', 1),
(18, 13, 1, 'GHẾ GAMER NOBLECHAIRS HERO DOOM EDITION', 'GHEGAMING#12', 12990000, 14990000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming4.jpg', 1),
(19, 13, 1, 'GHẾ GAME E-DRA CHAMPION EGC2022 NAPPA', 'GHEGAMING#13', 11490000, 11490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, thoáng mát, chân hợp kim nhôm', 'Có', '280cm - 350cm', NULL, '14/07/2020', '../public/uploads/ghegaming.jpg', 1),
(20, 12, 2, 'BÀN PSEAT GAMING T-1400 EAGLE LED BLACK/BLUE', 'BANGAMING#01', 19490000, 19990000, 'còn hàng', 'Các góc được bo lại tăng tính thẩm mỹ cho góc máy tính, chắc chắn, thanh mảnh và sang trọng', 'Cấu tạo khung làm bằng thép,chân hợp kim nhôm màu bạc', 'có', '230cm-400cm', NULL, '14/07/2020', '../public/uploads/bang4.jpg', 1),
(21, 14, 1, 'Ghế công thái học Sihoo M18 Gray', 'TAB#01', 19490000, 18490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '15/07/2020', '../public/uploads/cth7.jpg', 1),
(22, 14, 2, 'Ghế công thái học Sihoo M18 Gray', 'TAB#02', 27990000, 27490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '15/07/2020', '../public/uploads/cth6.jpg', 1),
(23, 14, 1, 'Ghế văn phòng Sihoo M76 MACOVA BLUE', 'TAB#03', 7490000, 6790000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '18/07/2020', '../public/uploads/cth9.jpg', 1),
(24, 14, 1, 'Ghế công thái học Sihoo V1 Black', 'TAB#04', 6990000, 6290000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '18/07/2020', '../public/uploads/cth8.jpg', 1),
(25, 14, 1, 'Ghế công thái học Sihoo V1 Black', 'TAB#05', 4000000, 3690000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '18/07/2020', '../public/uploads/cth7.jpg', 1),
(26, 14, 2, 'Ghế công thái học Sihoo V1 Black', 'TAB#06', 13990000, 13490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '18/07/2020', '../public/uploads/cth6.jpg', 1),
(27, 14, 2, 'Ghế công thái học gona black KOREA', 'TAB#07', 10990000, 10490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '18/07/2020', '../public/uploads/cth9.jpg', 1),
(28, 14, 2, 'Ghế công thái học GOKU BLUE CHINA', 'TAB#08', 14990000, 14490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '18/07/2020', '../public/uploads/cth8.jpg', 1),
(29, 14, 2, 'Ghế công thái học APIM CLOR PICO', 'TAB#09', 9990000, 9490000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '18/07/2020', '../public/uploads/cth7.jpg', 1),
(30, 14, 2, 'Ghế công thái học SUSU BLUE CLEAN', 'TAB#10', 25990000, 25990000, 'còn hàng', 'Hệ thống hỗ trợ xoay lưng độc đáo,Hệ thống điều chỉnh độ cao của lưng', 'Lưng ghế bọc vải lưới đàn hồi cao, Chân hợp kim nhôm màu bạc ', 'Có', '280cm - 350cm', NULL, '18/07/2020', '../public/uploads/cth6.jpg', 1),
(31, 12, 5, 'BÀN CHƠI GAME DXRACER NEX (GD-GDN001-NS-1)', 'BANGMING#02', 17990000, 16990000, 'còn hàng', 'Các góc được bo lại tăng tính thẩm mỹ cho góc máy tính, chắc chắn, thanh mảnh và sang trọng', 'Cấu tạo khung làm bằng thép,chân hợp kim nhôm màu bạc', 'có', '230cm-400cm', NULL, '18/07/2020', '../public/uploads/bang.jpg', 1),
(32, 12, 5, 'BÀN CHƠI GAME E-DRA Z TANK - V2 ( MÀU XÁM )', 'BANGMING#03', 20990000, 19990000, 'còn hàng', 'Các góc được bo lại tăng tính thẩm mỹ cho góc máy tính, chắc chắn, thanh mảnh và sang trọng', 'Cấu tạo khung làm bằng thép,chân hợp kim nhôm màu bạc', 'có', '230cm-400cm', NULL, '18/07/2020', '../public/uploads/bang1.jpg', 1),
(33, 12, 6, 'BÀN CHƠI GAME E-DRA Z TANK - V2 ( MÀU ĐỎ/ĐEN )', 'BANGMING#04', 8890000, 8890000, 'còn hàng', 'Các góc được bo lại tăng tính thẩm mỹ cho góc máy tính, chắc chắn, thanh mảnh và sang trọng', 'Cấu tạo khung làm bằng thép,chân hợp kim nhôm màu bạc', 'có', '230cm-400cm', NULL, '18/07/2020', '../public/uploads/bang2.jpg', 1),
(34, 12, 6, 'BÀN CHƠI GAME E-DRA Z TANK - V2 ( MÀU HỒNG )', 'BANGMING#05', 18990000, 18990000, 'còn hàng', 'Các góc được bo lại tăng tính thẩm mỹ cho góc máy tính, chắc chắn, thanh mảnh và sang trọng', 'Cấu tạo khung làm bằng thép,chân hợp kim nhôm màu bạc', 'có', '230cm-400cm', NULL, '18/07/2020', '../public/uploads/bang3.jpg', 1),
(36, 12, 1, 'Bàn gaming nâng hạ điện WARRIOR Paladin', 'BANGAMING#11', 3000000, 2500000, 'còn hàng', 'thiết kế với khả năng nâng hạ cùng chiều cao từ 73cm – 119cm. Chiều cao tiêu chuẩn, phù hợp với đa số các mẫu Ghế Gaming', 'Nguyen Hoang', 'Có', '300cm x 450cm', NULL, '1-1-2022', '../public/uploads/bang4.jpg', 1),
(37, 12, 1, 'Bàn gaming nâng hạ điện WARRIOR Paladin', 'BANGAMING#11', 3000000, 2500000, 'còn hàng', 'thiết kế với khả năng nâng hạ cùng chiều cao từ 73cm – 119cm. Chiều cao tiêu chuẩn, phù hợp với đa số các mẫu Ghế Gaming', 'Nguyen Hoang', 'Có', '300cm x 450cm', NULL, '1-1-2022', '../public/uploads/bang7.jpg', 1),
(38, 12, 1, 'Bàn gaming hạ huyết áp SONGOKY Paladin', 'BANGAMING#11', 3000000, 2500000, 'còn hàng', 'thiết kế với khả năng nâng hạ cùng chiều cao từ 73cm – 119cm. Chiều cao tiêu chuẩn, phù hợp với đa số các mẫu Ghế Gaming', 'Nguyen Hoang', 'Có', '300cm x 450cm', NULL, '1-1-2022', '../public/uploads/bang8.jpg', 1),
(39, 12, 1, 'Bàn gaming nâng hạ điện WARRIOR Paladin', 'BANGAMING#11', 3000000, 2500000, 'còn hàng', 'thiết kế với khả năng nâng hạ cùng chiều cao từ 73cm – 119cm. Chiều cao tiêu chuẩn, phù hợp với đa số các mẫu Ghế Gaming', 'Nguyen Hoang', 'Có', '300cm x 450cm', NULL, '1-1-2022', '../public/uploads/bang8.jpg', 1),
(51, 12, 1, '            Ghế Warrior Raider Series WGC206 White/Pink            ', '## GHEGAMING 16 ##            ', 10000000, 2600000, '', '<p>GHẾ GAME VITRA XRACING HECTOR Z150&nbsp; WHILE</p>\r\n', 'admin', 'Có', '334cm-500cm', NULL, '2022/05/15', '../public/uploads/ghegaming7.jpg', 1),
(52, 12, 1, 'Ghế Warrior Raider Series WGC206 White/Pink', '## GHEGAMING 16 ##', 3000000, 2600000, 'còn hàng', '<p>Ghế cao cấp d&agrave;nh cho game thủ<br />\r\nChất liệu da PU chống xước<br />\r\nTrục thủy lực Class 4 với độ ổn định cao<br />\r\nBệ đỡ: Kiểu c&aacute;nh bướm</p>\r\n', 'admin', 'Có', '334cm - 600cm', NULL, '2022/05/15', '../public/uploads/ghegaming2.jpg ', 1),
(53, 12, 1, 'Ghế Warrior Raider Series WGC206 White/Pink', '## GHEGAMING 16 ##', 3000000, 2600000, 'còn hàng', '<p>Ghế cao cấp d&agrave;nh cho game thủ<br />\r\nChất liệu da PU chống xước<br />\r\nTrục thủy lực Class 4 với độ ổn định cao<br />\r\nBệ đỡ: Kiểu c&aacute;nh bướm</p>\r\n', 'admin', 'Có', '334cm - 600cm', NULL, '2022/05/15', '../public/uploads/ghegaming2.jpg ', 1),
(54, 12, 1, 'Ghế Warrior Raider Series WGC206 White/Pink', '## GHEGAMING 16 ##', 3000000, 2600000, 'còn hàng', '<p>Ghế cao cấp d&agrave;nh cho game thủ<br />\r\nChất liệu da PU chống xước<br />\r\nTrục thủy lực Class 4 với độ ổn định cao<br />\r\nBệ đỡ: Kiểu c&aacute;nh bướm</p>\r\n', 'admin', 'Có', '334cm - 600cm', NULL, '2022/05/15', '../public/uploads/ghegaming.jpg ', 1),
(55, 12, 1, 'Ghế Warrior Raider Series WGC206 White/Pink', '## GHEGAMING 16 ##', 3000000, 2600000, 'còn hàng', '<p>Ghế cao cấp d&agrave;nh cho game thủ<br />\r\nChất liệu da PU chống xước<br />\r\nTrục thủy lực Class 4 với độ ổn định cao<br />\r\nBệ đỡ: Kiểu c&aacute;nh bướm</p>\r\n', 'admin', 'Có', '334cm - 600cm', NULL, '2022/05/15', '../public/uploads/ghegaming7.jpg ', 1),
(56, 12, 1, 'my name is Hoang', '4596D2', 3000000, 2600000, 'còn hàng', '<p>demo</p>\r\n', 'hoang', 'Có', '334cm - 600cm', NULL, '2022/05/16', '../public/uploads/ghegaming8.jpg ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `type` enum('dọc','ngang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `image`, `user`, `create_date`, `type`) VALUES
(1, '../public/uploads/slider-01.png', 'NGUYỄN SỸ HOÀNG', '14/07/2020', 'ngang'),
(2, '../public/uploads/slider-02.png', 'NGUYỄN SỸ HOÀNG', '14/07/2020', 'ngang'),
(3, '../public/uploads/slider-03.png', 'NGUYỄN SỸ HOÀNG', '14/07/2020', 'ngang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL,
  `activity_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `mail`, `phone`, `address`, `create_date`, `roleId`, `activity_user`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Nguyen Sy Hoang', 'hoang@gmail.com', '09123456', 'Bắc Ninh', '15/07/2020', 1, 1),
(2, 'hoang', '81dc9bdb52d04dc20036dbd8313ed055', 'Nguyen Sy Hoang', 'huy@gmail.com', '091278901', 'hà nội', '16/07/2020', 2, 1),
(3, 'truongnd', '81dc9bdb52d04dc20036dbd8313ed055', 'Nguyen Sy Hoang', 'admin@gmail.com', '09123456', 'hà nội', '18/07/2020', 2, 0),
(4, 'binh', '81dc9bdb52d04dc20036dbd8313ed055', 'Nguyen Gia Binh', 'typv6677@gmail.com', '0981942706', 'pho va', '2022/05/13 ', 2, 0),
(9, 'jack', '81dc9bdb52d04dc20036dbd8313ed055', 'Nguyen Ty', 'thanhloanleuleu123@gmail.com', '0981942706', 'thanh hoa', '2022/05/18', 2, 0),
(10, 'truong', '81dc9bdb52d04dc20036dbd8313ed055', 'nguyen dai', 'typv6677@gmail.com', '0981942706', 'bac ninh', '2022/06/04', 2, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `tbl_order_ibfk_1` (`custom_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `detail_cart`
--
ALTER TABLE `detail_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `detail_cart`
--
ALTER TABLE `detail_cart`
  ADD CONSTRAINT `detail_cart_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`custom_id`) REFERENCES `users` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
