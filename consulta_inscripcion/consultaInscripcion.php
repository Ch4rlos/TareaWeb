<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Estatus de asignaturas</title>
</head>

<body>
    <h1>Estatus de asignaturas</h1>

    <?php
    if ($_SESSION['tipo'] == 'SE') {
        echo '<form action="consulta_inscripcion/inscripcion.php" method="post">';
        echo '<label for="matricula">Matricula:</label>';
        echo '<input type="text" id="matricula" name="matricula" required><br><br>';
        echo '<input type="submit" value="Consultar">';
        echo '</form>';


    } else if($_SESSION['tipo'] == 'AL') {
        include 'inscripcion.php';
    }
    ?>
</body>

</html>