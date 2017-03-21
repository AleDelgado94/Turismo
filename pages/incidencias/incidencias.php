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
    <link type="text/css" rel="stylesheet" href="../../css/incidencias/incidencias.css"/>
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
            <li><i class="material-icons">new_releases</i><a href="incidencias.php">&nbsp; Incidencias</a></li>
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
              <form class="col s12 m12 l12" action="add_incidencia.php" method="post">
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
                        <label for="oficinas">Oficina</label>
                        <select name="oficinas" onchange="cambio(this.value)">
                          <option  value="" disabled selected>Oficina</option>
                          <option  value="Alcala">Alcalá</option>
                          <option  value="Playa San Juan">Playa San Juan</option>
                          <option  value="Guia Casco">Guía Casco</option>
                        </select>
                        <input id="oficina" type="hidden" name="oficina">
                      </div>
                    </div>



                    <div class="row">
                      <div class="col s12 m12 l12">
                          <input type="text" class="datepicker" name="fecha" placeholder="Día">
                      </div>
                    </div>

                  </div>


                  <div class="col s12 m12 l4">
                    <div class="row">
                      <div class="col s12 m12 12 left-align">
                        <label for="lugares">Lugar</label>
                        <select name="lugares" onchange="cambio(this.value, lugar)">
                          <option  value="" disabled selected>Lugar</option>
                          <option  value="Acojeja">Acojeja</option>
                          <option  value="Agua Dulce">Agua Dulce</option>
                          <option  value="Alcala">Alcalá</option>
                          <option  value="Aripe">Aripe</option>
                          <option  value="Chiguergue">Chiguergue</option>
                          <option  value="Chio">Chío</option>
                          <option  value="Chirche">Chiche</option>
                          <option  value="Cueva del Polvo">Cueva del Polvo</option>
                          <option  value="El Jaral">El Jaral</option>
                          <option  value="El Pozo">El Pozo</option>
                          <option  value="Fonsalia">Fonsalía</option>
                          <option  value="Guia Casco">Guía Casco</option>
                          <option  value="Piedra Hincada">Piedra Hincada</option>
                          <option  value="Playa San Juan">Playa San Juan</option>
                          <option  value="Tejina">Tejina</option>
                          <option  value="Varadero">Varadero</option>
                          <option  value="Verda de Esques">Vera de Esques</option>
                        </select>
                        <input id="lugar" type="hidden" name="lugar">
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field  col s12 m12 l12">
                        <input id="direccion" name="direccion" type="text">
                        <label for="last_name">Dirección</label>
                      </div>
                    </div>


                  </div>


                  <div class="col s12 m12 l5 left-align">

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="email" type="email" name="email" class="validate">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12 m12 l12">
                        <textarea id="textarea1" name="descripcion" type="text" class="materialize-textarea"></textarea>
                        <label for="textarea1">Descripción</label>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col s12 right-align">
                        <input id="boton_enviar" value="Añadir incidencia" type ="submit"/>
                      </div>
                    </div>

                  </div>


                </div>
              </form>

            </div>
            <!--FINAL DE AÑADIR INCIDENCIAS-->



            <!--INICIO DE CONSULTAR INCIDENCIAS-->
            <div id="consultar" class="col s12">

              <div class="row">
                <div class="col s12 m12 l4">
                  <h4 class="left-align">Consultar</h4>
                  <div class="row">
                    <div class="col s12 m12 l6 left-align">
                      <label for="oficinas">Oficina</label>
                      <select name="oficinas" onchange="ofi(this.value)">
                        <option  value="" disabled selected>Oficina</option>
                        <option  value="Alcala">Alcalá</option>
                        <option  value="Playa San Juan">Playa San Juan</option>
                        <option  value="Guia Casco">Guía Casco</option>
                      </select>
                      <input id="oficina_consulta_incidencia" type="hidden" name="oficina">
                    </div>
                    <div class="col s12 m12 l6 left-align">
                      <label for="lugares">Lugar</label>
                      <select name="lugares" onchange="place(this.value)">
                        <option  value="" disabled selected>Lugar</option>
                        <option  value="Acojeja">Acojeja</option>
                        <option  value="Agua Dulce">Agua Dulce</option>
                        <option  value="Alcala">Alcalá</option>
                        <option  value="Aripe">Aripe</option>
                        <option  value="Chiguergue">Chiguergue</option>
                        <option  value="Chio">Chío</option>
                        <option  value="Chirche">Chiche</option>
                        <option  value="Cueva del Polvo">Cueva del Polvo</option>
                        <option  value="El Jaral">El Jaral</option>
                        <option  value="El Pozo">El Pozo</option>
                        <option  value="Fonsalia">Fonsalía</option>
                        <option  value="Guia Casco">Guía Casco</option>
                        <option  value="Piedra Hincada">Piedra Hincada</option>
                        <option  value="Playa San Juan">Playa San Juan</option>
                        <option  value="Tejina">Tejina</option>
                        <option  value="Varadero">Varadero</option>
                        <option  value="Verda de Esques">Vera de Esques</option>
                      </select>
                      <input id="lugar_consulta_incidencia" type="hidden" name="lugar">
                    </div>
                  </div>

                  <div class="row">

                    <div class="col s12 m12 l6">
                        <input type="text" class="datepicker" id="fecha_ini" name="fecha_ini" placeholder="De:">
                    </div>
                    <div class="col s12 m12 l6">
                        <input type="text" class="datepicker" id="fecha_fin" name="fecha_fin" placeholder="Hasta:">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col 12 m12 l2">
                      <input id="boton_enviar" type ="submit" value="Buscar" onclick="consult(oficina_consulta_incidencia, lugar_consulta_incidencia, fecha_ini, fecha_fin)"/>
                    </div>
                  </div>
                </div>



              </div>

              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="row">
                    <h4 class="left-align">Incidencias no resueltas</h4>


                    <table class="responsive-table">
                     <thead>
                       <tr>
                           <th data-field="id">Titulo</th>
                           <th data-field="name">Lugar</th>
                           <th data-field="price">Direccion</th>
                           <th data-field="price">Oficina</th>
                           <th data-field="price">Fecha</th>
                           <th data-field="price">Descripcion</th>
                           <th data-field="price">Resuelta</th>

                       </tr>
                     </thead>

                     <tbody>

                     <?php
                        /************ MOSTRAR RESULTADOS CONSULTA INCIDENCIAS ****************/

                        $OFICINA = "";
                        $LUGAR = "";
                        $FECHA_INICIO = "";
                        $FECHA_FIN = "";

                        if(isset($_COOKIE['oficina'])) $OFICINA = $_COOKIE['oficina'];
                        if(isset($_COOKIE['lugar'])) $LUGAR = $_COOKIE['lugar'];
                        if(isset($_COOKIE['fecha_ini'])) $FECHA_INICIO = $_COOKIE['fecha_ini'];
                        if(isset($_COOKIE['fecha_fin'])) $FECHA_FIN = $_COOKIE['fecha_fin'];



                        $link = require("../connect_db.php");

                        if($FECHA_INICIO == "" && $FECHA_FIN == ""){
                          $FECHA_FIN = '9999-12-31';
                        }elseif ($FECHA_FIN == "") {
                          $FECHA_FIN = '9999-12-31';
                        }



                        if ($OFICINA == "" && $LUGAR == "") {
                          $consulta_incidencia = "SELECT id, titulo, lugar, direccion, oficina, fecha, descripcion, resuelta FROM incidencias
                          WHERE fecha BETWEEN '".$FECHA_INICIO."' AND '".$FECHA_FIN."' AND resuelta = 0";
                        }elseif ($OFICINA == '') {
                          $consulta_incidencia = "SELECT id, titulo, lugar, direccion, oficina, fecha, descripcion, resuelta FROM incidencias WHERE
                          lugar='".$LUGAR."' AND fecha BETWEEN '".$FECHA_INICIO."' AND '".$FECHA_FIN."' AND resuelta = 0";
                        }elseif ($LUGAR == '') {
                          $consulta_incidencia = "SELECT id, titulo, lugar, direccion, oficina, fecha, descripcion, resuelta FROM incidencias WHERE oficina='".$OFICINA."' AND
                          fecha BETWEEN '".$FECHA_INICIO."' AND '".$FECHA_FIN."' AND resuelta = 0";
                        }else {
                          $consulta_incidencia = "SELECT id, titulo, lugar, direccion, oficina, fecha, descripcion, resuelta FROM incidencias WHERE oficina='".$OFICINA."' AND
                          lugar='".$LUGAR."' AND fecha BETWEEN '".$FECHA_INICIO."' AND '".$FECHA_FIN."' AND resuelta = 0";
                        }



                        if($incidencias = mysqli_query($link, $consulta_incidencia)){

                          while ($fila = mysqli_fetch_assoc($incidencias)) {

                            echo "
                              <tr>
                                <td> ".$fila['titulo']." </td> <!-- TITULO -->
                                <td> ".$fila['lugar']." </td> <!-- LUGAR  -->
                                <td> ".$fila['direccion']." </td> <!-- DIRECCION -->
                                <td> ".$fila['oficina']." </td> <!-- OFICINA -->
                                <td> ".$fila['fecha']." </td> <!-- FECHA -->
                                <td> ".$fila['descripcion']." </td> <!-- DESCRIPCION -->
                                <td> <form  action='resolver.php' method='post'>
                                  <div id='". $fila['id'] ."' class='modal'>
                                    <div class='modal-content'>
                                      <h4>". $fila['titulo'] ."</h4>
                                      <div class='row'>
                                          <div class='row'>
                                            <div class='input-field col s12'>
                                              <textarea id='resolucion".$fila['id']."' name='resolv' class='materialize-textarea'></textarea>
                                              <label for='resolucion".$fila['id']."'>Resolución</label>
                                            </div>
                                          </div>
                                      </div>
                                        <input type='hidden' name='id_incidencia' value='".$fila['id']."'>
                                        <input id='resolv' type='submit' name='send_incidencia' value='Resolver'/>
                                    </div>
                                  </div>

                                  <a href='#".$fila['id']."' class='collection-item'>Resolver incidencia</a>

                                </form> </td> <!-- RESUELTA -->
                              </tr>";
                          }
                        }
                      ?>
                      </tbody>
                   </table>
                  </div>





                  <div class="row">
                    <h4 class="left-align">Incidencias resueltas</h4>


                    <table class="responsive-table">
                     <thead>
                       <tr>
                           <th data-field="id">Titulo</th>
                           <th data-field="name">Lugar</th>
                           <th data-field="price">Direccion</th>
                           <th data-field="price">Oficina</th>
                           <th data-field="price">Fecha</th>
                           <th data-field="price">Descripcion</th>
                           <th data-field="price">Resolución</th>

                       </tr>
                     </thead>

                     <tbody>

                     <?php
                        /************ MOSTRAR RESULTADOS CONSULTA INCIDENCIAS ****************/





                        if($FECHA_INICIO == "" && $FECHA_FIN == ""){
                          $FECHA_FIN = '9999-12-31';
                        }elseif ($FECHA_FIN == "") {
                          $FECHA_FIN = '9999-12-31';
                        }

                        if ($OFICINA == "" && $LUGAR == "") {
                          $consulta_incidencia = "SELECT id, titulo, lugar, direccion, oficina, fecha, descripcion, resuelta, resolucion FROM incidencias
                          WHERE fecha BETWEEN '".$FECHA_INICIO."' AND '".$FECHA_FIN."' AND resuelta = 1";
                        }elseif ($OFICINA == '') {
                          $consulta_incidencia = "SELECT id, titulo, lugar, direccion, oficina, fecha, descripcion, resuelta, resolucion FROM incidencias WHERE
                          lugar='".$LUGAR."' AND fecha BETWEEN '".$FECHA_INICIO."' AND '".$FECHA_FIN."' AND resuelta = 1";
                        }elseif ($LUGAR == '') {
                          $consulta_incidencia = "SELECT id, titulo, lugar, direccion, oficina, fecha, descripcion, resuelta, resolucion FROM incidencias WHERE oficina='".$OFICINA."' AND
                          fecha BETWEEN '".$FECHA_INICIO."' AND '".$FECHA_FIN."' AND resuelta = 1";
                        }else {
                          $consulta_incidencia = "SELECT id, titulo, lugar, direccion, oficina, fecha, descripcion, resuelta, resolucion FROM incidencias WHERE oficina='".$OFICINA."' AND
                          lugar='".$LUGAR."' AND fecha BETWEEN '".$FECHA_INICIO."' AND '".$FECHA_FIN."' AND resuelta = 1";
                        }



                        if($incidencias = mysqli_query($link, $consulta_incidencia)){

                          while ($fila = mysqli_fetch_assoc($incidencias)) {

                            echo "
                              <tr>
                                <td> ".$fila['titulo']." </td> <!-- TITULO -->
                                <td> ".$fila['lugar']." </td> <!-- LUGAR  -->
                                <td> ".$fila['direccion']." </td> <!-- DIRECCION -->
                                <td> ".$fila['oficina']." </td> <!-- OFICINA -->
                                <td> ".$fila['fecha']." </td> <!-- FECHA -->
                                <td> <p class='responsive'> ".$fila['descripcion']." </p> </td> <!-- DESCRIPCION -->
                                <td> ".$fila['resolucion']."</td> <!-- Resolucion -->
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
    <script type="text/javascript" src="../../js/incidencias/incidencias.js"></script>
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
