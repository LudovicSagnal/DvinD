<?php
    include('../models/connect.php');
    include('../views/view_inscription.php');

    if(!empty($_POST["form_inscription"])) {
        $success = false;

        $select = $db->prepare("SELECT mail_utilisateur FROM utilisateur WHERE mail_utilisateur=:mail_utilisateur;");
        $select->bindParam(":mail_utilisateur", $_POST["form_email"]);
        $select->execute();
        if(empty($select->fetch(PDO::FETCH_COLUMN))) {
            if (isset($_FILES['form_image'])) {
                $tmpName = $_FILES['form_image']['tmp_name'];
                $name = $_FILES['form_image']['name'];
                $size = $_FILES['form_image']['size'];
                $error = $_FILES['form_image']['error'];
                $fichier = move_uploaded_file($tmpName, "../image/avatar/$name");
            }      

            $insert = $db->prepare("INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, pseudo_utilisateur, password_utilisateur, url_utilisateur, naissance_utilisateur)
                                    VALUES(:nom_utilisateur, :prenom_utilisateur, :mail_utilisateur, :pseudo_utilisateur,  :password_utilisateur, :url_utilisateur, :naissance_utilisateur);");
            $insert->bindParam(":nom_utilisateur", $_POST['form_nom']);
            $insert->bindParam(":prenom_utilisateur", $_POST['form_prenom']);
            $insert->bindParam(":mail_utilisateur", $_POST['form_email']);
            $insert->bindParam(":pseudo_utilisateur", $_POST['form_pseudo']);
            $user_password = password_hash($_POST['form_password'], PASSWORD_BCRYPT, array("cost" => 12));
            $insert->bindParam(":password_utilisateur", $user_password);
            $insert->bindParam(":url_utilisateur", $name);
            $insert->bindParam(":naissance_utilisateur", $_POST['form_dob']);
            
            if($insert->execute()) {
                $success = true;
                $_SESSION['user'];
                header("Location: ../views/view_index.php");
            }
        }
        die(json_encode(array(
            "success" => $success
        )));
    }
?>