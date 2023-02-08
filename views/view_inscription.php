<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../style/style.css?v=<?=date("H-i-s")?>">
    <link rel="stylesheet" href="../style/inscription.css?v=<?=date("H-i-s")?>">
    <link rel="icon" type="image/x-icon" href="../image/favicon-512x512.png">
    <script src="../script/user.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/avatar.js?v=<?=date("H-i-s")?>" defer></script>
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
            <img src="../image/Loupe.svg" class="glass">
            <input type="text" placeholder="Rechercher ici" class="search">
            <div class="user-div">
                <img src="../image/avatar/User.svg" alt="" class="user">
            </div>
            <div id="overlay" class="login-modal-none"></div>
            <div class="display-none" id="modal-user">
                <img src="../image/cross-23.svg" alt="" class="cross" id="cross">
                <label for="login">Identifiant</label>
                <input type="text" id="login">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password">
                <button>Valider</button>
            </div>
            <div class="line-2"></div>
        </div>
    </header>
    <main>
        <form action="../controllers/controller_inscription.php" method="post" enctype="multipart/form-data"> 
            <label for="form_pseudo">Pseudo</label>
            <input type="text" name="form_pseudo" required>
            <div>
                <div class="form-div">
                    <label for="form_email" required>Email</label>
                    <input type="text" name="form_email">
                    <label for="form_remail">Confirmez votre email</label>
                    <input type="text" name="form_remail">
                </div> 
                <div class="form-div">
                    <label for="form_password" required>Mot de passe</label>
                    <input type="text" name="form_password">
                    <label for="form_repassword">Confirmez votre mot de passe</label>
                    <input type="text" name="form_repassword">
                </div>
                <div class="avatar-preview-container form-div">
                    <div class="preview">
                        <img id="preview-selected-avatar" src="../image/avatar/user-default.svg" />
                    </div>
                    <label class="label-file" for="file-upload">Modifier votre avatar</label>
                    <input class="input-file" type="file" name="form_image" id="file-upload" accept="image/*" onchange="previewAvatar(event);" />
                </div>
            </div>      
            <div class="line"></div>     
            <h3>Informations personnelles</h3>
            <div>
                <div class="form-div">
                    <label for="form_nom">Nom</label>
                    <input type="text" name="form_nom" required>
                    <label for="form_prenom">Prénom</label>
                    <input type="text" name="form_prenom" required>
                </div>
                <div class="form-div">
                    <label for="form_dob">Date de naissance</label>
                    <input type="date" name="form_dob" required>
                </div>
            </div>         
            <input type="submit" name="form_inscription" value="Créer mon profil" id="button">
        </form>
    </main>

 
</body>

</html>