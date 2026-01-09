# Website Perhotelan ROOMIFY

ROOMIFY adalah website yang mempermudah pengguna dalam
menejemen sebuah hotel dan memesan hotel tanpa harus datang ke
lokasi hotel, hanya dengan menggunakan website ini pengguna bisa melakukan
manajemen hotel ataupun memesan hotel dimanapun dan kapanpun.

## Cara Pemakaian

- jalankan ``` composer install ```di terminal kalian.
- jalankan ``` npm install ``` di terminal kalian.
- buat file .env lalu copy yang ada di .env.example lalu ubah isinya pada bagian DB_CONNECTION ubah menjadi mysql dan pada bagian DB_DATABASE ubah juga nama database sesuai dengan yang kalian pakai, lalu jangan lupa uncomment semua bagian tersebut agar bisa terhubung dengan database yang kalian miliki.
- jalankan ``` php artisan key:generate ``` di terminal.
- jalankan ``` composer require blade-ui-kit/blade-icons ``` di terminal
- jalankan ``` composer require blade-ui-kit/blade-heroicons ``` di terminal
- jalankan ``` composer require davidhsianturi/blade-bootstrap-icons ``` di terminal
- sebelum kalian menjalankan web ini kalian harus melakukan ``` php artisan migrate ``` dan ``` php artisan db:seed ``` terlebih dahulu.
- jika ingin menjalankan web ini kalian harus menjalankan dua terminal, terminal yang pertama kalian jalankan ``` php artisan serve ``` lalu terminal yang kedua kalian jalankan ``` npm run dev ``` .


## Tech Stack

- Laravel
- Tailwind CSS
- Alpine.js
- MySQL
- Filament Admin Panel
- Vite


# Fitur - fitur


## Fitur Pengguna (User)
- Registrasi dan login pengguna
- Melihat daftar hotel
- Melihat detail hotel dan kamar
- Melakukan pemesanan kamar hotel
- Mengisi data pemesanan (check-in dan check-out)
- Melihat riwayat pemesanan
- Melihat detail invoice pemesanan
- Melakukan pembayaran dengan status (pending / paid)

## Fitur Admin
- Login admin
- Manajemen data hotel
- Manajemen data kamar
- Manajemen data booking
- Manajemen data pembayaran
- Pembuatan dan pengelolaan invoice
- Pengelolaan status booking dan pembayaran
- Dashboard admin menggunakan Filament

## Fitur Sistem
- Sistem autentikasi dan otorisasi
- Relasi database (hotel, room, booking, payment, invoice)
- Validasi input form
- Penyimpanan data menggunakan database MySQL
- Dibangun menggunakan framework Laravel

### Susunan Tim

NIM        | Nama            | Username Github
-----------|-----------------| ---------------
607062400048 | Ihsan Faiz | IhsanFaiz
