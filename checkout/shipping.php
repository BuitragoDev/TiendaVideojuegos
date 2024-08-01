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
    $member = $_SESSION['usuario'];

    // Buscamos los elementos del carrito para el usuario actual.
    $sql = "SELECT p.*, c.*, m.username FROM product p, cart c, member m WHERE c.memberID = m.memberID AND p.productID = c.productID AND m.username = '" . $member . "'";
    $resultado = $mysqli->query($sql);
    $num_rows = $resultado->num_rows; // Comprobamos el número de artículos del carrito.

    $precioTotal = 0; // Inicialización del precio total a 0 euros.
    while ($fila = $resultado->fetch_object()) { 
      $precioFinal = $fila->price * (1 - ($fila->discount / 100));
      $precioTotal = $precioTotal + number_format($precioFinal, 2);
    }
  } else {
    $num_rows = 0; // Si no hay un usuario logueado, el número de productos en el carrito es 0.
    $precioTotal = 0; // Inicialización del precio total a 0 euros.
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

      <!-- Sección 1 de la página SHIPPING (Menú de navegación del checkout) -->
      <div class="row w-100">
        <div class="checkout col-12 gap-0 gap-lg-5 mb-4 d-flex flex-column flex-lg-row">
          <div class="w-100 w-lg-25"><p><a class="text-white" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;1. Carro</a></p></div>
          <div class="w-100 w-lg-25"><p style="color: #ffc107;" class="active"><i class="fa-regular fa-credit-card"></i>&nbsp;&nbsp;2. Datos de Envío</p></div>
          <div class="w-100 w-lg-25"><p class="text-white"><i class="fa-solid fa-box-archive"></i>&nbsp;&nbsp;3. Pago</p></div>
        </div>
      </div> <!-- ./seccion1 -->

      <div class="row d-flex justify-content-between gap-2">

        <!-- Sección 2 de la página SHIPPING (Datos de Envío) -->
        <div class="checkout-container checkout-left col-12 col-lg-8 p-3 border border-secondary rounded">
          <h5 class="text-uppercase mx-2">Datos de Envío</h5>

          <hr class="mx-2">

          <?php
            // Comprobación de que se está llegando procedente del formulario.
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guardar'])) {

              // Recojo el ID del usuario conectado.
              $sqlID = 'SELECT memberID FROM member WHERE username = "'.$member.'"';
              $resultadoID = $mysqli->query($sqlID);
              $fila = $resultadoID->fetch_assoc();
              $memberID = $fila['memberID'];

              // Consulta de la tabla de usuarios de la base de datos.
              $sqlUsuarios = "SELECT * FROM member WHERE memberID = '" . $memberID . "'";
              $resultadoUsuarios = $mysqli->query($sqlUsuarios);
            
              while ($filaUsuarios = $resultadoUsuarios->fetch_object()) { 

                // Recogemos los datos.
                $nombre = isset($filaUsuarios->name) ? $filaUsuarios->name : '';
                $apellido = isset($filaUsuarios->surname) ? $filaUsuarios->surname : '';

                // Le damos valor a la variable de sesión DIRECCION.
                if (isset($_POST['direccion'])) {
                  $_SESSION['direccion'] = $_POST['direccion'];
                } else {
                  $_SESSION['direccion'] = '';
                }

                // Le damos valor a la variable de sesión CIUDAD.
                if (isset($_POST['ciudad'])) {
                  $_SESSION['ciudad'] = $_POST['ciudad'];
                } else {
                  $_SESSION['ciudad'] = '';
                }

                // Le damos valor a la variable de sesión PAIS.
                if (isset($_POST['pais'])) {
                  $_SESSION['pais'] = $_POST['pais'];
                } else {
                  $_SESSION['pais'] = '';
                }

                // Le damos valor a la variable de sesión ZIP.
                if (isset($_POST['zip'])) {
                  $_SESSION['zip'] = $_POST['zip'];
                } else {
                  $_SESSION['zip'] = '';
                }

                echo '<p class="mx-2"><strong>Nombre y Apellidos:</strong><br>' .$nombre. '&nbsp;'.$apellido.'</p>';
                echo '<p class="mx-2"><strong>Dirección:</strong><br>'.$_SESSION['direccion'].'<br>';
                echo $_SESSION['ciudad']. '&nbsp;(' .$_SESSION['zip']. ')<br>';
                echo $_SESSION['pais']. '</p>';

              } // cierre del WHILE

            } else {

                // Recojo el ID del usuario conectado.
                $sqlID = 'SELECT memberID FROM member WHERE username = "'.$member.'"';
                $resultadoID = $mysqli->query($sqlID);
                $fila = $resultadoID->fetch_assoc();
                $memberID = $fila['memberID'];
                $address = $fila['address'];
                $city = $fila['city'];
                $country = $fila['country'];
                $zip = $fila['zip'];

                if($address == null || $city == null || $country == null || $zip == null) {

                  echo '<p class="mx-2">No hay una dirección de envío en tus datos personales.<br>';
                  echo '<p class="mx-2 noaddress">Puedes completar tus datos personales en <a href="../changeDetails.php?id='.$memberID.'" target="_self">este enlace</a>.</p>';

                } else {

                  // Consulta de la tabla de usuarios de la base de datos.
                  $sqlUsuarios = "SELECT * FROM member WHERE memberID = '" . $memberID . "'";
                  $resultadoUsuarios = $mysqli->query($sqlUsuarios);

                  while ($filaUsuarios = $resultadoUsuarios->fetch_object()) { 
                    // Recogemos los datos.
                    $nombre = isset($filaUsuarios->name) ? $filaUsuarios->name : '';
                    $apellido = isset($filaUsuarios->surname) ? $filaUsuarios->surname : '';
                    $direccion = isset($filaUsuarios->address) ? $filaUsuarios->address : '';
                    $ciudad = isset($filaUsuarios->city) ? $filaUsuarios->city : '';
                    $pais = isset($filaUsuarios->country) ? $filaUsuarios->country : '';
                    $zip = isset($filaUsuarios->zip) ? $filaUsuarios->zip : '';

                    echo '<p class="mx-2"><strong>Nombre y Apellidos:</strong><br>' .$nombre. '&nbsp;'.$apellido.'</p>';
                    echo '<p class="mx-2"><strong>Dirección:</strong><br>'.$direccion.'<br>';
                    echo $ciudad. '&nbsp;(' .$zip. ')<br>';
                    echo $pais. '</p>';

                  } // cierre del WHILE

                } // cierre del IF

            } // cierre del IF 
          ?> 

          <!-- Botón para cambiar la dirección de envío -->
          <a id="boton-cambiar-direccion" type="button" class="btn btn-warning my-3 mx-2" href="#" target="_self" title="Cambiar dirección de envío" onclick="toggleDiv()">Cambiar dirección</a>

          <!-- Contenedor con el formulario para cambiar la dirección de envío (Oculto inicialmente) -->
          <div id="change-address-form" class="container">

              <div class="row">

                <div class="col-12 col-lg-6">

                  <div class="row">

                      <form action="shipping.php" method="POST">

                          <div class="col-12">
                              <label for="direccion" class="form-label">Dirección</label>
                              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="" required>
                          </div>
                          <div class="col-12">
                              <label for="ciudad" class="form-label">Ciudad</label>
                              <input type="text" class="form-control" id="ciudad" name="ciudad" value="" required>
                          </div>
                          <div class="col-12">
                              <label for="pais" class="form-label">País</label>
                              <input type="text" class="form-control" id="pais" name="pais" value="" required>
                          </div>
                          <div class="col-12">
                              <label for="zip" class="form-label">CP</label>
                              <input type="text" class="form-control" id="zip" name="zip" value="" required>
                          </div>

                          <!-- Botón Guardar nueva dirección -->
                          <button type="submit" name="guardar" class="btn btn-success my-3">Guardar</button>

                      </form>

                  </div> <!-- /.row -->

                </div> <!-- /.col -->

              </div> <!-- /.row -->

          </div> <!-- /.container -->

        </div> <!-- ./seccion2 -->

        <!-- Sección 3 de la página SHIPPING (Resumen del Carrito) -->
        <div class="checkout-container checkout-right col-12 col-lg-3 p-3 border border-secondary rounded">
            <h5 class="text-uppercase">Resumen</h5>

            <a type="button" class="btn btn-warning w-100 my-3" href="payment.php" target="_self" title="Enlace a la pantalla de pagos">Continuar</a>

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
                for($i = 1; $i <= 5; $i++){
                  echo '<img src="../assets/img/icons/trust-pilot.webp" alt="Estrella Trustpilot">';
                }
                ?>
              </div>
              <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center cart-summary"><a href="#"><span class="font-light" style="font-size:0.8em;">Lee nuestras opiniones</span></a></div>
            </div>

        </div> <!-- ./seccion3 -->

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

  <script>
    // Función para mostrar u ocultar el div y cambiar el texto del botón
    function toggleDiv() {
      // Obtener el div oculto
      var div = document.getElementById('change-address-form');
      // Obtener el botón
      var boton = document.getElementById('boton-cambiar-direccion');
      
      // Verificar si el div está visible o no
      if (div.style.display === 'none' || div.style.display === '') {
        // Mostrar el div cambiando su estilo de display a 'block'
        div.style.display = 'block';
        // Cambiar el texto del botón a "Cerrar"
        boton.innerHTML = 'Cerrar';
      } else {
        // Ocultar el div cambiando su estilo de display a 'none'
        div.style.display = 'none';
        // Cambiar el texto del botón a "Cambiar dirección"
        boton.innerHTML = 'Cambiar dirección';
      }
    }
  </script>

</body>

</html>