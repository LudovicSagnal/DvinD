<?php
    include("../models/connect.php");
    $users = $db->query('SELECT * FROM users')->fetchAll();
    $games = $db->query('SELECT *, games.name AS game_name, developers.name AS dev FROM games
                        INNER JOIN games_developers ON games_developers.game_id = games.id
                        INNER JOIN developers ON developers.id = games_developers.developer_id')->fetchAll();
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
    <style>
        fieldset {
            width: 210px;
        }
    </style>
</head>

<body>
    <nav class="nav">
        <a href="view_index.php" class="link">Actualités</a>
        <a href="view_liste_de_jeux.php" class="link">Liste de jeux</a>
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
                                <td>Rôle <br> (2:modo ; 3:admin)</td>
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
                                        <td><?= $game['game_name'] ?></td>
                                        <td><?= $game['steam_appid'] ?></td>
                                        <td><?= $game['dev'] ?></td>
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
                            <input type="hidden" name="form_insert_game" value="1">
                            <label>Nom:
                                <input type="text" name="name">
                            </label>
                            <label>Steam ID (null ok):
                                <input type="number" name="steam_appid">
                            </label>
                            <label>Développeur:
                                <input type="text" name="developer">
                            </label>
                            <ul>Tags:
                                <!-- <select name="tags">
                                    <option value="1">Action</option>
                                    <option value="2">Aventure</option>
                                    <option value="3">Combat</option>
                                    <option value="4">Gestion</option>
                                    <option value="5">Horreur</option>
                                    <option value="6">Plateforme</option>
                                    <option value="7">RPG</option>
                                    <option value="8">Sport</option>
                                    <option value="9">Stratégie</option>
                                </select> -->
                                <li><input type="checkbox" value="1"> Action</li>
                                <li><input type="checkbox" value="2"> Aventure</li>
                                <li><input type="checkbox" value="3"> Combat</li>
                                <li><input type="checkbox" value="4"> Gestion</li>
                                <li><input type="checkbox" value="5"> Horreur</li>
                                <li><input type="checkbox" value="6"> Plateforme</li>
                                <li><input type="checkbox" value="7"> RPG</li>
                                <li><input type="checkbox" value="8"> Sport</li>
                                <li><input type="checkbox" value="9"> Stratégie</li>
                                </ul>
                            <!-- <label>Plateformes:
                                <select name="platforms">
                                    <option value="1">Windows</option>
                                    <option value="2">Mac</option>
                                    <option value="3">Linux</option>
                                </select>
                            </label> -->
                            <ul>Plateformes:
                                <li><input type="checkbox" value="1"> Windows</li>
                                <li><input type="checkbox" value="2"> Mac</li>
                                <li><input type="checkbox" value="3"> Linux</li>
                            </ul>
                            <label>Description:
                                <textarea name="" id="" cols="30" rows="10" name="description" style="resize: none;"></textarea>
                            </label>
                            <label>Date de sortie (null ok):
                                <input type="date" name="release_date">
                            </label>
                            <label>Annonce (null ok):
                                <input type="text" name="future_release">
                            </label>
                            <label>Image/Jaquette:
                                <input type="file" name="picture_url">
                            </label>
                            <label>Url de la vidéo:
                                <input type="text" name="video_url">
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