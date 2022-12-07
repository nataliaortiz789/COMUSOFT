<?php
session_start();
require_once("../conexionBD.php");

if(!empty($_GET))
{
  $tema=$_GET['tema'];
  $updateTema = "UPDATE tema SET estado='PUBLICADO'
                  WHERE id=".$tema;

  $resultUpdateTema = mysqli_query($con,$updateTema);

  if($resultUpdateTema === false){
    $_SESSION['mensajeError']="Error: ".mysqli_error($con);
    }
    else{
      $_SESSION['mensaje']="Tema: $titulo fue actualizado correctamente.";
    }
    header('Refresh: 0; URL=../../public/paginas/aprobarTemas.php');

    mysqli_close($con); // cierro conexion
}

 ?>
