<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des jeux</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/jeux.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="/image/favicon-512x512.png">
    <script src="script/roulette.js" defer></script>
    <script src="script/list.js" defer></script>
    <script src="script/user.js" defer></script>

</head>

  <body>
    <header>
        <nav class="nav">
            <a href="index.php" class="link">Actualités</a>
            <a href="Liste de jeux.php" class="active">Liste de jeux</a>
            <a href="index.php" ><img src="image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <a href="Contact.php" class="link">Contact</a>
            <a href="Forum.php" class="link">Forum</a>
        </nav>
        <div class="bottom-nav">
          <div class="line-1"></div>
          <img src="image/Loupe.svg" class="glass">
          <input type="text" placeholder="Rechercher ici" class="search">
          <div class="user-div">
              <img src="image/User.svg" alt="" class="user">
              <a href="Inscription.php" class="create-profil"><button>S'inscrire ici</button></a>
          </div>
          <div id="overlay" class="login-modal-none"></div>
          <div class="display-none" id="modal-user">
              <img src="image/cross-23.svg" alt="" class="cross" id="cross">
              <label for="login">Identifiant</label>
              <input type="text" id="login">
              <label for="password">Mot de Passe</label>
              <input type="password" id="password">
              <button>Valider</button>
              <a href="Inscription.php" class="create-profil-modal">S'inscrire ici</a>
          </div>
          <div class="line-2"></div>
      </div>
    </header>

    <main>
      <div class="left-actu">
        <div class="gradient-container">
          <button class="but-roulette" id="but-roulette">
            Lance la roulette !
          </button>
          <div class="gradient"></div>
        </div>
        <div class="div-roul">
          <img src="image/lights.svg" alt="" class="lights" id="lights" />
          <img src="image/roulette.svg" alt="" class="roulette" id="roulette" />
        </div>
        <div id="modal-roulette" class="display-none">
          <img src="image/cross-23.svg" alt="" class="cross-roulette" id="cross-roulette">
          <h2>Lone Ruin</h2>
          <img src="image/slide/loneRuin.jpg" alt="" class="modal-cover">
          <a href="">Voir la fiche du jeu</a>
          <button id="modal-roulette-button">Relancer la roulette</button>
      </div>
      </div>
      <div class="game-list">
        <h2 class="game-title">Liste des jeux</h2>
        <div class="fil-main"></div>
      </div>

      <div class="right-actu">
        <h2>Affiner votre recherche</h2>
        <form>
          <div class="multipleSelection">
            <div class="selectBox">
              <select>
                <option>Plateforme</option>
              </select>
              <div class="overSelect"></div>
            </div>
            <div class="checkBoxes">
              <label for="first">
                <input type="checkbox" id="first" checked />
                Toutes
              </label>
              <label for="second">
                <input type="checkbox" id="second" />
                PC
              </label>
              <label for="third">
                <input type="checkbox" id="third" />
                Xbox
              </label>
              <label for="fourth">
                <input type="checkbox" id="fourth" />
                PS5
              </label>
            </div>
          </div>
        </form>
        <form>
          <div class="multipleSelection">
            <div class="selectBox">
              <select>
                <option>Langues</option>
              </select>
              <div class="overSelect"></div>
            </div>
            <div class="checkBoxes">
              <label for="firstL">
                <input type="checkbox" id="firstL" checked />
                Toutes
              </label>
              <label for="secondL">
                <input type="checkbox" id="secondL" />
                <img src="image\Flag_of_France.svg.png" alt="" /> Français
              </label>
              <label for="thirdL">
                <input type="checkbox" id="thirdL" />
                <img src="image\Flag_of_the_United_Kingdom.svg.png" alt="" />
                Anglais
              </label>
            </div>
          </div>
        </form>
        <form>
            <div class="multipleSelection">
                <div class="selectBox">
                    <select>
                        <option>Année de sortie</option>
                    </select>
                    <div class="overSelect"></div>
                </div>     
                    <div class="checkBoxes">
                        <label for="firstD">
                            <input type="checkbox" id="firstD" checked/>
                            Toutes
                        </label>                      
                        <label for="secondD">
                            <input type="checkbox" id="secondD" />
                            2023
                        </label>
                        <label for="thirdD">
                            <input type="checkbox" id="thirdD" />
                            2022
                        </label>
                        <label for="fourthD">
                            <input type="checkbox" id="fourthD" />
                            2021
                        </label>
                        <label for="fifthD">
                            <input type="checkbox" id="fifthD" />
                            2020
                        </label>
                        <label for="sixthD">
                            <input type="checkbox" id="sixthD" />
                            2019
                        </label>
                        <label for="seventhD">
                            <input type="checkbox" id="seventhD" />
                            2018
                        </label>
                        <label for="eighthD">
                            <input type="checkbox" id="eighthD" />
                            2017
                        </label>
                        <label for="ninthD">
                            <input type="checkbox" id="ninthD" />
                            2016
                        </label>
                        <label for="tenthD">
                            <input type="checkbox" id="tenthD" />
                            2015
                        </label>
                    </div> 
            </div>
        </form>
        <form>
          <div class="multipleSelection">
            <div class="selectBox">
              <select>
                <option>Langues</option>
              </select>
              <div class="overSelect"></div>
            </div>
            <div class="checkBoxes">
              <label for="firstT">
                <input type="checkbox" id="firstT" checked />
                Toutes
              </label>
              <label for="secondT">
                <input type="checkbox" id="secondT" />
                Français
              </label>
              <label for="thirdT">
                <input type="checkbox" id="thirdT" />
                Anglais
              </label>
            </div>
          </div>
        </form>
      </div>
    </main>

    <footer class="foot"></footer>
  </body>
</html>
