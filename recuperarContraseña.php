<?php
    include("conexion.php");  // Conexión a la base de datos

    // Verificar si se recibieron los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Comprobar si se recibieron los datos necesarios
        if (isset($_POST['correoElectronico']) && isset($_POST['fechaNacimiento'])) {
            // Obtener los datos del formulario
            $correoElectronico = $_POST['correoElectronico'];
            $fechaNacimiento = $_POST['fechaNacimiento'];

            // Consultar en la tabla empleados
            $consulta_empleados = "SELECT * FROM empleados WHERE correo_empl = '$correoElectronico' AND fecha_nac_empl = '$fechaNacimiento'";
            $resultado_empleados = mysqli_query($conexion, $consulta_empleados);

            if (mysqli_num_rows($resultado_empleados) > 0) {
                // Si coincide en empleados, mostrar formulario para actualizar la contraseña
                echo '
                <form action="" method="POST">
                    <input type="hidden" name="correo_empl" value="'.$correoElectronico.'">
                    <label for="nueva_contraseña">Nueva Contraseña:</label>
                    <input type="password" id="nueva_contraseña" name="nueva_contraseña" required><br>
                    
                    <button type="submit">Actualizar Contraseña</button>
                    <button type="button">Cancelar</button>
                </form>';
            } else {
                // Si no coincide en empleados, consultar en la tabla clientes
                $consulta_clientes = "SELECT * FROM clientes WHERE correo_clie = '$correoElectronico' AND fecha_nac_clie = '$fechaNacimiento'";
                $resultado_clientes = mysqli_query($conexion, $consulta_clientes);

                if (mysqli_num_rows($resultado_clientes) > 0) {
                    // Si coincide en clientes, mostrar formulario para actualizar la contraseña
                    echo '
                    <form action="" method="POST">
                        <input type="hidden" name="correo_clie" value="'.$correoElectronico.'">
                        <label for="nueva_contraseña">Nueva Contraseña:</label>
                        <input type="password" id="nueva_contraseña" name="nueva_contraseña" required><br>
                        
                        <button type="submit">Actualizar Contraseña</button>
                        <button type="button">Cancelar</button>
                    </form>';
                } else {
                    // Si no coincide en ninguna tabla
                    echo "La fecha de nacimiento o el correo no son correctos.";
                }
            }
        }

        // Aquí se verifica si se está actualizando la contraseña
        if (isset($_POST['nueva_contraseña'])) {
            // Hash de la nueva contraseña
            $nueva_contraseña = password_hash($_POST['nueva_contraseña'], PASSWORD_DEFAULT);

            // Verificar si el campo 'correo_empl' o 'correo_clie' está presente
            if (isset($_POST['correo_empl'])) {
                $correoElectronico = $_POST['correo_empl'];
                $tabla = "empleados";
                $campo_correo = "correo_empl";
                $campo_contraseña = "contraseña_empl";
            } elseif (isset($_POST['correo_clie'])) {
                $correoElectronico = $_POST['correo_clie'];
                $tabla = "clientes";
                $campo_correo = "correo_clie";
                $campo_contraseña = "contraseña_clie";
            } else {
                echo "Error: No se ha recibido la información necesaria.";
                exit();
            }

            // Actualizar la contraseña en la tabla correspondiente
            $consulta = "UPDATE $tabla SET $campo_contraseña = '$nueva_contraseña' WHERE $campo_correo = '$correoElectronico'";
            if (mysqli_query($conexion, $consulta)) {
              
                header('Location: http://localhost/AR_Software/index.php'); // url para direccionar
            } else {
                echo "Error al actualizar la contraseña: " . mysqli_error($conexion);
            }
        }
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
?>
