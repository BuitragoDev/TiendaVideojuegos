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
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $fechaLanzamiento = $_POST['fechaLanzamiento'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    $discount = $_POST['discount'];
    $plataforma = $_POST['plataforma'];
    
    // Insertamos los valores en la base de datos, en la tabla de productos.
    $sql = "INSERT INTO product (productName, productType, productDescription, releaseDate, category, stock, price, discount, imageSource, platformID) VALUES ('$nombre', '$tipo', '$descripcion', '$fechaLanzamiento', '$categoria', $stock, $precio, $discount, 'assets/img/products/0.jpg', '$plataforma')";
    $result = $mysqli->query($sql);

    // Obtener el ID del registro recién insertado.
    $ultimoID = mysqli_insert_id($mysqli);

    // Hacemos la comprobación de que la consulta se ha ejecutado correctamente o mostramos un mensaje de error.
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
            // Recogida de datos de la imagen.
            $source = $_FILES['portada']['tmp_name'];
            $extension = pathinfo($_FILES['portada']['name'], PATHINFO_EXTENSION);
            $destination = '../assets/img/products/' . $ultimoID . '.' . $extension;
            $rutaCorta = 'assets/img/products/' . $ultimoID . '.' . $extension;
                    
            // Comprobamos si una imagen ya existe en el servidor con ese nombre.
            if ( is_file($destination) ) {
             echo "Error: Ya existe almacenado un fichero con ese nombre";
             @unlink(ini_get('upload_tmp_dir').$_FILES['portada']['tmp_name']);
             exit;
            }
        
            // Comprobamos si el archivo se ha podido mover al servidor correctamente.
            if ( ! @move_uploaded_file($source, $destination ) ) {
                echo "Error: No se ha podido mover el fichero enviado a la carpeta de destino";
                @unlink(ini_get('upload_tmp_dir').$_FILES['portada']['tmp_name']);
                exit;
            }

            // Actualizamos la ruta de la imagen en la base de datos en el campo imageSource.
            $sql2 = "UPDATE product SET imageSource = '". $rutaCorta . "' WHERE productID = " . $ultimoID . "";
            $result2 = $mysqli->query($sql2);                 
        }

        // Redirige a login.php con success=true
        header("Location: ../admin-panel.php?success=true");
        exit;

    }

    // Cerrar la conexión a la base de datos
    $mysqli->close();

} else {
    // Acceso no permitido, redirige a index.php
    header("Location: ../index.php");
    exit;
}
?>