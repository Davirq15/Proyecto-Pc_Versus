<?php

// Inicia la sesión actual para poder manipularla
session_start();

// Destruye todos los datos de la sesión
// Esto cierra la sesión del usuario completamente
session_destroy();

// Redirige al usuario a la página principal (index)
header("Location: index.php");

// Finaliza la ejecución del script para evitar que se ejecute más código
exit();

?>