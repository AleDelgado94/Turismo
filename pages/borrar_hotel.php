<?php

  $link = require("connect_db.php");

  $usuario = $_POST['users_delete'];


  $consulta = "DELETE FROM hoteles WHERE nombre ='". $usuario ."';";
  if($usuario != 'admin'){
    $users = mysqli_query($link, $consulta) or die(mysqli_error($link));
    mysqli_free_result($users);


    if($users === TRUE){
      header("Location: gestion_hotelera.php");
    }
    else{
      mysqli_close($link);
    }
  }else{
    mysqli_close($link);
    echo "<script>location.href = 'error/error_acceso_main.html' </script>";
  }

 ?>
