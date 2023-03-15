<?php
    include('../models/connect.php');
    include('../views/view_profil.php');

    if(!empty($_POST["form_modification"])) {
        $success = false;

        $select = $db->prepare("SELECT email FROM users WHERE email=:email;");
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

        // } elseif(!empty($_POST['form_update'])) {
        //     $sql = 'UPDATE users
        //             SET lastname=:lastname,
        //             firstname=:firstname,
        //             email=:email,
        //             username=:username,' . 
        //             (!empty($name) ? "picture_url=:picture_url, " : '') . '
        //             birthdate=:birthdate,
        //             role_id=:role_id ';
        //     if (!empty($_POST['user_password'])) {
        //         $sql .= ', user_password=:user_password ';
        //     }
        //     $sql .= ' WHERE id=:id;';
        //     $req = $db->prepare($sql);
        //     $req->bindParam(":lastname", $_POST['lastname']);
        //     $req->bindParam(":firstname", $_POST['firstname']);
        //     $req->bindParam(":email", $_POST['email']);
        //     $req->bindParam(":username", $_POST['username']);
        //     if (!empty($_POST['user_password'])) {
        //         $user_password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
        //         $req->bindParam(":user_password", $user_password);
        //     }
        //     if(!empty($name)) {
        //         $req->bindParam(":picture_url", $name);
        //     }
        //     $req->bindParam(":birthdate", $_POST['birthdate']);
        //     $req->bindParam(":role_id", $_POST['role_id']);
        //     $req->bindParam(":id", $_POST['id']);
        //     $req->execute();
            
        //     if($insert->execute()) {
        //         $success = true;
        //         $_SESSION['user'] = $user;
        //         header("Location: ../views/view_index.php");
        //     }
        // }
        // die(json_encode(array(
        //     "success" => $success
        // )));
    }














?>