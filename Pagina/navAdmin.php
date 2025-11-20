<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    
</head>
<style>
    *
    {
        /* user-select:none; */
    }
    :root {
            --color-dorado: #EED284;
            --color-dorado-oscuro: #DAB561;
            --color-negro: #333333;
            --color-blanco: #FFFFFF;
        }
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
        .dropdown-item:active
        {
            background-color: var(--color-dorado) !important;
            color: #000000 !important;
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
        .page-link{
            color: var(--color-dorado-oscuro);
        }
        .active>.page-link, .page-link.active {
            z-index: 3;
            color: var(--bs-pagination-active-color);
            background-color: var(--color-dorado);
            border-color: var(--color-dorado);
        }
        
        </style>

<nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="margin=0;border:none;">
                <img src="../Footage/Logo.png" alt="Paseo de la Fortuna Logo"style="margin=0;border:none;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #DAB561; border: none;">
              <img src="../Footage/menu.png" alt="Desplegar menu">  
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarCuenta" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                            Panel de Control
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarCuenta">
                            <li>
                                <a class="dropdown-item" href="administraLocalAdmin.php">Administrar Locales</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="duenosAdmin(SDB).php">Administrar Dueños</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="creaLocalAdmin.php">Crear local</a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item" href="crearNovedad.php">Crear novedad</a>
                            </li>
                            
                            <li>
                                <a class="dropdown-item" href="eliminaLocalAdmin.php">Eliminar local</a>
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