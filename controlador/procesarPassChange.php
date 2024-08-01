<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

// Comprobación de que se está llegando procedente del formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Conexión con la base de datos.
    include('../conn_db.php');

    // Recogida de Valores.
    $id = $_GET['id'];
    $oldPass = $_POST['previousPass'];
    $newPass = $_POST['newPass'];
    $repeatPass = $_POST['repeatNewPass'];

    // Insertamos los valores en la base de datos.
    $sql = "SELECT * FROM member WHERE pass = '" . $oldPass . "'";
    $result = $mysqli->query($sql);
    $num_rows = $result->num_rows;
    
    // Verificamos si ha habido algún error.
    if ($result === false) {

        die("Error al realizar la consulta: " . $mysqli->error);  

    } else {

        if ($num_rows > 0) { // Se han encontrado coincidencias.
            
            // En caso de coincidir las contraseñas del formulario realizamos el cambio de contraseña y redirigimos a la página infoProfile.php con la variable success = true,
            // en caso contrario redirigimos a la página changePassword con la variable success = false.
            if($newPass === $repeatPass){

                $sqlUpdate = "UPDATE member SET pass = '$newPass' WHERE memberID = $id";
                $resultUpdate = $mysqli->query($sqlUpdate);
                header("Location: ../infoProfile.php?success=true&id=$id");
                exit;

            } else {

                header("Location: ../changePassword.php?success=false&id=$id");
                exit;

            }
            
        } else {

            // Redirige a login.php con success=true
            header("Location: ../changePassword.php?success=false&id=$id");
            exit;

        }
    }

} else {

    // Acceso no permitido, redirige a index.php
    header("Location: ../index.php");
    exit;

}
?>