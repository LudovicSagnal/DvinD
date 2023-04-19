<?php
    include_once '../models/connect.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../style/style.css?v=<?=date("H-i-s")?>">
    <link rel="stylesheet" href="../style/contact.css?v=<?=date("H-i-s")?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../image/favicon-512x512.png">
    <script src="../script/user.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.4/iconify-icon.min.js" defer></script>
    <script src="../script/smart-nav.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/showGame.js" defer></script>

</head>

<body>
    <header>
        <nav class="nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste_de_jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <iconify-icon class="hamburger" aria-label="menu" icon="ci:hamburger" style="color: #fefafa;"></iconify-icon>
            <a href="view_contact.php" class="active">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="display-none" id="smart-nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste_de_jeux.php" class="link">Liste de jeux</a>
            <a href="view_contact.php" class="active">Contact</a>
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

    <section class="main-contact">
        <div class="inform">
            <div class="info">
                <h3>A propos de DvinD</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam fuga illum quibusdam consequatur optio error totam quam ad omnis tempora dolorum porro delectus voluptatum, officia veritatis est quisquam quod odit!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, porro. Placeat accusamus ex, sequi, quia numquam asperiores vitae natus molestiae repellendus nulla ea facere rem ab dolor at quo sapiente.</p>
            </div>
            <form method="post" class="form-contact">
                <h2>Contactez-moi</h2>
                <div class="input-names">
                    <label for="name">Nom</label>
                    <input type="text" id="name" placeholder="Votre nom" aria-label="Votre nom">
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" placeholder="Votre prénom" aria-label="Votre prénom">
                </div>
                <label for="firstname">Email</label>
                <input type="text" class="input-mail" id="mail" placeholder="Votre e-mail" name="email" aria-label="Votre email" required>
                <label for="text">Votre message</label>
                <textarea id="text" name="message" aria-label="Votre message" required></textarea>
                <button type="submit" aria-label="envoyer email">Envoyer</button>
            </form>
            <form method="post" class="smart-form">
                <h2>Contactez-moi</h2>
                <label for="name">Nom</label>
                <input type="text" id="name" placeholder="Votre nom" aria-label="Votre nom">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" placeholder="Votre prénom" aria-label="Votre prénom">
                <label for="firstname">Email</label>
                <input type="text" class="input-mail" id="mail" placeholder="Votre e-mail" name="email" aria-label="Votre email" required>
                <label for="text">Votre message</label>
                <textarea id="text" name="message" aria-label="Votre message" required></textarea>
                <button type="submit" aria-label="envoyer email">Envoyer</button>
            </form>

        </div>
    </section>

<?php
    require './bottomHTML.php';
?>