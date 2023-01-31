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
</head>

<body>
    <header>
        <nav class="nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <a href="view_contact.php" class="link">Contact</a>
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

    <section class="main">
        <h2>Lone Ruin</h2>
        <div class="main-game">
            <div class="platform">
                <p>Windows</p>
                <p>Switch</p>
            </div>
            <div class="main-middle">
                <div class="fiche-jeu">
                    <img src="../image//slide/loneRuin.jpg" alt="">
                    <div class="fiche-info">
                        <p>Développeur : Cuddle Monster Games</p>
                        <p>Sortie : 12 janvier 2023</p>
                        <p>Multijoeur : non</p>
                        <p>Genre(s) : Action</p>
                    </div>
                </div>
                <div class="info-media">
                    <img src="../image/lone-ruin-screen.jpg" alt="">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/wne67Zmesns" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                

            </div>





        </div>
    </section>

    <footer class="foot">
    </footer>
    
</body>

</html>