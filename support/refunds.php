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
  <title>..:: Videojuegos Buitrago - Tienda Online | Politica de Devoluciones ::..</title>

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

  <?php include('../header_opc.php') ; ?> 

  <!-- Aquí empieza el MAIN -->
  <main class="container-fluid p-0">

    <div class="container refunds pt-3">

        <!-- Header (Contiene la cabecera y el menú principal) -->
        <div class="row">
          <div class="col-12">
          <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb d-flex align-items-center">
                <li class="breadcrumb-item"><a href="../index.php" target="_self" title="Enlace a la página de portada"><img src="../assets/img/logo.webp" alt="Imagen del logo"></a></li>
                <li class="breadcrumb-item"><a href="ticket.php" target="_self" title="Enlace a la página principal de tickets">Support</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos digitales</li>
                <li class="breadcrumb-item active" aria-current="page">¿Puedo devolver el...</li>
              </ol>
            </nav>
          </div>
        </div> <!-- /.menu-navegación -->

        <!-- Sección 1 de la página POLITICA DE DEVOLUCIONES (título y buscador) -->
        <div class="row">
          <div class="col-12 col-lg-8">
            <h1 class="text-white">¿Puedo devolver el producto que he comprado y recibir un reembolso?</h1>
          </div>
          <div class="col-12 col-lg-4">
            <form class="formulario-ticket" action="#">
                <div class="input-container">
                    <i class="fa-solid fa-magnifying-glass" style="color:#FFFFFF;"></i>
                    <input type="text" id="obtener_respuestas" name="obtener_respuestas" placeholder="Buscar preguntas frecuentes">
                </div>
            </form>
          </div>
        </div> <!-- ./seccion1 -->

        <!-- Sección 2 de la página POLITICA DE DEVOLUCIONES (texto) -->
        <div class="row">
          <div class="col-12 my-5">
            <p>Una código de producto puede devolverse para recibir un reembolso en dos casos:</p>
            <ul>
              <li>Antes de ver el código del producto (no se muestra).</li>
              <li>Si hay algún problema con el propio código de producto (no es válido o ya se ha utilizado anteriormente).</li>
            </ul>
            <p>Si tienes algún problema con el código adquirido, ponte en contacto con nuestro equipo de atención al cliente.</p>
            <h4><strong>Ya he mostrado la llave y quiero devolverla</strong></h4>
            <p>Si has cambiado de opinión después de ver la llave y quieres devolverla para que te devolvamos el dinero, lamentablemente no es posible. Somos un mercado de códigos digitales, no una plataforma, y el vendedor de su producto no es un editor directo de la código, por lo tanto, no tienen ningún medio técnico para revocar o desactivar el código visto.</p>
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