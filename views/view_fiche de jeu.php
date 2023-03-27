<?php
    include_once '../models/connect.php';

    $req = $db->query("SET lc_time_names = 'fr_FR';");
    $req = $db->prepare('SELECT *, DATE_FORMAT(release_date, "%d %M %Y") AS date FROM games
                        WHERE games.id = :id;');                   
    $req->bindParam(":id", $_GET['id']);
    $req->execute();
    $game = $req->fetch(PDO::FETCH_ASSOC);

    function RemoveSpecialChar($str) {
        $res = str_replace( array( `'\', '/', ':' ,'"',
        '*' , '|', '<', '>', '?' `), '', $str);
        return $res;
    }
    $cleanName = RemoveSpecialChar($game['name']);
    
    $req2 = $db->prepare('SELECT tags.name FROM games
                        INNER JOIN games_tags ON games_tags.game_id = games.id
                        INNER JOIN tags ON tags.id = games_tags.tag_id
                        WHERE games.id = :id;');
    $req2->bindParam(":id", $_GET['id']);
    $req2->execute();
    $gameTags = $req2->fetchAll(PDO::FETCH_ASSOC);
    $req3 = $db->prepare('SELECT platforms.name FROM games
                        INNER JOIN games_platforms ON games_platforms.game_id = games.id
                        INNER JOIN platforms ON platforms.id = games_platforms.platform_id
                        WHERE games.id = :id;');
    $req3->bindParam(":id", $_GET['id']);
    $req3->execute();
    $gamePlatforms = $req3->fetchAll(PDO::FETCH_ASSOC);
    $req4 = $db->prepare('SELECT languages.name FROM games
                        INNER JOIN games_languages ON games_languages.game_id = games.id        
                        INNER JOIN languages ON languages.id = games_languages.language_id   
                        WHERE games.id = :id;');
    $req4->bindParam(":id", $_GET['id']);
    $req4->execute();
    $gameLangs = $req4->fetchAll(PDO::FETCH_ASSOC);
    $req5 = $db->prepare('SELECT developers.name FROM games
                        INNER JOIN games_developers ON games_developers.game_id = games.id        
                        INNER JOIN developers ON developers.id = games_developers.developer_id   
                        WHERE games.id = :id;');
    $req5->bindParam(":id", $_GET['id']);
    $req5->execute();
    $gameDevs = $req5->fetchAll(PDO::FETCH_ASSOC);
    $req6 = $db->prepare('SELECT screenshots.url FROM screenshots
                        INNER JOIN games ON screenshots.game_id = games.id
                        WHERE games.id = :id;');
    $req6->bindParam(":id", $_GET['id']);
    $req6->execute();
    $gameScreenshots = $req6->fetchAll(PDO::FETCH_ASSOC);
    $devString = "";
    $tagString="";
    $langString = "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche du jeu</title>
    <link rel="stylesheet" href="../style/style.css?v=<?=date("H-i-s")?>">
    <link rel="stylesheet" href="../style/fiche.css?v=<?=date("H-i-s")?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../image/favicon-512x512.png">
    <script src="../script/user.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.4/iconify-icon.min.js" defer></script>
    <script src="../script/smart-nav.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/search.js?v=<?=date("H-i-s")?>" defer></script>
</head>

<body>
    <header>
        <nav class="nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <iconify-icon class="hamburger" icon="ci:hamburger" style="color: #fefafa;"></iconify-icon>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="display-none" id="smart-nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
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

    <section class="main">
        <h2><?=($game['name'])?></h2>
        <div class="main-game">
            <div class="platform">
                <?php foreach ($gamePlatforms as $platform) {
                    echo('<p>'.$platform['name'].'</p>');
                } ?>
            </div>
            <div class="main-middle">
                <div class="fiche-jeu">
                    <img class="game-picture" src="../image//jeux/<?=($game['picture_url'])?>" alt="">
                    <div class="fiche-info">
                        <p>Développeur(s) : <?php foreach ($gameDevs as $dev) {
                                        $devString .= $dev['name'] . ", ";
                                    }
                                        $devWithoutComma = substr($devString, 0, -2);
                                    echo($devWithoutComma);
                                    ?></p>
                        <p>Sortie : <?php if($game['date'] == null) {
                                              echo ($game['future_release']);
                                              }else {
                                                echo ($game['date']);
                                              }?></p>
                        <p>Genre(s) : <?php foreach ($gameTags as $tag) {
                                        $tagString .= $tag['name'] . ", ";
                                    }
                                        $tagWithoutComma = substr($tagString,0, -2);
                                        echo($tagWithoutComma);
                                    ?></p>
                        <p>Langues : <?php foreach ($gameLangs as $lang) {
                                        $langString .= $lang['name'] . ", ";
                                    }
                                        $langsWithoutComma = substr($langString, 0, -2);
                                        echo ($langsWithoutComma);
                                    ?></p>
                        <a href="https://store.steampowered.com/app/<?= ($game['steam_appid']) ?>" target="_blank"><img class="steam-icon" src="../image/steam-icon.svg" alt=""><img class="target-icon" src="../image/target_blank.png" alt=""></a>
                    </div>
                </div>
                <div class="info-media">
                    <div class="slider-screen">
                        <div id="previous-screen"><</div>
                            <img id="game-screen" src="../image/screenshots/<?=$cleanName."/".$gameScreenshots[0]['url'] ?>" alt="">
                        <div id="next-screen">></div>
                    </div>     
                    <iframe width="560" height="315" src="<?= ($game['video_url']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <p class="desc"><?=($game['description'])?></p>
                
            </div>

        </div>
    </section>
    <script src="../script/slideScreenshots.js"></script>
    <script>initSliderScreenshots(<?=$game['id']?>)</script>
<?php
    require './bottomHTML.php';
?>
