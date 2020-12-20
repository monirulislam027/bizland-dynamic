-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bizland.client_logos
CREATE TABLE IF NOT EXISTS `client_logos` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.client_logos: ~0 rows (approximately)
/*!40000 ALTER TABLE `client_logos` DISABLE KEYS */;
REPLACE INTO `client_logos` (`id`, `image`, `status`, `create_by`, `created_at`, `updated_at`) VALUES
	(1, '5fd901d272342562900.png', 1, 1, '2020-12-16 00:34:58', '2020-12-20 11:29:15');
/*!40000 ALTER TABLE `client_logos` ENABLE KEYS */;

-- Dumping structure for table bizland.counters
CREATE TABLE IF NOT EXISTS `counters` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.counters: ~2 rows (approximately)
/*!40000 ALTER TABLE `counters` DISABLE KEYS */;
REPLACE INTO `counters` (`id`, `name`, `number`, `icon`, `status`, `create_by`, `created_at`, `updated_at`) VALUES
	(1, 'Francis Hendrix', 493, 'icofont-simple-smile', 1, 1, '2020-12-15 15:51:21', '2020-12-19 22:44:06');
/*!40000 ALTER TABLE `counters` ENABLE KEYS */;

-- Dumping structure for table bizland.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(50) NOT NULL,
  `answer` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`question`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.faqs: ~3 rows (approximately)
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
REPLACE INTO `faqs` (`id`, `question`, `answer`, `status`, `create_by`, `created_at`, `updated_at`) VALUES
	(17, 'Ab quibusdam cillum ', '<b>Eum amet, rem rerum .</b>', 1, 1, '2020-12-18 15:21:52', '2020-12-18 21:46:42'),
	(18, 'Fugiat voluptas non', '<b>Nihil ut est, illum.</b>', 1, 1, '2020-12-18 21:50:53', '2020-12-18 21:50:53'),
	(19, 'Iste commodi tenetur', '<b>Nihil ut est, illum.</b>', 1, 1, '2020-12-18 21:50:58', '2020-12-18 21:50:58'),
	(20, 'Et aute magni volupt', '<b>Nihil ut est, illum.</b>', 1, 1, '2020-12-18 21:51:03', '2020-12-18 21:51:03');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;

