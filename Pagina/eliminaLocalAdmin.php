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
<style>
    .list-group-item.active
        {
            background-color: #DAB561 !important;
            border-color: #DAB561 !important;
            color: #000000 !important;
        }   
</style>
<body>

    <!-- HEADER -->
    <?php include 'navAdmin.php'; ?>

    <!-- CONTENEDOR PRINCIPAL -->
  <main class="container-fluid my-4">
    <div class="row gx-4">

      <!-- SIDEBAR (izq) -->
      <aside class="col-12 col-md-3 mb-3">
        <div class="card sidebar-links">
                <div class="card-body d-flex flex-column justify-content-start">
                    <h3 class="card-title title">Panel administrador </h3>
                    <div class="list-group">
                        <a href="administraLocalAdmin.php" class="list-group-item list-group-item-action ">Administrar locales</a>
                        <a href="eliminaLocalAdmin.php" class="list-group-item list-group-item-action active">Eliminar local</a>
                        <a href="creaLocalAdmin.php" class="list-group-item list-group-item-action ">Crear local</a>
                        <a href="duenosAdmin(SDB).php" class="list-group-item list-group-item-action ">Administrar dueños</a>
                    </div>
                </div>
                </div>
      </aside>

      <!-- CONTENIDO PRINCIPAL (centro) -->
      <section class="col-12 col-md-8 mb-3">
        <div class="card card-form">
          <div class="card-body">
            <h5 class="card-title">Formulario eliminación local</h5>

            <!-- Formulario para editar datos (client-side) -->
            <form id="editLocalForm" class="row g-2">
              <div class="col-12">
                <label class="form-label">Nombre</label>
                <input type="text" id="input-nombre" class="form-control" placeholder="Nombre del local">
              </div>

              <div class="col-12 d-flex gap-2 mt-2">
                <button class="btn btn-danger btn-sm">Eliminar</button>
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
