-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2023 lúc 04:08 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `name_banner` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name_banner`, `created_at`, `updated_at`) VALUES
(11, 'ayA6To2LuTCQZxiAA2xRrPvsSQgsvlsIimage-20210415143808851.png', '2023-05-03 12:08:37', '2023-05-03'),
(12, 'oR4YxfUJJ1xRnTN9QqvSFEVXaZmRepO5yokaiwatch-sq1-1644261555742.jpg', '2023-05-03 12:09:07', '2023-05-03'),
(13, 'dQBcht83B6q6BFbO1k5blkfh5frtxmfs2022-11-24-092804.jpg', '2023-05-03 12:09:19', '2023-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `age`, `created_at`, `updated_at`) VALUES
(2, 'Lịch Sử', 4, '2023-04-12 06:32:32', '2023-04-12'),
(3, 'Truyện Tranh', 4, '2023-04-12 06:33:17', '2023-04-12'),
(4, 'Giai Thoại', 4, '2023-05-03 10:25:33', '2023-05-03'),
(5, 'Sức khỏe', 4, '2023-05-03 10:26:57', '2023-05-03'),
(6, 'Giải Trí', 4, '2023-05-03 10:27:24', '2023-05-03'),
(7, 'Giáo kho ', 4, '2023-05-03 10:27:46', '2023-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_forums`
--

CREATE TABLE `comment_forums` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `forums_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_forums`
--

