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
    <link rel="stylesheet" href="css/comparador.css?v=4">
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
            <h1>Compara hardware y ahora tambien administra tu catalogo.</h1>
            <p class="intro-text">
                Los componentes se cargan desde un archivo JSON. Tambien puedes agregar nuevos
                modelos desde aqui y se guardaran para futuras sesiones.
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
                    <strong>JSON</strong>
                    <span>Catalogo persistente</span>
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
                    <button id="btnCPU" type="button">CPU</button>
                    <button id="btnGPU" type="button">GPU</button>
                    <button id="btnRAM" type="button">RAM</button>
                </div>
            </div>

            <div class="panel">
                <h2>Busqueda</h2>
                <input type="text" id="buscador" placeholder="Buscar componente...">
            </div>

            <div class="panel">
                <div class="panel-header">
                    <h2>Agregar componente</h2>
                    <button id="btnMostrarFormulario" type="button" class="btn-secundario">Nuevo</button>
                </div>

                <form id="formAgregar" class="form-agregar oculto">
                    <label for="categoriaNueva">Categoria</label>
                    <select id="categoriaNueva" name="categoria" required>
                        <option value="CPU">CPU</option>
                        <option value="GPU">GPU</option>
                        <option value="RAM">RAM</option>
                    </select>

                    <label for="nombreNuevo">Nombre</label>
                    <input type="text" id="nombreNuevo" name="nombre" placeholder="Ej. RTX 5070" required>

                    <label for="gamaNueva">Gama</label>
                    <input type="text" id="gamaNueva" name="gama" placeholder="Entrada, Media, Alta..." required>

                    <label for="specsNueva">Especificaciones</label>
                    <textarea id="specsNueva" name="specs" rows="3" placeholder="VRAM, nucleos, frecuencia..." required></textarea>

                    <label for="rendimientoNuevo">Rendimiento</label>
                    <input type="number" id="rendimientoNuevo" name="rendimiento" min="1" max="10" placeholder="1 a 10" required>

                    <button type="submit">Guardar componente</button>
                </form>

                <p id="mensajeFormulario" class="mensaje-formulario">Aqui podras crear nuevos componentes y guardarlos en el JSON.</p>
            </div>

            <div class="panel">
                <h2>Seleccion actual</h2>
                <div class="seleccion">
                    <div class="slot" id="slot1">Componente 1</div>
                    <div class="slot" id="slot2">Componente 2</div>
                </div>

                <button id="btnComparar" type="button" disabled>Comparar ahora</button>
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
                <p class="resultado-texto">Todavia no hay comparacion. Selecciona dos componentes para empezar.</p>
            </section>
        </section>
    </section>
</main>

<script src="script.js"></script>

</body>
</html>
