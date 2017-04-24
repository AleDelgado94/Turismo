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
              }
             ?>

          </ul>
          <form class="col s12 m3 l3" action="../cerrar_sesion.php" method="post">
            <input type="submit" name="cerrar" value="Cerrar Sesión">
          </form>
        </div>
        <div class="col s12 m10 l10">

          <!-- INICIO DE LAS ESTADISTICAS-->
          <div class="row ">
            <div class="col s12">
              <h4>Estadísticas</h4>
            </div>
          </div>
          <div class="row">
            <!-- Personas-->
            <div class="col s12 m4 l2">
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
            <!--Fin Personas-->
            <!--Consulta-->
            <div class="col s12 m4 l2">
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
            <!--Fin Consulta-->

            <!--Perfil y alojamiento-->
            <div class="col s12 m2 l2">
              <h5>Perfil Alojamiento</h5>
              <div class="row">
                <div class="col s12 m8 l12" >
                  <select name='alojamientos' onchange="alojamiento(this.value)">
                       <option value="" disabled selected> Perfil alojamiento</option>
                       <option value='Como'>Cómo conocieron el municipio</option>
                       <option value='Repite Visita'>Repite visita</option>
                       <option value='Tipo de alojamiento'>Tipo de alojamiento</option>
                       <option value='Motivo de visita'>Motivo de visita</option>
                       <option value='Se aloja'>¿Se aloja?</option>
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
            <!--Fin perfil y alojamiento-->


            <!--Informacion-->
            <div class="col s12 m2 l2">
              <h5>Infomación</h5>
              <div class="row">
                <div class="col s12 m12 l6">
                    <input type="text" class="datepicker" id="fecha_ini4" name="fecha_ini4" placeholder="De:">
                </div>
                <div class="col s12 m12 l6">
                    <input type="text" class="datepicker" id="fecha_fin4" name="fecha_fin4" placeholder="Hasta:">
                </div>
              </div>
            </div>
            <!--Informacion-->
            <!--Materiales-->
            <div class="col s12 m2 l2">
              <h5>Materiales</h5>
              <div class="row">
                <div class="col s12 m12 l6">
                    <input type="text" class="datepicker" id="fecha_ini5" name="fecha_ini5" placeholder="De:">
                </div>
                <div class="col s12 m12 l6">
                    <input type="text" class="datepicker" id="fecha_fin5" name="fecha_fin5" placeholder="Hasta:">
                </div>
              </div>
            </div>
            <!--Fin Materiales-->



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

                  if($persona=="")
                    $persona="Nacionalidad";
                  if($fecha_inicio=="")
                    $fecha_inicio="2000/01/01";
                  if($fecha_final=="")
                    $fecha_final="2000/01/01";

                  //echo "$persona $nacion de $fecha_inicio hasta $fecha_final $numero_paises";
                  //echo "$alojamiento $fecha_inicio $fecha_final";

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
                        @unlink("../../images/graficas/grafica1.jpg");
                        $graph->Stroke("../../images/graficas/grafica1.jpg");
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
                        @unlink("../../images/graficas/grafica1.jpg");
                        $graph->Stroke("../../images/graficas/grafica1.jpg");
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
                            <img src='../../images/graficas/grafica1.jpg'/>
                        </div>
                        </div> ";

                        echo "
                        <div class='row'>
                          <div class='col s12 m12 l2'>
                            <input id='' value='Generar PDF' type ='submit' onclick=''/>
                          </div>
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
                      @unlink("../../images/graficas/grafica1.jpg");
                      $graph->Stroke("../../images/graficas/grafica1.jpg");


                      echo "
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
                          <img src='../../images/graficas/grafica1.jpg'/>
                      </div>
                      </div>";

                      echo "
                      <div class='row'>
                        <div class='col s12 m12 l2'>
                          <input id='' value='Generar PDF' type ='submit' onclick=''/>
                        </div>
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
                          @unlink("../../images/graficas/grafica1.jpg");
                          $graph->Stroke("../../images/graficas/grafica1.jpg");


                        if($grafica == TRUE){
                          echo "
                          <div class='col s12 m12 l3'>
                              <img src='../../images/graficas/grafica1.jpg'/>
                          </div>
                          </div>";

                          echo "
                          <div class='row'>
                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
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
                          @unlink("../../images/graficas/grafica1.jpg");
                          $graph->Stroke("../../images/graficas/grafica1.jpg");


                        if($grafica == TRUE){
                          echo "
                          <div class='col s12 m12 l3'>
                              <img src='../../images/graficas/grafica1.jpg'/>
                          </div>
                          </div>";

                          echo "
                          <div class='row'>
                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
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
                          @unlink("../../images/graficas/grafica1.jpg");
                          $graph->Stroke("../../images/graficas/grafica1.jpg");


                        if($grafica == TRUE){
                          echo "
                          <div class='col s12 m12 l3'>
                              <img src='../../images/graficas/grafica1.jpg'/>
                          </div>
                          </div>";

                          echo "
                          <div class='row'>
                            <div class='col s12 m12 l2'>
                              <input id='' value='Generar PDF' type ='submit' onclick=''/>
                            </div>
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
                    echo "$alojamiento";
                    //SELECT DISTINCT grupo, conocer, COUNT(grupo) FROM perfil_alojamiento NATURAL INNER JOIN visita WHERE conocer="Web" AND fecha BETWEEN '2017/04/01' AND '2017/04/31'
                    //SELECT DISTINCT grupo, conocer, COUNT(grupo) FROM perfil_alojamiento NATURAL INNER JOIN visita WHERE conocer !="" AND fecha BETWEEN '2017/04/01' AND '2017/04/31' GROUP BY conocer
                    $consulta="";


                  }

                  if($alojamiento =="Repite Visita"){
                    echo "$alojamiento";

                  }

                  if($alojamiento =="Tipo de alojamiento"){
                    echo "$alojamiento";

                  }

                  if($alojamiento =="Motivo de visita"){
                    echo "$alojamiento";

                  }

                  if($alojamiento =="Se aloja"){
                    echo "$alojamiento";

                  }

                  if($alojamiento =="Tiempo de estancia"){
                    echo "$alojamiento";

                  }

                }

                //fin tercer if



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
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Turismo: 666 666 666</a></li>
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Informática: 666 666 666</a></li>
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
      });

    </script>


  </body>
</html>


<?php
   }else {
       header("Location: ../index.php");
   }
?>
