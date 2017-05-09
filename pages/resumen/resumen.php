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
          <div class="row">
            <h4>Resumen diario</h4>
            <h5>Fecha</h5>
            <div class="col s12 m4 l3">
                <input type="text" class="datepicker" id="fecha" name="fecha" placeholder="Día" value="<?php echo date("Y-m-d"); ?>">
            </div>

          </div>

          <div class="row">
            <div class="col s12 m12 l2">
              <input id="boton_enviar" value="Buscar" type ="submit" onclick="consult(fecha)"/>
            </div>
          </div>

                  <?php
                    $link = require("../connect_db.php");
                    $fecha="";
                    if(isset($_COOKIE['fecha'])){
                      $fecha = $_COOKIE['fecha'];


                      if($fecha!=""){
                        $fecha_inicio=$fecha;
                        $fecha_final=$fecha;
                        $consulta="SELECT nacionalidad,COUNT(*) as numero
                                            FROM visita
                                            WHERE fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                            GROUP BY nacionalidad";

                        $nacionalidad = mysqli_query($link,$consulta);
                        $filas = mysqli_fetch_assoc($nacionalidad);
                        $numero_filas = mysqli_num_rows($nacionalidad);
                        $nacionalidad = mysqli_query($link,$consulta);
                        if($numero_filas >0){
                          echo "
                          <div class='row'>
                            <p>
                              Fecha: <b>".$fecha_inicio."</b>
                            </p>

                          <table class='col s12 m5 l3'>
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
                          echo "
                          </tbody>
                          </table>
                          </div>";
                        }
                        $consulta="SELECT material, SUM(cantidad) as numero
                                   FROM V2
                                   GROUP BY material";
                        $vista="   CREATE VIEW V2 AS SELECT grupo, material,cantidad
                                   FROM material_turismo_tenerife NATURAL INNER JOIN visita
                                   WHERE fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                   GROUP by grupo, material";
                        $vista_consulta=mysqli_query($link,$vista);
                        $material_guia = mysqli_query($link,$consulta);
                        $borrar_vista="DROP VIEW V2";
                        mysqli_query($link,$borrar_vista);
                        if(mysqli_num_rows($material_guia) >0){
                          echo "
                          <div class='row'>
                          <table class='col s12 m5 l3'>
                            <thead>
                              <tr>
                                <th>Material Tenerife</th>
                                <th>Número</th>
                              </tr>
                            </thead>
                            <tbody>
                          ";
                          $materiales_guia=array();
                          $numero=array();
                          while($fila=mysqli_fetch_assoc($material_guia)){
                            echo "
                            <tr>
                              <td>".$fila['material']."</td>
                              <td>".$fila['numero']."</td>
                            </tr>
                            ";
                            array_push($materiales_guia,$fila['material']);
                            array_push($numero,$fila['numero']);
                          }
                          echo "
                              </tbody>
                            </table>
                            </div>
                          ";
                        }

                        $consulta="SELECT DISTINCT info, COUNT(grupo) as numero
                                   FROM informacion_tenerife NATURAL INNER JOIN visita
                                   WHERE info !='' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                   GROUP BY info";
                        $info_tene = mysqli_query($link,$consulta);
                        if(mysqli_num_rows($info_tene) >0){
                          $grafica= true;
                          echo "
                          <div class='row'>
                          <table class='col s12 m12 l3'>
                            <thead>
                              <tr>
                                <th>Tenerife Información</th>
                                <th>Número</th>
                              </tr>
                            </thead>
                            <tbody>
                          ";
                          while($fila=mysqli_fetch_assoc($info_tene)){
                            echo "
                            <tr>
                              <td>".$fila['info']."</td>
                              <td>".$fila['numero']."</td>
                            </tr>
                            ";

                          }
                          echo "
                              </tbody>
                            </table>
                            </div>
                          ";
                        }

                        $consulta1= "SELECT consulta, COUNT(consulta) as numero
                                    FROM visita
                                    WHERE consulta != '' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                    GROUP BY consulta";
                        $tipo1=mysqli_query($link,$consulta1);
                        $numero_filas = mysqli_num_rows($tipo1);
                        if($numero_filas >0){
                          $grafica = TRUE;
                          echo "
                          <div class='row'>


                          <table class='col s12 m12 l3'>
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
                                </div>
                          ";
                        }
                        $consulta1= "SELECT hora, COUNT(hora) as numero
                                    FROM visita
                                    WHERE hora != '' AND fecha BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                                    GROUP BY hora";
                        $hora=mysqli_query($link,$consulta1);
                        $numero_filas = mysqli_num_rows($hora);
                        if($numero_filas >0){
                          $grafica = TRUE;
                          echo "
                          <div class='row'>


                          <table class='col s12 m12 l3'>
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
                                </div>
                          ";
                        }
                      }//este es el if de fecha!=""
                    }//este es el primer if del isset
                   ?>

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
      function consult(fecha){
        document.cookie="fecha=" +fecha.value;
        window.location = "resumen.php";
      }

    </script>


  </body>
</html>


<?php
   }else {
       header("Location: ../index.php");
   }
?>
