<?php
    session_set_cookie_params(0);
    session_start();
    $hoy= date('Y-m-d');

    include('funciones.php');

    if(isset($_SESSION['usuario'])){
    $emailUsu = $_SESSION['usuario'];
    $sqlCategoriaCliente = "SELECT * FROM usuarios WHERE nombreUsuario='$emailUsu'";
    $resultadoCategoria = consultaSQL($sqlCategoriaCliente);
    $rc = mysqli_fetch_assoc($resultadoCategoria);
    $resultadoCat = $rc['categoriaCliente'];
    $codCliente = $rc['codUsuario'];
    $tipoUsuario = $rc['tipoUsuario'];
    
    if($tipoUsuario == 'dueño de local' || $tipoUsuario == 'administrador'){
        $resultadoCat = 'Premium'; 
    }
    
} else {

    $_SESSION['mensaje_warning'] = 'Debes iniciar sesión para ver las promociones disponibles.';
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}

// Capturar categoría del menú
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

if(isset($resultadoCat)){

    $porPagina = 7;
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    if ($pagina < 1) $pagina = 1;

    $offset = ($pagina - 1) * $porPagina;

    // Construir filtro de categoría
    $filtroCategoria = '';
    if(!empty($categoria)){
        $filtroCategoria = " AND categoriaPromo='$categoria'";
    }

    // --- INICIAL ---
    if($resultadoCat == 'Inicial'){

        $sqlCount = "SELECT COUNT(*) AS total 
                    FROM promociones p
                    WHERE p.estadoPromo='aprobada' 
                    AND p.categoriaCliente='Inicial'
                    AND p.fechaHastaPromo >= '$hoy'
                    AND NOT EXISTS (
                        SELECT 1 
                        FROM uso_promociones up 
                        WHERE up.codPromo = p.codPromo 
                        AND up.codCliente = '$codCliente'
                    )
                    $filtroCategoria";

        $resultCount = consultaSQL($sqlCount);
        $rowCount = mysqli_fetch_assoc($resultCount);
        $total = $rowCount['total'] ?? 0;

        $totalPaginas = max(1, ceil($total / $porPagina));

        $sqlPromosCategoricas = "SELECT p.* 
                                FROM promociones p
                                WHERE p.estadoPromo='aprobada' 
                                AND p.categoriaCliente='Inicial'
                                AND p.fechaHastaPromo >= '$hoy'
                                AND NOT EXISTS (
                                    SELECT 1 
                                    FROM uso_promociones up 
                                    WHERE up.codPromo = p.codPromo 
                                    AND up.codCliente = '$codCliente'
                                )
                                $filtroCategoria
                                ORDER BY p.fechaDesdePromo ASC
                                LIMIT $porPagina OFFSET $offset";

    // --- MEDIUM ---
    } elseif($resultadoCat == 'Medium') {

        $sqlCount = "SELECT COUNT(*) AS total 
                    FROM promociones p
                    WHERE p.estadoPromo='aprobada' 
                    AND (p.categoriaCliente='Inicial' OR p.categoriaCliente='Medium')
                    AND p.fechaHastaPromo >= '$hoy'
                    AND NOT EXISTS (
                        SELECT 1 
                        FROM uso_promociones up 
                        WHERE up.codPromo = p.codPromo 
                        AND up.codCliente = '$codCliente'
                    )
                    $filtroCategoria";

        $resultCount = consultaSQL($sqlCount);
        $rowCount = mysqli_fetch_assoc($resultCount);
        $total = $rowCount['total'] ?? 0;

        $totalPaginas = max(1, ceil($total / $porPagina));

        $sqlPromosCategoricas = "SELECT p.* 
                                FROM promociones p
                                WHERE p.estadoPromo='aprobada' 
                                AND (p.categoriaCliente='Inicial' OR p.categoriaCliente='Medium')
                                AND p.fechaHastaPromo >= '$hoy'
                                AND NOT EXISTS (
                                    SELECT 1 
                                    FROM uso_promociones up 
                                    WHERE up.codPromo = p.codPromo 
                                    AND up.codCliente = '$codCliente'
                                )
                                $filtroCategoria
                                ORDER BY p.fechaDesdePromo ASC
                                LIMIT $porPagina OFFSET $offset";

    // --- PREMIUM / DUEÑOS / ADMINISTRADORES ---
    } else {

        $sqlCount = "SELECT COUNT(*) AS total 
                    FROM promociones p
                    WHERE p.estadoPromo='aprobada' 
                    AND p.fechaHastaPromo >= '$hoy'
                    $filtroCategoria";

        $resultCount = consultaSQL($sqlCount);
        $rowCount = mysqli_fetch_assoc($resultCount);
        $total = $rowCount['total'] ?? 0;

        $totalPaginas = max(1, ceil($total / $porPagina));

        if($tipoUsuario == 'dueño de local' || $tipoUsuario == 'administrador'){
            $sqlPromosCategoricas = "SELECT p.* 
                                    FROM promociones p
                                    WHERE p.estadoPromo='aprobada' 
                                    AND p.fechaHastaPromo >= '$hoy'
                                    $filtroCategoria
                                    ORDER BY p.fechaDesdePromo ASC
                                    LIMIT $porPagina OFFSET $offset";
        } else {
            // Para clientes Premium, verificar si ya solicitaron
            $sqlPromosCategoricas = "SELECT p.* 
                                    FROM promociones p
                                    WHERE p.estadoPromo='aprobada' 
                                    AND p.fechaHastaPromo >= '$hoy'
                                    AND NOT EXISTS (
                                        SELECT 1 
                                        FROM uso_promociones up 
                                        WHERE up.codPromo = p.codPromo 
                                        AND up.codCliente = '$codCliente'
                                    )
                                    $filtroCategoria
                                    ORDER BY p.fechaDesdePromo ASC
                                    LIMIT $porPagina OFFSET $offset";
        }
    }

    $resultPromosTotales = consultaSQL($sqlPromosCategoricas);
}
function obtenNombreLocal($codLocal){
    $sqlObtenLocal = "SELECT nombreLocal FROM locales WHERE codLocal='$codLocal'";
    $result = consultaSQL($sqlObtenLocal);
    $nombre = mysqli_fetch_assoc($result);
    return $nombre['nombreLocal'];
}

