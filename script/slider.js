function initSlider(){
    let tab = ["../image/slide/loneRuin.jpg", "../image/slide/children.jpg", "../image/slide/kandria.jpg", "../image/slide/rogueAi.jpg", "../image/slide/zombieAdmin.jpg"];
    let n = 0;
    
    let prev = document.getElementById("previous");
    let next = document.getElementById("next");
    let image = document.querySelector("#pictures");

    prev.addEventListener("click",changePrev);
    next.addEventListener("click",changeNext);
    
    function changeNext() { 
        if (n < 4){
            n++;
            image.src = tab[n];
        }else {
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
}

export { initSlider }