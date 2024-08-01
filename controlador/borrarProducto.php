<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

    // Conexión con la base de datos.
    include("../conn_db.php");

    // Recogida de datos por el método GET.
    $idRegistro = $_GET['id'];

    // Borrado de la imagen de perfil
    $directorio = dirname(__DIR__) . 'assets/img/products/';

    // Escanea el directorio en busca de archivos
    $archivos = scandir($directorio);
    $archivosEliminados = 0;

    // Recorre cada archivo en el directorio
    foreach ($archivos as $archivo) {

        // Verifica si el archivo comienza con el número 3 y es una imagen
        if (strpos($archivo, $idRegistro) === 0 && in_array(pathinfo($archivo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {

            // Elimina la imagen del servidor.
            $rutaArchivo = $directorio . $archivo;
            if (is_file($rutaArchivo)) {
                unlink($rutaArchivo);
                $archivosEliminados++;
            }

        }

    }

    // Si se ha eliminado una imagen de un producto, borramos su registro en la base de datos.
    if($archivosEliminados != 0) {

        // Construir la consulta SQL
        $sql = "DELETE FROM product WHERE productID = $idRegistro";

        // Ejecutar la consulta SQL
        $resultado = $mysqli->query($sql);
        
        // Cerrar la conexión a la base de datos
        $mysqli->close();

        // Redireccionamos a la página register.php
        header('Location: ../admin-panel.php?id=3&borrado=true');
        
    }  
?>

