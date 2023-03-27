<?php
include "../config.php";
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
// Recibir datos del formulario
$matricula = $_POST['matricula'];
$password = $_POST['password'];

// Revisar que ningún dato del formulario esté vacío
if (empty($password)) {
    echo "Inserte su password.";
    exit();
}

if (empty($matricula)) {
    echo "Inserte su matricula.";
    exit();
}

// Encriptar contraseña
//if ($matricula != "1111" && $matricula != "9999") {
    //$password = password_hash($password, PASSWORD_DEFAULT);
//}
// Consultar coincidencias de matricula y contraseña en la tabla USUARIOS
$stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE Matricula=:matricula AND Password=:password");
$stmt->bindParam(':matricula', $matricula);
$stmt->bindParam(':password', $password);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    // El usuario está registrado
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tipo = $row["TipoUsuario"];
        $nombre = $row["Nombre"];
        $apellidoPaterno = $row["ApellidoPaterno"];
        $apellidoMaterno = $row["ApellidoMaterno"];
        $matricula = $row["Matricula"];
        $turno = $row["Turno"];
    }
    // Muestra el mensaje de bienvenida y redirige a la página adecuada
    echo "¡Bienvenido $nombre $apellidoPaterno $apellidoMaterno! Has ingresado como $tipo.";
    //Almacernar datos en variables de sesión
    session_start();
    $_SESSION['matricula'] = $matricula;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellidoPaterno'] = $apellidoPaterno;
    $_SESSION['apellidoMaterno'] = $apellidoMaterno;
    $_SESSION['tipo'] = $tipo;
    $_SESSION['turno'] = $turno;
    
    header("Location: ../index.php");
} else {
    // El usuario no está registrado
    echo "Usuario o contraseña incorrectos.";
    exit();
}
?>


