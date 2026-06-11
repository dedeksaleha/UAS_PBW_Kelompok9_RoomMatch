# 🏠 RoomMatch

## Deskripsi Proyek

RoomMatch adalah aplikasi berbasis web yang dibuat menggunakan framework Laravel dengan menerapkan konsep MVC (Model-View-Controller). Aplikasi ini membantu pengguna menemukan roommate atau teman sekamar yang sesuai berdasarkan lokasi, kebiasaan hidup, preferensi tempat tinggal, dan kebutuhan pribadi.

Pengguna dapat membuat iklan pencarian roommate, mencari roommate lain, melakukan match dengan pengguna yang diminati, berkomunikasi melalui fitur chat, serta mengelola profil dan iklan mereka sendiri. Aplikasi dirancang dengan tampilan modern menggunakan kombinasi warna navy dan gold untuk memberikan pengalaman pengguna yang nyaman dan profesional.

---

# Konsep MVC yang Diterapkan

Project ini menerapkan konsep MVC (Model-View-Controller) pada framework Laravel.

## 1. Model

Model digunakan untuk menghubungkan aplikasi dengan database serta mengelola data aplikasi.

### Model yang digunakan:

- `User.php`
- `Iklan.php`
- `Chat.php`
- `RoomMatch.php`

### Fungsi:

- Mengelola data pengguna
- Menyimpan data iklan roommate
- Menyimpan data percakapan
- Mengelola data match antar pengguna
- Mengatur relasi antar tabel

---

## 2. View

View digunakan untuk menampilkan antarmuka aplikasi kepada pengguna.

### View yang digunakan:

- `dashboard.blade.php`
- `chat.blade.php`
- `create-roommate.blade.php`
- `edit-roommate.blade.php`
- `profile/index.blade.php`
- `layouts/app.blade.php`

### Fungsi:

- Menampilkan dashboard roommate
- Menampilkan daftar roommate
- Menampilkan halaman chat
- Menampilkan profil pengguna
- Menampilkan halaman pembuatan dan edit iklan

---

## 3. Controller

Controller digunakan untuk mengatur logika aplikasi dan penghubung antara Model dan View.

### Controller yang digunakan:

- `DashboardController.php`
- `ChatController.php`
- `ProfileController.php`

### Fungsi:

- Menampilkan roommate yang tersedia
- Mengatur sistem pencarian dan filter
- Mengelola fitur chat
- Mengelola data profil pengguna
- Mengatur sistem match roommate

---

# Struktur Direktori

```bash
app/
├── Http/
│   └── Controllers/
│       ├── DashboardController.php
│       ├── ChatController.php
│       └── ProfileController.php
│
├── Models/
│   ├── User.php
│   ├── Iklan.php
│   ├── Chat.php
│   └── RoomMatch.php
│
resources/
├── views/
│   ├── dashboard.blade.php
│   ├── chat.blade.php
│   ├── create-roommate.blade.php
│   ├── edit-roommate.blade.php
│   ├── profile/
│   └── auth/
│
routes/
└── web.php

database/
├── migrations/
└── seeders/
```

---

# Skema Database

## Tabel `users`

| Field | Type |
|---------|---------|
| id | bigint |
| name | varchar |
| email | varchar |
| password | varchar |
| pekerjaan | varchar |
| lokasi | varchar |
| kebiasaan | text |
| created_at | timestamp |
| updated_at | timestamp |

## Tabel `iklans`

| Field | Type |
|---------|---------|
| id | bigint |
| user_id | foreign key |
| judul | varchar |
| deskripsi | text |
| lokasi | varchar |
| preferensi_roommate | text |
| foto | varchar |
| created_at | timestamp |
| updated_at | timestamp |

## Tabel `room_matches`

| Field | Type |
|---------|---------|
| id | bigint |
| sender_id | foreign key |
| receiver_id | foreign key |
| status | enum (pending, accepted, rejected, expired) |
| expired_at | timestamp |
| created_at | timestamp |
| updated_at | timestamp |

## Tabel `chats`

| Field | Type |
|---------|---------|
| id | bigint |
| sender_id | foreign key |
| receiver_id | foreign key |
| message | text |
| is_read | boolean |
| created_at | timestamp |
| updated_at | timestamp |

---

# Fitur Aplikasi

## CRUD Iklan Roommate

Pengguna dapat:

- Membuat iklan roommate
- Mengedit iklan roommate
- Menghapus iklan roommate
- Mengunggah foto roommate
- Mengatur preferensi roommate

## Matching System

Pengguna dapat:

- Mengirim permintaan match
- Menerima match
- Menolak match
- Melihat status match
- Mendapatkan notifikasi match

