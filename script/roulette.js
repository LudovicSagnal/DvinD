let buttonWheel = document.getElementById("but-roulette");
let wheel = document.getElementById("roulette");
let lights = document.getElementById("lights");
let modalRoulette = document.getElementById("modal-roulette");
let cross = document.querySelector("#cross-roulette");
let buttonAgain = document.querySelector("#modal-roulette-button");
let render = false;

//spin de la roulette et de la guirlande
function spin() {
  wheel.classList.add("roulette-spin");
  lights.classList.add("lights-spin");
  setTimeout(() => {
    wheel.classList.remove("roulette-spin");
    lights.classList.remove("lights-spin");
  }, "5000");
  setTimeout(() => {
    modalRoulette.classList.replace("display-none", "modal-roulette-show");
  }, "4000");
  render = true;
};

buttonWheel.addEventListener("click", (spin));
buttonAgain.addEventListener("click", (spin));

//fermer la modal en cliquant sur la croix
cross.addEventListener("click", (closeModal) => {
  console.log("Goodbye");
  if (render) {
    modalRoulette.classList.replace("modal-roulette-show", "display-none");
    render = false;
  }
});
// fermer la modal en cliquant en dehors d'elle
window.onclick = function(e) {
  if (e.target !== modalRoulette) {
    modalRoulette.classList.replace("modal-roulette-show", "display-none");
    render = false;;
  }
}