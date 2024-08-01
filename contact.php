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
  <title>..:: Videojuegos Buitrago - Tienda Online | Contact ::..</title>

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
  <?php include('header_opc.php') ; ?> 

  <!-- Aquí empieza el MAIN -->
  <main class="container-fluid p-0">

    <div class="container-fluid contact p-0 my-5"> <!-- container-fluid -->

      <div class="container"> <!-- container -->

        
        <div class="row mb-5">

          <!-- Sección 1 de la página CONTACT -->
          <div class="col-12 col-lg-8 p-3 p-lg-5">
            <h1 class="text-white my-5">¿PROBLEMAS<br> CON LA<br>COMPRA?</h1>
            <p class="text-white fs-4 my-5">La mejor manera de resolverlo rápidament es <a href="support/ticket.php">crear un ticket</a>.</p>
            <button id="contact-ticket" class="btn btn-warning">Crear ticket ahora</button>
          </div> <!-- ./seccion1 -->

          <!-- Sección 2 de la página CONTACT -->
          <div class="col-12 col-lg-4 p-3 p-lg-5 mt-1 mt-lg-5 contact-options">
            <h4 class="text-white">Desarrollo de Negocios</h4>
            <p class="contact-text">¿Quieres trabajar con nosotros o tienes preguntas relacionadas sobre el negocio? Contáctanos en:</p>
            <p class="contact-mail">business@buitrago.com</p>

            <h4 class="text-white mt-4">Departamento legal</h4>
            <p class="contact-text">Si tienes preguntas sobre asuntos legales, contáctanos en:</p>
            <p class="contact-mail">legal@buitrago.com</p>

            <h4 class="text-white mt-4">Equipo de Talento</h4>
            <p class="contact-text">¿Buscando un nuevo trabajo? Ponte en contacto con nuestro equipo de Talento en:</p>
            <p class="contact-mail">jobs@buitrago.com</p>
          </div> <!-- ./seccion2 -->

        </div>

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

  <!-- Script para que al pulsar el botón "Crear ticket ahora" me redireccione a la página de tickets -->
  <script>
    const btn = document.getElementById('contact-ticket'); // Obtener el botón por su ID
    btn.addEventListener('click', function() {
      window.location.href = 'support/ticket.php';
    });
  </script>

</body>

</html>