<?php

   //include('connect_db'); // incluímos los datos de acceso a la BD
   // comprobamos que se haya iniciado la sesión

    session_start();

   if(isset($_SESSION['usuario'])) {
     $username = $_SESSION['usuario'];
     $oficina = $_SESSION['oficina_defecto'];



?>
       <!-- Aquí ponemos todo el código HTML de nuestra página restringida, desde <html> a </html>-->

<!DOCTYPE html>
<html lang="es">
  <head>

    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../css/font-awesome.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/main.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/estadisticas/estadisticas.css"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="icon" type="../../image/png" href="http://www.guiadeisora.org/corp/wp-content/themes/FoundationPress-master/assets/img/icons/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="../../jquery-ui-1.12.1.custom/jquery-ui.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style media="screen">
      .dropdown-content li > a, .dropdown-content li > span {
        color: #409BC7 !important;
      }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Turismo - Base de datos</title>
  </head>
  <body>

  <header>


    <nav class="#424242 grey darken-3 top-nav">
      <div class="container-fluid">
        <div class="nav-wrapper">
          <a class="brand-logo left"><img id="escudo-nav" src="..\..\images\Escudos\Escudo_AyuntamientoGuiadeIsora1.png" alt="Escudo Guía de Isora"></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="../main.php">Inicio</a></li>
            <li><a href="http://www.guiadeisora.org/corp">Ayuntamiento</a></li>
            <li><a href="http://www.guiadeisora.travel/turismo">Turismo</a></li>
          </ul>
          <ul id="mobile-demo" class="side-nav">
            <li><a href="../main.php">Inicio</a></li>
            <li><a href="http://www.guiadeisora.org/corp">Ayuntamiento</a></li>
            <li><a href="http://www.guiadeisora.travel/turismo">Turismo</a></li>
          </ul>
        </div>
      </div>

    </nav>


  </header>

  <main>
      <div class="row">
        <div class="col s12 m3 l2 ">
          <ul class="menu">
            <li><i class="material-icons">perm_identity</i><?php echo "<span class='usuario_panel'>&nbsp; Usuario:
            $username
            </span>"; ?></li>
            <li><i class="material-icons">business</i><?php echo "<span class='usuario_panel'>&nbsp; Oficina:
            $oficina
            </span>"; ?></li>
            <li><i class="material-icons">replay</i><a href="../main.php">&nbsp; Inicio</a></li>
            <li><i class="material-icons">mode_edit</i><a href="../encuesta/inicio.php">&nbsp; Encuesta</a></li>
            <li><i class="material-icons">trending_up</i><a href="estadisticas.php">&nbsp; Consultar estadísticas</a></li>
            <li><i class="material-icons">shopping_cart</i><a href="../stock/stock.php">&nbsp; Stock</a></li>
            <li><i class="material-icons">new_releases</i><a href="../incidencias/incidencias.php">&nbsp; Incidencias</a></li>
            <li><i class="material-icons">info</i><a href="../observaciones/observaciones.php">&nbsp; Observaciones</a></li>
            <li><i class="material-icons">credit_card</i><a href="../ocupacion/ocupacion.php">&nbsp; Ocupación hotelera</a></li>
            <?php
              if($username == 'admin'){
                echo "<li> <i class='material-icons'>contacts</i><a href='../gestion_usuarios.php'>&nbsp; Gestión de usuario</a></li>";
                echo "<li><i class='material-icons'>library_books</i><a href='../gestion_hotelera.php'>&nbsp; Gestión hotelera</a></li>";
              }
             ?>

          </ul>
          <form class="col s12 m3 l3" action="../cerrar_sesion.php" method="post">
            <input type="submit" name="cerrar" value="Cerrar Sesión">
          </form>
        </div>
        <div class="col s12 m10 l10">

          <!-- INICIO DE LAS ESTADISTICAS-->
          <!--<div class="row ">
            <div class="col s12">
              <h4>Estadísticas</h4>
            </div>
          </div>-->

          <div class="row">
            <div class="col s12">
              <ul class="tabs tab-modi">
                <li class="tab col s12 m3 l3"><a href="#test1">Personas</a></li>
                <li class="tab col s12 m2 l2"><a href="#test2">Consulta</a></li>
                <li class="tab col s12 m2 l2"><a href="#test3">Perfil Alojamiento</a></li>
                <li class="tab col s12 m2 l2"><a href="#test4">Información</a></li>
                <li class="tab col s12 m3 l3"><a href="#test5">Materiales</a></li>
              </ul>
            </div>




          <div class="row">
            <!-- Personas-->
            <div id="test1">
              <div class="col s12 m4 l4">
                <h5>Personas</h5>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <select name="personas" onchange="person(this.value)">
                      <option value="" disabled selected>Personas</option>
                      <option value="Nacionalidad">Nacionalidad</option>
                      <option value="Visitas">Número de visitas</option>
                      <option value="Visitantes">Número de visitantes</option>
                      <option value="Edad">Edad</option>
                    </select>
                    <label>Persona</label>
                    <input id="persona_consulta" type="hidden" name="persona">
                  </div>
                </div>

                <div style="display:none;" id="countries" class="row">
                  <div class="col s12 m8 l8" >
                    <select name='nacion' onchange="nacion(this.value)">
                         <option value='Todas'>Todas</option>
                         <option value='Espanola'>Española</option>
                         <option value='Canaria'>Canaria</option>
                         <option value='Britanica'>Británica</option>
                         <option value='Alemana'>Alemana</option>
                         <option value='Rusa'>Rusa</option>
                         <option value='Africana'>Africana</option>
                         <option value='Asiatica'>Asiática</option>
                         <option value='Australiana'>Australiana</option>
                         <option value='Austriaca'>Austriaca</option>
                         <option value='Belga'>Belga</option>
                         <option value='Canadiense'>Canadiense</option>
                         <option value='Checa'>Checa</option>
                         <option value='China'>China</option>
                         <option value='Danesa'>Danesa</option>
                         <option value='Eslovena'>Eslovena</option>
                         <option value='Estadounidense'>Estadounidense</option>
                         <option value='Otros'>Otros</option>
                     </select>
                    <label>Nacionalidades</label>
                    <input id="nacion_consulta" type="hidden" name="persona">

                  </div>
                  <div class="col s12 m4 l4">
                     <input id="numero_paises" type="number" name="numero_paises" placeholder="Núm" min="0">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_ini" name="fecha_ini" placeholder="De:">
                  </div>
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_fin" name="fecha_fin" placeholder="Hasta:">
                  </div>

                </div>

                <div class="row">
                  <div class="col s12 m12 l2">
                    <input id="boton_enviar" value="Buscar" type ="submit" onclick="consult(persona_consulta,nacion_consulta,numero_paises,fecha_ini,fecha_fin)"/>
                  </div>
                </div>
              </div>
            </div>
            <!--Fin Personas-->

            <!--Consulta-->
            <div id="test2">
              <div class="col s12 m4 l4">
                <h5>Consulta</h5>
                <div class="row">
                  <div class="col s12 m8 l12">
                    <select name="consultas" onchange="consulta(this.value)">
                      <option value="" disabled selected>Consultas</option>
                      <option value="Horario">Tramo horario</option>
                      <option value="Oficina">Oficina</option>
                      <option value="Tipo">Tipo de consulta</option>
                    </select>
                    <label>Consulta</label>
                    <input id="tipo_consulta" type="hidden" name="tipo_consulta">
                  </div>
                </div>
                <!--Si Tramo Horario-->
                <div style="display:none;" id="horario" class="row">
                  <div class="col s12 m8 l8" >
                    <select name='horarios' onchange="horario(this.value)">
                         <option value='Todas'>Todas</option>
                         <option value='9-11'>9-11</option>
                         <option value='11-13'>11-13</option>
                         <option value='13-15'>13-15</option>
                     </select>
                    <label>Horario</label>
                    <input id="opcion1" type="hidden" name="opcion1">
                  </div>
                </div>

                <!-- Si Oficina-->
                <div style="display:none;" id="oficina" class="row">
                  <div class="col s12 m8 l8" >
                    <select name='oficinas' onchange="oficina(this.value)">
                         <option value='Todas'>Todas</option>
                         <option value='Guia Casco'>Guía Casco</option>
                         <option value='Alcala'>Alcalá</option>
                         <option value='Playa San Juan'>Playa San Juan</option>
                     </select>
                    <label>Horario</label>
                    <input id="opcion2" type="hidden" name="opcion2">
                  </div>
                </div>

                <!-- Si tipo-->
                <div style="display:none;" id="tipo" class="row">
                  <div class="col s12 m8 l8" >
                    <select name='tipos' onchange="tipo(this.value)">
                         <option value='Todas'>Todas</option>
                         <option value='Corta'>Corta</option>
                         <option value='Larga'>Larga</option>
                         <option value='E-mail'>E-mail</option>
                         <option value='Tfno'>Tfno</option>
                     </select>
                    <label>Tipos</label>
                    <input id="opcion3" type="hidden" name="opcion3">
                  </div>
                </div>

                <div class="row">
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_ini2" name="fecha_ini2" placeholder="De:">
                  </div>
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_fin2" name="fecha_fin2" placeholder="Hasta:">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l2">
                    <input id="boton_enviar" value="Buscar" type ="submit" onclick="consult2(tipo_consulta,opcion1,opcion2,opcion3,fecha_ini2,fecha_fin2)"/>
                  </div>
                </div>
              </div>
            </div>
            <!--Fin Consulta-->

            <!--Perfil y alojamiento-->
            <div id="test3">
              <div class="col s12 m4 l4">
                <h5>Perfil Alojamiento</h5>
                <div class="row">
                  <div class="col s12 m8 l12" >
                    <select name='alojamientos' onchange="alojamiento(this.value)">
                         <option value="" disabled selected> Perfil alojamiento</option>
                         <option value='Como'>Cómo conocieron el municipio</option>
                         <option value='Repite Visita'>Repite visita</option>
                         <option value='Tipo de alojamiento'>Tipo de alojamiento</option>
                         <option value='Motivo de visita'>Motivo de visita</option>
                         <option value='Se aloja'>Se aloja en el municipio</option>
                         <option value='Tiempo de estancia'>Tiempo de estancia</option>
                     </select>
                    <label>Horario</label>
                    <input id="alojamiento_consulta" type="hidden" name="alojamiento_consulta">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_ini3" name="fecha_ini3" placeholder="De:">
                  </div>
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_fin3" name="fecha_fin3" placeholder="Hasta:">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l2">
                    <input id="boton_enviar" value="Buscar" type ="submit" onclick="consult3(alojamiento_consulta,fecha_ini3,fecha_fin3)"/>
                  </div>
                </div>
              </div>
            </div>
            <!--Fin perfil y alojamiento-->


            <!--Informacion-->
            <div id="test4">
              <div class="col s12 m4 l4">
                <h5>Infomación</h5>
                <div class="row">
                  <div class="col s12 m8 l12" >
                    <select name='informaciones' onchange="informacion(this.value)">
                         <option value="" disabled selected> Informacion</option>
                         <option value='Recursos'>Recursos</option>
                         <option value='Alojamiento'>Alojamiento</option>
                         <option value='Transporte'>Transporte</option>
                         <option value='Ocio'>Ocio</option>
                         <option value='Eventos'>Eventos</option>
                         <option value='Servicios Publicos'>Servicios Públicos</option>
                         <option value='Tenerife'>Tenerife</option>
                     </select>
                    <label>Información</label>
                    <input id="informacion_consulta" type="hidden" name="informacion_consulta">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_ini4" name="fecha_ini4" placeholder="De:">
                  </div>
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_fin4" name="fecha_fin4" placeholder="Hasta:">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l2">
                    <input id="boton_enviar" value="Buscar" type ="submit" onclick="consult4(informacion_consulta,fecha_ini4,fecha_fin4)"/>
                  </div>
                </div>
              </div>
            </div>
            <!--Informacion-->
            <!--Materiales-->
            <div id="test5">
              <div class="col s12 m4 l4">
                <h5>Materiales</h5>
                <div class="row">
                  <div class="col s12 m8 l12" >
                    <select name='materiales' onchange="material(this.value)">
                         <option value="" disabled selected> Materiales</option>
                         <option value='Municipio'>Municipio</option>
                         <option value='Otros Municipios'>Otros Municipios</option>
                         <option value='Otras Islas'>Otras Islas</option>
                         <option value='Tenerife'>Tenerife</option>
                         <option value='Material Promocional'>Material Promocional</option>
                     </select>
                    <label>Información</label>
                    <input id="materiales_consulta" type="hidden" name="materiales_consulta">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_ini5" name="fecha_ini5" placeholder="De:">
                  </div>
                  <div class="col s12 m12 l6">
                      <input type="text" class="datepicker" id="fecha_fin5" name="fecha_fin5" placeholder="Hasta:">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l2">
                    <input id="boton_enviar" value="Buscar" type ="submit" onclick="consult5(materiales_consulta,fecha_ini5,fecha_fin5)"/>
                  </div>
                </div>
              </div>
            </div>
            <!--Fin Materiales-->



          </div>

        </div>
          <div class="row">


                <?php
                if($_COOKIE['persona']!=""){
                  $link = require("../connect_db.php");

                  $persona = "Nacionalidad";
                  $nacion = "";
                  $fecha_inicio="2000/01/01";
                  $fecha_final="2000/01/01";
                  $grafica="";
                  $numero_paises="";
                  $alojamiento="";
                  $informacion="";
                  $material="";

                  if(isset($_COOKIE['persona']))
                   $persona = $_COOKIE['persona'];

                  if(isset($_COOKIE['nacion']))
                    $nacion = $_COOKIE['nacion'];
                    if($nacion =="")
                      $nacion="Todas";

                  if(isset($_COOKIE['fecha_inicio'])){
                    $fecha_inicio = $_COOKIE['fecha_inicio'];
                    //echo "Fecha de inicio $fecha_inicio";
                  }
                  if(isset($_COOKIE['fecha_final'])){
                    $fecha_final = $_COOKIE['fecha_final'];
                    //echo "Fecha de inicio $fecha_inicio";
                  }

                  if(isset($_COOKIE['numero_paises'])){
                    $numero_paises = $_COOKIE['numero_paises'];
                  }

                  if(isset($_COOKIE['alojamiento'])){
                    $alojamiento = $_COOKIE['alojamiento'];
                  }
                  if(isset($_COOKIE['informacion'])){
                    $informacion = $_COOKIE['informacion'];
                  }
                  if(isset($_COOKIE['material'])){
                    $material = $_COOKIE['material'];
                  }

                  if($persona=="")
                    $persona="Nacionalidad";
                  if($fecha_inicio=="")
                    $fecha_inicio="2000/01/01";
                  if($fecha_final=="")
                    $fecha_final="2000/01/01";

                  //echo "$persona $nacion de $fecha_inicio hasta $fecha_final $numero_paises";
                  //echo "$alojamiento $fecha_inicio $fecha_final";
                  //echo "$informacion $fecha_inicio $fecha_final";
                  //echo "$material $fecha_inicio $fecha_final";
                  $fecha_inicio_alo = $fecha_inicio;
                  $fecha_final_alo = $fecha_final;
                  $fecha_inicio_info = $fecha_inicio;
                  $fecha_final_info = $fecha_final;

                  if($persona == "Nacionalidad"){
                    if($nacion =="Todas" && $numero_paises==""){


                      $consulta= "SELECT nacionalidad,COUNT(*) as numero
                                  FROM visita
                                  WHERE fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                  GROUP BY nacionalidad";
                      $nacionalidad = mysqli_query($link,$consulta);
                      $filas = mysqli_fetch_assoc($nacionalidad);
                      $numero_filas = mysqli_num_rows($nacionalidad);
                      //echo "Numero de filas: $numero_filas";
                      if($numero_filas >0){
                        $grafica = TRUE;
                        $data2 = array();
                        $paises = array();
                        $nacionalidad = mysqli_query($link,$consulta);

                        while($filas = mysqli_fetch_assoc($nacionalidad)){
                          array_push($data2,$filas['numero']);
                          array_push($paises,$filas['nacionalidad']);
                        }


                        require_once ('../../jpgraph/src/jpgraph.php');
                        require_once ('../../jpgraph/src/jpgraph_pie.php');

                        // Create the Pie Graph.
                        $graph = new PieGraph(500,600);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Nacionalidades");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);



                        // Create
                        $p1 = new PiePlot($data2);
                        $graph->Add($p1);


                        $legends = $paises;
                        $p1->SetLegends($legends);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");
                      }




                    }
                    else if($numero_paises != ""){
                      //echo "estoy aqui $numero_paises";
                      //SELECT nacionalidad,COUNT(*) as numero FROM visita WHERE fecha BETWEEN '2017/04/01' AND '2017/04/18' GROUP BY nacionalidad ORDER BY numero DESC LIMIT 5
                      $consulta="SELECT nacionalidad,COUNT(*) as numero
                                 FROM visita
                                 WHERE fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                 GROUP BY nacionalidad
                                 ORDER BY numero DESC
                                 LIMIT ".$numero_paises.";";
                      $nacionalidad = mysqli_query($link,$consulta);
                      $filas = mysqli_fetch_assoc($nacionalidad);
                      $numero_filas = mysqli_num_rows($nacionalidad);
                      //echo "Numero de filas: $numero_filas";
                      if($numero_filas >0){
                        $grafica = TRUE;
                        $data2 = array();
                        $paises = array();
                        $nacionalidad = mysqli_query($link,$consulta);

                        while($filas = mysqli_fetch_assoc($nacionalidad)){
                          array_push($data2,$filas['numero']);
                          array_push($paises,$filas['nacionalidad']);
                        }


                        require_once ('../../jpgraph/src/jpgraph.php');
                        require_once ('../../jpgraph/src/jpgraph_pie.php');

                        // Create the Pie Graph.
                        $graph = new PieGraph(500,600);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Nacionalidades");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);



                        // Create
                        $p1 = new PiePlot($data2);
                        $graph->Add($p1);


                        $legends = $paises;
                        $p1->SetLegends($legends);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");
                      }

                    }
                    else{
                      $consulta= "SELECT nacionalidad,COUNT(*) as numero
                                  FROM visita
                                  WHERE nacionalidad = '".$nacion."' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                  GROUP BY nacionalidad";
                    }

                      $nacionalidad = mysqli_query($link,$consulta);
                      echo "

                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>

                      <table class='col s12 m12 l5'>
                        <thead>
                          <tr>
                            <th>Nacionalidad</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila = mysqli_fetch_assoc($nacionalidad)){
                        echo"

                         <tr>
                         <td>".$fila['nacionalidad']."</td>
                         <td>".$fila['numero']."</td>
                         </tr>
                        ";
                      }


                      $paises_serializados = "";
                      $paises_serializados = serialize($paises);
                      $numero_serializados = "";
                      $numero_serializados = serialize($data2);

                      echo "</tbody>
                            </table>
                      ";
                      if($grafica == TRUE){
                        echo "
                        <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                        </div>
                        </div> ";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_nacionalidades.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                            <input type='hidden' value='".$fecha_final."' name='hasta'/>
                            <input type='hidden' value='".$paises_serializados."' name='nacionalidades'/>
                            <input type='hidden' value='".$numero_serializados."' name='num_person_nacionalidad'/>

                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_nacionalidades.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                          <input type='hidden' value='".$fecha_final."' name='hasta'/>
                          <input type='hidden' value='".$paises_serializados."' name='nacionalidades'/>
                          <input type='hidden' value='".$numero_serializados."' name='num_person_nacionalidad'/>



                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";


                      }

                  }



                  if($persona == "Visitas"){
                    $consulta= "SELECT COUNT(DISTINCT grupo) as numero
                                FROM visita
                                WHERE fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";

                    $visitas = mysqli_query($link,$consulta);
                    $fila2 = mysqli_fetch_assoc($visitas);
                    echo "

                    <div class='row'>
                      <p>
                        Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                      </p>
                    </div>
                    <table class='col s12 m12 l2'>
                      <tbody>
                        <tr>
                          <th>Número de visitas:</th>
                          <th>".$fila2['numero']."</th>
                        </tr>
                      </tbody>
                    </table>
                    ";
                  }
                  if($persona == "Visitantes"){
                    $consulta= "SELECT COUNT(DISTINCT id) as numero
                                FROM visita
                                WHERE fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";

                    $visitantes = mysqli_query($link,$consulta);
                    $fila3 = mysqli_fetch_assoc($visitantes);
                    echo "

                    <div class='row'>
                      <p>
                        Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                      </p>
                    </div>
                    <table class='col s12 m12 l2'>
                      <tbody>
                        <tr>
                          <th>Número de visitantes:</th>
                          <th>".$fila3['numero']."</th>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    ";
                  }
                  if($persona == "Edad"){
                    //SELECT edad,COUNT(edad) FROM visita WHERE fecha BETWEEN '2017/04/01' AND '2017/04/11' GROUP BY edad
                    $consulta= "SELECT edad,COUNT(edad) as numero
                                FROM visita
                                WHERE fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                GROUP BY edad";
                    //De 13 a 30
                    $consulta2= "SELECT edad,COUNT(edad) as numero
                                 FROM visita
                                 WHERE edad='13a30' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                 GROUP BY edad";
                    $edad2=mysqli_query($link,$consulta2);
                    $filas2= mysqli_fetch_assoc($edad2);
                    //echo "de 13 a 30: ".$filas2['numero']."";

                    //De 31 a 50
                    $consulta3= "SELECT edad,COUNT(edad) as numero
                                 FROM visita
                                 WHERE edad='31a50' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                 GROUP BY edad";
                    $edad3=mysqli_query($link,$consulta3);
                    $filas3= mysqli_fetch_assoc($edad3);
                    //echo "de 31 a 50: ".$filas3['numero']."";

                    //De 50 o mas
                    $consulta4= "SELECT edad,COUNT(edad) as numero
                                 FROM visita
                                 WHERE edad='50mas' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                 GROUP BY edad";
                    $edad4=mysqli_query($link,$consulta4);
                    $filas4= mysqli_fetch_assoc($edad4);
                    //echo "de 50 mas: ".$filas4['numero']."";

                    //De 0 a 12
                    $consulta5= "SELECT edad,COUNT(edad) as numero
                                 FROM visita
                                 WHERE edad='0a12' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                 GROUP BY edad";
                    $edad5=mysqli_query($link,$consulta5);
                    $filas5= mysqli_fetch_assoc($edad5);
                    //echo "de 0 a 12: ".$filas5['numero']."";

                    $edad = mysqli_query($link,$consulta);
                    $filas = mysqli_fetch_assoc($edad);
                    $numero_filas = mysqli_num_rows($edad);
                    //echo "Numero de filas: $numero_filas";
                    if($numero_filas >0)
                      $grafica = TRUE;




                    require_once ('../../jpgraph/src/jpgraph.php');
                    require_once ('../../jpgraph/src/jpgraph_pie.php');
                    //echo $filas2['numero']+$filas3['numero']+$filas4['numero'];
                    if(($filas2['numero']+$filas3['numero']+$filas4['numero']+$filas5['numero'])>0){
                      $data=array($filas5['numero'],$filas2['numero'],$filas3['numero'],$filas4['numero']);
                      // Create the Pie Graph.
                      $graph = new PieGraph(500,500);

                      $theme_class = new VividTheme();
                      $graph->SetTheme($theme_class);
                      // Set A title for the plot
                      $graph->title->Set("Edades");
                      $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                      $graph->SetBox(true);

                      // Create
                      $p1 = new PiePlot($data);
                      $graph->Add($p1);

                      $p1->SetLegends(array("0 a 12","13 a 30","31 a 50","50 o mas"));
                      $p1->ShowBorder();
                      $p1->SetColor('black');
                      $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                      $p1->value->SetColor('black');
                      $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                      $graph->legend->SetColor('black');
                      @unlink("../../images/graficas/grafica1.png");
                      $graph->Stroke("../../images/graficas/grafica1.png");


                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l5'>
                        <thead>
                          <tr>
                            <th>Rango edad</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                           <tr>
                             <td>0 a 12 años</td>";
                             if($filas5['numero'] == "")
                              echo" <td>0</td>";
                             else
                               echo "<td>".$filas5['numero']."</td>";

                        echo"
                           </tr>
                           <tr>
                             <td>13 a 30 años</td>";
                             if($filas2['numero'] == "")
                              echo" <td>0</td>";
                             else
                               echo "<td>".$filas2['numero']."</td>";

                          echo "
                           </tr>
                           <tr>
                             <td>31 a 50 años</td>";
                             if($filas3['numero'] == "")
                              echo" <td>0</td>";
                             else
                               echo "<td>".$filas3['numero']."</td>";

                          echo"
                           </tr>
                           <tr>
                             <td>50 o más años</td>";
                             if($filas4['numero'] == "")
                              echo" <td>0</td>";
                             else
                               echo "<td>".$filas4['numero']."</td>";

                          echo"
                           </tr>
                        </tbody>
                      </table>
                      ";
                    }
                    else {
                      echo "
                      <div class='col s12 m12 l3'>
                        <p>No se han encontrado datos</p>
                      </div>
                      </div>";

                    }

                    if($grafica == TRUE){
                      echo "
                      <div class='col s12 m12 l3'>
                          <img src='../../images/graficas/grafica1.png'/>
                      </div>
                      </div>";

                      echo "
                      <div class='row'>
                        <form action='export_pdf_edades.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                          <input type='hidden' value='".$fecha_final."' name='hasta'/>
                          <input type='hidden' value='".$filas5['numero']."' name='edad1'/>
                          <input type='hidden' value='".$filas2['numero']."' name='edad2'/>
                          <input type='hidden' value='".$filas3['numero']."' name='edad3'/>
                          <input type='hidden' value='".$filas4['numero']."' name='edad4'/>

                          <div class='col s12 m12 l2'>
                            <input id='' value='Generar PDF' type ='submit' onclick=''/>
                          </div>
                        </form>

                        <form action='excel_edades.php' method='POST'>

                        <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                        <input type='hidden' value='".$fecha_final."' name='hasta'/>
                        <input type='hidden' value='".$filas5['numero']."' name='edad1'/>
                        <input type='hidden' value='".$filas2['numero']."' name='edad2'/>
                        <input type='hidden' value='".$filas3['numero']."' name='edad3'/>
                        <input type='hidden' value='".$filas4['numero']."' name='edad4'/>



                          <div class='col s12 m12 l2'>
                            <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                          </div>
                        </form>
                      </div>";
                    }
                  }
                }//fin del primer if

                if ($_COOKIE['tipo_consulta']!="") {


                  $link = require("../connect_db.php");

                  $tipo_consulta = "";
                  $hora = "";
                  $oficina ="";
                  $tipo="";
                  $fecha_inicio="2000/01/01";
                  $fecha_final="2000/01/01";
                  $grafica="";


                  if(isset($_COOKIE['tipo_consulta']))
                   $tipo_consulta = $_COOKIE['tipo_consulta'];

                  if(isset($_COOKIE['hora']))
                    $hora = $_COOKIE['hora'];
                    if($hora=="")
                      $hora="Todas";

                  if(isset($_COOKIE['oficina']))
                    $oficina=$_COOKIE['oficina'];
                    if($oficina=="")
                      $oficina="Todas";
                  if(isset($_COOKIE['tipo']))
                    $tipo=$_COOKIE['tipo'];
                    if($tipo=="")
                      $tipo="Todas";

                  if(isset($_COOKIE['fecha_inicio2'])){
                    $fecha_inicio = $_COOKIE['fecha_inicio2'];
                    //echo "Fecha de inicio $fecha_inicio";
                  }
                  if(isset($_COOKIE['fecha_final2'])){
                    $fecha_final = $_COOKIE['fecha_final2'];
                    //echo "Fecha de inicio $fecha_final";
                  }


                  if($fecha_inicio=="")
                    $fecha_inicio="2000/01/01";
                  if($fecha_final=="")
                    $fecha_final="2000/01/01";

                  //echo "$tipo_consulta Hora: $hora Oficina: $oficina Tipo: $tipo de $fecha_inicio hasta $fecha_final";


                  if($tipo_consulta == "Horario"){

                    if($hora=="Todas"){
                      $consulta1= "SELECT hora, COUNT(hora) as numero
                                  FROM visita
                                  WHERE hora != '' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                  GROUP BY hora";
                      $hora=mysqli_query($link,$consulta1);
                      $numero_filas = mysqli_num_rows($hora);

                      $consulta2 ="SELECT COUNT(hora) as numero
                                  FROM visita
                                  WHERE hora = '9-11' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $hora2=mysqli_query($link,$consulta2);
                      $fila2=mysqli_fetch_assoc($hora2);

                      $consulta3 ="SELECT COUNT(hora) as numero
                                  FROM visita
                                  WHERE hora = '11-13' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $hora3=mysqli_query($link,$consulta3);
                      $fila3=mysqli_fetch_assoc($hora3);

                      $consulta4 ="SELECT COUNT(hora) as numero
                                  FROM visita
                                  WHERE hora = '13-15' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $hora4=mysqli_query($link,$consulta4);
                      $fila4=mysqli_fetch_assoc($hora4);

                      //echo "Numero de filas: $numero_filas";
                      //$data = array();
                      if($numero_filas >0){
                        $grafica = TRUE;

                        echo "
                        <div class='row'>
                          <p>
                            Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                          </p>
                        </div>
                        <table class='col s12 m12 l5'>
                          <thead>
                            <tr>
                              <th>Tramo Horario</th>
                              <th>Número</th>
                            </tr>
                          </thead>

                          <tbody>
                        ";
                        while($fila = mysqli_fetch_assoc($hora)){
                          echo"

                           <tr>
                           <td>".$fila['hora']."</td>
                           <td>".$fila['numero']."</td>
                           </tr>

                          ";
                          //array_push($data,$fila['numero']);
                        }
                        echo "</tbody>
                              </table>
                        ";

                        require_once ('../../jpgraph/src/jpgraph.php');
                        require_once ('../../jpgraph/src/jpgraph_pie.php');
                          //echo $fila4['numero'];

                          $data=array($fila2['numero'],$fila3['numero'],$fila4['numero']);
                          // Create the Pie Graph.
                          $graph = new PieGraph(500,500);

                          $theme_class = new VividTheme();
                          $graph->SetTheme($theme_class);
                          // Set A title for the plot
                          $graph->title->Set("Tramo Horario");
                          $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                          $graph->SetBox(true);

                          // Create
                          $p1 = new PiePlot($data);
                          $graph->Add($p1);

                          $p1->SetLegends(array("9 a 11","11 a 13","13 a 15"));
                          $p1->ShowBorder();
                          $p1->SetColor('black');
                          $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                          $p1->value->SetColor('black');
                          $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                          $graph->legend->SetColor('black');
                          @unlink("../../images/graficas/grafica1.png");
                          $graph->Stroke("../../images/graficas/grafica1.png");


                        if($grafica == TRUE){
                          echo "
                          <div class='col s12 m12 l3'>
                              <img src='../../images/graficas/grafica1.png'/>
                          </div>
                          </div>";

                          echo "
                          <div class='row'>
                            <form action='export_pdf_tramo_horario.php' method='POST'>

                              <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                              <input type='hidden' value='".$fecha_final."' name='hasta'/>
                              <input type='hidden' value='".$fila2['numero']."' name='tramo1'/>
                              <input type='hidden' value='".$fila3['numero']."' name='tramo2'/>
                              <input type='hidden' value='".$fila4['numero']."' name='tramo3'/>

                              <div class='col s12 m12 l2'>
                                <input id='' value='Generar PDF' type ='submit' onclick=''/>
                              </div>
                            </form>
                            <form action='excel_tramo_horario.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                            <input type='hidden' value='".$fecha_final."' name='hasta'/>
                            <input type='hidden' value='".$fila2['numero']."' name='tramo1'/>
                            <input type='hidden' value='".$fila3['numero']."' name='tramo2'/>
                            <input type='hidden' value='".$fila4['numero']."' name='tramo3'/>



                              <div class='col s12 m12 l2'>
                                <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                              </div>
                            </form>
                          </div>";


                        }

                      }
                    }

                    if($hora=="9-11"){
                      $consulta2 ="SELECT COUNT(hora) as numero
                                  FROM visita
                                  WHERE hora = '9-11' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $hora2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tramo Horario</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($hora2)){
                        echo"

                         <tr>
                         <td>9-11</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }
                    if($hora=="11-13"){
                      $consulta2 ="SELECT COUNT(hora) as numero
                                  FROM visita
                                  WHERE hora = '11-13' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $hora2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tramo Horario</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($hora2)){
                        echo"

                         <tr>
                         <td>11-13</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }

                    if($hora=="13-15"){
                      $consulta2 ="SELECT COUNT(hora) as numero
                                  FROM visita
                                  WHERE hora = '13-15' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $hora2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tramo Horario</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($hora2)){
                        echo"

                         <tr>
                         <td>13-15</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";
                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";
                    }

                  }
                  if ($tipo_consulta=="Oficina") {
                    if($oficina=="Todas"){
                      $consulta1= "SELECT oficina, COUNT(oficina) as numero
                                  FROM visita
                                  WHERE oficina != '' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                  GROUP BY oficina";
                      $oficina1=mysqli_query($link,$consulta1);
                      $numero_filas = mysqli_num_rows($oficina1);

                      $consulta2 ="SELECT COUNT(oficina) as numero
                                  FROM visita
                                  WHERE oficina = 'Guia Casco' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $oficina2=mysqli_query($link,$consulta2);
                      $fila2=mysqli_fetch_assoc($oficina2);

                      $consulta3 ="SELECT COUNT(oficina) as numero
                                  FROM visita
                                  WHERE oficina = 'Alcala' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $oficina3=mysqli_query($link,$consulta3);
                      $fila3=mysqli_fetch_assoc($oficina3);

                      $consulta4 ="SELECT COUNT(oficina) as numero
                                  FROM visita
                                  WHERE oficina = 'Playa San Juan' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $oficina4=mysqli_query($link,$consulta4);
                      $fila4=mysqli_fetch_assoc($oficina4);

                      //echo "Numero de filas: $numero_filas";
                      //$data = array();
                      if($numero_filas >0){
                        $grafica = TRUE;

                        echo "
                        <div class='row'>
                          <p>
                            Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                          </p>
                        </div>
                        <table class='col s12 m12 l5'>
                          <thead>
                            <tr>
                              <th>Oficina</th>
                              <th>Número</th>
                            </tr>
                          </thead>

                          <tbody>
                        ";
                        while($fila = mysqli_fetch_assoc($oficina1)){
                          echo"

                           <tr>
                           <td>".$fila['oficina']."</td>
                           <td>".$fila['numero']."</td>
                           </tr>

                          ";
                          //array_push($data,$fila['numero']);
                        }
                        echo "</tbody>
                              </table>
                        ";

                        require_once ('../../jpgraph/src/jpgraph.php');
                        require_once ('../../jpgraph/src/jpgraph_pie.php');
                          //echo $fila4['numero'];

                          $data=array($fila2['numero'],$fila3['numero'],$fila4['numero']);
                          // Create the Pie Graph.
                          $graph = new PieGraph(500,500);

                          $theme_class = new VividTheme();
                          $graph->SetTheme($theme_class);
                          // Set A title for the plot
                          $graph->title->Set("Consultas en oficinas");
                          $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                          $graph->SetBox(true);

                          // Create
                          $p1 = new PiePlot($data);
                          $graph->Add($p1);

                          $p1->SetLegends(array("Guía Casco","Alcalá","Playa San Juan"));
                          $p1->ShowBorder();
                          $p1->SetColor('black');
                          $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                          $p1->value->SetColor('black');
                          $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                          $graph->legend->SetColor('black');
                          @unlink("../../images/graficas/grafica1.png");
                          $graph->Stroke("../../images/graficas/grafica1.png");


                        if($grafica == TRUE){
                          echo "
                          <div class='col s12 m12 l3'>
                              <img src='../../images/graficas/grafica1.png'/>
                          </div>
                          </div>";

                          echo "
                          <div class='row'>
                            <form action='export_pdf_oficina.php' method='POST'>

                              <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                              <input type='hidden' value='".$fecha_final."' name='hasta'/>
                              <input type='hidden' value='".$fila2['numero']."' name='ofi1'/>
                              <input type='hidden' value='".$fila3['numero']."' name='ofi2'/>
                              <input type='hidden' value='".$fila4['numero']."' name='ofi3'/>

                              <div class='col s12 m12 l2'>
                                <input id='' value='Generar PDF' type ='submit' onclick=''/>
                              </div>
                            </form>
                            <form action='excel_oficina.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                            <input type='hidden' value='".$fecha_final."' name='hasta'/>
                            <input type='hidden' value='".$fila2['numero']."' name='ofi1'/>
                            <input type='hidden' value='".$fila3['numero']."' name='ofi2'/>
                            <input type='hidden' value='".$fila4['numero']."' name='ofi3'/>



                              <div class='col s12 m12 l2'>
                                <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                              </div>
                            </form>
                          </div>";
                        }

                      }

                    }
                    if($oficina=="Guia Casco"){
                      $consulta2 ="SELECT COUNT(oficina) as numero
                                  FROM visita
                                  WHERE oficina = 'Guia Casco' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $oficina2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Oficina</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($oficina2)){
                        echo"

                         <tr>
                         <td>Guía Casco</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }

                    if($oficina=="Alcala"){
                      $consulta2 ="SELECT COUNT(oficina) as numero
                                  FROM visita
                                  WHERE oficina = 'Alcala' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $oficina2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Oficina</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($oficina2)){
                        echo"

                         <tr>
                         <td>Alcalá</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }
                    if($oficina=="Playa San Juan"){
                      $consulta2 ="SELECT COUNT(oficina) as numero
                                  FROM visita
                                  WHERE oficina = 'Playa San Juan' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $oficina2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Oficina</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($oficina2)){
                        echo"

                         <tr>
                         <td>Playa San Juan</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }
                  }




                /////////////////////
                /////////////////////
                /////////////////////
                /////////Tipo////////
                  if($tipo_consulta == "Tipo"){

                    if($tipo=="Todas"){
                      $consulta1= "SELECT consulta, COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta != '' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                  GROUP BY consulta";
                      $tipo1=mysqli_query($link,$consulta1);
                      $numero_filas = mysqli_num_rows($tipo1);

                      $consulta2 ="SELECT COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta = 'Corta' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $tipo2=mysqli_query($link,$consulta2);
                      $fila2=mysqli_fetch_assoc($tipo2);

                      $consulta3 ="SELECT COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta = 'Larga' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $tipo3=mysqli_query($link,$consulta3);
                      $fila3=mysqli_fetch_assoc($tipo3);

                      $consulta4 ="SELECT COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta = 'E-mail' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";

                      $tipo4=mysqli_query($link,$consulta4);
                      $fila4=mysqli_fetch_assoc($tipo4);

                      $consulta5 ="SELECT COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta = 'Tfno' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";

                      $tipo5=mysqli_query($link,$consulta5);
                      $fila5=mysqli_fetch_assoc($tipo5);
                      //echo "Numero de filas: $numero_filas";
                      //$data = array();
                      if($numero_filas >0){
                        $grafica = TRUE;

                        echo "
                        <div class='row'>
                          <p>
                            Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                          </p>
                        </div>
                        <table class='col s12 m12 l5'>
                          <thead>
                            <tr>
                              <th>Tipo Consulta</th>
                              <th>Número</th>
                            </tr>
                          </thead>

                          <tbody>
                        ";
                        while($fila = mysqli_fetch_assoc($tipo1)){
                          echo"

                           <tr>
                           <td>".$fila['consulta']."</td>
                           <td>".$fila['numero']."</td>
                           </tr>

                          ";
                          //array_push($data,$fila['numero']);
                        }
                        echo "</tbody>
                              </table>
                        ";

                        require_once ('../../jpgraph/src/jpgraph.php');
                        require_once ('../../jpgraph/src/jpgraph_pie.php');
                          //echo $fila4['numero'];

                          $data=array($fila2['numero'],$fila3['numero'],$fila4['numero'],$fila5['numero']);
                          // Create the Pie Graph.
                          $graph = new PieGraph(500,500);

                          $theme_class = new VividTheme();
                          $graph->SetTheme($theme_class);
                          // Set A title for the plot
                          $graph->title->Set("Tipo de consulta");
                          $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                          $graph->SetBox(true);

                          // Create
                          $p1 = new PiePlot($data);
                          $graph->Add($p1);

                          $p1->SetLegends(array("Corta","Larga","E-mail","Tnfo"));
                          $p1->ShowBorder();
                          $p1->SetColor('black');
                          $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                          $p1->value->SetColor('black');
                          $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                          $graph->legend->SetColor('black');
                          @unlink("../../images/graficas/grafica1.png");
                          $graph->Stroke("../../images/graficas/grafica1.png");


                        if($grafica == TRUE){
                          echo "
                          <div class='col s12 m12 l3'>
                              <img src='../../images/graficas/grafica1.png'/>
                          </div>
                          </div>";

                          echo "
                          <div class='row'>
                            <form action='export_pdf_tipo_consulta.php' method='POST'>

                              <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                              <input type='hidden' value='".$fecha_final."' name='hasta'/>
                              <input type='hidden' value='".$fila2['numero']."' name='tipo1'/>
                              <input type='hidden' value='".$fila3['numero']."' name='tipo2'/>
                              <input type='hidden' value='".$fila4['numero']."' name='tipo3'/>
                              <input type='hidden' value='".$fila5['numero']."' name='tipo4'/>

                              <div class='col s12 m12 l2'>
                                <input id='' value='Generar PDF' type ='submit' onclick=''/>
                              </div>
                            </form>
                          <form action='excel_oficina.php' method='POST'>
                            <form action='excel_tipo_consulta.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio."' name='desde'/>
                            <input type='hidden' value='".$fecha_final."' name='hasta'/>
                            <input type='hidden' value='".$fila2['numero']."' name='tipo1'/>
                            <input type='hidden' value='".$fila3['numero']."' name='tipo2'/>
                            <input type='hidden' value='".$fila4['numero']."' name='tipo3'/>
                            <input type='hidden' value='".$fila5['numero']."' name='tipo4'/>



                              <div class='col s12 m12 l2'>
                                <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                              </div>
                            </form>
                          </div>";
                        }

                      }
                    }

                    if($tipo=="Corta"){
                      $consulta2 ="SELECT COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta = 'Corta' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $tipo2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tipo consulta</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($tipo2)){
                        echo"

                         <tr>
                         <td>Corta</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }

                    if($tipo=="Larga"){
                      $consulta2 ="SELECT COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta = 'Larga' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $tipo2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tipo consulta</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($tipo2)){
                        echo"

                         <tr>
                         <td>Larga</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }

                    if($tipo=="E-mail"){
                      $consulta2 ="SELECT COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta = 'E-mail' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $tipo2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tipo consulta</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($tipo2)){
                        echo"

                         <tr>
                         <td>E-mail</td>
                         <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }

                    if($tipo=="Tfno"){
                      $consulta2 ="SELECT COUNT(consulta) as numero
                                  FROM visita
                                  WHERE consulta = 'Tfno' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'";


                      $tipo2=mysqli_query($link,$consulta2);

                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio."</b><br>Hasta: <b>".$fecha_final."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tipo consulta</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      while($fila2 = mysqli_fetch_assoc($tipo2)){
                        echo"

                         <tr>
                           <td>Tfno</td>
                           <td>".$fila2['numero']."</td>
                         </tr>

                        ";

                      }
                      echo "</tbody>
                            </table>
                            </div>
                      ";

                    }

                  }

                }
                //fin del segundo if


                //comienzo tercer if
                if($alojamiento != ""){
                  /*echo "Esto es alojamiento: $alojamiento";
                  echo "hola";*/
                  if($alojamiento == "Como"){
                    //echo "$alojamiento $fecha_inicio_alo $fecha_final_alo";
                    $consulta="SELECT DISTINCT conocer, COUNT(grupo) as numero
                    FROM perfil_alojamiento NATURAL INNER JOIN visita
                    WHERE conocer !='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                    GROUP BY conocer
                    ORDER BY conocer";

                    $grafica=false;
                    $alo = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($alo) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Cómo conocieron</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $conocer=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($alo)){
                        echo "
                        <tr>
                          <td>".$fila['conocer']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($conocer,$fila['conocer']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');

                        // Create the Pie Graph.
                        $graph = new PieGraph(500,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Cómo conocieron el municipio");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($conocer);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($conocer);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_alojamiento_conocer.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_alojamiento_conocer.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                  if($alojamiento =="Repite Visita"){
                    //echo "$alojamiento";
                    $consulta="SELECT repite, COUNT(repite) as numero
                    FROM perfil_alojamiento NATURAL INNER JOIN visita
                    WHERE repite!='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                    GROUP BY repite";
                    $grafica=false;
                    $alo = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($alo) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Visita</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $repite=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($alo)){
                        echo "
                        <tr>
                          <td>".$fila['repite']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($repite,$fila['repite']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(500,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Repite Visita");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($repite);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($repite);
                        $arr2 = serialize($numero);


                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_alojamiento_repite.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_alojamiento_repite.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }



                  }

                  if($alojamiento =="Tipo de alojamiento"){
                    //echo "$alojamiento";

                    $consulta="SELECT alojamiento, COUNT(alojamiento) as numero
                    FROM perfil_alojamiento NATURAL INNER JOIN visita
                    WHERE alojamiento!='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                    GROUP BY alojamiento";

                    $grafica=false;
                    $alo = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($alo) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Visita</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $alojamiento_tipo=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($alo)){
                        echo "
                        <tr>
                          <td>".$fila['alojamiento']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($alojamiento_tipo,$fila['alojamiento']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Tipo de alojamiento");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($alojamiento_tipo);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($alojamiento_tipo);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_alojamiento_tipo.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_alojamiento_tipo.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }

                  }

                  if($alojamiento =="Motivo de visita"){
                    //echo "$alojamiento";
                    $consulta="SELECT motivo, COUNT(motivo) as numero
                               FROM perfil_alojamiento NATURAL INNER JOIN visita
                               WHERE motivo!='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                               GROUP BY motivo";

                    $grafica=false;
                    $alo = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($alo) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Motivo</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $motivo=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($alo)){
                        echo "
                        <tr>
                          <td>".$fila['motivo']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($motivo,$fila['motivo']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Motivo de la visita");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($motivo);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_alojamiento_motivo.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_alojamiento_motivo.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                  if($alojamiento =="Se aloja"){
                    //echo "$alojamiento";


                    $consulta="SELECT municipio, COUNT(municipio) as numero
                               FROM perfil_alojamiento NATURAL INNER JOIN visita
                               WHERE municipio!='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                               GROUP BY municipio";

                    $grafica=false;
                    $alo = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($alo) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Se aloja en el municipio</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $municipio=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($alo)){
                        echo "
                        <tr>
                          <td>".$fila['municipio']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($municipio,$fila['municipio']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Se aloja en el municipio");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($municipio);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($municipio);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_alojamiento_sealoja.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_alojamiento_sealoja.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                  if($alojamiento =="Tiempo de estancia"){
                    //echo "$alojamiento";


                    $consulta="SELECT tiempo, COUNT(tiempo) as numero
                               FROM perfil_alojamiento NATURAL INNER JOIN visita
                               WHERE tiempo!='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                               GROUP BY tiempo";

                    $grafica=false;
                    $alo = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($alo) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                      </div>

                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tiempo de estancia</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $tiempo=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($alo)){
                        echo "
                        <tr>
                          <td>".$fila['tiempo']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($tiempo,$fila['tiempo']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Tiempo de estancia");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($tiempo);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($tiempo);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_alojamiento_testancia.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_alojamiento_testancia.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                }

                //fin tercer if
                //incio cuarto if
                if($informacion != ""){
                  /*echo "Esto es informacion: $informacion";
                  echo "hola";*/
                  if($informacion == "Recursos"){
                    //echo "$informacion $fecha_inicio_info $fecha_final_info";
                    $consulta="SELECT DISTINCT recursos, COUNT(grupo) as numero
                    FROM informacion_guia NATURAL INNER JOIN visita
                    WHERE recursos !='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                    GROUP BY recursos";
                    /*SELECT DISTINCT recursos, COUNT(grupo) as numero
                    FROM informacion_guia NATURAL INNER JOIN visita
                    WHERE recursos !='' AND fecha BETWEEN '2017/01/01' AND '2017/04/30'
                    GROUP BY recursos;*/

                    $grafica=false;
                    $info = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($info) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Recursos</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $recursos=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($info)){
                        echo "
                        <tr>
                          <td>".$fila['recursos']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($recursos,$fila['recursos']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');

                        // Create the Pie Graph.
                        $graph = new PieGraph(500,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Recursos Solicitados");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($recursos);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($recursos);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_informacion_recursos.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_informacion_recursos.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                  if($informacion =="Alojamiento"){
                    //echo "$informacion";
                    $consulta="SELECT DISTINCT alojamiento, COUNT(grupo) as numero
                    FROM informacion_guia NATURAL INNER JOIN visita
                    WHERE alojamiento !='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                    GROUP BY alojamiento";
                    $grafica=false;
                    $info = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($info) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Alojamiento</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $aloja=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($info)){
                        echo "
                        <tr>
                          <td>".$fila['alojamiento']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($aloja,$fila['alojamiento']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(600,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Alojamentos Solicitados");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($aloja);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($aloja);
                        $arr2 = serialize($numero);


                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_informacion_aloja.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_informacion_aloja.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }



                  }

                  if($informacion =="Transporte"){
                    //echo "$informacion";

                    $consulta="SELECT DISTINCT transporte, COUNT(grupo) as numero
                    FROM informacion_guia NATURAL INNER JOIN visita
                    WHERE transporte !='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                    GROUP BY transporte";

                    $grafica=false;
                    $trans = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($trans) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Transporte</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $transporte=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($trans)){
                        echo "
                        <tr>
                          <td>".$fila['transporte']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($transporte,$fila['transporte']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Transporte Solicitados");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($transporte);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($transporte);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_informacion_transporte.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_informacion_transporte.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }

                  }

                  if($informacion =="Ocio"){
                    //echo "$informacion";
                    $consulta="SELECT DISTINCT ocio, COUNT(grupo) as numero
                               FROM informacion_guia NATURAL INNER JOIN visita
                               WHERE ocio !='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                               GROUP BY ocio";

                    $grafica=false;
                    $ocio = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($ocio) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_alo."</b><br>Hasta: <b>".$fecha_final_alo."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Ocio</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $oci=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($ocio)){
                        echo "
                        <tr>
                          <td>".$fila['ocio']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($oci,$fila['ocio']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Ocio Solicitado");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($oci);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($oci);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_informacion_ocio.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_informacion_ocio.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                  if($informacion =="Eventos"){
                    //echo "$informacion";


                    $consulta="SELECT DISTINCT eventos, COUNT(grupo) as numero
                               FROM informacion_guia NATURAL INNER JOIN visita
                               WHERE eventos !='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                               GROUP BY eventos";

                    $grafica=false;
                    $eve = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($eve) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        <p>
                          Desde: <b>".$fecha_inicio_info."</b><br>Hasta: <b>".$fecha_final_info."</b>
                        </p>
                      </div>
                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Eventos</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $eventos=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($eve)){
                        echo "
                        <tr>
                          <td>".$fila['eventos']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($eventos,$fila['eventos']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Eventos Solicitados");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($eventos);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($eventos);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_informacion_eventos.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_informacion_eventos.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                  if($informacion =="Servicios Publicos"){
                    //echo "$informacion";


                    $consulta="SELECT DISTINCT servicios_publicos, COUNT(grupo) as numero
                               FROM informacion_guia NATURAL INNER JOIN visita
                               WHERE servicios_publicos !='' AND fecha BETWEEN '".$fecha_inicio_alo."' AND '".$fecha_final_alo."'
                               GROUP BY servicios_publicos";

                    $grafica=false;
                    $serv = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($serv) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        Desde el <b>".$fecha_inicio_alo."</b> hasta el <b>".$fecha_final_alo."</b>
                      </div>

                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Servicio Público</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $servicios_publicos=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($serv)){
                        echo "
                        <tr>
                          <td>".$fila['servicios_publicos']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($servicios_publicos,$fila['servicios_publicos']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Tiempo de alojamiento");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($servicios_publicos);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($servicios_publicos);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_informacion_servpublicos.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_informacion_servpublicos.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                  if($informacion =="Tenerife"){
                    //echo "$informacion";


                    $consulta="SELECT DISTINCT info, COUNT(grupo) as numero
                               FROM informacion_tenerife NATURAL INNER JOIN visita
                               WHERE info !='' AND fecha BETWEEN '".$fecha_inicio_info."' AND '".$fecha_final_info."'
                               GROUP BY info";

                    $grafica=false;
                    $info_tene = mysqli_query($link,$consulta);
                    if(mysqli_num_rows($info_tene) >0){
                      $grafica= true;
                      echo "
                      <div class='row'>
                        Desde el <b>".$fecha_inicio_info."</b> hasta el <b>".$fecha_final_info."</b>
                      </div>

                      <table class='col s12 m12 l3'>
                        <thead>
                          <tr>
                            <th>Tenerife Información</th>
                            <th>Número</th>
                          </tr>
                        </thead>

                        <tbody>
                      ";
                      $informacion_tenerife=array();
                      $numero=array();
                      while($fila=mysqli_fetch_assoc($info_tene)){
                        echo "
                        <tr>
                          <td>".$fila['info']."</td>
                          <td>".$fila['numero']."</td>
                        </tr>
                        ";
                        array_push($informacion_tenerife,$fila['info']);
                        array_push($numero,$fila['numero']);
                      }
                      echo "

                          </tbody>
                        </table>
                      ";
                    }

                    if($grafica==true){
                      require_once ('../../jpgraph/src/jpgraph.php');
                      require_once ('../../jpgraph/src/jpgraph_pie.php');
                        // Create the Pie Graph.
                        $graph = new PieGraph(800,500);

                        $theme_class = new VividTheme();
                        $graph->SetTheme($theme_class);
                        // Set A title for the plot
                        $graph->title->Set("Información Tenerife");
                        $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                        $graph->SetBox(true);

                        // Create
                        $p1 = new PiePlot($numero);
                        $graph->Add($p1);

                        $p1->SetLegends($informacion_tenerife);
                        $p1->ShowBorder();
                        $p1->SetColor('black');
                        $p1->value->SetFont(FF_ARIAL,FS_BOLD,12);
                        $p1->value->SetColor('black');
                        $graph->legend->SetFont(FF_ARIAL,FS_BOLD,12);
                        $graph->legend->SetColor('black');
                        @unlink("../../images/graficas/grafica1.png");
                        $graph->Stroke("../../images/graficas/grafica1.png");

                        $arr1 = serialize($informacion_tenerife);
                        $arr2 = serialize($numero);

                        echo "
                          <div class='col s12 m12 l3'>
                            <img src='../../images/graficas/grafica1.png'/>
                          </div>
                        </div>";

                        echo "
                        <div class='row'>
                          <form action='export_pdf_informacion_tenerife.php' method='POST'>

                            <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                            <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                            <input type='hidden' value='".$arr1."' name='arr1'/>
                            <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
                          </form>
                          <form action='excel_informacion_tenerife.php' method='POST'>

                          <input type='hidden' value='".$fecha_inicio_alo."' name='desde'/>
                          <input type='hidden' value='".$fecha_final_alo."' name='hasta'/>
                          <input type='hidden' value='".$arr1."' name='arr1'/>
                          <input type='hidden' value='".$arr2."' name='arr2'/>


                            <div class='col s12 m12 l2'>
                              <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                            </div>
                          </form>
                        </div>";
                    }
                  }

                }


                //fin cuarto if
                //inicio quinto if

                if($material!=""){
                  if($material=="Municipio")


                }
                //final quinto if

                ?>



          <!--FINAL DE LAS ESTADISTICAS-->
        </div>
      </div>

  </main>








