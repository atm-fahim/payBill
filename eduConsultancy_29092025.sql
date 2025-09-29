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

-- Dumping structure for table edu_consultancy.about_us
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `about_us_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `about_us_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `about_us_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `chairman_profile_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `chairman_profile` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `chairman_image` varchar(255) DEFAULT NULL,
  `mission_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mission_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `mission_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `vision_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `vision_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `vision_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.about_us: ~0 rows (approximately)
INSERT INTO `about_us` (`id`, `about_us_title`, `about_us_image`, `about_us_details`, `chairman_profile_title`, `chairman_profile`, `chairman_image`, `mission_title`, `mission_details`, `mission_image`, `vision_title`, `vision_details`, `vision_image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Welcome To About Us', 'uploads/about_us/1755863590.jpg', '<div class="text"><strong>NexusIntuk </strong>is a trusted education consultancy dedicated to helping students navigate their academic journey to the UK. We offer personalized guidance for admissions, visa processes, and choosing the best university to match your career goals. Let us help turn your study abroad dream into reality.</div>', 'Chairman’s Message', '<p data-start="133" data-end="155"><strong>Welcome to NexusIntuk.</strong></p>\r\n<p data-start="104" data-end="380">At NexusIntuk, we are committed to making your educational dreams come true. As a leading education consultancy, our mission is to guide you through every step of your journey, from choosing the right university to securing your visa and making the most of your time abroad.</p>\r\n<p data-start="382" data-end="712">We understand that studying in the UK is a significant milestone, and we believe in providing personalized, expert advice to ensure that you make informed decisions about your future. Our team of dedicated professionals works relentlessly to support you, helping you overcome challenges and turn opportunities into achievements.</p>\r\n<p data-start="714" data-end="919">As we continue to grow and expand, our vision is to be your trusted partner in education, providing the highest level of service and guidance that helps you unlock the potential of a world-class education.</p>\r\n<p data-start="921" data-end="1038">We look forward to being part of your exciting journey and seeing you thrive in your academic and personal endeavors.</p>\r\n<p>&nbsp;</p>\r\n<p data-start="966" data-end="1024">Sincerely,<br data-start="976" data-end="979">&nbsp;Monir Ahamed<br data-start="1001" data-end="1004">Chairman, NexusIntuk</p>', 'uploads/chairman_image/1758865038.jpg', 'Mission & Vision', '<p data-start="100" data-end="406"><strong data-start="100" data-end="111">Mission</strong>:<br data-start="112" data-end="115">Our mission is to empower students by providing expert, personalized guidance throughout their journey to studying in the UK. We strive to help students make informed decisions, ensuring they find the right academic path, secure their admissions, and have a smooth transition to life abroad.</p>\r\n<p data-start="408" data-end="670"><strong data-start="408" data-end="418">Vision</strong>:<br data-start="419" data-end="422">To be the leading education consultancy known for transforming the global educational aspirations of students into reality, fostering a future where every student&rsquo;s potential is maximized through world-class education and international experiences.</p>', 'uploads/mission/1755863590.jpg', 'Our Vision', '<p>To be a global leader in medical innovation and healthcare solutions, recognized for transforming patient care through cutting-edge technology, exceptional quality, and unwavering dedication to improving lives.</p>', NULL, 1, '2024-11-13 15:51:28', '2025-09-26 05:37:18');

-- Dumping structure for table edu_consultancy.access_menu
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

