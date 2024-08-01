<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

// Comprobación de que se está llegando procedente del formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Conexión con la base de datos.
    include("../conn_db.php");

    // Recogida de Valores.
    $id = $_POST['idProducto'];
    $puntuacion = $_POST['votacion'];
    $titulo = $_POST['titulo'];
    $titulo_limpio = str_replace("'", "´", $titulo); // Sustituimos la comilla simple ' por ´.
    $mensaje = $_POST['mensaje'];
    $mensaje_limpio = str_replace("'", "´", $mensaje); // Sustituimos la comilla simple ' por ´.
    $member = $_GET['member'];
    $product = $_GET['product'];

    // Consulta para obtener el memberID del usuario.
    $sqlMember = "SELECT memberID FROM member WHERE username = '$member'";
    $resultMember = $mysqli->query($sqlMember);
    while ($fila = $resultMember->fetch_object()) {
        $idUser = $fila->memberID;
    }
    
    // Insertamos el la valoración en la tabla rating de la base de datos.
    $sql = "INSERT INTO rating (memberID, productID, value) VALUES ($idUser, $product, $puntuacion)";
    $result = $mysqli->query($sql);

    // Insertamos el mensaje en la tabla comment de la base de datos.
    $sql2 = "INSERT INTO comment (memberID, productID, messageTitle, message) VALUES ($idUser, $product, '$titulo_limpio','$mensaje_limpio')";
    $result2 = $mysqli->query($sql2);

    // Comprobación de que las 2 insercciones se han ejecutado correctamente o mostramos un mensaje de error.
    if ($result === false || $result2 === false) {

        die("Error al insertar los datos: " . $mysqli->error);

    } else {

        // Cerrar la conexión a la base de datos
        $mysqli->close();
        
        header("Location: ../articulo.php?id=$id#resenas");
        exit;
    }

}
?>