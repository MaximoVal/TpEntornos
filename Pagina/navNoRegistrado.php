<?php 
// include 'funciones.php';
?>
<head>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <!-- <link rel="stylesheet" href="../Estilos/usuarioCuentaEstilos.css"> -->

    
</head>
<style>
  *
  {
    user-select:none;
  }
    #boton-nav{
            background-color: #DAB561;
            transition: transform 0.2s ease, background-color 0.2s ease;

        }
        .navbar-custom {
            background-color: #eac764; 
            padding: 0.5rem 1rem; 
            height: auto; 
        }
        #boton-nav:hover
        {
            background-color: #c29f4e;
            transform: scale(1.1);
            color: white;
        }
        .user-icon-wrapper {
        background-color: #315c3d;
        color: #ffffff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        transition: all 0.3s ease;
        }

        .user-icon-wrapper i {
        font-size: 1.4rem;
        line-height: 0;
        }

        .user-icon-wrapper:hover {
        background-color: #2a4b34;
        transform: scale(1.05);
        }
</style>  

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">

            <a class="navbar-brand" href="index.php">
                <img src="../Footage/Logo.png" alt="Paseo de la Fortuna Logo"style="margin=0;border:none;">
            </a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #DAB561; border: none;">
                    <i class="bi bi-list" style="font-size: 2rem; color: #000;"></i>
                </button>


    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item"><a class="nav-link px-3 fw-semibold" href="index.php" style="color: #333;">Inicio</a></li>
        <li class="nav-item"><a class="nav-link px-3 fw-semibold" href="contacto.php" style="color: #333;">Contacto</a></li>


        <li class="nav-item ms-3">
        <a href="login.php" class="nav-link p-0">
            <div class="d-flex align-items-center justify-content-center user-icon-wrapper">
            <i class="bi bi-person-fill"></i>
            </div>
        </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>