<?php

use Detection\MobileDetect;

    include_once '../models/connect.php';
    $req = $db->prepare('SELECT * FROM games  
                        WHERE games.id=:id;'); //penser à faire un INNER JOIN pour developers
    $req->bindParam(":id", $_GET['id']);
    $req->execute();
    $games = $req->fetchAll(PDO::FETCH_ASSOC);
    $title = "Actualités";
    $description = "Actualités des jeux indépendants.";

    $searchGame = $db->query('SELECT id, name FROM games');
    if(isset($_GET['query']) AND !empty($_GET['query'])) {
       $query = htmlspecialchars($_GET['query']);
       $searchGame = $db->query('SELECT id, name FROM games WHERE name LIKE "%'.$query.'%" ORDER BY name DESC');
    }
    $req2 = $db->query('SELECT * from news
                    ORDER BY date DESC;');
    $req2->execute();
    $news = $req2->fetchAll(PDO::FETCH_ASSOC);
    $req3 = $db->query('SELECT * from news
                    ORDER BY date DESC
                    LIMIT 1;');
    $req3->execute();
    $lastNews = $req3->fetch(PDO::FETCH_ASSOC);
    $req4 = $db->query('SELECT id, date, title from news
                    ORDER BY date DESC;');
    $req4->execute();
    $news = $req4->fetchAll(PDO::FETCH_ASSOC);

require './topHTML.php';
?>

    <header>
        <nav class="nav" role="navigation">
            <a href="view_index.php" class="active">Actualités</a>
            <a href="view_liste_de_jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <iconify-icon class="hamburger" icon="ci:hamburger" style="color: #fefafa;"></iconify-icon>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="display-none" id="smart-nav">
            <a href="view_index.php" class="active">Actualités</a>
            <a href="view_liste_de_jeux.php" class="link">Liste de jeux</a>
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
        <div class="fil-actu">
            <h2 class="fil-title">Actualités</h2>
            <div class="inner-fil">
                <div class="fil-main">
                    <div class="actu-main"><h3 class="actu-title"><?=$lastNews['title'] ?></h3>
                        <div class="actu-content"><?=$lastNews['content']?></div>
                        <p class="published">Publiée le <span id="actu-day"><?=DateTime::createFromFormat('Y-m-d H:i:s', $lastNews['date'])->format('d M Y')?></span> à <time id="actu-time"><?=DateTime::createFromFormat('Y-d-m H:i:s', $lastNews['date'])->format('h\hi')?></time></p>
                    </div>             
                </div>             
                <div class="fil-list"> 
                    <h3 class="actu-title-list">Les news du jour</h3>
                    <div class="smart-list">
                       <?php
                       include_once '../models/MobileDetect.php';
                       $model = new MobileDetect();
                        $current_date = null;
                        foreach ($news as $new) {
                            if ($current_date != DateTime::createFromFormat('Y-m-d H:i:s', $new['date'])->format('d.m.Y')) {
                                $current_date = DateTime::createFromFormat('Y-m-d H:i:s', $new['date'])->format('d.m.Y');
                                echo "<h3 class='news-day'> Actualités du " . $current_date . "</h3>";
                            }
                            if($model->isMobile()) { 
                                $titleLength = 50; 
                            } elseif($model->isTablet()) {
                                $titleLength = 120; 
                            } else {
                                $titleLength = 19; 
                            }
                            echo "<h4 onclick='initNews(". $new['id'].")'><time>" .DateTime::createFromFormat('Y-d-m H:i:s', $new['date'])->format('h\hi ')."</time>" . mb_strimwidth($new['title'], 0, $titleLength, "...") . "</h4>";
                        } ?>
                    </div>          
                </div>
            </div>
        </div>
        <div class="right-actu">
            <div class="head-slide">
                <div id="previous"><</div>
                <h2>Les prochaines sorties</h2>
                <div id="next">></div>
            </div>
            <div class="slider-actu">
                <a id="slider-link" href=""><img src="" alt="" id="slider-pictures"></a>
                <h2 id="slider-date">Date</h2>
            </div>
        </div>
    </main>
    <script src="../script/slider.js"></script>
    <script>initSlider()</script>

<?php
    require './bottomHTML.php';
?>