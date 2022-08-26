<!-- Esta pagina actua como Master page, es decir, actua como una plantilla y dentro de esta van todas las vistas-->
<?php
if (!isset($_SESSION)) { //Si no está abierta la sesión la abrimos
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes raíces</title>
  <link rel="stylesheet" href="/public/build/css/app.css">
</head>

<body>
  <header class="header <?php echo isset($inicio) ? 'header__inicio' : '' ?>">
    <div class="contenedor header__contenido">
      <div class="header__barra">
        <a href="/public/">
          <img src="/public/build/img/logo.svg" alt="Logo de Bienes Raices">
        </a>

        <div class="header__menu-mobile">
          <img id="menu" src="/public/build/img/barras.svg" alt="Icono menu responsive">
        </div>

        <div class="navegacion__derecha">
          <nav class="navegacion navegacion--header">
            <a class="navegacion__enlace" href="/public/nosotros">Nosotros</a>
            <a class="navegacion__enlace" href="/public/anuncios">Anuncios</a>
            <a class="navegacion__enlace" href="/public/blog">Blog</a>
            <a class="navegacion__enlace" href="/public/contacto">Contacto</a>
            <?php if (isset($_SESSION["login"]) && $_SESSION["login"]) { ?>
              <a class="navegacion__enlace" href="/public/logout">Cerrar sesión</a>
            <?php } ?>
          </nav>
          <img class="navegacion__dark" src="/public/build/img/dark-mode.svg" alt="Dark mode">
        </div>
      </div>
      <!--Cierre barra-->
      <?php echo isset($inicio) ? "<h1 class=\"header__heading\">Venta de Casas y Departamentos exclusivos de lujo</h1>" : ""; ?>
    </div>
  </header>

  <?php
  echo $contenido;
  ?>

  <footer class="footer">
    <div class="contenedor footer__contenido">
      <nav class="navegacion">
        <a class="navegacion__enlace" href="/public/nosotros">Nosotros</a>
        <a class="navegacion__enlace" href="/public/anuncios">Anuncios</a>
        <a class="navegacion__enlace" href="/public/blog">Blog</a>
        <a class="navegacion__enlace" href="/public/contacto">Contacto</a>
      </nav>
    </div>
    <p class="footer__copyright">Todos los derechos reservados <?php echo date('Y') ?> &copy;</p>
  </footer>
  <script src="/public/build/js/bundle.min.js"></script>
</body>

</html>