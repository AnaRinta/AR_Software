<?php
include 'conexion.php'; // Archivo de conexión con la base de datos

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturar los datos del formulario
  
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
    $nombreproducto = isset($_POST['nombreproducto']) ? $_POST['nombreproducto'] : '';
    $preciocompra= isset($_POST['preciocompra']) ? $_POST['preciocompra'] : '';
    $precioventa = isset($_POST['precioventa']) ? $_POST['precioventa'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $cantidad_disponible = isset($_POST['cantidad_disponible']) ? $_POST['cantidad_disponible'] : '';
   
   



    // Datos a insertar //
   
       $sql = "INSERT INTO productos (cate_id, id_prod, nombre_prod, cantidad_prod, precio_compra,precio_venta, estado_prod) VALUES ('$categoria', '$codigo','$nombreproducto', '$cantidad_disponible', '$preciocompra', '$precioventa', ' $estado')";
        
        if ($conexion->query($sql) === TRUE) {
            echo "Producto creado exitosamente";
            header('Location: http://localhost/AR_Software/inventario.php');
        } else {
            echo "No se creo el producto revise que todos los campos esten diligenciados : " . $sql . "<br>". $conexion ->error;
        }
       

    
   

    // Cerrar la conexión
    $conexion->close();
}
?>