<!--FOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOTERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR-->

    <footer class="page-footer-modi">
      <div class="container">
        <div class="row">
          <div class="col m1 l1 s12">
            <img id="escudo-footer" class="responsive-img" src="../../images/Escudos/EscudoLineas2.png" alt="Escudo Guia de Isora">
          </div>
          <div class="col m2 l2 s12">
            <img id="logo-footer" class="responsive-img" src="../../images/Logos/GuiadeIsora_CaracterNatural.png" alt="Guia de Isora Caracter Natural">
          </div>
          <div class="col offset-l1 m4 l4 s12">
            <h5 class="white-text">Turismo</h5>
            <p class="grey-text text-lighten-4">Servicio de turismo para la recogida de datos estadísticos.</p>
          </div>
          <div class="col m4 l4 s12">
            <h5 class="white-text">Contacto</h5>
            <ul>
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Turismo: 922 850 100 (3600)</a></li>
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Informática: 922 850 100 (3108)</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/main.js"></script>
    <script type="text/javascript" src="../../js/encuesta/inicio.js"></script>
    <script type="text/javascript" src="../../js/encuesta/user.js"></script>
    <script type="text/javascript" src="../../js/estadisticas/estadisticas.js"></script>
    <script type="text/javascript" src="../../js/index.js"></script>
    <script type="text/javascript">

    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
    }

      $(document).ready(function(){
       $('ul.tabs').tabs('select_tab', getCookie('last_tab'));
      });


      function person(val) {
        console.log(val);
        document.getElementById('persona_consulta').value = val;

        if(val=="Nacionalidad"){

           var aux = document.getElementById("countries");
           aux.style.display = "";

        }
        else {
          var aux = document.getElementById("countries");
          aux.style.display = "none";
        }



      }
      function nacion(val) {
        document.getElementById('nacion_consulta').value=val;
      }
      function numero_paises(val) {
        document.getElementById('numero_paises').value=val;
      }

      var Persona, Mes, Year, Numero;

      function consult(persona,nacion,numero, fe_ini, fe_fin)
      {
        Persona = persona.value;
        Nacion = nacion.value;
        Inicial= fe_ini.value;
        Final = fe_fin.value;
        //Numero = numero.value;
        Numero = document.getElementById("numero_paises").value;
        //liberar otras cookies
        document.cookie = 'tipo_consulta=""';
        document.cookie = 'hora=""';
        document.cookie = 'oficina =""';
        document.cookie = 'tipo =""';
        document.cookie = 'fecha_inicio2=""';
        document.cookie = 'fecha_final2=""';
        document.cookie = 'alojamiento=""';


        document.cookie = 'persona=' + Persona;
        document.cookie = 'nacion=' + Nacion;
        document.cookie = 'fecha_inicio=' + Inicial;
        document.cookie = 'fecha_final=' + Final;
        document.cookie = 'year=' + Year;
        document.cookie = 'numero_paises='+ Numero;
        document.cookie = 'last_tab=test1';
        window.location="estadisticas.php";
      }






      function consulta(val){
        document.getElementById("tipo_consulta").value=val;
        if(val =="Horario"){
           document.getElementById("horario").style.display="block";
           document.getElementById("oficina").style.display = "none";
           document.getElementById("tipo").style.display = "none";
        }
        else if(val == "Oficina"){
          document.getElementById("horario").style.display="none";
          document.getElementById("oficina").style.display = "block";
          document.getElementById("tipo").style.display = "none";
        }
        else if(val=="Tipo"){
          document.getElementById("horario").style.display = "none";
          document.getElementById("oficina").style.display = "none";
          document.getElementById("tipo").style.display = "block";
        }

      }

      function horario(val){
        document.getElementById("opcion1").value=val;
      }
      function oficina(val){
        document.getElementById("opcion2").value=val;
      }
      function tipo(val){
        document.getElementById("opcion3").value=val;
      }
      var Consulta, Hora, Oficina, Tipo, FInicial, FFinal;
      function consult2(consulta,hora,oficina,tipo,fe_ini,fe_fin){
        //deleteAllCookies();
        Consulta = consulta.value;
        Hora = hora.value;
        Oficina = oficina.value;
        Tipo = tipo.value;
        FInicial = fe_ini.value;
        FFinal = fe_fin.value;


        //liberar otras cookies
        document.cookie = 'persona=""';
        document.cookie = 'nacion=""';
        document.cookie = 'fecha_inicio=""';
        document.cookie = 'fecha_final=""';
        document.cookie = 'year=""';
        document.cookie = 'alojamiento=""';

        document.cookie = 'tipo_consulta=' + Consulta;
        document.cookie = 'hora=' + Hora;
        document.cookie = 'oficina =' + Oficina;
        document.cookie = 'tipo =' + Tipo;
        document.cookie = 'fecha_inicio2=' + FInicial;
        document.cookie = 'fecha_final2=' + FFinal;
        document.cookie = 'last_tab=test2';
        window.location = "estadisticas.php";

      }


      function alojamiento(val){
        document.getElementById('alojamiento_consulta').value = val;
      }
      function consult3(consulta,fe_ini,fe_fin){
        var Alojamiento = consulta.value;
        var FInicial2= fe_ini.value;
        var FFinal2= fe_fin.value;

        document.cookie = 'alojamiento=' + Alojamiento;
        document.cookie = 'fecha_inicio=' + FInicial2;
        document.cookie = 'fecha_final=' + FFinal2;
        document.cookie = 'last_tab=test3';
        window.location = "estadisticas.php";


      }

      function informacion(val){
        document.getElementById('informacion_consulta').value = val;
      }
      function consult4(consulta,fe_ini,fe_fin){
        var Informacion = consulta.value;
        var FInicial3= fe_ini.value;
        var FFinal3= fe_fin.value;

        document.cookie = 'informacion=' + Informacion;
        document.cookie = 'fecha_inicio=' + FInicial3;
        document.cookie = 'fecha_final=' + FFinal3;
        document.cookie = 'last_tab=test4';
        window.location = "estadisticas.php";


      }

      function material(val){
        document.getElementById('materiales_consulta').value = val;
      }
      function consult5(consulta,fe_ini,fe_fin){
        var Material = consulta.value;
        var FInicial3= fe_ini.value;
        var FFinal3= fe_fin.value;

        document.cookie = 'material=' + Material;
        document.cookie = 'fecha_inicio=' + FInicial3;
        document.cookie = 'fecha_final=' + FFinal3;
        document.cookie = 'last_tab=test5';
        window.location = "estadisticas.php";


      }

      function deleteAllCookies() {
        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
      }
}

      $(document).ready(function(){
        $('.modal').modal();
        document.cookie = 'persona=""';
        document.cookie = 'nacion=""';
        document.cookie = 'fecha_inicio=""';
        document.cookie = 'fecha_final=""';
        document.cookie = 'year=""';
        document.cookie = 'tipo_consulta=""';
        document.cookie = 'hora=""';
        document.cookie = 'oficina =""';
        document.cookie = 'tipo =""';
        document.cookie = 'fecha_inicio2=""';
        document.cookie = 'fecha_final2=""';
        document.cookie = 'last_tab=""';
      });

    </script>


  </body>
</html>


<?php
   }else {
       header("Location: ../index.php");
   }
?>
