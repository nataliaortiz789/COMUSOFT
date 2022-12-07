<!DOCTYPE html>
<?php
  session_start();
  if(empty($_SESSION['nombre'])){
    header("Location:../../index.php");
  }
?>
<html lang="es" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>COMUSOFT | Nuevo Tema</title>
    <script src="../tinymce/tinymce.min.js"></script>
    <script src="../js/tinymce_editor.js"></script>
  </head>
  <body>
    <?php
      include "menu.php";
    ?>
    <div class="container" align="center" style="margin-top:50px">
      <h1>NUEVO TEMA</h1>
      <div class="alert alert-secondary col-8">
        Para crear un nuevo tema seleccione la asignatura, ingrese el contenido, las palabras claves y luego de clic en
        guardar, un administrador validará la información y luego será publicado.
      </div>
      <form class="" action="../../app/control/crearTema.php" method="post" name="nuevoTema" id="nuevoTema">
        <div class="card col-8">
          <div class="card-body">
            <div class="form-group" align="left">
              <a style="color:red" align="left">* </a><label >Título</label>
              <input type="text" class="form-control" name="titulo" id="titulo" required>
            </div>
            <br>
            <div class="form-group" align="left">
              <a style="color:red" align="left">* </a><label for="asignatura" class="form-label">Asignatura</label>
              <select class="custom-select form-control" aria-label="Default select example" id="asignatura" name="asignatura" required>
                <option selected>Seleccione una asignatura</option>
                <?php
                require_once('../../app/conexionBD.php');
                include ("../../app/modelo/listaAsignaturas.php");
                while($det= mysqli_fetch_array($resultAsignaturas)){
                 ?>
                <option value="<?php echo($det['id']) ?>"><?php echo($det['nombre']) ?></option>
              <?php }
              mysqli_close($con); // cierro conexion?>
              </select>
            </div>
            <br>
            <div class="form-group" align="left">
              <a style="color:red" align="left">* </a><label for="contenido" class="form-label">Contenido</label>
              <textarea name="contenido" id="contenido" rows="20" cols="80" class="form-control">
              </textarea>
            </div>
            <br>
            <div class="form-group" align="left">
              <a style="color:red" align="left">* </a><label >Palabras clave</label>
              <input type="text" class="form-control" name="palabras_clave" id="palabras_clave" required>
            </div>
            <br>
            <div class="alert alert-secondary">
              Si desea agregar un video de Youtube a su tema por favor solo agregue los 11 caracteres de identificacion del video para su correcta visualización.
            </div>
            <div class="form-group" align="left">
              <img src="../imagenes/youtube.svg" height="24"><label> Video Youtube</label>
              <input type="text" class="form-control" name="video" id="video">
            </div>
            <br>
            <div class="alert alert-secondary">
              Si desea agregar un repositorio de GitHub por favor agregue la url, recuerde que debe ser un repositorio público para que todos pueden acceder a él.
            </div>
            <div class="form-group" align="left">
              <img src="../imagenes/github.svg" height="24"><label> Repositorio GitHub</label>
              <input type="url" class="form-control" name="github" id="github">
            </div>
            <br>
            <div class="alert alert-secondary">
              Si desea agregar un libro o documento virtual por favor ingrese la url, recuerde que debe ser un documento público para que todos pueden acceder a él.
            </div>
            <div class="form-group" align="left">
              <img src="../imagenes/book.svg" height="24"><label> Libro o Documento Virtual</label>
              <input type="url" class="form-control" name="libro" id="libro">
            </div>
            <br>
            <div class="alert alert-secondary">
              Si desea puede agregar dos enlaces de interes que le ayuden a complementar el tema.
            </div>
            <div class="form-group" align="left">
              <img src="../imagenes/stack.svg" height="24"><label> Enlace de interes 1</label>
              <input type="url" class="form-control" name="enlace1" id="enlace1">
            </div>
            <div class="form-group" align="left">
              <img src="../imagenes/cloud.svg" height="24"><label> Enlace de interes 2</label>
              <input type="url" class="form-control" name="enlace2" id="enlace2">
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-secondary" onclick="location.href='../../index.php'">CANCELAR</button>
            <button type="submit" class="btn btn-danger " form="nuevoTema">GUARDAR</button>
          </div>
        </div>
      </form>
    </div>
    <?php include "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
