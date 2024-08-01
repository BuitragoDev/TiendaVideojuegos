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
  <title>..:: Videojuegos Buitrago - Tienda Online | Políticas de Privacidad ::..</title>

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

    <div class="container privacidad pt-3">

        <!-- Contenedor donde se encuentra el menú de navegación de la sección de soporte -->
        <div class="row">
          <div class="col-12">
          <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='white'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
              <ol class="breadcrumb d-flex align-items-center">
                <li class="breadcrumb-item"><a href="../index.php" target="_self" title="Enlace a la página de portada"><img src="../assets/img/logo.webp" alt="Imagen del logo"></a></li>
                <li class="breadcrumb-item"><a href="ticket.php" target="_self" title="Enlace a la página principal de tickets">Support</a></li>
                <li class="breadcrumb-item active" aria-current="page">Políticas de privacidad</li>
              </ol>
            </nav>
          </div>
        </div> <!-- /.menu-navegación -->

        <!-- Sección 1 de la página POLITICAS DE PRIVACIDAD (título y buscador) -->
        <div class="row">
          <div class="col-12 col-lg-8">
            <h1 class="text-white">Políticas de privacidad</h1>
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

        <!-- Sección 2 de la página POLITICAS DE PRIVACIDAD (texto) -->
        <div class="row">
          <div class="col-12 my-5">
            <p>We give a lot of importance to the protection of your data. We have established safety and confidential rules to ensure the best possible protection of your data. We do, however, need to collect certain information when you order. Please know that personal data is not collected without your prior consent.</p>
            <p>These rules apply to all those involved with the company.</p>
            <h1>Buitrago Gaming</h1>
            <h4>Website Privacy Notice</h4>
            <h4>1. About us</h4>
            <p>This website is operated by Buitrago Gaming, a private company incorporated under the laws of the United Arab Emirates with company registration number DMCC179752 and having its registered office at Office Tower 707, Sapphire Plaza, Sunflower Street, Oasis City, Dubai, UAE (“Buitrago Gaming,” “we,” “us,” “our”).</p>
            <p>The website www.buitrago-gaming.com and our mobile applications (“website”) list various digital content, such as downloadable game titles and other downloadable content (“Content”). We sell official keys on the website, issued by the publisher and/or the developer of the relevant Content (“Developer”), which allow the user to unlock, access, and download the relevant Content from the Developer’s platform (“Codes”). We are not the Developer of the Content, and we do not own or operate the Developer’s platform.</p>
            <h4>2. Who does this privacy notice apply to?</h4>
            <p>This privacy notice applies to individuals who access, browse and use our website. Its aim is to give you information on how we collect and process your personal data through your use of the website. We collect personal data when you access our website, register with us, contact us, send us feedback and product reviews, purchase Codes and other products via our website, post material to our website, request marketing updates and take part in promotions, surveys, affiliation or partnership programs via our website.</p>
            <p>If you are an Buitrago-Gaming partner this privacy notice applies to you like any other user of the website. However, we will also process certain personal data relating to you in order to perform our partnership agreement with you.</p>
            <p>It is important that you read this privacy notice together with any other privacy notice or fair processing policy we may provide on specific occasions when we are collecting or processing personal data about you so that you are aware of how and why we are using your personal data.</p>
            <h4>3. Third party links</h4>
            <p>The website may include links to third party websites, plug-ins and applications. Clicking on those links or enabling those connections may allow third parties to collect or share data about you. We do not control these third party websites and are not responsible for their privacy notices. When you leave our website, we encourage you to read the privacy notices of every website you visit. Please see our cookies policy for details of cookies and similar technologies served by third parties and how to control these.</p>
            <p>For partners that wish to collaborate with us, we may use Youtube API Services to access and collect the number of subscribers you currently have on your Youtube channel. We will store that data for a period of 14 days. That information will not be shared to any external parties and will be used only internally by our marketing team. You can access Google Privacy Policy on <a href="http://www.google.com/policies/privacy" target="_blank" title="Enlace a las politicas de privacidad de Google">http://www.google.com/policies/privacy</a></p>
            <h4>4. Types of personal data we process</h4>
            <p>“Personal data” means information about an individual from which that person can be identified. It does not include data where an individual’s identity has been removed (anonymous data).</p>
            <p>Throughout this privacy notice we use the term "processing" to refer to all activities involving your personal data, including collecting, handling, storing, sharing, accessing, using, transferring, erasing and disposing of it.</p>
            <p>The personal data we collect about you depends on the particular activities carried out through our website. For example, we collect different types of personal data depending on whether you create a user account, purchase Codes or only browse the website. Typically we collect and process the following kinds of personal data:</p>
            <ul>
              <li>Identity and Contact Data includes your name, postal address, email address, date of birth and any personal data provided when contacting us and in the case of Buitrago-Gaming partners, any personal data provided in the course of our partnership;</li>
              <li>Financial Data includes information necessary for processing payments and fraud prevention, and in respect of Buitrago-Gaming partners this includes all billing-related information. If you pay us by payment card this will include payment card numbers, cardholder name(s), security code numbers and expiry dates. For all payment types, we will process payment details received from your payment card issuer or the provider of your chosen method of payment;</li>
              <li>Transaction Data includes details about payments to and from you and other details of products and services you have purchased from us, and in the case of Buitrago-Gaming partners this includes personal data relating to the administration, management and performance of our business relationship;</li>
              <li>Technical Data may include internet protocol (IP) address, browser type and version, time zone setting and location, browser plug-in types and versions, operating system and platform and other technology on the devices you use to access our website;</li>
              <li>Usage Data includes information about how you use the website such as the services you view or search for, page response times, download errors, length of visits and page interaction information (such as scrolling, clicks and mouse-overs); and</li>
              <li>Marketing and Communications Data includes your preferences in receiving marketing communications from us and your communication preferences.</li>
            </ul>
            <p>We also collect, use and share aggregated data such as statistical or demographic data for various purposes. Aggregated data may be derived from your personal data but is not considered personal data in law as this data does not directly or indirectly reveal your identity. For example, we may aggregate your Usage Data to calculate the percentage of users accessing a specific website feature. However, if we combine or connect aggregated data with your personal data so that it can directly or indirectly identify you, we treat the combined data as personal data which will be used in accordance with this privacy notice.</p>
            <p>We do not collect any special categories of personal data about you (this is personal data that reveals racial or ethnic origin, political opinions, religious or philosophical beliefs or trade union membership; genetic data; biometric data for the purpose of uniquely identifying an individual or data concerning health or sexual orientation). Nor do we collect any information about criminal convictions and offences. Please do not provide on the website or in any communications with us any special categories of personal data and/or personal data relating to criminal convictions and offences relating to you; or any personal data concerning any other person.</p>
            <p>Where we need to collect personal data by law, or under the terms of a contract we have with you (e.g. under our Terms of Sale, and you do not provide that personal data when requested, we may not be able to perform the contract we have or are trying to enter into with you. We will inform you at the time of collecting personal data from you whether you must provide the personal data to use the website or any of our services, and whether the provision of personal data requested by us is optional.</p>
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