const lightTheme = {
  "--main-color": " #f3f6fd",
  "--white-darck": " #000000",
  '--sombra-header': '#00070767',
};
const darkTheme = {
  "--main-color": " #111827",
  "--white-darck": " #f8f8f8",
  '--sombra-header': '#03f3f367',
};
//boton de modo dia noche 16 hasta abajo 
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
const btn_mb = document.querySelector('#btn-mb')
const busq_mb = document.querySelector('.busq-mb')
const exit_bsq = document.querySelector('#exit-bsq')

btn_mb.addEventListener('click', () => {
  busq_mb.classList.add('active')
})
exit_bsq.addEventListener('click', () => {
  busq_mb.classList.remove('active')
})

//efecto del header
var position = 0;
$(window).scroll(function (e) {
  var $element = $('header');
  var scrollTop = $(this).scrollTop();
  if (scrollTop <= 0) {
    $element.removeClass('hide').removeClass('scrolling');
  } else if (scrollTop < position) {
    $element.removeClass('hide');
  } else if (scrollTop > position) {
    $element.addClass('scrolling');
    if (scrollTop + $(window).height() >= $(document).height() - $element.height()) {
      $element.removeClass('hide');
    } else if (Math.abs($element.position().top) < $element.height()) {
      $element.addClass('hide');
    }
  }
  position = scrollTop;
})



//accion boton menu
let aside=document.querySelector('.aside')
let btn_aside=document.querySelector('.toggle-button')

const toggleElement = (element, nameClass) => {
	element.classList.toggle(nameClass)
}

btn_aside.addEventListener('click', () => {
  toggleElement(aside, 'active')
})