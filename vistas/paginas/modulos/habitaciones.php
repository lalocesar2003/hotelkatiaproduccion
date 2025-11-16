<?php

$categorias = ControladorCategorias::ctrMostrarCategorias();

?>

<!--=====================================
HABITACIONES (Carrusel 3x)
======================================-->
<!--=====================================
HABITACIONES (Carrusel 3x con flechas personalizadas)
======================================-->
<?php
  // $categorias, $ruta y $servidor deben venir definidos antes (como ya los tienes).
  // Armamos los slides de 3 en 3
  $slides = array_chunk($categorias, 3);
  $carouselId = "carouselHabitaciones";
?>

<style>
/* ====== Estilos locales del carrusel (flechas y cards) ====== */
#<?php echo $carouselId; ?> .carousel-control-prev,
#<?php echo $carouselId; ?> .carousel-control-next{
  width: auto; padding: 8px 14px;
}

#<?php echo $carouselId; ?> .carousel-control-prev-icon,
#<?php echo $carouselId; ?> .carousel-control-next-icon{
  width: 48px; height: 48px;
  background-color: #111;              /* color del botón */
  border-radius: 9999px;
  background-size: 50% 50%;
  background-position: center;
  background-repeat: no-repeat;
  box-shadow: 0 8px 24px rgba(0,0,0,.18);
  opacity: 1 !important;
  transition: transform .15s ease, box-shadow .15s ease;
}

/* Flechas blancas (SVG inline en background-image) */
#<?php echo $carouselId; ?> .carousel-control-prev-icon{
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolyline points='12.5,3 5,10 12.5,17' fill='none' stroke='%23ffffff' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
}
#<?php echo $carouselId; ?> .carousel-control-next-icon{
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolyline points='7.5,3 15,10 7.5,17' fill='none' stroke='%23ffffff' stroke-width='2.4' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
}

#<?php echo $carouselId; ?> .carousel-control-prev:hover .carousel-control-prev-icon,
#<?php echo $carouselId; ?> .carousel-control-next:hover .carousel-control-next-icon{
  transform: translateY(-1px) scale(1.02);
  box-shadow: 0 10px 28px rgba(0,0,0,.22);
}

#<?php echo $carouselId; ?> .carousel-control-prev{ left: -6px; }
#<?php echo $carouselId; ?> .carousel-control-next{ right: -6px; }

/* Tarjetas de habitación */
.card-rooms { background:#fff; border-radius:10px; padding:12px; box-shadow:0 6px 18px rgba(0,0,0,.06); }
.card-rooms .badge-room { border-radius:8px; }
.room-img { width:100%; height:220px; object-fit:cover; border-radius:8px; }
@media (min-width:992px){ .room-img{ height:240px; } }
</style>

<div class="habitaciones container-fluid bg-light" id="habitaciones">
  <div class="container">

    <h1 class="pt-4 text-center">HABITACIONES</h1>

    <div id="<?php echo $carouselId; ?>" class="carousel slide" data-ride="carousel">

      <!-- Indicadores -->
      <ol class="carousel-indicators">
        <?php foreach ($slides as $i => $_): ?>
          <li data-target="#<?php echo $carouselId; ?>" data-slide-to="<?php echo $i; ?>" class="<?php echo $i===0?'active':''; ?>"></li>
        <?php endforeach; ?>
      </ol>

      <!-- Slides -->
      <div class="carousel-inner">

        <?php foreach ($slides as $i => $grupo): ?>
          <div class="carousel-item <?php echo $i===0?'active':''; ?>">
            <div class="row p-4 text-center">
              <?php foreach ($grupo as $value): ?>
                <div class="col-12 col-md-6 col-lg-4 pb-3 px-0 px-lg-3">
                  <a href="<?php echo $ruta.$value['ruta']; ?>">
                    <figure class="text-center h-100 d-flex flex-column justify-content-between card-rooms">
                      <img src="<?php echo $servidor.$value['img']; ?>" class="img-fluid room-img" alt="<?php echo htmlspecialchars($value['tipo']); ?>">
                      <p class="small py-3 mb-0"><?php echo $value['descripcion']; ?></p>
                      <h3 class="py-2 text-gray-dark mb-0">
                        DESDE S/<?php echo number_format($value['continental_baja']); ?> SOL
                      </h3>
                      <h5 class="py-2 text-gray-dark border mb-3">
                        Ver detalles <i class="fas fa-chevron-right ml-2"></i>
                      </h5>
                      <h1 class="text-white p-3 mx-auto w-50 lead text-uppercase badge-room"
                          style="background:<?php echo $value['color']; ?>"><?php echo $value['tipo']; ?></h1>
                    </figure>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <!-- Controles -->
      <a class="carousel-control-prev" href="#<?php echo $carouselId; ?>" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#<?php echo $carouselId; ?>" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>

    </div>

  </div>
</div>
