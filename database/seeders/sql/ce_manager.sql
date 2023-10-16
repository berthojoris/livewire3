-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6680
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table trackingoutlet.c_e_managers
CREATE TABLE IF NOT EXISTS `c_e_managers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ce_manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ce_manager_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trackingoutlet.c_e_managers: ~15 rows (approximately)
DELETE FROM `c_e_managers`;
INSERT INTO `c_e_managers` (`id`, `brand_name`, `ce_manager_name`, `ce_manager_email`, `created_at`, `updated_at`) VALUES
	(1, 'HOP', 'Martin Permadhi', 'martin.permadhi@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(2, 'GMD', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(3, 'GMS', 'Hani Iskarima', 'hani.iskarima@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(4, 'GMV', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(5, 'GGFI', 'Ferry Ariawan', 'ferry.ariawan@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(6, 'GGM', 'Widy Rinaldi', 'widi.Rinaldi@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(7, 'GSB', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(8, 'GSC', 'Dimitrij Kartalaksana', 'dimitrij.kartalaksana@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(9, 'GGP', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(10, 'GDJ', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(11, 'SWD', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(12, 'FSH', 'Irsan Ranadipura', 'irsan.ranadipura@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(13, 'PRO', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(14, 'PROM', 'Hani Iskarima', 'hani.iskarima@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(15, 'CORPORATE', 'Ferry Ariawan', 'ferry.ariawan@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
