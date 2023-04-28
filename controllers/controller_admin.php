<?php
    include("../models/connect.php");
    $select = $db->prepare("SELECT email FROM users WHERE email=:email;");
    $select->bindParam(":email", $_POST["email"]);
    $select->execute();
    if(empty($select->fetch(PDO::FETCH_COLUMN))) {
        // Verification de l'avatar
        if (isset($_FILES['picture_url']) && !empty($_FILES['picture_url']['tmp_name'])) {
            $tmpName = $_FILES['picture_url']['tmp_name'];
            $arr = explode('.', $_FILES['picture_url']['name']);
            $name = $arr[0] . "-" . uniqid() . "." . $arr[1]; // Générer un id unique pour chaque image - éviter l'écrasement d'anciennes images
            $size = $_FILES['picture_url']['size'];
            $error = $_FILES['picture_url']['error'];
            $fichier = move_uploaded_file($tmpName, "../image/avatar/$name");
        }
        // Ajout d'un utilisateur
        if(!empty($_POST['form_insert'])) {
            $sql = 'INSERT INTO users (lastname, firstname, email, username, user_password,
                    picture_url, birthdate, role_id)
                    VALUES(:lastname, :firstname, :email, :username, :user_password, '. 
                                        (!empty($name) ? ":picture_url" : 'DEFAULT') . ', :birthdate, DEFAULT);';
            $req = $db->prepare($sql);
            $req->bindParam(":lastname", $_POST['lastname']);
            $req->bindParam(":firstname", $_POST['firstname']);
            $req->bindParam(":email", $_POST['email']);
            $req->bindParam(":username", $_POST['username']);
            //hash du mot de passe
            $user_password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
            $req->bindParam(":user_password", $user_password);
            if(!empty($name)) {
                $req->bindParam(":picture_url", $name);
            }
            $req->bindParam(":birthdate", $_POST['birthdate']);
            $req->execute();
    
        // Update d'un utilisateur       
        } elseif(!empty($_POST['form_update'])) {
            $sql = 'UPDATE users
                    SET lastname=:lastname,
                    firstname=:firstname,
                    email=:email,
                    username=:username,' . 
                    (!empty($name) ? "picture_url=:picture_url, " : '') . '
                    birthdate=:birthdate,
                    role_id=:role_id ';
            if (!empty($_POST['user_password'])) {
                $sql .= ', user_password=:user_password ';
            }
            $sql .= ' WHERE id=:id;';
            $req = $db->prepare($sql);
            $req->bindParam(":lastname", $_POST['lastname']);
            $req->bindParam(":firstname", $_POST['firstname']);
            $req->bindParam(":email", $_POST['email']);
            $req->bindParam(":username", $_POST['username']);
            if (!empty($_POST['user_password'])) {
                $user_password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
                $req->bindParam(":user_password", $user_password);
            }
            if(!empty($name)) {
                $req->bindParam(":picture_url", $name);
            }
            $req->bindParam(":birthdate", $_POST['birthdate']);
            $req->bindParam(":role_id", $_POST['role_id']);
            $req->bindParam(":id", $_POST['id']);
            $req->execute();

        // Suppression d'un compte utilisateur
        } elseif(!empty($_POST['form_delete'])) {
            $sql = 'DELETE FROM users WHERE id=:id;';
            $req = $db->prepare($sql);
            $req->bindParam(":id", $_POST['id_user']);
            $req->execute();
        }
        header("Location: ../views/view_admin.php"); 
    }
    die(json_encode(array(
        "success" => $success
    )));
?>