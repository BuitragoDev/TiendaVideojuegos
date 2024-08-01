<?php
/* ==========================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
========================================================================== */

  // Inicia una sesión de PHP o reanuda la sesión actual si existe una 
  session_start();

  // Conexión con la base de datos.
  include('conn_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="Página web de ejemplo para mi portfolio personal.">
  <meta name="keywords" content="Porfolio, Antonio, Buitrago, HTML5, CSS, Javascript, Bootstrap, Web, tienda, online" />
  <meta name="author" content="Antonio Buitrago">
  <meta name="robots" content="index" />
  <title>..:: Videojuegos Buitrago - Tienda Online | Index ::..</title>

  <!-- Favicon para cualquier navegador -->
  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" sizes="32x32">
  <!-- Favicon para los modelos más recientes de iPad y iPhone -->
  <link rel="apple-touch-icon-precomposed" href="assets/img/favicon.ico" type="image/png" sizes="152x152">
  <link rel="apple-touch-icon-precomposed" href="assets/img/favicon.ico" type="image/png" sizes="120x120">

  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- CSS Principal -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Librería CSS FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest/dist/sweetalert2.all.min.js"></script>

</head>

<body>

  <!-- Header (Contiene la cabecera y el menú principal) -->
  <?php include('header.php') ; ?> 

  <!-- Aquí empieza el MAIN -->
  <main class="container-fluid p-0 mb-5"> <!-- container-fluid -->

    <!-- Aquí empieza el contenedor del carrusel de la portada -->
    <div class="container-fluid p-0 m-0 ofertas-portada"> <!-- container -->

      <div id="carouselExampleCaptions" class="carousel slide carouselPortada" data-bs-ride="carousel">

        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/img/banners/bannerZelda.webp" class="d-block w-100"
              alt="Banner con la portada del videojuego The Legend of Zelda: Tears of the Kingdom">
          </div>
          <div class="carousel-item">
            <img src="assets/img/banners/bannerBaldursGate.webp" class="d-block w-100 img-fluid"
              alt="Banner con la portada del videojuego Baldur's Gate 3">
          </div>
          <div class="carousel-item">
            <img src="assets/img/banners/bannerStarfield.webp" class="d-block w-100 img-fluid"
              alt="Banner con la portada del videojuego Starfield">
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>

      </div>

    </div> <!-- /.carrusel-portada -->

    <!-- Aquí empieza el contenedor con las promociones de la portada -->
    <div class="container my-5 d-flex justify-content-center sales">

      <a class="black-friday" href="blackFriday.php" target="_self" title="Enlace a la página con las ofertas de Black Friday"><img class="img-fluid"
          src="assets/img/banners/blackFriday.webp" alt="Ofertas de Black Friday"></a>

    </div> <!-- /.promociones-portada -->

    <!-- Aquí empieza el contenedor de Juegos más Recientes -->
    <div class="container mt-5"> <!-- container -->

      <h1 class="text-white text-center text-md-start">Juegos más recientes</h1>
      <hr>

      <!-- Owl-Carousel -->
      <div class="owl-carousel-container d-flex flex-column-reverse flex-md-column">
        <div class="custom-navRecientes d-flex gap-2 justify-content-center justify-content-lg-start">
          <button class="owl-prevRecientes btn btn-primary me-lg-2" type="button"><i
              class="fa-solid fa-chevron-left"></i></button>
          <button class="owl-nextRecientes btn btn-primary" type="button"><i
              class="fa-solid fa-chevron-right"></i></button>
        </div>
        <div class="owl-carousel owl-carouselRecientes d-flex justify-content-center">
          <?php
            $sqlRecientes = "SELECT pr.*, pl.platformLogo AS logo, pl.platformName AS plataforma 
                             FROM product pr
                             JOIN platform pl ON pl.platformID = pr.platformID 
                             WHERE pr.releaseDate <= CURDATE() -- Esta línea filtra por fechas menores o iguales a la fecha actual
                             ORDER BY pr.releaseDate DESC LIMIT 10;";
            $resultadoRecientes = $mysqli->query($sqlRecientes);
            $contador = 1;
            while($filaRecientes = $resultadoRecientes->fetch_object()) {
          ?>
          <!-- Videojuego <?php echo $contador ?> del Carrusel -->
          <div class="item">

            <div class="card" style="width: 18rem;">

              <div class="imagen-card">
                
                <a href="articulo.php?id=<?= $filaRecientes->productID ?>" target="_self" title="Enlace al videojuego"><img src="<?= $filaRecientes->imageSource ?>" class="card-img-top" alt="Portada <?= $filaRecientes->productName ?>"></a>
              </div>

              <!-- Contenedor para la imagen cuadrada superpuesta -->
              <div class="overlay-image" style="position: absolute; top: 5px; left: 5px;">
                  <img src="<?= $filaRecientes->logo ?>" alt="Imagen del logo de <?= $filaRecientes->plataforma ?>" style="width: 50px; height: 50px;">
              </div>

              <div class="card-body">
                <h5 class="card-title"><?= $filaRecientes->productName ?></h5>
                <p class="card-text"><?= $filaRecientes->plataforma ?></p>
                <?php
                  if($filaRecientes->discount == 0){
                    echo '<p class="precio">' . $filaRecientes->price . ' &#8364;</p>';
                  } else {
                    $precioFinal = $filaRecientes->price * (1 - ($filaRecientes->discount / 100));
                    echo '<p class="precio"><span class="oferta">-'. $filaRecientes->discount .' %</span>' . number_format($precioFinal, 2) . ' &#8364;</p>';
                  }
                ?>
                <div class="d-flex justify-content-between">
                    
                    <a href="articulo.php?id=<?= $filaRecientes->productID ?>" class="btn btn-success btn-sm d-flex align-items-center"><i class="fa-solid fa-magnifying-glass-plus" style="color: #ffffff;"></i></a>
                    
                    <!-- Botón añadir al carrito -->
                    <?php
                      $fechaActual = new DateTime(); // Fecha y hora actual
                      $fechaComparar = new DateTime($filaRecientes->releaseDate); // Fecha a comparar
                      $fechaFormateada = $fechaComparar->format('d/m/y'); // fecha formateada
                      if ($fechaComparar > $fechaActual) {
                          echo '<a href="#" class="btn btn-success btn-sm d-flex align-items-center gap-1"><svg
                          xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-cart mb-1" viewBox="0 0 16 16">
                          <path
                              d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                          </svg> Reservar (' . $fechaFormateada . ')</a>';
                      } else {
                          echo '<a href="controlador/addToCart.php?id='.$filaRecientes->productID.'&portada='.$filaRecientes->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
                          xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-cart mb-1" viewBox="0 0 16 16">
                          <path
                              d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                          </svg> Añadir al carrito</a>';
                      }
                    ?>
                </div>
              </div>
            </div>
          </div>

          <?php
            $contador++;
            } // cierre del while ?> 
        </div>

      </div> <!-- /.owl-carousel -->

    </div> <!-- /.juegos-recientes -->

    <!-- Aquí empieza el contenedor de Juegos Recomendados -->
    <div class="container mt-5"> <!-- container -->

      <h1 class="text-white text-center text-md-start">Juegos Recomendados</h1>
      <hr>

      <!-- Owl-Carousel -->
      <div class="owl-carousel-container p-0 d-flex flex-column-reverse flex-md-column">
        <div class="custom-navRecomendados d-flex gap-2 justify-content-center justify-content-lg-start">
          <button class="owl-prevRecommended btn btn-primary me-lg-2" type="button"><i
              class="fa-solid fa-chevron-left"></i></button>
          <button class="owl-nextRecommended btn btn-primary" type="button"><i
              class="fa-solid fa-chevron-right"></i></button>
        </div>
        <div class="owl-carousel owl-carouselRecomendados d-flex justify-content-center">
          <?php
            $sqlRecomendados = "SELECT pr.*, pl.platformLogo AS logo, pl.platformName AS plataforma 
                                FROM product pr
                                JOIN platform pl ON pl.platformID = pr.platformID 
                                WHERE (pr.category = 'Deportes' OR pl.platformName = 'Xbox Series X') AND pr.releaseDate <= CURDATE() -- Esta línea filtra por fechas menores o iguales a la fecha actual
                                ORDER BY pr.releaseDate DESC LIMIT 10;";
                    
            $resultadoRecomendados = $mysqli->query($sqlRecomendados);
            $contador2 = 1;
            while($filaRecomendados = $resultadoRecomendados->fetch_object()) {
          ?>
          <!-- Videojuego <?php echo $contador2 ?>  del Carrusel -->
          <div class="item">

            <div class="card" style="width: 18rem;">

              <div class="imagen-card">
                  <a href="articulo.php?id=<?= $filaRecomendados->productID ?>" target="_self" title="Enlace al videojuego"><img src="<?= $filaRecomendados->imageSource ?>" class="card-img-top"
                  alt="Portada <?= $filaRecomendados->productName ?>"></a>
              </div>
              
              <!-- Contenedor para la imagen cuadrada superpuesta -->
              <div class="overlay-image" style="position: absolute; top: 5px; left: 5px;">
                  <img src="<?= $filaRecomendados->logo ?>" alt="Imagen del logo de <?= $filaRecomendados->plataforma ?>" style="width: 50px; height: 50px;">
              </div>

              <div class="card-body">
                <h5 class="card-title"><?= $filaRecomendados->productName ?></h5>
                <p class="card-text"><?= $filaRecomendados->plataforma ?></p>
                <?php
                  if($filaRecomendados->discount == 0){
                    echo '<p class="precio">' . $filaRecomendados->price . ' &#8364;</p>';
                  } else {
                    $precioFinal = $filaRecomendados->price * (1 - ($filaRecomendados->discount / 100));
                    echo '<p class="precio"><span class="oferta">-'. $filaRecomendados->discount .' %</span>' . number_format($precioFinal, 2) . ' &#8364;</p>';
                  }
                ?>
                <div class="d-flex justify-content-between">
                    <a href="articulo.php?id=<?= $filaRecomendados->productID ?>" class="btn btn-success btn-sm d-flex align-items-center"><i class="fa-solid fa-magnifying-glass-plus" style="color: #ffffff;"></i></a>
                    
                    <!-- Botón añadir al carrito -->
                    <?php
                      $fechaActual = new DateTime(); // Fecha y hora actual
                      $fechaComparar = new DateTime($filaRecomendados->releaseDate); // Fecha a comparar
                      $fechaFormateada = $fechaComparar->format('d/m/y'); // fecha formateada
                      if ($fechaComparar > $fechaActual) {
                          echo '<a href="#" class="btn btn-success btn-sm d-flex align-items-center gap-1"><svg
                          xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-cart mb-1" viewBox="0 0 16 16">
                          <path
                              d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                          </svg> Reservar (' . $fechaFormateada . ')</a>';
                      } else {
                          echo '<a href="controlador/addToCart.php?id='.$filaRecomendados->productID.'&portada='.$filaRecomendados->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
                          xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-cart mb-1" viewBox="0 0 16 16">
                          <path
                              d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                          </svg> Añadir al carrito</a>';
                      }
                    ?>
                </div>
              </div>
            </div>
          </div>
          <?php 
              $contador2++;
              } // cierre del while 
          ?> 
        </div>

      </div> <!-- /.owl-carousel -->

    </div> <!-- /. juegos-recomendados -->

    <!-- Aquí empieza el contenedor de Próximos Lanzamientos -->
    <div class="container mt-5"> <!-- container -->

      <h1 class="text-white text-center text-md-start">Próximos Lanzamientos</h1>
      <hr>

      <!-- Owl-Carousel -->
      <div class="owl-carousel-container p-0 d-flex flex-column-reverse flex-md-column">
        <div class="custom-navLanzamientos d-flex gap-2 justify-content-center justify-content-lg-start">
          <button class="owl-prevLanzamientos btn btn-primary me-lg-2" type="button"><i
              class="fa-solid fa-chevron-left"></i></button>
          <button class="owl-nextLanzamientos btn btn-primary" type="button"><i
              class="fa-solid fa-chevron-right"></i></button>
        </div>
        <div class="owl-carousel owl-carouselLanzamientos d-flex justify-content-center">
          <?php
            $sqlLanzamientos = "SELECT pr.*, pl.platformLogo AS logo, pl.platformName AS plataforma 
                                FROM product pr
                                JOIN platform pl ON pl.platformID = pr.platformID 
                                WHERE pr.releaseDate > CURDATE() -- Esta línea filtra por fechas mayores a la fecha actual
                                ORDER BY pr.releaseDate DESC LIMIT 10;";

            $resultadoLanzamientos = $mysqli->query($sqlLanzamientos);
            $contador3 = 1;
            while($filaLanzamientos = $resultadoLanzamientos->fetch_object()) {
          ?>
          <!-- Videojuego <?php echo $contador3 ?>  del Carrusel -->
          <div class="item">

            <div class="card" style="width: 18rem;">

              <div class="imagen-card">

                <a href="articulo.php?id=<?= $filaLanzamientos->productID ?>" target="_self" title="Enlace al videojuego"><img src="<?= $filaLanzamientos->imageSource ?>" class="card-img-top"
                alt="Portada <?= $filaLanzamientos->productName ?>"></a>
              </div>

              <!-- Contenedor para la imagen cuadrada superpuesta -->
              <div class="overlay-image" style="position: absolute; top: 5px; left: 5px;">
                  <img src="<?= $filaLanzamientos->logo ?>" alt="Imagen del logo de <?= $filaLanzamientos->plataforma ?>" style="width: 50px; height: 50px;">
              </div>

              <div class="card-body">
                <h5 class="card-title"><?= $filaLanzamientos->productName ?></h5>
                <p class="card-text"><?= $filaLanzamientos->plataforma ?></p>
                <?php
                  if($filaLanzamientos->discount == 0){
                    echo '<p class="precio">' . $filaLanzamientos->price . ' &#8364;</p>';
                  } else {
                    $precioFinal = $filaLanzamientos->price * (1 - ($filaLanzamientos->discount / 100));
                    echo '<p class="precio"><span class="oferta">-'. $filaLanzamientos->discount .' %</span>' . number_format($precioFinal, 2) . ' &#8364;</p>';
                  }
                ?>
                <div class="d-flex justify-content-between">
                    <a href="articulo.php?id=<?= $filaLanzamientos->productID ?>" class="btn btn-success btn-sm d-flex align-items-center"><i class="fa-solid fa-magnifying-glass-plus" style="color: #ffffff;"></i></a>
                    <?php
                      $fechaActual = new DateTime(); // Fecha y hora actual
                      $fechaComparar = new DateTime($filaLanzamientos->releaseDate); // Fecha a comparar
                      $fechaFormateada = $fechaComparar->format('d/m/y'); // fecha formateada
                      if ($fechaComparar > $fechaActual) {
                        echo '<a href="controlador/addToCart.php?id='.$filaLanzamientos->productID.'" class="btn btn-success btn-sm d-flex align-items-center gap-1"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart mb-1" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg> Reservar (' . $fechaFormateada . ')</a>';
                      } else {
                        echo '<a href="controlador/addToCart.php?id='.$filaLanzamientos->productID.'&portada='.$filaLanzamientos->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart mb-1" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg> Añadir al carrito</a>';
                      }
                    ?>
                    
                </div>
              </div>
            </div>
          </div>
          <?php } // cierre del while 
                $contador3++;
                $mysqli->close();
          ?> 
        </div>

      </div> <!-- /.Owl-Carousel -->

    </div> <!-- /. próximos-lanzamientos -->

  </main> <!-- /.main -->

  <!-- Footer (Contiene el área de ayuda y redes sociales) -->
  <?php include('footer.php') ; ?> 

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Vinculación de los JS -->
  <script src="js/scripts.js"></script>
  
  <!-- JS Lightbox -->
  <script src="js/lightbox.min.js"></script>

  <!-- Muestra el Sweet alert si el formulario de registro se ha enviado correctamente -->
  <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Obtener los parámetros de la URL
        const urlParams = new URLSearchParams(window.location.search);

        // Verificar si la variable "success" tiene el valor "true"
        if (urlParams.get("success") === "true") {
            // Mostrar el SweetAlert al cargar la página
            Swal.fire({
                title: 'Enhorabuena!',
                text: 'Te has registrado satisfactoriamente.',
                icon: 'success',
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#3085d6",
            });
        }
      });
  </script>

</body>

</html>