let buttonWheel = document.getElementById("but-roulette");
let wheel = document.getElementById("roulette");
let lights = document.getElementById("lights");
let modalRoulette = document.getElementById("modal-roulette");
let cross = document.querySelector("#cross-roulette");
let buttonAgain = document.querySelector("#modal-roulette-button");
var render = false;

function egor() {
  wheel.classList.add("roulette-spin");
  lights.classList.add("lights-spin");
  console.log(egor);
  setTimeout(() => {
    wheel.classList.remove("roulette-spin");
    lights.classList.remove("lights-spin");
  }, "5000");
  setTimeout(() => {
    modalRoulette.classList.remove("display-none");
    modalRoulette.classList.add("modal-roulette-show");
  }, "4000");
  render = true;
};

buttonWheel.addEventListener("click", (egor));
buttonAgain.addEventListener("click", (egor));

cross.addEventListener("click", (closeModal) => {
  console.log("Goodbye");
  if (render) {
    modalRoulette.classList.remove("modal-roulette-show");
    modalRoulette.classList.add("display-none");
    render = false;
  }
});

window.onclick = function(e) {
  if (e.target !== modalRoulette) {
    modalRoulette.classList.remove("modal-roulette-show");
    modalRoulette.classList.add("display-none");
    render = false;;
  }
}