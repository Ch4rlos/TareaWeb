<div class="container-fluid">
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="#">Instituto Educativo Ficticio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ms-auto mb-2 mb-md-0">
      <?php session_start();  if($_SESSION['tipo']) {?>
            <li class="navbar-nav right">
            <a class="nav-link" href="?page=inicio">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?page=preinscripciones">Preinscribir asignatura</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?page=consultar">Consultar inscripción</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?page=cerrar" class="sr-only">Cerrar sesión</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
            <a class="nav-link" href="?page=inicio">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?page=registro">Registro</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?page=login" class="sr-only">Iniciar sesión</a>
            </li>
          <?php } ?>
      </ul>
    </div>
  </nav> 
</div>

<!-- Incluya jQuery y la biblioteca Bootstrap 5 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-QWo6y aptkSeaRxOwBfMlvadWQBdS6tfsK9sOQLM9i8WQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-uv0n7Vuf/mFhYZmxlNkQvYcCOX9fQgxpzSQ+zILHIV6+Jh6m5gcaFGZUkq5m6rUb" crossorigin="anonymous"></script>

<!-- Agregue este script para hacer que el botón hamburguesa funcione -->
<script>
$(document).ready(function(){
  $('[data-bs-toggle="collapse"]').on('click', function () {
    var $navMenuCont = $($(this).data('bs-target'));
    $navMenuCont.animate({height: 'toggle'}, 500);
  });
});
</script>





<?php
$selccion = $_GET['page'];
switch ($selccion) {
    case 'inicio':
        include 'home/inicio.php';
        break;
    case 'preinscripciones':
        include 'preinscripcion/preinscripciones.php';
        break;
    case 'consultar':
        include 'consulta_inscripcion/consultaInscripcion.php';
        break;
    case 'cerrar':
        include 'cerrar/cerrar.php';
        break;
    case 'contacto':
        include 'contacto.php';
        break;
    case 'registro':
        include 'register/registro.php';
        break;
    case 'login':
        include 'login/login.php';
        break;
    default:
        include 'home/inicio.php';
        break;
}
include 'views/footer.php';
?>