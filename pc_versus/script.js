const lista = document.getElementById("lista");
const slot1 = document.getElementById("slot1");
const slot2 = document.getElementById("slot2");
const btnComparar = document.getElementById("btnComparar");
const btnLimpiar = document.getElementById("btnLimpiar");
const resultado = document.getElementById("resultado");
const buscador = document.getElementById("buscador");
const botonesCategoria = document.querySelectorAll(".categorias button");
const tituloLista = document.getElementById("tituloLista");
const listaInfo = document.getElementById("listaInfo");
const statTotal = document.getElementById("statTotal");

let seleccionados = [];
let categoriaActual = "CPU";

const datos = {
CPU: [
    {nombre:"Ryzen 3 4100", rendimiento:5, gama:"Entrada", specs:"4 nucleos / 8 hilos"},
    {nombre:"Ryzen 5 4500", rendimiento:6, gama:"Entrada", specs:"6 nucleos / 12 hilos"},
    {nombre:"Ryzen 5 5600X", rendimiento:8, gama:"Media", specs:"6 nucleos / 12 hilos"},
    {nombre:"Ryzen 7 5700X", rendimiento:9, gama:"Alta", specs:"8 nucleos / 16 hilos"},
    {nombre:"Ryzen 7 5800X", rendimiento:9, gama:"Alta", specs:"8 nucleos / 16 hilos"},
    {nombre:"Ryzen 9 5900X", rendimiento:10, gama:"Entusiasta", specs:"12 nucleos / 24 hilos"},
    {nombre:"Intel i3 12100F", rendimiento:6, gama:"Entrada", specs:"4 nucleos / 8 hilos"},
    {nombre:"Intel i5 12400F", rendimiento:8, gama:"Media", specs:"6 nucleos / 12 hilos"},
    {nombre:"Intel i5 13400F", rendimiento:9, gama:"Media", specs:"10 nucleos / 16 hilos"},
    {nombre:"Intel i7 12700K", rendimiento:10, gama:"Alta", specs:"12 nucleos / 20 hilos"},
    {nombre:"Intel i7 13700K", rendimiento:10, gama:"Entusiasta", specs:"16 nucleos / 24 hilos"},
    {nombre:"Intel i9 13900K", rendimiento:10, gama:"Entusiasta", specs:"24 nucleos / 32 hilos"}
],
GPU: [
    {nombre:"GTX 1660 Super", rendimiento:5, gama:"Entrada", specs:"6GB GDDR6"},
    {nombre:"RTX 2060", rendimiento:6, gama:"Entrada", specs:"6GB GDDR6"},
    {nombre:"RTX 3060", rendimiento:7, gama:"Media", specs:"12GB GDDR6"},
    {nombre:"RTX 4060", rendimiento:8, gama:"Media", specs:"8GB GDDR6"},
    {nombre:"RTX 4060 Ti", rendimiento:8, gama:"Media", specs:"8GB GDDR6"},
    {nombre:"RTX 4070", rendimiento:9, gama:"Alta", specs:"12GB GDDR6X"},
    {nombre:"RTX 4070 Super", rendimiento:9, gama:"Alta", specs:"12GB GDDR6X"},
    {nombre:"RTX 4080", rendimiento:10, gama:"Entusiasta", specs:"16GB GDDR6X"},
    {nombre:"RX 6600", rendimiento:7, gama:"Media", specs:"8GB GDDR6"},
    {nombre:"RX 6700 XT", rendimiento:8, gama:"Media", specs:"12GB GDDR6"},
    {nombre:"RX 6800 XT", rendimiento:9, gama:"Alta", specs:"16GB GDDR6"},
    {nombre:"RX 7900 XT", rendimiento:10, gama:"Entusiasta", specs:"20GB GDDR6"}
],
RAM: [
    {nombre:"8GB 2666MHz", rendimiento:5, gama:"Entrada", specs:"Single channel"},
    {nombre:"8GB 3200MHz", rendimiento:6, gama:"Entrada", specs:"Single channel"},
    {nombre:"16GB 3200MHz", rendimiento:8, gama:"Media", specs:"Dual channel"},
    {nombre:"16GB 3600MHz", rendimiento:9, gama:"Media", specs:"Dual channel"},
    {nombre:"16GB DDR5 5200MHz", rendimiento:9, gama:"Alta", specs:"Dual channel"},
    {nombre:"32GB 3200MHz", rendimiento:9, gama:"Alta", specs:"Dual channel"},
    {nombre:"32GB 3600MHz", rendimiento:10, gama:"Alta", specs:"Dual channel"},
    {nombre:"32GB DDR5 5600MHz", rendimiento:10, gama:"Entusiasta", specs:"Dual channel"},
    {nombre:"64GB 3200MHz", rendimiento:10, gama:"Entusiasta", specs:"Dual channel"},
    {nombre:"64GB DDR5 6000MHz", rendimiento:10, gama:"Entusiasta", specs:"Dual channel"}
]
};

