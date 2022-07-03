const estrelle = document.querySelectorAll('input[type="radio"]');

const estrella = document.querySelector('input[type="radio"]:checked');

// //evento de los imputs y textareas
const datos = {
  nombre: "",
  testimonio: "",
  punto:"",
};
//-----------------------------------------------------------------------------------
const nombre = document.querySelector("#nombre");
const testimonio = document.querySelector("#testimonio");
const punto = document.querySelectorAll('input[type="radio"]');


var Myelement = document.querySelector('input[name="punto"]');
console.log(Myelement.value);


punto.forEach(punto =>{
    punto.addEventListener("input", function (e) {
    punto.addEventListener("input", leerTexto);
    // console.log(e.target.value);
    Myelement.value = (e.target.value);
    // console.log(Myelement.value);
});
})

function leerTexto(e) {
    datos[e.target.id] = e.target.value;
    // console.log(datos)
}

nombre.addEventListener("input", function (e) {
  console.log(e.target.value);
});
nombre.addEventListener("input", leerTexto);


testimonio.addEventListener("input", function (e) {
  console.log(e.target.value);
});
testimonio.addEventListener("input", leerTexto);









