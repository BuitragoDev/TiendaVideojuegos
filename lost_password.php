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
  <main class="container-fluid p-0"> <!-- container-fluid -->

  <div class="container lostPassword pt-3 pt-lg-5"> <!-- container -->

      <div class="row justify-content-center p-0">

        <!-- Sección 1 de la página LOST-PASSWORD (Texto bienvenida) -->
        <div class="col-12 col-lg-8 d-flex justify-content-start align-items-center">
          <h1 class="text-white my-2 my-lg-0">¡Te ayudamos!</h1>
        </div> <!-- ./seccion1 -->

        <!-- Sección 2 de la página LOST-PASSWORD (Formulario de reestablecimiento de contraseña) -->
        <div class="col-12 col-lg-4 p-3 p-lg-5 lost-password-container">
          <h3 class="text-white">¿ Has olvidado tu contraseña?</h3>
          <p class="text-white">Te enviaremos un correo electrónico con un enlace que te permitirá establecer una nueva contraseña.</p>

          <!-- Formulario para el restablecimiento de contraseña -->
          <form class="resetForm d-flex flex-column gap-3 needs-validation" action="lost_password.php?mailSent=true" method="POST" novalidate>
            <div class="form-group">
              <label for="email">Usuario</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              <div class="valid-feedback">Completado!</div>
              <div class="invalid-feedback">Por favor, introduce un correo válido.</div>
            </div>
            <button type="submit" class="btn btn-warning">Confirmar</button>
          </form>
        
          <p class="text-white my-3 fs-6 text-center">Vuelve a <a href="login.php" target="_self" title="Enlace a la página de login">login</a></p>

        </div> <!-- ./seccion2 -->

      </div> <!-- ./row -->

    </div> <!-- ./container -->

  </main> <!-- /.main -->

  <!-- Footer (Contiene el área de ayuda y redes sociales) -->
  <?php include('footer.php') ; ?> 

  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- Vinculación de los JS -->
  <script src="js/scripts.js"></script>

  <!-- Sweet Alert -->
  <script>

    // Sweet Alert que verifica que llega una variable 'mailSent' con valor true, confirmando el envío del email.
    document.addEventListener("DOMContentLoaded", function () {
      // Obtener los parámetros de la URL
      const urlParams = new URLSearchParams(window.location.search);

      // Verificar si la variable "mailSent" tiene el valor "true"
      if (urlParams.get("mailSent") === "true") {
          // Mostrar el SweetAlert al cargar la página
          Swal.fire({
            title: 'Enhorabuena!',
                text: 'El email ha sido enviado. Comprueba tu bandeja de entrada y sigue los pasos que se indican.',
                icon: 'success',
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#3085d6",
          });
      }
    });
  </script>

</body>

</html>