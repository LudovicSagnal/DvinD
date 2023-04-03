let queryInput = document.getElementsByName('query');
let h2 = document.getElementById('test2');

async function query() {
    var data = new FormData();

    await fetch("../controllers/controller_search.php", {
        method: "POST",
        body: data

    })
    .then((response) => response.json())
    .then((result) => {
        document.getElementById("game_title").innerHTML = result.game_title;
        document.getElementById("game_img").src = "../image/jeux/"+result.game_img;
        document.getElementById("game_link").href = "view_fiche_de_jeu.php?id="+result.game_id;
    });

}



