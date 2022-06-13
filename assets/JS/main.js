//----------------------------para el tema eoscuro o claro --------------------------------
const lightTheme = {
  "--main-color": " #f3f6fd",
  "--white-darck": " #000000",
  '--sombra-header': '#00070767',
  '--varrita-scrol': '#d1802d',
  '--varra-scrol':'#9E9E9E',
};
const darkTheme = {
  "--main-color": " #111827",
  "--white-darck": " #f8f8f8",
  '--sombra-header': '#03f3f367',
  '--varrita-scrol': '#00fafa',
  '--varra-scrol':'#706e6e',
};
//--------------------boton de modo dia noche abajo ---------------------------
const boton = document.querySelector(".bubbly-button");
//detecta si el sistema tiene el modo dark o nigh
let darkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;
const addTheme = (theme) => {
  const styles = document.documentElement.style;
  const customStyles = Object.keys(theme);
  for (const style of customStyles) {
    styles.setProperty(style, theme[style]);
  }
};

const sun = document.querySelector("#sol");
const moon = document.querySelector("#luna");

if (darkMode == true) {
  sun.classList.add('active')
  moon.classList.remove('active')
} else {
  sun.classList.remove('active')
  moon.classList.add('active')
}

boton.addEventListener("click", () => {
  darkMode = !darkMode;
  // darkMode ? addTheme(darkTheme) : ;
  if (darkMode) {
    addTheme(darkTheme)
    sun.classList.add('active')
    moon.classList.remove('active')
  } else {
    addTheme(lightTheme)
    sun.classList.remove('active')
    moon.classList.add('active')
  }
});


//-------------------------efecto del header que se esconde al scrolear---------------
var position = 0;
$(window).scroll(function (e) {
  let $element = $('header');
  var scrollTop = $(this).scrollTop();
  let $aside= $('.aside')
  if (scrollTop <= 0) {
    $element.removeClass('hide').removeClass('scrolling');
    btn_aside.classList.remove('active')
  } else if (scrollTop < position) {
    $element.removeClass('hide');

    $aside.removeClass('active')
    btn_aside.classList.remove('active')

  } else if (scrollTop > position) {
    $element.addClass('scrolling');

    $aside.removeClass('active')
    btn_aside.classList.remove('active')

    if (scrollTop + $(window).height() >= $(document).height() - $element.height()) {
      $element.removeClass('hide');
      btn_aside.classList.remove('active')
    } else if (Math.abs($element.position().top) < $element.height()) {
      $element.addClass('hide');
    }
  }
  position = scrollTop;
})

//----------------------------accion boton menu---------------------------------------
let aside=document.querySelector('.aside')
let btn_aside=document.querySelector('.toggle-button')
let body=document.querySelector('body')

const toggleElement = (element, nameClass) => {
	element.classList.toggle(nameClass)
}

btn_aside.addEventListener('click', () => {
  toggleElement(aside, 'active')
  toggleElement(btn_aside, 'active')
  toggleElement(body, 'active')
})

//----------para la libreria de efectos entrada y salida de los div img etc----------
AOS.init();

//------------sub menu dentro del menu general nuestros servicios--------------------
const servicios=document.getElementById('servicios')
const menuservicios=document.querySelector('#servicios .menu')

servicios.addEventListener('click',()=>{
  toggleElement(menuservicios, 'active')
})

//--------------------------primer slider automatico--------------------------------
const $sliders1 = document.querySelectorAll('.img')
const nextSlider1 = (sliders1) => {
	const totalSliders1 = sliders1.length - 1
	let indice
	sliders1.forEach((slider1, i) => {
		if (slider1.classList.contains('active')) {
			slider1.classList.remove('active')
			indice = i + 1
			if (indice > totalSliders1) indice = 0
		}
	})
	sliders1[indice].classList.add('active')
}

const prevSlider1 = (sliders1) => {
	const totalSliders1 = sliders1.length - 1
	let indice
	// bloqueo 
	sliders1.forEach((slider1, i) => {
		// if (slider1.classList.contains('active')& i>0) {//bloqueado remplaza por el de abajo
      if (slider1.classList.contains('active')) {
			slider1.classList.remove('active')
			indice = i - 1
			if (indice < 0) indice = totalSliders1
		}
	})
	sliders1[indice].classList.add('active')
}
// izquierda
// $prev1.addEventListener('click', () => {
// 	clearInterval(runSlider)

// 	nextSlider1($sliders1)

// 	runSlider = setInterval(() => {
// 		nextSlider1($sliders1)
// 	}, 5000)
// })
// // derecha
// $next1.addEventListener('click', () => {
// 	nextSlider1($sliders1)
// })

//tiempo del slider automatico
let runSlider = setInterval(() => {
	nextSlider1($sliders1)
}, 5000)
document.onload = runSlider

//--------------------para el segundo slider que usa librerias---------------
