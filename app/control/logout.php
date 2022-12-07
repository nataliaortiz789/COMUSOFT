<?php
  session_start();
  $_SESSION['nombre']='';
  $_SESSION['correo']='';
  $_SESSION['perfil']='';
  header("Location:../../index.php");
 ?>
