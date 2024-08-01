<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

// Comprobación de que se está llegando procedente del formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Conexión con la base de datos.
    include("../conn_db.php");

    // Recogida de Valores desde el formulario.
    $nombre = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Insertamos los valores en la base de datos.
    $sql = "INSERT INTO member (username, email, pass, userAvatar) VALUES ('".$nombre."', '".$email."', '".$pass."', 'assets/img/users/0.webp')";
    $result = $mysqli->query($sql);

    // Obtener el ID del registro recién insertado
    $ultimoID = mysqli_insert_id($mysqli);

    // Verificamos si ha habido algún error.
    if ($result === false) {

        die("Error al insertar los datos: " . $mysqli->error);

    } else {

        if ( isset( $_FILES ) && isset( $_FILES['avatar'] ) && !empty( $_FILES['avatar']['name'] && !empty($_FILES['avatar']['tmp_name']) ) ) {

            //Hemos recibido el fichero
            //Comprobamos que es un fichero subido por PHP, y no hay inyección por otros medios
            if ( ! is_uploaded_file( $_FILES['avatar']['tmp_name'] ) ) {

                echo "Error: El fichero encontrado no fue procesado por la subida correctamente";
                exit;

            } 
            // Recogida de datos de la imagen.
            $source = $_FILES['avatar']['tmp_name'];
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            $destination = '../assets/img/users/' . $ultimoID . '.' . $extension;
            $rutaCorta = 'assets/img/users/' . $ultimoID . '.' . $extension;
                 
            // Comprobamos si una imagen ya existe en el servidor con ese nombre.
            if ( is_file($destination) ) {
             echo "Error: Ya existe almacenado un fichero con ese nombre";
             @unlink(ini_get('upload_tmp_dir').$_FILES['avatar']['tmp_name']);
             exit;
            }
        
            // Comprobamos si el archivo se ha podido mover al servidor correctamente.
            if ( ! @move_uploaded_file($source, $destination ) ) {
                echo "Error: No se ha podido mover el fichero enviado a la carpeta de destino";
                @unlink(ini_get('upload_tmp_dir').$_FILES['avatar']['tmp_name']);
                exit;
            }

            /* echo "Fichero subido correctamente a: ".$destination; */

            // Actualizamos la ruta de la imagen.
            $sqlUpdate = "UPDATE member SET userAvatar = '". $rutaCorta . "' WHERE memberID = " . $ultimoID . "";
            $resultUpdate = $mysqli->query($sqlUpdate);  
            
            $mysqli->close();

        }

        // Redirige a login.php con success=true
        header("Location: ../index.php?success=true");
        exit;

    }

} else {

    // Acceso no permitido, redirige a index.php
    header("Location: ../index.php");
    exit;

}
?>