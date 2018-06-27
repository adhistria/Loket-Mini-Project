# Project Title

Loket Mini Project check it on * [AdhiMiniProject](https://adhiminiproject.000webhost.com) 

## Preresquites

* PHP 7.1
* Composer
* MySql

## How to Install
* Install Composer
```
composer install
```
* Buat database dengan nama 'loket' pada MySql, lalu ubah db_username dan db password sesuai komputer anda pada .env file
```
DB_DATABASE=loket
DB_USERNAME=your_root
DB_PASSWORD=yout_password
```
* Import database ke mysql atau ketikan command melalui terminal dengan command  
```
php artisan migrate
```
* Jalankan program
```
php artisan serve
```



