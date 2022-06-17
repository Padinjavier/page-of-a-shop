// // //----------------------------para el tema eoscuro o claro --------------------------------
const lightTheme = {
  '--font-family':' "Quicksand", sans-serif',
  '--card-width': '12.5rem',
  '--card-height': '18.75rem',
 ' --card-transition-duration':'800ms',
 ' --card-transition-easing': 'ease',
  '--white':'#ffffff',
};
const darkTheme = {
  '--font-family': '"Quicksand", sans-serif',
  '--card-width': '12.5rem',
  '--card-height': '18.75rem',
  '--card-transition-duration': '800ms',
  '--card-transition-easing':'ease',
  '--white':'#ffffff',
};
// //--------------------boton de modo dia noche abajo ---------------------------
const boton = document.querySelector(".lunasol");
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