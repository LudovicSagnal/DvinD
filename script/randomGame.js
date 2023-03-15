async function randomGame() {
    var formData = new FormData();

    await fetch("../controllers/controller_random_game.php", {
        method: "GET",
    })
    .then((response) => response.json())
    .then((result) => {
        document.getElementById("game_title").innerHTML = result.game_title;
        document.getElementById("game_img").src = "../image/jeux/"+result.game_img;
        document.getElementById("game_link").href = "view_fiche de jeu.php?id="+result.game_id;
    });
}