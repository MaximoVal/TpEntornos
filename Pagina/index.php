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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
                <!--Tarjetas de Categorias-->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder imagenesPromoc" style="background-image: url('../Footage/Indumentaria.png'); background-size: cover; background-position: center;">
                          <p style="color: white; -webkit-text-stroke: 0.5px black; font-size: 1.4rem;">INDUMENTARIA</p>
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Indumentaria</h5>
                            <p class="card-text">Descubre las últimas tendencias en moda, accesorios y mucho más en nuestras exclusivas tiendas de marcas reconocidas.</p>
                            <a href="descuentoTabla(SDB).php?categoria=Indumentaria" class="btn btn-custom">Explorar Promociones</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder" style="background-image: url('../Footage/PatioComida.png'); background-size: cover; background-position: center;">
                          <p style="color: white; -webkit-text-stroke: 0.5px black; font-size: 1.4rem;">GASTRONOMIA</p>
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Área Gastronómica</h5>
                            <p class="card-text">Disfruta de una amplia variedad de restaurantes con los mejores sabores locales e internacionales para toda la familia.</p>
                            <a href="descuentoTabla(SDB).php?categoria=Gastronomia" class="btn btn-custom">Explorar Promociones</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder" style="background-image: url('../Footage/Cine.jpg'); background-size: cover; background-position: center;">
                            <p style="color: white; -webkit-text-stroke: 0.5px black; font-size: 1.4rem;">🎬 ENTRETENIMIENTO </p>
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Entretenimiento</h5>
                            <p class="card-text">Vive experiencias únicas en nuestro cine, zona de juegos y espacios de entretenimiento para todas las edades.</p>
                            <a href="descuentoTabla(SDB).php?categoria=Entretenimiento" class="btn btn-custom">Explorar Promociones</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder" style="background-image: url('../Footage/Tecnologia.png'); background-size: cover; background-position: center;">
                            <p style="color: white; -webkit-text-stroke: 0.5px black; font-size: 1.4rem;">TECNOLOGIA</p>
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Tecnologia</h5>
                            <p class="card-text">Notebooks, smartphones y todo lo ultimo en tecnologia que te podes imaginar!</p>
                            <a href="descuentoTabla(SDB).php?categoria=Tecnologia" class="btn btn-custom">Explorar Promociones</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder" style="background-image: url('../Footage/ArtDeporte.jpg'); background-size: cover; background-position: center;">
                            <p style="color: white; -webkit-text-stroke: 0.5px black; font-size: 1.6rem;">DEPORTE</p>
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Deporte</h5>
                            <p class="card-text">Veni y adquiri todo lo ultimo de tu deporte favorito!!</p>
                            <a href="descuentoTabla(SDB).php?categoria=Deporte" class="btn btn-custom">Explorar Promociones</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="card card-custom">
                        <div class="card-img-placeholder">
                            🎉 OTROS
                        </div>
                        <div class="card-body card-body-custom">
                            <h5 class="card-title">Otros</h5>
                            <p class="card-text">💄 Salud, Belleza y Cuidado Persona; 💎 Hogar y Decoración; 💼 Servicios...</p>
                            <a href="descuentoTabla(SDB).php?categoria=Otros" class="btn btn-custom">Explorar Promociones</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div id="carouselNovedades" class="carousel slide mb-4" data-bs-ride="carousel">
  <!-- Indicadores -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselNovedades" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselNovedades" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselNovedades" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#carouselNovedades" data-bs-slide-to="3"></button>
  </div>

  <!-- Slides -->
  <div class="carousel-inner rounded-3 shadow-sm">
    <!-- Novedad 1 -->
    <div class="carousel-item active">
      <img src="https://picsum.photos/1200/400?random=1" class="d-block w-100" alt="Nueva apertura de tienda">
      <div class="carousel-caption bg-dark bg-opacity-50 rounded p-3">
        <h5>Apertura de Zara Home</h5>
        <p>¡Descubrí la nueva tienda de decoración en el segundo nivel del shopping!</p>
      </div>
    </div>

    <!-- Novedad 2 -->
    <div class="carousel-item">
      <img src="https://picsum.photos/1200/400?random=2" class="d-block w-100" alt="Nuevo patio de comidas">
      <div class="carousel-caption bg-dark bg-opacity-50 rounded p-3">
        <h5>Nuevo Patio de Comidas</h5>
        <p>Más opciones gourmet, incluyendo cocina internacional y cafeterías renovadas.</p>
      </div>
    </div>

    <!-- Novedad 3 -->
    <div class="carousel-item">
      <img src="https://picsum.photos/1200/400?random=3" class="d-block w-100" alt="Evento de moda">
      <div class="carousel-caption bg-dark bg-opacity-50 rounded p-3">
        <h5>Semana de la Moda</h5>
        <p>Desfiles, descuentos y actividades especiales durante todo el fin de semana.</p>
      </div>
    </div>

    <!-- Novedad 4 -->
    <div class="carousel-item">
      <img src="https://picsum.photos/1200/400?random=4" class="d-block w-100" alt="Promociones">
      <div class="carousel-caption bg-dark bg-opacity-50 rounded p-3">
        <h5>Promociones Especiales</h5>
        <p>2x1 en cines, beneficios para socios y descuentos exclusivos en locales adheridos.</p>
      </div>
    </div>
  </div>

  <!-- Controles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselNovedades" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselNovedades" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
