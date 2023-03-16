let n =0 ;
var gameScreen = document.getElementById("game-screen").src;

async function initSliderScreenshots() {
    var formData = new FormData();

    await fetch("../controllers/controller_screenshots.php", {
        method: "GET",
    })
    .then((response) => response.json())
    .then((result) => {
        gameScreen = "../image/screenshots/"+result.game_name+"/"+result.game_img[1];
    });
}

// let prev = document.getElementById("previous-screen");
// let next = document.getElementById("next-screen");

// // prev.addEventListener("click",changePrev);
// next.addEventListener("click",changeNext);

// function changeNext() {
//     console.log(gameScreen);
// }

// function changeNext() { 
//     if (n < (result.length-1)){
//         n++;
//         console.log("haha");
//     }else {
//         n = 0;
//         console.log("hoho");
//     }
// };

// function changePrev() {
//     if (n <= 0) {
//         n = 4;
//     }else if (n <= (result.length-1)) {
//         n--;
//     }
// };
