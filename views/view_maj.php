<?php
    include("../models/connect.php");
    if(empty($_GET['id'])) {
        die("Veuillez choisir un utilisateur valide à éditer");
    }
    $req = $db->prepare("SELECT * FROM utilisateur WHERE id_utilisateur=:id_utilisateur;");
    $req->bindParam(":id_utilisateur", $_GET['id']);
    $req->execute();
    $utilisateur = $req->fetch(PDO::FETCH_ASSOC);    
?>

<fieldset>
    <legend>Mettre à jour</legend>
    <form method="post" action="../controllers/controller_admin.php">
        <input type="hidden" name="form_update" value="1">
        <input type="hidden" name="id_utilisateur" value="<?=$utilisateur['id_utilisateur']?>">
        <label>Nom:
            <input type="text" name="nom_utilisateur" value="<?=$utilisateur['nom_utilisateur']?>">
        </label>
        <br/>
        <label>Prénom:
            <input type="text" name="prenom_utilisateur" value="<?=$utilisateur['prenom_utilisateur']?>">
        </label>
        <br/>
        <label>E-mail:
            <input type="email" name="mail_utilisateur" value="<?=$utilisateur['mail_utilisateur']?>">
        </label>
        <br/>
        <label>Pseudo:
                <input type="text" name="pseudo_utilisateur" value="<?=$utilisateur['pseudo_utilisateur']?>">
            </label>
        <br/>
        <label>Mot de passe:
            <input type="password" name="password_utilisateur" value="">
        </label>
        <br/>
        <label>Image:
            <input type="file" name="url_utilisateur" value="<?=$utilisateur['url_utilisateur']?>">
        </label>
        <br/>
        <label>Date de naissance:
            <input type="date" name="naissance_utilisateur" value="<?=$utilisateur['naissance_utilisateur']?>">
        </label>
        <br/>
        <label>Rôle:
        <select name="id_role">
            <option value="0">Inscrit</option>
            <option value="1">Modérateur</option>
            <option value="2">Admin</option>
        </select>
        </label>
        <br/>
        <input type="submit" value="Mettre à jour">
    </form>
</fieldset>