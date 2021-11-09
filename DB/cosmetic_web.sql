-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 09, 2021 at 10:19 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetic_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearest` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not nearest|1:nearest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to my home, my life.', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">Well, let me tell you, that didn\'t last very long. I came right back to PC and I will not stray again! Even though I did find an exfoliating mask/scrub that I will continue to use (I do not care for the UnScrub product.) nothing else compared to PC products both in performance and price. I never could find a cream cleanser to beat this one. It\'s creamy, luscious and incredibly softening on the skin. Like a spa treatment. And it removes makeup when used with a soft washcloth. I love the bigger bottle. I use Perfectly Balanced cleanser too and I also love that one- I wish they would make a larger size in that one too!</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-weight: 700; line-height: 30px; font-size: 30px; color: rgb(51, 51, 51); font-family: Cairo, sans-serif;\">The corner window forms a place within a place that is a resting point within the large space.</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">I was using MOISTURE BOOST cleanser, I looked tired, wrinkled, sagged, older, .... Then I remembered someone said the cleanser is very important!! I tried to switch to this one. It is a cream, like need to squeeze the bottle to let it out :) After a couple of days, my face became away softer and even lifted. I learned the previous cleanser was taking too much away from my skin. Love it and recommend!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">my skin (oily acne prone) have always been dehydrated from acne treatments ( BHA, retinol, etc), and for years i was looking for a cleanser that can do the job without over drying or breaking me out. this cleanser removes everything including make up, sunscreen, impurities yet leaving the skin soothed and comfortable. after a while using it my skin looks hydrated and healthy which helped my pores to look much better. this cleanser is a MUST for anyone using exfoliants, retinol, or any acne treatments.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">Love this cleanser. My skin instantly felt and still feels and looks softer. I was hesitant to buy this product because I have typically had more oily prone skin, but I\'ve had no issues. I also feel my skin is thoroughly cleansed when I use this.</p>', 'uploads/2021-08/blog_1629556136.jpg', 3, NULL, NULL),
(2, 'Do you give foods for your skin?', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">Well, let me tell you, that didn\'t last very long. I came right back to PC and I will not stray again! Even though I did find an exfoliating mask/scrub that I will continue to use (I do not care for the UnScrub product.) nothing else compared to PC products both in performance and price. I never could find a cream cleanser to beat this one. It\'s creamy, luscious and incredibly softening on the skin. Like a spa treatment. And it removes makeup when used with a soft washcloth. I love the bigger bottle. I use Perfectly Balanced cleanser too and I also love that one- I wish they would make a larger size in that one too!</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-weight: 700; line-height: 30px; font-size: 30px; color: rgb(51, 51, 51); font-family: Cairo, sans-serif;\">The corner window forms a place within a place that is a resting point within the large space.</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">I was using MOISTURE BOOST cleanser, I looked tired, wrinkled, sagged, older, .... Then I remembered someone said the cleanser is very important!! I tried to switch to this one. It is a cream, like need to squeeze the bottle to let it out :) After a couple of days, my face became away softer and even lifted. I learned the previous cleanser was taking too much away from my skin. Love it and recommend!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">my skin (oily acne prone) have always been dehydrated from acne treatments ( BHA, retinol, etc), and for years i was looking for a cleanser that can do the job without over drying or breaking me out. this cleanser removes everything including make up, sunscreen, impurities yet leaving the skin soothed and comfortable. after a while using it my skin looks hydrated and healthy which helped my pores to look much better. this cleanser is a MUST for anyone using exfoliants, retinol, or any acne treatments.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">Love this cleanser. My skin instantly felt and still feels and looks softer. I was hesitant to buy this product because I have typically had more oily prone skin, but I\'ve had no issues. I also feel my skin is thoroughly cleansed when I use this.</p>', 'uploads/2021-08/blog_1629557798.jpg', 3, NULL, NULL),
(3, 'The Story of Skincare is very special', '<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I have been using PC products for years. I got a little bored though and decided to try out some other skincare products</span><br></p>', 'uploads/2021-08/blog_1629555465.jpg', 3, NULL, NULL),
(4, 'Somethings, good for you!', '<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I started using this a year ago. I love it! Skinceuticals products are my favorite. This helps to moisturize and keep skin smooth.</span><br></p>', 'uploads/2021-08/blog_1629555499.jpg', 3, NULL, NULL),
(5, 'Do you give foods for your skin?', '<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I like recommending this moisturizer for my patients that want an exfoliating nighttime moisturizer</span><br></p>', 'uploads/2021-08/blog_1629555528.jpg', 3, NULL, NULL),
(6, 'Somethings, good for you!', '<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I started using this a year ago. I love it! Skinceuticals products are my favorite. This helps to moisturize and keep skin smooth.</span><br></p>', 'uploads/2021-08/blog_1629556172.jpg', 3, NULL, NULL),
(7, 'The Story of Skincare is very special', '<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I have been using PC products for years. I got a little bored though and decided to try out some other skincare products</span><br></p>', 'uploads/2021-08/blog_1629556200.jpg', 3, NULL, NULL),
(8, 'Do you give foods for your skin?', '<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I like recommending this moisturizer for my patients that want an exfoliating nighttime moisturizer</span><br></p>', 'uploads/2021-08/blog_1629556228.jpg', 3, NULL, NULL),
(9, 'Welcome to my home, my life.', '<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">Love Skin, Love Myself. Favorite cleanser I ever tried - sensitive skin / rosacea</span><br></p>', 'uploads/2021-08/blog_1629556254.jpg', 3, NULL, NULL),
(10, 'Somethings, good for you!', '<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I started using this a year ago. I love it! Skinceuticals products are my favorite. This helps to moisturize and keep skin smooth.</span><br></p>', 'uploads/2021-08/blog_1629556280.jpg', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0:Unread|1:Read',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_image` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0: image default | 1: avatar',
  `del_flag` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `type_image`, `del_flag`) VALUES
