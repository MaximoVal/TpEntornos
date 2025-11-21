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
            <aside class="col-md-3 col-lg-2 mb-4">
                <div class="p-3 bg-white shadow rounded-3">
                    
                    <h5 class="mb-3" style="color:var(--color-negro); font-weight:600;"><i class="bi bi-shop"></i> Información del Local</h5>
                    <?php
                    if($dueno['localNoLocal']!='no'){
                    ?>
                    <p><strong>Codigo de Local:</strong> <?php echo $localDueno['codLocal']; ?></p>
                    <p class="mb-2"><strong>Nombre:</strong> <?php echo $localDueno['nombreLocal']; ?></p>
                    <p class="mb-2"><strong>Sector:</strong> <?php echo $localDueno['ubicacionLocal']; ?></p>
                    <p class="mb-2"><strong>Rubro:</strong> <?php echo $localDueno['categoriaLocal']; ?></p>
                    <?php }else{
                        ?>  <p class="mb-2"><strong>No</strong> posee <strong>local</strong> aun.</p> <?php
                    } ?>
                    <h5 class="mb-3" style="color:var(--color-negro); font-weight:600;"><i class="bi bi-person-vcard"></i> Información del Dueño</h5>
                    <p><strong>Codigo de Dueño:</strong> <?php echo $dueno['codUsuario']; ?></p>
                    <p class="mb-2"><strong>Nombre:</strong> <?php echo $dueno['nombre']; ?></p>
                    <p class="mb-2"><strong>Apellido:</strong> <?php echo $dueno['apellido']; ?></p>
                    <p class="mb-2"><strong>Email:</strong> <?php echo $dueno['nombreUsuario']; ?></p>
                </div>
                <?php if(isset($accion)){ ?>
                <div class="mt-4 p-3 bg-white shadow rounded-3">
                    <h5 class="mb-3" style="color:var(--color-negro); font-weight:600;">Panel de <strong>Administración</strong></h5>
                    <ul class="list-unstyled">
                        <li><a href="administraDueno(SDB).php?accion=adminPromos" class="text-decoration-none d-block py-2" style="<?php echo ($accion == 'adminPromos')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">Administrar Promociones</a></li>
                        <li><a href="administraDueno(SDB).php?accion=gestionDatos" class="text-decoration-none d-block py-2" style="<?php echo ($accion == 'gestionDatos')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">Gestion de Datos Personales</a></li>
                        <li><a href="administraDueno(SDB).php?accion=verReportes" class="text-decoration-none d-block py-2" style="<?php echo ($accion == 'verReportes')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">Reportes</a></li>
                    </ul>
                </div>
                <?php } ?>
            </aside>

            <!-- CONTENIDO PRINCIPAL -->
            <section class="col-md-9 col-lg-10">
                <!-- Formulario creación promoción -->
                <?php if(isset($accion)){if($accion=='adminPromos'){
                    include('administrarPromocionesDueno.php');
                }elseif($accion=='gestionDatos'){
                    include('cuentaDueño.php');
                }elseif($accion=='verReportes'){
                    include('reportes.php');
                }
                }else{?>
                <div class="mt-4 p-3 bg-white shadow rounded-3">
                    <h5 class="mb-3" style="color:var(--color-negro); font-weight:600;">Panel de <strong>Administración</strong></h5>
                    <ul class="list-unstyled">
                        <li><a href="administraDueno(SDB).php?accion=adminPromos" class="text-decoration-none d-block py-2" style="color: var(--color-gris);">Administrar Promociones</a></li>
                        <li><a href="administraDueno(SDB).php?accion=gestionDatos" class="text-decoration-none d-block py-2" style="color: var(--color-gris);">Gestion de Datos Personales</a></li>
                        <li><a href="administraDueno(SDB).php?accion=verReportes" class="text-decoration-none d-block py-2" style="color: var(--color-gris);">Reportes</a></li>
                    </ul>
                </div> <?php
                } ?>
                
                
            </section>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>
