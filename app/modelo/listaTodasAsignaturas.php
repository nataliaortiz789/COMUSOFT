<?php

$consultaAsignatura = "select a.nombre,a.codigo,a.semestre,a.descripcion,a.id,a.estado
                         FROM   asignatura as a ";

$resultAsignaturas = mysqli_query($con,$consultaAsignatura);

if($resultAsignaturas === false){
  echo "Falló la Conexión S: Póngase en contacto con el administrador del sistema !"; ?><br /><br /><?php
  //die(print_r( odbc_error()));
}

/********************************************************************************/

 ?>
