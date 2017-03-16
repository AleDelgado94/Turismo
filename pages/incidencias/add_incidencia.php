<?php

session_start();
$link = require("../connect_db.php");

if(isset($_SESSION['usuario'])) {
 $username = $_SESSION['usuario'];

  $titulo = "";
  $oficina = "";
  $fecha = "";
  $lugar = "";
  $direccion = "";
  $descripcion = "";


  if(isset($_POST['titulo'])) $titulo = $_POST['titulo'];
  if(isset($_POST['oficinas'])) $oficina = $_POST['oficinas'];
  if(isset($_POST['fecha'])) $fecha = $_POST['fecha'];
  if(isset($_POST['lugares'])) $lugar = $_POST['lugares'];
  if(isset($_POST['direccion'])) $direccion = $_POST['direccion'];
  if(isset($_POST['descripcion'])) $descripcion = $_POST['descripcion'];



  $consulta = "INSERT INTO incidencias (titulo, fecha, lugar, direccion, descripcion, oficina) VALUES ('". $titulo ."', '". $fecha ."', '".$lugar."', '".$direccion."', '".$descripcion."', '".$oficina."');";
  mysqli_query($link, $consulta) or die(mysqli_error($link));

  header("Location: incidencias.php");


}

 ?>
