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
    <link type="text/css" rel="stylesheet" href="../../css/encuesta/themes/default.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/encuesta/themes/default.date.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="../../image/png" href="http://www.guiadeisora.org/corp/wp-content/themes/FoundationPress-master/assets/img/icons/favicon.ico" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.min.css">





    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Turismo - Base de datos</title>
  </head>
  <body>

  <header>


    <nav class="#424242 grey darken-3 top-nav">
      <div class="container-fluid">
        <div class="nav-wrapper">     //document.getElementById('user').appendChild(newscript);

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

          <form class="col s12 m12 l12" action="../cerrar_sesion.php" method="post">
            <input type="submit" name="cerrar" value="Cerrar Sesión">
          </form>

      <form class="col s12 m3" action="validar_encuesta.php" method="post">
              <input class="#00e676 green accent-3 enviar_encuesta" type="submit" name="send" value="Enviar encuesta">


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
                  <div class="col s12 m12 l4">

                    <br>
                    <div class="row">
                      <div class="col s12 m3 ">
                        <div id="datepicker"></div>
                        <div id="datos">
                          <input type='text' name='fecha' id='fecha' value="<?php echo date('d/m/y');?>" readonly />
                        </div>
                      </div>
                    </div>



                    <div class="row">
                      <div class="col s12 m12 l12 left-align">
                        <div class="row-modi">
                          <h5>Tipo de consulta</h5>
                        </div>

                        <div class="row-modi">
                          <p>
                            <input type="radio" name="encuesta" value="Corta" class="with-gap" onclick="uncheckRadio(this)"  id="enc_corta" />
                            <label for="enc_corta">Corta&nbsp;</label>
                          </p>
                        </div>

                        <div class="row-modi">
                          <p>
                            <input type="radio" name="encuesta" value="Larga" class="with-gap" onclick="uncheckRadio(this)" id="enc_larga" />
                            <label for="enc_larga">Larga&nbsp;</label>
                          </p>
                        </div>

                        <div class="row-modi">
                          <p>
                            <input type="radio" name="encuesta" value="Tfno" class="with-gap" onclick="uncheckRadio(this)"  id="enc_telephone" />
                            <label for="enc_telephone">Tfno&nbsp;&nbsp;</label>
                          </p>
                        </div>

                        <div class="row-modi">
                          <p>
                            <input type="radio" name="encuesta" value="E-mail" class="with-gap" onclick="uncheckRadio(this)" id="enc_email" />
                            <label for="enc_email">E-mail</label>
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col s12 m12 l12 left-align">
                        <div class="row-modi">
                          <h5>Hora consulta</h5>
                        </div>

                        <div class="row-modi">
                          <p>
                            <input type="radio" name="horas" value="9-11" class="with-gap" onclick="uncheckRadio(this)" id="9a11" />
                            <label for="9a11">9-11&nbsp;</label>
                          </p>
                        </div>

                        <div class="row-modi">
                          <p>
                            <input type="radio" name="horas" value="11-13" class="with-gap" onclick="uncheckRadio(this)" id="11a13" />
                            <label for="11a13">11-13</label>
                          </p>
                        </div>

                        <div class="row-modi">
                          <p>
                            <input type="radio" name="horas" value="13-15" class="with-gap" onclick="uncheckRadio(this)" id="13a15" />
                            <label for="13a15">13-15</label>
                          </p>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col s12 m12 l12">
                        <h5 class="left-align">Oficina</h5>
                      </div>
                      <div class="col s12 m6 l6 left-align">
                        <select name="oficinas" onchange="cambio(this.value)">
                          <option  value="" disabled selected>Oficina</option>
                          <option  value="Alcalá">Alcalá</option>
                          <option  value="Playa San Juan">Playa San Juan</option>
                          <option  value="Guía Casco">Guía Casco</option>
                        </select>
                        <input id="oficina" type="hidden" name="oficina">
                      </div>
                    </div>
                  </div>


                  <div class="col s12 m12 l6">
                    <div class="row">
                      <div class="col s12 m6">
                        <h5 class="left-align">Añadir visitante</h5>

                        <input type="hidden" name="n_personas" id="n_personas" value="0">


                        <div class="row">
                          <div class="col s12 m12 l12 left-align">
                            <a class="waves-effect waves-light btn #00e676 green accent-3" id="add_user">Añadir</a>
                            <!--<a class="btn-floating waves-effect " id="add_user"><i class="material-icons">add</i></a>-->
                          </div>

                        </div>
                        <div class="row">
                          <div class="col s12 m12 l12 left-align">
                            <!--<a class="btn-floating waves-effect" id="rm_user"><i class="material-icons">replay</i></a>-->
                            <a class="waves-effect waves-light btn #ef5350 red lighten-1" id="rm_user">Borrar</a>
                          </div>
                        </div>

                      </div>

                    </div>

                    <div id="user">


                    </div>

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
                          <input type="checkbox" name="alo1" value="Redes sociales" id="conoce1" />
                          <label for="conoce1">Playas</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="alo1" value="Web" id="conoce2"  />
                          <label for="conoce2">Web</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input name="alo1" value="Hoteles" type="checkbox" id="conoce3"  />
                          <label for="conoce3">Hoteles</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input name="alo1" value="Visitas anteriores" type="checkbox"  id="conoce4"  />
                          <label for="conoce4">Visitas anteriores</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input name="alo1" value="Otros" type="checkbox"  id="conoce5"  />
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
                          <input class="with-gap" name="alo2" value="Si" type="radio" onclick="uncheckRadio(this)" id="si1"  />
                          <label for="si1">Sí</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo2" value="No" type="radio" onclick="uncheckRadio(this)" id="no1"  />
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
                          <input class="with-gap" name="alo3" value="Hotel" type="radio" onclick="uncheckRadio(this)" id="tip1"  />
                          <label for="tip1">Hotel</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo3" value="Apartamento" type="radio" onclick="uncheckRadio(this)" id="tip6"  />
                          <label for="tip6">Apartamento</label>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo3" value="Turismo rural" type="radio" onclick="uncheckRadio(this)" id="tip2"  />
                          <label for="tip2">Turismo rural</label>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo3" value="Camping" type="radio" onclick="uncheckRadio(this)" id="tip3"  />
                          <label for="tip3">Camping</label>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo3" value="Amigos_familiares" type="radio" onclick="uncheckRadio(this)" id="tip4"  />
                          <label for="tip4">Amigos/Familiares</label>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo3" value="Vivienda vacacional" type="radio" onclick="uncheckRadio(this)" id="tip5"  />
                          <label for="tip5">Vivienda vacacional</label>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo3" value="Otros" type="radio" onclick="uncheckRadio(this)" id="tip7"  />
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
                          <input name="alo4" value="Clima" type="checkbox" id="motivo1"  />
                          <label for="motivo1">Clima</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input name="alo4" value="Tranquilidad" type="checkbox" id="motivo2"  />
                          <label for="motivo2">Tranquilidad</label>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input name="alo4" value="Ocio" type="checkbox"  id="motivo3"  />
                          <label for="motivo3">Ocio</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input name="alo4" value="Oferta Cultural" type="checkbox" id="motivo4"  />
                          <label for="motivo4">Oferta Cultural</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input name="alo4" value="Gastronomía" type="checkbox" id="motivo5"  />
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
                          <input class="with-gap" name="alo5" value="Si" type="radio" onclick="uncheckRadio(this)" id="si2"  />
                          <label for="si2">Sí</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo5" value="No" type="radio" onclick="uncheckRadio(this)" id="no2"  />
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
                          <input class="with-gap" name="alo6" value="Menos de 1 semana" type="radio" onclick="uncheckRadio(this)" id="esta1"  />
                          <label for="esta1">Menos de 1 semana</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo6" value="1 semana" type="radio" onclick="uncheckRadio(this)" id="esta2"  />
                          <label for="esta2">1 semana</label>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input class="with-gap" name="alo6" value="Más 1 semana" type="radio" onclick="uncheckRadio(this)" id="esta3"  />
                          <label for="esta3">Más de 1 semana</label>
                      </div>

                    </div>

                  </div>







              </div>
              <!-- FIN ALOJAMIENTOOOOOOOOOOOOOO-->


              <!-- INICIO DE INFORMACION SOLICITADA-->
              <div id="test3" class="col s12">
                <!-- PRIMERA FILA -->
                  <div class="row">
                    <h4 class="left-align">Guía de Isora</h4>
                    <hr>
                    <!-- PRIMERA COLUMNA -->
                    <div class="col s12 m4 l4 left-align">
                      <div class="row-modi">
                        <h5>Recursos</h5>
                      </div>

                      <div class="row-modi">

                        <p>
                          <input type="checkbox" name="recurso1" value="Playas" id="recurso1" />
                          <label for="recurso1">Playas</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="recurso2" value="Senderos" id="recurso2" />
                          <label for="recurso2">Senderos</label>
                        </p>
                      </div>

                      <div class="row-modi">

                        <p>
                          <input type="checkbox" name="recurso3" value="Otros" id="recurso3" />
                          <label for="recurso3">Otros</label>
                        </p>
                      </div>


                    </div>

                    <!-- SEGUNDA COLUMNA -->
                    <div class="col s12 m4 l4 left-align">
                      <div class="row-modi">
                        <h5>Alojamiento</h5>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="aloj1" value="Hoteles" id="aloj1" />
                          <label for="aloj1">Hoteles</label>
                        </p>
                      </div>
                      <div class="row-modi">
                          <p>
                            <input type="checkbox" name="aloj2" value="Apartaments" id="aloj2" />
                            <label for="aloj2">Apartamentos</label>
                          </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="aloj3" value="Turismo Rural" id="aloj3" />
                          <label for="aloj3">Turismo Rural</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="aloj4" value="Camping" id="aloj4" />
                          <label for="aloj4">Camping</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="aloj5" value="Vivienda Vacacional" id="aloj5" />
                          <label for="aloj5">Vivienda Vacacional</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="aloj6" value="Otros" id="aloj6" />
                          <label for="aloj6">Otros</label>
                        </p>
                      </div>
                    </div>

                    <!-- TERCERA COLUMNA -->
                    <div class="col s12 m4 l4 left-align">
                      <div class="row-modi">
                        <h5>Transporte</h5>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="trans" value="Guaguas" id="trans1" />
                          <label for="trans1">Guaguas</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="trans2" value="Taxi"  id="trans2" />
                          <label for="trans2">Taxi</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="trans3" value="Rent a car" id="trans3" />
                          <label for="trans3">Rent a car</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="trans4" value="Otros" id="trans4" />
                          <label for="trans4">Otros</label>
                        </p>
                      </div>
                    </div>

                  </div>




                  <!-- SEGUNDA FILA -->

                  <div class="row">
                    <!-- PRIMERA COLUMNA -->
                    <div class="col s12 m4 l4 left-align">
                      <div class="row-modi">
                        <h5>Ocio</h5>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="oci1" value="Deportes" id="oci1" />
                          <label for="oci1">Deportes</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="oci2" value="Restaurantes" id="oci2" />
                          <label for="oci2">Restaurantes</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="oci3" value="Excursiones" id="oci3" />
                          <label for="oci3">Excursiones</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="oci4" value="Compras" id="oci4" />
                          <label for="oci4">Compras</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="oci5" value="Mercados" id="oci5" />
                          <label for="oci5">Mercados</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="oci6" value="Otros" id="oci6" />
                          <label for="oci6">Otros</label>
                        </p>
                      </div>

                    </div>

                    <!-- SEGUNDA COLUMNA -->
                    <div class="col s12 m4 l4 left-align">
                      <div class="row-modi">
                        <h5>Enventos</h5>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" class="eve1" value="Gastronómicos" id="eve1" />
                          <label for="eve1">Gastronómicos</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" class="eve2" value="Fiestas" id="eve2" />
                          <label for="eve2">Fiestas</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" class="eve3" value="Miradas Doc" id="eve3" />
                          <label for="eve3">Miradas Doc</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" class="eve4" value="Pascua Florida" id="eve4" />
                          <label for="eve4">Pascua Florida</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" class="eve5" value="Eventos Culturales" id="eve5" />
                          <label for="eve5">Eventos Culturales</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" class="eve6" value="Eventos tradicionales" id="eve6" />
                          <label for="eve6">Eventos tradicionales</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" class="eve7" value="Otros" id="eve7" />
                          <label for="eve7">Otros</label>
                        </p>
                      </div>

                    </div>

                    <!-- TERCERA COLUMNA -->
                    <div class="col s12 m4 l4 left-align">
                      <div class="row-modi">
                        <h5>Servicios Públicos</h5>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="servi1" value="Baños" id="servi1" />
                          <label for="servi1">Baños</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="servi2" value="Policía" id="servi2" />
                          <label for="servi2">Policía</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="servi3" value="Centros Médicos" id="servi3" />
                          <label for="servi3">Centros Médicos</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="servi4" value="Ayuntamiento" id="servi4" />
                          <label for="servi4">Ayuntamiento</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="servi5" value="Correo" id="servi5" />
                          <label for="servi5">Correo</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="servi6" value="Direcciones específicas" id="servi6" />
                          <label for="servi6">Direcciones específicas</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="servi7" value="Otros" id="servi7" />
                          <label for="servi7">Otros</label>
                        </p>
                      </div>
                    </div>


                  </div>


                  <!-- Tercera FILA -->

                  <div class="row">

                    <h4 class="left-align">Tenerife</h4>
                    <hr>
                    <!-- Primera COLUMNA -->
                    <div class="col s12 m4 l4 left-align">
                      <div class="row-modi">
                        <h5>Información Solicitada</h5>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo1" value="Teide" id="tfinfo1" />
                          <label for="tfinfo1">Teide</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo2" value="Playas" id="tfinfo2" />
                          <label for="tfinfo2">Playas</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo3" value="Eventos culturales" id="tfinfo3" />
                          <label for="tfinfo3">Eventos culturales</label>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo4" value="Guaguas" id="tfinfo4" />
                          <label for="tfinfo4">Guaguas</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo5" value="Taxi" id="tfinfo5" />
                          <label for="tfinfo5">Taxi</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo6" value="Rent a car" id="tfinfo6" />
                          <label for="tfinfo6">Rent a car</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo7" value="Ocio" id="tfinfo7" />
                          <label for="tfinfo7">Ocio: atracciones, excursiones en barco</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo8" value="Transporte marítimo" id="tfinfo8" />
                          <label for="tfinfo8">Transporte marítimo</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo9" value="Alojamiento" id="tfinfo9" />
                          <label for="tfinfo9">Alojamiento</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo10" value="Direcciones específicas" id="tfinfo10" />
                          <label for="tfinfo10">Direcciones específicas</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo11" value="Meteo" id="tfinfo11" />
                          <label for="tfinfo11">Meteo</label>
                        </p>
                      </div>
                      <div class="row-modi">
                        <p>
                          <input type="checkbox" name="tfinfo12" value="Otras solicitudes" id="tfinfo12" />
                          <label for="tfinfo12">Otras solicitudes</label>
                        </p>
                      </div>
                    </div>


                  </div>

              </div>
              <!--FIN DE INFORMACION SOLICITADA-->

              <!-- INICIO DE MATERIALES-->
            <div id="test4" class="col s12">

                <div class="row">
                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>Municipio</h5>
                    </div>
                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="callejero">Callejero</scan>
                        <input id="callejero" name="callejero" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="mapa_senderos">Mapa de senderos</scan>
                        <input id="mapa_senderos" name="mapa_senderos" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="guias_turisticas">Guías turísticas</scan>
                        <input id="guias_turisticas" name="guias_turisticas" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="folleto_eventos_municipales">Folleto eventos municipales</scan>
                        <input id="folleto_eventos_municipales" name="folleto_eventos_municipales" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="folleto_ocio">Folleto ocio</scan>
                        <input id="folleto_ocio" name="folleto_ocio" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                  </div>

                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>Otros Municipios</h5>
                    </div>
                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="callejero">Callejero</scan>
                        <input id="callejero" name="callejero" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="folleto_ocio_otros">Folleto ocio</scan>
                        <input id="folleto_ocio_otros" name="folleto_ocio_otros" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="otros_otros">Otros</scan>
                        <input id="otros_otros" name="otros_otros" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>
                  </div>

                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>De otras islas</h5>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="mapas_islas">Mapas</scan>
                        <input id="mapas_islas" name="mapas_islas" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="otros_islas">Otros</scan>
                        <input id="otros_islas" name="otros_islas" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>
                </div>

                </div>

                <div class="row">
                  <div class="col s12 m4 l4 left-align">
                    <div class="row-modi">
                      <h5>Turismo de Tenerife</h5>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="mapa_tenerife">Mapa Tenerife</scan>
                        <input id="mapa_tenerife" name="mapa_tenerife" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="mapa_block_sur">Mapa block zona sur</scan>
                        <input id="mapa_block_sur" name="mapa_block_sur" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="tenerife_coche">Tenerife en coche</scan>
                        <input id="tenerife_coche" name="tenerife_coche" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="tradiciones_tenerife">Tradiciones en Tenerife</scan>
                        <input id="tradiciones_tenerife" name="tradiciones_tenerife" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="tenerife_pie">Tenerife a pie</scan>
                        <input id="tenerife_pie" name="tenerife_pie" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="tenerife_cetaceos">Tenerife avistamiento de cetáceos</scan>
                        <input id="tenerife_cetaceos" name="tenerife_cetaceos" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="guia_de_tenerife">Guía de Tenerife</scan>
                        <input id="guia_de_tenerife" name="guia_de_tenerife" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="gastronomia_tenerife">Gastronomía en Tenerife</scan>
                        <input id="gastronomia_tenerife" name="gastronomia_tenerife" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="tenerife_natural_rural">Tenerife Natural y Rural</scan>
                        <input id="tenerife_natural_rural" name="tenerife_natural_rural" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="tenerife_familia">Tenerife en familia</scan>
                        <input id="tenerife_familia" name="tenerife_familia" type="range" value=0 step=1 min=0 max=10>
                      </p>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col s12 m4 l4 left-align">
                      <div class="row-modi">
                        <h5>Material Promocional</h5>
                      </div>

                      <div class="row-modi">
                        <p class="range-field">
                          <scan for="periodico_revista">Periódico/Revista</scan>
                          <input id="periodico_revista" name="periodico_revista" type="range" value=0 step=1 min=0 max=10>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p class="range-field">
                          <scan for="folleto_bus">Folleto Bus</scan>
                          <input id="folleto_bus" name="folleto_bus" type="range" value=0 step=1 min=0 max=10>
                        </p>
                      </div>

                      <div class="row-modi">
                        <p class="range-field">
                          <scan for="otros_promocional">Otros</scan>
                          <input id="otros_promocional" name="otros_promocional" type="range" value=0 step=1 min=0 max=10>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
            <!-- Fin row tab-->
            </div>
            <!-- fin columna grande -->
          </div>
          </div>
        </form>

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






    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/main.js"></script>
    <script type="text/javascript" src="../../js/encuesta/inicio.js"></script>
    <script type="text/javascript" src="../../js/encuesta/user.js"></script>
    <script type="text/javascript" src="../../js/encuesta/legacy.js"></script>
    <script type="text/javascript" src="../../js/encuesta/picker.js"></script>
    <script type="text/javascript" src="../../js/encuesta/picker.date.js"></script>
    <script type="text/javascript" src="../../js/encuesta/translations/es_ES.js"></script>


  </body>
</html>


<?php
   }else {
       header("Location: ../../index.php");
   }
?>
