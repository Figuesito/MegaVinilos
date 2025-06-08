<?php
session_start();
include("conexion.php"); // Tu conexión a la BD

$email = trim($_POST["email"]);
$contrasena = trim($_POST["contrasena"]);

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($contrasena, $usuario['contrasena'])) {
        // Aquí debes guardar el nombre de usuario en la sesión
        $_SESSION['username'] = $usuario['username']; // o el campo que quieras mostrar
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['mensaje'] = "Contraseña incorrecta.";
        $_SESSION['mensaje_tipo'] = "error";
    }
} else {
    $_SESSION['mensaje'] = "Usuario no encontrado.";
    $_SESSION['mensaje_tipo'] = "error";
}

header("Location: ../login.php");
exit();
?>
