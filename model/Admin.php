<?php

namespace Model;

class Admin extends Main
{
  protected static $tabla = "usuarios";
  protected static $columnasTabla = [
    "id",
    "email",
    "password",
  ];

  //Atributos
  public $id;
  public $email;
  public $password;

  //Constructor
  public function __construct($args = [])
  {
    $this->id = $args["id"] ?? "";
    $this->email = $args["email"] ?? "";
    $this->password = $args["password"] ?? "";
  }

  public function validar()
  {
    $flag = null;
    $db = conectarDB();

    $email = mysqli_real_escape_string($db, filter_var($this->email, FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $this->password);

    if (!$email || !$password) {
      $flag = "Todos los campos son obligatorios";
    } else {
      //Revisar si el usuario existe
      $query = "SELECT * FROM usuarios WHERE email = '${email}'";
      $resultado = mysqli_query($db, $query);
      $usuario = mysqli_fetch_assoc($resultado);

      if ($usuario) {
        //Revisar si el password es correcto. Es una función de php
        $auth = password_verify($password, $usuario["password"]);
        if ($auth) {
          //El usuario está autenticado 
          session_start();
          //Llenar el arreglo de la sesión
          $_SESSION["usuario"] = $usuario["email"];
          $_SESSION["login"] = true;

          header("Location: /public/admin");
        } else {
          $flag = "El usuario o la contraseña no son compatibles";
        }
      } else {
        $flag = "El usuario o la contraseña no son compatibles";
      }
    }
    return $flag;
  }
}
