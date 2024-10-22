<?php

    $local= "127.0.0.1";
    $usuario= "root";
    $pass="";
    $db="arsoftwaresolutions";

    // Crear la conexión//

    $conexion = new mysqli( $local, $usuario, $pass, $db);

    //Verificacion//

    if ($conexion -> connect_error) {
        die ("No se pudo conectar:".$conexion -> connect_error);
        
    }
    else {
        echo ("");
    }
?>
