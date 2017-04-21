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
    <link type="text/css" rel="stylesheet" href="../../css/ocupacion/ocupacion.css"/>
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
            <li><i class="material-icons">trending_up</i><a href="../estadisticas/estadisticas.php">&nbsp; Consultar estadísticas</a></li>
            <li><i class="material-icons">shopping_cart</i><a href="../stock/stock.php">&nbsp; Stock</a></li>
            <li><i class="material-icons">new_releases</i><a href="../incidencias/incidencias.php">&nbsp; Incidencias</a></li>
            <li><i class="material-icons">info</i><a href="../observaciones/observaciones.php">&nbsp; Observaciones</a></li>
            <li><i class="material-icons">credit_card</i><a href="ocupacion.php">&nbsp; Ocupación hotelera</a></li>
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
        <div class="col s12 m8 l8">

          <!-- INICIO DE LAS TABS-->
          <div class="row ">
            <div class="col s12">
              <ul class="tabs tab-modi">
                <li class="tab col s6 m6 l6"><a class="active" href="#consultar">Consultar</a></li>
                <li class="tab col s5 m6 l6"><a href="#anadir">Añadir</a></li>
              </ul>
            </div>
            <!--INICIO AÑADIR INCIDENCIAS-->
            <div id="anadir" class="col s12">
              <form class="col s12 m12 l12" action="add_ocupacion.php" method="post">
                <div class="row">
                  <div class="col s12 m12 l2">
                    <select name="hotel[]">
                      <option value="" disabled selected>Hotel</option>
                      <option value="Allegro Isora">Allegro Isora</option>
                      <option value="Bahia Flamengo">Bahía Flamengo</option>
                      <option value="Palacio de Isora">Palacio de Isora</option>
                      <option value="Ritz Carlton Abama">Ritz Carlton Abama</option>
                    </select>
                    <label>Hotel</label>
                  </div>
                  <div class="col s12 m12 l2">
                    <select name="mes[]">
                      <option value="" disabled selected>Mes</option>
                      <option value="Enero">Enero</option>
                      <option value="Febrero">Febrero</option>
                      <option value="Marzo">Marzo</option>
                      <option value="Abril">Abril</option>
                      <option value="Mayo">Mayo</option>
                      <option value="Junio">Junio</option>
                      <option value="Julio">Julio</option>
                      <option value="Agosto">Agosto</option>
                      <option value="Septiembre">Septiembre</option>
                      <option value="Octubre">Octubre</option>
                      <option value="Noviembre">Noviembre</option>
                      <option value="Diciembre">Diciembre</option>
                    </select>
                    <label>mes</label>
                  </div>
                  <div class="col s12 m12 l2">
                    <select name="year[]">
                      <?php
                        for ($i=2017; $i<=2050; $i++) {
                          echo "<option value='$i'>$i</option>";
                        }
                       ?>

                    </select>
                    <label>year</label>

                  </div>
                  <div class=" col s12 m12 l2">
                    <input placeholder="Ocupacion (%)" id="ocupacion" name="ocupacion" type="text" class="validate">
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <input id="boton_enviar" value="Añadir ocupacion" type ="submit"/>
                  </div>
                </div>

              </form>

            </div>
            <!--FINAL DE AÑADIR INCIDENCIAS-->



            <!--INICIO DE CONSULTAR INCIDENCIAS-->
            <div id="consultar" class="col s12">

              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="row">
                    <h5 class="left-align">Ocupación Hotelera</h5>

                      <div class="col s12 m12 l2">
                        <select name="hoteles" onchange="hot(this.value)">
                          <option value="Hotel">Hotel</option>
                          <option value="Allegro Isora">Allegro Isora</option>
                          <option value="Bahia Flamengo">Bahía Flamengo</option>
                          <option value="Palacio de Isora">Palacio de Isora</option>
                          <option value="Ritz Carlton Abama">Ritz Carlton Abama</option>
                          <option value="Todos">Todos</option>
                        </select>
                        <label>Hotel</label>
                        <input id="hotel_consulta" type="hidden" name="hotel">
                      </div>

                      <div class="col s12 m12 l2">
                        <select name="meses" onchange="mounth(this.value)">
                          <option value="Mes">Mes</option>
                          <option value="Trimestral">Trimestral</option>
                          <option value="Enero">Enero</option>
                          <option value="Febrero">Febrero</option>
                          <option value="Marzo">Marzo</option>
                          <option value="Abril">Abril</option>
                          <option value="Mayo">Mayo</option>
                          <option value="Junio">Junio</option>
                          <option value="Julio">Julio</option>
                          <option value="Agosto">Agosto</option>
                          <option value="Septiembre">Septiembre</option>
                          <option value="Octubre">Octubre</option>
                          <option value="Noviembre">Noviembre</option>
                          <option value="Diciembre">Diciembre</option>
                          <option value="Todos">Todos</option>
                        </select>
                        <label>mes</label>
                        <input id="mes_consulta" type="hidden" name="mes">
                      </div>

                      <div style="display:none" id="primer_mes_select" class="col s12 m12 l2">
                        <select name="meses2" onchange="primer_mes(this.value)">
                          <option value=""disabled selected>Desde</option>
                          <option value="Enero">Enero</option>
                          <option value="Febrero">Febrero</option>
                          <option value="Marzo">Marzo</option>
                          <option value="Abril">Abril</option>
                          <option value="Mayo">Mayo</option>
                          <option value="Junio">Junio</option>
                          <option value="Julio">Julio</option>
                          <option value="Agosto">Agosto</option>
                          <option value="Septiembre">Septiembre</option>
                          <option value="Octubre">Octubre</option>
                          <option value="Noviembre">Noviembre</option>
                          <option value="Diciembre">Diciembre</option>
                          <option value="Todos">Todos</option>
                        </select>
                        <label>desde</label>
                        <input id="primer_mesito" type="hidden" name="primer_mesito">
                      </div>


                      <div class="col s12 m12 l2">
                        <select name="years" onchange="date(this.value)">
                          <option  value="" disabled selected>Año</option>
                          <?php
                            for ($i=2017; $i<=2050; $i++) {
                              echo "<option value='$i'>$i</option>";
                            }
                           ?>

                        </select>
                        <label>year</label>
                        <input id="year_consulta" type="hidden" name="year">

                      </div>
                      <div class="col s12 m12 l2">
                        <input id="boton_enviar" value="Buscar" type ="submit" onclick="consult(hotel_consulta,mes_consulta,year_consulta, primer_mesito)"/>
                      </div>



                  </div>
                  <div class="row">

                      <?php
                      /*require_once ('../../dompdf/autoload.inc.php');

                      // reference the Dompdf namespace
                        use Dompdf\Dompdf;

                        // instantiate and use the dompdf class
                        $dompdf = new Dompdf();
                        $dompdf->loadHtml('hello world');

                        // (Optional) Setup the paper size and orientation
                        $dompdf->setPaper('A4', 'landscape');

                        // Render the HTML as PDF
                        $dompdf->render();

                        // Output the generated PDF to Browser
                        $dompdf->stream();*/

                       ?>

                       <?php
                         $link = require("../connect_db.php");


                         $hotel = "";
                         $mes = "";
                         $year=date("Y");
                         $primer_mes="";
                         $grafica=false;

                         if(isset($_COOKIE['hotel']))
                          $hotel = $_COOKIE['hotel'];
                         if(isset($_COOKIE['mes']))
                          $mes = $_COOKIE['mes'];
                         if(isset($_COOKIE['year'])){
                           $year = $_COOKIE['year'];
                           if($year == "")
                              $year=date("Y");
                         }


                         if(isset($_COOKIE['primero'])){
                           $primer_mes = $_COOKIE['primero'];
                         }


                          if($hotel=="")
                            $hotel="Todos";
                          if($hotel=="Hotel")
                            $hotel="Todos";
                          if($mes=="")
                            $mes="Todos";
                          if($mes=="Mes")
                            $mes="Todos";
                          if ($year=='Año')
                            $year=date("Y");


                          //$year ="2017";
                          //$mes="Enero";
                          //echo "$hotel $mes $year $primer_mes";

                          if($mes =="Trimestral"){

                            if($primer_mes=="Enero"){
                              $fecha="$year/01/01";
                              $fecha_final="$year/03/01";
                            }
                            else if($primer_mes=="Febrero"){
                              $fecha="$year/02/01";
                              $fecha_final="$year/04/01";
                            }
                            else if($primer_mes=="Marzo"){
                              $fecha="$year/03/01";
                              $fecha_final="$year/05/01";
                            }
                            else if($primer_mes=="Abril"){
                              $fecha="$year/04/01";
                              $fecha_final="$year/06/01";
                            }
                            else if($primer_mes=="Mayo"){
                              $fecha="$year/05/01";
                              $fecha_final="$year/07/01";
                            }
                            else if($primer_mes=="Junio"){
                              $fecha="$year/06/01";
                              $fecha_final="$year/08/01";
                            }
                            else if($primer_mes=="Julio"){
                              $fecha="$year/07/01";
                              $fecha_final="$year/09/01";
                            }
                            else if($primer_mes=="Agosto"){
                              $fecha="$year/08/01";
                              $fecha_final="$year/10/01";
                            }
                            else if($primer_mes=="Septiembre"){
                              $fecha="$year/09/01";
                              $fecha_final="$year/11/01";
                            }
                            else if($primer_mes=="Octubre"){
                              $fecha="$year/10/01";
                              $fecha_final="$year/12/01";
                            }
                            else if($primer_mes=="Noviembre"){
                              $fecha="$year/11/01";
                              $year_dos=$year+1;
                              $fecha_final="$year_dos/01/01";
                            }
                            else if($primer_mes=="Diciembre"){
                              $fecha="$year/12/01";
                              $year_dos=$year+1;
                              $fecha_final="$year_dos/02/01";
                            }


                            if($hotel != "Todos" || $hotel!= ""){
                              $grafica = false;
                              $consulta = "SELECT mes, CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                           FROM ocupacion_hoteles
                                           WHERE hotel = '".$hotel."' AND fecha BETWEEN '".$fecha."' AND '".$fecha_final."'
                                           GROUP BY mes
                                           ORDER BY fecha";

                               $trimestral = mysqli_query($link,$consulta);
                               if(mysqli_num_rows($trimestral)>0){
                                 $grafica=true;
                                 echo"
                                 <table class='col s12 m4 l4'>
                                  <thead>
                                    <tr>
                                      <th data-field='name'>Mes</th>
                                      <th data-field='name'>Media ocupacional</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                ";
                                $array_ocupacion = array();
                                $array_mes=array();
                                 while($fila=mysqli_fetch_assoc($trimestral)){
                                   echo "
                                   <tr>
                                     <td>".$fila['mes']."</td>
                                     <td>".$fila['ocupacion']."%</td>
                                   </tr>
                                   ";
                                   array_push($array_ocupacion,$fila['ocupacion']);
                                   array_push($array_mes,$fila['mes']);
                                 }
                                 echo "
                                   </tbody>
                                 </table>
                                 ";
                               }

                               if($grafica==true){
                                 require_once ('../../jpgraph/src/jpgraph.php');
                                 require_once ('../../jpgraph/src/jpgraph_bar.php');

                                 // Some data
                                 $data1y=$array_ocupacion;


                                 // Create the graph. These two calls are always required
                                 $graph = new Graph(400,400,'auto');
                                 $graph->SetScale("textlin");

                                 $theme_class=new UniversalTheme;
                                 $graph->SetTheme($theme_class);

                                 $graph->yaxis->SetTickPositions(array(0,30,40,50,60,65,70,75,80,85,90,95,100));
                                 $graph->yaxis->SetFont(FF_ARIAL,FS_BOLD,12);
                                 $graph->SetBox(false);

                                 $graph->ygrid->SetFill(false);
                                 $graph->xaxis->SetTickLabels(array($array_ocupacion[0]."%\n".$array_mes[0],$array_ocupacion[1]."%\n".$array_mes[1],$array_ocupacion[2]."%\n".$array_mes[2]));
                                 //$graph->xaxis->SetTickLabels(array(10,25,36,10));
                                 $graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,11);
                                 $graph->yaxis->HideLine(false);
                                 $graph->yaxis->HideTicks(false,false);

                                 // Create the bar plots
                                 $b1plot = new BarPlot($data1y);


                                 // Create the grouped bar plot
                                 $gbplot = new GroupBarPlot(array($b1plot));
                                 // ...and add it to the graPH
                                 $graph->Add($gbplot);


                                 $b1plot->SetColor("white");
                                 $b1plot->SetFillColor(array("#FFB70E","#FCFF00","#00AFFF"));

                                 $graph->title->Set("Media de ".$mes." de cada hotel");
                                 $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                                 // Display the graph
                                 $graph->Stroke("../../images/graficas/grafica1.jpg");




                                 echo "
                                   <div class='col s12 m8 l8'>
                                      <img src='../../images/graficas/grafica1.jpg'/>
                                   </div>
                                   <div class='row'>
                                     <div class='col s12 m12 l2'>
                                       <input id='' value='Generar PDF' type ='submit' onclick=''/>
                                     </div>
                                     <div class='col s12 m12 l2'>
                                       <input id='boton_enviar' value='Generar EXCEL' type ='submit' onclick=''/>
                                     </div>
                                   </div>

                                   ";
                               }
                            }


                          }


                        else{

                          //Cuando se selecciona un hotel
                         if($hotel != 'Todos'){
                           //cuando se selecciona un mes
                           if($mes != 'Todos' && $mes != 'Trimestral'){
                             //echo "Estoy aqui";
                               $consulta = "SELECT hotel,ocupacion
                                            FROM ocupacion_hoteles
                                            WHERE hotel='".$hotel."' AND mes='".$mes."' AND ano='".$year."';";
                               $ocupacion = mysqli_query($link,$consulta);
                               $numero_filas = mysqli_num_rows($ocupacion);
                               //echo $numero_filas;
                               if ($numero_filas > 0) {
                                 while($fila = mysqli_fetch_assoc($ocupacion)){
                                   echo"
                                   <div class='col s12 m12 l12'>
                                      <p>Ocupacion de <b>".$mes."</b> de <b>".$year."</b> del <b>".$fila['hotel']."</b> es: <b>".$fila['ocupacion']."%</b></p>
                                   </div>
                                   ";
                                 }
                               }

                             }
                             //cuando no se seleccione un mes
                             else{
                                $consulta = "SELECT hotel, CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                            FROM ocupacion_hoteles
                                            WHERE hotel = '".$hotel."' AND ano='".$year."';";
                                $ocupacion = mysqli_query($link,$consulta);
                                $numero_filas = mysqli_num_rows($ocupacion);
                                //echo "Numero de filas = $numero_filas";
                                //echo"estoy aqui";

                                if ($numero_filas > 0) {
                                  while($fila = mysqli_fetch_assoc($ocupacion)){
                                    echo"
                                    <table class='col s12 m4 l4'>
                                     <thead>
                                       <tr>
                                         <th data-field='name'>Hotel</th>
                                         <th data-field='name'>Media anual</th>
                                         <th data-field='name'>Año</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <td>".$fila['hotel']."</td>
                                         <td>".$fila['ocupacion']."%</td>
                                         <td>".$year."</td>
                                       </tr>
                                     </tbody>
                                   </table>
                                    ";
                                    $grafica=true;
                                  }

                                  $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
                                  //$ocupacion = ["","","","","","","","","","","",""];
                                  //$dato_mes=["","","","","","","","","","","",""];

                                  for ($i=0; $i <12 ; $i++) {
                                    //echo $meses[$i];
                                    $consultas[$i] = "SELECT hotel, CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                                 FROM ocupacion_hoteles
                                                 WHERE hotel = '".$hotel."' AND mes='".$meses[$i]."' AND ano='".$year."';";
                                   $aux = $consultas[$i];
                                   $ocupacion = mysqli_query($link,$aux);
                                   $datos_mes[$i]= mysqli_fetch_assoc($ocupacion);
                                   //echo $datos_mes[$i]['ocupacion'];
                                 }
                                 if($grafica==true){
                                   require_once ('../../jpgraph/src/jpgraph.php');
                                   require_once ('../../jpgraph/src/jpgraph_bar.php');

                                   // Some data
                                    $data1y = array($datos_mes[0]['ocupacion'],$datos_mes[1]['ocupacion'],
                                                    $datos_mes[2]['ocupacion'],$datos_mes[3]['ocupacion'],
                                                    $datos_mes[4]['ocupacion'],$datos_mes[5]['ocupacion'],
                                                    $datos_mes[6]['ocupacion'],$datos_mes[7]['ocupacion'],
                                                    $datos_mes[8]['ocupacion'],$datos_mes[9]['ocupacion'],
                                                    $datos_mes[10]['ocupacion'],$datos_mes[11]['ocupacion']);



                                   // Create the graph. These two calls are always required
                                   $graph = new Graph(1000,500,'auto');
                                   $graph->SetScale("textlin");

                                   $theme_class=new UniversalTheme;
                                   $graph->SetTheme($theme_class);

                                   $graph->yaxis->SetTickPositions(array(0,30,40,50,60,65,70,75,80,85,90,95,100));
                                   $graph->yaxis->SetFont(FF_ARIAL,FS_BOLD,12);
                                   $graph->SetBox(false);

                                   $graph->ygrid->SetFill(false);
                                   $graph->xaxis->SetTickLabels(array($datos_mes[0]['ocupacion']."%\nEnero",$datos_mes[1]['ocupacion']."%\nFebrero",
                                                                      $datos_mes[2]['ocupacion']."%\nMarzo",$datos_mes[3]['ocupacion']."%\nAbril",
                                                                      $datos_mes[4]['ocupacion']."%\nMayo",$datos_mes[5]['ocupacion']."%\nJunio",
                                                                      $datos_mes[6]['ocupacion']."%\nJulio",$datos_mes[7]['ocupacion']."%\nAgosto",
                                                                      $datos_mes[8]['ocupacion']."%\nSeptiembre",$datos_mes[9]['ocupacion']."%\nOctubre",
                                                                      $datos_mes[10]['ocupacion']."%\nNoviembre",$datos_mes[11]['ocupacion']."%\nDiciembre",));
                                   $graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,11);
                                   $graph->yaxis->HideLine(false);
                                   $graph->yaxis->HideTicks(false,false);

                                   // Create the bar plots
                                   $b1plot = new BarPlot($data1y);


                                   // Create the grouped bar plot
                                   $gbplot = new GroupBarPlot(array($b1plot));
                                   // ...and add it to the graPH
                                   $graph->Add($gbplot);


                                   $b1plot->SetColor("white");
                                   $b1plot->SetFillColor(array("#FF0000","#FF8000","#FFFF00","#40FF00",
                                                                "#01DFD7","#0174DF","#FF00FF","#000000",
                                                                "#BDBDBD","#08088A","#8A0808","#088A08"));

                                   $graph->title->Set("Media por mes $hotel");
                                   $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                                   // Display the graph
                                   $graph->Stroke("../../images/graficas/grafica1.jpg");

                                   echo "
                                     <div class='col s12 m8 l8'>
                                        <img src='../../images/graficas/grafica1.jpg'/>
                                     </div>

                                     <div class='row'>
                                       <div class='col s12 m12 l2'>
                                         <input id='' value='Generar PDF' type ='submit' onclick=''/>
                                       </div>
                                       <div class='col s12 m12 l2'>
                                         <input id='boton_enviar' value='Generar EXCEL' type ='submit' onclick=''/>
                                       </div>
                                     </div>
                                     ";
                                 }

                                }


                             }

                          }
                          //cuando no se selecciona ningun hotel
                          else {
                            //cuando se selecciona un mes
                            if ($mes != 'Todos' && $mes != 'Trimestral') {

                             $consulta ="SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                         FROM ocupacion_hoteles
                                         WHERE mes ='".$mes."' AND ano ='".$year."';";
                             $ocupacion = mysqli_query($link,$consulta);
                             $numero_filas = mysqli_num_rows($ocupacion);
                             //echo "Numero de filas = $numero_filas";
                             //$fila = mysqli_fetch_assoc($ocupacion);
                             if ($numero_filas >0) {
                               $grafica=true;
                               while($fila = mysqli_fetch_assoc($ocupacion)){
                                 echo"
                                 <div class='col s12 m2 l4'>
                                    <p>Media de <b>".$mes."</b> de <b>".$year."</b> de todos los hoteles es: <b>".$fila['ocupacion']."%<b></p>
                                 </div>

                                 ";
                               }

                               //media anual del Allegro
                               $consulta2 = "SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                            FROM ocupacion_hoteles
                                            WHERE hotel = 'Allegro Isora' AND mes='".$mes."' AND ano='".$year."';";
                               $media_Allegro = mysqli_query($link,$consulta2);
                               $fila2 = mysqli_fetch_assoc($media_Allegro);

                               //media anual del Flamengo
                               $consulta3 = "SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                            FROM ocupacion_hoteles
                                            WHERE hotel = 'Bahia Flamengo' AND mes='".$mes."' AND ano='".$year."';";
                               $media_Flamengo = mysqli_query($link,$consulta3);
                               $fila3 = mysqli_fetch_assoc($media_Flamengo);

                               //media anual del Palacio
                               $consulta4 = "SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                            FROM ocupacion_hoteles
                                            WHERE hotel = 'Palacio de Isora' AND mes='".$mes."' AND ano='".$year."';";
                               $media_Palacio = mysqli_query($link,$consulta4);
                               $fila4 = mysqli_fetch_assoc($media_Palacio);

                               //media anual del Abama
                               $consulta5 = "SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                            FROM ocupacion_hoteles
                                            WHERE hotel = 'Ritz Carlton Abama' AND mes='".$mes."' AND ano='".$year."';";
                               $media_Abama = mysqli_query($link,$consulta5);
                               $fila5 = mysqli_fetch_assoc($media_Abama);


                               //echo "Media del Allegro " .$fila2['AVG(ocupacion)'];
                               //echo " Media del Flamengo " .$fila3['AVG(ocupacion)'];
                               //echo " Media del Palacio " .$fila4['AVG(ocupacion)'];
                               //echo " Media del Abama " .$fila5['AVG(ocupacion)'];

                               if($grafica==true){
                                 require_once ('../../jpgraph/src/jpgraph.php');
                                 require_once ('../../jpgraph/src/jpgraph_bar.php');

                                 // Some data
                                 $data1y=array($fila2['ocupacion'],$fila3['ocupacion'],$fila4['ocupacion'],$fila5['ocupacion']);



                                 // Create the graph. These two calls are always required
                                 $graph = new Graph(500,500,'auto');
                                 $graph->SetScale("textlin");

                                 $theme_class=new UniversalTheme;
                                 $graph->SetTheme($theme_class);

                                 $graph->yaxis->SetTickPositions(array(0,30,40,50,60,65,70,75,80,85,90,95,100));
                                 $graph->yaxis->SetFont(FF_ARIAL,FS_BOLD,12);
                                 $graph->SetBox(false);

                                 $graph->ygrid->SetFill(false);
                                 $graph->xaxis->SetTickLabels(array($fila2['ocupacion']."%\nAllegro Isora",$fila3['ocupacion']."%\nFlamengo",$fila4['ocupacion']."%\nPalacio Isora",$fila5['ocupacion']."%\nAbama"));
                                 //$graph->xaxis->SetTickLabels(array(10,25,36,10));
                                 $graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,11);
                                 $graph->yaxis->HideLine(false);
                                 $graph->yaxis->HideTicks(false,false);

                                 // Create the bar plots
                                 $b1plot = new BarPlot($data1y);


                                 // Create the grouped bar plot
                                 $gbplot = new GroupBarPlot(array($b1plot));
                                 // ...and add it to the graPH
                                 $graph->Add($gbplot);


                                 $b1plot->SetColor("white");
                                 $b1plot->SetFillColor(array("#FFB70E","#FCFF00","#00AFFF","#E72222"));

                                 $graph->title->Set("Media de ".$mes." de cada hotel");
                                 $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                                 // Display the graph
                                 $graph->Stroke("../../images/graficas/grafica1.jpg");

                                 echo "
                                 <br><br><br>
                                  <div class='row'>
                                    <div class='col s12 m12 l12'>
                                      <img src='../../images/graficas/grafica1.jpg'/>
                                    </div>
                                  </div>
                                  <div class='row'>
                                    <div class='col s12 m12 l2'>
                                      <input id='' value='Generar PDF' type ='submit' onclick=''/>
                                    </div>
                                    <div class='col s12 m12 l2'>
                                      <input id='boton_enviar' value='Generar EXCEL' type ='submit' onclick=''/>
                                    </div>
                                  </div>
                                   ";
                               }

                             }


                            }
                            //cuando no se selecciona ningun mes
                            else{
                              $consulta ="SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                          FROM ocupacion_hoteles
                                          WHERE ano ='".$year."';";
                              $ocupacion = mysqli_query($link,$consulta);
                              $numero_filas = mysqli_num_rows($ocupacion);
                              if ($numero_filas >0) {
                                $grafica=true;
                                while($fila = mysqli_fetch_assoc($ocupacion)){
                                  echo"
                                    <div class='col s12 m2 l4'>
                                       <p>Media de <b>".$year."</b> de todos los hoteles es: ".$fila['ocupacion']."%</p>
                                    </div>
                                  ";
                                }


                                //media anual del Allegro
                                $consulta2 = "SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                             FROM ocupacion_hoteles
                                             WHERE hotel = 'Allegro Isora' AND ano='".$year."';";
                                $media_Allegro = mysqli_query($link,$consulta2);
                                $fila2 = mysqli_fetch_assoc($media_Allegro);

                                //media anual del Flamengo
                                $consulta3 = "SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                             FROM ocupacion_hoteles
                                             WHERE hotel = 'Bahia Flamengo' AND ano='".$year."';";
                                $media_Flamengo = mysqli_query($link,$consulta3);
                                $fila3 = mysqli_fetch_assoc($media_Flamengo);

                                //media anual del Palacio
                                $consulta4 = "SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                             FROM ocupacion_hoteles
                                             WHERE hotel = 'Palacio de Isora' AND ano='".$year."';";
                                $media_Palacio = mysqli_query($link,$consulta4);
                                $fila4 = mysqli_fetch_assoc($media_Palacio);

                                //media anual del Abama
                                $consulta5 = "SELECT CAST(AVG(ocupacion) AS DECIMAL(10,2)) AS ocupacion
                                             FROM ocupacion_hoteles
                                             WHERE hotel = 'Ritz Carlton Abama' AND ano='".$year."';";
                                $media_Abama = mysqli_query($link,$consulta5);
                                $fila5 = mysqli_fetch_assoc($media_Abama);


                                //echo "Media del Allegro " .$fila2['AVG(ocupacion)'];
                                //echo " Media del Flamengo " .$fila3['AVG(ocupacion)'];
                                //echo " Media del Palacio " .$fila4['AVG(ocupacion)'];
                                //echo " Media del Abama " .$fila5['AVG(ocupacion)'];
                                if($grafica==true){
                                  require_once ('../../jpgraph/src/jpgraph.php');
                                  require_once ('../../jpgraph/src/jpgraph_bar.php');

                                  // Some data
                                  $data1y=array($fila2['ocupacion'],$fila3['ocupacion'],$fila4['ocupacion'],$fila5['ocupacion']);



                                  // Create the graph. These two calls are always required
                                  $graph = new Graph(500,500,'auto');
                                  $graph->SetScale("textlin");

                                  $theme_class=new UniversalTheme;
                                  $graph->SetTheme($theme_class);

                                  $graph->yaxis->SetTickPositions(array(0,30,40,50,60,65,70,75,80,85,90,95,100));
                                  $graph->yaxis->SetFont(FF_ARIAL,FS_BOLD,12);
                                  $graph->SetBox(false);

                                  $graph->ygrid->SetFill(false);
                                  $graph->xaxis->SetTickLabels(array($fila2['ocupacion']."%\nAllegro Isora",$fila3['ocupacion']."%\nFlamengo",$fila4['ocupacion']."%\nPalacio Isora",$fila5['ocupacion']."%\nAbama"));
                                  //$graph->xaxis->SetTickLabels(array(10,25,36,10));
                                  $graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,11);
                                  $graph->yaxis->HideLine(false);
                                  $graph->yaxis->HideTicks(false,false);

                                  // Create the bar plots
                                  $b1plot = new BarPlot($data1y);


                                  // Create the grouped bar plot
                                  $gbplot = new GroupBarPlot(array($b1plot));
                                  // ...and add it to the graPH
                                  $graph->Add($gbplot);


                                  $b1plot->SetColor("white");
                                  $b1plot->SetFillColor(array("#FFB70E","#FCFF00","#00AFFF","#E72222"));

                                  $graph->title->Set("Media anual de cada hotel");
                                  $graph->title->SetFont(FF_ARIAL,FS_BOLD,15);
                                  // Display the graph
                                  $graph->Stroke("../../images/graficas/grafica1.jpg");

                                  echo "
                                  <br><br><br>
                                   <div class='row'>
                                     <div class='col s12 m12 l12'>
                                       <img src='../../images/graficas/grafica1.jpg'/>
                                     </div>
                                   </div>
                                   <div class='row'>
                                     <div class='col s12 m12 l2'>
                                       <input id='' value='Generar PDF' type ='submit' onclick=''/>
                                     </div>
                                     <form action='generar_excel.php' method='POST'>


                                       <input type='hidden' value='".$fila2['ocupacion']."' name='por_Allegro'/>
                                       <input type='hidden' value='".$fila3['ocupacion']."' name='por_Flamengo'/>
                                       <input type='hidden' value='".$fila4['ocupacion']."' name='por_Palacio'/>
                                       <input type='hidden' value='".$fila5['ocupacion']."' name='por_Abama'/>
                                       <input type='hidden' value='".$year."' name='year_ocu'/>
                                       <input type='hidden' value='".$fila['ocupacion']."' name='media_total'/>




                                       <div class='col s12 m12 l2'>
                                         <input id='boton_enviar' value='Generar EXCEL' type ='submit'/>
                                       </div>
                                     </form>

                                   </div>
                                    ";
                                }
                              }

                            }
                          }
                        }
                        ?>



                  </div>

                </div>
              </div>

            </div>
            <!--FINAL DE CONSULTAR INCIDENCIAS-->
          </div>
          <!--FINAL DE LAS TABS-->




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
    <script type="text/javascript" src="../../js/ocupacion/ocupacion.js"></script>
    <script type="text/javascript" src="../../js/index.js"></script>
    <script type="text/javascript">
      function hot(val) {
        console.log(val);
        document.getElementById('hotel_consulta').value = val;
      }
      function mounth(val){
        document.getElementById('mes_consulta').value = val;
        if(val =="Trimestral")
          document.getElementById('primer_mes_select').style.display="block";
        else
          document.getElementById('primer_mes_select').style.display="none";

      }
      function primer_mes(val){
        document.getElementById('primer_mesito').value=val;
      }
      function date(val){
        document.getElementById('year_consulta').value = val;
      }


      var Hotel, Mes, Year, Primer;

      function consult(hotel, mes, year, primero)
      {
        Hotel = hotel.value;
        Mes = mes.value;
        Year = year.value;
        Primer = primero.value;
        document.cookie = 'hotel=' + Hotel;
        document.cookie = 'mes=' + Mes;
        document.cookie = 'year=' + Year;
        document.cookie = 'primero='+ Primer;
        window.location="ocupacion.php";
      }






      $(document).ready(function(){
        $('.modal').modal();
        document.cookie = 'hotel=""';
        document.cookie = 'mes=""';
        document.cookie = 'year=""';
        document.cookie = 'primero=""';
      });



    </script>


  </body>
</html>


<?php
   }else {
       header("Location: ../index.php");
   }
?>
