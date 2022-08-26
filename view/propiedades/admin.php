<main class="contenedor">
  <h1>Administrador de bienes raíces</h1>
  <h2>Propiedades</h2>
  <div class="admin-opciones">
    <a href="/public/propiedades/crear" class="boton-verde mb-3">Nueva Propiedad</a>
    <a href="/public/vendedores/crear" class="boton-verde mb-3">Nuevo Vendedor</a>
  </div>

  <?php if (isset($success)) { ?>
    <div class="alerta success">
      <p><?php echo $success; ?></p>
    </div>
  <?php } ?>

  <div class="contenedor-tabla">
    <table class="tabla-propiedades">
      <thead>
        <tr>
          <th>Id</th>
          <th>Título</th>
          <th>Imagen</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!--Mostrar los resultados-->
        <?php
        foreach ($propiedades as $propiedad) { ?>
          <tr>
            <?php
            $precioInicial = strrev($propiedad->getPrecio());
            $precioFinal = implode(",", str_split($precioInicial, 3));
            $precioFinal = strrev($precioFinal);
            $precioFinal = substr_replace($precioFinal, ".00", (strlen($precioFinal) - 4));
            ?>
            <td><?php echo $propiedad->getId(); ?></td>
            <td><?php echo $propiedad->getTitulo(); ?></td>
            <td> <img src="/public/imagenes/<?php echo $propiedad->getImagen(); ?>" class="imagen-tabla" alt="Imagen"></td>
            <td>$<?php echo $precioFinal; ?></td>
            <td class="contenedor-botones">
              <a href="/public/propiedades/eliminar?id=<?php echo $propiedad->getId() . "&tipo=propiedad"; ?>" class="boton-rojo-block">Eliminar</a>
              <a href="/public/propiedades/actualizar?id=<?php echo $propiedad->getId(); ?>" class="boton-amarillo-block">Modificar</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <h2>Vendedores</h2>
  <div class="contenedor-tabla">
    <table class="tabla-propiedades">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Teléfono</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!--Mostrar los resultados-->
        <?php
        foreach ($vendedores as $vendedor) { ?>
          <tr>
            <td><?php echo $vendedor->getId(); ?></td>
            <td><?php echo $vendedor->getNombre(); ?></td>
            <td><?php echo $vendedor->getApellido(); ?></td>
            <td><?php echo $vendedor->getTelefono(); ?></td>
            <td class="contenedor-botones">
              <a href="/public/vendedores/eliminar?id=<?php echo $vendedor->getId() . "&tipo=vendedor"; ?>" class="boton-rojo-block">Eliminar</a>
              <a href="/public/vendedores/actualizar?id=<?php echo $vendedor->getId(); ?>" class="boton-amarillo-block">Modificar</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>