## Deskripsi Proyek

RoomMatch adalah platform pencarian roommate berbasis web yang dirancang untuk membantu pengguna menemukan teman sekamar yang sesuai berdasarkan lokasi, kebiasaan hidup, pekerjaan, preferensi tempat tinggal, dan kebutuhan pribadi.

Mencari roommate yang cocok sering kali menjadi tantangan karena perbedaan gaya hidup, kebiasaan sehari-hari, maupun preferensi tempat tinggal. RoomMatch hadir sebagai solusi dengan menyediakan sistem pencarian, matching, dan komunikasi yang memungkinkan pengguna menemukan roommate yang lebih sesuai sebelum memutuskan untuk tinggal bersama.

Aplikasi ini memungkinkan pengguna untuk membuat iklan pencarian roommate, mencari pengguna lain menggunakan sistem filter, mengirim permintaan match, berkomunikasi melalui fitur chat, serta mengelola profil dan preferensi mereka sendiri dalam satu platform terintegrasi.


# Tujuan Pengembangan

RoomMatch dikembangkan dengan tujuan:

* Membantu pengguna menemukan roommate yang sesuai dengan preferensi mereka.
* Mempermudah proses pencarian teman sekamar secara online.
* Mengurangi risiko ketidakcocokan antar roommate.
* Menyediakan media komunikasi sebelum pengguna memutuskan untuk tinggal bersama.
* Memberikan pengalaman pencarian roommate yang lebih aman, cepat, dan efisien.


# Fitur Utama

## 1. Roommate Advertisement

Pengguna dapat membuat iklan pencarian roommate yang berisi informasi penting mengenai tempat tinggal dan preferensi roommate yang diinginkan.

### Fitur

* Membuat iklan roommate
* Mengedit iklan roommate
* Menghapus iklan roommate
* Menambahkan foto
* Menambahkan deskripsi tempat tinggal
* Mengatur preferensi roommate


## 2. Matching System

Sistem matching digunakan untuk memastikan bahwa kedua pengguna memiliki ketertarikan yang sama sebelum dapat melanjutkan komunikasi.

### Status Match

* Pending
* Accepted
* Rejected
* Expired

### Aturan Match

* Setiap pengguna hanya dapat memiliki satu match aktif.
* Match akan otomatis berakhir setelah 24 jam jika tidak direspon.
* Pengguna yang telah memiliki match aktif tidak dapat mengirim atau menerima match baru.
* Chat hanya dapat dilakukan setelah match diterima.

### Manfaat

* Mengurangi spam permintaan roommate.
* Memastikan komunikasi hanya terjadi antar pengguna yang benar-benar tertarik.


## 3. Chat System

Setelah match diterima, pengguna dapat berkomunikasi secara langsung melalui fitur chat.

### Fitur Chat

* Pengiriman pesan
* Penerimaan pesan
* Unread message notification
* Notification badge
* Active conversation
* Contact sidebar

### Tujuan

* Mempermudah proses perkenalan.
* Membantu pengguna mendiskusikan detail tempat tinggal.
* Menjadi sarana komunikasi sebelum menjadi roommate.


## 4. Smart Filtering

RoomMatch menyediakan fitur pencarian yang memungkinkan pengguna menemukan roommate yang sesuai dengan kebutuhan mereka.

### Filter yang Tersedia

* Lokasi
* Pekerjaan
* Kebiasaan hidup
* Preferensi roommate

### Tujuan

* Mempercepat pencarian roommate.
* Menampilkan hasil yang lebih relevan.
* Mengurangi waktu pencarian.


## 5. Profile Management

Setiap pengguna memiliki profil yang dapat disesuaikan sesuai kebutuhan.

### Data Profil

* Nama
* Foto Profil
* Lokasi
* Pekerjaan
* Deskripsi Diri
* Kebiasaan Hidup
* Preferensi Roommate

### Fitur

* Mengubah foto profil
* Mengedit data pribadi
* Mengatur preferensi roommate
* Mengelola informasi akun


## 6. Notification System

Aplikasi menyediakan berbagai notifikasi untuk membantu pengguna mengetahui aktivitas penting.

### Jenis Notifikasi

