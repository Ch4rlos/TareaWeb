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
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

echo "fase 1";
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $asignatura = $_POST['asignatura'];
    $semestre = $_POST['semestre'];
    $grupo="1";
    $profesor="s";
    $turno="ves";
    $estatus="3";
    $matricula = $_SESSION['matricula'];
    
    // Revisar que ningún dato del formulario esté vacío
    if (empty($asignatura) || empty($semestre)) {
        echo "Por favor llena todos los campos.";
        exit();
    }
    echo "fase 2";
    // Insertar datos en la tabla INSCRIPCION
    $stmt = $conn->prepare("INSERT INTO `INSCRIPCION` (`Matricula`, `Asignatura`, `Grupo`, `Profesor`, `Turno`, `Semestre`, `Estatus`) VALUES (:matricula, :asignatura, :grupo, :profesor, :turno, :semestre, :estatus);");
    $stmt->bindParam(':matricula', $matricula);
    $stmt->bindParam(':asignatura', $asignatura);
    $stmt->bindParam(':grupo', $grupo);
    $stmt->bindParam(':profesor', $profesor);
    $stmt->bindParam(':turno', $turno);
    $stmt->bindParam(':semestre', $semestre);
    $stmt->bindParam(':estatus', $estatus);
    echo "fase 2.5";
    $stmt->execute();
    echo "fase 2.6";
    if($stmt->rowCount() > 0){
        echo "Registro agregado correctamente";
    }else{
        echo "No se pudo agregar el registro";
    }
    echo "fase 3";
}
?>
