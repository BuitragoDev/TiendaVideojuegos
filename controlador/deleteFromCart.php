<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

// Comprobación de que se está mandando la ID del producto que se desea eliminar por el método GET.
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Inicia una sesión de PHP o reanuda la sesión actual si existe una.
    session_start();

    // Conexión con la base de datos.
    include("../conn_db.php");

    // Recogida de Valores.
    $id = $_GET['id'];
    $member = $_GET['member'];

    // Comprobamos el ID del usuario.
    $sqlMiembro = "SELECT c.*, m.username FROM cart c, member m WHERE c.memberID = m.memberID AND m.username = '" . $member . "'";
    $miembro = $mysqli->query($sqlMiembro);
    $fila = $miembro->fetch_assoc();
    $memberID = $fila['memberID'];

    // Insertamos los valores en la base de datos.
    $sql = "DELETE FROM cart WHERE productID = $id AND memberID = $memberID";
    $result = $mysqli->query($sql);

    // Hacemos la comprobación de que el borrado se ha ejecutado correctamente o mostramos un mensaje de error.
    if ($result === false) {

        die("Error al insertar los datos: " . $mysqli->error);

    } else {

        header("Location: ../checkout/cart.php");
        exit;

    }

} else {

    header("Location: ../index.php");
    exit;

}
?>