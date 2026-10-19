# 💍 Website Wedding Organizer JeWePe (CI3)

[![PHP Version](https://img.shields.io/badge/PHP-7.4%20%7C%208.x-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Framework](https://img.shields.io/badge/Framework-CodeIgniter%203.1.x-EF4223?style=flat&logo=codeigniter&logoColor=white)](https://codeigniter.com/)
[![Database](https://img.shields.io/badge/Database-MySQL-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Styling](https://img.shields.io/badge/CSS-Tailwind%20CSS-38B2AC?style=flat&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

Aplikasi web sistem informasi dan pemesanan paket pernikahan berbasis **CodeIgniter 3 + MySQL**. Sistem ini dirancang dengan antarmuka modern bernuansa *luxury gold & stone*, memfasilitasi calon pengantin untuk melihat katalog paket pernikahan, melakukan reservasi online, dan melacak status pemesanan secara mandiri. Dilengkapi pula dengan panel administrator untuk mengelola katalog, pesanan, profil, dan laporan.

---

## 📌 Daftar Isi
- [Fitur Utama](#-fitur-utama)
- [Struktur Database](#-struktur-database)
- [Struktur Direktori](#-struktur-direktori)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Panduan Instalasi & Penggunaan](#-panduan-instalasi--penggunaan)
- [Akun Default Administrator](#-akun-default-administrator)
- [Panduan Push ke GitHub](#-panduan-push-ke-github)
- [Catatan Keamanan](#-catatan-keamanan)

---

## ✨ Fitur Utama

### 🌐 1. Halaman Publik (Pengunjung / Calon Pengantin)
* **Hero Section & Branding**: Tampilan elegan dengan profil WO yang dapat dikelola secara dinamis.
* **Katalog Paket Pernikahan**: Menampilkan daftar paket berstatus `publish` lengkap dengan foto, deskripsi singkat, dan harga berformat Rupiah.
* **Detail Paket**: Rincian fasilitas setiap paket pernikahan.
* **Formulir Pemesanan Online**: Formulir booking cepat dengan validasi data pemesan dan tanggal acara (status awal: `requested`).
* **Fitur Cek Status Pesanan**: Pelacakan status pemesanan secara transparan hanya dengan memasukkan email pemesan tanpa perlu registrasi akun yang rumit.
* **Informasi Kontak**: Informasi lokasi kantor, jam operasional kerja, email, dan telepon.

### 🔐 2. Panel Administrator (Backend)
* **Autentikasi Aman**: Login admin terproteksi dengan password hashing Bcrypt (`password_hash` & `password_verify`) dan CI Session.
* **Dashboard Interaktif**: Ringkasan data pesanan masuk, jumlah paket aktif, dan statistik status pesanan.
* **Manajemen Katalog (CRUD)**:
  * Tambah paket baru dengan upload gambar ter-validasi (format: JPG/JPEG/PNG/GIF, max 2MB).
  * Pengubahan informasi paket dan toggle status publikasi (`publish` / `draft`).
  * Penghapusan paket pernikahan beserta file gambar dari folder server.
* **Manajemen Pesanan**:
  * Daftar pesanan yang masuk secara *real-time*.
  * Konfirmasi pesanan dengan mengubah status dari `Requested` menjadi `Approved`.
* **Laporan Pemesanan & Cetak**:
  * Filter riwayat pesanan berdasarkan rentang tanggal acara / periode pemesanan.
  * Fitur cetak laporan (Print Preview siap cetak untuk arsip fisik atau PDF).
* **Manajemen Profil Website**:
  * Pengaturan nama WO, nomor kontak, alamat email, alamat fisik kantor, serta jam kerja.

---

## 🗄️ Struktur Database

Database utama bernama `db_jewepe`. File schema dan data awal (*seeder*) tersedia di folder `database/db_jewepe.sql`.

### Relasi Tabel:
```
┌────────────────┐          ┌──────────────────┐
│    tb_users    │          │  tb_catalogues   │
├────────────────┤ 1      * ├──────────────────┤
│ user_id (PK)   │─────────<│ catalogue_id(PK) │
│ username       │          │ user_id (FK)     │
│ password       │          │ package_name     │
│ name           │          │ price            │
└────────────────┘          │ image            │
                            │ description      │
                            │ status_publish   │
                            └────────┬─────────┘
                                     │ 1
                                     │
                                     │ *
┌────────────────┐          ┌────────┴─────────┐
│  tb_settings   │          │     tb_order     │
├────────────────┤          ├──────────────────┤
│ id (PK)        │          │ order_id (PK)    │
│ website_name   │          │ catalogue_id(FK) │
│ phone_number1  │          │ name             │
│ email1         │          │ email            │
│ address        │          │ phone_number     │
│ ...            │          │ wedding_date     │
└────────────────┘          │ status (req/appr)│
                            └──────────────────┘
```

---

## 📂 Struktur Direktori

```text
jewepe/
├── application/             # Core MVC CodeIgniter
│   ├── config/              # Konfigurasi database, base_url, routes, autoload
│   ├── controllers/         # Controller Publik & Admin (admin/)
│   ├── models/              # Model data (tb_users, tb_catalogues, tb_order, tb_settings)
│   └── views/               # Template UI (Tailwind CSS) publik & admin
├── database/                # Skrip SQL untuk setup database
│   ├── db_jewepe.sql        # Skrip database utama
│   └── jewepe.sql           # Skrip database alternatif
├── system/                  # Core engine framework CodeIgniter 3
├── uploads/                 # Direktori file upload
│   └── katalog/             # Penyimpanan foto banner paket pernikahan
├── .gitignore               # Daftar file yang diabaikan Git (cache, log, dll)
├── .htaccess                # URL rewrite untuk menghilangkan index.php
├── index.php                # Front controller utama CI
└── README.md                # Dokumentasi proyek
```

---

## 💻 Persyaratan Sistem

* **Web Server**: Apache (XAMPP / WAMP / Laragon) dengan modul `mod_rewrite` aktif.
* **PHP**: Versi 7.4 atau 8.0+
* **Ekstensi PHP**: `mysqli`, `pdo`, `mbstring`, `fileinfo`, `gd`
* **Database**: MySQL 5.7+ atau MariaDB 10.3+
* **Browser Modern**: Chrome, Firefox, Safari, atau Edge

---

## 🚀 Panduan Instalasi & Penggunaan

### 1. Letakkan Proyek di Direktori Web Server
Letakkan folder ini di direktori web server lokal Anda:
* **XAMPP**: `C:/xampp/htdocs/jewepe`
* **Laragon**: `C:/laragon/www/jewepe`
* **Linux**: `/var/www/html/jewepe`

### 2. Impor Database
1. Buka browser dan akses **phpMyAdmin** (`http://localhost/phpmyadmin`).
2. Buat database baru bernama `db_jewepe`.
3. Klik tab **Import**, pilih file `database/db_jewepe.sql`, lalu klik **Go / Kirim**.

### 3. Konfigurasi Koneksi Database
Buka file `application/config/database.php` dan sesuaikan kredensial MySQL lokal Anda:
```php
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'db_jewepe',
'dbdriver' => 'mysqli',
```

### 4. Konfigurasi Base URL
Buka file `application/config/config.php` dan pastikan `base_url` sudah sesuai dengan folder project Anda:
```php
$config['base_url'] = 'http://localhost/jewepe/';
```

### 5. Izin Folder Upload (*File Permissions*)
Pastikan folder `uploads/katalog/` memiliki izin tulis (*writable*):
* Pada Linux/macOS:
  ```bash
  chmod -R 775 uploads/
  ```
* Pada Windows/XAMPP: Secara default folder sudah berstatus *writable*.

### 6. Jalankan Aplikasi
* **Halaman Pengunjung (Landing Page)**:
  `http://localhost/jewepe/`
* **Halaman Cek Status Pesanan**:
  `http://localhost/jewepe/cek-pesanan`
* **Halaman Login Admin**:
  `http://localhost/jewepe/login`

---

## 🔑 Akun Default Administrator

| Parameter | Kredensial |
|---|---|
| **URL Login** | `http://localhost/jewepe/login` |
| **Username** | `admin` |
| **Password** | `admin123` |

> *Catatan: Untuk keamanan, segera ganti password default setelah berhasil masuk atau saat deploy ke server produksi.*

---

## 📤 Panduan Push ke GitHub

Jika Anda ingin mengunggah repositori ini ke akun GitHub Anda sendiri, ikuti langkah-langkah berikut:

### Opsi 1: Menggunakan Git Bash / Terminal (Manual)

1. Buka **Terminal** atau **Git Bash** di folder project (`C:\xampp\htdocs\jewepe`).
2. Buat repositori baru di website [GitHub](https://github.com/new) (misalnya diberi nama `jewepe`). Jangan centang opsi *"Add a README"* atau *".gitignore"* karena sudah ada di lokal.
3. Jalankan rangkaian perintah berikut:

```bash
# 1. Inisialisasi Git lokal
git init

# 2. Tambahkan semua file ke staging
git add .

# 3. Buat commit pertama
git commit -m "feat: initial commit website wedding organizer jewepe"

# 4. Ganti branch utama menjadi 'main'
git branch -M main

# 5. Hubungkan ke repositori GitHub Anda (ganti URL dengan repositori Anda)
git remote add origin https://github.com/USERNAME_ANDA/jewepe.git

# 6. Push kode ke GitHub
git push -u origin main
```

### Opsi 2: Menggunakan GitHub CLI (`gh`)

Jika Anda sudah login menggunakan `gh auth`:
```bash
# Inisialisasi & commit file
git init
git add .
git commit -m "feat: initial commit website wedding organizer jewepe"

# Buat repositori di GitHub dan langsung push
gh repo create jewepe --public --source=. --remote=origin --push
```

---

## 🔒 Catatan Keamanan

1. **Kredensial Database**: Pastikan tidak membagikan username dan password database produksi (seperti database hosting publik) ke repositori publik.
2. **Kunci Enkripsi**: Perbarui nilai `$config['encryption_key']` di `application/config/config.php` sebelum digunakan di lingkungan publik/live.
3. **Session & Log**: Folder `application/logs/` dan `application/cache/` sudah didaftarkan pada `.gitignore` agar file log internal dan data session pengguna tidak ikut terunggah ke repositori Git.

---

## 📄 Lisensi
Proyek ini dibuat untuk keperluan pembelajaran dan sertifikasi kompetensi kejuruan. Bebas dimodifikasi dan dikembangkan lebih lanjut.
