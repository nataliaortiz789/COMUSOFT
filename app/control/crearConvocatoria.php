<?php
session_start();
if(!empty($_POST)){
  require('../conexionBD.php');
  include ("../util/funciones.php");
  //se obtienen los datos de la asignnatura por _POST
  $nombre=strtoupper(($_POST['nombre']));
  $descripcion=strtoupper(($_POST['descripcion']));

  $url = 'https://gewsjsiv6b.execute-api.us-east-1.amazonaws.com/crear-convocatoria';
  $ch = curl_init($url);
  $data = array(
      'docente' => $_SESSION['usuario_id'],
      'descripcion' => $descripcion,
      'proyecto' => $nombre
  );
  $json = json_encode($data);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  $result = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $resultado = json_decode($result, true);
  curl_close($ch);
  $_SESSION['mensaje']=$resultado['Mensaje'];
  header('Refresh: 0; URL=../../index.php');
}

 ?>
