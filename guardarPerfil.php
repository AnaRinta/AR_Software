<?php
session_start();
include 'conexion.php';

// Activar errores de PHP (para pruebas)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$rol = $_SESSION['rol'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$contraseña = $_POST['contraseña'];

// Verificar que los datos están siendo recibidos correctamente
if (empty($correo) || empty($celular)) {
    echo "Correo y celular son obligatorios.";
    exit();
}

// Define la consulta según el rol del usuario
if ($rol == 'empleado') {
    $query = "UPDATE empleados SET correo_empl = ?, celular_empl = ?";
    if (!empty($contraseña)) {
        $query .= ", contraseña_empl = ?";
    }
    $query .= " WHERE id_empl = ?";
} else {
    $query = "UPDATE clientes SET correo_clie = ?, celular_clie = ?";
    if (!empty($contraseña)) {
        $query .= ", contraseña_clie = ?";
    }
    $query .= " WHERE id_clie = ?";
}

// Preparar y enlazar los parámetros
$stmt = $conexion->prepare($query);
if ($stmt === false) {
    echo "Error en la preparación de la consulta: " . $conexion->error;
    exit();
}

if (!empty($contraseña)) {
    $password_hash = password_hash($contraseña, PASSWORD_BCRYPT);
    $stmt->bind_param("sssi", $correo, $celular, $password_hash, $id_usuario);
} else {
    $stmt->bind_param("ssi", $correo, $celular, $id_usuario);
}

// Ejecutar la consulta y redirigir según el rol
if ($stmt->execute()) {
    echo "Perfil actualizado correctamente.";
    if ($rol == 'empleado') {
        header("Location: http://localhost/AR_Software/menuemple.php");
    } else {
        header("Location: http://localhost/AR_Software/menuusua.php");
    }
    exit(); // Detener ejecución después de redirigir
} else {
    echo "Error al actualizar el perfil: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
