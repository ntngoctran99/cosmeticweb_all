-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 172.16.0.3    Database: shop_fashion
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearest` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:not nearest|1:nearest',
  PRIMARY KEY (`id`),
  KEY `addresses_order_id_foreign` (`user_id`),
  CONSTRAINT `addresses_order_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'Welcome to my home, my life.','<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">Well, let me tell you, that didn\'t last very long. I came right back to PC and I will not stray again! Even though I did find an exfoliating mask/scrub that I will continue to use (I do not care for the UnScrub product.) nothing else compared to PC products both in performance and price. I never could find a cream cleanser to beat this one. It\'s creamy, luscious and incredibly softening on the skin. Like a spa treatment. And it removes makeup when used with a soft washcloth. I love the bigger bottle. I use Perfectly Balanced cleanser too and I also love that one- I wish they would make a larger size in that one too!</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-weight: 700; line-height: 30px; font-size: 30px; color: rgb(51, 51, 51); font-family: Cairo, sans-serif;\">The corner window forms a place within a place that is a resting point within the large space.</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">I was using MOISTURE BOOST cleanser, I looked tired, wrinkled, sagged, older, .... Then I remembered someone said the cleanser is very important!! I tried to switch to this one. It is a cream, like need to squeeze the bottle to let it out :) After a couple of days, my face became away softer and even lifted. I learned the previous cleanser was taking too much away from my skin. Love it and recommend!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">my skin (oily acne prone) have always been dehydrated from acne treatments ( BHA, retinol, etc), and for years i was looking for a cleanser that can do the job without over drying or breaking me out. this cleanser removes everything including make up, sunscreen, impurities yet leaving the skin soothed and comfortable. after a while using it my skin looks hydrated and healthy which helped my pores to look much better. this cleanser is a MUST for anyone using exfoliants, retinol, or any acne treatments.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">Love this cleanser. My skin instantly felt and still feels and looks softer. I was hesitant to buy this product because I have typically had more oily prone skin, but I\'ve had no issues. I also feel my skin is thoroughly cleansed when I use this.</p>','uploads/2021-08/blog_1629556136.jpg',NULL,NULL),(2,'Do you give foods for your skin?','<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">Well, let me tell you, that didn\'t last very long. I came right back to PC and I will not stray again! Even though I did find an exfoliating mask/scrub that I will continue to use (I do not care for the UnScrub product.) nothing else compared to PC products both in performance and price. I never could find a cream cleanser to beat this one. It\'s creamy, luscious and incredibly softening on the skin. Like a spa treatment. And it removes makeup when used with a soft washcloth. I love the bigger bottle. I use Perfectly Balanced cleanser too and I also love that one- I wish they would make a larger size in that one too!</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; font-weight: 700; line-height: 30px; font-size: 30px; color: rgb(51, 51, 51); font-family: Cairo, sans-serif;\">The corner window forms a place within a place that is a resting point within the large space.</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">I was using MOISTURE BOOST cleanser, I looked tired, wrinkled, sagged, older, .... Then I remembered someone said the cleanser is very important!! I tried to switch to this one. It is a cream, like need to squeeze the bottle to let it out :) After a couple of days, my face became away softer and even lifted. I learned the previous cleanser was taking too much away from my skin. Love it and recommend!</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">my skin (oily acne prone) have always been dehydrated from acne treatments ( BHA, retinol, etc), and for years i was looking for a cleanser that can do the job without over drying or breaking me out. this cleanser removes everything including make up, sunscreen, impurities yet leaving the skin soothed and comfortable. after a while using it my skin looks hydrated and healthy which helped my pores to look much better. this cleanser is a MUST for anyone using exfoliants, retinol, or any acne treatments.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 18px; font-family: Cairo, sans-serif; color: black; line-height: 30px; text-align: center;\">Love this cleanser. My skin instantly felt and still feels and looks softer. I was hesitant to buy this product because I have typically had more oily prone skin, but I\'ve had no issues. I also feel my skin is thoroughly cleansed when I use this.</p>','uploads/2021-08/blog_1629557798.jpg',NULL,NULL),(3,'The Story of Skincare is very special','<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I have been using PC products for years. I got a little bored though and decided to try out some other skincare products</span><br></p>','uploads/2021-08/blog_1629555465.jpg',NULL,NULL),(4,'Somethings, good for you!','<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I started using this a year ago. I love it! Skinceuticals products are my favorite. This helps to moisturize and keep skin smooth.</span><br></p>','uploads/2021-08/blog_1629555499.jpg',NULL,NULL),(5,'Do you give foods for your skin?','<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I like recommending this moisturizer for my patients that want an exfoliating nighttime moisturizer</span><br></p>','uploads/2021-08/blog_1629555528.jpg',NULL,NULL),(6,'Somethings, good for you!','<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I started using this a year ago. I love it! Skinceuticals products are my favorite. This helps to moisturize and keep skin smooth.</span><br></p>','uploads/2021-08/blog_1629556172.jpg',NULL,NULL),(7,'The Story of Skincare is very special','<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I have been using PC products for years. I got a little bored though and decided to try out some other skincare products</span><br></p>','uploads/2021-08/blog_1629556200.jpg',NULL,NULL),(8,'Do you give foods for your skin?','<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I like recommending this moisturizer for my patients that want an exfoliating nighttime moisturizer</span><br></p>','uploads/2021-08/blog_1629556228.jpg',NULL,NULL),(9,'Welcome to my home, my life.','<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">Love Skin, Love Myself. Favorite cleanser I ever tried - sensitive skin / rosacea</span><br></p>','uploads/2021-08/blog_1629556254.jpg',NULL,NULL),(10,'Somethings, good for you!','<p><span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">I started using this a year ago. I love it! Skinceuticals products are my favorite. This helps to moisturize and keep skin smooth.</span><br></p>','uploads/2021-08/blog_1629556280.jpg',NULL,NULL);
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`user_id`),
  KEY `carts_user_id_index` (`user_id`),
  KEY `carts_product_id_index` (`product_id`),
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_received_notes`
--

DROP TABLE IF EXISTS `delivery_received_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_received_notes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1:Delivery | 2: Received',
  `supp_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `delivery_received_notes_supp_id_foreign` (`supp_id`),
  KEY `delivery_received_notes_user_id_foreign` (`user_id`),
  CONSTRAINT `delivery_received_notes_supp_id_foreign` FOREIGN KEY (`supp_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `delivery_received_notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_received_notes`
