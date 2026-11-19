<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apadrina un Niño | Fundación ADN de Amor</title>
    <meta name="description" content="Apadrina a un niño, niña o adolescente. Con tu apoyo, abres caminos de esperanza y bienestar.">
    <link rel="canonical" href="https://fundacionadndeamor.org/apadrinar">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fundacionadndeamor.org/apadrinar">
    <meta property="og:title" content="Apadrina un Niño | Fundación ADN de Amor">
    <meta property="og:description" content="Apadrina a un niño, niña o adolescente. Con tu apoyo, abres caminos de esperanza y bienestar.">
    <meta property="og:image" content="https://fundacionadndeamor.org/FOTOS%20BANNERS/foto%20principal%20ni%C3%B1os%20banner%20final.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fundacionadndeamor.org/apadrinar">
    <meta property="twitter:title" content="Apadrina un Niño | Fundación ADN de Amor">
    <meta property="twitter:description" content="Apadrina a un niño, niña o adolescente. Con tu apoyo, abres caminos de esperanza y bienestar.">
    <meta property="twitter:image" content="https://fundacionadndeamor.org/FOTOS%20BANNERS/foto%20principal%20ni%C3%B1os%20banner%20final.png">

        <!-- Preconnect fuentes y assets externos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="styles.css?v=<?= @filemtime(__DIR__ . '/styles.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&family=Inter:wght@400;500;600&family=Great+Vibes&display=swap" rel="stylesheet">
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
        .timeline {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            margin: 3rem 0;
            position: relative;
        }
        .timeline-step {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            background: var(--white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.05);
        }
        .timeline-number {
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            flex-shrink: 0;
        }
        @media (min-width: 768px) {
            .timeline {
                flex-direction: row;
            }
            .timeline-step {
                flex: 1;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader" class="preloader">
        <div class="loader-content">
            <img src="LOGO Y VISUAL WEB BOTONES/logo ADN_de_Amor_color_rectangulo.png" alt="Fundación ADN de Amor" class="loader-logo">
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
                <img src="LOGO Y VISUAL WEB BOTONES/logo ADN_de_Amor_color_rectangulo.png" alt="Fundación ADN de Amor Logo">
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
                
                <a href="#contacto-apadrinar" class="btn btn-primary">Contacto</a>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <h1><?= htmlspecialchars(get_site_content($pdo, 'apad_hero_title', 'Apadrina un Niño, Niña o Adolescente')) ?></h1>
            <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto;"><?= htmlspecialchars(get_site_content($pdo, 'apad_hero_desc', 'Miles de niños, niñas y adolescentes esperan por un padrino o madrina como tú. ¡Una oportunidad que abre caminos y esperanza!')) ?></p>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="section">
        <div class="container">
            <div class="split-layout">
                <div class="split-content">
                    <h2><?= htmlspecialchars(get_site_content($pdo, 'apad_intro_title', '¿Qué significa apadrinar?')) ?></h2>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'apad_intro_p1', 'Apadrinar significa ofrecer acompañamiento y apoyo a un niño, niña o adolescente, ayudándole a superar barreras y acceder a oportunidades educativas, formativas y de desarrollo integral.')) ?></p>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'apad_intro_p2', 'Cada apadrinamiento contribuye al desarrollo del niño y de su familia, apoyando programas educativos, talleres y actividades de formación, generando oportunidades de crecimiento y bienestar en toda la comunidad.')) ?></p>
                </div>
                <div class="split-image">
                    <div class="organic-img-2">
                        <img src="<?= htmlspecialchars(get_site_content($pdo, 'apad_intro_img', 'FOTOS BANNERS/MAMA CON ANGELICA  DEFINITIVA BANNER.png')) ?>" loading="lazy" decoding="async" alt="Niña sonriendo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modalidades Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-header text-center">
                <h2><?= htmlspecialchars(get_site_content($pdo, 'apad_mod_title', 'Modalidades de Apadrinamiento')) ?></h2>
                <p><?= htmlspecialchars(get_site_content($pdo, 'apad_mod_p1', 'Puedes elegir la forma en que deseas involucrarte y apoyar el desarrollo integral de los niños.')) ?></p>
            </div>
            <div class="grid-2" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <div class="organic-card" style="background: var(--white); border-top: 5px solid var(--primary);">
                    <i class="fas fa-heart" style="font-size: 2.5rem; color: var(--primary); margin-bottom: 1rem;"></i>
                    <h3><?= htmlspecialchars(get_site_content($pdo, 'apad_mod_card1_title', 'A Largo Plazo')) ?></h3>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'apad_mod_card1_desc', 'Crea un vínculo constante y duradero con el apadrinado y su familia, acompañándolos en su crecimiento y desarrollo personal a través de los años.')) ?></p>
                </div>
                <div class="organic-card" style="background: var(--white); border-top: 5px solid var(--secondary);">
                    <i class="fas fa-palette" style="font-size: 2.5rem; color: var(--secondary); margin-bottom: 1rem;"></i>
                    <h3><?= htmlspecialchars(get_site_content($pdo, 'apad_mod_card2_title', 'Centro de Desarrollo de Talentos (CDT)')) ?></h3>
                    <p><?= htmlspecialchars(get_site_content($pdo, 'apad_mod_card2_desc', 'Permite que tu apadrinado asista a clases de inglés, arte, música, danza y otras actividades de formación no formal, potenciando sus habilidades y propósito de vida.')) ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cómo funciona -->
    <section class="section">
        <div class="container">
            <div class="section-header text-center">
                <h2><?= htmlspecialchars(get_site_content($pdo, 'apad_como_title', '¿Cómo apadrinar?')) ?></h2>
                <p><?= htmlspecialchars(get_site_content($pdo, 'apad_como_p1', 'El proceso es sencillo y transparente. Sigue estos pasos para comenzar tu historia de apadrinamiento.')) ?></p>
            </div>
            
            <div class="timeline">
                <div class="timeline-step">
                    <div class="timeline-number">1</div>
                    <div>
                        <h3><?= htmlspecialchars(get_site_content($pdo, 'apad_como_step1_title', 'Elige a quién apoyar')) ?></h3>
                        <p><?= htmlspecialchars(get_site_content($pdo, 'apad_como_step1_desc', 'Llena el formulario al final de esta página. Nos pondremos en contacto contigo para que elijas al niño, niña o adolescente que deseas apoyar.')) ?></p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="timeline-number">2</div>
                    <div>
                        <h3><?= htmlspecialchars(get_site_content($pdo, 'apad_como_step2_title', 'Recibe la bienvenida')) ?></h3>
                        <p><?= htmlspecialchars(get_site_content($pdo, 'apad_como_step2_desc', 'Recibirás un correo de bienvenida con la foto y el perfil detallado del apadrinado y de su comunidad.')) ?></p>
                    </div>
                </div>
                <div class="timeline-step">
                    <div class="timeline-number">3</div>
                    <div>
                        <h3><?= htmlspecialchars(get_site_content($pdo, 'apad_como_step3_title', 'Construye un vínculo')) ?></h3>
                        <p><?= htmlspecialchars(get_site_content($pdo, 'apad_como_step3_desc', 'Podrás seguir su proceso, recibir actualizaciones y fotos, y mantener contacto a través de cartas o mensajes según el programa.')) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Beneficios / Vínculo -->
    <section class="section bg-light" style="background: var(--primary); color: var(--white);">
        <div class="container">
            <div class="split-layout reverse">
                <div class="split-content">
                    <h2 style="color: var(--white);"><?= htmlspecialchars(get_site_content($pdo, 'apad_ben_title', 'Construye un Vínculo Significativo')) ?></h2>
                    <p style="color: rgba(255,255,255,0.9);"><?= htmlspecialchars(get_site_content($pdo, 'apad_ben_p1', 'A medida que tu relación con tu ahijado crece, podrás:')) ?></p>
                    <ul class="feature-list" style="color: var(--white);">
                        <li style="color: var(--white);"><i class="fas fa-check-circle" style="color: var(--white);"></i> <?= htmlspecialchars(get_site_content($pdo, 'apad_ben_li1', 'Seguir el desarrollo del apadrinado y de su comunidad.')) ?></li>
                        <li style="color: var(--white);"><i class="fas fa-check-circle" style="color: var(--white);"></i> <?= htmlspecialchars(get_site_content($pdo, 'apad_ben_li2', 'Recibir fotos, videos y actualizaciones periódicas de sus actividades.')) ?></li>
                        <li style="color: var(--white);"><i class="fas fa-check-circle" style="color: var(--white);"></i> <?= htmlspecialchars(get_site_content($pdo, 'apad_ben_li3', 'Intercambiar cartas o mensajes directos con tu apadrinado.')) ?></li>
                        <li style="color: var(--white);"><i class="fas fa-check-circle" style="color: var(--white);"></i> <?= htmlspecialchars(get_site_content($pdo, 'apad_ben_li4', 'Participar en eventos y actividades especiales organizados por la fundación.')) ?></li>
                    </ul>
                </div>
                <div class="split-image">
                    <div class="organic-img">
                        <img src="<?= htmlspecialchars(get_site_content($pdo, 'apad_ben_img', 'FOTOS BANNERS/foto principal niños banner final.png')) ?>" loading="lazy" decoding="async" alt="Niños felices">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulario de Contacto Especializado -->
    <section id="contacto-apadrinar" class="section">
        <div class="container" style="max-width: 800px; margin: 0 auto;">
            <div class="section-header text-center">
                <h2>¿Quieres apadrinar y abrir caminos de esperanza?</h2>
                <p>Contáctanos para recibir información y descubrir como puedes crear un vínculo de apoyo y acompañamiento.</p>
            </div>
            
            <form class="contact-form modern-card" id="form-apadrinar" action="send_form.php" method="POST">
                <input type="hidden" name="form_type" value="apadrinar">
                <!-- Honeypot anti-spam invisible para humanos -->
                <div style="display:none !important; position:absolute; left:-9999px;">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                    <div class="form-alert" style="display:block; margin-bottom: 1.5rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem; background: #e6f4ea; color: #137333; border: 1px solid #ceead6;">
                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i> <?= htmlspecialchars($_GET['msg'] ?? '¡Solicitud enviada con éxito a nuestro equipo!') ?>
                    </div>
                <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                    <div class="form-alert" style="display:block; margin-bottom: 1.5rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem; background: #fce8e6; color: #c5221f; border: 1px solid #fad2cf;">
                        <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i> <?= htmlspecialchars($_GET['msg'] ?? 'Error al enviar la solicitud.') ?>
                    </div>
                <?php else: ?>
                    <div class="form-alert" style="display:none; margin-bottom: 1.5rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem;"></div>
                <?php endif; ?>

                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label>Nombre y Apellidos</label>
                        <input type="text" name="name" placeholder="Ej. Juan Pérez" required autocomplete="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="email" name="email" placeholder="ejemplo@correo.com" required autocomplete="email" class="form-control">
                    </div>
                </div>
                
                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label>Teléfono / WhatsApp</label>
                        <input type="tel" name="phone" placeholder="+57 316 252 2445" required autocomplete="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Localidad / País</label>
                        <input type="text" name="location" placeholder="Ej. Bogotá, Colombia" required autocomplete="address-level2" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>¿Cómo deseas apadrinar?</label>
                    <select name="modality" class="form-control" required style="cursor: pointer;">
                        <option value="">Selecciona una opción...</option>
                        <option value="Apadrinamiento a Largo Plazo">Apadrinamiento a Largo Plazo</option>
                        <option value="Para el Centro de Desarrollo de Talentos (CDT)">Para el Centro de Desarrollo de Talentos (CDT)</option>
                        <option value="Aún no estoy seguro, quiero asesoría">Aún no estoy seguro, quiero que me asesoren</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Mensaje Opcional (Cuéntanos un poco sobre ti y tu motivación para apadrinar)</label>
                    <textarea name="message" placeholder="Tu mensaje aquí..." class="form-control" rows="4"></textarea>
                </div>
                
                <div class="form-group" style="margin-top: 1rem; margin-bottom: 1.25rem;">
                    <label style="font-size: 0.85rem; color: #64748b; display: flex; align-items: flex-start; gap: 8px; cursor: pointer; line-height: 1.4;">
                        <input type="checkbox" name="habeas_data" value="1" required checked style="margin-top: 2px; accent-color: var(--primary);">
                        <span>Autorizo el tratamiento de mis datos personales conforme a la <a href="privacidad" target="_blank" style="color: var(--primary); text-decoration: underline;">Política de Privacidad</a> (Ley 1581 de 2012).</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-large btn-block" style="font-size: 1.1rem; padding: 1.2rem;">
                    <span>Enviar Solicitud de Apadrinamiento</span> <i class="fas fa-heart" style="margin-left: 8px;"></i>
                </button>
            </form>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
</body>
</html>
