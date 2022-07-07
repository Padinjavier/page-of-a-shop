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
// body.classList.toggle("active");  preguntar a netis

  // se desactiva

loginForm.classList.remove("active");
navbar.classList.remove("active");
}
// usuario-cuenta
let loginForm=document.querySelector(".login-form");
document.querySelector("#login-btn").onclick =()=>{
loginForm.classList.toggle("active");
// body.classList.toggle("active"); preguntar a netis

  // se desactiva

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
// console.log(body);
const toggleElement = (element, nameClass) => {
	element.classList.toggle(nameClass)
}
btnMenu.addEventListener('click', () => {
  toggleElement(navbar, 'active')
  toggleElement(btnMenu, 'active')
  toggleElement(body, "active");
  // se desactiva
  
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
//submenu termina

// main- img slider
const btnSlider = document.querySelectorAll(".nav-btn");
const slider = document.querySelectorAll(".img-slider");
const contents = document.querySelectorAll(".contentSlider");
// console.log(contents)
let sliderNav =function(manual){
  // uno por uno
  btnSlider.forEach((btn)=>{
    btn.classList.remove("active");
  });
  slider.forEach((slide)=>{
    slide.classList.remove("active");
  });
  contents.forEach((content)=>{
    content.classList.remove("active");
  });

  btnSlider[manual].classList.add("active");
  slider[manual].classList.add("active");
  contents[manual].classList.add("active");
}

btnSlider.forEach((btns,i)=>{
  btns.addEventListener("click", ()=>{
    sliderNav(i);
  });
});


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









// const btnadmin = document.querySelector(".btn-admin")
// const opcomentarios = document.querySelector(".opcomentarios")
// const opdeportes = document.querySelector(".opdeportes")
// const opusuarios = document.querySelector(".opusuarios")


// console.log(opcomentarios)
// console.log(opdeportes)
// console.log(opusuarios)



// btnadmin.addEventListener("click", ()=>{
//   toggleElement(opcomentarios,'active');
//   toggleElement(opdeportes,'active');
//   toggleElement(opusuarios,'active');
// });
// header
const header = document.querySelector(".header")
window.onscroll = function() {
  console.log("Vertical: " + window.scrollY);
  console.log("Horizontal: " + window.scrollX);
if((window.scrollY)>534){
  header.classList.add('active')
}
if((window.scrollY)<534){
  header.classList.remove('active')
}
};











