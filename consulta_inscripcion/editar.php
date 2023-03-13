<?php
session_start();
// Conexión a la base de datos
$host = "localhost:3600";
$dbname = "id19897981_escuela";
$username = "id19897981_admin";
$password = "~CR@*@NEx7p^UTfa";

// Crear conexión
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Setear el modo de error PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

    // Recibir datos del formulario
$id = $_POST['id'];
$asignatura = $_POST['asignatura'];
$semestre = $_POST['semestre'];
$matricula = $_POST['matricula'];
$profesor = $_POST['profesor'];
$grupo = $_POST['grupo'];
$turno = $_POST['turno'];
$estatus = $_POST['estatus'];

// Verificar los datos recibidos
var_dump($id, $asignatura, $semestre, $matricula, $profesor, $grupo, $turno, $estatus);

// Actualizar datos en la tabla INSCRIPCION
$stmt = $conn->prepare("UPDATE `INSCRIPCION` SET `Matricula`=:matricula,`Asignatura`=:asignatura,`Grupo`=:grupo,`Profesor`=:profesor,`Turno`=:turno,`Semestre`=:semestre,`Estatus`=:estatus WHERE `id`=:id");

$stmt->bindParam(':id', $id);
$stmt->bindParam(':asignatura', $asignatura);
$stmt->bindParam(':semestre', $semestre);
$stmt->bindParam(':matricula', $matricula);
$stmt->bindParam(':profesor', $profesor);
$stmt->bindParam(':grupo', $grupo);
$stmt->bindParam(':turno', $turno);
$stmt->bindParam(':estatus', $estatus);

// Imprimir la consulta SQL y los parámetros
echo $stmt->queryString;
echo '<br>';
var_dump($stmt->debugDumpParams());

$stmt->execute();

// Verificar los errores en la consulta SQL
if($stmt->errorCode() != 0){
    $info = $stmt->errorInfo();
    echo "Error: " . $info[2];
    exit();
}

if($stmt->rowCount() > 0){
    echo "Registro actualizado correctamente";
}else{
    echo "No se pudo actualizar el registro";
}

?>
