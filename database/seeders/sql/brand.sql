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

-- Dumping data for table smps.brands: ~14 rows (approximately)
DELETE FROM `brands`;
INSERT INTO `brands` (`group`, `merek`, `brand`) VALUES
	('GG', 'GMD', 'GG MILD'),
	('GG', 'GMS', 'GG SHIVER'),
	('GG', 'GMV', 'GG MOVE'),
	('GUDANG GARAM', 'GGFI', 'GUDANG GARAM FILTER INTERNATIONAL'),
	('GUDANG GARAM', 'GGM', 'GUDANG GARAM MERAH'),
	('GUDANG GARAM', 'GSB', 'GUDANG GARAM SIGNATURE MILD (BLUE)'),
	('GUDANG GARAM', 'GSC', 'GUDANG GARAM SIGNATURE COKLAT'),
	('GUDANG GARAM', 'GGP', 'GUDANG GARAM PATRA'),
	('GUDANG GARAM', 'GDJ', 'GUDANG GARAM DJAJA'),
	('GUDANG GARAM', 'SWD', 'SRIWEDARI'),
	('SURYA', 'FSH', 'SURYA'),
	('SURYA', 'PRO', 'SURYA PRO'),
	('SURYA', 'PROM', 'SURYA PRO MILD'),
	('CORPORATE', 'CORPORATE', 'CORPORATE');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
