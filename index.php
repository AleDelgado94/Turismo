<?php
$link = require("pages/connect_db.php");

$consulta = "SELECT usuario FROM login;";

$users = mysqli_query($link, $consulta) or die(mysqli_error($link));

 ?>



<!DOCTYPE html>
<html>
  <head>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/index.css"/>
    <link type="text/css" rel="stylesheet" href="css/font-awesome.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="http://www.guiadeisora.org/corp/wp-content/themes/FoundationPress-master/assets/img/icons/favicon.ico" />
    <style media="screen">
      .dropdown-content li > a, .dropdown-content li > span {
        color: #409BC7 !important;
      }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta charset="utf-8">
    <title>Turismo - Ayuntamiento de Guía de Isora</title>
  </head>
  <body>

  <div class="row registro">

    <form class="col s12 l12 m12" action="pages/autentica_usuario.php" method="post">
      <div class="row">

        <div class="col l1 s12 m1">
          <i class="medium material-icons my-icon">perm_identity</i>
        </div>

        <div class="input-field col l3 s12 m3">
          <select name="users[]" >
            <option value="" disabled selected>Elija su usuario</option>

            <?php
              while($usu = mysqli_fetch_assoc($users)){
                $user = $usu['usuario'];
                echo "<option type='text' value='$user' name='$user'>$user</option>";
              }

              mysqli_free_result($users);
             ?>
          </select>
        </div>

        <div class="col l1 s12 m1">
          <i class="medium material-icons my-icon">vpn_key</i>
        </div>

        <div class="input-field col l3 s12 m3">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Contraseña</label>
        </div>

        <div class="col l1 s12 m1">
          <i class="medium material-icons my-icon">business</i>
        </div>

        <div class="input-field col s12 l3 m3">
          <select name="ofice[]" onchange="cambio_oficina(this.value)">
            <option value="" disabled selected>Oficina</option>
            <option value="Guia Casco">Guía Casco</option>
            <option value="Alcala">Alcalá</option>
            <option value="Playa San Juan">Playa San Juan</option>
          </select>
          <input type="hidden" name="oficina_defecto" id="oficina_defecto" value="">

        </div>

      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="submit" name="" value="Entrar">
        </div>
      </div>
    </form>

  </div>


    <footer class="page-footer-modi">
      <div class="container">
        <div class="row">
          <div class="col l1 s12">
            <img id="escudo-footer" class="responsive-img" src="images/Escudos/EscudoLineas2.png" alt="Escudo Guia de Isora">
          </div>
          <div class="col l2 s12">
            <img id="logo-footer" class="responsive-img" src="images/Logos/GuiadeIsora_CaracterNatural.png" alt="Guia de Isora Caracter Natural">
          </div>
          <div class="col offset-l1 l4 s12">
            <h5 class="white-text">Turismo</h5>
            <p class="grey-text text-lighten-4">Servicio de turismo para la recogida de datos estadísticos.</p>
          </div>
          <div class="col l4 s12">
            <h5 class="white-text">Contacto</h5>
            <ul>
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Turismo: 922 850 100 (3600)</a></li>
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Informática: 922 850 100 (3108)</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript">
      function cambio_oficina(val){
        document.getElementById('oficina_defecto').value = val;
      }
    </script>

  </body>
</html>
