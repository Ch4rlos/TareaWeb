<?php
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
$matricula = $_POST['matricula'];
$password = $_POST['password'];
print("fase 1");
// Revisar que ningún dato del formulario esté vacío
if (empty($password)) {
    echo "Inserte su password.";
    exit();
}
print("fase 2");
if (empty($matricula)) {
    echo "Inserte su matricula.";
    exit();
}
print("fase 3");
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
    

    // Redirigir a la página adecuada
    if ($tipo == "SE") {
        //echo "¡Bienvenido $nombre $apellidoPaterno $apellidoMaterno! Has ingresado como $tipo.";
        //Ir a la página de admin
        header("Location: ../index.php");
    } else if ($tipo == "AL") {
        echo "¡Bienvenido Alumno $nombre $apellidoPaterno $apellidoMaterno! Has ingresado como $tipo.";
        
        //ir a la página de alumno
        header("Location: ../index.php");
    }
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>


