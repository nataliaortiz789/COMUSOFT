<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="public/imagenes/ing_sistemas.jpg">
    <title>COMUSOFT</title>
  </head>
  <body>
    <?php session_start(); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="public/imagenes/logo2b.png" alt="" width="140">
        </a>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="public/paginas/listaConvocatorias.php" style="color:white">
              CONVOCATORIAS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="public/paginas/listaTemas.php">
              <img src="public/imagenes/search.svg" height="30">
            </a>
          </li>
          <?php
            if(empty($_SESSION['nombre'])){
           ?>
          <li class="nav-item">
            <a class="nav-link" href="public/paginas/login.php">
              <img src="public/imagenes/person-fill.svg" height="30">
            </a>
          </li>
        <?php }
            else{
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              <img src="public/imagenes/person-fill.svg" height="20"> <?php echo $_SESSION['nombre'] ?>
          </a>
          <ul class="dropdown-menu">
            <?php
              if($_SESSION['perfil']=='ADMINISTRADOR'){
            ?>
            <li><a class="dropdown-item" href="public/paginas/aprobarTemas.php">
              <img src="public/imagenes/journal-check.svg" height="20"> APROBAR TEMAS
            </a></li>
          <?php }else {
           ?>
           <li><a class="dropdown-item" href="public/paginas/misTemas.php">
             <img src="public/imagenes/folder2.svg" height="20"> MIS TEMAS
           </a></li>
           <li><a class="dropdown-item" href="public/paginas/crearTema.php">
                 <img src="public/imagenes/terminal-plus-black.svg" height="20"> NUEVO TEMA
               </a>
           </li>
         <?php } ?>

            <?php
              if($_SESSION['perfil']=='ADMINISTRADOR'){
            ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="public/paginas/listaAsignaturas.php">
              <img src="public/imagenes/safe.svg" height="20"> LISTA DE ASIGNATURAS</a></li>
            <li><a class="dropdown-item" href="public/paginas/crearAsignatura.php">
              <img src="public/imagenes/bookmark-plus-black.svg" height="20"> NUEVA ASIGNATURA</a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="public/paginas/listaUsuarios.php">
              <img src="public/imagenes/person-list.svg" height="20"> LISTA DE USUARIOS</a></li>
          <?php } ?>
          <?php
            if($_SESSION['perfil']=='DOCENTE'){
          ?>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="public/paginas/misConvocatorias.php">
            <img src="public/imagenes/safe.svg" height="20"> MIS CONVOCATORIAS</a></li>
          <li><a class="dropdown-item" href="public/paginas/crearConvocatoria.php">
            <img src="public/imagenes/bookmark-plus-black.svg" height="20"> NUEVA CONVOCATORIA</a>
          </li>
        <?php } ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="app/control/logout.php">
              <img src="public/imagenes/lock.svg" height="20"> CERRAR SESIÓN</a>
            </li>
          </ul>
        </li>
      <?php } ?>

        </ul>
      </div>
    </nav>
    <div class="container" style="margin-top:50px">
      <br>
      <br>
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="4000">
            <img src="public/imagenes/banner1.jpg" class="d-block w-100" height="300">
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="public/imagenes/banner4.jpg" class="d-block w-100" height="300">
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="public/imagenes/banner3.jpg" class="d-block w-100" height="300">
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="public/imagenes/banner2.jpg" class="d-block w-100" height="300">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <br>
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
      <div class="alert alert-secondary" align="center">
        COMUNIDAD DE PRÁCTICA DE INGENIERÍA DE SISTEMAS DE LA U.F.P.S COMUSOFT
        <br> <small><i>UN ESPACIO PARA COMPARTIR CONOCIMIENTO CON TODOS LOS ESTUDIANTES DE INGENIERÍA DE SISTEMAS
        Y CREAR UNA COMUNIDAD VIRTUAL</i></small>
      </div>
      <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
          require_once('app/conexionBD.php');
          include ("app/modelo/listaAsignaturas.php");
          $cont=0;
          while($det= mysqli_fetch_array($resultAsignaturas)){
            $cont++;
         ?>
        <div class="col">
          <div class="card h-100  mb-3" style="max-width: 18rem;">
            <div class="card-header text-white
              <?php
                if($cont%2==0)
                  echo"bg-danger";
                else
                  echo"bg-secondary";
               ?>
            "><?php echo($det['nombre']); ?></div>
            <div class="card-body">
              <h5 class="card-title"><?php echo($det['codigo']); ?></h5>
              <h5 class="card-title">SEMESTRE <?php echo($det['semestre']); ?></h5>
              <p class="card-text"><?php echo($det['descripcion']); ?></p>
            </div>
            <div class="card-footer" align="right">
              <a style="margin-top:10px" href="public/paginas/listaTemas.php?asignatura=<?php echo($det['id']); ?>" class="btn btn-danger position-relative" name="button" >
                VER TEMAS <span class="badge rounded-pill bg-white text-danger position-absolute top-0 start-100 translate-middle border border-dark">
                              <?php echo($det['temas']); ?>
                            </span>
              </a>
            </div>
          </div>
        </div>
        <?php
        }
        mysqli_close($con); // cierro conexion
         ?>
      </div>
    </div>
    <br><br>
    <div class=" text-secondary bg-light">
      <hr>
      <div class="" align="center">
        <div class="col-6">
          Copyright © 2022 UFPS - Todos los Derechos Reservados
          <br>
          Desarrollado por: YERSON CARMONA - NATALIA ORTIZ - ALFREDO SARMIENTO
          <br>
          Versión: 1.0
          <br>
        </div>
        <div class="col-6">
          <a href="https://ingsistemas.cloud.ufps.edu.co/" target="_blank" class="">
            <img src="public/imagenes/logo_vertical_ingsistemas.png" height="50">
          </a>
          <a href="https://ww2.ufps.edu.co/" target="_blank" class="col-4">
            <img src="public/imagenes/logo_ufps.png" height="40">
          </a>
        </div>
        <br>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
