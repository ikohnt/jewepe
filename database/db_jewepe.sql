-- =========================================================================
-- DATABASE: db_jewepe
-- Studi Kasus: Website Wedding Organizer JeWePe (CodeIgniter 3)
-- Import file ini melalui phpMyAdmin atau MySQL CLI:
--    mysql -u root -p < db_jewepe.sql
-- =========================================================================

CREATE DATABASE IF NOT EXISTS `db_jewepe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_jewepe`;

-- -------------------------------------------------------------------------
-- Tabel 1: tb_users (Administrator)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `unique_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Akun default: username = admin | password = admin123
INSERT INTO `tb_users` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '$2y$10$1z2glBOsJwa4MCkhHOHzX.b1ckiZWct8P5AhrdLCD417ZVT836Nh6')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- -------------------------------------------------------------------------
-- Tabel 2: tb_settings (Profil & Informasi Website)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_settings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `website_name` VARCHAR(100) NOT NULL,
  `phone_number1` VARCHAR(30) DEFAULT NULL,
  `phone_number2` VARCHAR(30) DEFAULT NULL,
  `email1` VARCHAR(100) DEFAULT NULL,
  `email2` VARCHAR(100) DEFAULT NULL,
  `address` TEXT DEFAULT NULL,
  `header_bussines_hour` VARCHAR(50) DEFAULT NULL,
  `time_bussines_hour` VARCHAR(50) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_settings` (`id`, `website_name`, `phone_number1`, `email1`, `address`, `header_bussines_hour`, `time_bussines_hour`) VALUES
(1, 'Wedding Organizer JeWePe', '081112222222', 'kontak@jewepe.com', 'Jl. Raya Kalimalang No. 12, Bekasi, Jawa Barat', 'Senin - Sabtu', '08:00 - 17:00 WIB')
ON DUPLICATE KEY UPDATE `website_name` = VALUES(`website_name`);

-- -------------------------------------------------------------------------
-- Tabel 3: tb_catalogues (Katalog Paket Pernikahan)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_catalogues` (
  `catalogue_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL DEFAULT 1,
  `package_name` VARCHAR(150) NOT NULL,
  `price` BIGINT(20) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `status_publish` ENUM('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`catalogue_id`),
  KEY `fk_catalogues_user` (`user_id`),
  CONSTRAINT `fk_catalogues_user` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_catalogues` (`catalogue_id`, `user_id`, `package_name`, `price`, `image`, `description`, `status_publish`) VALUES
(1, 1, 'Paket Silver Elegant', 15000000, '043566071cf04f4d0f33f424db102938.png', 'Paket pernikahan hemat dan elegan mencakup rias pengantin & busana akad/resepsi, dekorasi pelaminan modern 4-6 meter, dokumentasi foto album & master video, serta standard sound system.', 'Y'),
(2, 1, 'Paket Gold Royal', 28500000, 'cd62e8877940d09d38d4257debfda2f2.png', 'Paket pernikahan lengkap dan mewah dengan busana pengantin eksklusif, dekorasi bunga segar premium, catering 300 porsi, MC profesional, dokumentasi video cinematic, dan wedding cake.', 'Y')
ON DUPLICATE KEY UPDATE `package_name` = VALUES(`package_name`);

-- -------------------------------------------------------------------------
-- Tabel 4: tb_order (Pesanan dari Pengunjung / Pemesan)
-- -------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_order` (
  `order_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) DEFAULT 1,
  `catalogue_id` INT(11) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone_number` VARCHAR(20) NOT NULL,
  `wedding_date` DATE NOT NULL,
  `status` ENUM('requested','approved') NOT NULL DEFAULT 'requested',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `fk_order_catalogue` (`catalogue_id`),
  CONSTRAINT `fk_order_catalogue` FOREIGN KEY (`catalogue_id`) REFERENCES `tb_catalogues` (`catalogue_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
