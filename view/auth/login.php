<main class="contenedor contenedor-centrado">
  <h1>Iniciar sesión</h1>

  <?php if (isset($flag)) { ?>
    <div class="alerta error">
      <p><?php echo $flag ?></p>
    </div>
  <?php } ?>

  <form action="" method="POST" class="formulario">
    <fieldset class="formulario__campo">
      <legend class="formulario__legend">Email y password</legend>


      <label class="formulario__label" for="email">E-mail: </label>
      <input class="formulario__input" name="email" type="email" placeholder="Escribe tu e-mail" id="email">

      <label class="formulario__label" for="password">Password: </label>
      <input class="formulario__input" name="password" type="password" placeholder="Escribe tu password" id="password">

      <input type="submit" value="Iniciar sesión" class="boton-verde">
    </fieldset>
  </form>
</main>