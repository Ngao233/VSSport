-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 05:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duanone`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `image_blog` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `img_category` varchar(255) DEFAULT NULL,
  `name_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `img_category`, `name_category`) VALUES
(1, 'tay.jpg', 'Nhẫn'),
(2, 'vongdo.webp', 'Bông tai'),
(3, 'dongho.webp', 'Dây chuyền'),
(4, 'vongxanh.webp', 'Vòng tay'),
(5, 'vongdo.webp', 'Home & Garden');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img_more`
--

CREATE TABLE `img_more` (
  `id_img_more` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_more`
--

INSERT INTO `img_more` (`id_img_more`, `id_product`, `img`) VALUES
(31, 21, 'product_21_img1.webp\n'),
(32, 21, 'product_21_img2.webp\n'),
(33, 21, 'product_21_img3.webp\n'),
(34, 21, 'product_21_img4.webp\n'),
(35, 22, 'product_22_img1.webp\n'),
(36, 22, 'product_22_img2.webp\n'),
(37, 22, 'product_22_img3.webp\n'),
(38, 22, 'product_22_img4.webp\n'),
(39, 23, 'product_23_img1.webp\n'),
(40, 23, 'product_23_img2.webp\n'),
(41, 23, 'product_23_img3.webp\n'),
(42, 23, 'product_23_img4.webp\n'),
(43, 24, 'product_24_img1.webp\n'),
(44, 24, 'product_24_img2.webp\n'),
(45, 24, 'product_24_img3.webp\n'),
(46, 24, 'product_24_img4.webp\n'),
(47, 25, 'product_25_img1.webp\n'),
(48, 25, 'product_25_img2.webp\n'),
(49, 25, 'product_25_img3.webp\n'),
(50, 25, 'product_25_img4.webp\n'),
(51, 26, 'product_26_img1.webp\n'),
(52, 26, 'product_26_img2.webp\n'),
(53, 26, 'product_26_img3.webp\n'),
(54, 26, 'product_26_img4.webp\n'),
(55, 27, 'product_27_img1.webp\n'),
(56, 27, 'product_27_img2.webp\n'),
(57, 27, 'product_27_img3.webp\n'),
(58, 27, 'product_27_img4.webp\n'),
(59, 28, 'product_28_img1.webp\n'),
(60, 28, 'product_28_img2.webp\n'),
(61, 28, 'product_28_img3.webp\n'),
(62, 28, 'product_28_img4.webp\n'),
(63, 29, 'product_29_img1.webp\n'),
(64, 29, 'product_29_img2.webp\n'),
(65, 29, 'product_29_img3.webp\n'),
(66, 29, 'product_29_img4.webp\n'),
(67, 30, 'product_30_img1.webp\n'),
(68, 30, 'product_30_img2.webp\n'),
(69, 30, 'product_30_img3.webp\n'),
(70, 30, 'product_30_img4.webp\n'),
(71, 31, 'product_31_img1.webp\n'),
(72, 31, 'product_31_img2.webp\n'),
(73, 31, 'product_31_img3.webp\n'),
(74, 31, 'product_31_img4.webp\n'),
(75, 32, 'product_32_img1.webp\n'),
(76, 32, 'product_32_img2.webp\n'),
(77, 32, 'product_32_img3.webp\n'),
(78, 32, 'product_32_img4.webp\n'),
(79, 33, 'product_33_img1.webp\n'),
(80, 33, 'product_33_img2.webp\n'),
(81, 33, 'product_33_img3.webp\n'),
(82, 33, 'product_33_img4.webp\n'),
(83, 34, 'product_34_img1.webp\n'),
(84, 34, 'product_34_img2.webp\n'),
(85, 34, 'product_34_img3.webp\n'),
(86, 35, 'product_35_img1.webp\n'),
(87, 35, 'product_35_img2.webp\n'),
(88, 35, 'product_35_img3.webp\n'),
(89, 35, 'product_35_img4.webp\n'),
(90, 36, 'product_36_img1.webp\n'),
(91, 36, 'product_36_img2.webp\n'),
(92, 37, 'product_37_img1.webp\n'),
(93, 37, 'product_37_img2.webp\n'),
(94, 37, 'product_37_img3.webp\n'),
(95, 37, 'product_37_img4.webp\n'),
(96, 38, 'product_38_img1.webp\n'),
(97, 38, 'product_38_img2.webp\n'),
(98, 38, 'product_38_img3.webp\n'),
(99, 39, 'product_39_img1.webp\n'),
(100, 39, 'product_39_img2.webp\n'),
(101, 39, 'product_39_img3.webp\n'),
(102, 39, 'product_39_img4.webp\n'),
(104, 40, 'product_40_img1.webp\n'),
(105, 40, 'product_40_img2.webp\n'),
(106, 40, 'product_40_img3.webp\n'),
(107, 40, 'product_40_img4.webp\n'),
(108, 41, 'product_41_img1.webp\n'),
(109, 41, 'product_41_img2.webp\n'),
(110, 41, 'product_41_img3.webp\n'),
(111, 41, 'product_41_img4.webp\n'),
(112, 42, 'product_42_img1.webp\n'),
(113, 42, 'product_42_img2.webp\n'),
(114, 42, 'product_42_img3.webp\n'),
(115, 42, 'product_42_img4.webp\n'),
(116, 43, 'product_43_img1.webp\n'),
(117, 43, 'product_43_img2.webp\n'),
(118, 43, 'product_43_img3.webp\n'),
(119, 43, 'product_43_img4.webp\n'),
(120, 44, 'product_44_img1.webp\n'),
(121, 44, 'product_44_img2.webp\n'),
(122, 44, 'product_44_img3.webp\n'),
(123, 45, 'product_45_img1.webp\n'),
(124, 45, 'product_45_img2.webp\n'),
(125, 45, 'product_45_img3.webp\n'),
(126, 46, 'product_46_img1.webp\n'),
(127, 46, 'product_46_img2.webp\n'),
(128, 46, 'product_46_img3.webp\n'),
(129, 47, 'product_47_img1.webp\n'),
(130, 47, 'product_47_img2.webp\n'),
(131, 47, 'product_47_img3.webp\n'),
(132, 47, 'product_47_img4.webp\n'),
(133, 48, 'product_48_img1.webp\n'),
(134, 48, 'product_48_img2.webp\n'),
(135, 48, 'product_48_img3.webp\n'),
(136, 49, 'product_49_img1.webp\n'),
(137, 49, 'product_49_img2.webp\n'),
(138, 49, 'product_49_img3.webp\n'),
(139, 50, 'product_50_img1.webp\n'),
(140, 50, 'product_50_img2.webp\n'),
(141, 50, 'product_50_img3.webp\n'),
(142, 50, 'product_50_img4.webp\n'),
(143, 51, 'product_51_img1.webp\n'),
(144, 51, 'product_51_img2.webp\n'),
(145, 51, 'product_51_img3.webp\n'),
(146, 51, 'product_51_img4.webp\n'),
(147, 52, 'product_52_img1.webp\n'),
(148, 52, 'product_52_img2.webp\n'),
(149, 52, 'product_52_img3.webp\n'),
(150, 52, 'product_52_img4.webp\n'),
(151, 53, 'product_53_img1.webp\n'),
(152, 53, 'product_53_img2.webp\n'),
(153, 53, 'product_53_img3.webp\n'),
(154, 54, 'product_54_img1.webp\n'),
(155, 54, 'product_54_img2.webp\n'),
(156, 54, 'product_54_img3.webp\n'),
(157, 55, 'product_55_img1.webp\n'),
(158, 55, 'product_55_img2.webp\n'),
(159, 55, 'product_55_img3.webp\n'),
(160, 55, 'product_55_img4.webp\n'),
(161, 56, 'product_56_img1.webp\n'),
(162, 56, 'product_56_img2.webp\n'),
(163, 56, 'product_56_img3.webp\n'),
(164, 56, 'product_56_img4.webp\n'),
(165, 57, 'product_57_img1.webp\n'),
(166, 57, 'product_57_img2.webp\n'),
(167, 57, 'product_57_img3.webp\n'),
(168, 58, 'product_58_img1.webp\n'),
(169, 58, 'product_58_img2.webp\n'),
(170, 58, 'product_58_img3.webp\n'),
(171, 58, 'product_58_img4.webp\n'),
(172, 59, 'product_59_img1.webp\n'),
(173, 59, 'product_59_img2.webp\n'),
(174, 59, 'product_59_img3.webp\n'),
(175, 59, 'product_59_img4.webp\n'),
(176, 60, 'product_60_img1.webp\n'),
(177, 60, 'product_60_img2.webp\n'),
(178, 60, 'product_60_img3.webp\n'),
(179, 60, 'product_60_img4.webp\n'),
(180, 61, 'product_61_img1.webp\n'),
(181, 61, 'product_61_img2.webp\n'),
(182, 61, 'product_61_img3.webp\n'),
(183, 61, 'product_61_img4.webp\n'),
(184, 62, 'product_62_img1.webp\n'),
(185, 62, 'product_62_img2.webp\n'),
(186, 62, 'product_62_img3.webp\n'),
(187, 62, 'product_62_img4.webp\n'),
(188, 63, 'product_63_img1.webp\n'),
(189, 63, 'product_63_img2.webp\n'),
(190, 63, 'product_63_img3.webp\n'),
(191, 63, 'product_63_img4.webp\n'),
(192, 34, 'product_34_img4.webp\r\n'),
(193, 36, 'product_36_img3.webp\r\n'),
(194, 36, 'product_36_img4.webp\r\n'),
(195, 38, 'product_38_img4.webp\r\n'),
(196, 44, 'product_44_img4.webp\r\n'),
(197, 45, 'product_45_img4.webp\r\n'),
(198, 46, 'product_46_img4.webp\r\n'),
(199, 48, 'product_48_img4.webp\r\n'),
(200, 49, 'product_49_img4.webp\r\n'),
(201, 53, 'product_53_img4.webp\r\n'),
(202, 54, 'product_54_img4.webp\r\n'),
(203, 57, 'product_57_img4.webp\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `phone_order` varchar(15) NOT NULL,
  `name_order` varchar(100) NOT NULL,
  `address_order` varchar(255) NOT NULL,
  `date_order` date NOT NULL,
  `payment_method` enum('Thanh toán khi nhận hàng','Thanh toán bằng ngân hàng') NOT NULL,
  `price` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `phone_order`, `name_order`, `address_order`, `date_order`, `payment_method`, `price`, `id_product`) VALUES
