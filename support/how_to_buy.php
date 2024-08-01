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

    <div class="container how-to-buy pt-3">

        <!-- Contenedor donde se encuentra el menú de navegación de la sección de soporte -->
        <div class="row">
          <div class="col-12">
          <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb d-flex align-items-center">
                <li class="breadcrumb-item"><a href="../index.php" target="_self" title="Enlace a la página de portada"><img src="../assets/img/logo.webp" alt="Imagen del logo"></a></li>
                <li class="breadcrumb-item"><a href="ticket.php" target="_self" title="Enlace a la página principal de tickets">Support</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos digitales</li>
                <li class="breadcrumb-item active" aria-current="page">¿Cómo comprar?</li>
              </ol>
            </nav>
          </div>
        </div> <!-- /.menu-navegación -->

        <!-- Sección 1 de la página COMO COMPRAR (título y buscador) -->
        <div class="row">
          <div class="col-12 col-lg-8">
            <h1 class="text-white">¿Cómo comprar?</h1>
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

        <!-- Sección 2 de la página COMO COMPRAR (texto) -->
        <div class="row">
          <div class="col-12 my-5">
            <p>Si eres nuevo en BUITRAGO o no estás seguro de cómo empezar, ¡no te preocupes! Tenemos esta guía paso a paso para que aprendas a comprar rápidamente ese juego que tanto quieres.</p>
            <p>Primer paso, el registro es opcional. No necesitas estar registrado en nuestra web para comprar, pero si te registras tendrás acceso a todas las compras que has realizado desde un mismo lugar además de poderte iniciar sesión fácilmente ¡mediante las aplicaciones sociales! Si decides registrarte antes de comprar selecciona <a href="../register.php" target="_self" title="Enlace a la página de login de usuarios">Registrarse</a> y rellena la información requerida.</p>
            <p>Después verifica tu email y ¡listo! Ahora eres parte de la familia BUITRAGO. También te puedes suscribir a nuestro Boletín de Noticias para recibir ofertas así, como las últimas noticias.</p>
            <p>Ahora que tienes una cuenta (puedes encontrar como conectar las apps sociales en nuestro soporte), ¡estás preparado para comprar tus juegos favoritos! Puedes navegar a través de las categorías, seleccionar un rango de precios, consultar los más populares, la plataforma... todo en BUITRAGO. Una vez que encuentres el juego o el bundle que te gustaría jugar, puedes comprarlo a través de la página del producto. Asegúrate de que el juego que vas a comprar es de la plataforma que quieres, que se puede activar desde tu país y que las especificaciones de tu sistema lo soporta, para que no tengas problemas a la hora de activarlo.</p>
            <p>Si decides comprar el juego, no olvides desplazarte hacia abajo y consultar otras ofertas. Allí puedes ver las ofertas de otros proveedores que pueden diferir en los términos y condiciones de venta, incluidos los términos de entrega, pago y devolución.</p>
            <p>Una vez elegida la oferta, haz clic en "Añadir al carrito" si deseas continuar navegando o en "Comprar ahora" y te le llevará inmediatamente al carrito.</p>
            <p>En la confirmación del pago puedes valorar tu pedido y también usar un código de descuento. Puedes recibir códigos de descuento a través del Boletín de Noticias, ¡no olvides suscribirte! En el siguiente paso selecciona el método de pago dentro de las opciones que te proporciona BUITRAGO y rellena los detalles. Cuando el pago se efectue, ¡voila! Tendrás una código de activación de tu juego. Podrás copiar la clave desde la bibioteca si eres un usuario registrado a través del email de confirmación que vas a recibir. Puedes también consultar las guías de cómo activar un juego en una plataforma específica.</p>
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