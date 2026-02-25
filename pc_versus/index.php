<?php
$mensaje = "";

if(isset($_GET['login'])){
    $mensaje = "Inicio de sesión exitoso";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PC VERSUS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicio.css">
</head>

<body class="main">
<br>
    <a href="login.html" class="boton-inicio">INICIAR SESIÓN</a>
    <br>
<?php if($mensaje != ""): ?>
    <p style="color: lime; text-align:center;">
        <?php echo $mensaje; ?>
    </p>
<?php endif; ?>

    <div class="contenedor">
        <img src="img/versus.png" class="logo">
        <br><br>

        <a href="comparador.html"><button class="boton-iniciar">INICIAR</button></a>
    </div>
<br><br><br>
<br><br><br>
<br><br>
<br><br><br>
<br><br><br>
<br><br>
<br><br><br>
<br><br><br>
<br><br>

    <footer class="footer">

    <div class="footer">

        <div class="footer-name">
            <h3>PC VERSUS</h3>
            <p>Comparador de PC</p>
        </div>

        <div class="footer-links">
            <a href="#">Contacto</a>
        </div>

        <div class="footer-social">
            <a href="#">Instagram</a>
            <a href="#">GitHub</a>
        </div>
<br>
        © 2026 PC Versus - Todos los derechos reservados
    </div>

</footer>
</body>
</html>