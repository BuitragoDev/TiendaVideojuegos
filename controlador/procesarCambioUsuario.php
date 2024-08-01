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
    $id = $_POST['id'];
    $nombre = $_POST['nombreUsuario'];

    // Actualizamos el cambio de nombre usuario en la base de datos.
    $sql = "UPDATE member SET username = '".$nombre."' WHERE memberID = ".$id."";
    $result = $mysqli->query($sql);

    // Verificamos si ha habido algún error.
    if ($result === false) {

        die("Error al realizar la consulta: " . $mysqli->error);   

    } else {  

        // Inicia una sesión de PHP o reanuda la sesión actual si existe una, y le damos el valor a la variable de sesión "usuario" del nuevo nombre.
        session_start();
        $_SESSION['usuario'] = $nombre;  

        header("Location: ../infoProfile.php?cambio-user=true&id=$id");
        exit;

    }
    
} else {

    // Acceso no permitido, redirige a index.php
    header("Location: ../index.php");
    exit;

}
?>