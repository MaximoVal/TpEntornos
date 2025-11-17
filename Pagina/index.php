<?php
    session_set_cookie_params(0);
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paseo de la Fortuna - Shopping Center</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/estilos.css">
</head>
<body>
    
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

    <!-- Carousel mejorado -->
    <div id="carouselPrincipal" class="carousel slide position-relative" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../Footage/Portada.png" class="d-block w-100" alt="Paseo de la Fortuna">
                <div class="carousel-caption-custom">
                    <h1>Bienvenido a Paseo de la Fortuna</h1>
                    <p>Tu destino de compras, entretenimiento y gastronomía</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Servicios -->
    <section class="servicios-section" id="servicios">
        <div class="container">
            <h2 class="section-title">Promociones</h2>
            <div class="row">
                <!-- Card 1: Tiendas -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder imagenesPromoc" style="background-image: url('../Footage/Indumentaria.png'); background-size: cover; background-position: center;">
                          INDUMENTARIA
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Indumentaria</h5>
                            <p class="card-text">Descubre las últimas tendencias en moda, accesorios y mucho más en nuestras exclusivas tiendas de marcas reconocidas.</p>
                            <a href="#tiendas" class="btn btn-custom">Explorar Tiendas</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Restaurantes -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder" style="background-image: url('../Footage/PatioComida.png'); background-size: cover; background-position: center;">
                          GASTRONOMIA
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Área Gastronómica</h5>
                            <p class="card-text">Disfruta de una amplia variedad de restaurantes con los mejores sabores locales e internacionales para toda la familia.</p>
                            <a href="#restaurantes" class="btn btn-custom">Ver Restaurantes</a>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Entretenimiento -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder">
                            🎬 ENTRETENIMIENTO
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Entretenimiento</h5>
                            <p class="card-text">Vive experiencias únicas en nuestro cine, zona de juegos y espacios de entretenimiento para todas las edades.</p>
                            <a href="#entretenimiento" class="btn btn-custom">Descubrir Más</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Servicios adicionales -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder">
                            <p>ELECTRODOMESTICO</p>
                            <img src="../Footage/electrodomestico.jpg" alt="Logo de McDonlads" class="imagenPromocion">
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Electrodomesticos</h5>
                            <p class="card-text">Cajeros automáticos, estacionamiento gratuito, wifi gratis y muchos servicios más para tu comodidad.</p>
                            <a href="#servicios" class="btn btn-custom">Ver Servicios</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Eventos -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder">
                            <p>ELECTRODOMESTICO</p>
                            <img src="../Footage/electrodomestico.jpg" alt="Logo de McDonlads" class="imagenPromocion">
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Electrodomesticos</h5>
                            <p class="card-text">Cajeros automáticos, estacionamiento gratuito, wifi gratis y muchos servicios más para tu comodidad.</p>
                            <a href="#servicios" class="btn btn-custom">Ver Servicios</a>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Horarios -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder">
                            🎉 SERVICIOS
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Servicios adicionaless</h5>
                            <p class="card-text">No te pierdas nuestros eventos especiales, promociones y actividades durante todo el año.</p>
                            <a href="#eventos" class="btn btn-custom">Ver Eventos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <aside>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>