Status match:

- Pending
- Accepted
- Rejected
- Expired (24 jam)

Ketentuan:

- User hanya dapat memiliki 1 match aktif.
- User tidak dapat mengirim atau menerima match baru setelah match diterima.

## Real-Time Style Chat

Pengguna dapat:

- Mengirim pesan
- Menerima pesan
- Melihat kontak aktif
- Melihat unread message
- Mendapatkan notifikasi chat
- Mengakses sidebar percakapan

## Smart Filtering

Pengguna dapat mencari roommate berdasarkan:

- Lokasi
- Pekerjaan
- Kebiasaan hidup
- Preferensi roommate

## Profile Management

Pengguna dapat:

- Mengubah foto profil
- Mengedit data diri
- Mengubah preferensi roommate
- Mengelola iklan roommate

## Dashboard

Dashboard menampilkan:

- Daftar roommate
- Status match aktif
- Notifikasi chat
- Filter roommate
- Pencarian roommate

---

# Cara Menjalankan Proyek

## 1. Clone Repository

```bash
git clone https://github.com/username/roommatch.git
```

## 2. Masuk ke Folder Project

```bash
cd roommatch
```

## 3. Install Dependency

```bash
composer install
```

## 4. Install NPM Dependency

```bash
npm install
```

## 5. Copy File Environment

```bash
cp .env.example .env
```

## 6. Generate Application Key

```bash
php artisan key:generate
```

## 7. Atur Database di File .env

```env
DB_DATABASE=roommatch
DB_USERNAME=root
DB_PASSWORD=
```

## 8. Jalankan Migration

```bash
php artisan migrate
```

## 9. Jalankan Vite

```bash
npm run dev
```

## 10. Jalankan Server

```bash
php artisan serve
```

## 11. Buka Browser

```bash
http://127.0.0.1:8000
```

---

# Alur Kerja Aplikasi

## 1. User Registrasi dan Login

Data pengguna disimpan ke tabel `users`.

↓

## 2. User Membuat Iklan Roommate

Data roommate disimpan ke tabel `iklans`.

↓

## 3. User Mencari Roommate

Sistem melakukan pencarian berdasarkan filter yang dipilih.

↓

## 4. User Mengirim Match

Data disimpan ke tabel `room_matches`.

↓

## 5. Match Diterima

Status berubah menjadi `accepted`.

↓

## 6. User Mulai Chat

Pesan disimpan ke tabel `chats`.

↓

## 7. User Menjadi Roommate

Sistem mengunci match aktif dan tidak menerima match baru.

---

# Routes

| Method | Route | Fungsi |
|----------|----------|----------|
| GET | /dashboard | Menampilkan dashboard |
| GET | /roommates | Menampilkan daftar roommate |
| GET | /roommates/create | Form tambah roommate |
| POST | /roommates | Menyimpan roommate |
| GET | /roommates/{id}/edit | Form edit roommate |
| PUT | /roommates/{id} | Update roommate |
| DELETE | /roommates/{id} | Hapus roommate |
| POST | /match/send | Mengirim match |
| POST | /match/accept | Menerima match |
| POST | /match/reject | Menolak match |
| GET | /chat | Menampilkan halaman chat |
| POST | /chat/send | Mengirim pesan |
| GET | /profile | Menampilkan profil |
| PUT | /profile/update | Update profil |

---

# Data Sample

## User

| Nama | Lokasi | Pekerjaan |
|--------|--------|--------|
| Andi | Medan | Mahasiswa |
| Sarah | Medan | Karyawan |

## Roommate Post

| Judul | Lokasi | Preferensi |
|--------|--------|--------|
| Cari Teman Kos | Medan Johor | Tidak Merokok |
| Roommate Apartemen | Medan Kota | Mahasiswa |

## Match

| Pengirim | Penerima | Status |
|-----------|-----------|-----------|
| Andi | Sarah | Accepted |

---

# Teknologi yang Digunakan

- Laravel 13
- PHP 8.3
- MySQL
- HTML5
- CSS3
- JavaScript
- Blade Template Engine
- Laravel Breeze Authentication
- Vite
- Composer
- Laragon / XAMPP
- MVC Architecture

---

# Author

Dibuat untuk memenuhi tugas Mata Kuliah Pemrograman Berbasis Web dengan implementasi konsep MVC menggunakan framework Laravel. Project ini mengimplementasikan fitur Roommate Finder, Matching System, Real-Time Style Chat, Smart Filtering, serta User Generated Roommate Card untuk membantu pengguna menemukan teman sekamar yang sesuai dengan preferensi mereka.