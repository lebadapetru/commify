<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Running the project

- Prerequisites: linux based OS or wsl and docker ( docker compose )
- Download the project
- Run the following in the project root to install the project: ``docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v "$(pwd):/var/www/html" \
  -w /var/www/html \
  laravelsail/php83-composer:latest \
  composer install --ignore-platform-reqs`` (this works only for linux based OS or if you have WSL for windows)
- ``sail php artisan migrate``
- ``sail php artisan breeze:install``
- ``sail php artisan migrate --seed``
- ``sail npm install``
- ``sail php artisan serve``
- ``sail npm run dev``
- Navigate to ``http://localhost:80``
- Optionally you can run the tests ``sail php artisan test`` ( there's just a unit test)
- That's about it, if i forgot anything or something isn't working, please feel free to give me message.

