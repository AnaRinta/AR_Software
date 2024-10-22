<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="Estilos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <br>
    <!-- contenedor del formulario para crear producto-->  
    <form action="crearProducto.php" method= "POST">
        <div class="container d-flex flex-column align-items-center">
            <h2 class="subtitulo text-center">Crear Producto</h2>
            <br>

            <div class="d-flex flex-column align-items-start">
                <label for="categoria">Categoria</label>
                <select class="form-select"  style="width: 640px; height: 35px;" name="categoria" id="categoria" required>
                    <option selected></option>
                    <option value="1">Dulces</option>
                    <option value="2">Helados</option>
                    <option value="3">Licores y cervezas</option>
                    <option value="4">Papeleria</option>
                    <option value="5">Gaseosas</option>
                    <option value="6">Abarrotes</option>
                    <option value="7">Aseo personal</option>
                    <option value="8">Aseo del hogar</option>
    
                    
                </select>
            </div>
            <br>
            <div class="d-flex flex-column align-items-start">
                <label for="codigo">Codigo de barras</label>
                <input type="text" class="form-control"  style="width: 640px; height: 35px;"name="codigo" required>
            </div> 
            <br>
            <div class="d-flex flex-column align-items-start">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control"  style="width: 640px; height: 35px;"name="nombreproducto" required>
            </div>
            <br>
        
            <div class="d-flex flex-column align-items-start">
                <label for="precio-compra">Precio de Compra</label>
                <input type="text" class="form-control"  style="width: 640px; height: 35px;" name="preciocompra" required>
            </div>
            <br>
        
            <div class="d-flex flex-column align-items-start">
                <label for="precio-venta">Precio de Venta</label>
                <input type="text" class="form-control" style="width: 640px; height: 35px;" name="precioventa" required>
            </div>
            <br>
            <div class="d-flex flex-column align-items-start">
                <label for="estado">Estado del Producto</label>
                <select class="form-select"  style="width: 640px; height: 35px;" name="estado" id="estado" required>
                    <option selected></option>
                    <option value="1">Disponible</option>
                    <option value="2">Agotado</option>
                    <option value="2">Descontinuado</option>
                
                    
                </select>
            </div>
            <br>
            
            <div class="d-flex flex-column align-items-start">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control"  style="width: 640px; height: 35px;" name="cantidad_disponible" id="cantidad" required>
            </div>
            <br>
        
            <!-- Botones para guardar o cancelar -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-lg text-white" style="background-color: #51DEE9;">Guardar</button>
                <button type="submit" class="btn btn-lg text-white ms-3" style="background-color: #51DEE9;" onclick="cancelar()">Cancelar</button>
            </div>
        </div>
    </form>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-8">
            <div class="d-flex align-items-center ayuda">
            <a href="soporte_tecnico" class="btn btn-float" style="border-radius: 70%; background-color: green; color: white;">
             <i class="bi-whatsapp" style="font-size: 30px;"></i>
            </a>
            <h3 class="soporte" style="margin-left: 8px;">Soporte técnico</h3>
          </div>
        </div>
      </div>

      <!-- Codigo para direccionar boton de crear producto-->
    <script>
        function cancelar() {
            // Aquí se pone a donde se desea dirigir el botón
            window.location.href = "http://localhost/AR_Software/inventario.php";
        }
    </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>