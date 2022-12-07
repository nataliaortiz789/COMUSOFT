<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>COMUSOFT | Registrar Usuario</title>
  </head>
  <body>
    <?php
      session_start();
      include "menu.php";
    ?>
    <div class="container" style="margin-top:50px" align="center">
      <h3 class="text-danger">REGISTRO DE USUARIOS</h3>
      <form action="../../app/control/crearUsuario.php" method="post">
        <div class="card col-6">
          <div class="card-body">
            <div class="mb-3" align="left">
              <a style="color:red" align="left">* </a><label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3" align="left">
              <a style="color:red" align="left">* </a><label for="correo" class="form-label">Dirección de correo</label>
              <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">Recuerde que para poder registrarse debe contar con una dirección de correo del dominio institucional @ufps.edu.co.</div>
            </div>
            <div class="mb-3" align="left">
              <a style="color:red" align="left">* </a><label for="clave" class="form-label">Clave</label>
              <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
            <div class="mb-3" align="left">
              <a style="color:red" align="left">* </a><label for="clave2" class="form-label">Confirme la clave</label>
              <input type="password" class="form-control" id="clave2" required>
            </div>
            <div class="mb-3" style="text-align:left">
              <a style="color:red" align="left">* </a><label for="perfil" class="form-label">Perfil</label>
              <select class="custom-select form-control" aria-label="Default select example" id="perfil" name="perfil" required>
                <option value="" selected>Seleccione un estado</option>
                <option >ESTUDIANTE</option>
                <option >DOCENTE</option>
                <option >EGRESADO</option>
              </select>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-secondary" onclick="location.href='../../index.php'">CANCELAR</button>
            <button type="submit" class="btn btn-danger " >REGISTRAR</button>
          </div>
        </div>
      </form>
    </div>
    <?php include "footer.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
