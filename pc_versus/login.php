<?php

session_start(); // iniciar sesión

// comprobar que viene del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"] ?? "";
    $password = $_POST["password"] ?? "";

    $archivo = "users.json";

    if(file_exists($archivo)){

        $contenido = file_get_contents($archivo);
        $usuarios = json_decode($contenido, true);

        foreach($usuarios as $u){

            if($u["usuario"] === $usuario && password_verify($password, $u["password"])){

                // guardar usuario en sesión
                $_SESSION["usuario"] = $u["usuario"];

                header("Location: index.php?login=ok");
                exit();
            }

        }
    }

    // si no coincide ningún usuario
    header("Location: login.html?error=1");
    exit();
}

?>

<!--VERSIÓN 2.3 DEL CÓDIGO-->