-- Dumping structure for table bizland.information
CREATE TABLE IF NOT EXISTS `information` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `option` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.information: ~42 rows (approximately)
/*!40000 ALTER TABLE `information` DISABLE KEYS */;
REPLACE INTO `information` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'hero_title', 'Welcome to <span> BizLand<span>', '2020-12-12 15:40:30', '2020-12-12 15:41:19'),
	(2, 'hero_sub_title', 'We are team of talanted designers making websites with Bootstrap', '2020-12-12 15:41:01', '2020-12-12 15:41:46'),
	(3, 'hero_link1_text', 'Get Started', '2020-12-12 15:43:10', '2020-12-13 07:58:12'),
	(4, 'hero_link1_url', '#about', '2020-12-12 15:43:44', '2020-12-13 07:58:12'),
	(5, 'hero_link2_text', 'Watch Video', '2020-12-12 15:44:07', '2020-12-12 15:44:21'),
	(6, 'hero_link2_url', 'https://www.youtube.com/watch?v=jDDaplaOz7Q', '2020-12-12 15:44:57', '2020-12-12 15:45:09'),
	(7, 'about_us_subtitle', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', '2020-12-13 10:40:45', '2020-12-13 10:46:54'),
	(8, 'about_us_description_title', 'Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.', '2020-12-13 10:41:47', '2020-12-13 10:41:47'),
	(9, 'about_us_description', 'Lorem ipsum dolor sit amet, consectetur adipisci', '2020-12-13 10:42:18', '2020-12-13 12:04:32'),
	(10, 'about_us_image', '5fd5bf562b791186624.jpg', '2020-12-13 10:42:54', '2020-12-13 13:14:30'),
	(11, 'contact_address', 'A108 Adam Street, New York, NY 535022 h', '2020-12-18 22:33:19', '2020-12-19 22:17:01'),
	(12, 'contact_email', 'contact@example.com', '2020-12-18 22:34:30', '2020-12-18 22:34:30'),
	(13, 'contact_no', '+1 5589 55488 55', '2020-12-18 22:34:52', '2020-12-18 22:34:52'),
	(14, 'facebook', 'https://www.bahuwomozew.ws', '2020-12-18 22:36:59', '2020-12-19 22:18:12'),
	(15, 'twitter', 'https://www.jinynaragifa.net', '2020-12-18 22:37:15', '2020-12-19 22:18:14'),
	(16, 'instagram', 'https://www.bacip.me', '2020-12-18 22:37:38', '2020-12-19 22:18:16'),
	(17, 'linkedIn', 'https://www.cilu.ws', '2020-12-18 22:38:01', '2020-12-19 22:18:18'),
	(18, 'skype', 'https://test', '2020-12-18 22:50:48', '2020-12-19 22:18:24'),
	(19, 'google_map', '1', '2020-12-19 22:30:01', '2020-12-20 11:21:44'),
	(20, 'map_link', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621', '2020-12-19 22:31:04', '2020-12-19 22:32:09'),
	(21, 'contact_form', '1', '2020-12-19 22:31:34', '2020-12-20 11:21:43'),
	(22, 'social_links', '1', '2020-12-19 22:33:23', '2020-12-20 02:08:47'),
	(23, 'about_title', 'Find Out More About Us a', '2020-12-19 23:48:08', '2020-12-20 00:32:05'),
	(24, 'about_subtitle', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', '2020-12-19 23:48:26', '2020-12-19 23:48:26'),
	(25, 'service_title', 'Check our Services', '2020-12-19 23:49:04', '2020-12-19 23:49:04'),
	(26, 'service_subtitle', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', '2020-12-19 23:49:32', '2020-12-19 23:50:06'),
	(27, 'portfolio_title', 'Check our Portfolio', '2020-12-19 23:50:35', '2020-12-19 23:50:35'),
	(28, 'portfolio_subtitle', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', '2020-12-19 23:50:55', '2020-12-19 23:50:55'),
	(29, 'team_title', 'Our Hardworking Team', '2020-12-19 23:51:19', '2020-12-19 23:51:19'),
	(30, 'team_subtitle', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', '2020-12-19 23:51:44', '2020-12-19 23:51:44'),
	(31, 'faq_title', 'Frequently Asked Questions', '2020-12-19 23:52:26', '2020-12-19 23:52:26'),
	(32, 'faq_subtitle', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', '2020-12-19 23:52:39', '2020-12-19 23:52:39'),
	(33, 'contact_title', 'Contact Us', '2020-12-19 23:53:18', '2020-12-19 23:53:18'),
	(34, 'contact_subtitle', 'Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.', '2020-12-19 23:53:33', '2020-12-19 23:53:33'),
	(35, 'about', '1', '2020-12-20 00:17:59', '2020-12-20 01:53:05'),
	(36, 'service', '1', '2020-12-20 00:18:07', '2020-12-20 01:53:06'),
	(37, 'portfolio', '1', '2020-12-20 00:18:14', '2020-12-20 02:02:07'),
	(38, 'team', '1', '2020-12-20 00:18:21', '2020-12-20 01:53:00'),
	(39, 'faq', '1', '2020-12-20 00:18:29', '2020-12-20 01:53:01'),
	(40, 'contact', '1', '2020-12-20 00:18:42', '2020-12-20 01:53:02'),
	(41, 'site_title', 'Bizland', '2020-12-20 00:33:38', '2020-12-20 11:24:41'),
	(42, 'footer_menu', '1', '2020-12-20 01:13:09', '2020-12-20 02:10:41'),
	(43, 'featured_service', '1', '2020-12-20 01:42:23', '2020-12-20 02:02:03'),
	(44, 'skill', '1', '2020-12-20 01:45:05', '2020-12-20 02:02:03'),
	(45, 'count', '1', '2020-12-20 01:46:07', '2020-12-20 02:02:04'),
	(46, 'client', '1', '2020-12-20 01:46:41', '2020-12-20 02:02:05'),
	(47, 'testimonial', '1', '2020-12-20 01:49:55', '2020-12-20 02:02:06');
/*!40000 ALTER TABLE `information` ENABLE KEYS */;

-- Dumping structure for table bizland.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.messages: ~0 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table bizland.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.services: ~3 rows (approximately)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
REPLACE INTO `services` (`id`, `icon`, `title`, `desc`, `status`, `featured`, `create_by`, `created_at`, `updated_at`) VALUES
	(1, 'bx bxl-dribbble', 'Sequi est veritatis', 'Amet magna molestia', 1, 1, 1, '2020-12-16 15:51:06', '2020-12-18 18:16:04'),
	(2, 'bx bx-file', 'Qui cillum et magni ', 'Delectus alias vel ', 1, 1, 1, '2020-12-18 20:29:08', '2020-12-18 20:29:08'),
	(3, 'bx bx-file', 'Quod et voluptatem ', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia<', 1, 1, 1, '2020-12-18 20:29:39', '2020-12-18 20:29:39');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Dumping structure for table bizland.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `percentage` tinyint(3) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.skills: ~5 rows (approximately)
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
REPLACE INTO `skills` (`id`, `name`, `percentage`, `status`, `create_by`, `created_at`, `updated_at`) VALUES
	(5, 'Laravel', 50, 0, 1, '2020-12-13 17:00:53', '2020-12-18 18:34:37'),
	(6, 'PHP', 65, 1, 1, '2020-12-13 17:03:37', '2020-12-18 18:34:29'),
	(7, 'Javascript', 70, 1, 1, '2020-12-13 17:04:18', '2020-12-18 18:34:17'),
	(9, 'CSS', 70, 1, 1, '2020-12-13 17:07:48', '2020-12-18 18:34:03'),
	(15, 'HTML', 60, 1, 1, '2020-12-15 13:50:21', '2020-12-18 18:33:53');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

-- Dumping structure for table bizland.team
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `create_by` int(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `create_by` (`create_by`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.team: ~0 rows (approximately)
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
REPLACE INTO `team` (`id`, `name`, `role`, `status`, `facebook`, `twitter`, `instagram`, `linkedIn`, `image`, `create_by`, `created_at`, `updated_at`) VALUES
	(5, 'Md Monir', 'Store Owner', 1, 'http://dcw.test/', 'https://www.jinynaragifa.net', 'https://www.xaviwahoviqo.ws', '', '5fdb93794bd5d722319.jpg', 1, '2020-12-17 21:51:55', '2020-12-18 21:21:10');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;

-- Dumping structure for table bizland.testimonials
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_by` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.testimonials: ~2 rows (approximately)
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
REPLACE INTO `testimonials` (`id`, `name`, `post`, `review`, `image`, `status`, `create_by`, `created_at`, `updated_at`) VALUES
	(1, 'Brendan Case', 'Dolor nostrum sunt c', 'Voluptatum aliqua E', '5fdcbf27859c0863979.jpg', 1, 1, '2020-12-18 20:39:35', '2020-12-18 20:39:51'),
	(2, 'Florence Santos', 'At reprehenderit bla', 'Explicabo Sit elig', '5fdcbf8169dc8688268.jpg', 1, 1, '2020-12-18 20:41:05', '2020-12-18 20:41:05');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;

-- Dumping structure for table bizland.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verfied_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verfied_at`, `password`, `token`, `photo`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Md Monir', 'admin@example.com', NULL, '$2y$10$HrxGwDqHJLuAgRcnj3CWw.uOWjKlTCASyu6WJXuT2fb3Dsr07dRcS', '', NULL, 0, '2020-12-11 21:05:32', '2020-12-12 15:06:13'),
	(2, 'Heather Moody', 'wuqita@mailinator.com', NULL, '$2y$10$wacrlmMkCbnokZbD4Nh7EOqOFAYed0ivQzqSA.1UyRVDW85NThOQ2', '', NULL, 0, '2020-12-11 21:15:32', '2020-12-12 15:02:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table bizland.works_item
CREATE TABLE IF NOT EXISTS `works_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `menu_id` int(10) unsigned NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_by` int(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `menu_id` (`menu_id`),
  KEY `create_by` (`create_by`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.works_item: ~4 rows (approximately)
/*!40000 ALTER TABLE `works_item` DISABLE KEYS */;
REPLACE INTO `works_item` (`id`, `title`, `menu_id`, `image`, `status`, `create_by`, `created_at`, `updated_at`) VALUES
	(9, 'Velit laboris nobis ', 4, '5fdb01e473c8e303328.jpg', 1, 1, '2020-12-17 12:59:48', '2020-12-18 21:09:47'),
	(10, 'Est ipsum in quide', 4, '5fdb01eb28f6f496084.jpg', 1, 1, '2020-12-17 12:59:55', '2020-12-18 21:09:53'),
	(11, 'Aperiam beatae et ad', 3, '5fdb01f369421393554.jpg', 1, 1, '2020-12-17 13:00:03', '2020-12-17 13:00:03'),
	(12, 'Labore autem et aliq', 3, '5fdb01fa02c02558141.jpg', 1, 1, '2020-12-17 13:00:10', '2020-12-17 13:00:10');
/*!40000 ALTER TABLE `works_item` ENABLE KEYS */;

-- Dumping structure for table bizland.works_menu
CREATE TABLE IF NOT EXISTS `works_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_by` int(3) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`),
  KEY `FK_works_menu_users` (`create_by`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bizland.works_menu: ~1 rows (approximately)
/*!40000 ALTER TABLE `works_menu` DISABLE KEYS */;
REPLACE INTO `works_menu` (`id`, `name`, `slug`, `status`, `create_by`, `created_at`, `updated_at`) VALUES
	(3, 'HTML', 'html', 1, 1, '2020-12-16 23:19:26', '2020-12-16 23:19:26'),
	(4, 'CSS', 'css', 1, 1, '2020-12-18 21:09:33', '2020-12-18 21:09:33');
/*!40000 ALTER TABLE `works_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