(11, 1, '0123456789', 'Nguyen Van A', '123 Main St', '2024-11-01', 'Thanh toán khi nhận hàng', 0, 21),
(12, 2, '0987654321', 'Tran Thi B', '456 High St', '2024-11-02', 'Thanh toán khi nhận hàng', 0, 21),
(13, 3, '0912345678', 'Le Van C', '789 Side St', '2024-11-03', 'Thanh toán khi nhận hàng', 0, 21),
(14, 4, '0908765432', 'Pham Thi D', '1010 Oak St', '2024-11-04', 'Thanh toán khi nhận hàng', 0, 22),
(15, 5, '0932456781', 'Vu Van E', '1111 Pine St', '2024-11-05', 'Thanh toán khi nhận hàng', 0, 22),
(16, 6, '0976543210', 'Dang Thi F', '1212 Cedar St', '2024-11-06', 'Thanh toán khi nhận hàng', 0, 22),
(17, 7, '0967123456', 'Nguyen Van G', '1313 Maple St', '2024-11-07', 'Thanh toán khi nhận hàng', 0, 25),
(18, 8, '0923456789', 'Tran Thi H', '1414 Elm St', '2024-11-08', 'Thanh toán khi nhận hàng', 0, 23),
(19, 9, '0945678123', 'Le Van I', '1515 Birch St', '2024-11-09', 'Thanh toán khi nhận hàng', 0, 24),
(20, 10, '0919876543', 'Pham Thi J', '1616 Willow St', '2024-11-10', 'Thanh toán khi nhận hàng', 0, 26);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('Chờ Xác Nhận','Đang chuẩn bị','Đang Giao','Giao Thành Công','Giao Thất Bại','Huỷ Đơn Hàng') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_product`, `id_order`, `quantity`, `price`, `status`) VALUES
(22, 21, 11, 2, 0.00, 'Chờ Xác Nhận'),
(23, 22, 12, 1, 0.00, 'Đang chuẩn bị'),
(24, 23, 13, 3, 0.00, 'Đang Giao'),
(25, 24, 14, 5, 0.00, 'Giao Thành Công'),
(26, 25, 15, 1, 0.00, 'Giao Thất Bại'),
(27, 26, 16, 4, 0.00, 'Huỷ Đơn Hàng'),
(28, 27, 17, 2, 0.00, 'Chờ Xác Nhận'),
(29, 28, 18, 1, 0.00, 'Đang chuẩn bị'),
(30, 29, 19, 3, 0.00, 'Đang Giao'),
(31, 30, 20, 2, 0.00, 'Giao Thành Công');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('hết hàng','còn hàng') NOT NULL,
  `discount` enum('50%','30%','10%','0%') NOT NULL,
  `desc_product` text DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `property` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`property`)),
  `price_sale` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `price`, `img`, `quantity`, `status`, `discount`, `desc_product`, `id_category`, `property`, `price_sale`) VALUES
(21, 'Laptop A', 1200.00, 'charm.webp', 50, 'còn hàng', '10%', 'High performance laptop', 1, '{\r\n    \"loai\": \"nhẫn\"\r\n}', 0.00),
(22, 'Shirt B', 20.00, 'chuyenbac.png', 100, 'còn hàng', '30%', 'Comfortable cotton shirt', 2, NULL, 0.00),
(23, 'Headphones C', 150.00, 'chuyenhong.png', 30, 'còn hàng', '50%', 'Noise-cancelling headphones', 1, NULL, 0.00),
(24, 'Book D', 10.00, 'co.webp', 200, 'còn hàng', '50%', 'Bestselling novel', 4, NULL, 0.00),
(25, 'Plant E', 15.00, 'combo.webp', 70, 'còn hàng', '50%', 'Indoor potted plant', 5, NULL, 0.00),
(26, 'Smartphone F', 800.00, 'combonhan.webp', 40, 'còn hàng', '10%', 'Latest model smartphone', 1, NULL, 0.00),
(27, 'Jacket G', 60.00, 'conheo.png', 80, 'còn hàng', '30%', 'Waterproof jacket', 2, NULL, 0.00),
(28, 'Watch H', 250.00, 'daychuyen.png', 20, 'còn hàng', '10%', 'Luxury wristwatch', 3, NULL, 0.00),
(29, 'Sunglasses I', 75.00, 'heart.webp', 60, 'còn hàng', '50%', 'Polarized sunglasses', 3, NULL, 0.00),
(30, 'Backpack J', 45.00, 'hong.png', 90, 'còn hàng', '10%', 'Durable travel backpack', 3, NULL, 0.00),
(31, 'Bông', 130.00, 'bong.webp', 100, 'còn hàng', '10%', 'Bông tai', 2, NULL, 0.00),
(32, 'Bông tai', 150000.00, 'bongtai.webp', 15, 'còn hàng', '30%', 'Mô tả cho sản phẩm bongtai', 2, NULL, 0.00),
(33, 'Dây chuyền', 200000.00, 'chuyen.webp', 5, 'còn hàng', '10%', 'Mô tả cho sản phẩm chuyen', 3, NULL, 0.00),
(34, 'Dây chuyền vàng', 250000.00, 'chuyenvang.webp', 7, 'còn hàng', '10%', 'Mô tả cho sản phẩm chuyenvang', 3, NULL, 0.00),
(35, 'Dây chuyền xanh', 120000.00, 'chuyenxanh.webp', 10, 'còn hàng', '10%', 'Mô tả cho sản phẩm chuyenxanh', 3, NULL, 0.00),
(36, 'Dây đeo', 180000.00, 'daydeo.webp', 8, 'còn hàng', '30%', 'Mô tả cho sản phẩm daydeo', 4, NULL, 0.00),
(37, 'Hình vuông', 140000.00, 'hinhvuong.webp', 12, 'còn hàng', '50%', 'Mô tả cho sản phẩm hinhvuong', 1, NULL, 0.00),
(38, 'Hoa cô', 160000.00, 'hoaco.avif', 20, 'còn hàng', '30%', 'Mô tả cho sản phẩm hoaco', 2, NULL, 0.00),
(39, 'Khuyết', 200000.00, 'khuyen.avif', 10, 'còn hàng', '10%', 'Mô tả cho sản phẩm khuyen', 2, NULL, 0.00),
(40, 'Khuyết bạc', 220000.00, 'khuyetbac.webp', 6, 'còn hàng', '10%', 'Mô tả cho sản phẩm khuyetbac', 2, NULL, 0.00),
(41, 'Lắc', 280000.00, 'lac.webp', 5, 'còn hàng', '50%', 'Mô tả cho sản phẩm lac', 4, NULL, 0.00),
(42, 'Lắc vàng', 260000.00, 'lacvang.webp', 10, 'còn hàng', '10%', 'Mô tả cho sản phẩm lacvang', 4, NULL, 0.00),
(43, 'Móc dây chuyền', 320000.00, 'mocdaychuyen.webp', 5, 'còn hàng', '30%', 'Mô tả cho sản phẩm mocdaychuyen', 3, NULL, 0.00),
(44, 'ngoc', 340000.00, 'ngoc.webp', 7, 'còn hàng', '30%', 'Mô tả cho sản phẩm ngoc', 4, NULL, 0.00),
(45, 'nguoi', 200000.00, 'nguoi.webp', 12, 'còn hàng', '10%', 'Mô tả cho sản phẩm nguoi', 4, NULL, 0.00),
(46, 'nhan', 220000.00, 'nhan.webp', 15, 'còn hàng', '30%', 'Mô tả cho sản phẩm nhan', 1, NULL, 0.00),
(47, 'nhanbac', 210000.00, 'nhanbac.webp', 9, 'còn hàng', '50%', 'Mô tả cho sản phẩm nhanbac', 1, NULL, 0.00),
(48, 'nhanto', 230000.00, 'nhanto.webp', 11, 'còn hàng', '10%', 'Mô tả cho sản phẩm nhanto', 1, NULL, 0.00),
(49, 'nhanvong', 190000.00, 'nhanvong.avif', 8, 'còn hàng', '30%', 'Mô tả cho sản phẩm nhanvong', 4, NULL, 0.00),
(50, 'no', 170000.00, 'no.webp', 6, 'còn hàng', '10%', 'Mô tả cho sản phẩm no', 4, NULL, 0.00),
(51, 'noel', 180000.00, 'noel.webp', 4, 'còn hàng', '10%', 'Mô tả cho sản phẩm noel', 4, NULL, 0.00),
(52, 'taichuu', 150000.00, 'taichuu.webp', 10, 'còn hàng', '30%', 'Mô tả cho sản phẩm taichuu', 2, NULL, 0.00),
(53, 'taiden', 160000.00, 'taiden.webp', 15, 'còn hàng', '50%', 'Mô tả cho sản phẩm taiden', 2, NULL, 0.00),
(54, 'taivang', 140000.00, 'taivang.webp', 9, 'còn hàng', '30%', 'Mô tả cho sản phẩm taivang', 2, NULL, 0.00),
(55, 'taivangto', 130000.00, 'taivangto.webp', 5, 'còn hàng', '10%', 'Mô tả cho sản phẩm taivangto', 2, NULL, 0.00),
(56, 'vanglac', 180000.00, 'vanglac.webp', 10, 'còn hàng', '10%', 'Mô tả cho sản phẩm vanglac', 4, NULL, 0.00),
(57, 'vong', 120000.00, 'vong.avif', 7, 'còn hàng', '50%', 'Mô tả cho sản phẩm vong', 4, NULL, 0.00),
(58, 'vongbong', 110000.00, 'vongbong.webp', 6, 'còn hàng', '10%', 'Mô tả cho sản phẩm vongbong', 4, NULL, 0.00),
(59, 'vongmau', 150000.00, 'vongmau.webp', 9, 'còn hàng', '30%', 'Mô tả cho sản phẩm vongmau', 4, NULL, 0.00),
(60, 'vongnhan', 130000.00, 'vongnhan.webp', 8, 'còn hàng', '10%', 'Mô tả cho sản phẩm vongnhan', 4, NULL, 0.00),
(61, 'vongsao', 140000.00, 'vongsao.webp', 10, 'còn hàng', '10%', 'Mô tả cho sản phẩm vongsao', 4, NULL, 0.00),
(62, 'vongtai', 160000.00, 'vongtai.webp', 5, 'còn hàng', '50%', 'Mô tả cho sản phẩm vongtai', 2, NULL, 0.00),
(63, 'vongtraitim', 180000.00, 'vongtraitim.webp', 7, 'còn hàng', '10%', 'Mô tả cho sản phẩm vongtraitim', 4, NULL, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `numberphone` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `numberphone`, `role`, `avatar`) VALUES
(1, 'khacmnam8@gmail.com', '$2y$10$Ewo6cZgCDBaQOCWBITUh1.87CUCoT6Gmqcc3AZuPB4YiC5kgwNa36', '', 0, 0, ''),
(2, 'nam@gmail.com', '$2y$10$/hpXkAJZbJeo8PzuSiOcXeRg8eh5XULSWQe9WCHdIihXJnLBGBiWO', '', 0, 0, ''),
(3, 'nam2@gmail.com', '$2y$10$DMA1P0FlbyIl0564Wg1W1.4dhSDXneSF5WByYzX5231o54dZVPKKK', '', 0, 0, ''),
(4, 'nam3@gmail.com', '$2y$10$AhfjUSzMDNjqXzm.tmZUSOeDW4SX3ngBzkOBGLrtlK2B0PLqyraKK', '', 0, 0, ''),
(5, 'nam4@gmail.com', '$2y$10$hhx2slzy/SN2u7b1ge45fO2IT2iZ2pxPKLj3NVNcluKH/mCeU6vqy', '', 0, 0, ''),
(6, 'nam5@gmail.com', '$2y$10$QkPu/awABXt268IhaatHSOCt.rohvpQPX4BH4PjQC3vFGJ8LJ8f7O', '', 0, 0, ''),
(7, 'nam6@gmail.com', '$2y$10$NHsgCwn72XbLBtuongg6/u0pfVcr9JYaajFk3p3.0VziZdAIB9oSe', '', 0, 0, ''),
(8, 'nam7@gmail.com', '$2y$10$ly6qkriADJskLOhwwmmjL.Lmn0bG/C6.3oCp4oq1kYUq3B43Ja0Mi', '', 0, 0, ''),
(9, 'nam8@gmail.com', '$2y$10$.QCZU48rgDJvqnHjTGkPXOzGcOrkXDxxyfb4Rk1Y1nQzsizKiW4eO', '', 0, 0, ''),
(10, 'nam9@gmail.com', '$2y$10$DBpntFvrFoVX35euEOHITOKRKYJWzF28aK72KfiaQOyiOpAECjPJe', '', 0, 0, ''),
(11, 'nam10@gmail.com', '$2y$10$Y.jxJvWTNgwZ6KdtMKgShOgjSGCcj2BfS4ZlALWuEuW8/uPINVvbK', '', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `order_cart_ibfk_1` (`id_user`),
  ADD KEY `order_cart_ibfk_2` (`id_product`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD KEY `comment_ibfk_1` (`id_product`),
  ADD KEY `comment_ibfk_2` (`id_user`);

--
-- Indexes for table `img_more`
--
ALTER TABLE `img_more`
  ADD PRIMARY KEY (`id_img_more`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_orders_products` (`id_product`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `img_more`
--
ALTER TABLE `img_more`
  MODIFY `id_img_more` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `order_cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `img_more`
--
ALTER TABLE `img_more`
  ADD CONSTRAINT `img_more_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
