<?php
// Iniciar la sesión
session_start();

// Cerrar la sesión
session_destroy();

// Redireccionar a index.php
header("Location: index.php");
exit;
?>