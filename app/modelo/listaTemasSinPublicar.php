<?php

  $consultaTema = "select t.id, t.titulo, t.asignatura, t.contenido, t.palabras_clave,
                          t.estado, t.enlace_github, t.codigo_youtube, t.enlace_1,
                          t.enlace_2, t.enlace_libro, t.fecha_creacion, t.fecha_publicacion,
                          a.nombre as autor
                           FROM   tema as t INNER JOIN usuario as a ON t.autor=a.id
                           WHERE  t.estado = 'SIN PUBLICAR'";

$resultTema = mysqli_query($con,$consultaTema);

if($resultTema === false){
  echo "Falló la Conexión S: Póngase en contacto con el administrador del sistema !"; ?><br /><br /><?php
  //die(print_r( odbc_error()));
}

/********************************************************************************/

 ?>
