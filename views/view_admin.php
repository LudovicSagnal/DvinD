<?php 
    include("../models/connect.php");
    $utilisateurs = $db->query('SELECT * FROM utilisateur')->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="../style/admin.css">
    <style>
        fieldset {
            width: 210px;
        }
    </style>
</head>
<body>
        <nav class="nav">
            <a href="view_index.php" class="link">Actualités</a>
            <a href="view_liste de jeux.php" class="link">Liste de jeux</a>
            <a href="view_contact.php" class="link">Contact</a>
            <a href="view_forum.php" class="link">Forum</a>
        </nav>
    <?php if(empty($utilisateurs)) { ?>
        <p>Aucun utilisateur n'est inscrit</p>
    <?php } else { ?>
    <main>

        <h2>Utilisateurs</h2>
        <table>
                <thead>
                    <tr>
                        <td>NOM</td>
                        <td>Prénom</td>
                        <td>E-mail</td>
                        <td>Pseudo</td>
                        <td>Mot de passe</td>
                        <td>Avatar</td>
                        <td>Date de naissance</td>
                        <td>Rôle <br> (1:modo ; 2:admin)</td>
                        <td>Edition</td>
                        <td>Suppression</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($utilisateurs as $utilisateur) { ?>
                    <tr>
                        <td><?=ucwords($utilisateur['nom_utilisateur'])?></td>
                        <td><?=ucfirst($utilisateur['prenom_utilisateur'])?></td>
                        <td><?=$utilisateur['mail_utilisateur']?></td>
                        <td><?=$utilisateur['pseudo_utilisateur']?></td>
                        <td><?=$utilisateur['password_utilisateur']?></td>
                        <td><?=$utilisateur['url_utilisateur']?></td>
                        <td><?=$utilisateur['naissance_utilisateur']?></td>
                        <td><?=$utilisateur['id_role']?></td>
                        <td>
                            <a href="../views/view_maj.php?id=<?=$utilisateur['id_utilisateur']?>">Editer</a>&nbsp;
                        </td>
                        <td>
                            <form method="POST" action="../controllers/controller_admin.php">
                                <input type="hidden" name="form_delete" value="1">
                                <input type="hidden" name="id_utilisateur" value="<?=$utilisateur['id_utilisateur']?>">
                                <button type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php } 
                } ?>

        <fieldset>
            <legend>Ajout</legend>
            <form action="../controllers/controller_admin.php" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="form_insert" value="1">
                <label>Nom:
                    <input type="text" name="nom_utilisateur">
                </label>
                <br/>
                <label>Prénom:
                    <input type="text" name="prenom_utilisateur">
                </label>
                <br/>
                <label>E-mail:
                    <input type="email" name="mail_utilisateur">
                </label>
                <br/>
                <label>Pseudo:
                    <input type="text" name="pseudo_utilisateur">
                </label>
                <br/>
                <label>Mot de passe:
                    <input type="password" name="password_utilisateur">
                </label>
                <br/>
                <label>Image:
                    <input type="file" name="url_utilisateur">
                </label>
                <br/>
                <label>Date de naissance:
                    <input type="date" name="naissance_utilisateur">
                </label>
                <br/>
                <input type="submit" value="Enregistrer">
            </form>
        </fieldset>
    </main>
</body>
</html>