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
* Abrir terminal y clonar la aplicación
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
* Creamos la base de datos Blogger en MYSQL
* En el archivo de .env ingresamos el nombre de la base de datos creada seguido del usuario y la contraseña para ingresar a MYSQL
* Realizamos las migraciones de la BD ejecutando
```
php artisan migrate
```
* Este comando deberá crear las tablas necesarias para la aplicación.
* Para ejecutar las pruebas automatizadas ejecutamos php artisan test
* Ahora ejecutamos el comando desde la terminal para iniciar el servidor y después abrir la ruta mostrada en la terminal
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
## api/logueo/signin
* Para probar la api de api/logueo/signin: ingresamos en insomia
```
http://localhost:8000/api/logueo/signin
```
* mandamos el siguiente formato json mediante el método POST
```
{
	"email":"miguel@gmail.com"
}
```
* Al enviar los datos nos mostrara en insomnia un mensaje de ok en caso contrario un mensaje de error.

## api/logueo/signout
* Para probar la api de api/logueo/signout: ingresamos en insomia
```
http://localhost:8000/api/logueo/signout
```
* mandamos el siguiente formato json mediante el método POST
```
{
    "email":"miguel@gmail.com"
}
```
* Al enviar los datos nos mostrará en insomnia un mensaje de ok, en caso contrario un mensaje de error.

## api/blogger/store
* Para probar la api de api/blogger/store: ingresamos en insomia
```
http://localhost:8000/api/blogger/store
```
* mandamos el siguiente formato json mediante el método POST
```
{
	"name":"Cristina",
	"email":"cristina@gmail.com",
	"website":"cristina.io",
	"picture_url":"https://cdn2.salud180.com/sites/default/files/styles/medium/public/field/image/2020/03/estas_son_las_caracteristicas_que_vuelven_a_una_mujer_irresistible_segun_ellos.jpg"
}
```
* Al enviar los datos nos mostrará en insomnia un mensaje de ok (Ingresado correctamente a la base de datos), en caso contrario un mensaje de error.

## api/blogger/list/{idUserAuth}
* Para probar la api de api/blogger/list/{idUserAuth}: ingresamos en insomia mediante el método GET
```
http://localhost:8000/api/blogger/list/1
```
* Al enviar los datos nos mostrará la información de todos los bloggers excepto el blogger con el ID 1 ({idUserAuth}), en caso contrario se mostrará un mensaje de error.

## api/blogger/profile/{id}
* Para probar la api de api/blogger/profile/{id}: ingresamos en insomia mediante el metodo GET
```
http://localhost:8000/api/blogger/profile/1
```
* Al enviar los datos nos mostrará la información del blogger con el ID 1 ({idUserAuth}), en caso contrario se mostrará un mensaje de error.

## api/blogger/favorite/{idUserAuth}
* Para probar la api de api/blogger/favorite/{idUserAuth}: ingresamos en insomia mediante el metodo GET
```
http://localhost:8000/api/blogger/favorite/1
```
* Al enviar los datos nos mostrará los ID de los bloggers favoritos del ID 1 ({idUserAuth}), en caso contrario se mostrará un mensaje de error.

## api/blogger/addFriend
* Para probar la api de api/blogger/addFriend: ingresamos en insomia
```
http://localhost:8000/api/blogger/addFriend
```
* mandamos el siguiente formato json mediante el método POST
```
{
	"id_blogger":1,
	"id_friend":2
}
```
* Al enviar los datos nos mostrará un mensaje de status 200 (Nuevo friend añadido a la base de datos), en caso contrario se mostrará un mensaje de error.

## api/blogger/deleteFriend
* Para probar la api de api/blogger/deleteFriend: ingresamos en insomia
```
http://localhost:8000/api/blogger/deleteFriend
```
* mandamos el siguiente formato json mediante el método POST
```
{
	"id_blogger":1,
	"id_friend":2
}
```
* Al enviar los datos nos mostrará un mensaje de status 200 (Friend eliminado de la base de datos), en caso contrario se mostrará un mensaje de error.

## api/blogger/search
* Para probar la api de api/blogger/search: ingresamos en insomia
```
http://localhost:8000/api/blogger/search
```
* mandamos el siguiente formato json mediante el método POST
```
{
	"search":"miguel.io"
}
```
* Al enviar los datos nos mostrará un mensaje de status 200 con la información del usuario buscado, en caso contrario se mostrará un mensaje de error.

# HEROKU link
```
https://arcane-spire-03179.herokuapp.com/
```