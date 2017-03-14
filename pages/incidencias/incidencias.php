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
    <link type="text/css" rel="stylesheet" href="../../css/main.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/incidencias/incidencias.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="../../image/png" href="http://www.guiadeisora.org/corp/wp-content/themes/FoundationPress-master/assets/img/icons/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="../../css/encuesta/themes/default.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/encuesta/themes/default.date.css"/>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.min.css">

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
        <div class="col s12 m3 l3 ">
          <ul class="menu">
            <li><i class="material-icons">perm_identity</i><?php echo "<span class='usuario_panel'>&nbsp; Usuario:
            $username
            </span>"; ?></li>
            <li><i class="material-icons">replay</i><a href="../main.php">&nbsp; Inicio</a></li>
            <li><i class="material-icons">mode_edit</i><a href="../encuesta/inicio.php">&nbsp; Encuesta</a></li>
            <li><i class="material-icons">trending_up</i><a href="#">&nbsp; Consultar estadísticas</a></li>
            <li><i class="material-icons">shopping_cart</i><a href="../stock/stock.php">&nbsp; Stock</a></li>
            <li><i class="material-icons">new_releases</i><a href="incidencias.php">&nbsp; Incidencias</a></li>
            <?php
              if($username == 'admin'){
                echo "<li> <i class='material-icons'>contacts</i><a href='gestion_usuarios.php'>&nbsp; Gestión de usuario</a></li>";
              }
             ?>

          </ul>
          <form class="col s12 m3 l3" action="cerrar_sesion.php" method="post">
            <input type="submit" name="cerrar" value="Cerrar Sesión">
          </form>
        </div>
        <div class="col s12 m9 l9 ">

          <!-- INICIO DE LAS TABS-->
          <div class="row">
            <div class="col s12">
              <ul class="tabs tab-modi">
                <li class="tab col s6"><a class="active" href="#anadir">Añadir</a></li>
                <li class="tab col s6"><a href="#consultar">Consultar</a></li>
              </ul>
            </div>
            <!--INICIO AÑADIR INCIDENCIAS-->
            <div id="anadir" class="col s12">
              <form class="col s12 m12 l12" action="" method="post">
                <div class="row">
                  <div class="col 12 m12 l3">

                    <div class="row">
                      <div class="input-field  col s12 m12 l12">
                        <input id="titulo" name="titulo" type="text">
                        <label for="last_name">Título</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col s12 m12 l12 left-align">
                        <select name="oficinas" onchange="cambio(this.value)">
                          <option  value="" disabled selected>Oficina</option>
                          <option  value="Alcalá">Alcalá</option>
                          <option  value="Playa San Juan">Playa San Juan</option>
                          <option  value="Guía Casco">Guía Casco</option>
                        </select>
                        <input id="oficina" type="hidden" name="oficina">
                      </div>
                    </div>



                    <div class="row">
                      <div class="col s12 m12 l12">
                        <div id="datepicker"></div>
                        <div id="datos">
                          <input type='text' name='fecha' id='fecha' value="<?php echo date('d/m/y');?>" readonly />
                        </div>
                      </div>
                    </div>

                  </div>


                  <div class="col s12 m12 l6">
                    <div class="row">
                      <div class="col s12 m12 12 left-align">
                        <select name="lugar" onchange="cambio(this.value)">
                          <option  value="" disabled selected>Lugar</option>
                          <option  value="Alcalá">Alcalá</option>
                          <option  value="Playa San Juan">Playa San Juan</option>
                          <option  value="Guía Casco">Guía Casco</option>
                          <option  value="Chío">Chío</option>
                        </select>
                        <input id="oficina" type="hidden" name="lugar">
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field  col s12 m12 l12">
                        <input id="direccion" name="direccion" type="text">
                        <label for="last_name">Dirección</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <textarea id="textarea1" name="descripcion" class="materialize-textarea"></textarea>
                        <label for="textarea1">Descripción</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col s12">
                        <a class="waves-effect waves-light btn #00e676 green accent-3">Enviar</a>
                      </div>
                    </div>
                  </div>


                </div>
                <div class="row">

                </div>

                <div class="row">

                </div>
              </form>

            </div>
            <!--FINAL DE AÑADIR INCIDENCIAS-->



            <!--INICIO DE CONSULTAR INCIDENCIAS-->
            <div id="consultar" class="col s12">
              Vamos Campeón
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
    <script type="text/javascript" src="../../js/encuesta/legacy.js"></script>
    <script type="text/javascript" src="../../js/encuesta/picker.js"></script>
    <script type="text/javascript" src="../../js/encuesta/picker.date.js"></script>
    <script type="text/javascript" src="../../js/encuesta/translations/es_ES.js"></script>
    <script type="text/javascript" src="../../js/incidencias/incidencias.js"></script>
    <script type="text/javascript" src="../../js/index.js"></script>

  </body>
</html>


<?php
   }else {
       header("Location: ../index.php");
   }
?>
