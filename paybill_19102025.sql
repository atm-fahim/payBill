-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.24 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table pay_drb_bill.access_menu
CREATE TABLE IF NOT EXISTS `access_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int DEFAULT NULL,
  `user_type` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT '0',
  `is_edit` tinyint(1) DEFAULT '0',
  `is_delete` tinyint(1) DEFAULT '0',
  `is_view` tinyint(1) DEFAULT '0',
  `is_request` tinyint(1) DEFAULT '0',
  `is_approved` tinyint(1) DEFAULT '0',
  `created_by` smallint DEFAULT NULL,
  `update_by` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.access_menu: ~18 rows (approximately)
INSERT INTO `access_menu` (`id`, `menu_id`, `user_type`, `is_create`, `is_edit`, `is_delete`, `is_view`, `is_request`, `is_approved`, `created_by`, `update_by`, `created_at`, `updated_at`, `status`) VALUES
	(1, 1, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(2, 2, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(3, 3, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(4, 4, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(5, 5, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(6, 6, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(7, 7, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(8, 8, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(9, 9, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(10, 10, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(11, 11, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(12, 12, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(13, 13, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-10-18 18:59:41', 1),
	(14, 14, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-09 11:35:04', '2025-10-18 18:59:41', 1),
	(48, 16, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-10-11 04:38:52', '2025-10-18 18:59:41', 1),
	(49, 17, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-10-11 04:38:52', '2025-10-18 18:59:41', 1),
	(50, 18, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-10-11 17:25:58', '2025-10-18 18:59:41', 1),
	(51, 19, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-10-11 17:25:58', '2025-10-18 18:59:41', 1),
	(52, 20, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-10-18 18:59:41', '2025-10-18 18:59:41', 1);

-- Dumping structure for table pay_drb_bill.backend_menu
CREATE TABLE IF NOT EXISTS `backend_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `menu_url` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `parent_id` int DEFAULT '0',
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `menu_name` (`menu_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.backend_menu: ~15 rows (approximately)
INSERT INTO `backend_menu` (`id`, `menu_name`, `slug`, `menu_url`, `icon`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Settings', 'settings', '#', 'cog', 0, 1, '2023-04-03 18:36:04', '2023-04-08 17:18:32'),
	(2, 'Organization', 'organization', 'organization', 'right-arrow-alt', 1, 1, '2023-04-03 18:36:59', '2023-04-08 17:10:31'),
	(3, 'Branch', 'branch', 'branch', 'right-arrow-alt', 1, 1, '2023-04-03 18:37:24', '2023-08-06 16:43:53'),
	(7, 'Category', 'category', 'category', 'right-arrow-alt', 1, 1, '2023-04-08 17:14:51', '2023-04-08 17:16:09'),
	(8, 'Payment Method', 'payment-method', 'payment-method', 'right-arrow-alt', 1, 1, '2023-04-08 17:14:51', '2023-08-06 16:42:44'),
	(9, 'User Type', 'user-type', 'user-type', 'right-arrow-alt', 12, 1, '2023-04-08 17:14:51', '2023-08-06 16:45:26'),
	(10, 'Users', 'users', 'users', 'right-arrow-alt', 12, 1, '2023-04-08 17:14:51', '2023-08-06 16:45:29'),
	(11, 'Backend Menu', 'backend-menu', 'backend-menu', 'right-arrow-alt', 1, 1, '2023-04-08 17:14:51', '2023-08-06 16:42:53'),
	(12, 'User Management', 'user-management', '#', 'user-circle', 0, 1, '2023-04-14 03:42:03', '2023-08-06 16:43:32'),
	(13, 'User Permission', 'permission', 'permission', 'right-arrow-alt', 12, 1, '2023-04-14 12:55:59', '2023-08-06 16:45:31'),
	(14, 'Logo', 'logo', 'logo', 'plus', 1, 1, '2025-08-01 12:32:46', '2025-10-10 17:38:58'),
	(16, 'Customer', 'customer', 'customer', 'plus', 1, 1, '2025-10-11 04:38:15', '2025-10-11 04:38:15'),
	(17, 'Supplier', 'supplier', 'supplier', 'plus', 1, 1, '2025-10-11 04:38:35', '2025-10-11 04:38:35'),
	(18, 'Accounting', 'accounting', '#', 'abacus', 0, 1, '2025-10-11 13:28:01', '2025-10-11 13:28:01'),
	(19, 'Supplier Payment', 'supplier-payment', 'supplier-payment', 'Plus', 18, 1, '2025-10-11 17:25:43', '2025-10-11 17:25:43'),
	(20, 'Customer Payment', 'customer-payment', 'customer-payment', 'plus', 18, 1, '2025-10-18 18:59:25', '2025-10-18 18:59:25');

-- Dumping structure for table pay_drb_bill.bank_payment
CREATE TABLE IF NOT EXISTS `bank_payment` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ac_no` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bdt_rate` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `other_rate` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `total_amount` decimal(20,2) DEFAULT NULL,
  `grand_amount` decimal(20,2) DEFAULT NULL,
  `due_amount` decimal(20,2) DEFAULT NULL,
  `due_pay_amount` decimal(20,2) DEFAULT NULL,
  `payment_status` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `org_id` int DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.bank_payment: ~0 rows (approximately)

-- Dumping structure for table pay_drb_bill.branch
CREATE TABLE IF NOT EXISTS `branch` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `city` varchar(50) DEFAULT NULL,
  `organization_id` int DEFAULT '1',
  `company_id` int DEFAULT '0',
  `state` varchar(200) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `map_link` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `fb_link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `details` text,
  `slug` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `banner` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `branch_name` (`branch_name`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.branch: ~2 rows (approximately)
INSERT INTO `branch` (`id`, `branch_name`, `address`, `city`, `organization_id`, `company_id`, `state`, `zip_code`, `contact_number`, `map_link`, `email`, `fb_link`, `linkedin`, `details`, `slug`, `status`, `banner`, `created_at`, `updated_at`) VALUES
	(1, 'Dhaka Branch', 'Dhaka, Gulshan 1', 'Dhaka', 1, 1, 'Gulshan', '1212', '01717302935', NULL, NULL, NULL, NULL, '<p>About Branch dhaka</p>', 'dhaka-branch', 1, NULL, '2023-06-11 12:07:43', '2025-08-17 19:06:29'),
	(2, 'Feni', 'trang road,Feni', 'Feni', 1, 1, 'Feni Sadar', '3900', '01717302935', NULL, 'info@feni.com', NULL, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered altera tion in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>', 'feni', 1, 'uploads/thumbnail/feni/1755693699.jpg', '2023-07-23 03:31:40', '2025-08-20 12:41:40');

-- Dumping structure for table pay_drb_bill.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `parent_id` int DEFAULT '0',
  `thumb_image` varchar(256) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category-slug` (`slug`) USING BTREE,
  FULLTEXT KEY `category_name` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.category: ~0 rows (approximately)
INSERT INTO `category` (`id`, `category`, `slug`, `parent_id`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'General', 'general', 0, NULL, 1, '2023-05-15 13:30:14', '2023-08-06 16:48:22'),
	(2, 'test', 'test', 0, NULL, 1, '2025-10-18 18:07:24', '2025-10-18 18:07:24');

-- Dumping structure for table pay_drb_bill.contact_us
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `branch_id` int DEFAULT '0',
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `organization_id` int DEFAULT '1',
  `state` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `zip_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `hotline_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contact_number_two` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `map_link` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fb_link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `banner` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `slug` (`slug`) USING BTREE,
  KEY `branch_name` (`branch_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.contact_us: ~2 rows (approximately)
INSERT INTO `contact_us` (`id`, `branch_id`, `address`, `city`, `organization_id`, `state`, `zip_code`, `contact_number`, `hotline_number`, `contact_number_two`, `email`, `map_link`, `fb_link`, `linkedin`, `slug`, `status`, `banner`, `created_at`, `updated_at`) VALUES
	(1, 0, '<p>124 Whitechapel Road.London E1 1JE</p>', NULL, 1, NULL, '1200', '880 1717 302935', '44 7596 034348', NULL, 'nexusintuk@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '2025-08-09 08:25:57', '2025-09-25 19:28:29'),
	(2, 1, '<p>test</p>', NULL, 1, NULL, '1000', '454', '545', NULL, 't@gmail.com', NULL, 'fb', 'l', NULL, 1, NULL, '2025-08-09 08:52:08', '2025-09-25 19:23:34');

-- Dumping structure for table pay_drb_bill.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `branch_id` bigint DEFAULT '1',
  `org_id` bigint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.customer: ~1 rows (approximately)
INSERT INTO `customer` (`id`, `customer_name`, `slug`, `code`, `address`, `phone_number`, `password`, `status`, `branch_id`, `org_id`, `created_at`, `updated_at`) VALUES
	(1, 'test', 'test', 'TE-G206', 'test', '01717302935', '$2y$10$cYgOVVxbJXR/1BDIiI3NDeqxbxcdJoa/ac7GkOlF.sUsF9Jxzs/bi', 1, 1, 1, '2025-10-11 12:56:26', '2025-10-11 12:57:34');

-- Dumping structure for table pay_drb_bill.customer_payment
CREATE TABLE IF NOT EXISTS `customer_payment` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `customer_id` bigint DEFAULT '1',
  `invoice_no` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ac_no` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bdt_rate` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `other_rate` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `other_amount` varchar(100) DEFAULT NULL,
  `bdt_amount` decimal(20,2) DEFAULT NULL,
  `grand_amount` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `due_amount` decimal(20,2) DEFAULT NULL,
  `due_pay_amount` decimal(20,2) DEFAULT NULL,
  `payment_status` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `payment_method_id` int DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `org_id` int DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.customer_payment: ~0 rows (approximately)
INSERT INTO `customer_payment` (`id`, `customer_id`, `invoice_no`, `ac_no`, `bdt_rate`, `other_rate`, `other_amount`, `bdt_amount`, `grand_amount`, `paid_amount`, `due_amount`, `due_pay_amount`, `payment_status`, `payment_method_id`, `branch_id`, `org_id`, `email`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, '2510190000', '32132165', '25', NULL, '30', 750.00, NULL, 750.00, 0.00, NULL, NULL, 4, 1, NULL, NULL, NULL, 1, '2025-10-18 19:06:11', '2025-10-18 19:06:11');

-- Dumping structure for table pay_drb_bill.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pay_drb_bill.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pay_drb_bill.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.faq: ~8 rows (approximately)
INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'What is the process for obtaining a student visa?', '<p>You need to receive a Confirmation of Acceptance for Studies (CAS) from your university, then complete the visa application, pay fees, and attend a visa appointment.</p>', 1, '2025-08-08 18:18:54', '2025-09-26 05:56:26'),
	(2, 'How do I apply for scholarships?', '<p>Research available scholarships, check eligibility criteria, and submit applications along with required documents before the deadlines.</p>', 1, '2025-08-21 07:00:51', '2025-09-26 05:55:56'),
	(3, 'What are the entry requirements for UK universities?', '<p>Entry requirements vary by university and program, typically including academic qualifications, English language proficiency, and standardized test scores (if applicable).</p>', 1, '2025-08-21 07:01:08', '2025-09-26 05:55:34'),
	(4, 'Can I work while studying in the UK?', '<p>Yes, international students may work part-time (up to 20 hours per week during term time) with certain restrictions depending on your visa type.</p>', 1, '2025-09-26 06:41:21', '2025-09-26 06:41:21'),
	(5, 'What should I do if I have trouble settling in?', '<p>Many universities offer counseling and support services. Reach out to your university&rsquo;s international student office for help and resources.</p>', 1, '2025-09-26 06:41:39', '2025-09-26 06:41:39'),
	(6, 'Are there any orientation programs for new students?', '<p>Most universities conduct orientation programs to help new students familiarize themselves with campus life, academic expectations, and local culture.</p>', 1, '2025-09-26 06:41:55', '2025-09-26 06:41:55'),
	(7, 'How can I find accommodation?', '<p>You can find accommodation through your university&rsquo;s housing service, local rental websites, or by contacting local landlords directly.</p>', 1, '2025-09-26 06:42:25', '2025-09-26 06:42:25'),
	(8, 'What health services are available for international students?', '<p>International students can register with the National Health Service (NHS) and access healthcare services, though you may need to pay an immigration health surcharge.</p>', 1, '2025-09-26 06:42:47', '2025-09-26 06:42:47');

-- Dumping structure for table pay_drb_bill.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `album_id` int DEFAULT NULL,
  `image_path` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.images: ~4 rows (approximately)
INSERT INTO `images` (`id`, `album_id`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'upload/album/1/68c536df84bbd.jpg', 1, '2025-08-28 18:34:06', '2025-09-13 09:18:54'),
	(2, 1, 'upload/album/1/68c536df8e7ea.jpg', 1, '2025-08-28 18:34:06', '2025-09-13 09:18:59'),
	(3, 1, 'upload/album/1/68c536df84bbd.jpg', 1, '2025-09-13 09:18:23', '2025-09-13 09:18:23'),
	(4, 1, 'upload/album/1/68c536df8e7ea.jpg', 1, '2025-09-13 09:18:23', '2025-09-13 09:18:23');

-- Dumping structure for table pay_drb_bill.logo
CREATE TABLE IF NOT EXISTS `logo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `favicon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `small_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dashboard_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dashboard_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dashboard_favicon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.logo: ~0 rows (approximately)

-- Dumping structure for table pay_drb_bill.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pay_drb_bill.migrations: ~4 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table pay_drb_bill.notice
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `notice_start` datetime DEFAULT NULL,
  `notice_end` datetime DEFAULT NULL,
  `notice_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_continue` tinyint DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.notice: ~2 rows (approximately)
INSERT INTO `notice` (`id`, `notice_title`, `notice_start`, `notice_end`, `notice_file`, `slug`, `is_continue`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Notice & Event', '2025-08-22 00:00:00', '2025-08-30 00:00:00', 'uploads/notice/1757442240.jpg', 'notice-event', 1, 1, '2025-08-23 17:38:36', '2025-09-09 18:51:49'),
	(2, 'test event', '2025-09-10 00:00:00', '2025-09-27 00:00:00', 'uploads/notice/1757443905.png', 'test-event', 1, 1, '2025-09-09 18:36:47', '2025-09-09 18:51:45');

-- Dumping structure for table pay_drb_bill.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `nid` int NOT NULL AUTO_INCREMENT,
  `gid` int DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `noti_date` int DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.notifications: 0 rows
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table pay_drb_bill.organization
CREATE TABLE IF NOT EXISTS `organization` (
  `id` int NOT NULL AUTO_INCREMENT,
  `org_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `thumb_image` varchar(256) DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `brand-slug` (`slug`) USING BTREE,
  FULLTEXT KEY `org_name` (`org_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.organization: ~0 rows (approximately)
INSERT INTO `organization` (`id`, `org_name`, `slug`, `address`, `thumb_image`, `phone_number`, `logo`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Kpharma1', 'kpharma1', 'Dhaka', 'uploads/thumbnail/org//1690077461.png', '01717302935', NULL, 1, '2023-07-22 19:57:42', '2023-07-22 20:00:29');

-- Dumping structure for table pay_drb_bill.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pay_drb_bill.password_resets: ~0 rows (approximately)

-- Dumping structure for table pay_drb_bill.payment_method
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `method_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `org_id` bigint DEFAULT '1',
  `branch_id` bigint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.payment_method: ~4 rows (approximately)
INSERT INTO `payment_method` (`id`, `method_name`, `slug`, `status`, `org_id`, `branch_id`, `created_at`, `updated_at`) VALUES
	(1, 'bKash', 'bkash', 1, 1, 1, '2025-10-10 19:56:53', '2025-10-10 19:56:53'),
	(2, 'Nagad', 'nagad', 1, 1, 1, '2025-10-10 19:57:03', '2025-10-10 19:57:03'),
	(3, 'Upay', 'upay', 1, 1, 1, '2025-10-10 19:57:25', '2025-10-10 19:57:25'),
	(4, 'Brac Visa', 'brac-visa', 1, 1, 1, '2025-10-10 19:57:40', '2025-10-10 19:57:40');

-- Dumping structure for table pay_drb_bill.super_admin
CREATE TABLE IF NOT EXISTS `super_admin` (
  `super_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `veri` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`super_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pay_drb_bill.super_admin: ~0 rows (approximately)
INSERT INTO `super_admin` (`super_id`, `email`, `username`, `password`, `veri`) VALUES
	(1, 'superadmin@example.com', 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- Dumping structure for table pay_drb_bill.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `branch_id` bigint DEFAULT '1',
  `org_id` bigint DEFAULT '1',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.supplier: ~1 rows (approximately)
INSERT INTO `supplier` (`id`, `supplier_name`, `slug`, `code`, `address`, `branch_id`, `org_id`, `email`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'test', 'test', 'TE-28GG', 'test', 1, 1, NULL, '01717302935', 1, '2025-10-11 12:56:47', '2025-10-11 12:57:22');

-- Dumping structure for table pay_drb_bill.supplier_payment
CREATE TABLE IF NOT EXISTS `supplier_payment` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `supplier_id` bigint DEFAULT '1',
  `invoice_no` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ac_no` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bdt_rate` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `other_rate` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `other_amount` decimal(20,2) DEFAULT NULL,
  `bdt_amount` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `due_amount` decimal(20,2) DEFAULT NULL,
  `due_pay_amount` decimal(20,2) DEFAULT NULL,
  `payment_status` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `payment_method_id` int DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `org_id` int DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.supplier_payment: ~0 rows (approximately)
INSERT INTO `supplier_payment` (`id`, `supplier_id`, `invoice_no`, `ac_no`, `bdt_rate`, `other_rate`, `other_amount`, `bdt_amount`, `paid_amount`, `due_amount`, `due_pay_amount`, `payment_status`, `payment_method_id`, `branch_id`, `org_id`, `email`, `phone_number`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, '2510190000', '13231321', '25', NULL, 30.00, 750.00, 750.00, 0.00, NULL, NULL, 4, 1, NULL, NULL, NULL, 1, '2025-10-18 18:22:04', '2025-10-18 18:22:04'),
	(2, 1, '2510190000', '13231321', '25', NULL, 30.00, 750.00, 750.00, 0.00, NULL, NULL, 4, 1, NULL, NULL, NULL, 1, '2025-10-18 18:23:14', '2025-10-18 18:23:14'),
	(3, 1, '2510190000', '01717302935', '20', NULL, 30.00, 600.00, 600.00, 0.00, NULL, NULL, 4, 1, NULL, NULL, NULL, 1, '2025-10-18 18:28:13', '2025-10-18 18:28:13');

-- Dumping structure for table pay_drb_bill.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_types` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint NOT NULL DEFAULT '0',
  `org_id` bigint NOT NULL DEFAULT '0',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cash_no` int DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gauth_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pay_drb_bill.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `user_types`, `branch_id`, `org_id`, `email`, `cash_no`, `email_verified_at`, `gauth_id`, `facebook_id`, `password`, `contact_no`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'super-admin', 1, 1, 'sp_admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$zkA7gvuoQ860iFvCnPoTGOs5JgW8Qy2JwEeC8dSq1PGlu4ln05OLG', '01717302935', NULL, 1, NULL, '2023-04-12 05:03:14', '2025-08-04 19:30:30'),
	(2, 'Senior Software Engineer (Fahim Bhuiyan)', 'google', 1, 1, 'atmfahimcse@gmail.com', NULL, NULL, '110511357611426282053', NULL, '$2y$10$m5ZfFqUOPhC8yZLvYywXfOhLjy94z5FbdNhWxXnMwsdGPIMl3Q1le', NULL, NULL, 1, NULL, '2023-06-21 13:35:52', '2025-08-04 19:30:31'),
	(3, 'Demo', 'instructor', 1, 1, 'demo@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$MKH41To8S3wUESbCmaJG1Oxt/Y3LXsRvmAqhros2NcLhd0VIEyi/S', '01717302935', NULL, 1, NULL, '2023-08-28 16:21:24', '2025-08-04 19:30:32');

-- Dumping structure for table pay_drb_bill.user_access_type
CREATE TABLE IF NOT EXISTS `user_access_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `slug` varchar(100) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.user_access_type: ~4 rows (approximately)
INSERT INTO `user_access_type` (`id`, `user_type`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'super-admin', 1, '2023-04-07 23:31:22', '2023-04-12 18:54:19'),
	(2, 'Admin', 'admin', 1, '2023-04-12 12:55:37', '2023-04-12 12:55:37'),
	(3, 'HR', 'hr', 1, '2023-04-12 12:55:55', '2023-04-12 12:55:55'),
	(4, 'Instructor', 'instructor', 1, '2023-04-12 12:56:09', '2023-08-28 16:20:06');

-- Dumping structure for table pay_drb_bill.user_group
CREATE TABLE IF NOT EXISTS `user_group` (
  `gid` int NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) NOT NULL,
  `institute_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table pay_drb_bill.user_group: ~2 rows (approximately)
INSERT INTO `user_group` (`gid`, `group_name`, `institute_id`) VALUES
	(9, 'Group1', 1),
	(10, 'Group 2', 1);

-- Dumping structure for table pay_drb_bill.why_choose
CREATE TABLE IF NOT EXISTS `why_choose` (
  `id` int NOT NULL AUTO_INCREMENT,
  `why_choose` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `we_think` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `we_envision` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `we_biuld` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table pay_drb_bill.why_choose: ~0 rows (approximately)

-- Dumping structure for procedure pay_drb_bill.permission_menu_access
DELIMITER //
CREATE PROCEDURE `permission_menu_access`(
	IN `pid` INT,
	IN `type` VARCHAR(50)
)
BEGIN
SELECT t1.id,t1.menu_name,t1.parent_id,t1.slug,t1.menu_url,t1.icon,acc.is_create,acc.is_edit,acc.is_delete,acc.is_view,acc.is_request,acc.is_approved 
 FROM access_menu AS acc
LEFT JOIN backend_menu AS t1 ON t1.id=acc.menu_id 
WHERE acc.`status`=1 AND t1.parent_id=`pid` AND t1.`status`<>9  AND acc.user_type=`type`
#AND (acc.is_create <> 0 OR acc.is_edit<>0 OR acc.is_view<>0 OR acc.is_delete<>0)


UNION 

SELECT ms.id,ms.menu_name,ms.parent_id,ms.slug,ms.menu_url,ms.icon,0 is_create,0 is_edit,0 is_delete,0 is_view,0 is_request,0 is_approved
 FROM backend_menu AS ms WHERE ms.`status`<>9 AND  ms.parent_id=`pid` AND 
  ms.id NOT IN (
 SELECT pm.menu_id FROM access_menu as pm WHERE  pm.user_type=`type`  AND  pm.status=1 
 ) ORDER BY menu_name;
END//
DELIMITER ;

-- Dumping structure for procedure pay_drb_bill.user_type_wise_menu
DELIMITER //
CREATE PROCEDURE `user_type_wise_menu`(
	IN `user_types` VARCHAR(100),
	IN `pr_menu_id` INT
)
BEGIN
SELECT t1.id,t1.menu_name,t1.slug,t1.parent_id,t1.menu_url,t1.icon 
FROM backend_menu t1 WHERE t1.`status`=1 AND t1.parent_id=`pr_menu_id`
 AND t1.id IN (SELECT t2.menu_id FROM access_menu t2 WHERE  t2.status=1 AND t2.user_type=`user_types`) ORDER BY t1.menu_name;
END//
DELIMITER ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
