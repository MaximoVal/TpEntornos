<?php
session_start();
include('funciones.php');
$hoy= date('Y-m-d');
$tresSemanas = date('Y-m-d', strtotime('+21 days'));
$emailUsu=$_SESSION['usuario'];
$sqlDataDueno="SELECT * FROM usuarios WHERE tipoUsuario='dueño de local' AND nombreUsuario='$emailUsu'";
$dataDueno= consultaSQL($sqlDataDueno);
$dueno= mysqli_fetch_assoc($dataDueno);
$codDueno= $dueno['codUsuario'];
if($dueno['localNoLocal']!='no'){
    $sqlBuscaLocalDueno="SELECT * FROM locales WHERE codDueno='$codDueno'";
    $dataLocalDueno=consultaSQL($sqlBuscaLocalDueno);
    $localDueno=mysqli_fetch_assoc($dataLocalDueno);

}else{
    $localDueno=[];
}
if(isset($_GET['accion'])){
    $accion=$_GET['accion'];
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Dueño</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Estilos/adiministraDuenoEstilos.css">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <link rel="stylesheet" href="../Estilos/usuarioCuentaEstilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- HEADER -->

        <?php include('navDueño.php'); ?>

    <!-- CONTENEDOR PRINCIPAL -->
    <main class="container-fluid my-4">
    <div class="row">
        <!-- BARRA LATERAL -->
        <aside class="col-md-3 col-lg-2 mb-4  ">
            <!-- Botones desplegables para móviles (en una fila) -->
            <div class="d-md-none mb-3 mt-3 d-flex gap-2">
                <?php if(isset($accion)){ ?>
                <button class="btn flex-fill d-flex flex-row align-items-center justify-content-center gap-2 py-2" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#panelAdmin" 
                        aria-expanded="false" 
                        aria-controls="panelAdmin"
                        style="background-color: var(--color-dorado); color: var(--color-negro); font-weight: 600; font-size: 0.85rem;">
                    <i class="bi bi-gear-fill d-inline" style="font-size: 1.2rem;"></i>
                    <span>Panel</span>
                </button>
                <?php } ?>
                <button class="btn flex-fill d-flex flex-row align-items-center justify-content-center gap-2 py-2" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#infoLocal" 
                        aria-expanded="false" 
                        aria-controls="infoLocal"
                        style="background-color: var(--color-dorado); color: var(--color-negro); font-weight: 600; font-size: 0.85rem;">
                    <i class="bi bi-shop mb-1" style="font-size: 1.2rem;"></i>
                    <span>Local</span>
                </button>
                <button class="btn flex-fill d-flex flex-row align-items-center justify-content-center gap-2 py-2" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#infoDueno" 
                        aria-expanded="false" 
                        aria-controls="infoDueno"
                        style="background-color: var(--color-dorado); color: var(--color-negro); font-weight: 600; font-size: 0.85rem;">
                    <i class="bi bi-person-vcard mb-1" style="font-size: 1.2rem;"></i>
                    <span>Dueño</span>
                </button>
            </div>

            <!-- Panel de Administración (Sidebar) -->
            <?php if(isset($accion)){ ?>
            <div class="mb-3 p-4 bg-white shadow-sm rounded-3 collapse d-md-block" id="panelAdmin" style="border-left: 4px solid var(--color-dorado);">
                <h5 class="mb-4 d-flex align-items-center" style="color:var(--color-negro); font-weight:600;">
                    <i class="bi bi-gear-fill me-2" style="color: var(--color-dorado-oscuro); font-size: 1.3rem;"></i>
                    Panel de Administración
                </h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="administraDueno(SDB).php?accion=adminPromos" 
                        class="text-decoration-none d-flex align-items-center py-2 px-3 rounded-2 transition-all" 
                        style="<?php echo ($accion == 'adminPromos')? 'background-color: var(--color-dorado); color: var(--color-negro); font-weight: 600;' : 'color: var(--color-gris); background-color: #f8f9fa;'; ?>">
                            <i class="bi bi-tag-fill me-2"></i>
                            Administrar Promociones
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="administraDueno(SDB).php?accion=verSolicitudesDueno" 
                        class="text-decoration-none d-flex align-items-center py-2 px-3 rounded-2 transition-all" 
                        style="<?php echo ($accion == 'verSolicitudesDueno')? 'background-color: var(--color-dorado); color: var(--color-negro); font-weight: 600;' : 'color: var(--color-gris); background-color: #f8f9fa;'; ?>">
                            <i class="bi bi-check-square me-3"></i>
                            Solicitudes de promociones
                        </a>
                    </li>
                    <li>
                        <a href="administraDueno(SDB).php?accion=verReportes" 
                        class="text-decoration-none d-flex align-items-center py-2 px-3 rounded-2 transition-all" 
                        style="<?php echo ($accion == 'verReportes')? 'background-color: var(--color-dorado); color: var(--color-negro); font-weight: 600;' : 'color: var(--color-gris); background-color: #f8f9fa;'; ?>">
                            <i class="bi bi-file-earmark-bar-graph me-2"></i>
                            Reportes
                        </a>
                    </li>
                </ul>
            </div>
            <?php } ?>
            
            <!-- Información del Local -->
            <div class="p-4 bg-white shadow-sm rounded-3 mb-3 collapse d-md-block" id="infoLocal" style="border-left: 4px solid var(--color-dorado);">
                <h5 class="mb-4 d-flex align-items-center" style="color:var(--color-negro); font-weight:600;">
                    <i class="bi bi-shop me-2" style="color: var(--color-dorado-oscuro); font-size: 1.3rem;"></i> 
                    Información del Local
                </h5>
                <?php if($dueno['localNoLocal']!='no'){ ?>
                    <div class="info-item mb-2">
                        <p class="mb-0 fw-semibold">Código de local: <small class="text-muted "><?php echo $localDueno['codLocal']; ?></small></p>
                    </div>
                    <div class="info-item mb-2">
                        <p class="mb-0 fw-semibold">Nombre: <small class="text-muted "><?php echo $localDueno['nombreLocal']; ?></small></p>
                    </div>
                    <div class="info-item mb-2">
                        <p class="mb-0 fw-semibold">Sector: <small class="text-muted "><?php echo $localDueno['ubicacionLocal']; ?></small></p>
                    </div>
                    <div class="info-item">
                        <p class="mb-0 fw-semibold">Rubro: <small class="text-muted "><?php echo ucfirst($localDueno['categoriaLocal']); ?></small></p>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div>
                            <strong>No</strong> posee <strong>local</strong> aún.
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Información del Dueño -->
            <div class="p-4 bg-white shadow-sm rounded-3 collapse d-md-block" id="infoDueno" style="border-left: 4px solid var(--color-dorado);">
                <h5 class="mb-4 d-flex align-items-center" style="color:var(--color-negro); font-weight:600;">
                    <i class="bi bi-person-vcard me-2" style="color: var(--color-dorado-oscuro); font-size: 1.3rem;"></i> 
                    Información del Dueño
                </h5>
                <div class="info-item mb-2">
                    <p class="mb-0 fw-semibold">Código de Dueño: <small class="text-muted "><?php echo $dueno['codUsuario']; ?></small></p>
                </div>
                <div class="info-item mb-2">
                    <p class="mb-0 fw-semibold">Nombre: <small class="text-muted "><?php echo $dueno['nombre']; ?></small></p>
                </div>
                <div class="info-item mb-2">
                    <p class="mb-0 fw-semibold">Apellido: <small class="text-muted "><?php echo $dueno['apellido']; ?></small></p>
                </div>
                <div class="info-item">
                    <p class="mb-0 fw-semibold">Email: <small class="text-muted "><?php echo $dueno['nombreUsuario']; ?></small></p>
                </div>
            </div>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <section class="col-md-9 col-lg-10">
            <?php if(isset($accion)){
                if($accion=='adminPromos'){
                    include('administrarPromocionesDueno.php');
                } elseif($accion=='verSolicitudesDueno'){
                    include('verSolicitudesDueno.php');
                } elseif($accion=='verReportes'){
                    include('verReportesDueno.php');
                }
            } else { ?>
            <!-- Panel de Administración (Vista Principal) -->
            <div class="p-5 bg-white shadow-sm rounded-3" style="border-top: 4px solid var(--color-dorado);">
                <div class="text-center mb-4">
                    <i class="bi bi-gear-fill" style="font-size: 3rem; color: var(--color-dorado-oscuro);"></i>
                    <h4 class="mt-3 mb-2" style="color:var(--color-negro); font-weight:600;">Panel de Administración</h4>
                    <p class="text-muted">Selecciona una opción para comenzar</p>
                </div>
                
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="administraDueno(SDB).php?accion=adminPromos" class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm hover-card" style="transition: all 0.3s;">
                                <div class="card-body text-center p-4">
                                    <i class="bi bi-tag-fill mb-3" style="font-size: 2.5rem; color: var(--color-dorado-oscuro);"></i>
                                    <h5 class="card-title mb-2" style="color: var(--color-negro);">Administrar Promociones</h5>
                                    <p class="card-text text-muted small">Gestiona las promociones de tu local</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-md-4">
                        <a href="administraDueno(SDB).php?accion=verSolicitudesDueno" class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm hover-card" style="transition: all 0.3s;">
                                <div class="card-body text-center p-4">
                                    <i class="bi bi-check-square mb-3" style="font-size: 2.5rem; color: var(--color-dorado-oscuro);"></i>
                                    <h5 class="card-title mb-2" style="color: var(--color-negro);">Solicitudes de promociones</h5>
                                    <p class="card-text text-muted small">Administra las solicitudes de las promociones</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-md-4">
                        <a href="administraDueno(SDB).php?accion=verReportes" class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm hover-card" style="transition: all 0.3s;">
                                <div class="card-body text-center p-4">
                                    <i class="bi bi-file-earmark-bar-graph mb-3" style="font-size: 2.5rem; color: var(--color-dorado-oscuro);"></i>
                                    <h5 class="card-title mb-2" style="color: var(--color-negro);">Reportes</h5>
                                    <p class="card-text text-muted small">Consulta estadísticas y reportes</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <style>
                .hover-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
                }
                
                .transition-all {
                    transition: all 0.3s ease;
                }
                
                .transition-all:hover {
                    transform: translateX(5px);
                }
            </style>
            <?php } ?>
        </section>
    </div>
</main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>
