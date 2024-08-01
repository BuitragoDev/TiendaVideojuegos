<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

    // Conexión con la base de datos.
    include("../conn_db.php");

    // Recogemos la variable del id de usuario por la URL.
    $usuario = $_GET['user'];

    // Consulta de los artículos del carrito para el usuario.
    $sql = "SELECT p.*, c.*, m.memberID, m.username FROM product p, cart c, member m WHERE c.memberID = m.memberID AND p.productID = c.productID AND m.username = '" . $usuario . "'";
    $resultado = $mysqli->query($sql);

    // Comprobamos el último ID de pedido de la tabla orders.
    $sqlID = "SELECT orderID FROM orders ORDER BY orderID DESC LIMIT 1";
    $resultadoID = $mysqli->query($sqlID);

    if ($resultadoID->num_rows == 0) {
        $ultimoID = 0;
    } else {
        $ultimoID = $resultadoID->fetch_assoc()['orderID'];
    }

    // Guardamos los datos que queremos insertar en la tabla orders.
    while ($fila = $resultado->fetch_object()) { 
        $memberID = $fila->memberID;
        $productID = $fila->productID;
        $cantidad = $fila->quantity;
        $precio = number_format($fila->price, 2);
        
        // Insertamos el producto en la tabla orders.
        $sqlOrders = "INSERT INTO orders (orderID, memberID, productID, quantity, orderPrice) VALUES ($ultimoID + 1, $memberID, $productID, $cantidad, $precio)";
        $resultadoOrders = $mysqli->query($sqlOrders);
    } 

    // Y eliminamos los elementos del carrito del usuario.
    $sqlLimpiarCarrito = "DELETE FROM cart WHERE memberID = $memberID";
    $resultadoLimpiarCarrito = $mysqli->query($sqlLimpiarCarrito);

    // Y eliminamos las variables de sesión de la dirección.
    unset($_SESSION['direccion']);
    unset($_SESSION['ciudad']);
    unset($_SESSION['pais']);
    unset($_SESSION['zip']);

    // Por último redirigimos a la página de pedidos.
    header("Location: ../orderProfile.php?id=$memberID");
    exit;
?>