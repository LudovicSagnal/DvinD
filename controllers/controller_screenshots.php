<?php
    include("../models/connect.php");

    header('Content-Type: application/json');

    $reqS = $db->prepare('SELECT games.name, screenshots.url FROM games
                        INNER JOIN screenshots ON screenshots.game_id = games.id
                        WHERE games.id = :id;');
    $reqS->bindParam(":id", $_GET['id']);
    $reqS->execute();
    $screenshots = $reqS->fetchAll(PDO::FETCH_ASSOC);

    die(json_encode($screenshots));