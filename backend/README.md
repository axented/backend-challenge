<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>

# Desafio Back-end
_API REST básica para administrar sus bloggers favoritos_
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
* Ingresar a la carpeta del proyecto y ejecutar desde la terminal
```
composer install
```
_Esto descargará e instalará las dependencias utilizadas por el proyecto_
* Situados en la carpeta desde la terminal ejecutamos
```
cp .env.example .env
```
* Generamos la APP_KEY del proyecto ejecutando el siguiente comando
```
php artisan key:generate
```
* Ahora ejecutamos el comando desde la terminal para iniciar el servidor y despues abrir la ruta mostrada en la terminal
```
php artisan serve
```

## Uso
## Requisitos
* Insomnia
* Google Chrome
## Instrucciones
Consumimos las apis generadas en el proyecto usando insomina, ingresando la ruta generada al ejecutar php artisan serve, por lo general nos da la ruta de:
```
http://localhost:8000
```
_ejemplo de uso con insomnia_
## api/logueo/signin
_Para probar la api de api/logueo/signin: ingresamos en insomia_
```
http://localhost:8000/api/logueo/signin
```
_mandamos el siguiente formato json mediante el metodo POST_
```
{
	"email":"miguel@gmail.com"
}
```