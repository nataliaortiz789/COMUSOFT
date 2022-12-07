<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>COMUSOFT | Detalle Tema</title>
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
  </head>
  <body>
    <?php
      session_start();
      include "menu.php";
    $tema=0;
    if(!empty($_GET)){
      $tema=$_GET['tema'];
    }
      require_once('../../app/conexionBD.php');
      include ("../../app/modelo/consultaTema.php");
      if($det= mysqli_fetch_array($resultTema)){

    ?>
    <div class="container" align="center" style="margin-top:50px">
      <div class="card">
        <div class="card-body">
          <div class="form-group" align="left">
            <h3 class="text-danger"><?php echo($det['titulo']) ?></h3>
          </div>
          <div class="form-group" align="left">
            <?php
            require_once('../../app/conexionBD.php');
            $asignatura=$det['asignatura'];
            include "../../app/modelo/consultaAsignatura.php"; ?>
            <h5 class="text-secondary">Asignatura:
              <?php
                if($det1= mysqli_fetch_array($resultAsignatura)){
                  echo($det1['codigo']." - ".$det1['nombre']) ;
                }
              ?>
            </h5>
          </div>
          <div class="form-group" align="left">
            <h5 class="text-secondary">Autor: <?php echo($det['autor']) ?></h5>
          </div>
          <div class="form-group" align="left">
            <h5 class="text-secondary">Fecha de Publicación: <?php echo($det['fecha_creacion']) ?></h5>
          </div>
          <br>
          <div class="card text-center">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs" role="tablist" id="detalle-tema" >
                <li class="nav-item">
                  <a class="nav-link active" href="#contenido" role="tab" aria-controls="contenido" aria-selected="true">CONTENIDO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#video" role="tab" aria-controls="video" aria-selected="false">VIDEO</a>
                </li>
                <li class="nav-item" >
                  <a class="nav-link" href="#documento" role="tab" aria-controls="documento" aria-selected="false">DOCUMENTO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#enlaces" role="tab" aria-controls="enlaces" aria-selected="false">ENLACES</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content mt-3">
                <div class="tab-pane active" id="contenido" role="tabpanel">
                  <div class="form-group" align="left">
                    <div class="prettyprint" >
                        <?php echo(html_entity_decode($det['contenido'])) ?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="video" role="tabpanel" aria-labelledby="video-tab">
                    <?php if(empty($det['codigo_youtube'])){ ?>
                      <div class="alert alert-warning">
                        El autor no agrego video a este tema.
                      </div>
                    <?php } else{?>
                  <div class="row">
                    <div class="col-12">
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo($det['codigo_youtube']) ?>" allowfullscreen></iframe>
                        </div>
                    </div>
                  </div>
                <?php } ?>
                </div>
                <div class="tab-pane" id="documento" role="tabpanel" aria-labelledby="documento-tab">
                  DOCUMENTO
                </div>
                <div class="tab-pane" id="enlaces" role="tabpanel" aria-labelledby="enlaces-tab">
                  <?php if(empty($det['enlace_github'])){ ?>
                    <div class="alert alert-warning">
                      El autor no agrego repositorios de GitHub a este tema.
                    </div>
                  <?php
                      }
                      else{
                  ?>
                        <a href="<?php echo($det['enlace_github']) ?>" target="_blank"><img src="../imagenes/github.svg" height="40"></a>
                  <?php
                        }
                        if(empty($det['enlace_libro'])){ ?>
                    <br><br>
                    <div class="alert alert-warning">
                      El autor no agrego Libro o Documento Virtual a este tema.
                    </div>
                  <?php
                      }
                      else{
                  ?>
                        <a href="<?php echo($det['enlace_libro']) ?>" target="_blank"><img src="../imagenes/book.svg" height="40"></a>
                  <?php
                        }
                        if(!empty($det['enlace_1'])){
                  ?>
                        <a href="<?php echo($det['enlace_1']) ?>" target="_blank"><img src="../imagenes/stack.svg" height="40"></a>
                  <?php
                        }
                        if(!empty($det['enlace_2'])){
                  ?>
                        <a href="<?php echo($det['enlace_2']) ?>" target="_blank"><img src="../imagenes/cloud.svg" height="40"></a>
                  <?php
                        }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-secondary" onclick="location.href='listaTemas.php?asignatura=<?php echo($det['asignatura']) ?>'">VOLVER</button>

        </div>
      </div>
    </div>
    <?php } ?>
    <?php include "footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/ufps.js"></script>
  </body>
</html>
