<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

// Comprobación de que se está llegando procedente del formulario.
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Inicia una sesión de PHP o reanuda la sesión actual si existe una.
    session_start();
    // Conexión con la base de datos.
    include("../conn_db.php");

    // Comprobación de que hay un usuario logeado con una sesión iniciada o redirigimos a la página de logeo.
    if(isset($_SESSION['usuario'])){

        // Recogida de Valores.
        $id = $_GET['id'];
        $member = $_SESSION['usuario'];

        // Comprobamos el ID del usuario.
        $sqlMiembro = "SELECT memberID, username FROM member WHERE username = '" . $member . "'";
        $miembro = $mysqli->query($sqlMiembro);
        $num_rows = $miembro->num_rows;

        $fila = $miembro->fetch_assoc();
        $memberID = $fila['memberID'];

        // Insertamos los valores en la base de datos, en la tabla del carrito.
        $sql = "INSERT INTO cart (memberID, productID, quantity) VALUES ($memberID, $id, 1)";
        $result = $mysqli->query($sql);

        // Comprobación de que la inserción se ha ejecutado correctamente o mostramos un mensaje de error.
        if ($result === false) {

            die("Error al insertar los datos: " . $mysqli->error);

        } else {
            
            if(isset($_GET['anadir'])) {
                
                $anadir = $_GET['anadir'];
                header("Location: ../articulo.php?id=" . $anadir);
                exit;

            } else {

                header("Location: ../checkout/cart.php");
                exit;

            }
        }

    } else {

        header("Location: ../login.php?needLogin=true");
        exit;

    }

    // Cerrar la conexión a la base de datos
    $mysqli->close();

} else {

    header("Location: ../index.php");
    exit;
    
}
?>