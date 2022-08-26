<main class="contenedor contenedor-centrado">
  <h1><?php echo $propiedad->getTitulo(); ?></h1>

  <picture>
    <img class="imagen-grande" loading="lazy" src="imagenes/<?php echo $propiedad->getImagen(); ?>" alt="Anuncio destacado">
  </picture>

  <?php
  $precioInicial = strrev($propiedad->getPrecio());
  $precioFinal = implode(",", str_split($precioInicial, 3));
  $precioFinal = strrev($precioFinal);
  $precioFinal = substr_replace($precioFinal, ".00", (strlen($precioFinal) - 4));
  ?>

  <div class="propiedad__resumen">
    <p class="anuncio__precio">$<?php echo $precioFinal; ?></p>
    <ul class="iconos__caracteristicas">
      <li>
        <img src="build/img/icono_wc.svg" alt="Icono WC">
        <p><?php echo $propiedad->getWc(); ?></p>
      </li>
      <li>
        <img src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
        <p><?php echo $propiedad->getEstacionamiento(); ?></p>
      </li>
      <li>
        <img src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
        <p><?php echo $propiedad->getHabitaciones(); ?></p>
      </li>
    </ul>

    <p class="propiedad__info"><?php echo $propiedad->getDescripcion(); ?>. Nos encontramos cerca de varias tiendas, así como también nos encontramos cerca de varias atracciones para que puedas salir a disfrutar del día y de la noche. Es una zona céntrica, no vas a tener problemas de movibilidad.</p>
    <p class="propiedad__info">Anímate a comprar con nosotros!. Esta es una de las mejores casas de la zona. Ha sido de las más queridas entre nuestros clientes, no te pierdas de esta gran oportunidad.</p>
  </div>
</main>