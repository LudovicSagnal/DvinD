<?php
    include("../models/connect.php");

    header('Content-Type: application/json');

    $req = $db->prepare('SELECT * from news
                    LEFT JOIN news_games ON news_games.news_id = news.id
                    LEFT JOIN games ON games.id = news_games.game_id
                    WHERE news.id = :id;');
    $req->bindParam(":id", $_GET['id']);
    $req->execute();
    $news = $req->fetch(PDO::FETCH_ASSOC);

    die(json_encode($news));