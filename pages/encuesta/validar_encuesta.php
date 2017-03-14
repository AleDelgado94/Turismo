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




       $fecha = "";
       $tipo_consulta = "";
       $hora = "";
       $oficina = "";
       $edad = "";
       $sexo = "";
       $nacionalidad = "";
       $residencia = 0;

       $n_personas = $_POST['n_personas'];



      if(isset($_POST['fecha'])) $fecha = $_POST['fecha'];;
      if(isset($_POST['encuesta'])) $tipo_consulta = $_POST['encuesta'];
      if(isset($_POST['horas'])) $hora = $_POST['horas'];
      if(isset($_POST['oficinas'])) $oficina = $_POST['oficinas'];



      for ($i=1; $i <= $n_personas; $i++) {

        $age = "edad" . $i;
        $sex = "sexo" . $i;
        $nacion = "nacionalidad" . $i;
        $res = "residencia" . $i;


        if(isset($_POST[$age])) $edad = $_POST[$age];
        if(isset($_POST[$sex])) $sexo = $_POST[$sex];
        if(isset($_POST[$nacion])) $nacionalidad = $_POST[$nacion];
        //if recidencia == 1 reside else no reside
        if(isset($_POST[$res])) $residencia = $_POST[$res];
        if ($residencia == 1) {
          $residencia = "Si";
        }elseif ($residencia == 0) {
          $residencia = "No";
        }


        //INSERTAMOS EN LA BASE DE datos
        $visita_consulta = "INSERT INTO visita (grupo, consulta, hora, fecha, sexo, edad, nacionalidad, residencia, oficina) VALUES ( '".$grupo_actual."', '".$tipo_consulta."', '".$hora."', '".$fecha."', '".$sexo."', '".$edad."', '".$nacionalidad."', '".$residencia."', '".$oficina."')";
        mysqli_query($link, $visita_consulta);


      }









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
    $consulta_alojamiento_ = "INSERT INTO informacion_guia (grupo, alojamiento) VALUES ('".$grupo_actual."', '".$alojamiento_[$i]."')";
    mysqli_query($link, $consulta_alojamiento_) or die(mysqli_error($link));
  }

  //transporte TABLA: informacion_guia
  $transporte = $_POST['trans'];
  for ($i=0; $i < count($transporte) ; $i++) {
    $consulta_transporte = "INSERT INTO informacion_guia (grupo, transporte) VALUES ('".$grupo_actual."', '".$transporte[$i]."')";
    mysqli_query($link, $consulta_transporte) or die(mysqli_error($link));
  }

  //ocio TABLA: informacion_guia
  $ocio = $_POST['oci'];
  for ($i=0; $i < count($ocio) ; $i++) {
    $consulta_ocio = "INSERT INTO informacion_guia (grupo, ocio) VALUES ('".$grupo_actual."', '".$ocio[$i]."')";
    mysqli_query($link, $consulta_ocio) or die(mysqli_error($link));
  }

  //eventos TABLA: informacion_guia
  $eventos = $_POST['eve'];
  for ($i=0; $i < count($eventos) ; $i++) {
    $consulta_eventos = "INSERT INTO informacion_guia (grupo, eventos) VALUES ('".$grupo_actual."', '".$eventos[$i]."')";
    mysqli_query($link, $consulta_eventos) or die(mysqli_error($link));
  }

  //servicios_publicos TABLA: informacion_guia
  $servicios_publicos = $_POST['servi'];
  for ($ifecha=0; $i < count($servicios_publicos) ; $i++) {
    $consulta_servicios_publicos = "INSERT INTO informacion_guia (grupo, servicios_publicos) VALUES ('".$grupo_actual."', '".$servicios_publicos[$i]."')";
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

  //Municipio
  $callejero = $_POST['callejero'];
  $consulta = "INSERT INTO materiales_municipio (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Callejero' ,'".$callejero."')";
  if($callejero != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$callejero." WHERE material = 'callejero';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
  }


  $mapa_senderos = $_POST['mapa_senderos'];
  $consulta = "INSERT INTO materiales_municipio (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Mapa senderos' ,'".$mapa_senderos."')";
  if($mapa_senderos != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$mapa_senderos." WHERE material = 'mapa_senderos';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $guias_turisticas = $_POST['guias_turisticas'];
  $consulta = "INSERT INTO materiales_municipio (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Guias turisticas' ,'".$guias_turisticas."')";
  if($guias_turisticas != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$guias_turisticas." WHERE material = 'guias_turisticas';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $folleto_eventos_municipales = $_POST['folleto_eventos_municipales'];
  $consulta = "INSERT INTO materiales_municipio (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Folleto eventos municipales' , '".$folleto_eventos_municipales."')";
  if($folleto_eventos_municipales != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$folleto_eventos_municipales." WHERE material = 'folleto_eventos_municipales';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
  }

  $folleto_ocio = $_POST['folleto_ocio'];
  $consulta = "INSERT INTO materiales_municipio (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Folleto ocio' , '".$folleto_ocio."')";
  if($folleto_ocio != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_municipio SET cantidad = cantidad - ".$folleto_ocio." WHERE material = 'folleto_ocio';";
    mysqli_query($link, $consulta) or die(mysqli_error($link));
  }




  //Otros Municipios
  $callejero_otros = $_POST['callejero_otros'];
  $consulta = "INSERT INTO materiales_otros_municipios (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Callejero', '".$callejero_otros."')";
  if($callejero_otros != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad - ".$callejero_otros." WHERE material = 'callejero'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $folleto_ocio_otros = $_POST['folleto_ocio_otros'];
  $consulta = "INSERT INTO materiales_otros_municipios (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Folleto ocio', '".$folleto_ocio_otros."')";
  if($folleto_ocio_otros != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad - ".$folleto_ocio_otros." WHERE material = 'folleto_ocio'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $otros_otros = $_POST['otros_otros'];
  $consulta = "INSERT INTO materiales_otros_municipios (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Otros' ,'".$otros_otros."')";
  if($otros_otros != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otros_municipios SET cantidad = cantidad - ".$otros_otros." WHERE material = 'otros'; ";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }



  //Otras islas
  $mapas_islas = $_POST['mapas_islas'];
  $consulta = "INSERT INTO materiales_otras_islas (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Mapas islas' ,'".$mapas_islas."')";
  if($mapas_islas != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otras_islas SET cantidad = cantidad - ".$mapas_islas." WHERE material = 'mapas'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $otros_islas = $_POST['otros_islas'];
  $consulta = "INSERT INTO materiales_otras_islas (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Otros' ,'".$callejero_otros."')";
  if($otros_islas != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_otras_islas SET cantidad = cantidad - ".$otros_islas." WHERE material = 'otros'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }


  //Turismo Tenerife
  $mapa_tenerife = $_POST['mapa_tenerife'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Mapa Tenerife' ,'".$mapa_tenerife."')";
  if($mapa_tenerife != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$mapa_tenerife." WHERE material = 'mapa_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $mapa_block_sur = $_POST['mapa_block_sur'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Mapa block sur' ,'".$mapa_block_sur."')";
  if($mapa_block_sur != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$mapa_block_sur." WHERE material = 'mapa_block_sur'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $tenerife_coche = $_POST['tenerife_coche'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Tenerife en coche' ,'".$tenerife_coche."')";
  if($tenerife_coche != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$tenerife_coche." WHERE material = 'tenerife_coche'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $tradiciones_tenerife = $_POST['tradiciones_tenerife'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Tradiciones Tenerife' ,'".$tradiciones_tenerife."')";
  if($tradiciones_tenerife != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$tradiciones_tenerife." WHERE material = 'tradiciones_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $tenerife_pie = $_POST['tenerife_pie'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Tenerife a pie' ,'".$tenerife_pie."')";
  if($tenerife_pie != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$tenerife_pie." WHERE material = 'tenerife_pie'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $tenerife_cetaceos = $_POST['tenerife_cetaceos'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Tenerife cetaceos' ,'".$tenerife_cetaceos."')";
  if($tenerife_cetaceos != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$tenerife_cetaceos." WHERE material = 'tenerife_cetaceos'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $guia_de_tenerife = $_POST['guia_de_tenerife'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Guia de Tenerife' ,'".$guia_de_tenerife."')";
  if($guia_de_tenerife != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$guia_de_tenerife." WHERE material = 'guia_de_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $gastronomia_tenerife = $_POST['gastronomia_tenerife'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Gastronomia de Tenerife' ,'".$gastronomia_tenerife."')";
  if($gastronomia_tenerife != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$gastronomia_tenerife." WHERE material = 'gastronomia_tenerife'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $tenerife_natural_rural = $_POST['tenerife_natural_rural'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Tenerife narutal rural' ,'".$tenerife_natural_rural."')";
  if($tenerife_natural_rural != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$tenerife_natural_rural." WHERE material = 'tenerife_natural_rural'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $tenerife_familia = $_POST['tenerife_familia'];
  $consulta = "INSERT INTO material_turismo_tenerife (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Tenerife en familia' ,'".$tenerife_familia."')";
  if($tenerife_familia != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_turismo_tenerife SET cantidad = cantidad - ".$tenerife_familia." WHERE material = 'tenerife_familia'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }


  //Material promocional
  $periodico_revista = $_POST['periodico_revista'];
  $consulta = "INSERT INTO material_promocional (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Periodico_revista' ,'".$periodico_revista."')";
  if($periodico_revista != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad - ".$periodico_revista." WHERE material = 'periodico_revista'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $folleto_bus = $_POST['folleto_bus'];
  $consulta = "INSERT INTO material_promocional (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Folleto bus' ,'".$folleto_bus."')";
  if($folleto_bus != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad - ".$folleto_bus." WHERE material = 'folleto_bus'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }

  $otros_promocional = $_POST['otros_promocional'];
  $consulta = "INSERT INTO material_promocional (grupo, material, cantidad) VALUES ('".$grupo_actual."', 'Otras' ,'".$otros_promocional."')";
  if($otros_promocional != 0){
    mysqli_query($link, $consulta) or die(mysqli_error($link));
    $consulta = "UPDATE stock_promocional SET cantidad = cantidad - ".$otros_promocional." WHERE material = 'otros_promocional'";
    mysqli_query($link, $consulta) or die(mysqli_error($link));

  }






  header("Location: inicio.php");









}


?>
