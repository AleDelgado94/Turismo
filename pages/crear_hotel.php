<?php

  $link = require("connect_db.php");
  $hotel = $_POST['new_hotel'];

  $consulta = "SELECT nombre FROM hoteles;";
  $hoteles = mysqli_query($link, $consulta) or die(mysqli_error($link));

  $repetido = FALSE;

  while($usu = mysqli_fetch_assoc($users)){
    $user = $usu['nombre'];
    if($user == $hotel){
      $repetido = TRUE;
    }
  }

  mysqli_free_result($users);

  if($repetido == FALSE){
    $consulta = "INSERT INTO hoteles (nombre) VALUES ('". $hotel ."');";

    $insertar = mysqli_query($link, $consulta) or die(mysqli_error($link));

    if($insertar === TRUE){
      header("Location: gestion_hotelera.php");
    }
    else{
      mysqli_close($link);
    }
  }else {
    mysqli_close($link);
    echo "<script>location.href = 'error/error_acceso_main.html' </script>";
  }



 ?>
