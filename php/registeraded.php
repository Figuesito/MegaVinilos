<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

    $nombre_cliente = trim($_POST["nombre"]);
    $direccion = trim($_POST["direccion"]);
    $telefono = trim($_POST["telefono"]);

    // Validar si email o usuario ya existen
    $sqlCheck = "SELECT * FROM usuarios WHERE email = ? OR username = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("ss", $email, $username);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        $_SESSION['mensaje'] = "El correo o usuario ya están registrados.";
        $_SESSION['mensaje_tipo'] = "error";
        header("Location: ../register.php");
        exit();
    }
    $stmtCheck->close();

    // Insertar en usuarios
    $sqlUser = "INSERT INTO usuarios (email, username, contrasena) VALUES (?, ?, ?)";
    $stmtUser = $conn->prepare($sqlUser);
    $stmtUser->bind_param("sss", $email, $username, $contrasena);

    if ($stmtUser->execute()) {
        $id_usuario = $conn->insert_id;

        // Insertar en clientes
        $sqlCliente = "INSERT INTO clientes (nombre_cliente, direccion_cliente, telefono, email_cliente, id_usuario) VALUES (?, ?, ?, ?, ?)";
        $stmtCliente = $conn->prepare($sqlCliente);
        $stmtCliente->bind_param("ssssi", $nombre_cliente, $direccion, $telefono, $email, $id_usuario);

        if ($stmtCliente->execute()) {
            $_SESSION['mensaje'] = "Registro exitoso, ya puedes iniciar sesión.";
            $_SESSION['mensaje_tipo'] = "success";
            header("Location: ../login.php");
            exit();
        } else {
            $_SESSION['mensaje'] = "Error al registrar cliente: " . $stmtCliente->error;
            $_SESSION['mensaje_tipo'] = "error";
            header("Location: ../register.php");
            exit();
        }
        $stmtCliente->close();
    } else {
        $_SESSION['mensaje'] = "Error al registrar usuario: " . $stmtUser->error;
        $_SESSION['mensaje_tipo'] = "error";
        header("Location: ../register.php");
        exit();
    }

    $stmtUser->close();
    $conn->close();
} else {
    header("Location: ../register.php");
    exit();
}
?>