* Match baru
* Match diterima
* Match ditolak
* Pesan baru
* Pesan belum dibaca


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


# Skema Database

## Tabel Users

| Field      | Type      |
| ---------- | --------- |
| id         | bigint    |
| name       | varchar   |
| email      | varchar   |
| password   | varchar   |
| pekerjaan  | varchar   |
| lokasi     | varchar   |
| kebiasaan  | text      |
| created_at | timestamp |
| updated_at | timestamp |

## Tabel Roommate Posts

| Field               | Type        |
| ------------------- | ----------- |
| id                  | bigint      |
| user_id             | foreign key |
| judul               | varchar     |
| deskripsi           | text        |
| lokasi              | varchar     |
| preferensi_roommate | text        |
| foto                | varchar     |
| created_at          | timestamp   |
| updated_at          | timestamp   |

## Tabel Matches

| Field       | Type        |
| ----------- | ----------- |
| id          | bigint      |
| sender_id   | foreign key |
| receiver_id | foreign key |
| status      | enum        |
| expired_at  | timestamp   |
| created_at  | timestamp   |
| updated_at  | timestamp   |

## Tabel Chats

| Field       | Type        |
| ----------- | ----------- |
| id          | bigint      |
| sender_id   | foreign key |
| receiver_id | foreign key |
| message     | text        |
| is_read     | boolean     |
| created_at  | timestamp   |
| updated_at  | timestamp   |


# Alur Penggunaan Aplikasi

### 1. Registrasi dan Login

Pengguna membuat akun dan masuk ke dalam sistem.

↓

### 2. Melengkapi Profil

Pengguna mengisi informasi pribadi dan preferensi roommate.

↓

### 3. Membuat Iklan Roommate

Pengguna membuat postingan pencarian roommate.

↓

### 4. Mencari Roommate

Pengguna mencari roommate menggunakan fitur filter.

↓

### 5. Mengirim Permintaan Match

Pengguna mengirim match kepada roommate yang diminati.

↓

### 6. Proses Persetujuan Match

Penerima dapat menerima atau menolak permintaan tersebut.

↓

### 7. Memulai Chat

Apabila match diterima, kedua pengguna dapat mulai berkomunikasi.

↓

### 8. Menjadi Roommate

Pengguna dapat melanjutkan proses pencarian tempat tinggal bersama setelah menemukan kecocokan.


# Cara Menjalankan Proyek

## 1. Clone Repository



```bash

git clone https://github.com/username/RoomMatch.git

```



## 2. Masuk ke Folder Project



```bash

cd RoomMatch

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

DB_DATABASE=RoomMatch

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


# Teknologi yang Digunakan

## Backend

* Laravel 13
* PHP 8.3

## Frontend

* Blade Template Engine
* HTML5
* CSS3
* JavaScript

## Database

* MySQL

## Authentication

* Laravel Breeze

## Development Tools

* Composer
* Vite
* Laragon / XAMPP


# Screenshot tampilan aplikasi

## Dashboard
<img width="1600" height="900" alt="Dashboard" src="https://github.com/user-attachments/assets/90b6f9f2-fe28-425d-81c0-04b20a47082a" />

## Dashboard-Iklan
<img width="1600" height="900" alt="Dashboard-Iklan" src="https://github.com/user-attachments/assets/95bc343d-5eea-48f6-abfb-ca004d61c0ad" />

## Chat Room
<img width="1600" height="900" alt="Chat" src="https://github.com/user-attachments/assets/a3d9dab3-7ebe-4c01-8f28-89434be0b703" />

## Profile
<img width="1600" height="900" alt="Profile" src="https://github.com/user-attachments/assets/e03c3df0-d6ee-493d-8ef6-0d38a935f271" />


# Author

RoomMatch dikembangkan sebagai platform pencarian roommate yang menggabungkan sistem matching, komunikasi, dan manajemen profil dalam satu aplikasi. Proyek ini berfokus pada peningkatan pengalaman pengguna dalam menemukan teman sekamar yang sesuai melalui proses yang lebih terstruktur, aman, dan efisien. Dibuat oleh Kelompok 9 sebagai proyek akhir Mata Kuliah Pemrograman Berbasis Web. 
