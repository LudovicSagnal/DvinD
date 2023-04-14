<?php
include_once '../models/connect.php';

$tags = $db->query('SELECT id, name FROM tags')->fetchAll();
$platforms = $db->query('SELECT id, name FROM platforms')->fetchAll();
$langs = $db->query('SELECT id, name FROM languages')->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Liste des jeux indépendants." />
  <title>Liste des jeux</title>
  <link rel="stylesheet" href="../style/style.css?v=<?= date("H-i-s") ?>" />
  <link rel="stylesheet" href="../style/jeux.css?v=<?= date("H-i-s") ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="../image/favicon-512x512.png">
  <script src="../script/roulette.js?v=<?= date("H-i-s") ?>" defer></script>
  <script src="../script/list.js?v=<?= date("H-i-s") ?>" defer></script>
  <script src="../script/user.js?v=<?= date("H-i-s") ?>" defer></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.4/iconify-icon.min.js" defer></script>
  <script src="../script/smart-nav.js?v=<?= date("H-i-s") ?>" defer></script>
  <script src="../script/randomGame.js" defer></script>
  <script src="../script/showGame.js" defer></script>

</head>

<body>
  <header>
    <nav class="nav">
      <a href="view_index.php" class="link">Actualités</a>
      <a href="view_liste_de_jeux.php" class="active">Liste de jeux</a>
      <a href="view_index.php"><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
      <iconify-icon class="hamburger" icon="ci:hamburger" style="color: #fefafa;"></iconify-icon>
      <a href="view_contact.php" class="link">Contact</a>
      <a href="view_forum.php" class="link">Forum</a>
    </nav>
    <div class="display-none" id="smart-nav">
      <a href="view_index.php" class="link">Actualités</a>
      <a href="view_liste_de_jeux.php" class="active">Liste de jeux</a>
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
        <img src="../image/avatar/<?= isset($_SESSION['user']) ? $_SESSION['user']['picture_url'] : "User.svg" ?>" alt="" class="user">
        <?= isset($_SESSION["user"]) ? '<p class="show-pseudo">' . $_SESSION["user"]["username"] . '</p>' : '<a href="view_inscription.php" class="create-profil"><button>Inscription</button></a>' ?>
      </div>
      <div id="overlay" class="login-modal-none"></div>
      <?php
      if (isset($_SESSION['user'])) include 'modals/modal_deconnexion.php';
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
          <ul class="dynamic-list"></ul>
      </div>
      <div class="pagination"></div>
    </div>
    <div class="right-actu">
      <h2 class="div1">Affiner votre recherche</h2>
      <form id="form-filters" onchange="getFilters();">
      <input type="hidden" name="pagination" id="pagination" value="1">
        <div class="multipleSelection">
          <div class="selectBox">
            <select>
              <option>Plateforme</option>
            </select>
            <div class="overSelect"></div>
          </div>
          <div class="checkBoxes">
            <label for="first">
              <input type="checkbox" id="first" name="platform[]" value="Tous" <?=(!isset($_SESSION['list_game']['platform']) ? "checked" : "")?> />
              Toutes
            </label>
            <?php foreach ($platforms as $platform) { ?>
              <label for="<?= $platform['name'] ?>">
                <input type="checkbox" name="platform[]" id="<?= $platform['name'] ?>" value="<?= $platform['name'] ?>" <?=(!empty($_SESSION['list_game']['platform']) && in_array($platform['name'], $_SESSION['list_game']['platform']) ? "checked" : "")?> /> <?= $platform['name'] ?>
              </label> <?php
                      } ?>
          </div>
        </div>
        <div class="multipleSelection">
          <div class="selectBox">
            <select>
              <option>Langues</option>
            </select>
            <div class="overSelect"></div>
          </div>
          <div class="checkBoxes">
            <label for="firstL">
              <input type="checkbox" id="firstL" name="lang[]" value="Tous" <?=(!isset($_SESSION['list_game']['lang']) ? "checked" : "")?>  />
              Toutes
            </label>
            <label for="secondL">
              <input type="checkbox" id="secondL" name="lang[]" value="Français" <?=(!empty($_SESSION['list_game']['lang']) && in_array("Français", $_SESSION['list_game']['lang']) == "Français" ? "checked" : "")?> />
              <img src="../image/Flag_of_France.svg.png" alt="" /> Français
            </label>
            <label for="thirdL">
              <input type="checkbox" id="thirdL" name="lang[]" value="Anglais" <?=(!empty($_SESSION['list_game']['lang']) && in_array("Anglais", $_SESSION['list_game']['lang']) ? "checked" : "")?> />
              <img src="../image/Flag_of_the_United_Kingdom.svg.png" alt="" /> Anglais
            </label>
          </div>
        </div>
        <div class="multipleSelection">
          <div class="selectBox">
            <select>
              <option>Année de sortie</option>
            </select>
            <div class="overSelect"></div>
          </div>
          <div class="checkBoxes">
            <label for="firstD">
              <input type="checkbox" id="firstD" name="date[]" value="Tous" <?=(!isset($_SESSION['list_game']['date']) ? "checked" : "")?> />
              Toutes
            </label>
            <label for="secondD">
              <input type="checkbox" id="secondD" name="date[]" value="2023" <?=(!empty($_SESSION['list_game']['date']) && in_array(2023, $_SESSION['list_game']['date']) ? "checked" : "")?> />
              2023
            </label>
            <label for="thirdD">
              <input type="checkbox" id="thirdD" name="date[]" value="2022" <?=(!empty($_SESSION['list_game']['date']) && in_array(2022, $_SESSION['list_game']['date']) ? "checked" : "")?>/>
              2022
            </label>
            <label for="fourthD">
              <input type="checkbox" id="fourthD" name="date[]" value="2021" <?=(!empty($_SESSION['list_game']['date']) && in_array(2021, $_SESSION['list_game']['date']) ? "checked" : "")?>/>
              2021
            </label>
            <label for="fifthD">
              <input type="checkbox" id="fifthD" name="date[]" value="2020" <?=(!empty($_SESSION['list_game']['date']) && in_array(2020, $_SESSION['list_game']['date']) ? "checked" : "")?>/>
              2020
            </label>
            <label for="sixthD">
              <input type="checkbox" id="sixthD" name="date[]" value="2019" <?=(!empty($_SESSION['list_game']['date']) && in_array(2019, $_SESSION['list_game']['date']) ? "checked" : "")?>/>
              2019
            </label>
            <label for="seventhD">
              <input type="checkbox" id="seventhD" name="date[]" value="2018" <?=(!empty($_SESSION['list_game']['date']) && in_array(2018, $_SESSION['list_game']['date']) ? "checked" : "")?>/>
              2018
            </label>
            <label for="eighthD">
              <input type="checkbox" id="eighthD" name="date[]" value="2017" <?=(!empty($_SESSION['list_game']['date']) && in_array(2017, $_SESSION['list_game']['date']) ? "checked" : "")?>/>
              2017
            </label>
            <label for="ninthD">
              <input type="checkbox" id="ninthD" name="date[]" value="2016" <?=(!empty($_SESSION['list_game']['date']) && in_array(2016, $_SESSION['list_game']['date']) ? "checked" : "")?>/>
              2016
            </label>
            <label for="tenthD">
              <input type="checkbox" id="tenthD" name="date[]" value="2015" <?=(!empty($_SESSION['list_game']['date']) && in_array(2015, $_SESSION['list_game']['date']) ? "checked" : "")?>/>
              2015
            </label>
          </div>
        </div>
        <div class="multipleSelection">
          <div class="selectBox">
            <select>
              <option>Genres</option>
            </select>
            <div class="overSelect"></div>
          </div>
          <div class="checkBoxes">
            <label for="firstT">
              <input type="checkbox" id="firstT" name="tag[]" value="Tous"<?=(!isset($_SESSION['list_game']['tag']) ? "checked" : "")?>/>
              Tous
            </label>
            <?php foreach ($tags as $tag) { ?>
              <label for="<?= $tag['name'] ?>">
                <input type="checkbox" name="tag[]" id="<?= $tag['name'] ?>" value="<?= $tag['name'] ?>"<?=(!empty($_SESSION['list_game']['tag']) && in_array($tag['name'], $_SESSION['list_game']['tag']) ? "checked" : "")?>/> <?= $tag['name'] ?>
              </label> <?php
                      } ?>
          </div>
        </div>
      </form>
      <input id="reset" type="submit" value="Réinitialiser" onclick="resetFilters()">
      
    </div>
  </main>
  <?php
  require 'bottomHTML.php';
  ?>