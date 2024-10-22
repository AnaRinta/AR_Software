<?php
    include 'conexion.php'; // Archivo de conexión a la base de datos

    // Verificar si se ha pasado un id para eliminar
    if (isset($_GET['id_prod'])) {
        $id_prod = $_GET['id_prod'];

        // Query para eliminar el producto
        $sql = "DELETE FROM productos WHERE id_prod = '$id_prod'";

        if ($conexion->query($sql) === TRUE) {
            echo "Producto eliminado exitosamente";
            header('Location: http://localhost/AR_Software/inventario.php'); // Redirigir al inventario tras eliminar
        } else {
            echo "Error al eliminar el producto: " . $conexion->error;
        }

        // Cerrar conexión
        $conexion->close();
    } else {
        echo "ID del producto no proporcionado";
    }


?>
