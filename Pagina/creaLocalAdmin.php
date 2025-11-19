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

<?php include 'navAdmin.php'; ?>
    <!-- CONTENEDOR PRINCIPAL -->
<main class="container-fluid my-4">
        <div class="row">
            <!-- MENÚ LATERAL -->
            <aside class="col-md-4 col-lg-3 mb-4">
                <div class="card sidebar-links">
                <div class="card-body d-flex flex-column justify-content-start">
                    <h3 class="card-title title">Panel administrador </h3>
                    <div class="list-group">
                        <a href="administraLocalAdmin.php" class="list-group-item list-group-item-action ">Administrar locales</a>
                        <a href="eliminaLocalAdmin.php" class="list-group-item list-group-item-action">Eliminar local</a>
                        <a href="creaLocalAdmin.php" class="list-group-item list-group-item-action active">Crear local</a>
                        <a href="duenosAdmin(SDB).php" class="list-group-item list-group-item-action ">Administrar dueños</a>
                    </div>
                </div>
                </div>
            </aside>

            <!-- CONTENIDO PRINCIPAL -->
            <section class="col-md-7 col-lg-8">
                <div class="form-container">
                    <div class="form-header">
                        <h2>Registrar Local</h2>
                    </div>
                    <div class="form-body">
                        <form>
                            <!-- Nombre -->
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" placeholder="Ej: Café Fortuna" required>
                            </div>

                            <!-- Rubro -->
                            <div class="mb-3">
                                <label class="form-label">Rubro</label>
                                <input type="text" class="form-control" placeholder="Ej: Cafetería / Panadería" required>
                            </div>

                            <!-- ID dueño -->
                            <div class="mb-3">
                                <label class="form-label">ID Dueño</label>
                                <input type="text" class="form-control" placeholder="Ej: 1024" required>
                            </div>

                            <button type="submit" class="btn-enviar mt-3">Registrar</button>
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
