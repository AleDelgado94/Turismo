<?php


session_start();

if(isset($_SESSION['usuario'])) {
 $username = $_SESSION['usuario'];

 $fecha = "";
 $tipo_consulta = "";
 $hora = "";
 $oficina = "";
 $edad = "";
 $sexo = "";
 $nacionalidad = "";


  if(isset($_POST['fecha'])) $fecha = $_POST['fecha'];;
  if(isset($_POST['encuesta'])) $tipo_consulta = $_POST['encuesta'];
  if(isset($_POST['horas'])) $hora = $_POST['horas'];
  if(isset($_POST['oficina'])) $oficina = $_POST['oficina'];




  echo $oficina;

}



?>
