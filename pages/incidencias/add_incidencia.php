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
  $email = "";


  if(isset($_POST['titulo'])) $titulo = $_POST['titulo'];
  if(isset($_POST['oficinas'])) $oficina = $_POST['oficinas'];
  if(isset($_POST['fecha'])) $fecha = $_POST['fecha'];
  if(isset($_POST['lugares'])) $lugar = $_POST['lugares'];
  if(isset($_POST['direccion'])) $direccion = $_POST['direccion'];
  if(isset($_POST['descripcion'])) $descripcion = $_POST['descripcion'];
  if(isset($_POST['email'])) $email = $_POST['email'];



  $consulta = "INSERT INTO incidencias (titulo, fecha, lugar, direccion, descripcion, oficina, email) VALUES ('". $titulo ."', '". $fecha ."', '".$lugar."', '".$direccion."', '".$descripcion."', '".$oficina."', '".$email."');";
  if(mysqli_query($link, $consulta)){
/*
    $para = $email;
    $titulo_correo = "Incidencia Ayuntamiento Guía de Isora: " . $titulo . "\n";
    $mensaje = "La incidencia: " . $descripcion . "\n"
    $mensaje .= "Con fecha " . date("d-m-Y");
    $mensaje .= " ha sido notificada. Nos pondremos en contacto cuando se haya solucionado.\nGracias.\n\nNo responda a este mensaje.";

    $headers = "From: alejandrodelgadomartel@gmail.com" . "\r\n" .
    "CC: alejandrodelgadomartel@gmail.com";

    mail($para, $titulo_correo, $mensaje, $headers);


    echo "Llega aquí";

*/

  }

  header("Location: incidencias.php");


}

 ?>
