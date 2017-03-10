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
                    <div class="col s12 m3 ">
                      <div id="datepicker"></div>
                      <div id="datos">
                        <input type='text' name='fecha' id='fecha' value="<?php echo date('d-m-y');?>" readonly />
                      </div>
                    </div>
                  </div>

                  <br>

                  <div class="row">
                    <div class="col s12 m4">
                      <h5 class="col-center">Tipo de consulta</h5>
                    </div>
                    <div class="col s12 m3 left-align">
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
                    <div class="col s12 m3 left-align">
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
                </div>


                <div class="col s12 m6 l6">
                  <div class="row">
                    <div class="col s12 m4">
                      <h5>Añadir visitante</h5>
                      <div class="row">
                        <div class="col s12 m6 left-align">
                          <a class="btn-floating waves-effect col-center" id="add_user"><i class="material-icons">add</i></a>
                        </div>
                        <div class="col s12 m6 left-align">
                          <a class="btn-floating col-center" id="rm_user"><i class="material-icons">replay</i></a>
                        </div>
                      </div>

                    </div>

                  </div>

                  <div id="user"></div>


                  <!--<div class="row">
                    <div class="col s12 m12 l12">
                      <hr>
                      <h5>Sexo</h5>
                        <div class="row">
                          <div class="col s12 m6 left-align">
                              <div class="row">
                                <input type="radio" name="sexo" class="with-gap" id="hombre" />
                                <label for="hombre">Hombre</label>
                              </div>
                              <div class="row">
                                <input type="radio" name="sexo" class="with-gap" id="mujer" />
                                <label for="mujer">Mujer&nbsp;</label>
                              </div>
                          </div>
                        </div>

                        <h5>Edad</h5>
                          <div class="row">
                            <div class="col s12 m12 l12 left-align">
                              <div class="row">
                                <input type="radio" name="edad" class="with-gap" id="0a12" />
                                <label for="0a12">0 a 12 años</label>
                              </div>

                              <div class="row">
                                <input type="radio" name="edad" class="with-gap" id="12a30" />
                                <label for="12a30">13 a 30 años</label>
                              </div>
                              <div class="row">
                                <input type="radio" name="edad" class="with-gap" id="31a50" />
                                <label for="31a50">31 a 50 años</label>
                              </div>
                              <div class="row">
                                <input type="radio" name="edad" class="with-gap" id="50mas" />
                                <label for="50mas">Más de 51 años</label>
                              </div>



                            </div>
                          </div>

                          <h5>Nacionalidad</h5>
                          <div class="input-field col s12 m12 l12 left-align">
                            <select>
                              <option value="" disabled selected>Nacionalidad</option>
                              <option value="Española">Española</option>
                              <option value="Británica">Británica</option>
                              <option value="Alemana">Alemana</option>
                              <option value="Rusa">Rusa</option>
                              <option value="Canaria">Canaria</option>
                              <option value="Africana">Africana</option>
                              <option value="Asiática">Asiática</option>
                              <option value="Australiana">Australiana</option>
                              <option value="Austriaca">Austriaca</option>
                              <option value="Belga">Belga</option>
                              <option value="Canadiense">Canadiense</option>
                              <option value="Checa">Checa</option>
                              <option value="China">China</option>
                              <option value="Danesa">Danesa</option>
                              <option value="Eslovena">Eslovena</option>
                              <option value="Estadounidense">Estadounidense</option>
                              <option value="Otros">Otros</option>
                            </select>
                            <label>Nacionalidades</label>
                            <div class="row">
                              <div class="col s12 m12 l12 left-align">
                                <input type="checkbox" class="filled-in" name="segunda_residencia" id="segunda_residencia" />
                                <label  for="segunda_residencia">Segunda Residencia</label>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>-->



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
                      </p>
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
                        <input type="checkbox" name="recurso1" id="recurso1" />
                        <label for="recurso1">Playas</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="recurso2" id="recurso2" />
                        <label for="recurso2">Senderos</label>
                      </p>
                    </div>

                    <div class="row-modi">

                      <p>
                        <input type="checkbox" name="recurso3" id="recurso3" />
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
                        <input type="checkbox" name="aloj1" id="aloj1" />
                        <label for="aloj1">Hoteles</label>
                      </p>
                    </div>
                    <div class="row-modi">
                        <p>
                          <input type="checkbox" name="aloj2" id="aloj2" />
                          <label for="aloj2">Apartamentos</label>
                        </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="aloj3" id="aloj3" />
                        <label for="aloj3">Turismo Rural</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="aloj4" id="aloj4" />
                        <label for="aloj4">Camping</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="aloj5" id="aloj5" />
                        <label for="aloj5">Vivienda Vacacional</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="aloj6" id="aloj6" />
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
                        <input type="checkbox" name="trans" id="trans1" />
                        <label for="trans1">Guaguas</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="trans2"  id="trans2" />
                        <label for="trans2">Taxti</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="trans3" id="trans3" />
                        <label for="trans3">Rent a car</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="trans4" id="trans4" />
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
                        <input type="checkbox" name="oci1" id="oci1" />
                        <label for="oci1">Deportes</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="oci2" id="oci2" />
                        <label for="oci2">Restaurantes</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="oci3" id="oci3" />
                        <label for="oci3">Excursiones</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="oci4" id="oci4" />
                        <label for="oci4">Compras</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="oci5" id="oci5" />
                        <label for="oci5">Mercados</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="oci6" id="oci6" />
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
                        <input type="checkbox" class="eve1" id="eve1" />
                        <label for="eve1">Gastronómicos</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" class="eve2" id="eve2" />
                        <label for="eve2">Fiestas</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" class="eve3" id="eve3" />
                        <label for="eve3">Miradas Doc</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" class="eve4" id="eve4" />
                        <label for="eve4">Pascua Florida</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" class="eve5" id="eve5" />
                        <label for="eve5">Eventos Culturales</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" class="eve6" id="eve6" />
                        <label for="eve6">Eventos tradicionales</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" class="eve7" id="eve7" />
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
                        <input type="checkbox" name="servi1" id="servi1" />
                        <label for="servi1">Baños</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="servi2" id="servi2" />
                        <label for="servi2">Policía</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="servi3" id="servi3" />
                        <label for="servi3">Centros Médicos</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="servi4" id="servi4" />
                        <label for="servi4">Ayuntamiento</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="servi5" id="servi5" />
                        <label for="servi5">Correo</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="servi6" id="servi6" />
                        <label for="servi6">Direcciones específicas</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="servi7" id="servi7" />
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
                        <input type="checkbox" name="tfinfo1" id="tfinfo1" />
                        <label for="tfinfo1">Teide</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo2" id="tfinfo2" />
                        <label for="tfinfo2">Playas</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo3" id="tfinfo3" />
                        <label for="tfinfo3">Eventos culturales</label>
                      </p>
                    </div>

                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo4" id="tfinfo4" />
                        <label for="tfinfo4">Guaguas</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo5" id="tfinfo5" />
                        <label for="tfinfo5">Taxi</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo6" id="tfinfo6" />
                        <label for="tfinfo6">Rent a car</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo7" id="tfinfo7" />
                        <label for="tfinfo7">Ocio: atracciones, excursiones en barco</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo8" id="tfinfo8" />
                        <label for="tfinfo8">Transporte marítimo</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo9" id="tfinfo9" />
                        <label for="tfinfo9">Alojamiento</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo10" id="tfinfo10" />
                        <label for="tfinfo10">Direcciones específicas</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo11" id="tfinfo11" />
                        <label for="tfinfo11">Meteo</label>
                      </p>
                    </div>
                    <div class="row-modi">
                      <p>
                        <input type="checkbox" name="tfinfo12" id="tfinfo12" />
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

    <!--<script>
      $(document).ready(function() {
         $('select').material_select();
       });
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





    </script>-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/main.js"></script>
    <script type="text/javascript" src="../../js/encuesta/inicio.js"></script>

  </body>
</html>


<?php
   }else {
       header("Location: ../../index.php");
   }
?>
