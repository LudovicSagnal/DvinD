<?php
  include('../models/connect.php');

  header('Content-Type: application/json'); // Set the response type

  $searchValue = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '';

  $reqGames = $db->prepare("SELECT id, name FROM games WHERE name LIKE :searchValue ORDER BY name ASC");
  $reqGames->bindParam(':searchValue', $searchValue);
  $reqGames->execute();

  $games = $reqGames->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($games); // Serialize the $games array to a JSON string, then send the response

  // include('../models/connect.php');

  // $q = ($_GET['q']);

  // $con = mysqli_connect("localhost","root","","dvind");

  // $sql = ('SELECT id, name FROM games WHERE name LIKE "%'.$q.'%" ORDER BY name DESC');
  // $result = mysqli_query($con, $sql);

  // while($row = mysqli_fetch_array($result)) {

  // echo '<li><a href="view_fiche de jeu.php?id='.$row['id'].'">' . $row['name'] . '</a></li>';

  // }
  // mysqli_close($con);
?>