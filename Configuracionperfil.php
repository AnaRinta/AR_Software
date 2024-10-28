<?php
    // Inicia la sesión para acceder a variables de sesión
    session_start();
    // Incluye el archivo de conexión a la base de datos
    include 'conexion.php';

    // Verifica si el usuario ha iniciado sesión y si se ha establecido su rol
    if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['rol'])) {
        // Aquí podrías redirigir a la página de inicio de sesión o mostrar un mensaje de error
    }

    // Obtiene el ID de usuario y el rol desde la sesión
    $id_usuario = $_SESSION['id_usuario'];
    $rol = $_SESSION['rol'];

    // Define la consulta SQL dependiendo del rol del usuario
    if ($rol == 'empleado') {
        // Si es un empleado, selecciona correo y celular de la tabla empleados
        $query = "SELECT correo_empl AS correo, celular_empl AS celular FROM empleados WHERE id_empl = ?";
    } else {
        // Si no es un empleado, selecciona correo y celular de la tabla clientes
        $query = "SELECT correo_clie AS correo, celular_clie AS celular FROM clientes WHERE id_clie = ?";
    }

    // Prepara la consulta SQL para evitar inyecciones SQL
    $stmt = $conexion->prepare($query);
    // Vincula el ID de usuario a la consulta
    $stmt->bind_param("i", $id_usuario);
    // Ejecuta la consulta
    $stmt->execute();
    // Obtiene el resultado de la consulta
    $result = $stmt->get_result();
    // Recupera los datos del usuario como un arreglo asociativo
    $user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
 
    <link rel="stylesheet" href="Estilos.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <br><br>
   <form action="guardarPerfil.php" method="POST">

          <!--formulario a editar-->
       <div class="container d-flex flex-column align-items-center">
           <h4 class="subtitulo">Configuracion de perfil</h4>
           <br><br>

           
           
            <label for="correo">Correo electrónico</label><br>
            <input type="email" name="correo" class="form-control" style="width: 640px; height: 35px;" id="correo" value="<?php echo htmlspecialchars($user['correo']); ?>" required>
            <br>

            <label for="celular">Número de celular</label><br>
            <input type="tel" name="celular" class="form-control" style="width: 640px; height: 35px;" id="celular" value="<?php echo htmlspecialchars($user['celular']); ?>" required>
            <br>

            
            <label for="password">Contraseña (opcional)</label><br>
            <div class="input-group" style="width: 640px; height: 35px;">
                <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                <button type="button" id="togglePassword">
                    <i id="passwordIcon" class="bi bi-eye"></i>
                </button>
            </div>
           <br>
           <!-- Botónes para guardar y cancelar -->
           <div class="container d-flex align-items-center justify-content-center" style="margin-left: 20px;">
                
                <button type="submit" class="btn text-white" style="background-color: #51DEE9;">Guardar cambios</button>
               
                <button type="reset" class="btn text-white ms-3" style="background-color: #51DEE9;" onclick="cancelar()">Cancelar</button>
            </div>
        <div>
    </form>
    <!-- Código para activar el ojo de ocultar y mostrar contraseña -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('input[name="contraseña"]');
            const passwordIcon = document.querySelector('#passwordIcon');

            togglePassword.addEventListener('click', function () {
                // Alternar el tipo de input entre 'password' y 'text'
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Cambiar el ícono
                passwordIcon.classList.toggle('bi-eye');
                passwordIcon.classList.toggle('bi-eye-slash');
            });
        });
    </script>

    <script>
        function cancelar() {
            // Redirigir según el rol del usuario
            var rol = "<?php echo $rol; ?>"; // Obtener el rol de PHP
            if (rol === 'empleado') {
                // 
                window.location.href = "http://localhost/AR_Software/menuemple.php";
            } else {
                // 
                window.location.href = "http://localhost/AR_Software/menuusua.php";
            }
        }
    </script>
</body>
</html>
