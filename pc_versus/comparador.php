<?php
// Inicia la sesión para poder verificar si el usuario está logueado
session_start();

// Verifica si NO hay un usuario en sesión
if(!isset($_SESSION["usuario"])){

    // Si no hay sesión, redirige al login
    header("Location: login.php");
    exit(); // Detiene la ejecución del código
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <!-- Hace que la página sea responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título de la página -->
    <title>Comparador | PC VERSUS</title>

    <!-- Enlace al archivo CSS del comparador -->
    <link rel="stylesheet" href="css/comparador.css?v=3">
</head>
<body>

<!-- ===== HEADER ===== -->
<header class="header">

    <!-- Botón para regresar al inicio -->
    <a class="boton-regresar" href="index.php">&larr; Inicio</a>

    <!-- Nombre del sistema -->
    <div class="header-badge">PC VERSUS</div>

</header>

<!-- ===== CONTENIDO PRINCIPAL ===== -->
<main class="page-wrap">

    <!-- ===== SECCIÓN PRINCIPAL (INTRO) ===== -->
    <section class="hero-panel">

        <div class="hero-copy">

            <!-- Texto introductorio -->
            <p class="kicker">Arena de comparacion</p>

            <!-- Título principal -->
            <h1>Compara hardware con una vista más pro y más completa.</h1>

            <!-- Descripción del funcionamiento -->
            <p class="intro-text">
                Elige una categoria, filtra por nombre, selecciona dos componentes y revisa
                el ganador con su nivel de rendimiento y diferencia de puntos.
            </p>

            <!-- Estadísticas visuales -->
            <div class="hero-stats">

                <article>
                    <!-- Total de componentes (se llena con JS) -->
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

        <!-- Logo del sistema -->
        <div class="hero-logo">
            <img src="css/img/versus.png" alt="PC Versus">
        </div>
    </section>

    <!-- ===== DASHBOARD ===== -->
    <section class="dashboard">

        <!-- ===== SIDEBAR ===== -->
        <aside class="sidebar">

            <!-- Panel de categorías -->
            <div class="panel">
                <h2>Categorias</h2>

                <!-- Botones para seleccionar tipo de componente -->
                <div class="categorias">
                    <br>
                    <button id="btnCPU" type="button">CPU</button>
                    <button id="btnGPU" type="button">GPU</button>
                    <button id="btnRAM" type="button">RAM</button>
                </div>
            </div>

            <!-- Panel de búsqueda -->
            <div class="panel">
                <h2>Busqueda</h2>
                <br>

                <!-- Input para filtrar componentes -->
                <input type="text" id="buscador" placeholder="Buscar componente...">
            </div>

            <!-- Panel de selección -->
            <div class="panel">
                <h2>Seleccion actual</h2>
                <br>

                <!-- Muestra los componentes seleccionados -->
                <div class="seleccion">
                    <div class="slot" id="slot1">Componente 1</div>
                    <div class="slot" id="slot2">Componente 2</div>
                </div>

                <!-- Botón para comparar (se activa con JS) -->
                <button id="btnComparar" type="button" disabled>Comparar ahora</button>
                <br>

                <!-- Botón para limpiar selección -->
                <button id="btnLimpiar" type="button" class="btn-secundario">Limpiar seleccion</button>
            </div>
        </aside>

        <!-- ===== PANEL PRINCIPAL ===== -->
        <section class="main-panel">

            <!-- Encabezado de lista -->
            <div class="lista-top">

                <div>
                    <p class="mini-label">Catalogo</p>
                    <h2 id="tituloLista">Componentes disponibles</h2>
                </div>

                <!-- Información dinámica -->
                <p class="lista-info" id="listaInfo">
                    Selecciona una categoria para comenzar.
                </p>

            </div>

            <!-- Contenedor donde JS inserta los componentes -->
            <div class="lista" id="lista"></div>

            <!-- Resultado de la comparación -->
            <section class="resultado" id="resultado">

                <h2>Resultado del duelo</h2>

                <!-- Texto inicial -->
                <p class="resultado-texto">
                    Todavia no hay comparacion. Selecciona dos componentes para empezar.
                </p>

            </section>
        </section>
    </section>
</main>

<!-- Archivo JavaScript que controla toda la lógica del comparador -->
<script src="script.js"></script>

</body>
</html>

<!--VERSIÓN 6.8 DEL CÓDIGO-->