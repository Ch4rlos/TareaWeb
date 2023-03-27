<?php
//Archivo config
include "../config.php";

// Verificar que la sesión esté iniciada
session_start();

if (!isset($_SESSION['tipo'])) {
    die("Error: La sesión no está iniciada.");
}

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . $conn->errorInfo());
}

// Recibir datos del formulario
if ($_SESSION['tipo'] == 'SE') {
    $matricula = $_GET['matricula'];
} else if ($_SESSION['tipo'] == 'AL') {
    if (!isset($_SESSION['matricula'])) {
        die("Error: La sesión no está iniciada.");
    }
    $matricula = $_SESSION['matricula'];
    echo '<h1>Consulta de inscripciones</h1>';
}
?>
<table class="table table-striped">
    <thead>
        <tr>
            <?php
            $stmt = $conn->prepare('SELECT * FROM INSCRIPCION WHERE Matricula = :matricula');
            $stmt->bindParam(':matricula', $matricula);
            $stmt->execute();

            echo '<th scope="col">Asignatura</th>';
            echo '<th scope="col">Grupo</th>';
            echo '<th scope="col">Profesor</th>';
            echo '<th scope="col">Turno</th>';
            echo '<th scope="col">Semestre</th>';
            echo '<th scope="col">Estatus</th>';
            if ($_SESSION['tipo'] == 'SE') {
                echo '<th></th>';
                echo '<th></th>';
            }

            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $asignatura) {
                    echo '<tr>';
                    echo '<td>' . $asignatura["Asignatura"] . '</td>';
                    echo '<td>' . $asignatura["Grupo"] . '</td>';
                    echo '<td>' . $asignatura["Profesor"] . '</td>';
                    echo '<td>' . $asignatura["Turno"] . '</td>';
                    echo '<td>' . $asignatura["Semestre"] . '</td>';
                    echo '<td>' . $asignatura["Estatus"] . '</td>';
                    if ($_SESSION['tipo'] == 'SE') {
                        echo "<th><form action='consulta_inscripcion/editarInscripcion.php' method='post'><input type='hidden' name='id' value='" . $asignatura["Id"] . "'><button type='submit' class='btn btn-secondary' value='Editar'>Editar</form></th>";
                        echo "<th><form action='consulta_inscripcion/borrarInscripcion.php' method='post'><input type='hidden' name='id' value='" . $asignatura["Id"] . "'><button type='submit' class='btn btn-danger' value='Borrar'>Borrar</form></th>";
                    }
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "No se encontraron resultados.";
            }
            ?>
            </tbody>
</table>

<?php
if ($_SESSION['tipo'] == 'AL') { ?>
    <div class="card mx-auto" style="width: 18rem;">
    <img src="https://picsum.photos/500/300" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Periodo de inscripción</h5>
        <p class="card-text">Ciclo de Agosto - Diciembre 2023</p>
        <a href="#" class="btn btn-secondary">Mas información</a>
    </div>
</div>

<?php } ?>