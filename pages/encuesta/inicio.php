<?php

   //include('connect_db'); // incluímos los datos de acceso a la BD
   // comprobamos que se haya iniciado la sesión

    session_start();

   if(isset($_SESSION['usuario'])) {
     $username = $_SESSION['usuario'];
?>
       <!-- Aquí ponemos todo el código HTML de nuestra página restringida, desde <html> a </html>-->

<!DOCTYPE html>
<html lang="es">
  <head>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../../css/font-awesome.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/encuesta/inicio.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="../../image/png" href="http://www.guiadeisora.org/corp/wp-content/themes/FoundationPress-master/assets/img/icons/favicon.ico" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.min.css">
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>



    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Turismo - Base de datos</title>
  </head>
  <body>

  <header>


    <nav class="#424242 grey darken-3 top-nav">
      <div class="container-fluid">
        <div class="nav-wrapper">
          <a class="brand-logo left"><img id="escudo-nav" src="../../images/Escudos/Escudo_AyuntamientoGuiadeIsora1.png" alt="Escudo Guía de Isora"></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="main.php">Inicio</a></li>
            <li><a href="http://www.guiadeisora.org/corp">Ayuntamiento</a></li>
            <li><a href="http://www.guiadeisora.travel/turismo">Turismo</a></li>
          </ul>
          <ul id="mobile-demo" class="side-nav">
            <li><a href="main.php">Inicio</a></li>
            <li><a href="http://www.guiadeisora.org/corp">Ayuntamiento</a></li>
            <li><a href="http://www.guiadeisora.travel/turismo">Turismo</a></li>
          </ul>
        </div>
      </div>

    </nav>


  </header>

  <main>
      <div class="row">
        <div class="col s12 m3 ">
          <ul class="menu">
            <li><i class="material-icons">perm_identity</i><?php echo "<span class='usuario_panel'>&nbsp; Usuario:
            $username
            </span>"; ?></li>
            <li><i class="material-icons">replay</i><a href="../main.php">&nbsp; Inicio</a></li>
            <li><i class="material-icons">mode_edit</i><a href="#">&nbsp; Encuesta</a></li>
            <li><i class="material-icons">trending_up</i><a href="#">&nbsp; Consultar estadísticas</a></li>
            <li><i class="material-icons">new_releases</i><a href="#">&nbsp; Incidencias</a></li>
            <?php
              if($username == 'admin'){
                echo "<li> <i class='material-icons'>contacts</i><a href='../gestion_usuarios.php'>&nbsp; Gestión de usuario</a></li>";
              }
             ?>

          </ul>
          <form class="col s12 m3" action="../cerrar_sesion.php" method="post">
            <input type="submit" name="cerrar" value="Cerrar Sesión">
          </form>
        </div>
        <div class="col s12 m9 l9 center">

          <div class="row">
            <div class="col s12">
              <ul class="tabs tab-modi">
                <li class="tab col s12 m3 l3"><a class="active" href="#test1">Visita</a></li>
                <li class="tab col s12 m3 l3"><a href="#test2">Perfil y Alojamiento</a></li>
                <li class="tab col s12 m3 l3"><a href="#test3">Información</a></li>
                <li class="tab col s12 m3 l3"><a href="#test4">Materiales</a></li>
              </ul>
            </div>
            <div id="test1" class="col s12 ">

              <div class="row">
                <div class="col s12 m6 l6">

                  <br>
                  <div class="row">
                    <div class="col s12 m4">
                      <h5 class="col-center">Tipo de consulta</h5>
                    </div>
                    <div class="col s12 m3 ">
                      <p>
                        <input type="radio" name="encuesta" class="with-gap" id="enc_corta" />
                        <label for="enc_corta">Corta&nbsp;</label>
                      </p>
                      <p>
                        <input type="radio" name="encuesta" class="with-gap" id="enc_larga" />
                        <label for="enc_larga">Larga&nbsp;</label>
                      </p>
                      <p>
                        <input type="radio" name="encuesta" class="with-gap" id="enc_telephone" />
                        <label for="enc_telephone">Tfno&nbsp;&nbsp;</label>
                      </p>
                      <p>
                        <input type="radio" name="encuesta" class="with-gap" id="enc_email" />
                        <label for="enc_email">E-mail</label>
                      </p>
                    </div>
                  </div>

                  <br>

                  <div class="row">
                    <div class="col s12 m4">
                      <h5 class="col-center">Hora de consulta</h5>
                    </div>
                    <div class="col s12 m3 ">
                      <p>
                        <input type="radio" name="horas" class="with-gap" id="9a11" />
                        <label for="9a11">9-11&nbsp;</label>
                      </p>
                      <p>
                        <input type="radio" name="horas" class="with-gap" id="11a13" />
                        <label for="11a13">11-13</label>
                      </p>
                      <p>
                        <input type="radio" name="horas" class="with-gap" id="13a15" />
                        <label for="13a15">13-15</label>
                      </p>
                    </div>
                  </div>

                  <br>

                  <div class="row">
                    <div class="col s12 m3 ">
                      <div id="datepicker"></div>
                      <div id="datos">
                        <input type='text' name='fecha' id='fecha' value="<?php echo date('d-m-y');?>" readonly />
                      </div>
                    </div>
                  </div>



                </div>
                <div class="col s12 m6 l6">

                </div>
              </div>
            </div>











<!--ALOJAMIENTOOOOOOOOOOOOOOOOOOOO-->
            <div id="test2" class="col s12 m12 l12">

              <!-- PRIMERA FILA -->
                <div class="row">
                  <!-- PRIMERA COLUMNA -->
                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>¿Cómo conocieron el municipio?</h5>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo1" type="radio" id="conoce1"  />
                        <label for="conoce1">Redes sociales</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo1" type="radio" id="conoce2"  />
                        <label for="conoce2">Web</label>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo1" type="radio" id="conoce3"  />
                        <label for="conoce3">Hoteles</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo1" type="radio" id="conoce4"  />
                        <label for="conoce4">Visitas Anteriores</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo1" type="radio" id="conoce5"  />
                        <label for="conoce5">Otros</label>
                      </p>
                    </div>
                  </div>

                  <!-- SEGUNDA COLUMNA -->
                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>¿Repite visita?</h5>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo2" type="radio" id="si1"  />
                        <label for="si1">Sí</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo2" type="radio" id="no1"  />
                        <label for="no1">No</label>
                    </div>
                  </div>

                  <!-- TERCERA COLUMNA -->
                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>Tipo de Alojamiento</h5>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo3" type="radio" id="tip1"  />
                        <label for="tip1">Hotel</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo3" type="radio" id="tip6"  />
                        <label for="tip6">Apartamento</label>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo3" type="radio" id="tip2"  />
                        <label for="tip2">Turismo rural</label>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo3" type="radio" id="tip3"  />
                        <label for="tip3">Camping</label>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo3" type="radio" id="tip4"  />
                        <label for="tip4">Amigos/Familiares</label>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo3" type="radio" id="tip5"  />
                        <label for="tip5">Vivienda vacacional</label>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo3" type="radio" id="tip7"  />
                        <label for="tip7">Otros</label>
                    </div>
                  </div>

                </div>




                <!-- SEGUNDA FILA -->

                <div class="row">
                  <!-- PRIMERA COLUMNA -->
                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>Motivo de visita al municipio</h5>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo4" type="radio" id="motivo1"  />
                        <label for="motivo1">Clima</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo4" type="radio" id="motivo2"  />
                        <label for="motivo2">Tranquilidad</label>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo4" type="radio" id="motivo3"  />
                        <label for="motivo3">Ocio</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo4" type="radio" id="motivo4"  />
                        <label for="motivo4">Oferta Cultural</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo4" type="radio" id="motivo5"  />
                        <label for="motivo5">Gastronomía</label>
                      </p>
                    </div>

                  </div>

                  <!-- SEGUNDA COLUMNA -->
                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>Se aloja en el municipio</h5>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo5" type="radio" id="si2"  />
                        <label for="si2">Sí</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo5" type="radio" id="no2"  />
                        <label for="no2">No</label>
                    </div>
                  </div>

                  <!-- TERCERA COLUMNA -->
                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>Tiempo de estancia</h5>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo6" type="radio" id="esta1"  />
                        <label for="esta1">Menos de 1 semana</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo6" type="radio" id="esta2"  />
                        <label for="esta2">1 semana</label>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input class="with-gap" name="alo6" type="radio" id="esta3"  />
                        <label for="esta3">Más de 1 semana</label>
                    </div>

                  </div>

                </div>







            </div>
            <!-- FIN ALOJAMIENTOOOOOOOOOOOOOO-->

            <div id="test3" class="col s12">









            </div>
            <div id="test4" class="col s12">


            </div>
          </div>


          <!-- Fin row tab-->
          </div>
          <!-- fin columna grande -->
        </div>
  </main>



    <footer class="page-footer-modi">
      <div class="container">
        <div class="row">
          <div class="col l1 s12">
            <img id="escudo-footer" class="responsive-img" src="../../images/Escudos/EscudoLineas2.png" alt="Escudo Guia de Isora">
          </div>
          <div class="col l2 s12">
            <img id="logo-footer" class="responsive-img" src="../../images/Logos/GuiadeIsora_CaracterNatural.png" alt="Guia de Isora Caracter Natural">
          </div>
          <div class="col offset-l1 l4 s12">
            <h5 class="white-text">Turismo</h5>
            <p class="grey-text text-lighten-4">Servicio de turismo para la recogida de datos estadísticos.</p>
          </div>
          <div class="col l4 s12">
            <h5 class="white-text">Contacto</h5>
            <ul>
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Turismo: 666 666 666</a></li>
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Informática: 666 666 666</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script>
      $( "#datepicker" ).datepicker({
          // Formato de la fecha
          dateFormat: "dd/mm/yy",
          // Primer dia de la semana El lunes
          firstDay: 1,
          // Dias Largo en castellano
          dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
          // Dias cortos en castellano
          dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
          // Nombres largos de los meses en castellano
          monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
          // Nombres de los meses en formato corto
          monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
          // Cuando seleccionamos la fecha esta se pone en el campo Input
          onSelect: function(dateText) {
                $('#fecha').val(dateText);
            }
      });
      </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/main.js"></script>


  </body>
</html>


<?php
   }else {
       header("Location: ../../index.php");
   }
?>