function verificaPromoSoli($promoCod, $cliente){
    $sqlVerificacion = "SELECT * FROM uso_promociones WHERE codPromo='$promoCod' and codCliente='$cliente'";
    $resultadoVerificacion = consultaSQL($sqlVerificacion);
    return mysqli_num_rows($resultadoVerificacion);
}

if(isset($_POST['solicitarPromo'])){
    $codPromo = $_POST['codPromo'];
    $estadoInicial = "enviada";
    if(verificaPromoSoli($codPromo, $codCliente) == 0){    
        $sqlSolicitaPromo = "INSERT INTO uso_promociones (codCliente, codPromo, fechaUsoPromo, estado) VALUES ('$codCliente', '$codPromo', '$hoy', '$estadoInicial')";
        consultaSQL($sqlSolicitaPromo);
        $_SESSION['solicitud_ok'] = "La promocion se solicito correctamente.";
    } else {
        $_SESSION['solicitudHecha_ok'] = "La promocion ya fue solicitada anteriormente por usted.";
    }
    
    // Redirigir para evitar reenvío de formulario
    header("Location: " . $_SERVER['PHP_SELF'] . "?categoria=$categoria&pagina=$pagina");
    exit;
}
?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Descuentos.</title>

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
    a{
        color:color: var(--bs-body-color) !important;
    }   
        
