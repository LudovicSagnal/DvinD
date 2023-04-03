// function initSlider(){
    // let tab = ["../image/slide/loneRuin.jpg", "../image/slide/children.jpg", "../image/slide/kandria.jpg", "../image/slide/rogueAi.jpg", "../image/slide/zombieAdmin.jpg"];
    
    let n = 0;
    let prev = document.getElementById("previous");
    let next = document.getElementById("next");
    let image = document.querySelector("#slider-pictures");
    let link = document.querySelector("#slider-link");
    let date = document.querySelector("#slider-date");
    let gameArray;
    let cleanName;

    function initSlider() {

        fetch("../controllers/controller_slider.php", {
        })
        .then((response) => response.json())
        .then((result) => {
            gameArray = result;
            firstDate = new Date(gameArray[0].release_date);
            image.src = "../image/jeux/"+gameArray[0].picture_url;
            date.innerHTML = "Sortie le "+firstDate.toLocaleDateString('fr-FR');
            link.href = "view_fiche_de_jeu.php?id="+gameArray[0].id;
        });
    }
    
    prev.addEventListener("click",changePrev);
    next.addEventListener("click",changeNext);
    
    function changeNext() { 
        if (n < 4){
            n++;
            gameDate = new Date(gameArray[n].release_date);
            image.src = "../image/jeux/"+gameArray[n].picture_url;
            date.innerHTML = "Sortie le "+gameDate.toLocaleDateString('fr-FR');
            link.href = "view_fiche_de_jeu.php?id="+gameArray[n].id;
        }else {
            n = 0;
            gameDate = new Date(gameArray[n].release_date);
            image.src = "../image/jeux/"+gameArray[n].picture_url;
            date.innerHTML = "Sortie le "+gameDate.toLocaleDateString('fr-FR');
            link.href = "view_fiche_de_jeu.php?id="+gameArray[n].id;
        }
    };
    
    function changePrev() {
        if (n <= 0) {
            n = 4;
            gameDate = new Date(gameArray[n].release_date);
            image.src = "../image/jeux/"+gameArray[n].picture_url;
            date.innerHTML = "Sortie le "+gameDate.toLocaleDateString('fr-FR');
            link.href = "view_fiche_de_jeu.php?id="+gameArray[n].id;
        }else if (n <= 4) {
            n--;
            gameDate = new Date(gameArray[n].release_date);
            image.src = "../image/jeux/"+gameArray[n].picture_url;
            date.innerHTML = "Sortie le "+gameDate.toLocaleDateString('fr-FR');
            link.href = "view_fiche_de_jeu.php?id="+gameArray[n].id;
        }
    };
// }