(1, 1, 'img/featured/pro1.png', 1, 0),
(2, 2, 'img/featured/pro2.png', 1, 0),
(3, 3, 'img/featured/pro3.png', 1, 0),
(4, 4, 'img/featured/pro10.png', 1, 0),
(5, 5, 'img/featured/pro11.png', 1, 0),
(6, 6, 'img/featured/pro12.png', 1, 0),
(7, 7, 'img/featured/pro13.png', 1, 0),
(8, 8, 'uploads/2021-08/product_image_1629558907.png', 1, 0),
(9, 9, 'uploads/2021-08/product_image_1629559071.png', 1, 0),
(10, 8, 'uploads/2021-08/product_image_1629558927.png', 0, 0),
(11, 9, 'uploads/2021-08/product_image_1629559063.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000001_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2021_07_18_053703_create_type_products_table', 1),
(9, '2021_07_18_053803_create_products_table', 1),
(10, '2021_07_20_173050_create_orders_table', 1),
(11, '2021_07_20_173051_create_order_details_table', 1),
(12, '2021_07_20_173059_create_reviews_table', 1),
(13, '2021_07_20_173060_create_carts_table', 1),
(14, '2021_07_23_173430_create_suppliers_table', 1),
(15, '2021_07_23_175652_create_delivery_received_notes_table', 1),
(16, '2021_07_23_180846_create_detail_delivery_received_notes_table', 1),
(17, '2021_08_19_203933_create_images_table', 1),
(18, '2021_08_19_204804_create_blogs_table', 1),
(19, '2021_08_19_205212_create_contacts_table', 1),
(20, '2021_08_19_205809_create_ratings_table', 1),
(21, '2021_08_20_015756_create_addresses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Lumen Personal Access Client', '4vtskYI2R0ARNlupKsJYMHUpihwLmkpqa4gd62pe', NULL, 'http://localhost', 1, 0, 0, '2021-08-31 10:19:45', '2021-08-31 10:19:45'),
(2, NULL, 'Lumen Password Grant Client', '8XlW8CBZabFkmjjZK2KaeehGQaLETYizDJQTcrl5', 'users', 'http://localhost', 0, 1, 0, '2021-08-31 10:19:45', '2021-08-31 10:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-31 10:19:45', '2021-08-31 10:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `payment` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:COD|1:paypal|2:zalopay',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:unpaid|1:paid',
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `del_flag` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0:Undel|1:del',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `payment`, `note`, `status`, `fullname`, `address`, `phone_number`, `user_id`, `del_flag`, `created_at`, `updated_at`) VALUES
(29, 2, 0, '', 2, 'customer', 'C8x Bình Dương', '0912345678', 1, 0, '2021-09-02 02:51:59', '2021-09-08 23:53:21'),
(36, 1, 0, '', 0, 'customer', 'C8x Bình Dương', '0912345678', 1, 1, '2021-09-06 02:44:54', '2021-09-06 11:16:16'),
(38, 3, 0, '', 2, 'customer', 'C8x Bình Dương', '0912345678', 1, 0, '2021-09-08 09:27:39', '2021-09-08 09:27:39'),
(45, 2, 0, '', 0, 'customer', 'C8x Bình Dương', '0912345678', 1, 0, '2021-09-08 09:45:42', '2021-09-08 09:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(29, 3, 1, 90.00, NULL, NULL),
(29, 4, 1, 500000.00, NULL, NULL),
(36, 3, 1, 90.00, NULL, NULL),
(38, 3, 1, 90.00, NULL, NULL),
(38, 4, 1, 500000.00, NULL, NULL),
(38, 5, 1, 670000.00, NULL, NULL),
(45, 3, 1, 90.00, NULL, NULL),
(45, 4, 1, 500000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_security` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(4) NOT NULL DEFAULT 0 COMMENT '	0:new|1:used',
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:Inactive|1:Active',
  `del_flag` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:Undel|1:Del',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` double(8,2) NOT NULL,
  `promotion_price` double(8,2) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `best_seller` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1: check | 0: uncheck',
  `latest` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1: check | 0: uncheck',
  `top_rated` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1: check | 0: uncheck',
  `sample_home` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1: check | 0: uncheck',
  `updated_at` timestamp NULL DEFAULT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT 0,
  `percent` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `unit_price`, `promotion_price`, `unit`, `stock`, `views`, `type_id`, `created_at`, `best_seller`, `latest`, `top_rated`, `sample_home`, `updated_at`, `del_flag`, `percent`) VALUES
(1, 'Anti Polution Sunshine', '<span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">A just-got-back-from-somewhere-sunny glow that flatters every complexion. It’s an easy way to get a bronzy glow without the long-term consequences.</span>', 120.00, 1.00, '1', 10, 1, 4, '2020-10-10 17:00:00', 1, 1, 1, 0, '2021-09-04 22:32:51', 0, 10),
(2, 'Sukari Babyfacial', '<a href=\"file:///D:/HK7/LTWEB/WindWobbles/shop_details_pro.html\" style=\"color: rgb(37, 37, 37); background-color: rgb(255, 255, 255); font-family: Cairo, sans-serif; text-align: center;\">Sukari Babyfacial</a>', 80.00, 21.00, '1', 30, 1, 6, '2020-10-10 17:00:00', 1, 1, 1, 1, '2021-08-21 15:08:42', 0, 11),
(3, 'Shabe Comples Cleanser', '<a href=\"file:///D:/HK7/LTWEB/WindWobbles/shop_details_pro.html\" style=\"color: rgb(37, 37, 37); background-color: rgb(255, 255, 255); font-family: Cairo, sans-serif; text-align: center;\">Shabe Comples Cleanser</a>', 90.00, 1.00, '1', 61, 1, 2, '2020-10-10 17:00:00', 1, 1, 1, 1, '2021-09-08 09:45:42', 0, 0),
(4, 'Hydralight Face Cleanser', '<a href=\"file:///D:/HK7/LTWEB/WindWobbles/shop_details_pro.html\" style=\"color: rgb(37, 37, 37); background-color: rgb(255, 255, 255); outline: none; font-family: Cairo, sans-serif; text-align: center;\">Hydralight Face Cleanser</a>', 500000.00, 21.00, '1', 26, 1, 1, '2020-10-10 17:00:00', 1, 1, 1, 1, '2021-09-08 09:45:42', 0, 13),
(5, 'Retinol 0.3%', 'Retinol 0.3%', 670000.00, 21.00, '1', 11, 1, 4, '2020-10-10 17:00:00', 1, 1, 1, 1, '2021-09-08 09:43:44', 0, 14),
(6, 'Triple Lipid Restore 2:4', '<span style=\"color: rgb(32, 33, 36); font-family: consolas, \"lucida console\", \"courier new\", monospace; font-size: 12px; white-space: pre-wrap;\">Triple Lipid Restore 2:4</span>', 128.00, NULL, '1', 5, 1, 1, '2020-10-10 17:00:00', 1, 1, 1, 1, '2021-09-05 00:08:14', 0, 15),
(7, 'Brightening Skin', '<span style=\"color: rgb(32, 33, 36); font-family: consolas, \"lucida console\", \"courier new\", monospace; font-size: 12px; white-space: pre-wrap;\">Brightening Skin</span>', 275000.00, NULL, '1', 22, 1, 3, '2020-10-10 17:00:00', 1, 1, 1, 1, '2021-08-21 15:20:35', 0, 16),
(8, 'Softening Cream Cleanser', '<span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Softening Cream Cleanser</span>', 180000.00, NULL, '1', 33, 1, 5, '2020-10-10 17:00:00', 1, 1, 1, 1, '2021-08-21 15:17:01', 0, 17),
(9, 'Juju Var travel Dou', '<a href=\"file:///D:/HK7/LTWEB/WindWobbles/shop_details_pro.html\" style=\"color: rgb(37, 37, 37); background-color: rgb(255, 255, 255); font-family: Cairo, sans-serif; text-align: center;\">Juju Var travel Dou</a>', 200000.00, NULL, '1', 0, 1, 3, '2020-10-10 17:00:00', 0, 1, 0, 0, '2021-08-21 15:19:52', 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supp_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_details`
--

CREATE TABLE `receipt_details` (
  `receipt_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `email`, `phone_number`) VALUES
(1, 'Luxury Girl', 'Konovaltsya Street 346, Ivano-Frankivsʼk, 76005, Ukraine', 'nthit08@gmail.com', '0968506539'),
(2, 'Drunk Elephant', '1600 38th Street Suite 424 Austin, TX 78731 USA', 'info@drunkelephant.com', '0366969460'),
(3, 'Paula\'s Choice', '705 5th Avenue South Suite 200 Seattle', 'info@paulaschoice.com', '03685757429'),
(4, 'Skinceuticals', '501 W 30th St department 10, New York', 'info@skinceuticals.com', '0366969460');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `del_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `del_flag`) VALUES
(1, 'Moisturizer', 'Moisturizer<br>', 'img/skintype/web12.png', '2021-08-20 05:36:47', '2021-08-21 15:04:33', 0),
(2, 'Toner', 'Toner<br>', 'img/skintype/web11.png', '2021-08-20 06:48:58', '2021-08-21 15:04:53', 0),
(3, 'Cleanser', 'Cleanser', 'img/skintype/web10.png', '2021-08-20 06:48:58', '2021-08-21 15:05:11', 0),
(4, 'Eyes', '<span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Eyes</span><br>', 'img/skintype/web7.png', '2021-08-20 06:48:58', '2021-08-21 15:06:31', 0),
(5, 'Face', '<p><span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Face</span><br></p>', 'uploads/2021-08/product_type1629558066.png', '2021-08-21 15:01:06', '2021-08-21 15:01:06', 0),
(6, 'Lipstick', '<p><span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Lipstick</span><br></p>', 'uploads/2021-08/product_type1629558250.png', '2021-08-21 15:04:10', '2021-09-04 23:21:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '	0:customer|1:staff',
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:male|1:female',
  `birthday` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `fullname`, `phone_number`, `gender`, `birthday`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'customer', '$2y$10$yd5eIt5uM.asUGkXsAxPUu1QZcbSR64LSp1fjcr47NLXzcsA7DsbC', 0, 'customer', '0912345678', '0', NULL, 'C8x Bình Dương', 'customer@gmail.com', NULL, NULL),
(2, 'customer1', '$2y$10$fjLsivqQoFxGtkYtxwIqaerazFAsCj21GTskr...S10u9KKH.aoXS', 0, 'customer1', '0912345678', '0', NULL, 'Tân Bình', 'customer1@gmail.com', NULL, NULL),
(3, 'staff', '$2y$10$1gnyf7XYlyTmCqjdotFzWOuNFW1YVkr2ZljziJ/mysliTNzf4FADS', 1, 'staff', '0912345678', '0', NULL, 'HCM', 'staff@gmail.com', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_order_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `carts_user_id_index` (`user_id`),
  ADD KEY `carts_product_id_index` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_index` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_details_order_id_index` (`order_id`),
  ADD KEY `order_details_product_id_index` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_type_id_foreign` (`type_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `ratings_user_id_index` (`user_id`),
  ADD KEY `ratings_product_id_index` (`product_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_received_notes_supp_id_foreign` (`supp_id`),
  ADD KEY `delivery_received_notes_user_id_foreign` (`user_id`);

--
-- Indexes for table `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD PRIMARY KEY (`receipt_id`,`product_id`),
  ADD KEY `detail_delivery_received_notes_detail_note_id_index` (`receipt_id`),
  ADD KEY `detail_delivery_received_notes_product_id_index` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `reviews_user_id_index` (`user_id`),
  ADD KEY `reviews_product_id_index` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`supp_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receipts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt_details`
--
ALTER TABLE `receipt_details`
  ADD CONSTRAINT `detail_delivery_received_notes_detail_note_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `receipt_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
