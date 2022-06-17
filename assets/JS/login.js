const signup = document.getElementById("signup");
const btnsignup = document.getElementById("btn-signup");
const loginsignup = document.getElementById("loginsignup");
const ojo = document.querySelector(".fa-eye");
const ojox = document.querySelector(".fa-eye-slash");

const toggleElement = (element, nameClass) => {
  element.classList.toggle(nameClass);
};

btnsignup.addEventListener("click", () => {
  toggleElement(signup, "active");
  toggleElement(loginsignup, "active");
});

function mostrarContrasena(){
  toggleElement(ojo, "active");
  toggleElement(ojox, "active");
  var tipo = document.getElementById("password");
  if(tipo.type == "password"){
      tipo.type = "text";
  }else{
      tipo.type = "password";
  }
}





