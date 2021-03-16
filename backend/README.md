<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>

# Desafio Back-end
_ API REST básica para administrar sus bloggers favoritos_
* Agrega un nuevo bloguero con su información.
* Ver una lista de sus bloggers favoritos.
* Asociar blogueros entre sí.
* Funcionalidad de búsqueda básica.

## Requisitos
* Wamp server 3.1.9
* PHP 7.2.18
* MYSQL 5.7.26
* Composer

## Instalación
* Ejecutar Wamp server
* Dirigirse a la carpeta de www de wamp server
```
C:\wamp64\www
```
* Abrir terminal y clonar la aplicacion
```
git clone https://github.com/migueled/backend-challenge.git
```
* Ingresar a la carpeta del proyecto y ejecutar
```
composer install
```
Esto te descargará e instalará las dependencias utilizadas por el proyecto. 
* Situados en la carpeta desde la terminal ejecutamos
```
cp .env.example .env
```
* Generar la APP_KEY del proyecto ejecutando el siguiente comando
```
php artisan key:generate
```
* Ahora ejecuta el comando desde la terminal para iniciar el servidor y despues abrir la ruta mostrada en la terminal
```
php artisan serve
```