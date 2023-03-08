<?php
    include("../models/connect.php");
    if(empty($_GET['id'])) {
        die("Veuillez choisir un utilisateur valide à éditer");
    }
    $req = $db->prepare("SELECT * FROM users WHERE id=:id;");
    $req->bindParam(":id", $_GET['id']);
    $req->execute();
    $user = $req->fetch(PDO::FETCH_ASSOC);    
?>

<fieldset>
    <legend>Mettre à jour</legend>
    <form method="post" action="../controllers/controller_admin.php">
        <input type="hidden" name="form_update" value="1">
        <input type="hidden" name="id" value="<?=$user['id']?>">
        <label>Nom:
            <input type="text" name="lastname" value="<?=$user['lastname']?>">
        </label>
        <br/>
        <label>Prénom:
            <input type="text" name="firstname" value="<?=$user['firstname']?>">
        </label>
        <br/>
        <label>E-mail:
            <input type="email" name="email" value="<?=$user['email']?>">
        </label>
        <br/>
        <label>Pseudo:
                <input type="text" name="username" value="<?=$user['username']?>">
            </label>
        <br/>
        <label>Mot de passe:
            <input type="password" name="user_password" value="">
        </label>
        <br/>
        <label>Image:
            <input type="file" name="picture_url" value="<?=$user['picture_url']?>">
        </label>
        <br/>
        <label>Date de naissance:
            <input type="date" name="birthdate" value="<?=$user['birthdate']?>">
        </label>
        <br/>
        <label>Rôle:
        <select name="role_id">
            <option value="0">Inscrit</option>
            <option value="1">Modérateur</option>
            <option value="2">Admin</option>
        </select>
        </label>
        <br/>
        <input type="submit" value="Mettre à jour">
    </form>
</fieldset>