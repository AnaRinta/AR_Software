
<?php

    require "conexion.php";

    $sql = " SELECT * FROM productos";
    $result = $conexion ->query($sql);
    //echo "<br><br>" . $result-> num_rows. "Registros totales <br> <br>";
 
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu principal</title>
        <link rel="stylesheet" href="Estilos.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

      <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-md">

            <div class="container d-flex align-items-center justify-content-start">
                
                <img src="Imagen--/Imagen 2.png" alt="logotipo rapimerca" width="105px" height="80px" style="border-radius: 20%; margin-top: 10px; margin-right: 10px;"> <!-- Logotipo -->
                
             
                <h2 class="subtitu-menu">Bienvenido colaborador</h2>    <!-- Texto Bienvenidos-->
            </div>
          
            <div class="container d-flex justify-content-between align-items-center">
               
                
                <ul class="navbar-nav ms-auto d-flex " style="margin-right: 80px;">


                  <!-- Icono que permite volver al inicio  -->
                  <li class="nav-item me-3">
                        <a class="nav-link active d-flex flex-column align-items-center" href="http://localhost/AR_Software/menuemple.php" role="button">
                            <i class="bi bi-house bi-menu"></i>
                            <span class="sesion">Inicio</span>
                        </a>
                    </li>

                    <!-- opción Perfil con el icono correspondiente -->
                    <li class="nav-item me-3">
                        <a class="nav-link active d-flex flex-column align-items-center" href="configuracionperfil.php" role="button">
                            <i class="bi bi-person-fill  bi-menu"></i>
                            <span class="sesion">Perfil</span>
                        </a>
                    </li>

                    

                    <!-- opción Ver carrito con el icono correspondiente  -->
                    <li class="nav-item me-3">
                        <a class="nav-link active d-flex flex-column align-items-center" href="#" role="button">
                            <i class="bi bi-card-checklist bi-menu"></i>
                            <span class="sesion">Inventario</span>
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active d-flex flex-column align-items-center" href="#" role="button">
                            <i class="bi bi-cart-check bi-menu"></i>
                            <span class="sesion">Pedidos</span>
                        </a>
                    </li>

                    <!-- opción Sesión con el menu despegable -->
                    <li class="nav-item dropdown"  style="margin-top: 24px;" >
                        <a class="nav-link active dropdown-toggle d-flex flex-column align-items-center" role="button" data-bs-toggle="dropdown"></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"href="Configuraciones">Configuraciones</a></li>
                            <li><a href="index.php" class="dropdown-item soporte">Cerrar sesión</a></li>
                              
                        </ul>
                        <span class="sesion" >Sesión</span>
                        
                    </li>
                    
                </ul>
            </div>

        </nav>

      <br>
        <div class="container">
            <h2 class="subtitulo text-center">Gestión de Productos</h2>
            <br>
            
            <button type="button" class="btn btn-outline text-white" style="background-color: #51DEE9" onclick="crearProducto()">Crear productos</button>
            <button type="button " class="btn btn-outline text-white"  style="background-color: #51DEE9" >Descargar información de productos</button>
        </div>
        <br>

        <!-- Barra de buscar -->
        <div class="container">
                
            <form class="d-flex justify-content-center custom-search" action="buscar.php" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Buscar producto por nombre o código" aria-label="Buscar" style="max-width: 800px; width: 100%;">
                <button class="btn btn-outline-success" type="submit">
                    <i class="bi bi-search search"></i>
                </button>
            </form>
        </div>

        <br>
        <br>
        
        <!--tabla que contiene los campos de productos y los registros ya hechos -->
        <div class="container"> 
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Modificaciones</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Codigo del producto</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Precio de compra</th>
                    <th scope="col">Precio de venta</th>
                    <th scope="col">Cantidad disponible</th>
                    <th scope="col">Estado del producto</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php
                    if ($result-> num_rows >0) {
                        while($row= $result -> fetch_assoc()){
                        // echo  " "codigo: ". $row["id_prod"] ." nombreproducto: ". $row["nombre_prod"] . "preciocompra: ". $row["precio_compra"] . "precioventa: ". $row["precio_venta"]. "cantidad_disponible: ". $row["cantidad_prod"]. "estado: ". $row["estado_prod"]. "<br>";
                        
                        ?>
                        
                        

                        <tr>

                            <td>
                                <a class="btn text-white" style="background-color: #51DEE9; margin-bottom: 5px;"  href="editarProducto.php?id_prod=<?php echo $row['id_prod']; ?>">Editar</a><br>
                                <a class="btn text-white" style="background-color: #51DEE9" href="eliminarProducto.php?id_prod=<?php echo $row['id_prod']; ?>" onclick="return confirm('¿Estás seguro que quieres eliminar este producto?')">Borrar</a>  <!-- estructura del boton que elimina un producto-->
                            </td>

                            <td><?php echo $row["fecha_crea_prod"]?></td> 
                            <td><?php echo $row["id_prod"] ?></td>
                            <td><?php echo $row["nombre_prod"]?></td>      
                            <td><?php echo $row["precio_compra"] ?></td>
                            <td><?php echo $row["precio_venta"] ?></td>
                            <td><?php echo $row["cantidad_prod"] ?></td>
                            <td><?php echo  $row["estado_prod"]?></td>
                                
                        </tr>
                        <?php
                        
                    }
                    } else {
                
                

                
                ?> 
                    
                <?php 
                    echo "0 results";
                }
                $conexion->close();
            ?>
            </table>
        </div>
        <!-- Codigo para direccionar boton de crear producto-->
        <script>
            function crearProducto() {
                // Aquí se pone a donde se desea dirigir el botón
                window.location.href = "http://localhost/AR_Software/productos.php";
            }
        </script>

    </body>
</html>
