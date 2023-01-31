<?php
    include('../models/connect.php');
    include('../controllers/controller_connexion.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <img src="..image/avatar/<?=$_SESSION['user']['url_utilisateur']?>" alt="">
    
</body>
</html>