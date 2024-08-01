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

    <!-- Contenedor donde se encuentra el menú de navegación de la sección de soporte -->
    <div class="container how-to-buy pt-3">
      <div class="row">
        <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb d-flex align-items-center">
              <li class="breadcrumb-item"><a href="../index.php" target="_self" title="Enlace a la página de portada"><img src="../assets/img/logo.webp" alt="Imagen del logo"></a></li>
              <li class="breadcrumb-item"><a href="ticket.php" target="_self" title="Enlace a la página principal de tickets">Support</a></li>
              <li class="breadcrumb-item active" aria-current="page">Índice de videojuegos</li>
            </ol>
          </nav>
        </div>
      </div> <!-- /.menu-navegación -->

      <!-- Sección 1 de la página GAMES INDEX (título y buscador) -->
      <div class="row">
        <div class="col-12 col-lg-8">
          <h1 class="text-white">Lista de videojuegos</h1>
        </div>
        <div class="col-12 col-lg-4">
          <form class="formulario-ticket" action="#">
              <div class="input-container">
                  <i class="fa-solid fa-magnifying-glass" style="color:#FFFFFF;"></i>
                  <input type="text" id="obtener_respuestas" name="obtener_respuestas" placeholder="Buscar preguntas frecuentes">
              </div>
          </form>
        </div>
      </div> <!-- /.seccion1 -->

      <!-- Sección 2 de la página GAMES INDEX (abecedario) -->
      <div class="row">

        <div class="col-12 my-5">

          <div class="row abecedario d-flex gap-1 p-1 p-lg-0">
            <!-- Columnas con letras del abecedario -->
            <div class="col"><a href="games_index.php?letra=#" target="_self" title="Enlace a los videojuegos que empiezan por #">#</a></div>
            <div class="col"><a href="games_index.php?letra=A" target="_self" title="Enlace a los videojuegos que empiezan por A">A</a></div>
            <div class="col"><a href="games_index.php?letra=B" target="_self" title="Enlace a los videojuegos que empiezan por B">B</a></div>
            <div class="col"><a href="games_index.php?letra=C" target="_self" title="Enlace a los videojuegos que empiezan por C">C</a></div>
            <div class="col"><a href="games_index.php?letra=D" target="_self" title="Enlace a los videojuegos que empiezan por D">D</a></div>
            <div class="col"><a href="games_index.php?letra=E" target="_self" title="Enlace a los videojuegos que empiezan por E">E</a></div>
            <div class="col"><a href="games_index.php?letra=F" target="_self" title="Enlace a los videojuegos que empiezan por F">F</a></div>
            <div class="col"><a href="games_index.php?letra=G" target="_self" title="Enlace a los videojuegos que empiezan por G">G</a></div>
            <div class="col"><a href="games_index.php?letra=H" target="_self" title="Enlace a los videojuegos que empiezan por H">H</a></div>
            <div class="col"><a href="games_index.php?letra=I" target="_self" title="Enlace a los videojuegos que empiezan por I">I</a></div>
            <div class="col"><a href="games_index.php?letra=J" target="_self" title="Enlace a los videojuegos que empiezan por J">J</a></div>
            <div class="col"><a href="games_index.php?letra=K" target="_self" title="Enlace a los videojuegos que empiezan por K">K</a></div>
            <div class="col"><a href="games_index.php?letra=L" target="_self" title="Enlace a los videojuegos que empiezan por L">L</a></div>
            <div class="col"><a href="games_index.php?letra=M" target="_self" title="Enlace a los videojuegos que empiezan por M">M</a></div>
            <div class="col"><a href="games_index.php?letra=N" target="_self" title="Enlace a los videojuegos que empiezan por N">N</a></div>
            <div class="col"><a href="games_index.php?letra=O" target="_self" title="Enlace a los videojuegos que empiezan por O">O</a></div>
            <div class="col"><a href="games_index.php?letra=P" target="_self" title="Enlace a los videojuegos que empiezan por P">P</a></div>
            <div class="col"><a href="games_index.php?letra=Q" target="_self" title="Enlace a los videojuegos que empiezan por Q">Q</a></div>
            <div class="col"><a href="games_index.php?letra=R" target="_self" title="Enlace a los videojuegos que empiezan por R">R</a></div>
            <div class="col"><a href="games_index.php?letra=S" target="_self" title="Enlace a los videojuegos que empiezan por S">S</a></div>
            <div class="col"><a href="games_index.php?letra=T" target="_self" title="Enlace a los videojuegos que empiezan por T">T</a></div>
            <div class="col"><a href="games_index.php?letra=U" target="_self" title="Enlace a los videojuegos que empiezan por U">U</a></div>
            <div class="col"><a href="games_index.php?letra=V" target="_self" title="Enlace a los videojuegos que empiezan por V">V</a></div>
            <div class="col"><a href="games_index.php?letra=W" target="_self" title="Enlace a los videojuegos que empiezan por W">W</a></div>
            <div class="col"><a href="games_index.php?letra=X" target="_self" title="Enlace a los videojuegos que empiezan por X">X</a></div>
            <div class="col"><a href="games_index.php?letra=Y" target="_self" title="Enlace a los videojuegos que empiezan por Y">Y</a></div>
            <div class="col"><a href="games_index.php?letra=Z" target="_self" title="Enlace a los videojuegos que empiezan por Z">Z</a></div>
          </div> <!-- /.row -->

        </div> <!-- /.col -->

      </div> <!-- /.seccion2 -->

      <!-- Sección 3 de la página GAMES INDEX (lista de videojuegos) -->
      <div class="row">

        <div class="col-12">
          <?php

          // Verifica si se ha pasado una letra en la URL
          if (isset($_GET['letra']) && strlen($_GET['letra']) === 1 && ctype_alpha($_GET['letra'])) {
            // Obtener la letra proporcionada en el parámetro
            $letra = $_GET['letra'];

            // Consulta SQL con filtrado por la letra
            $sql = "SELECT * FROM product WHERE productName LIKE '$letra%' ORDER BY productName ASC";
            $resultado = $mysqli->query($sql);

            // Obtener el número total de filas
            $totalFilas = $resultado->num_rows;
            
            // Calcular el número de filas por columna
            $filasPorColumna = ceil($totalFilas / 2); // Redondear hacia arriba para asegurar que las dos columnas tengan suficientes filas
            
            $contador = 0;
            
            // Mostrar la primera columna
            echo '<div class="row">';
            echo '<div class="col-6">';
            
            while ($fila = $resultado->fetch_object()) {
                // Si se alcanza el límite de filas para la primera columna, cerrar la columna actual y abrir una nueva
                if ($contador == $filasPorColumna) {
                    echo '</div>'; // Cerrar la primera columna
                    echo '<div class="col-6">'; // Abrir una nueva columna para la segunda columna
                    $contador = 0; // Reiniciar el contador para la segunda columna
                }
            
                echo '<p><a href="#" target="_self" title="Enlace a la ficha del juego ' . $fila->productName . '">' . $fila->productName . '</a></p>';
                
                $contador++;
            }
            
            echo '</div>'; // Cerrar la última columna
            echo '</div>'; // Cerrar el row

            $mysqli->close();
          } else {
            // Si no se proporciona una letra válida, o no se pasa ningún parámetro, mostrar todos los resultados
            $sql = "SELECT * FROM product WHERE productType = 'Juego' ORDER BY productName ASC";
            $resultado = $mysqli->query($sql);

            // Obtener el número total de filas
            $totalFilas = $resultado->num_rows;
            
            // Calcular el número de filas por columna
            $filasPorColumna = ceil($totalFilas / 2); // Redondear hacia arriba para asegurar que las dos columnas tengan suficientes filas
            
            $contador = 0;
            
            // Mostrar la primera columna
            echo '<div class="row">';
            echo '<div class="col-6">';
            
            while ($fila = $resultado->fetch_object()) {
                // Si se alcanza el límite de filas para la primera columna, cerrar la columna actual y abrir una nueva
                if ($contador == $filasPorColumna) {
                    echo '</div>'; // Cerrar la primera columna
                    echo '<div class="col-6">'; // Abrir una nueva columna para la segunda columna
                    $contador = 0; // Reiniciar el contador para la segunda columna
                }
            
                echo '<p><a href="../articulo.php?id=' . $fila->productID . '" target="_self" title="Enlace a la ficha del juego ' . $fila->productName . '">' . $fila->productName . '</a></p>';
                
                $contador++;
            }
            
            echo '</div>'; // Cerrar la última columna
            echo '</div>'; // Cerrar el row

            $mysqli->close();
          } ?>
        </div> <!-- /.col -->

      </div> <!-- /.section3 -->

    </div> <!-- /.container -->

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