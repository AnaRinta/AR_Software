<?php
    session_start();
    include 'conexion.php'; // Archivo de conexión con la base de datos

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correoElectronico = isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] : '';
        $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';

        // Primero, se intenta iniciar sesión como empleado
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
                    $_SESSION['rol'] = 'empleado'; // Guardar el rol en la sesión

                    header('Location: http://localhost/AR_Software/menuemple.php'); 
                    exit();
                } else {
                    $_SESSION['error'] = "La contraseña es incorrecta."; // Cambiar a mensaje de sesión
                    header('Location: index.php'); // redirigir al inicio de sesión
                    exit();
                }
            } else {
                // Si no se encontró un empleado, se intenta buscar en la tabla de clientes
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
                            $_SESSION['error'] = "La contraseña es incorrecta."; // mensaje a mostrar en la interfaz
                            header('Location: index.php'); // redirigir al inicio de sesión
                            exit();
                        }
                    } else {
                        $_SESSION['error'] = "El correo electrónico no está registrado."; // mensaje a mostrar en la interfaz
                        header('Location: index.php'); // redirigir al inicio de sesión
                        exit();
                    }

                    $stmtCliente->close();
                } else {
                    $_SESSION['error'] = "Error al preparar la consulta para clientes.";
                }
            }

            $stmtEmpleado->close();
        } else {
            $_SESSION['error'] = "Error al preparar la consulta para empleados."; 
    }

    }

    $conexion->close();
?>   


