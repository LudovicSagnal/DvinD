<?php
include("../models/connect.php");
$utilisateurs = $db->query('SELECT * FROM utilisateur')->fetchAll();
$jeux = $db->query('SELECT * FROM jeux')->fetchAll();

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
    <?php if (empty($utilisateurs)) { ?>
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
                            <?php foreach ($utilisateurs as $utilisateur) { ?>
                                <tr>
                                    <td><?= $utilisateur['nom_utilisateur'] ?></td>
                                    <td><?= $utilisateur['prenom_utilisateur'] ?></td>
                                    <td><?= $utilisateur['mail_utilisateur'] ?></td>
                                    <td><?= $utilisateur['pseudo_utilisateur'] ?></td>
                                    <td><?= $utilisateur['password_utilisateur'] ?></td>
                                    <td><?= $utilisateur['url_utilisateur'] ?></td>
                                    <td><?= $utilisateur['naissance_utilisateur'] ?></td>
                                    <td><?= $utilisateur['id_role'] ?></td>
                                    <td>
                                        <a href="../views/view_maj.php?id=<?= $utilisateur['id_utilisateur'] ?>">Editer</a>&nbsp;
                                    </td>
                                    <td>
                                        <form method="POST" action="../controllers/controller_admin.php">
                                            <input type="hidden" name="form_delete" value="1">
                                            <input type="hidden" name="id_utilisateur" value="<?= $utilisateur['id_utilisateur'] ?>">
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
                                <input type="text" name="nom_utilisateur">
                            </label>
                            <br />
                            <label>Prénom:
                                <input type="text" name="prenom_utilisateur">
                            </label>
                            <br />
                            <label>E-mail:
                                <input type="email" name="mail_utilisateur">
                            </label>
                            <br />
                            <label>Pseudo:
                                <input type="text" name="pseudo_utilisateur">
                            </label>
                            <br />
                            <label>Mot de passe:
                                <input type="password" name="password_utilisateur">
                            </label>
                            <br />
                            <label>Image:
                                <input type="file" name="url_utilisateur">
                            </label>
                            <br />
                            <label>Date de naissance:
                                <input type="date" name="naissance_utilisateur">
                            </label>
                            <br />
                            <input type="submit" value="Enregistrer">
                        </form>
                    </fieldset>
                </div>
            </section>

            <div class="line"></div>

            <section class="game-crud">
                <h2>Jeux</h2>

                <div>
                    <?php if (empty($jeux)) { ?>
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
                                    <td>Source</td>
                                    <td>Edition</td>
                                    <td>Suppression</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jeux as $jeu) { ?>
                                    <tr>
                                        <td><?= ($jeu['nom_jeux']) ?></td>
                                        <td><?= $jeu['id_steam_jeux'] ?></td>
                                        <td><?= ($jeu['developpeur_jeux']) ?></td>
                                        <td><?= iconv("", "utf-8", $jeu['desc_jeux']) // TODO: a changer
                                            ?></td>
                                        <td><?= iconv("", "utf-8", $jeu['sortie_jeux']) ?></td>
                                        <td><?= $jeu['source_jeux'] ?></td>
                                        <td>
                                            <a href="../views/view_maj.php?id=<?= $jeu['id_jeux'] ?>">Editer</a>&nbsp;
                                        </td>
                                        <td>
                                            <form method="POST" action="../controllers/controller_admin.php">
                                                <input type="hidden" name="form_delete" value="1">
                                                <input type="hidden" name="id_jeux" value="<?= $jeu['id_jeux'] ?>">
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
                                <input type="text" name="nom_jeux">
                            </label>
                            <br />
                            <label>Steam ID:
                                <input type="text" name="id_steam_jeux">
                            </label>
                            <br />
                            <label>Développeur:
                                <input type="text" name="developpeur_jeux">
                            </label>
                            <br />
                            <label>Description:
                                <textarea name="" id="" cols="30" rows="10" name="desc_jeux" style="resize: none;"></textarea>
                            </label>
                            <br />
                            <label>Date de sortie:
                                <input type="date" name="sortie_jeux">
                            </label>
                            <br />
                            <label>Source:
                                <input type="number" name="source_jeux">
                            </label>
                            <br />
                            <input type="submit" value="Enregistrer">
                        </form>
                    </fieldset>
                </div>
            </section>
            <div class="line"></div>

        </main>
</body>

</html>