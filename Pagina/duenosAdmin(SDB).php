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
<body >
    <!-- HEADER -->
    <?php include 'navAdmin.php'; ?>
    <!-- CONTENEDOR PRINCIPAL -->
    <main class="container-fluid my-4 ">
        <div class="row">
            <!-- LADO IZQUIERDO - VÍNCULOS -->
            <aside class="col-md-4 col-lg-3 mb-4">
                <div class="card sidebar-links">
                <div class="card-body d-flex flex-column justify-content-start">
                    <h3 class="card-title title">Panel administrador </h3>
                    <div class="list-group">
                        <a href="duenosAdmin(SDB).php" class="list-group-item list-group-item-action active">Administrar dueños</a>
                        <a href="administraLocalAdmin.php" class="list-group-item list-group-item-action ">Administrar locales</a>
                        <a href="creaLocalAdmin.php" class="list-group-item list-group-item-action ">Crear local</a>
                        <a href="crearNovedad.php" class="list-group-item list-group-item-action ">Crear novedad</a>
                        <a href="eliminaLocalAdmin.php" class="list-group-item list-group-item-action">Eliminar local</a>   
                    </div>
                </div>
                </div>
            </aside>

            <!-- CONTENIDO PRINCIPAL -->
            <section class="col-md-7 col-lg-8">
                <div class="p-4 bg-white shadow rounded-3">
                    <h4 class="mb-4" style="color: var(--color-negro); font-weight:600;">Solicitudes de dueños</h4>

                    <?php
                    include "verificarDueño.php";
                    
                    ?>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    

</body>
</html>
