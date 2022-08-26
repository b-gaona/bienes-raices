<?php

use Controller\LoginController;
use Controller\PaginasController;
use MVC\Router;
use Controller\PropiedadController;
use Controller\VendedorController;

require_once __DIR__ . "/../includes/app.php";

$router = new Router();


/*
  Hacemos esto: [PropiedadController::class, 'index']
  Debido que para usar el call_user_func ocupamos el nombre de la clase o el nombre del objeto (en este caso usamos el nombre de la clase con el namespace Controller\PropiedadController) y el otro es la funcion a ejecutar, en este caso es index.
  De este modo le pasamos la direccion de donde se encuentra la función (el namespace), y el nombre de la función.
*/

//Ventana de administrador
$router->urlGet("/admin", [PropiedadController::class, 'index']);

//Agregar propiedades
$router->urlGet("/propiedades/crear", [PropiedadController::class, 'crear']);
$router->urlPost("/propiedades/crear", [PropiedadController::class, 'crear']);
//Agregar vendedores
$router->urlGet("/vendedores/crear", [VendedorController::class, 'crear']);
$router->urlPost("/vendedores/crear", [VendedorController::class, 'crear']);

//Actualizar o modificar propiedades
$router->urlGet("/propiedades/actualizar", [PropiedadController::class, 'actualizar']);
$router->urlPost("/propiedades/actualizar", [PropiedadController::class, 'actualizar']);
//Actualizar o modificar vendedores
$router->urlGet("/vendedores/actualizar", [VendedorController::class, 'actualizar']);
$router->urlPost("/vendedores/actualizar", [VendedorController::class, 'actualizar']);


//Eliminar propiedades
$router->urlGet("/propiedades/eliminar", [PropiedadController::class, 'eliminar']);
//Eliminar vendedores
$router->urlGet("/vendedores/eliminar", [PropiedadController::class, 'eliminar']);

//Paginas de la aplicacion
$router->urlGet("/", [PaginasController::class, 'index']);
$router->urlGet("/nosotros", [PaginasController::class, 'nosotros']);
$router->urlGet("/anuncios", [PaginasController::class, 'anuncios']);
$router->urlGet("/anuncio", [PaginasController::class, 'anuncio']);
$router->urlGet("/blog", [PaginasController::class, 'blog']);
$router->urlGet("/entrada", [PaginasController::class, 'entrada']);
$router->urlGet("/contacto", [PaginasController::class, 'contacto']);
$router->urlPost("/contacto", [PaginasController::class, 'contacto']);

//Login y autenticacion
$router->urlGet("/login", [LoginController::class, 'login']);
$router->urlPost("/login", [LoginController::class, 'login']);
$router->urlGet("/logout", [LoginController::class, 'logout']);

$router->comprobarRutas();
