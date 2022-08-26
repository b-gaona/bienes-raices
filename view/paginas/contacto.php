<main class="contenedor contacto contenedor-centrado">
  <h1 class="contacto__heading">Contacto</h1>

  <?php if (isset($mensaje)) { ?>
    <div class="alerta success">
      <p><?php echo $mensaje; ?></p>
    </div>
  <?php }?>

  <picture>
    <source srcset="build/img/destacada3.avif" type="image/avif">
    <source srcset="build/img/destacada3.webp" type="image/webp">
    <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen destacada">
  </picture>

  <h2 class="contacto__instruccion">Llene el formulario de Contacto</h2>

  <form action="" method="POST" class="formulario">
    <fieldset class="formulario__campo">
      <legend class="formulario__legend">Información personal</legend>

      <label class="formulario__label" for="nombre">Nombre: </label>
      <input class="formulario__input" type="text" placeholder="Escribe tu nombre" id="nombre" name="contacto[nombre]" required>

      <label class="formulario__label" for="email">E-mail: </label>
      <input class="formulario__input" type="email" placeholder="Escribe tu e-mail" id="email" name="contacto[email]" required>

      <label class="formulario__label" for="telefono">Teléfono: </label>
      <input class="formulario__input" type="tel" placeholder="Escribe tu telefono" id="telefono" name="contacto[telefono]" required>

      <label class="formulario__label" for="mensaje">Mensaje: </label>
      <textarea class="formulario__input" id="mensaje" name="contacto[mensaje]" style="resize: none" required></textarea>
      <p class="caracteres"></p>
    </fieldset>

    <fieldset class="formulario__campo">
      <legend class="formulario__legend">Información sobre la propiedad</legend>

      <label class="formulario__label" for="opciones">Vende o compra: </label>

      <select class="formulario__input" id="opciones" name="contacto[tipo]" required>
        <option value="" disabled selected> -- Seleccione -- </option>
        <option value="Compra">Compra</option>
        <option value="Venta">Venta</option>
      </select>

      <label class="formulario__label" for="presupuesto">Precio o presupuesto: </label>
      <input class="formulario__input" type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" required>
    </fieldset>

    <fieldset class="formulario__campo">
      <legend class="formulario__legend">Forma de contacto</legend>

      <p>Como desea ser contactado</p>
      <div class="formulario__contacto">
        <label class="formulario__label" for="contactar-telefono">Teléfono</label>
        <input class="formulario__input" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
        <label class="formulario__label" for="contactar-email">E-mail</label>
        <input class="formulario__input" type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
      </div>

      <p>Si eligió teléfono, elija la fecha y la hora para ser contactado</p>

      <label class="formulario__label" for="fecha">Fecha: </label>
      <input class="formulario__input" type="date" id="fecha" name="contacto[fecha]">

      <label class="formulario__label" for="hora">Hora: </label>
      <input class="formulario__input" type="time" id="hora" min="09:00" max="22:00" name="contacto[hora]">
    </fieldset>

    <input type="submit" value="Enviar" class="formulario__boton">
  </form>
</main>