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
    <link type="text/css" rel="stylesheet" href="../../css/stock/stock.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="../../image/png" href="http://www.guiadeisora.org/corp/wp-content/themes/FoundationPress-master/assets/img/icons/favicon.ico" />

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
        <div class="col s12 m3 l3 ">
          <ul class="menu">
            <li><i class="material-icons">perm_identity</i><?php echo "<span class='usuario_panel'>&nbsp; Usuario:
            $username
            </span>"; ?></li>
            <li><i class="material-icons">replay</i><a href="../main.php">&nbsp; Inicio</a></li>
            <li><i class="material-icons">mode_edit</i><a href="../encuesta/inicio.php">&nbsp; Encuesta</a></li>
            <li><i class="material-icons">trending_up</i><a href="#">&nbsp; Consultar estadísticas</a></li>
            <li><i class="material-icons">shopping_cart</i><a href="stock.php">&nbsp; Stock</a></li>
            <li><i class="material-icons">new_releases</i><a href="../encuesta/perfilalojamiento.php">&nbsp; Incidencias</a></li>
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
        <div class="col s12 m9 l9 ">


          <!-- Información del STOCK -->
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

      </div>

  </main>



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
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript" src="../../js/stock.js"></script>

  </body>
</html>


<?php
   }else {
       header("Location: ../../index.php");
   }
?>
