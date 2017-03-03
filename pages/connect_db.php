<?php

  $link = mysqli_connect("localhost", "root", "", "turismo");

  if(!$link){
    printf("Error: No se puede establecer la conexión con la base de datos. %s\n", mysqli_connect_error());
    exit;
  }
  else{
    mysqli_select_db($link, "turismo");
    return $link;
  }


 ?>
