<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

    $nombre_cliente = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    // Insertar en usuarios
    $sqlUser = "INSERT INTO usuarios (email, username, contrasena) VALUES (?, ?, ?)";
    $stmtUser = $conn->prepare($sqlUser);
    $stmtUser->bind_param("sss", $email, $username, $contrasena);

    if ($stmtUser->execute()) {
        $id_usuario = $stmtUser->insert_id;

        // Insertar en clientes
        $sqlCliente = "INSERT INTO clientes (nombre_cliente, direccion_cliente, telefono, email_cliente, id_usuario) VALUES (?, ?, ?, ?, ?)";
        $stmtCliente = $conn->prepare($sqlCliente);
        $stmtCliente->bind_param("ssssi", $nombre_cliente, $direccion, $telefono, $email, $id_usuario);

        if ($stmtCliente->execute()) {
            echo "<script>alert('Registro exitoso'); window.location.href='../login.html';</script>";
        } else {
            echo "Error al registrar cliente: " . $stmtCliente->error;
        }

        $stmtCliente->close();
    } else {
        echo "Error al registrar usuario: " . $stmtUser->error;
    }

    $stmtUser->close();
    $conn->close();
}
?>
