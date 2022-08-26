<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
  public static function index(Router $router)
  {
    //La variable limite se pasa a la hora que se le habla a este archivo php, es decir, se habla ya sea desde anuncios.php o desde index.php
    //Para verificar de donde se manda a llamar el archivo se puede poner un echo a $_SERVER y buscar SCRIPT_NAME
    $propiedades = Propiedad::all("LIMIT 3");
    $inicio = true; //Aun cuando esto se imprime en el main, esta variable llega hasta al header, aun cuando este antes de donde se le manda a llamar

    $router->render("paginas/index", [
      "propiedades" => $propiedades,
      "inicio" => $inicio,
    ]);
  }
  public static function nosotros(Router $router)
  {
    $router->render("paginas/nosotros", []);
  }
  public static function anuncios(Router $router)
  {
    $propiedades = Propiedad::all();
    $router->render("paginas/anuncios", [
      "propiedades" => $propiedades
    ]);
  }
  public static function anuncio(Router $router)
  {
    if (isset($_GET["id"])) {
      $id = filter_var($_GET["id"], FILTER_VALIDATE_INT);
      //Si el id es un numero (validado en el renglon de arriba)
      if ($id) {
        $propiedad = Propiedad::find($id);
        if (!$propiedad->getId()) { //Si es que no se encuentra ese id
          header("Location: /");
        }
      } else {
        header("Location: /");
      }
    }

    $router->render("paginas/anuncio", [
      "propiedad" => $propiedad
    ]);
  }
  public static function blog(Router $router)
  {
    $router->render("paginas/blog", []);
  }
  public static function entrada(Router $router)
  {
    $router->render("paginas/entrada", []);
  }
  public static function contacto(Router $router)
  {
    $mensaje = null;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $respuestas = $_POST["contacto"];

      //Crear una instancia de PHPMailer
      $phpmailer = new PHPMailer();

      //Configurar SMTP
      $phpmailer->isSMTP(); //Le decimos que es SMTP
      $phpmailer->Host = 'smtp.mailtrap.io';
      $phpmailer->SMTPAuth = true; //Nos autenticamos
      $phpmailer->Port = 2525;
      $phpmailer->Username = 'ee57d4a974e93d';
      $phpmailer->Password = '1b4d50a9a3b929';
      $phpmailer->SMTPSecure = "tls"; //Para que el paquete vaya encriptado

      //Configurar el contenido del email
      $phpmailer->setFrom("admin@bienesraices.com"); //Quien lo envia
      $phpmailer->addAddress("admin@bienesraices.com", "BienesRaices.com"); //A donde llega
      $phpmailer->Subject = "Tienes un nuevo mensaje";

      //Habilitar HTML
      $phpmailer->isHTML(true);
      $phpmailer->CharSet = "UTF-8";

      //Definir el contenido
      $contenido = "<html>
                      <p>Tienes un nuevo mensaje</p>
                      <p>Nombre: " . $respuestas["nombre"] . "</p>
                      <p>Email: " . $respuestas["email"] . "</p>
                      <p>Teléfono: " . $respuestas["telefono"] . "</p>
                      <p>Mensaje: " . $respuestas["mensaje"] . "</p>
                      <p>Vende o compra: " . $respuestas["tipo"] . "</p>
                      <p>Precio o presupuesto: $" . $respuestas["precio"] . "</p>
                      <p>Prefiere ser contactado por: " . $respuestas["contacto"] . "</p>
                      ";
      if ($respuestas["contacto"] == "telefono") {
        $contenido .= "<p>Fecha de contacto: " . $respuestas["fecha"] . "</p>
        <p>Hora: " . $respuestas["hora"] . "</p>
      </html>";
      } else {
        $contenido .= "</html>";
      }

      $phpmailer->Body = $contenido;
      $phpmailer->AltBody = "Esto es texto alternativo sin HTML";

      ///Enviar el email
      if ($phpmailer->send()) {
        header("Location: /public/contacto?suc=1"); //Con esto evitamos que al dar refresh se reenvie el correo
      }
    }
    //Con esto mostramos el mensaje
    if (isset($_GET["suc"])) {
      if ($_GET["suc"] == 1) {
        $mensaje = "Mensaje enviado correctamente";
      } else {
        $mensaje = "Hubo un error al enviar el mensaje";
      }
    }
    $router->render("paginas/contacto", [
      "mensaje" => $mensaje
    ]);
  }
}
