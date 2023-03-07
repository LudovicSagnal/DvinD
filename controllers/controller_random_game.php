<?php
include("../models/connect.php");

$game = $db->query("SELECT * FROM jeux j
                LEFT JOIN attribuer ab ON ab.id_jeux = j.id_jeux
                LEFT JOIN asset ass ON ass.id_asset = ab.id_asset ORDER BY RAND() LIMIT 1;")->fetch(PDO::FETCH_ASSOC);

die(json_encode(array(
    "game_title" => $game["nom_jeux"],
    "game_img" => $game["url_asset"],
    "game_id" => $game["id_jeux"]
)));