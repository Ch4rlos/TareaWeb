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
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Recibir la matrícula del estudiante a borrar
$id = $_POST['id'];

// Borrar el registro correspondiente de la tabla ESTUDIANTE
$stmt = $conn->prepare("DELETE FROM `Inscripcion` WHERE `Id` = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

if($stmt->rowCount() > 0){
    echo "Registro borrado correctamente";
}else{
    echo "No se pudo borrar el registro";
}
?>
