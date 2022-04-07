# Tentang Project
Project ini adalah project untuk website company profile dari cloudeka dengan alamat website cloudeka.id

# Minimum Requirement
- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Mysql
- Composer
- Node

# Installation
1. Extract/Clone Project dilokasi yang telah ditentukan

2. Setup database dari file database.sql yang telah disedikan

3. Copy .env.example to .env

4. Lakukan adjustment pada koneksi DATABASE, APP_URL dan MAIL

5. Install Composer Package (via terminal)
``` composer install ```

6. Generate Application Key (via terminal)
``` php artisan key:generate ```

7. Symlink Storage ke Public Storage (via terminal)
``` php artisan storage:link ```

8. Install NPM Package (via terminal)
``` npm install ```

9. ReGenerate Assets (via terminal)
``` npm run dev ```

# Run
``` php artisan serve ```

# Build
``` php artisan optimize ```
``` npm run prod ```

# How To
## Merubah CSS
Untuk melakukan perubahan CSS diwebsite ini dilarang keras melakukan perubahan langsung ke file /public/css/app.css , hal ini dikarenakan file tersebut merupakan hasil generate dari SCSS. Jadi jika melakukan perubahan pada file tersebut, maka setiap SCSS digenerate akan mengganti ulang isi seluruh file app.css tersebut.

Jika ingin melakukan penyesuaian CSS bisa dilakukan di /resources/sass/app.scss atau membuat file CSS baru yang terpisah dari sistem yang sudah ada.

# Documentation
- Laravel: https://laravel.com/docs
- AdminLte CMS Template: https://adminlte.io/themes/dev/AdminLTE/index3.html
- SCSS: https://sass-lang.com/guide