<?php

  $link = require("connect_db.php");

  $pass_encrypt = crypt($_POST['new_pass'], '$6$rounds=5000$usesomesillystringforsalt$');
  $usuario = $_POST['new_user'];

  $consulta = "SELECT usuario FROM login;";
  $users = mysqli_query($link, $consulta) or die(mysqli_error($link));

  $repetido = FALSE;

  while($usu = mysqli_fetch_assoc($users)){
    $user = $usu['usuario'];
    if($user == $usuario){
      $repetido = TRUE;
    }
  }

  mysqli_free_result($users);

  if($repetido == FALSE && $usuario != 'admin'){
    $consulta = "INSERT INTO login (usuario, pass) VALUES ('". $usuario ."', '". $pass_encrypt ."');";

    $insertar = mysqli_query($link, $consulta) or die(mysqli_error($link));

    if($insertar === TRUE){
      header("Location: gestion_usuarios.php");
    }
    else{
      mysqli_close($link);
    }
  }else {
    mysqli_close($link);
    echo "<script>location.href = 'error/error_acceso_main.html' </script>";
  }



 ?>
