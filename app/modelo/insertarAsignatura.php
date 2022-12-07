<?php
$insertAsignatura = "INSERT INTO asignatura
                              (nombre, semestre, codigo, descripcion,estado)
                              VALUES ('$nombre',$semestre,'$codigo','$descripcion','ACTIVA')";

$resultInsertAsignatura = mysqli_query($con,$insertAsignatura);

if($resultInsertAsignatura === false){
  $_SESSION['mensajeError']="Error: ".mysqli_error($con);
  }
  else{
    $_SESSION['mensaje']="Asignatura: $nombre fue creada correctamente.";
  }
  header('Refresh: 0; URL=../../index.php');

  //sqlsrv_free_stmt($resultInsertAsignatura);//libero array de result
  mysqli_close($con); // cierro conexion
 ?>
