<?php
/* ==================================================================================
================	URL 		      |		www.antoniobuitrago.es   ========================
================	Author Name		|		Antonio Buitrago         ========================
================================================================================== */

  // Inicia una sesión de PHP o reanuda la sesión actual si existe una.
  session_start();

  // Conexión con la base de datos.
  include("../conn_db.php");

  // Si existe una sesión de usuario...
  if(isset($_SESSION['usuario'])){

    $member = $_SESSION['usuario']; // Creación de variable $member con el valor del usuario activo/logueado.

    // Buscamos los elementos del carrito para el usuario actual.
    $sql = "SELECT p.*, c.*, m.username FROM product p, cart c, member m WHERE c.memberID = m.memberID AND p.productID = c.productID AND m.username = '" . $member . "'";
    $resultado = $mysqli->query($sql);
    $num_rows = $resultado->num_rows; // Comprobamos el número de artículos del carrito.

    // Creamos un array con las categorías de los productos seleccionados.
    $categories = array(); // Array para almacenar las categorías
    $sqlCategorias = "SELECT p.*, c.*, m.username FROM product p, cart c, member m WHERE c.memberID = m.memberID AND p.productID = c.productID AND m.username = '" . $member . "'";
    $resultadoCategorias = $mysqli->query($sql);

    while ($filaCategorias = $resultadoCategorias->fetch_assoc()) {
        $categories[] = $filaCategorias['category'];
    }

  } else {

    $num_rows = 0; // Si no hay un usuario logueado, el número de productos en el carrito es 0.

  }
  
  $precioTotal = 0; // Inicialización del precio total a 0 euros.
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
  <title>..:: Videojuegos Buitrago - Tienda Online | Checkout ::..</title>

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
  <main class="container-fluid p-0 mb-5"> <!-- container-fluid -->

    <div class="container cart pt-3 px-3 pt-lg-5 px-lg-0"> <!-- container -->

      <!-- Sección 1 de la página CART (Menú de navegación del checkout) -->
      <div class="row w-100">
        <div class="checkout col-12 gap-0 gap-lg-5 mb-4 d-flex flex-column flex-lg-row">
          <div class="w-100 w-lg-25"><p style="color: #ffc107;"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;1. Carro</p></div>
          <div class="w-100 w-lg-25"><p class="text-white"><i class="fa-regular fa-credit-card"></i>&nbsp;&nbsp;2. Datos de Envío</p></div>
          <div class="w-100 w-lg-25"><p class="text-white"><i class="fa-solid fa-box-archive"></i>&nbsp;&nbsp;3. Pago</p></div>
        </div>
      </div> <!-- ./seccion1 -->

      <div class="row d-flex justify-content-between gap-2">

        <!-- Sección 2 de la página CART (Listado de productos) -->
        <div class="checkout-container checkout-left col-12 col-lg-8 p-3 border border-secondary rounded">
            <h5 class="text-uppercase mx-2">Tu carrito</h5>
            <?php 
              if($num_rows > 0) {
                while ($fila = $resultado->fetch_object()) { 
              ?>
                    <!-- Contenedor elementos del carrito -->
                    <div class="row d-flex cart-element my-2 mx-2 p-2 gap-3 gap-lg-0">
                      <div class="col-12 col-lg-2">
                        <a href="../articulo.php?id=<?= $fila->productID ?>"><img class="img-fluid mt-2 rounded" src="../<?= $fila->imageSource ?>" alt="Imagen del producto <?= $fila->productName ?> del carrito"></a>
                      </div>
                      <div class="col-12 col-lg-9">
                        <div class="row d-flex justify-content-between">
                          <div class="col-6 d-flex justify-content-start promotional"><?php if($fila->discount > 0){ echo "Precio promocional"; } ?></div>
                          <div class="col-6 d-flex justify-content-end"><a href="../controlador/deleteFromCart.php?id=<?= $fila->productID ?>&member=<?= $member ?>"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></a></div>
                        </div>
                        <div class="row d-flex justify-content-between">
                          <div class="col-6 d-flex flex-column justify-content-start">
                            <h4><a href="../articulo.php?id=<?= $fila->productID ?>"><?= $fila->productName ?></a></h4>
                          </div>
                          <div class="col-6 d-flex justify-content-end align-items-center"><h4>
                            <?php
                              $precioFinal = $fila->price * (1 - ($fila->discount / 100));
                              echo number_format($precioFinal, 2) . " &euro;";
                            ?>
                          </h4></div>
                        </div>
                      </div>
                    </div> <!-- Fin del elemento -->
                <?php 
                  $precioTotal = $precioTotal + number_format($precioFinal, 2);

                } // Cierre del WHILE

              } else { ?>

                <p class="mt-3 mx-2">No hay productos en el carrito.</p>

              <?php } ?>

        </div> <!-- ./seccion2 -->

        <!-- Sección 3 de la página CART (Resumen del Carrito) -->
        <div class="checkout-container checkout-right col-12 col-lg-3 p-3 border border-secondary rounded">

            <h5 class="text-uppercase">Resumen</h5>
            <?php if($num_rows > 0) { ?> <!-- Si no hay productos en el carrito desactivamos el botón de 'Continuar con la compra' -->
                      <a type="button" class="btn btn-warning w-100 my-3" href="shipping.php" target="_self" title="Enlace a la pantalla de pagos">Continuar con la compra</a>
            <?php } else { ?>
                      <a type="button" class="btn btn-warning w-100 my-3 disabled" href="shipping.php" target="_self" title="Enlace a la pantalla de pagos">Continuar con la compra</a>
            <?php } ?>
            <div class="row">
              <div class="col d-flex justify-content-start align-items-center"><?= $num_rows ?> productos</div>
              <div class="col d-flex justify-content-end align-items-center"><?= $precioTotal ?>&nbsp;&euro;</div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-6 d-flex justify-content-start align-items-start">21% de IVA incluido</div>
              <div class="col-12 col-lg-6 d-flex justify-content-end align-items-start"><?= number_format($precioTotal * 0.21, 2) ?>&nbsp;&euro;</div>
            </div>
            <hr class="my-5 w-100">
            <div class="row">
              <div class="col d-flex justify-content-start align-items-center"><h5>Total:</h5></div>
              <div class="col d-flex justify-content-end align-items-center"><h2><?= $precioTotal ?>&nbsp;&euro;</h2></div>
            </div>
            <div class="row d-flex justify-content-center align-items-center mt-4">
              <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                <?php 
                for($i = 1; $i <= 5; $i++){ // Mostramos 5 estrellas Trustpilot
                  echo '<img src="../assets/img/icons/trust-pilot.webp" alt="Estrella Trustpilot">';
                }
                ?>
              </div>
              <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center cart-summary"><a href="#"><span class="font-light" style="font-size:0.8em;">Lee nuestras opiniones</span></a></div>

            </div>

        </div> <!-- ./seccion3 -->

      </div> <!-- ./row -->

    </div> <!-- ./container -->

    <!-- Sección 4 de la página CART (Recomendaciones según los artículos comprados) -->
    <div class="container mt-5">

      <div class="row">

        <div class="col-12">

          <?php
            // Si existe una sesión de usuario...
            if(isset($_SESSION['usuario'])){
                if($num_rows > 0){
          ?>

          <h3 class="text-white">Inspirado basándonos en tus selecciones</h3>

          <div class="owl-carousel-container p-0 d-flex flex-column-reverse flex-md-column">
                <div class="custom-navCart d-flex gap-2 justify-content-center justify-content-lg-start">
                  <button class="owl-prevCart btn btn-primary me-lg-2" type="button"><i class="fa-solid fa-chevron-left"></i></button>
                  <button class="owl-nextCart btn btn-primary" type="button"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
          <div class="owl-carousel owl-carouselCart d-flex justify-content-center">
            <?php
                } // cierre del if($num_rows > 0)
                $categoriaList = "'" . implode("', '", $categories) . "'"; // Datos del array categories:

                $sqlRecomendados = "SELECT pr.*, pl.platformLogo AS logo, pl.platformName AS plataforma 
                                    FROM product pr
                                    JOIN platform pl ON pl.platformID = pr.platformID 
                                    WHERE pr.category IN ($categoriaList)
                                    ORDER BY pr.releaseDate DESC LIMIT 10;";
                        
                $resultadoRecomendados = $mysqli->query($sqlRecomendados);
                while($filaRecomendados = $resultadoRecomendados->fetch_object()) {
            ?>
                <!-- Videojuegos Recomendados del Carrusel -->
                <div class="item">
                  <div class="card" style="width: 18rem;">
                  <div class="imagen-card">
                      <a href="../articulo.php?id=<?= $filaRecomendados->productID ?>" target="_self" title="Enlace al videojuego"><img src="../<?= $filaRecomendados->imageSource ?>" class="card-img-top"
                      alt="Portada <?= $filaRecomendados->productName ?>"></a>
                  </div>
                    
                    <!-- Contenedor para la imagen cuadrada superpuesta -->
                    <div class="overlay-image" style="position: absolute; top: 5px; left: 5px;">
                        <img src="../<?= $filaRecomendados->logo ?>" alt="Imagen del logo de <?= $filaRecomendados->plataforma ?>" style="width: 50px; height: 50px;">
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
                          <a href="../articulo.php?id=<?= $filaRecomendados->productID ?>" class="btn btn-success btn-sm d-flex align-items-center"><i class="fa-solid fa-magnifying-glass-plus" style="color: #ffffff;"></i></a>
                          
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
                                echo '<a href="../controlador/addToCart.php?id='.$filaRecomendados->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
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
            
              } // cierre del if(isset($_SESSION['usuario'])) ?> 

          </div> <!-- ./owl-carousel -->

        </div> <!-- ./col -->

      </div> <!-- ./row -->

    </div> <!-- ./container -->

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