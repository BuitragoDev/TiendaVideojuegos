<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include("conn_db.php");

    // Recogida de Valores.
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $plataforma = $_POST['plataforma'];
    $fechaLanzamiento = $_POST['fechaLanzamiento'];

    // Insertamos los valores en la base de datos.
    $sql = "INSERT INTO juego (nombreJuego, descripcion, precio, fechaLanzamiento, rutaPortada, id_categoria, id_plataforma) VALUES ('$nombre', '$descripcion', $precio, '$fechaLanzamiento','assets/img/0.jpg', '$categoria', '$plataforma')";
    $result = $mysqli->query($sql);

    // Obtener el ID del registro recién insertado
    $ultimoID = mysqli_insert_id($mysqli);

    if ($result === false) {

        die("Error al insertar los datos: " . $mysqli->error);

    } else {
        
        if ( isset( $_FILES ) && isset( $_FILES['portada'] ) && !empty( $_FILES['portada']['name'] && !empty($_FILES['portada']['tmp_name']) ) ) {
            //Hemos recibido el fichero
            //Comprobamos que es un fichero subido por PHP, y no hay inyección por otros medios
            if ( ! is_uploaded_file( $_FILES['portada']['tmp_name'] ) ) {
                echo "Error: El fichero encontrado no fue procesado por la subida correctamente";
                exit;
            } 
            $source = $_FILES['portada']['tmp_name'];
            $extension = pathinfo($_FILES['portada']['name'], PATHINFO_EXTENSION);
            $destination = __DIR__ . '/assets/img/videogames/' . $ultimoID . '.' . $extension;
            $rutaCorta = '/assets/img/videogames/' . $ultimoID . '.' . $extension;
                    
            if ( is_file($destination) ) {
             echo "Error: Ya existe almacenado un fichero con ese nombre";
             @unlink(ini_get('upload_tmp_dir').$_FILES['portada']['tmp_name']);
             exit;
            }
        
            if ( ! @move_uploaded_file($source, $destination ) ) {
                echo "Error: No se ha podido mover el fichero enviado a la carpeta de destino";
                @unlink(ini_get('upload_tmp_dir').$_FILES['portada']['tmp_name']);
                exit;
            }
            // Añadimos la ruta de la imagen.
            $sql2 = "UPDATE juego SET rutaPortada = '". $rutaCorta . "' WHERE id_juego = " . $ultimoID . "";
            $result2 = $mysqli->query($sql2);                 
        }

        // Redirige a login.php con success=true
        header("Location: admin-panel.php?success=true");
        exit;

    }

} else {
    // Acceso no permitido, redirige a index.php
    header("Location: index.php");
    exit;
}

?>