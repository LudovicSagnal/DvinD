let tab = ["../image/slide/loneRuin.jpg", "../image/slide/children.jpg", "../image/slide/kandria.jpg", "../image/slide/rogueAi.jpg", "../image/slide/zombieAdmin.jpg"];
let n = 0;

prev = document.getElementById("previous");
next = document.getElementById("next");
image = document.querySelector("#pictures");

console.log(image);

prev.addEventListener("click",changePrev);
next.addEventListener("click",changeNext);
console.log(n);

function changeNext() { 
    if (n < 4){
        n++;
        console.log(n);
        image.src = tab[n];
    }else {
        console.log(n);
        n = 0;
        image.src = tab[n];
    }
};

function changePrev() {
    if (n <= 0) {
        n = 4;
        image.src = tab[n];
    }else if (n <= 4) {
        n--;
        image.src = tab[n];
    }
};