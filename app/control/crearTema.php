<?php
session_start();
if(!empty($_POST)){
  require('../conexionBD.php');
  include ("../util/funciones.php");
  //se obtienen los datos de la asignnatura por _POST
  $titulo=strtoupper(($_POST['titulo']));
  $asignatura=strtoupper(($_POST['asignatura']));
  $contenido=(htmlentities($_POST['contenido']));
  $palabras_clave=strtoupper(($_POST['palabras_clave']));
  $video=(($_POST['video']));
  $github=(($_POST['github']));
  $libro=(($_POST['libro']));
  $enlace1=(($_POST['enlace1']));
  $enlace2=(($_POST['enlace2']));
  $autor=$_SESSION['usuario_id'];
  include("../modelo/insertarTema.php");
}

 ?>
