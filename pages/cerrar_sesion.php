<?php
session_start();

if(isset($_SESSION['usuario'])){
  session_destroy();
  header("Location: ../index.html");
}
else{
  echo "Fallo al cerrar sesión";
}

 ?>
