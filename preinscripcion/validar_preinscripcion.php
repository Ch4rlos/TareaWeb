<?php
include "../config.php";
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $asignatura = $_POST['asignatura'];
    $semestre = $_POST['semestre'];
    $grupo= $_POST['grupo'];
    $profesor= $_POST['profesor'];
    $turno= $_POST['turno'];
    $estatus= $_POST['estatus'];
    if ($_SESSION['tipo'] == 'SE') {
        $matricula = $_POST['matricula'];
    } else {
        $matricula = $_SESSION['matricula'];
    }
    
    // Revisar que ningún dato del formulario esté vacío
    if (empty($asignatura) || empty($semestre)) {
        echo "Por favor llena todos los camposs.";
        exit();
    }

    // Insertar datos en la tabla INSCRIPCION
    $stmt = $conn->prepare("INSERT INTO `INSCRIPCION` (`Matricula`, `Asignatura`, `Grupo`, `Profesor`, `Turno`, `Semestre`, `Estatus`) VALUES (:matricula, :asignatura, :grupo, :profesor, :turno, :semestre, :estatus);");
    $stmt->bindParam(':matricula', $matricula);
    $stmt->bindParam(':asignatura', $asignatura);
    $stmt->bindParam(':grupo', $grupo);
    $stmt->bindParam(':profesor', $profesor);
    $stmt->bindParam(':turno', $turno);
    $stmt->bindParam(':semestre', $semestre);
    $stmt->bindParam(':estatus', $estatus);

    $stmt->execute();

    if($stmt->rowCount() > 0){
        echo "Registro agregado correctamente";
    }else{
        echo "No se pudo agregar el registro";
    }
}
?>
