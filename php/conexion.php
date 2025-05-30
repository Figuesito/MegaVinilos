<?php
$host = "localhost";
$db = "megavinilos";
$user = "root";
$pass = ""; // Sin contraseña por defecto en XAMPP

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
