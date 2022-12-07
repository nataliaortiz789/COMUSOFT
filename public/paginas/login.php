<!DOCTYPE html>
<?php
  session_start();
  if(!empty($_SESSION['nombre'])){
    header("Location:../../index.php");
  }
?>
<html lang="es" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>COMUSOFT | Iniciar Sesión</title>
  </head>
  <body>
    <?php

      include "menu.php";
    ?>
    <div class="container" align="center" style="margin-top:50px">
      <?php
      if(!empty($_SESSION["mensaje"])){
        echo"<div class='alert alert-success'>".$_SESSION["mensaje"]."</div><br>";
        $_SESSION["mensaje"]="";
      }
      if(!empty($_SESSION["mensajeError"])){
        echo"<div class='alert alert-danger'>".$_SESSION["mensajeError"]."</div><br>";
        $_SESSION["mensajeError"]="";
      }
       ?>
      <h1>INICIO DE SESIÓN</h1>
      <form class="" action="../../app/control/login.php" method="post" name="login" id="login">
        <div class="card col-6">
          <div class="card-body">
            <div class="form-group" align="left">
              <a style="color:red" align="left">* </a><label >Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <br>
            <div class="form-group" align="left">
              <a style="color:red" align="left">* </a><label >Contraseña</label>
              <input type="password" class="form-control" name="clave" id="clave" required>
            </div>
            <br>
            <div class="form-group" align="right">
              <a style="color:red" href="#">Recuperar contraseña </a>
              <br>
              <a style="color:red" href="registrarUsuario.php">Registrarse</a>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-secondary" onclick="location.href='../../index.php'">CANCELAR</button>
            <button type="submit" class="btn btn-danger " form="login">INICIAR</button>
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
