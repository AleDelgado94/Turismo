<?php


  $link = require("../connect_db.php");
  $id = $_POST['id_incidencia'];

  $consulta = "UPDATE incidencias SET resuelta = 1 WHERE id = ".$id.";";
  mysqli_query($link, $consulta);

  header("Location: incidencias.php");
 ?>