</style>
<body class="d-flex flex-column min-vh-100">

    <?php 

        if(!isset($_SESSION['usuario'])) {
            include 'navNoRegistrado.php';   
        } else if($_SESSION['tipoUsuario'] == 'cliente') {
            
                include 'navCliente.php';  
            }
            
        else if($_SESSION['tipoUsuario'] == 'dueño de local') {
                include 'navDueño.php';  
            }
        else {
                include 'navAdmin.php';  
            }
    ?>

    <!-- CONTENEDOR PRINCIPAL -->
    <main class="container-fluid my-4 flex-grow-1 mb-5">
        <div class="row">
            <aside class="col-md-3 col-lg-2 mb-4">
        <div class="p-3 bg-white shadow rounded-3">
            <h3 class="mb-3 text-center" style="color: var(--color-negro); font-weight:600;">Categorías</h3>
            <ul class="list-unstyled">
            <li>
                <a href="descuentoTabla(SDB).php?categoria=Deporte" class="text-decoration-none d-block py-2 text-center fw-bold" style="<?php echo ($categoria == 'Deporte')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">
                    Deporte
                </a>
            </li>          
            <li>
                <a href="descuentoTabla(SDB).php?categoria=Entretenimiento" class="text-decoration-none d-block py-2 text-center fw-bold" style="<?php echo ($categoria == 'Entretenimiento')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">
                    Entretenimiento
                </a>
            </li> 
            
            <li>
                <a href="descuentoTabla(SDB).php?categoria=Gastronomia" class="text-decoration-none d-block py-2 text-center fw-bold" style="<?php echo ($categoria == 'Gastronomia')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">
                    Gastronomia
                </a>
            </li> 
            <li>
                <a href="descuentoTabla(SDB).php?categoria=Indumentaria" class="text-decoration-none d-block py-2 text-center fw-bold" style="<?php echo ($categoria == 'Indumentaria')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">
                    Indumentaria
                </a>
            </li> 
            <li>
                <a href="descuentoTabla(SDB).php?categoria=Tecnologia" class="text-decoration-none d-block py-2 text-center fw-bold" style="<?php echo ($categoria == 'Tecnologia')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">
                    Tecnologia
                </a>
            </li>
            <li>
                <a href="descuentoTabla(SDB).php?categoria=Otros" class="text-decoration-none d-block py-2 text-center fw-bold" style="<?php echo ($categoria == 'Otros')? 'color: var(--color-dorado-oscuro); text-decoration: underline;  font-size: 1.2rem;' : 'color: var(--color-gris);'; ?>">
                    Otros
                </a>
            </li> 
            </ul>
        </div>
        </aside>
    
    
        <!-- CONTENIDO PRINCIPAL -->
            <section class="col-md-9 col-lg-10" method="POST">
                <div class="p-4 bg-white shadow rounded-3"><span style="color: var(--color-dorado-oscuro); font-size:30px; ">PROMOCIONES</span></h4>

            <!-- TABLA DE PROMOCIONES -->
                <div class="table-responsive">
                <table class="table table-hover table-striped align-middle text-center border">
                    <thead style="background: linear-gradient(135deg, var(--color-dorado), var(--color-dorado-oscuro)); color: var(--color-negro);">
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Local</th>
                        <th>Caducidad</th>
                        <th>Dias Habilitados</th>
                        <th><?php

                                        if($tipoUsuario == 'dueño de local' || $tipoUsuario == 'administrador') {
                                            
                                        } else {
                                            echo 'Acciones';
                                        }
                                        ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(mysqli_num_rows($resultPromosTotales) != 0){
                        while($promo = mysqli_fetch_assoc($resultPromosTotales)){
                    ?>
                            <form method="POST" action=""> 
                                <input type="hidden" name="codPromo" value="<?php echo $promo['codPromo']; ?>">
                                <tr>
                                    <td>PR-<?php echo $promo['codPromo']; ?></td>
                                    <td><?php echo $promo['textoPromo']; ?></td>
                                    <td><?php echo obtenNombreLocal($promo['codLocal']); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($promo['fechaHastaPromo'])); ?></td>
                                    <td><?php echo $promo['diasSemana']; ?></td>
                                    <td>
                                        <?php

                                        if($tipoUsuario == 'dueño de local' || $tipoUsuario == 'administrador') {
                                            
                                        } else {
                                            echo '<button class="btn btn-sm btn-success" name="solicitarPromo">
                                                    <i class="bi bi-check"></i> Solicitar
                                                </button>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </form>
                    <?php
                        }
                    } else { 
                    ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <p class="fw-bold mb-0" style="color: var(--color-gris);">
                                    <i class="bi bi-search"></i> NO SE ENCONTRARON PROMOCIONES DISPONIBLES PARA USTED EN ESTA CATEGORÍA
                                </p>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                    </table>
                </div>
                <nav aria-label="Paginación" class="mt-3">
                    <ul class="pagination justify-content-center">

                        <!-- Botón Anterior -->
                        <li class="page-item <?php echo ($pagina <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?pagina=<?php echo max(1, $pagina - 1); ?>">
                                Anterior
                            </a>
                        </li>

                        <!-- Números de páginas -->
                        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>
                        <li class="page-item <?php echo ($i == $pagina) ? 'active' : ''; ?>">
                            <a class="page-link" href="?pagina=<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                        <?php endfor; ?>

                        <!-- Botón Siguiente -->
                        <li class="page-item <?php echo ($pagina >= $totalPaginas) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?pagina=<?php echo min($totalPaginas, $pagina + 1); ?>">
                                Siguiente
                            </a>
                        </li>

                    </ul>
                </nav>
            </section>
        </div>
    </main>
  <?php  if(isset($_SESSION['solicitud_ok'])) { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Solicitud de promocion exitosa',
        text: '<?php echo $_SESSION['solicitud_ok']; ?>',
    });
    </script>
    <?php
        
        unset($_SESSION['solicitud_ok']); // lo borro para no repetirlo
    
    }


   ?>
<?php  if(isset($_SESSION['solicitudHecha_ok'])) { ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'warning',
        title: 'Solicitud de promocion ya realizada anteriormente',
        text: '<?php echo $_SESSION['solicitudHecha_ok']; ?>',
    });
    </script>
    <?php
        unset($_SESSION['solicitudHecha_ok']); // lo borro para no repetirlo
    } 
  ?>

    <!-- Footer -->
<?php include 'footer.php'; ?>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>