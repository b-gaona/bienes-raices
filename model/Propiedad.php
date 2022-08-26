<?php

namespace Model;

class Propiedad extends Main
{
  //Propiedades que se modifican de la clase padre
  protected static $tabla = "propiedades";
  protected static $columnasTabla = [
    "id",
    "titulo",
    "precio",
    "imagen",
    "descripcion",
    "habitaciones",
    "wc",
    "estacionamiento",
    "creado",
    "idVendedor"
  ];

  //Atributos
  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $idVendedor;

  //Constructor
  public function __construct($args = [])
  {
    $this->id = $args["id"] ?? "";
    $this->titulo = $args["titulo"] ?? "";
    $this->precio = $args["precio"] ?? "";
    $this->imagen = $args["imagen"] ?? "";
    $this->descripcion = $args["descripcion"] ?? "";
    $this->habitaciones = $args["habitaciones"] ?? "";
    $this->wc = $args["wc"] ?? "";
    $this->estacionamiento = $args["estacionamiento"] ?? "";
    $this->creado = date('Y/m/d');
    $this->idVendedor = $args["idVendedor"] ?? "";
  }

  //Metodos unicos de clase
  public function validar($imagen)
  {
    $flag = "validated";
    if (!$this->titulo || !$this->precio || !$this->descripcion || !$this->habitaciones || !$this->wc || !$this->estacionamiento || !$this->idVendedor || !$this->imagen) {
      $flag = "Todos los campos son obligatorios";
    } else if (strlen($this->descripcion) < 50 || strlen($this->descripcion) > 120) {
      $flag = "La descripción debe tener entre 50 a 120 caracteres";
    } else if ($this->precio > 1000000) {
      $flag = "Lo sentimos, debe seleccionar un rango de precios menor";
    } else if ($imagen["size"] > 1000000 || $imagen["error"] == 1) { //Si es mas grande de 1MB o si da error
      $flag = "Seleccione una imagen más ligera";
    }
    return $flag;
  }

  //Setters
  public function setImagen($imagen)
  {
    $this->imagen = $imagen;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function setTitulo($titulo)
  {
    $this->titulo = $titulo;
  }
  public function setPrecio($precio)
  {
    $this->precio = $precio;
  }
  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }
  public function setHabitaciones($habitaciones)
  {
    $this->habitaciones = $habitaciones;
  }
  public function setWc($wc)
  {
    $this->wc = $wc;
  }
  public function setEstacionamiento($estacionamiento)
  {
    $this->estacionamiento = $estacionamiento;
  }
  public function setIdVendedor($idVendedor)
  {
    $this->idVendedor = $idVendedor;
  }
  //Getters
  public function getId()
  {
    return $this->id;
  }
  public function getTitulo()
  {
    return $this->titulo;
  }
  public function getPrecio()
  {
    return $this->precio;
  }
  public function getImagen()
  {
    return $this->imagen;
  }
  public function getDescripcion()
  {
    return $this->descripcion;
  }
  public function getHabitaciones()
  {
    return $this->habitaciones;
  }
  public function getWc()
  {
    return $this->wc;
  }
  public function getEstacionamiento()
  {
    return $this->estacionamiento;
  }
  public function getIdVendedor()
  {
    return $this->idVendedor;
  }
}
