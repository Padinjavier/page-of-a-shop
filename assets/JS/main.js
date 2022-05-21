const lightTheme = {
  "--main-color": " #f3f6fd",
  "--white-darck": " #000000",
};
const darkTheme = {
  "--main-color": " #111827",
  "--white-darck": " #f8f8f8",
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

const toggleElement = (element, nameClass) => {
	element.classList.toggle(nameClass)
}

console.log(darkMode)
if(darkMode==true){
  sun.classList.add('active')
  moon.classList.remove('active')
}else{
  sun.classList.remove('active')
  moon.classList.add('active')
}


boton.addEventListener("click", () => {
  darkMode = !darkMode;
  // darkMode ? addTheme(darkTheme) : ;
  if(darkMode){
    addTheme(darkTheme)
    sun.classList.add('active')
    moon.classList.remove('active')
  }else{
    addTheme(lightTheme)
    sun.classList.remove('active')
    moon.classList.add('active')
  }
});