document.getElementById("btnCPU").onclick = () => cambiarCategoria("CPU");
document.getElementById("btnGPU").onclick = () => cambiarCategoria("GPU");
document.getElementById("btnRAM").onclick = () => cambiarCategoria("RAM");

buscador.addEventListener("input", () => renderLista());
btnComparar.addEventListener("click", comparar);
btnLimpiar.addEventListener("click", limpiarSeleccion);

function cambiarCategoria(tipo){
    categoriaActual = tipo;
    buscador.value = "";
    limpiarSeleccion(false);
    renderLista();
}

function limpiarSeleccion(resetResultado = true){
    seleccionados = [];
    slot1.textContent = "Componente 1";
    slot2.textContent = "Componente 2";
    btnComparar.disabled = true;

    document.querySelectorAll(".card").forEach(card => {
        card.classList.remove("selected");
    });

    if(resetResultado){
        resultado.innerHTML = `
            <h2>Resultado del duelo</h2>
            <p class="resultado-texto">Todavia no hay comparacion. Selecciona dos componentes para empezar.</p>
        `;
    }
}

function renderLista(){
    const filtro = buscador.value.trim().toLowerCase();
    const componentes = datos[categoriaActual].filter(comp =>
        comp.nombre.toLowerCase().includes(filtro)
    );

    botonesCategoria.forEach(boton => {
        boton.classList.toggle("active", boton.id === `btn${categoriaActual}`);
    });

    tituloLista.textContent = `${categoriaActual} disponibles`;
    listaInfo.textContent = `${componentes.length} componente(s) encontrados en ${categoriaActual}.`;
    statTotal.textContent = datos[categoriaActual].length;

    lista.innerHTML = "";

    if(componentes.length === 0){
        lista.innerHTML = `
            <div class="empty-state">
                <h3>Sin resultados</h3>
                <p>No encontramos componentes con ese nombre. Prueba otra busqueda.</p>
            </div>
        `;
        return;
    }

    componentes.forEach(comp => {
        const yaSeleccionado = seleccionados.some(item => item.nombre === comp.nombre);

        const card = document.createElement("div");
        card.className = `card${yaSeleccionado ? " selected" : ""}`;
        card.innerHTML = `
            <div class="card-top">
                <h3>${comp.nombre}</h3>
                <span class="badge">${comp.gama}</span>
            </div>
            <p class="specs">${comp.specs}</p>
            <div class="card-bottom">
                <span>Rendimiento</span>
                <strong>${comp.rendimiento}/10</strong>
            </div>
        `;

        card.onclick = () => seleccionar(comp, card);
        lista.appendChild(card);
    });
}

function seleccionar(comp, card){
    if(seleccionados.some(item => item.nombre === comp.nombre)) return;
    if(seleccionados.length >= 2) return;

    seleccionados.push(comp);
    card.classList.add("selected");

    if(seleccionados.length === 1){
        slot1.textContent = comp.nombre;
    }

    if(seleccionados.length === 2){
        slot2.textContent = comp.nombre;
        btnComparar.disabled = false;
    }
}

function comparar(){
    const c1 = seleccionados[0];
    const c2 = seleccionados[1];

    let ganador = "";
    let mensaje = "";
    let diferencia = Math.abs(c1.rendimiento - c2.rendimiento);

    if(c1.rendimiento > c2.rendimiento){
        ganador = c1.nombre;
        mensaje = `${c1.nombre} gana la comparacion de ${categoriaActual} por ${diferencia} punto(s).`;
    } else if(c2.rendimiento > c1.rendimiento){
        ganador = c2.nombre;
        mensaje = `${c2.nombre} gana la comparacion de ${categoriaActual} por ${diferencia} punto(s).`;
    } else {
        ganador = "Empate tecnico";
        mensaje = `Ambos componentes ofrecen el mismo rendimiento en ${categoriaActual}.`;
    }

    resultado.innerHTML = `
        <h2>${ganador}</h2>
        <div class="resultado-grid">
            <article>
                <span>Componente 1</span>
                <strong>${c1.nombre}</strong>
                <p>${c1.specs}</p>
                <b>${c1.rendimiento}/10</b>
            </article>
            <article>
                <span>Componente 2</span>
                <strong>${c2.nombre}</strong>
                <p>${c2.specs}</p>
                <b>${c2.rendimiento}/10</b>
            </article>
        </div>
        <p class="resultado-texto">${mensaje}</p>
    `;
}

cambiarCategoria("CPU");
