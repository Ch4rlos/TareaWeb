<div class="container">
  <div class="row">
    <div class="mx-auto col-10 col-md-8 col-lg-6">
      <br>
      <h1>Iniciar Sesión</h1>
      <br>

      <form action="login/validar_login.php" method="post">
        <div class="form-group">
          <label for="matricula">Matricula:</label>
          <input name="matricula" type="matricula" class="form-control" id="matricula" aria-describedby="matricula" required>
          <small id="emailHelp" class="form-text text-muted">Escribe la matricula que se te asigno.</small>
        </div>

        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input name="password" type="password" class="form-control" id="password" required>
        </div>
        <br>
        </script>
        <button type="submit" class="btn btn-info">Ingresar</button>
      </form>
      <br>
    </div>
  </div>

</div>