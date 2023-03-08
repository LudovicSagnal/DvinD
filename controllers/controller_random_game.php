<?php
include("../models/connect.php");

$game = $db->query("SELECT * FROM games
                    ORDER BY RAND() LIMIT 1;")->fetch(PDO::FETCH_ASSOC);

die(json_encode(array(
    "game_title" => $game["name"],
    "game_img" => $game["picture_url"],
    "game_id" => $game["id"]
)));