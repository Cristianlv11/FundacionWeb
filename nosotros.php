<?php
require 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes Somos | Fundación ADN de Amor</title>
    <meta name="description"
        content="Conoce a la Fundación ADN de Amor, nuestra misión, historia y cómo trabajamos para generar oportunidades y esperanza.">
    <link rel="canonical" href="https://fundacionadndeamor.org/nosotros">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fundacionadndeamor.org/nosotros">
    <meta property="og:title" content="Quiénes Somos | Fundación ADN de Amor">
    <meta property="og:description"
        content="Conoce a la Fundación ADN de Amor, nuestra misión, historia y cómo trabajamos para generar oportunidades y esperanza.">
    <meta property="og:image"
        content="https://fundacionadndeamor.org/FOTOS%20BANNERS/MAMA%20CON%20ANGELICA%20%20DEFINITIVA%20BANNER.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fundacionadndeamor.org/nosotros">
    <meta property="twitter:title" content="Quiénes Somos | Fundación ADN de Amor">
    <meta property="twitter:description"
        content="Conoce a la Fundación ADN de Amor, nuestra misión, historia y cómo trabajamos para generar oportunidades y esperanza.">
    <meta property="twitter:image"
        content="https://fundacionadndeamor.org/FOTOS%20BANNERS/MAMA%20CON%20ANGELICA%20%20DEFINITIVA%20BANNER.png">

        <!-- Preconnect fuentes y assets externos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="styles.css?v=<?= @filemtime(__DIR__ . '/styles.css') ?>">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&family=Inter:wght@400;500;600&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader" class="preloader">
        <div class="loader-content">
            <img src="LOGO Y VISUAL WEB BOTONES/logo ADN_de_Amor_color_rectangulo.png" alt="Fundación ADN de Amor"
                class="loader-logo">
            <div class="loader-bar-container">
                <div class="loader-bar"></div>
            </div>
            <p class="loader-text">Abriendo caminos de esperanza...</p>
        </div>
    </div>

    <!-- Navbar -->
    <header class="navbar">
        <div class="container nav-container">
            <a href="/" class="logo">
                <img src="LOGO Y VISUAL WEB BOTONES/logo ADN_de_Amor_color_rectangulo.png"
                    alt="Fundación ADN de Amor Logo">
            </a>
            <button class="mobile-menu-btn"><i class="fas fa-bars"></i></button>
            <nav class="nav-links">
                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fas fa-user-friends nav-icon"></i>
                        <span class="nav-text">Quiénes Somos <i class="fas fa-chevron-down dropdown-icon"></i></span>
                    </button>
                    <div class="dropdown-content">
                        <a href="nosotros">¿Quiénes Somos?</a>
                        <a href="nosotros#mision">Nuestra Misión y Creencias</a>
                        <a href="nosotros#historia">Nuestra Historia</a>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fas fa-hands-holding nav-icon"></i>
                        <span class="nav-text">Qué Hacemos <i class="fas fa-chevron-down dropdown-icon"></i></span>
                    </button>
                    <div class="dropdown-content">
                        <a href="programas#donde-estamos">Dónde Estamos</a>
                        <a href="programas#que-hacemos">¿Qué Hacemos?</a>
                        <a href="programas#cdt">Centro de Desarrollo de Talentos</a>
                        <a href="programas#esperanza">Programa Esperanza</a>
                        <a href="programas#choco">Misión Chocó</a>
                        <a href="programas#eventos">Eventos: Charlas de los Jueves</a>
                        <a href="programas#linea">Línea de Ayuda ADN</a>
                        <a href="memorias">Memorias de Nuestra Labor</a>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fas fa-hand-holding-heart nav-icon"></i>
                        <span class="nav-text">Qué Puedes Hacer <i class="fas fa-chevron-down dropdown-icon"></i></span>
                    </button>
                    <div class="dropdown-content">
                        <a href="apadrinar">Apadrina un Niño</a>
                        <a href="/#donar">Dona por una Causa</a>
                        <a href="empresas">Empresas y Aliados</a>
                        <a href="practicas">Prácticas Profesionales</a>
                        <a href="voluntariado">Ser Voluntario</a>
                    </div>
                </div>

                <a href="tienda" style="font-weight: 600; color: var(--text-dark); text-decoration: none;">
                    <i class="fas fa-shopping-bag nav-icon"></i>
                    <span class="nav-text">Tienda Solidaria</span>
                </a>

                <a href="servicios" style="font-weight: 600; color: var(--text-dark); text-decoration: none;">
                    <i class="fas fa-laptop-code nav-icon"></i>
                    <span class="nav-text">Servicios</span>
                </a>

                <a href="blog" style="font-weight: 600; color: var(--text-dark); text-decoration: none;">
                    <i class="fas fa-newspaper nav-icon"></i>
                    <span class="nav-text">Blog</span>
                </a>

                <a href="/#contacto" class="btn btn-primary">Contacto</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" style="height: 75vh; min-height: 550px;">
        <div class="carousel">
            <div class="slide active"
                style="background-image: url('<?= htmlspecialchars(get_site_content($pdo, 'nos_hero_img', 'FOTOS BANNERS/MAMA CON ANGELICA  DEFINITIVA BANNER.png')) ?>'); background-position: center 25%;">
                <div class="hero-overlay"></div>
                <div class="hero-content container">
                    <h1 style="font-size: 4rem;"><?= htmlspecialchars(get_site_content($pdo, 'nos_hero_title', 'Quiénes Somos')) ?></h1>
                    <p style="font-size: 1.5rem;"><?= htmlspecialchars(get_site_content($pdo, 'nos_hero_desc', 'Construyendo comunidades más humanas, unidas y llenas de oportunidades.')) ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- ¿Quiénes Somos? -->
    <section id="quienes-somos" class="section">
        <div class="container">
            <div class="split-layout">
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'nos_quienes_title', '¿Quiénes Somos?')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_quienes_desc1', 'La Fundación ADN de Amor, es una organización social de principios cristianos, inspirada en el legado de amor, servicio y solidaridad de la señora Nidia López de Giraldo. Nacimos con el propósito de acompañar a niños, niñas, adolescentes, jóvenes y madres cabeza de familia en situación de vulnerabilidad, especialmente en comunidades marginadas y afectadas por la violencia social y política.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_quienes_desc2', 'Trabajamos por el bienestar humano, emocional, espiritual y social de las comunidades, promoviendo oportunidades que contribuyan a generar cambios significativos y fortalecer proyectos de vida con esperanza y dignidad.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_quienes_desc3', 'Uno de los pilares fundamentales de nuestra labor es el Centro de Desarrollo de Talentos, un programa orientado a identificar y potenciar los talentos de niños, niñas, adolescentes y jóvenes, acompañándolos en procesos de crecimiento personal, fortalecimiento espiritual y construcción de propósito de vida.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_quienes_desc4', 'Creemos en el amor al prójimo, la solidaridad, la fe y el servicio como herramientas para construir comunidades más humanas, unidas y llenas de oportunidades.')) ?></p>
                </div>
                <div class="split-image organic-img">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'nos_quienes_img', 'FOTOS BANNERS/FOTO BANNER NAVIDADES SELECCION.png')) ?>" loading="lazy" decoding="async" alt="Niños de la Fundación">
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestra Misión y Creencias -->
    <section id="mision" class="section bg-light">
        <div class="container">
            <div class="section-header text-center">
                <h2><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_header_title', 'Nuestra Misión y Propósito')) ?></h2>
                <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_header_desc', 'Guiados por principios cristianos de amor, fe, esperanza y servicio, trabajamos para sembrar valores, brindar nuevas oportunidades y llevar esperanza a las nuevas generaciones.')) ?></p>
            </div>

            <div class="split-layout" style="margin-bottom: 5rem;">
                <div class="split-content">
                    <h3 style="font-size: 2rem; color: var(--secondary); margin-bottom: 1rem;"><i
                            class="fas fa-bullseye" style="color: var(--primary); margin-right: 10px;"></i> <?= htmlspecialchars(get_site_content($pdo, 'nos_mision_title', 'Nuestra Misión')) ?></h3>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_desc1', 'Contribuir al bienestar y desarrollo de niños, niñas, adolescentes, jóvenes y madres cabeza de familia en condición de vulnerabilidad social, económica o víctimas de violencia, a través de programas de acompañamiento psicosocial, formación no formal, desarrollo de talentos, ayuda humanitaria y espacios de integración social.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_desc2', 'A través del Centro de Desarrollo de Talentos promovemos el fortalecimiento de habilidades artísticas, deportivas y vocacionales, acompañando procesos de crecimiento personal y proyectos de vida desde un enfoque basado en la esperanza, la restauración y el desarrollo humano.')) ?></p>
                </div>
                <div class="split-image organic-img">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'nos_mision_img', 'FOTOS BANNERS/foto prinicpal 2 niños banner final.png')) ?>" loading="lazy" decoding="async" alt="Nuestra Misión">
                </div>
            </div>

            <div class="split-layout reverse" style="margin-bottom: 5rem;">
                <div class="split-content">
                    <h3 style="font-size: 2rem; color: var(--secondary); margin-bottom: 1rem;"><i
                            class="fas fa-hands-helping" style="color: var(--primary); margin-right: 10px;"></i> <?= htmlspecialchars(get_site_content($pdo, 'nos_mision_como_title', '¿Cómo lo hacemos?')) ?></h3>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_como_desc1', 'Trabajamos de manera cercana y colaborativa con familias, comunidades, voluntarios, aliados e instituciones públicas y privadas, generando oportunidades de transformación social y humana para niños, niñas, adolescentes, jóvenes y madres cabeza de familia en condición de vulnerabilidad.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_como_desc2', 'Desarrollamos procesos de acompañamiento fundamentados en principios cristianos de amor al prójimo, servicio, compasión y esperanza, promoviendo relaciones de confianza y apoyo con las comunidades. Nuestro trabajo busca atender no solo necesidades inmediatas, sino también fortalecer el crecimiento emocional, espiritual y social de cada persona.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_como_desc3', 'Asimismo, impulsamos alianzas y redes de cooperación con organizaciones y personas comprometidas con la transformación social, convencidos de que el trabajo conjunto multiplica el impacto.')) ?></p>
                </div>
                <div class="split-image organic-img-2">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'nos_mision_como_img', 'FOTOS BANNERS/foto sandra guamos banner final mejor.png')) ?>" loading="lazy" decoding="async" alt="¿Cómo lo hacemos?">
                </div>
            </div>

            <div class="split-layout">
                <div class="split-content">
                    <h3 style="font-size: 2rem; color: var(--secondary); margin-bottom: 1rem;"><i class="fas fa-heart"
                            style="color: var(--primary); margin-right: 10px;"></i> <?= htmlspecialchars(get_site_content($pdo, 'nos_mision_creemos_title', 'En lo que creemos')) ?></h3>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_creemos_desc1', 'Creemos en el poder transformador del amor, la fe y el servicio. Creemos que cada niño, niña, adolescente y joven tiene talentos, propósito y un valor único.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_creemos_desc2', 'Creemos en acompañar a las comunidades con dignidad, esperanza y solidaridad, reflejando el amor de Dios a través de acciones que generen impacto real en la vida de las personas.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_mision_creemos_desc3', 'Soñamos con generaciones fortalecidas en valores, con oportunidades para crecer, servir y transformar positivamente su entorno.')) ?></p>
                </div>
                <div class="split-image organic-img">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'nos_mision_creemos_img', 'FOTOS BANNERS/CDT_ingles_clase_real.png')) ?>" loading="lazy" decoding="async" alt="En lo que creemos">
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestra Historia -->
    <section id="historia" class="section">
        <div class="container">
            <div class="split-layout reverse">
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'nos_historia_title', 'Nuestra Historia')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_historia_desc1', 'Entre 1980 y el año 2008, la obra social que hoy inspira a la Fundación ADN de Amor tuvo como gran pionera a la señora Nidia López de Giraldo, una mujer de profunda vocación de servicio y amor por el prójimo. Activista social y ejemplo de generosidad, dedicó su vida a ayudar a miles de personas, especialmente niños, jóvenes y madres cabeza de familia, llevando siempre una sonrisa, palabras de esperanza, apoyo y comprensión.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_historia_desc2', 'Trabajó incansablemente por la misión social en el Chocó, especialmente en la vereda de Gingarabá, donde contribuyó a la construcción de viviendas para familias de la comunidad, apoyó la educación de varios niños y llevó ayuda humanitaria, incluyendo ropa, alimentos y medicamentos. Su labor estuvo siempre enfocada en acompañar y brindar esperanza a las comunidades más vulnerables, dejando una huella de amor, solidaridad y servicio en cada familia que ayudó.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_historia_desc3', 'Además, realizó obra social y evangelística en las cárceles del Eje Cafetero, tanto de mujeres como de hombres, llevando apoyo espiritual y acompañamiento a los internos. Durante muchos años celebraba la Navidad con ellos, organizando actividades con la colaboración de otros voluntarios, compartiendo alegría, esperanza y un mensaje de amor en estas comunidades privadas de libertad.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'nos_historia_desc4', 'Su vida fue testimonio de entrega desinteresada y de un profundo compromiso con quienes más lo necesitaban. Hace más de 15 años partió al encuentro con Dios, pero su legado continúa vivo en cada obra de servicio y en cada vida transformada.')) ?></p>
                    <p><strong><?= htmlspecialchars(get_site_content($pdo, 'nos_historia_desc5_strong', 'Hoy, sus hijos y nieta, socios fundadores de la Fundación ADN de Amor, continuamos este legado de amor, servicio y compromiso social, honrando sus enseñanzas y manteniendo viva la misión de ayudar a quienes más lo necesitan.')) ?></strong></p>
                </div>
                <div class="split-image organic-img-2 text-center">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'nos_historia_img', 'FOTOS BANNERS/FOTO PERFIL MAMA PRIMERA.jpeg')) ?>" loading="lazy" decoding="async" alt="Nidia López de Giraldo"
                        style="border-radius: 20px; box-shadow: var(--shadow); max-width: 80%; height: auto; object-fit: cover; aspect-ratio: 1/1;">
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
</body>

</html>
