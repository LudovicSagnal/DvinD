<?php
    include('../models/connect.php');

    if(!empty($_POST["form_inscription"])) {
        $success = false;

        $select = $db->prepare("SELECT email FROM utilisateur WHERE email=:email;");
        $select->bindParam(":email", $_POST["form_email"]);
        $select->execute();
        if(empty($select->fetch(PDO::FETCH_COLUMN))) {
            if (isset($_FILES['form_image'])) {
                $tmpName = $_FILES['form_image']['tmp_name'];
                $name = $_FILES['form_image']['name'];
                $size = $_FILES['form_image']['size'];
                $error = $_FILES['form_image']['error'];
                $fichier = move_uploaded_file($tmpName, "../image/avatar/$name");
            }      

            $insert = $db->prepare("INSERT INTO users(lastname, firstname, email, username, user_password, picture_url, birthdate)
                                    VALUES(:lastname, :firstname, :email, :username,  :user_password, ". 
                                    (!empty($name) ? ":picture_url" : 'DEFAULT') . ", :birthdate);");
            $insert->bindParam(":lastname", $_POST['form_nom']);
            $insert->bindParam(":firstname", $_POST['form_prenom']);
            $insert->bindParam(":email", $_POST['form_email']);
            $insert->bindParam(":username", $_POST['form_pseudo']);
            $user_password = password_hash($_POST['form_password'], PASSWORD_BCRYPT, array("cost" => 12));
            $insert->bindParam(":user_password", $user_password);
            if(!empty($name)) {
                $insert->bindParam(":picture_url", $name);
            }
            $insert->bindParam(":birthdate", $_POST['form_dob']);
            
            if($insert->execute()) {
                $select = $db->prepare("SELECT * FROM users WHERE email=:email;");
                $select->bindParam(":email", $_POST["form_email"]);
                $select->execute();
                $_SESSION['user'] = $select->fetch(PDO::FETCH_ASSOC);
                $success = true;
                
            }
            header("Location: ../views/view_index.php");
        }
        die(json_encode(array(
            "success" => $success
        )));
    }
    
    include('../views/view_inscription.php');
?>