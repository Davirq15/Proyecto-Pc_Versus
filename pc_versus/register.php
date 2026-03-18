<?php

// comprobar que viene del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    $archivo = "users.json";

    // leer archivo JSON
    if(file_exists($archivo)){
        $contenido = file_get_contents($archivo);
        $usuarios = json_decode($contenido, true);
    } else {
        $usuarios = [];
    }

    // encriptar contraseña
    $password = password_hash($password, PASSWORD_DEFAULT);

    // nuevo usuario
    $nuevoUsuario = [
        "usuario" => $usuario,
        "email" => $email,
        "password" => $password
    ];

    // agregar usuario
    $usuarios[] = $nuevoUsuario;

    // guardar en JSON
    file_put_contents($archivo, json_encode($usuarios, JSON_PRETTY_PRINT));

    // redirigir al login
    header("Location: login.html?register=ok");
    exit();
}

?>

<!--VERSIÓN 1.3 DEL CÓDIGO-->