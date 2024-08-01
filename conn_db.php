<?php

    // Define las variables de conexión
    $host = "PMYSQL107.dns-servicio.com:3306";
    $username = "proyecto2";
    $password = "talquistina1981";
    $database = "10231514_tiendaOnline";

    // Crea un objeto MySQLi
    $mysqli = new mysqli($host, $username, $password, $database);
    $mysqli->set_charset("utf8");

    // Verifica la conexión
    /* if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    } */

?>