<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include("conn_db.php");

    // Recogida de Valores.
    $puntuacion = $_POST['votacion'];
    

    echo $puntuacion;
}