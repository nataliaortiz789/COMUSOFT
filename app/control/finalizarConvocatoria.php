<?php
session_start();
if(!empty($_GET)){
  require('../conexionBD.php');
  include ("../util/funciones.php");
  $id=strtoupper(($_GET['convocatoria']));

  $url = 'https://gewsjsiv6b.execute-api.us-east-1.amazonaws.com/finalizar-convocatoria';
  $ch = curl_init($url);
  $data = array(
      'convocatoria' => $id
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
