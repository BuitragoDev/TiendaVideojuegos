<?php
/* ==========================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
========================================================================== */

  // Inicia una sesión de PHP o reanuda la sesión actual si existe una 
  session_start();

  // Conexión con la base de datos.
  include('conn_db.php');

  // Definimos el número de elementos y mensajes por página para el paginador.
  define('NUM_ITEMS_BY_PAGE', 12);
  define('NUM_MSG_BY_PAGE', 5);

  // Recogida de la variable de la URl con el id del producto seleccionado.
  $producto = $_GET['id'];

  // Consulta SQL que muestra los datos del producto seleccionado.
  $sql = "SELECT pr.*, pl.platformName AS plataforma
          FROM product pr
          INNER JOIN platform pl ON pl.platformID = pr.platformID
          WHERE pr.productID = $producto";
  $result = $mysqli->query($sql);

  // Recorremos el resultado y guardamos cada dato en una variable.
  while ($fila = $result->fetch_object()) {
    $productID = $fila->productID;
    $productName = $fila->productName;
    $productDescription = $fila->productDescription;
    $productType = $fila->productType;
    $category = $fila->category;
    $price = $fila->price;
    $releaseDate = $fila->releaseDate;
    $entryDate = $fila->entryDate;
    $discount = $fila->discount;
    $imageSource = $fila->imageSource;
    $plataforma = $fila->plataforma;
  }

  // Consulta de las valoraciones del producto, para las 3 ubicaciones donde aparecen las estrellas con la nota media.
  $sqlRating = "SELECT AVG(value) AS valoracionMedia FROM rating WHERE productID = $producto";
  $resultRating = $mysqli->query($sqlRating);

  $sqlRating2 = "SELECT AVG(value) AS valoracionMedia FROM rating WHERE productID = $producto";
  $resultRating2 = $mysqli->query($sqlRating2);

  $sqlRating3 = "SELECT AVG(value) AS valoracionMedia FROM rating WHERE productID = $producto";
  $resultRating3 = $mysqli->query($sqlRating3);

  // Consulta con el número total de las valoraciones del producto.
  $sqlTotals = "SELECT * FROM rating WHERE productID = $producto";
  $resultTotals = $mysqli->query($sqlTotals);
  $numResultados = $resultTotals->num_rows;

  // Consulta para saber el porcentaje de cada valoración que hay.
  $sqlPercentage = "SELECT value, COUNT(*) * 100.0 / (SELECT COUNT(*) 
                                                      FROM rating 
                                                      WHERE productID = $producto) AS percentage
                    FROM rating 
                    WHERE productID = $producto
                    GROUP BY value
                    ORDER BY value;";
  $resultPercentage = $mysqli->query($sqlPercentage);
  // ------------------------------------------------------------------------------------------

  // Consulta que muestra todos las reseñas que tiene el producto.
  $sqlMsg = "SELECT c.*, m.username AS usuario, p.productName AS nombreProducto, m.userAvatar AS avatar
              FROM comment c 
              JOIN member m ON m.memberID = c.memberID
              JOIN product p ON p.productID = c.productID
              WHERE c.productID = $producto && (c.message <> '' || c.messageTitle <> '')
              ORDER BY c.messageDate DESC";
  $resultMsg = $mysqli->query($sqlMsg);
  $num_total_rows = $resultMsg->num_rows;
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
  <?php include('header.php'); ?>

  <!-- Aquí empieza el MAIN -->
  <main class="container-fluid p-0 mb-5"> <!-- container-fluid -->

    <div class="container pt-3"> <!-- container -->

      <div class="row">

        <!-- Contenedor donde se encuentra el menú de navegación  -->
        <div class="col-12 products">

          <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb d-flex align-items-center">
              <li class="breadcrumb-item"><a href="index.php" target="_self" title="Enlace a la página de portada"><img
                    src="assets/img/logo.webp" alt="Imagen del logo"></a></li>
              <li class="breadcrumb-item"><a href="products.php?p=0">Tienda</a></li>
              <li class="breadcrumb-item"><a href="javascript:history.back()">Volver</a></li>
              <li class="breadcrumb-item">
                <?php echo $productName; ?>
              </li>
            </ol>
          </nav>
        </div>

      </div> <!-- /.row -->

      <div class="row">

        <!-- Contenedor donde se encuentra el nombre del producto  -->
        <div class="col-12">

          <h1 class="text-white">
            <?php echo $productName; ?>
          </h1>

        </div>

      </div> <!-- /.row -->

      <!-- Contenedor donde se encuentra los datos del producto, valoraciones, descripción, precio, etc  -->
      <div class="row my-3 d-flex flex-wrap justify-content-center justify-content-lg-start p-1 p-lg-0">

        <!-- Contenedor con la imagen del producto -->
        <div class="imagen-articulo col-12 col-lg-6">

          <img src="<?= $imageSource ?>" class="card-img-top img-fluid" alt="Portada <?= $productName ?>">

        </div>

        <!-- Contenedor con el nombre, la plataforma, valoración, precio y descripción del producto -->
        <div class="articulo-content col-12 col-lg-3">

          <h2>
            <?php echo $productName ?>
          </h2>
          <p><strong>Plataforma: </strong>
            <?php echo $plataforma ?>
          </p>
          <div class="fichas-listado-v2 d-flex justify-content-start mb-2">
            <div class="voto d-flex">
              <div class="voto-estrellas">
                <?php               
                    // Mostramos las estrellas de Rating
                    while ($filaRating = $resultRating->fetch_object()) {
                      $valoracionMedia = $filaRating->valoracionMedia;
                      $formattedValue = number_format($valoracionMedia, 1); // Mostrar siempre un decimal
                  
                      // Determinar el número de estrellas según el valor
                      $numEstrellasEnteras = floor($formattedValue);
                      $tieneMediaEstrella = ($formattedValue - $numEstrellasEnteras) >= 0.5;
                  
                      // Mostrar las estrellas completas
                      for ($i = 0; $i < 5; $i++) {
                          if ($numEstrellasEnteras > 0) {
                              echo '<i class="fas fa-star" style="color:#e6bf00;"></i>';
                              $numEstrellasEnteras--;
                          } else {
                              echo '<i class="fas fa-star" style="color:#CCC;"></i>';
                          }
                      }
                    } ?>
              </div>
              <div>
                &nbsp;&nbsp;<a href="#resenas"><?php echo $numResultados; ?>  valoraciones</a>
              </div>
            </div>
          </div>
          <?php
          if ($discount == 0) {
            echo '<p class="precio">' . $price . ' &#8364;</p>';
          } else {
            $precioFinal = $price * (1 - ($discount / 100));
            echo '<p class="precio"><span class="oferta">Oferta</span></p>';
            echo '<p class="precio"><span class="oferta">-' . $discount . ' %</span>' . number_format($precioFinal, 2) . ' &#8364;</p>';
          }
          ?>
          <p>Los precios incluyen IVA.</p>
          <hr>
          <p>
            <?php echo substr($productDescription, 0, 200) . '...' ?>
          </p>

        </div> <!-- /.articulo-content -->

        <!-- Contenedor con el precio y los botones de añadir al carrito y comprar -->
        <div class="articulo-venta col-12 col-lg-3 bg-white rounded px-3 pb-3 pt-3 px-lg-5 pb-lg-5 pt-lg-3">

          <?php
          if ($discount == 0) {
            echo '<h1>' . $price . ' &#8364;</h1>';
          } else {
            $precioFinal = $price * (1 - ($discount / 100));
            echo '<h1>' . number_format($precioFinal, 2) . ' &#8364;</h1>';
          }
          ?>

          <hr>
          <p>Devoluciones GRATIS</p>
          <?php
            // A modo de ejemplo, mostramos por pantalla como fecha, 3 y 7 días más de la fecha actual.
            $fecha_actual = date("Y-m-d");
            $fecha_rapida = strtotime($fecha_actual . "+ 3 days");
            $fecha_entrega = strtotime($fecha_actual . "+ 7 days");
            $fecha_futura_rapida = date("l, d-m-Y", $fecha_rapida);
            $fecha_futura_entrega = date("l, d-m-Y", $fecha_entrega);
          ?>
          <p>Entrega GRATIS el <strong><?= $fecha_futura_rapida ?></strong> en tu primer pedido.</p>
          <p>Entrega más rápida el <strong><?= $fecha_futura_entrega ?></strong>. <a href="support/how_to_buy.php">Ver detalles</a></p>

          <hr>

          <?php
            $fechaActual = new DateTime(); // Fecha y hora actual
            $fechaComparar = new DateTime($releaseDate); // Fecha a comparar
            $fechaFormateada = $fechaComparar->format('d/m/y'); // fecha formateada
            if ($fechaComparar > $fechaActual) {
              echo '<button class="btn btn-danger rounded w-100">Reservar (' . $fechaFormateada . ')</button>';
            } else {
              echo '<button id="addToCartBtn" class="btn btn-warning rounded w-100 mb-2">Añadir a la cesta</button>
                    <button id="buyNowBtn" class="btn btn-success rounded w-100">Comprar ya</button>';
              
            }
          ?>
        </div> <!-- /.articulo-venta -->

      </div> <!-- /.row -->


      <div class="row articulo-recomendados my-3 d-flex flex-wrap justify-content-center justify-content-lg-start">

        <hr>  

        <!-- Aquí empieza el contenedor de Juegos Recomendados -->
        <div class="container mt-1">

          <h3 class="text-white">Productos destacados que te pueden interesar</h3>

          <div class="owl-carousel-container p-0 d-flex flex-column-reverse flex-md-column">
                <div class="custom-navArticleRecomendados d-flex gap-2 justify-content-center justify-content-lg-start">
                  <button class="owl-prevArticleRecommended btn btn-primary me-lg-2" type="button"><i class="fa-solid fa-chevron-left"></i></button>
                  <button class="owl-nextArticleRecommended btn btn-primary" type="button"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
          <div class="owl-carousel owl-carouselArticulosRecomendados d-flex justify-content-center">
            <?php
              $sqlRecomendados = "SELECT pr.*, pl.platformLogo AS logo, pl.platformName AS plataforma 
                                  FROM product pr
                                  JOIN platform pl ON pl.platformID = pr.platformID 
                                  WHERE pr.category = '$category' OR pl.platformName = '$plataforma'
                                  ORDER BY pr.releaseDate DESC LIMIT 10;";
                      
              $resultadoRecomendados = $mysqli->query($sqlRecomendados);
              while($filaRecomendados = $resultadoRecomendados->fetch_object()) {
            ?>

            <!-- Videojuegos Recomendados del Carrusel -->
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
                            echo '<a href="controlador/addToCart.php?id='.$filaRecomendados->productID.'&anadir='.$filaRecomendados->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
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
            <?php } // cierre del while ?> 

          </div> <!-- /.Owl-Carousel -->

        </div> <!-- /. juegos-recomendados -->  

      </div> <!-- /.row --> 

      <!-- Contenedor con los detalles del producto -->
      <div class="row detalles-tecnicos my-3 d-flex flex-wrap justify-content-center justify-content-lg-start">

        <hr> 

        <h3 class="text-white">Información del producto</h3>
        <div class="col-12 col-md-6">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="table table-primary align-middle">Nº Referencia:</th>
                  <td scope="col" class="table align-middle"><?php echo $productID;  ?></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="col" class="table table-primary align-middle">Nombre producto:</th>
                  <td class="table align-middle"><?php echo $productName;  ?></td>
                </tr>
                <tr>
                  <th scope="col" class="table table-primary align-top">Descripción:</th>
                  <td class="table align-top"><?php echo $productDescription;  ?></td>
                </tr>
                <tr>
                  <th scope="col" class="table table-primary align-middle">Tipo de producto:</th>
                  <td class="table align-middle"><?php echo $productType;  ?></td>
                </tr>
                <tr>
                  <th scope="col" class="table table-primary align-middle">Plataforma:</th>
                  <td class="table align-middle"><?php echo $plataforma;  ?></td>
                </tr>
                <tr>
                  <th scope="col" class="table table-primary align-middle">Categoría:</th>
                  <td class="table align-middle"><?php echo $category;  ?></td>
                </tr>
                <tr>
                  <th scope="col" class="table table-primary align-middle">Fecha de lanzamiento:</th>
                  <td class="table align-middle">
                    <?php 
                        $lanzamiento = new DateTime($releaseDate); // Fecha a comparar
                        $fechaFormateada = $lanzamiento->format('d/m/Y'); // fecha formateada
                        echo $fechaFormateada;  
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>             
        </div>

        <div class="col-12 col-md-6">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="table table-primary align-middle">Valoración media de los clientes:</th>
                  <td scope="col" class="estrellas-detalle table align-middle">
                    <div class="voto d-flex">
                          <?php
                            while ($filaRating2 = $resultRating2->fetch_object()) {
                              $valoracionMedia2 = $filaRating2->valoracionMedia;
                              $formattedValue2 = number_format($valoracionMedia2, 1); // Mostrar siempre un decimal
                          
                              // Determinar el número de estrellas según el valor
                              $numEstrellasEnteras2 = floor($formattedValue2);
                              $tieneMediaEstrella2 = ($formattedValue2 - $numEstrellasEnteras2) >= 0.5;
                          
                              // Mostrar las estrellas completas
                              for ($i2 = 0; $i2 < 5; $i2++) {
                                  if ($numEstrellasEnteras2 > 0) {
                                      echo '<i class="fas fa-star" style="color:#e6bf00;"></i>';
                                      $numEstrellasEnteras2--;
                                  } else {
                                      echo '<i class="fas fa-star" style="color:#CCC;"></i>';
                                  }
                              }
                              echo '<span class="text-black">&nbsp;&nbsp;' . $formattedValue2 . ' de 5</span>';
                          } ?>
                    </div>
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="col" class="table table-primary align-middle">Producto en tienda desde:</th>
                  <td class="table align-middle">
                      <?php 
                        $fechaEntrada = new DateTime($entryDate); // Fecha a comparar
                        $fechaEntradaFormateada = $fechaEntrada->format('d/m/Y'); // fecha formateada
                        echo $fechaEntradaFormateada;  ?>
                  </td>
                </tr>
              </tbody>
            </table>  

            <h5>Ayúdanos a mejorar</h5>    

            <hr style="margin: 5px 0px;">

            <p><a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">¿Quieres informarnos sobre un precio más bajo?</a></p>

            <!-- Modal con la ventana de informar de un precio más bajo -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Infórmanos de un precio más bajo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p style="font-size: 0.8em; padding: 5px;"><img src="<?= $imageSource ?>" alt="" style="width:140px; float:left; margin-right:10px;"><?= $productDescription ?></p>
                    <hr style="background-color: #000;">
                    <p>¿Has encontrado un precio más bajo? Infórmanos. Aunque no podamos igualar todos los precios que nos envíes, utilizaremos tu comentario para asegurarnos de que nuestros precios siguen siendo competitivos.</p>
                    <h4>¿Dónde has visto un precio más bajo?</h4>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">Página Web (en línea)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                      <label class="form-check-label" for="flexRadioDefault2">Tienda (física)</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button id="enviar-opinion" type="button" class="btn btn-warning" data-bs-dismiss="modal">Enviar opinión</button>
                  </div>
                </div>
              </div>

            </div> <!-- /.modal -->

        </div> <!-- /.col -->

      </div> <!-- /.row -->

      <!-- Contenedor con las reseñas del producto -->
      <div id="resenas" class="row my-3 d-flex flex-wrap justify-content-center justify-content-lg-start">

        <hr> 

        <div class="col-12 col-lg-4 ratings mb-3 mb-lg-0">

            <h4>Opiniones de clientes</h4>

            <?php               
              // Mostramos las estrellas de Rating
              while ($filaRating3 = $resultRating3->fetch_object()) {
                $valoracionMedia3 = $filaRating3->valoracionMedia;
                $formattedValue3 = number_format($valoracionMedia3, 1); // No mostrar ningún decimal
            
                // Determinar el número de estrellas según el valor
                $numEstrellasEnteras3 = floor($formattedValue3);
                $tieneMediaEstrella3 = ($formattedValue3 - $numEstrellasEnteras3) >= 0.5;
            
                // Mostrar las estrellas completas
                for ($i3 = 0; $i3 < 5; $i3++) {
                    if ($numEstrellasEnteras3 > 0) {
                        echo '<i class="fas fa-star" style="color:#e6bf00;"></i>';
                        $numEstrellasEnteras3--;
                    } else {
                        echo '<i class="fas fa-star" style="color:#CCC;"></i>';
                    }
                }
                echo '<span class="text-white">&nbsp;&nbsp;' . $formattedValue3 . ' de 5</span>';
              }
            ?>

            <p class="text-white"><?php echo $numResultados; ?> calificaciones globales</p>

            <!-- Mostramos los porcentajes de 5, 4, 3, 2 y 1 estrellas -->
            <div class="col-12 estrellas5 d-flex flex-column justify-content-start gap-1">

                <?php
                $valuesData = []; // Array para almacenar los valores obtenidos de la consulta SQL

                // Procesar los datos de la consulta SQL
                while ($filaPercentage = $resultPercentage->fetch_object()) {
                    $valuesData[$filaPercentage->value] = floor($filaPercentage->percentage);
                }

                // Iterar sobre todos los valores posibles (1 a 5) y mostrar la salida correspondiente
                for ($value = 1; $value <= 5; $value++) {
                    $roundedPercentage = $valuesData[$value] ?? 0; // Obtener el valor del porcentaje si existe, de lo contrario, establecer en 0

                    // Código para mostrar las iteraciones
                    ?>
                    <div class="row d-flex w-100">
                        <div class="col-4 d-flex justify-content-start align-items-center"><span class="text-white"><?= $value ?> estrellas</span></div>
                        <div class="col-5 d-flex justify-content-start align-items-center rounded p-0" style="background-color: #ccc;">
                            <div class="rellenoRating rounded-start" style="width:<?= $roundedPercentage ?>%;">&nbsp;</div>
                        </div>
                        <div class="col-3 d-flex justify-content-end align-items-center"><span class="text-white"><?= $roundedPercentage ?> %</span></div>
                    </div>
                    <?php
                } ?>
            </div>

            <hr> 

            <h4>Valorar este producto</h4>

            <p class="text-white">Comparte tu opinión con otros clientes</p>
            <?php
            if (isset($_SESSION['usuario'])) {
                echo '<button type="button" class="btn btn-sm btn-light w-100" data-bs-toggle="modal" data-bs-target="#modalNewMessage">Escribir mi opinión</button>';
            } else {
              echo '<button id="goToLoginButton" type="button" class="btn btn-sm btn-light w-100">Loguéate para dejar tu opinión</button>';
            }
            ?>
            
            <!-- Modal con el formulario para escribir una opinión -->
            <div class="modal fade" id="modalNewMessage" tabindex="-1" aria-labelledby="modalNewMessageLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalNewMessageLabel">Déjanos tu opinión del producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="controlador/addReview.php?member=<?= $_SESSION['usuario'] ?>&product=<?= $producto ?>" method="POST">
                          <div class="mb-3">
                              <input type="hidden" name="idProducto" value="<?= $producto ?>">
                              <label class="rating-label">
                                Valoración general
                                <input name="votacion"
                                  class="rating"
                                  min="1"
                                  max="5"
                                  oninput="this.style.setProperty('--value', this.value)"
                                  step="1"
                                  type="range"
                                  value="1">
                              </label>
                          </div>
                          <div class="mb-3">
                            <label for="titulo" class="form-label">Añade un título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" maxlength="100" placeholder="¿Qué es lo más importante?">
                          </div>
                          <div class="mb-3">
                            <label for="mensaje" class="form-label">Añadir una reseña escrita</label>
                            <textarea class="form-control resize-none" id="mensaje" name="mensaje" rows="5" placeholder="¿Qué te ha gustado y qué no? ¿Para qué usaste este producto?"></textarea>
                          </div>
                      
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-success">Enviar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div> <!-- /.modal -->


        </div> <!-- /.col -->

        <div class="col-12 col-lg-8">
            <h4>Leer reseñas</h4>

              <?php
                  $sqlMsg = "SELECT c.*, m.username AS usuario, p.productName AS nombreProducto, m.userAvatar AS avatar
                             FROM comment c 
                             JOIN member m ON m.memberID = c.memberID
                             JOIN product p ON p.productID = c.productID
                             WHERE c.productID = $producto && (c.message <> '' || c.messageTitle <> '')
                             ORDER BY c.messageDate DESC";
                  $resultMsg = $mysqli->query($sqlMsg);
                  $num_total_rows = $resultMsg->num_rows;

                  if ($num_total_rows > 0) {
                    $page = false;
                
                    //Examino la pagina a mostrar y el inicio del registro a mostrar
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    }
                
                    if (!$page) {
                        $start = 0;
                        $page = 1;
                    } else {
                        $start = ($page - 1) * NUM_MSG_BY_PAGE;
                    }
                    //Calculo el total de paginas
                    $total_pages = ceil($num_total_rows / NUM_MSG_BY_PAGE);

                    $sqlMsg = "SELECT c.*, m.username AS usuario, p.productName AS nombreProducto, m.userAvatar AS avatar
                               FROM comment c 
                               JOIN member m ON m.memberID = c.memberID
                               JOIN product p ON p.productID = c.productID
                               WHERE c.productID = $producto && (c.message <> '' || c.messageTitle <> '')
                               ORDER BY c.messageDate DESC LIMIT ".$start.", ".NUM_MSG_BY_PAGE."";
                    $resultMsg = $mysqli->query($sqlMsg);

                
                        while ($filaMsg = $resultMsg->fetch_object()) {
                          $fecha_bd = new DateTime($filaMsg->messageDate);
                          $fecha_formateada = $fecha_bd->format('d/m/Y \a \l\a\s H:i');  
                    ?>

                              <div class="message-container">
                                <div class="user-info">
                                    <img src="<?php echo $filaMsg->avatar; ?>" alt="Foto de perfil">
                                    <div class="user-details">
                                        <h6><?php echo $filaMsg->usuario; ?></h6>
                                        <p class="date"><?php echo $fecha_formateada; ?></p>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h6><?php echo $filaMsg->messageTitle; ?></h6>
                                    <p class="message-text"><?php echo $filaMsg->message; ?></p>
                                </div>
                              </div>
                  <?php } 

                        echo '<nav class="text-center mt-3 w-100 d-flex justify-content-center" aria-label="Page navigation example">';
                        echo '<ul class="pagination">';

                        if ($total_pages > 1) {
                            if ($page != 1) {
                                echo '<li class="page-item"><a class="page-link" href="articulo.php?id='.$producto.'&page='.($page-1).'#resenas"><span aria-hidden="true">&laquo;</span></a></li>';
                            }

                            for ($i=1;$i<=$total_pages;$i++) {
                                if ($page == $i) {
                                    echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="articulo.php?id='.$producto.'&page='.$i.'#resenas">'.$i.'</a></li>';
                                }
                            }

                            if ($page != $total_pages) {
                                echo '<li class="page-item"><a class="page-link" href="articulo.php?id='.$producto.'&page='.($page+1).'#resenas"><span aria-hidden="true">&raquo;</span></a></li>';
                            }
                        }
                        echo '</ul>';
                        echo '</nav>';
                  } else {
                    echo '<p class="sinresenas text-white">Este producto no tiene ninguna reseña.</p>';
                  }
                ?>

        </div> <!-- /.col -->

      </div> <!-- /.row -->

    </div> <!-- /.container -->

  </main> <!-- /.container-fluid -->

  <!-- Footer (Contiene el área de ayuda y redes sociales) -->
  <?php include('footer.php') ; ?> 

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Vinculación de los JS -->
  <script src="js/scripts.js"></script>

  <!-- Script para el evento click de los botones de Añadir a la cesta y Comprar ya -->
  <script>
    // Evento para el botón "Añadir a la cesta"
    document.getElementById("addToCartBtn").addEventListener("click", function() {
      window.location.href = "controlador/addToCart.php?id=<?= $producto ?>&anadir=<?= $producto ?>";
    });

    // Evento para el botón "Comprar ya"
    document.getElementById("buyNowBtn").addEventListener("click", function() {
      window.location.href = "checkout/cart.php";
    });
  </script>

</body>

</html>
