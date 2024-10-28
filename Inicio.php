<?php
session_start();
include 'conexion.php'; // Archivo de conexión con la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correoElectronico = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '';
    $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';

    // Primero, intenta iniciar sesión como empleado
    $sqlEmpleado = "SELECT id_empl, contraseña_empl FROM empleados WHERE correo_empl = ?";
    $stmtEmpleado = $conexion->prepare($sqlEmpleado);

    if ($stmtEmpleado) {
        $stmtEmpleado->bind_param("s", $correoElectronico);
        $stmtEmpleado->execute();
        $stmtEmpleado->store_result();

        if ($stmtEmpleado->num_rows > 0) {
            $stmtEmpleado->bind_result($idEmpleado, $password_hash);
            $stmtEmpleado->fetch();

            if (password_verify($contraseña, $password_hash)) {
                $_SESSION['id_usuario'] = $idEmpleado;
                $_SESSION['rol'] = 'empleado'; // Guarda el rol en la sesión

                header('Location: http://localhost/AR_Software/menuemple.php'); 
                exit();
            } else {
                echo "Datos incorrectos.";
            }
        } else {
            // Si no se encontró un empleado, intenta buscar en la tabla de clientes
            $sqlCliente = "SELECT id_clie, contraseña_clie FROM clientes WHERE correo_clie = ?";
            $stmtCliente = $conexion->prepare($sqlCliente);

            if ($stmtCliente) {
                $stmtCliente->bind_param("s", $correoElectronico);
                $stmtCliente->execute();
                $stmtCliente->store_result();

                if ($stmtCliente->num_rows > 0) {
                    $stmtCliente->bind_result($idCliente, $password_hash);
                    $stmtCliente->fetch();

                    if (password_verify($contraseña, $password_hash)) {
                        $_SESSION['id_usuario'] = $idCliente;
                        $_SESSION['rol'] = 'cliente';

                        header('Location: http://localhost/AR_Software/menuusua.php'); 
                        exit();
                    } else {
                        echo "Datos incorrectos.";
                    }
                } else {
                    echo "El correo electrónico no está registrado.";
                }

                $stmtCliente->close();
            } else {
                echo "Error al preparar la consulta para clientes.";
            }
        }

        $stmtEmpleado->close();
    } else {
        echo "Error al preparar la consulta para empleados.";
    }
}

$conexion->close();
