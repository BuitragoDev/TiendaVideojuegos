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

  // Recogemos si se ha seleccionado el orden de muestreo.
  // Verificar si se accede por primera vez sin paginador, eliminar la variable de sesión si existe
  if (!isset($_GET['order']) && !isset($_GET['page'])) {
    unset($_SESSION['filtro_order']);
  }

  if (isset($_GET['order'])) {
    $ordenador = $_GET['order'];
    switch ($ordenador) {
        case 1:
            $order = "pr.price * (1 - pr.discount / 100) ASC";
            break;
        case 2:
            $order = "pr.price * (1 - pr.discount / 100) DESC";
            break;
        case 3:
            $order = "pr.productID ASC";
            break;
        case 4:
            $order = "pr.releaseDate DESC";
            break;
        default:
            $order = 'pr.productID DESC';
            break;
    }

    // Guardar el orden en la sesión
    $_SESSION['filtro_order'] = $order;
  } elseif (isset($_GET['page']) && isset($_SESSION['filtro_order'])) {
    // Si hay paginación y existe un orden en la sesión, usarlo
    $order = $_SESSION['filtro_order'];
  } else {
    // En cualquier otro caso, establecer un orden predeterminado
    $order = 'pr.productID DESC';
  }

  // Comprobamos si estamos entrando en productos a través del buscador.
  if(isset($_GET['buscar'])) {
    $buscador = $_GET['buscar'];
    $plataforma = "Busqueda del término" . $buscador;

    $sql = "SELECT pr.*, pl.platformName AS plataforma, pl.platformLogo AS logotipo
            FROM product pr
            INNER JOIN platform pl ON pl.platformID = pr.platformID
            WHERE pr.productName LIKE '%$buscador%'
            OR pr.productDescription LIKE '%$buscador%'
            OR pr.category LIKE '%$buscador%'
            OR pl.platformName LIKE '%$buscador%'";
    $resultado = $mysqli->query($sql);
    $_SESSION['filtro_buscador'] = $buscador;
    $num_total_rows = $resultado->num_rows;
  } else {
    header("Location: index.php");
  }  

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

    <div class="container pt-3"> <!-- container -->

        <div class="row">

          <div class="col-12 products">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb d-flex align-items-center">
                <li class="breadcrumb-item"><a href="index.php" target="_self" title="Enlace a la página de portada"><img src="assets/img/logo.webp" alt="Imagen del logo"></a></li>
                <?php
                    echo '<li class="breadcrumb-item active" aria-current="page"><a href="products.php?p=0" target="_self" title="Enlace a la sección de juegos">Tienda</a></li>';
                    echo '<li class="breadcrumb-item active" aria-current="page">Búsqueda por el término "' . $buscador . '"</li>';
                ?>
                
              </ol>
            </nav>
          </div>
        </div> <!-- /.row -->

        <div class="row">
          <div class="col-12">
            <?php
                echo '<h1 class="text-white">Resultados encontrados: ' . $num_total_rows . '</h1>';
            ?>
          </div>
        </div> <!-- /.row -->

        <!-- Contenedor de los filtros de búsqueda -->
        <div class="row">
              <div class="filtrado col-11 d-flex justify-content-end align-items-center gap-3 gap-lg-2">
                <div class="btn-group mt-3 mt-lg-1">
                  <button type="button" class="btn btn-sm btn-light"><i class="fa-solid fa-arrow-down-wide-short fs-5"></i></button>
                  <button type="button" class="btn btn-sm btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="productSearch.php?buscar=<?= $_GET['buscar'] ?>&order=1">Precio: menor a mayor</a></li>
                    <li><a class="dropdown-item" href="productSearch.php?buscar=<?= $_GET['buscar'] ?>&order=2">Precio: mayor a menor</a></li>
                    <li><a class="dropdown-item" href="productSearch.php?buscar=<?= $_GET['buscar'] ?>&order=3">Valoraciones</a></li>
                    <li><a class="dropdown-item" href="productSearch.php?buscar=<?= $_GET['buscar'] ?>&order=4">Últimos lanzamientos</a></li>
                  </ul>
                </div>
                <a class="btn btn-light mt-3 mt-lg-1" data-bs-toggle="offcanvas" href="#canvas-filtrado" role="button" aria-controls="offcanvas-filtrado"><i class="fa-solid fa-sliders fs-5"></i></a>
              </div>
              <div class="offcanvas offcanvas-start" tabindex="-1" id="canvas-filtrado" aria-labelledby="offcanvascanvas-filtrado">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title text-center" id="offcanvasExampleLabel">Filtrar por:</h5>
                  <button type="button" class="btn-close btn-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex justify-content-center">
                  <form action="products.php?p=13&order=3" method="POST">
                      <h3>Categoría:</h3>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Deportes" id="deportesFiltrado" name="categoria[]">
                        <label class="form-check-label" for="deportesFiltrado">Deportes</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Combate" id="combateFiltrado" name="categoria[]">
                        <label class="form-check-label" for="combateFiltrado">Combate</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Carreras" id="carrerasFiltrado" name="categoria[]">
                        <label class="form-check-label" for="carrerasFiltrado">Carreras</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Aventuras" id="aventurasFiltrado" name="categoria[]">
                        <label class="form-check-label" for="aventurasFiltrado">Aventuras</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Simulación" id="simulacionFiltrado" name="categoria[]">
                        <label class="form-check-label" for="simulacionFiltrado">Simulación</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Supervivencia" id="supervivenciaFiltrado" name="categoria[]">
                        <label class="form-check-label" for="supervivenciaFiltrado">Supervivencia</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Estrategia" id="estrategiaFiltrado" name="categoria[]">
                        <label class="form-check-label" for="estrategiaFiltrado">Estrategia</label>
                      </div>

                      <h3>Tipo:</h3>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Juego" id="juegoFiltrado" name="tipo[]">
                        <label class="form-check-label" for="juegoFiltrado">Juego</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Accesorio" id="accesorioFiltrado" name="tipo[]">
                        <label class="form-check-label" for="accesorioFiltrado">Accesorio</label>
                      </div>

                      <h3>Plataforma:</h3>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="play1Filtrado" name="plataforma[]">
                        <label class="form-check-label" for="play1Filtrado">PlayStation 1</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="play2Filtrado" name="plataforma[]">
                        <label class="form-check-label" for="play2Filtrado">PlayStation 2</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="play3Filtrado" name="plataforma[]">
                        <label class="form-check-label" for="play3Filtrado">PlayStation 3</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="4" id="play4Filtrado" name="plataforma[]">
                        <label class="form-check-label" for="play4Filtrado">PlayStation 4</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="5" id="play5Filtrado" name="plataforma[]">
                        <label class="form-check-label" for="play5Filtrado">PlayStation 5</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="6" id="xboxseriesFiltrado" name="plataforma[]">
                        <label class="form-check-label" for="xboxseriesFiltrado">Xbox Series X/S</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="7" id="xboxoneFiltrado" name="plataforma[]">
                        <label class="form-check-label" for="xboxoneFiltrado">Xbox One</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="8" id="xbox360Filtrado" name="plataforma[]">
                        <label class="form-check-label" for="xbox360Filtrado">Xbox 360</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="9" id="switchFiltrado" name="plataforma[]">
                        <label class="form-check-label" for="switchFiltrado">Nintendo Switch</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="10" id="pcFiltrado" name="plataforma[]">
                        <label class="form-check-label" for="pcFiltrado">PC</label>
                      </div>

                      <h3>Rango precios:</h3>
                      <div class="form-check">
                        <input class="form-check-input check-rango" type="checkbox" value="0" id="rangoFiltrado" name="rango[]">
                        <label class="form-check-label" for="rangoFiltrado">Menos de 10€</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input check-rango" type="checkbox" value="10" id="rangoFiltrado" name="rango[]">
                        <label class="form-check-label" for="rangoFiltrado">De 10€ a 50€</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input check-rango" type="checkbox" value="50" id="rangoFiltrado" name="rango[]">
                        <label class="form-check-label" for="rangoFiltrado">Más de 50€</label>
                      </div>
                      <button id="aplicar" type="submit" class="btn btn-secondary btn-sm mt-2 mb-5 mb-lg-1 w-100">Aplicar cambios</button>
                  </form>
                </div>
              </div>
        </div>

        <div class="row my-3 d-flex flex-wrap justify-content-center justify-content-lg-start">
            <?php
            if ($num_total_rows > 0) {
              $page = false;
          
              //examino la pagina a mostrar y el inicio del registro a mostrar
              if (isset($_GET["page"])) {
                  $page = $_GET["page"];
              }
          
              if (!$page) {
                  $start = 0;
                  $page = 1;
              } else {
                  $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
              }
              //calculo el total de paginas
              $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

                // Comprabamos si estamos entrando en productos a través del buscador.
                if(isset($_GET['buscar'])) {
                  $buscador = $_GET['buscar'];
                  $plataforma = "Busqueda del término" . $buscador;

                  $sql = "SELECT pr.*, pl.platformName AS plataforma, pl.platformLogo AS logotipo
                          FROM product pr
                          INNER JOIN platform pl ON pl.platformID = pr.platformID
                          WHERE pr.productName LIKE '%$buscador%'
                          OR pr.productDescription LIKE '%$buscador%'
                          OR pr.category LIKE '%$buscador%'
                          OR pl.platformName LIKE '%$buscador%'
                          ORDER BY ". $order ." LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE."";
                  $resultado = $mysqli->query($sql);
                }
            
                while ($fila = $resultado->fetch_object()) {
                ?>

                    <!-- Tarjeta del producto -->
                    <div id="resultados" class="tarjeta col-12 col-md-6 col-lg-auto my-3">
                      <div class="item">
                          <div class="card" style="width: 18rem;">
                            <div class="imagen-card">
                              <a href="articulo.php?id=<?= $fila->productID ?>" target="_self" title="Enlace al videojuego"><img src="<?= $fila->imageSource ?>" class="card-img-top" alt="Portada <?= $fila->productName ?>"></a>
                            </div>
                              
                            <?php if ($fila->logotipo && $fila->plataforma) : ?>
                                <!-- Contenedor para la imagen cuadrada superpuesta -->
                                <div class="overlay-image" style="position: absolute; top: 5px; left: 5px;">
                                    <img src="<?= $fila->logotipo ?>" alt="Imagen del logo de <?= $fila->plataforma ?>" style="width: 50px; height: 50px;">
                                </div>
                            <?php endif; ?>

                              <div class="card-body">
                                  <h5 class="card-title"><?= $fila->productName ?></h5>
                                  <?php if ($fila->logotipo && $fila->plataforma) { ?>
                                      <p class="card-text"><?= $fila->plataforma ?></p>
                                  <?php } else { ?>
                                    <p class="card-text">Accesorios</p>
                                  <?php }  ?>

                                  <?php
                                  if($fila->discount == 0){
                                      echo '<p class="precio">' . $fila->price . ' &#8364;</p>';
                                  } else {
                                      $precioFinal = $fila->price * (1 - ($fila->discount / 100));
                                      echo '<p class="precio"><span class="oferta">-'. $fila->discount .' %</span>' . number_format($precioFinal, 2) . ' &#8364;</p>';
                                  }
                                  ?>
                                  <div class="d-flex justify-content-between">

                                    <a href="articulo.php?id=<?= $fila->productID ?>" class="btn btn-success btn-sm d-flex align-items-center"><i class="fa-solid fa-magnifying-glass-plus" style="color: #ffffff;"></i></a>

                                    <!-- Boton añadir al carrito o reservar -->
                                    <?php
                                      if(isset($_GET['buscar'])) {
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
                                              echo '<a href="controlador/addToCart.php?id='.$fila->productID.'&portada='.$fila->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
                                              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                              class="bi bi-cart mb-1" viewBox="0 0 16 16">
                                              <path
                                                  d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                              </svg> Añadir al carrito</a>';
                                        }
                                      } else {
                                        if($parametro >= 0 && $parametro <= 11){
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
                                              echo '<a href="controlador/addToCart.php?id='.$fila->productID.'&portada='.$fila->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
                                              xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                              class="bi bi-cart mb-1" viewBox="0 0 16 16">
                                              <path
                                                  d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                              </svg> Añadir al carrito</a>';
                                          }
                                        } else {
                                          echo '<a href="controlador/addToCart.php?id='.$fila->productID.'&portada='.$fila->productID.'" class="btn btn-primary btn-sm d-flex justify-content-between align-items-center gap-1"><svg
                                          xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                          class="bi bi-cart mb-1" viewBox="0 0 16 16">
                                          <path
                                              d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                          </svg> Añadir al carrito</a>';
                                        }
                                      } 
                                    ?>

                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                    </div>
                    <?php
                } // cierre del while

                // Obtener el orden de la sesión si existe, de lo contrario, usar $order actual
                $order = isset($_SESSION['filtro_order']) ? $_SESSION['filtro_order'] : $order;
                $buscador = isset($_SESSION['filtro_buscador']) ? $_SESSION['filtro_buscador'] : $_GET['buscar'];

                echo '<nav class="text-center mt-3 w-100 d-flex justify-content-center" aria-label="Page navigation example">';
                echo '<ul class="pagination">';

                if ($total_pages > 1) {
                    if ($page != 1) {
                        // Aquí agregamos el parámetro de orden a la URL cuando retrocedes una página
                        echo '<li class="page-item"><a class="page-link" href="productSearch.php?buscar='. $buscador .'&page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($page == $i) {
                            echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
                        } else {
                            // Aquí incluimos el parámetro de orden en los enlaces de página
                            echo '<li class="page-item"><a class="page-link" href="productSearch.php?buscar='. $buscador .'&page='.$i.'">'.$i.'</a></li>';
                        }
                    }

                    if ($page != $total_pages) {
                        // Aquí incluimos el parámetro de orden al avanzar una página
                        echo '<li class="page-item"><a class="page-link" href="productSearch.php?buscar='. $buscador .'&page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
                echo '</ul>';
                echo '</nav>';
            } ?>
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