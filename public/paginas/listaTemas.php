<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>COMUSOFT | Lista de Temas</title>
  </head>
  <body>
    <?php
      session_start();
      include "menu.php";
    require_once('../../app/conexionBD.php');
    $asignatura=0;
    if(!empty($_GET)){
      $asignatura=$_GET['asignatura'];
    }
    include "../../app/modelo/consultaAsignatura.php";
    ?>
    <div class="container" align="center" style="margin-top:50px">
      <?php if(!empty($asignatura)) {?>
      <h3 class="text-danger">TEMAS DE
        <?php
          if($det= mysqli_fetch_array($resultAsignatura)){
            echo($det['nombre']) ;
          }
          ?>
      </h3>
      <?php
          }
          else { ?>
        <h3 class="text-danger">TODOS LOS TEMAS</h3>
      <?php } ?>
      <div class="">
        <table id="temas" class="table table-striped table-bordered" style="width:100%">
          <thead class="bg-secondary text-white">
            <tr>
              <th>TÍTULO</th>
              <th>FECHA DE PUBLICACIÓN</th>
              <th>PALABRAS CLAVE</th>
              <th>AUTOR</th>
              <th>OPCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php

              include ("../../app/modelo/listaTemas.php");
              while($det= mysqli_fetch_array($resultTema)){
                echo "<tr>";
                echo("<td>".$det['titulo']."</td>");
                echo("<td>".$det['fecha_creacion']."</td>");
                echo("<td>".$det['palabras_clave']."</td>");
                echo("<td>".$det['autor']."</td>");
                echo("<td align='center'><a href='detalleTema.php?tema=".$det['id']."'><img src='../imagenes/eye.svg' height='20'></a></td>");
                echo "</tr>";
                }
              ?>
          </tbody>
          <tfoot class="bg-secondary text-white">
              <tr>
                <th>TÍTULO</th>
                <th>FECHA DE PUBLICACIÓN</th>
                <th>PALABRAS CLAVE</th>
                <th>AUTOR</th>
                <th>OPCIONES</th>
              </tr>
          </tfoot>
      </table>
      </div>
    </div>
    <?php include "footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
      $('#temas').dataTable( {
          "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
          },
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      } );
      } );
    </script>
  </body>
</html>
