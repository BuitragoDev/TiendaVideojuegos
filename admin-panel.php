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

  // Comprobamos que se intente entrar estando logueado como Admin, en caso contrario redirigimos al index.
  if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
    // La variable de sesión 'admin' no existe.
    header("Location: ../index.php");
    exit;
  } 

  // Si enviamos una variable id por la url la asignamos a $id, en caso contrario $id valdrá 0.
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = 0;
  }

  // Consulta para el listado de usuarios.
  $sql = "SELECT * FROM member ORDER BY memberID";
  $resultado = $mysqli->query($sql);

  // Comprabamos si estamos entrando en productos a través del buscador.
  if(isset($_GET['buscar'])) {
        $buscador = $_GET['buscar'];

        $sqlProductos = "SELECT pr.*, pl.platformName AS plataforma, pl.platformLogo AS logotipo
                         FROM product pr
                         INNER JOIN platform pl ON pl.platformID = pr.platformID
                         WHERE pr.productName LIKE '%$buscador%'
                         OR pr.productDescription LIKE '%$buscador%'
                         OR pr.category LIKE '%$buscador%'
                         OR pl.platformName LIKE '%$buscador%'
                         ORDER BY pr.productID ASC";
        $resultadoProductos = $mysqli->query($sqlProductos);

        $numResultadosBuscador = $resultadoProductos->num_rows;
  } else {
        // Consulta para el listado de productos.
        $sqlProductos = "SELECT pr.*, pl.platformName AS plataforma
                        FROM product pr
                        INNER JOIN platform pl ON pl.platformID = pr.platformID
                        ORDER BY pr.productID";
        $resultadoProductos = $mysqli->query($sqlProductos);
  }

  $num_total_users = $resultado->num_rows;
  $num_total_products = $resultadoProductos->num_rows;
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

  <!-- LightBox -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">

</head>

