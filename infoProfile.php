<?php
/* ==========================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
========================================================================== */

    // Inicia una sesión de PHP o reanuda la sesión actual si existe una 
    session_start();

    // Conexión con la base de datos.
    include('conn_db.php');

    // Consulta de la base de datos de la tabla de usuarios del usuario logueado.
    $sql = "SELECT * FROM member WHERE memberID = " . $_GET['id'] . "";
    $resultado = $mysqli->query($sql);

    // Recorremos los resultados y se los asigno a una variable.
    while ($fila = $resultado->fetch_object()) {
        $memberID = $fila->memberID;
        $username = $fila->username;
        $email = $fila->email;
        $userAvatar = $fila->userAvatar;
        $nombre = $fila->name;
        $apellidos = $fila->surname;
        $direccion = $fila->address;
        $ciudad = $fila->city;
        $pais = $fila->country;
        $zip = $fila->zip;

        if($fila->birthDate == null) { 
            $fechaFormateada = " ";
        } else {
            $fechaNacimiento = new DateTime($fila->birthDate); 
            $fechaFormateada = $fechaNacimiento->format('d-m-Y'); // fecha formateada 
        }  
        
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
  <title>..:: Videojuegos Buitrago - Tienda Online | Cambiar detalles ::..</title>

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
                            <h5 class="text-uppercase text-black">Mi información personal</h5>
                        </div>
                    </div> <!-- /.row -->

                    <!-- Fila del contenido superior de la sección -->
                    <div class="row profile-content d-flex justify-content-start gap-3 p-3">
                        <div id="userView" class="col-12 col-lg-6 bg-white p-3">
                            <div class="row d-flex justify-content-between">
                                <div class="col-11"><h6 class="text-uppercase text-black">Nombre de usuario</h6></div>
                                <div class="col-1"><a href="changeUser.php?id=<?= $memberID ?>"><i class="fa-solid fa-pencil"></i></a></div>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col"><h6 class="text-black"><?= $username; ?></h6></div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 bg-white p-3">
                            <div class="row d-flex justify-content-between">
                                <div class="col-11"><h6 class="text-uppercase text-black">Datos Personales</h6></div>
                                <div class="col-1"><a href="changeDetails.php?id=<?= $memberID ?>"><i class="fa-solid fa-pencil"></i></a></div>
                            </div>
                            <div class="row d-flex justify-content-between">
                                <div class="col">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="col-4"><strong>Nombre: </strong></td>
                                            <td class="col-8"><?= $nombre; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-4"><strong>Apellidos: </strong></td>
                                            <td class="col-8"><?= $apellidos; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-4"><strong>Correo electrónico: </strong></td>
                                            <td class="col-8"><?= $email; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-4"><strong>Fecha nacimiento: </strong></td>
                                            <td class="col-8"><?= $fechaFormateada; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-4"><strong>Dirección: </strong></td>
                                            <td class="col-8"><?= $direccion; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-4"><strong>Ciudad: </strong></td>
                                            <td class="col-8"><?= $ciudad; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-4"><strong>País: </strong></td>
                                            <td class="col-8"><?= $pais; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-4"><strong>Código Postal: </strong></td>
                                            <td class="col-8"><?= $zip; ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 bg-white p-3">
                            <div class="row d-flex justify-content-between">
                                <div class="col-11"><h6 class="text-uppercase text-black">Detalles de la factura de su compra</h6></div>
                                <div class="col-1"><a type="button" href="#" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="focus" data-bs-content="Tranquilo, que esto es una página de ejemplo ;)"><i class="fa-solid fa-pencil"></i></a></div>
                            </div>
                            <div class="row d-flex justify-content-between mt-2">
                                <div class="col-12 col-lg-6">-</div>
                                <div class="col-12 col-lg-3"><span>Número de identificación fiscal: <br>-</span></div>
                                <div class="col-12 col-lg-3"><span>Identificación de la empresa: <br>-</span></div>
                            </div>
                        </div>

                    </div> <!-- /.row -->

                </div> <!-- col -->

            </div> <!-- /.row -->

        </div> <!-- container-fluid -->

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


    <!-- Sweet Alerts -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Obtener los parámetros de la URL
        const urlParams = new URLSearchParams(window.location.search);

        // Verificar si la variable "success" tiene el valor "true"
        if (urlParams.get("success") === "true") {
            // Mostrar el SweetAlert al cargar la página
            Swal.fire({
                title: 'Enhorabuena!',
                text: 'La contraseña ha sido cambiada correctamente.',
                icon: 'success',
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#3085d6",
            });
        } 
        if (urlParams.get("cambio-user") === "true") {
            Swal.fire({
                title: 'Enhorabuena!',
                text: 'El nombre de usuario ha sido cambiado correctamente.',
                icon: 'success',
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#3085d6",
            });
        }
        if (urlParams.get("cambio-detalles") === "true") {
            Swal.fire({
                title: 'Enhorabuena!',
                text: 'Tus datos personales han sido actualizados.',
                icon: 'success',
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#3085d6",
            });
        }
      });

    </script>

</body>
</html>