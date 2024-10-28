<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Recuperar Contraseña</title>
        <link rel="stylesheet" href="Estilos.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>


    <body>
    <!--formulario para para buscar por los datos claves ese usuario, dato clave fecha de nacimiento-->
    <br>
    <br>
    <br>
        <form action="recuperarContraseña.php" method="POST">
            <div class="container d-flex flex-column align-items-center">   
               
                



                <label for="correo" >Correo Electrónico</label>
                <br>
                <input type="email" class="form-control"  style="width: 640px; height: 35px;" name="correoElectronico" required><br>

                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <br>
                <input type="date" class="form-control"   style="width: 640px; height: 35px;" name="fechaNacimiento" required><br>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn  text-white" style="background-color: #51DEE9;">Recuperar contraseña</button>
                    <button class="btn text-white ms-3" style="background-color: #51DEE9;" onclick="cancelar()">Cancelar</button>
                </div>
            <div>
        </form>
        <script>
            function cancelar() {
                // Aquí se pone a donde se desea dirigir el botón
                window.location.href = "http://localhost/AR_Software/index.php";
            }
        </script>

    </body>
</html>
