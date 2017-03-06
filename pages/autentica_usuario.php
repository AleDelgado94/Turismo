<?php

  session_start(); //Iniciamos la sesión
  $link = require("connect_db.php");
  $username = $_POST['users'][0];

  $pass_encrypt = crypt($_POST['password'], '$6$rounds=5000$usesomesillystringforsalt$');

  //$consulta = " SELECT * FROM 'LOGIN' WHERE 'USUARIO' LIKE '" . $username . "' AND PASS LIKE '" . $pass_encrypt . "';";

  $consulta = "SELECT * FROM login
    WHERE USUARIO='". $username ."' AND PASS='". $pass_encrypt ."'";

  $query_autentification = mysqli_query($link, $consulta) or die(mysqli_error($link));
  $row_cnt = mysqli_num_rows($query_autentification);


  if($row_cnt == 1){

    //CREAMOS LAS SESIONES PARA LOS USUARIOS
    $_SESSION['usuario'] = $username;


    //if(isset($_SESSION['usuario'])){
      header("Location: main.php");
  //  }

    /*  USUARIO AUTENTIFICADO. */

    mysqli_free_result($query_autentification);
  }
  else{
    /* USUARIO NO AUTENTIFICADO. */
    mysqli_free_result($query_autentification);
    mysqli_close($link);
    echo "<script>location.href = 'error_acceso.html' </script>";
  }

 ?>
