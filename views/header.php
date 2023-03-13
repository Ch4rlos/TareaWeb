<header>
    <div class="header-container">
        <a class="logo" href="#">Instituto Educativo Ficticio</a>
        <nav>
            <?php
            session_start();
            if (isset($_SESSION['matricula'])) {
                if ($_SESSION['tipo'] == 'AL') {
                    echo '<a href="?page=inicio">Inicio</a>';
                    echo '<a href="?page=preinscripciones">Preinscribir asignatura</a>';
                    echo '<a href="?page=consultar">Consultar inscripcion</a>';
                    echo '<a href="?page=cerrar">Cerrar sesión</a>';
                } elseif ($_SESSION['tipo'] == 'SE') {
                    echo '<a href="?page=inicio">Inicio</a>';
                    echo '<a href="?page=preinscripciones">Preinscribir asignatura</a>';
                    echo '<a href="?page=consultar">Consultar inscripcion</a>';
                    echo '<a href="?page=cerrar">Cerrar sesión</a>';
                } else {
                    echo '<a href="?page=inicio">Inicio</a>';
                    echo '<a href="?page=registro">Registro</a>';
                    echo '<a href="?page=login">Iniciar sesión</a>';
                }
            } else {
                echo '<a href="?page=inicio">Inicio</a>';
                echo '<a href="?page=registro">Registro</a>';
                echo '<a href="?page=login">Iniciar sesión</a>';
            }
            ?>
        </nav>
    </div>
</header>

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
?>