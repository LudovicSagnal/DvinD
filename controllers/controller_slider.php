<?php
    include("../models/connect.php");

    header('Content-Type: application/json');

    $reqS = $db->query('SELECT * FROM games
                        WHERE release_date > NOW()
                        ORDER BY release_date ASC
                        LIMIT 5;');
    $reqS->execute();
    $sliderFutureRelease = $reqS->fetchAll(PDO::FETCH_ASSOC);

    die(json_encode($sliderFutureRelease));