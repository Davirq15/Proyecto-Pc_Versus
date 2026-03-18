<?php
session_start();

if(!isset($_SESSION["usuario"])){
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<title>PC VERSUS</title>
<link rel="stylesheet" href="css/comparador.css">
</head>

<body>

<header class="header">
<a href="index.php">
<button class="boton-regresar">&larr;</button>
</a>
</header>

<div class="container">

<div class="logo">
<img src="css/img/versus2.png" alt="PC Versus">
</div>

<div class="categorias">
<button id="btnCPU">CPU</button>
<button id="btnGPU">GPU</button>
<button id="btnRAM">RAM</button>
</div>

<div class="lista" id="lista"></div>

<div class="seleccion">
<div class="slot" id="slot1">Componente 1</div>
<div class="slot" id="slot2">Componente 2</div>
</div>

<button id="btnComparar" disabled>Comparar</button>

</div>

<script src="script.js"></script>

</body>
</html>

<!--VERSIÓN 4.5 DEL CÓDIGO-->