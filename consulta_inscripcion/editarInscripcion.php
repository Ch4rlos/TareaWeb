




<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Instituto Educativo Ficticio</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    
</head>

<body>
    <?php
    include "config.php";
    include 'views/header.php';
    ?>


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "../config.php";

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

<div class="container">

<h1>Editar de asignaturas</h1>

<form action="editar.php" method="post">

  <div class="mb-3">
    <label label for="id" class="form-label">id:</label>
    <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required>
  </div>
  <div class="mb-3">
    <label for="matricula" class="form-label">Matricula:</label>
    <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $matricula; ?>" required>
  </div>
  <div class="mb-3">
    <label for="asignatura" class="form-label">Asignatura:</label>
    <input type="text" class="form-control" id="asignatura" name="asignatura" value="<?php echo $asignatura; ?>" required>
  </div>
  <div class="mb-3">
    <label for="semestre" class="form-label">Semestre:</label>
    <input type="text" class="form-control" id="semestre" name="semestre" value="<?php echo $semestre; ?>" required>
  </div>
  <div class="mb-3">
    <label for="grupo" class="form-label">Grupo:</label>
    <input type="text" class="form-control" id="grupo" name="grupo" value="<?php echo $grupo; ?>" required>
  </div>
  <div class="mb-3">
    <label for="profesor" class="form-label">Profesor:</label>
    <input type="text" class="form-control" id="profesor" name="profesor" value="<?php echo $profesor; ?>" required>
  </div>
  <div class="mb-3">
    <label for="turno" class="form-label">Turno:</label>
    <input type="text" class="form-control" id="turno" name="turno" value="<?php echo $turno; ?>" required>
  </div>
  <div class="mb-3">
    <label for="estatus" class="form-label">Estatus:</label>
    <input type="text" class="form-control" id="estatus" name="estatus" value="<?php echo $estatus; ?>" required>
  </div>

  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>






</body>

</html>