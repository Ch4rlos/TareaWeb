<html>

<body>
  <main>
    <h1>Preinscripción de asignaturas</h1>

    <form action="preinscripcion/validar_preinscripcion.php" method="post">

      <?php
      // Verificar que la sesión esté iniciada
      if (!isset($_SESSION['tipo'])) {
        die("Error: La sesión no está iniciada.");
      }

      if ($_SESSION['tipo'] == 'AL') {
        echo '<p>Matricula' . $_SESSION['matricula'] . '</p>';
      } else if ($_SESSION['tipo'] == 'SE') {
        echo '<label for="matricula">Matricula:</label>';
        echo '<input type="text" id="matricula" name="matricula" required><br><br>';
      }
      ?>
      <label for="asignatura">Asignatura:</label>
      <input type="text" id="asignatura" name="asignatura" required><br><br>
      <label for="semestre">Semestre:</label>
      <input type="text" id="semestre" name="semestre" required><br><br>
      <label for="asignatura">Grupo:</label>
      <input type="text" id="grupo" name="grupo" required><br><br>
      <label for="asignatura">Profesor:</label>
      <input type="text" id="profesor" name="profesor" required><br><br>
      <label for="asignatura">Turno:</label>
      <input type="text" id="turno" name="turno" required><br><br>
      <label for="asignatura">Estatus:</label>
      <input type="text" id="estatus" name="estatus" required><br><br>
      <input type="submit" value="Preinscribir">
    </form>
  </main>
</body>

</html>