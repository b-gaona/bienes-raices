<fieldset class="formulario__campo">
  <legend class="formulario__legend">Información personal</legend>

  <label class="formulario__label" for="nombre">Nombre (s): </label>
  <input class="formulario__input" type="text" name="nombre" placeholder="Escribe tu nombre" id="nombre" value="<?php echo sanitizar($vendedor->getNombre()); ?>">

  <label class="formulario__label" for="apellido">Apellidos: </label>
  <input class="formulario__input" type="text" name="apellido" placeholder="Escribe tus apellidos" id="apellido" value="<?php echo sanitizar($vendedor->getApellido()); ?>">

</fieldset>

<fieldset class="formulario__campo">
  <legend class="formulario__legend">Información adicional</legend>

  <label class="formulario__label" for="telefono">Teléfono: </label>
  <input class="formulario__input" type="tel" name="telefono" placeholder="Escribe tu numero de teléfono" id="telefono" value="<?php echo sanitizar($vendedor->getTelefono()); ?>">

</fieldset>