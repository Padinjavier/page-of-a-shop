const ojo = document.querySelector(".fa-eye");
const ojox = document.querySelector(".fa-eye-slash");
const ojo2 = document.querySelector(".eye2");
const ojox2 = document.querySelector(".eye22");

const toggleElement = (element, nameClass) => {
  element.classList.toggle(nameClass);
};

function mostrarContrasena() {
  toggleElement(ojo, "active");
  toggleElement(ojox, "active");
  var tipo = document.getElementById("password");
  if (tipo.type == "password") {
    tipo.type = "text";
  } else {
    tipo.type = "password";
  }
}

function mostrarContrasenaa() {
  toggleElement(ojo2, "active");
  toggleElement(ojox2, "active");
  var tipo = document.getElementById("confipassword");
  if (tipo.type == "password") {
    tipo.type = "text";
  } else {
    tipo.type = "password";
  }
}

document.getElementById("email").addEventListener("input", function () {
  valido = document.getElementById("emailOK");
  email = document.getElementById("email");
  if ((email.innerHTML = "")) {
  } else {
    toggleElement(valido, "active");
  }
});
