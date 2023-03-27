<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "../config.php";
session_start();

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
