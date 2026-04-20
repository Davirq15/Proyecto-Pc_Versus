<?php
// Inicia la sesión para poder acceder a los datos del usuario logueado
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PC VERSUS</title>

    <!-- Hace que la página sea responsive (se adapte a celular) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="css/index.css">
</head>

<!-- Clase principal para aplicar estilos generales -->
<body class="main">

<!-- ===== HEADER / BARRA SUPERIOR ===== -->
<header class="topbar">

    <!-- Nombre del sistema con enlace al inicio -->
    <a class="brand" href="index.php">PC VERSUS</a>

    <div class="topbar-actions">

        <!-- Si NO hay sesión iniciada -->
        <?php if(!isset($_SESSION["usuario"])): ?>

            <!-- Botón para registrarse -->
            <a class="btn-login secondary" href="register.php">Crear cuenta</a>

            <!-- Botón para iniciar sesión -->
            <a class="btn-login" href="login.php">Iniciar sesion</a>

        <?php else: ?>

            <!-- Si el usuario está logueado, muestra su nombre -->
            <span class="user-badge">
                Bienvenido, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>
            </span>

            <!-- Botón para cerrar sesión -->
            <a class="btn-login secondary" href="logout.php">Cerrar sesion</a>

        <?php endif; ?>

    </div>
</header>

<!-- ===== CONTENIDO PRINCIPAL ===== -->
<main class="hero-layout">

    <!-- Sección de texto principal -->
    <section class="hero-copy">

        <!-- Texto pequeño de introducción -->
        <p class="eyebrow">Comparador interactivo de hardware</p>

        <!-- Título principal -->
        <h1>Arma el versus definitivo entre tus componentes favoritos.</h1>

        <!-- Descripción del sistema -->
        <p class="hero-text">
            Compara CPU, GPU y RAM en una interfaz clara, rápida y con estilo gamer.
            Ideal para practicar, aprender hardware o decidir tu proxima compra.
        </p>

        <!-- Botones principales -->
        <div class="hero-actions">

            <!-- Botón para entrar al comparador -->
            <a class="boton-iniciar" href="comparador.php">Entrar al comparador</a>

            <!-- Si el usuario no está logueado, muestra sugerencia de registro -->
            <?php if(!isset($_SESSION["usuario"])): ?>
                <a class="text-link" href="register.php">Empieza creando tu perfil</a>
            <?php endif; ?>

        </div>

        <!-- Sección de estadísticas visuales -->
        <div class="stats-grid">

            <article class="stat-card">
                <strong>3</strong>
                <span>Categorias listas para comparar</span>
            </article>

            <article class="stat-card">
                <strong>UI</strong>
                <span>Diseño renovado y adaptable a celular</span>
            </article>

            <article class="stat-card">
                <strong>FAST</strong>
                <span>Selecciona dos piezas y ve el ganador al instante</span>
            </article>

        </div>
    </section>

    <!-- Sección visual (imagen/logo) -->
    <section class="hero-visual">

        <div class="visual-card">

            <!-- Efecto visual -->
            <div class="visual-glow"></div>

            <!-- Logo del sistema -->
            <img src="css/img/versus.png" class="logo" alt="Logo de PC Versus">

            <!-- Lista de características -->
            <div class="feature-list">

                <div>
                    <span class="feature-tag">CPU</span>
                    <p>Potencia de procesamiento</p>
                </div>

                <div>
                    <span class="feature-tag">GPU</span>
                    <p>Rendimiento grafico</p>
                </div>

                <div>
                    <span class="feature-tag">RAM</span>
                    <p>Velocidad y multitarea</p>
                </div>

            </div>
        </div>
    </section>
</main>

<!-- ===== SECCIÓN INFORMATIVA ===== -->
<section class="info-strip">

    <article>
        <h2>Visual claro</h2>
        <p>Todo esta acomodado para que el usuario entienda rapido que comparar y como avanzar.</p>
    </article>

    <article>
        <h2>Look gamer</h2>
        <p>Fondos, brillos y tipografias propias para que el proyecto se sienta mas pro.</p>
    </article>

    <article>
        <h2>Mejor experiencia</h2>
        <p>Botones consistentes, espaciado limpio y mejor lectura tanto en desktop como en movil.</p>
    </article>

</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">

    <!-- Nombre del sistema -->
    <div class="footer-name">
        <h3>PC VERSUS</h3>
        <p>Comparador de PC con estilo arcade-tech.</p>
    </div>

    <!-- Enlaces rápidos -->
    <div class="footer-links">
        <a href="comparador.php">Comparador</a>
        <a href="login.php">Acceder</a>
        <a href="register.php">Registro</a>
    </div>

    <!-- Derechos -->
    <p>&copy; 2026 PC Versus - Todos los derechos reservados</p>

</footer>

</body>
</html>

<!--VERSIÓN 7.2 DEL CÓDIGO-->