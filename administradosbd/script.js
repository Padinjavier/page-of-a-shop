const btnmenu = document.querySelector(".btn-menu");

const menuabrir = document.querySelector(".fa-bars");
const menucerrar = document.querySelector(".fa-x");
const menumain = document.querySelector(".contenedor");
const sombra = document.querySelector(".sombra");

const toggleElement = (element, nameClass) => {
  element.classList.toggle(nameClass);
};

btnmenu.addEventListener("click", () => {
  toggleElement(menuabrir, "active");
  toggleElement(menucerrar, "active");
  toggleElement(menumain, "active");
});

sombra.addEventListener("click", () => {
  menuabrir.classList.toggle("active");
  menucerrar.classList.toggle("active");
  menumain.classList.remove("active");
});


const usuario = document.querySelector(".usuario");
const tablausuarios = document.querySelector(".usuarios");

const testimonio = document.querySelector(".testimonio");
const tablatestimonios = document.querySelector(".testimonios");

const reservacion = document.querySelector(".reservacion")
const tablereservaciones = document.querySelector(".reservaciones")

usuario.addEventListener("click", () => {
  usuario.classList.add("active");
  tablausuarios.classList.add("active");

  testimonio.classList.remove("active");
  tablatestimonios.classList.remove("active");

  reservacion.classList.remove("active");
  tablereservaciones.classList.remove("active");
});

testimonio.addEventListener("click", () => {
  testimonio.classList.add("active");
  tablatestimonios.classList.add("active");

  usuario.classList.remove("active");
  tablausuarios.classList.remove("active");

  reservacion.classList.remove("active");
  tablereservaciones.classList.remove("active");
});

reservacion.addEventListener("click", () => {
  reservacion.classList.add("active");
  tablereservaciones.classList.add("active");

  testimonio.classList.remove("active");
  tablatestimonios.classList.remove("active");

  usuario.classList.remove("active");
  tablausuarios.classList.remove("active");
});