<body>

  <!-- Header (Contiene la cabecera y el menú principal) -->
  <?php include('headerAdmin.php') ; ?> 

  <!-- Aquí empieza el MAIN -->
  <main class="container-fluid p-0 admin-main"> <!-- container-fluid -->

    <?php if($id == 1) { ?> <!-- Si $id vale 1 cargamos el contenedor para añadir productos -->

    <!-- Formulario para introducir productos -->
    <div class="container mb-4"> <!-- container -->

      <div class="row">

        <div class="col-12 offset-3-lg col-6-lg">

          <h1 class="text-white">Formulario subida de productos</h1>
          <hr style="background-color:white;">

          <form action="controlador/addProduct.php" method="post" enctype="multipart/form-data">
            <!-- username -->
            <div class="mb-3">
              <label for="nombre" class="form-label text-white">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <!-- productType -->
            <select name="tipo" class="form-select" aria-label="form-select my-4" required>
              <option selected disabled>Selecciona un tipo de artículo</option>
              <option value="Juego">Juego</option>
              <option value="Accesorio">Accesorio</option>
              <option value="Tarjeta">Tarjeta</option>
            </select>
            <!-- productDescription -->
            <div class="mb-3">
              <label for="descripcion" class="form-label text-white">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <!-- releaseDate -->
            <div class="mb-3">
              <label for="fechaLanzamiento" class="form-label text-white">Fecha de Lanzamiento</label>
              <input type="date" class="form-control" id="fechaLanzamiento" name="fechaLanzamiento" required>
            </div>
            <!-- category -->          
            <select id="categoria" name="categoria" class="form-select my-4" required>
              <option selected disabled>Selecciona una categoría de artículo</option>
              <option value="Deportes">Deportes</option>
              <option value="Combate">Combate</option>
              <option value="Carreras">Carreras</option>
              <option value="Aventuras">Aventuras</option>
              <option value="Simulacion">Simulacion</option>
              <option value="Supervivencia">Supervivencia</option>
              <option value="Estrategia">Estrategia</option>
              <option value="Accesorio">Accesorio</option>
            </select>
            <!-- stock -->
            <div class="mb-3">
              <label for="stock" class="form-label text-white">Stock</label>
              <input type="text" class="form-control" id="stock" name="stock" required>
            </div>
            <!-- price -->
            <div class="mb-3">
              <label for="precio" class="form-label text-white">Precio</label>
              <input type="text" class="form-control" id="precio" name="precio" required>
            </div>
            <!-- discount -->
            <div class="mb-3">
              <label for="discount" class="form-label text-white">Descuento</label>
              <input type="text" class="form-control" id="discount" name="discount" required>
            </div>
            <!-- platform -->
            <select name="plataforma" class="form-select my-4" required>
              <option selected disabled>Selecciona una plataforma</option>
              <option value="1">Playstation 1</option>
              <option value="2">Playstation 2</option>
              <option value="3">Playstation 3</option>
              <option value="4">Playstation 4</option>
              <option value="5">Playstation 5</option>
              <option value="6">Xbox Series X</option>
              <option value="7">Xbox One</option>
              <option value="8">Xbox 360</option>
              <option value="9">Nintendo Switch</option>
              <option value="10">PC</option>
              <option value="11">Ninguna</option>
            </select>
            <!-- imageSource -->
            <div class="mb-3">
              <label for="portada" class="form-label text-white">Imagen Portada</label>
              <input type="file" class="form-control" id="portada" name="portada" required>
            </div>
            
            <button type="submit" class="btn btn-success w-50 ">Guardar</button>
            <button type="reset" class="btn btn-light w-20 mx-2">Limpiar</button>
          </form>

        </div> <!-- /.col -->

      </div> <!-- /.row -->

    </div> <!-- /.container -->

    <?php } else if($id == 2) { ?> <!-- Si $id vale 2 cargamos el CRUD de usuarios -->

    <div class="container-fluid"> <!-- container-fluid -->

      <div class="row p-1"> <!-- row -->

        <div class="col-12 offset-2-lg col-8-lg">

          <h1 class="text-white">CRUD de Usuarios</h1>
          <hr style="background-color:white;">
          <table class="table table-light table-striped">
            <thead class="table table-dark">
              <tr scope="row" class="d-flex flex-column flex-lg-row">
                <th class="col-12 col-md-1 align-middle" scope="col">ID</th>
                <th class="col-12 col-md-2 align-middle" scope="col">Username</th>
                <th class="col-12 col-md-2 align-middle" scope="col">Email</th>
                <th class="col-12 col-md-2 align-middle" scope="col">Password</th>
                <th class="col-12 col-md-2 align-middle" scope="col">Fecha Alta</th>
                <th class="col-12 col-md-1 align-middle" scope="col">Foto Perfil</th>
                <th class="col-12 col-md-2 align-middle" scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php while ($fila = $resultado->fetch_object()) { 
                    $fechaAlta = new DateTime($fila->fechaAlta); // Fecha a comparar
                    $fechaFormateada = $fechaAlta->format('d/m/Y'); // fecha formateada
                    $passwordLength = strlen($fila->pass); // longitud de la contraseña
                    $asterisks = str_repeat('*', $passwordLength); // cadena de asteriscos de la misma longitud
                
                    ?>
                    <tr class="d-flex flex-column flex-lg-row">
                        <th class="col-12 col-md-1 align-middle" scope="row"><?php echo $fila->memberID; ?></th>
                        <td class="col-12 col-md-2 align-middle"><?php echo $fila->username; ?></td>
                        <td class="col-12 col-md-2 align-middle"><?php echo $fila->email; ?></td>
                        <td class="col-12 col-md-2 align-middle"><?php echo $asterisks; ?></td> <!-- Mostrar asteriscos en lugar de la contraseña -->
                        <td class="col-12 col-md-2 align-middle"><?php echo $fechaFormateada; ?></td>
                        <td class="col-12 col-md-1 align-middle"><a class="example-image-link" href="<?php echo $fila->userAvatar; ?>" data-lightbox="lightbox<?php echo $fila->memberID; ?>" data-title="<?php echo $fila->username; ?>"><img style="width:50px; height:50px;" class="img-fluid img-thumbnail" src="<?php echo $fila->userAvatar; ?>" alt="Imagen de perfil del usuario <?php echo $fila->username; ?>"></a></td>
                        <td class="col-12 col-md-2 text-center align-middle">
                          <button onclick="confirmarEliminarUsuario('<?php echo $fila->username; ?>', '<?php echo $fila->memberID; ?>')" type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                          <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></button>
                        </td>
                    </tr>
              <?php } ?>
            </tbody>
          </table>
          
        </div> <!-- /.col -->

      </div> <!-- /.row -->

    </div> <!-- /.container-fluid -->
          
    <?php } else if($id == 3) { ?> <!-- Si $id vale 2 cargamos el CRUD de productos -->

    <div class="container-fluid"> <!-- container-fluid -->

      <div class="row p-1"> <!-- row -->

        <h1 class="text-white mb-1">CRUD de Productos</h1>
        <hr style="background-color:white; width:99%;">

        <div class="col-12 d-flex justify-content-center my-2">

          <form id="buscadorAdmin" action="javascript:void(0);" class="d-flex w-100" role="search">
            <input class="form-control me-2 w-75" type="search" id="cajaBuscadorAdmin" name="buscarAdmin" placeholder="Buscar..." aria-label="Search" onkeypress="checkSubmitAdmin(event)">
            <button class="btn btn-outline-light" type="submit" onclick="submitFormAdmin()">Buscar</button>
          </form>
        </div>

      </div>

      <div class="row p-1">

        <div class="col-12">
          
          <table class="table table-light table-striped table-hover">
            <thead class="table table-dark">
              <tr class="d-flex flex-column flex-lg-row">
                <th class="col-12 col-md-1 align-middle" scope="col">ID</th>
                <th class="col-12 col-md-3 align-middle" scope="col">Nombre</th>
                <th class="col-12 col-md-1 align-middle" scope="col">Tipo</th>
                <th class="col-12 col-md-1 align-middle" scope="col">Plataforma</th>
                <th class="col-12 col-md-1 align-middle" scope="col">F. Lanzamiento</th>
                <th class="col-12 col-md-1 align-middle" scope="col">Categoria</th>
                <th class="col-12 col-md-1 align-middle" scope="col">Stock</th>
                <th class="col-12 col-md-1 align-middle" scope="col">Precio / %</th>
                <th class="col-12 col-md-1 align-middle" scope="col">Imagen</th>
                <th class="col-12 col-md-1 align-middle" scope="col"></th>
              </tr>
            </thead>
            <tbody>
                <?php 
                    if ($num_total_products > 0) {
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
                          $total_pages = ceil($num_total_products / NUM_ITEMS_BY_PAGE);

                          if(isset($_GET['buscar'])) {
                                  $buscador = $_GET['buscar'];
                          
                                  $sqlProductos = "SELECT pr.*, pl.platformName AS plataforma, pl.platformLogo AS logotipo
                                                  FROM product pr
                                                  INNER JOIN platform pl ON pl.platformID = pr.platformID
                                                  WHERE pr.productName LIKE '%$buscador%'
                                                  OR pr.productDescription LIKE '%$buscador%'
                                                  OR pr.category LIKE '%$buscador%'
                                                  OR pl.platformName LIKE '%$buscador%'
                                                  ORDER BY pr.productID ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE."";
                                  $resultadoProductos = $mysqli->query($sqlProductos);
                          
                                  $numResultadosBuscador = $resultadoProductos->num_rows;
                          } else {
                                  // Consulta para el listado de productos.
                                  $sqlProductos = "SELECT pr.*, pl.platformName AS plataforma
                                                  FROM product pr
                                                  INNER JOIN platform pl ON pl.platformID = pr.platformID
                                                  ORDER BY pr.productID ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE."";
                                  $resultadoProductos = $mysqli->query($sqlProductos);
                          }

                          while ($filaProductos = $resultadoProductos->fetch_object()) { 
                          $fechaLanzamiento = new DateTime($filaProductos->releaseDate); // Fecha a comparar
                          $fechaLanzamientoFormateada = $fechaLanzamiento->format('d/m/Y'); // fecha formateada
              
                ?>
                <tr class="d-flex flex-column flex-lg-row">
                    <th class="col-12 col-md-1 align-middle" scope="row"><?php echo $filaProductos->productID; ?></th>
                    <td class="col-12 col-md-3 align-middle" scope="row"><a href="articulo.php?id=<?= $filaProductos->productID ?>" target="_self"><?php echo $filaProductos->productName; ?></a></td>
                    <td class="col-12 col-md-1 align-middle" scope="row"><?php echo $filaProductos->productType; ?></td>
                    <td class="col-12 col-md-1 align-middle" scope="row"><?php echo $filaProductos->plataforma; ?></td>
                    <td class="col-12 col-md-1 align-middle" scope="row"><?php echo $fechaLanzamientoFormateada; ?></td>
                    <td class="col-12 col-md-1 align-middle" scope="row"><?php echo $filaProductos->category; ?></td>
                    <td class="col-12 col-md-1 align-middle" scope="row"><?php echo $filaProductos->stock; ?></td>
                    <td class="col-12 col-md-1 align-middle" scope="row"><?php echo $filaProductos->price . '€ / ' . $filaProductos->discount . '%'; ?></td>
                    <td class="col-12 col-md-1 align-middle"><a class="example-image-link" href="<?php echo $filaProductos->imageSource; ?>" data-lightbox="productos<?php echo $filaProductos->productID; ?>" data-title="<?php echo $filaProductos->productName; ?>"><img style="width:50px; height:50px;" class="img-fluid img-thumbnail" src="<?php echo $filaProductos->imageSource; ?>" alt="Imagen del producto <?php echo $filaProductos->productName; ?>"></a></td>
                    <td class="col-12 col-md-1 text-center align-middle">
                      <div class="d-flex justify-content-center align-items-center gap-1">
                        <button onclick="confirmarEliminarProducto('<?php echo $filaProductos->productName; ?>', '<?php echo $filaProductos->productID; ?>')" type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                        <a href="editarProducto.php?id=<?php echo $filaProductos->productID; ?>" target="_self" title="Ir a editar producto" type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                      </div>
                    </td>
                </tr>
                    <?php } ?> <!-- Cierre del While -->   
            </tbody>
          </table>

          <?php
            echo '<nav class="text-center mt-3 w-100 d-flex justify-content-center" aria-label="Page navigation example">';
            echo '<ul class="pagination">';

            if ($total_pages > 1) {
                if ($page != 1) {
                    if(isset($_GET['buscar'])) {
                      echo '<li class="page-item"><a class="page-link" href="admin-panel.php?id='.$id.'&buscar='.$buscador.'&page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
                    } else {
                      echo '<li class="page-item"><a class="page-link" href="admin-panel.php?id='.$id.'&page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                }

                for ($i=1;$i<=$total_pages;$i++) {
                    if ($page == $i) {
                        echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
                    } else {
                        if(isset($_GET['buscar'])) {
                          echo '<li class="page-item"><a class="page-link" href="admin-panel.php?id='.$id.'&buscar='.$buscador.'&page='.$i.'">'.$i.'</a></li>';
                        } else {
                          echo '<li class="page-item"><a class="page-link" href="admin-panel.php?id='.$id.'&page='.$i.'">'.$i.'</a></li>';
                        }        
                    }
                }

                if ($page != $total_pages) {
                  if(isset($_GET['buscar'])) {
                    echo '<li class="page-item"><a class="page-link" href="admin-panel.php?id='.$id.'&buscar='.$buscador.'&page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
                  } else {
                    echo '<li class="page-item"><a class="page-link" href="admin-panel.php?id='.$id.'&page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
                  }                
                }
            }
            echo '</ul>';
            echo '</nav>'; 
          } else {
            echo '<h5>No se han encontrado resultados.</h5>';
          } ?>
                  
        </div> <!-- /.col -->
      </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
          
        </div>
      </div>
    </div>
    <?php } else { ?> <!-- cierre IF id = 3 -->
      <div class="container">
        <div class="row">
          <div class="col text-center">
              <h1 class="text-white">Panel de Administración</h1>
              <img class="img-fluid" src="assets/img/admin.webp" alt="Imagen de Administración">
          </div>
        </div>
      </div>
    <?php } ?>

  </main> <!-- /.main -->

  <!-- Footer (Contiene el área de ayuda y redes sociales) -->
  <?php include('footer.php') ; ?> 

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Vinculación de los JS -->
  <script src="js/scripts.js"></script>

  <!-- JS Lightbox -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox-plus-jquery.min.js"></script> -->
  <script src="js/lightbox-plus-jquery.min.js"></script>

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

      // Mensaje si se ha actualizado correctamente.
      document.addEventListener("DOMContentLoaded", function () {
          // Obtener los parámetros de la URL
          const urlParams = new URLSearchParams(window.location.search);

          // Verificar si la variable "update" tiene el valor "true"
          if (urlParams.get("update") === "true") {
              // Mostrar el SweetAlert al cargar la página
              Swal.fire({
                  title: 'Confirmado!',
                  text: 'El proceso de actualización se ha completado correctamente.',
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

  <!-- Script del buscador del panel de control -->
  <script>
    
    function submitFormAdmin() {
        var searchTerm = document.getElementById('cajaBuscadorAdmin').value.trim();
        if (searchTerm !== '') {
            window.location.href = 'admin-panel.php?id=3&buscar=' + searchTerm;
        }
    }

    function checkSubmitAdmin(e) {
        if (e.key === 'Enter') {
            var searchTerm = document.getElementById('cajaBuscadorAdmin').value.trim();
            if (searchTerm !== '') {
                window.location.href = 'admin-panel.php?id=3&buscar=' + searchTerm;
            }
        }
    }   
  </script>

</body>

</html>