<?php
    include('../models/connect.php');

    $_SESSION['list_game']['page'] = isset($_POST['page']) ? $_POST['page'] : 1;
    $limit = 20;
    $offset = ($_SESSION['list_game']['page'] - 1) * $limit;

    if (!empty($_POST['filter']) || !empty($_SESSION['list_game'])) {
        $_SESSION['list_game']['platform'] = $_POST['platform'];
        $_SESSION['list_game']['lang'] = $_POST['lang'];
        $_SESSION['list_game']['date'] = $_POST['date'];
        $_SESSION['list_game']['tag'] = $_POST['tag'];
        
        // Requête préparée
        $sql = 'SELECT DISTINCT games.name, games.id 
                FROM games ';
        if(isset($_SESSION['list_game']['platform']) && !in_array('Tous', $_SESSION['list_game']['platform'])) {
            $sql .= '
            INNER JOIN games_platforms ON games_platforms.game_id = games.id
            INNER JOIN platforms ON platforms.id = games_platforms.platform_id ';
        }
        if(isset($_SESSION['list_game']['lang']) && !in_array('Tous', $_SESSION['list_game']['lang'])) {
            $sql .= '
            INNER JOIN games_languages ON games_languages.game_id = games.id
            INNER JOIN languages ON languages.id = games_languages.language_id ';
        }
        if(isset($_SESSION['list_game']['tag']) && !in_array('Tous', $_SESSION['list_game']['tag'])) {
            $sql .= '
            INNER JOIN games_tags ON games_tags.game_id = games.id
            INNER JOIN tags ON tags.id = games_tags.tag_id ';
        }
        $sql .= ' WHERE 1 ';

        if(isset($_SESSION['list_game']['platform']) && !in_array('Tous', $_SESSION['list_game']['platform'])) {
            $sql .= ' AND platforms.name IN("' . implode('", "', $_SESSION['list_game']['platform']) . '")';
        } else {
            unset($_SESSION['list_game']['platform']);
        }
        if(isset($_SESSION['list_game']['lang']) && !in_array('Tous', $_SESSION['list_game']['lang'])) {
            $sql .= ' AND languages.name IN("' . implode('", "', $_SESSION['list_game']['lang']) . '")';
        } else {
            unset($_SESSION['list_game']['lang']);
        }
        if(isset($_SESSION['list_game']['date']) && !in_array('Tous', $_SESSION['list_game']['date'])) {
            $sql .= ' AND YEAR(release_date) IN(' . implode(',', $_SESSION['list_game']['date']) . ')';
        } else {
            unset($_SESSION['list_game']['date']);
        }
        if(isset($_SESSION['list_game']['tag']) && !in_array('Tous', $_SESSION['list_game']['tag'])) {
            $sql .= ' AND tags.name IN("' . implode('", "', $_SESSION['list_game']['tag']) . '")';
        } else {
            unset($_SESSION['list_game']['tag']);
        }
        $sql .= ' ORDER BY games.name ';
        $query = $db->prepare($sql);
        $query->execute();
        $nbResult = $query->rowCount();
        
        $sql .= ' LIMIT '. $limit . ' OFFSET ' . $offset;
        $query = $db->prepare($sql);
        $query->execute();
        $finalQuery = $query->fetchAll(PDO::FETCH_ASSOC);
    
        die(json_encode(array("finalQuery" => $finalQuery, "nbResult" => $nbResult)));
    }
    
    // if(isset($_GET['submit_platform'])){
    //     if(!empty($_GET['platform'])) {
    //         if (in_array('Toutes', $_GET['platform'])) {
    //             $checkedPlatforms = $db->query('SELECT * FROM games GROUP BY id ORDER By name ASC')->fetchAll();
    //             var_dump($checkedPlatforms);
    //         }
    //         else  {
    //             $conditionP = "";
    //             foreach($_GET['platform'] as $index => $value) {
    //                 if ($index == 0) {
    //                     $conditionP .= '"'.$value.'"';
    //                 } else {
    //                     $conditionP .= ' OR platforms.name = "'. $value .'"';
    //                 }
    //             };
    //             $checkedPlatforms = $db->prepare('SELECT DISTINCT games.name, games.id FROM games
    //                                         INNER JOIN games_platforms ON games_platforms.game_id = games.id
    //                                         INNER JOIN platforms ON platforms.id = games_platforms.platform_id
    //                                         WHERE platforms.name = '.$conditionP.'ORDER BY games.name');
    //             $checkedPlatforms->execute();
    //             $platformList = $checkedPlatforms->fetchAll(PDO::FETCH_ASSOC);
    //             var_dump($platformList);
    //             // die(json_encode($platformList));
    //         }
    //     }
    // }
    // if(isset($_GET['submit_lang'])){
    //     if(!empty($_GET['lang'])) {
    //         if (in_array('Toutes', $_GET['lang'])) {
    //             $checkedLangs = $db->query('SELECT * FROM games GROUP BY id ORDER By name ASC')->fetchAll();
    //         }
    //         else  {
    //             $conditionL = "";
    //             foreach($_GET['lang'] as $index => $value) {
    //                 if ($index == 0) {
    //                     $conditionL .= '"'.$value.'"';
    //                 } else {
    //                     $conditionL .= ' OR languages.name = "'. $value .'"';
    //                 }
    //             };
    //             $checkedLangs= $db->prepare('SELECT DISTINCT games.name, games.id FROM games
    //                                         INNER JOIN games_languages ON games_languages.game_id = games.id
    //                                         INNER JOIN languages ON languages.id = games_languages.language_id
    //                                         WHERE languages.name = '.$conditionL.'ORDER BY games.name');
    //             $checkedLangs->execute();
    //             $langList = $checkedLangs->fetchAll(PDO::FETCH_ASSOC);
    //             var_dump($langList);
    //         }
    //     }
    // }
    // if(isset($_GET['submit_date'])){
    //     if(!empty($_GET['date'])) {
    //         if (in_array('Toutes', $_GET['date'])) {
    //             $checkedDates = $db->query('SELECT * FROM games GROUP BY id ORDER By name ASC')->fetchAll();
    //         }
    //         else  {
    //             $conditionD = "";
    //             foreach($_GET['date'] as $index => $value) {
    //                 if ($index == 0) {
    //                     $conditionD .= '"'.$value.'"';
    //                 } else {
    //                     $conditionD .= ' OR YEAR(release_date) = "'. $value .'"';
    //                 }
    //             };
    //             $checkedDates = $db->prepare('SELECT DISTINCT games.name, games.id FROM games
    //                                         WHERE YEAR(release_date) = '.$conditionD.'ORDER BY games.name');
    //             $checkedDates->execute();
    //             $dateList = $checkedDates->fetchAll(PDO::FETCH_ASSOC);
    //             var_dump($dateList);
    //         }
    //     }
    // }
    // if(isset($_GET['submit_tag'])){
    //     if(!empty($_GET['tag'])) {
    //         if (in_array('Tous', $_GET['tag'])) {
    //             $tagList = $db->query('SELECT * FROM games GROUP BY id ORDER By name ASC')->fetchAll();
    //         }
    //         else  {
    //             $conditionT = "";
    //             foreach($_GET['tag'] as $index => $value) {
    //                 if ($index == 0) {
    //                     $conditionT .= '"'.$value.'"';
    //                 } else {
    //                     $conditionT .= ' OR tags.name = "'. $value .'"';
    //                 }
    //             };
    //             $checkedTags= $db->prepare('SELECT DISTINCT games.name, games.id FROM games
    //                                             INNER JOIN games_tags ON games_tags.game_id = games.id
    //                                             INNER JOIN tags ON tags.id = games_tags.tag_id
    //                                             WHERE tags.name = '.$conditionT.'ORDER BY games.name');
    //             $checkedTags->execute();
    //             $tagList = $checkedTags->fetchAll(PDO::FETCH_ASSOC);
    //             var_dump($tagList);
    //         }
    //     }
    // }
    // include('../views/view_liste_de_jeux.php');
    // header("Location: ../views/view_liste_de_jeux.php");
?>