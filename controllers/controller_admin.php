<?php
    include("../models/connect.php");
    $select = $db->prepare("SELECT mail_utilisateur FROM utilisateur WHERE mail_utilisateur=:mail_utilisateur;");
    $select->bindParam(":mail_utilisateur", $_POST["form_insert"]);
    $select->execute();
    if (isset($_FILES['url_utilisateur']) && !empty($_FILES['url_utilisateur']['tmp_name'])) {
        $tmpName = $_FILES['url_utilisateur']['tmp_name'];
        $arr = explode('.', $_FILES['url_utilisateur']['name']);
        $name = $arr[0] . "-" . uniqid() . "." . $arr[1];
        $size = $_FILES['url_utilisateur']['size'];
        $error = $_FILES['url_utilisateur']['error'];
        $fichier = move_uploaded_file($tmpName, "../image/avatar/$name");
    }

    if(!empty($_POST['form_insert'])) {
        $sql = 'INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, pseudo_utilisateur, password_utilisateur, url_utilisateur, naissance_utilisateur, id_role)
                VALUES(:nom_utilisateur, :prenom_utilisateur, :mail_utilisateur, :pseudo_utilisateur, :password_utilisateur, '. 
                                    (!empty($name) ? ":url_utilisateur" : 'DEFAULT') . ', :naissance_utilisateur, DEFAULT);';
        $req = $db->prepare($sql);
        $req->bindParam(":nom_utilisateur", $_POST['nom_utilisateur']);
        $req->bindParam(":prenom_utilisateur", $_POST['prenom_utilisateur']);
        $req->bindParam(":mail_utilisateur", $_POST['mail_utilisateur']);
        $req->bindParam(":pseudo_utilisateur", $_POST['pseudo_utilisateur']);
        $password_utilisateur = password_hash($_POST['password_utilisateur'], PASSWORD_BCRYPT);
        $req->bindParam(":password_utilisateur", $password_utilisateur);
        if(!empty($name)) {
            $req->bindParam(":url_utilisateur", $name);
        }
        $req->bindParam(":naissance_utilisateur", $_POST['naissance_utilisateur']);
        $req->execute();
        $color = "green;";
        $message = "Insertion effectuée";
        


    } elseif(!empty($_POST['form_update'])) {
        $sql = 'UPDATE utilisateur
                SET nom_utilisateur=:nom_utilisateur,
                prenom_utilisateur=:prenom_utilisateur,
                mail_utilisateur=:mail_utilisateur,
                pseudo_utilisateur=:pseudo_utilisateur,
                url_utilisateur=:url_utilisateur,
                naissance_utilisateur=:naissance_utilisateur,
                id_role=:id_role ';
        if (!empty($_POST['password_utilisateur'])) {
            $sql .= ', password_utilisateur=:password_utilisateur ';
        }
        $sql .= ' WHERE id_utilisateur=:id_utilisateur;';
        $req = $db->prepare($sql);
        $req->bindParam(":nom_utilisateur", $_POST['nom_utilisateur']);
        $req->bindParam(":prenom_utilisateur", $_POST['prenom_utilisateur']);
        $req->bindParam(":mail_utilisateur", $_POST['mail_utilisateur']);
        $req->bindParam(":pseudo_utilisateur", $_POST['pseudo_utilisateur']);
        if (!empty($_POST['password_utilisateur'])) {
            $password_utilisateur = password_hash($_POST['password_utilisateur'], PASSWORD_BCRYPT);
            $req->bindParam(":password_utilisateur", $password_utilisateur);
        }
        $req->bindParam(":url_utilisateur", $_POST['url_utilisateur']);
        $req->bindParam(":naissance_utilisateur", $_POST['naissance_utilisateur']);
        $req->bindParam(":id_role", $_POST['id_role']);
        $req->bindParam(":id_utilisateur", $_POST['id_utilisateur']);
        $req->execute();
    
        $color = "orange;";
        $message = "Mise à jour effectuée";

    } elseif(!empty($_POST['form_delete'])) {
        $sql = 'DELETE FROM utilisateur WHERE id_utilisateur=:id_utilisateur;';
        $req = $db->prepare($sql);
        $req->bindParam(":id_utilisateur", $_POST['id_utilisateur']);
        $req->execute();
       
        $color = "red;";
        $message = "Suppression effectuée";
    }

    
    header("Location: ../views/view_admin.php");
    
?>