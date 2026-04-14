<?php

// Incluye el archivo de funciones de validación
include("validaciones.php");

// Arreglo donde se almacenan los errores encontrados
$errores = [];

// Variable para guardar mensaje de éxito
$mensajeExito = "";

// Verifica si el formulario fue enviado por método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtiene los datos enviados desde el formulario
    // Si no existen, asigna una cadena vacía
    $usuario = $_POST["usuario"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    // ===== VALIDACIONES =====

    // Valida que el campo usuario no esté vacío
    if(validarVacio($usuario)){
        $errores[] = "El usuario es obligatorio";
    }

    // Valida que el correo tenga un formato correcto
    if(!validarEmail($email)){
        $errores[] = "El correo no es válido";
    }

    // Valida que la contraseña tenga al menos 8 caracteres
    if(!validarPassword($password)){
        $errores[] = "La contraseña debe tener mínimo 8 caracteres";
    }

    // ===== LECTURA DE DATOS =====

    // Nombre del archivo donde se almacenan los usuarios
    $archivo = "users.json";

    // Verifica si el archivo existe
    if(file_exists($archivo)){

        // Lee el contenido del archivo JSON y lo convierte en arreglo
        $usuarios = json_decode(file_get_contents($archivo), true);

    } else {
        // Si no existe, se crea un arreglo vacío
        $usuarios = [];
    }

    // ===== VALIDACIÓN DE USUARIO EXISTENTE =====

    // Recorre los usuarios registrados para verificar si el usuario ya existe
    foreach($usuarios as $u){
        if($u["usuario"] === $usuario){
            $errores[] = "El usuario ya existe";
        }
    }

    // ===== LÓGICA DE NEGOCIO =====

    // Solo se ejecuta si no hay errores
    if(count($errores) === 0){

        // Encripta la contraseña por seguridad
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Crea un nuevo usuario en formato arreglo
        $usuarios[] = [
            "usuario" => $usuario,
            "email" => $email,
            "password" => $password
        ];

        // Guarda los datos actualizados en el archivo JSON
        file_put_contents($archivo, json_encode($usuarios, JSON_PRETTY_PRINT));

        // Mensaje de éxito
        $mensajeExito = "Registro exitoso";
        
            // Redirige al inicio
            header("Location: index.php");
            exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="css/register.css">

<style>
.mensaje{
    margin-bottom: 15px;
    padding: 10px;
    border-radius: 5px;
    font-weight: bold;
}
.error{
    background: #ff4d4d20;
    border: 1px solid red;
    color: red;
}
.success{
    background: #4dff8820;
    border: 1px solid green;
    color: green;
}
</style>

</head>
<body>

<header class="header">
<a href="index.php">
<button class="boton-regresar">&larr;</button>
</a>
</header>

<div class="card-login">

<h1>REGISTRARSE</h1>

<?php if(count($errores) > 0): ?>
    <div class="mensaje error">
        <?php foreach($errores as $e) echo $e . "<br>"; ?>
    </div>
<?php endif; ?>

<?php if($mensajeExito): ?>
    <div class="mensaje success">
        <?php echo $mensajeExito; ?>
    </div>
<?php endif; ?>

<form method="post">

<label>Usuario</label>
<input type="text" name="usuario">

<label>Correo</label>
<input type="email" name="email">

<label>Contraseña</label>
<input type="password" name="password">

<button type="submit">Registrarse</button>

</form>

</div>

</body>
</html>

<!--VERSIÓN 3.6 DEL CÓDIGO-->