<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Model\Admin;

class LoginController
{
  //Son funciones estaticas para no tener que instanciar el objeto

  public static function login(Router $router)
  {
    $flag = null;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $auth = new Admin($_POST);
      $flag = $auth->validar();
    }

    $router->render("auth/login", [
      "flag" => $flag
    ]);
  }

  public static function logout(Router $router)
  {
    session_start();
    $_SESSION = [];

    header("Location: /public/");
  }
}
