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
                                    <span><a class="active" href="#">Información general</a></span>
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
                            <span><a href="infoProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de información personal">Mi información personal</a></span>
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
                                    <li class="breadcrumb-item active" aria-current="page">Información general</li>
                                </ol>
                            </nav>
                            <h5 class="text-uppercase text-black">Información general</h5>
                        </div>
                    </div> <!-- /.row -->

                    <!-- Fila del contenido superior de la sección -->
                    <div class="row profile-content d-flex justify-content-start gap-3 p-3">
                        <div class="col-12 col-lg-7 bg-white">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center py-3 px-4 border-bottom">
                                <h5 class="text-uppercase text-black mt-1">PERFIL</h5>
                                </div>
                                <div class="col-12 d-flex align-items-center py-3 px-4 border-bottom user-info">
                                    <div class="row d-flex justify-content-between w-100">
                                        <div class="col-12 col-lg-2 d-flex align-items-center"><img class="img-fluid object-cover" src="<?= $userAvatar ?>" alt="Foto de perfil"></div>
                                        <div class="col-12 col-lg-9 d-flex flex-column justify-content-center align-items-start pt-2">
                                            <p><strong><?= $username ?></strong><br><?= $email ?></p>
                                        </div>
                                        <div class="col-12 col-lg-1 d-flex justify-content-start justify-content-lg-end align-items-center"><a href="infoProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de información personal"><i class="fa-solid fa-pencil"></i></a></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row d-flex justify-content-between w-100">
                                        <div class="col-11 d-flex flex-column justify-content-center align-items-start p-4">
                                            <p><strong>Completa tu perfil (33 %)</strong></p>
                                            <div class="profile-bar p-0">
                                                <div class="profile-completed d-flex justify-content-start"></div>
                                            </div>
                                            <p>2 de 6 tareas completadas</p>
                                        </div>
                                        <div class="col-1 d-flex justify-content-center align-items-center"><a type="button" href="#" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="focus" data-bs-content="Tranquilo, que esto es una página de ejemplo ;)"><i class="fa-solid fa-chevron-right"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 bg-white">
                            <div class="row d-flex justify-content-between p-3">
                                <div class="col d-flex justify-content-start align-items-center"><h2 class="text-black">¡Gana 5 € de bonificación!</h2></div>
                                <div class="col d-flex justify-content-end align-items-center"><img src="assets/img/bolsa-oro.webp" alt="Imagen con el dibujo de una bolsa de oro"></div>
                            </div>
                            <div class="row p-3">
                                <div class="col-12">
                                    <p>Vende tu primer objeto por 10 € o más y <strong>consigue una bonificación de 5 €</strong> para gastar en Eneba.</p>
                                    <a href="#">Obtén más detalles</a><br>
                                    <button type="button" class="btn btn-warning my-4" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="focus" data-bs-content="Tranquilo, que esto es una página de ejemplo ;)">Empieza a vender</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.row -->

                    <!-- Fila del contenido inferior de la sección -->
                    <div class="row d-flex justify-content-start gap-3 p-3">
                        <div class="col-12 col-lg-7 bg-white p-3">
                            <div class="row w-100 p-3">
                                <div class="col-12 d-flex flex-column align-items-start border-bottom">
                                    <h6 class="text-uppercase text-black">Saldo total</h6>
                                    <h1 class="verde">0,00 €</h1>
                                    <p class="importe-total">Importe total de todos los saldos estimados según la tasa de conversión más reciente.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex flex-column align-items-start border-bottom">
                                    <div class="row w-100 p-3">
                                        <div class="col-8">
                                            <h6 class="text-uppercase text-black">SALDO DE LA TARJETA DE REGALO</h6>
                                            <p class="importe-total">Disponible para gastar solo en Buitrago Gaming.</p>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end">
                                            <h2 class="verde">0,00 €</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-column align-items-start border-bottom">
                                    <div class="row w-100 p-3">
                                        <div class="col-8">
                                            <h6 class="text-uppercase text-black">SALDO DE GANANCIAS</h6>
                                            <p class="importe-total">Disponible para retirar y gastar solo en Buitrago Gaming.</p>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end">
                                            <h2 class="verde">0,00 €</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-column align-items-start">
                                    <div class="row w-100 p-3">
                                        <div class="col-8">
                                            <h6 class="text-uppercase text-black">Bonus</h6>
                                            <p class="importe-total">Disponible para gastar en Buitrago Gaming si se transfiere al saldo de la tarjeta de regalo.</p>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end">
                                            <h2 class="verde">0,00 €</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 bg-white">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center py-3 px-4 border-bottom">
                                    <h5 class="text-uppercase text-black mt-1">Últimas compras</h5>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col-12 d-flex justify-content-center align-items-center gap-3">
                                    <div style="width: 50%; overflow:hidden;">
                                        <a href="#"><img class="img-fluid rounded" src="assets/img/products/1.webp" alt="Imagen del producto"></a>
                                    </div>
                                    <div style="width: 50%; overflow:hidden;">
                                    <a href="#"><img class="img-fluid rounded" src="assets/img/products/2.webp" alt="Imagen del producto"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col-12">
                                    <button type="button" class="btn btn-outline-dark my-2" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-trigger="focus" data-bs-content="Tranquilo, que esto es una página de ejemplo ;)">Ver biblioteca de códigos</button> 
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

    <!-- Script para mostrar los submenús del área personal -->
    <script>     
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