<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class VendedorController
{
  //Son funciones estaticas para no tener que instanciar el objeto

  //Crear propiedad
  public static function crear(Router $router)
  {
    $vendedor = new Vendedor($_POST);
    $vendedores = Vendedor::all();
    $success =  null;

    if (isset($_GET["suc"]) && $_GET["suc"] == "1") {
      $success = "El vendedor se ha registrado exitosamente";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $flag = $vendedor->validar();

      if ($flag == "validated") {
        $vendedor->crear();
      }
    }

    $router->render("vendedores/crear", [
      "vendedor" => $vendedor,
      "vendedores" => $vendedores,
      "success" => $success
    ]);
  }

  //Actualizar o modificar propiedad
  public static function actualizar(Router $router)
  {
    $vendedores = Vendedor::all();
    $vendedor = null;
    $success = null;
    $flag = null;
    $id = null;

    if (isset($_GET["id"])) {
      $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
      if ($id) {
        $vendedor = Vendedor::find($id);
        if (!$vendedor->getId()) {
          header("Location: /public/admin");
        }
      } else {
        header("Location: /public/admin");
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //Establecemos los atributos de la propiedad general, sin importar si tiene imagen o no
      $vendedor->setNombre($_POST["nombre"]);
      $vendedor->setApellido($_POST["apellido"]);
      $vendedor->setTelefono($_POST["telefono"]);

      $flag = $vendedor->validar();

      if ($flag == "validated") {
        $resultado = $vendedor->modificar();
        if ($resultado) {
          $success = "Los datos del vendedor se han modificado correctamente";
        }
      }
    }
    $router->render("vendedores/actualizar", [
      "vendedores" => $vendedores,
      "vendedor" => $vendedor,
      "success" => $success,
      "flag" => $flag,
      "id" => $id
    ]);
  }
}
