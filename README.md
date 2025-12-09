# Website Perhotelan

Website Perhotelan adalah website yang mempermudah pengguna dalam
menejemen sebuah hotel dan memesan hotel tanpa harus datang ke
lokasi hotel, hanya dengan menggunakan website ini pengguna bisa melakukan
manajemen hotel ataupun memesan hotel dimanapun dan kapanpun.

## Cara Pemakaian

- jalankan ```
bash composer install 
```di terminal kalian.
- jalankan ```bash 
npm install 
``` di terminal kalian.
- buat file .env lalu copy yang ada di .env.example lalu ubah isinya pada bagian DB_CONNECTION ubah menjadi mysql dan pada bagian DB_DATABASE ubah juga nama database sesuai dengan yang kalian pakai, lalu jangan lupa uncomment semua bagian tersebut agar bisa terhubung dengan database yang kalian miliki.
- jalankan ```bash 
php artisan key:generate 
``` di terminal.
- jalankan ```bash composer require blade-ui-kit/blade-icons ``` di terminal
- jalankan ```bash composer require blade-ui-kit/blade-heroicons ``` di terminal
- jalankan ```bash composer require davidhsianturi/blade-bootstrap-icons ``` di terminal
- sebelum kalian menjalankan web ini kalian harus melakukan ```bash php artisan migrate ``` dan ```bash php artisan db:seed ``` terlebih dahulu.
- jika ingin menjalankan web ini kalian harus menjalankan dua terminal, terminal yang pertama kalian jalankan ```bash php artisan serve ``` lalu terminal yang kedua kalian jalankan ```bash npm run dev ``` .


## Fitur
- lorem
- lorem
- lorem

### Susunan Tim

NIM        | Nama            | Username Github
-----------|-----------------| ---------------
607062400048 | Ihsan Faiz | IhsanFaiz
607062400028 | Nabila Khairunnisa | nblkhainns
607062400078 | Fitri Nurhidayat | fitrihdyt
607062400105 | Baiq Izza Aziza | usernameMhs4
6070624000xx | Nama Mahasiswa5 | usernameMhs5
6070624000xx | Nama Mahasiswa6 | usernameMhs6