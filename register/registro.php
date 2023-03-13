<html>
  <section id="registro">      
    <form action="register/validar_registro.php" method="post">
      <h2>Registro de Alumno</h2>
      <input name="nombre" type="text" placeholder="Nombre" required>
      <input name="apellidoPaterno" type="text" placeholder="Apellido Paterno" required>
      <input name="apellidoMaterno" type="text" placeholder="Apellido Materno" required>
      <input name="matricula" type="text" placeholder="Matrícula" required>
      <input name="password" type="password" placeholder="Password" required>
      <input name="confirmPassword" type="password" placeholder="Confirmar Password" required>
      <input type="submit" value="Registrarse">
    </form>
  </section>
</html>
