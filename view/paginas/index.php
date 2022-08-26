<main class="contenedor">
  <h1>Más sobre nosotros</h1>

  <div class="iconos">
    <div class="icono">
      <img class="icono__imagen" src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
      <h3 class="icono__heading">Seguridad</h3>
      <p class="icono__info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, nihil
        nesciunt? Ad libero aut vitae, possimus maxime sed inciduntp.</p>
    </div>
    <div class="icono">
      <img class="icono__imagen" src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
      <h3 class="icono__heading">Precio</h3>
      <p class="icono__info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, nihil
        nesciunt? Ad libero aut vitae, possimus maxime sed inciduntp.</p>
    </div>
    <div class="icono">
      <img class="icono__imagen" src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
      <h3 class="icono__heading">A tiempo</h3>
      <p class="icono__info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, nihil
        nesciunt? Ad libero aut vitae, possimus maxime sed inciduntp.</p>
    </div>
  </div>
</main>

<section class="seccion contenedor anuncios">
  <h2 class="anuncios__heading">Casas y departamentos en venta</h2>
  <div class="anuncios__contenido">
    <?php include "listado.php"; ?>
  </div>
  <div class="anuncios__ver">
    <a href="anuncios" class="anuncio__boton-ver">Ver todas</a>
  </div>
</section>

<section class="hero ">
  <div class="contenedor hero__contenido">
    <h2 class="hero__heading">Encuentra la casa de tus sueños</h2>
    <p class="hero__info">Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la
      brevedad</p>
    <a href="contacto" class="hero__boton">Contáctanos</a>
  </div>
</section>

<div class="seccion-inferior contenedor ">
  <section class="blog">
    <h2 class="blog__heading">Nuestro Blog</h2>
    <div class="blog__grid">
      <article class="blog__entrada">
        <picture>
          <source srcset="build/img/blog1.avif" type="image/avif">
          <source srcset="build/img/blog1.webp" type="image/webp">
          <img class="blog__imagen" loading="lazy" src="build/img/blog1.jpg" alt="Blog 1">
        </picture>
        <div class="blog__contenido">
          <h3 class="blog__nombre">Terraza en el techo de tu casa</h3>
          <p class="blog__escrito">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
          <p class="blog__info">Consejos para construir una terraza en el techo de tu casa con los mejores
            materiales y ahorrando dinero</p>
        </div>
      </article>
      <article class="blog__entrada">
        <picture>
          <source srcset="build/img/blog2.avif" type="image/avif">
          <source srcset="build/img/blog2.webp" type="image/webp">
          <img class="blog__imagen" loading="lazy" src="build/img/blog2.jpg" alt="Blog 2">
        </picture>
        <div class="blog__contenido">
          <h3 class="blog__nombre">Guía para la decoración de tu casa</h3>
          <p class="blog__escrito">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
          <p class="blog__info">Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles
            y colores para darle vida a tu espacio</p>
        </div>
      </article>
    </div>
  </section>
  <aside class="testimoniales">
    <h2 class="testimoniales__heading">Testimoniales</h2>
    <div class="testimoniales__contenido">
      <blockquote class="testimoniales__info">El personal se comportó de una excelente forma, muy buena
        atención y la casa que me ofrecieron cumple con todas mis expectativas.</blockquote>
      <p class="testimoniales__autor">- Brandon Gaona</p>
    </div>
  </aside>
</div>