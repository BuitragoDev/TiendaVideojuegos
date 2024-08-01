<?php
/* ==================================================================================
================	URL 		    |		www.antoniobuitrago.es   ================
================	Author Name		|		Antonio Buitrago         ================
================================================================================== */

// Comprobación de que se está llegando procedente del formulario.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ¡Esta línea importa la clase 'Request.php' desde la ruta '../assets/lib/'! Es crucial para que el código funcione correctamente, ya que trae funcionalidades importantes al proyecto.
    require_once '../assets/lib/Request.php';

    // Conexión con la base de datos.
    include("../conn_db.php");

    // Estas líneas de código inicializan un objeto de la clase Request, luego obtienen la dirección IP del cliente y finalmente verifican si la dirección IP es válida. 
    $requestModel = new Request();
    $ip = $requestModel->getIpAddress();
    $isValidIpAddress = $requestModel->isValidIpAddress($ip);
    
    // Recogida de Valores del formulario.
    $usuario = $_POST['username'];
    $pass = $_POST['pass'];

    // Insertamos los valores en la base de datos.
    $sql = "SELECT * FROM member WHERE username = '" . $usuario . "' AND pass = '" . $pass . "'";
    $result = $mysqli->query($sql);
    $num_rows = $result->num_rows;
    
    // Recogemos el ID del usuario que se ha logeado.
    while ($fila = $result->fetch_object()) {

        $id = $fila->memberID;

    }

    // Verificamos si ha habido algún error.
    if ($result === false) {

        die("Error al realizar la consulta: " . $mysqli->error);  

    } else {

        if ($num_rows > 0) {
            // Guardamos los datos del inicio de sesión
            $fecha_actual = date("Y-m-d H:i:s"); 
            $geoLocationData = $requestModel->getLocation($ip);
            $country = $geoLocationData['country']; 
            $dispositivo = $_SERVER["HTTP_USER_AGENT"];

            $sqlSession = "INSERT INTO sessionInit(startingDate, ip, country, device, memberID) VALUES ('$fecha_actual','$ip','$country','$dispositivo',$id)";
            $resultSession = $mysqli->query($sqlSession);
            //-----------------------------------------/
            
            // Usuario autenticado, guardar información en sesión
            session_start();
            $_SESSION['usuario'] = $usuario;         
            header("Location: ../index.php");
            exit;

        } else {

            // Redirige a login.php con success=true
            header("Location: ../login.php?loginError=true");
            exit;

        }

    }

} else {

    // Acceso no permitido, redirige a index.php
    header("Location: ../index.php");
    exit;

}
?>