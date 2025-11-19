<?php
    session_start();
    
    if(isset($_POST["enviar"])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        mail($email, $asunto, $mensaje);
    }

 ?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paseo de la Fortuna - Shopping Center</title>
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="../Estilos/contactoEstilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>

<body>
    <?php 

        if(!isset($_SESSION['usuario'])) {
            include 'navNoRegistrado.php';
               
        } else if($_SESSION['tipoUsuario'] == 'cliente') {
            
                include 'navCliente.php';  
            }
            
        else if($_SESSION['tipoUsuario'] == 'dueño de local') {
                include 'navDueño.php';  
            }
        else {
                include 'navAdmin.php';  
            }
    ?>
    <!-- Header -->
    <div class="header-section" style="background-image: url('../Footage/Galeria2.png');">
        <div class="container">
            <h1 style="color:white;">Contáctanos</h1>
            <p style="color:white;">Estamos aquí para ayudarte. Tu opinión y consultas son importantes para nosotros en Paseo de la Fortuna.</p>
        </div>
    </div>

    <!-- Formulario Principal -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-container">
                    <div class="form-header">
                        <h2> Envíanos tu mensaje</h2>
                    </div>
                    <div class="form-body">
                        <form action="#" method="POST" id="contactForm">
                            <div class="row">
                                <!-- Nombre Completo -->
                                <div class="col-md-6">
                                    <div class="input-group-custom">
                                        <label for="nombre" class="form-label">
                                            Nombre Completo <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control with-icon" id="nombre" name="nombre" 
                                               placeholder="Tu nombre completo" required>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="input-group-custom">
                                        <label for="email" class="form-label">
                                            Correo Electrónico <span class="required">*</span>
                                        </label>
                                        <input type="email" class="form-control with-icon" id="email" name="email" 
                                               placeholder="tu@email.com" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Asunto -->
                            <div class="input-group-custom">
                                <label for="asunto" class="form-label">
                                    Asunto <span class="required">*</span>
                                </label>
                                
                                <input type="text" class="form-control with-icon" id="asunto" name="asunto" 
                                       placeholder="Escribe el asunto de tu mensaje" required>
                            </div>

                            <!-- Mensaje -->
                            <div class="input-group-custom">
                                <label for="mensaje" class="form-label">
                                    Mensaje <span class="required">*</span>
                                </label>
                                <textarea class="form-control" id="mensaje" name="mensaje" rows="6" 
                                          placeholder="Escribe aquí tu mensaje detallado..." required></textarea>
                            </div>
                            <!-- Botón Enviar -->
                            <button type="submit" class="btn-enviar" name="enviar">
                                Enviar Mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>    <?php include 'footer.php'; ?>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
</body>
</html>
