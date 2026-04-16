<?php

// Inicia la sesión para poder guardar datos del usuario (login)
session_start();

// Incluye el archivo donde están las funciones de validación
include("validaciones.php");

// Arreglo donde se guardarán los errores encontrados
$errores = [];

// Verifica si el formulario fue enviado mediante método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtiene los datos del formulario, si no existen asigna vacío
    $usuario = $_POST["usuario"] ?? "";
    $password = $_POST["password"] ?? "";

    // ===== VALIDACIONES =====

    // Valida que el campo usuario no esté vacío usando función personalizada
    if(validarVacio($usuario)){
        $errores[] = "El usuario es obligatorio";
    }

    // Valida que el campo contraseña no esté vacío
    if(validarVacio($password)){
        $errores[] = "La contraseña es obligatoria";
    }

    // ===== LÓGICA DE NEGOCIO =====
    // Solo se ejecuta si no hay errores
    if(count($errores) === 0){

        // Nombre del archivo donde se guardan los usuarios
        $archivo = "users.json";

        // Verifica si el archivo existe
        if(file_exists($archivo)){

            // Lee el contenido del archivo JSON
            $usuarios = json_decode(file_get_contents($archivo), true);

            // Variable para saber si el usuario fue encontrado
            $encontrado = false;

            // Recorre todos los usuarios registrados
            foreach($usuarios as $u){

                // Verifica si el usuario coincide y la contraseña es correcta
                if($u["usuario"] === $usuario && password_verify($password, $u["password"])){

                    // Guarda el usuario en sesión (login exitoso)
                    $_SESSION["usuario"] = $u["usuario"];

                    // Redirige al inicio
                    header("Location: index.php");
                    exit();
                }
            }

            // Si no se encontró coincidencia, se agrega error
            if(!$encontrado){
                $errores[] = "Usuario o contraseña incorrectos";
            }

        } else {
            // Error si no hay usuarios registrados
            $errores[] = "No hay usuarios registrados";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="css/register.css">

</head>
<body class="auth-page">

<header class="header">
<a href="index.php">
<button class="boton-regresar">&larr;</button>
</a>
</header>

<div class="card-login">

<h1>INICIO DE SESIÓN</h1>

<?php if(count($errores) > 0): ?>
    <div class="mensaje error">
        <?php foreach($errores as $e){ echo $e . "<br>"; } ?>
    </div>
<?php endif; ?>

<form method="post">

<label>Usuario</label>
<input type="text" name="usuario">

<label>Contraseña</label>
<input type="password" name="password">

<button type="submit">Iniciar sesión</button>

</form>

</div>

</body>
</html>

<!--VERSIÓN 3.9 DEL CÓDIGO-->