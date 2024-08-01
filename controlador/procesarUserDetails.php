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
    $id = $_GET['id'];
    $set = "";
    if(!empty($_POST['nombre'])) { $set .= ' name = "' . $_POST['nombre'] . '",'; }
    if(!empty($_POST['apellidos'])) { $set .= ' surname = "' . $_POST['apellidos'] . '",'; }
    if(!empty($_POST['correo'])) { $set .= ' email = "' . $_POST['correo'] . '",'; }
    if(!empty($_POST['nacimiento'])) { $set .= ' birthDate = "' . $_POST['nacimiento'] . '",'; }
    if(!empty($_POST['direccion'])) { $set .= ' address = "' . $_POST['direccion'] . '",'; }
    if(!empty($_POST['ciudad'])) { $set .= ' city = "' . $_POST['ciudad'] . '",'; }
    if(!empty($_POST['pais'])) { $set .= ' country = "' . $_POST['pais'] . '",'; }
    if(!empty($_POST['zip'])) { $set .= ' zip = "' . $_POST['zip'] . '",'; }
    $set = rtrim($set, ","); // eliminamos la última coma en caso de existir.

    // Actualizamos los valores en la base de datos.
    $sql = "UPDATE member SET ".$set." WHERE memberID = ".$id."";
    $result = $mysqli->query($sql);

    // Verificamos si ha habido algún error.
    if ($result === false) {

        die("Error al realizar la consulta: " . $mysqli->error); 

    } else {   

        header("Location: ../infoProfile.php?cambio-detalles=true&id=$id");
        exit;

    }

} else {

    // Acceso no permitido, redirige a index.php
    header("Location: ../index.php");
    exit;

}
?>