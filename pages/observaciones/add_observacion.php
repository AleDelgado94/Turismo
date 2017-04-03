<?php

session_start();
$link = require("../connect_db.php");

if(isset($_SESSION['usuario'])) {
 $username = $_SESSION['usuario'];

  $observacion = "";



  if(isset($_POST['observacion'])) $observacion = $_POST['observacion'];


  $consulta = "INSERT INTO observaciones (observacion) VALUES ('". $observacion ."');";
  if(mysqli_query($link,$consulta)) {
    header("Location: observaciones.php");
  }
}

 ?>
