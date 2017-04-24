<?php

   //include('connect_db'); // incluímos los datos de acceso a la BD
   // comprobamos que se haya iniciado la sesión

    session_start();

   if(isset($_SESSION['usuario'])) {
     $username = $_SESSION['usuario'];
     $oficina = $_SESSION['oficina_defecto'];

     $link = require("connect_db.php");
     $consulta = "SELECT usuario FROM login;";
     $users = mysqli_query($link, $consulta) or die(mysqli_error($link));



?>
       <!-- Aquí ponemos todo el código HTML de nuestra página restringida, desde <html> a </html>-->

<!DOCTYPE html>
<html lang="es">
  <head>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/font-awesome.css"/>
    <link type="text/css" rel="stylesheet" href="../css/gestion.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="../image/png" href="http://www.guiadeisora.org/corp/wp-content/themes/FoundationPress-master/assets/img/icons/favicon.ico" />
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
          <a href="http://www.guiadeisora.org/corp" class="brand-logo left"><img id="escudo-nav" src="..\images\Escudos\Escudo_AyuntamientoGuiadeIsora1.png" alt="Escudo Guía de Isora"></a>
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
        <div class="col s12 m3 l2">
          <ul class="menu">
            <li><i class="material-icons">perm_identity</i><?php echo "<span class='usuario_panel'>&nbsp; Usuario:
            $username
            </span>"; ?></li>
            <li><i class="material-icons">business</i><?php echo "<span class='usuario_panel'>&nbsp; Oficina:
            $oficina
            </span>"; ?></li>
            <li><i class="material-icons">replay</i><a href="main.php">&nbsp; Inicio</a></li>
            <li><i class="material-icons">mode_edit</i><a href="encuesta/inicio.php">&nbsp; Encuesta</a></li>
            <li><i class="material-icons">trending_up</i><a href="estadisticas/estadisticas.php">&nbsp; Consultar estadísticas</a></li>
            <li><i class="material-icons">shopping_cart</i><a href="stock/stock.php">&nbsp; Stock</a></li>
            <li><i class="material-icons">new_releases</i><a href="incidencias/incidencias.php">&nbsp; Incidencias</a></li>
            <li><i class="material-icons">info</i><a href="observaciones/observaciones.php">&nbsp; Observaciones</a></li>
            <li><i class="material-icons">credit_card</i><a href="ocupacion/ocupacion.php">&nbsp; Ocupación hotelera</a></li>
            <?php
              if($username == 'admin'){
                echo "<li><i class='material-icons'>contacts</i><a href='gestion_usuarios.php'>&nbsp; Gestión de usuario</a></li>";
                echo "<li><i class='material-icons'>library_books</i><a href='#'>&nbsp; Gestión hotelera</a></li>";
              }
             ?>
          </ul>
          <form class="col s12 m3 l3" action="cerrar_sesion.php" method="post">
            <input type="submit" name="cerrar" value="Cerrar Sesión">
          </form>
        </div>

          <div class="row">

            <div class="col s12 m3 l3">
              <ul class="collapsible container-fluid" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header center">Añadir nuevo hotel</div>
                    <div class="collapsible-body">
                      <form action="crear_hotel.php" method="post">
                        <span>Nombre hotel: </span>
                        <input type="text" name="new_hotel" value="">
                        <input id="crear_button" type="submit" name="create_user" value="Crear">
                      </form>
                    </div>
                </li>
              </ul>
            </div>

            <div class="col s12 m3 l3">
              <ul class="collapsible container-fluid" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header center">Eliminar hotel existente</div>
                  <div class="collapsible-body">
                    <form action="borrar_hotel.php" method="post">


                      <select id="users_delete" name="users_delete">
                        <option value="" disabled selected>Hotel</option>

                        <?php

                          $consulta_delete = "SELECT nombre FROM hoteles;";
                          $users_delete = mysqli_query($link, $consulta_delete) or die(mysqli_error($link));

                          while($usu_delete = mysqli_fetch_assoc($users_delete)){
                            $user_delete = $usu_delete['nombre'];
                            if($user_delete != "admin")
                              echo "<option type='text' value='$user_delete' name='$user_delete'>$user_delete</option>";
                          }

                          mysqli_free_result($users_delete);
                         ?>
                      </select>

                      <input type="submit" name="delete_usuario" value="Borrar">
                    </form>
                  </div>
                </li>
              </ul>
            </div>


          </div>


  </main>



    <footer class="page-footer-modi">
      <div class="container">
        <div class="row">
          <div class="col l1 s12">
            <img id="escudo-footer" class="responsive-img" src="../images/Escudos/EscudoLineas2.png" alt="Escudo Guia de Isora">
          </div>
          <div class="col l2 s12">
            <img id="logo-footer" class="responsive-img" src="../images/Logos/GuiadeIsora_CaracterNatural.png" alt="Guia de Isora Caracter Natural">
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
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/gestion_usuario.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('select').material_select();
      });
    </script>

  </body>
</html>


<?php
   }else {
       header("Location: ../index.php");
   }
?>