-- Dumping data for table edu_consultancy.access_menu: ~42 rows (approximately)
INSERT INTO `access_menu` (`id`, `menu_id`, `user_type`, `is_create`, `is_edit`, `is_delete`, `is_view`, `is_request`, `is_approved`, `created_by`, `update_by`, `created_at`, `updated_at`, `status`) VALUES
	(1, 1, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:22', 1),
	(2, 2, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:22', 1),
	(3, 3, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:22', 1),
	(4, 4, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(5, 5, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(6, 6, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2024-11-15 17:15:48', 9),
	(7, 7, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:22', 1),
	(8, 8, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:22', 1),
	(9, 9, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:23', 1),
	(10, 10, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:23', 1),
	(11, 11, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:22', 1),
	(12, 12, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:23', 1),
	(13, 13, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-08 13:11:56', '2025-09-27 06:08:23', 1),
	(14, 14, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-09 11:35:04', '2024-11-15 17:15:48', 9),
	(15, 15, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-09 11:35:04', '2024-11-15 17:15:48', 9),
	(16, 16, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-13 16:15:12', '2024-11-15 17:15:48', 9),
	(17, 17, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-14 03:39:49', '2024-11-15 17:15:48', 9),
	(18, 18, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-14 03:42:24', '2024-11-15 17:15:48', 9),
	(19, 19, 'super-admin', 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-14 12:56:18', '2024-11-15 17:15:48', 9),
	(20, 20, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-04-14 12:56:18', '2025-09-27 06:08:22', 1),
	(21, 21, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-04-16 05:59:23', '2025-09-27 06:08:23', 1),
	(22, 22, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-05-27 07:43:19', '2025-09-27 06:08:22', 1),
	(23, 23, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-05-27 07:43:19', '2025-09-27 06:08:22', 1),
	(24, 24, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-07-09 11:37:56', '2025-09-27 06:08:22', 1),
	(25, 25, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-07-20 12:49:45', '2025-09-27 06:08:22', 1),
	(26, 26, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-07-20 12:49:45', '2025-09-27 06:08:23', 1),
	(27, 27, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-07-23 03:36:50', '2025-09-27 06:08:23', 1),
	(28, 29, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2023-07-23 03:36:50', '2025-09-27 06:08:22', 1),
	(29, 28, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2023-07-23 03:36:50', '2025-09-27 06:08:22', 1),
	(30, 30, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-01 12:33:10', '2025-09-27 06:08:22', 1),
	(31, 31, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-08 18:09:22', '2025-09-27 06:08:22', 1),
	(32, 32, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-08-13 17:52:17', '2025-09-27 06:08:23', 1),
	(33, 33, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-13 17:52:17', '2025-09-27 06:08:23', 1),
	(34, 34, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-08-20 13:37:19', '2025-09-27 06:08:22', 1),
	(35, 35, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-20 13:37:19', '2025-09-27 06:08:22', 1),
	(36, 36, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-08-22 11:43:54', '2025-09-27 06:08:22', 1),
	(37, 37, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-22 11:43:54', '2025-09-27 06:08:22', 1),
	(38, 38, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-08-23 04:14:42', '2025-09-27 06:08:22', 1),
	(39, 39, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-23 04:14:42', '2025-09-27 06:08:22', 1),
	(40, 40, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-08-23 04:19:21', '2025-09-27 06:08:22', 1),
	(41, 41, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-08-23 04:19:21', '2025-09-27 06:08:22', 1),
	(42, 42, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-09-08 18:14:25', '2025-09-27 06:08:22', 1),
	(43, 43, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-09-26 09:51:41', '2025-09-27 06:08:22', 1),
	(44, 44, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-09-26 20:40:54', '2025-09-27 06:08:23', 1),
	(45, 45, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-09-26 20:40:54', '2025-09-27 06:08:23', 1),
	(46, 46, 'super-admin', 1, 0, 0, 0, 0, 0, NULL, NULL, '2025-09-27 06:08:22', '2025-09-27 06:08:22', 1),
	(47, 47, 'super-admin', 1, 1, 1, 1, 1, 1, NULL, NULL, '2025-09-27 06:08:22', '2025-09-27 06:08:22', 1);

-- Dumping structure for table edu_consultancy.albums
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `album_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.albums: ~0 rows (approximately)
INSERT INTO `albums` (`id`, `album_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'afds', 'afds', 1, '2025-08-23 18:38:45', '2025-08-23 18:38:45');

-- Dumping structure for table edu_consultancy.backend_menu
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

-- Dumping data for table edu_consultancy.backend_menu: ~38 rows (approximately)
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
	(35, 'Add Client', 'add-client', 'add-client', 'plus', 34, 1, '2025-08-13 23:12:22', '2025-08-13 23:12:22'),
	(36, 'Product', 'product', '#', 'package', 0, 1, '2025-08-22 11:43:04', '2025-08-22 11:43:04'),
	(37, 'Our Product', 'our-product', 'our-product', 'plus', 36, 1, '2025-08-22 11:43:39', '2025-08-22 11:43:39'),
	(38, 'Notice & Event', 'notice-event', '#', 'calendar-event', 0, 1, '2025-08-23 04:13:18', '2025-08-23 04:17:01'),
	(39, 'Add Notice & Event', 'add-notice-event', 'add-notice-event', 'plus', 38, 1, '2025-08-23 04:14:25', '2025-08-23 18:23:25'),
	(40, 'Gallery', 'gallery', '#', 'photo-album', 0, 1, '2025-08-23 04:18:28', '2025-08-23 04:18:28'),
	(41, 'Create Album', 'create-album', 'create-album', 'plus', 40, 1, '2025-08-23 04:18:54', '2025-08-23 18:26:01'),
	(42, 'Company', 'company', 'company', 'plus', 1, 1, '2025-09-08 18:14:08', '2025-09-08 18:14:08'),
	(43, 'Your Destination', 'your-destination', 'your-destination', 'plus', 1, 1, '2025-09-26 09:51:23', '2025-09-26 09:51:23'),
	(44, 'University', 'university', '#', 'home', 0, 1, '2025-09-26 20:38:11', '2025-09-26 20:38:11'),
	(45, 'Add University', 'add-university', 'add-university', 'plus', 44, 1, '2025-09-26 20:38:54', '2025-09-26 20:38:54'),
	(46, 'Course', 'course', '#', 'book-reader', 0, 1, '2025-09-27 06:06:58', '2025-09-27 06:11:58'),
	(47, 'Add Course', 'add-course', 'add-course', 'plus', 46, 1, '2025-09-27 06:07:28', '2025-09-27 06:07:28');

-- Dumping structure for table edu_consultancy.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `blog_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `blog_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.blog: ~0 rows (approximately)

-- Dumping structure for table edu_consultancy.branch
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

-- Dumping data for table edu_consultancy.branch: ~2 rows (approximately)
INSERT INTO `branch` (`id`, `branch_name`, `address`, `city`, `organization_id`, `company_id`, `state`, `zip_code`, `contact_number`, `map_link`, `email`, `fb_link`, `linkedin`, `details`, `slug`, `status`, `banner`, `created_at`, `updated_at`) VALUES
	(1, 'Dhaka Branch', 'Dhaka, Gulshan 1', 'Dhaka', 1, 1, 'Gulshan', '1212', '01717302935', NULL, NULL, NULL, NULL, '<p>About Branch dhaka</p>', 'dhaka-branch', 1, NULL, '2023-06-11 12:07:43', '2025-08-17 19:06:29'),
	(2, 'Feni', 'trang road,Feni', 'Feni', 1, 1, 'Feni Sadar', '3900', '01717302935', NULL, 'info@feni.com', NULL, NULL, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered altera tion in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>', 'feni', 1, 'uploads/thumbnail/feni/1755693699.jpg', '2023-07-23 03:31:40', '2025-08-20 12:41:40');

-- Dumping structure for table edu_consultancy.category
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

-- Dumping data for table edu_consultancy.category: ~0 rows (approximately)
INSERT INTO `category` (`id`, `category`, `slug`, `parent_id`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'General', 'general', 0, NULL, 1, '2023-05-15 13:30:14', '2023-08-06 16:48:22');

-- Dumping structure for table edu_consultancy.contact_us
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

-- Dumping data for table edu_consultancy.contact_us: ~2 rows (approximately)
INSERT INTO `contact_us` (`id`, `branch_id`, `address`, `city`, `organization_id`, `state`, `zip_code`, `contact_number`, `hotline_number`, `contact_number_two`, `email`, `map_link`, `fb_link`, `linkedin`, `slug`, `status`, `banner`, `created_at`, `updated_at`) VALUES
	(1, 0, '<p>124 Whitechapel Road.London E1 1JE</p>', NULL, 1, NULL, '1200', '880 1717 302935', '44 7596 034348', NULL, 'nexusintuk@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, '2025-08-09 08:25:57', '2025-09-25 19:28:29'),
	(2, 1, '<p>test</p>', NULL, 1, NULL, '1000', '454', '545', NULL, 't@gmail.com', NULL, 'fb', 'l', NULL, 1, NULL, '2025-08-09 08:52:08', '2025-09-25 19:23:34');

-- Dumping structure for table edu_consultancy.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `destination_id` int DEFAULT '0',
  `university_id` int DEFAULT '0',
  `course_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `course_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tuition_fees` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `score_marks` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `course_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.courses: ~0 rows (approximately)
INSERT INTO `courses` (`id`, `destination_id`, `university_id`, `course_name`, `slug`, `course_image`, `tuition_fees`, `score_marks`, `course_details`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'Computer Science Engineering', 'computer-science-engineering', 'uploads/course/1758959035.jpg', NULL, NULL, NULL, 1, '2025-09-27 07:43:56', '2025-09-27 07:43:56');

-- Dumping structure for table edu_consultancy.failed_jobs
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

-- Dumping data for table edu_consultancy.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table edu_consultancy.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.faq: ~7 rows (approximately)
INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'What is the process for obtaining a student visa?', '<p>You need to receive a Confirmation of Acceptance for Studies (CAS) from your university, then complete the visa application, pay fees, and attend a visa appointment.</p>', 1, '2025-08-08 18:18:54', '2025-09-26 05:56:26'),
	(2, 'How do I apply for scholarships?', '<p>Research available scholarships, check eligibility criteria, and submit applications along with required documents before the deadlines.</p>', 1, '2025-08-21 07:00:51', '2025-09-26 05:55:56'),
	(3, 'What are the entry requirements for UK universities?', '<p>Entry requirements vary by university and program, typically including academic qualifications, English language proficiency, and standardized test scores (if applicable).</p>', 1, '2025-08-21 07:01:08', '2025-09-26 05:55:34'),
	(4, 'Can I work while studying in the UK?', '<p>Yes, international students may work part-time (up to 20 hours per week during term time) with certain restrictions depending on your visa type.</p>', 1, '2025-09-26 06:41:21', '2025-09-26 06:41:21'),
	(5, 'What should I do if I have trouble settling in?', '<p>Many universities offer counseling and support services. Reach out to your university&rsquo;s international student office for help and resources.</p>', 1, '2025-09-26 06:41:39', '2025-09-26 06:41:39'),
	(6, 'Are there any orientation programs for new students?', '<p>Most universities conduct orientation programs to help new students familiarize themselves with campus life, academic expectations, and local culture.</p>', 1, '2025-09-26 06:41:55', '2025-09-26 06:41:55'),
	(7, 'How can I find accommodation?', '<p>You can find accommodation through your university&rsquo;s housing service, local rental websites, or by contacting local landlords directly.</p>', 1, '2025-09-26 06:42:25', '2025-09-26 06:42:25'),
	(8, 'What health services are available for international students?', '<p>International students can register with the National Health Service (NHS) and access healthcare services, though you may need to pay an immigration health surcharge.</p>', 1, '2025-09-26 06:42:47', '2025-09-26 06:42:47');

-- Dumping structure for table edu_consultancy.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `album_id` int DEFAULT NULL,
  `image_path` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.images: ~4 rows (approximately)
INSERT INTO `images` (`id`, `album_id`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'upload/album/1/68c536df84bbd.jpg', 1, '2025-08-28 18:34:06', '2025-09-13 09:18:54'),
	(2, 1, 'upload/album/1/68c536df8e7ea.jpg', 1, '2025-08-28 18:34:06', '2025-09-13 09:18:59'),
	(3, 1, 'upload/album/1/68c536df84bbd.jpg', 1, '2025-09-13 09:18:23', '2025-09-13 09:18:23'),
	(4, 1, 'upload/album/1/68c536df8e7ea.jpg', 1, '2025-09-13 09:18:23', '2025-09-13 09:18:23');

-- Dumping structure for table edu_consultancy.logo
CREATE TABLE IF NOT EXISTS `logo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `favicon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `small_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.logo: ~0 rows (approximately)
INSERT INTO `logo` (`id`, `logo_image`, `favicon`, `small_logo`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'uploads/logo/1758826394_68d58f9a5e8f1.png', 'uploads/logo/1758825377_68d58ba1c5d20.png', 'uploads/logo/1758826278_68d58f2623f31.png', '2024-07-28 16:49:52', '2025-09-25 18:53:14', 1);

-- Dumping structure for table edu_consultancy.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table edu_consultancy.migrations: ~4 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table edu_consultancy.notice
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

-- Dumping data for table edu_consultancy.notice: ~2 rows (approximately)
INSERT INTO `notice` (`id`, `notice_title`, `notice_start`, `notice_end`, `notice_file`, `slug`, `is_continue`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Notice & Event', '2025-08-22 00:00:00', '2025-08-30 00:00:00', 'uploads/notice/1757442240.jpg', 'notice-event', 1, 1, '2025-08-23 17:38:36', '2025-09-09 18:51:49'),
	(2, 'test event', '2025-09-10 00:00:00', '2025-09-27 00:00:00', 'uploads/notice/1757443905.png', 'test-event', 1, 1, '2025-09-09 18:36:47', '2025-09-09 18:51:45');

-- Dumping structure for table edu_consultancy.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `nid` int NOT NULL AUTO_INCREMENT,
  `gid` int DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `noti_date` int DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.notifications: 0 rows
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table edu_consultancy.organization
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

-- Dumping data for table edu_consultancy.organization: ~0 rows (approximately)
INSERT INTO `organization` (`id`, `org_name`, `slug`, `address`, `thumb_image`, `phone_number`, `logo`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Kpharma1', 'kpharma1', 'Dhaka', 'uploads/thumbnail/org//1690077461.png', '01717302935', NULL, 1, '2023-07-22 19:57:42', '2023-07-22 20:00:29');

-- Dumping structure for table edu_consultancy.our_client
CREATE TABLE IF NOT EXISTS `our_client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `client_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `client_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.our_client: ~0 rows (approximately)

-- Dumping structure for table edu_consultancy.our_company
CREATE TABLE IF NOT EXISTS `our_company` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `company_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `organization_id` int DEFAULT '1',
  `state` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `zip_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `contact_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `map_link` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `fb_link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `linkedin` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `slug` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `banner` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `company_name` (`company_name`) USING BTREE,
  KEY `slug` (`slug`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.our_company: ~2 rows (approximately)
INSERT INTO `our_company` (`id`, `company_name`, `address`, `city`, `organization_id`, `state`, `zip_code`, `contact_number`, `map_link`, `email`, `fb_link`, `linkedin`, `details`, `slug`, `status`, `banner`, `created_at`, `updated_at`) VALUES
	(1, 'company name', 'test', 'dhaka', 1, NULL, '3400', '01717302935', NULL, 'atm@gmail.com', NULL, NULL, '<p>test</p>', 'company-name', 1, 'uploads/thumbnail/company-name/1757697331.png', '2025-09-08 18:16:08', '2025-09-12 17:15:32'),
	(2, 'company name 2', NULL, 'dhaka', 1, NULL, '3900', '561', NULL, 'a@gmail.com', NULL, NULL, NULL, 'company-name-2', 1, 'uploads/thumbnail/company-name-2/1757697377.jpg', '2025-09-12 17:16:17', '2025-09-12 17:16:17');

-- Dumping structure for table edu_consultancy.our_product
CREATE TABLE IF NOT EXISTS `our_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `product_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `product_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.our_product: ~7 rows (approximately)
INSERT INTO `our_product` (`id`, `product_name`, `slug`, `product_image`, `product_details`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Nest Shaped Chair', 'nest-shaped-chair', 'uploads/product_image/1755863285.jpg', '<p>Raw denim you probably haven\'t heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi.</p>', 1, '2025-08-22 11:48:06', '2025-08-22 17:50:06'),
	(2, 'Nest Shaped Chair2', 'nest-shaped-chair2', 'uploads/product_image/1755885123.png', '<p><a class="aphJLc chV67d" href="https://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=DChsSEwj0zq2Bt56PAxXQklAGHYQZCloYACICCAEQAhoCZGc&amp;co=1&amp;gclid=EAIaIQobChMI9M6tgbeejwMV0JJQBh2EGQpaEAAYASACEgIsuPD_BwE&amp;ohost=www.google.com&amp;cid=CAASJeRo_hFg-ElC7cV_scNFH6zTcXmUpfyONn2u0SfpWUVLK66srho&amp;sig=AOD64_2_v1eN4DpKf1ncXaZ6JJNWF2N46g&amp;adurl=&amp;q=" data-agch="HJ3bqe" data-impdclcc="1" data-agdh="fvd3vc" data-rw="https://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=DChsSEwj0zq2Bt56PAxXQklAGHYQZCloYACICCAEQAhoCZGc&amp;co=1&amp;gclid=EAIaIQobChMI9M6tgbeejwMV0JJQBh2EGQpaEAAYASACEgIsuPD_BwE&amp;ohost=www.google.com&amp;cid=CAASJeRo_hFg-ElC7cV_scNFH6zTcXmUpfyONn2u0SfpWUVLK66srho&amp;sig=AOD64_2_v1eN4DpKf1ncXaZ6JJNWF2N46g&amp;q&amp;adurl" data-ae="1" data-al="1" data-ved="2ahUKEwjtjamBt56PAxVFUUEAHZIhJK4QqyQoAXoECAoQDg">The Ultimate How-To</a></p>', 1, '2025-08-22 17:51:18', '2025-08-22 17:56:28'),
	(3, 'product 4', 'test-2', 'uploads/product_image/1755886626.jpg', '<p>tsdfa</p>', 1, '2025-08-22 18:17:06', '2025-08-22 18:17:06'),
	(4, 'product 6', 'trsdfa', 'uploads/product_image/1755886639.jpg', '<p>asdf</p>', 1, '2025-08-22 18:17:19', '2025-08-22 18:17:19'),
	(5, 'product 3', 'sadfasd', 'uploads/product_image/1755886651.jpg', '<p>asdf</p>', 1, '2025-08-22 18:17:31', '2025-08-22 18:17:31'),
	(6, 'product 1', 'asdf', 'uploads/product_image/1755886675.jpg', '<p>sdaf</p>', 1, '2025-08-22 18:17:55', '2025-08-22 18:17:55'),
	(7, 'product 2', 'sadf', 'uploads/product_image/1755886696.jpg', '<p>sadf</p>', 1, '2025-08-22 18:18:16', '2025-08-22 18:18:16');

-- Dumping structure for table edu_consultancy.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table edu_consultancy.password_resets: ~0 rows (approximately)

-- Dumping structure for table edu_consultancy.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `service_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `service_icon` varchar(255) DEFAULT NULL,
  `service_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `service_title` (`service_title`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.services: ~4 rows (approximately)
INSERT INTO `services` (`id`, `service_title`, `slug`, `service_image`, `service_icon`, `service_details`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Student Accommodations', 'student-accommodations', 'uploads/service_image/1758827562.jpg', 'coins', '<p>Find Affordable and Trusted Student Accommodations</p>', 1, '2024-11-13 16:22:33', '2025-09-25 19:12:42'),
	(2, 'Health Insurance', 'health-insurance', 'uploads/service_image/1758827376.jpg', 'man', '<p>Overseas Health Insurance for Study Abroad Aspirants</p>', 1, '2025-08-20 13:40:52', '2025-09-25 19:09:36'),
	(3, 'Admission Support', 'admission-support', 'uploads/service_image/1755868757.jpg', 'data', '<p><strong>Expert Admission Support for Your Study Abroad Journey</strong></p>\r\n<p>Unlock global opportunities with seamless guidance from application to acceptance.</p>', 1, '2025-08-21 10:26:54', '2025-09-25 19:01:00'),
	(4, 'Visa Services', 'visa-services', 'uploads/service_image/1758827797.png', 'visa', '<p>Hassle-Free Visa Services for Your Study Abroad Journey</p>', 1, '2025-09-25 19:16:37', '2025-09-25 19:16:37');

-- Dumping structure for table edu_consultancy.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slider_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.slider: ~4 rows (approximately)
INSERT INTO `slider` (`id`, `slider_image`, `slider_title`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'uploads/slider/1758823582.jpg', NULL, 1, '2024-11-09 16:02:46', '2025-09-25 18:07:16'),
	(2, 'uploads/slider/1758823570.jpg', NULL, 1, '2025-08-08 11:34:58', '2025-09-25 18:07:08'),
	(3, 'uploads/slider/1758825172.jpg', NULL, 1, '2025-09-25 18:32:52', '2025-09-25 18:32:52'),
	(4, 'uploads/slider/1758825191.jpg', NULL, 1, '2025-09-25 18:33:11', '2025-09-25 18:33:11');

-- Dumping structure for table edu_consultancy.super_admin
CREATE TABLE IF NOT EXISTS `super_admin` (
  `super_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `veri` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`super_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table edu_consultancy.super_admin: ~0 rows (approximately)
INSERT INTO `super_admin` (`super_id`, `email`, `username`, `password`, `veri`) VALUES
	(1, 'superadmin@example.com', 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 0);

-- Dumping structure for table edu_consultancy.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `member_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `profile` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `organization_id` int DEFAULT '1',
  `contact_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `updated_at` timestamp NULL DEFAULT (now()) ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.teams: ~0 rows (approximately)
INSERT INTO `teams` (`id`, `member_name`, `profile`, `organization_id`, `contact_number`, `email`, `slug`, `status`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'fahim', '<p>test profile</p>', 1, NULL, NULL, NULL, 1, 'uploads/service_image/1731690842.jpg', '2024-11-15 17:14:02', '2024-11-15 17:35:10');

-- Dumping structure for table edu_consultancy.universitys
CREATE TABLE IF NOT EXISTS `universitys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `destination_id` int DEFAULT '0',
  `university_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `university_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `university_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.universitys: ~0 rows (approximately)
INSERT INTO `universitys` (`id`, `destination_id`, `university_name`, `slug`, `university_image`, `university_details`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Uk Unversity', 'uk-unversity', 'uploads/university/1758919449.jpg', '<p>University Details</p>', 1, '2025-09-26 20:44:10', '2025-09-26 20:44:10');

-- Dumping structure for table edu_consultancy.upcoming
CREATE TABLE IF NOT EXISTS `upcoming` (
  `id` int NOT NULL AUTO_INCREMENT,
  `upcoming_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `upcoming_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `upcoming_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.upcoming: ~4 rows (approximately)
INSERT INTO `upcoming` (`id`, `upcoming_title`, `upcoming_image`, `upcoming_details`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Development of Advanced Medical Devices', 'uploads/upcoming_image/1755868881.jpg', '<p>We are investing heavily in research and development to create state-of-the-art medical devices that enhance diagnostic precision and treatment effectiveness. These devices will incorporate the latest technologies such as artificial intelligence and real-time data monitoring, allowing healthcare providers to deliver more personalized and timely care. Our goal is to provide tools that not only improve clinical outcomes but also increase efficiency in healthcare settings.</p>', 1, '2025-08-13 17:53:16', '2025-08-22 13:21:21'),
	(2, 'Healthcare Digital Solutions', 'uploads/upcoming_image/1755868862.jpg', '<p>Recognizing the importance of technology in modern healthcare, we are launching a series of digital health initiatives. These include telemedicine platforms, remote patient monitoring systems, and mobile health applications designed to enhance patient engagement and access to care. These solutions will particularly benefit underserved communities, helping bridge the gap between patients and healthcare providers regardless of location.</p>', 1, '2025-08-13 17:54:41', '2025-08-22 13:21:02'),
	(3, 'Collaborative Research Initiatives', 'uploads/upcoming_image/1755868851.jpg', '<p data-start="1969" data-end="2359">We are strengthening partnerships with leading medical institutions and research organizations to conduct innovative clinical trials and scientific studies. This collaborative approach enables us to stay at the forefront of medical advancements and bring new treatments and technologies from the lab to the patient efficiently and safely.</p>\r\n<p data-start="2361" data-end="2644">Each of these projects embodies Piur Group&rsquo;s mission to improve healthcare outcomes through innovation, quality, and compassion. We are excited about the future and remain committed to making a meaningful impact in the lives of patients and healthcare professionals around the world.</p>', 1, '2025-08-13 17:55:10', '2025-08-22 13:20:51'),
	(4, 'Expansion of Our Pharmaceutical Portfolio', 'uploads/upcoming_image/1755868818.jpg', '<p>Piur Group is actively working on broadening our range of pharmaceutical products. This expansion focuses on innovative treatments for chronic diseases like diabetes, cardiovascular conditions, and autoimmune disorders, as well as new therapies for infectious diseases. By developing high-quality, safe, and affordable medications, we aim to address unmet medical needs and improve patients&rsquo; quality of life globally.</p>', 1, '2025-08-13 18:06:12', '2025-08-22 13:20:18');

-- Dumping structure for table edu_consultancy.users
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

-- Dumping data for table edu_consultancy.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `user_types`, `branch_id`, `org_id`, `email`, `cash_no`, `email_verified_at`, `gauth_id`, `facebook_id`, `password`, `contact_no`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'super-admin', 1, 1, 'sp_admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$zkA7gvuoQ860iFvCnPoTGOs5JgW8Qy2JwEeC8dSq1PGlu4ln05OLG', '01717302935', NULL, 1, NULL, '2023-04-12 05:03:14', '2025-08-04 19:30:30'),
	(2, 'Senior Software Engineer (Fahim Bhuiyan)', 'google', 1, 1, 'atmfahimcse@gmail.com', NULL, NULL, '110511357611426282053', NULL, '$2y$10$m5ZfFqUOPhC8yZLvYywXfOhLjy94z5FbdNhWxXnMwsdGPIMl3Q1le', NULL, NULL, 1, NULL, '2023-06-21 13:35:52', '2025-08-04 19:30:31'),
	(3, 'Demo', 'instructor', 1, 1, 'demo@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$MKH41To8S3wUESbCmaJG1Oxt/Y3LXsRvmAqhros2NcLhd0VIEyi/S', '01717302935', NULL, 1, NULL, '2023-08-28 16:21:24', '2025-08-04 19:30:32');

-- Dumping structure for table edu_consultancy.user_access_type
CREATE TABLE IF NOT EXISTS `user_access_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `slug` varchar(100) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.user_access_type: ~4 rows (approximately)
INSERT INTO `user_access_type` (`id`, `user_type`, `slug`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'super-admin', 1, '2023-04-07 23:31:22', '2023-04-12 18:54:19'),
	(2, 'Admin', 'admin', 1, '2023-04-12 12:55:37', '2023-04-12 12:55:37'),
	(3, 'HR', 'hr', 1, '2023-04-12 12:55:55', '2023-04-12 12:55:55'),
	(4, 'Instructor', 'instructor', 1, '2023-04-12 12:56:09', '2023-08-28 16:20:06');

-- Dumping structure for table edu_consultancy.user_group
CREATE TABLE IF NOT EXISTS `user_group` (
  `gid` int NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) NOT NULL,
  `institute_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table edu_consultancy.user_group: ~2 rows (approximately)
INSERT INTO `user_group` (`gid`, `group_name`, `institute_id`) VALUES
	(9, 'Group1', 1),
	(10, 'Group 2', 1);

-- Dumping structure for table edu_consultancy.why_choose
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

-- Dumping data for table edu_consultancy.why_choose: ~0 rows (approximately)

-- Dumping structure for table edu_consultancy.your_destination
CREATE TABLE IF NOT EXISTS `your_destination` (
  `id` int NOT NULL AUTO_INCREMENT,
  `destination_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `destination_map_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `destination_details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table edu_consultancy.your_destination: ~0 rows (approximately)
INSERT INTO `your_destination` (`id`, `destination_name`, `slug`, `destination_map_image`, `destination_details`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'UK', 'uk', 'uploads/product_image/1758880827.jpeg', '<h2>NexusIntuk: Your Trusted UK University Visa Consultancy</h2>\r\n<h3>Services Offered</h3>\r\n<h4>1. University Admissions Guidance</h4>\r\n<ul>\r\n<li><strong>Course Selection</strong>: We help students choose the right courses and universities based on their interests, career goals, and academic background.</li>\r\n<li><strong>Application Support</strong>: Our consultants assist with the entire application process, including personal statement writing, document preparation, and interview coaching.</li>\r\n</ul>\r\n<h4>2. Visa Application Services</h4>\r\n<ul>\r\n<li><strong>Visa Eligibility Assessment</strong>: We evaluate students&rsquo; eligibility for a UK student visa and provide tailored advice based on individual circumstances.</li>\r\n<li><strong>Document Preparation</strong>: Our team ensures that all necessary documentation is complete and accurate, minimizing the risk of application delays or rejections.</li>\r\n<li><strong>Application Submission</strong>: We guide students through the visa application process, from filling out forms to submitting applications and scheduling appointments.</li>\r\n</ul>\r\n<h4>3. Pre-Departure Services</h4>\r\n<ul>\r\n<li><strong>Travel Arrangements</strong>: We assist with travel planning, including flights, accommodation, and local transportation options.</li>\r\n<li><strong>Cultural Orientation</strong>: Our pre-departure sessions prepare students for life in the UK, covering cultural differences, academic expectations, and essential tips for settling in.</li>\r\n</ul>\r\n<h3>Why Choose NexusIntuk?</h3>\r\n<ul>\r\n<li><strong>Expert Team</strong>: Our consultants are well-versed in UK education policies and visa regulations, ensuring that you receive accurate and up-to-date information.</li>\r\n<li><strong>Personalized Approach</strong>: We understand that every student&rsquo;s journey is unique. Our services are tailored to meet individual needs and aspirations.</li>\r\n<li><strong>Success Rate</strong>: With a proven track record of successful applications, we take pride in our high success rate and satisfied clients.</li>\r\n</ul>\r\n<h3>Testimonials</h3>\r\n<blockquote>\r\n<p>"NexusIntuk guided me through every step of my university application and visa process. Their support was invaluable!"<br>&mdash; <em>Sarah K., MSc Student at University of London</em></p>\r\n</blockquote>\r\n<blockquote>\r\n<p>"The team at NexusIntuk made my dream of studying in the UK a reality. I couldn&rsquo;t have done it without them!"<br>&mdash; <em>Raj P., Undergraduate Student at University of Manchester</em></p>\r\n</blockquote>\r\n<h3>Get in Touch</h3>\r\n<p>Ready to take the next step in your academic journey? Contact NexusIntuk today for a free consultation!</p>\r\n<ul>\r\n<li><strong>Website</strong>: <a href="http://www.nexusintuk.com" target="_blank" rel="noopener">www.nexusintuk.com</a></li>\r\n<li><strong>Email</strong>: <a href="mailto:info@nexusintuk.com" target="_blank" rel="noopener">info@nexusintuk.com</a></li>\r\n<li><strong>Phone</strong>: +44 7596 034348</li>\r\n<li><strong>Social Media</strong>: Follow us on Facebook, Instagram, and LinkedIn for the latest updates!</li>\r\n</ul>', 1, '2025-09-26 09:58:58', '2025-09-26 10:00:28');

-- Dumping structure for procedure edu_consultancy.permission_menu_access
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

-- Dumping structure for procedure edu_consultancy.user_type_wise_menu
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
