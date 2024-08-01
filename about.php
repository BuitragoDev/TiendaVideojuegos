<?php
/* ==========================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
========================================================================== */

  // Inicia una sesión de PHP o reanuda la sesión actual si existe una 
  session_start();
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
  <title>..:: Videojuegos Buitrago - Tienda Online | About ::..</title>

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
  <main class="container-fluid p-0">

    <div class="container-fluid about p-0 my-5"> <!-- container-fluid -->

      <div class="container"> <!-- container -->

        <!-- Sección 1 de la página ABOUT -->
        <div class="row about-bg mb-5">

          <div class="col-12 col-lg-5 d-flex flex-column justify-content-center align-items-start py-5 gap-3">
            <p class="text-white h5 text-uppercase">SOBRE BUITRAGO</p>
            <h1 class="text-white">Estamos en la misión de ayudar a todos en descubrir la alegría de los videojuegos</h1>
            <p class="text-white">El futuro de los videojuegos va más allá del entretenimiento, ¡y es un privilegio ayudar a darle forma! Estamos construyendo un marketplace seguro, asequible y sostenible para todos los jugadores de hoy y mañana.</p>
            <button type="button" class="btn btn-warning" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Tranquilo, que esto es una página de ejemplo ;)">Únete a nuestro equipo</button>
          </div>

        </div> <!-- ./seccion1 -->

        <!-- Sección 2 de la página ABOUT -->
        <div class="row d-flex flex-column flex-lg-row gap-3 mt-5">

          <div class="col text-white">
            <h2>Nuestra historia</h2>
            <p>Clara y Diego, fundadores de Buitrago, comparten una pasión profunda por los juegos. Su historia se remonta a los años universitarios cuando, como compañeros de habitación, pasaban horas sumergidos en mundos virtuales. Desde los clásicos como Super Mario y Zelda hasta títulos más modernos como The Witcher, Overwatch, League of Legends, Minecraft y Final Fantasy, su conexión siempre estuvo ligada al universo de los videojuegos.</p>
            <p>La semilla de Buitrago se gestó entre partidas, estrategias y momentos de pura diversión. Fue durante esas sesiones de juego cuando las primeras chispas de ideas empresariales comenzaron a brillar. Después de construir varios proyectos y aprender de cada uno, Clara y Diego decidieron regresar a su pasión original: ¡los juegos! Así nació Buitrago en 2020.</p>
            <p>Hoy en día, nuestro ecosistema de juegos acoge a más de 10 millones de usuarios activos (¡y seguimos creciendo!), ofreciendo un estándar excepcional de confiabilidad, seguridad y accesibilidad en el mercado. Estamos tremendamente orgullosos del camino que hemos recorrido en tan poco tiempo y ansiamos compartir este viaje contigo. ¡Bienvenido a Buitrago!</p>
          </div>
          <div class="col d-flex justify-content-center align-items-center">
              <img class="img-fluid" src="assets/img/about-img.webp" alt="Imagen de un chico y una chica jugando videojuegos">
          </div>

        </div> <!-- ./seccion2 -->

      </div> <!-- /.container -->

    </div> <!-- /.container-fluid -->

  </main> <!-- /.main -->

  <!-- Footer (Contiene el área de ayuda y redes sociales) -->
  <?php include('footer.php') ; ?> 

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Vinculación de los JS -->
  <script src="js/scripts.js"></script>

</body>

</html>