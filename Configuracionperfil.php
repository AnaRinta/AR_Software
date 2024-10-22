<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="Estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Actualizar Usuario</h2>
        <form action="Actualizar.php" method="POST">
            <input type="hidden" name="id_usua" value="<?php echo $_GET['id_usua']; ?>"> <!-- ID del usuario -->

            <div class="mb-3">
                <label for="nombreCompleto" class="form-label">Nombre y Apellido</label>
                <input type="text" class="form-control" name="nombreCompleto" required>
            </div>

            <div class="mb-3">
                <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
                <select class="form-select" name="tipoUsuario" required>
                    <option value="" selected disabled>Tipo de usuario</option>
                    <option value="1">Empleado</option>
                    <option value="2">Cliente</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fechaNacimiento" required>
            </div>

            <div class="mb-3">
                <label for="celular" class="form-label">Número de Celular</label>
                <input type="tel" class="form-control" name="celular" required>
            </div>

            <div class="mb-3">
                <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="correoElectronico" required>
            </div>

            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contraseña" id="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
