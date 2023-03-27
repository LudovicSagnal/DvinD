let gameScreen = document.getElementById("game-screen");
let prev =document.getElementById("previous-screen");
let next = document.getElementById("next-screen");
next.addEventListener("click",changeNext);
prev.addEventListener("click",changePrev);
let n =0;
let screenArray;
let cleanName;

function initSliderScreenshots(gameId) {

    fetch("../controllers/controller_screenshots.php?id="+gameId, {
    })
    .then((response) => response.json())
    .then((result) => {
        screenArray = result;
        cleanName = screenArray[0].name.replace( /[<>:"\/\\|?*]+/g, '' );
    });
}

function changeNext() { 
    if (n < 3){
        n++;
        gameScreen.src = "../image/screenshots/"+cleanName+"/"+screenArray[n].url;
    }else {
        n = 0;
        gameScreen.src = "../image/screenshots/"+cleanName+"/"+screenArray[n].url; 
    }
};
function changePrev() {
    if (n <= 0) {
        n = 3;
        gameScreen.src = "../image/screenshots/"+cleanName+"/"+screenArray[n].url;
    }else if (n <= 3) {
        n--;
        gameScreen.src = "../image/screenshots/"+cleanName+"/"+screenArray[n].url;
    }
};