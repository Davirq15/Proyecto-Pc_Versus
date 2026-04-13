<?php
session_start();

if(!isset($_SESSION["usuario"])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparador | PC VERSUS</title>
    <link rel="stylesheet" href="css/comparador.css?v=3">
</head>
<body>

<header class="header">
    <a class="boton-regresar" href="index.php">&larr; Inicio</a>
    <div class="header-badge">PC VERSUS</div>
</header>

<main class="page-wrap">
    <section class="hero-panel">
        <div class="hero-copy">
            <p class="kicker">Arena de comparacion</p>
            <h1>Compara hardware con una vista más pro y más completa.</h1>
            <p class="intro-text">
                Elige una categoria, filtra por nombre, selecciona dos componentes y revisa
                el ganador con su nivel de rendimiento y diferencia de puntos.
            </p>

            <div class="hero-stats">
                <article>
                    <strong id="statTotal">0</strong>
                    <span>Componentes</span>
                </article>
                <article>
                    <strong>3</strong>
                    <span>Categorias</span>
                </article>
                <article>
                    <strong>VS</strong>
                    <span>Comparacion inmediata</span>
                </article>
            </div>
        </div>

        <div class="hero-logo">
            <img src="css/img/versus.png" alt="PC Versus">
        </div>
    </section>

    <section class="dashboard">
        <aside class="sidebar">
            <div class="panel">
                <h2>Categorias</h2>
                <div class="categorias">
                    <br>
                    <button id="btnCPU" type="button">CPU</button>
                    <button id="btnGPU" type="button">GPU</button>
                    <button id="btnRAM" type="button">RAM</button>
                </div>
            </div>

            <div class="panel">
                <h2>Busqueda</h2>
                <br>
                <input type="text" id="buscador" placeholder="Buscar componente...">
            </div>

            <div class="panel">
                <h2>Seleccion actual</h2>
                <br>
                <div class="seleccion">
                    <div class="slot" id="slot1">Componente 1</div>
                    <div class="slot" id="slot2">Componente 2</div>
                </div>
                <button id="btnComparar" type="button" disabled>Comparar ahora</button>
                <br>
                <button id="btnLimpiar" type="button" class="btn-secundario">Limpiar seleccion</button>
            </div>
        </aside>

        <section class="main-panel">
            <div class="lista-top">
                <div>
                    <p class="mini-label">Catalogo</p>
                    <h2 id="tituloLista">Componentes disponibles</h2>
                </div>
                <p class="lista-info" id="listaInfo">Selecciona una categoria para comenzar.</p>
            </div>

            <div class="lista" id="lista"></div>

            <section class="resultado" id="resultado">
                <h2>Resultado del duelo</h2>
                <p class="resultado-texto">
                    Todavia no hay comparacion. Selecciona dos componentes para empezar.
                </p>
            </section>
        </section>
    </section>
</main>

<script src="script.js"></script>
</body>
</html>

<!--VERSIÓN 6.8 DEL CÓDIGO-->