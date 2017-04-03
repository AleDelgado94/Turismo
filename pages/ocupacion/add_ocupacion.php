<?php

session_start();
$link = require("../connect_db.php");

if(isset($_SESSION['usuario'])) {
  $username = $_SESSION['usuario'];
  $hotel = $_POST['hotel'][0];
  $mes = $_POST['mes'][0];
  $year = $_POST['year'][0];
  $ocupacion = $_POST['ocupacion'];
  echo $hotel;
  echo $mes;
  echo $year;
  echo $ocupacion;

  $consulta = "INSERT INTO ocupacion_hoteles (hotel,ocupacion,mes,ano) VALUES ('". $hotel ."','". $ocupacion ."','".$mes."','".$year."');";
  if(mysqli_query($link,$consulta)) {
    header("Location: ocupacion.php");
  }
  else{
    echo "Error en la insercion en la tabla";

  }
}

 ?>
