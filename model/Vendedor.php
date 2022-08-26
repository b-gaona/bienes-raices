<?php

namespace Model;

class Vendedor extends Main
{
  //Propiedades que se modifican de la clase padre
  protected static $tabla = "vendedores";
  protected static $columnasTabla = [
    "id",
    "nombre",
    "apellido",
    "telefono"
  ];

  //Atributos
  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  //Constructor
  public function __construct($args = [])
  {
    $this->id = $args["id"] ?? "";
    $this->nombre = $args["nombre"] ?? "";
    $this->apellido = $args["apellido"] ?? "";
    $this->telefono = $args["telefono"] ?? "";
  }

  //Metodos 
  public function validar()
  {
    $flag = "validated";

    if (!$this->nombre || !$this->apellido || !$this->telefono) {
      $flag = "Todos los campos son obligatorios";
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $this->nombre) || !preg_match("/^([a-zA-Z' ]+)$/", $this->apellido)) {
      $flag = "Nombre y apellido no pueden contener números ni acentos";
    } else if (!preg_match("/[0-9]{10}/", $this->telefono)) { //Que sean del 0-9 y sean 10 digitos en total
      $flag = "El teléfono debe contener 10 dígitos";
    }

    return $flag;
  }
  
  //Setters
  public function setId($id)
  {
    $this->id = $id;
  }
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }
  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }
  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }
  //Getters
  public function getId()
  {
    return $this->id;
  }
  public function getNombre()
  {
    return $this->nombre;
  }
  public function getApellido()
  {
    return $this->apellido;
  }
  public function getTelefono()
  {
    return $this->telefono;
  }
}
