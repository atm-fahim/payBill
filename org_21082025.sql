-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.41 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table corporate.about_us
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `about_us_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `about_us_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `about_us_details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `chairman_profile_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `chairman_profile` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `chairman_image` varchar(255) DEFAULT NULL,
  `mission_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mission_details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `mission_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `vision_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `vision_details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `vision_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.about_us: ~0 rows (approximately)
REPLACE INTO `about_us` (`id`, `about_us_title`, `about_us_image`, `about_us_details`, `chairman_profile_title`, `chairman_profile`, `chairman_image`, `mission_title`, `mission_details`, `mission_image`, `vision_title`, `vision_details`, `vision_image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'About Us', 'uploads/about_us/1755758811.jpg', '<div class="text">\r\n<p data-start="175" data-end="504">At <strong data-start="178" data-end="192">Piur Group</strong>, we are dedicated to advancing healthcare through innovation, quality, and compassionate service. Established with a vision to improve medical outcomes and enhance patient well-being, our group brings together a team of experienced professionals committed to excellence in the fields of medicine and healthcare.</p>\r\n<p data-start="506" data-end="870">We specialize in providing comprehensive medical solutions, including pharmaceutical products, medical devices, and healthcare services tailored to meet the evolving needs of patients and healthcare providers. Our mission is to bridge the gap between cutting-edge medical technology and accessible healthcare, ensuring safe, effective, and affordable care for all.</p>\r\n<p data-start="872" data-end="1223">Driven by research, integrity, and a patient-centered approach, Piur Group continuously invests in the latest advancements and rigorous quality standards to deliver trustworthy products and services. Our collaborative efforts with medical practitioners, hospitals, and research institutions empower us to stay at the forefront of the medical industry.</p>\r\n<p data-start="1225" data-end="1359">At Piur Group, your health is our priority. We strive to build lasting partnerships and contribute to healthier communities worldwide.</p>\r\n</div>', 'Chairman’s Message', '<p data-start="133" data-end="155">Welcome to Piur Group.</p>\r\n<p data-start="157" data-end="554">It is with great pride and commitment that I lead Piur Group on our journey to transform healthcare and improve lives. Our dedication to innovation, quality, and ethical practices drives everything we do. In an industry where trust and reliability are paramount, we strive to exceed expectations by delivering medical products and services that healthcare professionals and patients can depend on.</p>\r\n<p data-start="556" data-end="817">At Piur Group, we believe that healthcare is a fundamental right, and our mission is to make advanced medical solutions accessible to all. We continuously invest in research, technology, and partnerships to ensure we remain at the forefront of medical progress.</p>\r\n<p data-start="819" data-end="964">I want to thank our team, partners, and customers for their unwavering support and trust. Together, we will continue to build a healthier future.</p>\r\n<p data-start="966" data-end="1024">Sincerely,<br data-start="976" data-end="979">[Chairman&rsquo;s Full Name]<br data-start="1001" data-end="1004">Chairman, Piur Group</p>', 'uploads/chairman_image/1755758812.jpg', 'Our Mission & Vision', '<p>At Piur Group, our mission is to enhance healthcare quality and accessibility by delivering innovative, reliable, and safe medical products and services. We are committed to advancing medical science through continuous research and collaboration, while upholding the highest standards of ethics and patient care. Our goal is to empower healthcare professionals and improve patient outcomes, contributing to healthier communities worldwide.</p>', 'uploads/mission/1755758811.jpg', 'Our Vision', '<p>To be a global leader in medical innovation and healthcare solutions, recognized for transforming patient care through cutting-edge technology, exceptional quality, and unwavering dedication to improving lives.</p>', NULL, 1, '2024-11-13 15:51:28', '2025-08-21 09:48:28');

