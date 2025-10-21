# Requirements

A. PHP 8+
B. MySQL or MariaDB
C. Composer
D. (Untuk Pengetesa) Postman / Insomnia / Thunderclient

# Cara Install

**PERHATIAN**

PASTIKAN database sudah dibuat (dengan nama sesukamu) sebelum menjalankan tutorial dibawah

1. Clone atau Download repo ini
2. Install Dependency di dalam project menggunakan command
    ```
    composer install
    ```
3. Copas file `.env.example` dan rubah file yang diduplikat menjadi `.env`, selanjutnya rubah nama database menggunakan database yang sebelumnya kamu buat dan server ip, username, password, port untuk database jika di pcmu menggunakan konfigurasi kustom.

4. Rebuild `APP_KEY` (Untuk Production diwajibkan untuk menyimpan `APP_KEY` di .env untuk menghindari error karena metode enkripsi) dengan command
    ```
    php artisan key:generate
    ```
5. Ekspor tabel ke database menggunakan command ini
   ```
   php artisan migrate
   ```
6. Jalankan project menggunakan xampp / wampp menggunakan virtual host **atau** dengan command dibawah
    ```
    php artisan serve
    ```
    Note: Untuk yang menjalankan project menggunakan `php artisan` jika project ingin diakses diluar localhost maka kamu bisa mengubah file .env pada properti `APP_URL` atau bisa dilakukan dengan command
    ```
    php artisan serve --host 192.x.x.x --port 8000
    ```
    port 8000 bisa diubah dengan angka lain selama port tersebut masih belum dipakai
7. Selesai

pada project ini hanya ada dua rute API yang bisa diakses:

`POST: /newProduct` 
`GET: /getProducts` 

untuk mengetes kedua rute ini bisa menggunakan alat pengetesan yang sudah disebutkan di requirements
