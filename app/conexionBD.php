<?php
$serverName = "biuc5ohjldrcfgmjojm1-mysql.services.clever-cloud.com";
$USERNAME="ulyjumuhk5zc4htt";
$PASSWORD="GdUODbLyKH53JtHCbZNJ";
$con = mysqli_connect($serverName, $USERNAME, $PASSWORD,"biuc5ohjldrcfgmjojm1");

          if ($con){
              //echo "<h1>Conexión Exitosa desde conexionIcaro.php</h1>";
            } else{
                echo "Falló la Conexión: Póngase en contacto con el administrador del sistema ! </br></br>";
                die( print_r( sqlsrv_errors(), true));
                }
                /*********************************************/
 ?>
