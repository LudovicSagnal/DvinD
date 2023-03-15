let n =0 ;

async function initSliderScreenshots() {
    var formData = new FormData();

    await fetch("../controllers/controller_screenshots.php", {
        method: "POST",
        body: formData
    })
    .then((response) => response.json())
    .then((result) => {
        document.getElementById("game-screen").src = "../image/screenshots/"+result.game_name+"/"+result.game_img[0];
    });
}

// let prev = document.getElementById("previous-screen");
let next = document.getElementById("next-screen");

// prev.addEventListener("click",changePrev);
next.addEventListener("click",changeNext);

function changeNext() {
    console.log(result);
}

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
