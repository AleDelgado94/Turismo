<?php

$link = require("connect_db.php");

$username = $_POST['mod_user'];
$old_user = $_POST['old_user'];
$new_pass = crypt($_POST['mod_pass'], '$6$rounds=5000$usesomesillystringforsalt$');

if($old_user != 'admin'){
  $consulta = "UPDATE login SET usuario='". $username ."', pass='". $new_pass ."' WHERE usuario='".$old_user."';";
  $mod = mysqli_query($link, $consulta) or die(mysqli_error($link));


  if($mod === TRUE){
    mysqli_close($link);
    header("Location: gestion_usuarios.php");
  }
  else {
    mysqli_close($link);
    echo "<script>location.href = 'error/error_acceso_mod.html' </script>";
  }
}else{
  mysqli_close($link);
  echo "<script>location.href = 'error/error_acceso_main.html' </script>";
}


 ?>
