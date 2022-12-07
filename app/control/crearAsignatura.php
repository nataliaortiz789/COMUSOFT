<?php
session_start();
if(!empty($_POST)){
  require('../conexionBD.php');
  include ("../util/funciones.php");
  //se obtienen los datos de la asignnatura por _POST
  $nombre=strtoupper(($_POST['nombre']));
  $semestre=strtoupper(($_POST['semestre']));
  $codigo=strtoupper(($_POST['codigo']));
  $descripcion=strtoupper(($_POST['descripcion']));
  include("../modelo/insertarAsignatura.php");
}

 ?>
