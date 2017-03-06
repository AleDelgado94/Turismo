<?php

  $link = require("connect_db.php");


  $username = $_POST['username'];
  $pass_encrypt = crypt($_POST['password'], '$6$rounds=5000$usesomesillystringforsalt$');

  $consulta = "SELECT * FROM LOGIN WHERE (USUARIO == '" . $username . "' AND PASS == '" . $pass_encrypt . "');";

  $query_autentification = mysqli_query($link, $consulta);

  if(mysqli_num_rows($query_autentification) == 1){
    /*  USUARIO AUTENTIFICADO. */
    echo "<script>localtion.href = 'main.html' </script>";
    mysqli_free_result($query_autentification);
  }
  else{
    /* USUARIO NO AUTENTIFICADO. */
    mysqli_free_result($query_autentification);
    mysqli_close($link);

    //echo "<script>location.href = 'error_acceso.html' </script>";
  }

 ?>
