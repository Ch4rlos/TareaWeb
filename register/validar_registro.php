<?php
include "../config.php";
// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
// Recibir datos del formulario
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$turno = "Matutino";
$tipoUsuario = "AL";
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
// Revisar que ningún dato del formulario esté vacío
if (empty($matricula) || empty($nombre) || empty($apellidoPaterno) || 
    empty($apellidoMaterno) || empty($turno) || empty($tipoUsuario) || 
    empty($password) || empty($confirmPassword)) {
    echo "Por favor llena todos los campos. '$matricula' '$nombre' '$apellidoPaterno' '$apellidoMaterno' '$turno' '$tipoUsuario' '$password' '$confirmPassword'";
    exit();
}
// Revisar que la contraseña tenga una longitud mínima de 8 posiciones
// y una combinación de letras y números y por lo menos un carácter especial (#,$,-,_,&,%)
$passwordRegex = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/";
if (!preg_match($passwordRegex, $password)) {
    echo "La contraseña debe tener una longitud mínima de 8 posiciones, ";
    echo "con una combinación de letras y números y por lo menos un carácter especial (#";
}
// Revisar que la contraseña y la confirmación de contraseña sean iguales
if ($password != $confirmPassword) {
    echo "Las contraseñas no coinciden.";
    exit();
}
// Encriptar contraseña
//$password = password_hash($password, PASSWORD_DEFAULT);

// Consultar si la matricula existe en la tabla USUARIOS
$stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE Matricula=:matricula");
$stmt->bindParam(':matricula', $matricula);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    echo "La matricula ya existe.";
    exit();
}

//Insertar datos en la tabla USUARIOS
$stmt = $conn->prepare("INSERT INTO usuarios (matricula, nombre, apellidoPaterno, apellidoMaterno, turno, tipoUsuario, password) VALUES (:matricula, :nombre, :apellidoPaterno, :apellidoMaterno, :turno, :tipoUsuario, :password)");
$stmt->bindParam(':matricula', $matricula);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellidoPaterno', $apellidoPaterno);
$stmt->bindParam(':apellidoMaterno', $apellidoMaterno);
$stmt->bindParam(':turno', $turno);
$stmt->bindParam(':tipoUsuario', $tipoUsuario);
$stmt->bindParam(':password', $password);
$stmt->execute();
//Consulta de registro recien agregado
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE matricula=:matricula");
$stmt->bindParam(':matricula', $matricula);
$stmt->execute();
//Mostrar registro recien agregado
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($resultado as $row){
    echo "<br>";
    echo "Matricula: " . $row['Matricula'] . "<br>";
    echo "Turno: " . $row['Turno'] . "<br>";
    echo "Tipo de usuario: " . $row['TipoUsuario'] . "<br>";
    echo "Password: " . $row['Password'] . "<br>";
    echo "Nombre: " . $row['Nombre'] . "<br>";
    echo "Apellido Paterno: " . $row['ApellidoPaterno'] . "<br>";
    echo "Apellido Materno: " . $row['ApellidoMaterno'] . "<br>";
}

?>