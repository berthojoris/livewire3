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

-- Dumping structure for table trackingoutlet.brand_gm
CREATE TABLE IF NOT EXISTS `brand_gm` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_gm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_gm_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trackingoutlet.brand_gm: ~14 rows (approximately)
DELETE FROM `brand_gm`;
INSERT INTO `brand_gm` (`id`, `brand_name`, `brand_gm_name`, `brand_gm_email`, `created_at`, `updated_at`) VALUES
	(1, 'GMD', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(2, 'GMS', 'Attary Yakanita', 'attary.yakanita@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(3, 'GMV', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(4, 'GGFI', 'Attary Yakanita', 'attary.yakanita@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(5, 'GGM', 'Attary Yakanita', 'attary.yakanita@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(6, 'GSB', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(7, 'GSC', 'Attary Yakanita', 'attary.yakanita@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(8, 'GGP', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(9, 'GDJ', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(10, 'SWD', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(11, 'FSH', 'Erwin Johanes', 'erwin.johanes@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(12, 'PRO', 'Erwin Johanes', 'erwin.johanes@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(13, 'PROM', 'Erwin Johanes', 'erwin.johanes@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(14, 'CORPORATE', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(15, 'CE', 'Pongky Puranto', 'pongky.puranto@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56');

-- Dumping structure for table trackingoutlet.brand_managers
CREATE TABLE IF NOT EXISTS `brand_managers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_manager_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table trackingoutlet.brand_managers: ~14 rows (approximately)
DELETE FROM `brand_managers`;
INSERT INTO `brand_managers` (`id`, `brand_name`, `brand_manager_name`, `brand_manager_email`, `created_at`, `updated_at`) VALUES
	(1, 'GMD', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(2, 'GMS', 'Muhammad Andivan Said', 'muhammad.said@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(3, 'GMV', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(4, 'GGFI', 'Eric Tandry', 'eric.tandry@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(5, 'GGM', 'Fabio Junot Ardelto', 'fabio.ardelto@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(6, 'GSB', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(7, 'GSC', 'Adrian Riadi', 'adrian.riadi@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(8, 'GGP', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(9, 'GDJ', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(10, 'SWD', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(11, 'FSH', 'Rizky Dwianto', 'rizky.dwianto@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(12, 'PRO', '-', '-', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(13, 'PROM', 'Anthony Sugiharto Putra', 'anthony.sugiharto@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56'),
	(14, 'CORPORATE', 'Fitriani Yulia Wardahani', 'fitriani.wardhani@gudanggaramtbk.com', '2023-09-25 05:13:56', '2023-09-25 05:13:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
