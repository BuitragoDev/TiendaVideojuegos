<!-- ==========================================================================
================	URL 		      |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
========================================================================== -->

<!-- Aquí empieza el header -->
<header class="container-fluid p-0 fixed-top">

    <!-- Aquí empieza el contenedor de la barra del logo, buscador, login y carrito -->
    <div class="container">

        <div class="row topRow px-1">

            <!-- Contenedor del Logo -->
            <div class="col-2 col-lg-4 d-flex justify-content-start align-items-center gap-3 logo">

                <a href="index.php" target="_self"><img class="mb-1" src="assets/img/logo.webp" alt="Imagen del Logo"></a><a
                class="d-none d-lg-block" href="index.php" target="_self">Buitrago</a>

            </div>

            <?php
            if (isset($_SESSION['usuario'])) {

                // Consulta para conseguir el ID del usuario conectado.
                $usuario = $_SESSION['usuario'];

                $sqlUser = "SELECT memberID FROM member WHERE username = '$usuario'";

                $result = $mysqli->query($sqlUser);
                $row = $result->fetch_assoc();
                $memberID = $row['memberID'];
                //----------------------------------------------------------------------
            ?>

            <!-- Si el usuario está autenticado, muestra su nombre de usuario -->
            <!-- Div del Login y Carrito -->
            <div class="col-10 col-lg-8 d-flex justify-content-end align-items-center text-white gap-2 enlaces">
                Bienvenido, <a href="#" target="_self" title="Enlace a la página de perfil de usuario" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION["usuario"]; ?></a>
                <ul class="dropdown-menu profile-menu">
                    <li><a class="dropdown-item d-flex gap-3 justify-content-between align-items-center" href="userProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de perfil de usuario">Mi cuenta<i class="fa-regular fa-user"></i></a></li>
                    <li><a class="dropdown-item d-flex gap-3 justify-content-between align-items-center" href="orderProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de pedidos">Pedidos<i class="fa-solid fa-cart-arrow-down"></i></a></li>
                    <li><a class="dropdown-item d-flex gap-3 justify-content-between align-items-center" href="infoProfile.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de ajustes">Ajustes<i class="fa-solid fa-gear"></i></a></li>
                    <hr class="my-3 bg-white" style="margin:0 auto; width:90%; height:1px;">
                    <?php if ($_SESSION['usuario'] == "admin") { ?>
                    <li><a class="dropdown-item d-flex gap-3 justify-content-between align-items-center" href="admin-panel.php?id=<?= $memberID ?>" target="_self" title="Enlace a la página de ajustes">Admin panel<i class="fa-solid fa-lock"></i></a></li>     
                    <?php } ?>
                    <li><a class="dropdown-item d-flex gap-3 justify-content-between align-items-center" href="closeSession.php" title="Enlace que cierra la session">Cerrar sesión<i class="fa-solid fa-right-from-bracket"></i></a></li>
                </ul>
                <?php
                } else {
                    // Si no hay sesión iniciada, mostrar enlaces de inicio de sesión y registro
                    echo '<div class="col-10 col-lg-8 d-flex justify-content-end align-items-center text-white gap-2 gap-lg-3 enlaces">';
                    echo '<a href="login.php" target="_self" title="Enlace a la página de registro de usuarios">Login</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
                    echo '<a href="register.php" target="_self" title="Enlace a la página de login de usuarios">Registrarse</a>';
                }
                ?>
                
                <!-- Botón del carrito de la compra -->
                <button id="goCart" type="button" class="btn btn-outline-light position-relative d-flex justify-content-center align-items-center gap-2 ml-2">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-cart mt-2 mt-lg-0" viewBox="0 0 16 16">
                        <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <span class="d-none d-lg-block">Carrito</span>
                    <?php
                        // Comprobamos los registros dentro de la tabla cart.
                        if(isset($_SESSION['usuario'])){
                            $member = $_SESSION['usuario'];
                            $sqlCart = "SELECT c.*, m.username FROM cart c, member m WHERE c.memberID = m.memberID AND m.username = '" . $member . "'";
                            $resultCart = $mysqli->query($sqlCart);
                            $num_rows_cart = $resultCart->num_rows;
                        } else {
                            $num_rows_cart = 0;
                        }
                    ?>

                    <!-- Mostramos el número de artículos en el carrito del usuario -->
                    <span id="cantidad-carrito" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= $num_rows_cart ?>
                        <span class="visually-hidden">Items en el carrito</span>
                    </span>

                </button>

                <!-- Script que redirige a la página checkout/cart.php al pulsar el botón del carrito -->
                <script>
                    const button = document.getElementById('goCart');
                        button.addEventListener('click', () => {
                        window.location.href = 'checkout/cart.php';
                    });
                </script>
                <!-- /. script -->

            </div> <!-- /.div-carrito -->

        </div> <!-- /.row -->

    </div> <!-- /.container -->

    <!-- Aquí empieza el contenedor del Menú de navegación -->
    <div class="container-fluid p-0 menuRow">

        <div class="container">

            <div class="row">

                <div class="col d-flex justify-content-start justify-content-lg-center align-items-center">

                    <nav class="navbar navbar-expand-lg text-white">
                        <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-flex gap-5" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="products.php?p=11">Promociones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.php?p=10">Juegos PC</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Juegos Xbox
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="products.php?p=6">Xbox Series X</a></li>
                                <li><a class="dropdown-item" href="products.php?p=7">Xbox One</a></li>
                                <li><a class="dropdown-item" href="products.php?p=8">Xbox 360</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Juegos PlayStation
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="products.php?p=1">PlayStation 1</a></li>
                                <li><a class="dropdown-item" href="products.php?p=2">PlayStation 2</a></li>
                                <li><a class="dropdown-item" href="products.php?p=3">PlayStation 3</a></li>
                                <li><a class="dropdown-item" href="products.php?p=4">PlayStation 4</a></li>
                                <li><a class="dropdown-item" href="products.php?p=5">PlayStation 5</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.php?p=9">Juegos Nintendo Switch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.php?p=12">Accesorios</a>
                            </li>
                            </ul>
                            <form id="buscador" action="javascript:void(0);" method="POST" class="d-flex d-lg-none" role="search">
                                <input class="form-control me-2" type="search" id="cajaBuscador" name="buscar" placeholder="Buscar" aria-label="Search" onkeypress="checkSubmit(event)">
                                <button class="btn btn-outline-dark" type="submit" onclick="submitForm()">Buscar</button>
                            </form>
                            <i id="lupa" class="fa-solid fa-magnifying-glass d-none d-lg-block" onclick="mostrarBuscador()"></i>
                        </div>
                        </div>
                    </nav>

                </div> <!-- /.col -->

            </div> <!-- /.row -->
            
        </div> <!-- /.container -->

    </div> <!-- /.container-fluid -->

</header> <!-- /.header -->