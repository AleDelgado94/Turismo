<?php

  $link = require("connect_db.php");

  $usuario = $_POST['delete_user'];

  $consulta = "DELETE FROM login WHERE usuario ='". $usuario ."';";
  $users = mysqli_query($link, $consulta) or die(mysqli_error($link));
  mysqli_free_result($users);

  if($users === TRUE){
    header("Location: main.php");
  }
  else{
    mysqli_close($link);
    }

 ?>
