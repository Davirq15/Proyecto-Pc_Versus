<?php

// comprobar que viene del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"] ?? "";
    $password = $_POST["password"] ?? "";

    // (solo simulación, NO autenticación real)
    header("Location: index.php?login=ok");
    exit();
}

?>