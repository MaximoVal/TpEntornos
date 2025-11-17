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
    <div class="row gx-4">

      <!-- SIDEBAR (izq) -->
      <aside class="col-12 col-md-3 mb-3">
        <div class="card sidebar-links">
          <div class="card-body d-flex flex-column justify-content-start">
            <h6 class="card-title">Vínculos</h6>
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link" href="#">Vinculo</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Vinculo</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Vinculo</a></li>
            </ul>
          </div>
        </div>
      </aside>

      <!-- CONTENIDO PRINCIPAL (centro) -->
      <section class="col-12 col-md-8 mb-3">
        <div class="card card-form">
          <div class="card-body">
            <h5 class="card-title">Formulario edición local</h5>

            <!-- Visualización actual del local -->
            <div id="localDisplay" class="mb-3">
              <p><strong>Nombre actual:</strong> <span id="disp-nombre">Café Central</span></p>
              <p><strong>Rubro actual:</strong> <span id="disp-rubro">Gastronomía</span></p>
              <p><strong>IdDueño actual:</strong> <span id="disp-idDueno">12345</span></p>
            </div>

            <!-- Formulario para editar datos (client-side) -->
            <form id="editLocalForm" class="row g-2">
              <div class="col-12">
                <label class="form-label">Nombre</label>
                <input type="text" id="input-nombre" class="form-control" placeholder="Nombre del local">
              </div>
              <div class="col-12">
                <label class="form-label">Rubro</label>
                <input type="text" id="input-rubro" class="form-control" placeholder="Rubro (ej: Barbería, Tienda)">
              </div>
              <div class="col-12">
                <label class="form-label">idDueno</label>
                <input type="text" id="input-idDueno" class="form-control" placeholder="ID del dueño">
              </div>

              <div class="col-12 d-flex gap-2 mt-2">
                <button type="button" id="btnSave" class="btn btn-primary">Guardar</button>
                <button type="button" id="btnReset" class="btn btn-outline-secondary">Reset</button>
              </div>
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
