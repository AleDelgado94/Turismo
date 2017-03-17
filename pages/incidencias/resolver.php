<?php


  $link = require("../connect_db.php");
  $id = $_POST['id_incidencia'];
  $resolucion = $_POST['resolv'];



  $consulta = "UPDATE incidencias SET resuelta = 1 WHERE id = ".$id.";";
  mysqli_query($link, $consulta);
  $consulta = "UPDATE incidencias SET resolucion = '".$resolucion."' WHERE id = ".$id.";";
  mysqli_query($link, $consulta);

  header("Location: incidencias.php");
 ?>
