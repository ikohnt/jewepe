-- =========================================================================
--  DATABASE: jewepe
--  Studi Kasus: Website Wedding Organizer JeWePe (CodeIgniter 3)
--  Import file ini melalui phpMyAdmin, atau:
--     mysql -u root -p jewepe < jewepe.sql
--  (buat database "jewepe" terlebih dahulu jika belum ada)
-- =========================================================================

CREATE DATABASE IF NOT EXISTS `jewepe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jewepe`;

-- -------------------------------------------------------------------------
-- Tabel: tb_admin
-- Nama Field   | Type          | Null | Keterangan
-- id           | INT           | No   | Primary Key, Auto Increment
-- username     | VARCHAR(50)   | No   | Unik, dipakai login
-- password     | VARCHAR(255)  | No   | Disimpan ter-hash (bcrypt)
-- nama         | VARCHAR(100)  | No   | Nama tampilan admin
-- -------------------------------------------------------------------------
CREATE TABLE `tb_admin` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Akun default -> username: admin | password: admin123
-- (Segera ganti password ini setelah instalasi selesai)
INSERT INTO `tb_admin` (`username`, `password`, `nama`) VALUES
('admin', '$2b$12$Up4sBtEmTrHkNty3u6.LZ.jVMFOeqOdjh/c3RKZ7p021ej2N0LA/2', 'Administrator JeWePe');

-- -------------------------------------------------------------------------
-- Tabel: tb_profil  (Kelola Profil Website - singleton, 1 baris saja)
-- Nama Field    | Type          | Null | Keterangan
-- id            | INT           | No   | Primary Key
-- nama_website  | VARCHAR(100)  | No   | Nama WO yang tampil di header/footer
-- telepon       | VARCHAR(30)   | No   |
-- email         | VARCHAR(100)  | No   |
-- alamat        | TEXT          | Yes  |
-- jam_header    | VARCHAR(50)   | Yes  | Contoh: "Senin - Sabtu"
-- jam_waktu     | VARCHAR(50)   | Yes  | Contoh: "08:00 - 17:00 WIB"
-- -------------------------------------------------------------------------
CREATE TABLE `tb_profil` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_website` VARCHAR(100) NOT NULL,
  `telepon` VARCHAR(30) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `alamat` TEXT NULL,
  `jam_header` VARCHAR(50) NULL,
  `jam_waktu` VARCHAR(50) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_profil` (`nama_website`, `telepon`, `email`, `alamat`, `jam_header`, `jam_waktu`) VALUES
('Wedding Organizer JeWePe', '081112222222', 'jewepe@gmail.com', 'Jl. Raya Kalimalang No. 12, Bekasi, Jawa Barat', 'Senin - Sabtu', '08:00 - 17:00 WIB');

-- -------------------------------------------------------------------------
-- Tabel: tb_katalog  (Kelola Katalog Paket - CRUD)
-- Nama Field    | Type            | Null | Keterangan
-- id            | INT             | No   | Primary Key, Auto Increment
-- nama_paket    | VARCHAR(150)    | No   |
-- harga         | BIGINT          | No   | Disimpan dalam Rupiah (tanpa desimal)
-- gambar        | VARCHAR(255)    | No   | Nama file di /uploads/katalog/
-- deskripsi     | TEXT            | No   | Rincian fasilitas paket
-- status        | ENUM(publish,draft) | No | Tampil di publik hanya jika 'publish'
-- created_at    | DATETIME        | No   |
-- -------------------------------------------------------------------------
CREATE TABLE `tb_katalog` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_paket` VARCHAR(150) NOT NULL,
  `harga` BIGINT(20) NOT NULL,
  `gambar` VARCHAR(255) NOT NULL,
  `deskripsi` TEXT NOT NULL,
  `status` ENUM('publish','draft') NOT NULL DEFAULT 'publish',
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------------------------
-- Tabel: tb_pesanan  (Pemesanan Paket oleh Pembaca/Pengunjung)
-- Nama Field     | Type            | Null | Keterangan
-- id             | INT             | No   | Primary Key, Auto Increment
-- nama_pemesan   | VARCHAR(100)    | No   |
-- email          | VARCHAR(100)    | No   | Identitas pemesan (dipakai utk Cek Pesanan)
-- no_hp          | VARCHAR(20)     | No   |
-- id_katalog     | INT             | No   | Foreign Key -> tb_katalog(id)
-- tanggal_acara  | DATE            | No   |
-- catatan        | TEXT            | Yes  |
-- status         | ENUM(request,approved) | No | Default 'request', admin ubah -> 'approved'
-- created_at     | DATETIME        | No   |
-- -------------------------------------------------------------------------
CREATE TABLE `tb_pesanan` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_pemesan` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `no_hp` VARCHAR(20) NOT NULL,
  `id_katalog` INT(11) NOT NULL,
  `tanggal_acara` DATE NOT NULL,
  `catatan` TEXT NULL,
  `status` ENUM('request','approved') NOT NULL DEFAULT 'request',
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_katalog` (`id_katalog`),
  CONSTRAINT `fk_pesanan_katalog` FOREIGN KEY (`id_katalog`) REFERENCES `tb_katalog` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
