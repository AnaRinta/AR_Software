<?php
include 'conexion.php'; // Conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $nombreproducto = isset($_POST['nombreproducto']) ? $_POST['nombreproducto'] : '';
    $preciocompra = isset($_POST['preciocompra']) ? $_POST['preciocompra'] : '';
    $precioventa = isset($_POST['precioventa']) ? $_POST['precioventa'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $cantidad_disponible = isset($_POST['cantidad_disponible']) ? $_POST['cantidad_disponible'] : '';

    // Query para actualizar el producto
    $sql = "UPDATE productos 
            SET 
                nombre_prod = '$nombreproducto', 
                cantidad_prod = '$cantidad_disponible', 
                precio_compra = '$preciocompra', 
                precio_venta = '$precioventa', 
                estado_prod = '$estado'
            WHERE id_prod = '$codigo'";

    if ($conexion->query($sql) === TRUE) {
        echo "Producto actualizado exitosamente";
        header('Location:http://localhost/AR_Software/inventario.php'); // Redirigir al inventario tras la actualización
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }

    // Cerrar conexión
    $conexion->close();
}
?>
