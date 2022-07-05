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


console.log("La resolución de tu pantalla es: " + screen.availWidth + " x " + screen.height) 


// var orientacion = matchMedia("(orientation: portrait)");
// orientacion.addListener(function(mql){
// document.getElementById('contador').className = mql.matches ? 'activo' : 'inactivo';
// document.getElementById('contador').textContent++;
// });