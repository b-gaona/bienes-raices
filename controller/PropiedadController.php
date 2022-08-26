<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController
{
  //Son funciones estaticas para no tener que instanciar el objeto

  //Ventana de administrador principal
  public static function index(Router $router)
  {
    //Poniendo ese parametro recibe el mismo objeto de tipo router que se hizo en el renglon 8 de index.php. No se ocupa mandar como parametro en la funcion, es identificado por automatico. De este modo lo que logramos es que el mismo router que le hablo a esta función haga el render hacia la dirección

    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    $success = null;

    if (isset($_GET["suc"])) {
      if ($_GET["suc"] == "1") {
        $success = "Propiedad eliminada correctamente";
      }
      if ($_GET["suc"] == "2") {
        $success = "Vendedor eliminado correctamente";
      }
    }

    $router->render("propiedades/admin", [
      "propiedades" => $propiedades,
      "vendedores" => $vendedores,
      "success" => $success
    ]);
  }

  //Crear propiedad
  public static function crear(Router $router)
  {
    $propiedad = new Propiedad($_POST);
    $vendedores = Vendedor::all();
    $flag = null;
    $success = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $imagen = $_FILES["imagen"]; //Se llama imagen por el name del formulario

      //Obtenemos el tipo de formato de la imagen
      $extensionImagen = explode(".", $imagen["name"]); //Explode es como un split y en obtiene el ultimo elemento del arreglo
      $extensionImagen = end($extensionImagen); //End obtiene el ultimo elemento del arreglo

      //Generar un nombre único, se utiliza el md5 para generar un hash teniendo un unique id (irrepetible)
      $nombreImagen = md5(uniqid(rand(), true)) . "." . $extensionImagen;

      if (!$imagen["size"] == 0) { //Si es que si hay una imagen
        //Insertamos la imagen de la propiedad con el nombre obtenido anteriormente
        $propiedad->setImagen($nombreImagen);
      }

      //Validamos todos los campos, longitudes, etc de la propiedad
      $flag = $propiedad->validar($imagen);

      if ($flag == "validated") {

        //Crear la carpeta para subir las imagenes
        $carpetaImagenes = $_SERVER["DOCUMENT_ROOT"] . '/public/imagenes/';

        if (!is_dir($carpetaImagenes)) { //Si no existe aun, se va a crear
          mkdir($carpetaImagenes);
        }

        //Obtiene la direccion nueva
        $direccionNueva = "{$carpetaImagenes}/{$nombreImagen}";

        //Aquí lo que accemos es acceder a la imagen que tiene el cliente (en su disco local) con ["tmp_name"] y la guardaremos en la direccion nueva que es la de VSC.
        move_uploaded_file($imagen["tmp_name"], $direccionNueva);

        //Insertar a la base de datos
        $propiedad->crear();
      }
    }

    if (isset($_GET["suc"]) && $_GET["suc"] == "1") {
      $success = "La propiedad se ha registrado exitosamente";
    }

    $router->render("propiedades/crear", [
      "propiedad" => $propiedad,
      "vendedores" => $vendedores,
      "flag" => $flag,
      "success" => $success
    ]);
  }

  //Actualizar o modificar propiedad
  public static function actualizar(Router $router)
  {
    $flag = null;
    $success = null;
    $vendedores = Vendedor::all(); //Consulta para obtener los vendedores y rellenar el select

    if (isset($_GET["id"])) {
      $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
      //Si el id es un numero (validado en el renglon de arriba)
      if ($id) {
        $propiedad = Propiedad::find($id);
        if ($propiedad->getId()) { //Si es que si existe el id y se puede obtener
          $nombreImagen = $propiedad->getImagen();
          $imagenAnterior = $nombreImagen;
        } else {
          header("Location: /admin");
        }
      } else {
        header("Location: /admin");
      }
    }

    //Si la pagina es POST: Ejecutar el código despues de que el usuario envia el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $imagen = $_FILES["imagen"]; //Se llama imagen por el name del formulario

      //Establecemos los atributos de la propiedad general, sin importar si tiene imagen o no
      $propiedad->setTitulo($_POST["titulo"]);
      $propiedad->setPrecio($_POST["precio"]);
      $propiedad->setDescripcion($_POST["descripcion"]);
      $propiedad->setHabitaciones($_POST["habitaciones"]);
      $propiedad->setWc($_POST["wc"]);
      $propiedad->setEstacionamiento($_POST["estacionamiento"]);
      $propiedad->setIdVendedor($_POST["idVendedor"]);

      if ($imagen["name"]) { //Si es que hay una nueva imagen 
        //Obtenemos el tipo de formato de la imagen
        $extensionImagen = explode(".", $imagen["name"]); //Explode es como un split y en obtiene el ultimo elemento del arreglo
        $extensionImagen = end($extensionImagen); //End obtiene el ultimo elemento del arreglo

        //Generar un nombre único, se utiliza el md5 para generar un hash teniendo un unique id (irrepetible)
        $nombreImagen = md5(uniqid(rand(), true)) . "." . $extensionImagen;
      }
      //Insertamos la imagen de la propiedad con el nombre obtenido anteriormente, este puede ser ya sea el ingresado o el que ya estaba.
      $propiedad->setImagen($nombreImagen);

      $flag = $propiedad->validar($imagen);

      if ($flag == "validated") {
        $resultado = $propiedad->modificar();
        if ($resultado) {
          $success = "La propiedad se ha modificado correctamente";
        }

        /* SUBIDA DE ARCHIVOS */
        //Crear carpeta, recuerda que el uso de / de raiz, pero no raíz total, si no que, raiz del archivo actual. Es por eso que utilizamos los ../../
        $carpetaImagenes = "../../imagenes";
        if (!is_dir($carpetaImagenes)) { //Si no existe aun, se va a crear
          mkdir($carpetaImagenes);
        }

        if ($imagen["name"]) { //Si es que hay una nueva imagen 
          //Eliminamos la imagen previa
          if (!empty($imagenAnterior)) {
            unlink($carpetaImagenes . "/" . $imagenAnterior);
          }
          //Obtiene la direccion nueva
          $direccionNueva = "{$carpetaImagenes}/{$nombreImagen}";
          //Subir la imagen
          move_uploaded_file($imagen["tmp_name"], $direccionNueva);
        }
      }
    }
    $router->render("propiedades/actualizar", [
      "propiedad" => $propiedad,
      "vendedores" => $vendedores,
      "flag" => $flag,
      "success" => $success,
      "id" => $id
    ]);
  }

  //Eliminar propiedad
  public static function eliminar(Router $router)
  {
    if (isset($_GET["id"])) {
      //Aqui lo que hacemos es por medio de un filtro, validamos que el id sea un int valido
      $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);

      if ($id) {
        if ($_GET["tipo"] == "propiedad") {
          $propiedad = Propiedad::find($id);
          if ($propiedad->getId()) { //Si es que si existe el id y se puede obtener
            //Eliminar la imagen de los archivos
            $nombreImagen = $propiedad->getImagen();
            $carpetaImagenes = "../imagenes";
            unlink($carpetaImagenes . "/" . $nombreImagen);

            //Eliminar de la BD
            $consulta = $propiedad->eliminar($id);
            if ($consulta) {
              header('Location: /public/admin?suc=1');
            } else {
              header('Location: /public/admin');
            }
          } else {
            header("Location: /public/admin");
          }
        } else if ($_GET["tipo"] == "vendedor") {
          $vendedor = Vendedor::find($id);
          if ($vendedor->getId()) { 
            $consulta = $vendedor->eliminar($id);
            if ($consulta) {
              header('Location: /public/admin?suc=2');
            } else {
              header('Location: /public/admin');
            }
          } else {
            header("Location: /public/admin");
          }
        }
      }
    }

    $propiedades = Propiedad::all();
    $router->render("propiedades/admin", [
      "propiedades" => $propiedades,
      "id" => $id
    ]);
  }
}
