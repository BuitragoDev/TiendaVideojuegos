<?php
/* ==========================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
========================================================================== */

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
  <title>..:: Videojuegos Buitrago - Tienda Online | Cambiar usuario ::..</title>

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

    <!-- Aquí empieza el Main -->
    <main class="container-fluid p-0"> <!-- container-fluid -->

        <div class="container-fluid"> <!-- container-fluid -->

            <div class="row">

                <div class="col-12 col-lg-3 profile-left d-flex flex-column p-5">

                    <!-- Contenedor de Mi cuenta -->
                    <div id="micuenta" class="option-profile-titles d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center gap-2">
                            <i class="fa-regular fa-user"></i>
                            <span class="text-uppercase">Mi cuenta</span>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <i id="flecha-micuenta" class="fa-solid fa-chevron-up"></i>
                        </div>
                    </div>
                            <div id="micuenta-options" class="micuenta-options">
                                <div id="informacion-general" class="my-2">
                                    <span><a href="userProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de información general del perfil">Información general</a></span>
                                </div>
                                <div id="historial-inicio-sesion" class="my-2">
                                    <span><a href="sessionProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace al historial de inicios de sesión personal">Historial inicio de sesión</a></span>
                                </div>
                            </div>
                    <!-- Contenedor de Pedidos -->
                    <div class="option-profile-titles d-flex justify-content-between align-items-center">
                        <div id="pedidos-options" class="pedidos-options d-flex justify-content-start align-items-center gap-2">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                            <a href="orderProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace al historial de pedidos"><span class="text-uppercase">Pedidos</span></a>
                        </div>
                    </div>
                    <!-- Contenedor de Ajustes -->
                    <div class="option-profile-titles d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center gap-2">
                            <i class="fa-solid fa-gear"></i>
                            <span class="text-uppercase">Ajustes</span>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <i id="flecha-ajustes" class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div id="ajustes-options" class="ajustes-options">
                        <div class="my-2">
                            <span><a class="active" href="#">Mi información personal</a></span>
                        </div>
                        <div class="my-2">
                            <span><a href="changePassword.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de cambio de contraseña">Cambia la contraseña</a></span>
                        </div>
                        <div class="my-2">
                            <span><a href="authentication.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de la autenticación multifactor">Autenticación multifactor</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-9 profile-right">
                    <!-- Fila para el navegador o breadcrumb -->
                    <div class="row">
                        <div class="col-12 p-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="userProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de información general del perfil">Mi cuenta</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Mi información personal</li>
                                </ol>
                            </nav>
                            <h5 class="text-uppercase text-black">Nombre de Usuario</h5>
                        </div>
                    </div> <!-- /.row -->

                    <!-- Fila del contenido superior de la sección -->
                    <div class="row profile-content d-flex justify-content-start gap-3 p-3">
                        <div id="userView" class="col-12 col-lg-6 bg-white p-3">
                            <div class="row d-flex justify-content-between">
                                <div class="col-12">
                                    <form action="controlador/procesarCambioUsuario.php?id=<?= $memberID ?>" method="POST">
                                        <div class="form-floating">
                                            <input type="hidden" class="form-control" name="id" value="<?= $memberID ?>">
                                            <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="">
                                            <label for="nombreUsuario">Nombre de usuario</label>
                                        </div>
                                        <button type="submit" class="btn btn-warning mt-4">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.row -->

                </div> <!-- /.col -->

            </div> <!-- /.row -->

        </div> <!-- /.container-fluid -->

    </main> <!-- /.container-fluid -->

    <!-- Footer (Contiene el área de ayuda y redes sociales) -->
    <?php include('footer.php') ; ?> 

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

    <!-- Vinculación de los JS -->
    <script src="js/scripts.js"></script>

    <!-- Script para mostrar los submenús del área personal.  -->
    <script>   
        // Ejecutar la función al cargar la página
        window.onload = toggleInfo;
        function toggleInfo() {
            // Obtener los elementos DOM
            const miCuenta = document.getElementById("micuenta-options");
            const miCuentaOptions2 = document.getElementById('ajustes-options');

            // Cambiar la propiedad display de los elementos
            miCuenta.style.display = "none";
            miCuentaOptions2.style.display = "block";
        }

        // Obtener referencias a los elementos
        const miCuentaOptions = document.getElementById('micuenta-options');
        const ajustesOptions = document.getElementById('ajustes-options');

        const flechaMiCuenta = document.getElementById('flecha-micuenta');
        const flechaAjustes = document.getElementById('flecha-ajustes');

        // Función para mostrar u ocultar Mi cuenta al hacer clic en su flecha
        flechaMiCuenta.addEventListener('click', () => {
            miCuentaOptions.style.display = (miCuentaOptions.style.display === 'none') ? 'block' : 'none';
            flechaMiCuenta.classList.toggle('fa-chevron-up');
            flechaMiCuenta.classList.toggle('fa-chevron-down');
        });

        // Función para mostrar u ocultar Ajustes al hacer clic en su flecha
        flechaAjustes.addEventListener('click', () => {
            ajustesOptions.style.display = (ajustesOptions.style.display === 'block') ? 'none' : 'block';
        });
    </script>

</body>
</html>