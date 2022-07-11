//animacion al scrollear
AOS.init();
// dark mode
const btnSwitch=document.querySelector("#switch");
btnSwitch.addEventListener("click", ()=>{
    document.body.classList.toggle("dark");
    btnSwitch.classList.toggle("active");
})
// carta de precio
let shoppingCart=document.querySelector(".shopping-cart");
document.querySelector("#cart-btn").onclick =()=>{
shoppingCart.classList.toggle("active");
loginForm.classList.remove("active");
navbar.classList.remove("active");
}
// usuario-cuenta
let loginForm=document.querySelector(".login-form");
document.querySelector("#login-btn").onclick =()=>{
loginForm.classList.toggle("active");
shoppingCart.classList.remove("active");
navbar.classList.remove("active");
}
// ojo activa-desactiva
const ojo = document.querySelector(".fa-eye");
const ojox = document.querySelector(".fa-eye-slash");
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
//menu
let navbar = document.querySelector(".navbar");
let btnMenu = document.querySelector(".toggle-button");
//body statico al activar menu
const body=document.querySelector("body");
const toggleElement = (element, nameClass) => {
	element.classList.toggle(nameClass)
}
btnMenu.addEventListener('click', () => {
  toggleElement(navbar, 'active')
  toggleElement(btnMenu, 'active')
  toggleElement(body, "active");
  shoppingCart.classList.remove("active");
  loginForm.classList.remove("active");
})
// termina -menu
window.onscroll = () =>{
  shoppingCart.classList.remove("active");
  loginForm.classList.remove("active");
  navbar.classList.remove("active");
}
//submenu
const subMenuBtn = document.querySelectorAll(".submenu-btn");
let children=document.querySelector(".menu-item-has-children");
for(let i= 0; i< subMenuBtn.length;i++){
  subMenuBtn[i].addEventListener("click", function(){
    toggleElement(children, 'active')
    if(window.innerWidth <700){
      const subMenu = this.nextElementSibling;
      const height =subMenu.scrollHeight;
      if(subMenu.classList.contains("desplegar")){
        subMenu.classList.remove("desplegar");
        subMenu.removeAttribute("style");
      }else{
        subMenu.classList.add("desplegar");
        subMenu.style.height =height + "px";
      }
    }
  });
}
// slider del main
const $sliders = document.querySelectorAll('.carousel-item')
const nextSlider = (sliders) => {
	const totalSliders = sliders.length - 1
	let indice
	sliders.forEach((slider, i) => {
		if (slider.classList.contains('active')) {
			slider.classList.remove('active')
			indice = i + 1
			if (indice > totalSliders) indice = 0
		}
	})
	sliders[indice].classList.add('active')
}
let runSlider = setInterval(() => {
	nextSlider($sliders)
}, 5000)
document.onload = runSlider 
// testimonios mediasquery
if((screen.width)> 350 & (screen.width) < 600){
  $('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    focusOnSelect: true
  });
}
if((screen.width)> 600 & (screen.width)< 800){
  $('.slider-nav').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    dots: true,
    focusOnSelect: true
  });
}
if((screen.width) > 800){
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    focusOnSelect: true,
  });
}
$('a[data-slide]').click(function(e) {
  e.preventDefault();
  var slideno = $(this).data('slide');
  $('.slider-nav').slick('slickGoTo', slideno - 1);
});

/*para llevar la puntuacion a la base datos cada input radio tiene uhn valor ese valor
 se guarda en otro input y al enviar se lleva el valor de ese input ver consola el if es 
 para evitar el error cuando no exista un inicio de seccion (sin logear) y que el resto de
 js funcione sin problemas*/
const login_s0n = document.querySelector(".verificaloginono")
console.log(login_s0n.innerHTML)
if((login_s0n.innerHTML)!=""){
// const estrelle = document.querySelectorAll('input[type="radio"]');
// const estrella = document.querySelector('input[type="radio"]:checked');
const datos = {
  punto:"",
};
const punto = document.querySelectorAll('input[type="radio"]');

var Myelement = document.querySelector('input[name="punto"]');
console.log(Myelement.value);

punto.forEach(punto =>{
    punto.addEventListener("input", function (e) {
    punto.addEventListener("input", leerTexto);
    Myelement.value = (e.target.value);
    console.log(Myelement.value);
});
})

function leerTexto(e) {
    datos[e.target.id] = e.target.value;
}
//fin del input para la puntuacion-----------
}
// header
const header = document.querySelector(".header")
window.onscroll = function() {
  // console.log("Vertical: " + window.scrollY);
  // console.log("Horizontal: " + window.scrollX);
if((window.scrollY)>534){
  header.classList.add('active')
}
if((window.scrollY)<534){
  header.classList.remove('active')
}
};











