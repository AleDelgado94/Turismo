<?php


  $link = require("../connect_db.php");
  $id = $_POST['id_observacion'];
  $resolucion = $_POST['eleminar_observacion'];
  $consulta = "DELETE FROM observaciones WHERE id = ".$id.";";
  mysqli_query($link,$consulta);


  header("Location: observaciones.php");
 ?>
