<?php
//session_start();
// include('funciones.php');
$hoy= date('Y-m-d');

function obtenCodLocal($codDueno){
    $sqlObtenLocal="SELECT * FROM locales WHERE codDueno='$codDueno'";
    $result= consultaSQL($sqlObtenLocal);
    $local = mysqli_fetch_assoc($result);
    return $local['codLocal'];
}
function obtenNombreLocal($codDueno){
    $sqlObtenLocal="SELECT * FROM locales WHERE codDueno='$codDueno'";
    $result= consultaSQL($sqlObtenLocal);
    $local = mysqli_fetch_assoc($result);
    return $local['nombreLocal'];
}
function obtenLocal($codDueno){
    $sqlObtenLocal="SELECT * FROM locales WHERE codDueno='$codDueno'";
    $result= consultaSQL($sqlObtenLocal);
    $dataLocal = mysqli_fetch_assoc($result);
    return $dataLocal;
}
function obtenNombreCliente($codCliente){
    $sqlObtenUsu="SELECT * FROM usuarios WHERE codUsuario='$codCliente'";
    $result= consultaSQL($sqlObtenUsu);
    $usu = mysqli_fetch_assoc($result);
    return $usu['nombre'];
}
function obtenDescPromo($codPromo){
    $sqlObtenPromo="SELECT * FROM promociones WHERE codPromo='$codPromo'";
    $result= consultaSQL($sqlObtenPromo);
    $promo = mysqli_fetch_assoc($result);
    return $promo['textoPromo'];
}
if(isset($_SESSION['usuario'])){
    $emailUsu=$_SESSION['usuario'];
    $sqlDueno="SELECT * FROM usuarios WHERE nombreUsuario='$emailUsu'";
    $resultadoDueno=consultaSQL($sqlDueno);
    $rc=mysqli_fetch_assoc($resultadoDueno);
    $duenoNombre=$rc['categoriaCliente'];
    $codDueno=$rc['codUsuario'];
    $codLocal= obtenCodLocal($codDueno);
    $dataLocal=obtenLocal($codDueno);
}
function verificaLocalPromo($codPromo, $codLocal){
    $sqlObtencionLocal="SELECT * FROM promociones WHERE codPromo='$codPromo'";
    $resultOL=consultaSQL($sqlObtencionLocal);
    $promo=mysqli_fetch_assoc($resultOL);
    if($codLocal==$promo['codLocal']){
        return 1;
    }else{
        return 0;
    }
}

