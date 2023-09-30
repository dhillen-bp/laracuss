# CARA DEPLOY LARAVEL KE COMPUTE ENGINE GCP

## Buat Instance VM dan Install Dependencies
### 1. Buat instance VM 
Buka console google cloud `https://console.cloud.google.com/` dan masuk ke Compute Engine➡️Create Instance dan setting sesuai kebutuhan. Lalu pastikan centang “**Allow HTTP dan HTTPS traffic**”. Pada contoh menggunakan region: us-central, machine-type: e2-micro dan boot disk image: Ubuntu 20.04 LTS.
![Create VM Instance](https://eastus1-mediap.svc.ms/transform/thumbnail?provider=spo&inputFormat=png&cs=MDAwMDAwMDAtMDAwMC0wMDAwLTAwMDAtMDAwMDQ4MTcxMGE0fFNQTw&docid=https%3A%2F%2Fmy%2Emicrosoftpersonalcontent%2Ecom%2F%5Fapi%2Fv2%2E0%2Fdrives%2Fb%214doCrlUHlU%2Dn1B7glQA1HcM2RGlA3VJAlAK02tUza5cVAeAuSw0WRriOSfzPtQjG%2Fitems%2F01CKE4TIHLPKYVE5TTJJD3PNANCRFJYQCH%3Ftempauth%3DeyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9%2EeyJhdWQiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAvbXkubWljcm9zb2Z0cGVyc29uYWxjb250ZW50LmNvbUA5MTg4MDQwZC02YzY3LTRjNWItYjExMi0zNmEzMDRiNjZkYWQiLCJpc3MiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAiLCJuYmYiOiIxNjk2MDMyMDAwIiwiZXhwIjoiMTY5NjA1MzYwMCIsImVuZHBvaW50dXJsIjoiQk1BWjhhNjBjT0svOVduUmk4MGdEaFArVjhnbkYreTI3aklTcmZXdXE5dz0iLCJlbmRwb2ludHVybExlbmd0aCI6IjE2NCIsImlzbG9vcGJhY2siOiJUcnVlIiwidmVyIjoiaGFzaGVkcHJvb2Z0b2tlbiIsInNpdGVpZCI6IllXVXdNbVJoWlRFdE1EYzFOUzAwWmprMUxXRTNaRFF0TVdWbE1EazFNREF6TlRGayIsImFwcF9kaXNwbGF5bmFtZSI6IkNvbnN1bWVyIEFwcDogMDAwMDAwMDAtMDAwMC0wMDAwLTAwMDAtMDAwMDQ4MTcxMGE0IiwiYXBwaWQiOiIwMDAwMDAwMC0wMDAwLTAwMDAtMDAwMC0wMDAwNDgxNzEwYTQiLCJ0aWQiOiI5MTg4MDQwZC02YzY3LTRjNWItYjExMi0zNmEzMDRiNjZkYWQiLCJ1cG4iOiJsZW5vdm9wY2lkLjduOHpAb3V0bG9vay5jb20iLCJwdWlkIjoiMDAwMzdGRkU0ODgyM0NDQSIsImNhY2hla2V5IjoiMGguZnxtZW1iZXJzaGlwfDAwMDM3ZmZlNDg4MjNjY2FAbGl2ZS5jb20iLCJzY3AiOiJhbGxzaXRlcy5mdWxsY29udHJvbCIsInNpZCI6IjEyMTE4OTc2NDE5MTEwODIwNDk2IiwidHQiOiIyIiwiaXBhZGRyIjoiMTI1LjE2Ni4xNzQuNTgifQ%2EfO%5FxjLGA1jFakdin2cHFqoIUkHqV5ixjPYpkWzHqRuQ%26version%3DPublished&cb=63831591724&encodeFailures=1&width=1046&height=548)

### 2. Buka ssh pada instance yang telah dibuat.
![OpenSSH](https://eastus1-mediap.svc.ms/transform/thumbnail?provider=spo&inputFormat=png&cs=MDAwMDAwMDAtMDAwMC0wMDAwLTAwMDAtMDAwMDQ4MTcxMGE0fFNQTw&docid=https%3A%2F%2Fmy%2Emicrosoftpersonalcontent%2Ecom%2F%5Fapi%2Fv2%2E0%2Fdrives%2Fb%214doCrlUHlU%2Dn1B7glQA1HcM2RGlA3VJAlAK02tUza5cVAeAuSw0WRriOSfzPtQjG%2Fitems%2F01CKE4TIETRU66JINMORELLQ536ZW3ZEF5%3Ftempauth%3DeyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9%2EeyJhdWQiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAvbXkubWljcm9zb2Z0cGVyc29uYWxjb250ZW50LmNvbUA5MTg4MDQwZC02YzY3LTRjNWItYjExMi0zNmEzMDRiNjZkYWQiLCJpc3MiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAiLCJuYmYiOiIxNjk2MDMyMDAwIiwiZXhwIjoiMTY5NjA1MzYwMCIsImVuZHBvaW50dXJsIjoidzdJRUErSDJRWXpJNVB4Z3FaQXdwckZPRE1wS2NvYnJCRkxYQ2EveUR4ST0iLCJlbmRwb2ludHVybExlbmd0aCI6IjE2NCIsImlzbG9vcGJhY2siOiJUcnVlIiwidmVyIjoiaGFzaGVkcHJvb2Z0b2tlbiIsInNpdGVpZCI6IllXVXdNbVJoWlRFdE1EYzFOUzAwWmprMUxXRTNaRFF0TVdWbE1EazFNREF6TlRGayIsImFwcF9kaXNwbGF5bmFtZSI6IkNvbnN1bWVyIEFwcDogMDAwMDAwMDAtMDAwMC0wMDAwLTAwMDAtMDAwMDQ4MTcxMGE0IiwiYXBwaWQiOiIwMDAwMDAwMC0wMDAwLTAwMDAtMDAwMC0wMDAwNDgxNzEwYTQiLCJ0aWQiOiI5MTg4MDQwZC02YzY3LTRjNWItYjExMi0zNmEzMDRiNjZkYWQiLCJ1cG4iOiJsZW5vdm9wY2lkLjduOHpAb3V0bG9vay5jb20iLCJwdWlkIjoiMDAwMzdGRkU0ODgyM0NDQSIsImNhY2hla2V5IjoiMGguZnxtZW1iZXJzaGlwfDAwMDM3ZmZlNDg4MjNjY2FAbGl2ZS5jb20iLCJzY3AiOiJhbGxzaXRlcy5mdWxsY29udHJvbCIsInNpZCI6IjEyMTE4OTc2NDE5MTEwODIwNDk2IiwidHQiOiIyIiwiaXBhZGRyIjoiMTI1LjE2Ni4xNzQuNTgifQ%2E9WYfjQCqKWiIf0h79CIAUVghgBJ6Q%2DVAnfFw64ZD7e0%26version%3DPublished&cb=63831591905&encodeFailures=1&width=1046&height=543)

### 3. Install dan setting UFW
```
sudo apt-get update 
sudo apt-get install ufw
```
- Lalu konfigurasi untuk mengizinkan OpenSSH, dan aktifkan ufw
    ```
    sudo ufw allow OpenSSH
    sudo ufw enable
    sudo ufw status
    ```

### 4. Install webserver nginx, tambahkan rule ufw dan periksa statusnya
```
sudo apt install nginx
sudo ufw allow 'Nginx HTTP'
sudo service nginx status
```

### 5. Install mysql-server
```
sudo apt install mysql-server
```
### 6. Install dependencies php 
```
sudo add-apt-repository ppa:ondrej/php
sudo apt install php8.1-fpm php-mysql
sudo apt install php-mbstring php-xml php-bcmath
sudo apt install php-cli unzip
```

### 7. Install Composer
- Sebelum install composer itu perlu mengubah file php.ini untuk mencegah error di composer. Pertama cek lokasi php.ini
    ```
    php -i | grep 'php.ini'
    ```
- Buka file php.ini dan ubah  `default_socket_timeout = 60` menjadi 360
    ```
    sudo nano /etc/php/8.2/cli/php.ini
    ```
- Install composer nya
    ```
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    
    php composer-setup.php
    
    php -r "unlink('composer-setup.php');"
    ```
- Agar bisa memanggil composer secara global
    ```
    sudo mv composer.phar /usr/local/bin/composer
    ```
    
### 8. Install node dan periksa node yang terinstall
```
curl -s https://deb.nodesource.com/setup_18.x | sudo bash
sudo apt install nodejs -y
node -v
```

### 9. Buat database dan buat user
```
sudo mysql -u root -p
CREATE DATABASE laracuss_db;
CREATE USER 'kilua'@'localhost' IDENTIFIED BY 'ini_password';
GRANT ALL PRIVILEGES ON *.* TO 'kilua'@'localhost' WITH GRANT OPTION;
```
### 10. Clone repo ke server
```
cd /var/www
sudo git clone https://github.com/dhillen-bp/laracuss.git laracuss
```

## Konfigurasi web server
### 1. Clone repo ke server
- masuk ke direktori project
`cd /var/www/laracuss`
- Clone repo
    ```
    composer install --no-dev --optimize-autoloader
    ```
    > Jika masih megalami error: `/var/wwww/laracuss/vendor does not exist and could not be created`, perlu Mengatur Hak Akses Direktori.
- Memasukkan User ke dalam Grup www-data
    ```
    `sudo usermod -a -G www-data `whoami`
    ```
- Mengubah kepemilikan folder /var/www menjadi root:root (superuser).
    ```
    sudo chown root:root /var/www
    ```
-  Memberikan izin yang tepat untuk folder /var/www (755 berarti pemilik memiliki semua hak akses, sedangkan grup dan publik memiliki izin read dan write).
    ```
    sudo chmod 755 /var/www
    ```
- Mengubah kepemilikan seluruh isi dari folder proyek Laravel laracuss menjadi www-data:www-data.
    ```
    sudo chown -R www-data:www-data /var/www/laracuss
    ```
- Memberikan izin pada seluruh isi dari folder proyek Laravel laracuss (774 berarti pemilik dan grup memiliki hak akses penuh, sedangkan publik memiliki izin read dan execute).
    ```
    sudo chmod -R 774 /var/www/laracuss
    ```
    > Jika masih megalami masalah yang sama: Close terminal ssh, buka session ssh baru.
### 2. Setting nginx agar bisa dibuka
- Masuk ke direktori ini
`cd /etc/nginx/sites-available`
- Buat konfigurasi baru untuk situs Laravel dengan nama **laracuss**
`sudo nano laracuss`
- Paste kan code ini
    ```
    server { 
        listen 80; 
        # server_name _; 
        root /var/www/laracuss/public;  # alamat-project/public
     
        add_header X-Frame-Options "SAMEORIGIN"; 
        add_header X-XSS-Protection "1; mode=block"; 
        add_header X-Content-Type-Options "nosniff"; 
     
        index index.html index.htm index.php; 
     
        charset utf-8; 
     
        location / { 
            try_files $uri $uri/ /index.php?$query_string; 
        } 
     
        location = /favicon.ico { access_log off; log_not_found off; } 
        location = /robots.txt  { access_log off; log_not_found off; } 
     
        error_page 404 /index.php; 
     
    location ~ \.php$ { 
            fastcgi_pass unix:/var/run/php/php8.1-fpm.sock; 
            fastcgi_index index.php; 
            fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name; 
            include fastcgi_params; 
        } 
     
        location ~ /\.(?!well-known).* { 
            deny all; 
        } 
    }
    ```
- Pindah ke direktori ini yang berisi konfigurasi situs yang diaktifkan (enabled) di Nginx.
`cd ../sites-enabled`
- Membuat semacam symlink pada direktori sites-enabled agar bisa mengakses 
`sudo ln -s /etc/nginx/sites-available/laracuss /etc/nginx/sites-enabled`
- Menghapus konfigurasi default
`sudo rm default`
- Memeriksa apakah konfigurasi Nginx saat ini valid atau tidak.
`sudo nginx -t`
- Restart nginx
`sudo service nginx restart`

### 3. Tambahkan dan konfigurasi.env
- Masuk ke directory project, buat .env lalu pastekan dari .env lokal dan konfigurasi lagi
`sudo nano .env`
- Jalankan migrasi database
`php artisan migrate --seed`

### 4. Build frontend
```
npm install
npm run build
```
### 5. Jika mengalami Error: could not find driver (Connection: mysql, SQL: ...)
![Error: could not find driver((Connection: mysql)](https://eastus1-mediap.svc.ms/transform/thumbnail?provider=spo&inputFormat=png&cs=MDAwMDAwMDAtMDAwMC0wMDAwLTAwMDAtMDAwMDQ4MTcxMGE0fFNQTw&docid=https%3A%2F%2Fmy%2Emicrosoftpersonalcontent%2Ecom%2F%5Fapi%2Fv2%2E0%2Fdrives%2Fb%214doCrlUHlU%2Dn1B7glQA1HcM2RGlA3VJAlAK02tUza5cVAeAuSw0WRriOSfzPtQjG%2Fitems%2F01CKE4TIEGEFQZJQY775H2V6FREEUMCSFS%3Ftempauth%3DeyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9%2EeyJhdWQiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAvbXkubWljcm9zb2Z0cGVyc29uYWxjb250ZW50LmNvbUA5MTg4MDQwZC02YzY3LTRjNWItYjExMi0zNmEzMDRiNjZkYWQiLCJpc3MiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAiLCJuYmYiOiIxNjk2MDMyMDAwIiwiZXhwIjoiMTY5NjA1MzYwMCIsImVuZHBvaW50dXJsIjoiYmhQWlQ4V0FZa1NxclRLN2NYdDA0Vmw4c1hiUEEwQWNuTjN6RzduMW5ubz0iLCJlbmRwb2ludHVybExlbmd0aCI6IjE2NCIsImlzbG9vcGJhY2siOiJUcnVlIiwidmVyIjoiaGFzaGVkcHJvb2Z0b2tlbiIsInNpdGVpZCI6IllXVXdNbVJoWlRFdE1EYzFOUzAwWmprMUxXRTNaRFF0TVdWbE1EazFNREF6TlRGayIsImFwcF9kaXNwbGF5bmFtZSI6IkNvbnN1bWVyIEFwcDogMDAwMDAwMDAtMDAwMC0wMDAwLTAwMDAtMDAwMDQ4MTcxMGE0IiwiYXBwaWQiOiIwMDAwMDAwMC0wMDAwLTAwMDAtMDAwMC0wMDAwNDgxNzEwYTQiLCJ0aWQiOiI5MTg4MDQwZC02YzY3LTRjNWItYjExMi0zNmEzMDRiNjZkYWQiLCJ1cG4iOiJsZW5vdm9wY2lkLjduOHpAb3V0bG9vay5jb20iLCJwdWlkIjoiMDAwMzdGRkU0ODgyM0NDQSIsImNhY2hla2V5IjoiMGguZnxtZW1iZXJzaGlwfDAwMDM3ZmZlNDg4MjNjY2FAbGl2ZS5jb20iLCJzY3AiOiJhbGxzaXRlcy5mdWxsY29udHJvbCIsInNpZCI6IjEyMTE4OTc2NDE5MTEwODIwNDk2IiwidHQiOiIyIiwiaXBhZGRyIjoiMTI1LjE2Ni4xNzQuNTgifQ%2EeXBFEhxxUx6n%5Fe%2DUkigDu3P0DMBS6NyInB4d6HTrJ6Y%26version%3DPublished&cb=63831636431&encodeFailures=1&width=1281&height=595)
- Periksa dimana letak file php.ini
`php -i | grep 'php.ini'`
- Mengubah extension pdo_mysql dan mysqli di php.ini menjadi aktif dengan cara menghapus `;` di depan
![Enable extension mysqli at php.ini](https://eastus1-mediap.svc.ms/transform/thumbnail?provider=spo&inputFormat=png&cs=MDAwMDAwMDAtMDAwMC0wMDAwLTAwMDAtMDAwMDQ4MTcxMGE0fFNQTw&docid=https%3A%2F%2Fmy%2Emicrosoftpersonalcontent%2Ecom%2F%5Fapi%2Fv2%2E0%2Fdrives%2Fb%214doCrlUHlU%2Dn1B7glQA1HcM2RGlA3VJAlAK02tUza5cVAeAuSw0WRriOSfzPtQjG%2Fitems%2F01CKE4TIFEQBAJ4OBHABFYESDJOPRS2UES%3Ftempauth%3DeyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9%2EeyJhdWQiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAvbXkubWljcm9zb2Z0cGVyc29uYWxjb250ZW50LmNvbUA5MTg4MDQwZC02YzY3LTRjNWItYjExMi0zNmEzMDRiNjZkYWQiLCJpc3MiOiIwMDAwMDAwMy0wMDAwLTBmZjEtY2UwMC0wMDAwMDAwMDAwMDAiLCJuYmYiOiIxNjk2MDMyMDAwIiwiZXhwIjoiMTY5NjA1MzYwMCIsImVuZHBvaW50dXJsIjoiallVUVIxOWdRKzQ2SXlYUnNYRG9FWTMwaklyRHM3RTcvZEo2Yk4rZzY0bz0iLCJlbmRwb2ludHVybExlbmd0aCI6IjE2NCIsImlzbG9vcGJhY2siOiJUcnVlIiwidmVyIjoiaGFzaGVkcHJvb2Z0b2tlbiIsInNpdGVpZCI6IllXVXdNbVJoWlRFdE1EYzFOUzAwWmprMUxXRTNaRFF0TVdWbE1EazFNREF6TlRGayIsImFwcF9kaXNwbGF5bmFtZSI6IkNvbnN1bWVyIEFwcDogMDAwMDAwMDAtMDAwMC0wMDAwLTAwMDAtMDAwMDQ4MTcxMGE0IiwiYXBwaWQiOiIwMDAwMDAwMC0wMDAwLTAwMDAtMDAwMC0wMDAwNDgxNzEwYTQiLCJ0aWQiOiI5MTg4MDQwZC02YzY3LTRjNWItYjExMi0zNmEzMDRiNjZkYWQiLCJ1cG4iOiJsZW5vdm9wY2lkLjduOHpAb3V0bG9vay5jb20iLCJwdWlkIjoiMDAwMzdGRkU0ODgyM0NDQSIsImNhY2hla2V5IjoiMGguZnxtZW1iZXJzaGlwfDAwMDM3ZmZlNDg4MjNjY2FAbGl2ZS5jb20iLCJzY3AiOiJhbGxzaXRlcy5mdWxsY29udHJvbCIsInNpZCI6IjEyMTE4OTc2NDE5MTEwODIwNDk2IiwidHQiOiIyIiwiaXBhZGRyIjoiMTI1LjE2Ni4xNzQuNTgifQ%2EW9lUyDGJwImZ8mY5febNVraupPbtww2bYpZwW8a0aWA%26version%3DPublished&cb=63831637197&encodeFailures=1&width=1366&height=595)
    > Dan pastikan sudah menginstall php-mysql `sudo apt-get install php8.1-mysql`
