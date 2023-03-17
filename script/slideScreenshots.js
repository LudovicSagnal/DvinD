var gameScreen = document.getElementById("game-screen").src;

async function initSliderScreenshots(gameId) {
    console.log(gameId);
    var formData = new FormData();

    await fetch("../controllers/controller_screenshots.php?id="+gameId, {
        method: "GET"
    })
    .then((response) => response.json())
    .then((result) => {
        console.log(result);
        // gameScreen = "../image/screenshots/"+result.game_name+"/"+result.game_img[0];
    });
}

let prev =document.getElementById("previous-screen");
let next = document.getElementById("next-screen");

next.addEventListener("click",initSliderScreenshots);
