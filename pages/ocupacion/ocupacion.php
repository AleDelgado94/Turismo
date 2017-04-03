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
            <li><i class="material-icons">trending_up</i><a href="#">&nbsp; Consultar estadísticas</a></li>
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


                    <table class="responsive-table">
                     <thead>
                       <tr>
                           <th data-field="name">Hotel</th>
                           <th data-field="name">Ocupacion</th>

                       </tr>
                     </thead>

                     <tbody>

                     <?php
                        /************ MOSTRAR RESULTADOS CONSULTA INCIDENCIAS ****************/


                        $link = require("../connect_db.php");

                        $consulta_observacion= "SELECT hotel,ocupacion FROM ocupacion_hoteles;";


                        if($observaciones = mysqli_query($link, $consulta_observacion)){

                          while ($fila = mysqli_fetch_assoc($observaciones)) {

                            echo "
                              <tr>
                                <td> ".$fila['hotel']." </td> <!-- TITULO -->
                                <td> ".$fila['ocupacion']." </td> <!-- LUGAR  -->


                              </tr>";
                          }
                        }

                      ?>
                      </tbody>
                   </table>
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
      function ofi(val) {
        console.log(val);
        document.getElementById('oficina_consulta_incidencia').value = val;
      }
      function place(val){
        document.getElementById('lugar_consulta_incidencia').value = val;
      }

      var Oficina, Lugar, Fecha_inicio, Fecha_final;

      function consult(oficina, lugar, fecha_inicio, fecha_final)
      {
        Oficina = oficina.value;
        Lugar = lugar.value;
        Fecha_inicio = fecha_inicio.value;
        Fecha_final = fecha_final.value;

        document.cookie = 'oficina=' + Oficina;
        document.cookie = 'lugar=' + Lugar;
        document.cookie = 'fecha_ini=' + Fecha_inicio;
        document.cookie = 'fecha_fin=' + Fecha_final;

        window.location="incidencias.php";
      }

      $(document).ready(function(){
        $('.modal').modal();
      });

    </script>


  </body>
</html>


<?php
   }else {
       header("Location: ../index.php");
   }
?>