-- Dumping structure for table corporate.access_menu
CREATE TABLE IF NOT EXISTS `access_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int DEFAULT NULL,
  `user_type` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.access_menu: ~33 rows (approximately)
REPLACE INTO `access_menu` (`id`, `menu_id`, `user_type`, `is_create`, `is_edit`, `is_delete`, `is_view`, `is_request`, `is_approved`, `created_by`, `update_by`, `created_at`, `updated_at`, `status`) VALUES
	(1, 1, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(2, 2, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(3, 3, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(4, 4, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(5, 5, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(6, 6, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(7, 7, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(8, 8, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(9, 9, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(10, 10, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(11, 11, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(12, 12, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(13, 13, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-08-20 13:37:19', 1),
	(14, 14, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-09 11:35:04', '2024-11-15 17:15:48', 9),
	(15, 15, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-09 11:35:04', '2024-11-15 17:15:48', 9),
	(16, 16, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-13 16:15:12', '2024-11-15 17:15:48', 9),
	(17, 17, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-14 03:39:49', '2024-11-15 17:15:48', 9),
	(18, 18, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-14 03:42:24', '2024-11-15 17:15:48', 9),
	(19, 19, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-14 12:56:18', '2024-11-15 17:15:48', 9),
	(20, 20, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-14 12:56:18', '2025-08-20 13:37:19', 1),
	(21, 21, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-16 05:59:23', '2025-08-20 13:37:19', 1),
	(22, 22, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-05-27 07:43:19', '2025-08-20 13:37:19', 1),
	(23, 23, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-05-27 07:43:19', '2025-08-20 13:37:19', 1),
	(24, 24, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-07-09 11:37:56', '2025-08-20 13:37:19', 1),
	(25, 25, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-07-20 12:49:45', '2025-08-20 13:37:19', 1),
	(26, 26, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-07-20 12:49:45', '2025-08-20 13:37:19', 1),
	(27, 27, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-07-23 03:36:50', '2025-08-20 13:37:19', 1),
	(28, 29, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-07-23 03:36:50', '2025-08-20 13:37:19', 1),
	(29, 28, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-07-23 03:36:50', '2025-08-20 13:37:19', 1),
	(30, 30, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-01 12:33:10', '2025-08-20 13:37:19', 1),
	(31, 31, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-08 18:09:22', '2025-08-20 13:37:19', 1),
	(32, 32, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-08-13 17:52:17', '2025-08-20 13:37:19', 1),
	(33, 33, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-13 17:52:17', '2025-08-20 13:37:19', 1),
	(34, 34, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-08-20 13:37:19', '2025-08-20 13:37:19', 1),
	(35, 35, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-20 13:37:19', '2025-08-20 13:37:19', 1);

-- Dumping structure for table corporate.albums
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.albums: ~0 rows (approximately)
REPLACE INTO `albums` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'test', 1, '2025-07-22 17:57:47', '2025-07-22 17:57:47');

-- Dumping structure for table corporate.backend_menu
CREATE TABLE IF NOT EXISTS `backend_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `menu_url` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `parent_id` int DEFAULT '0',
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `menu_name` (`menu_name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.backend_menu: ~26 rows (approximately)
REPLACE INTO `backend_menu` (`id`, `menu_name`, `slug`, `menu_url`, `icon`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
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
	(20, 'Slider', 'slider', '#', 'image', 0, 1, '2024-11-02 09:40:20', '2024-11-02 09:40:20'),
	(21, 'Add Slider', 'add-slider', 'add-slider', 'right-arrow-alt', 20, 1, '2024-11-02 09:50:05', '2025-08-08 11:27:40'),
	(22, 'About Us', 'about-us', '#', 'message-detail', 0, 1, '2024-11-10 16:00:50', '2024-11-10 16:01:45'),
	(23, 'About', 'about', 'about', 'right-arrow-alt', 22, 1, '2024-11-10 16:01:15', '2024-11-10 16:01:15'),
	(24, 'Service', 'service', '#', 'donate-heart', 0, 1, '2024-11-13 16:16:13', '2024-11-13 16:16:13'),
	(25, 'Add Service', 'add-service', 'add-service', 'donate-heart', 24, 1, '2024-11-13 16:16:36', '2025-08-20 13:38:56'),
	(26, 'Team', 'team', '#', 'user-plus', 0, 1, '2024-11-15 16:36:39', '2024-11-15 17:04:57'),
	(27, 'Team Member', 'team-member', 'team-member', 'right-arrow-alt', 26, 1, '2024-11-15 16:47:02', '2024-11-15 16:47:02'),
	(28, 'FAQ', 'faq', '#', 'question-mark', 0, 1, '2024-11-15 17:37:59', '2024-11-15 17:37:59'),
	(29, 'Add Faq', 'add-faq', 'add-faq', 'right-arrow-alt', 28, 1, '2024-11-15 18:18:45', '2024-11-15 18:18:45'),
	(30, 'Logo', 'logo', 'logo', 'plus', 1, 1, '2025-08-01 12:32:46', '2025-08-01 12:32:46'),
	(31, 'Contact Us', 'contact-us', 'contact-us', 'plus', 1, 1, '2025-08-08 18:07:55', '2025-08-08 18:07:55'),
	(32, 'Upcoming', 'upcoming', '#', 'meteor', 0, 1, '2025-08-13 17:48:03', '2025-08-13 17:48:03'),
	(33, 'Upcoming Project', 'upcoming-project', 'upcoming-project', 'plus', 32, 1, '2025-08-13 17:51:51', '2025-08-13 17:51:51'),
	(34, 'Our Client', 'our-client', '#', 'user-plus', 0, 1, '2025-08-13 23:07:00', '2025-08-13 23:07:00'),
	(35, 'Add Client', 'add-client', 'add-client', 'plus', 34, 1, '2025-08-13 23:12:22', '2025-08-13 23:12:22');

-- Dumping structure for table corporate.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `blog_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `blog_details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.blog: ~0 rows (approximately)

-- Dumping structure for table corporate.branch
CREATE TABLE IF NOT EXISTS `branch` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `city` varchar(50) DEFAULT NULL,
  `organization_id` int DEFAULT '1',
  `state` varchar(200) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `map_link` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `fb_link` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `details` text,
  `slug` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `banner` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `branch_name` (`branch_name`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.branch: ~2 rows (approximately)
REPLACE INTO `branch` (`id`, `branch_name`, `address`, `city`, `organization_id`, `state`, `zip_code`, `contact_number`, `map_link`, `email`, `fb_link`, `linkedin`, `details`, `slug`, `status`, `banner`, `created_at`, `updated_at`) VALUES
	(1, 'Dhaka Branch', 'Dhaka, Gulshan 1', 'Dhaka', 1, 'Gulshan', '1212', '01717302935', NULL, NULL, NULL, NULL, '<p>About Branch dhaka</p>', 'dhaka-branch', 1, NULL, '2023-06-11 12:07:43', '2025-08-17 19:06:29'),
	(2, 'Feni', 'trang road,Feni', 'Feni', 1, 'Feni Sadar', '3900', '01717302935', NULL, 'info@feni.com', NULL, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered altera tion in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>', 'feni', 1, 'uploads/thumbnail/feni/1755693699.jpg', '2023-07-23 03:31:40', '2025-08-20 12:41:40');

-- Dumping structure for table corporate.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `slug` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.category: ~0 rows (approximately)
REPLACE INTO `category` (`id`, `category`, `slug`, `parent_id`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'General', 'general', 0, NULL, 1, '2023-05-15 13:30:14', '2023-08-06 16:48:22');

-- Dumping structure for table corporate.contact_us
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `branch_id` int DEFAULT '0',
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `city` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `organization_id` int DEFAULT '1',
  `state` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `zip_code` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hotline_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `contact_number_two` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `map_link` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fb_link` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `slug` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `banner` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `slug` (`slug`) USING BTREE,
  KEY `branch_name` (`branch_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.contact_us: ~2 rows (approximately)
REPLACE INTO `contact_us` (`id`, `branch_id`, `address`, `city`, `organization_id`, `state`, `zip_code`, `contact_number`, `hotline_number`, `contact_number_two`, `email`, `map_link`, `fb_link`, `linkedin`, `slug`, `status`, `banner`, `created_at`, `updated_at`) VALUES
	(3, 0, '<p>121 King Street, USA, Newyork</p>', NULL, 1, NULL, '1200', '0177711', '+1 401 572 442335', NULL, 'finan@mail.com', NULL, NULL, NULL, NULL, 1, NULL, '2025-08-09 08:25:57', '2025-08-20 10:46:01'),
	(4, 1, '<p>test</p>', NULL, 1, NULL, '1000', '454', '545', NULL, 't@gmail.com', NULL, 'fb', 'l', NULL, 1, NULL, '2025-08-09 08:52:08', '2025-08-09 08:58:47');

-- Dumping structure for table corporate.failed_jobs
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

-- Dumping data for table corporate.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table corporate.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.faq: ~3 rows (approximately)
REPLACE INTO `faq` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'How do I find my Windows product key?', '<p>The argument in favor of using filler text goes something like this: If you use real content in the design process, anytime reach a review point you&rsquo;ll end up reviewing and negotiating.</p>', 1, '2025-08-08 18:18:54', '2025-08-21 07:00:33'),
	(2, 'I\'ve downloaded an ISO file, now what?', '<p>The argument in favor of using filler text goes something like this: If you use real content in the design process, anytime reach a review point you&rsquo;ll end up reviewing and negotiating.</p>', 1, '2025-08-21 07:00:51', '2025-08-21 07:00:51'),
	(3, 'Is the media bootable?', '<p>The argument in favor of using filler text goes something like this: If you use real content in the design process, anytime reach a review point you&rsquo;ll end up reviewing and negotiating.</p>', 1, '2025-08-21 07:01:08', '2025-08-21 07:01:08');

-- Dumping structure for table corporate.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `album_id` int DEFAULT NULL,
  `image_path` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.images: ~2 rows (approximately)
REPLACE INTO `images` (`id`, `album_id`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'upload/album/1/687fd17baf98f.jpeg', 1, '2025-07-22 17:59:23', '2025-07-22 17:59:23'),
	(2, 1, 'upload/album/1/687fd17bd8b3e.png', 1, '2025-07-22 17:59:23', '2025-07-22 17:59:23');

-- Dumping structure for table corporate.logo
CREATE TABLE IF NOT EXISTS `logo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fevicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.logo: ~0 rows (approximately)
REPLACE INTO `logo` (`id`, `logo_image`, `fevicon`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'uploads/logo/1755758706.png', NULL, '2024-07-28 16:49:52', '2025-08-21 06:45:06', 1);

-- Dumping structure for table corporate.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table corporate.migrations: ~4 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table corporate.notice
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `notice_start` datetime DEFAULT NULL,
  `notice_end` datetime DEFAULT NULL,
  `notice_file` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `is_continue` tinyint DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.notice: ~0 rows (approximately)

-- Dumping structure for table corporate.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `nid` int NOT NULL AUTO_INCREMENT,
  `gid` int DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `noti_date` int DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.notifications: 0 rows
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table corporate.organization
CREATE TABLE IF NOT EXISTS `organization` (
  `id` int NOT NULL AUTO_INCREMENT,
  `org_name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `address` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `thumb_image` varchar(256) DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `brand-slug` (`slug`) USING BTREE,
  FULLTEXT KEY `org_name` (`org_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.organization: ~0 rows (approximately)
REPLACE INTO `organization` (`id`, `org_name`, `slug`, `address`, `thumb_image`, `phone_number`, `logo`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Kpharma1', 'kpharma1', 'Dhaka', 'uploads/thumbnail/org//1690077461.png', '01717302935', NULL, 1, '2023-07-22 19:57:42', '2023-07-22 20:00:29');

-- Dumping structure for table corporate.our_client
CREATE TABLE IF NOT EXISTS `our_client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `client_logo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `client_details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.our_client: ~0 rows (approximately)

-- Dumping structure for table corporate.our_product
CREATE TABLE IF NOT EXISTS `our_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `product_details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.our_product: ~0 rows (approximately)

-- Dumping structure for table corporate.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table corporate.password_resets: ~0 rows (approximately)

-- Dumping structure for procedure corporate.permission_menu_access
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

-- Dumping structure for table corporate.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `service_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `service_icon` varchar(255) DEFAULT NULL,
  `service_details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `service_title` (`service_title`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.services: ~3 rows (approximately)
REPLACE INTO `services` (`id`, `service_title`, `slug`, `service_image`, `service_icon`, `service_details`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Business Insurance', 'business-insurance', 'uploads/service_image/1755771972.jpg', 'coins', '<p>Excepteur sint occaecat cupidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 1, '2024-11-13 16:22:33', '2025-08-21 10:26:12'),
	(2, 'Family Insurance', 'family-insurance', 'uploads/service_image/1755771925.jpg', 'man', '<p>Excepteur sint occaecat cupidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 1, '2025-08-20 13:40:52', '2025-08-21 10:25:25'),
	(3, 'Insurance Consulting', 'insurance-consulting', 'uploads/service_image/1755772013.png', 'data', '<p>Excepteur sint occaecat cupidatat non proi dent, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 1, '2025-08-21 10:26:54', '2025-08-21 10:26:54');

-- Dumping structure for table corporate.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `slider_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.slider: ~2 rows (approximately)
REPLACE INTO `slider` (`id`, `slider_image`, `slider_title`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'uploads/slider/1755759952.jpg', 'We are happy to build', 1, '2024-11-09 16:02:46', '2025-08-21 07:05:52'),
	(2, 'uploads/slider/1755759935.jpg', 'We are happy to build', 1, '2025-08-08 11:34:58', '2025-08-21 07:05:35');

-- Dumping structure for table corporate.super_admin
CREATE TABLE IF NOT EXISTS `super_admin` (
  `super_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `veri` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`super_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table corporate.super_admin: ~0 rows (approximately)
REPLACE INTO `super_admin` (`super_id`, `email`, `username`, `password`, `veri`) VALUES
	(1, 'superadmin@example.com', 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- Dumping structure for table corporate.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `member_name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `profile` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `organization_id` int DEFAULT '1',
  `contact_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `slug` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.teams: ~0 rows (approximately)
REPLACE INTO `teams` (`id`, `member_name`, `profile`, `organization_id`, `contact_number`, `email`, `slug`, `status`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'fahim', '<p>test profile</p>', 1, NULL, NULL, NULL, 1, 'uploads/service_image/1731690842.jpg', '2024-11-15 17:14:02', '2024-11-15 17:35:10');

-- Dumping structure for table corporate.upcoming
CREATE TABLE IF NOT EXISTS `upcoming` (
  `id` int NOT NULL AUTO_INCREMENT,
  `upcoming_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `upcoming_image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `upcoming_details` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.upcoming: ~4 rows (approximately)
REPLACE INTO `upcoming` (`id`, `upcoming_title`, `upcoming_image`, `upcoming_details`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Development of Advanced Medical Devices', 'uploads/upcoming_image/1755760378.jpg', '<p>We are investing heavily in research and development to create state-of-the-art medical devices that enhance diagnostic precision and treatment effectiveness. These devices will incorporate the latest technologies such as artificial intelligence and real-time data monitoring, allowing healthcare providers to deliver more personalized and timely care. Our goal is to provide tools that not only improve clinical outcomes but also increase efficiency in healthcare settings.</p>', 1, '2025-08-13 17:53:16', '2025-08-21 07:12:58'),
	(2, 'Healthcare Digital Solutions', 'uploads/upcoming_image/1755760352.jpg', '<p>Recognizing the importance of technology in modern healthcare, we are launching a series of digital health initiatives. These include telemedicine platforms, remote patient monitoring systems, and mobile health applications designed to enhance patient engagement and access to care. These solutions will particularly benefit underserved communities, helping bridge the gap between patients and healthcare providers regardless of location.</p>', 1, '2025-08-13 17:54:41', '2025-08-21 07:12:32'),
	(3, 'Collaborative Research Initiatives', 'uploads/upcoming_image/1755760165.jpg', '<p data-start="1969" data-end="2359">We are strengthening partnerships with leading medical institutions and research organizations to conduct innovative clinical trials and scientific studies. This collaborative approach enables us to stay at the forefront of medical advancements and bring new treatments and technologies from the lab to the patient efficiently and safely.</p>\r\n<p data-start="2361" data-end="2644">Each of these projects embodies Piur Group&rsquo;s mission to improve healthcare outcomes through innovation, quality, and compassion. We are excited about the future and remain committed to making a meaningful impact in the lives of patients and healthcare professionals around the world.</p>', 1, '2025-08-13 17:55:10', '2025-08-21 07:09:25'),
	(4, 'Expansion of Our Pharmaceutical Portfolio', 'uploads/upcoming_image/1755760237.jpg', '<p>Piur Group is actively working on broadening our range of pharmaceutical products. This expansion focuses on innovative treatments for chronic diseases like diabetes, cardiovascular conditions, and autoimmune disorders, as well as new therapies for infectious diseases. By developing high-quality, safe, and affordable medications, we aim to address unmet medical needs and improve patients&rsquo; quality of life globally.</p>', 1, '2025-08-13 18:06:12', '2025-08-21 07:10:37');

-- Dumping structure for table corporate.users
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table corporate.users: ~3 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `user_types`, `branch_id`, `org_id`, `email`, `cash_no`, `email_verified_at`, `gauth_id`, `facebook_id`, `password`, `contact_no`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'super-admin', 1, 1, 'sp_admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$zkA7gvuoQ860iFvCnPoTGOs5JgW8Qy2JwEeC8dSq1PGlu4ln05OLG', '01717302935', NULL, 1, NULL, '2023-04-12 05:03:14', '2025-08-04 19:30:30'),
	(2, 'Senior Software Engineer (Fahim Bhuiyan)', 'google', 1, 1, 'atmfahimcse@gmail.com', NULL, NULL, '110511357611426282053', NULL, '$2y$10$m5ZfFqUOPhC8yZLvYywXfOhLjy94z5FbdNhWxXnMwsdGPIMl3Q1le', NULL, NULL, 1, NULL, '2023-06-21 13:35:52', '2025-08-04 19:30:31'),
	(3, 'Demo', 'instructor', 1, 1, 'demo@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$MKH41To8S3wUESbCmaJG1Oxt/Y3LXsRvmAqhros2NcLhd0VIEyi/S', '01717302935', NULL, 1, NULL, '2023-08-28 16:21:24', '2025-08-04 19:30:32');

-- Dumping structure for table corporate.user_access_type
CREATE TABLE IF NOT EXISTS `user_access_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_type` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '0',
  `slug` varchar(100) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.user_access_type: ~4 rows (approximately)
REPLACE INTO `user_access_type` (`id`, `user_type`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'super-admin', 1, '2023-04-07 23:31:22', '2023-04-12 18:54:19'),
	(2, 'Admin', 'admin', 1, '2023-04-12 12:55:37', '2023-04-12 12:55:37'),
	(3, 'HR', 'hr', 1, '2023-04-12 12:55:55', '2023-04-12 12:55:55'),
	(4, 'Instructor', 'instructor', 1, '2023-04-12 12:56:09', '2023-08-28 16:20:06');

-- Dumping structure for table corporate.user_group
CREATE TABLE IF NOT EXISTS `user_group` (
  `gid` int NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) NOT NULL,
  `institute_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table corporate.user_group: ~2 rows (approximately)
REPLACE INTO `user_group` (`gid`, `group_name`, `institute_id`) VALUES
	(9, 'Group1', 1),
	(10, 'Group 2', 1);

-- Dumping structure for procedure corporate.user_type_wise_menu
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

-- Dumping structure for table corporate.why_choose
CREATE TABLE IF NOT EXISTS `why_choose` (
  `id` int NOT NULL AUTO_INCREMENT,
  `why_choose` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `we_think` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `we_envision` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `we_biuld` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table corporate.why_choose: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
