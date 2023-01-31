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

</head>

<body>
    <header>
        <nav class="nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <a href="view_contact.php" class="active">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="bottom-nav">
            <div class="line-1"></div>
            <img src="../image/Loupe.svg" class="glass">
            <input type="text" placeholder="Rechercher ici" class="search">
            <div class="user-div">
                <img src="../image/User.svg" alt="" class="user">
                <a href="view_inscription.php" class="create-profil"><button>S'inscrire ici</button></a>
            </div>
            <div id="overlay" class="login-modal-none"></div>
            <div class="display-none" id="modal-user">
                <img src="../image/cross-23.svg" alt="" class="cross" id="cross">
                <label for="login">Identifiant</label>
                <input type="text" id="login">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password">
                <button>Valider</button>
                <a href="view_inscription.php" class="create-profil-modal">S'inscrire ici</a>
            </div>
            <div class="line-2"></div>
        </div>
    </header>

    <section class="main-contact">
        <div class="inform">
            <div class="info">

            </div>
            <form>
                <h2>Contactez-moi</h2>
                <div class="input-names">
                    <label for="name">Nom</label>
                    <input type="text" id="name" placeholder="Votre nom">
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" placeholder="Votre prénom">
                </div>
                <input type="text" class="input-mail" id="mail" placeholder="Votre e-mail">
                <label for="text">Votre message</label>
                <textarea id="text"></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </section>

    <footer class="foot">
    </footer>



</body>

</html>