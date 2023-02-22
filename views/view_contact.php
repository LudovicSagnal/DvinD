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

</head>

<body>
    <header>
        <nav class="nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <iconify-icon class="hamburger" icon="ci:hamburger" style="color: #fefafa;"></iconify-icon>
            <a href="view_contact.php" class="active">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="display-none" id="smart-nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_contact.php" class="active">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </div>
        <div class="bottom-nav">
            <div class="line-1"></div>
            <img src="../image/Loupe.svg" class="glass">
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

    <section class="main-contact">
        <div class="inform">
            <div class="info">

            </div>
            <form method="post" class="form-contact">
                <h2>Contactez-moi</h2>
                <div class="input-names">
                    <label for="name">Nom</label>
                    <input type="text" id="name" placeholder="Votre nom">
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" placeholder="Votre prénom">
                </div>
                <label for="firstname">Email</label>
                <input type="text" class="input-mail" id="mail" placeholder="Votre e-mail" name="email" required>
                <label for="text">Votre message</label>
                <textarea id="text" name="message" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
            <form method="post" class="smart-form">
                <h2>Contactez-moi</h2>
                <label for="name">Nom</label>
                <input type="text" id="name" placeholder="Votre nom">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" placeholder="Votre prénom">
                <label for="firstname">Email</label>
                <input type="text" class="input-mail" id="mail" placeholder="Votre e-mail" name="email" required>
                <label for="text">Votre message</label>
                <textarea id="text" name="message" required></textarea>
                <button type="submit">Envoyer</button>
            </form>
            <?php
            if (isset($_POST['message'])) {
                $retour = mail('DvinD@laposte.net', 'Envoi depuis la page Contact', '', $_POST['email']);
                if($retour)
                    echo '<p>Votre message a bien été envoyé.</p>';
            }
            ?>
        </div>
    </section>

<?php
    require './bottomHTML.php';
?>