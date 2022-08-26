document.addEventListener("DOMContentLoaded", eventListeners);

function eventListeners() {
  darkMode();
  numeroCaracteres();

  const menu = document.getElementById("menu");
  menu.addEventListener("click", menuResponsive);

  const btnDark = document.querySelector(".navegacion__dark");
  btnDark.addEventListener("click", () => {
    if (localStorage.getItem("flag") == "true") {
      localStorage.setItem("flag", "false");
    } else {
      localStorage.setItem("flag", "true");
    }
    darkMode();
  });
}

function menuResponsive() {
  const navegacion = document.querySelector(".navegacion--header");
  navegacion.classList.toggle("mostrar");
}

function darkMode() {
  const iconos = document.querySelectorAll(".iconos__caracteristicas li img");
  const flag = window.matchMedia("prefers-color-scheme:dark").matches;
  if (localStorage.getItem("flag") == "true" || flag) {
    document.documentElement.style.setProperty("--gris", "#242524");
    document.documentElement.style.setProperty("--negro", "#fffaeb");
    document.documentElement.style.setProperty("--amarillo", "#a1722e");
    document.documentElement.style.setProperty("--verde", "#6b872a");
    document.documentElement.style.setProperty("--blanco", "#fffaeb");
    document.documentElement.style.setProperty("--grisOscuro", "#212221");
    document.documentElement.style.setProperty("--rojo", "#611e1b");
    document.body.style.backgroundColor = "#101010";
    iconos.forEach((element) => {
      element.style.filter = "invert(100%)";
    });
  }
  if (localStorage.getItem("flag") == "false") {
    document.documentElement.style.setProperty("--gris", "#eee");
    document.documentElement.style.setProperty("--negro", "#000000");
    document.documentElement.style.setProperty("--amarillo", "#e08709");
    document.documentElement.style.setProperty("--verde", "#71b100");
    document.documentElement.style.setProperty("--blanco", "#fff");
    document.documentElement.style.setProperty("--grisOscuro", "#333333");
    document.documentElement.style.setProperty("--rojo", "#ce3c3c");
    document.body.style.backgroundColor = "#fff";
    iconos.forEach((element) => {
      element.style.filter = "invert(0%)";
    });
  }
}

function numeroCaracteres() {
  //Escribir num caracteres
  const textarea = document.querySelector("textarea");

  if (textarea) {
    const escribir = document.querySelector(".caracteres");

    textarea.addEventListener("keyup", () => {
      const num = textarea.value.length;
      escribir.textContent = num != 0 ? `Número de caracteres: ${num}` : "";
    });
  }
}
