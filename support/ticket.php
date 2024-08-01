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
  <title>..:: Videojuegos Buitrago - Tienda Online | Support ::..</title>

  <!-- Favicon para cualquier navegador -->
  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" sizes="32x32">
  <!-- Favicon para los modelos más recientes de iPad y iPhone -->
  <link rel="apple-touch-icon-precomposed" href="../assets/img/favicon.ico" type="image/png" sizes="152x152">
  <link rel="apple-touch-icon-precomposed" href="../assets/img/favicon.ico" type="image/png" sizes="120x120">

  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- CSS Principal -->
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/style.css">

  <!-- Librería CSS FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@latest/dist/sweetalert2.all.min.js"></script>

</head>

<body>

  <!-- Header (Contiene la cabecera y el menú principal) -->
  <?php include('../header_opc.php') ; ?> 

  <!-- Aquí empieza el MAIN -->
  <main class="container-fluid p-0">

    <div class="container ticket-section pt-3">

      <!-- Contenedor donde se encuentra el menú de navegación de la sección de soporte -->
      <div class="row">
        <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb d-flex align-items-center">
              <li class="breadcrumb-item"><a href="../index.php" target="_self" title="Enlace a la página de portada"><img src="../assets/img/logo.webp" alt="Imagen del logo"></a></li>
              <li class="breadcrumb-item active" aria-current="page">Ticket</li>
            </ol>
          </nav>
        </div>
      </div> <!-- /.menu-navegación -->

      <!-- Sección 1 de la página TICKET (título y buscador) -->
      <div class="container-fluid ticket-top p-0 mb-5">
          <div class="container">
              <div class="row mb-5">
                  <div class="col-12 offset-lg-4 col-lg-5 text-center">
                      <h1 class="fs-1 text-white">¿Con qué necesitas ayuda?</h1>
                      <form class="formulario-ticket my-5" action="#">
                          <div class="input-container">
                              <i class="fa-solid fa-magnifying-glass" style="color:#FFFFFF;"></i>
                              <input type="text" id="obtener_respuestas" name="obtener_respuestas" placeholder="Buscar preguntas frecuentes...">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div> <!-- /.seccion1 -->

      <!-- Sección 2 de la página TICKET (texto) -->
      <div class="container">
        <div class="row d-flex flex-column flex-lg-row justify-content-center align-items-center gap-2 gap-lg-5 ticket-tipos">
          <div class="col-12 col-lg-3 d-flex flex-column justify-content-center align-items-center">
            <a href="physical_products.php" target="_self" title="Enlace al creador de tickets para productos físicos"><i class="fa-solid fa-box-archive"></i></a>
            <a href="physical_products.php" target="_self" title="Enlace al creador de tickets para productos físicos" class="text-white fs-4 mt-3">Productos físicos</a>
          </div>
          <div class="col-12 col-lg-3 d-flex flex-column justify-content-center align-items-center">
            <a href="digital_products.php" target="_self" title="Enlace al creador de tickets para productos digitales"><i class="fa-solid fa-key"></i></a>
            <a href="digital_products.php" target="_self" title="Enlace al creador de tickets para productos digitales" class="text-white fs-4 mt-3">Productos digitales</a>
          </div>
          <div class="col-12 col-lg-3 d-flex flex-column justify-content-center align-items-center">
          <a href="account.php" target="_self" title="Enlace al creador de tickets para gestión de la cuenta"><i class="fa-regular fa-address-card"></i></a>
            <a href="account.php" target="_self" title="Enlace al creador de tickets para gestión de la cuenta" class="text-white fs-4 mt-3">Cuenta</a>
          </div>
        </div>
      </div> <!-- ./seccion2 -->

    </div>

  </main> <!-- /.main -->

  <!-- Footer (Contiene el área de ayuda y redes sociales) -->
  <?php include('../footer_opc.php') ; ?> 

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Vinculación de los JS -->
  <script src="../js/scripts.js"></script>

</body>

</html>