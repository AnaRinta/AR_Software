<?php
// Iniciar sesión
session_start();

include 'conexion.php'; // Archivo de conexión con la base de datos

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario desde la sesión
$id_usuario = $_SESSION['id_usuario'];

// Consulta para obtener los datos del usuario
$sql = "SELECT nombre_completo, correo_electronico, contraseña FROM usuarios WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

// Si se encuentra el usuario, llenamos los campos
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombre = $row['nombre_completo'];
    $correo = $row['correo_electronico'];
    $contraseña = $row['contraseña'];
} else {
    echo "No se encontraron datos del usuario.";
}

$stmt->close();

// Cerrar la conexión
$conexion->close();
?>
