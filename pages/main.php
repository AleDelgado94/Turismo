<?php
  $usuario = $_GET[]
 ?>


<!DOCTYPE html>
<html>
  <head>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/main.css"/>
    <link type="text/css" rel="stylesheet" href="../css/font-awesome.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <nav class="#424242 grey darken-3">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo left"><img id="escudo-nav" src="..\images\Escudos\Escudo_AyuntamientoGuiadeIsora1.png" alt="Escudo Guía de Isora"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="http://www.guiadeisora.org/corp">Ayuntamiento</a></li>
          <li><a href="http://www.guiadeisora.travel/turismo">Turismo</a></li>
        </ul>
      </div>
    </nav>


    <div class="menu" style="border:solid">
      <div class="row">
        <div class="col s3">
          <p>Usuario: </p>
        </div>
        <div class='col s9'>
          <?php echo "<p>ADMIN</p>"; ?>
        </div>

      </div>

    </div>








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

  </body>
</html>
