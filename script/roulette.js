let buttonWheel = document.getElementById('but-roulette');
let wheel = document.getElementById('roulette');
let lights = document.getElementById('lights');

buttonWheel.addEventListener('click', egor => {
    wheel.classList.add('roulette-spin');
    lights.classList.add('lights-spin');
    console.log(egor);
    setTimeout(() => {
        wheel.classList.remove('roulette-spin');
        lights.classList.remove('lights-spin');
      }, "5000")
});