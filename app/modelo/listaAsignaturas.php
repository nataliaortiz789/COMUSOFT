<?php



$consultaAsignatura = "select a.nombre,a.codigo,a.semestre,a.descripcion,a.id,
                        count(t.id) as temas
                         FROM   asignatura as a LEFT JOIN tema t ON a.id = t.asignatura
                         WHERE  a.estado = 'ACTIVA' AND t.estado='PUBLICADO'
                         GROUP BY a.nombre ORDER BY a.semestre";

$resultAsignaturas = mysqli_query($con,$consultaAsignatura);

if($resultAsignaturas === false){
  echo "Falló la Conexión S: Póngase en contacto con el administrador del sistema !"; ?><br /><br /><?php
  //die(print_r( odbc_error()));
}

/********************************************************************************/

 ?>
