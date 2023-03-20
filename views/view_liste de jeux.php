<?php
    include_once '../models/connect.php';
    $games = $db->query('SELECT * FROM games ORDER By name ASC')->fetchAll();

    $tags = $db->query('SELECT tags.name FROM tags')->fetchAll();

    $platforms = $db->query('SELECT platforms.name FROM platforms')->fetchAll();

    $langs = $db->query('SELECT languages.name FROM games
                        INNER JOIN games_languages ON games_languages.game_id = games.id        
                        INNER JOIN languages ON languages.id = games_languages.language_id')->fetchAll();

    $title = "Liste de jeux";
    $description = "Liste des jeux indépendants.";
    // require './topHTML.php';
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des jeux</title>
    <link rel="stylesheet" href="../style/style.css?v=<?=date("H-i-s")?>" />
    <link rel="stylesheet" href="../style/jeux.css?v=<?=date("H-i-s")?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="../image/favicon-512x512.png">
    <script src="../script/roulette.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/list.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/user.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.4/iconify-icon.min.js" defer></script>
    <script src="../script/smart-nav.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/randomGame.js" defer></script>
    <script src="../script/showGame.js" defer></script>
    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#search-list").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>

</head>

  <body>
    <header>
        <nav class="nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="active">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <iconify-icon class="hamburger" icon="ci:hamburger" style="color: #fefafa;"></iconify-icon>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="display-none" id="smart-nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="active">Liste de jeux</a>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </div>
        <div class="bottom-nav">
          <div class="line-1"></div>
          <input type="text" id="search-input" class="search">
          <label for="search-input">Rechercher un jeu</label>
          <div class="display-none" id="modal-search">
              <ul id="games-list"></ul> 
          </div>
          <div class="user-div">
          <img src="../image/avatar/<?=isset($_SESSION['user']) ? $_SESSION['user']['picture_url'] : "User.svg"?>" alt="" class="user">
                <?=isset($_SESSION["user"]) ? '<p class="show-pseudo">'.$_SESSION["user"]["username"].'</p>' : '<a href="view_inscription.php" class="create-profil"><button>Inscription</button></a>'?>
            </div>
            <div id="overlay" class="login-modal-none"></div>
            <?php
                if(isset($_SESSION['user'])) include 'modals/modal_deconnexion.php';
                else include 'modals/modal_connexion.php';
            ?>
          <div class="line-2"></div>
      </div>
    </header>

    <main>
      <div class="left-actu">
          <div class="gradient-container">
              <button class="but-roulette" id="but-roulette" onclick="randomGame();">Lance la roulette !</button>
              <div class="gradient"></div>
          </div>
          <div class="div-roul"> 
              <img src="../image/lights.svg" alt="" class="lights" id="lights" />
              <img src="../image/roulette.svg" alt="" class="roulette" id="roulette">
          </div>
          <div id="modal-roulette" class="display-none">
              <img src="../image/cross-23.svg" alt="" class="cross-roulette" id="cross-roulette">
              <h2 id="game_title"></h2>
              <img id="game_img" src="" alt="" class="modal-cover redirect">
              <a id="game_link" href="">Voir la fiche du jeu</a>
              <button id="modal-roulette-button" onclick="randomGame();">Relancer la roulette</button>
          </div>
      </div>
      <div class="game-list">
        <h2 class="game-title">Liste des jeux</h2>
        <div class="fil-main">
        <?php foreach($games as $game) { ?>
          <ul>
            <li id="search-list"><a href="view_fiche de jeu.php?id=<?=$game['id']?>"><?=($game['name'])?></a></li>
          </ul>
        <?php }  ?>
        </div>
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
                <input type="checkbox"  id="first" checked />
                Toutes
              </label>
              <?php foreach($platforms as $platform) {?>
                  <label for="<?php $platform['name'] ?>">
                    <input type="checkbox" name="platform" id="<?php $platform['name'] ?>" /> <?php echo $platform['name'] ?>
                  </label> <?php
              } ?>
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
                <img src="../image/Flag_of_France.svg.png" alt="" /> Français
              </label>
              <label for="thirdL">
                <input type="checkbox" id="thirdL" />
                <img src="../image/Flag_of_the_United_Kingdom.svg.png" alt="" /> Anglais
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
                <option>Genres</option>
              </select>
              <div class="overSelect"></div>
            </div>
            <div class="checkBoxes">
              <label for="firstT">
                <input type="checkbox" id="firstT" checked />
                Tous
              </label>
              <label for="secondT">
                <input type="checkbox" id="secondT" />
                Action
              </label>
              <label for="thirdT">
                <input type="checkbox" id="thirdT" />
                Combat
              </label>
              <label for="fourthT">
                <input type="checkbox" id="fourthT" />
                Gestion
              </label>
              <label for="fifthT">
                <input type="checkbox" id="fifthT" />
                Horreur
              </label>
              <label for="sixthT">
                <input type="checkbox" id="sixthT" />
                Plateforme
              </label>
              <label for="seventhT">
                <input type="checkbox" id="seventhT" />
                RPG
              </label>
              <label for="eighthT">
                <input type="checkbox" id="eighthT" />
                Sport
              </label>
              <label for="ninthT">
                <input type="checkbox" id="ninthT" />
                Stratégie
              </label>
            </div>
          </div>
        </form>
      </div>
    </main>

<?php
    require './bottomHTML.php';
?>
