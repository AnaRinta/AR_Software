<?php
    include 'conexion.php'; // Archivo de conexión a la base de datos

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $tipoUsuario = $_POST['tipoUsuario']; // 1 para empleado, 2 para cliente
        $nombreCompleto = $_POST['nombreCompleto'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $celular = $_POST['celular'];
        $correoElectronico = $_POST['correoElectronico'];
        $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña

        // Insertar en la tabla usuarios
        $sqlUsuario = "INSERT INTO usuarios (correo_usua, contraseña_usua, rol_id) VALUES ('$correoElectronico', '$contraseña', '$tipoUsuario')";

        if ($conexion->query($sqlUsuario) === TRUE) {
            // Obtener el ID del usuario recién creado
            $usua_id = $conexion->insert_id;

            // Dependiendo del tipo de usuario, insertamos en la tabla correspondiente
            if ($tipoUsuario == '1') { // Registro de empleado
                $sqlEmpleado = "INSERT INTO empleados (nombre_empl, fecha_nac_empl, celular_empl, correo_empl, contraseña_empl, usua_id) 
                                VALUES ('$nombreCompleto', '$fechaNacimiento', '$celular', '$correoElectronico', '$contraseña', '$usua_id')";
                if ($conexion->query($sqlEmpleado) === TRUE) {
                   
                    header('Location: http://localhost/AR_Software/index.php');
                } else {
                    echo "Error al registrar el empleado: " . $conexion->error;
                }
            } elseif ($tipoUsuario == '2') { // Registro de cliente
                $sqlCliente = "INSERT INTO clientes (nombre_clie, fecha_nac_clie, celular_clie, correo_clie, contraseña_clie, usua_id) 
                            VALUES ('$nombreCompleto', '$fechaNacimiento', '$celular', '$correoElectronico', '$contraseña', '$usua_id')";
                if ($conexion->query($sqlCliente) === TRUE) {
                   

                    header('Location: http://localhost/AR_Software/index.php'); // url para direccionar
                } else {
                    echo "Error al registrar el cliente: " . $conexion->error;
                }
            }
        } else {
            echo "Error al registrar en la tabla usuarios: " . $conexion->error;
        }
 
        // Cerrar la conexión a la base de datos
        $conexion->close();
    }
?>
