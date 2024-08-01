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

    $precioTotal = 0;
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

      <!-- Sección 1 de la página PAYMENT (Menú de navegación del checkout) -->
      <div class="row w-100">
        <div class="checkout col-12 gap-0 gap-lg-5 mb-4 d-flex flex-column flex-lg-row">
          <div class="w-100 w-lg-25"><p><a class="text-white" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;1. Carro</a></p></div>
          <div class="w-100 w-lg-25"><p><a class="text-white" href="shipping.php"><i class="fa-regular fa-credit-card"></i>&nbsp;&nbsp;2. Datos de Envío</a></p></div>
          <div class="w-100 w-lg-25"><p style="color: #ffc107;" class="active"><i class="fa-solid fa-box-archive"></i>&nbsp;&nbsp;3. Pago</p></div>
        </div>
      </div> <!-- ./seccion1 -->


      <div class="row d-flex justify-content-between gap-2">

        <!-- Sección 2 de la página PAYMENT (Seleccionar forma de pago) -->
        <div class="checkout-container checkout-left col-12 col-lg-8 p-3 border border-secondary rounded">
          <h5 class="text-uppercase mx-2">Selecciona tu forma de pago</h5>

          <!-- Pago con tarjeta Visa, Mastercard o Maestro -->
          <div class="cart-element my-2 mx-2 p-2 d-flex flex-column flex-lg-row justify-content-start align-items-center gap-5 rounded">
            <span><input class="form-check-input" type="radio" name="pago" id="pago1" onchange="mostrarDetallesTarjeta(this)"></span>
            <span style="width:70px; background-color:#FFF; padding:5px; text-align:center;" class="rounded"><img style="height:20px;" class="img-fluid" src="../assets/img/icons/checkout.svg" alt="Método de pago"></span>
            <span class="font-light"><strong>Tarjeta de crédito o débito</strong><br>Paga con tarjeta de crédito Visa, Mastercard o Maestro.</span>
          </div>

          <!-- Contenedor ingreso de datos de tarjeta - oculto, se muestra al marcar el pago con tarjeta de crédito -->
          <div id="card-details" class="col-12 my-2 p-2">
            <form action="" class="needs-validation" novalidate>
              <div class="row d-flex justify-content-start">
                <div class="col-12 col-lg-6 mb-3">
                  <label for="cc-name">Nombre en la tarjeta</label>
                  <input type="text" class="form-control" id="cc-name" placeholder required disabled>
                  <small class="text-white font-light">Nombre completo como se muestra en la tarjeta</small>
                  <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                  <label for="cc-number">Número de Tarjeta de Crédito</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="XXXX-XXXX-XXXX-XXXX" required disabled>
                  <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
              </div>
              <div class="row d-flex justify-content-start">
                <div class="col-6 col-md-3 mb-3">
                  <label for="cc-expiration">Vencimiento</label>
                  <input type="text" class="form-control" id="cc-expiration" maxlength="5" placeholder required disabled>
                  <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" maxlength="3" placeholder required disabled>
                  <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
              </div>
            </form>
          </div>

          <!-- Pago con tarjeta American Express-->
          <div class="cart-element my-2 mx-2 p-2 d-flex flex-column flex-lg-row justify-content-start align-items-center gap-5 rounded">
            <span><input class="form-check-input" type="radio" name="pago" id="pago2" onchange="ocultarDetallesTarjeta(this)"></span>
            <span style="width:70px; background-color:#FFF; padding:5px; text-align:center;" class="rounded"><img style="height:20px;" class="img-fluid" src="../assets/img/icons/checkout_amex.svg" alt="Método de pago"></span>
            <span class="font-light"><strong>American Express</strong><br>Paga con tarjeta de crédito American Express.</span>
          </div>

          <!-- Pago con PayPal -->
          <div class="cart-element my-2 mx-2 p-2 d-flex flex-column flex-lg-row justify-content-start align-items-center gap-5 rounded">
            <span><input class="form-check-input" type="radio" name="pago" id="pago3" onchange="ocultarDetallesTarjeta(this)"></span>
            <span style="width:70px; background-color:#FFF; padding:5px; text-align:center;" class="rounded"><img style="height:20px;" class="img-fluid" src="../assets/img/icons/braintree_paypal.svg" alt="Método de pago"></span>
            <span class="font-light">PayPal</span>
          </div>

          <!-- Pago con PaySafecard -->
          <div class="cart-element my-2 mx-2 p-2 d-flex flex-column flex-lg-row justify-content-start align-items-center gap-5 rounded">
            <span><input class="form-check-input" type="radio" name="pago" id="pago4" onchange="ocultarDetallesTarjeta(this)"></span>
            <span style="width:70px; background-color:#FFF; padding:5px; text-align:center;" class="rounded"><img style="height:20px;" class="img-fluid" src="../assets/img/icons/nuvei_paysafecard.svg" alt="Método de pago"></span>
            <span class="font-light"><strong>PaySafecard</strong><br>Paga a través de Paysafecard - no se necesita cuenta bancaria o tarjeta de crédito.</span>
          </div>

          <!-- Pago con transferencia bancaria -->
          <div class="cart-element my-2 mx-2 p-2 d-flex flex-column flex-lg-row justify-content-start align-items-center gap-5 rounded">
            <span><input class="form-check-input" type="radio" name="pago" id="pago5" onchange="ocultarDetallesTarjeta(this)"></span>
            <span style="width:70px; background-color:#FFF; padding:5px; text-align:center;" class="rounded"><img style="height:20px;" class="img-fluid" src="../assets/img/icons/trustly.svg" alt="Método de pago"></span>
            <span class="font-light"><strong>Pagar por transferencia bancaria</strong><br>Paga directamente desde tu cuenta bancaria en línea.</span>
          </div>

        </div> <!-- ./seccion2 -->

        <!-- Sección 3 de la página PAYMENT (Resumen del Carrito) -->
        <div class="checkout-container checkout-right col-12 col-lg-3 p-3 border border-secondary rounded">
          <h5 class="text-uppercase">Resumen</h5>

          <a id="continuar-pago" type="button" class="btn btn-warning w-100 my-3" href="createOrder.php?user=<?= $member ?>" target="_self" title="Enlace a la pantalla de pagos">Confirmar pago</a>

          <div class="row">
            <div class="col d-flex justify-content-start align-items-center cart-payment font-light"><p style="font-size:0.8em;">Al hacer clic en "Continuar", admito que he leído y aceptado los <a href="../support/terminos.php" target="_self" title="Enlace a la página de Términos y condiciones">Términos y condiciones</a> incluida la <a href="../support/privacidad.php" target="_self" title="Enlace a la página de Política de privacidad">Política de privacidad</a> y los Cookies. Tambien he leido y aceptado Política de reembolso y T / C de PromoGames</p></div>
          </div>
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

</body>

</html>