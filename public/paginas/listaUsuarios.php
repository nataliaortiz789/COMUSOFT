<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>COMUSOFT | Lista de Usuarios</title>
  </head>
  <body>
    <?php
      session_start();
      include "menu.php";
    require_once('../../app/conexionBD.php');
    ?>
    <div class="container" align="center" style="margin-top:50px">
    <h3 class="text-danger">TODOS LOS USUARIOS</h3>
      <div class="">
        <table id="usuarios" class="table table-striped table-bordered" style="width:100%">
          <thead class="bg-secondary text-white">
            <tr>
              <th>NOMBRE</th>
              <th>CORREO</th>
              <th>PERFIL</th>
              <th>ESTADO</th>
              <th>OPCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php

              include ("../../app/modelo/listaUsuarios.php");
              while($det= mysqli_fetch_array($resultUsuario)){
                echo "<tr>";
                echo("<td>".$det['nombre']."</td>");
                echo("<td>".$det['correo']."</td>");
                echo("<td>".$det['perfil']."</td>");
                echo("<td>".$det['estado']."</td>");
                echo("<td align='center'>
                      <a href='editarUsuario.php?usuario=".$det['id']."'><img src='../imagenes/pencil.svg' height='20'></a>
                      <a href='eliminarUsuario.php?usuario=".$det['id']."'><img src='../imagenes/trash.svg' height='20'></a>
                      </td>");
                echo "</tr>";
                }
              ?>
          </tbody>
          <tfoot class="bg-secondary text-white">
              <tr>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>PERFIL</th>
                <th>ESTADO</th>
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
      $('#usuarios').dataTable( {
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
