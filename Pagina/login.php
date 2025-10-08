<?php
    session_start();
    include("funciones.php");
    $mensaje="";

if(isset($_POST['enviar'])){
    $email = $_POST['email'];
    $password = $_POST['contraseña'];

    // Buscar usuario en la base
    $sql = "SELECT * FROM usuarios WHERE nombreUsuario='$email'";
    $resultado = consultaUsuarios($sql);

    if(mysqli_num_rows($resultado) > 0){
        // El usuario existe, ahora validamos contraseña
        $usuario = mysqli_fetch_assoc($resultado);
        if($usuario['contraseña'] === $password){
            $_SESSION['usuario'] = $email;
            header("Location: index.php");
            exit();
        } else {
            $mensaje="Contraseña Incorrecta";
        }
    } else {
        // El usuario no existe
        $mensaje="Usuario no registrado, por favor regístrese.";
        // $sqlInsert = "INSERT INTO usuarios (email, contraseña) VALUES ('$email', '$password')";
        // if(consultaSQL($sqlInsert)){
        //     $_SESSION['usuario'] = $email;
        //     header("Location: index.php");
        //     exit();
        // } else {
        //     echo "<p>Error al registrar usuario</p>";
        // }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Paseo de la Fortuna</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="../Estilos/loginEstilo.css">

</head>
<body>
    <!-- Navbar fijo en la parte superior -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="../Footage/Logo.png" alt="Paseo de la Fortuna Logo" style="margin=0;border:none;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal centrado -->
    <div class="container-fluid main-container" style="background-image: url('../Footage/Paseo 4.png');background-size: cover; background-position: center; min-height: 100vh; display: flex; justify-content: center; align-items: center; opacity: 0.95;">
        <div class="card login-card shadow-lg p-4" style="width: 400px; max-width: 90vw;">
            <div class="card-body">
                <form action="" method="POST">
                    <h3 class="text-center mb-4">
                        <i class="fas fa-user-circle me-2"></i>
                        Iniciar Sesión
                    </h3>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">
                            <i class="fas fa-envelope me-1"></i>
                            Correo Electrónico
                        </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" 
                               placeholder="tu@email.com" required aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">
                            <i class="fas fa-lock me-1"></i>
                            Contraseña
                        </label>
                        <input type="password" class="form-control" id="exampleInputPassword1" 
                               name="contraseña" placeholder="Tu contraseña" required>
                        
                        <!-- Simulación del mensaje de error PHP -->
                        <div class="form-text text-danger" 
                            <?php echo $mensaje;?>>
                            <?php if(isset($mensaje)) echo $mensaje; ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3" name="enviar">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Ingresar
                    </button>
                    
                    <div class="text-center">
                        <small class="text-muted">
                            <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                        </small>
                    </div>
                    
                </form>
                <hr>
                        <p class="text-center">¿No tenes usuario?  <a href="registro.php">Registrarse ahora</a></p>
                    
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>