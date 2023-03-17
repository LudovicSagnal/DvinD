<?php
    include("../models/connect.php");

    header('Content-Type: application/json');

    $reqS = $db->prepare('SELECT screenshots.url FROM screenshots
                        INNER JOIN games ON screenshots.game_id = games.id
                        WHERE games.id = :id;');
    $reqS->bindParam(":id", $_GET['id']);
    $reqS->execute();
    $screenshots = $reqS->fetchAll(PDO::FETCH_ASSOC);

    // die(json_encode(array(
    //     "game_img" => $screenshots["url"],
    //     "game_name" => $screenshots["name"]
    die(json_encode($screenshots));