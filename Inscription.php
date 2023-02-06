<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/inscription.css">
    <script src="script/user.js" defer></script>
</head>

<body>
    <header>
        <nav class="nav">
            <a href="index.php" class="link">Actualités</a>
            <a href="Liste de jeux.php" class="link">Liste de jeux</a>
            <a href="index.php" ><img src="image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <a href="Contact.php" class="link">Contact</a>
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
    <main>
        <form action="">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo">
            <label for="mail">Email</label>
            <input type="text" name="mail">
            <label for="re-mail">Confirmez votre email</label>
            <input type="text" name="remail">
            <label for="password">Mot de passe</label>
            <input type="text">
            <label for="re-password">Confirmez votre mot de passe</label>
            <input type="text">
            <label for="name">Nom</label>
            <input type="text" name="name">
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname">
            <label for="dob">Date de naissance</label>
            <input type="date" name="dob">
        </form>
    </main>
 
</body>

</html>