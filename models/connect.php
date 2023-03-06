<?php
    session_start();

    try {
        $db = new PDO('mysql:host=localhost;dbname=dvind;charset=utf8mb4', "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(PDOException $e) {
        $db = NULL;
        echo ("Erreur: " . $e->getMessage());
    }
?>

