<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Tutorial Instalasi Project Laravel

Dokumentasi ini menjelaskan langkah-langkah instalasi dan konfigurasi project Laravel agar dapat berjalan di lingkungan lokal.

---

## Persyaratan Sistem

Sebelum memulai, pastikan perangkat kamu sudah memenuhi persyaratan berikut:

- PHP >= 8.1
- Composer (Dependency Manager untuk PHP)
- Database MySQL / MariaDB / PostgreSQL / SQLite
- Web server (Apache/Nginx) atau built-in PHP server
- Git (opsional, untuk clone repo)

---

## Langkah Instalasi

### 1. Clone Repository

Clone project Laravel dari repository GitHub (ganti URL dengan repo kamu):

```bash
git clone https://github.com/username/project-laravel.git
cd project-laravel
```

### 2. Install Dependencies

Jalankan perintah berikut untuk menginstall semua package yang dibutuhkan:

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Edit file `.env` sesuai konfigurasi lokal, terutama bagian database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=user_database
DB_PASSWORD=password_database
```

### 4. Generate Application Key

Laravel membutuhkan aplikasi key yang unik, jalankan perintah:

```bash
php artisan key:generate
```

### 5. Migrasi dan Seeder Database

Jalankan migrasi untuk membuat tabel database:

```bash
php artisan migrate
```

### 6. Jalankan Server Laravel

Gunakan built-in server Laravel untuk testing:

```bash
php artisan serve
```

Buka browser dan akses:

```
http://localhost:8000
```

---

## Troubleshooting

- Pastikan versi PHP sudah sesuai.
- Jika error permission, cek folder `storage` dan `bootstrap/cache` harus writable.
- Jika koneksi database gagal, pastikan konfigurasi `.env` sudah benar dan database sudah dibuat.

---

## Kontak

Jika ada pertanyaan atau masalah, silakan hubungi:

- Nama: Ilham Sahid  
- Email: ilham@example.com  
- GitHub: https://github.com/Ilhamsahid

---

Terima kasih telah menggunakan project ini!
