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

  $fecha="";
  $num_mes="";

  if($mes=="Enero"){
    $num_mes="01";
  }
  else if($mes=="Febrero"){
    $num_mes="02";
  }
  else if($mes=="Marzo"){
    $num_mes="03";
  }
  else if($mes=="Abril"){
    $num_mes="04";
  }
  else if($mes=="Mayo"){
    $num_mes="05";
  }
  else if($mes=="Junio"){
    $num_mes="06";
  }
  else if($mes=="Julio"){
    $num_mes="07";
  }
  else if($mes=="Agosto"){
    $num_mes="08";
  }
  else if($mes=="Septiembre"){
    $num_mes="09";
  }
  else if($mes=="Octubre"){
    $num_mes="10";
  }
  else if($mes=="Noviembre"){
    $num_mes="11";
  }
  else if($mes=="Diciembre"){
    $num_mes="12";
  }

  $fecha="$year/$num_mes/01";
  echo "\n $fecha";
  $consulta = "INSERT INTO ocupacion_hoteles (hotel,ocupacion,mes,ano,fecha) VALUES ('". $hotel ."','". $ocupacion ."','".$mes."','".$year."','".$fecha."');";
  if(mysqli_query($link,$consulta)) {
    header("Location: ocupacion.php");
  }
  else{
    echo "Error en la insercion en la tabla";

  }
}

 ?>
