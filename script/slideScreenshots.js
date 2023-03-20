let gameScreen = document.getElementById("game-screen");
let prev =document.getElementById("previous-screen");
let next = document.getElementById("next-screen");
next.addEventListener("click",changeNext);
prev.addEventListener("click",changePrev);
let n =0;
let screenArray;

function initSliderScreenshots(gameId) {

    fetch("../controllers/controller_screenshots.php?id="+gameId, {
    })
    .then((response) => response.json())
    .then((result) => {
        screenArray = result;
    });
}
function changeNext() { 
    if (n < 3){
        n++;
        gameScreen.src = "../image/screenshots/"+screenArray[0].name+"/"+screenArray[n].url;
    }else {
        n = 0;
        gameScreen.src = "../image/screenshots/"+screenArray[0].name+"/"+screenArray[n].url;
    }
};
function changePrev() {
    if (n <= 0) {
        n = 3;
        gameScreen.src = "../image/screenshots/"+screenArray[0].name+"/"+screenArray[n].url;
    }else if (n <= 3) {
        n--;
        gameScreen.src = "../image/screenshots/"+screenArray[0].name+"/"+screenArray[n].url;
    }
};