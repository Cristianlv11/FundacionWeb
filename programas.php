<?php 
require_once 'includes/db.php'; 

// Cargar charlas y eventos activos
$eventos_list = [];
try {
    // Auto-crear tabla si no existe
    $pdo->exec("CREATE TABLE IF NOT EXISTS `eventos` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `titulo` varchar(255) NOT NULL,
        `subtitulo` varchar(255) DEFAULT NULL,
        `descripcion` text NOT NULL,
        `fecha` date NOT NULL,
        `hora` varchar(50) DEFAULT '6:30 PM',
        `dia_semana` varchar(50) DEFAULT 'Jueves',
        `lugar` varchar(255) DEFAULT 'Sede Finca Guacas (Santa Rosa de Cabal) / En Vivo',
        `modalidad` varchar(50) DEFAULT 'Híbrida (Presencial y Virtual)',
        `expositor` varchar(255) DEFAULT 'Equipo ADN de Amor & Invitados',
        `imagen` varchar(500) DEFAULT NULL,
        `cupos` varchar(100) DEFAULT 'Entrada libre con inscripción previa',
        `whatsapp_contacto` varchar(50) DEFAULT '573162522445',
        `estado` enum('activo','proximo','finalizado') DEFAULT 'proximo',
        `destacado` tinyint(1) DEFAULT 1,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

    // Verificar si está vacía para precargar las charlas
    $cnt = $pdo->query("SELECT COUNT(*) FROM eventos")->fetchColumn();
    if ($cnt == 0) {
        $pdo->exec("INSERT INTO eventos (titulo, subtitulo, descripcion, fecha, hora, dia_semana, lugar, modalidad, expositor, imagen, cupos, whatsapp_contacto, estado, destacado) VALUES
        ('Crianza con Amor y Propósito: Claves para el Bienestar Familiar', 
         'Fortaleciendo los lazos del hogar desde la empatía, el diálogo y la fe', 
         'Un espacio de encuentro cálido para padres, madres y cuidadores. Abordaremos herramientas prácticas sobre comunicación asertiva, disciplina positiva con amor y cómo construir un ambiente protector que potencie el propósito de vida de nuestros hijos.', 
         DATE_ADD(CURDATE(), INTERVAL (4 - WEEKDAY(CURDATE()) + 7) % 7 DAY), 
         '6:30 PM', 
         'Jueves', 
         'Sede Finca Guacas (Santa Rosa de Cabal) y En Vivo por Internet', 
         'Híbrida (Presencial y Virtual)', 
         'Equipo Psicosocial & Pastoral ADN de Amor', 
         'FOTOS BANNERS/MAMA CON ANGELICA  DEFINITIVA BANNER.webp', 
         'Entrada libre (Cupos limitados con reserva)', 
         '573162522445', 
         'proximo', 
         1),

        ('Superando la Adversidad: Resiliencia, Esperanza y Salud Emocional', 
         'Cómo renovar las fuerzas y encontrar dirección en momentos desafiantes', 
         'Espacio reflexivo y de acompañamiento donde compartiremos pautas para la gestión de las emociones, superación del desánimo y el fortalecimiento de la fe en comunidad frente a los retos cotidianos.', 
         DATE_ADD(DATE_ADD(CURDATE(), INTERVAL (4 - WEEKDAY(CURDATE()) + 7) % 7 DAY), INTERVAL 7 DAY), 
         '6:30 PM', 
         'Jueves', 
         'Sede Finca Guacas y Transmisión Online', 
         'Híbrida (Presencial y Virtual)', 
         'Mentores Invitados y Especialistas en Bienestar', 
         'FOTOS BANNERS/foto principal niños original tamaño mejorada luz.webp', 
         'Entrada libre (Cupos limitados con reserva)', 
         '573162522445', 
         'proximo', 
         0),

        ('Juventud con Visión: Descubriendo Talentos y Proyecto de Vida', 
         'Liderazgo, motivación y enfoque vocacional para adolescentes y jóvenes', 
         'Charla dinámica e interactiva enfocada en inspirar a las nuevas generaciones a identificar sus dones, trazar metas claras y construir un futuro lleno de esperanza y oportunidades reales.', 
         DATE_ADD(DATE_ADD(CURDATE(), INTERVAL (4 - WEEKDAY(CURDATE()) + 7) % 7 DAY), INTERVAL 14 DAY), 
         '6:30 PM', 
         'Jueves', 
         'Sede Finca Guacas y Transmisión Online', 
         'Híbrida (Presencial y Virtual)', 
         'Líderes de Juventud & Talleristas del CDT', 
         'FOTOS BANNERS/FOTO GRUPO JOVENES.webp', 
         'Entrada libre (Cupos limitados con reserva)', 
         '573162522445', 
         'proximo', 
         0)");
    }

    $stmt = $pdo->query("SELECT * FROM eventos WHERE estado IN ('proximo', 'activo') ORDER BY destacado DESC, fecha ASC");
    $eventos_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($eventos_list)) {
        $stmt = $pdo->query("SELECT * FROM eventos ORDER BY fecha DESC LIMIT 3");
        $eventos_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Programas | Fundación ADN de Amor</title>
    <meta name="description" content="Conoce el Centro de Desarrollo de Talentos, Programa Esperanza y Misión Chocó.">
    <link rel="canonical" href="https://fundacionadndeamor.org/programas">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fundacionadndeamor.org/programas">
    <meta property="og:title" content="Nuestros Programas | Fundación ADN de Amor">
    <meta property="og:description"
        content="Conoce el Centro de Desarrollo de Talentos, Programa Esperanza y Misión Chocó.">
    <meta property="og:image"
        content="https://fundacionadndeamor.org/FOTOS%20BANNERS/foto%20principal%20ni%C3%B1os%20banner%20final.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fundacionadndeamor.org/programas">
    <meta property="twitter:title" content="Nuestros Programas | Fundación ADN de Amor">
    <meta property="twitter:description"
        content="Conoce el Centro de Desarrollo de Talentos, Programa Esperanza y Misión Chocó.">
    <meta property="twitter:image"
        content="https://fundacionadndeamor.org/FOTOS%20BANNERS/foto%20principal%20ni%C3%B1os%20banner%20final.png">

        <!-- Preconnect fuentes y assets externos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="styles.css?v=<?= @filemtime(__DIR__ . '/styles.css') ?>">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&family=Inter:wght@400;500;600&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .page-hero {
            margin-top: 85px;
            padding: 4rem 1rem;
            text-align: center;
            background: linear-gradient(135deg, rgba(234, 90, 0, 0.05) 0%, rgba(0, 16, 62, 0.05) 100%);
        }

        .page-hero h1 {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        /* Specific program layout fixes */
        .program-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .program-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .program-card-content {
            padding: 2rem;
        }

        .program-card-content h4 {
            color: var(--secondary);
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }
    </style>
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
                        <a href="#donde-estamos">Dónde Estamos</a>
                        <a href="#que-hacemos">¿Qué Hacemos?</a>
                        <a href="#cdt">Centro de Desarrollo de Talentos</a>
                        <a href="#esperanza">Programa Esperanza</a>
                        <a href="#choco">Misión Chocó</a>
                        <a href="#eventos">Eventos: Charlas de los Jueves</a>
                        <a href="#linea">Línea de Ayuda ADN</a>
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

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <h1><?= htmlspecialchars(get_site_content($pdo, 'prog_hero_title', 'Nuestros Programas y Proyectos')) ?></h1>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;"><?= htmlspecialchars(get_site_content($pdo, 'prog_hero_desc', 'En la Fundación ADN de Amor, acompañamos y apoyamos el desarrollo integral de niños, niñas, adolescentes y familias, promoviendo bienestar, esperanza y oportunidades.')) ?></p>
        </div>
    </section>

    <!-- Dónde Estamos -->
    <section id="donde-estamos" class="section">
        <div class="container">
            <div class="split-layout">
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'prog_donde_title', 'Dónde Estamos')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'prog_donde_p1', 'La Fundación ADN de Amor tiene su sede principal y finca ubicada en la vereda Guacas en Santa Rosa de Cabal, cerca al Mirador del Café, desde donde coordinamos y desarrollamos todas nuestras actividades.')) ?></p>
                    <p style="margin-top: -0.5rem; margin-bottom: 1.5rem;">
                        <a href="https://maps.app.goo.gl/xvSyBJBfQMuL4wGF7" target="_blank" rel="noopener noreferrer" style="color: var(--primary); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fas fa-map-marked-alt"></i> Ver ubicación de la finca en Google Maps
                        </a>
                    </p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'prog_donde_p2', 'Nuestro trabajo impacta diferentes regiones de Colombia, llevando apoyo integral a niños, niñas, adolescentes, jóvenes y madres cabeza de familia en situación de vulnerabilidad:')) ?></p>
                    <ul class="feature-list" style="margin-top: 1.5rem;">
                        <li><i class="fas fa-map-marker-alt"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_donde_li1_title', 'Eje Cafetero:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_donde_li1_desc', 'Acompañamos a comunidades en distintas ciudades y veredas, ofreciendo programas de bienestar, programas de formación no formal, ofreciendo talleres y clases que fortalecen habilidades, talentos y capacidades en niños, niñas, adolescentes y jóvenes.')) ?></li>
                        <li><i class="fas fa-map-marker-alt"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_donde_li2_title', 'Región Pacífica (Chocó):')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_donde_li2_desc', 'Apoyamos a niños, niñas y familias vulnerables mediante apadrinamiento, ayuda educativa y acompañamiento integral, brindando apoyo para su educación y bienestar con la colaboración de padrinos y voluntarios.')) ?></li>
                    </ul>
                </div>
                <div class="split-image organic-img">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'prog_donde_img', 'FOTOS BANNERS/foto principal niños original tamaño mejorada luz.png')) ?>" loading="lazy" decoding="async" alt="Sede y regiones">
                </div>
            </div>
        </div>
    </section>

    <!-- Qué Hacemos -->
    <section id="que-hacemos" class="section bg-light">
        <div class="container">
            <div class="split-layout reverse">
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'prog_que_title', '¿Qué Hacemos?')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'prog_que_p1', 'En la Fundación ADN de Amor, acompañamos y apoyamos el desarrollo integral de niños, niñas, adolescentes, jóvenes y madres cabeza de familia en situación de vulnerabilidad, promoviendo bienestar, esperanza y oportunidades para fortalecer sus proyectos de vida.')) ?></p>
                    <h3 style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 1rem; color: var(--secondary);"><?= htmlspecialchars(get_site_content($pdo, 'prog_que_h3', 'Principales acciones:')) ?></h3>
                    <ul class="feature-list">
                        <li><i class="fas fa-star"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_que_li1_title', 'Centro de Desarrollo de Talentos:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_que_li1_desc', 'Potenciamos habilidades artísticas, deportivas y vocacionales, acompañando el crecimiento personal, espiritual y el propósito de vida.')) ?></li>
                        <li><i class="fas fa-heart"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_que_li2_title', 'Acompañamiento psicosocial:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_que_li2_desc', 'Apoyo emocional y social para superar vulnerabilidad o experiencias de violencia.')) ?></li>
                        <li><i class="fas fa-box-open"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_que_li3_title', 'Ayuda humanitaria:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_que_li3_desc', 'Entrega de alimentos, ropa, medicinas y recursos esenciales.')) ?></li>
                        <li><i class="fas fa-users"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_que_li4_title', 'Integración comunitaria:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_que_li4_desc', 'Talleres y actividades que fomentan inclusión y participación positiva.')) ?></li>
                        <li><i class="fas fa-hands-helping"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_que_li5_title', 'Redes de cooperación:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_que_li5_desc', 'Colaboración con aliados, voluntarios y organizaciones para ampliar el alcance y las oportunidades.')) ?></li>
                    </ul>
                    <p style="margin-top: 1.5rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_que_p2', 'Cada acción se guía por principios cristianos de amor, fe, esperanza y servicio, buscando sembrar valores, brindar oportunidades y fortalecer comunidades humanas y solidarias.')) ?></p>
                </div>
                <div class="split-image organic-img-2">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'prog_que_img', 'FOTOS BANNERS/CDT_talentos_completo_ninos.png')) ?>" loading="lazy" decoding="async" alt="Labor de la Fundación">
                </div>
            </div>
        </div>
    </section>

    <!-- Centro de Desarrollo de Talentos (CDT) -->
    <section id="cdt" class="section">
        <div class="container">
            <div class="section-header text-center">
                <h2><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_title', 'Centro de Desarrollo de Talentos')) ?></h2>
                <p style="text-align: left; margin-bottom: 1rem; color: var(--text-dark);"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_p1', 'El Centro de Desarrollo de Talentos es nuestro programa integral diseñado para acompañar a niños, niñas, adolescentes y jóvenes en su crecimiento personal, emocional, artístico, deportivo y vocacional. Buscamos crear entornos protectores que fortalezcan sus capacidades, bienestar y proyectos de vida, brindando oportunidades de desarrollo real y aprendizaje, siempre desde principios cristianos de amor, fe, esperanza y servicio.')) ?></p>
                <p style="text-align: left; margin-bottom: 2rem; color: var(--text-dark);"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_p2', 'Actualmente trabajamos con participantes de 6 a 16 años, brindando atención personalizada y acompañamiento continuo para que cada niño y joven pueda descubrir sus talentos y potenciar sus habilidades.')) ?></p>
            </div>

            <h3 style="font-size: 2rem; color: var(--secondary); margin-bottom: 2rem; text-align: center;"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_h3', 'Lo que hacemos')) ?></h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                <div class="organic-card" style="background: var(--white); border-top: 4px solid var(--primary);">
                    <i class="fas fa-search" style="font-size: 2rem; color: var(--primary); margin-bottom: 1rem;"></i>
                    <h4><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card1_title', 'Perfilado de talentos')) ?></h4>
                    <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card1_desc', 'Identificamos habilidades e intereses en artes, deportes, oficios e idiomas, creando rutas personalizadas de desarrollo.')) ?></p>
                </div>
                <div class="organic-card" style="background: var(--white); border-top: 4px solid var(--secondary);">
                    <i class="fas fa-heart" style="font-size: 2rem; color: var(--secondary); margin-bottom: 1rem;"></i>
                    <h4><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card2_title', 'Bienestar emocional y espiritual')) ?></h4>
                    <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card2_desc', 'Brindamos acompañamiento emocional y espiritual, fomentando autoestima, resiliencia y propósito de vida.')) ?></p>
                </div>
                <div class="organic-card" style="background: var(--white); border-top: 4px solid var(--primary);">
                    <i class="fas fa-compass" style="font-size: 2rem; color: var(--primary); margin-bottom: 1rem;"></i>
                    <h4><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card3_title', 'Proyectos de vida')) ?></h4>
                    <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card3_desc', 'Orientamos a los jóvenes en la planificación de metas personales, académicas y laborales, liderazgo y emprendimiento.')) ?></p>
                </div>
                <div class="organic-card" style="background: var(--white); border-top: 4px solid var(--secondary);">
                    <i class="fas fa-futbol" style="font-size: 2rem; color: var(--secondary); margin-bottom: 1rem;"></i>
                    <h4><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card4_title', 'Deporte')) ?></h4>
                    <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card4_desc', 'Fomentamos disciplina, hábitos saludables y habilidades socioemocionales mediante fútbol, natación y otras actividades físicas.')) ?></p>
                </div>
                <div class="organic-card" style="background: var(--white); border-top: 4px solid var(--primary);">
                    <i class="fas fa-palette" style="font-size: 2rem; color: var(--primary); margin-bottom: 1rem;"></i>
                    <h4><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card5_title', 'Artes')) ?></h4>
                    <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card5_desc', 'Desarrollamos creatividad, sensibilidad estética y expresión emocional a través de pintura, música y danza.')) ?></p>
                </div>
                <div class="organic-card" style="background: var(--white); border-top: 4px solid var(--secondary);">
                    <i class="fas fa-tools" style="font-size: 2rem; color: var(--secondary); margin-bottom: 1rem;"></i>
                    <h4><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card6_title', 'Oficios')) ?></h4>
                    <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card6_desc', 'Impulsamos habilidades prácticas para la empleabilidad y generación de ingresos: fotografía, tecnología y cocina emprendedora.')) ?></p>
                </div>
                <div class="organic-card" style="background: var(--white); border-top: 4px solid var(--primary);">
                    <i class="fas fa-language" style="font-size: 2rem; color: var(--primary); margin-bottom: 1rem;"></i>
                    <h4><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card7_title', 'Idiomas')) ?></h4>
                    <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_card7_desc', 'Enseñamos inglés de manera práctica y comunicativa, ampliando oportunidades educativas y laborales.')) ?></p>
                </div>
            </div>

            <!-- Galería Carrusel de Clases y Actividades del CDT -->
            <style>
                .cdt-carousel-wrapper {
                    margin-top: 3.5rem;
                    position: relative;
                }
                .cdt-carousel-box {
                    position: relative;
                    padding: 0 52px;
                    max-width: 1100px;
                    margin: 0 auto;
                }
                .cdt-carousel-track {
                    display: flex;
                    gap: 1.5rem;
                    overflow-x: auto;
                    scroll-snap-type: x mandatory;
                    scrollbar-width: none;
                    -ms-overflow-style: none;
                    scroll-behavior: smooth;
                    padding: 12px 4px 20px 4px;
                }
                .cdt-carousel-track::-webkit-scrollbar {
                    display: none;
                }
                .cdt-slide {
                    flex: 0 0 100%;
                    scroll-snap-align: start;
                    box-sizing: border-box;
                }
                @media (min-width: 640px) {
                    .cdt-slide {
                        flex: 0 0 calc(50% - 0.75rem);
                    }
                }
                @media (min-width: 1024px) {
                    .cdt-slide {
                        flex: 0 0 calc(33.333% - 1rem);
                    }
                }
                .cdt-slide-card {
                    background: #ffffff;
                    border-radius: 16px;
                    overflow: hidden;
                    box-shadow: 0 6px 20px rgba(0, 16, 62, 0.07);
                    border: 1px solid rgba(0, 16, 62, 0.08);
                    transition: all 0.3s ease;
                    display: flex;
                    flex-direction: column;
                    height: 100%;
                }
                .cdt-slide-card:hover {
                    transform: translateY(-6px);
                    box-shadow: 0 14px 30px rgba(0, 16, 62, 0.14);
                    border-color: rgba(234, 90, 0, 0.3);
                }
                .cdt-slide-img-box {
                    position: relative;
                    overflow: hidden;
                    height: 230px;
                    background: #f1f5f9;
                }
                .cdt-slide-card img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                    transition: transform 0.5s ease;
                }
                .cdt-slide-card:hover img {
                    transform: scale(1.06);
                }
                .cdt-slide-caption {
                    padding: 1.4rem;
                    display: flex;
                    flex-direction: column;
                    flex-grow: 1;
                    background: #ffffff;
                }
                .cdt-slide-tag {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    background: rgba(234, 90, 0, 0.1);
                    color: var(--primary);
                    font-size: 0.75rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                    padding: 4px 12px;
                    border-radius: 20px;
                    margin-bottom: 0.7rem;
                    align-self: flex-start;
                }
                .cdt-slide-caption h4 {
                    font-size: 1.15rem;
                    color: var(--secondary);
                    margin-bottom: 0.5rem;
                    font-weight: 700;
                    line-height: 1.35;
                }
                .cdt-slide-caption p {
                    font-size: 0.9rem;
                    color: #64748b;
                    line-height: 1.55;
                    margin: 0;
                }
                .cdt-nav-btn {
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    width: 44px;
                    height: 44px;
                    border-radius: 50%;
                    background: #ffffff;
                    color: var(--secondary);
                    border: 1px solid rgba(0, 16, 62, 0.12);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.15rem;
                    cursor: pointer;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
                    z-index: 10;
                    transition: all 0.25s ease;
                }
                .cdt-nav-btn:hover {
                    background: var(--primary);
                    color: #ffffff;
                    border-color: var(--primary);
                    transform: translateY(-50%) scale(1.1);
                    box-shadow: 0 6px 20px rgba(234, 90, 0, 0.4);
                }
                .cdt-prev { left: 0; }
                .cdt-next { right: 0; }
                .cdt-carousel-dots {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 8px;
                    margin-top: 1.2rem;
                }
                .cdt-dot {
                    width: 10px;
                    height: 10px;
                    border-radius: 50%;
                    background: rgba(0, 16, 62, 0.2);
                    cursor: pointer;
                    transition: all 0.3s ease;
                    border: none;
                    padding: 0;
                }
                .cdt-dot.active {
                    background: var(--primary);
                    width: 26px;
                    border-radius: 10px;
                }
                @media (max-width: 680px) {
                    .cdt-carousel-box { padding: 0; }
                    .cdt-nav-btn { display: none; }
                }
            </style>

            <div class="cdt-carousel-wrapper">
                <div class="cdt-carousel-box">
                    <!-- Botón Anterior -->
                    <button type="button" class="cdt-nav-btn cdt-prev" aria-label="Foto anterior del CDT" onclick="scrollCdtCarousel(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <!-- Contenedor del Carrusel -->
                    <div class="cdt-carousel-track" id="cdtCarouselTrack">
                        <!-- Slide 1: Inglés -->
                        <div class="cdt-slide">
                            <div class="cdt-slide-card">
                                <div class="cdt-slide-img-box">
                                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_img1', 'FOTOS BANNERS/CDT_ingles_clase_real.png')) ?>" loading="lazy" decoding="async" alt="Clases de Inglés">
                                </div>
                                <div class="cdt-slide-caption">
                                    <span class="cdt-slide-tag"><i class="fas fa-language"></i> Idiomas</span>
                                    <h4>Clases de Inglés y Liderazgo</h4>
                                    <p>Formación práctica y conversacional orientada a ampliar oportunidades educativas y laborales para los jóvenes.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Arte -->
                        <div class="cdt-slide">
                            <div class="cdt-slide-card">
                                <div class="cdt-slide-img-box">
                                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_img2', 'FOTOS BANNERS/CDT_arte_nina_pintura.png')) ?>" loading="lazy" decoding="async" alt="Clases de Arte y Pintura">
                                </div>
                                <div class="cdt-slide-caption">
                                    <span class="cdt-slide-tag"><i class="fas fa-palette"></i> Arte y Creatividad</span>
                                    <h4>Pintura, Manualidades y Expresión</h4>
                                    <p>Espacios donde niños y niñas exploran su sensibilidad artística, imaginación y alegría a través del color.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: Música -->
                        <div class="cdt-slide">
                            <div class="cdt-slide-card">
                                <div class="cdt-slide-img-box">
                                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_img3', 'FOTOS BANNERS/CDT_musica_nino_guitarra.png')) ?>" loading="lazy" decoding="async" alt="Clases de Música y Canto">
                                </div>
                                <div class="cdt-slide-caption">
                                    <span class="cdt-slide-tag"><i class="fas fa-music"></i> Música y Ritmo</span>
                                    <h4>Música, Canto e Instrumentación</h4>
                                    <p>Desarrollo de disciplina, oído musical y propósito personal mediante la interpretación instrumental y vocal.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4: Centro de Desarrollo de Talentos -->
                        <div class="cdt-slide">
                            <div class="cdt-slide-card">
                                <div class="cdt-slide-img-box">
                                    <img src="FOTOS BANNERS/CDT_talentos_completo_ninos.png" loading="lazy" decoding="async" alt="Formación Integral CDT">
                                </div>
                                <div class="cdt-slide-caption">
                                    <span class="cdt-slide-tag"><i class="fas fa-star"></i> Desarrollo Integral</span>
                                    <h4>Formación en Valores y Propósito</h4>
                                    <p>Acompañamiento integral que impulsa autoestima, resiliencia y proyectos de vida desde principios cristianos.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 5: Juventud y Liderazgo -->
                        <div class="cdt-slide">
                            <div class="cdt-slide-card">
                                <div class="cdt-slide-img-box">
                                    <img src="FOTOS BANNERS/foto leo chicos mejorada ia.png" loading="lazy" decoding="async" alt="Talleres Juveniles y Liderazgo">
                                </div>
                                <div class="cdt-slide-caption">
                                    <span class="cdt-slide-tag"><i class="fas fa-users"></i> Juventud y Convivencia</span>
                                    <h4>Talleres de Emprendimiento y Liderazgo</h4>
                                    <p>Fortaleciendo la colaboración, habilidades sociales y metas claras para adolescentes y jóvenes.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 6: Actividades en Finca Guacas -->
                        <div class="cdt-slide">
                            <div class="cdt-slide-card">
                                <div class="cdt-slide-img-box">
                                    <img src="FOTOS BANNERS/foto sandra guamos banner final mejor.png" loading="lazy" decoding="async" alt="Actividades al aire libre">
                                </div>
                                <div class="cdt-slide-caption">
                                    <span class="cdt-slide-tag"><i class="fas fa-heart"></i> Aprendizaje Experiencial</span>
                                    <h4>Actividades al Aire Libre en Guacas</h4>
                                    <p>Entornos naturales protectores en Santa Rosa de Cabal donde se aprende viviendo experiencias significativas.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón Siguiente -->
                    <button type="button" class="cdt-nav-btn cdt-next" aria-label="Foto siguiente del CDT" onclick="scrollCdtCarousel(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Paginador de puntos (Dots) -->
                <div class="cdt-carousel-dots" id="cdtCarouselDots"></div>
            </div>

            <div class="split-layout" style="margin-top: 4rem; background: rgba(234, 90, 0, 0.05); padding: 2rem; border-radius: 20px;">
                <div class="split-content" style="width: 100%;">
                    <h3><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_bottom_title', 'Oportunidades de participación')) ?></h3>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_bottom_p1', 'Existen espacios para que voluntarios se unan como monitores, tutores o acompañantes de cada programa, así como la posibilidad de apadrinar a un niño o joven, apoyando su proceso de desarrollo y fortalecimiento de talentos. Más detalles sobre cómo participar se encuentran en la sección "Cómo sumarte" de nuestra web.')) ?></p>
                    <p style="margin-top: 1rem;"><strong><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_bottom_p2', 'El Centro de Desarrollo de Talentos es un espacio donde cada participante puede descubrir sus capacidades, fortalecer su propósito y construir un futuro con esperanza, mientras crece en valores, fe y habilidades para la vida.')) ?></strong></p>
                    <div style="margin-top: 1.5rem;">
                        <a href="<?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_btn_url', 'apadrinar')) ?>" class="btn btn-primary"><?= htmlspecialchars(get_site_content($pdo, 'prog_cdt_btn_text', 'Apadrina un niño del CDT')) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programa Esperanza -->
    <section id="esperanza" class="section">
        <div class="container">
            <div class="split-layout reverse">
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'prog_esp_title', 'Programa Esperanza')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'prog_esp_p1', 'Este programa brinda apoyo integral a familias vulnerables y madres cabeza de familia, ofreciendo asistencia esencial para mejorar su calidad de vida y bienestar general.')) ?></p>
                    <ul class="feature-list" style="margin-top: 1.5rem;">
                        <li><i class="fas fa-utensils"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li1_title', 'Alimentación:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li1_desc', 'Apoyo con comidas y orientación nutricional.')) ?></li>
                        <li><i class="fas fa-tshirt"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li2_title', 'Vestimenta:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li2_desc', 'Entrega de ropa y calzado según necesidades.')) ?></li>
                        <li><i class="fas fa-heartbeat"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li3_title', 'Salud:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li3_desc', 'Facilitamos acceso a atención médica y orientación sanitaria.')) ?></li>
                        <li><i class="fas fa-book"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li4_title', 'Educación:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li4_desc', 'Apoyo escolar con materiales y acompañamiento.')) ?></li>
                        <li><i class="fas fa-home"></i> <strong><?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li5_title', 'Bienestar familiar:')) ?></strong> <?= htmlspecialchars(get_site_content($pdo, 'prog_esp_li5_desc', 'Fortalecimiento de la estabilidad familiar y celebraciones (como navidades).')) ?></li>
                    </ul>
                    <div style="margin-top: 2rem;">
                        <a href="<?= htmlspecialchars(get_site_content($pdo, 'prog_esp_btn_url', '/#donar')) ?>" class="btn btn-primary"><?= htmlspecialchars(get_site_content($pdo, 'prog_esp_btn_text', 'Dona al Programa Esperanza')) ?></a>
                    </div>
                </div>
                <div class="split-image">
                    <div class="organic-img-2">
                        <img src="<?= htmlspecialchars(get_site_content($pdo, 'prog_esp_img', 'FOTOS BANNERS/FOTO BANNER NAVIDADES SELECCION.png')) ?>" loading="lazy" decoding="async" alt="Programa Esperanza y Navidades">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Misión Chocó -->
    <section id="choco" class="section bg-light" style="background-color: var(--secondary); color: var(--white);">
        <div class="container">
            <div class="split-layout">
                <div class="split-content">
                    <h2 style="color: var(--white);"><?= htmlspecialchars(get_site_content($pdo, 'prog_choco_title', 'Misión Chocó')) ?></h2>
                    <p style="color: rgba(255,255,255,0.9);"><?= htmlspecialchars(get_site_content($pdo, 'prog_choco_p1', 'En la región del Chocó, estamos enfocados en desarrollar proyectos de ayuda humanitaria en Gingarabá y sus alrededores. Nuestro objetivo es apoyar a las comunidades más vulnerables.')) ?></p>
                    <p style="color: rgba(255,255,255,0.9); margin-top: 1rem;"><?= htmlspecialchars(get_site_content($pdo, 'prog_choco_p2', 'Actualmente buscamos apadrinamiento para tres niñas en situación de vulnerabilidad especial, y trabajamos en colaboración con aliados para llevar a cabo:')) ?></p>
                    <ul class="feature-list" style="margin-top: 1.5rem;">
                        <li style="color: var(--white);"><i class="fas fa-medkit" style="color: var(--white);"></i> <?= htmlspecialchars(get_site_content($pdo, 'prog_choco_li1', 'Brigadas de salud integrales.')) ?></li>
                        <li style="color: var(--white);"><i class="fas fa-hammer" style="color: var(--white);"></i> <?= htmlspecialchars(get_site_content($pdo, 'prog_choco_li2', 'Construcción y rehabilitación de viviendas.')) ?></li>
                        <li style="color: var(--white);"><i class="fas fa-hands-helping" style="color: var(--white);"></i> <?= htmlspecialchars(get_site_content($pdo, 'prog_choco_li3', 'Entrega de ayuda humanitaria constante.')) ?></li>
                    </ul>
                    <div style="margin-top: 2rem;">
                        <a href="<?= htmlspecialchars(get_site_content($pdo, 'prog_choco_btn_url', 'apadrinar')) ?>" class="btn btn-primary"
                            style="background: var(--white); color: var(--primary);"><?= htmlspecialchars(get_site_content($pdo, 'prog_choco_btn_text', 'Apadrina a una niña del Chocó')) ?></a>
                    </div>
                </div>
                <div class="split-image">
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <img src="<?= htmlspecialchars(get_site_content($pdo, 'prog_choco_img', 'FOTOS BANNERS/mision_choco_ninos_limpio.png')) ?>" loading="lazy" decoding="async" alt="Misión Chocó"
                            style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Eventos: Charlas con Propósito de los Jueves -->
    <section id="eventos" class="section" style="background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);">
        <style>
            /* Estilos Sección Eventos / Charlas de los Jueves */
            .event-program-features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 1.25rem;
                margin-bottom: 3.5rem;
            }
            .event-feature-box {
                background: #ffffff;
                border: 1px solid rgba(0, 16, 62, 0.08);
                border-radius: 16px;
                padding: 1.25rem 1.5rem;
                display: flex;
                align-items: center;
                gap: 1rem;
                box-shadow: 0 4px 20px rgba(0, 16, 62, 0.04);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .event-feature-box:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(0, 16, 62, 0.08);
                border-color: rgba(234, 90, 0, 0.25);
            }
            .event-feature-icon {
                width: 50px;
                height: 50px;
                border-radius: 14px;
                background: rgba(234, 90, 0, 0.1);
                color: var(--primary);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.35rem;
                flex-shrink: 0;
            }
            .event-feature-text strong {
                display: block;
                font-size: 0.88rem;
                color: var(--secondary);
                font-family: var(--font-heading);
                margin-bottom: 2px;
            }
            .event-feature-text span {
                font-size: 0.92rem;
                color: #64748b;
                font-weight: 500;
            }
            
            .events-grid-public {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
                gap: 2rem;
                margin-bottom: 3.5rem;
            }
            .event-public-card {
                background: #ffffff;
                border-radius: 20px;
                overflow: hidden;
                border: 1px solid rgba(0, 16, 62, 0.08);
                box-shadow: 0 6px 25px rgba(0, 16, 62, 0.06);
                display: flex;
                flex-direction: column;
                transition: all 0.35s ease;
            }
            .event-public-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 16px 35px rgba(0, 16, 62, 0.12);
                border-color: rgba(234, 90, 0, 0.35);
            }
            .event-public-img-wrap {
                position: relative;
                height: 220px;
                background: #f1f5f9;
                overflow: hidden;
            }
            .event-public-img-wrap img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: block;
                transition: transform 0.5s ease;
            }
            .event-public-card:hover .event-public-img-wrap img {
                transform: scale(1.06);
            }
            .event-public-calendar-badge {
                position: absolute;
                top: 14px;
                left: 14px;
                background: #ffffff;
                color: var(--secondary);
                border-radius: 12px;
                padding: 8px 12px;
                text-align: center;
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
                font-family: var(--font-heading);
                line-height: 1.1;
                min-width: 58px;
                z-index: 2;
            }
            .event-public-calendar-badge .cal-day {
                display: block;
                font-size: 1.5rem;
                font-weight: 800;
                color: var(--primary);
            }
            .event-public-calendar-badge .cal-month {
                display: block;
                font-size: 0.75rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .event-public-featured-badge {
                position: absolute;
                top: 14px;
                right: 14px;
                background: linear-gradient(135deg, #ea5a00 0%, #ff7b29 100%);
                color: #ffffff;
                padding: 6px 14px;
                border-radius: 20px;
                font-size: 0.78rem;
                font-weight: 700;
                letter-spacing: 0.5px;
                box-shadow: 0 4px 12px rgba(234, 90, 0, 0.35);
                display: flex;
                align-items: center;
                gap: 5px;
                z-index: 2;
            }
            .event-public-content {
                padding: 1.75rem;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }
            .event-public-tags {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
                margin-bottom: 0.9rem;
            }
            .tag-pill {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                background: #f1f5f9;
                color: #475569;
                font-size: 0.78rem;
                font-weight: 600;
                padding: 4px 10px;
                border-radius: 6px;
            }
            .tag-pill i {
                color: var(--primary);
            }
            .event-public-content h3 {
                font-size: 1.3rem;
                color: var(--secondary);
                margin-bottom: 0.5rem;
                line-height: 1.35;
                font-weight: 700;
            }
            .event-public-sub {
                font-size: 0.92rem;
                color: var(--primary);
                font-weight: 600;
                margin-bottom: 0.85rem;
                line-height: 1.45;
            }
            .event-public-desc {
                font-size: 0.92rem;
                color: #64748b;
                line-height: 1.6;
                margin-bottom: 1.25rem;
            }
            .event-public-meta {
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 0.9rem 1rem;
                margin-top: auto;
                margin-bottom: 1.25rem;
                display: flex;
                flex-direction: column;
                gap: 8px;
            }
            .meta-item {
                display: flex;
                align-items: flex-start;
                gap: 9px;
                font-size: 0.85rem;
                color: var(--text-dark);
                line-height: 1.4;
            }
            .meta-item i {
                color: var(--primary);
                font-size: 0.95rem;
                margin-top: 2px;
                width: 16px;
                text-align: center;
            }
            .event-public-action {
                margin-top: 0.25rem;
            }
            .event-btn-wpp {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 0.85rem 1.25rem;
                font-weight: 700;
                border-radius: 10px;
                text-decoration: none;
                box-shadow: 0 4px 15px rgba(234, 90, 0, 0.25);
            }
            .event-btn-wpp:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(234, 90, 0, 0.35);
            }
            
            .event-callout-box {
                background: rgba(0, 16, 62, 0.03);
                border: 2px dashed rgba(0, 16, 62, 0.12);
                border-radius: 20px;
                padding: 2rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 1.5rem;
                flex-wrap: wrap;
            }
            .event-callout-content {
                display: flex;
                align-items: center;
                gap: 1.5rem;
                max-width: 780px;
            }
            .event-callout-icon {
                width: 56px;
                height: 56px;
                border-radius: 50%;
                background: var(--primary);
                color: #ffffff;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.6rem;
                flex-shrink: 0;
            }
            .event-callout-content h3 {
                font-size: 1.25rem;
                color: var(--secondary);
                margin-bottom: 0.35rem;
            }
            .event-callout-content p {
                font-size: 0.95rem;
                color: #64748b;
                margin: 0;
                line-height: 1.5;
            }
            @media (max-width: 768px) {
                .event-callout-box {
                    flex-direction: column;
                    align-items: flex-start;
                }
                .event-callout-btn {
                    width: 100%;
                }
                .event-callout-btn a {
                    width: 100%;
                    text-align: center;
                    justify-content: center;
                }
            }
        </style>

        <div class="container">
            <div class="section-header text-center" style="max-width: 820px; margin: 0 auto 3rem auto;">
                <span style="display: inline-flex; align-items: center; gap: 8px; background: rgba(234, 90, 0, 0.1); color: var(--primary); font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; padding: 6px 18px; border-radius: 30px; margin-bottom: 1rem;">
                    <i class="fas fa-calendar-star"></i> Todos los Jueves • Espacio Comunitario
                </span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1rem; color: var(--secondary);">
                    <?= htmlspecialchars(get_site_content($pdo, 'prog_eventos_title', 'Eventos: Charlas con Propósito de los Jueves')) ?>
                </h2>
                <p style="font-size: 1.1rem; color: var(--text-dark); line-height: 1.65;">
                    <?= htmlspecialchars(get_site_content($pdo, 'prog_eventos_desc', 'Un espacio semanal abierto para el crecimiento personal, la salud emocional, el fortalecimiento de la familia y los valores. Todos los jueves abrimos nuestras puertas y canales virtuales para compartir temas y herramientas prácticas que inspiran a superar la adversidad y caminar con dirección y esperanza.')) ?>
                </p>
            </div>

            <!-- Píldoras informativas del programa -->
            <div class="event-program-features">
                <div class="event-feature-box">
                    <div class="event-feature-icon"><i class="fas fa-calendar-alt"></i></div>
                    <div class="event-feature-text">
                        <strong>¿Cuándo?</strong>
                        <span>Todos los Jueves • 6:30 PM</span>
                    </div>
                </div>
                <div class="event-feature-box">
                    <div class="event-feature-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="event-feature-text">
                        <strong>¿Dónde?</strong>
                        <span>Finca Guacas & En Vivo Virtual</span>
                    </div>
                </div>
                <div class="event-feature-box">
                    <div class="event-feature-icon"><i class="fas fa-users"></i></div>
                    <div class="event-feature-text">
                        <strong>¿Para quién?</strong>
                        <span>Familias, jóvenes y comunidad</span>
                    </div>
                </div>
                <div class="event-feature-box">
                    <div class="event-feature-icon"><i class="fas fa-ticket-alt"></i></div>
                    <div class="event-feature-text">
                        <strong>Inversión</strong>
                        <span>Entrada 100% Libre y Gratuita</span>
                    </div>
                </div>
            </div>

            <!-- Listado de Charlas -->
            <div class="events-grid-public">
                <?php if (!empty($eventos_list)): ?>
                    <?php 
                    $mesesEs = ['01'=>'ENE','02'=>'FEB','03'=>'MAR','04'=>'ABR','05'=>'MAY','06'=>'JUN','07'=>'JUL','08'=>'AGO','09'=>'SEP','10'=>'OCT','11'=>'NOV','12'=>'DIC'];
                    $diasEs = ['Sunday'=>'Domingo','Monday'=>'Lunes','Tuesday'=>'Martes','Wednesday'=>'Miércoles','Thursday'=>'Jueves','Friday'=>'Viernes','Saturday'=>'Sábado'];
                    
                    foreach ($eventos_list as $ev): 
                        $time = strtotime($ev['fecha']);
                        $numDia = date('d', $time);
                        $numMes = date('m', $time);
                        $nomMes = $mesesEs[$numMes] ?? 'MES';
                        $nomDia = !empty($ev['dia_semana']) ? $ev['dia_semana'] : ($diasEs[date('l', $time)] ?? 'Jueves');
                        
                        $img = !empty($ev['imagen']) ? $ev['imagen'] : 'FOTOS BANNERS/MAMA CON ANGELICA  DEFINITIVA BANNER.webp';
                        
                        $wppMsg = "¡Hola Fundación ADN de Amor! Deseo inscribirme a la Charla con Propósito del jueves: \"" . $ev['titulo'] . "\" (Fecha: " . date('d/m/Y', $time) . "). ¿Cómo puedo participar?";
                        $wppLink = "https://wa.me/573162522445?text=" . urlencode($wppMsg);
                    ?>
                        <article class="event-public-card">
                            <div class="event-public-img-wrap">
                                <img src="<?= htmlspecialchars($img) ?>" loading="lazy" decoding="async" alt="<?= htmlspecialchars($ev['titulo']) ?>">
                                <div class="event-public-calendar-badge">
                                    <span class="cal-day"><?= $numDia ?></span>
                                    <span class="cal-month"><?= $nomMes ?></span>
                                </div>
                                <?php if ($ev['destacado']): ?>
                                    <span class="event-public-featured-badge"><i class="fas fa-star"></i> Próxima Charla</span>
                                <?php endif; ?>
                            </div>
                            <div class="event-public-content">
                                <div class="event-public-tags">
                                    <span class="tag-pill"><i class="far fa-clock"></i> <?= htmlspecialchars($ev['hora'] ?? '6:30 PM') ?></span>
                                    <span class="tag-pill"><i class="fas fa-video"></i> <?= htmlspecialchars($ev['modalidad'] ?? 'Híbrida') ?></span>
                                    <span class="tag-pill"><i class="fas fa-calendar-day"></i> <?= htmlspecialchars($nomDia) ?></span>
                                </div>
                                
                                <h3><?= htmlspecialchars($ev['titulo']) ?></h3>
                                <?php if (!empty($ev['subtitulo'])): ?>
                                    <p class="event-public-sub"><?= htmlspecialchars($ev['subtitulo']) ?></p>
                                <?php endif; ?>
                                
                                <p class="event-public-desc"><?= htmlspecialchars($ev['descripcion']) ?></p>
                                
                                <div class="event-public-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-user-tie"></i>
                                        <span><strong>Facilitador:</strong> <?= htmlspecialchars($ev['expositor'] ?? 'Equipo ADN de Amor & Invitados') ?></span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?= htmlspecialchars($ev['lugar'] ?? 'Sede Finca Guacas (Santa Rosa de Cabal) / En Vivo') ?></span>
                                    </div>
                                </div>
                                
                                <div class="event-public-action">
                                    <a href="<?= $wppLink ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary event-btn-wpp">
                                        <i class="fab fa-whatsapp"></i> Reservar mi Cupo por WhatsApp
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Banner para proponer temas o participar como facilitador -->
            <div class="event-callout-box">
                <div class="event-callout-content">
                    <div class="event-callout-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div>
                        <h3 style="font-size: 1.25rem; color: var(--secondary); margin-bottom: 0.35rem;">¿Deseas proponer una temática o compartir como expositor?</h3>
                        <p style="font-size: 0.95rem; color: #64748b; margin: 0; line-height: 1.5;">Si eres profesional en salud mental, liderazgo, arte o educación y deseas compartir tu vocación en los Jueves de Propósito, ¡eres bienvenido a sumarte!</p>
                    </div>
                </div>
                <div class="event-callout-btn">
                    <a href="https://wa.me/573162522445?text=<?= urlencode('¡Hola Fundación ADN de Amor! Me gustaría proponer un tema o participar como expositor voluntario en las Charlas con Propósito de los Jueves.') ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="background: var(--secondary); color: #fff; white-space: nowrap;">
                        <i class="fab fa-whatsapp"></i> Contactar al Equipo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Línea de Ayuda ADN -->
    <section id="linea" class="section text-center">
        <div class="container" style="max-width: 800px;">
            <i class="fas fa-headset" style="font-size: 3rem; color: var(--primary); margin-bottom: 1.5rem;"></i>
            <h2>Línea de Ayuda ADN</h2>
            <p style="font-size: 1.1rem; margin-top: 1rem;">Un proyecto a mediano plazo en Santa Rosa de Cabal que
                ofrecerá un espacio de escucha y orientación espiritual comunitaria. Funcionará mediante una línea de
                WhatsApp atendida por nuestro equipo y voluntarios, disponible para brindar acompañamiento, guía y apoyo
                seguro a quienes más lo necesiten.</p>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
    <script>
        (function() {
            const track = document.getElementById('cdtCarouselTrack');
            const dotsContainer = document.getElementById('cdtCarouselDots');
            if (!track || !dotsContainer) return;

            const slides = track.querySelectorAll('.cdt-slide');
            let autoPlayInterval = null;

            // Generar los indicadores de puntos (dots)
            slides.forEach((_, idx) => {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'cdt-dot' + (idx === 0 ? ' active' : '');
                dot.setAttribute('aria-label', 'Ver diapositiva ' + (idx + 1));
                dot.addEventListener('click', () => {
                    goToSlide(idx);
                });
                dotsContainer.appendChild(dot);
            });

            const dots = dotsContainer.querySelectorAll('.cdt-dot');

            function getSlideWidth() {
                const slide = track.querySelector('.cdt-slide');
                if (!slide) return 320;
                const gap = parseInt(window.getComputedStyle(track).gap) || 24;
                return slide.offsetWidth + gap;
            }

            function updateActiveDot() {
                const slideWidth = getSlideWidth();
                const scrollPos = track.scrollLeft;
                const activeIndex = Math.min(Math.round(scrollPos / slideWidth), dots.length - 1);
                dots.forEach((dot, idx) => {
                    dot.classList.toggle('active', idx === activeIndex);
                });
            }

            window.scrollCdtCarousel = function(direction) {
                const slideWidth = getSlideWidth();
                track.scrollBy({ left: direction * slideWidth, behavior: 'smooth' });
            };

            function goToSlide(index) {
                const slideWidth = getSlideWidth();
                track.scrollTo({ left: index * slideWidth, behavior: 'smooth' });
            }

            track.addEventListener('scroll', () => {
                requestAnimationFrame(updateActiveDot);
            }, { passive: true });

            function startAutoplay() {
                stopAutoplay();
                autoPlayInterval = setInterval(() => {
                    const slideWidth = getSlideWidth();
                    const maxScroll = track.scrollWidth - track.clientWidth;
                    if (track.scrollLeft >= maxScroll - 15) {
                        track.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        track.scrollBy({ left: slideWidth, behavior: 'smooth' });
                    }
                }, 4500);
            }

            function stopAutoplay() {
                if (autoPlayInterval) {
                    clearInterval(autoPlayInterval);
                    autoPlayInterval = null;
                }
            }

            const box = track.closest('.cdt-carousel-box') || track;
            box.addEventListener('mouseenter', stopAutoplay);
            box.addEventListener('mouseleave', startAutoplay);
            track.addEventListener('touchstart', stopAutoplay, { passive: true });
            track.addEventListener('touchend', startAutoplay, { passive: true });

            startAutoplay();
        })();
    </script>
</body>

</html>