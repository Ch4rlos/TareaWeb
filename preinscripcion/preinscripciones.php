<div class="container">
  <div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-6">
      <br>
      <?php
      if ($_SESSION['tipo'] == 'AL') {
        echo '<h1>Preinscripción de asignaturas - Alumno: ' . $_SESSION['matricula'] . '</h1>';
      } else {
        echo '<h1>Preinscripción de alumno en asignatura</h1>';
      }
      ?>

      <br>
      <form action="preinscripcion/validar_preinscripcion.php" method="post">
        <?php
        if ($_SESSION['tipo'] == 'SE') {
          echo '<div class="row">';
          echo '<div class="col">';
          echo '<label for="matricula">Matricula:</label>';
          echo '<input type="text" class="form-control" id="matricula" name="matricula" required><br><br>';
          echo '</div>';
          echo '</div>';
        }
        ?>

        <div class="row">
          <div class="col">
            <label for="asignatura">Asignatura:</label>
            <input type="text" class="form-control" id="asignatura" name="asignatura" required>
          </div>
          <div class="col">
            <label for="asignatura">Profesor:</label>
            <input type="text" class="form-control" id="profesor" name="profesor" required>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col">
            <label for="semestre">Semestre:</label>
            <input type="text" class="form-control" id="semestre" name="semestre" required>
          </div>
          <div class="col">
            <label for="asignatura">Grupo:</label>
            <input type="text" class="form-control" id="grupo" name="grupo" required>
          </div>
          <div class="col">
            <label for="asignatura">Turno:</label>
            <input type="text" class="form-control" id="turno" name="turno" required>
          </div>
          <div class="col">
            <label for="asignatura">Estatus:</label>
            <input type="text" class="form-control" id="estatus" name="estatus" required>
          </div>
        </div>

        <br>

        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-info">Registrarse</button>
          </div>
          </section>
        </div>

      </form>
      <br>
    </div>
    <br>
  </div>
</div>
</div>