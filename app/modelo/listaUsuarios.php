<?php

  $consultaUsuario = "SELECT id, nombre, correo, clave, perfil, fecha_creacion, estado
                          FROM usuario
                          ORDER BY fecha_creacion ASC";

$resultUsuario = mysqli_query($con,$consultaUsuario);

if($resultUsuario === false){
  echo "Falló la Conexión S: Póngase en contacto con el administrador del sistema !"; ?><br /><br /><?php
  //die(print_r( odbc_error()));
}

/********************************************************************************/

 ?>
