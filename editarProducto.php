<?php
/* ==========================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
========================================================================== */

  // Inicia una sesión de PHP o reanuda la sesión actual si existe una 
  session_start();

  // Conexión con la base de datos.
  include('conn_db.php');

  // Recogemos la variable por la URL.
  $id = $_GET['id'];

  // Consulta para el listado de productos.
  $sql = "SELECT pr.*, pl.platformName AS plataforma
          FROM product pr
          INNER JOIN platform pl ON pl.platformID = pr.platformID
          WHERE pr.productID = $id";
  $resultado = $mysqli->query($sql);

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
  <title>..:: Videojuegos Buitrago - Tienda Online | Editar producto ::..</title>

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

  <!-- LightBox -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">

</head>

<body>

  <!-- Header (Contiene la cabecera y el menú principal) -->
  <?php include('headerAdmin.php') ; ?> 

  <!-- Aquí empieza el MAIN -->
  <main class="container-fluid p-0"> <!-- container-fluid -->

    <!-- Formulario para introducir productos -->
    <div class="container"> <!-- container -->

      <div class="row">

        <div class="offset-3 col-6">

          <h1 class="text-white">Detalles de producto</h1>
          <hr style="background-color:white;">
          <?php while ($fila = $resultado->fetch_object()) {  ?>
          <form action="controlador/updateProduct.php?id=<?php echo $fila->productID; ?>" method="post" enctype="multipart/form-data">
          
            <!-- username -->
            <div class="mb-3">
              <label for="nombre" class="form-label text-white">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila->productName; ?>" required>
            </div>
            <!-- productType -->
            <select name="tipo" class="form-select" aria-label="form-select my-4" required>
              <option selected disabled>Selecciona un tipo de artículo</option>
              <option value="Juego" <?php if($fila->productType === "Juego") { echo 'selected'; } ?> >Juego</option>
              <option value="Accesorio" <?php if($fila->productType === "Accesorio") { echo 'selected'; } ?>>Accesorio</option>
              <option value="Tarjeta" <?php if($fila->productType === "Tarjeta") { echo 'selected'; } ?>>Tarjeta</option>
            </select>
            <!-- productDescription -->
            <div class="mb-3">
              <label for="descripcion" class="form-label text-white">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required><?php echo $fila->productDescription; ?></textarea>
            </div>
            <!-- releaseDate -->
            <div class="mb-3">
              <label for="fechaLanzamiento" class="form-label text-white">Fecha de Lanzamiento</label>
              <input type="date" class="form-control" id="fechaLanzamiento" name="fechaLanzamiento" value="<?php echo $fila->releaseDate; ?>" required>
            </div>
            <!-- category -->          
            <select id="categoria" name="categoria" class="form-select my-4" required>
              <option selected disabled>Selecciona una categoría de artículo</option>
              <option value="Deportes" <?php if($fila->category === "Deportes") { echo 'selected'; } ?>>Deportes</option>
              <option value="Rol" <?php if($fila->category === "Rol") { echo 'selected'; } ?>>Rol</option>
              <option value="Combate" <?php if($fila->category === "Combate") { echo 'selected'; } ?>>Combate</option>
              <option value="Carreras" <?php if($fila->category === "Carreras") { echo 'selected'; } ?>>Carreras</option>
              <option value="Aventuras" <?php if($fila->category === "Aventuras") { echo 'selected'; } ?>>Aventuras</option>
              <option value="Simulacion" <?php if($fila->category === "Simulacion") { echo 'selected'; } ?>>Simulacion</option>
              <option value="Supervivencia" <?php if($fila->category === "Supervivencia") { echo 'selected'; } ?>>Supervivencia</option>
              <option value="Estrategia" <?php if($fila->category === "Estrategia") { echo 'selected'; } ?>>Estrategia</option>
              <option value="Accesorio" <?php if($fila->category === "Accesorio") { echo 'selected'; } ?>>Accesorio</option>
            </select>
            <!-- stock -->
            <div class="mb-3">
              <label for="stock" class="form-label text-white">Stock</label>
              <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $fila->stock; ?>" required>
            </div>
            <!-- price -->
            <div class="mb-3">
              <label for="precio" class="form-label text-white">Precio</label>
              <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $fila->price; ?>" required>
            </div>
            <!-- discount -->
            <div class="mb-3">
              <label for="discount" class="form-label text-white">Descuento</label>
              <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $fila->discount; ?>" required>
            </div>
            <!-- platform -->
            <select name="plataforma" class="form-select my-4" required>
              <option selected disabled>Selecciona una plataforma</option>
              <option value="1" <?php if($fila->platformID === "1") { echo 'selected'; } ?>>Playstation 1</option>
              <option value="2" <?php if($fila->platformID === "2") { echo 'selected'; } ?>>Playstation 2</option>
              <option value="3" <?php if($fila->platformID === "3") { echo 'selected'; } ?>>Playstation 3</option>
              <option value="4" <?php if($fila->platformID === "4") { echo 'selected'; } ?>>Playstation 4</option>
              <option value="5" <?php if($fila->platformID === "5") { echo 'selected'; } ?>>Playstation 5</option>
              <option value="6" <?php if($fila->platformID === "6") { echo 'selected'; } ?>>Xbox Series X</option>
              <option value="7" <?php if($fila->platformID === "7") { echo 'selected'; } ?>>Xbox One</option>
              <option value="8" <?php if($fila->platformID === "8") { echo 'selected'; } ?>>Xbox 360</option>
              <option value="9" <?php if($fila->platformID === "9") { echo 'selected'; } ?>>Nintendo Switch</option>
              <option value="10" <?php if($fila->platformID === "10") { echo 'selected'; } ?>>PC</option>
            </select>
            
            <button type="submit" class="btn btn-success w-100">Actualizar</button>
          </form>
          <?php } ?>
          
        </div> <!-- col -->

      </div> <!-- row -->

    </div> <!-- container -->

  </main> <!-- /.main -->

  <!-- Footer (Contiene el área de ayuda y redes sociales) -->
  <?php include('footerAdmin.php') ; ?> 

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Vinculación de los JS -->
  <script src="js/scripts.js"></script>
  
  <!-- JS Lightbox -->
  <script src="js/lightbox.min.js"></script>

  <!-- Sweet Alerts -->
  <script>
      // Muestra el Sweet alert si el formulario se ha actualizado correctamente
      document.addEventListener("DOMContentLoaded", function () {
          // Obtener los parámetros de la URL
          const urlParams = new URLSearchParams(window.location.search);

          // Verificar si la variable "successU" tiene el valor "true"
          if (urlParams.get("success") === "true") {
              // Mostrar el SweetAlert al cargar la página
              Swal.fire({
                  title: 'Enhorabuena!',
                  text: 'El producto se ha guardado correctamente.',
                  icon: 'success',
                  confirmButtonText: "Aceptar",
                  confirmButtonColor: "#3085d6",
              }).then(function () {
                  // Redirigir a index.php después de hacer clic en "Aceptar"
                  window.location.href = "admin-panel.php";
              });
          }
      });

      // Mensaje si se ha eliminado correctamente.
      document.addEventListener("DOMContentLoaded", function () {
          // Obtener los parámetros de la URL
          const urlParams = new URLSearchParams(window.location.search);

          // Verificar si la variable "borrado" tiene el valor "true"
          if (urlParams.get("borrado") === "true") {
              // Mostrar el SweetAlert al cargar la página
              Swal.fire({
                  title: 'Confirmado!',
                  text: 'El proceso de borrado se ha completado correctamente.',
                  icon: 'success',
                  confirmButtonText: "Aceptar",
                  confirmButtonColor: "#3085d6",
              }).then(function () {
                  // Redirigir a index.php después de hacer clic en "Aceptar"
                  window.location.href = "admin-panel.php";
              });
          }
      });
  </script>

</body>

</html>