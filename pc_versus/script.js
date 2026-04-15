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
    {nombre:"Ryzen 3 4100", rendimiento:5, gama:"Entrada", specs:"4 nucleos / 8 hilos / 3.8 - 4.0 GHz"},
    {nombre:"Ryzen 3 5300G", rendimiento:6, gama:"Entrada", specs:"4 nucleos / 8 hilos / 4.0 - 4.2 GHz"},
    {nombre:"Ryzen 5 4500", rendimiento:6, gama:"Entrada", specs:"6 nucleos / 12 hilos / 3.6 - 4.1 GHz"},
    {nombre:"Ryzen 5 5600", rendimiento:8, gama:"Media", specs:"6 nucleos / 12 hilos / 3.5 - 4.4 GHz"},
    {nombre:"Ryzen 5 5600X", rendimiento:8, gama:"Media", specs:"6 nucleos / 12 hilos / 3.7 - 4.6 GHz"},
    {nombre:"Ryzen 5 7600X", rendimiento:9, gama:"Media", specs:"6 nucleos / 12 hilos / 4.7 - 5.3 GHz"},
    {nombre:"Ryzen 7 5700X", rendimiento:9, gama:"Alta", specs:"8 nucleos / 16 hilos / 3.4 - 4.6 GHz"},
    {nombre:"Ryzen 7 5800X", rendimiento:9, gama:"Alta", specs:"8 nucleos / 16 hilos / 3.8 - 4.7 GHz"},
    {nombre:"Ryzen 7 7700X", rendimiento:10, gama:"Alta", specs:"8 nucleos / 16 hilos / 4.5 - 5.4 GHz"},
    {nombre:"Ryzen 9 5900X", rendimiento:10, gama:"Entusiasta", specs:"12 nucleos / 24 hilos / 3.7 - 4.8 GHz"},
    {nombre:"Ryzen 9 7950X", rendimiento:10, gama:"Entusiasta", specs:"16 nucleos / 32 hilos / 4.5 - 5.7 GHz"},
    {nombre:"Intel i3 12100F", rendimiento:6, gama:"Entrada", specs:"4 nucleos / 8 hilos / 3.3 - 4.3 GHz"},
    {nombre:"Intel i5 12400F", rendimiento:8, gama:"Media", specs:"6 nucleos / 12 hilos / 2.5 - 4.4 GHz"},
    {nombre:"Intel i5 12600K", rendimiento:9, gama:"Media", specs:"10 nucleos / 16 hilos / 3.7 - 4.9 GHz"},
    {nombre:"Intel i5 13400F", rendimiento:9, gama:"Media", specs:"10 nucleos / 16 hilos / 2.5 - 4.6 GHz"},
    {nombre:"Intel i7 12700K", rendimiento:10, gama:"Alta", specs:"12 nucleos / 20 hilos / 3.6 - 5.0 GHz"},
    {nombre:"Intel i7 13700K", rendimiento:10, gama:"Entusiasta", specs:"16 nucleos / 24 hilos / 3.4 - 5.4 GHz"},
    {nombre:"Intel i7 14700F", rendimiento:10, gama:"Alta", specs:"20 nucleos / 28 hilos / 2.2 - 5.3 GHz"},
    {nombre:"Intel i9 13900K", rendimiento:10, gama:"Entusiasta", specs:"24 nucleos / 32 hilos / 3.0 - 5.8 GHz"},
    {nombre:"Intel i9 14900K", rendimiento:10, gama:"Entusiasta", specs:"24 nucleos / 32 hilos / 3.2 - 6.0 GHz"}
],
GPU: [
    {nombre:"GTX 1660 Super", rendimiento:5, gama:"Entrada", specs:"6GB GDDR6 / 1785 MHz"},
    {nombre:"RTX 2060", rendimiento:6, gama:"Entrada", specs:"6GB GDDR6 / 1680 MHz"},
    {nombre:"RTX 3050", rendimiento:6, gama:"Entrada", specs:"8GB GDDR6 / 1777 MHz"},
    {nombre:"RTX 3060", rendimiento:7, gama:"Media", specs:"12GB GDDR6 / 1777 MHz"},
    {nombre:"RTX 4060", rendimiento:8, gama:"Media", specs:"8GB GDDR6 / 2310 MHz"},
    {nombre:"RTX 4060 Ti", rendimiento:8, gama:"Media", specs:"8GB GDDR6 / 2310 MHz"},
    {nombre:"RTX 4070", rendimiento:9, gama:"Alta", specs:"12GB GDDR6X / 2310 MHz"},
    {nombre:"RTX 3070 Ti", rendimiento:9, gama:"Alta", specs:"8GB GDDR6X / 2580 MHz"},
    {nombre:"RTX 4070 Super", rendimiento:9, gama:"Alta", specs:"12GB GDDR6X / 2520 MHz"},
    {nombre:"RTX 4080", rendimiento:10, gama:"Entusiasta", specs:"16GB GDDR6X / 2505 MHz"},
    {nombre:"RTX 4090", rendimiento:10, gama:"Entusiasta", specs:"24GB GDDR6X / 2520 MHz"},
    {nombre:"RX 6600", rendimiento:7, gama:"Media", specs:"8GB GDDR6 / 2044 MHz"},
    {nombre:"RX 6700 XT", rendimiento:8, gama:"Media", specs:"12GB GDDR6 / 2581 MHz"},
    {nombre:"RX 7600 XT", rendimiento:8, gama:"Media", specs:"8GB GDDR6 / 2525 MHz"},
    {nombre:"RX 6800 XT", rendimiento:9, gama:"Alta", specs:"16GB GDDR6 / 2250 MHz"},
    {nombre:"RX 7900 GT", rendimiento:9, gama:"Alta", specs:"20GB GDDR6 / 2100 MHz"},
    {nombre:"RX 7900 XT", rendimiento:10, gama:"Entusiasta", specs:"20GB GDDR6 / 2350 MHz"},
    {nombre:"RX 7900 XTX", rendimiento:10, gama:"Entusiasta", specs:"24GB GDDR6 / 2500 MHz"}
],
RAM: [
    {nombre:"8GB 2666MHz", rendimiento:5, gama:"Entrada", specs:"Single channel / CL19"},
    {nombre:"8GB 3200MHz", rendimiento:6, gama:"Entrada", specs:"Single channel / CL16"},
    {nombre:"16GB 3200MHz", rendimiento:8, gama:"Media", specs:"Dual channel / CL16"},
    {nombre:"16GB 3600MHz", rendimiento:9, gama:"Media", specs:"Dual channel / CL18"},
    {nombre:"16GB DDR5 5200MHz", rendimiento:9, gama:"Alta", specs:"Dual channel / CL40"},
    {nombre:"16GB DDR5 6000MHz", rendimiento:10, gama:"Alta", specs:"Dual channel / CL32"},
    {nombre:"32GB 3200MHz", rendimiento:9, gama:"Alta", specs:"Dual channel / CL16"},
    {nombre:"32GB 3600MHz", rendimiento:10, gama:"Alta", specs:"Dual channel / CL18"},
    {nombre:"32GB DDR5 5600MHz", rendimiento:10, gama:"Entusiasta", specs:"Dual channel / CL38"},
    {nombre:"64GB 3200MHz", rendimiento:10, gama:"Entusiasta", specs:"Dual channel / CL16"},
    {nombre:"64GB DDR5 6000MHz", rendimiento:10, gama:"Entusiasta", specs:"Dual channel / CL36"},
    {nombre:"64GB DDR5 6400MHz", rendimiento:10, gama:"Entusiasta", specs:"Dual channel / CL32"},
    {nombre:"128GB DDR4 3200MHz", rendimiento:10, gama:"Entusiasta", specs:"Quad channel / CL16"}
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

    const c1Class = c1.rendimiento === c2.rendimiento ? "tie" : (c1.rendimiento > c2.rendimiento ? "winner" : "loser");
    const c2Class = c1.rendimiento === c2.rendimiento ? "tie" : (c2.rendimiento > c1.rendimiento ? "winner" : "loser");

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

    const c1Progress = c1.rendimiento * 10;
    const c2Progress = c2.rendimiento * 10;

    resultado.innerHTML = `
        <div class="resultado-header">
            <div class="resultado-title">
                <h2>${ganador}</h2>
                <span class="resultado-badge">${categoriaActual}</span>
            </div>
            <p class="resultado-texto">${mensaje}</p>
        </div>
        <div class="resultado-grid">
            <article class="resultado-card ${c1Class}">
                <div class="card-hero">
                    <span>Componente 1</span>
                    <strong>${c1.nombre}</strong>
                </div>
                <p>${c1.specs}</p>
                <div class="stat-line">
                    <span>Rendimiento</span>
                    <strong>${c1.rendimiento}/10</strong>
                </div>
                <div class="stat-bar"><span style="width:${c1Progress}%"></span></div>
                <div class="stat-meta">
                    <span class="badge">${c1.gama}</span>
                    <span>${c1Progress}% potencial</span>
                </div>
            </article>
            <article class="resultado-card ${c2Class}">
                <div class="card-hero">
                    <span>Componente 2</span>
                    <strong>${c2.nombre}</strong>
                </div>
                <p>${c2.specs}</p>
                <div class="stat-line">
                    <span>Rendimiento</span>
                    <strong>${c2.rendimiento}/10</strong>
                </div>
                <div class="stat-bar"><span style="width:${c2Progress}%"></span></div>
                <div class="stat-meta">
                    <span class="badge">${c2.gama}</span>
                    <span>${c2Progress}% potencial</span>
                </div>
            </article>
        </div>
    `;
}

cambiarCategoria("CPU");
