// function showGame(str) {
//     if (str == "") {
//       document.getElementById("game-search").innerHTML = "";
//       return;
//     } else {
//       var xmlhttp = new XMLHttpRequest();
//       xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//           document.getElementById("game-search").innerHTML = this.responseText;
//         }
//       };
//       xmlhttp.open("GET","../controllers/controller_searchBar.php?q="+str,true);
//       xmlhttp.send();
//     }
// }

const gamesList = document.getElementById('games-list');
const searchInput = document.getElementById('search-input');
const modal = document.getElementById('modal-search');
let delayTimer;

searchInput.addEventListener('keyup', () => {
   if (searchInput.value) { // Don't send request if the search input is empty
        clearTimeout(delayTimer); // First clear the timeout to stop pending requests to be executed

        delayTimer = setTimeout(() => { // Then set a new timer, that will execute the AJAX request
            modal.classList.replace('display-none', 'modal-search');
            fetch('../controllers/controller_searchBar.php?search=' + searchInput.value) // Provide searchInput parameter
                .then(response => response.json()) // Converting the response from JSON to JavaScript
                .then(games => { // After the JSON -> JS convertion, we can access the games array
                    gamesList.innerHTML = ''; // Empty the games list for each request, so we can add games after that

                    games.forEach(game => { // For each game in the games array, create a new <li> element with the link inside, and append it to the games list
                        const gameElement = document.createElement('li');
                        gameElement.innerHTML = `<a href="view_fiche_de_jeu.php?id=${game.id}">${game.name}</a>`;

                        gamesList.append(gameElement);
                    });
                });
        }, 500); // 500 stands for 500ms, it's the time we'll have to wait until the request is sent (to prevent sending a request for each character)
    } else {
      gamesList.innerHTML = '';
      modal.classList.replace('modal-search', 'display-none');
    }
});