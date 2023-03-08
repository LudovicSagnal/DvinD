<?php
    include("../models/connect.php");
    $users = $db->query('SELECT * FROM users')->fetchAll();
    $games = $db->query('SELECT * FROM games')->fetchAll(); // LEFT JOIN tables !
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="icon" type="image/x-icon" href="../image/favicon-512x512.png">
    <script src="../script/crud.js" defer></script>
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
    <?php if (empty($users)) { ?>
        <p>Aucun utilisateur n'est inscrit</p>
    <?php } else { ?>
        <main>
            <section class="user-crud">
                <h2>Utilisateurs</h2>
                <div>
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
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td><?= $user['lastname'] ?></td>
                                    <td><?= $user['firstname'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['user_password'] ?></td>
                                    <td><?= $user['picture_url'] ?></td>
                                    <td><?= $user['birthdate'] ?></td>
                                    <td><?= $user['role_id'] ?></td>
                                    <td>
                                        <a href="../views/view_maj.php?id=<?= $user['id'] ?>">Editer</a>&nbsp;
                                    </td>
                                    <td>
                                        <form method="POST" action="../controllers/controller_admin.php">
                                            <input type="hidden" name="form_delete" value="1">
                                            <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                                            <button type="submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>

                    <fieldset>
                        <legend>Ajout</legend>
                        <form action="../controllers/controller_admin.php" method="post" enctype='multipart/form-data'>
                            <input type="hidden" name="form_insert" value="1">
                            <label>Nom:
                                <input type="text" name="lastname">
                            </label>
                            <label>Prénom:
                                <input type="text" name="firstname">
                            </label>
                            <label>E-mail:
                                <input type="email" name="email">
                            </label>
                            <label>Pseudo:
                                <input type="text" name="username">
                            </label>
                            <label>Mot de passe:
                                <input type="password" name="user_password">
                            </label>
                            <label>Image:
                                <input type="file" name="picture_url">
                            </label>
                            <label>Date de naissance:
                                <input type="date" name="birthdate">
                            </label>
                            <input type="submit" value="Enregistrer">
                        </form>
                    </fieldset>
                </div>
            </section>

            <div class="line"></div>

            <section class="game-crud">
                <h2>Jeux</h2>

                <div>
                    <?php if (empty($games)) { ?>
                        <p>Aucun jeux en base de données</p>
                    <?php } else { ?>
                        <table>
                            <thead>
                                <tr>
                                    <td>NOM</td>
                                    <td>Steam ID</td>
                                    <td>Dévelopeur</td>
                                    <td>Description</td>
                                    <td>Date de sortie</td>
                                    <td>Edition</td>
                                    <td>Suppression</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($games as $game) { ?>
                                    <tr>
                                        <td><?= $game['name'] ?></td>
                                        <td><?= $game['steam_appid'] ?></td>
                                        <!-- <td><?= $game['developpeur_jeux'] ?></td> -->
                                        <td><?= $game['description'] ?></td>
                                        <td><?= $game['release_date'] ?></td>
                                        <td>
                                            <a href="../views/view_maj.php?id=<?= $game['id'] ?>">Editer</a>&nbsp;
                                        </td>
                                        <td>
                                            <form method="POST" action="../controllers/controller_admin.php">
                                                <input type="hidden" name="form_delete" value="1">
                                                <input type="hidden" name="id_game" value="<?= $game['id'] ?>">
                                                <button type="submit">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>

                    <fieldset>

                        <legend>Ajout</legend>
                        <form action="../controllers/controller_admin.php" method="post" enctype='multipart/form-data'>
                            <input type="hidden" name="form_insert" value="1">
                            <label>Nom:
                                <input type="text" name="name">
                            </label>
                            <label>Steam ID:
                                <input type="text" name="steam_appid">
                            </label>
                            <!-- <label>Développeur:
                                <input type="text" name="developpeur_jeux">
                            </label> -->
                            <label>Description:
                                <textarea name="" id="" cols="30" rows="10" name="description" style="resize: none;"></textarea>
                            </label>
                            <label>Date de sortie:
                                <input type="date" name="release_date">
                            </label>
                            <input type="submit" value="Enregistrer">
                        </form>
                    </fieldset>
                </div>
            </section>
            <div class="line"></div>

        </main>
</body>

</html>