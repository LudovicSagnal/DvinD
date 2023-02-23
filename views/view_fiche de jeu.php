<?php
    include_once '../models/connect.php';
    $req = $db->prepare('SELECT *
                        FROM jeux j  
                        LEFT JOIN avoir a ON a.id_jeux = j.id_jeux 
                        LEFT JOIN tag t ON t.id_tag = a.id_tag
                        LEFT JOIN plateforme p ON p.id_plateforme = a.id_plateforme
                        LEFT JOIN langue l ON l.id_langue = a.id_langue
                        LEFT JOIN attribuer ab ON ab.id_jeux = j.id_jeux
                        LEFT JOIN asset ass ON ass.id_asset = ab.id_asset
                        WHERE j.id_jeux=:id_jeux;'); //penser à faire un INNER JOIN
    $req->bindParam(":id_jeux", $_GET['id']);
    $req->execute();
    $jeux = $req->fetch(PDO::FETCH_ASSOC);    
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
            <img src="../image/Loupe.svg" class="glass" alt="">
            <input type="text" placeholder="Rechercher ici" class="search">
            <div class="user-div">
            <img src="../image/avatar/<?=isset($_SESSION['user']) ? $_SESSION['user']['url_utilisateur'] : "User.svg"?>" alt="" class="user">
                <?=isset($_SESSION["user"]) ? '<p class="show-pseudo">'.$_SESSION["user"]["pseudo_utilisateur"].'</p>' : '<a href="view_inscription.php" class="create-profil"><button>Inscription</button></a>'?>
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
        <h2><?=($jeux['nom_jeux'])?></h2>
        <div class="main-game">
            <div class="platform">
                <p>Windows</p>
                <p>Switch</p>
            </div>
            <div class="main-middle">
                <div class="fiche-jeu">
                    <img src="../image//slide/loneRuin.jpg" alt="">
                    <div class="fiche-info">
                        <p>Développeur : <?=($jeux['developpeur_jeux'])?></p>
                        <p>Sortie : <?=($jeux['sortie_jeux'])?></p>
                        <p>Genre(s) : Action <?=($jeux['nom_tag'])?></p>
                    </div>
                </div>
                <div class="info-media">
                    <img src="../image/lone-ruin-screen.jpg" alt="">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/wne67Zmesns" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <p class="desc"><?=($jeux['desc_jeux'])?></p>
                

            </div>





        </div>
    </section>
<?php
    require './bottomHTML.php';
?>