const lista = document.getElementById("lista");
const slot1 = document.getElementById("slot1");
const slot2 = document.getElementById("slot2");
const btnComparar = document.getElementById("btnComparar");

let seleccionados = [];

/* BASE DE DATOS */

const datos = {

CPU:[
{nombre:"Ryzen 5 5600X",rendimiento:8},
{nombre:"Ryzen 7 5800X",rendimiento:9},
{nombre:"i5 12400F",rendimiento:8},
{nombre:"i7 12700K",rendimiento:10},
{nombre:"Ryzen 9 5900X",rendimiento:10}
],

GPU:[
{nombre:"RTX 3060",rendimiento:7},
{nombre:"RTX 4060",rendimiento:8},
{nombre:"RTX 4070",rendimiento:9},
{nombre:"RX 6600",rendimiento:7},
{nombre:"RX 6700 XT",rendimiento:8}
],

RAM:[
{nombre:"8GB 2666MHz",rendimiento:5},
{nombre:"16GB 3200MHz",rendimiento:8},
{nombre:"16GB 3600MHz",rendimiento:9},
{nombre:"32GB 3200MHz",rendimiento:9},
{nombre:"32GB 3600MHz",rendimiento:10}
]

};

/* BOTONES */

document.getElementById("btnCPU").onclick=()=>mostrar("CPU");
document.getElementById("btnGPU").onclick=()=>mostrar("GPU");
document.getElementById("btnRAM").onclick=()=>mostrar("RAM");

/* MOSTRAR COMPONENTES */

function mostrar(tipo){

lista.innerHTML="";
seleccionados=[];
slot1.textContent="Componente 1";
slot2.textContent="Componente 2";
btnComparar.disabled=true;

datos[tipo].forEach(comp=>{

const card=document.createElement("div");
card.classList.add("card");

card.innerHTML=`
<h3>${comp.nombre}</h3>
<p>Rendimiento: ${comp.rendimiento}/10</p>
`;

card.onclick=()=>seleccionar(comp,card);

lista.appendChild(card);

});

}

/* SELECCIONAR */

function seleccionar(comp,card){

if(seleccionados.includes(comp)) return;
if(seleccionados.length>=2) return;

seleccionados.push(comp);

card.classList.add("selected");

if(seleccionados.length===1){
slot1.textContent=comp.nombre;
}

else if(seleccionados.length===2){
slot2.textContent=comp.nombre;
btnComparar.disabled=false;
}

}

/* COMPARAR */

btnComparar.onclick=()=>{

const c1=seleccionados[0];
const c2=seleccionados[1];

let resultado="";

if(c1.rendimiento>c2.rendimiento){

resultado=`🏆 ${c1.nombre} es más potente`;

}

else if(c2.rendimiento>c1.rendimiento){

resultado=`🏆 ${c2.nombre} es más potente`;

}

else{

resultado="⚖️ Ambos tienen el mismo rendimiento";

}

alert(`

${c1.nombre} (${c1.rendimiento}/10)

VS

${c2.nombre} (${c2.rendimiento}/10)

${resultado}

`);

seleccionados=[];
slot1.textContent="Componente 1";
slot2.textContent="Componente 2";
btnComparar.disabled=true;

document.querySelectorAll(".card").forEach(c=>{
c.classList.remove("selected");
});

};