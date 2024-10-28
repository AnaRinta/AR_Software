<?php
require "conexion.php";    // Archivo de conexión a la base de datos

 // se hace la consulta para llamar todos los campos de la tabla productos

$sql = "SELECT * FROM productos";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catálogo de Productos</title>
        <link rel="stylesheet" href="Estilos.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-md">
            <div class="container d-flex align-items-center justify-content-start">
                <img src="Imagen--/Imagen 2.png" alt="logotipo rapimerca" width="105px" height="80px" style="border-radius: 20%; margin-top: 10px; margin-right: 10px;"> 
                <h2 class="subtitu-menu">Bienvenidos</h2>  
            </div>
            <div class="container d-flex justify-content-between align-items-center">
                <ul class="navbar-nav ms-auto d-flex " style="margin-right: 80px;">
                    <li class="nav-item me-3">
                        <a class="nav-link active d-flex flex-column align-items-center" href="configuracionperfil.php" role="button">
                            <i class="bi bi-person-fill bi-menu"></i>
                            <span class="sesion">Perfil</span>
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active d-flex flex-column align-items-center" href="http://localhost/AR_Software/verCarrito.php" role="button">
                            <i class="bi bi-cart4 bi-menu"></i>
                            <span class="sesion">Ver carrito</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown" style="margin-top: 24px;">
                        <a class="nav-link active dropdown-toggle d-flex flex-column align-items-center" role="button" data-bs-toggle="dropdown"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Configuraciones">Configuraciones</a></li>
                            <li><a href="index.php" class="dropdown-item soporte">Cerrar sesión</a></li>
                        </ul>
                        <span class="sesion">Sesión</span>
                    </li>
                </ul>
            </div>
        </nav>
        <br>

        <!-- Barra de buscar -->
        <div class="container">
            <form class="d-flex justify-content-center custom-search" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Buscar" style="max-width: 800px; width: 100%;">
                <button class="btn btn-outline-success" type="submit">
                    <i class="bi bi-search search"></i>
                </button>
            </form>
        </div>
        <br><br>
 
            <!--Catalogo de productos disponibles-->

        <div class="container mt-4">
            <h2 class="subtitulo text-center">Catálogo de Productos</h2>
            <br>
            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                       // Formatear el precio de venta
                      $precio_formateado = number_format($row["precio_venta"], 0, ',', '.');
                        ?>
                       <div class="col-md-4 mb-4">
                            <!-- Tarjeta que muestra los detalles del producto -->
                            <div class="card text-center" style="border: 1px solid #51DEE9;">
                                <div class="card-body">
                                    <!-- nombre del producto -->
                                    <h5 class="card-title"><?php echo $row["nombre_prod"]; ?></h5>
                                    <!-- Precio -->
                                    <p class="card-text">Precio: $<?php echo $precio_formateado; ?></p>
                                    <!-- Cantidad de stock disponible -->
                                    <p class="card-text">Stock disponible: <?php echo $row["cantidad_prod"]; ?></p>

                                    <!-- Campo oculto para el ID del producto -->
                                    <input type="hidden" name="id_prod" value="<?php echo $row['id_prod']; ?>">
                                    
                                    <label for="cantidad_disponible<?php echo $row['id_prod']; ?>"></label>
                                    
                                    <!-- Grupo para seleccionar la cantidad del producto -->
                                    <div class="input-group" style="width: 33%; margin: 0 auto;">
                                        <!-- Botón para disminuir la cantidad -->
                                        <button class="btn" style="background-color: #51DEE9;" onclick="decrement('<?php echo $row['id_prod']; ?>')">-</button>
                                        <!-- Campo para la cantidad, con restricciones de mínimo y máximo -->
                                        <input type="number" name="cantidad_disponible" id="cantidad_<?php echo $row['id_prod']; ?>" min="1" max="<?php echo $row['cantidad_prod']; ?>" value="1" class="form-control" readonly>
                                        <!-- Botón para aumentar la cantidad -->
                                        <button class="btn" style="background-color: #51DEE9;" onclick="increment('<?php echo $row['id_prod']; ?>')">+</button>
                                    </div>

                                    <br>
                                    <!-- Botón para añadir el producto al carrito -->
                                    <button class="btn text-white ms-3" style="background-color: #51DEE9;" onclick="añadirAlCarrito('<?php echo $row['nombre_prod']; ?>', <?php echo $row['precio_venta']; ?>, document.getElementById('cantidad_<?php echo $row['id_prod']; ?>').value)">Añadir al carrito</button>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    echo "<p class='text-center'>No hay productos disponibles.</p>";
                }
                $conexion->close(); //cerra conexión
                ?>
            </div>
        </div>
        <br><br><br>

        <!-- Botón para soporte técnico -->
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6 col-md-8">
                    <div class="d-flex align-items-center ayuda">
                        <a href="https://wa.me/c/573123271237" class="btn btn-float" style="border-radius: 70%; background-color: green; color: white;">
                            <i class="bi-whatsapp" style="font-size: 30px;"></i>
                        </a>
                        <h3 class="soporte ms-2">Soporte técnico</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- codigo para darle interracion de aumento y decremento alo botones de + y - -->
        <script>
            function increment(id) {
                var input = document.getElementById('cantidad_' + id);
                var currentValue = parseInt(input.value, 10); // Convertir a número
                var maxValue = parseInt(input.max, 10); // Convertir a número

                if (currentValue < maxValue) {
                    input.value = currentValue + 1; // Incrementar
                }
            }

            function decrement(id) {
                var input = document.getElementById('cantidad_' + id);
                var currentValue = parseInt(input.value, 10); // Convertir a número
                var minValue = parseInt(input.min, 10); // Convertir a número

                if (currentValue > minValue) {
                    input.value = currentValue - 1; // Decrementar
                }
            }
       </script>


        <script>
            // se inicia el carrito, recuperando datos de localStorage
            let carrito = JSON.parse(localStorage.getItem('carrito')) || []; 

            // Función para añadir un producto al carrito
            function añadirAlCarrito(nombreProducto, precio, cantidad) {
                // se debe asegurar que la cantidad sea un número entero
                cantidad = parseInt(cantidad); 

                // Buscar si el producto ya existe en el carrito utilizando el nombre del producto
                const productoExistente = carrito.find(producto => producto.nombre === nombreProducto);

                // Verificar si el producto ya existe en el carrito
                if (productoExistente) {
                    // Si el producto existe, se suma la cantidad existente con la nueva cantidad
                    productoExistente.cantidad += cantidad;
                } else {
                    // Si el producto no existe, se añade como un nuevo objeto al carrito
                    carrito.push({ nombre: nombreProducto, precio: precio, cantidad: cantidad });
                }

                // Guardar el carrito actualizado en localStorage
                localStorage.setItem('carrito', JSON.stringify(carrito));
                // Mostrar un mensaje al usuario indicando que el producto ha sido añadido al carrito
                alert(`${nombreProducto} ha sido añadido al carrito.`);
            }
        </script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
