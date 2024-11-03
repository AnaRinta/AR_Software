<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de usuarios</title>
        <link rel="stylesheet" href="Estilos.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <br>
        <br>
    
        <!-- como subtitulo sus dimensiones-->  
        <div class="container d-flex justify-content-sm-center align-items-center">
         <h2 class="subtitulo"style="margin-left: 170px;">Regístrate</h2>
            
        </div>
        <br>
    

        
        
        <!-- Container que tiene en su contenido el logotipo de la empresa y la informacion a ingresar-->
        <form action="Registrop.php" method="POST">
            <div class="container ">
                <div class="row">
                    <div class="col-md-4"> <!-- se agregó el logotipo de la empresa -->
                        <img src="Imagen--/imagen 2.png" alt="logotipo rapimerca" style="margin-top: 60px; margin-left: 70px;" width="150px" height="150px" class="d-none d-lg-block">
                    </div>

                    <!-- Formulario de registro -->
                    <div class="col-md-6 ">
                        <input type="text" class="form-control custom-input" name="nombreCompleto" placeholder="Nombre y apellido" required>    <!-- el required se usa para que el campo sea obligatorio-->
                        <br>
                        
                        <!-- opciones seleccionables -->
                        <select class="form-select" name="tipoUsuario" id="tipoUsuario" required>
                            <option value="" selected disabled>Tipo de usuario</option>
                            <option value="1">Empleado</option>
                            <option value="2">Cliente</option>
                        </select>
                        
                       <br>

                        <label for="fechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" class="form-control custom-input" name="fechaNacimiento" id="fechaNacimiento" required>
                        <br>

                        <input type="tel" class="form-control custom-input" name="celular" placeholder="Número de celular" required>
                        <br>

                        <input type="email" class="form-control custom-input" name="correoElectronico" placeholder="Correo electrónico" required>
                        <br>

                        <div class="input-group">
                            <input type="password" class="form-control" name="contraseña" id="password" placeholder="Contraseña" required>
                            <button type="button" id="togglePassword">
                                <i id="passwordIcon" class="bi bi-eye"></i>
                            </button>
                        </div>
                        <br>
                        <div id="passwordWarning" class="text-danger" style="display:none;">La contraseña debe tener al menos 10 caracteres.</div>
                         <br>
                        <div class="d-flex justify-content-center align-items-center" style="margin-left: 5px;">
                            <input type="checkbox" name="aceptoTerminos" required>
                            <h6 class="acciones mb-0 ms-2">Acepto términos y condiciones</h6>
                            <a href="Terminos y condiciones" class="acciones ms-3">Leer términos y condiciones</a>
                        </div>
                      


                        <br><br>
                    </div>
                </div>
            </div>
          

            <!-- Botones para guardar o cancelar -->
            <div class="container d-flex align-items-center justify-content-center" style="margin-right: 150px;">
                <button type="submit" class="btn btn-lg text-white ms-3 ms-md-0" style="background-color: #51DEE9;">Guardar</button>
                <button class="btn btn-lg text-white ms-md-4" style="background-color: #51DEE9;" onclick="cancelar()">Cancelar</button>
            </div>



        </form>


                           
        <br>
        
        <!-- Logo del desarrollador del software AR Software Solutions-->
        <div class="d-flex align-items-center" style="margin-left: 50px;">
            <h5 class="desarrollado">Desarrollado por</h5>
            <img src="Imagen--/imagen 1.png" alt="logotipo AnaRinta_SOFTWARESOLUTIONS"width="100px" height="100px">
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
                    
                        <a href="Link-whatsapp" class="redes">Ana Rinta_SOFTWARESOLUTIONS</a>
                    </div>   
                </div> 
            </div>
        </div>   
            
    
 
        
        <br>
        <br>
         <!-- codigo para activar el ojo de ocultar y mostrar contraseña-->
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

            // Codigo para mostrar que la contraseña debe tener minimo 10 caracteres
            password.addEventListener('input', function () {
                if (password.value.length < 10) {
                    passwordWarning.style.display = 'block'; // Mostrar aviso
                } else {
                    passwordWarning.style.display = 'none'; // Ocultar aviso
                }
            });
            });
            
        </script>

        <!-- codigo para redireccionar el boton de cancelar-->
        
       
        <script>
            function cancelar(){
                // Aquí se pone a donde se desea dirigir el botón
                window.location.href = "http://localhost/AR_Software/index.php";
            }
        </script>


        <!-- codigo para seleccionar y deseleccionar los terminos-->
        <script>
            function cambiarIcono(elemento) {
                const icono = elemento.querySelector('.icono-opci');
                
                // Alternar entre clases
                icono.classList.toggle('bi-circle');
                icono.classList.toggle('bi-check-circle');
            }
        </script>

        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>        
    </body>     
</html>