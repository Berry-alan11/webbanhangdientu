-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 10, 2025 lúc 11:33 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhangdientu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_icon`) VALUES
(1, 'Phone', 'https://cdn-icons-png.flaticon.com/128/15/15874.png'),
(2, 'Laptop', 'https://cdn-icons-png.flaticon.com/128/3474/3474360.png'),
(3, 'Tablet', 'https://cdn-icons-png.flaticon.com/128/2946/2946198.png'),
(4, 'Smartwatch', 'https://cdn-icons-png.flaticon.com/128/2935/2935235.png'),
(5, 'Headphone', 'https://cdn-icons-png.flaticon.com/128/3522/3522263.png'),
(6, 'Accessorie', 'https://cdn-icons-png.flaticon.com/128/2947/2947998.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'dasd', 'asd@gmail.comd', 'qdqwd', '2025-05-20 11:04:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_discount` int(11) DEFAULT 0,
  `is_new` tinyint(1) DEFAULT 0,
  `product_favorite` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_category`, `product_discount`, `is_new`, `product_favorite`) VALUES
(9, 'iPad A16 Wifi 128GB 2025', 9690000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad-a16-11-inch_10_.jpg', 'Tablet', 90, 1, 0),
(10, 'iPad Pro M4 11 inch Wifi 256GB', 27790000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/r/frame_100_1_2__2_2.png', 'Tablet', 0, 1, 0),
(11, 'iPad Gen 10 10.9 inch 2022 Wifi 64GB', 8690000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad-2022-hero-blue-wifi-select.png', 'Tablet', 0, 1, 0),
(12, 'Xiaomi Redmi Pad SE Wifi (6GB 128GB)', 4490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-redmi-pad-se_1_3.png', 'Tablet', 0, 1, 0),
(13, 'Xiaomi Pad 7 Pro 8GB 256GB', 12990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-pad-7_4__1.png', 'Tablet', 0, 1, 0),
(14, 'Teclast P30 4GB 64GB', 1990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/may-tinh-bang-teclast-p30.png', 'Tablet', 0, 1, 0),
(15, 'iPad mini 7 2024 Wifi 128GB', 13790000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad_mini_blue_pdp_image_position_2_cellular__vn-vi_2.jpg', 'Tablet', 0, 1, 0),
(16, 'iPad Air 11 inch M3 Wifi 128GB 2025', 16690000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad-air-11-wifi-1.jpg', 'Tablet', 0, 1, 0),
(17, 'Huawei Watch GT 5', 4490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_5__7_89.png', 'Smartwatch', 0, 1, 0),
(18, 'Apple Watch SE 2 2024 40mm (GPS)', 5220000.00, 'https://cdn2.cellphones.com.vn/358x/media/catalog/product/t/e/text_ng_n_3__5_95.png', 'Smartwatch', 0, 1, 0),
(19, 'Xiaomi Watch S4', 3990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_3__6_65.png', 'Smartwatch', 0, 1, 0),
(20, 'Amazfit Active 2', 2790000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_32__7_32.png', 'Smartwatch', 0, 1, 0),
(21, 'Huawei Watch Fit 3', 2390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/o/dong-ho-thong-minh-huawei-watch-fit-3_2.jpg', 'Smartwatch', 0, 1, 0),
(22, 'Samsung Galaxy Watch Ultra', 13590000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/m/sm-l705_001_front_titanium_silve.png', 'Smartwatch', 0, 1, 0),
(23, 'Apple Watch Series 10 42mm (GPS)', 8390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/p/apple-watch-series-10-42mm_1_.png', 'Smartwatch', 0, 1, 0),
(24, 'Huawei Watch GT 5 Pro', 6990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_61__2_12.png', 'Smartwatch', 0, 1, 0),
(25, 'Laptop Gaming Acer Nitro V ANV15-51-58AN', 16990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_9__4_4.png', 'Laptop', 0, 1, 0),
(26, 'Apple MacBook Air M2 2024 8CPU 8GPU 16GB 256GB', 21490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/macbook_air_m2_3_1_1.jpg', 'Laptop', 0, 1, 0),
(27, 'MacBook Air M4 13 inch 2025 10CPU 8GPU 16GB 256GB', 26690000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_2__9_14.png', 'Laptop', 0, 1, 0),
(28, 'Laptop ASUS TUF Gaming A15 FA506NCR-HN047W', 19990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_32__2_27.png', 'Laptop', 0, 1, 0),
(29, 'MacBook Pro 16 M3 Max 48GB - 1TB ', 83990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/macbook-pro-16-inch-m3-max-2023_1__1.png', 'Laptop', 0, 1, 0),
(30, 'Laptop ASUS Vivobook 14 OLED A1405VA-KM257W', 17490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_16__5_19.png', 'Laptop', 0, 1, 0),
(31, 'Laptop Acer Aspire Lite AL16-51P-55N7 NX.KX0SV.001', 13490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_3__5_61.png', 'Laptop', 0, 1, 0),
(32, 'Laptop HP Gaming Victus 15-FA1139TX 8Y6W3PA', 16990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_11__5_169.png', 'Laptop', 0, 1, 0),
(33, 'True Wireless Samsung Galaxy Buds2 Pro', 2590000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-buds-2-pro-_8_.png', 'Headphone', 0, 1, 0),
(34, 'Apple AirPods 4', 3090000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/i/airpods-4-2.png', 'Headphone', 0, 1, 0),
(35, 'Sony WH-1000XM4', 4890000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/o/sony_wh-1000xm4_5.png', 'Headphone', 0, 1, 0),
(36, 'Marshall Monitor III ANC', 8990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-chup-tai-marshall-monitor-iii-anc_3_.png', 'Headphone', 0, 1, 0),
(37, 'True Wireless Samsung Galaxy Buds 3 Pro', 4990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-samsung-galaxy-buds-3-pro_9_.png', 'Headphone', 0, 1, 0),
(38, 'Apple AirPods Pro 2 2023 USB-C', 5390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/p/apple-airpods-pro-2-usb-c_8_.png', 'Headphone', 0, 1, 0),
(39, 'Sony WH-1000XM5', 7490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-chup-tai-sony-wh-1000xm5-2-removebg-preview.png', 'Headphone', 0, 1, 0),
(40, 'Gaming HyperX Cloud Stinger 2', 1190000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-co-day-hyperx-cloud-stinger-2-_3_.png', 'Headphone', 0, 1, 0),
(41, 'iPhone 15 128GB', 15890000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-plus_1__1.png', 'Phone', 0, 1, 0),
(42, 'iPhone 16 Pro Max 256GB', 30990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-pro-max.png', 'Phone', 0, 1, 0),
(43, 'Samsung Galaxy S25 Ultra 12GB 256GB', 30290000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-samsung-galaxy-s25-ultra_2__3.png', 'Phone', 0, 1, 0),
(44, 'OPPO Reno10 Pro+ 5G 12GB 256GB', 10990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/o/p/oppo-reno10-pro-plus-tim.png', 'Phone', 0, 1, 0),
(45, 'Samsung Galaxy S25 256GB', 20290000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-samsung-galaxy-s25_1__2.png', 'Phone', 0, 1, 0),
(46, 'OPPO FIND N5', 44990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-oppo-find-n5.png', 'Phone', 0, 1, 0),
(47, 'Samsung Galaxy Z Flip6 12GB 256GB', 20490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/r/frame_167_1.png', 'Phone', 0, 1, 0),
(48, 'Xiaomi 14T Pro 12GB 512GB', 16490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi_14t_pro_1_.png', 'Phone', 0, 1, 0),
(49, 'Chuột không dây Logitech MX Master 2S', 1390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/h/chuot-khong-day-logitech-mx-master-2s_3.png', 'Accessorie', 20, 1, 0),
(50, 'iTay cầm chống rung DJI OM 7', 1980000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tay-cam-chong-rung-dji-om-7_1_.png', 'Accessorie', 20, 1, 0),
(51, 'Apple Magic Keyboard 2', 2990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/magic-keyboard-2-phim-so-1_1.jpg', 'Accessorie', 20, 1, 0),
(52, 'Apple Pencil Pro', 3090000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/p/apple-pencil-pro-1.png', 'Accessorie', 20, 1, 0),
(53, 'Củ sạc Ugreen PD 20W CD137', 140000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/r/frame_22_1.png', 'Accessorie', 20, 1, 0),
(54, 'Cáp Baseus Crystal Shine USB-C to Lightning 1.2M', 109000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/3/4/34_1_17.jpg', 'Accessorie', 20, 1, 0),
(55, 'Củ sạc Anker 3 cổng 67W 336 A2674', 490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_6_43.png', 'Accessorie', 20000, 1, 0),
(56, 'Webcam Logitech C922 FULLHD 1080P', 2390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/6/6/66_1_11.jpg', 'Accessorie', 180000, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive','banned') DEFAULT 'active',
  `phonenumber` int(11) NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password_hash`, `created_at`, `updated_at`, `status`, `phonenumber`, `lastname`, `firstname`) VALUES
