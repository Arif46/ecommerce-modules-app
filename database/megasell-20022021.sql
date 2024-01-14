-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 04:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `megasell`
--

-- --------------------------------------------------------

--
-- Table structure for table `admanager`
--

CREATE TABLE `admanager` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` int(11) DEFAULT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('home','shop','corporate','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('top','popup','footer','bottom','slider') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admanager`
--

INSERT INTO `admanager` (`id`, `title`, `slug`, `caption`, `route`, `short_order`, `image_link`, `type`, `position`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Afshini is one of the unique online shopping sites in Bangladesh.', 'shop-now-pay-later13', 'If you would like to experience the best of online shopping\r\nfor men, women and kids in Bangladesh, this is the right place. Afshini is the ultimate destination\r\nfor fashion and lifestyle including clothing, footwear, accessories, jewellery, personal care products and more.', NULL, 1, 'shop-now-pay-later.jpg', 'home', 'top', 'active', '1', '1', '2020-10-28 00:14:22', '2020-12-16 21:51:55'),
(5, 'Afshini offers you the ideal combination', 'shop-with-confidence-0-day-online-returns', 'Sign up to receive email updates on special promotions, new product announcements, gifts ideas and more. You can shop online at Afshini from the comfort of your home and get your favorite\'s delivered right to your doorstep.', NULL, 2, 'shop-with-confidence-0-day-online-returns.jpg', 'home', 'bottom', 'active', '1', '1', '2020-10-28 00:28:34', '2020-12-16 21:46:25'),
(6, 'Keep shopping, keep saving', 'up-to-0-off-select-categories-0-off-0-0-off-0-off', 'Keep shopping, keep saving', NULL, 3, 'up-to-0-off-select-categories-0-off-0-0-off-0-off.jpg', 'home', 'slider', 'active', '1', '1', '2020-10-28 00:33:36', '2020-12-16 21:40:58'),
(7, 'Life is hard enough already. Let us make it a little easier.', 'shop-now-pay-later11', 'Life is hard enough already. Let us make it a little easier.', NULL, 4, 'shop-now-pay-later11.jpg', 'home', 'slider', 'active', '1', '1', '2020-10-28 00:34:40', '2020-12-16 21:41:20'),
(8, 'Shop Now. Pay Later. Save when you spend. Your one stop smart shopping resource.', 'save-when-you-spend-0-day-online-returns11', 'Shop Now. Pay Later. Save when you spend. Your one stop smart shopping resource.', NULL, 5, NULL, 'home', 'slider', 'active', '1', '1', '2020-10-28 00:35:24', '2020-12-16 23:54:25'),
(9, 'Your one stop smart shopping resource.', 'up-to-0-off-select-categories-0-off-0-0-off-0-off13', 'Shop Now. Pay Later. Save when you spend. Your one stop smart shopping resource.', NULL, 6, NULL, 'home', 'popup', 'active', '1', '1', '2020-10-28 01:24:17', '2020-12-16 21:43:01'),
(10, 'Life is hard enough already. Let us make it a little easier.', 'sign-up-newsletter', 'Be it clothing, footwear or accessories, Afshini offers you the ideal combination of fashion and functionality for men, women and kids. Our online store brings you the latest in designer products straight out of fashion houses.', NULL, 7, NULL, 'home', 'footer', 'active', '1', '1', '2020-10-28 02:12:57', '2020-12-16 21:48:58'),
(11, 'Up to 30% off', 'up-to-0-off', 'select categories. 30% off $50, 40% off $75, 50% off', NULL, 9, NULL, 'home', 'slider', 'cancel', '1', '1', '2020-11-30 06:49:00', '2020-12-02 01:13:30'),
(12, 'Shop Now. Pay Later. Save when you spend.', 'website-design', 'Shop Now. Pay Later. Save when you spend. Your one stop smart shopping resource.', NULL, 1, 'website-design.jpg', 'home', 'top', 'inactive', '1', '1', '2020-12-02 01:03:24', '2020-12-16 23:54:49'),
(13, '24/7 customer support', '2-customer-support', 'Our team is here to give you personalized support within the hour - available 24/7. Join daily live webinars, watch our tutorials, or browse through our knowledge base', NULL, 8, NULL, 'home', 'slider', 'inactive', '1', '1', '2020-12-02 01:54:00', '2020-12-02 10:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `code_column` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('text','textarea','checkbox') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_is_required` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `backend_title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `code_column`, `type`, `type_is_required`, `order`, `backend_title`, `frontend_title`, `default_value`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'size', 'checkbox', 'no', 1, 'Size', 'Size', 'yes', 'active', '1', NULL, '2019-10-25 02:38:48', '2019-10-25 02:38:48'),
(2, 'color', 'checkbox', 'no', 2, 'Color', 'Color', 'no', 'active', '1', NULL, '2019-10-28 19:07:28', '2019-10-28 19:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED DEFAULT NULL,
  `frontend_title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backend_title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`id`, `attribute_id`, `frontend_title`, `backend_title`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'L', 'l', 'active', '1', NULL, '2019-10-25 02:39:08', '2019-10-25 02:39:08'),
(2, 1, 'XL', 'XL', 'xl', 'active', '1', NULL, '2019-10-25 02:39:27', '2019-10-25 02:39:27'),
(3, 1, 'M', 'M', 'm', 'active', '1', NULL, '2019-10-28 19:06:30', '2019-10-28 19:06:30'),
(4, 1, 'S', 'S', 's', 'active', '1', NULL, '2019-10-28 19:06:37', '2019-10-28 19:06:37'),
(5, 2, 'White', 'White', 'white', 'active', '1', NULL, '2019-10-28 19:07:45', '2019-10-28 19:07:45'),
(6, 2, 'Red', 'Red', 'red', 'active', '1', NULL, '2019-10-28 19:07:54', '2019-10-28 19:07:54'),
(7, 2, 'Green', 'Green', 'green', 'active', '1', NULL, '2019-10-28 19:08:19', '2019-10-28 19:08:19'),
(8, 2, 'Black', 'Black', 'black', 'active', '1', NULL, '2019-10-28 19:08:30', '2019-10-28 19:08:30'),
(9, 2, 'Blue', 'Blue', 'blue', 'active', '1', NULL, '2019-10-28 19:08:38', '2019-10-28 19:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set`
--

CREATE TABLE `attribute_set` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_set`
--

INSERT INTO `attribute_set` (`id`, `title`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'default', 'active', '1', NULL, '2019-07-03 12:55:32', '2019-07-03 12:55:32'),
(2, 'Clothing', 'clothing', 'active', '1', NULL, '2019-07-03 12:55:48', '2019-07-03 12:55:48'),
(3, 'Mens', 'mens', 'active', '1', '1', '2019-07-03 12:56:31', '2019-10-28 19:04:51'),
(4, 'Caps', 'caps', 'active', '1', NULL, '2019-07-03 12:57:11', '2019-07-03 12:57:11'),
(5, 'kids & mom', 'kids-mom', 'active', '1', NULL, '2019-10-18 06:25:51', '2019-10-18 06:25:51'),
(6, 'color', 'color', 'cancel', '1', '1', '2019-10-25 04:07:41', '2019-10-28 19:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_set_items`
--

CREATE TABLE `attribute_set_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED DEFAULT NULL,
  `attribute_set_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_set_items`
--

INSERT INTO `attribute_set_items` (`id`, `attribute_id`, `attribute_set_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '1', NULL, '2019-10-25 02:44:57', '2019-10-25 02:44:57'),
(3, 2, 5, '1', NULL, '2019-10-28 19:09:13', '2019-10-28 19:09:13'),
(4, 1, 5, '1', NULL, '2019-10-28 19:09:13', '2019-10-28 19:09:13'),
(5, 2, 3, '1', NULL, '2019-10-28 19:09:23', '2019-10-28 19:09:23'),
(6, 1, 3, '1', NULL, '2019-10-28 19:09:23', '2019-10-28 19:09:23'),
(7, 2, 2, '1', NULL, '2019-10-28 19:09:41', '2019-10-28 19:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` int(11) DEFAULT NULL,
  `meta_title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image_link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `description`, `image_link`, `short_order`, `meta_title`, `meta_description`, `meta_keywords`, `meta_image_link`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bag', 'bag', NULL, 'bag.jpg', 4, NULL, NULL, NULL, NULL, 'active', '1', '1', '2019-07-01 14:41:21', '2019-10-18 06:28:38'),
(2, 'Eid 2020', 'eid-2020', NULL, 'eid-2020.jpg', 1, NULL, NULL, NULL, NULL, 'active', '1', '1', '2019-07-01 14:41:40', '2021-01-16 23:58:16'),
(3, 'Women', 'women', NULL, 'women.jpg', 2, NULL, NULL, NULL, NULL, 'active', '1', '1', '2019-07-01 14:42:00', '2020-06-09 10:52:44'),
(4, 'Mens', 'mens', NULL, 'mens.jpg', 1, NULL, NULL, NULL, NULL, 'active', '1', '1', '2019-07-03 13:32:56', '2021-01-15 01:27:08'),
(5, 'Gift Item', 'gift-item', NULL, 'gift-item.jpg', 5, NULL, NULL, NULL, NULL, 'active', '1', NULL, '2019-07-05 00:03:13', '2019-07-05 00:03:13'),
(6, 'kids & mom', 'kids--mom', NULL, 'kids--mom.jpg', 6, NULL, NULL, NULL, NULL, 'active', '1', NULL, '2019-10-18 06:23:51', '2019-10-18 06:23:51'),
(7, 'Tshairt', 'tshairt', NULL, 'tshairt.jpg', 1, NULL, NULL, NULL, NULL, 'active', '1', '1', '2019-12-25 06:57:35', '2021-01-15 01:28:14'),
(8, 'Polo Shirt', 'polo-shirt', NULL, 'polo-shirt.jpg', 1, NULL, NULL, NULL, NULL, 'active', '1', '1', '2019-12-25 06:58:09', '2021-01-15 01:28:38'),
(9, 'Pant', 'pant', NULL, 'pant.jpg', 2, NULL, NULL, NULL, NULL, 'active', '1', '1', '2019-12-25 06:59:18', '2021-01-15 01:28:52'),
(10, 'Men Tshairt', 'men-tshairt', NULL, 'men-tshairt.jpg', 2, NULL, NULL, NULL, NULL, 'active', '1', '1', '2020-01-01 02:20:21', '2021-02-07 00:37:26'),
(11, 'Women Tshirt', 'women-tshirt', NULL, 'women-tshirt.jpg', 3, NULL, NULL, NULL, NULL, 'active', '1', '1', '2020-01-01 02:20:43', '2021-02-07 00:37:53'),
(12, 'Beauty care', 'beauty-care', 'beauty care', 'beauty-care.jpg', 3, NULL, NULL, NULL, NULL, 'active', '1', '1', '2020-06-09 10:52:15', '2020-06-09 10:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `category_self_relation`
--

CREATE TABLE `category_self_relation` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_category_id` int(10) UNSIGNED DEFAULT NULL,
  `child_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_self_relation`
--

INSERT INTO `category_self_relation` (`id`, `parent_category_id`, `child_category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '1', NULL, '2019-07-01 14:41:21', '2019-07-01 14:41:21'),
(2, NULL, 2, '1', NULL, '2019-07-01 14:41:40', '2019-07-01 14:41:40'),
(3, NULL, 3, '1', NULL, '2019-07-01 14:42:00', '2019-07-01 14:42:00'),
(4, NULL, 4, '1', NULL, '2019-07-03 13:32:56', '2019-07-03 13:32:56'),
(5, NULL, 5, '1', NULL, '2019-07-05 00:03:13', '2019-07-05 00:03:13'),
(6, NULL, 6, '1', NULL, '2019-10-18 06:23:51', '2019-10-18 06:23:51'),
(7, 4, 7, '1', NULL, '2019-12-25 06:57:35', '2019-12-25 06:57:35'),
(8, 7, 8, '1', '1', '2019-12-25 06:58:09', '2021-01-17 00:04:41'),
(9, 4, 9, '1', NULL, '2019-12-25 06:59:18', '2019-12-25 06:59:18'),
(10, 7, 10, '1', NULL, '2020-01-01 02:20:21', '2020-01-01 02:20:21'),
(11, 7, 11, '1', NULL, '2020-01-01 02:20:43', '2020-01-01 02:20:43'),
(12, NULL, 12, '1', NULL, '2020-06-09 10:52:15', '2020-06-09 10:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_tag` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `page_tag`, `title`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'about-us', 'About Us', '<p><strong>Our goal </strong>is to help every individuals who has knowledge of computer, turn into an asset. As a fast growing IT company WEBARTBD playing a vital role in Web Development industry in Bangladesh and worldwide.We cater to a motley of industries, ranging from start-ups to the big players. webartbd is a company in Bangladesh, making a difference. Believe in us and we will recreate your visions into reality with a team of adept and diligent members. Working with us means working with experts and not just mere coders. We have expertise and experience to regale all your IT requirements.</p>', 'inactive', '1', '1', '2019-11-08 01:36:19', '2021-01-16 03:56:48'),
(2, 'contact-us', 'Contact us', '<p>3/13 SantiNagar , Ghatail +880-1312-304426 info@webartbd.com / webartbd@gmail.com</p>', 'active', '1', '1', '2019-11-07 06:12:30', '2020-12-07 10:21:46'),
(3, 'privacy-policy', 'privacy policy', '<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>', 'active', '1', '1', '2019-11-08 00:45:55', '2020-12-07 10:31:11'),
(4, 'customer-service', 'customer service', '<p>Webartbd is a platform that allows you to easily submit the requirements of your web development and design related tasks or projects. Our revolutionary portal will then act as a resource manager allowing you to seamlessly communicate, make payments, send files and submit feedback of the work.</p><p><strong>1. Sign up for free</strong></p><p>Create a free account as a client and post your job, receive the best bid possible or you can buy our custom products and get your job done with integrity and quality.</p><p><strong>2. Get a free quote</strong></p><p>Let us know about your project and our expert team will provide you the best quote for your job at free of cost.<br>This will enable you to know more about the time and cost required for your job to be done and delivered.</p><p><strong>3. Buy our premade custom products</strong></p><p>Make things getting done more hassle free by buying our products. Each product is custom selected based on your needs. This preset fixed price and time is just what you would need. Knock us to know more.</p>', 'inactive', '1', '1', '2019-11-07 17:48:13', '2020-12-13 01:55:27'),
(5, 'term-of-use', 'Terms of Website Use', '<p>1 in 4 Millennials say they will visit the on-premise on Black Wednesday before spending Thanksgiving Day with Family According to the latest Nielsen CGA On Premise Consumer Survey (OPCS), a fifth of the</p>', 'inactive', '1', '1', '2019-11-08 00:43:32', '2020-12-13 01:55:54'),
(6, 'return-policy', 'return policy', '<p>return-policy</p><p>&nbsp;</p><p>&nbsp;</p><p>vreturn-policyreturn-policy</p>', 'inactive', '1', '1', '2020-12-02 01:11:44', '2020-12-13 01:55:44'),
(7, 'terms-conditions', 'Terms and Conditions', '<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</p>', 'active', '1', '1', '2019-11-07 06:05:57', '2020-12-07 10:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED DEFAULT NULL,
  `coupon_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_coupon` int(11) DEFAULT NULL,
  `end_coupon` int(11) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `seller_id`, `coupon_name`, `coupon_details`, `coupon_code`, `coupon_type`, `start_coupon`, `end_coupon`, `valid_from`, `valid_to`, `amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'afs', NULL, '100', 'single', NULL, NULL, '2019-12-06', '2021-02-03', '100.00', 'inactive', NULL, NULL, '2019-12-06 06:24:02', '2020-05-08 18:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` int(11) DEFAULT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('home','block','news','slider','events','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('top','left','right','bottom','slider') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `caption`, `route`, `short_order`, `image_link`, `type`, `position`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'News & Events', 'news-events', '<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris accumsan velit.</p>', NULL, 1, 'news-events.jpg', 'news', 'top', 'active', '1', '1', '2020-10-28 00:14:22', '2020-11-18 04:02:24'),
(5, 'Shop With Confidence', 'shop-with-confidence', '<p>Additional 30% off orders of $50. Additional 40% off orders of $75. Additional 50% off orders of $125 or more. Use code MORE. Promotion ends on 10.15.20 at 11:59 PM PT. Excludes 3 for $33/5 for $45 Underwear, Final Sale + Underwear Clearance. Cannot be combined with any other offer. Only valid at qafzone.com. Not valid on previous purchases.</p>', NULL, 2, 'shop-with-confidence.jpg', 'events', 'top', 'active', '1', NULL, '2020-10-28 00:28:34', '2020-11-18 04:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `status`, `image_link`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'How to Sign up ?', 'Create a free account as a client and post your job, receive the best bid possible or you can buy our custom products and get your job done with integrity and quality.', 'active', '', '1', NULL, '2019-11-08 00:31:19', '2019-11-08 00:31:19'),
(2, 'Get a free quote', '2. Get a free quote\r\nLet us know about your project and our expert team will provide you the best quote for your job at free of cost.\r\nThis will enable you to know more about the time and cost required for your job to be done and delivered.', 'active', '', '1', NULL, '2019-11-08 00:31:45', '2019-11-08 00:31:45'),
(3, 'Buy our premade custom products', 'Make things getting done more hassle free by buying our products. Each product is custom selected based on your needs. This preset fixed price and time is just what you would need. Knock us to know more.', 'active', '', '1', NULL, '2019-11-08 00:32:10', '2019-11-08 00:32:10'),
(4, 'Manage your orders and enquiries', 'All your product orders and custom orders or enquiries through GGTaskers can be managed through dashboard. Submit a review once delivered.', 'active', '', '1', NULL, '2019-11-08 00:32:33', '2019-11-08 00:32:33'),
(5, 'Feel free to contact us', 'The contact form will store your enquiries and can be found in the general enquiries section. Or let’s have a chat.\r\nWe believe chatting enhances customer experience and service but mostly it makes the relationship with customer stronger.\r\nFeel free to contact us as this will help us to serve you better.', 'active', '', '1', NULL, '2019-11-08 00:32:56', '2019-11-08 00:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_05_04_135426_create_users_table', 1),
(2, '2019_05_06_112608_create_category_table', 1),
(3, '2019_05_06_112651_create_category_self_relation_table', 1),
(4, '2019_05_07_064117_create_attribute_table', 1),
(5, '2019_05_07_064155_create_attribute_set_table', 1),
(6, '2019_05_09_032239_create_attribute_option_table', 1),
(7, '2019_05_15_154039_create_sliders_table', 1),
(8, '2019_05_15_170426_create_faq_table', 1),
(9, '2019_05_18_025015_create_products_table', 1),
(10, '2019_05_18_030132_create_orders_table', 1),
(11, '2019_05_18_030305_create_product_inventory_table', 1),
(12, '2019_05_20_152558_create_seller_profiles_table', 1),
(13, '2019_05_25_021858_create_attribute_set_items_table', 1),
(14, '2019_06_11_151708_create_users_billing_shipping_table', 1),
(15, '2019_07_01_155052_create_wishlist_table', 1),
(16, '2019_11_04_001649_create_delivery_options_table', 2),
(17, '2019_11_04_012448_create_payment_options_table', 3),
(18, '2019_11_05_022645_create_coupons_table', 4),
(22, '2019_11_06_021538_create_product_coupon_table', 5),
(23, '2019_11_06_021316_create_product_shipping_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_head_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_seller_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `comission_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `shipping_service` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` decimal(10,2) DEFAULT NULL,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_head_id`, `product_id`, `product_seller_id`, `quantity`, `price`, `total_price`, `comission_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `size`, `color`, `shipping_cost`, `shipping_service`, `coupon_value`, `coupon_code`) VALUES
(1, 1, 12, 2, 1, '1500.00', '1500.00', NULL, 'delivered', '4', NULL, '2019-12-10 09:18:33', '2019-12-10 09:18:33', 'XL', 'Blue', '110.00', 'DHL Express', '100.00', '100'),
(2, 2, 1, 2, 1, '1200.00', '1200.00', NULL, 'active', '4', NULL, '2019-12-10 10:57:33', '2019-12-10 10:57:33', 'M', 'Blue', '85.00', 'Qafzone', '0.00', ''),
(3, 3, 1, 2, 1, '1200.00', '1200.00', NULL, 'shipped', '4', NULL, '2019-12-10 11:08:36', '2019-12-10 11:08:36', 'L', 'Blue', '85.00', 'Qafzone', '0.00', ''),
(4, 4, 10, 2, 1, '1500.00', '1500.00', NULL, 'confirmed', '4', NULL, '2020-01-03 11:09:28', '2020-01-03 11:09:28', 'S', 'Green', '85.00', 'Qafzone', '0.00', ''),
(5, 6, 10, 2, 1, '1500.00', '1500.00', NULL, 'active', NULL, NULL, '2020-05-07 15:54:52', '2020-05-07 15:54:52', 'S', 'Blue', '85.00', 'Qafzone', '0.00', ''),
(6, 7, 12, 2, 1, '1500.00', '1500.00', NULL, 'confirmed', NULL, NULL, '2020-05-07 16:43:58', '2020-05-07 16:43:58', 'M', 'Blue', '100.00', 'Afshini', '0.00', ''),
(7, 8, 12, 2, 1, '8000.00', '8000.00', NULL, 'confirmed', NULL, NULL, '2020-05-08 17:59:41', '2020-05-08 17:59:41', '', '', '100.00', 'Afshini', '0.00', ''),
(9, 10, 36, 2, 1, '4350.00', '4350.00', NULL, 'confirmed', '1', NULL, '2020-12-13 05:17:38', '2020-12-13 05:17:38', '', '', '120.00', 'courier-service', '0.00', ''),
(10, 11, 38, 2, 1, '4900.00', '4900.00', NULL, 'confirmed', '1', NULL, '2020-12-13 05:41:35', '2020-12-13 05:41:35', '', '', '0.00', '', '0.00', ''),
(11, 12, 37, 2, 1, '3250.00', '3250.00', NULL, 'confirmed', NULL, NULL, '2020-12-14 22:09:13', '2020-12-14 22:09:13', '', '', '0.00', '', '0.00', ''),
(12, 13, 38, 2, 1, '4900.00', '4900.00', NULL, 'confirmed', '4', NULL, '2020-12-14 22:40:18', '2020-12-14 22:40:18', '', '', '0.00', '', '0.00', ''),
(13, 16, 35, 2, 1, '3900.00', '3900.00', NULL, 'active', '4', NULL, '2020-12-14 23:02:49', '2020-12-14 23:02:49', '', '', '0.00', '', '0.00', ''),
(14, 17, 26, 2, 1, '890.00', '890.00', NULL, 'active', '4', NULL, '2020-12-14 23:48:48', '2020-12-14 23:48:48', '', '', '0.00', 'Free', '0.00', ''),
(15, 18, 26, 2, 1, '890.00', '890.00', NULL, 'active', '4', NULL, '2020-12-14 23:54:04', '2020-12-14 23:54:04', '', '', '0.00', 'Free', '0.00', ''),
(16, 19, 39, 7, 1, '700.00', '700.00', NULL, 'active', '4', NULL, '2020-12-14 23:55:33', '2020-12-14 23:55:33', '', '', '0.00', '', '0.00', ''),
(17, 20, 40, 7, 1, '700.00', '700.00', NULL, 'active', '4', NULL, '2020-12-14 23:58:26', '2020-12-14 23:58:26', '', '', '0.00', '', '0.00', ''),
(18, 21, 40, 7, 1, '700.00', '700.00', NULL, 'active', '4', NULL, '2020-12-14 23:58:44', '2020-12-14 23:58:44', '', '', '0.00', '', '0.00', ''),
(19, 22, 40, 7, 1, '700.00', '700.00', NULL, 'active', '4', NULL, '2020-12-14 23:58:55', '2020-12-14 23:58:55', '', '', '0.00', '', '0.00', ''),
(20, 23, 40, 7, 1, '700.00', '700.00', NULL, 'active', '4', NULL, '2020-12-14 23:59:36', '2020-12-14 23:59:36', '', '', '0.00', '', '0.00', ''),
(21, 24, 40, 7, 1, '700.00', '700.00', NULL, 'active', '4', NULL, '2020-12-15 00:00:50', '2020-12-15 00:00:50', '', '', '0.00', '', '0.00', ''),
(22, 25, 40, 7, 1, '700.00', '700.00', NULL, 'active', '4', NULL, '2020-12-15 00:01:23', '2020-12-15 00:01:23', '', '', '0.00', '', '0.00', ''),
(23, 26, 40, 7, 1, '700.00', '700.00', NULL, 'active', '4', NULL, '2020-12-15 00:01:56', '2020-12-15 00:01:56', '', '', '0.00', '', '0.00', ''),
(24, 27, 40, 7, 1, '700.00', '700.00', NULL, 'confirmed', '4', NULL, '2020-12-15 00:02:46', '2020-12-15 00:02:46', '', '', '0.00', '', '0.00', ''),
(25, 28, 40, 7, 1, '700.00', '700.00', NULL, 'confirmed', '4', NULL, '2020-12-15 00:07:28', '2020-12-15 00:07:28', '', '', '0.00', '', '0.00', ''),
(26, 29, 40, 7, 1, '700.00', '700.00', NULL, 'confirmed', '4', NULL, '2020-12-15 00:09:41', '2020-12-15 00:09:41', '', '', '0.00', '', '0.00', ''),
(27, 30, 19, 2, 1, '2000.00', '2000.00', NULL, 'confirmed', '4', NULL, '2020-12-15 00:48:36', '2020-12-15 00:48:36', '', '', '0.00', 'Free', '0.00', ''),
(28, 31, 20, 2, 1, '1000.00', '1000.00', NULL, 'confirmed', NULL, NULL, '2020-12-15 02:17:43', '2020-12-15 02:17:43', '', '', '0.00', 'Free', '0.00', ''),
(29, 32, 27, 2, 1, '590.00', '590.00', NULL, 'confirmed', NULL, NULL, '2020-12-15 21:50:06', '2020-12-15 21:50:06', '', '', '0.00', '', '0.00', ''),
(30, 33, 39, 7, 1, '700.00', '700.00', NULL, 'confirmed', '4', NULL, '2020-12-17 00:02:44', '2020-12-17 00:02:44', '', '', '0.00', '', '0.00', ''),
(31, 34, 36, 2, 1, '4350.00', '4350.00', NULL, 'active', NULL, NULL, '2020-12-17 00:45:16', '2020-12-17 00:45:16', '', '', '0.00', '', '0.00', ''),
(32, 35, 36, 2, 1, '4350.00', '4350.00', NULL, 'confirmed', NULL, NULL, '2020-12-17 00:46:00', '2020-12-17 00:46:00', '', '', '0.00', '', '0.00', ''),
(33, 36, 23, 2, 1, '500.00', '500.00', NULL, 'confirmed', NULL, NULL, '2020-12-17 00:59:16', '2020-12-17 00:59:16', '', '', '0.00', 'Free shipping', '0.00', ''),
(34, 37, 23, 2, 1, '500.00', '500.00', NULL, 'confirmed', NULL, NULL, '2020-12-17 01:02:26', '2020-12-17 01:02:26', '', '', '0.00', 'Free shipping', '0.00', ''),
(35, 38, 23, 2, 1, '500.00', '500.00', NULL, 'confirmed', NULL, NULL, '2020-12-17 01:03:52', '2020-12-17 01:03:52', '', '', '0.00', 'Free shipping', '0.00', ''),
(36, 39, 34, 2, 2, '980.00', '1960.00', NULL, 'confirmed', NULL, NULL, '2020-12-17 01:15:52', '2020-12-17 01:15:52', '', '', '0.00', '', '0.00', ''),
(37, 40, 37, 2, 1, '3250.00', '3250.00', NULL, 'confirmed', NULL, NULL, '2020-12-17 20:14:19', '2020-12-17 20:14:19', '', '', '0.00', '', '0.00', ''),
(38, 41, 37, 2, 1, '3250.00', '3250.00', NULL, 'active', '8', NULL, '2020-12-17 20:26:00', '2020-12-17 20:26:00', '', '', '0.00', '', '0.00', ''),
(39, 42, 37, 2, 1, '3250.00', '3250.00', NULL, 'active', '8', NULL, '2020-12-17 20:27:06', '2020-12-17 20:27:06', '', '', '0.00', '', '0.00', ''),
(40, 43, 37, 2, 1, '3250.00', '3250.00', NULL, 'active', '8', NULL, '2020-12-17 20:30:39', '2020-12-17 20:30:39', '', '', '0.00', '', '0.00', ''),
(41, 44, 37, 2, 1, '3250.00', '3250.00', NULL, 'confirmed', '8', NULL, '2020-12-17 20:31:39', '2020-12-17 20:31:39', '', '', '0.00', '', '0.00', ''),
(42, 45, 21, 2, 1, '650.00', '650.00', NULL, 'active', '8', NULL, '2020-12-17 20:46:10', '2020-12-17 20:46:10', '', '', '0.00', 'Free shipping', '0.00', ''),
(43, 46, 36, 2, 1, '4350.00', '4350.00', NULL, 'confirmed', NULL, NULL, '2020-12-17 21:29:46', '2020-12-17 21:29:46', '', '', '0.00', '', '0.00', ''),
(44, 47, 15, 2, 2, '4200.00', '8400.00', NULL, 'confirmed', NULL, NULL, '2020-12-17 21:37:04', '2020-12-17 21:37:04', '', '', '0.00', 'Free shipping', '0.00', ''),
(45, 48, 26, 2, 1, '890.00', '890.00', NULL, 'confirmed', NULL, NULL, '2020-12-26 14:42:31', '2020-12-26 14:42:31', '', '', '0.00', 'Free shipping', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_head`
--

CREATE TABLE `order_head` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `order_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total_price` decimal(10,4) DEFAULT NULL,
  `payment_type` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT 0.00,
  `discount_amount` decimal(10,2) DEFAULT 0.00,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','confirmed','processing','on_transit','delivered','delivery_failed','returned','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_head`
--

INSERT INTO `order_head` (`id`, `users_id`, `order_number`, `date`, `total_price`, `payment_type`, `shipping_method`, `shipping_cost`, `discount_amount`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 'QAF-20191210-000001', '2019-12-10', '1510.0000', 'paypal', NULL, '0.00', '0.00', NULL, 'confirmed', '4', '4', '2019-12-10 09:18:33', '2019-12-10 09:18:33'),
(2, 4, 'QAF-20191210-000002', '2019-12-10', '1285.0000', 'cash-on-delevery', NULL, '0.00', '0.00', NULL, 'pending', '4', '4', '2019-12-10 10:57:33', '2019-12-10 10:57:33'),
(3, 4, 'QAF-20191210-000003', '2019-12-10', '1285.0000', 'bank-transfer', NULL, '0.00', '0.00', NULL, 'confirmed', '4', '4', '2019-12-10 11:08:36', '2019-12-10 11:08:36'),
(4, 4, 'QAF-20200103-000004', '2020-12-15', '1585.0000', 'bkash', NULL, '0.00', '0.00', NULL, 'pending', '4', '4', '2020-01-03 11:09:28', '2020-01-03 11:09:28'),
(6, NULL, 'QAF-20200507-000006', '2020-05-07', '1585.0000', 'cash-on-delevery', NULL, '0.00', '0.00', NULL, 'pending', NULL, NULL, '2020-05-07 15:54:52', '2020-05-07 15:54:52'),
(7, NULL, 'QAF-20200507-000007', '2020-05-07', '1600.0000', 'nagad', NULL, '0.00', '0.00', NULL, 'pending', NULL, NULL, '2020-05-07 16:43:58', '2020-05-07 16:43:58'),
(8, NULL, 'QAF-20200508-000008', '2020-05-08', '8100.0000', 'bkash', NULL, '0.00', '0.00', NULL, 'pending', NULL, NULL, '2020-05-08 17:59:41', '2020-05-08 17:59:41'),
(10, NULL, 'AFS-20201213-000010', '2020-12-13', '4430.0000', 'bkash', 'Basic', '80.00', '0.00', NULL, 'pending', '1', '1', '2020-12-13 05:17:38', '2020-12-13 05:17:38'),
(11, NULL, 'AFS-20201213-000011', '2020-12-13', '4980.0000', 'nagad', 'Basic', '80.00', '0.00', NULL, 'pending', '1', '1', '2020-12-13 05:41:35', '2020-12-13 05:41:35'),
(12, NULL, 'AFS-20201215-000012', '2020-12-15', '3350.0000', 'nagad', 'Courier', '100.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-14 22:09:13', '2020-12-14 22:09:13'),
(13, 4, 'AFS-20201215-000013', '2020-12-15', '4980.0000', 'bkash', 'Basic', '80.00', '100.00', NULL, 'pending', '4', '4', '2020-12-14 22:40:18', '2020-12-14 22:40:18'),
(14, 4, 'AFS-20201215-000014', '2020-12-15', '80.0000', 'bkash', 'Basic', '80.00', '0.00', NULL, 'pending', '4', '4', '2020-12-14 22:54:11', '2020-12-14 22:54:11'),
(15, 4, 'AFS-20201215-000015', '2020-12-15', '80.0000', 'bkash', 'Basic', '80.00', '0.00', NULL, 'pending', '4', '4', '2020-12-14 22:54:37', '2020-12-14 22:54:37'),
(16, 4, 'AFS-20201215-000016', '2020-12-15', '4000.0000', 'nagad', 'Courier', '100.00', '100.00', NULL, 'pending', '4', '4', '2020-12-14 23:02:49', '2020-12-14 23:02:49'),
(17, 4, 'AFS-20201215-000017', '2020-12-15', '990.0000', 'nagad', 'Courier', '100.00', '100.00', NULL, 'pending', '4', '4', '2020-12-14 23:48:48', '2020-12-14 23:48:48'),
(18, 4, 'AFS-20201215-000018', '2020-12-15', '990.0000', 'nagad', 'Courier', '100.00', '0.00', NULL, 'pending', '4', '4', '2020-12-14 23:54:04', '2020-12-14 23:54:04'),
(19, 4, 'AFS-20201215-000019', '2020-12-15', '800.0000', 'nagad', 'Courier', '100.00', '100.00', NULL, 'pending', '4', '4', '2020-12-14 23:55:33', '2020-12-14 23:55:33'),
(20, 4, 'AFS-20201215-000020', '2020-12-15', '780.0000', 'nagad', 'Basic', '80.00', '100.00', NULL, 'pending', '4', '4', '2020-12-14 23:58:26', '2020-12-14 23:58:26'),
(21, 4, 'AFS-20201215-000021', '2020-12-15', '800.0000', 'nagad', 'Courier', '100.00', '0.00', NULL, 'pending', '4', '4', '2020-12-14 23:58:44', '2020-12-14 23:58:44'),
(22, 4, 'AFS-20201215-000022', '2020-12-15', '800.0000', 'nagad', 'Courier', '100.00', '0.00', NULL, 'pending', '4', '4', '2020-12-14 23:58:55', '2020-12-14 23:58:55'),
(23, 4, 'AFS-20201215-000023', '2020-12-15', '800.0000', 'nagad', 'Courier', '100.00', '0.00', NULL, 'pending', '4', '4', '2020-12-14 23:59:36', '2020-12-14 23:59:36'),
(24, 4, 'AFS-20201215-000024', '2020-12-15', '780.0000', 'nagad', 'Basic', '80.00', '0.00', NULL, 'pending', '4', '4', '2020-12-15 00:00:50', '2020-12-15 00:00:50'),
(25, 4, 'AFS-20201215-000025', '2020-12-15', '780.0000', 'nagad', 'Basic', '80.00', '0.00', NULL, 'pending', '4', '4', '2020-12-15 00:01:23', '2020-12-15 00:01:23'),
(26, 4, 'AFS-20201215-000026', '2020-12-15', '780.0000', 'nagad', 'Basic', '80.00', '100.00', NULL, 'pending', '4', '4', '2020-12-15 00:01:56', '2020-12-15 00:01:56'),
(27, 4, 'AFS-20201215-000027', '2020-12-15', '780.0000', 'bkash', 'Basic', '80.00', '100.00', NULL, 'pending', '4', '4', '2020-12-15 00:02:46', '2020-12-15 00:02:46'),
(28, 4, 'AFS-20201215-000028', '2020-12-15', '780.0000', 'bkash', 'Basic', '80.00', '0.00', NULL, 'pending', '4', '4', '2020-12-15 00:07:28', '2020-12-15 00:07:28'),
(29, 4, 'AFS-20201215-000029', '2020-12-15', '780.0000', 'nagad', 'Basic', '80.00', '100.00', NULL, 'pending', '4', '4', '2020-12-15 00:09:41', '2020-12-15 00:09:41'),
(30, 4, 'AFS-20201215-000030', '2020-12-15', '2080.0000', 'bkash', 'Basic', '80.00', '100.00', NULL, 'pending', '4', '4', '2020-12-15 00:48:36', '2020-12-15 00:48:36'),
(31, NULL, 'AFS-20201215-000031', '2020-12-15', '1080.0000', 'bkash', 'Basic', '80.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-15 02:17:43', '2020-12-15 02:17:43'),
(32, NULL, 'AFS-20201215-000032', '2020-12-15', '670.0000', 'bkash', 'Basic', '80.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-15 21:50:06', '2020-12-15 21:50:06'),
(33, 4, 'AFS-20201216-000033', '2020-12-16', '820.0000', 'nagad', 'SA Paribahan', '120.00', '0.00', NULL, 'pending', '4', '4', '2020-12-17 00:02:44', '2020-12-17 00:02:44'),
(34, NULL, 'AFS-20201216-000034', '2020-12-16', '4430.0000', 'bkash', 'Afshini', '80.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 00:45:16', '2020-12-17 00:45:16'),
(35, NULL, 'AFS-20201216-000035', '2020-12-16', '4430.0000', 'bkash', 'Afshini', '80.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 00:46:00', '2020-12-17 00:46:00'),
(36, NULL, 'AFS-20201216-000036', '2020-12-16', '600.0000', 'bkash', 'Sundarban', '100.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 00:59:16', '2020-12-17 00:59:16'),
(37, NULL, 'AFS-20201216-000037', '2020-12-16', '580.0000', 'bkash', 'Afshini', '80.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 01:02:26', '2020-12-17 01:02:26'),
(38, NULL, 'AFS-20201216-000038', '2020-12-16', '620.0000', 'nagad', 'SA Paribahan', '120.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 01:03:52', '2020-12-17 01:03:52'),
(39, NULL, 'AFS-20201216-000039', '2020-12-16', '2040.0000', 'bkash', 'Afshini', '80.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 01:15:52', '2020-12-17 01:15:52'),
(40, NULL, 'AFS-20201217-000040', '2020-12-17', '3330.0000', 'bkash', 'Afshini', '80.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 20:14:19', '2020-12-17 20:14:19'),
(41, 8, 'AFS-20201217-000041', '2020-12-17', '3330.0000', 'nagad', 'Afshini', '80.00', '0.00', NULL, 'pending', '8', '8', '2020-12-17 20:26:00', '2020-12-17 20:26:00'),
(42, 8, 'AFS-20201217-000042', '2020-12-17', '3330.0000', 'nagad', 'Afshini', '80.00', '0.00', NULL, 'pending', '8', '8', '2020-12-17 20:27:06', '2020-12-17 20:27:06'),
(43, 8, 'AFS-20201217-000043', '2020-12-17', '3350.0000', 'bkash', 'Sundarban', '100.00', '0.00', NULL, 'pending', '8', '8', '2020-12-17 20:30:39', '2020-12-17 20:30:39'),
(44, 8, 'AFS-20201217-000044', '2020-12-17', '3330.0000', 'nagad', 'Afshini', '80.00', '0.00', NULL, 'pending', '8', '8', '2020-12-17 20:31:39', '2020-12-17 20:31:39'),
(45, 8, 'AFS-20201217-000045', '2020-12-17', '770.0000', 'bkash', 'SA Paribahan', '120.00', '0.00', NULL, 'pending', '8', '8', '2020-12-17 20:46:10', '2020-12-17 20:46:10'),
(46, NULL, 'AFS-20201217-000046', '2020-12-17', '4430.0000', 'bkash', 'Afshini', '80.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 21:29:46', '2020-12-17 21:29:46'),
(47, NULL, 'AFS-20201217-000047', '2020-12-17', '8400.0000', 'nagad', 'Free shipping', '0.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-17 21:37:04', '2020-12-17 21:37:04'),
(48, NULL, 'AFS-20201226-000048', '2020-12-26', '990.0000', 'bkash', 'Sundarban', '100.00', '0.00', NULL, 'pending', NULL, NULL, '2020-12-26 14:42:31', '2020-12-26 14:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping`
--

CREATE TABLE `order_shipping` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_head_id` int(10) UNSIGNED NOT NULL,
  `type` enum('billing','shipping') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `city` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_shipping`
--

INSERT INTO `order_shipping` (`id`, `order_head_id`, `type`, `name`, `lastname`, `email`, `address`, `country`, `city`, `area`, `zip`, `phone`, `fax`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'billing', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '1712004426', NULL, NULL, '4', NULL, '2019-12-10 09:18:33', '2019-12-10 09:18:33'),
(2, 1, 'shipping', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '1712004426', NULL, NULL, '4', NULL, '2019-12-10 09:18:33', '2019-12-10 09:18:33'),
(3, 2, 'billing', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '1712004426', NULL, NULL, '4', NULL, '2019-12-10 10:57:33', '2019-12-10 10:57:33'),
(4, 2, 'shipping', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '1712004426', NULL, NULL, '4', NULL, '2019-12-10 10:57:33', '2019-12-10 10:57:33'),
(5, 3, 'billing', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '1712004426', NULL, NULL, '4', NULL, '2019-12-10 11:08:36', '2019-12-10 11:08:36'),
(6, 3, 'shipping', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '1712004426', NULL, NULL, '4', NULL, '2019-12-10 11:08:36', '2019-12-10 11:08:36'),
(7, 4, 'billing', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '1712004426', NULL, NULL, '4', NULL, '2020-01-03 11:09:28', '2020-01-03 11:09:28'),
(8, 4, 'shipping', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '1712004426', NULL, NULL, '4', NULL, '2020-01-03 11:09:28', '2020-01-03 11:09:28'),
(11, 6, 'billing', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '+8801712004426', NULL, NULL, NULL, NULL, '2020-05-07 15:54:52', '2020-05-07 15:54:52'),
(12, 6, 'shipping', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '+8801712004426', NULL, NULL, NULL, NULL, '2020-05-07 15:54:52', '2020-05-07 15:54:52'),
(13, 7, 'billing', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '+8801712004426', NULL, NULL, NULL, NULL, '2020-05-07 16:43:58', '2020-05-07 16:43:58'),
(14, 7, 'shipping', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '+8801712004426', NULL, NULL, NULL, NULL, '2020-05-07 16:43:58', '2020-05-07 16:43:58'),
(15, 8, 'billing', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '+8801712004426', NULL, NULL, NULL, NULL, '2020-05-08 17:59:41', '2020-05-08 17:59:41'),
(16, 8, 'shipping', 'Abdur Rahman', NULL, 'itgensoft@gmail.com', '3/13 MN Road\r\nShantiNagar', NULL, NULL, NULL, NULL, '+8801712004426', NULL, NULL, NULL, NULL, '2020-05-08 17:59:41', '2020-05-08 17:59:41'),
(19, 10, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, '1', NULL, '2020-12-13 05:17:38', '2020-12-13 05:17:38'),
(20, 10, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, '1', NULL, '2020-12-13 05:17:38', '2020-12-13 05:17:38'),
(21, 11, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, '1', NULL, '2020-12-13 05:41:35', '2020-12-13 05:41:35'),
(22, 11, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, '1', NULL, '2020-12-13 05:41:35', '2020-12-13 05:41:35'),
(23, 12, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-14 22:09:13', '2020-12-14 22:09:13'),
(24, 12, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-14 22:09:13', '2020-12-14 22:09:13'),
(25, 13, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 22:40:18', '2020-12-14 22:40:18'),
(26, 13, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 22:40:18', '2020-12-14 22:40:18'),
(27, 14, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 22:54:11', '2020-12-14 22:54:11'),
(28, 14, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 22:54:11', '2020-12-14 22:54:11'),
(29, 15, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 22:54:37', '2020-12-14 22:54:37'),
(30, 15, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 22:54:37', '2020-12-14 22:54:37'),
(31, 16, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:02:49', '2020-12-14 23:02:49'),
(32, 16, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:02:49', '2020-12-14 23:02:49'),
(33, 17, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:48:48', '2020-12-14 23:48:48'),
(34, 17, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:48:48', '2020-12-14 23:48:48'),
(35, 18, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:54:04', '2020-12-14 23:54:04'),
(36, 18, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:54:04', '2020-12-14 23:54:04'),
(37, 19, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:55:33', '2020-12-14 23:55:33'),
(38, 19, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:55:33', '2020-12-14 23:55:33'),
(39, 20, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:58:26', '2020-12-14 23:58:26'),
(40, 20, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:58:26', '2020-12-14 23:58:26'),
(41, 21, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:58:44', '2020-12-14 23:58:44'),
(42, 21, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:58:44', '2020-12-14 23:58:44'),
(43, 22, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:58:55', '2020-12-14 23:58:55'),
(44, 22, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:58:55', '2020-12-14 23:58:55'),
(45, 23, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:59:36', '2020-12-14 23:59:36'),
(46, 23, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-14 23:59:36', '2020-12-14 23:59:36'),
(47, 24, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:00:50', '2020-12-15 00:00:50'),
(48, 24, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:00:50', '2020-12-15 00:00:50'),
(49, 25, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:01:23', '2020-12-15 00:01:23'),
(50, 25, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:01:23', '2020-12-15 00:01:23'),
(51, 26, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:01:56', '2020-12-15 00:01:56'),
(52, 26, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:01:56', '2020-12-15 00:01:56'),
(53, 27, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:02:46', '2020-12-15 00:02:46'),
(54, 27, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:02:46', '2020-12-15 00:02:46'),
(55, 28, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:07:28', '2020-12-15 00:07:28'),
(56, 28, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:07:28', '2020-12-15 00:07:28'),
(57, 29, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:09:41', '2020-12-15 00:09:41'),
(58, 29, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:09:41', '2020-12-15 00:09:41'),
(59, 30, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:48:36', '2020-12-15 00:48:36'),
(60, 30, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-15 00:48:36', '2020-12-15 00:48:36'),
(61, 31, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-15 02:17:43', '2020-12-15 02:17:43'),
(62, 31, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-15 02:17:43', '2020-12-15 02:17:43'),
(63, 32, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-15 21:50:06', '2020-12-15 21:50:06'),
(64, 32, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-15 21:50:06', '2020-12-15 21:50:06'),
(65, 33, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-17 00:02:44', '2020-12-17 00:02:44'),
(66, 33, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Tangail', 'Dhaka', '1980', '01712004426', NULL, NULL, '4', NULL, '2020-12-17 00:02:44', '2020-12-17 00:02:44'),
(67, 34, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 00:45:16', '2020-12-17 00:45:16'),
(68, 34, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 00:45:16', '2020-12-17 00:45:16'),
(69, 35, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 00:46:00', '2020-12-17 00:46:00'),
(70, 35, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 00:46:00', '2020-12-17 00:46:00'),
(71, 36, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 00:59:16', '2020-12-17 00:59:16'),
(72, 36, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 00:59:16', '2020-12-17 00:59:16'),
(73, 37, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 01:02:26', '2020-12-17 01:02:26'),
(74, 37, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 01:02:26', '2020-12-17 01:02:26'),
(75, 38, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 01:03:52', '2020-12-17 01:03:52'),
(76, 38, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 01:03:52', '2020-12-17 01:03:52'),
(77, 39, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 01:15:52', '2020-12-17 01:15:52'),
(78, 39, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 01:15:52', '2020-12-17 01:15:52'),
(79, 40, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 20:14:19', '2020-12-17 20:14:19'),
(80, 40, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 20:14:19', '2020-12-17 20:14:19'),
(81, 41, 'billing', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:26:00', '2020-12-17 20:26:00'),
(82, 41, 'shipping', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:26:00', '2020-12-17 20:26:00'),
(83, 42, 'billing', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:27:06', '2020-12-17 20:27:06'),
(84, 42, 'shipping', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:27:06', '2020-12-17 20:27:06'),
(85, 43, 'billing', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:30:39', '2020-12-17 20:30:39'),
(86, 43, 'shipping', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:30:39', '2020-12-17 20:30:39'),
(87, 44, 'billing', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:31:39', '2020-12-17 20:31:39'),
(88, 44, 'shipping', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:31:39', '2020-12-17 20:31:39'),
(89, 45, 'billing', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:46:10', '2020-12-17 20:46:10'),
(90, 45, 'shipping', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, '8', NULL, '2020-12-17 20:46:10', '2020-12-17 20:46:10'),
(91, 46, 'billing', 'abdur', 'rahman', 'webartbd@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 21:29:46', '2020-12-17 21:29:46'),
(92, 46, 'shipping', 'abdur', 'rahman', 'webartbd@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 21:29:46', '2020-12-17 21:29:46'),
(93, 47, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 21:37:04', '2020-12-17 21:37:04'),
(94, 47, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-17 21:37:04', '2020-12-17 21:37:04'),
(95, 48, 'billing', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-26 14:42:31', '2020-12-26 14:42:31'),
(96, 48, 'shipping', 'abdur', 'rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', NULL, 'Dhaka', 'Dhaka', '1213', '01712004426', NULL, NULL, NULL, NULL, '2020-12-26 14:42:31', '2020-12-26 14:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

CREATE TABLE `order_transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_head_id` int(10) UNSIGNED DEFAULT NULL,
  `transaction_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,4) DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seller_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_transaction`
--

INSERT INTO `order_transaction` (`id`, `order_head_id`, `transaction_number`, `payment_type`, `date`, `amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `seller_id`) VALUES
(1, 1, 'itgen@gmail.com', 'paypal', '2019-12-10', '1510.0000', 'active', '4', NULL, '2019-12-10 09:18:33', '2019-12-10 09:18:33', 2),
(2, 2, NULL, 'cash-on-delevery', '2019-12-10', '1285.0000', 'inactive', '4', NULL, '2019-12-10 10:57:33', '2019-12-10 10:57:33', 2),
(3, 3, NULL, 'bank-transfer', '2019-12-10', '1285.0000', 'active', '4', NULL, '2019-12-10 11:08:36', '2019-12-10 11:08:36', 2),
(4, 4, '13', 'bkash', '2020-12-15', '1585.0000', 'active', '4', NULL, '2020-01-03 11:09:28', '2020-01-03 11:09:28', 2),
(5, 6, NULL, 'cash-on-delevery', '2020-05-07', '1585.0000', 'inactive', NULL, NULL, '2020-05-07 15:54:52', '2020-05-07 15:54:52', 2),
(6, 7, '212', 'nagad', '2020-05-07', '1600.0000', 'active', NULL, NULL, '2020-05-07 16:43:58', '2020-05-07 16:43:58', 2),
(7, 8, '1234', 'bkash', '2020-05-08', '8100.0000', 'inactive', NULL, '2', '2020-05-08 17:59:41', '2020-05-08 18:02:38', 2),
(9, 10, '12004426', 'bkash', '2020-12-13', '4470.0000', 'active', '1', NULL, '2020-12-13 05:17:38', '2020-12-13 05:17:38', 2),
(10, 11, '54354', 'nagad', '2020-12-13', '4900.0000', 'active', '1', NULL, '2020-12-13 05:41:35', '2020-12-13 05:41:35', 2),
(11, 12, '2222', 'nagad', '2020-12-15', '3250.0000', 'active', NULL, NULL, '2020-12-14 22:09:13', '2020-12-14 22:09:13', 2),
(12, 13, '333', 'bkash', '2020-12-15', '4900.0000', 'active', '4', NULL, '2020-12-14 22:40:18', '2020-12-14 22:40:18', 2),
(13, 16, NULL, 'nagad', '2020-12-15', '3900.0000', 'inactive', '4', NULL, '2020-12-14 23:02:49', '2020-12-14 23:02:49', 2),
(14, 17, NULL, 'nagad', '2020-12-15', '890.0000', 'inactive', '4', NULL, '2020-12-14 23:48:48', '2020-12-14 23:48:48', 2),
(15, 18, NULL, 'nagad', '2020-12-15', '890.0000', 'inactive', '4', NULL, '2020-12-14 23:54:04', '2020-12-14 23:54:04', 2),
(16, 19, NULL, 'nagad', '2020-12-15', '700.0000', 'inactive', '4', NULL, '2020-12-14 23:55:33', '2020-12-14 23:55:33', 7),
(17, 20, NULL, 'nagad', '2020-12-15', '700.0000', 'inactive', '4', NULL, '2020-12-14 23:58:26', '2020-12-14 23:58:26', 7),
(18, 21, NULL, 'nagad', '2020-12-15', '700.0000', 'inactive', '4', NULL, '2020-12-14 23:58:44', '2020-12-14 23:58:44', 7),
(19, 22, NULL, 'nagad', '2020-12-15', '700.0000', 'inactive', '4', NULL, '2020-12-14 23:58:55', '2020-12-14 23:58:55', 7),
(20, 23, NULL, 'nagad', '2020-12-15', '700.0000', 'inactive', '4', NULL, '2020-12-14 23:59:36', '2020-12-14 23:59:36', 7),
(21, 24, NULL, 'nagad', '2020-12-15', '700.0000', 'inactive', '4', NULL, '2020-12-15 00:00:50', '2020-12-15 00:00:50', 7),
(22, 25, NULL, 'nagad', '2020-12-15', '700.0000', 'inactive', '4', NULL, '2020-12-15 00:01:23', '2020-12-15 00:01:23', 7),
(23, 26, NULL, 'nagad', '2020-12-15', '700.0000', 'inactive', '4', NULL, '2020-12-15 00:01:56', '2020-12-15 00:01:56', 7),
(24, 27, '777', 'bkash', '2020-12-15', '700.0000', 'active', '4', NULL, '2020-12-15 00:02:46', '2020-12-15 00:02:46', 7),
(25, 28, '6666', 'bkash', '2020-12-15', '700.0000', 'active', '4', NULL, '2020-12-15 00:07:28', '2020-12-15 00:07:28', 7),
(26, 29, '5555', 'nagad', '2020-12-15', '700.0000', 'active', '4', NULL, '2020-12-15 00:09:41', '2020-12-15 00:09:41', 7),
(27, 30, '888', 'bkash', '2020-12-15', '2000.0000', 'active', '4', NULL, '2020-12-15 00:48:36', '2020-12-15 00:48:36', 2),
(28, 31, '9999', 'bkash', '2020-12-15', '1000.0000', 'active', NULL, NULL, '2020-12-15 02:17:43', '2020-12-15 02:17:43', 2),
(29, 32, '789', 'bkash', '2020-12-15', '590.0000', 'active', NULL, NULL, '2020-12-15 21:50:06', '2020-12-15 21:50:06', 2),
(30, 33, '1234', 'nagad', '2020-12-16', '700.0000', 'active', '4', NULL, '2020-12-17 00:02:45', '2020-12-17 00:02:45', 7),
(31, 34, NULL, 'bkash', '2020-12-16', '4350.0000', 'inactive', NULL, NULL, '2020-12-17 00:45:16', '2020-12-17 00:45:16', 2),
(32, 35, '222', 'bkash', '2020-12-16', '4350.0000', 'active', NULL, NULL, '2020-12-17 00:46:00', '2020-12-17 00:46:00', 2),
(33, 36, '1111', 'bkash', '2020-12-16', '500.0000', 'active', NULL, NULL, '2020-12-17 00:59:16', '2020-12-17 00:59:16', 2),
(34, 37, '888', 'bkash', '2020-12-16', '500.0000', 'active', NULL, NULL, '2020-12-17 01:02:26', '2020-12-17 01:02:26', 2),
(35, 38, '666', 'nagad', '2020-12-16', '500.0000', 'active', NULL, NULL, '2020-12-17 01:03:52', '2020-12-17 01:03:52', 2),
(36, 39, '999', 'bkash', '2020-12-16', '1960.0000', 'active', NULL, NULL, '2020-12-17 01:15:52', '2020-12-17 01:15:52', 2),
(37, 40, '2222', 'bkash', '2020-12-17', '3250.0000', 'active', NULL, NULL, '2020-12-17 20:14:19', '2020-12-17 20:14:19', 2),
(38, 41, NULL, 'nagad', '2020-12-17', '3250.0000', 'inactive', '8', NULL, '2020-12-17 20:26:00', '2020-12-17 20:26:00', 2),
(39, 42, NULL, 'nagad', '2020-12-17', '3250.0000', 'inactive', '8', NULL, '2020-12-17 20:27:06', '2020-12-17 20:27:06', 2),
(40, 43, NULL, 'bkash', '2020-12-17', '3250.0000', 'inactive', '8', NULL, '2020-12-17 20:30:39', '2020-12-17 20:30:39', 2),
(41, 44, '1', 'nagad', '2020-12-17', '3250.0000', 'active', '8', NULL, '2020-12-17 20:31:39', '2020-12-17 20:31:39', 2),
(42, 45, NULL, 'bkash', '2020-12-17', '650.0000', 'inactive', '8', NULL, '2020-12-17 20:46:10', '2020-12-17 20:46:10', 2),
(43, 46, '777', 'bkash', '2020-12-17', '4350.0000', 'active', NULL, NULL, '2020-12-17 21:29:46', '2020-12-17 21:29:46', 2),
(44, 47, '888', 'nagad', '2020-12-17', '8400.0000', 'active', NULL, NULL, '2020-12-17 21:37:04', '2020-12-17 21:37:04', 2),
(45, 48, '123456', 'bkash', '2020-12-26', '890.0000', 'active', NULL, NULL, '2020-12-26 14:42:31', '2020-12-26 14:42:31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

CREATE TABLE `payment_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_options`
--

INSERT INTO `payment_options` (`id`, `payment_type`, `account_number`, `account_details`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'cash-on-delevery', '01712004426', 'Cash on delivery (COD) is a type of transaction in which the recipient makes payment for a good at the time of delivery', 'active', '1', '1', '2019-12-06 08:32:55', '2021-01-17 00:09:35'),
(2, 'paypal', 'qafzone@gmail.com', 'Buy using your credit cards, debit cards, prepaid cards and PayPal Credit.', 'inactive', '1', '1', '2019-12-06 08:33:05', '2020-12-13 03:50:46'),
(3, 'card-payment', 'qafzone@gmail.com', 'Buy using your credit cards, debit cards, prepaid cards and PayPal Credit.', 'cancel', '1', '1', '2019-12-06 08:33:35', '2019-12-06 08:48:24'),
(4, 'bank-transfer', '103103210204', 'You can transfer funds from your Bank account, directly to our local bank account.', 'cancel', '1', '1', '2019-12-06 08:33:47', '2019-12-06 08:45:54'),
(5, 'bkash', '01712004426', 'Buy using your Bkash Account', 'active', '1', '1', '2020-05-07 16:04:12', '2020-05-07 16:04:12'),
(6, 'nagad', '01712004426', 'Buy using your Nagad Account', 'active', '1', '1', '2020-05-07 16:04:41', '2020-05-07 16:04:41'),
(7, 'rocket', '01712004426', 'Buy using your Rocket Account', 'inactive', '1', NULL, '2020-12-13 00:49:20', '2020-12-13 00:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('simple-product','configurable-product','group-product') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_no` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_price` decimal(10,4) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `list_price` decimal(10,4) DEFAULT NULL,
  `attribute_set_id` int(10) UNSIGNED DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_guide` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type`, `title`, `slug`, `item_no`, `is_featured`, `batch`, `sell_price`, `old_price`, `list_price`, `attribute_set_id`, `short_description`, `description`, `specification`, `size_guide`, `status`, `seller_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'simple-product', 'Joust Duffle Bag', 'joust-duffle-bag', '123', '', NULL, '1200.0000', '0.00', '1000.0000', 3, 'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anyway', '<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n<span>Side mesh pocket.</span>\r\n<span>Cell phone pocket on strap.</span>\r\n<span>Adjustable shoulder strap and top carry handle.</span>', 'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.', NULL, 'active', 5, '5', '1', '2019-07-03 19:01:36', '2020-05-08 17:16:21'),
(2, 'simple-product', 'Strive Shoulder Pack', 'strive-shoulder-pack', '124', '', NULL, '1200.0000', '0.00', '500.0000', 3, 'Convenience is next to nothing when your day is crammed with action. So whether you\'re heading today.', '<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n <span>Side mesh pocket.</span>\r\n <span>Cell phone pocket on strap.</span>\r\n <span>Adjustable shoulder strap and top carry handle.</span>', 'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.', NULL, 'active', 5, '5', '1', '2019-07-03 19:35:41', '2020-05-08 17:14:33'),
(3, 'simple-product', 'Crown Summit Backpack', 'crown-summit-backpack', '125', '', NULL, '1000.0000', '0.00', '600.0000', 3, 'The Crown Summit Backpack is equally at home in a gym locker, study cube or a pup tent, so be submit.', '<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n<span>Side mesh pocket.</span>\r\n<span>Cell phone pocket on strap.</span>\r\n<span>Adjustable shoulder strap and top carry handle.</span>', 'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.', NULL, 'active', 5, '5', '1', '2019-07-03 19:39:40', '2020-05-08 17:16:27'),
(4, 'simple-product', 'Wayfarer Messenger Bag', 'wayfarer-messenger-bag', '126', '', NULL, '800.0000', '0.00', '750.0000', 3, 'The Rival Field Messenger packs all your campus, studio or trail essentials inside a unique designs.', '<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n<span>Side mesh pocket.</span>\r\n<span>Cell phone pocket on strap.</span>\r\n<span>Adjustable shoulder strap and top carry handle.</span>', 'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.', NULL, 'active', 5, '5', '1', '2019-07-03 19:44:08', '2020-05-08 17:14:29'),
(5, 'configurable-product', 'Strive Shoulder Pack', 'strive-shoulder-pack-2', '127', 'no', NULL, '900.0000', '0.00', '800.0000', 3, 'Convenience is next to nothing when your day is crammed with action. So whether you\'re heading today.', '<p>Convenience is next to nothing when your day is crammed with action. So whether you\'re heading to class, gym, or the unbeaten path, make sure you\'ve got your Strive Shoulder Pack stuffed with all your essentials, and extras as well.</p>\r\n<span>Zippered main compartment.</span>\r\n<span>Front zippered pocket.</span>\r\n<span>Side mesh pocket.</span>\r\n<span>Cell phone pocket on strap.</span>\r\n<span>Adjustable shoulder strap and top carry handle.</span>', 'The sporty Joust Duffle Bag can\'t be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare, it\'s ideal for athletes with places to go.', NULL, 'active', 5, '5', '2', '2019-07-03 19:47:18', '2020-05-08 17:50:38'),
(6, 'group-product', 'Azure Embroidered Net Unstitched Kurties AZU20F Berrylicious 01 - Formal Luxury Collection', 'azure-embroidered-net-unstitched-kurties-azu20ormal-luxury-collection', '128', 'yes', NULL, '5000.0000', '0.00', '4000.0000', 3, 'Azure Embroidered Net Unstitched Kurties AZU20F Berrylicious 01 - Formal Luxury Collection', 'Kurties Embroidered Unstitched from Azure Embroidered Luxury Formal One Piece Eid Collection\r\nManufacturer: Azure\r\n\r\nShirt Fabric: Net', 'Shirt Fabric: Net', NULL, 'active', 5, '5', '2', '2019-07-03 19:53:32', '2020-05-08 16:39:47'),
(7, 'configurable-product', 'Azure Embroidered Chiffon Unstitched Kurties AZU20F Majestic Bloom 08 - Formal Luxury Collection', 'azure-embroidered-chiffonformal-luxury-collection', '129', 'yes', 'batch', '5000.0000', '0.00', '4000.0000', 3, 'Azure Embroidered Chiffon Unstitched Kurties AZU20F Majestic Bloom 08 - Formal Luxury Collection', 'Kurties Embroidered Unstitched from Azure Embroidered Luxury Formal One Piece Eid Collection\r\nManufacturer: Azure\r\n\r\nShirt Fabric: Chiffon', 'Shirt Fabric: Chiffon', NULL, 'active', 2, '2', '2', '2019-07-03 19:56:50', '2021-01-14 07:05:11'),
(8, 'simple-product', 'Azure Embroidered Cotton Net Unstitched Kurties AZU20F Morning Bud 09 - Formal Luxury Collection', 'azureu20f-morningformal-luxury-collection', '130', 'yes', NULL, '5000.0000', '0.00', '4000.0000', 3, 'Azure Embroidered Cotton Net Unstitched Kurties AZU20F Morning Bud 09 - Formal Luxury Collection', 'Kurties Embroidered Unstitched from Azure Embroidered Luxury Formal One Piece Eid Collection\r\nManufacturer: Azure\r\n\r\nShirt Fabric: Cotton Net\r\n\r\nCatalog: Azure Embroidered Luxury Formal One Piece Eid Collection 2020', 'Shirt Fabric: Cotton Net', NULL, 'active', 2, '2', '1', '2019-07-03 20:00:02', '2020-12-27 20:51:30'),
(9, 'group-product', 'Serene Premium Embroidered Chiffon Unstitched 3 Piece Suit SMP20BL 1004 - Luxury Collection', 'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl', '131', 'yes', NULL, '7500.0000', '0.00', '7000.0000', 3, '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium', '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium\r\n\r\nShirt Fabric: Chiffon\r\n\r\nCatalog: Serene Premium Beaux Reves Luxury Collection 2020', 'Shirt Fabric: Chiffon', NULL, 'active', 2, '2', '1', '2019-07-03 20:06:40', '2020-12-27 20:51:38'),
(10, 'group-product', 'Serene Premium Embroidered Chiffon Unstitched 3 Piece Suit SMP20BL 1005 - Luxury Collection', 'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-100', '133', 'yes', NULL, '8000.0000', '0.00', '7000.0000', 3, '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium', '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium\r\n\r\nShirt Fabric: Chiffon\r\n\r\nCatalog: Serene Premium Beaux Reves Luxury Collection 2020', 'Shirt Fabric: Chiffon', NULL, 'active', 2, '2', '1', '2019-10-17 10:13:54', '2020-05-08 17:15:39'),
(11, 'configurable-product', 'Men\'s Casual Shirt INDIGO DENIM', 'mens-casual-shirt-indigo', '134', NULL, NULL, '1500.0000', '0.00', '1200.0000', 2, 'aaaa', 'aa', 'aaa', NULL, 'cancel', 5, '5', '1', '2019-10-18 11:26:06', '2020-05-08 17:12:45'),
(12, 'simple-product', 'Serene Premium Embroidered Chiffon Unstitched 3 Piece Suit SMP20BL 1006 - Luxury Collection', 'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-100-luxury-collection', '137', 'yes', NULL, '8000.0000', '0.00', '7000.0000', 2, '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium', '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium\r\n\r\nShirt Fabric: Chiffon\r\n\r\nCatalog: Serene Premium Beaux Reves Luxury Collection 2020', 'Shirt Fabric: Chiffon', NULL, 'active', 2, '2', '1', '2019-10-25 08:27:40', '2020-05-08 17:15:37'),
(13, 'simple-product', 'JOHRA PINKS Pakistani Brand', 'johra-pinks-pakistani-brand', '2001', '', NULL, '4200.0000', '0.00', '4000.0000', 2, 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', NULL, 'active', 2, '2', '1', '2020-06-07 01:20:12', '2020-12-27 20:49:51'),
(14, 'simple-product', 'JOHRA PINKS Pakistani Brand', 'johra-pinks-pakistani-brand-02', '2002', '', NULL, '4200.0000', '0.00', '4000.0000', 2, 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', NULL, 'active', 2, '2', '1', '2020-06-07 01:47:38', '2020-12-27 20:49:04'),
(15, 'configurable-product', 'JOHRA PINKS Pakistani Brand', 'johra-pinks-pakistani-brand-03', '2003', 'no', 'batch', '4200.0000', '4200.00', '4000.0000', 2, 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', 'Fabric: Swiss Voile\r\nEmbroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', NULL, 'active', 2, '2', '2', '2020-06-07 01:51:23', '2021-01-15 01:59:01'),
(16, 'group-product', 'Single Piece New Collection', 'single-piece-new-collection', '2004', '', NULL, '2000.0000', '0.00', '2000.0000', 2, 'Single Piece New Collection', 'Single Piece New Collection\r\nFabrics: Georgette \r\nWork: Embroidery/ with Puthi or stone work.', 'Fabrics: Georgette', NULL, 'active', 2, '2', '1', '2020-06-09 10:07:31', '2020-12-27 20:48:50'),
(17, 'simple-product', 'Pakistani Brand: Ferdaus', 'pakistani-brand-ferdaus', '2005', 'no', 'batch', '2000.0000', '0.00', '2000.0000', 2, 'Pakistani Brand: Ferdaus', 'Pakistani Brand: Ferdaus\r\nOrna: Chiffon\r\nKameez: Lawn with Digital Print+ Yoke\r\nSalwar: Lawn.', 'Orna: Chiffon\r\nKameez: Lawn with Digital Print+ Yoke\r\nSalwar: Lawn.', NULL, 'active', 2, '2', '2', '2020-06-09 10:13:04', '2020-12-27 20:55:00'),
(18, 'simple-product', 'Bright Story 3pcs Unstitch', 'bright-story-pcs-unstitch', '2006', 'no', 'batch', '2500.0000', '0.00', '2500.0000', 2, 'Digital Print Lawn Shirt With Embroidered Neck\r\nChiffon Digital Dupatta With Embroidered\r\nCotton Dyed Trouser', 'Digital Print Lawn Shirt With Embroidered Neck\r\nChiffon Digital Dupatta With Embroidered\r\nCotton Dyed Trouser', 'Digital Print Lawn Shirt With Embroidered Neck\r\nChiffon Digital Dupatta With Embroidered\r\nCotton Dyed Trouser', NULL, 'active', 2, '2', '2', '2020-06-09 10:19:27', '2020-12-27 20:55:21'),
(19, 'group-product', 'Kameez: Lawn with 2 Yoke Ferdaus (Pakistani)', 'kameez-lawn-with-2-yoke-ferdaus-pakistani', '2007', 'no', 'batch', '2000.0000', '0.00', '2000.0000', 2, 'Ferdaus (Pakistani)\r\nKameez: Lawn with 2 Yoke\r\nSalwar: Lawn with Printed\r\nDupatta: Shiffon with Digital Print', 'Ferdaus (Pakistani)\r\nKameez: Lawn with 2 Yoke\r\nSalwar: Lawn with Printed\r\nDupatta: Shiffon with Digital Print', 'Ferdaus (Pakistani)\r\nKameez: Lawn with 2 Yoke\r\nSalwar: Lawn with Printed\r\nDupatta: Shiffon with Digital Print', NULL, 'active', 2, '2', '2', '2020-06-09 10:23:00', '2020-12-27 20:55:42'),
(20, 'simple-product', 'Simple and Comfortable for SUMMER', 'simple-and-comfortable-for-summer', '2008', 'no', 'batch', '1000.0000', '0.00', '1000.0000', 2, 'Simple and Comfortable for SUMMER', 'Simple and Comfortable for SUMMER', 'Simple and Comfortable for SUMMER', NULL, 'active', 2, '2', '2', '2020-06-09 10:26:19', '2020-12-27 20:54:35'),
(21, 'simple-product', 'Artificial Leather Messenger Shoulder Bag Handbag CrossBody', 'artificial-leather-messenger-shoulder-bag-handbag-crossbody', '2011', 'no', NULL, '650.0000', '0.00', '600.0000', 4, 'Artificial Leather Messenger Shoulder Bag Handbag CrossBody', 'Material:100%genuine leather.Traditional manual craft, durable nylon thread sewing and excellent workmanship .\r\n\r\nStructure: 2 main zipper pockets with a inner zipped pocket that is handy for small easy to lose items. , 2 front zipper pockets , 1 back zipper pocket . This pocketbook has the perfect amount of room and number of compartments to keep everything in separate areas and completely organized.\r\n\r\nSize info: 9.8\'\' x 3.9\'\' x 8.3\'\' Adjustable strap with metal buckle (appr. 85 ~ 150 cm)\r\n\r\nSimple and fashionable, suitable for casual or formal carry.Business, school, travel, shopping , hiking, cycling, and so on.Large enough to keep all of your items organized on the go with this messenger bag!\r\n\r\nThis spacious shoulder bag can hold all of your necessities for your every dayuse, wallet, camera, phone, umbrella, kindle, iPad 9.7inch and miscellaneous items.', '1.Material: Artificial Leather durable nylon thread sewing,high quality hardware.\r\n\r\n2.Dimension: 21 x 10 x 25 cm.\r\n\r\n3.Structure: 2 main zipper pockets, 2 front zipper pockets , 1 back zipper pocket .\r\nAdjustable strap with metal buckle (appr. 85 ~ 150 cm)\r\nYou can have 3 carrying options (Single shoulder, cross body and hand carry)\r\nThis spacious shoulder bag can hold all of your necessities for your every dayuse,\r\nwallet, camera, phone, umbrella, kindle, iPad mini and miscellaneous items.\r\n\r\n4.Vintage style:The leather used in crafting this bag is a natural cowhide\r\nthat leather items may have wrinkles, scars, scratches, distinctive leather smell\r\nthat are inherent characteristics and natural beauty of the hide to present the style of retro and wildness.', NULL, 'active', 2, '2', '2', '2020-06-09 20:55:28', '2020-06-09 21:02:32'),
(22, 'simple-product', 'Artificial Leather China Crossbody Stylish Bag', 'artificial-leather-china-crossbody-stylish-bag', '2012', 'no', NULL, '460.0000', '0.00', '420.0000', 4, 'Artificial Leather China Crossbody Stylish Bag', 'A new Design Womens Clutch. That\'s a new fashion, new design and good colour. Everybody can carry it and it\'s weight is too light. Well classification and craft. I hope you enjoy it to keep your accessories.', 'Natural Colour\r\nWell Leather\r\nMade In China\r\nLong Belt', NULL, 'active', 2, '2', '2', '2020-06-09 21:09:18', '2020-06-09 21:11:04'),
(23, 'simple-product', 'Baby dress', 'baby-dress', '2009009', 'no', NULL, '500.0000', '0.00', '450.0000', 5, 'A beautiful dress for your sweet baby girl.', 'Availability: 1 pcs\r\nSoft,Light & Comfortable\r\nPerfect for Summer\r\nPlease wash before use', 'Fabric: Cotton\r\nColour: Red\r\nLength : 17.5 Inches/ 45 CM\r\nAge Range: 1- 2 Years', NULL, 'active', 2, '2', '2', '2020-06-23 18:09:40', '2020-06-23 18:34:55'),
(24, 'simple-product', 'Baby Rocking Bouncer Balance Soft', 'baby-rocking-bouncer-balance-soft', '2009010', 'no', NULL, '1999.0000', '0.00', '1899.0000', 5, 'Baby Rocking Bouncer Balance Soft', 'They are guaranteed harmless to children’s sensitive skin and will not trigger allergies. The Baby infant to toddler rocker is suitable from birth and converts rocker to stationary chair for toddlers, allowing it to grow with your child. Designed in conjunction with paediatricians, the ergonomic shape gives your baby the proper support they need from birth. The fabric seat moulds itself to your baby\'s head and body to distribute weight evenly. As your baby grows and learns to sit and stand unaided, the bouncer can still be used as a baby chair by removing the safety harness. The bouncer has four positions: play, rest, sleep and transport. It\'s easy and quiet to adjust and fold completely flat in transport mode to make it easier to transport or store.', 'Type: Bouncing\r\nGender: Boys & Girls\r\nBearing Weight: 11-15kg\r\nWill not trigger allergies\r\nHarmless to children’s sensitive skin', NULL, 'active', 2, '2', '2', '2020-06-23 18:55:55', '2020-06-23 19:05:06'),
(25, 'simple-product', '2 in 1 Go Potty Baby Travel Toilet Seat', '2-in-1-go-potty-baby-travel-toilet-seat', '2009011', 'no', NULL, '1299.0000', '0.00', '1250.0000', 5, 'Product details of 2 in 1 Go Potty Baby Travel Toilet Seat', 'Opens quickly and easily for on-the-go potty emergencies. Legs fold in for compact storage in cars, strollers or diaper bags. Legs lock securely for use as a stand-alone potty or on public restroom toilets. Soft, flexible flaps hold disposable bags securely in place. Small seat sized perfectly for little bottoms. Additional Refill Bags for the OXO Tot On The Go Potty available. Age - 12 months and above.', 'Opens quickly and easily for on-the-go potty emergencies\r\nLegs fold in for compact storage in cars, strollers or diaper bags\r\nLegs lock securely for use as a stand-alone potty or on public restroom toilets\r\nSoft, flexible flaps hold disposable bags securely in place. Small seat sized perfectly for little bottoms\r\nAdditional Refill Bags for the OXO Tot On The Go Potty available.\r\n Age - 12 months and above.', NULL, 'active', 2, '2', '2', '2020-06-23 19:10:11', '2020-06-23 19:20:05'),
(26, 'simple-product', 'Screen print dress', 'screen-print-dress', '2006-CSK-006', 'no', 'batch', '890.0000', '1000.00', '790.0000', 2, 'Screen print dress', 'Screen print dress', 'Screen print dress', NULL, 'active', 2, '2', '2', '2020-06-24 17:00:04', '2020-12-27 20:54:14'),
(27, 'simple-product', 'Chundri 3 piece (cotton)', 'chundri', '2006-CSK-007', '', NULL, '590.0000', '0.00', '550.0000', 2, 'Chundri 3 piece (cotton)', 'Chundri 3 piece (cotton).\r\nColour available...', 'Chundri 3 piece (cotton).\r\nColour available...', NULL, 'active', 2, '2', '1', '2020-06-25 20:17:42', '2020-12-27 20:47:55'),
(28, 'configurable-product', '*Top* Pure cotton designer shirt , stripes prints , thread embroidery', 'top-pure-cotton-designer-shirt-stripes-prints-thread-embroidery', '2006-CSK-009', 'no', 'batch', '5000.0000', '0.00', '4000.0000', 2, '*Top* Pure cotton designer shirt 🌸 stripes prints 🌸 thread embroidery 🌸\r\n*Orna* Pure mal cotton designer Orna🌸 block print🌸\r\n*Bottom* Pure cotton bottom 🌸', '*Top* Pure cotton designer shirt 🌸 stripes prints 🌸 thread embroidery 🌸\r\n*Orna* Pure mal cotton designer Orna🌸 block print🌸\r\n*Bottom* Pure cotton bottom 🌸', '*Top* Pure cotton designer shirt 🌸 stripes prints 🌸 thread embroidery 🌸\r\n*Orna* Pure mal cotton designer Orna🌸 block print🌸\r\n*Bottom* Pure cotton bottom 🌸', NULL, 'active', 2, '2', '2', '2020-07-02 01:27:37', '2020-12-27 20:56:32'),
(29, 'configurable-product', 'Fine Cotton embroided dress', 'fine-cotton-embroided-dress', '2006-CSK-008', 'no', 'batch', '4200.0000', '0.00', '3500.0000', 2, 'Fine Cotton embroided shirt\r\nFine cotton bottom\r\nBandhni silk orna with tapings\r\nNo lining required !!', 'Fine Cotton embroided shirt\r\nFine cotton bottom\r\nBandhni silk orna with tapings\r\nNo lining required !!', 'Fine Cotton embroided shirt\r\nFine cotton bottom\r\nBandhni silk orna with tapings\r\nNo lining required !!', NULL, 'active', 2, '2', '2', '2020-07-02 17:38:07', '2021-01-14 07:04:39'),
(30, 'simple-product', '* Cotton Printed Shirt with Mirror Detailing* *Embroidered Chiffon Dupatta* * Cotton Bottom*', 'cotton-printed-shirt-with-mirror-detailing-embroidered-chiffon-dupatta-cotton-bottom', '2006-CSK-010', 'no', 'batch', '4500.0000', '0.00', '4000.0000', 2, '* Cotton Printed Shirt with Mirror Detailing*\r\n*Embroidered Chiffon Dupatta*\r\n* Cotton Bottom*', '* Cotton Printed Shirt with Mirror Detailing*\r\n*Embroidered Chiffon Dupatta*\r\n* Cotton Bottom*', '* Cotton Printed Shirt with Mirror Detailing*\r\n*Embroidered Chiffon Dupatta*\r\n* Cotton Bottom*', NULL, 'active', 2, '2', '2', '2020-07-05 00:58:12', '2021-01-15 02:02:03'),
(31, 'simple-product', 'rinted Cotton Shirt with Neck Work & Gota Detailing  ,  Cotton Lehriya Dupatta with Gota Detailing  , Cotton Bottom', 'rinted-cotton-shirt-with-neck-work-gota-detailing-cotton-lehriya-dupatta-with-gota-detailing-cotton-bottom', '2006-CSK-011', '', NULL, '5500.0000', '0.00', '4000.0000', 2, 'rinted Cotton Shirt with Neck Work & Gota Detailing*\r\n*Cotton Lehriya Dupatta with Gota Detailing*\r\n*Cotton Bottom', 'rinted Cotton Shirt with Neck Work & Gota Detailing*\r\n*Cotton Lehriya Dupatta with Gota Detailing*\r\n*Cotton Bottom', 'rinted Cotton Shirt with Neck Work & Gota Detailing*\r\n*Cotton Lehriya Dupatta with Gota Detailing*\r\n*Cotton Bottom', NULL, 'active', 2, '2', '1', '2020-07-06 18:37:39', '2020-12-27 20:47:25'),
(32, 'simple-product', 'Comfortable , stylish Gown kurti  Lilen', 'comfortable-stylish-gown-kurti-lilen', '2020-gf-0001', '', NULL, '1200.0000', '0.00', '1000.0000', 2, 'Comfortable , stylish Gown kurti  Lilen', 'Comfortable , stylish Gown kurti  Lilen , Long 45-48 and  Long 40-43', 'Comfortable , stylish Gown kurti  Lilen', NULL, 'active', 2, '2', '1', '2020-07-06 19:07:58', '2020-12-27 20:47:17'),
(33, 'simple-product', NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, 2, NULL, NULL, NULL, NULL, 'cancel', 2, '2', '2', '2020-07-06 19:37:43', '2020-07-07 18:48:00'),
(34, 'simple-product', 'Table Runner ( shotronji )', 'table-runner-shotronji', '2020-str-0001', '', NULL, '980.0000', '0.00', '820.0000', 1, 'Table Runner ( shotronji )', 'Table Runner ( shotronji )', 'Table Runner ( shotronji )', NULL, 'active', 2, '2', '1', '2020-07-07 18:48:56', '2020-12-27 20:47:10'),
(35, 'simple-product', 'Embroidered Kota three  pc suit', 'embroidered-kota-three-pc-suit', '2006-CSK-012', '', NULL, '3900.0000', '0.00', '3400.0000', 2, 'Embroidered Kota 3 pc suit\r\nKurta-  Kota Doria Cotton \r\nDupatta- Kota Doria Cotton\r\nBottom- Pure Cotton or Cotton Silk\r\nLength 2.5 mtr\r\nWidth 44\"', 'Embroidered Kota 3 pc suit\r\nKurta-  Kota Doria Cotton \r\nDupatta- Kota Doria Cotton\r\nBottom- Pure Cotton or Cotton Silk\r\nLength 2.5 mtr\r\nWidth 44\"', 'Embroidered Kota 3 pc suit', NULL, 'active', 7, '7', '1', '2020-07-10 23:31:46', '2020-12-27 20:47:02'),
(36, 'configurable-product', 'Original Indian three piece Lucknowi Chikankari Unstitched dress', 'original-indian-three-piece-lucknowi-chikankari-unstitched-dress', '2006-CSK-013', 'no', 'batch', '4350.0000', '45000.00', '4000.0000', 2, 'Original Indian three piece\r\nLucknowi Chikankari Unstitched dress', 'Original Indian three piece\r\nLucknowi Chikankari Unstitched dress material with pure chiffon dupatta\r\nTop 3 mt\r\nBottom 2.5 mt\r\nDupatta 2.5 mt', 'Original Indian three piece\r\nLucknowi Chikankari Unstitched dress', NULL, 'active', 7, '7', '2', '2020-07-11 00:56:05', '2021-01-15 02:03:36'),
(37, 'simple-product', 'Original Indian two piece', 'original-indian-two-piece', '2006-CSK-014', '', NULL, '3250.0000', '0.00', '2900.0000', 2, 'Original Indian two piece...\r\nBeautiful voil cotton Chikankari kurti', 'Original Indian two piece...\r\nBeautiful voil cotton Chikankari kurti with Georgette palazzo\r\nSize 40 to 48\r\nLength 48', 'Original Indian two piece...\r\nBeautiful voil cotton Chikankari kurti', NULL, 'active', 7, '7', '1', '2020-07-11 01:39:03', '2020-12-27 20:46:55'),
(38, 'simple-product', 'Original Indian cotton three piece Kota Doria Cotton', 'original-indian-cotton-three-piece-kota-doria-cotton', '2006-CSK-015', '', NULL, '4900.0000', '0.00', '4400.0000', 2, 'Original Indian cotton three piece\r\nKota Doria Cotton', 'Original Indian cotton three piece\r\nKota Doria Cotton\r\n* 3 Pc Salwar Suit materials with fine *Polka Embroidery*\r\nKurta- Kota Doria Cotton\r\nDupatta- Kota Doria Cotton\r\nBottom- Pure Cotton\r\nLength 2.5 Mtr\r\nWidth 44\"\r\nPrice 4900 taka', 'Original Indian cotton three piece\r\nKota Doria Cotton', NULL, 'active', 7, '7', '1', '2020-07-11 02:29:06', '2020-12-27 20:46:42'),
(39, 'group-product', 'মোম বাটিক থ্রিপিস', 'cotton-kameez-set', 'BCT', '', NULL, '700.0000', '0.00', '900.0000', 2, 'খুব আরামদায়ক, কাপড়ের মান ও ব্লকের কাজ খুবই উন্নত এবং আকর্ষনীয়।', '☘️মোম বাটিক\r\nকাপড়: সুতি\r\nকামিজ: ৪৬\" লম্বা\r\nসেলোয়ার: ২.৫ মি.\r\nওড়না: সুতি।', NULL, NULL, 'active', 7, '7', '1', '2020-10-07 00:26:37', '2020-12-27 20:46:34'),
(40, 'group-product', 'মোম বাটিক থ্রিপিস', 'cotton-kameez-set-1', 'BCTt', '', NULL, '700.0000', '0.00', '900.0000', 2, NULL, NULL, NULL, NULL, 'active', 7, '7', '1', '2020-10-07 20:36:15', '2020-12-27 20:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `attribute_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`id`, `product_id`, `attribute_code`, `attribute_data`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, 4, 'size', '==XL==', '2', NULL, '2019-12-10 09:11:08', '2019-12-10 09:11:08'),
(10, 4, 'color', '==Black==Blue==', '2', NULL, '2019-12-10 09:11:08', '2019-12-10 09:11:08'),
(11, 1, 'size', '==L==M==', '2', NULL, '2019-12-10 09:14:06', '2019-12-10 09:14:06'),
(12, 1, 'color', '==Black==Blue==', '2', NULL, '2019-12-10 09:14:06', '2019-12-10 09:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, '2', NULL, '2019-07-03 19:33:07', '2019-07-03 19:33:07'),
(2, 2, 4, NULL, '2', NULL, '2019-07-03 19:38:32', '2019-07-03 19:38:32'),
(4, 4, 4, NULL, '2', NULL, '2019-07-03 19:46:47', '2019-07-03 19:46:47'),
(12, 11, 2, 'active', '5', NULL, '2019-10-18 11:28:38', '2019-10-18 11:28:38'),
(13, 12, 3, 'active', '2', NULL, '2019-11-04 01:01:35', '2019-11-04 01:01:35'),
(17, 6, 2, 'active', '2', NULL, '2019-12-10 09:09:24', '2019-12-10 09:09:24'),
(18, 5, 3, 'active', '2', NULL, '2019-12-10 09:10:35', '2019-12-10 09:10:35'),
(19, 3, 5, 'active', '2', NULL, '2019-12-10 09:11:32', '2019-12-10 09:11:32'),
(20, 3, 6, 'active', '2', NULL, '2019-12-10 09:11:32', '2019-12-10 09:11:32'),
(21, 2, 5, 'active', '2', NULL, '2019-12-10 09:11:54', '2019-12-10 09:11:54'),
(22, 2, 6, 'active', '2', NULL, '2019-12-10 09:11:54', '2019-12-10 09:11:54'),
(23, 1, 1, 'active', '2', NULL, '2019-12-10 09:13:59', '2019-12-10 09:13:59'),
(24, 1, 2, 'active', '2', NULL, '2019-12-10 09:13:59', '2019-12-10 09:13:59'),
(25, 12, 2, 'active', '2', NULL, '2020-05-07 18:33:27', '2020-05-07 18:33:27'),
(26, 10, 2, 'active', '2', NULL, '2020-05-07 18:42:52', '2020-05-07 18:42:52'),
(27, 10, 3, 'active', '2', NULL, '2020-05-07 18:42:52', '2020-05-07 18:42:52'),
(28, 9, 2, 'active', '2', NULL, '2020-05-07 18:53:06', '2020-05-07 18:53:06'),
(29, 9, 3, 'active', '2', NULL, '2020-05-07 18:53:06', '2020-05-07 18:53:06'),
(30, 8, 2, 'active', '2', NULL, '2020-05-08 16:30:44', '2020-05-08 16:30:44'),
(31, 8, 3, 'active', '2', NULL, '2020-05-08 16:30:44', '2020-05-08 16:30:44'),
(32, 7, 2, 'active', '2', NULL, '2020-05-08 16:34:14', '2020-05-08 16:34:14'),
(33, 7, 3, 'active', '2', NULL, '2020-05-08 16:34:14', '2020-05-08 16:34:14'),
(34, 6, 3, 'active', '2', NULL, '2020-05-08 16:39:56', '2020-05-08 16:39:56'),
(37, 14, 3, NULL, NULL, NULL, NULL, NULL),
(38, 14, 2, 'active', '2', NULL, '2020-06-07 01:50:10', '2020-06-07 01:50:10'),
(39, 15, 3, NULL, NULL, NULL, NULL, NULL),
(40, 15, 2, 'active', '2', NULL, '2020-06-07 01:53:03', '2020-06-07 01:53:03'),
(41, 16, 2, NULL, NULL, NULL, NULL, NULL),
(42, 16, 3, 'active', '2', NULL, '2020-06-09 10:09:04', '2020-06-09 10:09:04'),
(43, 17, 3, NULL, NULL, NULL, NULL, NULL),
(44, 17, 2, 'active', '2', NULL, '2020-06-09 10:14:56', '2020-06-09 10:14:56'),
(45, 18, 3, NULL, NULL, NULL, NULL, NULL),
(46, 18, 2, 'active', '2', NULL, '2020-06-09 10:22:15', '2020-06-09 10:22:15'),
(47, 19, 3, NULL, NULL, NULL, NULL, NULL),
(48, 19, 2, 'active', '2', NULL, '2020-06-09 10:25:39', '2020-06-09 10:25:39'),
(49, 20, 3, NULL, NULL, NULL, NULL, NULL),
(50, 20, 2, 'active', '2', NULL, '2020-06-09 10:29:55', '2020-06-09 10:29:55'),
(51, 21, 1, NULL, NULL, NULL, NULL, NULL),
(52, 22, 1, NULL, NULL, NULL, NULL, NULL),
(53, 23, 6, NULL, NULL, NULL, NULL, NULL),
(54, 24, 6, NULL, NULL, NULL, NULL, NULL),
(55, 25, 6, NULL, NULL, NULL, NULL, NULL),
(56, 26, 3, NULL, NULL, NULL, NULL, NULL),
(57, 27, 3, NULL, NULL, NULL, NULL, NULL),
(59, 29, 2, NULL, NULL, NULL, NULL, NULL),
(60, 28, 2, 'active', '2', NULL, '2020-07-04 22:56:21', '2020-07-04 22:56:21'),
(61, 30, 2, NULL, NULL, NULL, NULL, NULL),
(62, 31, 2, NULL, NULL, NULL, NULL, NULL),
(63, 32, 3, NULL, NULL, NULL, NULL, NULL),
(64, 33, 2, NULL, NULL, NULL, NULL, NULL),
(65, 34, 5, NULL, NULL, NULL, NULL, NULL),
(66, 35, 2, NULL, NULL, NULL, NULL, NULL),
(67, 35, 3, 'active', '2', NULL, '2020-07-11 00:22:09', '2020-07-11 00:22:09'),
(68, 36, 2, NULL, NULL, NULL, NULL, NULL),
(69, 36, 3, 'active', '2', NULL, '2020-07-11 01:02:27', '2020-07-11 01:02:27'),
(70, 37, 2, NULL, NULL, NULL, NULL, NULL),
(71, 37, 3, 'active', '2', NULL, '2020-07-11 01:47:45', '2020-07-11 01:47:45'),
(72, 38, 2, NULL, NULL, NULL, NULL, NULL),
(73, 38, 3, 'active', '2', NULL, '2020-07-11 02:33:43', '2020-07-11 02:33:43'),
(74, 39, 3, NULL, NULL, NULL, NULL, NULL),
(75, 40, 3, NULL, NULL, NULL, NULL, NULL),
(76, 13, 6, 'active', '2', NULL, '2021-02-12 02:48:18', '2021-02-12 02:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_coupon`
--

CREATE TABLE `product_coupon` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `coupon_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_coupon`
--

INSERT INTO `product_coupon` (`id`, `product_id`, `coupon_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 10, 1, '2', NULL, '2019-12-10 09:07:37', '2019-12-10 09:07:37'),
(3, 6, 1, '2', NULL, '2019-12-10 09:09:41', '2019-12-10 09:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `image_link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_link`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(146, 38, '/uploads/product/38', 'original-indian-cotton-three-piece-kota-doria-cotton-1613118494-1.jpg', '2', NULL, '2021-02-12 02:28:15', NULL),
(147, 38, '/uploads/product/38', 'original-indian-cotton-three-piece-kota-doria-cotton-1613118495-2.jpg', '2', NULL, '2021-02-12 02:28:15', NULL),
(148, 38, '/uploads/product/38', 'original-indian-cotton-three-piece-kota-doria-cotton-1613118495-3.jpg', '2', NULL, '2021-02-12 02:28:16', NULL),
(149, 38, '/uploads/product/38', 'original-indian-cotton-three-piece-kota-doria-cotton-1613118496-4.jpg', '2', NULL, '2021-02-12 02:28:16', NULL),
(150, 37, '/uploads/product/37', 'original-indian-two-piece-1613118538-1.jpg', '2', NULL, '2021-02-12 02:28:58', NULL),
(151, 37, '/uploads/product/37', 'original-indian-two-piece-1613118538-2.jpg', '2', NULL, '2021-02-12 02:28:59', NULL),
(152, 37, '/uploads/product/37', 'original-indian-two-piece-1613118539-3.jpg', '2', NULL, '2021-02-12 02:28:59', NULL),
(153, 36, '/uploads/product/36', 'original-indian-three-piece-lucknowi-chikankari-unstitched-dress-1613118560-1.jpg', '2', NULL, '2021-02-12 02:29:21', NULL),
(154, 35, '/uploads/product/35', 'embroidered-kota-three-pc-suit-1613118592-1.jpg', '2', NULL, '2021-02-12 02:29:53', NULL),
(155, 35, '/uploads/product/35', 'embroidered-kota-three-pc-suit-1613118593-2.jpg', '2', NULL, '2021-02-12 02:29:53', NULL),
(156, 35, '/uploads/product/35', 'embroidered-kota-three-pc-suit-1613118593-3.jpg', '2', NULL, '2021-02-12 02:29:53', NULL),
(157, 34, '/uploads/product/34', 'table-runner-shotronji-1613118650-1.jpg', '2', NULL, '2021-02-12 02:30:50', NULL),
(158, 34, '/uploads/product/34', 'table-runner-shotronji-1613118650-2.jpg', '2', NULL, '2021-02-12 02:30:50', NULL),
(159, 34, '/uploads/product/34', 'table-runner-shotronji-1613118650-3.jpg', '2', NULL, '2021-02-12 02:30:51', NULL),
(160, 32, '/uploads/product/32', 'comfortable-stylish-gown-kurti-lilen-1613118697-1.jpg', '2', NULL, '2021-02-12 02:31:38', NULL),
(161, 31, '/uploads/product/31', 'rinted-cotton-shirt-with-neck-work-gota-detailing-cotton-lehriya-dupatta-with-gota-detailing-cotton-bottom-1613118724-1.jpg', '2', NULL, '2021-02-12 02:32:05', NULL),
(162, 31, '/uploads/product/31', 'rinted-cotton-shirt-with-neck-work-gota-detailing-cotton-lehriya-dupatta-with-gota-detailing-cotton-bottom-1613118725-2.jpg', '2', NULL, '2021-02-12 02:32:05', NULL),
(163, 30, '/uploads/product/30', 'cotton-printed-shirt-with-mirror-detailing-embroidered-chiffon-dupatta-cotton-bottom-1613118753-1.jpg', '2', NULL, '2021-02-12 02:32:34', NULL),
(164, 30, '/uploads/product/30', 'cotton-printed-shirt-with-mirror-detailing-embroidered-chiffon-dupatta-cotton-bottom-1613118754-2.jpg', '2', NULL, '2021-02-12 02:32:34', NULL),
(165, 29, '/uploads/product/29', 'fine-cotton-embroided-dress-1613118776-1.jpg', '2', NULL, '2021-02-12 02:32:57', NULL),
(166, 28, '/uploads/product/28', 'top-pure-cotton-designer-shirt-stripes-prints-thread-embroidery-1613118794-1.jpg', '2', NULL, '2021-02-12 02:33:15', NULL),
(167, 27, '/uploads/product/27', 'chundri-1613118821-1.jpg', '2', NULL, '2021-02-12 02:33:41', NULL),
(168, 27, '/uploads/product/27', 'chundri-1613118838-1.jpg', '2', NULL, '2021-02-12 02:33:59', NULL),
(169, 27, '/uploads/product/27', 'chundri-1613118839-2.jpg', '2', NULL, '2021-02-12 02:33:59', NULL),
(173, 25, '/uploads/product/25', '2-in-1-go-potty-baby-travel-toilet-seat-1613118892-1.png', '2', NULL, '2021-02-12 02:34:52', NULL),
(174, 24, '/uploads/product/24', 'baby-rocking-bouncer-balance-soft-1613118917-1.png', '2', NULL, '2021-02-12 02:35:18', NULL),
(175, 23, '/uploads/product/23', 'baby-dress-1613118931-1.png', '2', NULL, '2021-02-12 02:35:32', NULL),
(176, 22, '/uploads/product/22', 'artificial-leather-china-crossbody-stylish-bag-1613118951-1.jpg', '2', NULL, '2021-02-12 02:35:51', NULL),
(177, 21, '/uploads/product/21', 'artificial-leather-messenger-shoulder-bag-handbag-crossbody-1613118971-1.jpg', '2', NULL, '2021-02-12 02:36:12', NULL),
(178, 20, '/uploads/product/20', 'simple-and-comfortable-for-summer-1613118988-1.jpg', '2', NULL, '2021-02-12 02:36:29', NULL),
(179, 19, '/uploads/product/19', 'kameez-lawn-with-2-yoke-ferdaus-pakistani-1613119117-1.jpg', '2', NULL, '2021-02-12 02:38:37', NULL),
(180, 19, '/uploads/product/19', 'kameez-lawn-with-2-yoke-ferdaus-pakistani-1613119117-2.jpg', '2', NULL, '2021-02-12 02:38:37', NULL),
(181, 18, '/uploads/product/18', 'bright-story-pcs-unstitch-1613119138-1.jpg', '2', NULL, '2021-02-12 02:38:58', NULL),
(182, 18, '/uploads/product/18', 'bright-story-pcs-unstitch-1613119138-2.jpg', '2', NULL, '2021-02-12 02:38:59', NULL),
(183, 17, '/uploads/product/17', 'pakistani-brand-ferdaus-1613119162-1.jpg', '2', NULL, '2021-02-12 02:39:23', NULL),
(184, 17, '/uploads/product/17', 'pakistani-brand-ferdaus-1613119163-2.jpg', '2', NULL, '2021-02-12 02:39:23', NULL),
(186, 15, '/uploads/product/15', 'johra-pinks-pakistani-brand-03-1613119197-1.jpg', '2', NULL, '2021-02-12 02:39:57', NULL),
(187, 14, '/uploads/product/14', 'johra-pinks-pakistani-brand-02-1613119214-1.jpg', '2', NULL, '2021-02-12 02:40:15', NULL),
(189, 12, '/uploads/product/12', 'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-100-luxury-collection-1613119255-1.jpg', '2', NULL, '2021-02-12 02:40:56', NULL),
(190, 10, '/uploads/product/10', 'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-100-1613119302-1.jpg', '2', NULL, '2021-02-12 02:41:42', NULL),
(191, 9, '/uploads/product/9', 'serene-premium-embroidered-chiffon-unstitched-piece-suit-smp20bl-1613119333-1.jpg', '2', NULL, '2021-02-12 02:42:13', NULL),
(192, 8, '/uploads/product/8', 'azureu20f-morningformal-luxury-collection-1613119351-1.jpg', '2', NULL, '2021-02-12 02:42:31', NULL),
(193, 7, '/uploads/product/7', 'azure-embroidered-chiffonformal-luxury-collection-1613119370-1.jpg', '2', NULL, '2021-02-12 02:42:51', NULL),
(194, 6, '/uploads/product/6', 'azure-embroidered-net-unstitched-kurties-azu20ormal-luxury-collection-1613119385-1.jpg', '2', NULL, '2021-02-12 02:43:05', NULL),
(195, 5, '/uploads/product/5', 'strive-shoulder-pack-2-1613119420-1.jpg', '2', NULL, '2021-02-12 02:43:40', NULL),
(196, 4, '/uploads/product/4', 'wayfarer-messenger-bag-1613119445-1.jpg', '2', NULL, '2021-02-12 02:44:05', NULL),
(199, 1, '/uploads/product/1', 'joust-duffle-bag-1613119522-1.jpg', '2', NULL, '2021-02-12 02:45:22', NULL),
(200, 3, '/uploads/product/3', 'crown-summit-backpack-1613119599-1.jpg', '2', NULL, '2021-02-12 02:46:39', NULL),
(201, 2, '/uploads/product/2', 'strive-shoulder-pack-1613119621-1.jpg', '2', NULL, '2021-02-12 02:47:02', NULL),
(202, 13, '/uploads/product/13', 'johra-pinks-pakistani-brand-1613119689-1.jpg', '2', NULL, '2021-02-12 02:48:10', NULL),
(203, 26, '/uploads/product/26', 'screen-print-dress-1613119798-1.jpg', '2', NULL, '2021-02-12 02:49:58', NULL),
(204, 40, '/uploads/product/40', 'cotton-kameez-set-1-1613119852-1.jpg', '7', NULL, '2021-02-12 02:50:52', NULL),
(205, 39, '/uploads/product/39', 'cotton-kameez-set-1613119876-1.jpg', '7', NULL, '2021-02-12 02:51:17', NULL),
(206, 16, '/uploads/product/16', 'single-piece-new-collection-1613120492-1.jpg', '2', NULL, '2021-02-12 03:01:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `warehouse` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `product_id`, `warehouse`, `item_number`, `quantity`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'self', '123', '50', NULL, NULL, '2', NULL, '2019-07-03 19:33:23', '2019-07-03 19:33:23'),
(2, 2, 'self', '124', '10', NULL, NULL, '2', NULL, '2019-07-03 19:38:44', '2019-07-03 19:38:44'),
(3, 3, 'self', '125', '20', NULL, NULL, '2', NULL, '2019-07-03 19:43:39', '2019-07-03 19:43:39'),
(4, 4, 'self', '126', '10', NULL, NULL, '2', NULL, '2019-07-03 19:46:56', '2019-07-03 19:46:56'),
(5, 5, 'self', '127', '15', NULL, NULL, '2', NULL, '2019-07-03 19:52:48', '2019-07-03 19:52:48'),
(6, 6, 'self', '128', '10', NULL, NULL, '2', NULL, '2019-07-03 19:56:27', '2019-07-03 19:56:27'),
(7, 7, 'self', '129', '10', NULL, NULL, '2', NULL, '2019-07-03 19:59:33', '2019-07-03 19:59:33'),
(8, 8, 'self', '130', '1', NULL, NULL, '2', '2', '2019-07-03 20:04:47', '2020-05-08 16:30:53'),
(9, 9, 'self', '131', '10', NULL, NULL, '2', NULL, '2019-07-03 20:09:32', '2019-07-03 20:09:32'),
(10, 12, 'self', '137', '1', NULL, NULL, '2', '2', '2019-11-04 01:01:50', '2020-05-07 18:33:51'),
(11, 10, 'self', '133', '1', NULL, NULL, '2', '2', '2019-11-04 01:51:23', '2020-05-07 18:43:05'),
(12, 13, 'self', '2001', '10', NULL, NULL, '2', NULL, '2020-06-07 01:46:30', '2020-06-07 01:46:30'),
(13, 14, 'self', '2002', '20', NULL, NULL, '2', NULL, '2020-06-07 01:50:19', '2020-06-07 01:50:19'),
(14, 15, 'self', '2003', '20', NULL, NULL, '2', NULL, '2020-06-07 01:53:21', '2020-06-07 01:53:21'),
(15, 16, 'self', '2004', '1', NULL, NULL, '2', NULL, '2020-06-09 10:09:19', '2020-06-09 10:09:19'),
(16, 17, 'self', '2005', '1', NULL, NULL, '2', NULL, '2020-06-09 10:15:10', '2020-06-09 10:15:10'),
(17, 18, 'self', '2006', '10', NULL, NULL, '2', '2', '2020-06-09 10:22:24', '2020-06-09 10:22:29'),
(18, 19, 'self', '2007', '10', NULL, NULL, '2', NULL, '2020-06-09 10:25:47', '2020-06-09 10:25:47'),
(19, 20, 'self', '2008', '10', NULL, NULL, '2', NULL, '2020-06-09 10:30:06', '2020-06-09 10:30:06'),
(20, 21, 'self', '2011', '2', NULL, NULL, '2', NULL, '2020-06-09 21:02:59', '2020-06-09 21:02:59'),
(21, 22, 'self', '2012', '2', NULL, NULL, '2', NULL, '2020-06-09 21:12:58', '2020-06-09 21:12:58'),
(22, 23, 'self', '2009009', '1', NULL, NULL, '2', NULL, '2020-06-23 18:35:33', '2020-06-23 18:35:33'),
(23, 24, 'self', '2009010', '1', NULL, NULL, '2', NULL, '2020-06-23 19:05:51', '2020-06-23 19:05:51'),
(24, 25, 'self', '2009011', '1', NULL, NULL, '2', NULL, '2020-06-23 19:22:29', '2020-06-23 19:22:29'),
(25, 26, 'self', '2006-CSK-006', '5', NULL, NULL, '2', NULL, '2020-06-24 17:22:16', '2020-06-24 17:22:16'),
(26, 27, 'self', '2006-CSK-007', '13', 'https://www.facebook.com/groups/312451886455186/', NULL, '2', '2', '2020-06-25 20:28:02', '2020-07-06 20:35:48'),
(27, 29, 'self', '2006-CSK-008', '1', NULL, NULL, '2', NULL, '2020-07-02 17:47:56', '2020-07-02 17:47:56'),
(28, 28, 'self', '2006-CSK-009', '4', 'Hayat Concept', NULL, '2', NULL, '2020-07-04 22:58:59', '2020-07-04 22:58:59'),
(29, 30, 'self', '2006-CSK-010', '2', '* Cotton Printed Shirt with Mirror Detailing*\r\n*Embroidered Chiffon Dupatta*\r\n* Cotton Bottom*', NULL, '2', NULL, '2020-07-05 01:03:01', '2020-07-05 01:03:01'),
(30, 31, 'self', '2006-CSK-011', '1', NULL, NULL, '2', NULL, '2020-07-06 18:53:40', '2020-07-06 18:53:40'),
(31, 32, 'self', '2020-gf-0001', '2', 'Rebeka Sultana\r\n Buy and Sell Center\r\n6-7-2020\r\nGawon kurti\r\n1,000  · Dhaka\r\nGown kurti', NULL, '2', '2', '2020-07-06 19:15:14', '2020-07-06 19:33:04'),
(32, 34, 'self', '2020-str-0001', '8', 'https://www.facebook.com/ShatranjiCraft.Official/', NULL, '2', NULL, '2020-07-07 19:13:11', '2020-07-07 19:13:11'),
(33, 35, 'self', '2006-CSK-012', '10', 'https://www.facebook.com/profile.php?id=100021417676416', NULL, '2', NULL, '2020-07-11 00:26:47', '2020-07-11 00:26:47'),
(34, 36, 'self', '2006-CSK-013', '8', 'https://www.facebook.com/profile.php?id=100021417676416', NULL, '2', NULL, '2020-07-11 01:02:57', '2020-07-11 01:02:57'),
(35, 37, 'self', '2006-CSK-014', '7', 'https://www.facebook.com/profile.php?id=100021417676416', NULL, '2', NULL, '2020-07-11 01:48:43', '2020-07-11 01:48:43'),
(36, 38, 'self', '2006-CSK-015', '8', 'https://www.facebook.com/permalink.php?id=558797297556321&story_fbid=2386136591489040', NULL, '2', NULL, '2020-07-11 02:34:22', '2020-07-11 02:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `rating_value_score` double(10,4) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `nickname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `rating_value_score`, `customer_id`, `nickname`, `title`, `review`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 34, 4.0000, NULL, 'abdur', 'A great product', 'Product quality is very good.', 'active', '4', NULL, '2020-11-20 16:39:11', '2020-11-20 16:39:11'),
(2, 30, 4.0000, 4, 'abdur', 'Best Product', 'Customer Reviews', 'active', '4', NULL, '2020-11-26 06:22:27', '2020-11-26 06:22:27'),
(3, 29, 3.0000, 4, 'rahman', 'Winter Discount Up to 30%', 'Customer Reviews', 'active', '4', NULL, '2020-11-26 06:23:52', '2020-11-26 06:23:52'),
(4, 15, NULL, 1, NULL, NULL, NULL, 'active', '1', NULL, '2020-11-30 08:29:04', '2020-11-30 08:29:04'),
(5, 6, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, '2020-12-13 00:06:57', '2020-12-13 00:06:57'),
(6, 6, 4.0000, NULL, 'rahman', 'Best Product', NULL, 'active', NULL, NULL, '2020-12-13 00:07:09', '2020-12-13 00:07:09'),
(7, 9, 4.0000, 4, 'abdur', 'A great product', 'I love this product.', 'active', '4', NULL, '2020-12-13 00:31:03', '2020-12-13 00:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_seo`
--

CREATE TABLE `product_seo` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `meta_title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image_link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_seo`
--

INSERT INTO `product_seo` (`id`, `product_id`, `meta_title`, `meta_keywords`, `meta_description`, `meta_image_link`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 10, '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux', '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux', '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux', 'Men\'s Casual Shirt ELECTIC BLUE', '2', '2', '2019-10-17 11:06:06', '2020-05-07 18:42:44'),
(2, 12, '3 Piece Embroidered Unstitched Suits from Serene', '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection Manufacturer: Serene Premium', '3 Piece Embroidered Unstitched Suits from Serene Premium Beaux Reves Luxury Collection\r\nManufacturer: Serene Premium', 'WOMEN Cotton Short Sleeve Dress', '2', '2', '2019-11-04 01:01:24', '2020-05-07 18:33:03'),
(3, 15, 'Embroidered Swiss Voile with', 'Embroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', 'Embroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', 'Embroidered Swiss Voile with Embroidered Babmber Chiffon Dupatta.', '2', NULL, '2020-06-07 02:01:00', '2020-06-07 02:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_shipping`
--

CREATE TABLE `product_shipping` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `shipping_method_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_shipping`
--

INSERT INTO `product_shipping` (`id`, `product_id`, `shipping_method_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 12, 1, '2', NULL, '2019-12-10 09:04:50', '2019-12-10 09:04:50'),
(2, 12, 3, '2', NULL, '2019-12-10 09:04:50', '2019-12-10 09:04:50'),
(3, 10, 1, '2', NULL, '2019-12-10 09:07:34', '2019-12-10 09:07:34'),
(4, 8, 3, '2', NULL, '2019-12-10 09:08:39', '2019-12-10 09:08:39'),
(5, 7, 1, '2', NULL, '2019-12-10 09:08:58', '2019-12-10 09:08:58'),
(6, 6, 1, '2', NULL, '2019-12-10 09:09:37', '2019-12-10 09:09:37'),
(7, 5, 1, '2', NULL, '2019-12-10 09:10:43', '2019-12-10 09:10:43'),
(8, 5, 2, '2', NULL, '2019-12-10 09:10:43', '2019-12-10 09:10:43'),
(9, 4, 1, '2', NULL, '2019-12-10 09:11:13', '2019-12-10 09:11:13'),
(10, 4, 2, '2', NULL, '2019-12-10 09:11:13', '2019-12-10 09:11:13'),
(11, 3, 1, '2', NULL, '2019-12-10 09:11:38', '2019-12-10 09:11:38'),
(12, 3, 3, '2', NULL, '2019-12-10 09:11:38', '2019-12-10 09:11:38'),
(13, 2, 1, '2', NULL, '2019-12-10 09:11:57', '2019-12-10 09:11:57'),
(14, 2, 2, '2', NULL, '2019-12-10 09:11:57', '2019-12-10 09:11:57'),
(15, 1, 1, '2', NULL, '2019-12-10 09:14:12', '2019-12-10 09:14:12'),
(16, 1, 2, '2', NULL, '2019-12-10 09:14:12', '2019-12-10 09:14:12'),
(17, 15, 1, '2', NULL, '2020-06-07 02:24:47', '2020-06-07 02:24:47'),
(18, 14, 1, '2', NULL, '2020-06-07 02:24:59', '2020-06-07 02:24:59'),
(19, 13, 1, '2', NULL, '2020-06-07 02:25:12', '2020-06-07 02:25:12'),
(20, 16, 1, '2', NULL, '2020-06-09 10:09:27', '2020-06-09 10:09:27'),
(21, 17, 1, '2', NULL, '2020-06-09 10:15:16', '2020-06-09 10:15:16'),
(22, 18, 1, '2', NULL, '2020-06-09 10:22:35', '2020-06-09 10:22:35'),
(23, 19, 1, '2', NULL, '2020-06-09 10:25:51', '2020-06-09 10:25:51'),
(24, 20, 1, '2', NULL, '2020-06-09 10:30:11', '2020-06-09 10:30:11'),
(25, 21, 1, '2', NULL, '2020-06-09 21:03:05', '2020-06-09 21:03:05'),
(26, 22, 1, '2', NULL, '2020-06-09 21:13:03', '2020-06-09 21:13:03'),
(27, 23, 1, '2', NULL, '2020-06-23 18:35:46', '2020-06-23 18:35:46'),
(28, 24, 1, '2', NULL, '2020-06-23 19:06:09', '2020-06-23 19:06:09'),
(29, 25, 1, '2', NULL, '2020-06-23 19:22:41', '2020-06-23 19:22:41'),
(30, 26, 1, '2', NULL, '2020-06-24 17:22:57', '2020-06-24 17:22:57'),
(32, 29, 5, '2', NULL, '2020-07-02 17:50:33', '2020-07-02 17:50:33'),
(33, 29, 6, '2', NULL, '2020-07-02 17:50:33', '2020-07-02 17:50:33'),
(34, 28, 5, '2', NULL, '2020-07-04 22:57:18', '2020-07-04 22:57:18'),
(35, 28, 6, '2', NULL, '2020-07-04 22:57:18', '2020-07-04 22:57:18'),
(36, 30, 5, '2', NULL, '2020-07-05 01:03:11', '2020-07-05 01:03:11'),
(37, 30, 6, '2', NULL, '2020-07-05 01:03:11', '2020-07-05 01:03:11'),
(38, 31, 5, '2', NULL, '2020-07-06 18:53:54', '2020-07-06 18:53:54'),
(39, 31, 6, '2', NULL, '2020-07-06 18:53:54', '2020-07-06 18:53:54'),
(40, 32, 5, '2', NULL, '2020-07-06 19:15:33', '2020-07-06 19:15:33'),
(41, 34, 5, '2', NULL, '2020-07-07 19:13:38', '2020-07-07 19:13:38'),
(42, 34, 6, '2', NULL, '2020-07-07 19:13:38', '2020-07-07 19:13:38'),
(43, 35, 5, '2', NULL, '2020-07-11 00:26:59', '2020-07-11 00:26:59'),
(44, 35, 6, '2', NULL, '2020-07-11 00:26:59', '2020-07-11 00:26:59'),
(45, 36, 5, '2', NULL, '2020-07-11 01:03:08', '2020-07-11 01:03:08'),
(46, 36, 6, '2', NULL, '2020-07-11 01:03:08', '2020-07-11 01:03:08'),
(47, 37, 5, '2', NULL, '2020-07-11 01:48:54', '2020-07-11 01:48:54'),
(48, 37, 6, '2', NULL, '2020-07-11 01:48:54', '2020-07-11 01:48:54'),
(49, 38, 5, '2', NULL, '2020-07-11 02:34:33', '2020-07-11 02:34:33'),
(50, 38, 6, '2', NULL, '2020-07-11 02:34:33', '2020-07-11 02:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `seller_profiles`
--

CREATE TABLE `seller_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED DEFAULT NULL,
  `shop_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_no` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_agreement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement_date` date DEFAULT NULL,
  `agreement_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_contact_person_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_contact_person_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_profiles`
--

INSERT INTO `seller_profiles` (`id`, `users_id`, `shop_name`, `nid`, `tin_no`, `shop_address`, `shop_description`, `shop_agreement`, `agreement_date`, `agreement_details`, `first_contact_person_details`, `second_contact_person_details`, `image_link`, `shop_logo`, `created_at`, `updated_at`) VALUES
(1, 2, 'Afshini', NULL, NULL, '3/13 MN Road, ShantiNagar', 'Afshini', NULL, NULL, NULL, 'Ruma', 'Parvin', 'afshini_shop_banner_2.jpg', 'afshini_shop_logo_2.jpg', '2019-07-03 18:59:36', '2021-02-12 01:19:57'),
(2, 5, 'Megasell', NULL, NULL, '3/13 MN Road, ShantiNagar', 'Megaqsell Store', NULL, NULL, NULL, 'Abdur', 'Rahman', 'afshini_shop_banner_5.jpg', 'afshini_shop_logo_5.jpg', '2019-10-18 07:00:35', '2021-02-12 01:20:25'),
(3, 7, 'Fatema', NULL, NULL, 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, 'afshini_shop_banner_7.jpg', 'afshini_shop_logo_7.jpg', '2020-10-07 00:03:07', '2021-02-12 01:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED DEFAULT NULL,
  `shipping_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_service` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_value` decimal(10,2) DEFAULT NULL,
  `conditional` int(10) NOT NULL DEFAULT 0,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`id`, `seller_id`, `shipping_type`, `courier_service`, `courier_details`, `shipping_value`, `conditional`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'Free', 'Free shipping', 'Free shipping option available, if your order above ৳ 5000', '0.00', 5000, 'active', NULL, NULL, '2019-12-06 06:20:05', '2020-12-13 04:39:11'),
(2, 2, 'Basic', 'Inside Dhaka', 'Estimated time 1-3 business days', '80.00', 5000, 'active', NULL, NULL, '2019-12-06 06:22:45', '2021-01-16 03:52:54'),
(3, 2, 'Courier', 'Outside Dhaka', 'Estimated time 1-6 business days', '100.00', 5000, 'active', NULL, NULL, '2020-11-23 18:24:59', '2021-01-16 03:53:06'),
(4, 2, 'Overnight', 'Overnight', 'Estimated arrival on or before same day', '200.00', 5000, 'active', NULL, NULL, '2020-11-23 18:25:22', '2021-01-16 03:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` int(11) DEFAULT NULL,
  `image_link` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('home') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `slug`, `caption`, `route`, `short_order`, `image_link`, `type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Casual Shirt INDIGO DENIM', 'mens-casual-shirt-indigo-denim', 'Men\'s Casual Shirt INDIGO DENIM', '#', 1, 'mens-casual-shirt-indigo-denim.jpg', 'home', 'active', '1', NULL, '2019-12-06 06:25:57', '2019-12-06 06:25:57'),
(2, 'WOMEN Cotton Short Sleeve Dress', 'women-cotton-short-sleeve-dress', 'WOMEN Cotton Short Sleeve Dress', '#', 2, 'women-cotton-short-sleeve-dress.jpg', 'home', 'active', NULL, NULL, '2019-12-06 08:04:23', '2019-12-06 08:04:23'),
(3, 'kids & mom', 'kids-mom', 'kids & mom Fashion', '#', 3, 'kids-mom.jpg', 'home', 'active', NULL, NULL, '2019-12-06 08:04:59', '2019-12-06 08:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('admin','customer','seller') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_agreement` enum('no','yes') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `mobile_no`, `image`, `roles_id`, `type`, `seller_agreement`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$MF5eK1XzWDJmEVLkPqmaReHgkTkW13BDKlyYeYWa12PP.vXIrkm5W', 'Admin', '01712004426', NULL, 1, 'admin', NULL, 'active', 'j0bzdRBbiUHfR6XvrGsprErtI0GPlyDH6uSQY32NbiDG8zoKQqCjZrLfsrW8', NULL, '1', NULL, '2019-10-17 09:09:15'),
(2, 'shop1@gmail.com', '$2y$10$pydifKiATGng0yK/I1O.EuYINwV8euWp/nQjIGBpHGVA7N00KDdg6', 'Afshini', '01312-304426', NULL, 2, 'seller', NULL, 'active', 'CPGp17NU7yWox1krG0YtPItuEam4ylBJ62zbYQWzjErrJQtgp3iLzqH0YSvr', NULL, '2', '2019-07-03 18:59:36', '2019-10-17 08:37:24'),
(3, 'mithun@gmail.com', '$2y$10$QyTnfc8Pt0f81/d3b4v/FufPbaEpXsyvZ6r5euqjECc.NSs6vHFXa', 'mithun', '01732017887', NULL, 3, 'customer', NULL, 'active', 'YWNxvmYzd3W9T6UTObPfSRUfz3q5vC7xzOeSZvd4mlhDaEdUkUoDOdhY1jpV', NULL, '3', '2019-07-12 06:18:48', '2019-07-12 06:18:48'),
(4, 'abc@gmail.com', '$2y$10$V.TpF6Cp1vPbiZU3U/D55ODzEx9S5sLOYg3BFuVfGQunNVaK8ecDK', 'abdur', '01712004426', NULL, 3, 'customer', NULL, 'active', 'CPWn5noTtGEIR3WAwaxXuoLZyTzDeOD4v4f0HXLAX7lJXTVlGrWLvUBX4qKE', NULL, '4', '2019-07-15 10:38:10', '2019-10-17 08:35:21'),
(5, 'shop2@gmail.com', '$2y$10$vqKWZpDQWpu0piFIbMYH..xbOx8kCuX9P1DWPxNKm3LX1jt5LCZ2O', 'itgensoft', '01312304426', NULL, 2, 'seller', NULL, 'active', 'J2aKWblWz3pOqzf6qDfF6okMpf5tA5oUDJ5HlXhlPcKNDNJC86y4EIgSqmWP', NULL, '5', '2019-10-18 07:00:35', '2019-10-18 12:23:05'),
(7, 'shop3@gmail.com', '$2y$10$vqKWZpDQWpu0piFIbMYH..xbOx8kCuX9P1DWPxNKm3LX1jt5LCZ2O', NULL, '01730302380', NULL, NULL, 'seller', NULL, 'active', 'JchKkUX7BNijCARXtsM3lT0ZgCVjOggUe25gpMftD4DgKKYEmBcsg41guzCV', NULL, '7', '2020-10-07 00:03:07', '2020-10-07 00:03:07'),
(8, 'ruma.parvin@gmail.com', '$2y$10$M86GY5h.3jp3NNaRay98dOuqIa7gy0oPBstRnbA.DFiTluVKhnsYy', 'Ruma', '01680916991', NULL, NULL, 'customer', NULL, 'active', 'fad862a38cce266af9e7e72c5ac5f87d', NULL, NULL, '2020-12-17 20:16:40', '2020-12-17 20:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `users_billing_shipping`
--

CREATE TABLE `users_billing_shipping` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('billing','shipping') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_instruction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_phone` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_billing_shipping`
--

INSERT INTO `users_billing_shipping` (`id`, `users_id`, `type`, `name`, `lastname`, `email`, `address`, `special_instruction`, `city`, `area`, `zip`, `phone`, `alternative_phone`, `fax`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'billing', 'M Update', NULL, 'm@gmail.com', 'asdasdasdsda', NULL, NULL, NULL, NULL, '000011111', NULL, NULL, NULL, '3', '3', '2019-07-12 07:11:17', '2019-07-12 07:30:34'),
(2, 3, 'shipping', 'n 2', NULL, 'n@gmail.com', 'asdasdasd', NULL, NULL, NULL, NULL, '1114444', NULL, NULL, NULL, '3', '3', '2019-07-12 07:48:49', '2019-07-12 07:51:59'),
(3, 3, 'shipping', 'a', NULL, 'a@gmaul.com', 'askldasdasdlasn', NULL, NULL, NULL, NULL, '2323232', NULL, NULL, NULL, '3', NULL, '2019-07-12 07:52:30', '2019-07-12 07:52:30'),
(4, 4, 'billing', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', 'nothing', 'Tangail', 'Dhaka', '1980', '01712004426', '01712004420', NULL, NULL, '4', '4', '2019-07-15 11:55:14', '2020-12-13 00:33:50'),
(5, 4, 'shipping', 'Abdur', 'Rahman', 'abdurr.rahman@gmail.com', '1/B ( 3rd floor ) , Road : 08 , Banani, Dhaka', 'nothing', 'Dhaka', 'Dhaka', '1213', '01712004426', '01712004426', NULL, NULL, '4', '4', '2019-07-15 11:55:28', '2020-12-13 00:34:39'),
(6, 8, 'billing', 'ruma', 'parvin', 'ruma.parvin@gmail.com', 'Bogra', NULL, 'Bogra', 'Dhaka', '5400', '01680916991', NULL, NULL, NULL, '8', NULL, '2020-12-17 20:25:37', '2020-12-17 20:25:37');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_product`
-- (See below for the actual view)
--
CREATE TABLE `vw_product` (
`product_id` int(10) unsigned
,`product_title` varchar(128)
,`product_seller_id` int(10) unsigned
,`is_featured` varchar(32)
,`batch` varchar(32)
,`type` enum('simple-product','configurable-product','group-product')
,`product_slug` varchar(128)
,`short_description` text
,`specification` text
,`size_guide` text
,`description` text
,`category_title` mediumtext
,`item_no` varchar(64)
,`sell_price` decimal(10,4)
,`old_price` decimal(10,2)
,`list_price` decimal(10,4)
,`image` varchar(128)
,`meta_title` varchar(64)
,`meta_keywords` varchar(128)
,`meta_description` mediumtext
,`quantity` varchar(8)
,`total_review` bigint(21)
,`average_review` double(14,8)
);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `users_id`, `product_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 4, 27, '4', NULL, '2020-11-26 06:23:26', '2020-11-26 06:23:26');

-- --------------------------------------------------------

--
-- Structure for view `vw_product`
--
DROP TABLE IF EXISTS `vw_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_product`  AS  select `p`.`id` AS `product_id`,`p`.`title` AS `product_title`,`p`.`seller_id` AS `product_seller_id`,`p`.`is_featured` AS `is_featured`,`p`.`batch` AS `batch`,`p`.`type` AS `type`,`p`.`slug` AS `product_slug`,`p`.`short_description` AS `short_description`,`p`.`specification` AS `specification`,`p`.`size_guide` AS `size_guide`,`p`.`description` AS `description`,(select group_concat(`c`.`title` separator ',') from (`category` `c` join `product_category` `p_c` on(`c`.`id` = `p_c`.`category_id`)) where `p_c`.`product_id` = `p`.`id` limit 1) AS `category_title`,`p`.`item_no` AS `item_no`,`p`.`sell_price` AS `sell_price`,`p`.`old_price` AS `old_price`,`p`.`list_price` AS `list_price`,(select `p_i`.`image` from `product_image` `p_i` where `p`.`id` = `p_i`.`product_id` limit 1) AS `image`,(select `p_s`.`meta_title` from `product_seo` `p_s` where `p`.`id` = `p_s`.`product_id` limit 1) AS `meta_title`,(select `p_s`.`meta_keywords` from `product_seo` `p_s` where `p`.`id` = `p_s`.`product_id` limit 1) AS `meta_keywords`,(select `p_s`.`meta_description` from `product_seo` `p_s` where `p`.`id` = `p_s`.`product_id` limit 1) AS `meta_description`,(select `p_in`.`quantity` from `product_inventory` `p_in` where `p`.`id` = `p_in`.`product_id`) AS `quantity`,(select count(`p_review`.`id`) from `product_review` `p_review` where `p`.`id` = `p_review`.`product_id` and `p_review`.`status` = 'active') AS `total_review`,(select avg(`p_review`.`rating_value_score`) from `product_review` `p_review` where `p`.`id` = `p_review`.`product_id` and `p_review`.`status` = 'active') AS `average_review` from `product` `p` where `p`.`status` = 'active' and `p`.`title` <> '' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admanager`
--
ALTER TABLE `admanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_code_column_unique` (`code_column`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_option_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_set`
--
ALTER TABLE `attribute_set`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_set_slug_unique` (`slug`);

--
-- Indexes for table `attribute_set_items`
--
ALTER TABLE `attribute_set_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_set_items_attribute_id_foreign` (`attribute_id`),
  ADD KEY `attribute_set_items_attribute_set_id_foreign` (`attribute_set_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_slug_unique` (`slug`);

--
-- Indexes for table `category_self_relation`
--
ALTER TABLE `category_self_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_self_relation_parent_category_id_foreign` (`parent_category_id`),
  ADD KEY `category_self_relation_child_category_id_foreign` (`child_category_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_head_id_foreign` (`order_head_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_product_seller_id_foreign` (`product_seller_id`);

--
-- Indexes for table `order_head`
--
ALTER TABLE `order_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_shipping`
--
ALTER TABLE `order_shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_shipping_order_head_id_foreign` (`order_head_id`);

--
-- Indexes for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_transaction_order_head_id_foreign` (`order_head_id`),
  ADD KEY `order_transaction_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `payment_options`
--
ALTER TABLE `payment_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_slug_unique` (`slug`),
  ADD UNIQUE KEY `product_item_no_unique` (`item_no`),
  ADD KEY `product_attribute_set_id_foreign` (`attribute_set_id`),
  ADD KEY `product_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_product_id_foreign` (`product_id`),
  ADD KEY `product_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_coupon`
--
ALTER TABLE `product_coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_coupon_product_id_foreign` (`product_id`),
  ADD KEY `product_coupon_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_inventory_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_review_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_seo`
--
ALTER TABLE `product_seo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_seo_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_shipping`
--
ALTER TABLE `product_shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_shipping_product_id_foreign` (`product_id`),
  ADD KEY `product_shipping_shipping_method_id_foreign` (`shipping_method_id`);

--
-- Indexes for table `seller_profiles`
--
ALTER TABLE `seller_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_profiles_users_id_foreign` (`users_id`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_method_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_billing_shipping`
--
ALTER TABLE `users_billing_shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_billing_shipping_users_id_foreign` (`users_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_users_id_foreign` (`users_id`),
  ADD KEY `wishlist_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admanager`
--
ALTER TABLE `admanager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attribute_set`
--
ALTER TABLE `attribute_set`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attribute_set_items`
--
ALTER TABLE `attribute_set_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_self_relation`
--
ALTER TABLE `category_self_relation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `order_head`
--
ALTER TABLE `order_head`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_shipping`
--
ALTER TABLE `order_shipping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `order_transaction`
--
ALTER TABLE `order_transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `payment_options`
--
ALTER TABLE `payment_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product_coupon`
--
ALTER TABLE `product_coupon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_seo`
--
ALTER TABLE `product_seo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_shipping`
--
ALTER TABLE `product_shipping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `seller_profiles`
--
ALTER TABLE `seller_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_billing_shipping`
--
ALTER TABLE `users_billing_shipping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`);

--
-- Constraints for table `attribute_set_items`
--
ALTER TABLE `attribute_set_items`
  ADD CONSTRAINT `attribute_set_items_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`),
  ADD CONSTRAINT `attribute_set_items_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attribute_set` (`id`);

--
-- Constraints for table `category_self_relation`
--
ALTER TABLE `category_self_relation`
  ADD CONSTRAINT `category_self_relation_child_category_id_foreign` FOREIGN KEY (`child_category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category_self_relation_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_head_id_foreign` FOREIGN KEY (`order_head_id`) REFERENCES `order_head` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_product_seller_id_foreign` FOREIGN KEY (`product_seller_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_shipping`
--
ALTER TABLE `order_shipping`
  ADD CONSTRAINT `order_shipping_order_head_id_foreign` FOREIGN KEY (`order_head_id`) REFERENCES `order_head` (`id`);

--
-- Constraints for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD CONSTRAINT `order_transaction_order_head_id_foreign` FOREIGN KEY (`order_head_id`) REFERENCES `order_head` (`id`),
  ADD CONSTRAINT `order_transaction_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_attribute_set_id_foreign` FOREIGN KEY (`attribute_set_id`) REFERENCES `attribute_set` (`id`),
  ADD CONSTRAINT `product_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_category_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_coupon`
--
ALTER TABLE `product_coupon`
  ADD CONSTRAINT `product_coupon_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`id`),
  ADD CONSTRAINT `product_coupon_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD CONSTRAINT `product_inventory_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_seo`
--
ALTER TABLE `product_seo`
  ADD CONSTRAINT `product_seo_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `seller_profiles`
--
ALTER TABLE `seller_profiles`
  ADD CONSTRAINT `seller_profiles_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
