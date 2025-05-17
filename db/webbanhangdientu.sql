-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 17, 2025 lúc 10:23 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

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
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'huy', '0905228057huy@gmail.com', 'hi', '2025-05-17 08:12:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `title`, `image_url`, `summary`, `content`, `created_at`) VALUES
(1, 'iPhone 16 sắp ra mắt', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfs0rIePFGm0AaK_WmQAzST23r90sG_ezyYg&s', 'Apple chuẩn bị tung ra iPhone 16 với nhiều nâng cấp...', 'iPhone 16 sắp ra mắt\r\n\r\nApple chuẩn bị trình làng dòng sản phẩm iPhone 16 với nhiều cải tiến mạnh mẽ về thiết kế, hiệu năng và tính năng thông minh. Theo các nguồn tin rò rỉ đáng tin cậy, iPhone 16 sẽ tiếp tục có 4 phiên bản: iPhone 16, iPhone 16 Plus, iPhone 16 Pro và iPhone 16 Pro Max.\r\n<img src=\"https://lebaostore.com/wp-content/uploads/2024/09/iphone-16-white-1-638621657095332258-650x650-1.jpg\" alt=\"iphone 16\" style=\"max-width:100%; height:auto; margin: 20px 0;\">\r\nVề thiết kế, iPhone 16 dự kiến sẽ có viền màn hình mỏng hơn, chất liệu khung viền bằng titan cao cấp và các màu sắc mới như xanh pastel, tím nhạt và hồng baby, mang đến sự trẻ trung và hiện đại.\r\n\r\nCamera là điểm nhấn nổi bật với nhiều nâng cấp đáng giá. iPhone 16 Pro Max được cho là sẽ sở hữu ống kính tiềm vọng, hỗ trợ zoom quang học lên đến 6x. Cảm biến lớn hơn kết hợp cùng công nghệ xử lý hình ảnh mới giúp cải thiện rõ rệt chất lượng ảnh, đặc biệt là trong điều kiện thiếu sáng.\r\n\r\nVề hiệu năng, con chip A18 Bionic trên tiến trình 3nm mang đến tốc độ xử lý nhanh hơn, tiết kiệm pin hơn và đặc biệt tối ưu cho các tác vụ trí tuệ nhân tạo, thực tế ảo tăng cường và game nặng. RAM trên các phiên bản Pro cũng được nâng lên 8GB, hỗ trợ đa nhiệm mượt mà hơn.\r\n\r\nMột số cải tiến khác bao gồm thời lượng pin dài hơn, kết nối Wi-Fi 7, modem 5G tốc độ cao hơn, hệ thống tản nhiệt mới giúp máy không bị nóng khi chơi game lâu và được cài sẵn hệ điều hành iOS 19 với nhiều tính năng hiện đại.\r\n\r\nDự kiến Apple sẽ chính thức ra mắt iPhone 16 vào tháng 9/2025 tại sự kiện lớn tổ chức tại California. Giá khởi điểm của iPhone 16 phiên bản tiêu chuẩn dự đoán từ 799 USD.\r\n\r\nHãy cùng chờ xem iPhone 16 có thực sự tạo ra đột phá như những gì người dùng đang mong đợi.\r\n\r\n', '2025-05-16 17:50:06'),
(2, 'Top 5 laptop gaming 2025', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRH-GsUPEF7xBP8nGLY84pwaAswi_gYFgy9pA&s', 'Danh sách 5 laptop gaming đáng mua nhất đầu năm 2025...', 'Top 5 laptop gaming đáng mua nhất năm 2025\r\n\r\nNăm 2025 đánh dấu sự bùng nổ của thị trường laptop gaming với nhiều dòng máy được nâng cấp mạnh mẽ về hiệu năng, thiết kế và công nghệ làm mát. Dưới đây là danh sách 5 mẫu laptop gaming nổi bật nhất năm nay, phù hợp cho cả game thủ chuyên nghiệp lẫn người dùng yêu cầu cao về hiệu suất.\r\n1. ASUS ROG Strix Scar 18 (2025)\r\n<img src=\"https://dlcdnwebimgs.asus.com/files/media/982b43f2-03f0-4780-b552-cf2a58d515bf/v1/images/m-kv_1.webp\" alt=\"ASUS ROG Strix Scar 18\" style=\"max-width:100%; height:auto; margin: 20px 0;\">\r\nChiếc laptop gaming đầu bảng của ASUS năm nay được trang bị CPU Intel Core i9-14900HX và GPU NVIDIA GeForce RTX 5090. Màn hình Mini LED 18 inch 240Hz mang lại trải nghiệm hình ảnh sắc nét, mượt mà. Máy còn tích hợp hệ thống làm mát ROG Intelligent Cooling giúp duy trì hiệu suất cao trong thời gian dài.\r\n\r\n2. MSI Titan GT78 HX\r\n<img src=\"https://cdn.tgdd.vn/Files/2023/03/09/1515669/14-100323-215820-800-resize.jpg\" alt=\"MSI Titan GT78 HX\" style=\"max-width:100%; height:auto; margin: 20px 0;\">\r\nMSI tiếp tục giữ vững vị trí với dòng Titan mạnh mẽ, đi kèm cấu hình khủng: Core i9-14980HX, RTX 5090 và RAM lên đến 128GB. Đây là lựa chọn hoàn hảo cho các streamer, game thủ hardcore hoặc nhà sáng tạo nội dung 3D chuyên sâu.\r\n\r\n3. Alienware x16 R2\r\n<img src=\"https://i.ebayimg.com/images/g/1F0AAOSwAcFnwUc-/s-l1200.jpg\" alt=\"Alienware x16 R2\" style=\"max-width:100%; height:auto; margin: 20px 0;\">\r\nThiết kế mỏng nhẹ nhưng vẫn đảm bảo sức mạnh đáng nể, Alienware x16 R2 sử dụng CPU Intel Core i9 Gen 14 và GPU RTX 5080. Hệ thống đèn LED RGB toàn thân kết hợp màn hình QHD+ 240Hz làm tăng thêm trải nghiệm thị giác đỉnh cao.\r\n\r\n4. Lenovo Legion 9i Gen 10\r\n<img src=\"https://cdn-media.sforum.vn/storage/app/media/haianh/lenovo-legion-9i-gen-10-ra-mat-2.jpg\" alt=\"Lenovo Legion 9i Gen 10\" style=\"max-width:100%; height:auto; margin: 20px 0;\">\r\nLenovo gây ấn tượng mạnh với dòng Legion 9i mới nhất, nổi bật nhờ hệ thống làm mát bằng chất lỏng tích hợp đầu tiên trên laptop. Cấu hình không kém cạnh: Intel Core i9-14900HX, RTX 5080 và SSD tốc độ cao chuẩn Gen 5.\r\n\r\n5. Razer Blade 16 (2025 Edition)\r\n<img src=\"https://assets2.razerzone.com/images/pnx.assets/62fd0244762cde2b9ccabf21add45c99/blade16-2025-1200x-630.webp\" alt=\"Razer Blade 16\" style=\"max-width:100%; height:auto; margin: 20px 0;\">\r\nRazer mang đến sự kết hợp giữa hiệu năng cao và thiết kế mỏng nhẹ cao cấp. Với CPU Intel Gen 14, GPU RTX 5070 và màn hình kép Mini-LED 4K/120Hz, Blade 16 là lựa chọn lý tưởng cho cả chơi game lẫn công việc sáng tạo nội dung.\r\n\r\nTổng kết:\r\nCác mẫu laptop gaming năm 2025 đều được trang bị công nghệ tiên tiến nhất, từ card đồ họa RTX 5000 series đến hệ thống tản nhiệt đột phá. Tùy vào ngân sách và nhu cầu, người dùng có thể dễ dàng lựa chọn cho mình một cỗ máy chiến game lý tưởng.', '2025-05-16 17:50:06'),
(3, 'Xiaomi ra mắt dòng tablet mới', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVJQoRxWKe41dAbuG8wz6w15D90RHKAaDvkA&s', 'Dòng tablet mới của Xiaomi có cấu hình mạnh mẽ...', 'Xiaomi chính thức ra mắt dòng tablet cao cấp mới với nhiều cải tiến vượt trội\r\n\r\nVào đầu tháng 5/2025, Xiaomi đã chính thức trình làng dòng máy tính bảng mới nhất của hãng mang tên Xiaomi Pad 7 Series, đánh dấu bước tiến mới trong phân khúc tablet cao cấp với nhiều nâng cấp đáng chú ý cả về phần cứng lẫn phần mềm.\r\n<img src=\"https://cdn.tgdd.vn/Files/2023/04/18/1526398/xiaomi-pad-6-series-tgdd--31231313-1-180423-203701-800-resize.jpg\" alt=\"Xiaomi Pad 7\" style=\"max-width:100%; height:auto; margin: 20px 0;\">\r\n\r\nThiết kế tinh tế và hiện đại\r\nXiaomi Pad 7 giữ nguyên triết lý thiết kế tối giản nhưng được tinh chỉnh mỏng hơn, nhẹ hơn và có phần viền màn hình mỏng đều bốn cạnh. Vỏ kim loại nguyên khối được hoàn thiện tỉ mỉ, mang đến cảm giác sang trọng, chắc chắn khi cầm nắm.\r\n\r\nHiệu năng mạnh mẽ vượt trội\r\nDòng Xiaomi Pad 7 trang bị bộ vi xử lý Snapdragon 8 Gen 3, kết hợp RAM lên tới 12GB và bộ nhớ trong 512GB, cho phép người dùng đa nhiệm mượt mà, chơi game nặng, chỉnh sửa video hoặc sử dụng các ứng dụng học tập – làm việc một cách dễ dàng.\r\n\r\nMàn hình AMOLED chất lượng cao\r\nMột trong những điểm nổi bật nhất là màn hình AMOLED 12.1 inch với độ phân giải 2.8K, tần số quét 144Hz, hỗ trợ HDR10+ và Dolby Vision. Trải nghiệm xem phim, chơi game hoặc đọc sách đều trở nên sống động và sắc nét hơn bao giờ hết.\r\n\r\nPin \"trâu\" và sạc siêu nhanh\r\nMáy được trang bị viên pin dung lượng 10.000mAh, hỗ trợ sạc nhanh 120W – điều hiếm thấy trên các mẫu tablet hiện nay. Người dùng chỉ cần khoảng 30 phút để sạc đầy máy, sẵn sàng sử dụng cả ngày dài.\r\n\r\nHệ sinh thái MIUI Pad và phụ kiện thông minh\r\nCùng với dòng máy mới, Xiaomi còn giới thiệu bàn phím rời và bút cảm ứng Xiaomi Smart Pen Gen 2, hỗ trợ tối đa cho việc ghi chú, vẽ vời và làm việc di động. Giao diện MIUI Pad được tối ưu hóa riêng cho tablet, giúp trải nghiệm người dùng trở nên liền mạch và tiện lợi hơn.\r\n\r\nTổng kết:\r\nXiaomi Pad 7 Series hứa hẹn là đối thủ đáng gờm với các dòng tablet cao cấp như iPad Pro hay Galaxy Tab S9. Với mức giá dễ tiếp cận, cấu hình mạnh mẽ và thiết kế đẹp, đây chắc chắn sẽ là lựa chọn hấp dẫn cho người dùng yêu thích tablet Android trong năm 2025.\r\n\r\n', '2025-05-16 17:50:06');

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
  `is_new` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image`, `product_category`, `product_discount`, `is_new`) VALUES
(9, 'iPad A16 Wifi 128GB 2025', 9690000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad-a16-11-inch_10_.jpg', 'Tablet', 0, 1),
(10, 'iPad Pro M4 11 inch Wifi 256GB', 27790000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/r/frame_100_1_2__2_2.png', 'Tablet', 0, 1),
(11, 'iPad Gen 10 10.9 inch 2022 Wifi 64GB', 8690000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad-2022-hero-blue-wifi-select.png', 'Tablet', 0, 1),
(12, 'Xiaomi Redmi Pad SE Wifi (6GB 128GB)', 4490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-redmi-pad-se_1_3.png', 'Tablet', 0, 1),
(13, 'Xiaomi Pad 7 Pro 8GB 256GB', 12990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-pad-7_4__1.png', 'Tablet', 0, 1),
(14, 'Teclast P30 4GB 64GB', 1990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/may-tinh-bang-teclast-p30.png', 'Tablet', 0, 1),
(15, 'iPad mini 7 2024 Wifi 128GB', 13790000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad_mini_blue_pdp_image_position_2_cellular__vn-vi_2.jpg', 'Tablet', 0, 1),
(16, 'iPad Air 11 inch M3 Wifi 128GB 2025', 16690000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad-air-11-wifi-1.jpg', 'Tablet', 0, 1),
(17, 'Huawei Watch GT 5', 4490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_5__7_89.png', 'Smartwatch', 0, 1),
(18, 'Apple Watch SE 2 2024 40mm (GPS)', 5220000.00, 'https://cdn2.cellphones.com.vn/358x/media/catalog/product/t/e/text_ng_n_3__5_95.png', 'Smartwatch', 0, 1),
(19, 'Xiaomi Watch S4', 3990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_3__6_65.png', 'Smartwatch', 0, 1),
(20, 'Amazfit Active 2', 2790000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_32__7_32.png', 'Smartwatch', 0, 1),
(21, 'Huawei Watch Fit 3', 2390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/o/dong-ho-thong-minh-huawei-watch-fit-3_2.jpg', 'Smartwatch', 0, 1),
(22, 'Samsung Galaxy Watch Ultra', 13590000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/m/sm-l705_001_front_titanium_silve.png', 'Smartwatch', 0, 1),
(23, 'Apple Watch Series 10 42mm (GPS)', 8390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/p/apple-watch-series-10-42mm_1_.png', 'Smartwatch', 0, 1),
(24, 'Huawei Watch GT 5 Pro', 6990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_61__2_12.png', 'Smartwatch', 0, 1),
(25, 'Laptop Gaming Acer Nitro V ANV15-51-58AN', 16990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_9__4_4.png', 'Laptop', 0, 1),
(26, 'Apple MacBook Air M2 2024 8CPU 8GPU 16GB 256GB', 21490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/macbook_air_m2_3_1_1.jpg', 'Laptop', 0, 1),
(27, 'MacBook Air M4 13 inch 2025 10CPU 8GPU 16GB 256GB', 26690000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_2__9_14.png', 'Laptop', 0, 1),
(28, 'Laptop ASUS TUF Gaming A15 FA506NCR-HN047W', 19990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_32__2_27.png', 'Laptop', 0, 1),
(29, 'MacBook Pro 16 M3 Max 48GB - 1TB ', 83990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/macbook-pro-16-inch-m3-max-2023_1__1.png', 'Laptop', 0, 1),
(30, 'Laptop ASUS Vivobook 14 OLED A1405VA-KM257W', 17490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_16__5_19.png', 'Laptop', 0, 1),
(31, 'Laptop Acer Aspire Lite AL16-51P-55N7 NX.KX0SV.001', 13490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_3__5_61.png', 'Laptop', 0, 1),
(32, 'Laptop HP Gaming Victus 15-FA1139TX 8Y6W3PA', 16990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_11__5_169.png', 'Laptop', 0, 1),
(33, 'True Wireless Samsung Galaxy Buds2 Pro', 2590000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-buds-2-pro-_8_.png', 'Headphone', 0, 1),
(34, 'Apple AirPods 4', 3090000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/i/airpods-4-2.png', 'Headphone', 0, 1),
(35, 'Sony WH-1000XM4', 4890000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/o/sony_wh-1000xm4_5.png', 'Headphone', 0, 1),
(36, 'Marshall Monitor III ANC', 8990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-chup-tai-marshall-monitor-iii-anc_3_.png', 'Headphone', 0, 1),
(37, 'True Wireless Samsung Galaxy Buds 3 Pro', 4990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-samsung-galaxy-buds-3-pro_9_.png', 'Headphone', 0, 1),
(38, 'Apple AirPods Pro 2 2023 USB-C', 5390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/p/apple-airpods-pro-2-usb-c_8_.png', 'Headphone', 0, 1),
(39, 'Sony WH-1000XM5', 7490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-chup-tai-sony-wh-1000xm5-2-removebg-preview.png', 'Headphone', 0, 1),
(40, 'Gaming HyperX Cloud Stinger 2', 1190000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tai-nghe-co-day-hyperx-cloud-stinger-2-_3_.png', 'Headphone', 0, 1),
(41, 'iPhone 15 128GB', 15890000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-plus_1__1.png', 'Phone', 0, 1),
(42, 'iPhone 16 Pro Max 256GB', 30990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-pro-max.png', 'Phone', 0, 1),
(43, 'Samsung Galaxy S25 Ultra 12GB 256GB', 30290000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-samsung-galaxy-s25-ultra_2__3.png', 'Phone', 0, 1),
(44, 'OPPO Reno10 Pro+ 5G 12GB 256GB', 10990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/o/p/oppo-reno10-pro-plus-tim.png', 'Phone', 0, 1),
(45, 'Samsung Galaxy S25 256GB', 20290000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-samsung-galaxy-s25_1__2.png', 'Phone', 0, 1),
(46, 'OPPO FIND N5', 44990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-oppo-find-n5.png', 'Phone', 0, 1),
(47, 'Samsung Galaxy Z Flip6 12GB 256GB', 20490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/r/frame_167_1.png', 'Phone', 0, 1),
(48, 'Xiaomi 14T Pro 12GB 512GB', 16490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi_14t_pro_1_.png', 'Phone', 0, 1),
(49, 'Chuột không dây Logitech MX Master 2S', 1390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/h/chuot-khong-day-logitech-mx-master-2s_3.png', 'Accessorie', 20, 1),
(50, 'iTay cầm chống rung DJI OM 7', 1980000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/a/tay-cam-chong-rung-dji-om-7_1_.png', 'Accessorie', 20, 1),
(51, 'Apple Magic Keyboard 2', 2990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/magic-keyboard-2-phim-so-1_1.jpg', 'Accessorie', 20, 1),
(52, 'Apple Pencil Pro', 3090000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/p/apple-pencil-pro-1.png', 'Accessorie', 20, 1),
(53, 'Củ sạc Ugreen PD 20W CD137', 140000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/r/frame_22_1.png', 'Accessorie', 20, 1),
(54, 'Cáp Baseus Crystal Shine USB-C to Lightning 1.2M', 109000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/3/4/34_1_17.jpg', 'Accessorie', 20, 1),
(55, 'Củ sạc Anker 3 cổng 67W 336 A2674', 490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_6_43.png', 'Accessorie', 20, 1),
(56, 'Webcam Logitech C922 FULLHD 1080P', 2390000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/6/6/66_1_11.jpg', 'Accessorie', 20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `promotion_id` int(11) NOT NULL,
  `promotion_name` varchar(255) NOT NULL,
  `discount_percent` int(11) NOT NULL CHECK (`discount_percent` between 0 and 100),
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`promotion_id`, `promotion_name`, `discount_percent`, `start_date`, `end_date`, `is_active`) VALUES
(1, 'Summer Sale', 15, '2025-05-01', '2025-05-31', 1),
(2, 'Flash Sale Cuối Tuần', 25, '2025-05-16', '2025-05-18', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion_product`
--

CREATE TABLE `promotion_product` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `promotion_product`
--

INSERT INTO `promotion_product` (`id`, `promotion_id`, `product_id`) VALUES
(1, 1, 9),
(2, 2, 11),
(3, 2, 12),
(23, 1, 10),
(24, 1, 14),
(25, 2, 17),
(26, 2, 18),
(27, 2, 20),
(28, 2, 21),
(29, 1, 22),
(30, 2, 23),
(31, 1, 24);

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
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Chỉ mục cho bảng `promotion_product`
--
ALTER TABLE `promotion_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotion_id` (`promotion_id`),
  ADD KEY `product_id` (`product_id`);

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
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `promotion_product`
--
ALTER TABLE `promotion_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `promotion_product`
--
ALTER TABLE `promotion_product`
  ADD CONSTRAINT `promotion_product_ibfk_1` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`promotion_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotion_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
