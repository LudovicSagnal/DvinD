<?php
    $title = "Inscription ";
    $description = "Formulaire d'inscription.";
    // require './topHTML.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description?>"/>
    <title>Inscription</title>
    <link rel="stylesheet" href="../style/style.css?v=<?=date("H-i-s")?>">
    <link rel="stylesheet" href="../style/inscription.css?v=<?=date("H-i-s")?>">
    <link rel="icon" type="image/x-icon" href="../image/favicon-512x512.png">
    <script src="../script/user.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/avatar.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.4/iconify-icon.min.js" defer></script>
    <script src="../script/smart-nav.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/verif.js?v=<?=date("H-i-s")?>" defer></script>
    <script src="../script/search.js" defer></script>
</head>

<body>
    <header>
        <nav class="nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste_de_jeux.php" class="link">Liste de jeux</a>
            <a href="view_index.php" ><img src="../image/Logo NewD.svg" alt="lodo_DvinD" class="logo"></a>
            <iconify-icon class="hamburger" aria-label="Menu" icon="ci:hamburger" style="color: #fefafa;"></iconify-icon>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
        <div class="display-none" id="smart-nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste_de_jeux.php" class="link">Liste de jeux</a>
            <a href="view_contact.php" class="link">Contact</a>
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
                <?=isset($_SESSION["user"]) ? '<p class="show-pseudo">'.$_SESSION["user"]["username"].'</p>' : '<a href="view_inscription.php" class="create-profil" aria-label="bouton d\'inscription"><button>Inscription</button></a>'?>
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
        <form class="form-sign" action="../controllers/controller_inscription.php" method="post" enctype="multipart/form-data"> 
            <div>
                <label for="form_username">Pseudo</label>
                <input class="pseudo" type="text" name="form_username" aria-label="Votre pseudo" required>
            </div>  
            <div class="login-info">
                <div class="form-div">
                    <label for="form_email" id="lab-email" required>Email</label>
                    <input type="text" name="form_email" aria-label="entrez votre email" id="mail" class="invalid">
                    <label for="form_remail">Confirmez votre email</label>
                    <input type="text" name="form_remail" aria-label="Retapez votre email" id="remail" class="invalid">
                </div> 
                <div class="form-div">
                    <p class="message-to"></p>
                    <div class="dnone" id="explain-pass">
                        <p>Minimum : 8 caractères, une majuscule, une minuscule, un numéro et un caractère spécial (@ $ ! % * ? &)</p>
                    </div>
                    
                    <label for="form_password" required>Mot de passe&nbsp;<span><img src="../image/question.svg" alt="" class="question"></span></label>   
                    <input type="text" name="form_password" aria-label="Entrez votre mot de passe" id="pass" class="invalid">
                    <label for="form_repassword">Confirmez le mot de passe</label>
                    <input type="text" name="form_repassword" aria-label="Retapez votre mot de passe" id="repass" class="invalid">
                </div>
                <div class="avatar-preview-container form-div">
                    <div class="preview">
                        <img id="preview-selected-avatar" src="../image/avatar/user-default.svg" alt="" />
                    </div>
                    <label class="label-file" for="file-upload">Modifier votre avatar</label>
                    <input class="input-file" style="display: none;" type="file" name="form_image" aria-label="Fichier pour votre photo de profil" id="file-upload" accept="image/*" onchange="previewAvatar(event);" />
                </div>
            </div>      
            <div class="line"></div>     
            <h3>Informations personnelles</h3>
            <div class="personnal-info">
                <div class="form-div">
                    <label for="form_lastname">Nom</label>
                    <input type="text" name="form_lastname" aria-label="Votre nom de famille" required>
                    <label for="form_firstname">Prénom</label>
                    <input type="text" name="form_firstname" aria-label="Votre prénom" required>
                </div>
                <div class="form-div">
                    <label for="form_birthdate">Date de naissance</label>
                    <input type="date" name="form_birthdate" aria-label="Votre date de naissance" required>
                </div>
            </div>         
            <input type="submit" name="form_inscription" aria-label="Valider votre inscription" value="Créer mon profil" id="button" disabled>
        </form>
    </main>

 
<?php
    require './bottomHTML.php';
?>