<?php
    include('../models/connect.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css?v=<?=date("H-i-s")?>">
    <link rel="stylesheet" href="../style/inscription.css?v=<?=date("H-i-s")?>">
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

    <main>
        <form action="../controllers/controller_modification.php" method="post" enctype="multipart/form-data"> 
                <label for="form_pseudo">Pseudo</label>
                <input type="text" name="form_pseudo" value="<?=$_SESSION['user']['username']?>" required>
                <div>
                    <div class="form-div">
                        <label for="form_email">Email</label>
                        <input type="text" name="form_email" value="<?=$_SESSION['user']['email']?>" required>
                        <label for="form_remail">Confirmez votre email</label>
                        <input type="text" name="form_remail" value="<?=$_SESSION['user']['email']?>">
                    </div> 
                    <div class="form-div">
                        <label for="form_password">Mot de passe</label>
                        <input type="password" name="form_password">
                        <label for="form_repassword">Confirmez votre mot de passe</label>
                        <input type="password" name="form_repassword">
                    </div>
                    <div class="avatar-preview-container form-div">
                        <div class="preview">
                            <img id="preview-selected-avatar" src="../image/avatar/<?=$_SESSION['user']['picture_url']?>" />
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
                        <input type="text" name="form_nom" value="<?=$_SESSION['user']['lastname']?>" required>
                        <label for="form_prenom">Prénom</label>
                        <input type="text" name="form_prenom" value="<?=$_SESSION['user']['firstname']?>" required>
                    </div>
                    <div class="form-div">
                        <label for="form_dob">Date de naissance</label>
                        <input type="date" name="form_dob" value="<?=$_SESSION['user']['birthdate']?>" required>
                    </div>
                </div>         
                <input type="submit" name="form_modification" value="Valider les changements" id="button">
            </form>

    </main>
    
</body>
</html>