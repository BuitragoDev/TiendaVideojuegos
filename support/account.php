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

  <?php include('../header_opc.php') ; ?> 

  <!-- Aquí empieza el MAIN -->
  <main class="container-fluid p-0">

    <div class="container physical-products pt-3">

        <!-- Contenedor donde se encuentra el menú de navegación de la sección de soporte -->
        <div class="row">
          <div class="col-12">
          <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb d-flex align-items-center">
                <li class="breadcrumb-item"><a href="../index.php" target="_self" title="Enlace a la página de portada"><img src="../assets/img/logo.webp" alt="Imagen del logo"></a></li>
                <li class="breadcrumb-item"><a href="ticket.php" target="_self" title="Enlace a la página principal de tickets">Support</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cuenta</li>
              </ol>
            </nav>
          </div>
        </div> <!-- /.menu-navegación -->

        <!-- Sección 1 de la página ACCOUNT (título y buscador) -->
        <div class="row">
          <div class="col-12 col-lg-8">
            <h1 class="text-white">Cuenta</h1>
          </div>
          <div class="col-12 col-lg-4">
            <form class="formulario-ticket" action="#">
                <div class="input-container">
                    <i class="fa-solid fa-magnifying-glass" style="color:#FFFFFF;"></i>
                    <input type="text" id="obtener_respuestas" name="obtener_respuestas" placeholder="Buscar preguntas frecuentes">
                </div>
            </form>
          </div>
        </div> <!-- ./seccion1 -->

    </div>

    <div class="container">

      <!-- Sección 2 de la página ACCOUNT (accordion + texto) -->
      <div class="row d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2 gap-lg-2 my-5">

        <div class="col-12">

          <!-- Elemento 1 -->
          <p class="d-inline-flex gap-1">
            <a class="btn btn-warning text-start" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">¿Cómo me registro?</a>
          </p>
          <div class="row">
            <div class="col">
              <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                  <p>Si quieres registrarte en nuestra web, haz click en "Registrarse" y rellena la información requerida - <a href="../register.php" target="_self" title="Enlace a la página de login de usuarios">Enlace de registro</a>.</p>
                  <ol>
                    <li>Introduce tu usuario, e-mail y contraseña.</li>
                    <li>Confirma tu email.</li>
                    <li>Conecta al menos una de tus redes sociales (Facebook, Twitter, Instagram) o selecciona "Proceder más tarde" para hacerlo después.</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Elemento 2 -->
          <p class="d-inline-flex gap-1 mt-2">
            <a class="btn btn-warning text-start" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2">Mi IP ha sido bloqueada para acceder a su web, ¿qué debo de hacer?</a>
          </p>
          <div class="row">
            <div class="col">
              <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body">
                  <p>Si has recibido un error diciendo que tu IP está bloqueada por favor asegúrate de:</p>
                  <ul>
                    <li>Que no estás usando VPN o Proxy.</li>
                    <li>Limpiar las cookies y el cache.</li>
                    <li>Probar otro navegado.</li>
                    <li>No estás intentando registrarte o usar la web desde estos países.</li>
                  </ul>
                  <p>Si has probado todo lo de arriba y aún tienes problemas por favor contacta a nuestro Equipo de Soporte.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Elemento 3 -->
          <p class="d-inline-flex gap-1 mt-2">
            <a class="btn btn-warning text-start" data-bs-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3">¿Cómo puedo conectar mi cuenta?</a>
          </p>
          <div class="row">
            <div class="col">
              <div class="collapse multi-collapse" id="multiCollapseExample3">
                <div class="card card-body">
                  <p>Te ofrecemos la posibilidad de registrarte / conectar te/ iniciar sesión desde diferentes aplicaciones como Facebook, Twitter o Instagram. Si tienes alguna cuenta y la quieres conectar con otras plataformas:</p>
                  <ul>
                    <li>Dirígete a tu "Perfil" y selecciona <a href="../login.php" target="_self" title="Enlace a la página de registro de usuarios">Aplicaciones conectadas</a> y desde allí podrás conectar tus aplicaciones.</li>
                  </ul>
                  <p>Si quieres borrar alguna de ellas, puedes hacerlo desde las <a href="../login.php" target="_self" title="Enlace a la página de registro de usuarios">Aplicaciones conectadas</a>.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Elemento 4 -->
          <p class="d-inline-flex gap-1 mt-2">
            <a class="btn btn-warning text-start" data-bs-toggle="collapse" href="#multiCollapseExample4" role="button" aria-expanded="false" aria-controls="multiCollapseExample4">¿Puedo revisar mi historial de inicio de sesión?</a>
          </p>
          <div class="row">
            <div class="col">
              <div class="collapse multi-collapse" id="multiCollapseExample4">
                <div class="card card-body">
                  <p>Sí, puedes comprobar tu historial de inicio de sesión. Puedes encontrar esta información yendo a tu cuenta y a tu panel de historial de inicio de sesión. Allí podrás ver:</p>
                  <ul>
                    <li>Fecha y hora</li>
                    <li>IP</li>
                    <li>País de inicio de sesión</li>
                    <li>Navegador</li>
                  </ul>
                  <p>Si observas alguna actividad sospechosa, ponte en contacto con nuestro equipo de atención al cliente.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Elemento 5 -->
          <p class="d-inline-flex gap-1 mt-2">
            <a class="btn btn-warning text-start" data-bs-toggle="collapse" href="#multiCollapseExample5" role="button" aria-expanded="false" aria-controls="multiCollapseExample5">¿Qué es 2FA y cómo puedo usarlo?</a>
          </p>
          <div class="row">
            <div class="col">
              <div class="collapse multi-collapse" id="multiCollapseExample5">
                <div class="card card-body">
                  <p>2FA o Segundo Factor de Autentificación es una forma adicional de añadir seguridad a tu cuenta. Los usuarios pueden elegir habilitarla para evitar que su cuenta pueda ser robada. Hay dos formas de usar 2FA:</p>
                  <h4><strong>Mensaje de texto</strong></h4>
                  <p>Puedes configurar 2FA a través de tu móvil recibiendo el código por SMS cuando trates de logarte en tu cuenta.</p>
                  <h4><strong>App Authenticator</strong></h4>
                  <p>Puedes configurar 2FA a traves de la aplicación Authenticator, recibirás un código a través de ella cuando trates de logarte.</p>
                  <p>Para usuarios Android recomendamos usar la app "Authy" o Google Authenticator".</p>
                  <p>Para IOS recomendamos usar "Authy" o "1Password"</p>
                  <p>Puedes encender o apagar o editar los dispositivos que usas para 2FA en tu <a href="../userProfile.php" target="_self" title="Enlace al panel de control">panel de control</a>.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Elemento 6 -->
          <p class="d-inline-flex gap-1 mt-2">
            <a class="btn btn-warning text-start" data-bs-toggle="collapse" href="#multiCollapseExample6" role="button" aria-expanded="false" aria-controls="multiCollapseExample6">¿Cómo sé si puedo comprar o registrarme desde mi país?</a>
          </p>
          <div class="row">
            <div class="col">
              <div class="collapse multi-collapse" id="multiCollapseExample6">
                <div class="card card-body">
                  <p>Desde estos países/regiones <strong>NO</strong> está permitido comprar o registrarse en BUITRAGO:</p>
                  <ul>
                    <li>Crimea/Sevastopol</li>
                    <li>Rusia</li>
                    <li>Palestina</li>
                    <li>Blangadesh</li>
                    <li>Sudán</li>
                    <li>Cuba</li>
                    <li>Iraq</li>
                    <li>Irán</li>
                    <li>Israel</li>
                    <li>Myanmar</li>
                    <li>Afganistán</li>
                    <li>Namibia</li>
                  </ul>
                  <p>Si has sido verificado y, sin embargo, te encuentras en un país/región restringido, si podrás comprar nuestros productos.</p>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div> <!-- ./seccion2 -->

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