--

LOCK TABLES `delivery_received_notes` WRITE;
/*!40000 ALTER TABLE `delivery_received_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_received_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_delivery_received_notes`
--

DROP TABLE IF EXISTS `detail_delivery_received_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_delivery_received_notes` (
  `detail_note_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  PRIMARY KEY (`detail_note_id`,`product_id`),
  KEY `detail_delivery_received_notes_detail_note_id_index` (`detail_note_id`),
  KEY `detail_delivery_received_notes_product_id_index` (`product_id`),
  CONSTRAINT `detail_delivery_received_notes_detail_note_id_foreign` FOREIGN KEY (`detail_note_id`) REFERENCES `delivery_received_notes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detail_delivery_received_notes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_delivery_received_notes`
--

LOCK TABLES `detail_delivery_received_notes` WRITE;
/*!40000 ALTER TABLE `detail_delivery_received_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_delivery_received_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_image` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: image default | 1: avatar',
  `del_flag` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `images_product_id_index` (`product_id`),
  CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,1,'img/featured/pro1.png',1,0),(2,2,'img/featured/pro2.png',1,0),(3,3,'img/featured/pro3.png',1,0),(4,4,'img/featured/pro10.png',1,0),(5,5,'img/featured/pro11.png',1,0),(6,6,'img/featured/pro12.png',1,0),(7,7,'img/featured/pro13.png',1,0),(8,8,'uploads/2021-08/product_image_1629558907.png',1,0),(9,9,'uploads/2021-08/product_image_1629559071.png',1,0),(10,8,'uploads/2021-08/product_image_1629558927.png',0,0),(11,9,'uploads/2021-08/product_image_1629559063.png',0,0);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000001_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2021_07_18_053703_create_type_products_table',1),(9,'2021_07_18_053803_create_products_table',1),(10,'2021_07_20_173050_create_orders_table',1),(11,'2021_07_20_173051_create_order_details_table',1),(12,'2021_07_20_173059_create_reviews_table',1),(13,'2021_07_20_173060_create_carts_table',1),(14,'2021_07_23_173430_create_suppliers_table',1),(15,'2021_07_23_175652_create_delivery_received_notes_table',1),(16,'2021_07_23_180846_create_detail_delivery_received_notes_table',1),(17,'2021_08_19_203933_create_images_table',1),(18,'2021_08_19_204804_create_blogs_table',1),(19,'2021_08_19_205212_create_contacts_table',1),(20,'2021_08_19_205809_create_ratings_table',1),(21,'2021_08_20_015756_create_addresses_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `order_details_order_id_index` (`order_id`),
  KEY `order_details_product_id_index` (`product_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL,
  `payment` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:COD|1:paypal|2:zalopay',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:unpaid|1:paid',
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_security` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(4) NOT NULL DEFAULT '0' COMMENT '	0:new|1:used',
  `active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:Inactive|1:Active',
  `del_flag` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:Undel|1:Del',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `unit_price` double(8,2) NOT NULL,
  `promotion_price` double(8,2) DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `best_seller` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1: check | 0: uncheck',
  `latest` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1: check | 0: uncheck',
  `top_rated` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1: check | 0: uncheck',
  `sample_home` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1: check | 0: uncheck',
  `updated_at` timestamp NULL DEFAULT NULL,
  `suppliers_id` bigint(20) NOT NULL,
  `del_flag` tinyint(1) NOT NULL DEFAULT '0',
  `percent` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_type_id_foreign` (`type_id`),
  CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Anti Polution Sunshine','<span style=\"color: rgb(0, 0, 0); font-family: Cairo, sans-serif;\">A just-got-back-from-somewhere-sunny glow that flatters every complexion. It’s an easy way to get a bronzy glow without the long-term consequences.</span>',120.00,1.00,'$',1,4,'2020-10-10 17:00:00',1,1,1,0,'2021-08-21 14:43:40',1,0,10),(2,'Sukari Babyfacial','<a href=\"file:///D:/HK7/LTWEB/WindWobbles/shop_details_pro.html\" style=\"color: rgb(37, 37, 37); background-color: rgb(255, 255, 255); font-family: Cairo, sans-serif; text-align: center;\">Sukari Babyfacial</a>',80.00,21.00,'$',1,6,'2020-10-10 17:00:00',1,1,1,1,'2021-08-21 15:08:42',1,0,11),(3,'Shabe Comples Cleanser','<a href=\"file:///D:/HK7/LTWEB/WindWobbles/shop_details_pro.html\" style=\"color: rgb(37, 37, 37); background-color: rgb(255, 255, 255); font-family: Cairo, sans-serif; text-align: center;\">Shabe Comples Cleanser</a>',90.00,1.00,'$',1,2,'2020-10-10 17:00:00',1,1,1,1,'2021-08-21 14:46:43',1,0,0),(4,'Hydralight Face Cleanser','<a href=\"file:///D:/HK7/LTWEB/WindWobbles/shop_details_pro.html\" style=\"color: rgb(37, 37, 37); background-color: rgb(255, 255, 255); outline: none; font-family: Cairo, sans-serif; text-align: center;\">Hydralight Face Cleanser</a>',500000.00,21.00,'$',1,1,'2020-10-10 17:00:00',1,1,1,1,'2021-08-21 15:09:51',1,0,13),(5,'Retinol 0.3%','Retinol 0.3%',670000.00,21.00,'$',1,4,'2020-10-10 17:00:00',1,1,1,1,'2021-08-21 15:11:19',1,0,14),(6,'Triple Lipid Restore 2:4','<span style=\"color: rgb(32, 33, 36); font-family: consolas, \"lucida console\", \"courier new\", monospace; font-size: 12px; white-space: pre-wrap;\">Triple Lipid Restore 2:4</span>',128.00,NULL,'$',1,1,'2020-10-10 17:00:00',1,1,1,1,'2021-08-21 15:13:20',1,0,15),(7,'Brightening Skin','<span style=\"color: rgb(32, 33, 36); font-family: consolas, \"lucida console\", \"courier new\", monospace; font-size: 12px; white-space: pre-wrap;\">Brightening Skin</span>',275000.00,NULL,'$',1,3,'2020-10-10 17:00:00',1,1,1,1,'2021-08-21 15:20:35',1,0,16),(8,'Softening Cream Cleanser','<span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Softening Cream Cleanser</span>',180000.00,NULL,'$',1,5,'2020-10-10 17:00:00',1,1,1,1,'2021-08-21 15:17:01',1,0,17),(9,'Juju Var travel Dou','<a href=\"file:///D:/HK7/LTWEB/WindWobbles/shop_details_pro.html\" style=\"color: rgb(37, 37, 37); background-color: rgb(255, 255, 255); font-family: Cairo, sans-serif; text-align: center;\">Juju Var travel Dou</a>',200000.00,NULL,'$',1,3,'2020-10-10 17:00:00',0,1,0,0,'2021-08-21 15:19:52',1,0,18);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `ratings_user_id_index` (`user_id`),
  KEY `ratings_product_id_index` (`product_id`),
  CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`product_id`),
  KEY `reviews_user_id_index` (`user_id`),
  KEY `reviews_product_id_index` (`product_id`),
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'ADMIN'),(2,'USER');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Luxury Girl','Konovaltsya Street 346, Ivano-Frankivsʼk, 76005, Ukraine','nthit08@gmail.com','0968506539'),(2,'Drunk Elephant','1600 38th Street Suite 424 Austin, TX 78731 USA','info@drunkelephant.com','0366969460'),(3,'Paula\'s Choice','705 5th Avenue South Suite 200 Seattle','info@paulaschoice.com','03685757429'),(4,'Skinceuticals','501 W 30th St department 10, New York','info@skinceuticals.com','0366969460');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_products`
--

DROP TABLE IF EXISTS `type_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `del_flag` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_products`
--

LOCK TABLES `type_products` WRITE;
/*!40000 ALTER TABLE `type_products` DISABLE KEYS */;
INSERT INTO `type_products` VALUES (1,'Moisturizer','Moisturizer<br>','img/skintype/web12.png','2021-08-20 05:36:47','2021-08-21 15:04:33',0),(2,'Toner','Toner<br>','img/skintype/web11.png','2021-08-20 06:48:58','2021-08-21 15:04:53',0),(3,'Cleanser','Cleanser','img/skintype/web10.png','2021-08-20 06:48:58','2021-08-21 15:05:11',0),(4,'Eyes','<span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Eyes</span><br>','img/skintype/web7.png','2021-08-20 06:48:58','2021-08-21 15:06:31',0),(5,'Face','<p><span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Face</span><br></p>','uploads/2021-08/product_type1629558066.png','2021-08-21 15:01:06','2021-08-21 15:01:06',0),(6,'Lipstick','<p><span style=\"color: rgb(32, 33, 36); font-family: consolas, &quot;lucida console&quot;, &quot;courier new&quot;, monospace; font-size: 12px; white-space: pre-wrap;\">Lipstick</span><br></p>','uploads/2021-08/product_type1629558250.png','2021-08-21 15:04:10','2021-08-21 15:04:10',0);
/*!40000 ALTER TABLE `type_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '	0:customer|1:staff',
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:male|1:female',
  `birthday` timestamp NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'customer','$2y$10$yd5eIt5uM.asUGkXsAxPUu1QZcbSR64LSp1fjcr47NLXzcsA7DsbC',0,'customer','0912345678','0',NULL,'C8x Bình Dương','customer@gmail.com',NULL,NULL),(2,'customer1','$2y$10$fjLsivqQoFxGtkYtxwIqaerazFAsCj21GTskr...S10u9KKH.aoXS',0,'customer1','0912345678','0',NULL,'Tân Bình','customer1@gmail.com',NULL,NULL),(3,'staff','$2y$10$1gnyf7XYlyTmCqjdotFzWOuNFW1YVkr2ZljziJ/mysliTNzf4FADS',1,'staff','0912345678','0',NULL,'HCM','staff@gmail.com',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-22  8:55:04
