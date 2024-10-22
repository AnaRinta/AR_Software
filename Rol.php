<?php
// Suponiendo que ya tienes conexión a la base de datos en "conexion.php"
include "conexion.php"; 

// Consulta para obtener los roles
$sql = "SELECT * FROM rol";
$result = $conecta->query($sql);
?>

<form action="insertar.php" method="POST">
    <label for="tipoUsuario">Selecciona el tipo de usuario:</label>
    <select name="tipoUsuario" id="tipoUsuario" required>
        <?php
        if ($result->num_rows > 0) {
            // Salida de cada fila
            while($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['id_rol'] . '">' . $row['nombre_rol'] . '</option>';
            }
        } else {
            echo '<option value="">No hay roles disponibles</option>';
        }
        ?>