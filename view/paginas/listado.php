<?php

foreach ($propiedades as $propiedad) { ?>
  <?php
  $precioInicial = strrev($propiedad->getPrecio());
  $precioFinal = implode(",", str_split($precioInicial, 3));
  $precioFinal = strrev($precioFinal);
  $precioFinal = substr_replace($precioFinal, ".00", (strlen($precioFinal) - 4));
  ?>
  <div class="anuncio">
    <picture>
      <img class="anuncio__imagen" loading="lazy" src="/public/imagenes/<?php echo $propiedad->getImagen() ?>" alt="Anuncio">
    </picture>

    <div class="anuncio__contenido">
      <h3 class="anuncio__heading"><?php echo $propiedad->getTitulo(); ?></h3>
      <p class="anuncio__info"><?php echo $propiedad->getDescripcion(); ?></p>
      <p class="anuncio__precio">$<?php echo $precioFinal; ?></p>

      <ul class="iconos__caracteristicas">
        <li>
          <img src="/public/build/img/icono_wc.svg" alt="Icono WC">
          <p><?php echo $propiedad->getWc(); ?></p>
        </li>
        <li>
          <img src="/public/build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
          <p><?php echo $propiedad->getEstacionamiento(); ?></p>
        </li>
        <li>
          <img src="/public/build/img/icono_dormitorio.svg" alt="Icono habitaciones">
          <p><?php echo $propiedad->getHabitaciones(); ?></p>
        </li>
      </ul>
      <a class="anuncio__boton" href="<?php echo isset($inicio) ? "anuncios" : "anuncio?id={$propiedad->getId()}" ?>" ;>Ver propiedad</a>
    </div>
  </div>
<?php }
