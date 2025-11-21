<?php
// include 'funciones.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Cuenta</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <!-- <link rel="stylesheet" href="../Estilos/usuarioCuentaEstilos.css"> -->

    
</head>

<style>
    #boton-nav{
            background-color: #DAB561;
            transition: transform 0.2s ease, background-color 0.2s ease;

        }
        
        #boton-nav:hover
        {
            background-color: #c29f4e;
            transform: scale(1.1);
            color: white;
        }
        *
    {
        user-select:none;
    }
    :root {
            --color-dorado: #EED284;
            --color-dorado-oscuro: #DAB561;
            --color-negro: #333333;
            --color-blanco: #FFFFFF;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--color-dorado) 0%, var(--color-dorado-oscuro) 100%);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 500;
            transition: all 0.3s 
        ease;
            color: #333;
        }
        .btn-primary:hover
        {
            background: linear-gradient(135deg, var(--color-dorado) 0%, #ecd79cff 100%);
        }
        body
        {
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }
        main
        {
            flex-grow:1;
        }
</style>

<nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="margin=0;border:none;">
                <img src="../Footage/Logo.png" alt="Paseo de la Fortuna Logo"style="margin=0;border:none;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #DAB561; border: none;">
              <img src="menu.png" alt="Desplegar menu">  
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarCuenta" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            
                            Cuenta
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarCuenta">
                            <li>
                                <a class="dropdown-item" href="cuentaUsuario.php">Administrar Cuenta</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="cerrar_sesion.php">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar tiendas..." aria-label="Search">
                    <button class="btn" id="boton-nav" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>