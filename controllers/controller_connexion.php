<?php
    include('../models/connect.php');

    if(!empty($_POST["form_connexion"])) {
        $select = $db->prepare("SELECT * FROM utilisateur WHERE mail_utilisateur=:mail_utilisateur;");
        $select->bindParam(":mail_utilisateur", $_POST["form_email"]);
        $select->execute();
        // La fonction rowCount() permet de donner le nombre de lignes pour une requête
        if($select->rowCount() === 1) {
            $user = $select->fetch(PDO::FETCH_ASSOC);
            // Permet de vérifier le hash par rapport au mot de passe saisi
            if(password_verify($_POST["form_password"], $user['password_utilisateur'])) {
                // On affecte les données de notre utilisateur dans notre super globale $_SESSION
                $_SESSION['user'] = $user;
            }
        } else {
            // La fonction unset permet de vider une variable, ici nous vidons les valeurs pour la clé “user”
            // echo "erreur du mdp";
            unset($_SESSION['user']);
        }
    }
    header("Location: ../views/view_index.php");
?>