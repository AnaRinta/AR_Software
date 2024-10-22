
<?php
include 'conexion.php'; // Archivo de conexión con la base de datos

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correoElectronico = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '';
    $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';

    // Primero, se intenta iniciar sesión como empleado
    $sqlEmpleado = "SELECT contraseña_empl FROM empleados WHERE correo_empl = ?";
    $stmtEmpleado = $conexion->prepare($sqlEmpleado);

    if ($stmtEmpleado) {
        $stmtEmpleado->bind_param("s", $correoElectronico);
        $stmtEmpleado->execute();
        $stmtEmpleado->store_result();

        if ($stmtEmpleado->num_rows > 0) {
            // Se encontró un empleado con el correo digitado
            $stmtEmpleado->bind_result($password_hash);
            $stmtEmpleado->fetch();

            // se verifica la contraseña
            if (password_verify($contraseña, $password_hash)) {
                echo "Inicio de sesión exitoso.";
                // Redirige a la página de menu principal 
                header('Location: http://localhost/AR_Software/menuemple.php'); 
                exit(); //  usar exit() para detener la ejecución
            } else {
                echo "Datos incorrectos.";
            }
        } else {
            // Si no se encontró un empleado, se intenta buscar en la tabla de clientes
            $sqlCliente = "SELECT contraseña_clie FROM clientes WHERE correo_clie = ?";
            $stmtCliente = $conexion->prepare($sqlCliente);

            if ($stmtCliente) {
                $stmtCliente->bind_param("s", $correoElectronico);
                $stmtCliente->execute();
                $stmtCliente->store_result();

                if ($stmtCliente->num_rows > 0) {
                    // Se encontró un cliente con el correo digitado
                    $stmtCliente->bind_result($password_hash);
                    $stmtCliente->fetch();

                    // se verificar la contraseña
                    if (password_verify($contraseña, $password_hash)) {
                        echo "Inicio de sesión exitoso.";
                        header('Location:http://localhost/AR_Software/menuusua.php '); 
                 
                        exit(); //  usar exit después de header
                    } else {
                        echo "Datos incorrectos.";
                    }
                } else {
                    echo "El correo electrónico no está registrado.";
                }

                // Cerrar la declaración de cliente
                $stmtCliente->close();
            } else {
                echo "Error al preparar la consulta para clientes.";
            }
        }

        // Cerrar la declaración de empleado
        $stmtEmpleado->close();
    } else {
        echo "Error al preparar la consulta para empleados.";
    }
}

// Cerrar la conexión
$conexion->close();
?>