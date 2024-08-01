<?php
/* ==================================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		  |		Antonio Buitrago         ================
================================================================================== */

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
    <?php include('header.php'); ?>

    <!-- Aquí empieza el MAIN -->
    <main class="container-fluid p-3 pb-5 blackFriday-container"> <!-- container-fluid -->

        <div class="container"> <!-- container -->

            <div class="row">

                <div class="col bf-container">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="index.php" target="_self" title="Enlace a la página de portada"><img src="assets/img/logo.webp" alt="Imagen del logo"></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="products.php?p=0" target="_self" title="Enlace a la sección de juegos">Tienda</a></li>
                            <li class="breadcrumb-item"><a href="javascript:history.back()">Volver</a></li>
                            <li class="breadcrumb-item" aria-current="page">Ofertas Black Friday 2023</li>
                        </ol>
                    </nav>
                </div>

            </div> <!-- /.row -->

            <div class="row">

                <div class="col">

                    <h1 class="text-black">Ofertas de Black Friday 2023</h1>

                    <!-- Sección 1 de la página de ofertas de BLACK FRIDAY -->
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3">
                        <?php
                        $sql = "SELECT pr.*, pl.platformName AS plataforma, pl.platformLogo AS logotipo
                                FROM product pr
                                INNER JOIN platform pl ON pl.platformID = pr.platformID
                                WHERE pr.discount >= 50 
                                ORDER BY pr.discount DESC LIMIT 3";
                                
                        $resultado = $mysqli->query($sql);
                        while($fila = $resultado->fetch_object()) {
                        ?>

                        <!-- Card del Videojuego -->
                        <div class="item">

                            <div class="card" style="width: 18rem;">

                                <div class="imagen-card">
                                    <a href="articulo.php?id=<?= $fila->productID ?>" target="_self" title="Enlace al videojuego"><img src="<?= $fila->imageSource ?>" class="card-img-top"
                                    alt="Portada <?= $fila->productName ?>"></a>
                                </div>
                                
                                <!-- Contenedor para la imagen cuadrada superpuesta -->
                                <div class="overlay-image" style="position: absolute; top: 5px; left: 5px;">
                                    <img src="<?= $fila->logotipo ?>" alt="Imagen del logo de <?= $fila->plataforma ?>" style="width: 50px; height: 50px;">
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title"><?= $fila->productName ?></h5>
                                    <p class="card-text"><?= $fila->plataforma ?></p>
                                    <?php
                                        if($fila->discount == 0){
                                        echo '<p class="precio">' . $fila->price . ' &#8364;</p>';
                                        } else {
                                        $precioFinal = $fila->price * (1 - ($fila->discount / 100));
                                        echo '<p class="precio"><span class="oferta">-'. $fila->discount .' %</span>' . number_format($precioFinal, 2) . ' &#8364;</p>';
                                        }
                                    ?>
                                    <div class="d-flex justify-content-between">
                                        <a href="articulo.php?juego=<?= $fila->productID ?>" class="btn btn-success btn-sm d-flex align-items-center"><i class="fa-solid fa-magnifying-glass-plus" style="color: #ffffff;"></i></a>
                                        
                                        <!-- Botón añadir al carrito -->
                                        <?php
                                        $fechaActual = new DateTime(); // Fecha y hora actual
                                        $fechaComparar = new DateTime($fila->releaseDate); // Fecha a comparar
                                        $fechaFormateada = $fechaComparar->format('d/m/y'); // fecha formateada
                                        if ($fechaComparar > $fechaActual) {
                                            echo '<a href="#" class="btn btn-success btn-sm d-flex align-items-center gap-1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-cart mb-1" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                            </svg> Reservar (' . $fechaFormateada . ')</a>';
                                        } else {
                                            echo '<a href="controlador/addToCart.php?id='.$fila->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-cart mb-1" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                            </svg> Añadir al carrito</a>';
                                        }
                                        ?>
                                    </div>

                                </div>

                            </div> <!-- /.card -->

                        </div> <!-- /.item -->

                        <?php } // cierre del while ?> 

                    </div> <!-- /.seccion1 -->

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

</body>

</html>