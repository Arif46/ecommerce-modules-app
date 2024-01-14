-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: askmebd_local
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account_summaries`
--

DROP TABLE IF EXISTS `account_summaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_summaries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int unsigned DEFAULT NULL,
  `total_sell_amount` double(8,2) NOT NULL COMMENT 'Total sell ammount individual seller',
  `total_paid_amount` double(8,2) NOT NULL COMMENT 'Total paid ammount individual seller',
  `total_commission_amount` double(8,2) NOT NULL COMMENT 'Total commission ammount individual seller',
  PRIMARY KEY (`id`),
  KEY `account_summaries_seller_id_foreign` (`seller_id`),
  CONSTRAINT `account_summaries_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_summaries`
--

LOCK TABLES `account_summaries` WRITE;
/*!40000 ALTER TABLE `account_summaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `account_summaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admanager`
--

DROP TABLE IF EXISTS `admanager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admanager` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` int DEFAULT NULL,
  `image_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('home','shop','corporate','others') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('top','popup','footer','bottom','slider') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admanager`
--

LOCK TABLES `admanager` WRITE;
/*!40000 ALTER TABLE `admanager` DISABLE KEYS */;
INSERT INTO `admanager` VALUES (4,'Afshini is one of the unique online shopping sites in Bangladesh','afshini-is-one-of-the-unique-online-shopping-sites-in-bangladesh-2021219-142441','<p>If you would like to experience the best of online shopping for men, women and kids in Bangladesh, this is the right place. Afshini is the ultimate destination for fashion and lifestyle including clothing, footwear, accessories, jewellery, personal care products and more.</p>',NULL,1,'shop-now-pay-later.jpg','home','top','active',0,'1','1','2020-10-28 00:14:22','2021-02-19 14:24:51'),(5,'Afshini offers you the ideal combination','shop-with-confidence-0-day-online-returns','Sign up to receive email updates on special promotions, new product announcements, gifts ideas and more. You can shop online at Afshini from the comfort of your home and get your favorite\'s delivered right to your doorstep.',NULL,2,'shop-with-confidence-0-day-online-returns.jpg','home','bottom','active',0,'1','1','2020-10-28 00:28:34','2020-12-16 21:46:25'),(6,'Free shipping for 5000/- Taka, Keep shopping, keep saving','free-shipping-for-000-taka-keep-shopping-keep-saving-2021321-10155','<p>Free shipping for 5000/- Taka, Keep shopping, keep saving</p>',NULL,3,'up-to-0-off-select-categories-0-off-0-0-off-0-off.jpg','home','slider','active',0,'1','1','2020-10-28 00:33:36','2021-03-21 09:03:07'),(7,'Order Now 5000/- Taka & get Free shipping.','order-now-000-taka-get-free-shipping-2021321-10349','<p>Life is hard enough already. Let us make it a little easier.</p>',NULL,4,'shop-now-pay-later11.jpg','home','slider','active',0,'1','1','2020-10-28 00:34:40','2021-03-21 09:09:28'),(8,'Shop Now. Pay Later. Your one stop smart shopping.','shop-now-pay-later-your-one-stop-smart-shopping-2021321-101029','<p>Shop Now. Pay Later. Save when you spend. Your one stop smart shopping resource.</p>',NULL,5,NULL,'home','slider','active',0,'1','1','2020-10-28 00:35:24','2021-03-21 09:10:53'),(9,'Your one stop smart shopping resource.','up-to-0-off-select-categories-0-off-0-0-off-0-off13','Shop Now. Pay Later. Save when you spend. Your one stop smart shopping resource.',NULL,6,NULL,'home','popup','active',0,'1','1','2020-10-28 01:24:17','2020-12-16 21:43:01'),(10,'Life is hard enough already. Let us make it a little easier.','sign-up-newsletter','Be it clothing, footwear or accessories, Afshini offers you the ideal combination of fashion and functionality for men, women and kids. Our online store brings you the latest in designer products straight out of fashion houses.',NULL,7,NULL,'home','footer','active',0,'1','1','2020-10-28 02:12:57','2020-12-16 21:48:58'),(11,'Up to 30% off','up-to-0-off','select categories. 30% off $50, 40% off $75, 50% off',NULL,9,NULL,'home','slider','cancel',0,'1','1','2020-11-30 06:49:00','2020-12-02 01:13:30'),(12,'Shop Now. Pay Later. Save when you spend.','website-design','Shop Now. Pay Later. Save when you spend. Your one stop smart shopping resource.',NULL,1,'website-design.jpg','home','top','inactive',0,'1','1','2020-12-02 01:03:24','2020-12-16 23:54:49'),(13,'24/7 customer support','2-customer-support','Our team is here to give you personalized support within the hour - available 24/7. Join daily live webinars, watch our tutorials, or browse through our knowledge base',NULL,8,NULL,'home','slider','inactive',0,'1','1','2020-12-02 01:54:00','2020-12-02 10:42:39');
/*!40000 ALTER TABLE `admanager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_seller_payments`
--

DROP TABLE IF EXISTS `admin_seller_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_seller_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `received_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `pay_by` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 = Cash',
  `special_instruction` text COLLATE utf8mb4_unicode_ci,
  `admin_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note_hi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note_ch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_note_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_note_hi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_note_ch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_copy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'document',
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Use for mobile transfar',
  `approve_or_reject` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3' COMMENT '1 = approve',
  `approve_or_reject_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_or_reject_note_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_or_reject_note_hi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_or_reject_note_ch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL COMMENT 'Admin id',
  `updated_by` int DEFAULT NULL COMMENT 'User ID, who approved or reject',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_seller_payments`
--

LOCK TABLES `admin_seller_payments` WRITE;
/*!40000 ALTER TABLE `admin_seller_payments` DISABLE KEYS */;
INSERT INTO `admin_seller_payments` VALUES (4,'AMBDRE-001',2,19,700212,'1','nvnvn','hjhgj','hhghg','hjhjj','jhjhj',NULL,NULL,NULL,NULL,'1640629179.jpeg','jhjhkj','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-24 12:03:56','2021-12-27 12:19:39',NULL),(5,'AMBDRE-005',2,19,7900,'1','hjjg','hgfhf','gdg','ggfd','gfdgf',NULL,NULL,NULL,NULL,'1640629223.jpeg','jhgh','3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-24 12:36:13','2021-12-27 12:20:23',NULL),(6,'AMBDRE-006',2,1,900,'1','hghg','hgh','hgghghf','hkhk','hghgh',NULL,NULL,NULL,NULL,'1637779168.jpeg','khhjhj','3',NULL,NULL,NULL,NULL,'2021-11-26 00:00:00',NULL,NULL,'2021-11-24 12:39:28','2021-11-24 12:39:28',NULL);
/*!40000 ALTER TABLE `admin_seller_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code_column` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('text','textarea','checkbox') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_is_required` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `backend_title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backend_title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backend_title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backend_title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_code_column_unique` (`code_column`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute`
--

LOCK TABLES `attribute` WRITE;
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
INSERT INTO `attribute` VALUES (1,'size','checkbox','no',1,'Size',NULL,NULL,NULL,'Size',NULL,NULL,NULL,'yes',NULL,NULL,NULL,'active','1',NULL,'2019-10-25 02:38:48','2019-10-25 02:38:48'),(2,'color','checkbox','no',2,'Color',NULL,NULL,NULL,'Color',NULL,NULL,NULL,'no',NULL,NULL,NULL,'active','1',NULL,'2019-10-28 19:07:28','2019-10-28 19:07:28');
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_option`
--

DROP TABLE IF EXISTS `attribute_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_option` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int unsigned DEFAULT NULL,
  `frontend_title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backend_title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backend_title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backend_title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backend_title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_option_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_option_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_option`
--

LOCK TABLES `attribute_option` WRITE;
/*!40000 ALTER TABLE `attribute_option` DISABLE KEYS */;
INSERT INTO `attribute_option` VALUES (1,1,'X',NULL,NULL,NULL,'X',NULL,NULL,NULL,'x','active','1','1','2019-10-25 02:39:08','2021-03-21 13:32:26'),(2,1,'S',NULL,NULL,NULL,'S',NULL,NULL,NULL,'s','active','1','1','2019-10-25 02:39:27','2021-03-21 13:32:41'),(3,1,'M',NULL,NULL,NULL,'M',NULL,NULL,NULL,'m','active','1',NULL,'2019-10-28 19:06:30','2019-10-28 19:06:30'),(4,1,'L',NULL,NULL,NULL,'L',NULL,NULL,NULL,'l','active','1','1','2019-10-28 19:06:37','2021-03-21 13:33:12'),(5,2,'White',NULL,NULL,NULL,'White',NULL,NULL,NULL,'white','active','1',NULL,'2019-10-28 19:07:45','2019-10-28 19:07:45'),(6,2,'Red',NULL,NULL,NULL,'Red',NULL,NULL,NULL,'red','active','1',NULL,'2019-10-28 19:07:54','2019-10-28 19:07:54'),(7,2,'Green',NULL,NULL,NULL,'Green',NULL,NULL,NULL,'green','active','1',NULL,'2019-10-28 19:08:19','2019-10-28 19:08:19'),(8,2,'Black',NULL,NULL,NULL,'Black',NULL,NULL,NULL,'black','active','1',NULL,'2019-10-28 19:08:30','2019-10-28 19:08:30'),(9,2,'Blue',NULL,NULL,NULL,'Blue',NULL,NULL,NULL,'blue','active','1',NULL,'2019-10-28 19:08:38','2019-10-28 19:08:38'),(10,2,'Yellow',NULL,NULL,NULL,'Yellow',NULL,NULL,NULL,'yellow','active','1',NULL,'2021-03-19 19:11:36','2021-03-19 19:11:36'),(11,2,'Brown',NULL,NULL,NULL,'Brown',NULL,NULL,NULL,'brown','active','1',NULL,'2021-03-19 19:12:58','2021-03-19 19:12:58'),(12,2,'Azure',NULL,NULL,NULL,'Azure',NULL,NULL,NULL,'azure','active','1',NULL,'2021-03-19 19:13:13','2021-03-19 19:13:13'),(13,2,'Ivory',NULL,NULL,NULL,'Ivory',NULL,NULL,NULL,'ivory','active','1',NULL,'2021-03-19 19:13:36','2021-03-19 19:13:36'),(14,2,'Teal',NULL,NULL,NULL,'Teal',NULL,NULL,NULL,'teal','active','1',NULL,'2021-03-19 19:13:45','2021-03-19 19:13:45'),(15,2,'Purple',NULL,NULL,NULL,'Purple',NULL,NULL,NULL,'purple','active','1',NULL,'2021-03-19 19:14:01','2021-03-19 19:14:01'),(16,2,'Orange',NULL,NULL,NULL,'Orange',NULL,NULL,NULL,'orange','active','1',NULL,'2021-03-19 19:14:10','2021-03-19 19:14:10'),(17,2,'Maroon',NULL,NULL,NULL,'Maroon',NULL,NULL,NULL,'maroon','active','1',NULL,'2021-03-19 19:14:19','2021-03-19 19:14:19'),(18,2,'Charcoal',NULL,NULL,NULL,'Charcoal',NULL,NULL,NULL,'charcoal','active','1',NULL,'2021-03-19 19:14:31','2021-03-19 19:14:31'),(19,2,'Olive',NULL,NULL,NULL,'Olive',NULL,NULL,NULL,'olive','active','1',NULL,'2021-03-19 19:14:52','2021-03-19 19:14:52'),(20,2,'Magenta',NULL,NULL,NULL,'Magenta',NULL,NULL,NULL,'magenta','active','1',NULL,'2021-03-19 19:14:58','2021-03-19 19:14:58'),(21,2,'Pink',NULL,NULL,NULL,'Pink',NULL,NULL,NULL,'pink','active','1',NULL,'2021-03-19 19:15:24','2021-03-19 19:15:24'),(22,2,'Lime',NULL,NULL,NULL,'Lime',NULL,NULL,NULL,'lime','active','1',NULL,'2021-03-19 19:15:32','2021-03-19 19:15:32'),(23,2,'Coral',NULL,NULL,NULL,'Coral',NULL,NULL,NULL,'coral','active','1',NULL,'2021-03-19 19:15:46','2021-03-19 19:15:46'),(24,2,'Gray',NULL,NULL,NULL,'Gray',NULL,NULL,NULL,'gray','active','1',NULL,'2021-03-19 19:15:55','2021-03-19 19:15:55'),(25,1,'XL',NULL,NULL,NULL,'XL',NULL,NULL,NULL,'xl','active','1','1','2021-03-19 19:17:42','2021-03-21 13:33:32'),(26,1,'XXL',NULL,NULL,NULL,'XXL',NULL,NULL,NULL,'xxl','active','1','1','2021-03-19 19:19:33','2021-03-21 13:33:48');
/*!40000 ALTER TABLE `attribute_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_set`
--

DROP TABLE IF EXISTS `attribute_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_set` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `attribute_set_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_set`
--

LOCK TABLES `attribute_set` WRITE;
/*!40000 ALTER TABLE `attribute_set` DISABLE KEYS */;
INSERT INTO `attribute_set` VALUES (1,'Default',NULL,NULL,NULL,'default','active','1',NULL,'2019-07-03 12:55:32','2019-07-03 12:55:32'),(2,'Clothing',NULL,NULL,NULL,'clothing','active','1',NULL,'2019-07-03 12:55:48','2019-07-03 12:55:48'),(3,'Mens',NULL,NULL,NULL,'mens','active','1','1','2019-07-03 12:56:31','2019-10-28 19:04:51'),(4,'Caps',NULL,NULL,NULL,'caps','active','1',NULL,'2019-07-03 12:57:11','2019-07-03 12:57:11'),(5,'kids & mom',NULL,NULL,NULL,'kids-mom','active','1',NULL,'2019-10-18 06:25:51','2019-10-18 06:25:51'),(6,'color',NULL,NULL,NULL,'color','cancel','1','1','2019-10-25 04:07:41','2019-10-28 19:03:43');
/*!40000 ALTER TABLE `attribute_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_set_items`
--

DROP TABLE IF EXISTS `attribute_set_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attribute_set_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` int unsigned DEFAULT NULL,
  `attribute_set_id` int unsigned DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_set_items_attribute_id_foreign` (`attribute_id`),
  KEY `attribute_set_items_attribute_set_id_foreign` (`attribute_set_id`),
  CONSTRAINT `attribute_set_items_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`),
  CONSTRAINT `attribute_set_items_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attribute_set` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_set_items`
--

LOCK TABLES `attribute_set_items` WRITE;
/*!40000 ALTER TABLE `attribute_set_items` DISABLE KEYS */;
INSERT INTO `attribute_set_items` VALUES (2,1,2,'1',NULL,'2019-10-25 02:44:57','2019-10-25 02:44:57'),(3,2,5,'1',NULL,'2019-10-28 19:09:13','2019-10-28 19:09:13'),(4,1,5,'1',NULL,'2019-10-28 19:09:13','2019-10-28 19:09:13'),(5,2,3,'1',NULL,'2019-10-28 19:09:23','2019-10-28 19:09:23'),(6,1,3,'1',NULL,'2019-10-28 19:09:23','2019-10-28 19:09:23'),(7,2,2,'1',NULL,'2019-10-28 19:09:41','2019-10-28 19:09:41'),(8,2,1,'1',NULL,'2021-03-19 19:11:03','2021-03-19 19:11:03'),(9,1,1,'1',NULL,'2021-03-19 19:11:03','2021-03-19 19:11:03');
/*!40000 ALTER TABLE `attribute_set_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_bn` text COLLATE utf8mb4_unicode_ci,
  `description_hi` text COLLATE utf8mb4_unicode_ci,
  `description_ch` text COLLATE utf8mb4_unicode_ci,
  `image_link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Brand Logo',
  `short_order` int DEFAULT NULL,
  `meta_title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_description_bn` text COLLATE utf8mb4_unicode_ci,
  `meta_description_hi` text COLLATE utf8mb4_unicode_ci,
  `meta_description_ch` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image_link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Apex',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2021-11-01 17:36:37','2021-11-01 17:36:37');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_bn` text COLLATE utf8mb4_unicode_ci,
  `description_hi` text COLLATE utf8mb4_unicode_ci,
  `description_ch` text COLLATE utf8mb4_unicode_ci,
  `image_link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` int DEFAULT NULL,
  `meta_title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description_bn` text COLLATE utf8mb4_unicode_ci,
  `meta_description_hi` text COLLATE utf8mb4_unicode_ci,
  `meta_description_ch` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords_bn` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords_hi` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords_ch` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image_link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Handy Craft',NULL,NULL,NULL,'handy-craft-2021315181615',NULL,NULL,NULL,NULL,'bag.jpg',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2019-07-01 14:41:21','2021-03-15 17:16:34'),(2,'Festival',NULL,NULL,NULL,'festival-2021325145948',NULL,NULL,NULL,NULL,'festival-2021325145948.jpg',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2019-07-01 14:41:40','2021-03-25 14:02:04'),(3,'Women',NULL,NULL,NULL,'women-2021325125028',NULL,NULL,NULL,NULL,'women.jpg',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2019-07-01 14:42:00','2021-03-25 11:50:35'),(4,'Mens',NULL,NULL,NULL,'mens-2021325125013',NULL,NULL,NULL,NULL,'mens-2021325125013.jpg',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2019-07-03 13:32:56','2021-03-25 14:04:38'),(5,'Gift Item',NULL,NULL,NULL,'gift-item-202132515025',NULL,NULL,NULL,NULL,'gift-item.jpg',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2019-07-05 00:03:13','2021-03-25 14:00:31'),(6,'kids & mom',NULL,NULL,NULL,'kids--mom-202132515036',NULL,NULL,NULL,NULL,'kids--mom.jpg',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2019-10-18 06:23:51','2021-03-25 14:00:41'),(7,'Tshairt',NULL,NULL,NULL,'tshairt-20213251354',NULL,NULL,NULL,NULL,'tshairt.jpeg',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2019-12-25 06:57:35','2021-03-25 12:05:16'),(8,'Shirt',NULL,NULL,NULL,'shirt-2021325124952',NULL,NULL,NULL,NULL,'polo-shirt.jpg',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2019-12-25 06:58:09','2021-03-25 11:50:03'),(9,'Pant',NULL,NULL,NULL,'pant-202132513529',NULL,NULL,NULL,NULL,'pant.jpeg',2,'Pant',NULL,NULL,NULL,'Pant',NULL,NULL,NULL,'Pant',NULL,NULL,NULL,NULL,'active','1','1','2019-12-25 06:59:18','2021-03-25 12:05:51'),(10,'Men Tshairt',NULL,NULL,NULL,'men-tshairt',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cancel','1','1','2020-01-01 02:20:21','2021-03-25 11:48:16'),(11,'Women Tshirt',NULL,NULL,NULL,'women-tshirt',NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'cancel','1','1','2020-01-01 02:20:43','2021-03-25 11:48:11'),(12,'Health & Beauty',NULL,NULL,NULL,'health--beauty-202132513235','Health & Beauty',NULL,NULL,NULL,'beauty-care.jpg',3,'Health & Beauty',NULL,NULL,NULL,'Health & Beauty',NULL,NULL,NULL,'Health & Beauty',NULL,NULL,NULL,NULL,'active','1','1','2020-06-09 10:52:15','2021-03-25 12:03:08'),(13,'Jewellery',NULL,NULL,NULL,'jewellery-2021315172637','jewellery shop',NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-15 16:27:57','2021-03-15 16:27:57'),(14,'Perfume',NULL,NULL,NULL,'perfume-2021315173518',NULL,NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-15 16:35:32','2021-03-15 16:35:32'),(15,'Perfume',NULL,NULL,NULL,'perfume-2021315181357',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-15 17:14:06','2021-03-15 17:14:06'),(16,'Body Spray',NULL,NULL,NULL,'body-spray-2021315181413','Body Spray',NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-15 17:14:48','2021-03-15 17:14:48'),(17,'Home Décor',NULL,NULL,NULL,'home-dcor-2021315182257',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1','1','2021-03-15 17:15:55','2021-03-15 17:23:37'),(18,'Kitchen Craft',NULL,NULL,NULL,'kitchen-craft-2021315181653',NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-15 17:18:06','2021-03-15 17:18:06'),(19,'Necklaces',NULL,NULL,NULL,'necklaces-2021315181859','Necklaces',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-15 17:21:16','2021-03-15 17:21:16'),(20,'Bracelets',NULL,NULL,NULL,'bracelets-2021315182119','Bracelets',NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-15 17:21:49','2021-03-15 17:21:49'),(21,'Sarees',NULL,NULL,NULL,'sarees-2021325125341','Sarees',NULL,NULL,NULL,NULL,2,'Sarees',NULL,NULL,NULL,'Sarees',NULL,NULL,NULL,'Sarees',NULL,NULL,NULL,NULL,'active','1','1','2021-03-25 11:56:22','2021-03-25 11:56:43'),(22,'Dupattas & Shawls',NULL,NULL,NULL,'dupattas--shawls-2021325125650','Dupattas & Shawls',NULL,NULL,NULL,NULL,1,'Dupattas & Shawls',NULL,NULL,NULL,'Dupattas & Shawls',NULL,NULL,NULL,'Dupattas & Shawls',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-25 11:57:43','2021-03-25 11:57:43'),(23,'Dresses',NULL,NULL,NULL,'dresses-202132513057','Dresses',NULL,NULL,NULL,NULL,3,'Dresses',NULL,NULL,NULL,'Dresses',NULL,NULL,NULL,'Dresses',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-25 12:01:13','2021-03-25 12:01:13'),(24,'Health & Beauty',NULL,NULL,NULL,'health--beauty-202132513142','Health & Beauty',NULL,NULL,NULL,NULL,4,'Health & Beauty',NULL,NULL,NULL,'Health & Beauty',NULL,NULL,NULL,'Health & Beauty',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-25 12:02:03','2021-03-25 12:02:03');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_self_relation`
--

DROP TABLE IF EXISTS `category_self_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_self_relation` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_category_id` int unsigned DEFAULT NULL,
  `child_category_id` int unsigned DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_self_relation_parent_category_id_foreign` (`parent_category_id`),
  KEY `category_self_relation_child_category_id_foreign` (`child_category_id`),
  CONSTRAINT `category_self_relation_child_category_id_foreign` FOREIGN KEY (`child_category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `category_self_relation_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_self_relation`
--

LOCK TABLES `category_self_relation` WRITE;
/*!40000 ALTER TABLE `category_self_relation` DISABLE KEYS */;
INSERT INTO `category_self_relation` VALUES (1,5,1,'1','1','2019-07-01 14:41:21','2021-03-13 11:27:58'),(2,NULL,2,'1',NULL,'2019-07-01 14:41:40','2019-07-01 14:41:40'),(3,NULL,3,'1',NULL,'2019-07-01 14:42:00','2019-07-01 14:42:00'),(4,NULL,4,'1',NULL,'2019-07-03 13:32:56','2019-07-03 13:32:56'),(5,NULL,5,'1',NULL,'2019-07-05 00:03:13','2019-07-05 00:03:13'),(6,NULL,6,'1',NULL,'2019-10-18 06:23:51','2019-10-18 06:23:51'),(7,4,7,'1',NULL,'2019-12-25 06:57:35','2019-12-25 06:57:35'),(8,4,8,'1',NULL,'2019-12-25 06:58:09','2019-12-25 06:58:09'),(9,4,9,'1',NULL,'2019-12-25 06:59:18','2019-12-25 06:59:18'),(10,7,10,'1',NULL,'2020-01-01 02:20:21','2020-01-01 02:20:21'),(11,7,11,'1',NULL,'2020-01-01 02:20:43','2020-01-01 02:20:43'),(12,4,12,'1','1','2020-06-09 10:52:15','2021-03-25 12:03:08'),(13,5,13,'1',NULL,'2021-03-15 16:27:57','2021-03-15 16:27:57'),(14,5,14,'1',NULL,'2021-03-15 16:35:32','2021-03-15 16:35:32'),(15,14,15,'1',NULL,'2021-03-15 17:14:06','2021-03-15 17:14:06'),(16,14,16,'1',NULL,'2021-03-15 17:14:48','2021-03-15 17:14:48'),(17,1,17,'1',NULL,'2021-03-15 17:15:55','2021-03-15 17:15:55'),(18,1,18,'1',NULL,'2021-03-15 17:18:06','2021-03-15 17:18:06'),(19,13,19,'1',NULL,'2021-03-15 17:21:16','2021-03-15 17:21:16'),(20,13,20,'1',NULL,'2021-03-15 17:21:49','2021-03-15 17:21:49'),(21,3,21,'1',NULL,'2021-03-25 11:56:22','2021-03-25 11:56:22'),(22,3,22,'1',NULL,'2021-03-25 11:57:43','2021-03-25 11:57:43'),(23,3,23,'1',NULL,'2021-03-25 12:01:13','2021-03-25 12:01:13'),(24,3,24,'1',NULL,'2021-03-25 12:02:03','2021-03-25 12:02:03');
/*!40000 ALTER TABLE `category_self_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `page_tag` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms`
--

LOCK TABLES `cms` WRITE;
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;
INSERT INTO `cms` VALUES (1,'about-us','About Us','<p><strong>ONLINE SHOPPING MADE EASY AT AFSHINI</strong><br><br>If you would like to experience the best of online shopping for men, women and kids in Bangladesh, you are at the right place. Afshini is the ultimate destination for fashion and lifestyle, being host to a wide array of merchandise including clothing, footwear, accessories, jewellery, personal care products and more. It is time to redefine your style statement with our treasure-trove of trendy items. Our online store brings you the latest in designer products straight out of fashion houses. You can shop online at Afshini from the comfort of your home and get your favourites delivered right to your doorstep.</p><p><strong>BEST ONLINE SHOPPING SITE IN BANGLADESH FOR FASHION</strong><br><br>Be it clothing, footwear or accessories, Afshini offers you the ideal combination of fashion and functionality for men, women and kids. You will realise that the sky is the limit when it comes to the types of outfits that you can purchase for different occasions.</p><p><strong>Smart men’s clothing</strong> - At Afshini you will find myriad options in smart formal shirts and trousers, cool T-shirts and jeans, or kurta and pyjama combinations for men. Wear your attitude with printed T-shirts. Create the back-to-campus vibe with varsity T-shirts and distressed jeans. Be it gingham, buffalo, or window-pane style, checked shirts are unbeatably smart. Team them up with chinos, cuffed jeans or cropped trousers for a smart casual look. Opt for a stylish layered look with biker jackets. Head out in cloudy weather with courage in water-resistant jackets. Browse through our innerwear section to find supportive garments which would keep you confident in any outfit.</p><p><strong>Trendy women’s clothing</strong> - Online shopping for women at Afshini is a mood-elevating experience. Look hip and stay comfortable with chinos and printed shorts this summer. Look hot on your date dressed in a little black dress, or opt for red dresses for a sassy vibe. Striped dresses and T-shirts represent the classic spirit of nautical fashion. Choose your favourites from among Bardot, off-shoulder, shirt-style, blouson, embroidered and peplum tops, to name a few. Team them up with skinny-fit jeans, skirts or palazzos. Kurtis and jeans make the perfect fusion-wear combination for the cool urbanite. Our grand sarees and lehenga-choli selections are perfect to make an impression at big social events such as weddings. Our salwar-kameez sets, kurtas and Patiala suits make comfortable options for regular wear.</p><p><strong>Fashionable footwear</strong> - While clothes maketh the man, the type of footwear you wear reflects your personality. We bring you an exhaustive lineup of options in casual shoes for men, such as sneakers and loafers. Make a power statement at work dressed in brogues and oxfords. Practice for your marathon with running shoes for men and women. Choose shoes for individual games such as tennis, football, basketball, and the like. Or step into the casual style and comfort offered by sandals, sliders, and flip-flops. Explore our lineup of fashionable footwear for ladies, including pumps, heeled boots, wedge-heels, and pencil-heels. Or enjoy the best of comfort and style with embellished and metallic flats.</p><p><strong>Stylish accessories</strong> - Afshini is one of the best online shopping sites for classy accessories that perfectly complement your outfits. You can select smart analogue or digital watches and match them up with belts and ties. Pick up spacious bags, backpacks, and wallets to store your essentials in style. Whether you prefer minimal jewellery or grand and sparkling pieces, our online jewellery collection offers you many impressive options.</p><p><strong>Fun and frolic </strong>- Online shopping for kids at Afshini is a complete joy. Your little princess is going to love the wide variety of pretty dresses, ballerina shoes, headbands and clips. Delight your son by picking up sports shoes, superhero T-shirts, football jerseys and much more from our online store. Check out our lineup of toys with which you can create memories to cherish.</p><p><strong>Beauty begins here</strong> - You can also refresh, rejuvenate and reveal beautiful skin with personal care, beauty and grooming products from Afshini. Our soaps, shower gels, skin care creams, lotions and other ayurvedic products are specially formulated to reduce the effect of aging and offer the ideal cleansing experience. Keep your scalp clean and your hair uber-stylish with shampoos and hair care products. Choose makeup to enhance your natural beauty.</p><p>Afshini is one of the best online shopping sites in Bangladesh which could help transform your living spaces completely. Add colour and personality to your bedrooms with bed linen and curtains. Use smart tableware to impress your guest. Wall decor, clocks, photo frames and artificial plants are sure to breathe life into any corner of your home.</p>','active',0,'1','1','2019-11-08 01:36:19','2021-01-14 19:53:06'),(2,'contact-us','Contact us','<p><strong>Shop Location -&nbsp;</strong><br />\r\n3/13 SantiNagar , Ghatail , Tangail/</p>\r\n\r\n<p><strong>Call us +880-1312-304426 </strong></p>\r\n\r\n<p><strong>Email us - ashinishop@gmail.com</strong></p>','active',0,'1','1','2019-11-07 06:12:30','2021-01-16 18:06:49'),(3,'privacy-policy','privacy policy','<p><strong>Introduction</strong><br>We value the trust you place in us. That\'s why we insist upon the highest standards for secure transactions and customer information privacy. Please read the following statement to learn about our information gathering and dissemination practices.</p><p>Note: Our privacy policy is subject to change at any time without notice. To make sure you are aware of any changes, please review this policy periodically.</p><p>By visiting this Website or mobile application you agree to be bound by the terms and conditions of this Privacy Policy. If you do not agree please do not use or access our Website.</p><p>By mere use of the Website, you expressly consent to our use and disclosure of your personal information in accordance with this Privacy Policy. This Privacy Policy is incorporated into and subject to the Terms of Use.</p><p>Collection of Personally Identifiable Information and other Information<br>When you use our Website, we collect and store your personal information which is provided by you from time to time. Our primary goal in doing so is to provide you a safe, efficient, smooth and customized experience. This allows us to provide services and features that most likely meet your needs, and to customize our Website to make your experience safer and easier. More importantly, while doing so we collect personal information from you that we consider necessary for achieving this purpose.</p><p>In general, you can browse the Website without telling us who you are or revealing any personal information about yourself. Once you give us your personal information, you are not anonymous to us. Where possible, we indicate which fields are required and which fields are optional. You always have the option to not provide information by choosing not to use a particular service or feature on the Website. We may automatically track certain information about you based upon your behavior on our Website. We use this information to do internal research on our users\' demographics, interests, and behavior to better understand, protect and serve our users. This information is compiled and analyzed on an aggregated basis. This information may include the URL that you just came from (whether this URL is on our Website or not), which URL you next go to (whether this URL is on our Website or not), your computer browser information, and your IP address. We use data collection devices such as \"cookies\" on certain pages of the Website to help analyze our web page flow, measure promotional effectiveness, and promote trust and safety. \"Cookies\" are small files placed on your hard drive that assist us in providing our services. We offer certain features that are only available through the use of a \"cookie\". We also use cookies to allow you to enter your password less frequently during a session. Cookies can also help us provide information that is targeted to your interests. Most cookies are \"session cookies,\" meaning that they are automatically deleted at the end of a session. You are always free to decline our cookies if your browser permits, although in that case you may not be able to use certain features on the Website and you may be required to re-enter your password more frequently during a session.</p><p>Additionally, you may encounter \"cookies\" or other similar devices on certain pages of the Website that are placed by third parties. We do not control the use of cookies by third parties.</p><p>If you choose to buy on the Website, we collect information about your buying behavior.</p><p>If you transact with us, we collect some additional information, such as a billing address, a credit / debit card number and a credit / debit card expiration date and/ or other payment instrument details and tracking information from cheques or money orders.</p><p>If you choose to post messages on our message boards, chat rooms or other message areas or leave feedback, we will collect that information you provide to us. We retain this information as necessary to resolve disputes, provide customer support and troubleshoot problems as permitted by law.</p><p>If you send us personal correspondence, such as emails or letters, or if other users or third parties send us correspondence about your activities or postings on the Website, we may collect such information into a file specific to you.</p><p>We collect personally identifiable information (email address, name, phone number, credit card / debit card / other payment instrument details, etc.) from you when you set up a free account with us. While you can browse some sections of our Website without being a registered member, certain activities (such as placing an order) do require registration. We do use your contact information to send you offers based on your previous orders and your interests.</p><p>Use of Demographic / Profile Data / Your Information<br>We use personal information to provide the services you request. To the extent we use your personal information to market to you, we will provide you the ability to opt-out of such uses. We use your personal information to resolve disputes; troubleshoot problems; help promote a safe service; collect money; measure consumer interest in our products and services, inform you about online and offline offers, products, services, and updates; customize your experience; detect and protect us against error, fraud and other criminal activity; enforce our terms and conditions; and as otherwise described to you at the time of collection.</p><p>With your consent, we will have access to your SMS, contacts in your directory, location and device information. We may share this data with our affiliates. In the event that consent to this such use of data is withdrawn in the future, we will stop collection of such data but continue to store the data and use it for internal purposes to further improve our services.</p><p>In our efforts to continually improve our product and service offerings, we collect and analyse demographic and profile data about our users\' activity on our Website.</p><p>We identify and use your IP address to help diagnose problems with our server, and to administer our Website. Your IP address is also used to help identify you and to gather broad demographic information.</p><p>We will occasionally ask you to complete optional online surveys. These surveys may ask you for contact information and demographic information (like pin code, age, or income level). We use this data to tailor your experience at our Website, providing you with content that we think you might be interested in and to display content according to your preferences.</p><p><strong>Sharing of personal information</strong><br>We may share personal information with our other corporate entities and affiliates. These entities and affiliates may market to you as a result of such sharing unless you explicitly opt-out.</p><p>We may disclose personal information to third parties. This disclosure may be required for us to provide you access to our Services, to comply with our legal obligations, to enforce our User Agreement, to facilitate our marketing and advertising activities, or to prevent, detect, mitigate, and investigate fraudulent or illegal activities related to our Services. We do not disclose your personal information to third parties for their marketing and advertising purposes without your explicit consent.</p><p>We may disclose personal information if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process. We may disclose personal information to law enforcement offices, third party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms or Privacy Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of our users or the general public.</p><p>We and our affiliates will share / sell some or all of your personal information with another business entity should we (or our assets) plan to merge with, or be acquired by that business entity, or re-organization, amalgamation, restructuring of business. Should such a transaction occur that other business entity (or the new combined entity) will be required to follow this privacy policy with respect to your personal information.</p><p><strong>Links to Other Sites</strong><br>Our Website links to other websites that may collect personally identifiable information about you. Afshini is not responsible for the privacy practices or the content of those linked websites.</p><p><strong>Security Precautions</strong><br>Our Website has stringent security measures in place to protect the loss, misuse, and alteration of the information under our control. Whenever you change or access your account information, we offer the use of a secure server. Once your information is in our possession we adhere to strict security guidelines, protecting it against unauthorized access.</p><p><strong>Choice/Opt-Out</strong><br>We provide all users with the opportunity to opt-out of receiving non-essential (promotional, marketing-related) communications from us on behalf of our partners, and from us in general, after setting up an account.</p><p>If you want to remove your contact information from all www.Afshini.com lists and newsletters, please visit unsubscribe.</p><p><strong>Advertisements on www.Afshini.com</strong><br>We use third-party advertising companies to serve ads when you visit our Website. These companies may use information (not including your name, address, email address, or telephone number) about your visits to this and other websites in order to provide advertisements about goods and services of interest to you.</p><p><strong>Your Consent</strong><br>By using the Website and/ or by providing your information, you consent to the collection and use of the information you disclose on the Website in accordance with this Privacy Policy, including but not limited to Your consent for sharing your information as per this privacy policy.</p><p>If we decide to change our privacy policy, we will post those changes on this page so that you are always aware of what information we collect, how we use it, and under what circumstances we disclose it.</p>','active',0,'1','1','2019-11-08 00:45:55','2021-01-14 19:42:36'),(4,'customer-service','customer service','<p>Webartbd is a platform that allows you to easily submit the requirements of your web development and design related tasks or projects. Our revolutionary portal will then act as a resource manager allowing you to seamlessly communicate, make payments, send files and submit feedback of the work.</p><p><strong>1. Sign up for free</strong></p><p>Create a free account as a client and post your job, receive the best bid possible or you can buy our custom products and get your job done with integrity and quality.</p><p><strong>2. Get a free quote</strong></p><p>Let us know about your project and our expert team will provide you the best quote for your job at free of cost.<br>This will enable you to know more about the time and cost required for your job to be done and delivered.</p><p><strong>3. Buy our premade custom products</strong></p><p>Make things getting done more hassle free by buying our products. Each product is custom selected based on your needs. This preset fixed price and time is just what you would need. Knock us to know more.</p>','inactive',0,'1','1','2019-11-07 17:48:13','2020-12-13 01:55:27'),(5,'term-of-use','Terms of Website Use','<p>1 in 4 Millennials say they will visit the on-premise on Black Wednesday before spending Thanksgiving Day with Family According to the latest Nielsen CGA On Premise Consumer Survey (OPCS), a fifth of the</p>','inactive',0,'1','1','2019-11-08 00:43:32','2020-12-13 01:55:54'),(6,'return-policy','return policy','<p>Afshini\'s returns and exchange policy gives you an option to return or exchange items purchased on Afshini for any reason within the specified return/exchange period (check product details page for the same). We only ask that you don\'t use the product and preserve its original condition, tags, and packaging. You are welcome to try on a product but please take adequate measure to preserve its condition. There are two ways to return the product to us:</p><p>If you choose to exchange the item for reason of mismatch of size or receipt of a defective item, you will be provided with a replacement of the item, free of cost. However all exchanges are subject to stock availability and subject to your address being serviceable for an exchange. If you choose to exchange an item, our delivery representative will deliver the new item to you and simultaneously pick up the original item from you. Please note that we offer you an option to exchange items purchased by you on Afshini for same or different sizes of same style or for any other item of the same or different value from Afshini within the specified exchange period subject to your address being serviceable for an exchange.</p><p><strong>The following EXCEPTIONS and RULES apply to this Policy:</strong></p><p><br>Swarovski, Precious Jewelry, Cosmetics, Rayban Sunglasses, Socks, Deodorants, Perfumes, Briefs, Shapewear Bottoms, any Lingerie Set that includes a Brief, Swimwear, Mittens, Wrist-Bands cannot be exchanged or returned.</p><p>Some products like fine jewellery, watches and selected products which are susceptible to damage can only be returned/exchanged for a limited number of days. Certain products like sherwanis can only be exchanged not returned. Please read the Product Detail Page to see the number of days upto which a product can be returned/exchanged, post-delivery.</p><p>Due to the intimate nature, we handle returns for certain Innerwear, Sleepwear and Lingerie items differently. Only self-ship return is allowed for such items, hence pickup facility will not be available. Also, these items cannot be exchanged.</p><p>All items to be returned or exchanged must be unused and in their original condition with all original tags and packaging intact (for e.g. shoes must be packed in the original shoe box).</p><p><strong>Under Exchange Policy,</strong></p><p>a) If you choose to exchange the item purchased by you on Afshini within the specified exchange period for the same size or different size of same style, you will be provided with a replacement of the item, free of cost.</p><p><br>b) If you choose to exchange item purchased by you on Afshini for any other item of the same or different value from Afshini. In such case, if exchanged item is of the higher value, differences in amount will be charged to you and if exchanged item is of the lower value, differences in amount will be refunded to you post successful pick up of original item from you.</p><p><br>c) Net amount paid by you (excluding instant cashback/discount) to purchase original item will be considered to calculate difference in amount of original and exchanged item which will be payable by you or refundable by Afshini as the case may be, for an exchange.</p><p><br>d) Applicable refund for exchange will be trigger post successful pick of original item from you.</p><p><br>6) Exchanges are only allowed for pincodes which are serviceable for an exchange.</p><p>7) Item cannot be exchanged for multiple products and you are allowed to select single item for exchange. While customer can exchange multiple item at a time by initiating separate exchange request for each of the item.</p><p>8) Non- returnable products/categories cannot be exchanged.</p><p>9) Platform Handling Fee (as defined under ‘Terms of Use’) is not applicable to exchanged orders.</p><p>10) Afshini shall reserve the right to restrict exchange of the items purchased on Afshini if customer in any way breaches or misuse this policy, as determined in Afshini’s sole discretion.In case you have purchased an item which has a free gift/offer associated with it and you wish to return the main item, then you will have to return the free product as well.</p><p>11) Afshini will not be liable for the products returned by mistake. In circumstances where an extra or a different product is returned by mistake, Afshini would not be accountable for misplacement or replacement of the product and is not responsible for its delivery back to the User</p><p>12) If you self-ship your returns, kindly pack the items securely to prevent any loss or damage during transit. For all self-shipped returns, we recommend you use a reliable courier service.</p><p>13) If you self-ship your returns, your shipping costs would be reimbursed subject to your return having met our Returns and Exchange Policy and the image of the courier receipt is shared by you and validated by us. For self ship returns the refund for returned products will only be initiated if they pass through a quality check conducted at the warehouse. If the quality check fails the product will be reshipped back to you.</p>','active',0,'1','1','2020-12-02 01:11:44','2021-01-14 19:53:57'),(7,'terms-conditions','Terms and Conditions','<p>Welcome to Afshini. This document is an electronic record in terms of Information Technology Act, 2000 and published in accordance with the provisions of Rule 3 ) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of Afshini marketplace platform - www.Afshini.com (hereinafter referred to as \"Platform\")</p><p>Your use of the Afshini and services and tools are governed by the following terms and conditions (\"Terms of Use\") as applicable to the Afshini including the applicable policies which are incorporated herein by way of reference. By mere use of the Afshini, You shall be contracting with Afshini Designs Private Limited, the owner of the Platform. These terms and conditions including the policies constitute Your binding obligations, with Afshini.</p><p>For the purpose of these Terms of Use, wherever the context so requires \"You\" or \"User\" shall mean any natural or legal person who has agreed to become a buyer on Platform by providing data while registering on the Platform as Registered User. The term \"Afshini\",\"We\",\"Us\",\"Our\" shall mean Afshini Designs Private Limited and its affiliates.</p><p>When You use any of the services provided by Us through the Platform, including but not limited to, (e.g. Product Reviews, Seller Reviews), You will be subject to the rules, guidelines, policies, terms, and conditions applicable to such service, and they shall be deemed to be incorporated into this Terms of Use and shall be considered as part and parcel of this Terms of Use. We reserve the right, at Our sole discretion, to change, modify, add or remove portions of these Terms of Use, at any time without any prior written notice to You. You shall ensure to review these Terms of Use periodically for updates/changes. Your continued use of the Platform following the posting of changes will mean that You accept and agree to the revisions. As long as You comply with these Terms of Use, We grant You a personal, non-exclusive, non-transferable, limited privilege to enter and use the Platform. By impliedly or expressly accepting these Terms of Use, You also accept and agree to be bound by Afshini Policies including but not limited to Privacy Policy as amended from time to time.</p><p><strong>User Account, Password, and Security:</strong><br>If You use the Platform, You shall be responsible for maintaining the confidentiality of your Display Name and Password and You shall be responsible for all activities that occur under your Display Name and Password. You agree that if You provide any information that is untrue, inaccurate, not current or incomplete, We shall have the right to indefinitely suspend or terminate or block access of your membership on the Platform.</p><p>You agree to</p><p>immediately notify Afshini of any unauthorized use / breach of your password or account and</p><p>ensure that you exit from your account at the end of each session.</p><p><strong>Services Offered:</strong><br>Afshini provides a number of Internet-based services through the Platform. One such Service enables Users to purchase original merchandise such as clothing, footwear and accessories from various fashion and lifestyle brands (collectively, \"Products\"). The Products can be purchased through the Platform through various methods of payments offered. The sale/purchase of Products shall be additionally governed by specific policies of sale, like cancellation policy, exchange policy, return policy, etc. (which are found on the FAQ tab on the Platform and all of which are incorporated here by reference). It is clarified that at the time of creating a return request, users are required to confirm (via a check box click) that the product being returned is unused and has the original tags intact. If the product returned by the user is used, damaged or if the original tags are missing, the user’s return request shall be declined, and the said product shall be re-shipped back to the customer. In the event that the return request is declined, the user shall not be eligible for a refund, and Afshini assumes no liability in this regard. Further, in the event that the user fails to accept the receipt of the said re-shipped product, the user shall continue to be not eligible for a refund, and Afshini assumes no liability with respect to the return or refund for the said re-shipped product. In addition, these Terms of Use may be further supplemented by Product specific conditions, which may be displayed with that Product.</p><p>Afshini does not warrant that Product description or other content on the Platform is accurate, complete, reliable, current, or error-free and assumes no liability in this regard.</p><p><strong>Disclaimer of Warranties and Liability:</strong><br>All the materials and products (including but not limited to software) and services, included on or otherwise made available to You through Platform are provided on \"as is\" and \"as available\" basis without any representation or warranties, express or implied except otherwise specified in writing. Without prejudice to the forgoing paragraph, Afshini does not warrant that: Platform will be constantly available, or available at all or The information on Platform is complete, true, accurate or non-misleading.</p><p>All the Products sold on Platform are governed by different state laws and if Seller is unable to deliver such Products due to implications of different state laws, Seller will return or will give credit for the amount (if any) received in advance by Seller from the sale of such Product that could not be delivered to You. You will be required to enter a valid phone number while placing an order on the Platform. By registering Your phone number with us, You consent to be contacted by Us via phone calls and/or SMS notifications, in case of any order or shipment or delivery related updates. We will not use your personal information to initiate any promotional phone calls or SMS.</p><p><strong>Governing Law:</strong><br>These terms shall be governed by and constructed in accordance with the laws of Bangladesh without reference to conflict of laws principles and disputes arising in relation hereto shall be subject to the exclusive jurisdiction of courts, tribunals, fora, applicable authorities at Bangalore. The place of jurisdiction shall be exclusively in Bangalore.</p><p><strong>Contacting the Seller:</strong><br>At Afshini, we are committed towards ensuring that disputes between Sellers and Buyers are settled amicably by way of the above dispute resolution mechanisms and procedures. However, in the event that You wish to contact Afshini about the seller, You may proceed to do so by clicking on the seller name on the product listing pages. Alternatively, You may also reach out to customer support at +91-80-61561999 or access help center at https://www.Afshini.com/contactus</p><p><strong>Disclaimer:</strong><br>You acknowledge and undertake that you are accessing the services on the Platform and transacting at your own risk and are using your best and prudent judgment before entering into any transactions through Afshini. We shall neither be liable nor responsible for any actions or inactions of sellers nor any breach of conditions, representations or warranties by the sellers or manufacturers of the products and hereby expressly disclaim and any all responsibility and liability in that regard. We shall not mediate or resolve any dispute or disagreement between You and the sellers or manufacturers of the products. We further expressly disclaim any warranties or representations (express or implied) in respect of quality, suitability, accuracy, reliability, completeness, timeliness, performance, safety, merchantability, fitness for a particular purpose, or legality of the products listed or displayed or transacted or the content (including product or pricing information and/or specifications) on Platform. While we have taken precautions to avoid inaccuracies in content, this website, all content, information (including the price of products), software, products, services and related graphics are provided as is, without warranty of any kind. At no time shall any right, title or interest in the products sold through or displayed on Platform vest with Afshini nor shall Afshini have any obligations or liabilities in respect of any transactions on Platform.</p><p>Delivery Related - User agrees and acknowledges that any claims regarding order delivery (including non-receipt/ non- delivery of order or signature verification) shall be notified to Afshini within 5 days from the alleged date of delivery of product reflecting on the Afshini portal. Non notification by You of non-receipt or non-delivery within the time period specified shall be construed as a deemed delivery in respect of that transaction. Afshini disclaims any liability or responsibility for claims regarding non-delivery, non-receipt of order (including signature verification in Proof of delivery) after 5 days from the alleged date of delivery of product reflecting on the Afshini portal.</p>','active',0,'1','1','2019-11-07 06:05:57','2021-01-14 19:39:05');
/*!40000 ALTER TABLE `cms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'color code',
  `color_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'color Image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `color_title_unique` (`title`),
  UNIQUE KEY `color_slug_unique` (`slug`),
  UNIQUE KEY `color_title_bn_unique` (`title_bn`),
  UNIQUE KEY `color_title_hi_unique` (`title_hi`),
  UNIQUE KEY `color_title_ch_unique` (`title_ch`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Red','red',NULL,NULL,NULL,'ff0000',NULL,'2021-11-18 17:29:23','2021-11-18 17:29:23'),(2,'White','white',NULL,NULL,NULL,'ffffff',NULL,'2021-11-24 17:30:29','2021-11-24 17:30:29'),(6,'Magenta','magenta',NULL,NULL,NULL,'FF00FF',NULL,NULL,NULL);
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color_size_wise_quantity`
--

DROP TABLE IF EXISTS `color_size_wise_quantity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color_size_wise_quantity` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `color_id` int unsigned DEFAULT NULL,
  `size_id` int unsigned DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `color_size_wise_quantity_product_id_foreign` (`product_id`),
  KEY `color_size_wise_quantity_color_id_foreign` (`color_id`),
  KEY `color_size_wise_quantity_size_id_foreign` (`size_id`),
  CONSTRAINT `color_size_wise_quantity_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `color_size_wise_quantity_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `color_size_wise_quantity_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color_size_wise_quantity`
--

LOCK TABLES `color_size_wise_quantity` WRITE;
/*!40000 ALTER TABLE `color_size_wise_quantity` DISABLE KEYS */;
/*!40000 ALTER TABLE `color_size_wise_quantity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commissions`
--

DROP TABLE IF EXISTS `commissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` double(8,2) NOT NULL COMMENT 'Admin take sell commission by percentage',
  `note` text COLLATE utf8mb4_unicode_ci,
  `note_bn` text COLLATE utf8mb4_unicode_ci,
  `note_hi` text COLLATE utf8mb4_unicode_ci,
  `note_ch` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `commissions_title_unique` (`title`),
  UNIQUE KEY `commissions_slug_unique` (`slug`),
  UNIQUE KEY `commissions_title_bn_unique` (`title_bn`),
  UNIQUE KEY `commissions_title_hi_unique` (`title_hi`),
  UNIQUE KEY `commissions_title_ch_unique` (`title_ch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commissions`
--

LOCK TABLES `commissions` WRITE;
/*!40000 ALTER TABLE `commissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `commissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int unsigned DEFAULT NULL,
  `coupon_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_name_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_name_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_name_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `coupon_code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_coupon` int DEFAULT NULL,
  `end_coupon` int DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coupon_seller_id_foreign` (`seller_id`),
  CONSTRAINT `coupon_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` int DEFAULT NULL,
  `image_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('home','block','news','slider','events','others') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('top','left','right','bottom','slider') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (4,'News & Events','news-events','<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris accumsan velit.</p>',NULL,1,'news-events.jpg','news','top','active','1','1','2020-10-28 00:14:22','2020-11-18 04:02:24'),(5,'Shop With Confidence','shop-with-confidence','<p>Additional 30% off orders of $50. Additional 40% off orders of $75. Additional 50% off orders of $125 or more. Use code MORE. Promotion ends on 10.15.20 at 11:59 PM PT. Excludes 3 for $33/5 for $45 Underwear, Final Sale + Underwear Clearance. Cannot be combined with any other offer. Only valid at qafzone.com. Not valid on previous purchases.</p>',NULL,2,'shop-with-confidence.jpg','events','top','active','1',NULL,'2020-10-28 00:28:34','2020-11-18 04:02:51');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_bn` text COLLATE utf8mb4_unicode_ci,
  `description_hi` text COLLATE utf8mb4_unicode_ci,
  `description_ch` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `image_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'how-to-sign-up',NULL,NULL,NULL,'Create a free account as a client and post your job, receive the best bid possible or you can buy our custom products and get your job done with integrity and quality.',NULL,NULL,NULL,'active',0,'how-to-sign-up.png','1','1','2019-11-08 00:31:19','2021-02-19 14:38:16'),(2,'Get a free quote',NULL,NULL,NULL,'2. Get a free quote\r\nLet us know about your project and our expert team will provide you the best quote for your job at free of cost.\r\nThis will enable you to know more about the time and cost required for your job to be done and delivered.',NULL,NULL,NULL,'active',0,NULL,'1',NULL,'2019-11-08 00:31:45','2019-11-08 00:31:45'),(3,'Buy our premade custom products',NULL,NULL,NULL,'Make things getting done more hassle free by buying our products. Each product is custom selected based on your needs. This preset fixed price and time is just what you would need. Knock us to know more.',NULL,NULL,NULL,'active',0,NULL,'1',NULL,'2019-11-08 00:32:10','2019-11-08 00:32:10'),(4,'Manage your orders and enquiries',NULL,NULL,NULL,'All your product orders and custom orders or enquiries through GGTaskers can be managed through dashboard. Submit a review once delivered.',NULL,NULL,NULL,'active',0,NULL,'1',NULL,'2019-11-08 00:32:33','2019-11-08 00:32:33'),(5,'Feel free to contact us',NULL,NULL,NULL,'The contact form will store your enquiries and can be found in the general enquiries section. Or let’s have a chat.\r\nWe believe chatting enhances customer experience and service but mostly it makes the relationship with customer stronger.\r\nFeel free to contact us as this will help us to serve you better.',NULL,NULL,NULL,'active',0,NULL,'1',NULL,'2019-11-08 00:32:56','2019-11-08 00:32:56');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_05_04_135426_create_users_table',1),(2,'2019_05_06_112608_create_category_table',1),(3,'2019_05_06_112651_create_category_self_relation_table',1),(4,'2019_05_07_064117_create_attribute_table',1),(5,'2019_05_07_064155_create_attribute_set_table',1),(6,'2019_05_09_032239_create_attribute_option_table',1),(7,'2019_05_15_154039_create_sliders_table',1),(8,'2019_05_15_170426_create_faq_table',1),(9,'2019_05_18_025015_create_products_table',1),(10,'2019_05_18_030132_create_orders_table',1),(11,'2019_05_18_030305_create_product_inventory_table',1),(12,'2019_05_20_152558_create_seller_profiles_table',1),(13,'2019_05_25_021858_create_attribute_set_items_table',1),(14,'2019_06_11_151708_create_users_billing_shipping_table',1),(15,'2019_07_01_155052_create_wishlist_table',1),(16,'2019_11_04_001649_create_delivery_options_table',2),(17,'2019_11_04_012448_create_payment_options_table',3),(18,'2019_11_05_022645_create_coupons_table',4),(22,'2019_11_06_021538_create_product_coupon_table',5),(23,'2019_11_06_021316_create_product_shipping_table',6),(24,'2021_08_15_112358_create_brands_table',7),(25,'2021_08_15_190820_add_brand_id_to_product_table',7),(26,'2021_08_23_020239_add_ordering_to_cms_slider_faq_admanager_table',7),(27,'2021_08_26_154721_create_account_manage_table',7),(28,'2021_08_26_181835_create_inventory_manage_table',7),(29,'2021_09_24_162308_add_fields_for_multi_language',7),(30,'2021_10_02_155530_modify_type_to_users_table',7),(31,'2021_10_02_194432_alter_table_for_column_add_and_change',7),(32,'2021_10_26_192638_create_table_color',7),(33,'2021_10_26_192654_create_table_size',7),(34,'2021_10_26_193224_create_table_color_size_wise_quantity',7),(35,'2021_10_28_024354_add_received_no_at_seller_payment_table',7),(36,'2021_11_28_124045_create_unit_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_head_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `brand_id` int unsigned DEFAULT NULL,
  `product_seller_id` int unsigned DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `comission_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `shipping_service` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` decimal(10,2) DEFAULT NULL,
  `coupon_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_commission_id` int unsigned DEFAULT NULL COMMENT 'Last active seller_commissions table id',
  PRIMARY KEY (`id`),
  KEY `order_details_order_head_id_foreign` (`order_head_id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  KEY `order_details_product_seller_id_foreign` (`product_seller_id`),
  KEY `order_details_seller_commission_id_foreign` (`seller_commission_id`),
  KEY `order_details_category_id_foreign` (`category_id`),
  KEY `order_details_brand_id_foreign` (`brand_id`),
  CONSTRAINT `order_details_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `order_details_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `order_details_seller_commission_id_foreign` FOREIGN KEY (`seller_commission_id`) REFERENCES `seller_commissions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,12,NULL,NULL,2,1,1500.00,1500.00,NULL,'delivered','4',NULL,'2019-12-10 09:18:33','2019-12-10 09:18:33','XL','Blue',110.00,'DHL Express',100.00,'100',NULL),(2,2,1,NULL,NULL,2,1,1200.00,1200.00,NULL,'active','4',NULL,'2019-12-10 10:57:33','2019-12-10 10:57:33','M','Blue',85.00,'Qafzone',0.00,'',NULL),(3,3,1,NULL,NULL,2,1,1200.00,1200.00,NULL,'shipped','4',NULL,'2019-12-10 11:08:36','2019-12-10 11:08:36','L','Blue',85.00,'Qafzone',0.00,'',NULL),(4,4,10,NULL,NULL,2,1,1500.00,1500.00,NULL,'confirmed','4',NULL,'2020-01-03 11:09:28','2020-01-03 11:09:28','S','Green',85.00,'Qafzone',0.00,'',NULL),(5,6,10,NULL,NULL,2,1,1500.00,1500.00,NULL,'active',NULL,NULL,'2020-05-07 15:54:52','2020-05-07 15:54:52','S','Blue',85.00,'Qafzone',0.00,'',NULL),(6,7,12,NULL,NULL,2,1,1500.00,1500.00,NULL,'confirmed',NULL,NULL,'2020-05-07 16:43:58','2020-05-07 16:43:58','M','Blue',100.00,'Afshini',0.00,'',NULL),(7,8,12,NULL,NULL,2,1,8000.00,8000.00,NULL,'confirmed',NULL,NULL,'2020-05-08 17:59:41','2020-05-08 17:59:41','','',100.00,'Afshini',0.00,'',NULL),(9,10,36,NULL,NULL,2,1,4350.00,4350.00,NULL,'confirmed','1',NULL,'2020-12-13 05:17:38','2020-12-13 05:17:38','','',120.00,'courier-service',0.00,'',NULL),(10,11,38,NULL,NULL,2,1,4900.00,4900.00,NULL,'confirmed','1',NULL,'2020-12-13 05:41:35','2020-12-13 05:41:35','','',0.00,'',0.00,'',NULL),(11,12,37,NULL,NULL,2,1,3250.00,3250.00,NULL,'confirmed',NULL,NULL,'2020-12-14 22:09:13','2020-12-14 22:09:13','','',0.00,'',0.00,'',NULL),(12,13,38,NULL,NULL,2,1,4900.00,4900.00,NULL,'confirmed','4',NULL,'2020-12-14 22:40:18','2020-12-14 22:40:18','','',0.00,'',0.00,'',NULL),(13,16,35,NULL,NULL,2,1,3900.00,3900.00,NULL,'active','4',NULL,'2020-12-14 23:02:49','2020-12-14 23:02:49','','',0.00,'',0.00,'',NULL),(14,17,26,NULL,NULL,2,1,890.00,890.00,NULL,'active','4',NULL,'2020-12-14 23:48:48','2020-12-14 23:48:48','','',0.00,'Free',0.00,'',NULL),(15,18,26,NULL,NULL,2,1,890.00,890.00,NULL,'active','4',NULL,'2020-12-14 23:54:04','2020-12-14 23:54:04','','',0.00,'Free',0.00,'',NULL),(16,19,39,NULL,NULL,7,1,700.00,700.00,NULL,'active','4',NULL,'2020-12-14 23:55:33','2020-12-14 23:55:33','','',0.00,'',0.00,'',NULL),(17,20,40,NULL,NULL,7,1,700.00,700.00,NULL,'active','4',NULL,'2020-12-14 23:58:26','2020-12-14 23:58:26','','',0.00,'',0.00,'',NULL),(18,21,40,NULL,NULL,7,1,700.00,700.00,NULL,'active','4',NULL,'2020-12-14 23:58:44','2020-12-14 23:58:44','','',0.00,'',0.00,'',NULL),(19,22,40,NULL,NULL,7,1,700.00,700.00,NULL,'active','4',NULL,'2020-12-14 23:58:55','2020-12-14 23:58:55','','',0.00,'',0.00,'',NULL),(20,23,40,NULL,NULL,7,1,700.00,700.00,NULL,'active','4',NULL,'2020-12-14 23:59:36','2020-12-14 23:59:36','','',0.00,'',0.00,'',NULL),(21,24,40,NULL,NULL,7,1,700.00,700.00,NULL,'active','4',NULL,'2020-12-15 00:00:50','2020-12-15 00:00:50','','',0.00,'',0.00,'',NULL),(22,25,40,NULL,NULL,7,1,700.00,700.00,NULL,'active','4',NULL,'2020-12-15 00:01:23','2020-12-15 00:01:23','','',0.00,'',0.00,'',NULL),(23,26,40,NULL,NULL,7,1,700.00,700.00,NULL,'active','4',NULL,'2020-12-15 00:01:56','2020-12-15 00:01:56','','',0.00,'',0.00,'',NULL),(24,27,40,NULL,NULL,7,1,700.00,700.00,NULL,'confirmed','4',NULL,'2020-12-15 00:02:46','2020-12-15 00:02:46','','',0.00,'',0.00,'',NULL),(25,28,40,NULL,NULL,7,1,700.00,700.00,NULL,'confirmed','4',NULL,'2020-12-15 00:07:28','2020-12-15 00:07:28','','',0.00,'',0.00,'',NULL),(26,29,40,NULL,NULL,7,1,700.00,700.00,NULL,'confirmed','4',NULL,'2020-12-15 00:09:41','2020-12-15 00:09:41','','',0.00,'',0.00,'',NULL),(27,30,19,NULL,NULL,2,1,2000.00,2000.00,NULL,'confirmed','4',NULL,'2020-12-15 00:48:36','2020-12-15 00:48:36','','',0.00,'Free',0.00,'',NULL),(28,31,20,NULL,NULL,2,1,1000.00,1000.00,NULL,'confirmed',NULL,NULL,'2020-12-15 02:17:43','2020-12-15 02:17:43','','',0.00,'Free',0.00,'',NULL),(29,32,27,NULL,NULL,2,1,590.00,590.00,NULL,'confirmed',NULL,NULL,'2020-12-15 21:50:06','2020-12-15 21:50:06','','',0.00,'',0.00,'',NULL),(30,33,39,NULL,NULL,7,1,700.00,700.00,NULL,'confirmed','4',NULL,'2020-12-17 00:02:44','2020-12-17 00:02:44','','',0.00,'',0.00,'',NULL),(31,34,36,NULL,NULL,2,1,4350.00,4350.00,NULL,'active',NULL,NULL,'2020-12-17 00:45:16','2020-12-17 00:45:16','','',0.00,'',0.00,'',NULL),(32,35,36,NULL,NULL,2,1,4350.00,4350.00,NULL,'confirmed',NULL,NULL,'2020-12-17 00:46:00','2020-12-17 00:46:00','','',0.00,'',0.00,'',NULL),(33,36,23,NULL,NULL,2,1,500.00,500.00,NULL,'confirmed',NULL,NULL,'2020-12-17 00:59:16','2020-12-17 00:59:16','','',0.00,'Free shipping',0.00,'',NULL),(34,37,23,NULL,NULL,2,1,500.00,500.00,NULL,'confirmed',NULL,NULL,'2020-12-17 01:02:26','2020-12-17 01:02:26','','',0.00,'Free shipping',0.00,'',NULL),(35,38,23,NULL,NULL,2,1,500.00,500.00,NULL,'confirmed',NULL,NULL,'2020-12-17 01:03:52','2020-12-17 01:03:52','','',0.00,'Free shipping',0.00,'',NULL),(36,39,34,NULL,NULL,2,2,980.00,1960.00,NULL,'confirmed',NULL,NULL,'2020-12-17 01:15:52','2020-12-17 01:15:52','','',0.00,'',0.00,'',NULL),(37,40,37,NULL,NULL,2,1,3250.00,3250.00,NULL,'confirmed',NULL,NULL,'2020-12-17 20:14:19','2020-12-17 20:14:19','','',0.00,'',0.00,'',NULL),(38,41,37,NULL,NULL,2,1,3250.00,3250.00,NULL,'active','8',NULL,'2020-12-17 20:26:00','2020-12-17 20:26:00','','',0.00,'',0.00,'',NULL),(39,42,37,NULL,NULL,2,1,3250.00,3250.00,NULL,'active','8',NULL,'2020-12-17 20:27:06','2020-12-17 20:27:06','','',0.00,'',0.00,'',NULL),(40,43,37,NULL,NULL,2,1,3250.00,3250.00,NULL,'active','8',NULL,'2020-12-17 20:30:39','2020-12-17 20:30:39','','',0.00,'',0.00,'',NULL),(41,44,37,NULL,NULL,2,1,3250.00,3250.00,NULL,'confirmed','8',NULL,'2020-12-17 20:31:39','2020-12-17 20:31:39','','',0.00,'',0.00,'',NULL),(42,45,21,NULL,NULL,2,1,650.00,650.00,NULL,'active','8',NULL,'2020-12-17 20:46:10','2020-12-17 20:46:10','','',0.00,'Free shipping',0.00,'',NULL),(43,46,36,NULL,NULL,2,1,4350.00,4350.00,NULL,'confirmed',NULL,NULL,'2020-12-17 21:29:46','2020-12-17 21:29:46','','',0.00,'',0.00,'',NULL),(44,47,15,NULL,NULL,2,2,4200.00,8400.00,NULL,'confirmed',NULL,NULL,'2020-12-17 21:37:04','2020-12-17 21:37:04','','',0.00,'Free shipping',0.00,'',NULL),(45,48,26,NULL,NULL,2,1,890.00,890.00,NULL,'confirmed',NULL,NULL,'2020-12-26 14:42:31','2020-12-26 14:42:31','','',0.00,'Free shipping',0.00,'',NULL),(46,49,10,NULL,NULL,2,1,8000.00,8000.00,NULL,'processing','4',NULL,'2021-01-16 18:14:29','2021-01-16 18:14:29','','',0.00,'Free shipping',0.00,'',NULL),(47,50,12,NULL,NULL,5,1,8000.00,8000.00,NULL,'confirmed','4',NULL,'2021-02-13 09:15:56','2021-02-13 09:15:56','','',0.00,'Free shipping',0.00,'',NULL),(48,51,12,NULL,NULL,5,1,8000.00,8000.00,NULL,'confirmed','4',NULL,'2021-02-13 10:05:40','2021-02-13 10:05:40','','',0.00,'Free shipping',0.00,'',NULL),(49,52,38,NULL,NULL,2,1,4900.00,4900.00,NULL,'confirmed','4',NULL,'2021-02-13 10:18:28','2021-02-13 10:18:28','','',0.00,'',0.00,'',NULL),(50,53,9,NULL,NULL,5,1,7500.00,7500.00,NULL,'active','4',NULL,'2021-02-13 10:31:21','2021-02-13 10:31:21','','',0.00,'',0.00,'',NULL),(51,54,9,NULL,NULL,5,1,7500.00,7500.00,NULL,'confirmed','4',NULL,'2021-02-13 10:39:25','2021-02-13 10:39:25','','',0.00,'',0.00,'',NULL),(52,55,12,NULL,NULL,5,1,8000.00,8000.00,NULL,'confirmed','4',NULL,'2021-02-13 10:58:39','2021-02-13 10:58:39','','',0.00,'Free shipping',0.00,'',NULL),(53,56,27,NULL,NULL,2,1,590.00,590.00,NULL,'confirmed','4',NULL,'2021-02-13 11:13:40','2021-02-13 11:13:40','','',0.00,'',0.00,'',NULL),(54,57,36,NULL,NULL,2,1,4350.00,4350.00,NULL,'confirmed','4',NULL,'2021-02-13 11:21:48','2021-02-13 11:21:48','','',0.00,'',0.00,'',NULL),(55,58,15,NULL,NULL,2,1,4200.00,4200.00,NULL,'processing','4',NULL,'2021-02-13 11:28:38','2021-02-13 11:28:38','','',0.00,'Free shipping',0.00,'',NULL),(56,59,37,NULL,NULL,2,1,3250.00,3250.00,NULL,'delivered','4',NULL,'2021-02-13 11:35:33','2021-02-13 11:35:33','','',0.00,'',0.00,'',NULL),(57,60,35,NULL,NULL,2,1,3900.00,3900.00,NULL,'processing','4',NULL,'2021-02-27 23:26:09','2021-02-27 23:26:09','','',0.00,'',0.00,'',NULL),(58,60,79,NULL,NULL,17,1,2599.00,2599.00,NULL,'processing','4',NULL,'2021-02-27 23:26:09','2021-02-27 23:26:09','','',0.00,'',0.00,'',NULL),(59,61,105,NULL,NULL,2,1,1950.00,1950.00,NULL,'active',NULL,NULL,'2021-03-24 18:13:51','2021-03-24 18:13:51','XXL','Yellow',0.00,'',0.00,'',NULL),(60,62,141,NULL,NULL,2,1,2350.00,2350.00,NULL,'confirmed','4',NULL,'2021-03-26 17:43:20','2021-03-26 17:43:20','','',0.00,'',0.00,'',NULL);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_head`
--

DROP TABLE IF EXISTS `order_head`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_head` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int DEFAULT NULL,
  `order_number` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total_price` decimal(10,4) DEFAULT NULL,
  `payment_type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT '0.00',
  `discount_amount` decimal(10,2) DEFAULT '0.00',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `note_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','confirmed','processing','on_transit','delivered','delivery_failed','returned','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_head`
--

LOCK TABLES `order_head` WRITE;
/*!40000 ALTER TABLE `order_head` DISABLE KEYS */;
INSERT INTO `order_head` VALUES (1,4,'QAF-20191210-000001','2019-12-10',1510.0000,'paypal',NULL,0.00,0.00,NULL,NULL,NULL,NULL,'confirmed','4','4','2019-12-10 09:18:33','2019-12-10 09:18:33'),(2,4,'QAF-20191210-000002','2019-12-10',1285.0000,'cash-on-delevery',NULL,0.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2019-12-10 10:57:33','2019-12-10 10:57:33'),(3,4,'QAF-20191210-000003','2019-12-10',1285.0000,'bank-transfer',NULL,0.00,0.00,NULL,NULL,NULL,NULL,'confirmed','4','4','2019-12-10 11:08:36','2019-12-10 11:08:36'),(4,4,'QAF-20200103-000004','2020-12-15',1585.0000,'bkash',NULL,0.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-01-03 11:09:28','2020-01-03 11:09:28'),(6,NULL,'QAF-20200507-000006','2020-05-07',1585.0000,'cash-on-delevery',NULL,0.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-05-07 15:54:52','2020-05-07 15:54:52'),(7,NULL,'QAF-20200507-000007','2020-05-07',1600.0000,'nagad',NULL,0.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-05-07 16:43:58','2020-05-07 16:43:58'),(8,NULL,'QAF-20200508-000008','2020-05-08',8100.0000,'bkash',NULL,0.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-05-08 17:59:41','2020-05-08 17:59:41'),(10,NULL,'AFS-20201213-000010','2020-12-13',4430.0000,'bkash','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending','1','1','2020-12-13 05:17:38','2020-12-13 05:17:38'),(11,NULL,'AFS-20201213-000011','2020-12-13',4980.0000,'nagad','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending','1','1','2020-12-13 05:41:35','2020-12-13 05:41:35'),(12,NULL,'AFS-20201215-000012','2020-12-15',3350.0000,'nagad','Courier',100.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-14 22:09:13','2020-12-14 22:09:13'),(13,4,'AFS-20201215-000013','2020-12-15',4980.0000,'bkash','Basic',80.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 22:40:18','2020-12-14 22:40:18'),(14,4,'AFS-20201215-000014','2020-12-15',80.0000,'bkash','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 22:54:11','2020-12-14 22:54:11'),(15,4,'AFS-20201215-000015','2020-12-15',80.0000,'bkash','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 22:54:37','2020-12-14 22:54:37'),(16,4,'AFS-20201215-000016','2020-12-15',4000.0000,'nagad','Courier',100.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 23:02:49','2020-12-14 23:02:49'),(17,4,'AFS-20201215-000017','2020-12-15',990.0000,'nagad','Courier',100.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 23:48:48','2020-12-14 23:48:48'),(18,4,'AFS-20201215-000018','2020-12-15',990.0000,'nagad','Courier',100.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 23:54:04','2020-12-14 23:54:04'),(19,4,'AFS-20201215-000019','2020-12-15',800.0000,'nagad','Courier',100.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 23:55:33','2020-12-14 23:55:33'),(20,4,'AFS-20201215-000020','2020-12-15',780.0000,'nagad','Basic',80.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 23:58:26','2020-12-14 23:58:26'),(21,4,'AFS-20201215-000021','2020-12-15',800.0000,'nagad','Courier',100.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 23:58:44','2020-12-14 23:58:44'),(22,4,'AFS-20201215-000022','2020-12-15',800.0000,'nagad','Courier',100.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 23:58:55','2020-12-14 23:58:55'),(23,4,'AFS-20201215-000023','2020-12-15',800.0000,'nagad','Courier',100.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-14 23:59:36','2020-12-14 23:59:36'),(24,4,'AFS-20201215-000024','2020-12-15',780.0000,'nagad','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-15 00:00:50','2020-12-15 00:00:50'),(25,4,'AFS-20201215-000025','2020-12-15',780.0000,'nagad','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-15 00:01:23','2020-12-15 00:01:23'),(26,4,'AFS-20201215-000026','2020-12-15',780.0000,'nagad','Basic',80.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-15 00:01:56','2020-12-15 00:01:56'),(27,4,'AFS-20201215-000027','2020-12-15',780.0000,'bkash','Basic',80.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-15 00:02:46','2020-12-15 00:02:46'),(28,4,'AFS-20201215-000028','2020-12-15',780.0000,'bkash','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-15 00:07:28','2020-12-15 00:07:28'),(29,4,'AFS-20201215-000029','2020-12-15',780.0000,'nagad','Basic',80.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-15 00:09:41','2020-12-15 00:09:41'),(30,4,'AFS-20201215-000030','2020-12-15',2080.0000,'bkash','Basic',80.00,100.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-15 00:48:36','2020-12-15 00:48:36'),(31,NULL,'AFS-20201215-000031','2020-12-15',1080.0000,'bkash','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-15 02:17:43','2020-12-15 02:17:43'),(32,NULL,'AFS-20201215-000032','2020-12-15',670.0000,'bkash','Basic',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-15 21:50:06','2020-12-15 21:50:06'),(33,4,'AFS-20201216-000033','2020-12-16',820.0000,'nagad','SA Paribahan',120.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2020-12-17 00:02:44','2020-12-17 00:02:44'),(34,NULL,'AFS-20201216-000034','2020-12-16',4430.0000,'bkash','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 00:45:16','2020-12-17 00:45:16'),(35,NULL,'AFS-20201216-000035','2020-12-16',4430.0000,'bkash','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 00:46:00','2020-12-17 00:46:00'),(36,NULL,'AFS-20201216-000036','2020-12-16',600.0000,'bkash','Sundarban',100.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 00:59:16','2020-12-17 00:59:16'),(37,NULL,'AFS-20201216-000037','2020-12-16',580.0000,'bkash','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 01:02:26','2020-12-17 01:02:26'),(38,NULL,'AFS-20201216-000038','2020-12-16',620.0000,'nagad','SA Paribahan',120.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 01:03:52','2020-12-17 01:03:52'),(39,NULL,'AFS-20201216-000039','2020-12-16',2040.0000,'bkash','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 01:15:52','2020-12-17 01:15:52'),(40,NULL,'AFS-20201217-000040','2020-12-17',3330.0000,'bkash','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 20:14:19','2020-12-17 20:14:19'),(41,8,'AFS-20201217-000041','2020-12-17',3330.0000,'nagad','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending','8','8','2020-12-17 20:26:00','2020-12-17 20:26:00'),(42,8,'AFS-20201217-000042','2020-12-17',3330.0000,'nagad','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending','8','8','2020-12-17 20:27:06','2020-12-17 20:27:06'),(43,8,'AFS-20201217-000043','2020-12-17',3350.0000,'bkash','Sundarban',100.00,0.00,NULL,NULL,NULL,NULL,'pending','8','8','2020-12-17 20:30:39','2020-12-17 20:30:39'),(44,8,'AFS-20201217-000044','2020-12-17',3330.0000,'nagad','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending','8','8','2020-12-17 20:31:39','2020-12-17 20:31:39'),(45,8,'AFS-20201217-000045','2020-12-17',770.0000,'bkash','SA Paribahan',120.00,0.00,NULL,NULL,NULL,NULL,'pending','8','8','2020-12-17 20:46:10','2020-12-17 20:46:10'),(46,NULL,'AFS-20201217-000046','2020-12-17',4430.0000,'bkash','Afshini',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 21:29:46','2020-12-17 21:29:46'),(47,NULL,'AFS-20201217-000047','2020-12-17',8400.0000,'nagad','Free shipping',0.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-17 21:37:04','2020-12-17 21:37:04'),(48,NULL,'AFS-20201226-000048','2020-12-26',990.0000,'bkash','Sundarban',100.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2020-12-26 14:42:31','2020-12-26 14:42:31'),(49,4,'AFS-20210116-000049','2021-01-16',8000.0000,'bkash','Free shipping',0.00,0.00,NULL,NULL,NULL,NULL,'confirmed','4','4','2021-01-16 18:14:29','2021-01-16 18:14:29'),(50,4,'AFS-20210213-000050','2021-02-13',8000.0000,'bkash','Free shipping',0.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-02-13 09:15:56','2021-02-13 09:15:56'),(51,4,'AFS-20210213-000051','2021-02-13',8000.0000,'nagad','Free shipping',0.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-02-13 10:05:40','2021-02-13 10:05:40'),(52,4,'AFS-20210213-000052','2021-02-13',4970.0000,'nagad','Inside Dhaka',70.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-02-13 10:18:28','2021-02-13 10:18:28'),(53,4,'AFS-20210213-000053','2021-02-13',7500.0000,'bkash','Free shipping',0.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-02-13 10:31:21','2021-02-13 10:31:21'),(54,4,'AFS-20210213-000054','2021-02-13',7500.0000,'bkash','Free shipping',0.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-02-13 10:39:25','2021-02-13 10:39:25'),(55,4,'AFS-20210213-000055','2021-02-13',8000.0000,'nagad','Free shipping',0.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-02-13 10:58:39','2021-02-13 10:58:39'),(56,4,'AFS-20210213-000056','2021-02-13',660.0000,'nagad','Inside Dhaka',70.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-02-13 11:13:40','2021-02-13 11:13:40'),(57,4,'AFS-20210213-000057','2021-02-13',4420.0000,'nagad','Inside Dhaka',70.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-02-13 11:21:48','2021-02-13 11:21:48'),(58,4,'AFS-20210213-000058','2021-02-13',4270.0000,'bkash','Inside Dhaka',70.00,0.00,NULL,NULL,NULL,NULL,'confirmed','4','4','2021-02-13 11:28:38','2021-02-13 11:28:38'),(59,4,'AFS-20210213-000059','2021-02-13',3320.0000,'bkash','Inside Dhaka',70.00,0.00,NULL,NULL,NULL,NULL,'confirmed','4','4','2021-02-13 11:35:33','2021-02-13 11:35:33'),(60,4,'AFS-20210227-000060','2021-02-27',6499.0000,'bkash','Free shipping',0.00,0.00,NULL,NULL,NULL,NULL,'confirmed','4','4','2021-02-27 23:26:09','2021-02-27 23:26:09'),(61,NULL,'AFS-20210324-000061','2021-03-24',2030.0000,'cash-on-delevery','Inside Dhaka',80.00,0.00,NULL,NULL,NULL,NULL,'pending',NULL,NULL,'2021-03-24 18:13:51','2021-03-24 18:13:51'),(62,4,'AFS-20210326-000062','2021-03-26',2430.0000,'bkash','Inside Dhaka',80.00,0.00,NULL,NULL,NULL,NULL,'pending','4','4','2021-03-26 17:43:20','2021-03-26 17:43:20');
/*!40000 ALTER TABLE `order_head` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_shipping`
--

DROP TABLE IF EXISTS `order_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_shipping` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_head_id` int unsigned NOT NULL,
  `type` enum('billing','shipping') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country` int DEFAULT NULL,
  `city` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_shipping_order_head_id_foreign` (`order_head_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_shipping`
--

LOCK TABLES `order_shipping` WRITE;
/*!40000 ALTER TABLE `order_shipping` DISABLE KEYS */;
INSERT INTO `order_shipping` VALUES (1,1,'billing','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'1712004426',NULL,NULL,'4',NULL,'2019-12-10 09:18:33','2019-12-10 09:18:33'),(2,1,'shipping','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'1712004426',NULL,NULL,'4',NULL,'2019-12-10 09:18:33','2019-12-10 09:18:33'),(3,2,'billing','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'1712004426',NULL,NULL,'4',NULL,'2019-12-10 10:57:33','2019-12-10 10:57:33'),(4,2,'shipping','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'1712004426',NULL,NULL,'4',NULL,'2019-12-10 10:57:33','2019-12-10 10:57:33'),(5,3,'billing','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'1712004426',NULL,NULL,'4',NULL,'2019-12-10 11:08:36','2019-12-10 11:08:36'),(6,3,'shipping','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'1712004426',NULL,NULL,'4',NULL,'2019-12-10 11:08:36','2019-12-10 11:08:36'),(7,4,'billing','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'1712004426',NULL,NULL,'4',NULL,'2020-01-03 11:09:28','2020-01-03 11:09:28'),(8,4,'shipping','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'1712004426',NULL,NULL,'4',NULL,'2020-01-03 11:09:28','2020-01-03 11:09:28'),(11,6,'billing','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'+8801712004426',NULL,NULL,NULL,NULL,'2020-05-07 15:54:52','2020-05-07 15:54:52'),(12,6,'shipping','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'+8801712004426',NULL,NULL,NULL,NULL,'2020-05-07 15:54:52','2020-05-07 15:54:52'),(13,7,'billing','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'+8801712004426',NULL,NULL,NULL,NULL,'2020-05-07 16:43:58','2020-05-07 16:43:58'),(14,7,'shipping','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'+8801712004426',NULL,NULL,NULL,NULL,'2020-05-07 16:43:58','2020-05-07 16:43:58'),(15,8,'billing','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'+8801712004426',NULL,NULL,NULL,NULL,'2020-05-08 17:59:41','2020-05-08 17:59:41'),(16,8,'shipping','Abdur Rahman',NULL,'itgensoft@gmail.com','3/13 MN Road\r\nShantiNagar',NULL,NULL,NULL,NULL,'+8801712004426',NULL,NULL,NULL,NULL,'2020-05-08 17:59:41','2020-05-08 17:59:41'),(19,10,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,'1',NULL,'2020-12-13 05:17:38','2020-12-13 05:17:38'),(20,10,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,'1',NULL,'2020-12-13 05:17:38','2020-12-13 05:17:38'),(21,11,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,'1',NULL,'2020-12-13 05:41:35','2020-12-13 05:41:35'),(22,11,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,'1',NULL,'2020-12-13 05:41:35','2020-12-13 05:41:35'),(23,12,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-14 22:09:13','2020-12-14 22:09:13'),(24,12,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-14 22:09:13','2020-12-14 22:09:13'),(25,13,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 22:40:18','2020-12-14 22:40:18'),(26,13,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 22:40:18','2020-12-14 22:40:18'),(27,14,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 22:54:11','2020-12-14 22:54:11'),(28,14,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 22:54:11','2020-12-14 22:54:11'),(29,15,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 22:54:37','2020-12-14 22:54:37'),(30,15,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 22:54:37','2020-12-14 22:54:37'),(31,16,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:02:49','2020-12-14 23:02:49'),(32,16,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:02:49','2020-12-14 23:02:49'),(33,17,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:48:48','2020-12-14 23:48:48'),(34,17,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:48:48','2020-12-14 23:48:48'),(35,18,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:54:04','2020-12-14 23:54:04'),(36,18,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:54:04','2020-12-14 23:54:04'),(37,19,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:55:33','2020-12-14 23:55:33'),(38,19,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:55:33','2020-12-14 23:55:33'),(39,20,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:58:26','2020-12-14 23:58:26'),(40,20,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:58:26','2020-12-14 23:58:26'),(41,21,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:58:44','2020-12-14 23:58:44'),(42,21,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:58:44','2020-12-14 23:58:44'),(43,22,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:58:55','2020-12-14 23:58:55'),(44,22,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:58:55','2020-12-14 23:58:55'),(45,23,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:59:36','2020-12-14 23:59:36'),(46,23,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-14 23:59:36','2020-12-14 23:59:36'),(47,24,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:00:50','2020-12-15 00:00:50'),(48,24,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:00:50','2020-12-15 00:00:50'),(49,25,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:01:23','2020-12-15 00:01:23'),(50,25,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:01:23','2020-12-15 00:01:23'),(51,26,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:01:56','2020-12-15 00:01:56'),(52,26,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:01:56','2020-12-15 00:01:56'),(53,27,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:02:46','2020-12-15 00:02:46'),(54,27,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:02:46','2020-12-15 00:02:46'),(55,28,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:07:28','2020-12-15 00:07:28'),(56,28,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:07:28','2020-12-15 00:07:28'),(57,29,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:09:41','2020-12-15 00:09:41'),(58,29,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:09:41','2020-12-15 00:09:41'),(59,30,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:48:36','2020-12-15 00:48:36'),(60,30,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-15 00:48:36','2020-12-15 00:48:36'),(61,31,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-15 02:17:43','2020-12-15 02:17:43'),(62,31,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-15 02:17:43','2020-12-15 02:17:43'),(63,32,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-15 21:50:06','2020-12-15 21:50:06'),(64,32,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-15 21:50:06','2020-12-15 21:50:06'),(65,33,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-17 00:02:44','2020-12-17 00:02:44'),(66,33,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2020-12-17 00:02:44','2020-12-17 00:02:44'),(67,34,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 00:45:16','2020-12-17 00:45:16'),(68,34,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 00:45:16','2020-12-17 00:45:16'),(69,35,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 00:46:00','2020-12-17 00:46:00'),(70,35,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 00:46:00','2020-12-17 00:46:00'),(71,36,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 00:59:16','2020-12-17 00:59:16'),(72,36,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 00:59:16','2020-12-17 00:59:16'),(73,37,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 01:02:26','2020-12-17 01:02:26'),(74,37,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 01:02:26','2020-12-17 01:02:26'),(75,38,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 01:03:52','2020-12-17 01:03:52'),(76,38,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 01:03:52','2020-12-17 01:03:52'),(77,39,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 01:15:52','2020-12-17 01:15:52'),(78,39,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 01:15:52','2020-12-17 01:15:52'),(79,40,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 20:14:19','2020-12-17 20:14:19'),(80,40,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 20:14:19','2020-12-17 20:14:19'),(81,41,'billing','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:26:00','2020-12-17 20:26:00'),(82,41,'shipping','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:26:00','2020-12-17 20:26:00'),(83,42,'billing','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:27:06','2020-12-17 20:27:06'),(84,42,'shipping','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:27:06','2020-12-17 20:27:06'),(85,43,'billing','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:30:39','2020-12-17 20:30:39'),(86,43,'shipping','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:30:39','2020-12-17 20:30:39'),(87,44,'billing','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:31:39','2020-12-17 20:31:39'),(88,44,'shipping','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:31:39','2020-12-17 20:31:39'),(89,45,'billing','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:46:10','2020-12-17 20:46:10'),(90,45,'shipping','ruma','parvin','ruma.parvin@gmail.com','Bogra',NULL,'Bogra','Dhaka','5400','01680916991',NULL,NULL,'8',NULL,'2020-12-17 20:46:10','2020-12-17 20:46:10'),(91,46,'billing','abdur','rahman','webartbd@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 21:29:46','2020-12-17 21:29:46'),(92,46,'shipping','abdur','rahman','webartbd@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 21:29:46','2020-12-17 21:29:46'),(93,47,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 21:37:04','2020-12-17 21:37:04'),(94,47,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-17 21:37:04','2020-12-17 21:37:04'),(95,48,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-26 14:42:31','2020-12-26 14:42:31'),(96,48,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2020-12-26 14:42:31','2020-12-26 14:42:31'),(97,49,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-01-16 18:14:29','2021-01-16 18:14:29'),(98,49,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-01-16 18:14:29','2021-01-16 18:14:29'),(99,50,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 09:15:56','2021-02-13 09:15:56'),(100,50,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 09:15:56','2021-02-13 09:15:56'),(101,51,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:05:40','2021-02-13 10:05:40'),(102,51,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:05:40','2021-02-13 10:05:40'),(103,52,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:18:28','2021-02-13 10:18:28'),(104,52,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:18:28','2021-02-13 10:18:28'),(105,53,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:31:21','2021-02-13 10:31:21'),(106,53,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:31:21','2021-02-13 10:31:21'),(107,54,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:39:25','2021-02-13 10:39:25'),(108,54,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:39:25','2021-02-13 10:39:25'),(109,55,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:58:39','2021-02-13 10:58:39'),(110,55,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 10:58:39','2021-02-13 10:58:39'),(111,56,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 11:13:40','2021-02-13 11:13:40'),(112,56,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 11:13:40','2021-02-13 11:13:40'),(113,57,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 11:21:48','2021-02-13 11:21:48'),(114,57,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 11:21:48','2021-02-13 11:21:48'),(115,58,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 11:28:38','2021-02-13 11:28:38'),(116,58,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 11:28:38','2021-02-13 11:28:38'),(117,59,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 11:35:33','2021-02-13 11:35:33'),(118,59,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-13 11:35:33','2021-02-13 11:35:33'),(119,60,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-27 23:26:09','2021-02-27 23:26:09'),(120,60,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-02-27 23:26:09','2021-02-27 23:26:09'),(121,61,'billing','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2021-03-24 18:13:51','2021-03-24 18:13:51'),(122,61,'shipping','abdur','rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Dhaka','Dhaka','1213','01712004426',NULL,NULL,NULL,NULL,'2021-03-24 18:13:51','2021-03-24 18:13:51'),(123,62,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-03-26 17:43:20','2021-03-26 17:43:20'),(124,62,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka',NULL,'Tangail','Dhaka','1980','01712004426',NULL,NULL,'4',NULL,'2021-03-26 17:43:20','2021-03-26 17:43:20');
/*!40000 ALTER TABLE `order_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_transaction`
--

DROP TABLE IF EXISTS `order_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_transaction` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_head_id` int unsigned DEFAULT NULL,
  `transaction_number` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,4) DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seller_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_transaction_order_head_id_foreign` (`order_head_id`),
  KEY `order_transaction_seller_id_foreign` (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_transaction`
--

LOCK TABLES `order_transaction` WRITE;
/*!40000 ALTER TABLE `order_transaction` DISABLE KEYS */;
INSERT INTO `order_transaction` VALUES (1,1,'itgen@gmail.com','paypal','2019-12-10',1510.0000,'active','4',NULL,'2019-12-10 09:18:33','2019-12-10 09:18:33',2),(2,2,NULL,'cash-on-delevery','2019-12-10',1285.0000,'inactive','4',NULL,'2019-12-10 10:57:33','2019-12-10 10:57:33',2),(3,3,NULL,'bank-transfer','2019-12-10',1285.0000,'active','4',NULL,'2019-12-10 11:08:36','2019-12-10 11:08:36',2),(4,4,'13','bkash','2020-12-15',1585.0000,'active','4',NULL,'2020-01-03 11:09:28','2020-01-03 11:09:28',2),(5,6,NULL,'cash-on-delevery','2020-05-07',1585.0000,'inactive',NULL,NULL,'2020-05-07 15:54:52','2020-05-07 15:54:52',2),(6,7,'212','nagad','2020-05-07',1600.0000,'active',NULL,NULL,'2020-05-07 16:43:58','2020-05-07 16:43:58',2),(7,8,'1234','bkash','2020-05-08',8100.0000,'inactive',NULL,'2','2020-05-08 17:59:41','2020-05-08 18:02:38',2),(9,10,'12004426','bkash','2020-12-13',4470.0000,'active','1',NULL,'2020-12-13 05:17:38','2020-12-13 05:17:38',2),(10,11,'54354','nagad','2020-12-13',4900.0000,'active','1',NULL,'2020-12-13 05:41:35','2020-12-13 05:41:35',2),(11,12,'2222','nagad','2020-12-15',3250.0000,'active',NULL,NULL,'2020-12-14 22:09:13','2020-12-14 22:09:13',2),(12,13,'333','bkash','2020-12-15',4900.0000,'active','4',NULL,'2020-12-14 22:40:18','2020-12-14 22:40:18',2),(13,16,NULL,'nagad','2020-12-15',3900.0000,'inactive','4',NULL,'2020-12-14 23:02:49','2020-12-14 23:02:49',2),(14,17,NULL,'nagad','2020-12-15',890.0000,'inactive','4',NULL,'2020-12-14 23:48:48','2020-12-14 23:48:48',2),(15,18,NULL,'nagad','2020-12-15',890.0000,'inactive','4',NULL,'2020-12-14 23:54:04','2020-12-14 23:54:04',2),(16,19,NULL,'nagad','2020-12-15',700.0000,'inactive','4',NULL,'2020-12-14 23:55:33','2020-12-14 23:55:33',7),(17,20,NULL,'nagad','2020-12-15',700.0000,'inactive','4',NULL,'2020-12-14 23:58:26','2020-12-14 23:58:26',7),(18,21,NULL,'nagad','2020-12-15',700.0000,'inactive','4',NULL,'2020-12-14 23:58:44','2020-12-14 23:58:44',7),(19,22,NULL,'nagad','2020-12-15',700.0000,'inactive','4',NULL,'2020-12-14 23:58:55','2020-12-14 23:58:55',7),(20,23,NULL,'nagad','2020-12-15',700.0000,'inactive','4',NULL,'2020-12-14 23:59:36','2020-12-14 23:59:36',7),(21,24,NULL,'nagad','2020-12-15',700.0000,'inactive','4',NULL,'2020-12-15 00:00:50','2020-12-15 00:00:50',7),(22,25,NULL,'nagad','2020-12-15',700.0000,'inactive','4',NULL,'2020-12-15 00:01:23','2020-12-15 00:01:23',7),(23,26,NULL,'nagad','2020-12-15',700.0000,'inactive','4',NULL,'2020-12-15 00:01:56','2020-12-15 00:01:56',7),(24,27,'777','bkash','2020-12-15',700.0000,'active','4',NULL,'2020-12-15 00:02:46','2020-12-15 00:02:46',7),(25,28,'6666','bkash','2020-12-15',700.0000,'active','4',NULL,'2020-12-15 00:07:28','2020-12-15 00:07:28',7),(26,29,'5555','nagad','2020-12-15',700.0000,'active','4',NULL,'2020-12-15 00:09:41','2020-12-15 00:09:41',7),(27,30,'888','bkash','2020-12-15',2000.0000,'active','4',NULL,'2020-12-15 00:48:36','2020-12-15 00:48:36',2),(28,31,'9999','bkash','2020-12-15',1000.0000,'active',NULL,NULL,'2020-12-15 02:17:43','2020-12-15 02:17:43',2),(29,32,'789','bkash','2020-12-15',590.0000,'active',NULL,NULL,'2020-12-15 21:50:06','2020-12-15 21:50:06',2),(30,33,'1234','nagad','2020-12-16',700.0000,'active','4',NULL,'2020-12-17 00:02:45','2020-12-17 00:02:45',7),(31,34,NULL,'bkash','2020-12-16',4350.0000,'inactive',NULL,NULL,'2020-12-17 00:45:16','2020-12-17 00:45:16',2),(32,35,'222','bkash','2020-12-16',4350.0000,'active',NULL,NULL,'2020-12-17 00:46:00','2020-12-17 00:46:00',2),(33,36,'1111','bkash','2020-12-16',500.0000,'active',NULL,NULL,'2020-12-17 00:59:16','2020-12-17 00:59:16',2),(34,37,'888','bkash','2020-12-16',500.0000,'active',NULL,NULL,'2020-12-17 01:02:26','2020-12-17 01:02:26',2),(35,38,'666','nagad','2020-12-16',500.0000,'active',NULL,NULL,'2020-12-17 01:03:52','2020-12-17 01:03:52',2),(36,39,'999','bkash','2020-12-16',1960.0000,'active',NULL,NULL,'2020-12-17 01:15:52','2020-12-17 01:15:52',2),(37,40,'2222','bkash','2020-12-17',3250.0000,'active',NULL,NULL,'2020-12-17 20:14:19','2020-12-17 20:14:19',2),(38,41,NULL,'nagad','2020-12-17',3250.0000,'inactive','8',NULL,'2020-12-17 20:26:00','2020-12-17 20:26:00',2),(39,42,NULL,'nagad','2020-12-17',3250.0000,'inactive','8',NULL,'2020-12-17 20:27:06','2020-12-17 20:27:06',2),(40,43,NULL,'bkash','2020-12-17',3250.0000,'inactive','8',NULL,'2020-12-17 20:30:39','2020-12-17 20:30:39',2),(41,44,'1','nagad','2020-12-17',3250.0000,'active','8',NULL,'2020-12-17 20:31:39','2020-12-17 20:31:39',2),(42,45,NULL,'bkash','2020-12-17',650.0000,'inactive','8',NULL,'2020-12-17 20:46:10','2020-12-17 20:46:10',2),(43,46,'777','bkash','2020-12-17',4350.0000,'active',NULL,NULL,'2020-12-17 21:29:46','2020-12-17 21:29:46',2),(44,47,'888','nagad','2020-12-17',8400.0000,'active',NULL,NULL,'2020-12-17 21:37:04','2020-12-17 21:37:04',2),(45,48,'123456','bkash','2020-12-26',890.0000,'active',NULL,NULL,'2020-12-26 14:42:31','2020-12-26 14:42:31',2),(46,49,'1112','bkash','2021-01-16',8000.0000,'active','4',NULL,'2021-01-16 18:14:29','2021-01-16 18:14:29',2),(47,50,'5678','bkash','2021-02-13',8000.0000,'active','4',NULL,'2021-02-13 09:15:56','2021-02-13 09:15:56',5),(48,51,'22','nagad','2021-02-13',8000.0000,'active','4',NULL,'2021-02-13 10:05:40','2021-02-13 10:05:40',5),(49,52,'454545','nagad','2021-02-13',4900.0000,'active','4',NULL,'2021-02-13 10:18:28','2021-02-13 10:18:28',2),(50,53,NULL,'bkash','2021-02-13',7500.0000,'inactive','4',NULL,'2021-02-13 10:31:21','2021-02-13 10:31:21',5),(51,54,'454545','bkash','2021-02-13',7500.0000,'active','4',NULL,'2021-02-13 10:39:25','2021-02-13 10:39:25',5),(52,55,'343434','nagad','2021-02-13',8000.0000,'active','4',NULL,'2021-02-13 10:58:39','2021-02-13 10:58:39',5),(53,56,'45345345','nagad','2021-02-13',590.0000,'active','4',NULL,'2021-02-13 11:13:40','2021-02-13 11:13:40',2),(54,57,'676766343','nagad','2021-02-13',4350.0000,'active','4',NULL,'2021-02-13 11:21:48','2021-02-13 11:21:48',2),(55,58,'232323','bkash','2021-02-13',4200.0000,'active','4',NULL,'2021-02-13 11:28:38','2021-02-13 11:28:38',2),(56,59,'3434343','bkash','2021-02-13',3250.0000,'active','4',NULL,'2021-02-13 11:35:33','2021-02-13 11:35:33',2),(57,60,'23r5','bkash','2021-02-27',3900.0000,'active','4',NULL,'2021-02-27 23:26:09','2021-02-27 23:26:09',2),(58,60,'23r5','bkash','2021-02-27',2599.0000,'active','4',NULL,'2021-02-27 23:26:09','2021-02-27 23:26:09',17),(59,61,NULL,'cash-on-delevery','2021-03-24',1950.0000,'inactive',NULL,NULL,'2021-03-24 18:13:51','2021-03-24 18:13:51',2),(60,62,'12345','bkash','2021-03-26',2350.0000,'active','4',NULL,'2021-03-26 17:43:20','2021-03-26 17:43:20',2);
/*!40000 ALTER TABLE `order_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_options`
--

DROP TABLE IF EXISTS `payment_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_options` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `payment_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_type_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_options`
--

LOCK TABLES `payment_options` WRITE;
/*!40000 ALTER TABLE `payment_options` DISABLE KEYS */;
INSERT INTO `payment_options` VALUES (1,'cash-on-delevery',NULL,NULL,NULL,'01712004426','Cash on delivery (COD) is a type of transaction in which the recipient makes payment for a good at the time of delivery','active','1','1','2019-12-06 08:32:55','2021-03-22 18:01:43'),(2,'paypal',NULL,NULL,NULL,'qafzone@gmail.com','Buy using your credit cards, debit cards, prepaid cards and PayPal Credit.','inactive','1','1','2019-12-06 08:33:05','2020-12-13 03:50:46'),(3,'card-payment',NULL,NULL,NULL,'qafzone@gmail.com','Buy using your credit cards, debit cards, prepaid cards and PayPal Credit.','cancel','1','1','2019-12-06 08:33:35','2019-12-06 08:48:24'),(4,'bank-transfer',NULL,NULL,NULL,'103103210204','You can transfer funds from your Bank account, directly to our local bank account.','cancel','1','1','2019-12-06 08:33:47','2019-12-06 08:45:54'),(5,'bkash',NULL,NULL,NULL,'01712004426','Buy using your Bkash Account','active','1','1','2020-05-07 16:04:12','2020-05-07 16:04:12'),(6,'nagad',NULL,NULL,NULL,'01712004426','Buy using your Nagad Account','active','1','1','2020-05-07 16:04:41','2020-05-07 16:04:41'),(7,'rocket',NULL,NULL,NULL,'01712004426','Buy using your Rocket Account','inactive','1',NULL,'2020-12-13 00:49:20','2020-12-13 00:49:20');
/*!40000 ALTER TABLE `payment_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('simple-product','configurable-product','group-product') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_no` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int unsigned DEFAULT NULL,
  `is_featured` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_price` decimal(10,4) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `list_price` decimal(10,4) DEFAULT NULL,
  `attribute_set_id` int unsigned DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `short_description_bn` text COLLATE utf8mb4_unicode_ci,
  `short_description_hi` text COLLATE utf8mb4_unicode_ci,
  `short_description_ch` text COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_bn` text COLLATE utf8mb4_unicode_ci,
  `description_hi` text COLLATE utf8mb4_unicode_ci,
  `description_ch` text COLLATE utf8mb4_unicode_ci,
  `specification` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `specification_bn` text COLLATE utf8mb4_unicode_ci,
  `specification_hi` text COLLATE utf8mb4_unicode_ci,
  `specification_ch` text COLLATE utf8mb4_unicode_ci,
  `size_guide` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int unsigned DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_slug_unique` (`slug`),
  UNIQUE KEY `product_item_no_unique` (`item_no`),
  KEY `product_attribute_set_id_foreign` (`attribute_set_id`),
  KEY `product_seller_id_foreign` (`seller_id`),
  KEY `product_brand_id_foreign` (`brand_id`),
  CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'simple-product','Joust Duffle Bag',NULL,NULL,NULL,'joust-duffle-bag','123',NULL,'','sold',1200.0000,0.00,1000.0000,3,'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anyway',NULL,NULL,NULL,'<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n<span>Side mesh pocket.</span>\r\n<span>Cell phone pocket on strap.</span>\r\n<span>Adjustable shoulder strap and top carry handle.</span>',NULL,NULL,NULL,'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.',NULL,NULL,NULL,NULL,'inactive',2,'2','1','2019-07-03 19:01:36','2020-05-08 17:16:21'),(2,'simple-product','Strive Shoulder Pack',NULL,NULL,NULL,'strive-shoulder-pack','124',NULL,'','sold',1200.0000,0.00,500.0000,3,'Convenience is next to nothing when your day is crammed with action. So whether you\'re heading today.',NULL,NULL,NULL,'<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n <span>Side mesh pocket.</span>\r\n <span>Cell phone pocket on strap.</span>\r\n <span>Adjustable shoulder strap and top carry handle.</span>',NULL,NULL,NULL,'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.',NULL,NULL,NULL,NULL,'inactive',2,'2','1','2019-07-03 19:35:41','2020-05-08 17:14:33'),(3,'simple-product','Crown Summit Backpack',NULL,NULL,NULL,'crown-summit-backpack','125',NULL,'','sold',1000.0000,0.00,600.0000,3,'The Crown Summit Backpack is equally at home in a gym locker, study cube or a pup tent, so be submit.',NULL,NULL,NULL,'<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n<span>Side mesh pocket.</span>\r\n<span>Cell phone pocket on strap.</span>\r\n<span>Adjustable shoulder strap and top carry handle.</span>',NULL,NULL,NULL,'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.',NULL,NULL,NULL,NULL,'inactive',2,'2','1','2019-07-03 19:39:40','2020-05-08 17:16:27'),(4,'simple-product','Wayfarer Messenger Bag',NULL,NULL,NULL,'wayfarer-messenger-bag','126',NULL,'','sold',800.0000,0.00,750.0000,3,'The Rival Field Messenger packs all your campus, studio or trail essentials inside a unique designs.',NULL,NULL,NULL,'<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n<span>Side mesh pocket.</span>\r\n<span>Cell phone pocket on strap.</span>\r\n<span>Adjustable shoulder strap and top carry handle.</span>',NULL,NULL,NULL,'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.',NULL,NULL,NULL,NULL,'inactive',2,'2','1','2019-07-03 19:44:08','2020-05-08 17:14:29'),(5,'configurable-product','Strive Shoulder Pack',NULL,NULL,NULL,'strive-shoulder-pack-2','127',NULL,'no','sold',900.0000,0.00,800.0000,3,'Convenience is next to nothing when your day is crammed with action. So whether you\'re heading today.',NULL,NULL,NULL,'<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n<span>Side mesh pocket.</span>\r\n<span>Cell phone pocket on strap.</span>\r\n<span>Adjustable shoulder strap and top carry handle.</span>',NULL,NULL,NULL,'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.',NULL,NULL,NULL,NULL,'inactive',2,'2','2','2019-07-03 19:47:18','2020-05-08 17:50:38'),(6,'group-product','Azure Embroidered Net Unstitched Kurties AZU20F Berrylicious 01 - Formal Luxury Collection',NULL,NULL,NULL,'azure-embroidered-net-unstitched-kurties-azu20ormal-luxury-collection','128',NULL,'no','sold',5000.0000,0.00,4000.0000,3,'Azure Embroidered Net Unstitched Kurties AZU20F Berrylicious 01 - Formal Luxury Collection',NULL,NULL,NULL,'Kurties Embroidered Unstitched from Azure Embroidered Luxury Formal One Piece Eid Collection\r\nManufacturer: Azure\r\n\r\nShirt Fabric: Net',NULL,NULL,NULL,'Shirt Fabric: Net',NULL,NULL,NULL,NULL,'active',5,'5','1','2019-07-03 19:53:32','2021-02-26 14:37:52'),(7,'simple-product','Azure Embroidered Chiffon Unstitched Kurties AZU20F Majestic Bloom 08 - Formal Luxury Collection',NULL,NULL,NULL,'azure-embroidered-chiffonformal-luxury-collection','129',NULL,'yes','sold',5000.0000,0.00,4000.0000,3,'Azure Embroidered Chiffon Unstitched Kurties AZU20F Majestic Bloom 08 - Formal Luxury Collection',NULL,NULL,NULL,'Kurties Embroidered Unstitched from Azure Embroidered Luxury Formal One Piece Eid Collection\r\nManufacturer: Azure\r\n\r\nShirt Fabric: Chiffon',NULL,NULL,NULL,'Shirt Fabric: Chiffon',NULL,NULL,NULL,NULL,'active',5,'5','1','2019-07-03 19:56:50','2021-02-26 14:37:46'),(8,'simple-product','Azure Embroidered Cotton Net Unstitched Kurties AZU20F Morning Bud 09 - Formal Luxury Collection',NULL,NULL,NULL,'azureu20f-morningformal-luxury-collection','130',NULL,'no','sold',5000.0000,0.00,4000.0000,3,'<p>Azure Embroidered Cotton Net Unstitched Kurties AZU20F Morning Bud 09 - Formal Luxury Collection</p>',NULL,NULL,NULL,'Kurties Embroidered Unstitched from Azure Embroidered Luxury Formal One Piece Eid Collection\r\nManufacturer: Azure\r\n\r\nShirt Fabric: Cotton Net\r\n\r\nCatalog: Azure Embroidered Luxury Formal One Piece Eid Collection 2020',NULL,NULL,NULL,'Shirt Fabric: Cotton Net',NULL,NULL,NULL,NULL,'active',5,'5','1','2019-07-03 20:00:02','2021-02-26 14:41:58'),(9,'group-product','Serene Premium Embroidered Chiffon Unstitched 3 Piece Suit SMP20BL 1004 - Luxury Collection',NULL,NULL,NULL,'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl','131',NULL,'no','sold',7500.0000,0.00,7000.0000,3,'3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium',NULL,NULL,NULL,'3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium\r\n\r\nShirt Fabric: Chiffon\r\n\r\nCatalog: Serene Premium Beaux Reves Luxury Collection 2020',NULL,NULL,NULL,'Shirt Fabric: Chiffon',NULL,NULL,NULL,NULL,'active',5,'5','1','2019-07-03 20:06:40','2021-02-26 14:37:39'),(10,'group-product','Serene Premium Embroidered Chiffon Unstitched 3 Piece Suit SMP20BL 1005 - Luxury Collection',NULL,NULL,NULL,'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-100','133',NULL,'no','sold',8000.0000,0.00,7000.0000,3,'3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium',NULL,NULL,NULL,'3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium\r\n\r\nShirt Fabric: Chiffon\r\n\r\nCatalog: Serene Premium Beaux Reves Luxury Collection 2020',NULL,NULL,NULL,'Shirt Fabric: Chiffon',NULL,NULL,NULL,NULL,'active',5,'5','1','2019-10-17 10:13:54','2021-02-26 14:37:18'),(11,'configurable-product','Men\'s Casual Shirt INDIGO DENIM',NULL,NULL,NULL,'mens-casual-shirt-indigo','134',NULL,NULL,'sold',1500.0000,0.00,1200.0000,2,'aaaa',NULL,NULL,NULL,'aa',NULL,NULL,NULL,'aaa',NULL,NULL,NULL,NULL,'cancel',5,'5','5','2019-10-18 11:26:06','2020-05-08 17:12:45'),(12,'simple-product','Serene Premium Embroidered Chiffon Unstitched 3 Piece Suit SMP20BL 1006 - Luxury Collection',NULL,NULL,NULL,'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-100-luxury-collection','137',NULL,'no','sold',8000.0000,0.00,7000.0000,2,'3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium',NULL,NULL,NULL,'3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium\r\n\r\nShirt Fabric: Chiffon\r\n\r\nCatalog: Serene Premium Beaux Reves Luxury Collection 2020',NULL,NULL,NULL,'Shirt Fabric: Chiffon',NULL,NULL,NULL,NULL,'active',5,'5','1','2019-10-25 08:27:40','2021-02-26 14:37:24'),(13,'simple-product','JOHRA PINKS Pakistani Brand',NULL,NULL,NULL,'johra-pinks-pakistani-brand','2001',NULL,'','sold',4200.0000,0.00,4000.0000,2,'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.',NULL,NULL,NULL,'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.',NULL,NULL,NULL,'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.',NULL,NULL,NULL,NULL,'active',2,'2','1','2020-06-07 01:20:12','2020-12-27 20:49:51'),(14,'simple-product','JOHRA PINKS Pakistani Brand',NULL,NULL,NULL,'johra-pinks-pakistani-brand-02','2002',NULL,'','sold',4200.0000,0.00,4000.0000,2,'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.',NULL,NULL,NULL,'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.',NULL,NULL,NULL,'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.',NULL,NULL,NULL,NULL,'active',2,'2','1','2020-06-07 01:47:38','2020-12-27 20:49:04'),(15,'simple-product','JOHRA PINKS Pakistani Brand',NULL,NULL,NULL,'johra-pinks-pakistani-brand-03','2003',NULL,'no','sold',4200.0000,0.00,4000.0000,2,'<p>Fabric: Swiss Voile Embroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.</p>',NULL,NULL,NULL,'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.',NULL,NULL,NULL,'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.',NULL,NULL,NULL,NULL,'active',2,'2','1','2020-06-07 01:51:23','2021-02-26 14:36:54'),(16,'group-product','Single Piece New Collection',NULL,NULL,NULL,'single-piece-new-collection','2004',NULL,'no','sold',2000.0000,0.00,2000.0000,1,'<p>Single Piece New Collection</p>',NULL,NULL,NULL,'Single Piece New Collection\r\nFabrics: Georgette \r\nWork: Embroidery/ with Puthi or stone work.',NULL,NULL,NULL,'Fabrics: Georgette',NULL,NULL,NULL,NULL,'active',7,'7','1','2020-06-09 10:07:31','2021-03-25 14:22:06'),(17,'simple-product','Pakistani Brand: Ferdaus',NULL,NULL,NULL,'pakistani-brand-ferdaus','2005',NULL,'no','sold',2000.0000,0.00,2000.0000,2,'Pakistani Brand: Ferdaus',NULL,NULL,NULL,'Pakistani Brand: Ferdaus\r\nOrna: Chiffon\r\nKameez: Lawn with Digital Print+ Yoke\r\nSalwar: Lawn.',NULL,NULL,NULL,'Orna: Chiffon\r\nKameez: Lawn with Digital Print+ Yoke\r\nSalwar: Lawn.',NULL,NULL,NULL,NULL,'active',7,'7','7','2020-06-09 10:13:04','2020-12-27 20:55:00'),(18,'simple-product','Bright Story 3pcs Unstitch',NULL,NULL,NULL,'bright-story-pcs-unstitch','2006',NULL,'no','sold',2500.0000,0.00,2500.0000,2,'Digital Print Lawn Shirt With Embroidered Neck\r\nChiffon Digital Dupatta With Embroidered\r\nCotton Dyed Trouser',NULL,NULL,NULL,'Digital Print Lawn Shirt With Embroidered Neck\r\nChiffon Digital Dupatta With Embroidered\r\nCotton Dyed Trouser',NULL,NULL,NULL,'Digital Print Lawn Shirt With Embroidered Neck\r\nChiffon Digital Dupatta With Embroidered\r\nCotton Dyed Trouser',NULL,NULL,NULL,NULL,'active',7,'7','7','2020-06-09 10:19:27','2020-12-27 20:55:21'),(19,'group-product','Kameez: Lawn with 2 Yoke Ferdaus (Pakistani)',NULL,NULL,NULL,'kameez-lawn-with-2-yoke-ferdaus-pakistani','2007',NULL,'no','sold',2000.0000,0.00,2000.0000,2,'Ferdaus (Pakistani)\r\nKameez: Lawn with 2 Yoke\r\nSalwar: Lawn with Printed\r\nDupatta: Shiffon with Digital Print',NULL,NULL,NULL,'Ferdaus (Pakistani)\r\nKameez: Lawn with 2 Yoke\r\nSalwar: Lawn with Printed\r\nDupatta: Shiffon with Digital Print',NULL,NULL,NULL,'Ferdaus (Pakistani)\r\nKameez: Lawn with 2 Yoke\r\nSalwar: Lawn with Printed\r\nDupatta: Shiffon with Digital Print',NULL,NULL,NULL,NULL,'active',7,'7','7','2020-06-09 10:23:00','2021-02-12 08:42:52'),(20,'simple-product','Simple and Comfortable for SUMMER',NULL,NULL,NULL,'simple-and-comfortable-for-summer','2008',NULL,'no','sold',1000.0000,0.00,1000.0000,2,'Simple and Comfortable for SUMMER',NULL,NULL,NULL,'Simple and Comfortable for SUMMER',NULL,NULL,NULL,'Simple and Comfortable for SUMMER',NULL,NULL,NULL,NULL,'active',2,'2','2','2020-06-09 10:26:19','2020-12-27 20:54:35'),(21,'simple-product','Artificial Leather Messenger Shoulder Bag Handbag CrossBody',NULL,NULL,NULL,'artificial-leather-messenger-shoulder-bag-handbag-crossbody','2011',NULL,'no','sold',650.0000,0.00,600.0000,4,'Artificial Leather Messenger Shoulder Bag Handbag CrossBody',NULL,NULL,NULL,'Material:100%genuine leather.Traditional manual craft, durable nylon thread sewing and excellent workmanship .\r\n\r\nStructure: 2 main zipper pockets with a inner zipped pocket that is handy for small easy to lose items. , 2 front zipper pockets , 1 back zipper pocket . This pocketbook has the perfect amount of room and number of compartments to keep everything in separate areas and completely organized.\r\n\r\nSize info: 9.8\'\' x 3.9\'\' x 8.3\'\' Adjustable strap with metal buckle (appr. 85 ~ 150 cm)\r\n\r\nSimple and fashionable, suitable for casual or formal carry.Business, school, travel, shopping , hiking, cycling, and so on.Large enough to keep all of your items organized on the go with this messenger bag!\r\n\r\nThis spacious shoulder bag can hold all of your necessities for your every dayuse, wallet, camera, phone, umbrella, kindle, iPad 9.7inch and miscellaneous items.',NULL,NULL,NULL,'1.Material: Artificial Leather durable nylon thread sewing,high quality hardware.\r\n\r\n2.Dimension: 21 x 10 x 25 cm.\r\n\r\n3.Structure: 2 main zipper pockets, 2 front zipper pockets , 1 back zipper pocket .\r\nAdjustable strap with metal buckle (appr. 85 ~ 150 cm)\r\nYou can have 3 carrying options (Single shoulder, cross body and hand carry)\r\nThis spacious shoulder bag can hold all of your necessities for your every dayuse,\r\nwallet, camera, phone, umbrella, kindle, iPad mini and miscellaneous items.\r\n\r\n4.Vintage style:The leather used in crafting this bag is a natural cowhide\r\nthat leather items may have wrinkles, scars, scratches, distinctive leather smell\r\nthat are inherent characteristics and natural beauty of the hide to present the style of retro and wildness.',NULL,NULL,NULL,NULL,'active',2,'2','2','2020-06-09 20:55:28','2020-06-09 21:02:32'),(22,'simple-product','Artificial Leather China Crossbody Stylish Bag',NULL,NULL,NULL,'artificial-leather-china-crossbody-stylish-bag','2012',NULL,'no','sold',460.0000,0.00,420.0000,4,'Artificial Leather China Crossbody Stylish Bag',NULL,NULL,NULL,'A new Design Womens Clutch. That\'s a new fashion, new design and good colour. Everybody can carry it and it\'s weight is too light. Well classification and craft. I hope you enjoy it to keep your accessories.',NULL,NULL,NULL,'Natural Colour\r\nWell Leather\r\nMade In China\r\nLong Belt',NULL,NULL,NULL,NULL,'active',2,'2','2','2020-06-09 21:09:18','2020-06-09 21:11:04'),(23,'simple-product','Baby dress',NULL,NULL,NULL,'baby-dress','2009009',NULL,'no','sold',500.0000,0.00,450.0000,5,'A beautiful dress for your sweet baby girl.',NULL,NULL,NULL,'Availability: 1 pcs\r\nSoft,Light & Comfortable\r\nPerfect for Summer\r\nPlease wash before use',NULL,NULL,NULL,'Fabric: Cotton\r\nColour: Red\r\nLength : 17.5 Inches/ 45 CM\r\nAge Range: 1- 2 Years',NULL,NULL,NULL,NULL,'active',2,'2','2','2020-06-23 18:09:40','2020-06-23 18:34:55'),(24,'simple-product','Baby Rocking Bouncer Balance Soft',NULL,NULL,NULL,'baby-rocking-bouncer-balance-soft','2009010',NULL,'no','sold',1999.0000,0.00,1899.0000,5,'Baby Rocking Bouncer Balance Soft',NULL,NULL,NULL,'They are guaranteed harmless to children’s sensitive skin and will not trigger allergies. The Baby infant to toddler rocker is suitable from birth and converts rocker to stationary chair for toddlers, allowing it to grow with your child. Designed in conjunction with paediatricians, the ergonomic shape gives your baby the proper support they need from birth. The fabric seat moulds itself to your baby\'s head and body to distribute weight evenly. As your baby grows and learns to sit and stand unaided, the bouncer can still be used as a baby chair by removing the safety harness. The bouncer has four positions: play, rest, sleep and transport. It\'s easy and quiet to adjust and fold completely flat in transport mode to make it easier to transport or store.',NULL,NULL,NULL,'Type: Bouncing\r\nGender: Boys & Girls\r\nBearing Weight: 11-15kg\r\nWill not trigger allergies\r\nHarmless to children’s sensitive skin',NULL,NULL,NULL,NULL,'active',2,'2','2','2020-06-23 18:55:55','2020-06-23 19:05:06'),(25,'simple-product','2 in 1 Go Potty Baby Travel Toilet Seat',NULL,NULL,NULL,'2-in-1-go-potty-baby-travel-toilet-seat','2009011',NULL,'no','sold',1299.0000,0.00,1250.0000,5,'Product details of 2 in 1 Go Potty Baby Travel Toilet Seat',NULL,NULL,NULL,'Opens quickly and easily for on-the-go potty emergencies. Legs fold in for compact storage in cars, strollers or diaper bags. Legs lock securely for use as a stand-alone potty or on public restroom toilets. Soft, flexible flaps hold disposable bags securely in place. Small seat sized perfectly for little bottoms. Additional Refill Bags for the OXO Tot On The Go Potty available. Age - 12 months and above.',NULL,NULL,NULL,'Opens quickly and easily for on-the-go potty emergencies\r\nLegs fold in for compact storage in cars, strollers or diaper bags\r\nLegs lock securely for use as a stand-alone potty or on public restroom toilets\r\nSoft, flexible flaps hold disposable bags securely in place. Small seat sized perfectly for little bottoms\r\nAdditional Refill Bags for the OXO Tot On The Go Potty available.\r\n Age - 12 months and above.',NULL,NULL,NULL,NULL,'active',2,'2','2','2020-06-23 19:10:11','2020-06-23 19:20:05'),(128,'simple-product','VIJAY LAXMI SANA SILK',NULL,NULL,NULL,'vijay-laxmi-sana-silk-202132513372','AFS-2021254229',NULL,'no','batch',2850.0000,NULL,2550.0000,1,'<p>DESIGN -VIJAY LAXMI*</p>\r\n\r\n<p>*FABRIC: SANA SILK JACQUARD*</p>\r\n\r\n<p>*SIZE*</p>\r\n\r\n<p>*SAREE :-6.30MTR*</p>\r\n\r\n<p>*(Running Blouse)*</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2','2','2021-03-25 12:42:29','2021-03-25 17:18:29'),(129,'simple-product','BLACK  Kanchipuram silk Sarees',NULL,NULL,NULL,'black-kanchipuram-silk-sarees-2021325134351','AFS-2021254707',NULL,'yes','batch',2500.0000,2650.00,2200.0000,1,'<p>Beautiful and breezy, this duo of Chic BLACK Kanchipuram silk Sarees are perfect for festive moments!*</p>\r\n\r\n<p>Scintillating beauty of this red Kanchipuram silk Butta and butta saree will put you right in the center of attraction wherever you go. The gold zari checks and butta body is brought alive by the lovely self zari brocade border defined by green edges. Get this fabulous self zari pallu saree adorned by FLOWERS &nbsp;rudraksh, and brocade.</p>\r\n\r\n<p>*Blouse :- BLACK PLAINE BLOUSE</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2','2','2021-03-25 12:47:08','2021-03-25 17:21:33'),(130,'simple-product','Organza Silk Saree With Lucknowi',NULL,NULL,NULL,'organza-silk-saree-with-lucknowi--2021325134912','AFS-2021255119',NULL,'yes',NULL,2970.0000,NULL,NULL,1,'<p>STYLE YOURSELF IN THAT WAY SO SOMEONE ASK U WHAT ARE U DOING FOR THAT*</p>\r\n\r\n<p>Superb Soft Digital Printed Refined Organza Silk Saree With Lucknowi Thread Chikankari Work In Pallu n Border With Banglori Silk Blouse</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2',NULL,'2021-03-25 12:51:19','2021-03-25 12:51:19'),(132,'simple-product','Organza Silk Saree With lucknowi',NULL,NULL,NULL,'organza-silk-saree-with-lucknowi-2021325135611','AFS-2021255739',NULL,'yes',NULL,3250.0000,NULL,NULL,1,'<p>Superb Soft Digital Printed Refined Organza Silk Saree With Lucknowi Thread Chikankari Work In Pallu n Border With Banglori Silk Blouse</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2','1','2021-03-25 12:57:39','2021-03-25 13:29:00'),(133,'simple-product','casual Indian dress which has 3 pieces',NULL,NULL,NULL,'casual-indian-dress-which-has-pieces-2021325135833','AFS-2021250316',NULL,'no','batch',1850.0000,NULL,1600.0000,1,'<p>Salwar kameez - casual Indian dress which 3 pieces</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2','2','2021-03-25 13:03:16','2021-03-25 17:24:25'),(134,'simple-product','casual Indian 3 pieces',NULL,NULL,NULL,'casual-indian-pieces-202132514346','AFS-2021250514',NULL,'yes','batch',1850.0000,NULL,1600.0000,1,'<p>salwar kameez - casual Indian dress 3 pieces</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2','2','2021-03-25 13:05:14','2021-03-25 17:23:52'),(135,'simple-product','Casual Shirt',NULL,NULL,NULL,'casual-shirt-202132514657','AFS-2021251359',NULL,'no',NULL,650.0000,NULL,NULL,1,'<p>Casual Shirt</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2',NULL,'2021-01-06 14:13:59','2021-01-12 14:13:59'),(136,'simple-product','MENS CASUAL SHIRT LONG',NULL,NULL,NULL,'mens-casual-shirt-long-2021325141430','AFS-2021251752',NULL,'yes',NULL,650.0000,NULL,NULL,1,'<p>MENS CASUAL SHIRT LONG</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2',NULL,'2021-01-07 14:17:52','2021-03-25 13:17:52'),(137,'group-product','chanderi With seqvens work',NULL,NULL,NULL,'chanderi-with-seqvens-work-2021326125833','AFS-2021260811',NULL,'no',NULL,2350.0000,NULL,NULL,1,'<ul>\r\n	<li>Top- Modal chanderi With seqvens work (1.80)</li>\r\n	<li>inner &amp; Bottom&mdash; Santton(3.4 Total )</li>\r\n	<li>Dupatta - tissu net dupatta with gota patti work (2.10)</li>\r\n</ul>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2',NULL,'2021-03-26 12:08:11','2021-03-26 12:08:11'),(160,'configurable-product','Al over sequence work Saree',NULL,NULL,NULL,'al-over-sequence-work-saree-2021411124019','AFS-2021114220',NULL,'no','new',2650.0000,NULL,NULL,1,'<p>Al over sequence work Saree</p>',NULL,NULL,NULL,'<p>Al over sequence work Saree</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'active',2,'2','2','2021-04-11 00:42:20','2021-04-11 00:42:20');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_attribute`
--

DROP TABLE IF EXISTS `product_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_attribute` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `attribute_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_attribute_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_attribute`
--

LOCK TABLES `product_attribute` WRITE;
/*!40000 ALTER TABLE `product_attribute` DISABLE KEYS */;
INSERT INTO `product_attribute` VALUES (9,4,'size','==XL==','2',NULL,'2019-12-10 09:11:08','2019-12-10 09:11:08'),(10,4,'color','==Black==Blue==','2',NULL,'2019-12-10 09:11:08','2019-12-10 09:11:08'),(11,1,'size','==L==M==','2',NULL,'2019-12-10 09:14:06','2019-12-10 09:14:06'),(12,1,'color','==Black==Blue==','2',NULL,'2019-12-10 09:14:06','2019-12-10 09:14:06'),(13,105,'size','==L==XL==XXL==','2',NULL,'2021-03-19 19:25:30','2021-03-19 19:25:30'),(14,105,'color','==Green==Yellow==','2',NULL,'2021-03-19 19:25:30','2021-03-19 19:25:30'),(15,135,'size','==L==M==XL==','2',NULL,'2021-03-25 13:14:22','2021-03-25 13:14:22'),(16,135,'color','==Black==','2',NULL,'2021-03-25 13:14:22','2021-03-25 13:14:22'),(17,136,'size','==L==M==XL==','2',NULL,'2021-03-25 13:18:33','2021-03-25 13:18:33'),(18,136,'color','==Black==Blue==Maroon==','2','2','2021-03-25 13:18:33','2021-03-25 13:19:24');
/*!40000 ALTER TABLE `product_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_category_product_id_foreign` (`product_id`),
  KEY `product_category_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,1,4,NULL,'2',NULL,'2019-07-03 19:33:07','2019-07-03 19:33:07'),(2,2,4,NULL,'2',NULL,'2019-07-03 19:38:32','2019-07-03 19:38:32'),(12,11,2,'active','5',NULL,'2019-10-18 11:28:38','2019-10-18 11:28:38'),(13,12,3,'active','2',NULL,'2019-11-04 01:01:35','2019-11-04 01:01:35'),(17,6,2,'active','2',NULL,'2019-12-10 09:09:24','2019-12-10 09:09:24'),(18,5,3,'active','2',NULL,'2019-12-10 09:10:35','2019-12-10 09:10:35'),(19,3,5,'active','2',NULL,'2019-12-10 09:11:32','2019-12-10 09:11:32'),(20,3,6,'active','2',NULL,'2019-12-10 09:11:32','2019-12-10 09:11:32'),(21,2,5,'active','2',NULL,'2019-12-10 09:11:54','2019-12-10 09:11:54'),(22,2,6,'active','2',NULL,'2019-12-10 09:11:54','2019-12-10 09:11:54'),(23,1,1,'active','2',NULL,'2019-12-10 09:13:59','2019-12-10 09:13:59'),(24,1,2,'active','2',NULL,'2019-12-10 09:13:59','2019-12-10 09:13:59'),(25,12,2,'active','2',NULL,'2020-05-07 18:33:27','2020-05-07 18:33:27'),(26,10,2,'active','2',NULL,'2020-05-07 18:42:52','2020-05-07 18:42:52'),(27,10,3,'active','2',NULL,'2020-05-07 18:42:52','2020-05-07 18:42:52'),(28,9,2,'active','2',NULL,'2020-05-07 18:53:06','2020-05-07 18:53:06'),(29,9,3,'active','2',NULL,'2020-05-07 18:53:06','2020-05-07 18:53:06'),(30,8,3,'active','2','1','2021-02-26 14:41:58','2021-02-26 14:41:58'),(31,8,3,'active','2','1','2021-02-26 14:41:58','2021-02-26 14:41:58'),(32,7,2,'active','2',NULL,'2020-05-08 16:34:14','2020-05-08 16:34:14'),(33,7,3,'active','2',NULL,'2020-05-08 16:34:14','2020-05-08 16:34:14'),(34,6,3,'active','2',NULL,'2020-05-08 16:39:56','2020-05-08 16:39:56'),(35,13,3,NULL,NULL,NULL,NULL,NULL),(37,14,3,NULL,NULL,NULL,NULL,NULL),(41,16,23,'active',NULL,'1',NULL,'2021-03-25 14:22:06'),(42,16,23,'active','2','1','2020-06-09 10:09:04','2021-03-25 14:22:06'),(43,17,3,NULL,NULL,NULL,NULL,NULL),(44,17,2,'active','2',NULL,'2020-06-09 10:14:56','2020-06-09 10:14:56'),(45,18,3,NULL,NULL,NULL,NULL,NULL),(46,18,2,'active','2',NULL,'2020-06-09 10:22:15','2020-06-09 10:22:15'),(47,19,3,NULL,NULL,NULL,NULL,NULL),(48,19,2,'active','2',NULL,'2020-06-09 10:25:39','2020-06-09 10:25:39'),(49,20,3,NULL,NULL,NULL,NULL,NULL),(50,20,2,'active','2',NULL,'2020-06-09 10:29:55','2020-06-09 10:29:55'),(51,21,1,NULL,NULL,NULL,NULL,NULL),(52,22,1,NULL,NULL,NULL,NULL,NULL),(53,23,6,NULL,NULL,NULL,NULL,NULL),(54,24,6,NULL,NULL,NULL,NULL,NULL),(55,25,6,NULL,NULL,NULL,NULL,NULL),(56,26,3,NULL,NULL,NULL,NULL,NULL),(57,27,3,NULL,NULL,NULL,NULL,NULL),(61,30,22,'active',NULL,'1',NULL,'2021-03-25 13:35:20'),(63,32,3,NULL,NULL,NULL,NULL,NULL),(64,33,2,NULL,NULL,NULL,NULL,NULL),(65,34,5,NULL,NULL,NULL,NULL,NULL),(67,35,3,'active','2',NULL,'2020-07-11 00:22:09','2020-07-11 00:22:09'),(69,36,3,'active','2',NULL,'2020-07-11 01:02:27','2020-07-11 01:02:27'),(71,37,3,'active','2',NULL,'2020-07-11 01:47:45','2020-07-11 01:47:45'),(73,38,3,'active','2',NULL,'2020-07-11 02:33:43','2020-07-11 02:33:43'),(74,39,3,'active',NULL,'1',NULL,'2021-03-23 11:18:18'),(75,40,3,'active',NULL,'1',NULL,'2021-03-23 11:20:57'),(76,41,3,NULL,NULL,NULL,NULL,NULL),(77,42,3,NULL,NULL,NULL,NULL,NULL),(78,43,3,NULL,NULL,NULL,NULL,NULL),(79,44,4,NULL,NULL,NULL,NULL,NULL),(80,45,3,NULL,NULL,NULL,NULL,NULL),(81,46,3,NULL,NULL,NULL,NULL,NULL),(82,47,3,NULL,NULL,NULL,NULL,NULL),(83,48,3,NULL,NULL,NULL,NULL,NULL),(84,49,3,'active','13',NULL,NULL,NULL),(85,50,3,'active','13',NULL,NULL,NULL),(86,54,3,'active','13',NULL,NULL,NULL),(87,56,3,'active','13',NULL,NULL,NULL),(88,57,3,'active','2',NULL,NULL,NULL),(89,58,12,'active','2',NULL,NULL,NULL),(90,59,5,'active','2',NULL,NULL,NULL),(91,60,3,'active','13',NULL,NULL,NULL),(92,64,3,'active','13',NULL,NULL,NULL),(93,66,3,'active','13',NULL,NULL,NULL),(94,68,2,'active','2',NULL,NULL,NULL),(95,69,3,'active','2',NULL,NULL,NULL),(96,70,3,'active','13',NULL,NULL,NULL),(97,71,3,'active','13',NULL,NULL,NULL),(98,75,2,'active','13','1',NULL,'2021-03-23 11:23:06'),(99,76,3,'active','16','1','2021-02-26 14:09:25','2021-03-23 11:21:19'),(101,77,3,'active','2','1','2021-02-25 18:43:42','2021-02-25 18:43:42'),(103,79,3,'active','17',NULL,NULL,NULL),(104,80,3,'active','17','1','2021-02-26 14:11:38','2021-03-25 13:34:41'),(105,81,2,'active','17','1',NULL,'2021-03-23 11:18:38'),(106,82,2,'active','17','1',NULL,'2021-03-23 11:17:02'),(107,83,3,'active','17','1','2021-03-22 17:55:25','2021-03-25 13:33:55'),(108,84,2,'active','17','1',NULL,'2021-03-23 11:23:35'),(109,85,3,'active','17',NULL,NULL,NULL),(110,86,3,'active','17','1',NULL,'2021-03-23 11:16:18'),(111,87,3,'active','17','1',NULL,'2021-03-23 11:15:49'),(112,88,3,'active','2',NULL,NULL,NULL),(113,89,3,'active','2',NULL,NULL,NULL),(114,90,3,'active','2',NULL,NULL,NULL),(115,91,2,'active','2','1',NULL,'2021-03-23 11:26:06'),(116,92,3,'active','2',NULL,NULL,NULL),(117,93,2,'active','2','1',NULL,'2021-03-23 11:25:44'),(118,94,2,'active','2','1',NULL,'2021-03-25 13:52:49'),(119,101,2,'active','2',NULL,NULL,NULL),(120,101,3,'active','2',NULL,'2021-03-14 00:35:25','2021-03-14 00:35:25'),(121,102,3,'active','2',NULL,NULL,NULL),(122,103,2,'active','2',NULL,NULL,NULL),(123,103,3,'active','2',NULL,'2021-03-17 17:30:58','2021-03-17 17:30:58'),(124,104,2,'active','2',NULL,NULL,NULL),(125,105,2,'active','2','1',NULL,'2021-03-25 13:47:06'),(126,106,3,'active','2',NULL,NULL,NULL),(127,107,3,'active','2',NULL,NULL,NULL),(128,108,3,'active','2',NULL,NULL,NULL),(129,109,2,'active','2','1',NULL,'2021-03-25 13:36:32'),(131,111,3,'active','2',NULL,NULL,NULL),(132,112,2,'active','2','1',NULL,'2021-03-25 13:29:30'),(134,114,2,'active','2',NULL,NULL,NULL),(135,115,3,'active','2',NULL,NULL,NULL),(136,116,3,'active','2',NULL,NULL,NULL),(137,117,3,'active','2',NULL,NULL,NULL),(140,108,2,'active','2',NULL,'2021-03-19 18:58:45','2021-03-19 18:58:45'),(141,104,3,'active','2',NULL,'2021-03-19 18:59:10','2021-03-19 18:59:10'),(142,88,2,'active','2',NULL,'2021-03-20 12:00:11','2021-03-20 12:00:11'),(144,34,17,'active','2',NULL,'2021-03-20 12:02:34','2021-03-20 12:02:34'),(145,34,18,'active','2',NULL,'2021-03-20 12:02:34','2021-03-20 12:02:34'),(146,31,3,'active','2',NULL,'2021-03-20 12:03:09','2021-03-20 12:03:09'),(147,30,22,'active','2','1','2021-03-20 12:03:30','2021-03-25 13:35:20'),(148,29,3,'active','2',NULL,'2021-03-20 12:03:45','2021-03-20 12:03:45'),(149,28,2,'active','2','1','2021-03-20 12:04:16','2021-03-25 13:52:31'),(150,118,3,'active','18','1','2021-03-22 17:52:33','2021-03-22 17:52:33'),(151,119,2,'active','2',NULL,NULL,NULL),(152,120,2,'active','2','1',NULL,'2021-03-25 13:47:49'),(153,121,2,'active','2',NULL,NULL,NULL),(154,122,3,'active','2',NULL,NULL,NULL),(155,123,2,'active','2','1',NULL,'2021-03-25 13:30:58'),(156,124,5,'active','2',NULL,NULL,NULL),(157,125,3,'active','2',NULL,NULL,NULL),(164,126,2,'active','2','1',NULL,'2021-03-25 13:53:13'),(165,127,3,'active','2',NULL,NULL,NULL),(166,127,22,'active','2',NULL,'2021-03-25 12:36:19','2021-03-25 12:36:19'),(167,127,23,'active','2',NULL,'2021-03-25 12:36:19','2021-03-25 12:36:19'),(168,121,3,'active','2',NULL,'2021-03-25 12:36:48','2021-03-25 12:36:48'),(169,121,22,'active','2',NULL,'2021-03-25 12:36:48','2021-03-25 12:36:48'),(170,121,23,'active','2',NULL,'2021-03-25 12:36:48','2021-03-25 12:36:48'),(171,128,3,'active','2',NULL,NULL,NULL),(172,128,21,'active','2',NULL,'2021-03-25 12:43:38','2021-03-25 12:43:38'),(174,129,3,'active','2',NULL,'2021-03-25 12:49:04','2021-03-25 12:49:04'),(176,130,3,'active','2',NULL,NULL,NULL),(177,130,2,'active','2',NULL,'2021-03-25 12:52:10','2021-03-25 12:52:10'),(178,130,21,'active','2',NULL,'2021-03-25 12:52:10','2021-03-25 12:52:10'),(179,132,3,'active','2',NULL,NULL,NULL),(180,132,21,'active','2',NULL,'2021-03-25 12:58:09','2021-03-25 12:58:09'),(181,133,3,'active','2',NULL,NULL,NULL),(182,134,3,'active','2',NULL,NULL,NULL),(183,135,4,'active','2',NULL,NULL,NULL),(184,136,4,'active','2',NULL,NULL,NULL),(185,136,8,'active','2',NULL,'2021-03-25 13:18:18','2021-03-25 13:18:18'),(186,137,3,'active','2',NULL,NULL,NULL),(187,138,2,'active','2',NULL,NULL,NULL),(188,139,2,'active','2',NULL,NULL,NULL),(189,140,3,'active','2',NULL,NULL,NULL),(190,140,21,'active','2',NULL,'2021-03-26 12:33:08','2021-03-26 12:33:08'),(191,139,3,'active','2',NULL,'2021-03-26 12:33:37','2021-03-26 12:33:37'),(192,139,22,'active','2',NULL,'2021-03-26 12:33:37','2021-03-26 12:33:37'),(193,139,23,'active','2',NULL,'2021-03-26 12:33:37','2021-03-26 12:33:37'),(194,138,3,'active','2',NULL,'2021-03-26 12:33:55','2021-03-26 12:33:55'),(195,138,22,'active','2',NULL,'2021-03-26 12:33:55','2021-03-26 12:33:55'),(196,138,23,'active','2',NULL,'2021-03-26 12:33:55','2021-03-26 12:33:55'),(197,137,22,'active','2',NULL,'2021-03-26 12:34:32','2021-03-26 12:34:32'),(198,137,23,'active','2',NULL,'2021-03-26 12:34:32','2021-03-26 12:34:32'),(199,134,22,'active','2',NULL,'2021-03-26 12:35:06','2021-03-26 12:35:06'),(200,134,23,'active','2',NULL,'2021-03-26 12:35:06','2021-03-26 12:35:06'),(201,126,3,'active','2',NULL,'2021-03-26 12:35:39','2021-03-26 12:35:39'),(202,126,22,'active','2',NULL,'2021-03-26 12:35:39','2021-03-26 12:35:39'),(203,126,23,'active','2',NULL,'2021-03-26 12:35:39','2021-03-26 12:35:39'),(204,122,22,'active','2',NULL,'2021-03-26 12:35:58','2021-03-26 12:35:58'),(205,122,23,'active','2',NULL,'2021-03-26 12:35:58','2021-03-26 12:35:58'),(208,141,3,'active','2',NULL,NULL,NULL),(209,141,2,'active','2',NULL,'2021-03-26 16:23:32','2021-03-26 16:23:32'),(210,141,23,'active','2',NULL,'2021-03-26 16:23:32','2021-03-26 16:23:32'),(211,143,3,'active','17','1',NULL,'2021-03-31 09:03:35'),(212,144,3,'active','17',NULL,NULL,NULL),(213,145,3,'active','17',NULL,NULL,NULL),(214,146,3,'active','17',NULL,NULL,NULL),(215,147,3,'active','17','1',NULL,'2021-03-31 09:02:45'),(216,148,3,'active','17',NULL,NULL,NULL),(217,149,3,'active','17',NULL,NULL,NULL),(218,150,3,'active','17',NULL,NULL,NULL),(219,151,3,'active','17',NULL,NULL,NULL),(220,152,3,'active','17',NULL,NULL,NULL),(221,157,3,'active','17',NULL,NULL,NULL),(222,158,3,'active','17',NULL,NULL,NULL),(223,159,3,'active','17',NULL,NULL,NULL),(226,113,3,'active','2',NULL,'2021-03-31 10:54:58','2021-03-31 10:54:58'),(227,110,23,'active','2',NULL,'2021-03-31 10:57:37','2021-03-31 10:57:37'),(228,110,3,'active','2',NULL,'2021-03-31 10:58:06','2021-03-31 10:58:06'),(229,78,23,'active','2',NULL,'2021-03-31 10:58:54','2021-03-31 10:58:54'),(230,78,3,'active','2',NULL,'2021-03-31 10:59:02','2021-03-31 10:59:02'),(231,15,23,'active','2',NULL,'2021-03-31 11:02:37','2021-03-31 11:02:37'),(232,160,23,'active','2','19','2021-04-11 00:42:21','2021-11-29 22:02:40'),(233,4,3,'active','2',NULL,'2021-08-08 07:38:42','2021-08-08 07:38:42');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_coupon`
--

DROP TABLE IF EXISTS `product_coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_coupon` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `coupon_id` int unsigned DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_coupon_product_id_foreign` (`product_id`),
  KEY `product_coupon_coupon_id_foreign` (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_coupon`
--

LOCK TABLES `product_coupon` WRITE;
/*!40000 ALTER TABLE `product_coupon` DISABLE KEYS */;
INSERT INTO `product_coupon` VALUES (2,10,1,'2',NULL,'2019-12-10 09:07:37','2019-12-10 09:07:37'),(3,6,1,'2',NULL,'2019-12-10 09:09:41','2019-12-10 09:09:41');
/*!40000 ALTER TABLE `product_coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_image` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `image_link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_image_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=410 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (125,38,'/uploads/product/38','original-indian-cotton-three-piece-kota-doria-cotton-1613140317-1.jpg','2',NULL,'2021-02-11 20:31:57',NULL),(126,38,'/uploads/product/38','original-indian-cotton-three-piece-kota-doria-cotton-1613140317-2.jpg','2',NULL,'2021-02-11 20:31:58',NULL),(127,38,'/uploads/product/38','original-indian-cotton-three-piece-kota-doria-cotton-1613140318-3.jpg','2',NULL,'2021-02-11 20:31:58',NULL),(128,38,'/uploads/product/38','original-indian-cotton-three-piece-kota-doria-cotton-1613140318-4.jpg','2',NULL,'2021-02-11 20:31:58',NULL),(129,37,'/uploads/product/37','original-indian-two-piece-1613140414-1.jpg','2',NULL,'2021-02-11 20:33:34',NULL),(130,37,'/uploads/product/37','original-indian-two-piece-1613140414-2.jpg','2',NULL,'2021-02-11 20:33:35',NULL),(131,37,'/uploads/product/37','original-indian-two-piece-1613140415-3.jpg','2',NULL,'2021-02-11 20:33:35',NULL),(132,37,'/uploads/product/37','original-indian-two-piece-1613140415-4.jpg','2',NULL,'2021-02-11 20:33:36',NULL),(133,36,'/uploads/product/36','original-indian-three-piece-lucknowi-chikankari-unstitched-dress-1613140453-1.jpg','2',NULL,'2021-02-11 20:34:13',NULL),(134,36,'/uploads/product/36','original-indian-three-piece-lucknowi-chikankari-unstitched-dress-1613140453-2.jpg','2',NULL,'2021-02-11 20:34:13',NULL),(135,36,'/uploads/product/36','original-indian-three-piece-lucknowi-chikankari-unstitched-dress-1613140453-3.jpg','2',NULL,'2021-02-11 20:34:14',NULL),(136,36,'/uploads/product/36','original-indian-three-piece-lucknowi-chikankari-unstitched-dress-1613140454-4.jpg','2',NULL,'2021-02-11 20:34:14',NULL),(137,35,'/uploads/product/35','embroidered-kota-three-pc-suit-1613140496-1.jpg','2',NULL,'2021-02-11 20:34:56',NULL),(138,35,'/uploads/product/35','embroidered-kota-three-pc-suit-1613140496-2.jpg','2',NULL,'2021-02-11 20:34:56',NULL),(139,35,'/uploads/product/35','embroidered-kota-three-pc-suit-1613140496-3.jpg','2',NULL,'2021-02-11 20:34:57',NULL),(140,35,'/uploads/product/35','embroidered-kota-three-pc-suit-1613140497-4.jpg','2',NULL,'2021-02-11 20:34:57',NULL),(141,35,'/uploads/product/35','embroidered-kota-three-pc-suit-1613140497-5.jpg','2',NULL,'2021-02-11 20:34:58',NULL),(142,34,'/uploads/product/34','table-runner-shotronji-1613140522-1.jpg','2',NULL,'2021-02-11 20:35:23',NULL),(143,34,'/uploads/product/34','table-runner-shotronji-1613140523-2.jpg','2',NULL,'2021-02-11 20:35:23',NULL),(144,34,'/uploads/product/34','table-runner-shotronji-1613140523-3.jpg','2',NULL,'2021-02-11 20:35:23',NULL),(145,31,'/uploads/product/31','rinted-cotton-shirt-with-neck-work-gota-detailing-cotton-lehriya-dupatta-with-gota-detailing-cotton-bottom-1613140618-1.jpg','2',NULL,'2021-02-11 20:36:58',NULL),(146,31,'/uploads/product/31','rinted-cotton-shirt-with-neck-work-gota-detailing-cotton-lehriya-dupatta-with-gota-detailing-cotton-bottom-1613140618-2.jpg','2',NULL,'2021-02-11 20:36:59',NULL),(147,31,'/uploads/product/31','rinted-cotton-shirt-with-neck-work-gota-detailing-cotton-lehriya-dupatta-with-gota-detailing-cotton-bottom-1613140619-3.jpg','2',NULL,'2021-02-11 20:36:59',NULL),(148,30,'/uploads/product/30','cotton-printed-shirt-with-mirror-detailing-embroidered-chiffon-dupatta-cotton-bottom-1613140644-1.jpg','2',NULL,'2021-02-11 20:37:24',NULL),(149,30,'/uploads/product/30','cotton-printed-shirt-with-mirror-detailing-embroidered-chiffon-dupatta-cotton-bottom-1613140644-2.jpg','2',NULL,'2021-02-11 20:37:25',NULL),(150,30,'/uploads/product/30','cotton-printed-shirt-with-mirror-detailing-embroidered-chiffon-dupatta-cotton-bottom-1613140645-3.jpg','2',NULL,'2021-02-11 20:37:25',NULL),(151,29,'/uploads/product/29','fine-cotton-embroided-dress-1613140684-1.jpg','2',NULL,'2021-02-11 20:38:05',NULL),(152,28,'/uploads/product/28','top-pure-cotton-designer-shirt-stripes-prints-thread-embroidery-1613140724-1.jpg','2',NULL,'2021-02-11 20:38:44',NULL),(153,28,'/uploads/product/28','top-pure-cotton-designer-shirt-stripes-prints-thread-embroidery-1613140724-2.jpg','2',NULL,'2021-02-11 20:38:44',NULL),(154,28,'/uploads/product/28','top-pure-cotton-designer-shirt-stripes-prints-thread-embroidery-1613140724-3.jpg','2',NULL,'2021-02-11 20:38:45',NULL),(155,28,'/uploads/product/28','top-pure-cotton-designer-shirt-stripes-prints-thread-embroidery-1613140725-4.jpg','2',NULL,'2021-02-11 20:38:45',NULL),(156,27,'/uploads/product/27','chundri-1613140784-1.jpg','2',NULL,'2021-02-11 20:39:44',NULL),(157,27,'/uploads/product/27','chundri-1613140784-2.jpg','2',NULL,'2021-02-11 20:39:45',NULL),(158,27,'/uploads/product/27','chundri-1613140785-3.jpg','2',NULL,'2021-02-11 20:39:45',NULL),(159,26,'/uploads/product/26','screen-print-dress-1613140829-1.jpg','2',NULL,'2021-02-11 20:40:30',NULL),(160,26,'/uploads/product/26','screen-print-dress-1613140830-2.jpg','2',NULL,'2021-02-11 20:40:30',NULL),(161,26,'/uploads/product/26','screen-print-dress-1613140830-3.jpg','2',NULL,'2021-02-11 20:40:30',NULL),(162,25,'/uploads/product/25','2-in-1-go-potty-baby-travel-toilet-seat-1613140862-1.png','2',NULL,'2021-02-11 20:41:03',NULL),(163,24,'/uploads/product/24','baby-rocking-bouncer-balance-soft-1613140882-1.png','2',NULL,'2021-02-11 20:41:23',NULL),(164,23,'/uploads/product/23','baby-dress-1613140898-1.png','2',NULL,'2021-02-11 20:41:38',NULL),(165,22,'/uploads/product/22','artificial-leather-china-crossbody-stylish-bag-1613140911-1.jpg','2',NULL,'2021-02-11 20:41:52',NULL),(166,21,'/uploads/product/21','artificial-leather-messenger-shoulder-bag-handbag-crossbody-1613140925-1.jpg','2',NULL,'2021-02-11 20:42:05',NULL),(167,20,'/uploads/product/20','simple-and-comfortable-for-summer-1613140940-1.jpg','2',NULL,'2021-02-11 20:42:20',NULL),(168,19,'/uploads/product/19','kameez-lawn-with-2-yoke-ferdaus-pakistani-1613140962-1.jpg','2',NULL,'2021-02-11 20:42:43',NULL),(169,19,'/uploads/product/19','kameez-lawn-with-2-yoke-ferdaus-pakistani-1613140963-2.jpg','2',NULL,'2021-02-11 20:42:43',NULL),(170,18,'/uploads/product/18','bright-story-pcs-unstitch-1613140998-1.jpg','2',NULL,'2021-02-11 20:43:19',NULL),(171,17,'/uploads/product/17','pakistani-brand-ferdaus-1613141017-1.jpg','2',NULL,'2021-02-11 20:43:37',NULL),(172,16,'/uploads/product/16','single-piece-new-collection-1613141120-1.jpg','2',NULL,'2021-02-11 20:45:21',NULL),(174,15,'/uploads/product/15','johra-pinks-pakistani-brand-03-1613141164-2.jpg','2',NULL,'2021-02-11 20:46:05',NULL),(175,15,'/uploads/product/15','johra-pinks-pakistani-brand-03-1613141191-1.jpg','2',NULL,'2021-02-11 20:46:32',NULL),(176,14,'/uploads/product/14','johra-pinks-pakistani-brand-02-1613141220-1.jpg','2',NULL,'2021-02-11 20:47:00',NULL),(177,14,'/uploads/product/14','johra-pinks-pakistani-brand-02-1613141220-2.jpg','2',NULL,'2021-02-11 20:47:01',NULL),(178,13,'/uploads/product/13','johra-pinks-pakistani-brand-1613141256-1.jpg','2',NULL,'2021-02-11 20:47:37',NULL),(179,13,'/uploads/product/13','johra-pinks-pakistani-brand-1613141257-2.jpg','2',NULL,'2021-02-11 20:47:37',NULL),(180,12,'/uploads/product/12','serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-100-luxury-collection-1613141272-1.jpg','2',NULL,'2021-02-11 20:47:52',NULL),(181,10,'/uploads/product/10','serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-100-1613141299-1.jpg','2',NULL,'2021-02-11 20:48:20',NULL),(182,9,'/uploads/product/9','serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-1613141327-1.jpg','2',NULL,'2021-02-11 20:48:47',NULL),(183,8,'/uploads/product/8','azureu20f-morningformal-luxury-collection-1613141345-1.jpg','2',NULL,'2021-02-11 20:49:06',NULL),(184,7,'/uploads/product/7','azure-embroidered-chiffonformal-luxury-collection-1613141362-1.jpg','2',NULL,'2021-02-11 20:49:23',NULL),(185,6,'/uploads/product/6','azure-embroidered-net-unstitched-kurties-azu20ormal-luxury-collection-1613141377-1.jpg','2',NULL,'2021-02-11 20:49:38',NULL),(186,5,'/uploads/product/5','strive-shoulder-pack-2-1613141416-1.jpg','2',NULL,'2021-02-11 20:50:17',NULL),(187,4,'/uploads/product/4','wayfarer-messenger-bag-1613141429-1.jpg','2',NULL,'2021-02-11 20:50:30',NULL),(188,3,'/uploads/product/3','crown-summit-backpack-1613141446-1.jpg','2',NULL,'2021-02-11 20:50:47',NULL),(189,2,'/uploads/product/2','strive-shoulder-pack-1613141460-1.jpg','2',NULL,'2021-02-11 20:51:01',NULL),(190,1,'/uploads/product/1','joust-duffle-bag-1613141474-1.jpg','2',NULL,'2021-02-11 20:51:15',NULL),(191,32,'/uploads/product/32','comfortable-stylish-gown-kurti-lilen-1613141610-1.jpg','2',NULL,'2021-02-11 20:53:31',NULL),(192,40,'/uploads/product/40','cotton-kameez-set-1-1613142204-1.jpg','7',NULL,'2021-02-11 21:03:24',NULL),(193,39,'/uploads/product/39','cotton-kameez-set-1613142234-1.jpg','7',NULL,'2021-02-11 21:03:54',NULL),(194,41,'/uploads/product/41','-1613367995-1.jpg','11',NULL,'2021-02-15 11:46:40',NULL),(195,50,'/uploads/product/50','100-cotton-1613478625-1.jpeg','13',NULL,'2021-02-16 18:30:31',NULL),(196,50,'/uploads/product/50','100-cotton-1613478679-1.jpeg','13',NULL,'2021-02-16 18:31:20',NULL),(197,50,'/uploads/product/50','100-cotton-1613478705-1.jpeg','13',NULL,'2021-02-16 18:31:45',NULL),(198,50,'/uploads/product/50','100-cotton-1613478729-1.jpeg','13',NULL,'2021-02-16 18:32:09',NULL),(199,54,'/uploads/product/54','100-cotton-01-1613480598-1.jpeg','13',NULL,'2021-02-16 07:03:19',NULL),(200,54,'/uploads/product/54','100-cotton-01-1613480645-1.jpeg','13',NULL,'2021-02-16 07:04:06',NULL),(201,54,'/uploads/product/54','100-cotton-01-1613480672-1.jpeg','13',NULL,'2021-02-16 07:04:32',NULL),(202,54,'/uploads/product/54','100-cotton-01-1613480710-1.jpeg','13',NULL,'2021-02-16 07:05:13',NULL),(203,56,'/uploads/product/56','100-cotton-21-1613482181-1.jpeg','13',NULL,'2021-02-16 07:29:49',NULL),(205,56,'/uploads/product/56','100-cotton-21-1613482696-1.jpeg','13',NULL,'2021-02-16 07:38:17',NULL),(206,57,'/uploads/product/57','indian-dress-1613492266-1.jpg','2',NULL,'2021-02-16 10:17:49',NULL),(208,58,'/uploads/product/58','mercedesamg-gla--matic-1613655288-afshini.jpg','2',NULL,'2021-02-18 07:34:53',NULL),(209,59,'/uploads/product/59','gift-product-1613706751-afshini.jpg','2',NULL,'2021-02-19 09:52:35',NULL),(210,60,'/uploads/product/60','100-cotton-indian-dress-1613711820-afshini.jpeg','13',NULL,'2021-02-19 11:17:04',NULL),(211,64,'/uploads/product/64','indian-dress 01-1613712873-afshini.jpeg','13',NULL,'2021-02-19 11:34:36',NULL),(212,64,'/uploads/product/64','indian-dress 01-1613713067-1.jpeg','13',NULL,'2021-02-19 11:37:48',NULL),(213,64,'/uploads/product/64','indian-dress 01-1613713622-1.jpeg','13',NULL,'2021-02-19 11:47:03',NULL),(214,64,'/uploads/product/64','indian-dress 01-1613713634-1.jpeg','13',NULL,'2021-02-19 11:47:15',NULL),(216,66,'/uploads/product/66','Cotton 002-1613714743-afshini.jpeg','13',NULL,'2021-02-19 12:05:44',NULL),(217,68,'/uploads/product/68','indian-dress-2021-2-19-14-31-9-1613723531-afshini.jpg','2',NULL,'2021-02-19 14:32:17',NULL),(220,69,'/uploads/product/69','indian-auto-pc-2021-2-20-16-47-40-1613818503-2.jpg','2',NULL,'2021-02-20 16:55:04',NULL),(221,69,'/uploads/product/69','indian-auto-pc-2021-2-20-16-47-40-1613818557-1.jpg','2',NULL,'2021-02-20 16:56:02',NULL),(222,69,'/uploads/product/69','indian-auto-pc-2021-2-20-16-47-40-1613818612-1.jpg','2',NULL,'2021-02-20 16:56:58',NULL),(223,69,'/uploads/product/69','indian-auto-pc-2021-2-20-16-47-40-1613818684-1.jpg','2',NULL,'2021-02-20 16:58:06',NULL),(224,70,'/uploads/product/70','-1613887620-afshini.jpg','13',NULL,'2021-02-21 12:07:05',NULL),(225,70,'/uploads/product/70','-1613887684-1.jpg','13',NULL,'2021-02-21 12:08:05',NULL),(226,71,'/uploads/product/71','original-indian-dress-2021-2-21-12-13-31-1613888117-afshini.jpg','13',NULL,'2021-02-21 12:15:17',NULL),(229,76,'/uploads/product/76','indian-saree-2021-2-21-13-39-41-1613893233-afshini.jpg','16',NULL,'2021-02-21 13:40:38',NULL),(234,78,'/uploads/product/78','-1614246611-afshini.jpg','2',NULL,'2021-02-25 15:50:18',NULL),(235,78,'/uploads/product/78','-1614246663-1.jpg','2',NULL,'2021-02-25 15:51:04',NULL),(236,78,'/uploads/product/78','-1614246722-1.jpg','2',NULL,'2021-02-25 15:52:03',NULL),(237,78,'/uploads/product/78','-1614246758-1.jpg','2',NULL,'2021-02-25 15:52:39',NULL),(238,79,'/uploads/product/79','dress-2021225174617-1614253686-afshini.jpg','17',NULL,'2021-02-25 17:48:11',NULL),(239,79,'/uploads/product/79','dress-2021225174617-1614254062-1.jpg','17',NULL,'2021-02-25 17:54:28',NULL),(240,77,'/uploads/product/77','organdy-cotton-with-fine-embroidery-2021225184257-1614257540-1.jpg','2',NULL,'2021-02-25 18:52:25',NULL),(241,80,'/uploads/product/80','saree-202122518559-1614257785-afshini.jpg','17',NULL,'2021-02-25 18:56:25',NULL),(242,75,'/uploads/product/75','original-indian-dress-2021-2-21-12-15-33-1614257922-1.jpg','13',NULL,'2021-02-25 18:58:43',NULL),(243,81,'/uploads/product/81','saree-2021225235719-1614276176-afshini.jpg','17',NULL,'2021-02-25 12:03:01',NULL),(244,82,'/uploads/product/82','saree-2021226035-1614276343-afshini.jpg','17',NULL,'2021-02-25 12:05:43',NULL),(245,83,'/uploads/product/83','-1614276697-afshini.jpg','17',NULL,'2021-02-25 12:11:40',NULL),(246,83,'/uploads/product/83','-1614276772-1.jpg','17',NULL,'2021-02-25 12:12:52',NULL),(247,84,'/uploads/product/84','saree-202122601327-1614277106-afshini.jpg','17',NULL,'2021-02-25 12:18:29',NULL),(248,85,'/uploads/product/85','dress-202122602512-1614277789-afshini.jpg','17',NULL,'2021-02-25 12:29:53',NULL),(249,86,'/uploads/product/86','dress-202122602954-1614278165-afshini.jpg','17',NULL,'2021-02-25 12:36:10',NULL),(250,87,'/uploads/product/87','saree-202122603626-1614278376-afshini.jpg','17',NULL,'2021-02-25 12:39:37',NULL),(251,88,'/uploads/product/88','couple-set-20213805055-1615143367-afshini.jpeg','2',NULL,'2021-03-07 12:56:12',NULL),(252,88,'/uploads/product/88','couple-set-20213805055-1615143427-1.jpeg','2',NULL,'2021-03-07 12:57:07',NULL),(253,88,'/uploads/product/88','couple-set-20213805055-1615143466-1.jpeg','2',NULL,'2021-03-07 12:57:46',NULL),(254,89,'/uploads/product/89','afsan-silk--piece-20213814230-1615146370-afshini.jpeg','2',NULL,'2021-03-07 13:46:15',NULL),(255,89,'/uploads/product/89','afsan-silk--piece-20213814230-1615146426-1.jpeg','2',NULL,'2021-03-07 13:47:06',NULL),(256,89,'/uploads/product/89','afsan-silk--piece-20213814230-1615146448-1.jpeg','2',NULL,'2021-03-07 13:47:29',NULL),(257,89,'/uploads/product/89','afsan-silk--piece-20213814230-1615146467-1.jpeg','2',NULL,'2021-03-07 13:47:47',NULL),(258,89,'/uploads/product/89','afsan-silk--piece-20213814230-1615146493-1.jpeg','2',NULL,'2021-03-07 13:48:13',NULL),(259,89,'/uploads/product/89','afsan-silk--piece-20213814230-1615146515-1.jpeg','2',NULL,'2021-03-07 13:48:35',NULL),(260,90,'/uploads/product/90','cotton--piece-2021381547-1615148095-afshini.jpeg','2',NULL,'2021-03-07 14:14:55',NULL),(261,90,'/uploads/product/90','cotton--piece-2021381547-1615148204-1.jpeg','2',NULL,'2021-03-07 14:16:44',NULL),(262,90,'/uploads/product/90','cotton--piece-2021381547-1615148246-1.jpeg','2',NULL,'2021-03-07 14:17:27',NULL),(263,90,'/uploads/product/90','cotton--piece-2021381547-1615148278-1.jpeg','2',NULL,'2021-03-07 14:17:58',NULL),(264,90,'/uploads/product/90','cotton--piece-2021381547-1615148356-1.jpeg','2',NULL,'2021-03-07 14:19:17',NULL),(265,90,'/uploads/product/90','cotton--piece-2021381547-1615148380-1.jpeg','2',NULL,'2021-03-07 14:19:40',NULL),(266,90,'/uploads/product/90','cotton--piece-2021381547-1615148422-1.jpeg','2',NULL,'2021-03-07 14:20:22',NULL),(267,90,'/uploads/product/90','cotton--piece-2021381547-1615148470-1.jpeg','2',NULL,'2021-03-07 14:21:10',NULL),(268,90,'/uploads/product/90','cotton--piece-2021381547-1615148495-1.jpeg','2',NULL,'2021-03-07 14:21:35',NULL),(269,90,'/uploads/product/90','cotton--piece-2021381547-1615148528-1.jpeg','2',NULL,'2021-03-07 14:22:09',NULL),(270,90,'/uploads/product/90','cotton--piece-2021381547-1615148552-1.jpeg','2',NULL,'2021-03-07 14:22:32',NULL),(271,90,'/uploads/product/90','cotton--piece-2021381547-1615148600-1.jpeg','2',NULL,'2021-03-07 14:23:20',NULL),(272,90,'/uploads/product/90','cotton--piece-2021381547-1615148629-1.jpeg','2',NULL,'2021-03-07 14:23:49',NULL),(273,90,'/uploads/product/90','cotton--piece-2021381547-1615148665-1.jpeg','2',NULL,'2021-03-07 14:24:26',NULL),(274,91,'/uploads/product/91','bridal-or-party-khimar-20213824222-1615149997-afshini.jpeg','2',NULL,'2021-03-07 14:46:38',NULL),(275,91,'/uploads/product/91','bridal-or-party-khimar-20213824222-1615150024-1.jpeg','2',NULL,'2021-03-07 14:47:04',NULL),(276,91,'/uploads/product/91','bridal-or-party-khimar-20213824222-1615150044-1.jpeg','2',NULL,'2021-03-07 14:47:25',NULL),(278,91,'/uploads/product/91','bridal-or-party-khimar-20213824222-1615150095-1.jpeg','2',NULL,'2021-03-07 14:48:15',NULL),(279,92,'/uploads/product/92','bridal---party-khimar-20213825253-1615150541-afshini.jpeg','2',NULL,'2021-03-07 14:55:42',NULL),(280,92,'/uploads/product/92','bridal---party-khimar-20213825253-1615150571-1.jpeg','2',NULL,'2021-03-07 14:56:12',NULL),(281,92,'/uploads/product/92','bridal---party-khimar-20213825253-1615150600-1.jpeg','2',NULL,'2021-03-07 14:56:41',NULL),(282,92,'/uploads/product/92','bridal---party-khimar-20213825253-1615150621-1.jpeg','2',NULL,'2021-03-07 14:57:01',NULL),(283,93,'/uploads/product/93','party--bridal-khimar-20213825932-1615150915-afshini.jpeg','2',NULL,'2021-03-07 15:01:55',NULL),(284,93,'/uploads/product/93','party--bridal-khimar-20213825932-1615150970-1.jpeg','2',NULL,'2021-03-07 15:02:50',NULL),(285,93,'/uploads/product/93','party--bridal-khimar-20213825932-1615150999-1.jpeg','2',NULL,'2021-03-07 15:03:19',NULL),(286,93,'/uploads/product/93','party--bridal-khimar-20213825932-1615151020-1.jpeg','2',NULL,'2021-03-07 15:03:40',NULL),(287,94,'/uploads/product/94','----202138359-1615151257-afshini.jpeg','2',NULL,'2021-03-07 15:07:37',NULL),(288,94,'/uploads/product/94','----202138359-1615151299-1.jpeg','2',NULL,'2021-03-07 15:08:19',NULL),(289,94,'/uploads/product/94','----202138359-1615151323-1.jpeg','2',NULL,'2021-03-07 15:08:43',NULL),(290,94,'/uploads/product/94','----202138359-1615151343-1.jpeg','2',NULL,'2021-03-07 15:09:04',NULL),(291,101,'/uploads/product/101','desgiener-orgenza-fabric-saree-202131402640-1615660350-afshini.jpeg','2',NULL,'2021-03-13 12:32:35',NULL),(292,101,'/uploads/product/101','desgiener-orgenza-fabric-saree-202131402640-1615660415-1.jpeg','2',NULL,'2021-03-13 12:33:40',NULL),(293,101,'/uploads/product/101','desgiener-orgenza-fabric-saree-202131402640-1615660442-1.jpeg','2',NULL,'2021-03-13 12:34:03',NULL),(294,101,'/uploads/product/101','desgiener-orgenza-fabric-saree-202131402640-1615660499-1.jpeg','2',NULL,'2021-03-13 12:35:00',NULL),(295,102,'/uploads/product/102','pure-rangoli-fabric-sharee-2021315173559-1615808498-afshini.jpeg','2',NULL,'2021-03-15 16:41:43',NULL),(296,102,'/uploads/product/102','pure-rangoli-fabric-sharee-2021315173559-1615808546-1.jpeg','2',NULL,'2021-03-15 16:42:27',NULL),(297,103,'/uploads/product/103','diamond-jorjet-kaftan-2021317182922-1615984215-afshini.jpg','2',NULL,'2021-03-17 17:30:20',NULL),(298,103,'/uploads/product/103','diamond-jorjet-kaftan-2021317182922-1615984242-1.jpg','2',NULL,'2021-03-17 17:30:43',NULL),(299,103,'/uploads/product/103','diamond-jorjet-kaftan-2021317182922-1615984243-2.jpg','2',NULL,'2021-03-17 17:30:43',NULL),(300,104,'/uploads/product/104','saree-georgette-with-lace--2021317183240-1615984521-afshini.jpg','2',NULL,'2021-03-17 17:35:27',NULL),(301,104,'/uploads/product/104','saree-georgette-with-lace--2021317183240-1615984552-1.jpg','2',NULL,'2021-03-17 17:35:52',NULL),(302,104,'/uploads/product/104','saree-georgette-with-lace--2021317183240-1615984552-2.jpg','2',NULL,'2021-03-17 17:35:53',NULL),(303,105,'/uploads/product/105','kurti-fabric--havy-1-kg-rayon-with-mirror-work-2021317183720-1615984829-afshini.jpg','2',NULL,'2021-03-17 17:40:29',NULL),(304,105,'/uploads/product/105','kurti-fabric--havy-1-kg-rayon-with-mirror-work-2021317183720-1615984841-1.jpg','2',NULL,'2021-03-17 17:40:41',NULL),(305,106,'/uploads/product/106','exclusive-dress-material-suit--for-women-2021317184411-1615985724-afshini.jpg','2',NULL,'2021-03-17 17:55:28',NULL),(306,106,'/uploads/product/106','exclusive-dress-material-suit--for-women-2021317184411-1615985844-1.jpg','2',NULL,'2021-03-17 17:57:24',NULL),(307,106,'/uploads/product/106','exclusive-dress-material-suit--for-women-2021317184411-1615985844-2.jpg','2',NULL,'2021-03-17 17:57:25',NULL),(308,106,'/uploads/product/106','exclusive-dress-material-suit--for-women-2021317184411-1615985845-3.jpg','2',NULL,'2021-03-17 17:57:25',NULL),(309,107,'/uploads/product/107','kurti-with-palazzo-2021317185948-1615986253-afshini.jpg','2',NULL,'2021-03-17 06:04:26',NULL),(310,107,'/uploads/product/107','kurti-with-palazzo-2021317185948-1615986349-1.jpg','2',NULL,'2021-03-17 06:05:50',NULL),(311,107,'/uploads/product/107','kurti-with-palazzo-2021317185948-1615986350-2.jpg','2',NULL,'2021-03-17 06:05:50',NULL),(312,108,'/uploads/product/108','exclusive-dress-material-suit--for-women-202131719833-1615986821-afshini.jpg','2',NULL,'2021-03-17 06:13:46',NULL),(313,109,'/uploads/product/109','bd-stich-semi-stich-four-pcs-2021317191617-1615987171-afshini.jpg','2',NULL,'2021-03-17 06:19:36',NULL),(314,109,'/uploads/product/109','bd-stich-semi-stich-four-pcs-2021317191617-1615987219-1.jpg','2',NULL,'2021-03-17 06:20:25',NULL),(315,109,'/uploads/product/109','bd-stich-semi-stich-four-pcs-2021317191617-1615987226-2.jpg','2',NULL,'2021-03-17 06:20:28',NULL),(316,109,'/uploads/product/109','bd-stich-semi-stich-four-pcs-2021317191617-1615987228-3.jpg','2',NULL,'2021-03-17 06:20:29',NULL),(317,110,'/uploads/product/110','gorgeous-three-piece-2021317192346-1615987509-afshini.jpg','2',NULL,'2021-03-17 06:25:14',NULL),(319,110,'/uploads/product/110','gorgeous-three-piece-2021317192346-1615987546-2.jpg','2',NULL,'2021-03-17 06:25:48',NULL),(320,111,'/uploads/product/111','chary-jorje-bourka-202131719266-1615987946-afshini.jpg','2',NULL,'2021-03-17 06:32:31',NULL),(321,112,'/uploads/product/112','bd-pc-2021317194429-1615988744-afshini.jpg','2',NULL,'2021-03-17 06:45:48',NULL),(322,112,'/uploads/product/112','bd-pc-2021317194429-1615988778-1.jpg','2',NULL,'2021-03-17 06:46:19',NULL),(323,112,'/uploads/product/112','bd-pc-2021317194429-1615988779-2.jpg','2',NULL,'2021-03-17 06:46:20',NULL),(324,112,'/uploads/product/112','bd-pc-2021317194429-1615988780-3.jpg','2',NULL,'2021-03-17 06:46:20',NULL),(325,113,'/uploads/product/113','organza-silk-saree--in-light-tulip-pinkish-2021317194718-1615989003-afshini.jpg','2',NULL,'2021-03-17 06:50:03',NULL),(326,113,'/uploads/product/113','organza-silk-saree--in-light-tulip-pinkish-2021317194718-1615989032-1.jpg','2',NULL,'2021-03-17 06:50:32',NULL),(327,113,'/uploads/product/113','organza-silk-saree--in-light-tulip-pinkish-2021317194718-1615989032-2.jpg','2',NULL,'2021-03-17 06:50:33',NULL),(328,113,'/uploads/product/113','organza-silk-saree--in-light-tulip-pinkish-2021317194718-1615989033-3.jpg','2',NULL,'2021-03-17 06:50:33',NULL),(329,113,'/uploads/product/113','organza-silk-saree--in-light-tulip-pinkish-2021317194718-1615989033-4.jpg','2',NULL,'2021-03-17 06:50:33',NULL),(330,114,'/uploads/product/114','unstitched-indian-resika-silk-three-piece-2021317195053-1615989511-afshini.jpg','2',NULL,'2021-03-17 06:58:31',NULL),(331,115,'/uploads/product/115','unstitched-indian-resika-silk-three-piece-2021317195856-1615989571-afshini.jpg','2',NULL,'2021-03-17 06:59:31',NULL),(332,116,'/uploads/product/116','resika-silk-three-piece-2021317195944-1615989618-afshini.jpg','2',NULL,'2021-03-17 07:00:19',NULL),(333,115,'/uploads/product/115','unstitched-indian-resika-silk-three-piece-2021317195856-1615989714-1.jpg','2',NULL,'2021-03-17 07:01:54',NULL),(334,115,'/uploads/product/115','unstitched-indian-resika-silk-three-piece-2021317195856-1615989714-2.jpg','2',NULL,'2021-03-17 07:01:55',NULL),(335,115,'/uploads/product/115','unstitched-indian-resika-silk-three-piece-2021317195856-1615989715-3.jpg','2',NULL,'2021-03-17 07:01:55',NULL),(336,116,'/uploads/product/116','resika-silk-three-piece-2021317195944-1615989836-1.jpg','2',NULL,'2021-03-17 07:03:58',NULL),(337,116,'/uploads/product/116','resika-silk-three-piece-2021317195944-1615989838-2.jpg','2',NULL,'2021-03-17 07:03:59',NULL),(338,116,'/uploads/product/116','resika-silk-three-piece-2021317195944-1615989839-3.jpg','2',NULL,'2021-03-17 07:03:59',NULL),(339,117,'/uploads/product/117','indian-resika-silk-three-piece-20213172048-1615989950-afshini.jpg','2',NULL,'2021-03-17 07:05:51',NULL),(340,117,'/uploads/product/117','indian-resika-silk-three-piece-20213172048-1615989999-1.jpg','2',NULL,'2021-03-17 07:06:39',NULL),(341,117,'/uploads/product/117','indian-resika-silk-three-piece-20213172048-1615989999-2.jpg','2',NULL,'2021-03-17 07:06:40',NULL),(342,117,'/uploads/product/117','indian-resika-silk-three-piece-20213172048-1615990000-3.jpg','2',NULL,'2021-03-17 07:06:40',NULL),(343,118,'/uploads/product/118','gorgeous-royalsilk-skirt-with-tops-2021322111319-1616417548-afshini.jpg','18','1','2021-03-21 13:52:13','2021-03-22 17:52:33'),(344,119,'/uploads/product/119','----2021324174158-1616586982-afshini.jpg','2',NULL,'2021-03-24 16:56:28',NULL),(345,120,'/uploads/product/120','kamij-biscos-2021324175639-1616587044-afshini.jpg','2',NULL,'2021-03-24 16:57:25',NULL),(346,121,'/uploads/product/121','moslin-tissu--piece-2021324175732-1616587146-afshini.jpg','2',NULL,'2021-03-24 16:59:13',NULL),(347,119,'/uploads/product/119','----2021324174158-1616587462-1.jpg','2',NULL,'2021-03-24 17:04:27',NULL),(348,119,'/uploads/product/119','----2021324174158-1616587467-2.jpg','2',NULL,'2021-03-24 17:04:28',NULL),(349,122,'/uploads/product/122','screenprint-cotton--pcs-2021325121821-1616653263-afshini.jpg','2',NULL,'2021-03-25 11:21:08',NULL),(350,123,'/uploads/product/123','screenprint-cotton--pcs-2021325122132-1616653421-afshini.jpg','2',NULL,'2021-03-25 11:23:41',NULL),(351,124,'/uploads/product/124','gorgeous-table-runner-2021325122445-1616653925-afshini.jpg','2',NULL,'2021-03-25 11:32:10',NULL),(352,124,'/uploads/product/124','gorgeous-table-runner-2021325122445-1616653999-1.jpg','2',NULL,'2021-03-25 11:33:24',NULL),(353,124,'/uploads/product/124','gorgeous-table-runner-2021325122445-1616654004-2.jpg','2',NULL,'2021-03-25 11:33:25',NULL),(354,124,'/uploads/product/124','gorgeous-table-runner-2021325122445-1616654005-3.jpg','2',NULL,'2021-03-25 11:33:25',NULL),(355,124,'/uploads/product/124','gorgeous-table-runner-2021325122445-1616654005-4.jpg','2',NULL,'2021-03-25 11:33:25',NULL),(356,125,'/uploads/product/125','dupattas--shawls-2021325132438-1616657321-afshini.jpg','2',NULL,'2021-03-25 12:28:45',NULL),(357,125,'/uploads/product/125','dupattas--shawls-2021325132438-1616657351-1.jpg','2',NULL,'2021-03-25 12:29:17',NULL),(358,126,'/uploads/product/126','unstitched-cotton-dress-2021325133025-1616657494-afshini.jpg','2',NULL,'2021-03-25 12:31:38',NULL),(359,127,'/uploads/product/127','---2021325133457-1616657730-afshini.jpg','2',NULL,'2021-03-25 12:35:35',NULL),(360,127,'/uploads/product/127','---2021325133457-1616657762-1.jpg','2',NULL,'2021-03-25 12:36:02',NULL),(361,127,'/uploads/product/127','---2021325133457-1616657762-2.jpg','2',NULL,'2021-03-25 12:36:05',NULL),(362,127,'/uploads/product/127','---2021325133457-1616657765-3.jpg','2',NULL,'2021-03-25 12:36:05',NULL),(363,128,'/uploads/product/128','vijay-laxmi-sana-silk-202132513372-1616658149-afshini.jpg','2',NULL,'2021-03-25 12:42:42',NULL),(364,128,'/uploads/product/128','vijay-laxmi-sana-silk-202132513372-1616658205-1.jpg','2',NULL,'2021-03-25 12:43:26',NULL),(365,128,'/uploads/product/128','vijay-laxmi-sana-silk-202132513372-1616658206-2.jpg','2',NULL,'2021-03-25 12:43:26',NULL),(366,129,'/uploads/product/129','black--kanchipuram-silk-sarees-2021325134351-1616658427-afshini.jpg','2',NULL,'2021-03-25 12:47:13',NULL),(367,129,'/uploads/product/129','black--kanchipuram-silk-sarees-2021325134351-1616658507-1.jpg','2',NULL,'2021-03-25 12:48:34',NULL),(368,129,'/uploads/product/129','black--kanchipuram-silk-sarees-2021325134351-1616658514-2.jpg','2',NULL,'2021-03-25 12:48:34',NULL),(369,129,'/uploads/product/129','black--kanchipuram-silk-sarees-2021325134351-1616658514-3.jpg','2',NULL,'2021-03-25 12:48:35',NULL),(370,130,'/uploads/product/130','organza-silk-saree-with-lucknowi--2021325134912-1616658679-afshini.jpg','2',NULL,'2021-03-25 12:51:23',NULL),(371,130,'/uploads/product/130','organza-silk-saree-with-lucknowi--2021325134912-1616658711-1.jpg','2',NULL,'2021-03-25 12:51:57',NULL),(372,132,'/uploads/product/132','organza-silk-saree-with-lucknowi-2021325135611-1616659059-afshini.jpg','2',NULL,'2021-03-25 12:57:44',NULL),(373,132,'/uploads/product/132','organza-silk-saree-with-lucknowi-2021325135611-1616659101-1.jpg','2',NULL,'2021-03-25 12:58:22',NULL),(374,133,'/uploads/product/133','casual-indian-dress-which-has--pieces-2021325135833-1616659396-afshini.jpg','2',NULL,'2021-03-25 13:03:21',NULL),(375,134,'/uploads/product/134','casual-indian--pieces--202132514346-1616659514-afshini.jpg','2',NULL,'2021-03-25 13:05:19',NULL),(376,135,'/uploads/product/135','casual-shirt-202132514657-1616660039-afshini.jpg','2',NULL,'2021-03-25 13:14:04',NULL),(377,136,'/uploads/product/136','mens-casual-shirt-long-2021325141430-1616660272-afshini.jpg','2',NULL,'2021-03-25 13:17:57',NULL),(378,136,'/uploads/product/136','mens-casual-shirt-long-2021325141430-1616660349-1.jpg','2',NULL,'2021-03-25 13:19:10',NULL),(379,136,'/uploads/product/136','mens-casual-shirt-long-2021325141430-1616660350-2.jpg','2',NULL,'2021-03-25 13:19:10',NULL),(380,137,'/uploads/product/137','chanderi-with-seqvens-work-2021326125833-1616742491-afshini.jpg','2',NULL,'2021-03-26 12:08:16',NULL),(381,137,'/uploads/product/137','chanderi-with-seqvens-work-2021326125833-1616742566-1.jpg','2',NULL,'2021-03-26 12:09:32',NULL),(382,137,'/uploads/product/137','chanderi-with-seqvens-work-2021326125833-1616742572-2.jpg','2',NULL,'2021-03-26 12:09:32',NULL),(383,137,'/uploads/product/137','chanderi-with-seqvens-work-2021326125833-1616742572-3.jpg','2',NULL,'2021-03-26 12:09:33',NULL),(384,138,'/uploads/product/138','moslin-tissu--pis-2021326131125-1616742724-afshini.jpg','2',NULL,'2021-03-26 12:12:05',NULL),(385,138,'/uploads/product/138','moslin-tissu--pis-2021326131125-1616742770-1.jpg','2',NULL,'2021-03-26 12:12:50',NULL),(386,138,'/uploads/product/138','moslin-tissu--pis-2021326131125-1616742770-2.jpg','2',NULL,'2021-03-26 12:12:51',NULL),(387,138,'/uploads/product/138','moslin-tissu--pis-2021326131125-1616742771-3.jpg','2',NULL,'2021-03-26 12:12:51',NULL),(388,139,'/uploads/product/139','moslin-tissu--pis-2021326131256-1616742865-afshini.jpg','2',NULL,'2021-03-26 12:14:25',NULL),(389,140,'/uploads/product/140','original-from-mahaveera-nx-2021326133139-1616743952-afshini.jpg','2',NULL,'2021-03-26 12:32:37',NULL),(390,140,'/uploads/product/140','original-from-mahaveera-nx-2021326133139-1616743977-1.jpg','2',NULL,'2021-03-26 12:32:57',NULL),(391,140,'/uploads/product/140','original-from-mahaveera-nx-2021326133139-1616743977-2.jpg','2',NULL,'2021-03-26 12:32:58',NULL),(392,141,'/uploads/product/141','silk--piece-2021326171948-1616757735-afshini.jpg','2',NULL,'2021-03-26 16:22:20',NULL),(393,141,'/uploads/product/141','silk--piece-2021326171948-1616757798-1.jpg','2',NULL,'2021-03-26 16:23:18',NULL),(394,141,'/uploads/product/141','silk--piece-2021326171948-1616757798-2.jpg','2',NULL,'2021-03-26 16:23:18',NULL),(395,143,'/uploads/product/143','-1617010376-afshini.jpg','17',NULL,'2021-03-29 14:33:01',NULL),(396,144,'/uploads/product/144','dress-2021330103746-1617079293-afshini.jpg','17',NULL,'2021-03-30 09:41:39',NULL),(397,145,'/uploads/product/145','dress-2021330104232-1617079823-afshini.jpg','17',NULL,'2021-03-30 09:50:29',NULL),(398,146,'/uploads/product/146','dress-2021330105548-1617080361-afshini.jpg','17',NULL,'2021-03-30 09:59:23',NULL),(399,147,'/uploads/product/147','dress-20213301107-1617080572-afshini.jpg','17',NULL,'2021-03-30 10:02:57',NULL),(400,148,'/uploads/product/148','dress-202133011242-1617080688-afshini.jpg','17',NULL,'2021-03-30 10:04:49',NULL),(401,149,'/uploads/product/149','pakistani-suit-dress-202133011612-1617080978-afshini.jpg','17',NULL,'2021-03-30 10:09:38',NULL),(402,150,'/uploads/product/150','pakistani-suit-dress-202133011927-1617081102-afshini.jpg','17',NULL,'2021-03-30 10:11:42',NULL),(403,151,'/uploads/product/151','pakistani-suit-dress-2021330111131-1617081218-afshini.jpg','17',NULL,'2021-03-30 10:13:38',NULL),(404,152,'/uploads/product/152','pakistani-suit-dress-2021330111320-1617081323-afshini.jpg','17',NULL,'2021-03-30 10:15:24',NULL),(405,157,'/uploads/product/157','saree-2021330124218-1617086734-afshini.jpg','17',NULL,'2021-03-30 11:45:39',NULL),(406,158,'/uploads/product/158','-1617086916-afshini.jpg','17',NULL,'2021-03-30 11:48:41',NULL),(407,158,'/uploads/product/158','-1617087015-1.jpg','17',NULL,'2021-03-30 11:50:16',NULL),(408,159,'/uploads/product/159','saree-2021330125257-1617087349-afshini.jpg','17',NULL,'2021-03-30 11:55:50',NULL),(409,160,'/uploads/product/160','al-over-sequence-work-saree-2021411124019-1618123340-afshini.jpg','2',NULL,'2021-04-11 00:42:21',NULL);
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_in`
--

DROP TABLE IF EXISTS `product_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_in` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `brand_id` int unsigned DEFAULT NULL,
  `seller_id` int unsigned DEFAULT NULL,
  `product_quantity` double(8,2) NOT NULL COMMENT 'Total product quantity',
  `product_in_date` datetime NOT NULL,
  `color_id` int unsigned DEFAULT NULL,
  `size_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_in_product_id_foreign` (`product_id`),
  KEY `product_in_category_id_foreign` (`category_id`),
  KEY `product_in_brand_id_foreign` (`brand_id`),
  KEY `product_in_seller_id_foreign` (`seller_id`),
  KEY `product_in_color_id_foreign` (`color_id`),
  KEY `product_in_size_id_foreign` (`size_id`),
  CONSTRAINT `product_in_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `product_in_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_in_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `product_in_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `product_in_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_in_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_in`
--

LOCK TABLES `product_in` WRITE;
/*!40000 ALTER TABLE `product_in` DISABLE KEYS */;
INSERT INTO `product_in` VALUES (1,128,13,1,5,8000.00,'2021-11-02 23:34:41',1,1);
/*!40000 ALTER TABLE `product_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_inventory`
--

DROP TABLE IF EXISTS `product_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_inventory` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `warehouse` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_number` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `note_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `brand_id` int unsigned DEFAULT NULL,
  `seller_id` int unsigned DEFAULT NULL,
  `product_in_quantity` double(8,2) DEFAULT NULL COMMENT 'Total product quantity',
  `product_out_quantity` double(8,2) DEFAULT NULL COMMENT 'Total product quantity',
  PRIMARY KEY (`id`),
  KEY `product_inventory_product_id_foreign` (`product_id`),
  KEY `product_inventory_category_id_foreign` (`category_id`),
  KEY `product_inventory_brand_id_foreign` (`brand_id`),
  KEY `product_inventory_seller_id_foreign` (`seller_id`),
  CONSTRAINT `product_inventory_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `product_inventory_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_inventory_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_inventory`
--

LOCK TABLES `product_inventory` WRITE;
/*!40000 ALTER TABLE `product_inventory` DISABLE KEYS */;
INSERT INTO `product_inventory` VALUES (1,1,'self','123','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2019-07-03 19:33:23','2019-07-03 19:33:23',NULL,NULL,NULL,NULL,NULL),(2,2,'self','124','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2019-07-03 19:38:44','2019-07-03 19:38:44',NULL,NULL,NULL,NULL,NULL),(3,3,'self','125','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2019-07-03 19:43:39','2019-07-03 19:43:39',NULL,NULL,NULL,NULL,NULL),(4,4,'self','126','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2019-07-03 19:46:56','2019-07-03 19:46:56',NULL,NULL,NULL,NULL,NULL),(5,5,'self','127','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2019-07-03 19:52:48','2019-07-03 19:52:48',NULL,NULL,NULL,NULL,NULL),(6,6,'self','128','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2019-07-03 19:56:27','2019-07-03 19:56:27',NULL,NULL,NULL,NULL,NULL),(7,7,'self','129','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2019-07-03 19:59:33','2019-07-03 19:59:33',NULL,NULL,NULL,NULL,NULL),(8,8,'self','130','0',NULL,NULL,NULL,NULL,NULL,'2','2','2019-07-03 20:04:47','2020-05-08 16:30:53',NULL,NULL,NULL,NULL,NULL),(9,9,'self','131','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2019-07-03 20:09:32','2019-07-03 20:09:32',NULL,NULL,NULL,NULL,NULL),(10,12,'self','137','0',NULL,NULL,NULL,NULL,NULL,'2','2','2019-11-04 01:01:50','2020-05-07 18:33:51',NULL,NULL,NULL,NULL,NULL),(11,10,'self','133','0',NULL,NULL,NULL,NULL,NULL,'2','2','2019-11-04 01:51:23','2020-05-07 18:43:05',NULL,NULL,NULL,NULL,NULL),(12,13,'self','2001','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-07 01:46:30','2020-06-07 01:46:30',NULL,NULL,NULL,NULL,NULL),(13,14,'self','2002','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-07 01:50:19','2020-06-07 01:50:19',NULL,NULL,NULL,NULL,NULL),(14,15,'self','2003','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-07 01:53:21','2020-06-07 01:53:21',NULL,NULL,NULL,NULL,NULL),(15,16,'self','2004','0',NULL,NULL,NULL,NULL,NULL,'2','1','2020-06-09 10:09:19','2021-03-25 14:22:06',NULL,NULL,NULL,NULL,NULL),(16,17,'self','2005','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-09 10:15:10','2020-06-09 10:15:10',NULL,NULL,NULL,NULL,NULL),(17,18,'self','2006','0',NULL,NULL,NULL,NULL,NULL,'2','2','2020-06-09 10:22:24','2020-06-09 10:22:29',NULL,NULL,NULL,NULL,NULL),(18,19,'self','2007','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-09 10:25:47','2020-06-09 10:25:47',NULL,NULL,NULL,NULL,NULL),(19,20,'self','2008','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-09 10:30:06','2020-06-09 10:30:06',NULL,NULL,NULL,NULL,NULL),(20,21,'self','2011','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-09 21:02:59','2020-06-09 21:02:59',NULL,NULL,NULL,NULL,NULL),(21,22,'self','2012','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-09 21:12:58','2020-06-09 21:12:58',NULL,NULL,NULL,NULL,NULL),(22,23,'self','2009009','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-23 18:35:33','2020-06-23 18:35:33',NULL,NULL,NULL,NULL,NULL),(23,24,'self','2009010','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-23 19:05:51','2020-06-23 19:05:51',NULL,NULL,NULL,NULL,NULL),(24,25,'self','2009011','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-23 19:22:29','2020-06-23 19:22:29',NULL,NULL,NULL,NULL,NULL),(25,26,'self','2006-CSK-006','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-06-24 17:22:16','2020-06-24 17:22:16',NULL,NULL,NULL,NULL,NULL),(26,27,'self','2006-CSK-007','0','https://www.facebook.com/groups/312451886455186/',NULL,NULL,NULL,NULL,'2','2','2020-06-25 20:28:02','2020-07-06 20:35:48',NULL,NULL,NULL,NULL,NULL),(27,29,'self','2006-CSK-008','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-07-02 17:47:56','2020-07-02 17:47:56',NULL,NULL,NULL,NULL,NULL),(28,28,'self','2006-CSK-009','0','Hayat Concept',NULL,NULL,NULL,NULL,'2','1','2020-07-04 22:58:59','2021-03-25 13:52:31',NULL,NULL,NULL,NULL,NULL),(29,30,'self','2006-CSK-010','0','* Cotton Printed Shirt with Mirror Detailing*\r\n*Embroidered Chiffon Dupatta*\r\n* Cotton Bottom*',NULL,NULL,NULL,NULL,'2','1','2020-07-05 01:03:01','2021-03-25 13:35:20',NULL,NULL,NULL,NULL,NULL),(30,31,'self','2006-CSK-011','0',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2020-07-06 18:53:40','2020-07-06 18:53:40',NULL,NULL,NULL,NULL,NULL),(31,32,'self','2020-gf-0001','0','Rebeka Sultana\r\n Buy and Sell Center\r\n6-7-2020\r\nGawon kurti\r\n1,000  · Dhaka\r\nGown kurti',NULL,NULL,NULL,NULL,'2','2','2020-07-06 19:15:14','2021-03-20 12:02:51',NULL,NULL,NULL,NULL,NULL),(32,34,'self','2020-str-0001','1','https://www.facebook.com/ShatranjiCraft.Official/',NULL,NULL,NULL,NULL,'2','2','2020-07-07 19:13:11','2021-03-20 12:02:41',NULL,NULL,NULL,NULL,NULL),(33,35,'self','2006-CSK-012','0','https://www.facebook.com/profile.php?id=100021417676416',NULL,NULL,NULL,NULL,'2',NULL,'2020-07-11 00:26:47','2020-07-11 00:26:47',NULL,NULL,NULL,NULL,NULL),(34,36,'self','2006-CSK-013','0','https://www.facebook.com/profile.php?id=100021417676416',NULL,NULL,NULL,NULL,'2',NULL,'2020-07-11 01:02:57','2020-07-11 01:02:57',NULL,NULL,NULL,NULL,NULL),(35,37,'self','2006-CSK-014','0','https://www.facebook.com/profile.php?id=100021417676416',NULL,NULL,NULL,NULL,'2','2','2020-07-11 01:48:43','2021-03-19 18:47:49',NULL,NULL,NULL,NULL,NULL),(36,38,'self','2006-CSK-015','0','https://www.facebook.com/permalink.php?id=558797297556321&story_fbid=2386136591489040',NULL,NULL,NULL,NULL,'2','2','2020-07-11 02:34:22','2021-03-20 12:00:52',NULL,NULL,NULL,NULL,NULL),(37,56,'self','Ct 2021 001','10',NULL,NULL,NULL,NULL,NULL,'13',NULL,'2021-02-16 19:31:18','2021-02-16 19:31:18',NULL,NULL,NULL,NULL,NULL),(38,77,'self','Organdy 02','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-02-25 15:45:26','2021-02-25 15:45:26',NULL,NULL,NULL,NULL,NULL),(39,88,'self','3','1','Sumi  1220tk',NULL,NULL,NULL,NULL,'2',NULL,'2021-03-08 01:00:42','2021-03-08 01:00:42',NULL,NULL,NULL,NULL,NULL),(40,89,'self','Trivuj bd 3 PC voil','6','Trivuj be 3 PC  400',NULL,NULL,NULL,NULL,'2','2','2021-03-08 01:50:21','2021-03-08 01:53:50',NULL,NULL,NULL,NULL,NULL),(41,90,'self','Trivuj bd 3 PC voil','20','Trivuj 3 piece be 550',NULL,NULL,NULL,NULL,'2',NULL,'2021-03-08 02:26:17','2021-03-08 02:26:17',NULL,NULL,NULL,NULL,NULL),(42,92,'self','Trivuj stich unstich','0','Trivuj stich unstich',NULL,NULL,NULL,NULL,'2','2','2021-03-08 02:58:49','2021-03-20 11:54:46',NULL,NULL,NULL,NULL,NULL),(43,93,'self','AFS-202131','0','Trivuj stich unstich',NULL,NULL,NULL,NULL,'2','1','2021-03-08 03:04:55','2021-03-23 11:25:44',NULL,NULL,NULL,NULL,NULL),(44,94,'self','AFS-202132','0','Trivuj stich',NULL,NULL,NULL,NULL,'2','1','2021-03-08 03:10:25','2021-03-25 13:52:49',NULL,NULL,NULL,NULL,NULL),(45,101,'self','Anahita sharee n lehenga','5','Anahita sharee n lehenga group',NULL,NULL,NULL,NULL,'2',NULL,'2021-03-14 00:37:00','2021-03-14 00:37:00',NULL,NULL,NULL,NULL,NULL),(46,103,'self','23123123','6','Trivuj lehenga group\r\nDiamond jorjet\r\nKaftan\r\nBody free size \r\nLong majh borabor 49\r\nKona jhul  50\r\nPrice 950 tk\r\nWholesale 800\r\n(6pcs)',NULL,NULL,NULL,NULL,'2',NULL,'2021-03-17 17:31:45','2021-03-17 17:31:45',NULL,NULL,NULL,NULL,NULL),(47,104,'self','23123122','6','Trivuj indian stock\r\nAvailable in stock \r\nSaree- Georgette with lace \r\nBlouse- Bangalore silk \r\nPrice- 1999Tk+150+100=2250/-',NULL,NULL,NULL,NULL,'2',NULL,'2021-03-17 17:37:16','2021-03-17 17:37:16',NULL,NULL,NULL,NULL,NULL),(48,113,'self','AFS-2021200','0',NULL,NULL,NULL,NULL,NULL,'2','1','2021-03-19 19:05:20','2021-03-31 09:43:14',NULL,NULL,NULL,NULL,NULL),(49,105,'self','AFS-2021201','4',NULL,NULL,NULL,NULL,NULL,'2','1','2021-03-19 19:08:41','2021-03-25 13:47:06',NULL,NULL,NULL,NULL,NULL),(50,117,'self','AFS-202148','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:48:45','2021-03-20 11:48:45',NULL,NULL,NULL,NULL,NULL),(51,116,'self','AFS-202147','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:49:00','2021-03-20 11:49:00',NULL,NULL,NULL,NULL,NULL),(52,115,'self','AFS-202146','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:49:22','2021-03-20 11:49:22',NULL,NULL,NULL,NULL,NULL),(53,114,'self','AFS-202145','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:49:31','2021-03-20 11:49:31',NULL,NULL,NULL,NULL,NULL),(54,112,'self','AFS-202144','1',NULL,NULL,NULL,NULL,NULL,'2','1','2021-03-20 11:49:49','2021-03-25 13:29:30',NULL,NULL,NULL,NULL,NULL),(55,111,'self','AFS-202143','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:49:57','2021-03-20 11:49:57',NULL,NULL,NULL,NULL,NULL),(56,110,'self','AFS-202142','1',NULL,NULL,NULL,NULL,NULL,'2','1','2021-03-20 11:50:10','2021-03-25 13:36:13',NULL,NULL,NULL,NULL,NULL),(57,109,'self','AFS-202141','1',NULL,NULL,NULL,NULL,NULL,'2','1','2021-03-20 11:50:22','2021-03-25 13:36:32',NULL,NULL,NULL,NULL,NULL),(58,108,'self','AFS-202140','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:50:38','2021-03-20 11:50:38',NULL,NULL,NULL,NULL,NULL),(59,107,'self','AFS-20219','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:50:51','2021-03-20 11:50:51',NULL,NULL,NULL,NULL,NULL),(60,106,'self','AFS-20218','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:51:05','2021-03-20 11:51:05',NULL,NULL,NULL,NULL,NULL),(61,102,'self','AFS-202134','1',NULL,NULL,NULL,NULL,NULL,'2',NULL,'2021-03-20 11:53:47','2021-03-20 11:53:47',NULL,NULL,NULL,NULL,NULL),(62,78,'self','AFS-202116','1',NULL,NULL,NULL,NULL,NULL,'2','1','2021-03-20 12:00:21','2021-03-25 13:46:30',NULL,NULL,NULL,NULL,NULL),(63,118,'self','AFS-2021215209','1',NULL,NULL,NULL,NULL,'active','18',NULL,'2021-03-21 13:52:13',NULL,NULL,NULL,NULL,NULL,NULL),(64,87,'self','AFS-202125','1',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-23 11:15:49',NULL,NULL,NULL,NULL,NULL,NULL),(65,86,'self','AFS-202124','1',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-23 11:16:18',NULL,NULL,NULL,NULL,NULL,NULL),(66,83,'self','AFS-202121','1',NULL,NULL,NULL,NULL,'active','1','1','2021-03-23 11:16:43','2021-03-25 13:33:55',NULL,NULL,NULL,NULL,NULL),(67,82,'self','AFS-2021120','1',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-23 11:17:02',NULL,NULL,NULL,NULL,NULL,NULL),(68,80,'self','AFS-202118','1',NULL,NULL,NULL,NULL,'active','1','1','2021-03-23 11:17:23','2021-03-25 13:34:41',NULL,NULL,NULL,NULL,NULL),(69,39,'self','BCT','0',NULL,NULL,NULL,NULL,'active','1','1','2021-03-23 11:18:18','2021-03-23 11:22:47',NULL,NULL,NULL,NULL,NULL),(70,81,'self','AFS-202119','1',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-23 11:18:38',NULL,NULL,NULL,NULL,NULL,NULL),(71,40,'self','BCTt','1',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-23 11:20:57',NULL,NULL,NULL,NULL,NULL,NULL),(72,76,'self','AFS-202114','1',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-23 11:21:19',NULL,NULL,NULL,NULL,NULL,NULL),(73,75,'self','AFS-202113','1',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-23 11:23:06',NULL,NULL,NULL,NULL,NULL,NULL),(74,84,'self','AFS-202122','1',NULL,NULL,NULL,NULL,'active','1',NULL,'2021-03-23 11:23:35',NULL,NULL,NULL,NULL,NULL,NULL),(75,91,'self','AFS-202129','0',NULL,NULL,NULL,NULL,'active','1','1','2021-03-23 11:24:01','2021-03-23 11:26:06',NULL,NULL,NULL,NULL,NULL),(76,119,'self','AFS-2021245622','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-24 16:56:28',NULL,NULL,NULL,NULL,NULL,NULL),(77,120,'self','AFS-2021245724','1',NULL,NULL,NULL,NULL,'active','2','1','2021-03-24 16:57:25','2021-03-25 13:47:49',NULL,NULL,NULL,NULL,NULL),(78,121,'self','AFS-2021245906','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-24 16:59:13',NULL,NULL,NULL,NULL,NULL,NULL),(79,122,'self','AFS-2021252103','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 11:21:08',NULL,NULL,NULL,NULL,NULL,NULL),(80,123,'self','AFS-2021252341','1',NULL,NULL,NULL,NULL,'active','2','1','2021-03-25 11:23:41','2021-03-25 13:30:58',NULL,NULL,NULL,NULL,NULL),(81,124,'self','AFS-2021253205','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 11:32:10',NULL,NULL,NULL,NULL,NULL,NULL),(82,125,'self','AFS-2021252841','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 12:28:45',NULL,NULL,NULL,NULL,NULL,NULL),(83,126,'self','AFS-2021253134','1',NULL,NULL,NULL,NULL,'active','2','1','2021-03-25 12:31:38','2021-03-25 13:53:13',NULL,NULL,NULL,NULL,NULL),(84,127,'self','AFS-2021253530','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 12:35:35',NULL,NULL,NULL,NULL,NULL,NULL),(85,128,'self','AFS-2021254229','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 12:42:43',NULL,NULL,NULL,NULL,NULL,NULL),(86,129,'self','AFS-2021254707','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 12:47:13',NULL,NULL,NULL,NULL,NULL,NULL),(87,130,'self','AFS-2021255119','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 12:51:23',NULL,NULL,NULL,NULL,NULL,NULL),(88,132,'self','AFS-2021255739','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 12:57:44',NULL,NULL,NULL,NULL,NULL,NULL),(89,133,'self','AFS-2021250316','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 13:03:21',NULL,NULL,NULL,NULL,NULL,NULL),(90,134,'self','AFS-2021250514','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 13:05:19',NULL,NULL,NULL,NULL,NULL,NULL),(91,135,'self','AFS-2021251359','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 13:14:04',NULL,NULL,NULL,NULL,NULL,NULL),(92,136,'self','AFS-2021251752','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-25 13:17:57',NULL,NULL,NULL,NULL,NULL,NULL),(93,137,'self','AFS-2021260811','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-26 12:08:16',NULL,NULL,NULL,NULL,NULL,NULL),(94,138,'self','AFS-2021261204','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-26 12:12:05',NULL,NULL,NULL,NULL,NULL,NULL),(95,139,'self','AFS-2021261425','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-26 12:14:25',NULL,NULL,NULL,NULL,NULL,NULL),(96,140,'self','AFS-2021263232','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-26 12:32:37',NULL,NULL,NULL,NULL,NULL,NULL),(97,141,'self','AFS-2021262215','1',NULL,NULL,NULL,NULL,'active','2',NULL,'2021-03-26 16:22:20',NULL,NULL,NULL,NULL,NULL,NULL),(98,143,'self','AFS-2021293256','1',NULL,NULL,NULL,NULL,'active','17','1','2021-03-29 14:33:01','2021-03-31 09:03:35',NULL,NULL,NULL,NULL,NULL),(99,144,'self','AFS-2021304133','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 09:41:39',NULL,NULL,NULL,NULL,NULL,NULL),(100,145,'self','AFS-2021305023','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 09:50:29',NULL,NULL,NULL,NULL,NULL,NULL),(101,146,'self','AFS-2021305921','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 09:59:23',NULL,NULL,NULL,NULL,NULL,NULL),(102,147,'self','AFS-2021300252','1',NULL,NULL,NULL,NULL,'active','17','1','2021-03-30 10:02:57','2021-03-31 09:02:45',NULL,NULL,NULL,NULL,NULL),(103,148,'self','AFS-2021300448','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 10:04:49',NULL,NULL,NULL,NULL,NULL,NULL),(104,149,'self','AFS-2021300938','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 10:09:38',NULL,NULL,NULL,NULL,NULL,NULL),(105,150,'self','AFS-2021301142','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 10:11:42',NULL,NULL,NULL,NULL,NULL,NULL),(106,151,'self','AFS-2021301338','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 10:13:38',NULL,NULL,NULL,NULL,NULL,NULL),(107,152,'self','AFS-2021301523','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 10:15:24',NULL,NULL,NULL,NULL,NULL,NULL),(108,157,'self','AFS-2021304534','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 11:45:39',NULL,NULL,NULL,NULL,NULL,NULL),(109,158,'self','AFS-2021304836','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 11:48:41',NULL,NULL,NULL,NULL,NULL,NULL),(110,159,'self','AFS-2021305549','1',NULL,NULL,NULL,NULL,'active','17',NULL,'2021-03-30 11:55:50',NULL,NULL,NULL,NULL,NULL,NULL),(111,160,'self','AFS-2021114220','1',NULL,NULL,NULL,NULL,'active','2','19','2021-04-11 00:42:21','2021-11-29 22:02:40',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `product_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_out`
--

DROP TABLE IF EXISTS `product_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_out` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `brand_id` int unsigned DEFAULT NULL,
  `seller_id` int unsigned DEFAULT NULL,
  `customer_id` int unsigned DEFAULT NULL,
  `product_quantity` double(8,2) NOT NULL COMMENT 'Total product quantity',
  `product_out_date` datetime NOT NULL,
  `color_id` int unsigned DEFAULT NULL,
  `size_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_out_product_id_foreign` (`product_id`),
  KEY `product_out_category_id_foreign` (`category_id`),
  KEY `product_out_brand_id_foreign` (`brand_id`),
  KEY `product_out_seller_id_foreign` (`seller_id`),
  KEY `product_out_customer_id_foreign` (`customer_id`),
  KEY `product_out_color_id_foreign` (`color_id`),
  KEY `product_out_size_id_foreign` (`size_id`),
  CONSTRAINT `product_out_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `product_out_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_out_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `product_out_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_out_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `product_out_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`),
  CONSTRAINT `product_out_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_out`
--

LOCK TABLES `product_out` WRITE;
/*!40000 ALTER TABLE `product_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_review`
--

DROP TABLE IF EXISTS `product_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_review` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `rating_value_score` double(10,4) DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `nickname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_review_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_review`
--

LOCK TABLES `product_review` WRITE;
/*!40000 ALTER TABLE `product_review` DISABLE KEYS */;
INSERT INTO `product_review` VALUES (1,34,4.0000,NULL,'abdur','A great product','Product quality is very good.','active','4',NULL,'2020-11-20 16:39:11','2020-11-20 16:39:11'),(2,30,4.0000,4,'abdur','Best Product','Customer Reviews','active','4',NULL,'2020-11-26 06:22:27','2020-11-26 06:22:27'),(3,29,3.0000,4,'rahman','Winter Discount Up to 30%','Customer Reviews','active','4',NULL,'2020-11-26 06:23:52','2020-11-26 06:23:52'),(4,15,NULL,1,NULL,NULL,NULL,'active','1',NULL,'2020-11-30 08:29:04','2020-11-30 08:29:04'),(5,6,NULL,NULL,NULL,NULL,NULL,'active',NULL,NULL,'2020-12-13 00:06:57','2020-12-13 00:06:57'),(6,6,4.0000,NULL,'rahman','Best Product',NULL,'active',NULL,NULL,'2020-12-13 00:07:09','2020-12-13 00:07:09'),(7,9,4.0000,4,'abdur','A great product','I love this product.','active','4',NULL,'2020-12-13 00:31:03','2020-12-13 00:31:03');
/*!40000 ALTER TABLE `product_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_seo`
--

DROP TABLE IF EXISTS `product_seo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_seo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `meta_title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_image_link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_seo_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_seo`
--

LOCK TABLES `product_seo` WRITE;
/*!40000 ALTER TABLE `product_seo` DISABLE KEYS */;
INSERT INTO `product_seo` VALUES (1,10,'3 Piece Embroidered Unstitched Suits from Serene Premium Beaux','3 Piece Embroidered Unstitched Suits from Serene Premium Beaux','3 Piece Embroidered Unstitched Suits from Serene Premium Beaux','Men\'s Casual Shirt ELECTIC BLUE','2','2','2019-10-17 11:06:06','2020-05-07 18:42:44'),(2,12,'3 Piece Embroidered Unstitched Suits from Serene','3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection Manufacturer: Serene Premium','3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium','WOMEN Cotton Short Sleeve Dress','2','2','2019-11-04 01:01:24','2020-05-07 18:33:03'),(3,15,'Embroidered Swiss Voile with','Embroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.','Embroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.','Embroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.','2',NULL,'2020-06-07 02:01:00','2020-06-07 02:01:00');
/*!40000 ALTER TABLE `product_seo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_shipping`
--

DROP TABLE IF EXISTS `product_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_shipping` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `shipping_method_id` int unsigned DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_shipping_product_id_foreign` (`product_id`),
  KEY `product_shipping_shipping_method_id_foreign` (`shipping_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_shipping`
--

LOCK TABLES `product_shipping` WRITE;
/*!40000 ALTER TABLE `product_shipping` DISABLE KEYS */;
INSERT INTO `product_shipping` VALUES (1,12,1,'2',NULL,'2019-12-10 09:04:50','2019-12-10 09:04:50'),(2,12,3,'2',NULL,'2019-12-10 09:04:50','2019-12-10 09:04:50'),(3,10,1,'2',NULL,'2019-12-10 09:07:34','2019-12-10 09:07:34'),(4,8,3,'2',NULL,'2019-12-10 09:08:39','2019-12-10 09:08:39'),(5,7,1,'2',NULL,'2019-12-10 09:08:58','2019-12-10 09:08:58'),(6,6,1,'2',NULL,'2019-12-10 09:09:37','2019-12-10 09:09:37'),(7,5,1,'2',NULL,'2019-12-10 09:10:43','2019-12-10 09:10:43'),(8,5,2,'2',NULL,'2019-12-10 09:10:43','2019-12-10 09:10:43'),(9,4,1,'2',NULL,'2019-12-10 09:11:13','2019-12-10 09:11:13'),(10,4,2,'2',NULL,'2019-12-10 09:11:13','2019-12-10 09:11:13'),(11,3,1,'2',NULL,'2019-12-10 09:11:38','2019-12-10 09:11:38'),(12,3,3,'2',NULL,'2019-12-10 09:11:38','2019-12-10 09:11:38'),(13,2,1,'2',NULL,'2019-12-10 09:11:57','2019-12-10 09:11:57'),(14,2,2,'2',NULL,'2019-12-10 09:11:57','2019-12-10 09:11:57'),(15,1,1,'2',NULL,'2019-12-10 09:14:12','2019-12-10 09:14:12'),(16,1,2,'2',NULL,'2019-12-10 09:14:12','2019-12-10 09:14:12'),(17,15,1,'2',NULL,'2020-06-07 02:24:47','2020-06-07 02:24:47'),(18,14,1,'2',NULL,'2020-06-07 02:24:59','2020-06-07 02:24:59'),(19,13,1,'2',NULL,'2020-06-07 02:25:12','2020-06-07 02:25:12'),(20,16,1,'2',NULL,'2020-06-09 10:09:27','2020-06-09 10:09:27'),(21,17,1,'2',NULL,'2020-06-09 10:15:16','2020-06-09 10:15:16'),(22,18,1,'2',NULL,'2020-06-09 10:22:35','2020-06-09 10:22:35'),(23,19,1,'2',NULL,'2020-06-09 10:25:51','2020-06-09 10:25:51'),(24,20,1,'2',NULL,'2020-06-09 10:30:11','2020-06-09 10:30:11'),(25,21,1,'2',NULL,'2020-06-09 21:03:05','2020-06-09 21:03:05'),(26,22,1,'2',NULL,'2020-06-09 21:13:03','2020-06-09 21:13:03'),(27,23,1,'2',NULL,'2020-06-23 18:35:46','2020-06-23 18:35:46'),(28,24,1,'2',NULL,'2020-06-23 19:06:09','2020-06-23 19:06:09'),(29,25,1,'2',NULL,'2020-06-23 19:22:41','2020-06-23 19:22:41'),(30,26,1,'2',NULL,'2020-06-24 17:22:57','2020-06-24 17:22:57'),(32,29,5,'2',NULL,'2020-07-02 17:50:33','2020-07-02 17:50:33'),(33,29,6,'2',NULL,'2020-07-02 17:50:33','2020-07-02 17:50:33'),(34,28,5,'2',NULL,'2020-07-04 22:57:18','2020-07-04 22:57:18'),(35,28,6,'2',NULL,'2020-07-04 22:57:18','2020-07-04 22:57:18'),(36,30,5,'2',NULL,'2020-07-05 01:03:11','2020-07-05 01:03:11'),(37,30,6,'2',NULL,'2020-07-05 01:03:11','2020-07-05 01:03:11'),(38,31,5,'2',NULL,'2020-07-06 18:53:54','2020-07-06 18:53:54'),(39,31,6,'2',NULL,'2020-07-06 18:53:54','2020-07-06 18:53:54'),(40,32,5,'2',NULL,'2020-07-06 19:15:33','2020-07-06 19:15:33'),(41,34,5,'2',NULL,'2020-07-07 19:13:38','2020-07-07 19:13:38'),(42,34,6,'2',NULL,'2020-07-07 19:13:38','2020-07-07 19:13:38'),(43,35,5,'2',NULL,'2020-07-11 00:26:59','2020-07-11 00:26:59'),(44,35,6,'2',NULL,'2020-07-11 00:26:59','2020-07-11 00:26:59'),(45,36,5,'2',NULL,'2020-07-11 01:03:08','2020-07-11 01:03:08'),(46,36,6,'2',NULL,'2020-07-11 01:03:08','2020-07-11 01:03:08'),(47,37,5,'2',NULL,'2020-07-11 01:48:54','2020-07-11 01:48:54'),(48,37,6,'2',NULL,'2020-07-11 01:48:54','2020-07-11 01:48:54'),(49,38,5,'2',NULL,'2020-07-11 02:34:33','2020-07-11 02:34:33'),(50,38,6,'2',NULL,'2020-07-11 02:34:33','2020-07-11 02:34:33');
/*!40000 ALTER TABLE `product_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller_commissions`
--

DROP TABLE IF EXISTS `seller_commissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seller_commissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_id` int unsigned DEFAULT NULL,
  `seller_id` int unsigned DEFAULT NULL,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `percentage` double(8,2) NOT NULL COMMENT 'Get from commissions table by commission_id',
  `note` text COLLATE utf8mb4_unicode_ci,
  `note_bn` text COLLATE utf8mb4_unicode_ci,
  `note_hi` text COLLATE utf8mb4_unicode_ci,
  `note_ch` text COLLATE utf8mb4_unicode_ci,
  `status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 = Active',
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `seller_commissions_slug_unique` (`slug`),
  UNIQUE KEY `seller_commissions_title_hi_unique` (`title_hi`),
  UNIQUE KEY `seller_commissions_title_ch_unique` (`title_ch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller_commissions`
--

LOCK TABLES `seller_commissions` WRITE;
/*!40000 ALTER TABLE `seller_commissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `seller_commissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller_profiles`
--

DROP TABLE IF EXISTS `seller_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seller_profiles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int unsigned DEFAULT NULL,
  `shop_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name_bn` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name_hi` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name_ch` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_no` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shop_address_bn` text COLLATE utf8mb4_unicode_ci,
  `shop_address_hi` text COLLATE utf8mb4_unicode_ci,
  `shop_address_ch` text COLLATE utf8mb4_unicode_ci,
  `shop_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shop_description_bn` text COLLATE utf8mb4_unicode_ci,
  `shop_description_hi` text COLLATE utf8mb4_unicode_ci,
  `shop_description_ch` text COLLATE utf8mb4_unicode_ci,
  `shop_agreement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shop_agreement_bn` text COLLATE utf8mb4_unicode_ci,
  `shop_agreement_hi` text COLLATE utf8mb4_unicode_ci,
  `shop_agreement_ch` text COLLATE utf8mb4_unicode_ci,
  `agreement_date` date DEFAULT NULL,
  `agreement_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `agreement_details_bn` text COLLATE utf8mb4_unicode_ci,
  `agreement_details_hi` text COLLATE utf8mb4_unicode_ci,
  `agreement_details_ch` text COLLATE utf8mb4_unicode_ci,
  `first_contact_person_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `first_contact_person_details_bn` text COLLATE utf8mb4_unicode_ci,
  `first_contact_person_details_hi` text COLLATE utf8mb4_unicode_ci,
  `first_contact_person_details_ch` text COLLATE utf8mb4_unicode_ci,
  `second_contact_person_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `second_contact_person_details_bn` text COLLATE utf8mb4_unicode_ci,
  `second_contact_person_details_hi` text COLLATE utf8mb4_unicode_ci,
  `second_contact_person_details_ch` text COLLATE utf8mb4_unicode_ci,
  `file_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_profiles_users_id_foreign` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller_profiles`
--

LOCK TABLES `seller_profiles` WRITE;
/*!40000 ALTER TABLE `seller_profiles` DISABLE KEYS */;
INSERT INTO `seller_profiles` VALUES (1,2,'askmebd',NULL,NULL,NULL,NULL,NULL,'3/13 MN Road, ShantiNagar',NULL,NULL,NULL,'askmebd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Ruma',NULL,NULL,NULL,'Parvin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'afshini_shop_banner_2.jpg','afshini_shop_logo_2.jpg','2019-07-03 18:59:36','2021-02-11 20:24:25'),(2,5,'Megasell',NULL,NULL,NULL,NULL,NULL,'3/13 MN Road, ShantiNagar',NULL,NULL,NULL,'Megaqsell Store',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Abdur',NULL,NULL,NULL,'Rahman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'afshini_shop_banner_5.jpg','afshini_shop_logo_5.jpg','2019-10-18 07:00:35','2021-02-11 21:09:42'),(3,7,'afshini',NULL,NULL,NULL,NULL,NULL,'Dhaka',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'afshini_shop_banner_7.jpg','afshini_shop_logo_7.jpg','2020-10-07 00:03:07','2021-02-11 20:58:43');
/*!40000 ALTER TABLE `seller_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_method`
--

DROP TABLE IF EXISTS `shipping_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_method` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int unsigned DEFAULT NULL,
  `shipping_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shipping_type_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_type_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_type_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_service` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shipping_value` decimal(10,2) DEFAULT NULL,
  `conditional` int NOT NULL DEFAULT '0',
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shipping_method_seller_id_foreign` (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_method`
--

LOCK TABLES `shipping_method` WRITE;
/*!40000 ALTER TABLE `shipping_method` DISABLE KEYS */;
INSERT INTO `shipping_method` VALUES (1,2,'Free',NULL,NULL,NULL,'Free shipping','Free shipping option available, if your order above ৳ 5000',0.00,5000,'active',NULL,NULL,'2019-12-06 06:20:05','2020-12-13 04:39:11'),(2,2,'Basic',NULL,NULL,NULL,'Inside Dhaka','Estimated time 1-3 business days',80.00,5000,'active',NULL,NULL,'2019-12-06 06:22:45','2021-03-21 09:00:46'),(3,2,'Courier',NULL,NULL,NULL,'Outside Dhaka','Estimated time 1-6 business days',150.00,5000,'active',NULL,NULL,'2020-11-23 18:24:59','2021-01-16 18:04:06'),(4,2,'Overnight',NULL,NULL,NULL,'Same Day','Estimated arrival on or before same day',200.00,5000,'active',NULL,NULL,'2020-11-23 18:25:22','2021-01-16 18:04:53');
/*!40000 ALTER TABLE `shipping_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `size` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci COMMENT 'size description',
  `description_bn` text COLLATE utf8mb4_unicode_ci COMMENT 'size description',
  `description_hi` text COLLATE utf8mb4_unicode_ci COMMENT 'size description',
  `description_ch` text COLLATE utf8mb4_unicode_ci COMMENT 'size description',
  `size_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'size Image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `size_title_unique` (`title`),
  UNIQUE KEY `size_slug_unique` (`slug`),
  UNIQUE KEY `size_title_bn_unique` (`title_bn`),
  UNIQUE KEY `size_title_hi_unique` (`title_hi`),
  UNIQUE KEY `size_title_ch_unique` (`title_ch`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,'XXL','xxl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-24 17:32:35','2021-11-24 17:32:35'),(2,'XL','xl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-11-24 17:32:35','2021-11-24 17:32:35');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slider` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_hi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_ch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` int DEFAULT NULL,
  `image_link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('home') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,'Men\'s Casual Shirt INDIGO DENIM',NULL,NULL,NULL,'mens-casual-shirt-indigo-denim','Men\'s Casual Shirt INDIGO DENIM',NULL,NULL,NULL,'#',1,'mens-casual-shirt-indigo-denim.jpg','home','active',0,'1',NULL,'2019-12-06 06:25:57','2019-12-06 06:25:57'),(2,'WOMEN Cotton Short Sleeve Dress',NULL,NULL,NULL,'women-cotton-short-sleeve-dress','WOMEN Cotton Short Sleeve Dress',NULL,NULL,NULL,'#',2,'women-cotton-short-sleeve-dress.jpg','home','active',0,NULL,NULL,'2019-12-06 08:04:23','2019-12-06 08:04:23'),(3,'kids & mom',NULL,NULL,NULL,'kids-mom','kids & mom Fashion',NULL,NULL,NULL,'#',3,'kids-mom.jpg','home','active',0,NULL,NULL,'2019-12-06 08:04:59','2019-12-06 08:04:59');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unit` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_hi` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ch` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit_title_unique` (`title`),
  UNIQUE KEY `unit_slug_unique` (`slug`),
  UNIQUE KEY `unit_title_bn_unique` (`title_bn`),
  UNIQUE KEY `unit_title_hi_unique` (`title_hi`),
  UNIQUE KEY `unit_title_ch_unique` (`title_ch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_id` int unsigned DEFAULT NULL,
  `type` enum('super_admin','admin','customer','seller') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_agreement` enum('no','yes') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile_no` (`mobile_no`),
  UNIQUE KEY `username` (`username`,`mobile_no`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@gmail.com','$2y$10$MF5eK1XzWDJmEVLkPqmaReHgkTkW13BDKlyYeYWa12PP.vXIrkm5W','Admin','8801312304426',NULL,1,'admin',NULL,'active','XvYfiVuEZVOEVf5GhAEaUNn9E9dbqrqwwmeiWpjddD3RPLReVeXKFN3ARTHQ',NULL,'1',NULL,'2021-02-13 12:48:35'),(2,'shop@gmail.com','$2y$10$MF5eK1XzWDJmEVLkPqmaReHgkTkW13BDKlyYeYWa12PP.vXIrkm5W','shop','01312-304426',NULL,2,'seller',NULL,'active','4UHB9kuhyFcAlAEmjzOOGGItJ77jAlhMD8IBZMbWr5UrRJJwq9C7OVxHuaTs',NULL,'2','2019-07-03 18:59:36','2021-01-16 18:09:58'),(4,'abc@gmail.com','$2y$10$MF5eK1XzWDJmEVLkPqmaReHgkTkW13BDKlyYeYWa12PP.vXIrkm5W','abdur','01712004426',NULL,3,'customer',NULL,'active','0xquBrEl1BMjvZJmmfaKEb1Ujee2Pj7h7TRmBDnA7qLyXo0JsAI0Lf4uhuYd',NULL,'4','2019-07-15 10:38:10','2019-10-17 08:35:21'),(5,'shop1@gmail.com','$2y$10$MF5eK1XzWDJmEVLkPqmaReHgkTkW13BDKlyYeYWa12PP.vXIrkm5W','shop1','01312304426',NULL,2,'seller',NULL,'active','8oez4JohogioU4ESZN6PoL26Xx9XoJa4dpEsbWv0MnUT2UOLJCIiXNUIyiAJ',NULL,'5','2019-10-18 07:00:35','2019-10-18 12:23:05'),(7,'shop2@gmail.com','$2y$10$MF5eK1XzWDJmEVLkPqmaReHgkTkW13BDKlyYeYWa12PP.vXIrkm5W','shop3','01730302380',NULL,NULL,'seller',NULL,'active','HHMFQNyDcscr1VjhiLQMFUQjLzJaSmOMt9MIy88xAIIJ4rExvRYLNfEpv7Ah',NULL,'7','2020-10-07 00:03:07','2021-01-16 18:09:39'),(19,'superadmin@example.com','$2y$10$MF5eK1XzWDJmEVLkPqmaReHgkTkW13BDKlyYeYWa12PP.vXIrkm5W','Super Admin','11111111',NULL,1,'super_admin',NULL,'active',NULL,NULL,NULL,'2021-11-24 09:40:06','2021-11-24 09:40:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_billing_shipping`
--

DROP TABLE IF EXISTS `users_billing_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_billing_shipping` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int unsigned DEFAULT NULL,
  `type` enum('billing','shipping') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `special_instruction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_phone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_billing_shipping_users_id_foreign` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_billing_shipping`
--

LOCK TABLES `users_billing_shipping` WRITE;
/*!40000 ALTER TABLE `users_billing_shipping` DISABLE KEYS */;
INSERT INTO `users_billing_shipping` VALUES (1,3,'billing','M Update',NULL,'m@gmail.com','asdasdasdsda',NULL,NULL,NULL,NULL,'000011111',NULL,NULL,NULL,'3','3','2019-07-12 07:11:17','2019-07-12 07:30:34'),(2,3,'shipping','n 2',NULL,'n@gmail.com','asdasdasd',NULL,NULL,NULL,NULL,'1114444',NULL,NULL,NULL,'3','3','2019-07-12 07:48:49','2019-07-12 07:51:59'),(3,3,'shipping','a',NULL,'a@gmaul.com','askldasdasdlasn',NULL,NULL,NULL,NULL,'2323232',NULL,NULL,NULL,'3',NULL,'2019-07-12 07:52:30','2019-07-12 07:52:30'),(4,4,'billing','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka','nothing','Tangail','Dhaka','1980','01712004426','01712004420',NULL,NULL,'4','4','2019-07-15 11:55:14','2020-12-13 00:33:50'),(5,4,'shipping','Abdur','Rahman','abdurr.rahman@gmail.com','1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka','nothing','Dhaka','Dhaka','1213','01712004426','01712004426',NULL,NULL,'4','4','2019-07-15 11:55:28','2020-12-13 00:34:39');
/*!40000 ALTER TABLE `users_billing_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_product`
--

DROP TABLE IF EXISTS `vw_product`;
/*!50001 DROP VIEW IF EXISTS `vw_product`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_product` AS SELECT
 1 AS `product_id`,
 1 AS `product_title`,
 1 AS `product_seller_id`,
 1 AS `is_featured`,
 1 AS `batch`,
 1 AS `type`,
 1 AS `product_slug`,
 1 AS `short_description`,
 1 AS `specification`,
 1 AS `size_guide`,
 1 AS `description`,
 1 AS `category_title`,
 1 AS `item_no`,
 1 AS `sell_price`,
 1 AS `old_price`,
 1 AS `list_price`,
 1 AS `image`,
 1 AS `meta_title`,
 1 AS `meta_keywords`,
 1 AS `meta_description`,
 1 AS `quantity`,
 1 AS `created_at`,
 1 AS `total_review`,
 1 AS `average_review`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int unsigned DEFAULT NULL,
  `product_id` int unsigned DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlist_users_id_foreign` (`users_id`),
  KEY `wishlist_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (4,4,27,'4',NULL,'2020-11-26 06:23:26','2020-11-26 06:23:26');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `vw_product`
--

/*!50001 DROP VIEW IF EXISTS `vw_product`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_product` AS select `p`.`id` AS `product_id`,`p`.`title` AS `product_title`,`p`.`seller_id` AS `product_seller_id`,`p`.`is_featured` AS `is_featured`,`p`.`batch` AS `batch`,`p`.`type` AS `type`,`p`.`slug` AS `product_slug`,`p`.`short_description` AS `short_description`,`p`.`specification` AS `specification`,`p`.`size_guide` AS `size_guide`,`p`.`description` AS `description`,(select group_concat(`c`.`title` separator ',') from (`category` `c` join `product_category` `p_c` on((`c`.`id` = `p_c`.`category_id`))) where (`p_c`.`product_id` = `p`.`id`) limit 1) AS `category_title`,`p`.`item_no` AS `item_no`,`p`.`sell_price` AS `sell_price`,`p`.`old_price` AS `old_price`,`p`.`list_price` AS `list_price`,(select `p_i`.`image` from `product_image` `p_i` where (`p`.`id` = `p_i`.`product_id`) limit 1) AS `image`,(select `p_s`.`meta_title` from `product_seo` `p_s` where (`p`.`id` = `p_s`.`product_id`) limit 1) AS `meta_title`,(select `p_s`.`meta_keywords` from `product_seo` `p_s` where (`p`.`id` = `p_s`.`product_id`) limit 1) AS `meta_keywords`,(select `p_s`.`meta_description` from `product_seo` `p_s` where (`p`.`id` = `p_s`.`product_id`) limit 1) AS `meta_description`,(select `p_in`.`quantity` from `product_inventory` `p_in` where (`p`.`id` = `p_in`.`product_id`)) AS `quantity`,`p`.`created_at` AS `created_at`,(select count(`p_review`.`id`) from `product_review` `p_review` where ((`p`.`id` = `p_review`.`product_id`) and (`p_review`.`status` = 'active'))) AS `total_review`,(select avg(`p_review`.`rating_value_score`) from `product_review` `p_review` where ((`p`.`id` = `p_review`.`product_id`) and (`p_review`.`status` = 'active'))) AS `average_review` from `product` `p` where ((`p`.`status` = 'active') and (`p`.`title` <> '')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-08 15:49:36
