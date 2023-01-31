<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="../style/style.css?v=<?=date("H-i-s")?>">
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
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="active">Forum</a>
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


    <main>
    </main>
    
    <footer class="foot">
    </footer>


</body>

</html>