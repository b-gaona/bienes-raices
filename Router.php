<?php

namespace MVC;

class Router
{
  public $rutasGET = [];
  public $rutasPOST = [];

  public function urlGet($url, $funcion)
  {
    $this->rutasGET[$url] = $funcion; //Esto lo que hace es que como llave tendremos la url y como valor de esa llave tendremos la funcion
  }
  public function urlPost($url, $funcion)
  {
    $this->rutasPOST[$url] = $funcion; //Esto lo que hace es que como llave tendremos la url y como valor de esa llave tendremos la funcion
  }

  public function comprobarRutas()
  {
    //Para restringir el acceso a estas paginas
    $urlProtegidas = [
      "/admin",
      "/propiedades/crear",
      "/vendedores/crear",
      "/propiedades/actualizar",
      "/vendedores/actualizar",
      "/propiedades/eliminar",
      "/vendedores/eliminar"
    ];

    $urlActual = $_SERVER["PATH_INFO"] ?? "/"; //El PATH_INFO solo es cuando esta fuera del index, por eso se le pregunta si esta el path_info, si lo está agarra el nombre de esa url, si no, es que esta en el index, por lo cual la ruta será /
    $tipoMetodo = $_SERVER["REQUEST_METHOD"];

    if ($tipoMetodo === "GET") {
      //Con lo de abajo lo que logramos es obtener la funcion a la que se esté hablando con la url, esto se hace debido a que rutasGET se llena en index.php, y lo llenamos con llaves de las url de parametro y valores de parametro. Entonces al hablarle a rutasGET y la urlActual lo que hacemos es validar, basicamente, si la url se encuentra o no en nuestros rangos. Si si se encuentra, funcion se iguala a la funcion que se declaró desde index.php, si no se encuentra, funcion es igual a null.
      $funcion = $this->rutasGET[$urlActual] ?? null;
    } else {
      $funcion = $this->rutasPOST[$urlActual] ?? null;
    }

    if (in_array($urlActual, $urlProtegidas)) {
      autenticado();
    }

    if ($funcion) { //Quiere decir que si encontró la URL
      //call_user_func nos permite llamarle a una funcion cuando no sabemos como se llama esa funcion y la corre, es decir, pq no se puede hacer un $fn();
      call_user_func($funcion, $this);
    } else { //No encontró la URL 
      echo "NO Encontrado";
    }
  }

  //Muestra una vista
  public function render($view, $datos = [])
  {

    foreach ($datos as $key => $value) {
      /*
        El uso de $$ lo que hace es crear variables dinamicas, es decir, en este caso, estamos creando variables CON EL NOMBRE DE LA LLAVE de cada elemento del arreglo, y el valor de cada variable es igual al valor del contenido de la llave de ese mismo elemento del arreglo. 
        Es decir, es como un extract, pero de una forma elegante.
        De este modo, vamos a tener todas las variables del arreglo que se pasen como parametro DENTRO de nuestro archivo que se esté pasando como parametro.
      */
      $$key = $value;
    }

    /*
      Esto funciona de la siguiente manera:
      Recibe una vista como parametro, ese parametro incluye la dirección de donde estará mi archivo que se va a mostrar, por ejemplo "propiedades/admin", y lo que hacemos en esta función es agregarle un .php e indicando la ruta especifica dentro de view. Esto para que en el URL NO se muestre que es un archivo php, o etc.
      Lo que hacemos es tomar esa vista y guardarla en memoria, una ves la guardamos en memoria, creamos una variable que se iguale a lo que ya tenemos en memoria.
      Posteriormente, le hablamos al layout o la plantilla principal del proyecto, de este modo lo que hacemos es que ya tenemos el archivo de la vista incluido dinamicamente al layout principal.
    */
    ob_start(); //Aqui empezamos a guardar datos en memoria
    include_once __DIR__ . "/view/{$view}.php"; //Esto guardamos en memoria
    $contenido = ob_get_clean(); //Aqui le decimos que la variable contenido va a ser igual a todo lo que guardo en memoria el ob
    include_once __DIR__ . "/view/layout.php"; //De este modo inyectamos la vista con header y footer
  }
}
