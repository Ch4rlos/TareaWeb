<table>
    <thead>
        <tr>
            <?php
            // Verificar que la sesión esté iniciada
            session_start();
            if (!isset($_SESSION['tipo'])) {
                die("Error: La sesión no está iniciada.");
            }
            ?>
        </tr>
    </thead>
    <tbody>
    <?php
        // Conexión a la base de datos
        $host = "localhost:3600";
        $dbname = "id19897981_escuela";
        $username = "id19897981_admin";
        $password = "~CR@*@NEx7p^UTfa";
        // Crear conexión
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Establecer el modo de error PDO a excepción
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // Verificar la conexión
        if (!$conn) {
            die("Conexión fallida: " . $conn->errorInfo());
        }

        // Recibir datos del formulario
        if ($_SESSION['tipo'] == 'SE') {
            $matricula = $_POST['matricula'];
        } else if ($_SESSION['tipo'] == 'AL') {
            if (!isset($_SESSION['matricula'])) {
                die("Error: La sesión no está iniciada.");
            }
            $matricula = $_SESSION['matricula'];
        }

        $stmt = $conn->prepare('SELECT * FROM INSCRIPCION WHERE Matricula = :matricula');
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();

        echo '<th>Asignatura</th>';
        echo '<th>Grupo</th>';
        echo '<th>Profesor</th>';
        echo '<th>Turno</th>';
        echo '<th>Semestre</th>';
        echo '<th>Estatus</th>';
        if ($_SESSION['tipo'] == 'SE') {
            echo '<th>Editar</th>';
            echo '<th>Borrar</th>';
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
                    echo "<th><form action='editarInscripcion.php' method='post'><input type='hidden' name='id' value='" . $asignatura["Id"] . "'><input type='submit' value='Editar'></form></th>";
                    echo "<th><form action='borrarInscripcion.php' method='post'><input type='hidden' name='id' value='" . $asignatura["Id"] . "'><input type='submit' value='Borrar'></form></th>";
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