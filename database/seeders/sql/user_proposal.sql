-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.33-0ubuntu0.22.04.2 - (Ubuntu)
-- Server OS:                    Linux
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

-- Dumping data for table hop.users: ~15 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Bertho', 'albertho.joris@gudanggaramtbk.com', '2023-07-10 10:13:11', '$2y$10$ifogU5xHOrLjgXx.mR6zOe6PrCx5cqUXhU9cqrn6q5h0EeSMnzgZu', 'THBQKOCXjlgcT2l5vJS9YowenFH2NktBs7eSnGmvkc230DhPhHD12Jg8pTPi', '2023-07-10 10:13:11', '2023-07-10 10:13:11'),
	(2, 'Joshua Malaihollo', 'joshua.malaihollo@gudanggaramtbk.com', '2023-07-10 10:13:11', '$2y$10$IOr/mdJ3/2THV29IOED3YeT.x/KWYboAk4ccpn8HhmOV/W1r//66y', 'zzEooZ3XoN', '2023-07-10 10:13:12', '2023-07-10 10:13:12'),
	(3, 'Ignatia Setianintha', 'ignatia.setianintha@gudanggaramtbk.com', '2023-07-10 10:13:12', '$2y$10$xEMTOJeNRpfu9tBW5GDRlOpOeY9w0VuzRkvDVPEsoVwVDIQAfJIii', 'PjqYJABcqlbCY00WEG7US1JB1x4ni24tRenKx6m2yPzVMkNcUHSwA9PlMkbO', '2023-07-10 10:13:12', '2023-07-10 10:13:12'),
	(4, 'Anna Meutia', 'anna.meutia@gudanggaramtbk.com', '2023-07-10 10:13:12', '$2y$10$Ft/H82W6WoH6V/5yigb.wODRYVWmEXwXR05kdoR1kG4V2c/p9QKM.', 'sIZR69YERZJQu4jrXMe2tHa5fCgpCyqvI3S0VbjBE63k4cbYgyscUqbcpVyt', '2023-07-10 10:13:12', '2023-07-10 10:13:12'),
	(5, 'Pongky Puranto', 'pongky.puranto@gudanggaramtbk.com', '2023-07-10 10:13:12', '$2y$10$obzM.vVOdSjX0gIy5DG47uKFJ/KpSyZamcViF51VICwMOQZevAdsq', 'toC9ckcA66Ax6QfNUTi5sT4V4vExRetU5LV2Qg2bGPH5SF6O4A5yvaGy7r4f', '2023-07-10 10:13:12', '2023-07-10 10:13:12'),
	(6, 'Martin Permadhi', 'martin.permadhi@gudanggaramtbk.com', '2023-07-10 10:13:12', '$2y$10$CII3W1rlU6pMuUNbFFNkauTxxatWhCcktNKgwCpDpaMS630ny03ni', '6ed5hdSiXr', '2023-07-10 10:13:12', '2023-07-10 10:13:12'),
	(7, 'Sponsorship Admin', 'sponsorship@gudanggaramtbk.com', '2023-07-10 10:13:12', '$2y$10$XCFQqe0st.gjJdzhTCGeGOyrPBvZ1e.uDJ9rMSLFOfH9KJ2WOc8bq', 'usoLl7sGi61G7cPtkXmfrsBcHaleOhK1uM8GtRMtdk3y3PkGzc4TmECukoRr', '2023-07-10 10:13:12', '2023-07-10 10:13:12'),
	(8, 'Rizki Fadhillah', 'rizki.fadhillah@gudanggaramtbk.com', '2023-07-10 14:06:53', '$2y$10$F4./P8sbsrpkm7MNAz/d1.lR.uVjhI035GAwafE70QNbqq5ZMrKEG', 'AztjcWmLEfb1ven9qcnyjQRq2feA8FP5S4skjQbwAoUTV7IJocK2GSIiD5HE', '2023-07-10 14:06:53', '2023-07-10 14:06:53'),
	(9, 'Ferry Ariawan', 'ferry.ariawan@gudanggaramtbk.com', '2023-07-11 10:31:04', '$2y$10$cnW8kvTIKI6h96hlZOzhHepJcdnZma3/sTsABc9Gt7FS0lzLJC5aC', 'kA6QxUrc1F', '2023-07-11 10:31:04', '2023-07-11 10:31:04'),
	(10, 'Widi Rinaldi', 'Widi.Rinaldi@gudanggaramtbk.com', '2023-07-11 10:31:20', '$2y$10$IDZphN9tBTwnBlsFOjfW3OVkzikeJ/BlIjLGdhmDADi7/Kdz2xHAa', 'hnCx8uEqww', '2023-07-11 10:31:20', '2023-07-11 10:31:20'),
	(11, 'Dimitrij Kartalaksana', 'dimitrij.kartalaksana@gudanggaramtbk.com', '2023-07-11 10:31:42', '$2y$10$alrVMsOVRO4XwWSW.pxoVO1A8.k4B6UzMkfVi4p2QEzmYcIs913PW', 'rJzegbprjm', '2023-07-11 10:31:42', '2023-07-11 10:31:42'),
	(12, 'Hani Iskarima', 'hani.iskarima@gudanggaramtbk.com', '2023-07-11 10:31:59', '$2y$10$NrN9PlcXQ9JJ/Z8RYzF58Ovxbc.4hPtXVWOkkJF44Q1S3kHvOHRXy', 'Rg5ngQPHwo', '2023-07-11 10:31:59', '2023-07-11 10:31:59'),
	(13, 'Irsan Ranadipura', 'irsan.ranadipura@gudanggaramtbk.com', '2023-07-11 10:32:15', '$2y$10$k6H5NgtAUDkHGDCAtnYNI.Kmn45YLDh4FyTf7Q8eUj8v/Ls7EhUHG', 'RLHbJjipPuCy1e5ELjqnOwQe3exhrxiPdAI2kZB5Huksw3I7Zo8tq9Km07d3', '2023-07-11 10:32:15', '2023-07-11 10:32:15'),
	(16, 'System', 'system@ggtrackingsystem.id', '2023-08-23 11:11:18', '$2y$10$YbTZqFhBEE6R8XBUst5uhOzYfN2htBHRWXq1qp7Fr0VnJo8v8rwYm', 'vlgKJb90WG', '2023-08-23 11:11:18', '2023-08-23 11:11:18'),
	(17, 'Irfan Siregar', 'irfan.siregar@gudanggaramtbk.com', '2023-09-05 11:11:06', '$2y$10$tGRCkq/yAaRpPWqssLvcgeP2s52bqkrhhF08yU06oVfmxry0oHYNW', 'f2UO1XCE7YWIxOPKbJXpaIkijc7RhtrSbRKP64GqPjBMNlNRuHBLHsqi7GyU', '2023-09-05 11:11:06', '2023-09-05 11:11:06');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
