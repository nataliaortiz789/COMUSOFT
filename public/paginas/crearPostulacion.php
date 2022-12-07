<!DOCTYPE html>
<?php
  session_start();
  if(empty($_SESSION['perfil'])&&$_SESSION['perfil']!='ESTUDIANTE'){
    header("Location:../../index.php");
  }
?>
<html lang="es" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>COMUSOFT | Nueva Postulación</title>
  </head>
  <body>
    <?php
      include "menu.php";
      require_once('../../app/conexionBD.php');
      $data = array('convocatoria' => $_GET['convocatoria']);
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
      $convo="";
      $correcto=false;
      if($httpcode==200){
        $convo="PROYECTO: ".$resultado[0]['nombre_proyecto'];
      }
    ?>
    <div class="container" align="center" style="margin-top:50px">
      <h1>NUEVA POSTULACIÓN</h1>
      <div class="alert alert-secondary col-8">
        Para crear una nueva postulación ingrese los datos solicitados y luego de clic en guardar.
      </div>
      <form class="" action="../../app/control/crearPostulacion.php" method="post" name="nuevaPostulacion" id="nuevaPostulacion">
        <div class="card col-8">
          <div class="card-body">
            <div class="form-group" align="left">
              <a style="color:red" align="left">* </a><label >Convocatoria</label>

              <input type="text" class="form-control" name="nombre" id="nombre" disabled value="<?php echo $convo ?>">
            </div>
            <br>
            <div class="form-group" align="left">
              <a style="color:red" align="left">* </a><label >Descripción</label>
              <textarea name="descripcion" id="descripcion" rows="8" cols="80" class="form-control" required>
              </textarea>
            </div>
            <input type="hidden" name="convocatoria" value="<?php echo $_GET['convocatoria'] ?>">
            <input type="hidden" name="estudiante" id="estudiante" value="<?php echo $_SESSION['usuario_id'] ?>">
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-secondary" onclick="location.href='../../index.php'">CANCELAR</button>
            <button type="submit" class="btn btn-danger" form="nuevaPostulacion">GUARDAR</button>
          </div>
        </div>
      </form>
    </div>
    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  </body>
</html>
