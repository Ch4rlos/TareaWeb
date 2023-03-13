<?php
echo "vamos a ver si jala";
// Conectar a la base de datos
$host = "localhost:3600";
$dbname = "id19897981_escuela";
$username = "id19897981_admin";
$password = "~CR@*@NEx7p^UTfa";

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  // Establecer el modo de error PDO a excepción
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
// Verificar la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}
// Recibir datos del formulario
$id = $_POST['id'];

$stmt = $conn->prepare("SELECT * FROM INSCRIPCION WHERE Id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  // El usuario está registrado
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['Id'];
    $matricula = $row['Matricula'];
    $asignatura = $row['Asignatura'];
    $grupo = $row['Grupo'];
    $profesor = $row['Profesor'];
    $turno = $row['Turno'];
    $semestre = $row['Semestre'];
    $estatus = $row['Estatus'];
  }
} else {
  echo "Algo salio mal.";
}

?>


<html>

<body>
  <main>
    <h1>Editar de asignaturas</h1>
    <form action="editar.php" method="post">
      <label for="asignatura">id:</label>
      <input type="text" id="id" name="id" value="<?php echo $id; ?>" required><br><br>
      <label for="asignatura">Matricula:</label>
      <input type="text" id="matricula" name="matricula" value="<?php echo $matricula; ?>" required><br><br>
      <label for="asignatura">Asignatura:</label>
      <input type="text" id="asignatura" name="asignatura" value="<?php echo $asignatura; ?>" required><br><br>
      <label for="semestre">Semestre:</label>
      <input type="text" id="semestre" name="semestre" value="<?php echo $semestre; ?>" required><br><br>
      <label for="grupo">Grupo:</label>
      <input type="text" id="grupo" name="grupo" value="<?php echo $grupo; ?>" required><br><br>
      <label for="asignatura">Profesor:</label>
      <input type="text" id="profesor" name="profesor" value="<?php echo $profesor; ?>" required><br><br>
      <label for="asignatura">Turno:</label>
      <input type="text" id="turno" name="turno" value="<?php echo $turno; ?>" required><br><br>
      <label for="asignatura">Estatus:</label>
      <input type="text" id="estatus" name="estatus" value="<?php echo $estatus; ?>" required><br><br>
      <input type="submit" value="Editar">
    </form>
  </main>
</body>

</html>