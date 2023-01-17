# Laravel REST-API

Ini merupakan repository program **REST-API** yang dibuat menggunakan Framework **Laravel 9**. REST-API ini mendukung beberapa HTTP Request seperti **GET**, **POST**, **PUT**, dan **DELETE**. Data-data yang terdapat dalam REST-API ini berupa data surat dan data user.

### Cara Penginstallan

Clone repository program ini.
```
https://github.com/AlfitoDimasss/Laravel-Rest-API.git
```
Setelah berhasil, masuk ke folder tersebut dan ketikkan perintah ini di terminal.
```
composer update
```
Setelah proses selesai, salin isi file .env.example ke file .env
```
cp .env.example .env
```
Setelah itu atur variabel database seperti `DB_DATABASE`, `DB_USERNAME` sesuai dengan credential database yang dipakai pada file `.env`.

Setelah konfigurasi file `.env` selesai, maka lakukan migrasi tabel dan upload data ke dalam database menggunakan perintah berikut.
```
php artisan migrate:fresh --seed
```
Setelah selesai, maka jalankan program pada localhost dengan perintah berikut.
```
php artisan serve
```

### Cara Pemakaian
Mendapatkan semua data user.\
**GET** `http://localhost:8000/api/users/`

Mendapatkan data user tertentu.\
**GET** `http://localhost:8000/api/users/1`

Membuat data user baru.\
**POST** `http://localhost:8000/api/users/`

Memperbarui data user tertentu.\
**PUT** `http://localhost:8000/api/users/1`

Menghapus data user tertentu.\
**DELETE** `http://localhost:8000/api/users/1`