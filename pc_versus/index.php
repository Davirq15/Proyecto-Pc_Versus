<?php
session_start();

$mensaje = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>PC VERSUS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/index.css">
</head>

<body class="main">

<!-- BOTONES LOGIN / REGISTER -->

<?php if(!isset($_SESSION["usuario"])): ?>

<a href="register.html"><button class="btn-login">REGISTER</button></a>
<a href="login.html"><button class="btn-login">INICIAR SESIÓN</button></a>

<?php else: ?>

<p style="color:lime;text-align:center;">
Bienvenido, <?php echo $_SESSION["usuario"]; ?>
</p>
<br>
<!-- MENSAJE LOGIN -->

<a href="logout.php">
<button class="btn-login">CERRAR SESIÓN</button>
</a>

<?php endif; ?>

<!-- CONTENIDO PRINCIPAL -->

<div class="contenedor">

<img src="css/img/versus.png" class="logo">
<br>
<a href="comparador.php">
<button class="boton-iniciar">INICIAR</button>
</a>

</div>

<!-- FOOTER -->

<footer class="footer">

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

<p>© 2026 PC Versus - Todos los derechos reservados</p>

</footer>

</body>
</html>

<!--VERSIÓN 4.5 DEL CÓDIGO-->
