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
            <div class="col s12 m4 l4">
              <h5>Personas</h5>
              <div class="row">
                <div class="col s12 m8 l8">
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
              <div class="row">
                <div class="col s12 m12 l5">
                  <select name="meses" onchange="mounth(this.value)">
                    <option value="Mes">Mes</option>
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
                <div class="col s12 m12 l3">
                  <select name="years" onchange="date(this.value)">
                    <?php
                      for ($i=2017; $i<=2050; $i++) {
                        echo "<option value='$i'>$i</option>";
                      }
                     ?>
                  </select>
                  <label>year</label>
                  <input id="year_consulta" type="hidden" name="year">
                </div>
              </div>

              <div class="row">
                <div class="col s12 m12 l2">
                  <input id="boton_enviar" value="Buscar" type ="submit" onclick="consult(persona_consulta,mes_consulta,year_consulta)"/>
                </div>
              </div>
            </div>
            <!--Fin Personas-->
            <!--Materiales-->
            <div class="col s12 m4 l4">
              <h5>Materiales</h5>

            </div>
            <!--Fin Materiales-->

            <!--Consulta-->
            <div class="col s12 m4 l4">
              <h5>Consulta</h5>


            </div>
            <!--Fin Consulta-->

          </div>
          <div class="row">
            <table class=" col s12 m12 l10">
              <thead>
                <tr>
                  <th>Tipo</th>
                  <th>Resultado</th>
                </tr>
              </thead>

              <tbody>

                <?php
                  $link = require("../connect_db.php");

                  $persona = "Nacionalidad";
                  $mes = "Todos";
                  $year=date("Y");



                  if(isset($_COOKIE['persona']))
                   $persona = $_COOKIE['persona'];
                  if(isset($_COOKIE['mes']))
                   $mes = $_COOKIE['mes'];
                  if(isset($_COOKIE['year'])){
                    $year = $_COOKIE['year'];
                    if($year == "")
                       $year=date("Y");
                  }


                  if($persona=="")
                    $persona="Nacionalidad";
                  if($mes=="")
                    $mes="Todos";
                  if($mes=="Mes")
                    $mes="Todos";
                  if ($year=='Año')
                    $year=date("Y");

                  echo "$persona $mes $year";

                  if($persona == "Nacionalidad"){
                    if ($mes != "Todos") {
                      
                    }
                  }

                  else if($persona == "Visitas"){

                  }
                  else if($persona == "Visitantes"){

                  }
                  else if($persona == "Edad"){

                  }









                 ?>
              </tbody>

            </table>
          </div>
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
      }
      function mounth(val){
        document.getElementById('mes_consulta').value = val;
      }
      function date(val){
        document.getElementById('year_consulta').value = val;
      }
      var Persona, Mes, Year;

      function consult(persona, mes, year)
      {
        Persona = persona.value;
        Mes = mes.value;
        Year = year.value;

        document.cookie = 'persona=' + Persona;
        document.cookie = 'mes=' + Mes;
        document.cookie = 'year=' + Year;

        window.location="estadisticas.php";
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
