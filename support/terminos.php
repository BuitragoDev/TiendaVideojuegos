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
  <title>..:: Videojuegos Buitrago - Tienda Online | Términos y Condiciones ::..</title>

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
  <main class="container-fluid p-0">

    <div class="container terminos pt-3">

        <!-- Contenedor donde se encuentra el menú de navegación de la sección de soporte -->
        <div class="row">
          <div class="col-12">
          <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb d-flex align-items-center">
                <li class="breadcrumb-item"><a href="../index.php" target="_self" title="Enlace a la página de portada"><img src="../assets/img/logo.webp" alt="Imagen del logo"></a></li>
                <li class="breadcrumb-item"><a href="ticket.php" target="_self" title="Enlace a la página principal de tickets">Support</a></li>
                <li class="breadcrumb-item active" aria-current="page">Términos y Condiciones</li>
              </ol>
            </nav>
          </div>
        </div> <!-- /.menu-navegación -->

        <!-- Sección 1 de la página TERMINOS Y CONDICIONES (título y buscador) -->
        <div class="row">
          <div class="col-12 col-lg-8">
            <h1 class="text-white">Términos y Condiciones</h1>
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

        <!-- Sección 2 de la página TERMINOS Y CONDICIONES (texto) -->
        <div class="row">
          <div class="col-12 my-5">
            <p>Please read the following important terms and conditions before you purchase any codes for digital games and/or content through this website.</p>
            <h4>1. Who we are?</h4>
            <p>1.1. These are the terms and conditions (“Terms”) upon which Aliasing DMCC, a private company incorporated under the laws of United Arab Emirates under company registration number DMCC666666 and having its registered office at Office Unit 104, Jeddah Business Center 3, Cluster Y, Jeddah Lakes Towers, Dubai, UAE (“Buitrago”, “we”, “us”, “our”) sell and supply access codes to digital content to you through the website https://antoniobg.000webhostapp.com and through our mobile applications (“Website”).</p>
            <p>1.2. Our Website lists various digital content, e.g. downloadable game titles and other downloadable content (“Content”). We sell on the Website official keys, issued by the publisher and/or the developer of relevant Content (“Developer”), which allow the user to unlock, access and download the relevant Content from the Developer’s platform (“Code(s)”). We are not the Developer of the Content and we do not own or operate the Developer’s platform. In addition to these Terms, you may also be subject to the Developer’s end user licence agreement and other terms related to its Content and its platform.</p>
            <h4>2. Our Group Company</h4>
            <p>2.1 One of our group companies, Transactial Limited, an Irish limited company with company number 664166, VAT number IE3666666BH and registered office at at Court Center, Block 4, Court Road, D01 HD66 Dublin Ireland (Irish Company) provides various services in conjunction with your purchase and redemption of Codes including the processing of your payments depending on the method of payment selected by you when purchasing Codes, customer services, technical support, managing of your cancellation rights and issuing you a refund or other payment where applicable.</p>
            <h4>3. How to contact us</h4>
            <p>3.1. You can contact us through the support and ‘contact us’ links on the Website (https://antoniobg.000webhostapp.com) or by logging into your User Account (defined in section 4.1) and logging a customer support request or ticket or by writing to us at support@buitrago.com. Irish Company manages customer services and technical support queries on behalf of Buitrago.</p>
            <p>3.2. If we have to contact you we will do so by the email address you provided in your User Account settings.</p>
            <h4>4. About you</h4>
            <p>4.1. In order for you to buy Codes from us through the Website you need to have a valid user account for the Website (“User Account”), have a valid payment method that we accept, be authorised to use that payment method (e.g. it is in your name or you have the right to use it) and a mobile, computer, television, watch or other supported device (“Device”) that is capable of accessing and downloading the Content. You must keep your User Account details secure and must not share them with anyone else.</p>
            <p>4.2. If the law in your country considers you to be a minor you must have your parent’s or legal guardian’s permission to purchase Codes from us and to enter into these Terms.</p>
            <p>4.3. Some Content are subject to age restrictions and therefore Codes for such Content will not be sold to persons who have not reached the relevant age where we are aware of this fact. You must comply with any age restrictions that may apply to the purchase and use of any Content. If the law in your country considers you to be a minor you and your parent or legal guardian are responsible for ensuring you purchase age appropriate Content.</p>
            <h4>5. Your device and data</h4>
            <p>5.1. Before you place your order you should check that the hardware and software requirements of your Device will allow you to access and download the Content. Please click on the ‘information’ button for your chosen Content for the minimum and recommended hardware and software requirements, as issued by Developer.</p>
            <p>5.2. You are responsible for any access or data fees from third parties (such as your internet provider and mobile carrier) in connection with your use of the Website including your purchase of Codes and your downloading and access of Content. Please check the file size of your Content carefully as using too much data might mean that you exceed your data limit and you could face paying more than you were expecting.</p>
            <h4>6. Your privacy and personal data</h4>
            <p>6.1. Any personal data that you provide to us will be dealt with in accordance with our Privacy Notice, which explains what personal data we collect from you, how and why we collect, store, use and share such information and your rights in relation to your personal data. Our Privacy Notice is available at https://antoniobg.000webhostapp.com.</p>
            <p>6.2. For partners that wish to collaborate with us, we may use Youtube API Services and you will be bound by Youtube Terms of Services that you can access on the following link: here</p>
            <h4>7. Key information</h4>
            <p>7.1. We only sell Codes for Content which you can download to your Device from the Developer’s platform. All Content displayed on the Website for which we sell Codes are accompanied by the main characteristics of the relevant product including the version or edition of the Content, which 2may not be the latest version or edition, details of any base game title to which the Code and Content relates and details of where you can find the Developer’s end user licence agreement. Content images on the Website are for illustrative purposes only. Content descriptions may include video and still images that do not represent actual gameplay.</p>
            <p>7.2. After you purchase Code for specific Content you can contact the customer services team in the Irish Company, as described in section 3.1, if you have any support queries.</p>
            <p>7.3. We do not provide upgrades or updates to your Content after you purchase Codes from us and we do not let you know if the Developer of your Content makes any upgrades or updates available to you or generally available. The Codes you may purchase from us only allow you to access and download Content. The Codes you may purchase from us do not entitle you to any updates, upgrades, new releases or new versions of the Content unless the Developer of your Content provides any of these to you in accordance with the Developer’s end user licence agreement or other agreement with you. However, in most cases the Developer will require additional payment from you for updates, upgrades, new releases or new versions of Content.</p>
            <p>...</p>
          </div>
        </div> <!-- ./seccion2 -->

    </div>

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