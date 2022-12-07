<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>COMUSOFT | Lista de Convocatorias</title>
  </head>
  <body>
    <?php
      session_start();
      include "menu.php";
    require_once('../../app/conexionBD.php');
    $data = array('docente'=>$_SESSION['usuario_id']);
    $url = 'https://gewsjsiv6b.execute-api.us-east-1.amazonaws.com/listar-convocatoria';
    $ch = curl_init($url);
    $json = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $resultado = json_decode($result, true);
    $correcto=false;
    if($httpcode==200){
      $correcto=true;
    }
    //curl_close($ch);
    ?>
    <div class="container" align="center" style="margin-top:50px">
      <h3 class="text-danger">MIS CONVOCATORIAS</h3>
      <div class="">
        <table id="temas" class="table table-striped table-bordered" style="width:100%">
          <thead class="bg-secondary text-white">
            <tr>
              <th>NOMBRE PROYECTO</th>
              <th>DESCRIPCIÓN</th>
              <th>ESTADO</th>
              <th>POSTULADOS</th>
              <th>FINALIZAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($correcto){
              foreach ($resultado as $det){
                echo "<tr>";
                echo("<td>".$det['nombre_proyecto']."</td>");
                echo("<td>".$det['descripcion']."</td>");
                echo("<td>".$det['estado']."</td>");
                echo("<td align='center'><a href='listaPostulados.php?convocatoria=".$det['id']."'><img src='../imagenes/person-list.svg' height='20'></a></td>");
                echo("<td align='center'><a href='../../app/control/finalizarConvocatoria.php?convocatoria=".$det['id']."'><img src='../imagenes/bookmark-plus-black.svg' height='20'></a></td>");
                echo "</tr>";
                }
            }

              ?>
          </tbody>
          <tfoot class="bg-secondary text-white">
              <tr>
                <th>NOMBRE PROYECTO</th>
                <th>DESCRIPCIÓN</th>
                <th>ESTADO</th>
                <th>POSTULADOS</th>
                <th>FINALIZAR</th>
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
