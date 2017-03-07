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

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta charset="utf-8">
    <title>Turismo - Ayuntamiento de Guía de Isora</title>
  </head>
  <body>

  <div class="row registro">

    <form class="col s12" action="pages/autentica_usuario.php" method="post">
      <div class="row">

        <div class="col l2 s12">
          <i class="medium material-icons my-icon">perm_identity</i>
        </div>

        <div class="input-field col l4 s12">
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

        <div class="col l2 s12">
          <i class="medium material-icons my-icon">vpn_key</i>
        </div>

        <div class="input-field col l4 s12">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Contraseña</label>
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
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Turismo: 666 666 666</a></li>
              <li><i class="material-icons white-text">phone</i><a class="grey-text text-lighten-3"> Informática: 666 666 666</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>

  </body>
</html>
