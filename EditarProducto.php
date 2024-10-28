<?php
include 'conexion.php'; // Conexión a la base de datos

// Verificar si se ha pasado un id para editar
if (isset($_GET['id_prod'])) {
    $id_prod = $_GET['id_prod'];

    // Query para obtener los datos del producto
    $sql = "SELECT * FROM productos WHERE id_prod = '$id_prod'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc(); // Obtener los datos del producto
    } else {
        echo "Producto no encontrado";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Producto</title>
        <link rel="stylesheet" href="Estilos.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

       <br>
        <form action="actualizarProducto.php" method="POST">

           <!-- Codigo del formulario donde se edita el producto-->

            <div class="container d-flex flex-column align-items-center">
                <h2 class="subtitulo text-center">Actualizar Producto</h2>
                <br>

                <input type="hidden" name="codigo" value="<?php echo $producto['id_prod']; ?>">

                <div class="d-flex flex-column align-items-start">
                    <label for="codigo">Código</label>
                    <input type="text" class="form-control" style="width: 640px; height: 35px;" name="codigo" value="<?php echo $producto['id_prod']; ?>"  readonly>   <!-- el readonly bloquea ese campo para que no se pueda editar-->
                <div>
                <br>

            
                <div class="d-flex flex-column align-items-start">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" class="form-control" style="width: 640px; height: 35px;" name="nombreproducto" value="<?php echo $producto['nombre_prod']; ?>" required>
                <div>
                
                <br>

                <label for="precio-compra">Precio de Compra</label>
                <input type="number" class="form-control" style="width: 640px; height: 35px;" name="preciocompra" value="<?php echo $producto['precio_compra']; ?>" required>
                
                <br>
                <label for="precio-venta">Precio de Venta</label>
                <input type="number" class="form-control" style="width: 640px; height: 35px;" name="precioventa" value="<?php echo $producto['precio_venta']; ?>" required>
            
                <br>
                <label for="estado">Estado</label>
                <select class="form-select"  style="width: 640px; height: 35px;" name="estado" value="<?php echo $producto['estado_prod']; ?>" required>
                  <option selected></option>
                    <option value="1">Disponible</option>
                    <option value="2">Agotado</option>
                    <option value="2">Descontinuado</option>
                
                    
                </select>

            
            
                <br>
                 <label for="cantidad">Cantidad Disponible</label>
                <input type="number" class="form-control" style="width: 640px; height: 35px;" name="cantidad_disponible" value="<?php echo $producto['cantidad_prod']; ?>" required>
                
                <br>
                 <!-- Botones para actualizar o cancelar -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-lg text-white" style="background-color: #51DEE9;">Actualizar</button>
                    <button type="submit" class="btn btn-lg text-white ms-3" style="background-color: #51DEE9;" onclick="cancelar()">Cancelar</button>
                </div>
                
            </div>

        </form>
    </body>

    <script>
        function cancelar() {
            // Aquí se pone a donde se desea dirigir el botón
            window.location.href = "http://localhost/AR_Software/inventario.php";
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</html>
