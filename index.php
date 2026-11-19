<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundación ADN de Amor | Oportunidades y Esperanza</title>
    <meta name="description"
        content="Apadrina, dona y colabora con la Fundación ADN de Amor para generar oportunidades, esperanza y bienestar para niños, niñas y adolescentes en situación de vulnerabilidad.">
    <link rel="canonical" href="https://fundacionadndeamor.org/">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fundacionadndeamor.org/">
    <meta property="og:title" content="Fundación ADN de Amor | Oportunidades y Esperanza">
    <meta property="og:description"
        content="Apadrina, dona y colabora con la Fundación ADN de Amor para generar oportunidades, esperanza y bienestar para niños, niñas y adolescentes.">
    <meta property="og:image"
        content="https://fundacionadndeamor.org/FOTOS%20BANNERS/foto%20principal%20ni%C3%B1os%20banner%20final.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fundacionadndeamor.org/">
    <meta property="twitter:title" content="Fundación ADN de Amor | Oportunidades y Esperanza">
    <meta property="twitter:description"
        content="Apadrina, dona y colabora con la Fundación ADN de Amor para generar oportunidades, esperanza y bienestar para niños, niñas y adolescentes.">
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
                        <a href="#donar">Dona por una Causa</a>
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

                <a href="#contacto" class="btn btn-primary">Contacto</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="carousel">
            <div class="slide active"
                style="background-image: url('<?= htmlspecialchars(get_site_content($pdo, 'hero_slide1_img', 'FOTOS BANNERS/foto principal niños banner final.png')) ?>');">
                <div class="hero-overlay"></div>
                <div class="hero-content container">
                    <h1><?= htmlspecialchars(get_site_content($pdo, 'hero_slide1_title', 'Abre Caminos de Esperanza')) ?></h1>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'hero_slide1_desc', 'Cada apadrinamiento contribuye al desarrollo de un niño y su familia, generando oportunidades de crecimiento y bienestar.')) ?></p>
                    <div class="hero-buttons">
                        <a href="<?= htmlspecialchars(get_site_content($pdo, 'hero_slide1_btn1_url', 'apadrinar')) ?>" class="btn btn-primary btn-large"><?= htmlspecialchars(get_site_content($pdo, 'hero_slide1_btn1_text', 'Apadrina Hoy')) ?></a>
                        <a href="<?= htmlspecialchars(get_site_content($pdo, 'hero_slide1_btn2_url', '#donar')) ?>" class="btn btn-outline btn-large"><?= htmlspecialchars(get_site_content($pdo, 'hero_slide1_btn2_text', 'Dona por una Causa')) ?></a>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url('<?= htmlspecialchars(get_site_content($pdo, 'hero_slide2_img', 'FOTOS BANNERS/CDT_arte_nina_pintura.png')) ?>');">
                <div class="hero-overlay"></div>
                <div class="hero-content container">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'hero_slide2_title', 'Centro de Desarrollo de Talentos')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'hero_slide2_desc', 'Permite que asistan a clases de inglés, arte, música, danza y actividades de formación no formal.')) ?></p>
                    <div class="hero-buttons">
                        <a href="<?= htmlspecialchars(get_site_content($pdo, 'hero_slide2_btn1_url', 'programas#cdt')) ?>" class="btn btn-primary btn-large"><?= htmlspecialchars(get_site_content($pdo, 'hero_slide2_btn1_text', 'Apoya el CDT')) ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-controls">
            <button id="prev-slide"><i class="fas fa-chevron-left"></i></button>
            <button id="next-slide"><i class="fas fa-chevron-right"></i></button>
        </div>
    </section>

    <!-- Sobre Nosotros Preview -->
    <section class="section bg-light text-center" style="padding: 4rem 0;">
        <div class="container">
            <h2 style="margin-bottom: 1rem;"><?= htmlspecialchars(get_site_content($pdo, 'historia_title', 'Conoce Nuestra Historia')) ?></h2>
            <p class="max-w-800 mx-auto" style="margin-bottom: 2rem; font-size: 1.1rem;"><?= htmlspecialchars(get_site_content($pdo, 'historia_desc', 'Descubre el corazón de la Fundación ADN de Amor. Conoce cómo empezamos, nuestra misión y los valores que nos inspiran a transformar las vidas de miles de niños y familias.')) ?></p>
            <a href="<?= htmlspecialchars(get_site_content($pdo, 'historia_btn_url', 'nosotros')) ?>" class="btn btn-outline"
                style="border-color: var(--primary); color: var(--primary);"><?= htmlspecialchars(get_site_content($pdo, 'historia_btn_text', 'Leer la historia completa')) ?></a>
        </div>
    </section>

    <!-- Apadrinar Section -->
    <section id="apadrinar" class="section apadrinar-section">
        <div class="container">
            <div class="section-header text-center">
                <h2><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_main_title', '¡Una oportunidad que abre caminos y esperanza!')) ?></h2>
                <p><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_main_desc', 'Apadrinar significa ofrecer acompañamiento y apoyo a un niño, niña o adolescente, ayudándole a superar barreras y acceder a oportunidades educativas, formativas y de desarrollo integral.')) ?></p>
            </div>

            <div class="grid-3">
                <div class="image-card organic-card card-blue" style="padding: 0; overflow: hidden;">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card1_img', 'FOTOS BANNERS/foto prinicpal 2 niños banner final.png')) ?>" alt="A Largo Plazo"
                        loading="lazy" decoding="async" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1rem 3rem 3.5rem 3rem;">
                        <h3 style="margin-top: 1rem;"><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card1_title', 'A Largo Plazo')) ?></h3>
                        <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card1_desc', 'Crea un vínculo constante con el apadrinado y su familia, apoyando su desarrollo integral.')) ?></p>
                    </div>
                </div>
                <div class="image-card organic-card card-orange" style="padding: 0; overflow: hidden;">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card2_img', 'FOTOS BANNERS/CDT_musica_nino_guitarra.png')) ?>" alt="Desarrollo de Talentos"
                        loading="lazy" decoding="async" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1rem 3rem 3.5rem 3rem;">
                        <h3 style="margin-top: 1rem;"><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card2_title', 'Desarrollo de Talentos')) ?></h3>
                        <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card2_desc', 'Permite que asistan al CDT para clases de inglés, arte, música, danza y formación.')) ?></p>
                    </div>
                </div>
                <div class="image-card organic-card card-green" style="padding: 0; overflow: hidden;">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card3_img', 'FOTOS BANNERS/MAMA CON ANGELICA  DEFINITIVA BANNER.png')) ?>" alt="Construye un Vínculo"
                        loading="lazy" decoding="async" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1rem 3rem 3.5rem 3rem;">
                        <h3 style="margin-top: 1rem;"><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card3_title', 'Construye un Vínculo')) ?></h3>
                        <p style="font-size: 0.95rem;"><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_card3_desc', 'Sigue su proceso, recibe fotos y mantén contacto a través de cartas o mensajes.')) ?></p>
                    </div>
                </div>
            </div>

            <div class="text-center" style="margin-top: 4rem;">
                <a href="<?= htmlspecialchars(get_site_content($pdo, 'apadrinar_btn_url', 'apadrinar')) ?>" class="btn btn-primary btn-large"><?= htmlspecialchars(get_site_content($pdo, 'apadrinar_btn_text', 'Descubre cómo apadrinar y conocer a los niños')) ?></a>
            </div>
        </div>
    </section>

    <!-- Donar Section -->
    <section id="donar" class="section donar-section bg-light">
        <div class="container">
            <div class="split-layout" style="align-items: center;">
                <div class="split-image organic-img">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'donar_img', 'FOTOS BANNERS/FOTO BANNER NAVIDADES SELECCION.png')) ?>" alt="Dona por una causa" loading="lazy" decoding="async">
                </div>
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'donar_title', 'Dona por una Causa')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'donar_desc', 'Cada aporte que haces a la Fundación ADN de Amor contribuye a crear oportunidades, esperanza y bienestar en familias en situación de vulnerabilidad.')) ?></p>
                    
                    <div class="causes-list" style="margin: 1.5rem 0; display: flex; flex-direction: column; gap: 1rem;">
                        <div style="background: #ffffff; padding: 1rem 1.25rem; border-radius: 10px; border-left: 4px solid var(--primary); box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                            <h4 style="margin: 0 0 0.3rem 0; color: var(--secondary); font-size: 1.05rem;"><i class="fas fa-graduation-cap" style="color: var(--primary); margin-right: 8px;"></i> Centro de Desarrollo de Talentos (CDT)</h4>
                            <p style="margin: 0; font-size: 0.9rem; color: #64748b;">Clases gratuitas de inglés, artes plásticas, música, danza, deportes y formación para niños y jóvenes.</p>
                        </div>
                        <div style="background: #ffffff; padding: 1rem 1.25rem; border-radius: 10px; border-left: 4px solid #059669; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                            <h4 style="margin: 0 0 0.3rem 0; color: var(--secondary); font-size: 1.05rem;"><i class="fas fa-heart" style="color: #059669; margin-right: 8px;"></i> Programa Esperanza</h4>
                            <p style="margin: 0; font-size: 0.9rem; color: #64748b;">Kits escolares, paquetes alimentarios, calzado, ropa y apoyo psicosocial a familias vulnerables.</p>
                        </div>
                        <div style="background: #ffffff; padding: 1rem 1.25rem; border-radius: 10px; border-left: 4px solid #005085; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                            <h4 style="margin: 0 0 0.3rem 0; color: var(--secondary); font-size: 1.05rem;"><i class="fas fa-hands-helping" style="color: #005085; margin-right: 8px;"></i> Proyectos Comunitarios y Misión Chocó</h4>
                            <p style="margin: 0; font-size: 0.9rem; color: #64748b;">Brigadas integrales de salud, mejoramiento de vivienda rural e intervenciones humanitarias directas.</p>
                        </div>
                    </div>

                    <p><strong><?= htmlspecialchars(get_site_content($pdo, 'donar_footer_text', 'Tu aporte genera un efecto multiplicador. ¡Tú puedes marcar la diferencia!')) ?></strong></p>
                    
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 1.5rem;">
                        <a href="https://wa.me/573162522445?text=Hola%2C%20deseo%20hacer%20una%20donaci%C3%B3n%20para%20apoyar%20a%20la%20Fundaci%C3%B3n%20ADN%20de%20Amor" target="_blank" rel="noopener noreferrer" class="btn btn-large" style="background: linear-gradient(135deg, #E63946 0%, #00103E 100%); color: #ffffff; border: none; box-shadow: 0 4px 15px rgba(0, 16, 62, 0.25); display: inline-flex; align-items: center; gap: 8px;">
                            <i class="fab fa-whatsapp" style="font-size: 1.2rem;"></i> <span>Donar vía WhatsApp</span>
                        </a>
                        <a href="<?= htmlspecialchars(get_site_content($pdo, 'donar_btn_url', '#contacto')) ?>" class="btn btn-outline" style="border-color: var(--secondary); color: var(--secondary);">
                            <span><?= htmlspecialchars(get_site_content($pdo, 'donar_btn_text', 'Más Información')) ?></span>
                        </a>
                    </div>
                    <div style="margin-top: 1.25rem; font-size: 0.88rem; color: #64748b; background: rgba(0, 16, 62, 0.03); border: 1px dashed rgba(0, 16, 62, 0.15); border-radius: 8px; padding: 10px 14px;">
                        <i class="fas fa-university" style="color: var(--primary); margin-right: 6px;"></i> 
                        <strong>¿Prefieres transferencia bancaria o Nequi / Daviplata?</strong> Escríbenos a WhatsApp o a <a href="mailto:info@fundacionadndeamor.org" style="color: var(--primary); text-decoration: underline;">info@fundacionadndeamor.org</a> para coordinar tu aporte institucional y certificación de donación.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Empresas y Aliados -->
    <section id="empresas" class="section empresas-section">
        <div class="container">
            <div class="section-header text-center">
                <h2><?= htmlspecialchars(get_site_content($pdo, 'empresas_title', 'Empresas y Aliados Responsables')) ?></h2>
                <p><?= htmlspecialchars(get_site_content($pdo, 'empresas_desc', 'La colaboración con empresas es clave para generar un impacto positivo y sostenible en las comunidades.')) ?></p>
            </div>

            <div class="split-layout">
                <div class="split-content">
                    <div class="grid-2"
                        style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; text-align: left;">
                        <div class="stat-card" style="padding: 1.5rem;">
                            <i class="fas fa-handshake" style="font-size: 2rem;"></i>
                            <h4><?= htmlspecialchars(get_site_content($pdo, 'empresas_card1_title', 'Apoyo Financiero')) ?></h4>
                            <p style="font-size: 0.9rem;"><?= htmlspecialchars(get_site_content($pdo, 'empresas_card1_desc', 'Contribuye a talleres, brigadas y programas comunitarios.')) ?></p>
                        </div>
                        <div class="stat-card" style="padding: 1.5rem;">
                            <i class="fas fa-users" style="font-size: 2rem;"></i>
                            <h4><?= htmlspecialchars(get_site_content($pdo, 'empresas_card2_title', 'Voluntariado')) ?></h4>
                            <p style="font-size: 0.9rem;"><?= htmlspecialchars(get_site_content($pdo, 'empresas_card2_desc', 'Fomenta el compromiso social de tu equipo.')) ?></p>
                        </div>
                        <div class="stat-card" style="padding: 1.5rem;">
                            <i class="fas fa-box-open" style="font-size: 2rem;"></i>
                            <h4><?= htmlspecialchars(get_site_content($pdo, 'empresas_card3_title', 'Donación')) ?></h4>
                            <p style="font-size: 0.9rem;"><?= htmlspecialchars(get_site_content($pdo, 'empresas_card3_desc', 'Materiales, alimentos, ropa o tecnología.')) ?></p>
                        </div>
                        <div class="stat-card" style="padding: 1.5rem;">
                            <i class="fas fa-project-diagram" style="font-size: 2rem;"></i>
                            <h4><?= htmlspecialchars(get_site_content($pdo, 'empresas_card4_title', 'Alianzas')) ?></h4>
                            <p style="font-size: 0.9rem;"><?= htmlspecialchars(get_site_content($pdo, 'empresas_card4_desc', 'Desarrollo de proyectos conjuntos de gran impacto.')) ?></p>
                        </div>
                    </div>
                    <a href="<?= htmlspecialchars(get_site_content($pdo, 'empresas_btn_url', 'empresas')) ?>"
                        class="btn btn-primary btn-large mt-4"><?= htmlspecialchars(get_site_content($pdo, 'empresas_btn_text', 'Conviértete en Aliado')) ?></a>
                </div>
                <div class="split-image organic-img-2">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'empresas_img', 'FOTOS BANNERS/foto leo chicos mejorada ia.png')) ?>" alt="Niños felices" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </section>

    <!-- Voluntariado -->
    <section id="voluntariado" class="section voluntariado-section text-white"
        style="background-image: linear-gradient(rgba(0, 80, 133, 0.65), rgba(0, 80, 133, 0.65)), url('<?= htmlspecialchars(get_site_content($pdo, 'voluntariado_bg_img', 'FOTOS BANNERS/FOTO GRUPO JOVENES.png')) ?>'); background-size: cover; background-position: center;">
        <div class="container text-center">
            <h2><?= htmlspecialchars(get_site_content($pdo, 'voluntariado_title', 'Ser Voluntario')) ?></h2>
            <p class="max-w-800 mx-auto mb-4"><?= htmlspecialchars(get_site_content($pdo, 'voluntariado_desc1', 'Únete a nuestra misión de acompañar, apoyar y generar oportunidades para niños y familias vulnerables.')) ?></p>
            <p class="max-w-800 mx-auto mb-4"><?= htmlspecialchars(get_site_content($pdo, 'voluntariado_desc2', 'Ser voluntario en ADN de Amor es construir vínculos, vivir experiencias significativas y contribuir al desarrollo integral...')) ?></p>

            <div class="hero-buttons justify-center">
                <a href="<?= htmlspecialchars(get_site_content($pdo, 'voluntariado_btn1_url', 'voluntariado')) ?>" class="btn btn-primary btn-large"><?= htmlspecialchars(get_site_content($pdo, 'voluntariado_btn1_text', 'Únete como Voluntario')) ?></a>
                <a href="<?= htmlspecialchars(get_site_content($pdo, 'voluntariado_btn2_url', 'practicas')) ?>" class="btn btn-outline-white btn-large"><?= htmlspecialchars(get_site_content($pdo, 'voluntariado_btn2_text', 'Prácticas Profesionales')) ?></a>
            </div>
        </div>
    </section>

    <!-- Tienda Solidaria -->
    <section id="tienda" class="section tienda-section bg-light">
        <div class="container">
            <div class="split-layout reverse">
                <div class="split-image organic-img-2">
                    <img src="<?= htmlspecialchars(get_site_content($pdo, 'tienda_img', 'FOTOS BANNERS/tienda_solidaria.png')) ?>" alt="Productos de la Tienda Solidaria" loading="lazy" decoding="async">
                </div>
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'tienda_title', 'Tienda Solidaria')) ?></h2>
                    <p><strong><?= htmlspecialchars(get_site_content($pdo, 'tienda_subtitle', 'Tu apoyo genera oportunidades')) ?></strong></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'tienda_desc', 'En la Tienda Solidaria ADN de Amor encontrarás productos y servicios cuyo valor va más allá de lo material.')) ?></p>
                    <ul class="feature-list">
                        <li><i class="fas fa-shopping-bag"></i> <?= htmlspecialchars(get_site_content($pdo, 'tienda_li1', 'Productos con propósito.')) ?></li>
                        <li><i class="fas fa-laptop-code"></i> <?= htmlspecialchars(get_site_content($pdo, 'tienda_li2', 'Servicios educativos.')) ?></li>
                    </ul>
                    <a href="<?= htmlspecialchars(get_site_content($pdo, 'tienda_btn_url', 'tienda')) ?>" class="btn btn-primary mt-3"><?= htmlspecialchars(get_site_content($pdo, 'tienda_btn_text', 'Ver Tienda')) ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contacto" class="section contact-section">
        <div class="container">
            <div class="split-layout">
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'contacto_title', '¿Tienes preguntas o quieres unirte?')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'contacto_desc', 'Déjanos tus datos y nos pondremos en contacto contigo lo más pronto posible para contarte más sobre cómo puedes apoyar a la Fundación ADN de Amor.')) ?></p>
                    <ul class="feature-list">
                        <li><a href="mailto:info@fundacionadndeamor.org" style="color: inherit; text-decoration: none;"><i class="fas fa-envelope"></i> <?= htmlspecialchars(get_site_content($pdo, 'contacto_email', 'info@fundacionadndeamor.org')) ?></a></li>
                        <li><a href="tel:+573162522445" style="color: inherit; text-decoration: none;"><i class="fas fa-phone"></i> <?= htmlspecialchars(get_site_content($pdo, 'contacto_phone', '+57 316 252 2445')) ?></a></li>
                        <li><a href="https://maps.app.goo.gl/xvSyBJBfQMuL4wGF7" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: none;" title="Ver ubicación en Google Maps"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars(get_site_content($pdo, 'contacto_location', 'Santa Rosa de Cabal, Risaralda - Colombia')) ?></a></li>
                    </ul>
                </div>
                <div class="split-image" style="flex: 1.5;">
                    <form class="contact-form modern-card" id="form-contacto" action="send_form.php" method="POST">
                        <input type="hidden" name="form_type" value="contacto">
                        <!-- Honeypot anti-spam invisible para humanos -->
                        <div style="display:none !important; position:absolute; left:-9999px;">
                            <input type="text" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <h3>Envíanos un mensaje</h3>

                        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                            <div class="form-alert" style="display:block; margin-bottom: 1rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem; background: #e6f4ea; color: #137333; border: 1px solid #ceead6;">
                                <i class="fas fa-check-circle" style="margin-right: 8px;"></i> <?= htmlspecialchars($_GET['msg'] ?? '¡Mensaje enviado con éxito a nuestro equipo!') ?>
                            </div>
                        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                            <div class="form-alert" style="display:block; margin-bottom: 1rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem; background: #fce8e6; color: #c5221f; border: 1px solid #fad2cf;">
                                <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i> <?= htmlspecialchars($_GET['msg'] ?? 'Error al enviar el mensaje.') ?>
                            </div>
                        <?php else: ?>
                            <div class="form-alert" style="display:none; margin-bottom: 1rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem;"></div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label>Nombre Completo *</label>
                            <input type="text" name="name" placeholder="Ej. Juan Pérez" required autocomplete="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Correo Electrónico *</label>
                            <input type="email" name="email" placeholder="ejemplo@correo.com" required autocomplete="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Teléfono / WhatsApp (Opcional)</label>
                            <input type="tel" name="phone" placeholder="+57 316 252 2445" autocomplete="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tu Mensaje *</label>
                            <textarea name="message" placeholder="¿En qué te podemos ayudar?" required class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group" style="margin-top: 1rem; margin-bottom: 1.25rem;">
                            <label style="font-size: 0.85rem; color: #64748b; display: flex; align-items: flex-start; gap: 8px; cursor: pointer; line-height: 1.4;">
                                <input type="checkbox" name="habeas_data" value="1" required checked style="margin-top: 2px; accent-color: var(--primary);">
                                <span>Autorizo el tratamiento de mis datos personales conforme a la <a href="privacidad" target="_blank" style="color: var(--primary); text-decoration: underline;">Política de Privacidad</a> (Ley 1581 de 2012).</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-large btn-block">
                            <span>Enviar Mensaje</span> <i class="fas fa-paper-plane" style="margin-left: 8px;"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
</body>

</html>