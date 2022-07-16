// ojos del login
const ojologin = document.querySelector(".ojologin");
const ojologinx = document.querySelector(".ojologinx");

const toggleElement = (element, nameClass) => {
  element.classList.toggle(nameClass);
};

function mostrarContrasenalogin() {
  toggleElement(ojologin, "active");
  toggleElement(ojologinx, "active");
  var tipo = document.getElementById("passwordlogin");
  if (tipo.type == "password") {
    tipo.type = "text";
  } else {
    tipo.type = "password";
  }
}


const ojosignup = document.querySelector(".ojosignup");
const ojosignupx = document.querySelector(".ojosignupx");
const ojosignup2 = document.querySelector(".ojosignup2");
const ojosignupx2 = document.querySelector(".ojosignupx2");

function mostrarContrasenasignup() {
  toggleElement(ojosignup, "active");
  toggleElement(ojosignupx, "active");
  var tipo = document.getElementById("passwordsignup");
  if (tipo.type == "password") {
    tipo.type = "text";
  } else {
    tipo.type = "password";
  }
}

function mostrarContrasenasignupconfi() {
  toggleElement(ojosignup2, "active");
  toggleElement(ojosignupx2, "active");
  var tipo = document.getElementById("confipasswordsignup");
  if (tipo.type == "password") {
    tipo.type = "text";
  } else {
    tipo.type = "password";
  }
}

const registrar =document.querySelector(".registrar")
const contenlogin =document.querySelector(".contenlogin")
const contensignup =document.querySelector(".contensignup")
const exitsignup =document.querySelector("#exitsignup")



registrar.addEventListener("click", ()=>{
  toggleElement(contenlogin,"active")
  toggleElement(contensignup,"active")
})
exitsignup.addEventListener("click", ()=>{
  toggleElement(contenlogin,"active")
  toggleElement(contensignup,"active")
})




























