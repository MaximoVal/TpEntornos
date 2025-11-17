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
    <!-- PANEL LATERAL DE CATEGORÍAS -->
    <aside class="col-md-3 col-lg-2 mb-4">
      <div class="p-3 bg-white shadow rounded-3">
        <h6 class="mb-3 text-center" style="color: var(--color-negro); font-weight:600;">Categorías</h6>
        <ul class="list-unstyled">
          <li><a href="#" class="text-decoration-none d-block py-2 text-center" style="color: var(--color-gris);">Gastronomía</a></li>
          <li><a href="#" class="text-decoration-none d-block py-2 text-center" style="color: var(--color-gris);">Entretenimiento</a></li>
          <li><a href="#" class="text-decoration-none d-block py-2 text-center fw-bold" style="color: var(--color-dorado-oscuro); text-decoration: underline;">Deporte (en uso)</a></li>
          <li><a href="#" class="text-decoration-none d-block py-2 text-center" style="color: var(--color-gris);">Moda</a></li>
          <li><a href="#" class="text-decoration-none d-block py-2 text-center" style="color: var(--color-gris);">Tecnología</a></li>
        </ul>
      </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="col-md-9 col-lg-10">
      <div class="p-4 bg-white shadow rounded-3">
        <h4 class="mb-4" style="color: var(--color-negro); font-weight:600;">Categoría en uso: <span style="color: var(--color-dorado-oscuro);">Deporte</span></h4>

        <!-- TABLA DE PROMOCIONES -->
    <div class="table-responsive">
    <table class="table table-hover table-striped align-middle text-center border">
        <thead style="background: linear-gradient(135deg, var(--color-dorado), var(--color-dorado-oscuro)); color: var(--color-negro);">
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Local</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <!-- tus filas -->
        <tr><td>PR-001</td><td>Descuento 20% en ropa deportiva</td><td>Sport Planet</td><td>02/11/2025</td>
            <td><button class="btn btn-sm btn-success"><i class="bi bi-check"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-x"></i></button></td></tr>
        <tr><td>PR-002</td><td>2x1 en entradas de cine</td><td>Cinema Plus</td><td>05/11/2025</td>
            <td><button class="btn btn-sm btn-success"><i class="bi bi-check"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-x"></i></button></td></tr>
        <tr><td>PR-003</td><td>Combo familiar en restaurante italiano</td><td>La Trattoria</td><td>06/11/2025</td>
            <td><button class="btn btn-sm btn-success"><i class="bi bi-check"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-x"></i></button></td></tr>
        <tr><td>PR-004</td><td>Descuento del 15% en zapatillas</td><td>FootLine</td><td>08/11/2025</td>
            <td><button class="btn btn-sm btn-success"><i class="bi bi-check"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-x"></i></button></td></tr>
        <tr><td>PR-005</td><td>Happy Hour 2x1 en tragos</td><td>Bar Central</td><td>09/11/2025</td>
            <td><button class="btn btn-sm btn-success"><i class="bi bi-check"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-x"></i></button></td></tr>
        <tr><td>PR-006</td><td>Descuento 10% en productos tecnológicos</td><td>TechZone</td><td>12/11/2025</td>
            <td><button class="btn btn-sm btn-success"><i class="bi bi-check"></i></button>
                <button class="btn btn-sm btn-danger"><i class="bi bi-x"></i></button></td></tr>
        </tbody>
    </table>
    </div>

<!-- PAGINACIÓN BOOTSTRAP -->
<nav aria-label="Tabla de promociones" class="mt-3">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link">Anterior</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Siguiente</a>
    </li>
  </ul>
</nav>

        <!-- Mensaje de tabla -->
        <div class="text-center mt-5">
          <p class="fw-bold" style="color: var(--color-gris);">
            [TABLA DE PROMOCIONES FILTRADAS POR CATEGORÍA]
          </p>
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