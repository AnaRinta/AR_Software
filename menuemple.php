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

                    <!-- opción Perfil con el icono correspondiente -->
                    <li class="nav-item me-3">
                        <a class="nav-link active d-flex flex-column align-items-center" href="configuracionperfil.php" role="button">
                            <i class="bi bi-person-fill  bi-menu"></i>
                            <span class="sesion">Perfil</span>
                        </a>
                    </li>

                    <!-- opción Ver carrito con el icono correspondiente  -->
                    <li class="nav-item me-3">
                        <a class="nav-link active d-flex flex-column align-items-center" href="inventario.php" role="button">
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
       
      <!-- Barra de buscar -->
       
        <form class="d-flex justify-content-center custom-search" action="buscar.php" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Buscar producto por nombre o código" aria-label="Buscar" style="max-width: 800px; width: 100%;">
            <button class="btn btn-outline-success" type="submit">
                <i class="bi bi-search search"></i>
            </button>
        </form>
       <br>
       <br>
       

       <!--Primer container de categorias-->
        <div class="container" style="margin-top: 2%;">
            <div class="row">
                <div class="col-md-3  text-center">
                    <div>
                        <img src="Imagen--/dulces.png" class="img-fluid" alt="Categorias" style="width: 85px; height: 85px;">  <!--img- fluid ayuda a que la imagen sea responsiva-->
                        <a href="dulces" style="display: block; margin-top: 5px;" class="nombres-categorias">Dulces</a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div>
                        <img src="Imagen--/hela.jpg" class="img-fluid " alt="Categorias" style="width: 85px; height: 85px;">
                        <a href="helados" style="display: block; margin-top: 5px;"class="nombres-categorias">Helados</a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div>
                        <img src="Imagen--/licores.png" class="img-fluid" alt="Categorias" style="width: 85px; height: 85px;">
                        <a href="licores_y_cervezas" style="display: block; margin-top: 5px;"class="nombres-categorias">Licores y cervezas</a>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div>
                        <img src="Imagen--/papeleria.png" class="img-fluid" alt="Categorias" style="width: 85px; height: 85px;">
                        <a href="papeleria" style="display: block; margin-top: 5px;"class="nombres-categorias">Papeleria</a>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>

        <!--Segundo container de categorias-->

        <div class="container" style="margin-top: 2%;">
            <div class="row justify-content-end">
                <div class="col-sm-3  text-center">
                    <div>
                        <img src="Imagen--/gaseosas.jpg" class="img-fluid " alt="Categorias" style="width: 85px; height: 85px;">  <!--img- fluid ayuda a que la imagen sea responsiva-->
                        <a href="gaseosas" style="display: block; margin-top: 5px;"class="nombres-categorias">Gaseosas</a>
                    </div>
                </div>
                <div class="col-sm-3  text-center">
                    <div>
                        <img src="Imagen--/abarrotes.png" class="img-fluid alt="style="width: 85px; height: 85px;">
                        <a href="abarrotes" style="display: block; margin-top: 5px;"class="nombres-categorias">Abarrotes</a>
                    </div>
                </div>
                <div class="col-sm-3  text-center">
                    <div>
                        <img src="Imagen--/Aseo p.png" class="img-fluid" alt="Categorias" style="width: 85px; height: 85px;">
                        <a href="aseo_personal" style="display: block; margin-top: 5px;"class="nombres-categorias">Aseo personal</a>
                    </div>
                </div>
                <div class="col-sm-3  text-center">
                    <div>
                        <img src="Imagen--/aseo casa.png" class="img-fluid" alt="Categorias" style="width: 85px; height: 85px;">
                        <a href="aseo_del_hogar" style="display: block; margin-top: 5px;"class="nombres-categorias">Aseo del hogar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Aca se agrega boton para soporte tecnico-->
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6 col-md-8">
                    <div class="d-flex align-items-center ayuda">
                        <a href="https://wa.me/c/573123271237" class="btn btn-float" style="border-radius: 70%; background-color: green; color: white; ">
                            <i class="bi-whatsapp" style="font-size: 30px;"></i>
                        </a>
                        <h3 class="soporte ms-2">Soporte técnico</h3>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>         
    </body>
</html>