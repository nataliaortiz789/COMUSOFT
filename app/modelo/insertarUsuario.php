<?php
$insertUsuario = "INSERT INTO usuario(nombre, correo, clave, perfil,estado)
                      VALUES ('$nombre','$correo','$clave','$perfil','ACTIVO') ";

$resultInsertUsuario = mysqli_query($con,$insertUsuario);

if($resultInsertUsuario === false){
  $_SESSION['mensajeError']="Error: ".mysqli_error($con);
  }
  else{
    $_SESSION['mensaje']="Usuario: $nombre fue creado correctamente.";
  }
  header('Refresh: 0; URL=../../public/paginas/login.php');

  //sqlsrv_free_stmt($resultInsertAsignatura);//libero array de result
  mysqli_close($con); // cierro conexion
 ?>
