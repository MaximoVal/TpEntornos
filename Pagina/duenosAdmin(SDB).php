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
            <!-- LADO IZQUIERDO - VÍNCULOS -->
            <aside class="col-md-3 col-lg-2 mb-4">
                <div class="p-3 bg-white shadow rounded-3">
                    <h6 class="mb-3" style="color: var(--color-negro); font-weight:600;">Menú</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none d-block py-2" style="color: var(--color-gris);">Vínculo 1</a></li>
                        <li><a href="#" class="text-decoration-none d-block py-2" style="color: var(--color-gris);">Vínculo 2</a></li>
                        <li><a href="#" class="text-decoration-none d-block py-2" style="color: var(--color-gris);">Vínculo 3</a></li>
                    </ul>
                </div>
            </aside>

            <!-- CONTENIDO PRINCIPAL -->
            <section class="col-md-9 col-lg-10">
                <div class="p-4 bg-white shadow rounded-3">
                    <h4 class="mb-4" style="color: var(--color-negro); font-weight:600;">Solicitudes de dueños</h4>

                    <!-- Tarjeta 1 -->
                    <div class="border rounded-3 p-3 mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 fw-bold" style="color: var(--color-negro);">Juan Pérez</p>
                            <p class="mb-0" style="color: var(--color-gris);">Café Fortuna</p>
                        </div>
                        <div>
                            <button class="btn btn-success btn-sm me-2">Aceptar</button>
                            <button class="btn btn-danger btn-sm">Rechazar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="border rounded-3 p-3 mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 fw-bold" style="color: var(--color-negro);">María López</p>
                            <p class="mb-0" style="color: var(--color-gris);">Panadería Dulce Aroma</p>
                        </div>
                        <div>
                            <button class="btn btn-success btn-sm me-2">Aceptar</button>
                            <button class="btn btn-danger btn-sm">Rechazar</button>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="border rounded-3 p-3 mb-3 d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 fw-bold" style="color: var(--color-negro);">Carlos Gómez</p>
                            <p class="mb-0" style="color: var(--color-gris);">Restó La Esquina</p>
                        </div>
                        <div>
                            <button class="btn btn-success btn-sm me-2">Aceptar</button>
                            <button class="btn btn-danger btn-sm">Rechazar</button>
                        </div>
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
