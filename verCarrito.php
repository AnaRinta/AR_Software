<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="Estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <br>
        <h2 class="subtitulo text-center">Carrito de Compras</h2>

        <!-- boton para retroceder de esa interfaz-->

        <button class="btn text-white ms-3" style="background-color: #51DEE9;" onclick="atras()">Atras</button>
        <br><br>
        <!-- Aca se inicia la tabla que contiene la estructura de los productos ingresados al carrito-->
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="carrito-body">
                <!-- Los productos del carrito se añadirán aquí con JavaScript -->
            </tbody>
        </table>
        
       <br>
        <div id="total-container" class="text-end">
            <h4>Total a Pagar: <span id="total-precio">$0</span></h4>
        </div>
        <br>
        <!-- Código para poner botones de vaciar y finalizar compra-->
        <div class="container text-center">
            <div style="margin-left: 20px;">
                    <button class="btn text-white ms-2" style="background-color: #51DEE9;" onclick="vaciarCarrito()">Vaciar carrito</button>
                    <button  class="btn text-white ms-2" style="background-color: #51DEE9;" >Finalizar compra</button>
            </div>
        </div>
        
        <script>
            // Obtener el carrito del localStorage
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            // Referencia al cuerpo de la tabla
            let carritoBody = document.getElementById('carrito-body');
            let totalPrecio = document.getElementById('total-precio');

            // Función para mostrar los productos en la tabla
            function mostrarCarrito() {
                carritoBody.innerHTML = ''; // Limpiar el cuerpo de la tabla
                let total = 0; // Inicializar el total

                carrito.forEach((producto, index) => {
                    let fila = document.createElement('tr');
                    let subtotal = producto.precio * producto.cantidad; // Calcular subtotal
                    total += subtotal; // Sumar al total

                    fila.innerHTML = `
                        <td>${producto.nombre}</td>
                        <td>${formatearPrecio(producto.precio)}</td>
                        <td>${producto.cantidad}</td>
                        <td>${formatearPrecio(subtotal)}</td>
                        <td>
                            <a class="text-black" href="#" onclick="eliminarProducto(${index})">
                                <i class="bi bi-trash" style="font-size: 1.2em;"></i>
                            </a>
                        </td>
                    `;
                    carritoBody.appendChild(fila);
                });

                // Actualizar el total en el contenedor
                totalPrecio.innerText = formatearPrecio(total);
            }

            // Función para formatear los precios
            function formatearPrecio(precio) {
                return `$${precio.toLocaleString('es-CO', { minimumFractionDigits: 0, maximumFractionDigits: 0 })}`;
            }

            // Función para eliminar un producto del carrito
            function eliminarProducto(index) {
                if (confirm('¿Estás seguro que quieres eliminar este producto?')) {
                    carrito.splice(index, 1); // Eliminar el producto del arreglo
                    localStorage.setItem('carrito', JSON.stringify(carrito)); // Actualizar localStorage
                    mostrarCarrito(); // Volver a mostrar el carrito
                }
            }

            // Función para vaciar el carrito
            function vaciarCarrito() {
                if (confirm('¿Estás seguro que quieres vaciar el carrito?')) {
                    carrito = []; // Limpiar el arreglo del carrito
                    localStorage.removeItem('carrito'); // Eliminar el carrito del localStorage
                    mostrarCarrito(); // Volver a mostrar el carrito (ahora vacío)
                }
            }

            // Mostrar el carrito al cargar la página
            mostrarCarrito();

            function atras() {
                // Aquí se pone a donde se desea dirigir el botón de atras
                window.location.href = "http://localhost/AR_Software/menuusua.php";
            }
        </script>

    </div>

    <br>
    <br>
  
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
