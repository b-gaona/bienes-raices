<fieldset class="formulario__campo">
  <legend class="formulario__legend">Información general</legend>
  <label class="formulario__label" for="titulo">Titulo: </label>
  <input class="formulario__input" type="text" name="titulo" placeholder="Título de la propiedad" id="titulo" value="<?php echo sanitizar($propiedad->getTitulo()); ?>">

  <label class="formulario__label" for="precio">Precio: </label>
  <input class="formulario__input" type="number" name="precio" placeholder="Precio de la propiedad" id="precio" value="<?php echo sanitizar($propiedad->getPrecio()); ?>">

  <label class="formulario__label" for="imagen">Imagen: </label>
  <input class="formulario__input" type="file" name="imagen" id="imagen" accept="image/jpeg, image/webp, image/png, image/svg">
  <?php if ($propiedad->getImagen()) { ?>
    <img class="imagen-modificar" src="/public/imagenes/<?php echo $propiedad->getImagen() ?>" alt="Imagen">
  <?php } ?>
  <label class="formulario__label" for="descripcion">Descripción: </label>
  <textarea class="formulario__input" name="descripcion" id="descripcion" style="resize: none"><?php echo sanitizar($propiedad->getDescripcion()); ?></textarea>
  <p class="caracteres"></p>
</fieldset>

<fieldset class="formulario__campo">
  <legend class="formulario__legend">Información de la propiedad</legend>

  <label class="formulario__label" for="habitaciones">Habitaciones: </label>
  <input class="formulario__input" type="number" name="habitaciones" placeholder="Ej: 3" id="habitaciones" min="1" max="10" value="<?php echo sanitizar($propiedad->getHabitaciones()); ?>">

  <label class="formulario__label" for="wc">Baños: </label>
  <input class="formulario__input" type="number" name="wc" placeholder="Ej: 3" id="wc" min="1" max="10" value="<?php echo  sanitizar($propiedad->getWc()); ?>">

  <label class="formulario__label" for="estacionamiento">Estacionamiento: </label>
  <input class="formulario__input" type="number" name="estacionamiento" placeholder="Ej: 2" id="estacionamiento" min="1" max="5" value="<?php echo sanitizar($propiedad->getEstacionamiento()); ?>">
</fieldset>

<fieldset class="formulario__campo">
  <legend class="formulario__legend">Vendedor</legend>

  <select class="formulario__input" name="idVendedor" id="vendedor">
    <option value="">-- Seleccione --</option>
    <?php foreach ($vendedores as $vendedor) { ?>
      <option value="<?php echo $vendedor->id; ?>" <?php echo ($vendedor->id == $propiedad->getIdVendedor() ? "selected" : "")  ?>>
        <?php echo sanitizar($vendedor->nombre) . " " . sanitizar($vendedor->apellido); ?></option>
    <?php } ?>
  </select>
</fieldset>