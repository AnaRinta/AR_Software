<?php
session_start();
// Conectar a la base de datos
$conexion = new mysqli("localhost", "usuario", "contraseña", "nombre_base_datos");

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$cliente_id = $_POST['cliente_id'];
$productos = $_POST['productos']; // JSON
$total = $_POST['total'];

// Aquí podrías procesar la información de los productos y guardarla en la tabla 'pedidos'
$sql = "INSERT INTO pedidos (clie_id, fecha_pedi, subtotal, IVA, total_pagar) VALUES (?, NOW(), ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$iva = $total * 0.19; // Ejemplo de cálculo de IVA
$subtotal = $total - $iva;

$stmt->bind_param("issd", $cliente_id, $subtotal, $iva, $total);
$stmt->execute();

// Puedes obtener el ID del pedido recién creado
$id_pedido = $stmt->insert_id;

// Ahora puedes procesar los productos en el carrito
$productos = json_decode($productos, true);
foreach ($productos as $producto) {
    // Aquí debes insertar cada producto en la tabla detalle_pedidos
    $sql_detalle = "INSERT INTO detalle_pedidos (id_pedi, producto_id, cantidad, precio) VALUES (?, ?, ?, ?)";
    $stmt_detalle = $conexion->prepare($sql_detalle);
    $stmt_detalle->bind_param("iiid", $id_pedido, $producto['id'], $producto['cantidad'], $producto['precio']);
    $stmt_detalle->execute();
}

$stmt->close();
$conexion->close();

// Redirigir o mostrar un mensaje de éxito
header("Location: success.php");
exit();
?>
