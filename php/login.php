<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($contrasena, $usuario["contrasena"])) {
            echo "<script>alert('Inicio de sesión exitoso'); window.location.href='../index.html';</script>";
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='../login.html';</script>";
        }
    } else {
        echo "<script>alert('Correo no encontrado'); window.location.href='../login.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
