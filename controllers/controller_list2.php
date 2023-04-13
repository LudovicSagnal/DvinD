<?php
include('../models/connect.php');
if (!empty($_POST['filtrer'])) {
    // Requête préparée
    $sql = 'SELECT DISTINCT games.name, games.id 
            FROM games ';
    if(!in_array('Tous', $_POST['platform'])) {
        $sql .= '
            INNER JOIN games_platforms ON games_platforms.game_id = games.id
            INNER JOIN platforms ON platforms.id = games_platforms.platform_id ';
        }
    if(!in_array('Tous', $_POST['lang'])) {
        $sql .= '
            INNER JOIN games_languages ON games_languages.game_id = games.id
            INNER JOIN languages ON languages.id = games_languages.language_id ';
        }
    if(!in_array('Tous', $_POST['tag'])) {
        $sql .= '
            INNER JOIN games_tags ON games_tags.game_id = games.id
            INNER JOIN tags ON tags.id = games_tags.tag_id ';
    }
    $sql .= ' WHERE 1 ';
    if(!in_array('Tous', $_POST['platform'])) {
        $sql .= ' AND platforms.name IN("' . implode('", "', $_POST['platform']) . '")';
    }
    if(!in_array('Tous', $_POST['lang'])) {
        $sql .= ' AND languages.name IN("' . implode('", "', $_POST['lang']) . '")';
    }
    if(!in_array('Tous', $_POST['date'])) {
        $sql .= ' AND YEAR(release_date) IN(' . implode(',', $_POST['date']) . ')';
    }
    if(!in_array('Tous', $_POST['tag'])) {
        $sql .= ' AND tags.name IN("' . implode('", "', $_POST['tag']) . '")';
    }
    $sql .= ' ORDER BY games.name ';

    // die(var_dump($sql));
    $finalQuery = $db->prepare($sql);
    $finalQuery->execute();
    $test = $finalQuery->fetchAll(PDO::FETCH_ASSOC);

    die(json_encode($test));
}
