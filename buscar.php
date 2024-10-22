<?php

include 'conexion.php'; // Archivo de conexión con la base de datos

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener el valor de búsqueda
    $busqueda = $conexion->real_escape_string($_GET['query']);

    // Consultar a la base de datos
    $sql = "SELECT id_prod, nombre_prod, cantidad_prod, precio_venta FROM productos 
            WHERE nombre_prod LIKE '%$busqueda%' OR id_prod LIKE '%$busqueda%'";

    $resultado = $conexion->query($sql);

    // Verificar si la consulta se ejecutó correctamente
    if ($resultado) {
        // Verificar si hay resultados
        if ($resultado->num_rows > 0) {
            echo "<h3>Resultados de la búsqueda</h3>";
            while ($row = $resultado->fetch_assoc()) {
                // Formatear el precio de venta
                $precio_formateado = '$' . number_format($row['precio_venta'], 0, ',', '.'); // Formateamos el precio de venta para que se vea bien en la interfaz

                // Texto que aparecerá en la interfaz
                echo "
                    <div>
                        <p><strong>Codigo de barras:</strong> {$row['id_prod']}</p>
                        <p><strong>Nombre:</strong> {$row['nombre_prod']}</p>
                        <p><strong>Precio:</strong> $precio_formateado</p>
                        <p><strong>Cantidad:</strong> {$row['cantidad_prod']}</p>
                        
                        <!-- Botones para eliminar o modificar -->
                        <a href='http://localhost/AR_Software/editarProducto.php?id_prod={$row['id_prod']}' class='btn'>Modificar</a>
                        <a href='http://localhost/AR_Software/eliminarProducto.php?id_prod={$row['id_prod']}' class='btn'>Eliminar</a>
                        <a href='http://localhost/AR_Software/inventario.php?id_prod={$row['id_prod']}' class='btn'>Cancelar</a>
                        
                    </div>
                ";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    } else {
        // Error en la consulta
        die("Error en la consulta: " . $conexion->error);
    }
}

// Cerrar conexión
$conexion->close();
?>
