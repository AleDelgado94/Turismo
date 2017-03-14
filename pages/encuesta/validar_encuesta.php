<?php


session_start();
$link = require("../connect_db.php");

if(isset($_SESSION['usuario'])) {
 $username = $_SESSION['usuario'];

 $grupo_actual = "";


 //RECOGEMOS GRUPO MÁS RECIENTE DE LA BASE DE DATOS
 $consulta_grupo = "SELECT MAX(grupo) as max_group FROM visita;";
 $max_group = mysqli_query($link, $consulta_grupo) or die(mysqli_error($link));

 if($grupo_arr = mysqli_fetch_array($max_group)){
   $grupo = $grupo_arr['max_group'];
   $grupo_actual = $grupo + 1;
 }

 echo $grupo_actual;



 $fecha = "";
 $tipo_consulta = "";
 $hora = "";
 $oficina = "";
 $edad = "";
 $sexo = "";
 $nacionalidad = "";

 $n_personas = $_POST['n_personas'];





//

/*switch($_POST['submit'] ) {
    //case 'send':
    default:*/


      if(isset($_POST['fecha'])) $fecha = $_POST['fecha'];;
      if(isset($_POST['encuesta'])) $tipo_consulta = $_POST['encuesta'];
      if(isset($_POST['horas'])) $hora = $_POST['horas'];
      if(isset($_POST['oficina'])) $oficina = $_POST['oficina'];

      echo $_POST['fecha'];


    //...
  //  break;
    // 'user':
    //...

      for ($i=1; $i <= $n_personas; $i++) {
        $age = "edad" . $i;
        $sex = "sexo" . $i;

        $edad = $_POST['edad1'];
        $sexo = $_POST[$sex];

        echo $edad;
        echo "\n".$sexo;


      }
    //  break;
//}*/



    //$visita_consulta = "INSERT INTO visita (grupo, consulta, hora, fecha, sexo, edad, nacionalidad, residencia, oficina) VALUES ( '".$grupo_actual."', '".$tipo_consulta."', '".$hora."', '".$fecha."', '".."', '12', 'fdsgdf', 'si', 'fgsfdg') "


//  }







  //PERFIL Y ALOJAMIENTO
  $conocer = $_POST['alo1'];
  //conocer TABLA: perfil_alojamiento
  for ($i=0; $i < count($conocer) ; $i++) {
    $consulta_conocer = "INSERT INTO perfil_alojamiento (grupo, conocer) VALUES ('".$grupo_actual."', '".$conocer[$i]."')";
    mysqli_query($link, $consulta_conocer) or die(mysqli_error($link));
  }


  //repite TABLA: perfil_alojamiento
  $repite = $_POST['alo2'];
  $consulta_repite = "INSERT INTO perfil_alojamiento (grupo, repite) VALUES ('".$grupo_actual."' ,'".$repite."')";
  mysqli_query($link, $consulta_repite) or die(mysqli_error($link));


  //alojamiento TABLA: perfil_alojamiento
  $alojamiento = $_POST['alo3'];
  $consulta_alojamiento = "INSERT INTO perfil_alojamiento (grupo, alojamiento) VALUES ('".$grupo_actual."', '".$alojamiento."')";
  mysqli_query($link, $consulta_alojamiento) or die(mysqli_error($link));


  //motivo TABLA: perfil_alojamiento
  $motivo = $_POST['alo4'];
  for ($i=0; $i < count($motivo) ; $i++) {
    $consulta_motivo = "INSERT INTO perfil_alojamiento (grupo, motivo) VALUES ('".$grupo_actual."', '".$motivo[$i]."')";
    mysqli_query($link, $consulta_motivo) or die(mysqli_error($link));
  }

  //municipio (se aloja en el municipio??) TABLA: perfil_alojamiento
  $municipio_aloja = $_POST['alo5'];
  $consulta_aloja = "INSERT INTO perfil_alojamiento (grupo, municipio) VALUES ('".$grupo_actual."', '".$municipio_aloja."')";
  mysqli_query($link, $consulta_aloja) or die(mysqli_error($link));

  //tiempo TABLA: perfil_alojamiento
  $tiempo = $_POST['alo6'];
  $consulta_tiempo = "INSERT INTO perfil_alojamiento (grupo, tiempo) VALUES ('".$grupo_actual."', '".$tiempo."')";
  mysqli_query($link, $consulta_tiempo) or die(mysqli_error($link));




  //INFORMACIÓN GUÍA DE ISORA
  //recursos TABLA: informacion_guia
  $recurso = $_POST['recurso1'];
  for ($i=0; $i < count($recurso) ; $i++) {
    $consulta_recurso = "INSERT INTO informacion_guia (grupo, recursos) VALUES ('".$grupo_actual."', '".$recurso[$i]."')";
    mysqli_query($link, $consulta_recurso) or die(mysqli_error($link));
  }

  //alojamiento TABLA: informacion_guia
  $alojamiento_ = $_POST['aloj1'];
  for ($i=0; $i < count($alojamiento_) ; $i++) {
    $consulta_alojamiento_ = "INSERT INTO informacion_guia (grupo, recursos) VALUES ('".$grupo_actual."', '".$alojamiento_[$i]."')";
    mysqli_query($link, $consulta_alojamiento_) or die(mysqli_error($link));
  }

  //transporte TABLA: informacion_guia
  $transporte = $_POST['trans'];
  for ($i=0; $i < count($transporte) ; $i++) {
    $consulta_transporte = "INSERT INTO informacion_guia (grupo, recursos) VALUES ('".$grupo_actual."', '".$transporte[$i]."')";
    mysqli_query($link, $consulta_transporte) or die(mysqli_error($link));
  }

  //ocio TABLA: informacion_guia
  $ocio = $_POST['oci'];
  for ($i=0; $i < count($ocio) ; $i++) {
    $consulta_ocio = "INSERT INTO informacion_guia (grupo, recursos) VALUES ('".$grupo_actual."', '".$ocio[$i]."')";
    mysqli_query($link, $consulta_ocio) or die(mysqli_error($link));
  }

  //eventos TABLA: informacion_guia
  $eventos = $_POST['eve'];
  for ($i=0; $i < count($eventos) ; $i++) {
    $consulta_eventos = "INSERT INTO informacion_guia (grupo, recursos) VALUES ('".$grupo_actual."', '".$eventos[$i]."')";
    mysqli_query($link, $consulta_eventos) or die(mysqli_error($link));
  }

  //servicios_publicos TABLA: informacion_guia
  $servicios_publicos = $_POST['servi'];
  for ($i=0; $i < count($servicios_publicos) ; $i++) {
    $consulta_servicios_publicos = "INSERT INTO informacion_guia (grupo, recursos) VALUES ('".$grupo_actual."', '".$servicios_publicos[$i]."')";
    mysqli_query($link, $consulta_servicios_publicos) or die(mysqli_error($link));
  }

  //INFORMACION TENERIFE
  //info TABLA: informacion_tenerife
  $info = $_POST['tfinfo'];
  for ($i=0; $i < count($info) ; $i++) {
    $consulta_info = "INSERT INTO informacion_tenerife (grupo, info) VALUES ('".$grupo_actual."', '".$info[$i]."')";
    mysqli_query($link, $consulta_info) or die(mysqli_error($link));
  }


  //MATERIALES
  









  header("Location: inicio.php");









}



?>
