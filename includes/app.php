<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarnos a la bd
$db = conectarDB();

use Model\Main;

//De este modo instanciamos a la clase de Main la BD, no a un objeto, a toda la clase, de modo que en cualquier objeto de la clase que se cree, va a tener la misma conexion a la BD. Este es un muy buen uso de los metodos estaticos en una clase.
Main::setDB($db);
