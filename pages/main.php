<?php

   //include('connect_db'); // incluímos los datos de acceso a la BD
   // comprobamos que se haya iniciado la sesión

    session_start();

   if(isset($_SESSION['usuario'])) {
?>
       <!-- Aquí ponemos todo el código HTML de nuestra página restringida, desde <html> a </html>-->

<!DOCTYPE html>
<html lang="es">
  <head>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/font-awesome.css"/>
    <link type="text/css" rel="stylesheet" href="../css/main.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="../image/png" href="http://www.guiadeisora.org/corp/wp-content/themes/FoundationPress-master/assets/img/icons/favicon.ico" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Turismo - Base de datos</title>
  </head>
  <body>

  <header>


    <nav class="#424242 grey darken-3 top-nav">
      <div class="container">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo left"><img id="escudo-nav" src="..\images\Escudos\Escudo_AyuntamientoGuiadeIsora1.png" alt="Escudo Guía de Isora"></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="http://www.guiadeisora.org/corp">Ayuntamiento</a></li>
            <li><a href="http://www.guiadeisora.travel/turismo">Turismo</a></li>
          </ul>
          <ul id="mobile-demo" class="side-nav">
            <li><a href="http://www.guiadeisora.org/corp">Ayuntamiento</a></li>
            <li><a href="http://www.guiadeisora.travel/turismo">Turismo</a></li>
          </ul>
        </div>
      </div>

    </nav>


  </header>

  <main>
      <div class="row">
        <div class="col s3 ">
          <ul class="menu">
            <li><a href="encuesta.php">pepe</a></li>
            <li>pepe</li>
            <li>pepe</li>
            <li>pepe</li>
            <li>pepe</li>
            <li>pepe</li>
            <li>pepe</li>
          </ul>
        </div>
        <div class="col s9">
          <div class="row">
            <div class="col s6">
                hola que tal
            </div>

          </div>

        </div>

      </div>



  </main>





      <!--<div class="row">
        <div class="col s12 m4 13">
          <div class="col">
            <h5>Usuario: </h5>
          </div>
          <div class='col'>
            <?php echo "<p>ADMIN</p>"; ?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">

        </div>
          <div class="col">
            <p><a href="#"><h5>Encuestas</h5></a></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p><a href="#"><h5>Estadísticas</h5></a></p>
          </div>
        </div>-->

        <!--<div class="menu">
          <div class="col l6 s12 m6"><span class="flow-text">I am always full-width (col s12)</span></div>
          <div class="col l6 m6 s12"><span class="flow-text">I am full-width on mobile (col s12 m6)</span></div>

          <p>hola</p>
        </div>
      -->




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


<?php
   }else {
       header("Location: ../index.html");
   }
?>
