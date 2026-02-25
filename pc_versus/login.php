<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"] ?? "";
    $password = $_POST["password"] ?? "";

    header("Location: index.php?login=ok");
    exit();
}


?>
