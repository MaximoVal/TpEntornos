<?php
    session_start();
    if(!isset($_SESSION['usuario'])) {
        include 'nav.php';   
    } else {
        include 'nav2.php';  
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/nosotrosEstilos.css">
    <link rel="stylesheet" href="../Estilos/estilos.css">
    <title>Sobre Nosotros - Nuestra Empresa</title>
</head>
<body>
    <!-- Header -->
    <header class="header" style="background-image: url('../Footage/Galeria1.png');">
  
            <h1>Sobre Nosotros</h1>
            <p>Conoce nuestra historia, valores y el equipo que hace posible todo lo que hacemos cada día</p>
        </div>
    </header>

    <!-- Historia -->
    <section class="section historia">
        <div class="container">
            <h2 class="section-title">Nuestra Historia</h2>
            <div class="historia-content">
                <div class="historia-text">
                    <h3>Comenzamos con un sueño</h3>
                    <p>Fundada en 2015, nuestra empresa nació de la pasión por crear soluciones innovadoras que realmente marquen la diferencia en la vida de las personas.</p>
                    <p>Lo que comenzó como un pequeño equipo de visionarios, ha crecido hasta convertirse en una organización líder en su sector, manteniendo siempre nuestros valores fundamentales de integridad, innovación y excelencia.</p>
                    <p>A lo largo de estos años, hemos tenido el privilegio de trabajar con clientes extraordinarios y construir relaciones duraderas basadas en la confianza mutua y resultados excepcionales.</p>
                </div>
                <div class="historia-image">
                    <span>📈 Crecimiento Constante</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Nuestros Valores</h2>
            <p class="section-subtitle">Los principios que guían cada una de nuestras acciones y decisiones</p>
            
            <div class="valores-grid">
                <div class="valor-item">
                    <div class="valor-icon">🎯</div>
                    <h4>Excelencia</h4>
                    <p>Nos comprometemos a entregar siempre la más alta calidad en todo lo que hacemos, superando las expectativas de nuestros clientes.</p>
                </div>
                
                <div class="valor-item">
                    <div class="valor-icon">💡</div>
                    <h4>Innovación</h4>
                    <p>Buscamos constantemente nuevas formas de mejorar y evolucionar, manteniéndonos a la vanguardia de la industria.</p>
                </div>
                
                <div class="valor-item">
                    <div class="valor-icon">🤝</div>
                    <h4>Integridad</h4>
                    <p>Actuamos con honestidad y transparencia en todas nuestras relaciones comerciales y personales.</p>
                </div>
                
                <div class="valor-item">
                    <div class="valor-icon">🌱</div>
                    <h4>Sostenibilidad</h4>
                    <p>Nos preocupamos por el impacto de nuestras acciones en el medio ambiente y la sociedad.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipo -->
    <section class="section equipo">
        <div class="container">
            <h2 class="section-title">Nuestro Equipo</h2>
            <p class="section-subtitle">Conoce a las personas que hacen posible nuestra misión</p>
            
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo">👨‍💼 Foto del CEO</div>
                    <div class="member-info">
                        <h4>Juan Carlos Pérez</h4>
                        <div class="position">CEO & Fundador</div>
                        <p>Con más de 15 años de experiencia en el sector, Juan Carlos lidera nuestra visión estratégica y impulsa la innovación en toda la organización.</p>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">👩‍💻 Foto de CTO</div>
                    <div class="member-info">
                        <h4>María González</h4>
                        <div class="position">CTO</div>
                        <p>María es la mente brillante detrás de nuestras soluciones tecnológicas, con una pasión inquebrantable por la excelencia técnica.</p>
                    </div>
                </div>
                
                <div class="team-member">
                    <div class="member-photo">👨‍💼 Foto de CMO</div>
                    <div class="member-info">
                        <h4>Carlos Rodriguez</h4>
                        <div class="position">Director de Marketing</div>
                        <p>Carlos se encarga de conectar nuestra marca con el mundo, creando estrategias que resuenan con nuestra audiencia.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Estadísticas -->
    <section class="section stats">
        <div class="container">
            <h2 class="section-title">Nuestros Logros</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Clientes Satisfechos</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Proyectos Completados</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Profesionales</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">8</div>
                    <div class="stat-label">Años de Experiencia</div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>