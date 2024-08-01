<?php
/* ==========================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
========================================================================== */

  // Inicia una sesión de PHP o reanuda la sesión actual si existe una 
  session_start();

  // Si ya existe una sesión de usuario activa, es decir, ya estás logeado, te redirige al index.
  if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
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
  <title>..:: Videojuegos Buitrago - Tienda Online | Login ::..</title>

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

  <div class="container login pt-3 px-3 pt-lg-5 px-lg-0"> <!-- container -->

      <div class="row justify-content-center p-0">

        <!-- Sección 1 de la página LOGIN (Texto bienvenida) -->
        <div class="col-12 col-lg-8 d-flex justify-content-start align-items-center">
          <h1 class="text-white my-2 my-lg-0">¡Hola!<br>¡Me alegro de verte!</h1>
        </div> <!-- ./seccion1 -->

        <!-- Sección 2 de la página LOGIN (Formulario de login) -->
        <div class="col-12 col-lg-4 p-3 p-lg-5 login-form-container">

          <h3 class="text-white">Iniciar sesión</h3>
          <p class="text-white">¿Nuevo usuario? <a href="register.php" target="_self" title="Enlace a la página de registro de usuarios">Crear una cuenta</a></p>

          <!-- Login con las cuentas de Google, Facebook o Apple -->
          <div class="d-flex justify-content-between align-items-center gap-3 my-2">
            <button class="btn btn-light"><i class="fa-brands fa-google" style="color: #000000;"></i>&nbsp;Google</button>
            <button class="btn btn-primary"><i class="fa-brands fa-facebook-f" style="color: #ffffff;"></i></i>&nbsp;Facebook</button>
            <button class="btn btn-dark"><i class="fa-brands fa-apple" style="color: #ffffff;"></i>&nbsp;Apple</button>
          </div>

          <hr>

          <!-- Login con usuario y contraseña -->
          <form class="loginForm d-flex flex-column gap-3 needs-validation" action="controlador/procesarLogin.php" method="POST" novalidate>
            <div class="form-group">
              <label for="username">Usuario</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required>
            </div>
            <div class="form-group">
              <label for="pass">Contraseña</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-warning">Iniciar sesión</button>
          </form>
        
          <p class="text-white my-3 fs-6 text-center"><a href="lost_password.php" target="_self" title="Enlace a la página de reseteo de contraseña">¿Has olvidado tu contraseña?</a></p>
        
        </div> <!-- ./seccion2 -->

      </div> <!-- /.row -->

    </div> <!-- /.container -->

  </main> <!-- /.main -->

  <!-- Footer (Contiene el área de ayuda y redes sociales) -->
  <?php include('footer.php') ; ?> 

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Vinculación de los JS -->
  <script src="js/scripts.js"></script>

  <!-- Sweet Alerts-->
  <script>
    // Sweet Alert que verifica que llega una variable 'loginError' con valor true, en caso de no poder producirse un logeo correctamente.
    document.addEventListener("DOMContentLoaded", function () {
      // Obtener los parámetros de la URL
      const urlParams = new URLSearchParams(window.location.search);

      // Verificar si la variable "loginError" tiene el valor "true"
      if (urlParams.get("loginError") === "true") {
          // Mostrar el SweetAlert al cargar la página
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Ha ocurrido un error. Por favor vuelve a intentarlo!",
            confirmButtonText: "Ok",
            confirmButtonColor: "	#FF0000",
          });
      }
    });

    // Sweet Alert que verifica que llega una variable 'needLogin' con valor true, 
    // en caso de intentar agregar un producto al carrito sin estar logueado, con una sesión de usuario activa.
    document.addEventListener("DOMContentLoaded", function () {
      // Obtener los parámetros de la URL
      const urlParams = new URLSearchParams(window.location.search);

      // Verificar si la variable "needLogin" tiene el valor "true"
      if (urlParams.get("needLogin") === "true") {
          // Mostrar el SweetAlert al cargar la página
          Swal.fire({
            icon: "info",
            title: "Importante!",
            text: "Para poder añadir productos al carrito debes tener una cuenta de usuario.",
            confirmButtonText: "Ok",
            confirmButtonColor: "	#007bff",
          });
      }
    });
  </script>

</body>

</html>