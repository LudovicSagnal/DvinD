<?php
  $q = ($_GET['q']);

  $con = mysqli_connect("localhost","root","","dvind");

  $sql = ('SELECT id, name FROM games WHERE name LIKE "%'.$q.'%" ORDER BY name DESC');
  $result = mysqli_query($con, $sql);

  while($row = mysqli_fetch_array($result)) {

  echo '<li><a href="view_fiche de jeu.php?id='.$row['id'].'">' . $row['name'] . '</a></li>';

  }
  mysqli_close($con);
?>