(1, 'tringuyen@gmail.com', '$2y$10$ED/W.gDdEzBS0KtsT6TVVeBE6ll4ru.JqdZTMkksYlhLQjNK3kR8a', '2025-05-20 03:32:36', '2025-05-20 03:32:36', 'active', 836095679, 'Nguyen', 'Vi'),
(5, 'haha@gmail.com', '$2y$10$KS6jsXmGRbPWMhuedhxfSOSIteCr3iUUjb3uaamE4EATdcg7NX36q', '2025-05-20 04:07:00', '2025-05-20 04:07:00', 'active', 89, 'Ngao', 'Dai'),
(7, 'ha1@gmail.com', '$2y$10$Ijeo2grE9c7CVGoXCuVjReUyMm.acsz5HVu0mLOg4krUgkEfKd13m', '2025-05-20 04:27:13', '2025-05-20 04:27:13', 'active', 31, 'ha1', 'hoho'),
(8, 'nguyenvi@gmail.com', '$2y$10$4d6UI7WDTGJypD2OqFMLneMip7WEFw5pmXpNolwd87gotM8ksdtVu', '2025-05-20 08:42:58', '2025-05-20 08:42:58', 'active', 901111, 'Nguyen', 'Vi'),
(9, 'nguyenvihaha@gmail.com', '$2y$10$7eRN3kXbz3wMltLG2ioXXOnmfImI//5AkSu6b9ztE.iTnDXXWcYg2', '2025-05-20 08:53:31', '2025-05-20 08:53:31', 'active', 123, 'nguyenhaha', 'vihaha'),
(10, 'leu@gmail.com', '$2y$10$ZG43mRRCDuMByoOViYX77e6OdVMy3vweBjSvv957r3kmd8a9wh1Hq', '2025-05-20 09:01:05', '2025-05-20 09:01:05', 'active', 123, 'leu', 'Linh'),
(11, 'hoang@gmail.com', '$2y$10$6tzLkU48YyLRQvo4K7OryusnO4MIu40cj3J2Wt3Dt28WkV5Q6wcLm', '2025-05-29 02:53:14', '2025-05-29 02:53:14', 'active', 123, 'Hoang', 'Hoang2'),
(12, 'hungvi@gmail.com', '$2y$10$vxWw5ZzUWtVoAQTJW2ynauErw3RfcCxHro8WDIvfx1fNg37zGAV..', '2025-06-09 00:57:49', '2025-06-09 00:57:49', 'active', 123, 'Vi', 'Hung'),
(13, 'vibadao123a@gmail.com', '$2y$10$nC22awujhAlsNnqNFkhqQ.pMP0ECI10QTy2bHaD39HdiAdWnFiu1W', '2025-06-09 19:34:45', '2025-06-09 19:34:45', 'active', 321, 'hunghoang', 'hoanghung');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