INSERT INTO `comment_forums` (`id`, `user_id`, `customer_id`, `forums_id`, `comment`, `created_at`, `updated_at`) VALUES
(8, NULL, 2, 24, 'hihi\'', '2023-05-03 03:08:28', '2023-05-03'),
(9, 1, NULL, 24, 'được của ló', '2023-05-03 04:57:01', '2023-05-03'),
(10, 1, NULL, 24, 'Cứ nghĩ là hay', '2023-05-03 12:16:38', '2023-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_products`
--

CREATE TABLE `comment_products` (
  `id` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email_verifed_at` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'defaul.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `email_verifed_at`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Anh Ba Chà Cú', 'ba@gmail.com', '$2y$10$w8h12P9FuJm2ZXGwtvtSnuoZntBUqnQ6AJGLzRrSn8Fioe/XNjN4C', 987654321, 'Hưng Yên', NULL, NULL, 'UmOBOIQxrM6ma42tei7r89ktb7avsujltrang-quynh-ong-la-ai.png', '2023-05-03 23:18:22', '23:18:22'),
(2, 'Bạn Tư giấu tên', 'nkt@gmail.com', '$2y$10$5Aq.FRkfESYt/ccKPwRxl.qvg10a/bYDTrhwv6SCICzcqPOaLkhJO', 123456798, 'Hà nội', NULL, 'gJD4WA3nMa0lcTp8mNG8FKjn3ljeLR5JpbNiOhWUNECtMaxpoJYUZ4EOIMum', 'pvW8wMF6wZCmLC1s8-cung-kim-nguu-21-4-20-5-hop-voi-cung-nao-mau-gi-tinh-cach.png', '2023-05-03 23:17:44', '20:59:58'),
(4, 'Chồn đi lùi', 'baf@gmail.com', '$2y$10$YX4tfAhrnDJI9bFyysqEx.XsxjWaQzKdzbUMv/kXc6aNJ4ve2jqkO', 987653421, 'hfsdjkhfjkh', NULL, NULL, 't9Rn6N3cJlD66Qr81k5blkfh5frtxmfs2022-11-24-092804.jpg', '2023-05-03 17:54:58', '00:54:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `forums`
--

INSERT INTO `forums` (`id`, `user_id`, `customer_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(23, NULL, 2, '<p>khjkhjkhjjkhk</p>', 1, '2023-05-03 19:16:15', '2023-05-03'),
(24, NULL, 2, '<p>HiHI</p><p><br></p>', 1, '2023-05-03 06:04:38', '2023-05-03'),
(25, NULL, 1, '<p>gfdgdfg</p>', 1, '2023-05-03 08:51:38', '2023-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_forums`
--

CREATE TABLE `image_forums` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_note` varchar(255) DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` float(13,3) NOT NULL,
  `sale_price` float(13,3) DEFAULT NULL,
  `size_id` int(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `describe` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `sale_price`, `size_id`, `avatar`, `describe`, `created_at`, `updated_at`) VALUES
(21, 'Thép đã tôi thế đấy', 2, 45600.000, 36500.000, 5, '935vyaFUwWZfVceflfPCYVc2mJoIjV5p005b7bc66211ff1 - Sao chép.jpg', '<p>Một cuốn sách viết rất hay</p>', '2023-05-03 14:12:06', '2023-05-03'),
(22, 'Nhật kí trong tù', 2, 39000.000, 28000.000, 5, 'QhKUmtFWvgfDDh5Am1ib4w5bhxmz3lgmefe1a3b76f06048ddc77dc6b0f3c3ff1.png', '<p>Vần thơ của Bác</p>', '2023-05-03 14:14:13', '2023-05-03'),
(23, 'Từ điển tiếng em', 6, 45000.000, 43500.000, 6, '794kwZZ6QXIx0G24xaqw6wv8fbf5gxfltu-dien-tieng-em-2.png', '<p>Giúp bạn bớt tối cổ</p>', '2023-05-03 14:16:21', '2023-05-03'),
(24, 'Doraemon(Truyện ngắn)', 3, 23000.000, 18000.000, 6, 'u0aJ4KJUJDllIyydtQpNM03MSeEfO7MBDoraemon1.jpg', '<p>Một thế giới tuổi thơ!</p>', '2023-05-03 14:18:21', '2023-05-03'),
(25, '12 phương pháp giảm cân nhanh', 5, 45000.000, 38000.000, 6, 'ngYizmjJ2ZSj48bMiudrmtzw02xjc1t6giamcan.png', '<p>12 cách giảm cân</p>', '2023-05-03 14:21:15', '2023-05-03'),
(26, 'Trạng Quỳnh', 4, 38000.000, 27000.000, 6, 'SmXHdCm0r5aHNyYkrabswim4piwsyso4trang-quynh-trang-quynh.png', '<p>Truyện về trạng Quỳnh</p>', '2023-05-03 14:22:45', '2023-05-03'),
(27, 'Tiếng Việt', 7, 15000.000, 11000.000, 6, '78YsatRwSTUXkt062hgejcop7b4dedwj2022-11-24-092745.jpg', '<p>Sách giáo khoa cấp 1</p>', '2023-05-03 14:27:37', '2023-05-03'),
(28, 'Ngữ văn cấp 2', 7, 16000.000, 13000.000, 5, 'TFYR85KB636hDUH06narqu9bwuxctuwt2022-11-24-092755.jpg', '<p>SGK cấp 2</p>', '2023-05-03 14:29:06', '2023-05-03'),
(29, 'Ngữ văn cấp 3', 7, 16000.000, 13000.000, 6, 'WdAZUR9ag6W4IXKD1k5blkfh5frtxmfs2022-11-24-092804.jpg', '<p>SGK cấp 3</p>', '2023-05-03 14:30:22', '2023-05-03'),
(30, 'Bí kíp võ công(vở)', 6, 16000.000, 8000.000, 6, 's8odwdlVh5Kk85hgi18udkmw4dde6x5z20200517-220200.png', '<p>Vở bìa độc và lạ</p>', '2023-05-03 14:31:59', '2023-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(46, 21, '8pDyGTMxZawclex01a2mufrwraua8lplimagespng.png', '2023-05-03 14:12:06', '2023-05-03'),
(47, 21, 'W4NNHwmxcUCcpBNnKXT5lmUwBWKVh4Z1005b7bc66211ff1.jpg', '2023-05-03 14:12:06', '2023-05-03'),
(48, 21, 'TUp214Vn7KYthhO1n9xlkqf9rfufh6b6nicolai-ostrovsky-2png.png', '2023-05-03 14:12:06', '2023-05-03'),
(49, 22, 'gysbkMzFXe0dgjWu8na8rrolr60zbvvonhatkytrongtu-anh2.png', '2023-05-03 14:14:13', '2023-05-03'),
(50, 22, 'vzHBvQRFFtqP94AAutmcdkkg1pwwiggo203px-to-cuoi-tap-tho-nhat-ky-trong-tu.png', '2023-05-03 14:14:13', '2023-05-03'),
(51, 22, 'MIxgXqWwS6HJYzJHzec5grntfx3konpe202px-khan-bao-lan.png', '2023-05-03 14:14:13', '2023-05-03'),
(52, 23, '4spl9BvCDEdQniQGqx4crk5ui9glzjwqimg-bgt-2021-picture1-1619079341-width675height675.png', '2023-05-03 14:16:21', '2023-05-03'),
(53, 23, 'iu2NqnMT2QPhe6x8unh2tlqg7jo4zxrnf9f350a588c0c0b49768d889ee1d42d2.png', '2023-05-03 14:16:21', '2023-05-03'),
(54, 23, 'J7kKwQSlNI1RTG8lw6cavhkb6kk0tdyhimg-bgt-2021-picture2-1619079341-width656height656.png', '2023-05-03 14:16:21', '2023-05-03'),
(55, 24, 'LVWKZIPfKXgpv0ohB9UlVadVuS85SLYoDoraemon1.jpg', '2023-05-03 14:18:21', '2023-05-03'),
(56, 24, '7fAlMRgm21fKzr2Fmnbncoktvrjyymiyef505f495905b62a2d05209af70c5a98.png', '2023-05-03 14:18:21', '2023-05-03'),
(57, 24, 'hcfwr3few9V8Q39eqazlprzpllbby9bn31-dcc4ce2cbefa4140a3045fbcb4f1a5eb-master.png', '2023-05-03 14:18:22', '2023-05-03'),
(58, 24, 'FIVlxKeLHXj19bYOtQpNM03MSeEfO7MBDoraemon1.jpg', '2023-05-03 14:18:22', '2023-05-03'),
(59, 24, 'ICB0uoDp1YSOWCINtuzwv26cdkuzfoch31-dcc4ce2cbefa4140a3045fbcb4f1a5eb-master.png', '2023-05-03 14:18:22', '2023-05-03'),
(60, 24, 'PBjAXEHTeDpOijWGv38ydojkpeaqgml0doc-truyen-tranh-doremon-chap-36-nghe-thuat-lam-truyen-tranh-001.png', '2023-05-03 14:18:22', '2023-05-03'),
(61, 24, 'SZjAjJzwLxlj7bsyVm3WaYOj81h4isiZDoraemon1 - Sao chép.jpg', '2023-05-03 14:18:22', '2023-05-03'),
(62, 24, 'TLMAP7Bg32LEu3P5Yudy13owRAlD9JbMDoraemon1.jpg', '2023-05-03 14:18:22', '2023-05-03'),
(63, 25, 'n3NERLNrb9Ho7lcF0jp7xqnwavgxhsdndhfjhf.png', '2023-05-03 14:21:15', '2023-05-03'),
(64, 25, 'i1SzZyP0DYTWayo94oj9krexp6yhbbqt10-nguyen-tac-can-nho-truoc-khi-giam-can-nhanh.png', '2023-05-03 14:21:15', '2023-05-03'),
(65, 26, 'aC4yE4I547XaGoGJdjyhfdcorn5kze7qan-trom-meo.png', '2023-05-03 14:22:45', '2023-05-03'),
(66, 26, 'zFGiYpZGpBfvMkRmei7r89ktb7avsujltrang-quynh-ong-la-ai.png', '2023-05-03 14:22:45', '2023-05-03'),
(67, 26, 'lJEZGcA2BHu3RTpel3kwd2s9ftr5roszc4-3.png', '2023-05-03 14:22:45', '2023-05-03'),
(68, 27, 'l7wYtcBHiOJg4M552hgejcop7b4dedwj2022-11-24-092745.jpg', '2023-05-03 14:27:37', '2023-05-03'),
(69, 27, 'BpM84Wi0BJOPWre07bzzypnbscbekquo2022-11-24-092752.jpg', '2023-05-03 14:27:37', '2023-05-03'),
(70, 27, 'J7CsErdWXhezbgFin5ga0arvd6dkg7bs2022-11-24-092742.jpg', '2023-05-03 14:27:37', '2023-05-03'),
(71, 27, 'VFdfqjrMcvKB0lV9urwevmieozi7lvsr2022-11-24-092748.jpg', '2023-05-03 14:27:37', '2023-05-03'),
(72, 27, 'GGi0qf1frxpucvmLwptsdj3lzqfkkxkq2022-11-24-092750.jpg', '2023-05-03 14:27:37', '2023-05-03'),
(73, 28, 'lXiYigEHJ0rgdmrj6narqu9bwuxctuwt2022-11-24-092755.jpg', '2023-05-03 14:29:06', '2023-05-03'),
(74, 28, 'iJRbbXG9czUUXiI99lqw70bddbnf8ho02022-11-24-092757.jpg', '2023-05-03 14:29:06', '2023-05-03'),
(75, 28, 'FXNRPWcWn1gL2eFfhfkeglrykmngxa4p2022-11-24-092802.jpg', '2023-05-03 14:29:06', '2023-05-03'),
(76, 28, '98HLYcDdITLPnv7Hp95arqll6l5zq2ew2022-11-24-092759.jpg', '2023-05-03 14:29:06', '2023-05-03'),
(77, 29, 'jLp4gYuNAmZXIVjc1k5blkfh5frtxmfs2022-11-24-092804.jpg', '2023-05-03 14:30:22', '2023-05-03'),
(78, 29, 'FSLfZmYf766DW6Ozte2eeyosufy9hf8f2022-11-24-092808.jpg', '2023-05-03 14:30:22', '2023-05-03'),
(79, 29, 'BQAot6VYKcx2pLaZyejsfjm3vn6v5mmx2022-11-24-092806.jpg', '2023-05-03 14:30:22', '2023-05-03'),
(80, 30, 'dnqwDoHY8gT7GoVjbwfdld46zv5bcru23ac75f64facf6d8e696efed0faf5da4epng-720x720q80.png', '2023-05-03 14:31:59', '2023-05-03'),
(81, 30, 'kJjAdwkaLMTXfDFMo8liyvkkquj9jamx20200517-220200.png', '2023-05-03 14:31:59', '2023-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(11) NOT NULL,
  `length` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `length`, `width`, `created_at`, `updated_at`) VALUES
(5, '24', '18', '2023-05-03 07:53:57', '2023-05-03'),
(6, '25', '17', '2023-05-03 09:38:04', '2023-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Bạn Tư Giấu Tên', 'nkt@gmail.com', '$2y$10$fklOGc7iHphmSu7Yzs.XYe2R5aDmgHrZ37smO5GdmRmbbdZ6IDxvK', NULL, 'tarus.png', '2023-05-04 01:18:08', NULL),
(2, 'Lê Diễm Hương', 'ldh@gmai.com', '$2y$10$fklOGc7iHphmSu7Yzs.XYe2R5aDmgHrZ37smO5GdmRmbbdZ6IDxvK', NULL, 'avatar3.png', '2023-05-04 02:05:17', NULL),
(3, 'Lê Thúy Diệp', 'ltd', '$2y$10$fklOGc7iHphmSu7Yzs.XYe2R5aDmgHrZ37smO5GdmRmbbdZ6IDxvK', NULL, 'avatar2.png', '2023-05-04 02:05:23', NULL),
(4, 'Phan Đức Mạnh', 'pdm@gmail.com', '$2y$10$fklOGc7iHphmSu7Yzs.XYe2R5aDmgHrZ37smO5GdmRmbbdZ6IDxvK', NULL, 'avatar4.png', '2023-05-04 02:00:30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `writes`
--

CREATE TABLE `writes` (
  `id` int(10) UNSIGNED NOT NULL,
  `write` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `writes`
--

INSERT INTO `writes` (`id`, `write`, `user_name`, `created_at`, `updated_at`) VALUES
(1, 'Không có việc gì khó chỉ cần bỏ cuộc là xong', 'Doãn Chill Bình', '2023-05-03 13:44:22', '2023-05-03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `comment_forums`
--
ALTER TABLE `comment_forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `comment_id` (`forums_id`);

--
-- Chỉ mục cho bảng `comment_products`
--
ALTER TABLE `comment_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `image_forums`
--
ALTER TABLE `image_forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `writes`
--
ALTER TABLE `writes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comment_forums`
--
ALTER TABLE `comment_forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comment_products`
--
ALTER TABLE `comment_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `image_forums`
--
ALTER TABLE `image_forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `writes`
--
ALTER TABLE `writes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment_forums`
--
ALTER TABLE `comment_forums`
  ADD CONSTRAINT `comment_forums_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_forums_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `comment_forums_ibfk_3` FOREIGN KEY (`forums_id`) REFERENCES `forums` (`id`);

--
-- Các ràng buộc cho bảng `comment_products`
--
ALTER TABLE `comment_products`
  ADD CONSTRAINT `comment_products_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `comment_products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_products_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `forums_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `image_forums`
--
ALTER TABLE `image_forums`
  ADD CONSTRAINT `image_forums_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `product_sizes` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
