<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="script/user.js" defer></script>

</head>

<body>
    <header>
        <nav class="nav">
            <a href="index.php" class="link">Actualités</a>
            <a href="Liste de jeux.php" class="link">Liste de jeux</a>
            <a href="index.php" ><img src="image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <a href="Contact.php" class="active">Contact</a>
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