if(isset($codLocal)){
    $sqlTraeTodoSoli="SELECT * FROM uso_promociones WHERE estado='enviada'";
    $resultGlobal=consultaSQL($sqlTraeTodoSoli);

}
if(isset($_POST['aprobarSolicitud'])){
    $codUsoPromo=$_POST['codUsoPromo'];
    $sqlBusqCliente="SELECT * FROM uso_promociones WHERE codUsoPromo='$codUsoPromo'";
    $result=consultaSQL($sqlBusqCliente);
    $cliente= mysqli_fetch_assoc($result);
    $sqlActualizaUso="UPDATE uso_promociones SET estado='aceptada' WHERE codUsoPromo='$codUsoPromo'";
    consultaSQL($sqlActualizaUso);
    $_SESSION['solicitud_ok'] = "La solicitud se acepto correctamente.";
    $sqlActualizaUsoCliente="UPDATE usuarios SET cantPromoUsada = cantPromoUsada + 1 WHERE codUsuario='{$cliente['codCliente']}'";
    consultaSQL($sqlActualizaUsoCliente);
    actualizaCategoriaCliente($cliente['codCliente']);
}
if(isset($_POST['rechazarSolicitud'])){
    $codUsoPromo=$_POST['codUsoPromo'];
    $sqlActualizaUso="UPDATE uso_promociones SET estado='rechazada' WHERE codUsoPromo='$codUsoPromo'";
    consultaSQL($sqlActualizaUso);
    $_SESSION['rechazo_ok'] = "La solicitud se rechazo correctamente.";
    header("Location: verSolicitudesDueno.php" );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Promociones</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Estilos/adiministraDuenoEstilos.css">
    <link rel="stylesheet" href="../Estilos/estilos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
    <?php //include('navDueño.php'); ?>

    <main class="container mt-5 ">
        <div class="row">
            <section class="col-md-9 col-lg-10" method="POST">
                    <div class="p-4 bg-white shadow rounded-3">
                    <h4 class="mb-4" style="color: var(--color-negro); font-weight:600;">Solicitudes de Promociones de: <span style="color: var(--color-dorado-oscuro);"><?php echo obtenNombreLocal($codDueno); ?></span></h4>

                    <!-- TABLA DE PROMOCIONES -->
                <div class="table-responsive">
                <table class="table table-hover table-striped align-middle text-center border flex-grow-1">
                    <thead style="background: linear-gradient(135deg, var(--color-dorado), var(--color-dorado-oscuro)); color: var(--color-negro);">
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Id Solicitante</th>
                        <th>Nombre Solicitante</th>
                        <th>Fecha de Solicitud</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                    if(mysqli_num_rows($resultGlobal) != 0){
                        while($soliGlobal = mysqli_fetch_assoc($resultGlobal)){
                            if(verificaLocalPromo($soliGlobal['codPromo'], $codLocal) == 1 ){
                    ?>

                    <tr>
                        <td>PR-<?php echo $soliGlobal['codPromo']; ?></td>
                        <td><?php echo obtenDescPromo($soliGlobal['codPromo']); ?></td>
                        <td><?php echo $soliGlobal['codCliente']; ?></td>
                        <td><?php echo obtenNombreCliente($soliGlobal['codCliente']); ?></td>
                        <td><?php echo $soliGlobal['fechaUsoPromo']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="codUsoPromo" value="<?php echo $soliGlobal['codUsoPromo']; ?>">
                                <button class="btn btn-sm btn-success mb-1" name="aprobarSolicitud">
                                    <i class="bi bi-check"></i> Aprobar
                                </button>
                            </form>
                            <form method="POST" action="">
                                <input type="hidden" name="codUsoPromo" value="<?php echo $soliGlobal['codUsoPromo']; ?>">
                                <button class="btn btn-sm btn-danger" name="rechazarSolicitud">
                                    <i class="bi bi-x"></i> Rechazar
                                </button>
                            </form>
                        </td>
                    </tr>

                    <?php
                            }
                        }
                    }else{
                    ?>
                    <p class="fw-bold" style="color: var(--color-gris);">
                            <i class="bi bi-search"></i>[NO SE ENCONTRARON PROMOCIONES DISPONIBLES PARA USTED EN ESTE LOCAL]
                    </p> <?php
                    
                    }
                        ?>
                        </tbody>
                    </table>


            </section>
            <!-- <aside class="col-md-3 col-lg-2 mb-4">
                <div class="p-3 bg-white shadow rounded-3">    
                    <h5 class="mb-3" style="color:var(--color-negro); font-weight:600;"><i class="bi bi-shop"></i> Información del Local</h5>
                    <p><strong>Codigo de Local:</strong> <?php echo $dataLocal['codLocal']; ?></p>
                    <p class="mb-2"><strong>Nombre:</strong> <?php echo $dataLocal['nombreLocal']; ?></p>
                    <p class="mb-3"><strong>Sector:</strong> <?php echo $dataLocal['ubicacionLocal']; ?></p>
                    <p class="mb-2"><strong>Rubro:</strong> <?php echo $dataLocal['categoriaLocal']; ?></p>
                </div>
            </aside> -->
        </div>
    </main>



<?php  if(isset($_SESSION['solicitud_ok'])) { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Solicitud de promocion aprobada',
        text: '<?php echo $_SESSION['solicitud_ok']; ?>',
    });
    </script>
    <?php
        unset($_SESSION['solicitud_ok']); // lo borro para no repetirlo
    } 
   ?>
<?php  if(isset($_SESSION['rechazo_ok'])) { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'warning',
        title: 'Solicitud de promocion rechazada',
        text: '<?php echo $_SESSION['rechazo_ok']; ?>',
    });
    </script>
    <?php
        unset($_SESSION['rechazo_ok']); // lo borro para no repetirlo
    } 
   ?>
    <!-- Footer -->
    
</body>
</html>