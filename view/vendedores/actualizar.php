<main class="contenedor contenedor-centrado">
  <h1>Modificar</h1>
  <a href="/public/admin" class="boton-verde">Volver</a>

  <?php if (isset($success)) { ?>
    <div class="alerta success">
      <p><?php echo $success; ?></p>
    </div>
  <?php } else if (isset($flag)) { ?>
    <div class="alerta error">
      <p><?php echo $flag ?></p>
    </div>
  <?php } ?>

  <form action="/public/vendedores/actualizar?id=<?php echo isset($id) ? $id : ""; ?>" method="POST" class="formulario">
    <?php include __DIR__ . "/formulario.php"; ?>
    <input type="submit" value="Modificar datos del vendedor" class="boton-verde">
  </form>
</main>