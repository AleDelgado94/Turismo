<?php

   //include('connect_db'); // incluímos los datos de acceso a la BD
   // comprobamos que se haya iniciado la sesión

    session_start();

   if(isset($_SESSION['usuario'])) {
     $username = $_SESSION['usuario'];
     $oficina = $_SESSION['oficina_defecto'];


     $link = require("../connect_db.php");


     //STOCK MUNICIPIO
     $consulta_municipio = "SELECT material,cantidad FROM stock_municipio;";
     $municipio_stock = mysqli_query($link, $consulta_municipio) or die(mysqli_error($link));
     $stock_municipio = array(0);
     while($municipio = mysqli_fetch_assoc($municipio_stock)){
       $material = $municipio['material'];
       $cantidad = $municipio['cantidad'];
       $stock_municipio[$material] = $cantidad;
     }
     mysqli_free_result($municipio_stock);

     //STOCK OTROS MUNICIPIOS
     $consulta_otros_municipios = "SELECT material,cantidad FROM stock_otros_municipios;";
     $municipio_otros_stock = mysqli_query($link, $consulta_otros_municipios) or die(mysqli_error($link));
     $stock_otros_municipio = array(0);
     while($municipio = mysqli_fetch_assoc($municipio_otros_stock)){
       $material = $municipio['material'];
       $cantidad = $municipio['cantidad'];
       $stock_otros_municipio[$material] = $cantidad;
     }
     mysqli_free_result($municipio_otros_stock);


     //STOCK OTRAS ISLAS
     $consulta_otros_islas = "SELECT material,cantidad FROM stock_otras_islas;";
     $islas_stock = mysqli_query($link, $consulta_otros_islas) or die(mysqli_error($link));
     $stock_otras_islas = array(0);
     while($municipio = mysqli_fetch_assoc($islas_stock)){
       $material = $municipio['material'];
       $cantidad = $municipio['cantidad'];
       $stock_otras_islas[$material] = $cantidad;
     }
     mysqli_free_result($islas_stock);

     //STOCK TURISMO TENERIFE
     $consulta_turismo_tenerife= "SELECT material,cantidad FROM stock_turismo_tenerife;";
     $turismo_tenerife_stock = mysqli_query($link, $consulta_turismo_tenerife) or die(mysqli_error($link));
     $stock_turismo_tenerife = array(0);
     while($municipio = mysqli_fetch_assoc($turismo_tenerife_stock)){
       $material = $municipio['material'];
       $cantidad = $municipio['cantidad'];
       $stock_turismo_tenerife[$material] = $cantidad;
     }
     mysqli_free_result($turismo_tenerife_stock);


     //STOCK MATERIAL PROMOCIONAL
     $consulta_material_promocional= "SELECT material,cantidad FROM stock_promocional;";
     $material_promocional_stock = mysqli_query($link, $consulta_material_promocional) or die(mysqli_error($link));
     $stock_material_promocional = array(0);
     while($municipio = mysqli_fetch_assoc($material_promocional_stock)){
       $material = $municipio['material'];
       $cantidad = $municipio['cantidad'];
       $stock_material_promocional[$material] = $cantidad;
     }
     mysqli_free_result($material_promocional_stock);




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


  </header>""

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
            <li><i class="material-icons">shopping_cart</i><a href="stock.php">&nbsp; Stock</a></li>
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
        <div class="col s12 m9 l9 ">


          <!-- Información del STOCK -->

          <form action="stock_action.php" method="post">
              <div class="row">
                <div class="col s12 m4 l4 left-align">
                  <div class="row-modi">
                    <h5>Municipio</h5>
                  </div>
                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="callejero">Callejero: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_municipio['callejero']<=0)?'stock':'') ."'>".$stock_municipio['callejero']."</scan>"; ?></scan>
                      <input type="number" name="cant_callejero_municipio" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="mapa_senderos">Mapa de senderos: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_municipio['mapa_senderos']<=0)?'stock':'') ."' >" . $stock_municipio['mapa_senderos']."</scan>"; ?></scan>
                      <input type="number" name="cant_mapa_senderos_municipio" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="guias_turisticas">Guías turísticas: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_municipio['guias_turisticas']<=0)?'stock':'') ."'>".$stock_municipio['guias_turisticas']."</scan>"; ?></scan>
                      <input type="number" name="cant_guias_turisticas_municipio" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="folleto_eventos_municipales">Folleto eventos municipales: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_municipio['folleto_eventos_municipales']<=0)?'stock':'') ."'>".$stock_municipio['folleto_eventos_municipales']."</scan>"; ?></scan>
                      <input type="number" name="cant_folleto_eventos_municipales_municipio" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="folleto_ocio">Folleto ocio: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_municipio['folleto_ocio']<=0)?'stock':'') ."'>".$stock_municipio['folleto_ocio']."</scan>"; ?></scan>
                      <input type="number" name="cant_folleto_ocio_municipio" value="0">
                    </p>
                  </div>

                </div>

                <div class="col s12 m4 l4 left-align">
                  <div class="row-modi">
                    <h5>Otros Municipios</h5>
                  </div>
                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="callejero">Callejero: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_otros_municipio['callejero']<=0)?'stock':'') ."'>".$stock_otros_municipio['callejero']."</scan>"; ?></scan>
                      <input type="number" name="cant_callejero_otros_municipios" value="0">
                    </p>
                  </div>
                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="folleto_ocio_otros">Folleto ocio: <?php echo "&nbsp;&nbsp;<scan  class='". (($stock_otros_municipio['folleto_ocio']<=0)?'stock':'') ."'>".$stock_otros_municipio['folleto_ocio']."</scan>"; ?></scan>
                      <input type="number" name="cant_folleto_ocio_otros_municipios" value="0">
                    </p>
                  </div>
                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="otros_otros">Otros: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_otros_municipio['otros']<=0)?'stock':'') ."'>".$stock_otros_municipio['otros']."</scan>"; ?></scan>
                      <input type="number" name="cant_otros_otros_municipios" value="0">
                    </p>
                  </div>
                </div>

                <div class="col s12 m4 l4 left-align">
                  <div class="row-modi">
                    <h5>De otras islas</h5>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="mapas_islas">Mapas: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_otras_islas['mapas']<=0)?'stock':'') ."'>".$stock_otras_islas['mapas']."</scan>"; ?></scan>
                      <input type="number" name="cant_mapas_islas_otras_islas" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="otros_islas">Otros: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_otras_islas['otros']<=0)?'stock':'') ."'>".$stock_otras_islas['otros']."</scan>"; ?></scan>
                      <input type="number" name="cant_otros_islas_otras_islas" value="0">
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
                      <scan for="mapa_tenerife">Mapa Tenerife: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['mapa_tenerife']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['mapa_tenerife']."</scan>"; ?></scan>
                      <input type="number" name="cant_mapa_tenerife_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="mapa_block_sur">Mapa block zona sur: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['mapa_block_sur']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['mapa_block_sur']."</scan>"; ?></scan>
                      <input type="number" name="cant_mapa_block_sur_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="tenerife_coche">Tenerife en coche: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['tenerife_coche']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['tenerife_coche']."</scan>"; ?></scan>
                      <input type="number" name="cant_tenerife_coche_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="tradiciones_tenerife">Tradiciones en Tenerife: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['tradiciones_tenerife']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['tradiciones_tenerife']."</scan>"; ?></scan>
                      <input type="number" name="cant_tradiciones_tenerife_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="tenerife_pie">Tenerife a pie: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['tenerife_pie']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['tenerife_pie']."</scan>"; ?></scan>
                      <input type="number" name="cant_tenerife_pie_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="tenerife_cetaceos">Tenerife avistamiento de cetáceos: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['tenerife_cetaceos']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['tenerife_cetaceos']."</scan>"; ?></scan>
                      <input type="number" name="cant_tenerife_cetaceos_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="guia_de_tenerife">Guía de Tenerife: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['guia_de_tenerife']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['guia_de_tenerife']."</scan>"; ?></scan>
                      <input type="number" name="cant_guia_de_tenerife_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="gastronomia_tenerife">Gastronomía en Tenerife: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['gastronomia_tenerife']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['gastronomia_tenerife']."</scan>"; ?></scan>
                      <input type="number" name="cant_gastronomia_tenerife_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="tenerife_natural_rural">Tenerife Natural y Rural: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['tenerife_natural_rural']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['tenerife_natural_rural']."</scan>"; ?></scan>
                      <input type="number" name="cant_tenerife_natural_rural_turismo_tenerife" value="0">
                    </p>
                  </div>

                  <div class="row-modi">
                    <p class="range-field">
                      <scan for="tenerife_familia">Tenerife en familia: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_turismo_tenerife['tenerife_familia']<=0)?'stock':'') ."'>".$stock_turismo_tenerife['tenerife_familia']."</scan>"; ?></scan>
                      <input type="number" name="cant_tenerife_familia_turismo_tenerife" value="0">
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
                        <scan for="periodico_revista">Periódico/Revista: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_material_promocional['periodico_revista']<=0)?'stock':'') ."'>".$stock_material_promocional['periodico_revista']."</scan>"; ?></scan>
                        <input type="number" name="cant_periodico_revista_material_promocional" value="0">
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="folleto_bus">Folleto Bus: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_material_promocional['folleto_bus']<=0)?'stock':'') ."'>".$stock_material_promocional['folleto_bus']."</scan>"; ?></scan>
                        <input type="number" name="cant_folleto_bus_material_promocional" value="0">
                      </p>
                    </div>

                    <div class="row-modi">
                      <p class="range-field">
                        <scan for="otros_promocional">Otros: <?php echo "&nbsp;&nbsp;<scan class='". (($stock_material_promocional['otros_promocional']<=0)?'stock':'') ."'>".$stock_material_promocional['otros_promocional']."</scan>"; ?></scan>
                        <input type="number" name="cant_otros_promocional_material_promocional" value="0">
                      </p>
                    </div>
                  </div>
                </div>
              </div>

          <!-- Fin informacion stock -->

          <div class="row">
            <input id="add_cant" type="submit" name="add_cant" value="Añadir">
            <scan>&nbsp;&nbsp;</scan>
            <input id="delete_cant" type="submit" name="delete_cant" value="Descontar">
          </div>
        </form>
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
    <script type="text/javascript" src="../../js/stock/stock.js"></script>

  </body>
</html>


<?php
   }else {
       header("Location: ../../index.php");
   }
?>
