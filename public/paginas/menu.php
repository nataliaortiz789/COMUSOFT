<nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
  <div class="container">
    <a class="navbar-brand" href="../../index.php">
      <img src="../imagenes/logo2b.png" alt="" width="120">
    </a>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="listaConvocatorias.php" style="color:white">
          CONVOCATORIAS
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listaTemas.php">
          <img src="../imagenes/search.svg" height="30">
        </a>
      </li>
      <?php
        if(empty($_SESSION['nombre'])){
       ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          <img src="../imagenes/person-fill.svg" height="30">
        </a>
      </li>
    <?php }
        else{
    ?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
          <img src="../imagenes/person-fill.svg" height="20"> <?php echo $_SESSION['nombre'] ?>
      </a>
      <ul class="dropdown-menu">
        <?php
          if($_SESSION['perfil']=='ADMINISTRADOR'){
        ?>
        <li><a class="dropdown-item" href="aprobarTemas.php">
          <img src="../imagenes/journal-check.svg" height="20"> APROBAR TEMAS
        </a></li>
      <?php }else {
       ?>
       <li><a class="dropdown-item" href="misTemas.php">
         <img src="../imagenes/folder2.svg" height="20"> MIS TEMAS
       </a></li>
       <li><a class="dropdown-item" href="crearTema.php">
             <img src="../imagenes/terminal-plus-black.svg" height="20"> NUEVO TEMA
           </a>
       </li>
     <?php } ?>

        <?php
          if($_SESSION['perfil']=='ADMINISTRADOR'){
        ?>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="listaAsignaturas.php">
          <img src="../imagenes/safe.svg" height="20"> LISTA DE ASIGNATURAS</a></li>
        <li><a class="dropdown-item" href="crearAsignatura.php">
          <img src="../imagenes/bookmark-plus-black.svg" height="20"> NUEVA ASIGNATURA</a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="listaUsuarios.php">
          <img src="../imagenes/person-list.svg" height="20"> LISTA DE USUARIOS</a></li>
      <?php } ?>

      <?php
        if($_SESSION['perfil']=='DOCENTE'){
      ?>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="misConvocatorias.php">
        <img src="../imagenes/safe.svg" height="20"> MIS CONVOCATORIAS</a></li>
      <li><a class="dropdown-item" href="crearConvocatoria.php">
        <img src="../imagenes/bookmark-plus-black.svg" height="20"> NUEVA CONVOCATORIA</a>
      </li>
    <?php } ?>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="../../app/control/logout.php">
        <img src="../imagenes/lock.svg" height="20"> CERRAR SESIÓN</a>
        </li>
      </ul>
    </li>
  <?php } ?>
    </ul>
  </div>
</nav>
<br>
<br>
