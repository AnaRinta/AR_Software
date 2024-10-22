<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de sesión</title>
        <link rel="stylesheet" href="Estilos.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>

        <br>
        <br>
        <br>
        <!-- titulo --> 
        <div class="container d-flex justify-content-sm-center align-items-center">
        
            <h1 class="titulo "style="margin-left: 170px;">Inicio de sesión</h1>
            
        </div>
    
    
        <br>
        

        <br>
        <br>
        <form action="inicio.php" method= "POST">   <!-- etiquetapara conectar la interfaz con php-->

            <!-- Container que tiene en su contenido el logotipo de la empresa y el formulario a ingresar-->
            <div class="container">

                <div class="row ">
                    
                    <div class="col-md-4"> <!-- se agrego el logotipo de la empresa-->
                        <img src="Imagen--/imagen 2.png" alt="logotipo rapimerca" style="margin-left: 70px;"width="150px" height="150px" class="d-none d-lg-block">
                    </div>
                
                
                    <div class="col-md-6 ">
                            
                            
                        
                        <input type="email" class="form-control custom-input" name="correoElectronico" placeholder="Correo electrónico" required> <!-- la palabra required hace que no deje inciar sesion sin no se pune el campo-->
                        <br>
                        <div class="input-group">
                            <input type="password" class="form-control " name="contraseña" id="password" placeholder="Contraseña" required>
                            <button type="button" id="togglePassword">
                                  <i id="passwordIcon" class="bi bi-eye"></i>
                            </button>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center">
                                    
                            <a href="Recuperar_contraseña" class="acciones mb-0">¿Olvidaste contraseña?</a>
                            <a href="Registrarse.php" class="acciones ms-4">Crear cuenta</a>
                                    
                        </div>
                            
                        <br>
                        <br>
                            
                        <!-- Aca se agrego el boton de inicio de sesión-->
                            
                        <div class="container text-center " style="margin-left: 15px;">
                            <button type="submit" class="btn btn-lg text-white" style="background-color: #51DEE9;">Iniciar sesión</button>
                        </div>
                           
                    </div>
                
                
                </div>  
            
            </div> 

        
        </form>
        
        <br>
        <br>
         <!-- icono de la empresa que desarrollo el software-->
        <div class="d-flex align-items-center" style="margin-left: 50px;">
          <h5 class="desarrollado">Desarrollado por</h5>
           <img src="Imagen--/imagen 1.png" alt="logotipo AnaRinta_SOFTWARESOLUTIONS" style="margin-right: 60px;"width="100px" height="100px">
        </div> 
       <br>
    
       <br>
    

        <!-- Redes sociales-->
        <div class="container card" style="background-color:#F0F0F0">   
            <div class="row redes " >
                <!-- Facebook-->
                <div class="col-12  col-md-7 mb-3"> 
                    <div class="d-flex justify-content-center align-items-center">
                       
                        <i class="bi bi-facebook facebook-icon me-2"></i>
                    
                        <a href="link -facebook" class="redes ">AnaRinta_SOFTWARESOLUTIONS</a>
                    </div>   
                </div>    
            
                <!--  WhatsApp-->
                <div class="col-12 col-md-5 mb-3">
                    <div class="d-flex  align-items-center">
                        
                        <i class="bi bi-whatsapp whatsapp-icon me-2 "></i>
                      
                        <a href="Link-whatsapp" class="redes">Soporte</a>
                    </div>   
                </div> 
            </div>   
            
            <div class="row redes " >
                <!-- Asesor comercial-->
                <div class="col-12  col-md-7 mb-3"> 
                    <div class="d-flex justify-content-center align-items-center">
                       
                        <i class="bi bi-headset me-2 "></i>
                    
                        <h5 class="redes">Asesor comercial 3228734894</h5>
                    </div>   
                </div>    
            
                <!-- Instagram-->
                <div class="col-12 col-md-5 mb-3">
                    <div class="d-flex  align-items-center">
                        
                        <i class="bi bi-instagram instagram-icon me-2"></i>
                      
                        <a href="Link-isntagram" class="redes">Ana Rinta_SOFTWARESOLUTIONS</a>
                    </div>   
                </div> 
            </div>   
              
        </div>
     

        <br>
        <br>

        <script>
           document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('input[name="contraseña"]');
            const passwordIcon = document.querySelector('#passwordIcon');

            togglePassword.addEventListener('click', function () {
                // Alternar el tipo de input entre 'password' y 'text'
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Cambiar el ícono
                passwordIcon.classList.toggle('bi-eye');
                passwordIcon.classList.toggle('bi-eye-slash');
            });
            });
        </script>
    
    
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>     
    </body>

</html>