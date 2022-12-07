<?php
session_start();
if(!empty($_POST))
{
  require_once("../conexionBD.php");
  include "../util/funciones.php";
  $nombre=EntradaSegura($_POST['nombre']);
  $correo=EntradaSegura($_POST['correo']);
  $clave=md5(EntradaSegura($_POST['clave']));
  $perfil=EntradaSegura($_POST['perfil']);
  include("../modelo/insertarusuario.php");
}

 ?>
