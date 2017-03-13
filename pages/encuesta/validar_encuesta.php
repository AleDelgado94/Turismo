<?php


session_start();
$link = require("../connect_db.php");

if(isset($_SESSION['usuario'])) {
 $username = $_SESSION['usuario'];

 $fecha = "";
 $tipo_consulta = "";
 $hora = "";
 $oficina = "";
 $edad = "";
 $sexo = "";
 $nacionalidad = "";
 $grupo_actual = "";
 $n_personas = $_POST['n_personas'];


  if(isset($_POST['fecha'])) $fecha = $_POST['fecha'];;
  if(isset($_POST['encuesta'])) $tipo_consulta = $_POST['encuesta'];
  if(isset($_POST['horas'])) $hora = $_POST['horas'];
  if(isset($_POST['oficina'])) $oficina = $_POST['oficina'];


  for ($i=1; $i <= $n_personas; $i++) {


    $age = "edad" . $i;
    $sex = "sexo" . $i;

    $edad = $_POST[$age];
    $sexo = $_POST[$sex];

    echo $edad;
    echo "\n".$sexo;


    //$visita_consulta = "INSERT INTO visita (grupo, consulta, hora, fecha, sexo, edad, nacionalidad, residencia, oficina) VALUES ( '".$grupo_actual."', '".$tipo_consulta."', '".$hora."', '".$fecha."', '".."', '12', 'fdsgdf', 'si', 'fgsfdg') "


  }


  //RECOGEMOS GRUPO MÁS RECIENTE DE LA BASE DE DATOS
  $consulta_grupo = "SELECT MAX(grupo) as max_group FROM visita;";
  $max_group = mysqli_query($link, $consulta_grupo) or die(mysqli_error($link));

  if($grupo_arr = mysqli_fetch_array($max_group)){
    $grupo = $grupo_arr['max_group'];
    $grupo_actual = $grupo + 1;
  }












}



?>
