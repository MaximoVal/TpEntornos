<?php
// Datos simulados
$nombreLocal = "Café Fortuna";
$direccion = "Av. Siempreviva 742, Buenos Aires";
$email = "dueno@paseofortuna.com";
$telefono = "+54 11 1234-5678";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Dueño</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../Estilos/adiministraDuenoEstilos.css">
    <link rel="stylesheet" href="../Estilos/estilos.css">

    <!-- Íconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    <header class="py-3" style="background: linear-gradient(90deg, var(--color-dorado), var(--color-dorado-oscuro));">
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="../Footage/Logo.png" alt="Paseo de la Fortuna Logo" style="margin=0;border:none;" >
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
                        <a class="nav-link" href="sobreNosotros.php">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        </div>
    </header>

    <!-- CONTENEDOR PRINCIPAL -->
    <main class="container-fluid my-4">
        <div class="row">
            <!-- BARRA LATERAL -->
            <aside class="col-md-3 col-lg-2 mb-4">
                <div class="p-3 bg-white shadow rounded-3">
                    <h5 class="mb-3" style="color:var(--color-negro); font-weight:600;">Información del Local</h5>
                    <p class="mb-1"><strong>Nombre:</strong> <?php echo $nombreLocal; ?></p>
                    <p class="mb-1"><strong>Dirección:</strong> <?php echo $direccion; ?></p>
                    <p class="mb-1"><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
                </div>

                <div class="mt-4 p-3 bg-white shadow rounded-3">
                    <h6 class="mb-3" style="color:var(--color-negro); font-weight:600;">Vínculos</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none d-block py-2" style="color:var(--color-gris);">Gestión de empleados</a></li>
                        <li><a href="#" class="text-decoration-none d-block py-2" style="color:var(--color-gris);">Reportes</a></li>
                    </ul>
                </div>
            </aside>

            <!-- CONTENIDO PRINCIPAL -->
            <section class="col-md-9 col-lg-10">
                <!-- Formulario creación promoción -->
                <div class="form-container mb-4">
                    <div class="form-header">
                        <h2>Crear Promoción</h2>
                    </div>
                    <div class="form-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Título de la Promoción</label>
                                <input type="text" class="form-control" placeholder="Ej: 2x1 en cafés">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <textarea class="form-control" rows="3" placeholder="Detalles de la promoción..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de inicio</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fecha de fin</label>
                                <input type="date" class="form-control">
                            </div>
                            <button type="submit" class="btn-enviar">Crear Promoción</button>
                        </form>
                    </div>
                </div>

                <!-- Formulario eliminación promoción -->
                <div class="form-container">
                    <div class="form-header">
                        <h2>Eliminar Promoción</h2>
                    </div>
                    <div class="form-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Seleccionar promoción a eliminar</label>
                                <select class="form-select">
                                    <option>2x1 en cafés</option>
                                    <option>Descuento del 20% en desayunos</option>
                                    <option>Happy hour de 17 a 19 hs</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-enviar">Eliminar</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
