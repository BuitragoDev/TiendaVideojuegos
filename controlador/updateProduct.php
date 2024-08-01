<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

// Comprobación de que se está llegando procedente del formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Conexión con la base de datos.
    include("../conn_db.php");

    // Recogida del ID desde la URL.
    $idRegistro = $_GET['id'];

    // Recogida de Valores del formulario.
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $fechaLanzamiento = $_POST['fechaLanzamiento'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    $discount = $_POST['discount'];
    $plataforma = $_POST['plataforma'];
    

    // Insertamos los valores en la base de datos.
    $sql = "UPDATE product SET productName = '$nombre', productType = '$tipo', productDescription = '$descripcion', releaseDate = '$fechaLanzamiento',
            category = '$categoria', stock = $stock, price = $precio, discount = $discount, platformID = '$plataforma' WHERE productID = $idRegistro";
    $result = $mysqli->query($sql);

    // Hacemos la comprobación de que la consulta se ha ejecutado correctamente o mostramos un mensaje de error.
    if ($result === false) {

        die("Error al insertar los datos: " . $mysqli->error);

    } else {
        
        // Redirige a login.php con success=true
        header("Location: ../admin-panel.php?update=true");
        exit;

    }

} else {

    // Acceso no permitido, redirige a index.php
    header("Location: ../index.php");
    exit;

}
?>