<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ser Voluntario | Fundación ADN de Amor</title>
    <meta name="description" content="Únete como voluntario a la Fundación ADN de Amor. Aporta tu tiempo, talento y amor para acompañar a niños, jóvenes y familias en Colombia.">
    <link rel="canonical" href="https://fundacionadndeamor.org/voluntariado">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fundacionadndeamor.org/voluntariado">
    <meta property="og:title" content="Ser Voluntario | Fundación ADN de Amor">
    <meta property="og:description" content="Únete como voluntario a la Fundación ADN de Amor. Aporta tu tiempo, talento y amor para transformar vidas.">
    <meta property="og:image" content="https://fundacionadndeamor.org/FOTOS%20BANNERS/foto%20leo%20chicos%20mejorada%20ia.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fundacionadndeamor.org/voluntariado">
    <meta property="twitter:title" content="Ser Voluntario | Fundación ADN de Amor">
    <meta property="twitter:description" content="Únete como voluntario a la Fundación ADN de Amor. Aporta tu tiempo, talento y amor para transformar vidas.">
    <meta property="twitter:image" content="https://fundacionadndeamor.org/FOTOS%20BANNERS/foto%20leo%20chicos%20mejorada%20ia.png">

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
            padding: 4.5rem 1rem;
            text-align: center;
            background: linear-gradient(135deg, rgba(0, 16, 62, 0.92) 0%, rgba(234, 90, 0, 0.85) 100%), url('FOTOS BANNERS/foto leo chicos mejorada ia.png');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            position: relative;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at center, rgba(234, 90, 0, 0.22) 0%, transparent 70%);
            pointer-events: none;
        }
        .page-hero h1 {
            font-size: 3rem;
            color: #ffffff;
            margin-bottom: 1.2rem;
            font-weight: 800;
        }
        .page-hero p {
            font-size: 1.25rem;
            max-width: 850px;
            margin: 0 auto 2rem auto;
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.6;
        }
        .volunteer-focus-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.8rem;
            margin-top: 2.5rem;
        }
        .volunteer-focus-card {
            background: var(--white);
            border-radius: 16px;
            padding: 2.2rem 1.8rem;
            box-shadow: 0 8px 25px rgba(0, 16, 62, 0.06);
            border: 1px solid rgba(0, 16, 62, 0.08);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            position: relative;
            overflow: hidden;
        }
        .volunteer-focus-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(0, 16, 62, 0.12);
            border-color: rgba(234, 90, 0, 0.3);
        }
        .volunteer-focus-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: rgba(234, 90, 0, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.2rem;
        }
        .volunteer-focus-card h3 {
            font-size: 1.25rem;
            color: var(--secondary);
            margin-bottom: 0.8rem;
            font-weight: 700;
        }
        .volunteer-focus-card p {
            font-size: 0.95rem;
            color: var(--text-light);
            line-height: 1.55;
            margin: 0;
        }
        
        /* Formulario Especializado */
        .form-wrapper {
            background: var(--white);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 12px 35px rgba(0, 16, 62, 0.08);
            border: 1px solid rgba(0, 16, 62, 0.08);
            max-width: 860px;
            margin: 3rem auto 0 auto;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }
        @media (max-width: 768px) {
            .form-row { grid-template-columns: 1fr; gap: 1rem; }
            .form-wrapper { padding: 1.8rem 1.2rem; }
            .page-hero h1 { font-size: 2.2rem; }
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            margin-bottom: 1.4rem;
        }
        .form-group label {
            font-weight: 600;
            font-size: 0.92rem;
            color: var(--secondary);
        }
        .form-group label span.req {
            color: var(--primary);
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-family: var(--font-body);
            font-size: 0.95rem;
            color: var(--text-dark);
            background: #f8fafc;
            transition: all 0.25s ease;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(234, 90, 0, 0.15);
        }
        
        .checkbox-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 0.75rem;
            margin-top: 0.4rem;
            background: #f8fafc;
            padding: 1.2rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.88rem;
            color: var(--text-dark);
            cursor: pointer;
        }
        .checkbox-item input {
            width: auto;
            accent-color: var(--primary);
            cursor: pointer;
        }
        
        .radio-group {
            display: flex;
            gap: 1.5rem;
            margin-top: 0.4rem;
        }
        .radio-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            cursor: pointer;
            font-weight: 500;
        }
        .radio-item input {
            width: auto;
            accent-color: var(--primary);
        }

        .alert-box {
            padding: 1rem 1.25rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: none;
            font-weight: 500;
        }
        .alert-success { background: #dcfce7; border: 1px solid #86efac; color: #166534; }
        .alert-danger { background: #fee2e2; border: 1px solid #fca5a5; color: #991b1b; }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <header class="header">
        <div class="header-container">
            <a href="/" class="logo-link">
                <img src="LOGO Y VISUAL WEB BOTONES/logo ADN_de_Amor_color_rectangulo.png" alt="Fundación ADN de Amor" class="logo-img">
            </a>

            <!-- Botón Hamburguesa Móvil -->
            <button class="mobile-nav-toggle" aria-label="Abrir menú de navegación" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Menú Principal -->
            <nav class="main-nav">
                <a href="/">
                    <i class="fas fa-home nav-icon"></i>
                    <span class="nav-text">Inicio</span>
                </a>

                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fas fa-users nav-icon"></i>
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
                        <a href="voluntariado" class="active">Ser Voluntario</a>
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

                <a href="/#contacto" class="btn btn-secondary">Contacto</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="page-hero">
        <div class="container">
            <span style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 255, 255, 0.15); color: #ffffff; padding: 6px 16px; border-radius: 30px; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1.2rem; backdrop-filter: blur(5px);">
                <i class="fas fa-hands-helping"></i> Súmate a la Causa
            </span>
            <h1>Ser Voluntario</h1>
            <p>Un voluntario o voluntaria en la Fundación ADN de Amor es una persona que, de manera libre y desinteresada, se une a nuestra misión de acompañar, apoyar y generar oportunidades para niños, niñas, adolescentes, jóvenes y familias en situación de vulnerabilidad.</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="#contacto-voluntariado" class="btn btn-primary" style="padding: 0.85rem 1.8rem; font-size: 1rem;">
                    <i class="fas fa-file-signature"></i> Postularme como Voluntario
                </a>
                <a href="https://wa.me/573162522445?text=<?= urlencode('¡Hola Fundación ADN de Amor! Me gustaría recibir más información sobre cómo ser voluntario con ustedes.') ?>" target="_blank" rel="noopener noreferrer" class="btn" style="background: rgba(255, 255, 255, 0.18); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.4); padding: 0.85rem 1.8rem; font-size: 1rem; backdrop-filter: blur(5px);">
                    <i class="fab fa-whatsapp"></i> Preguntar por WhatsApp
                </a>
            </div>
        </div>
    </section>

    <!-- Introducción y Enfoque de Voluntariado -->
    <section class="section" style="padding-top: 5rem;">
        <div class="container">
            <div class="split-layout" style="align-items: center; gap: 3rem;">
                <div class="split-content">
                    <span style="color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; font-size: 0.9rem;">Vocación y Compromiso</span>
                    <h2 style="font-size: 2.3rem; margin-top: 0.5rem; margin-bottom: 1.2rem; color: var(--secondary);">El Corazón de Nuestro Voluntariado</h2>
                    <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-dark);">
                        La participación en nuestra Fundación puede surgir desde la iniciativa personal de quien desea sembrar amor en su comunidad, o a través de vínculos con entidades, universidades, iglesias o empresas comprometidas con el desarrollo social y comunitario.
                    </p>
                    <p style="font-size: 1.05rem; line-height: 1.7; color: var(--text-dark);">
                        Ser voluntario en ADN de Amor es mucho más que ayudar: es construir vínculos significativos, vivir experiencias que transforman y contribuir activamente al desarrollo integral de los niños, jóvenes y sus comunidades, siempre desde los principios cristianos de amor, fe, esperanza y servicio.
                    </p>
                </div>
                <div class="split-image organic-img-2">
                    <img src="FOTOS BANNERS/foto principal niños original tamaño mejorada luz.png" alt="Voluntarios y Comunidad ADN de Amor" style="border-radius: 20px; box-shadow: 0 12px 30px rgba(0, 16, 62, 0.12);">
                </div>
            </div>

            <!-- 4 Pilares del Enfoque -->
            <div style="margin-top: 5rem; text-align: center;">
                <h2 style="font-size: 2rem; color: var(--secondary); margin-bottom: 0.5rem;">Nuestro Enfoque de Voluntariado</h2>
                <p style="color: var(--text-light); max-width: 650px; margin: 0 auto 2.5rem auto;">Reconocemos y honramos cada minuto y talento que compartes con nosotros.</p>
            </div>

            <div class="volunteer-focus-grid">
                <div class="volunteer-focus-card" style="border-top: 4px solid var(--primary);">
                    <div class="volunteer-focus-icon"><i class="fas fa-heart"></i></div>
                    <h3>Valoramos tu aporte</h3>
                    <p>Reconocemos y valoramos el aporte individual y colectivo de cada voluntario como un pilar fundamental para sostener y multiplicar nuestras obras.</p>
                </div>

                <div class="volunteer-focus-card" style="border-top: 4px solid var(--secondary);">
                    <div class="volunteer-focus-icon" style="background: rgba(0, 16, 62, 0.1); color: var(--secondary);"><i class="fas fa-palette"></i></div>
                    <h3>Tus talentos son bienvenidos</h3>
                    <p>Creamos espacios donde las habilidades, conocimientos y profesiones de cada persona son esenciales para potenciar los talentos de los niños y jóvenes.</p>
                </div>

                <div class="volunteer-focus-card" style="border-top: 4px solid var(--primary);">
                    <div class="volunteer-focus-icon"><i class="fas fa-seedling"></i></div>
                    <h3>Oportunidades reales</h3>
                    <p>Colabora en clases y talleres del CDT, en el Programa Esperanza, en visitas comunitarias o en actividades vivenciales al aire libre en la Finca Guacas.</p>
                </div>

                <div class="volunteer-focus-card" style="border-top: 4px solid var(--secondary);">
                    <div class="volunteer-focus-icon" style="background: rgba(0, 16, 62, 0.1); color: var(--secondary);"><i class="fas fa-users"></i></div>
                    <h3>Construcción de comunidad</h3>
                    <p>Formarás parte de una familia que comparte fe, vocación y servicio, viviendo momentos enriquecedores que dejan huella en tu propia vida.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulario de Postulación de Voluntariado -->
    <section id="contacto-voluntariado" class="section bg-light" style="padding: 5rem 0;">
        <div class="container">
            <div class="section-header text-center" style="max-width: 750px; margin: 0 auto;">
                <span style="color: var(--primary); font-weight: 700; text-transform: uppercase; letter-spacing: 1px; font-size: 0.85rem;">Formulario de Postulación</span>
                <h2 style="font-size: 2.3rem; margin-top: 0.5rem; color: var(--secondary);">¿Quieres unirte como voluntario?</h2>
                <p style="font-size: 1.05rem; color: var(--text-light);">
                    Cuéntanos sobre ti y descubre cómo puedes aportar tu tiempo, talento y compromiso para marcar una diferencia positiva en nuestras comunidades.
                </p>
            </div>

            <div class="form-wrapper">
                <div id="formAlertSuccess" class="alert-box alert-success">
                    <i class="fas fa-check-circle" style="font-size: 1.2rem; margin-right: 8px;"></i>
                    <span>¡Gracias por tu deseo de servir! Hemos recibido tu postulación de voluntariado. Nos comunicaremos contigo muy pronto.</span>
                </div>
                <div id="formAlertError" class="alert-box alert-danger">
                    <i class="fas fa-exclamation-triangle" style="font-size: 1.2rem; margin-right: 8px;"></i>
                    <span id="errorMessage">Ocurrió un error al enviar el formulario. Por favor intenta nuevamente o contáctanos por WhatsApp.</span>
                </div>

                <form id="formVoluntario" method="POST" action="send_form.php">
                    <input type="hidden" name="form_type" value="voluntariado">
                    <!-- Honeypot anti-spam -->
                    <input type="text" name="website_url_check" style="display:none !important;" tabindex="-1" autocomplete="off">

                    <!-- Fila 1: Datos Personales -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre">Nombre y Apellidos <span class="req">*</span></label>
                            <input type="text" id="nombre" name="name" required autocomplete="name" placeholder="Ej. Juan Pérez Gómez">
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico <span class="req">*</span></label>
                            <input type="email" id="email" name="email" required autocomplete="email" placeholder="tuemail@ejemplo.com">
                        </div>
                    </div>

                    <!-- Fila 2: Teléfono y Ciudad -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telefono">Teléfono o WhatsApp <span class="req">*</span></label>
                            <input type="tel" id="telefono" name="phone" required autocomplete="tel" placeholder="Ej. 316 252 2445">
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad o Localidad de Residencia <span class="req">*</span></label>
                            <input type="text" id="ciudad" name="city" required autocomplete="address-level2" placeholder="Ej. Santa Rosa de Cabal / Pereira / Otra">
                        </div>
                    </div>

                    <!-- Pregunta 1 del Word: ¿Por qué te interesa ser voluntario con nosotros? -->
                    <div class="form-group">
                        <label for="interest_reason">¿Por qué te interesa ser voluntario con nosotros? <span class="req">*</span></label>
                        <textarea id="interest_reason" name="interest_reason" rows="3" required placeholder="Cuéntanos tu motivación, qué te llamó la atención de ADN de Amor y qué esperas vivir en este voluntariado..."></textarea>
                    </div>

                    <!-- Pregunta 2 del Word: ¿En qué crees puedes colaborar y ser voluntario con nosotros? -->
                    <div class="form-group">
                        <label>¿En qué crees puedes colaborar y ser voluntario con nosotros? <span class="req">*</span></label>
                        <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 0.4rem;">Selecciona todas las áreas en las que te gustaría participar con tu talento o experiencia:</p>
                        
                        <div class="checkbox-grid">
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Arte y Pintura">
                                <span>Arte, Pintura y Manualidades</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Música y Canto">
                                <span>Música y Canto</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Clases de Inglés">
                                <span>Clases de Inglés / Idiomas</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Deportes y Recreación">
                                <span>Deportes y Recreación</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Acompañamiento Psicosocial">
                                <span>Acompañamiento Emocional / Psicosocial</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Charlas con Propósito de los Jueves">
                                <span>Charlas con Propósito (Jueves)</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Finca Guacas y Actividades al Aire Libre">
                                <span>Apoyo en Finca Guacas (Santa Rosa)</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Ayuda Humanitaria y Alimentos">
                                <span>Entrega de Ayudas y Logística</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Comunicaciones y Medios">
                                <span>Fotografía, Video o Redes Sociales</span>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="collaboration_areas[]" value="Otra área">
                                <span>Otra área / Vocación especial</span>
                            </label>
                        </div>
                    </div>

                    <!-- Pregunta 3 del Word: ¿Eres o has sido voluntario de alguna organización? (Sí / No) -->
                    <div class="form-group" style="margin-top: 1.5rem;">
                        <label>¿Eres o has sido voluntario de alguna organización? <span class="req">*</span></label>
                        <div class="radio-group">
                            <label class="radio-item">
                                <input type="radio" name="previous_volunteer" value="Si" required onchange="togglePreviousDetails(true)">
                                <span>Sí</span>
                            </label>
                            <label class="radio-item">
                                <input type="radio" name="previous_volunteer" value="No" onchange="togglePreviousDetails(false)">
                                <span>No (es mi primera vez)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Detalle condicional si marcó Sí -->
                    <div class="form-group" id="groupPreviousDetails" style="display: none;">
                        <label for="previous_volunteer_details">¿En cuál organización y qué labor realizaste?</label>
                        <input type="text" id="previous_volunteer_details" name="previous_volunteer_details" placeholder="Ej. Apoyo en talleres infantiles, brigadas o grupo juvenil...">
                    </div>

                    <!-- Disponibilidad horaria -->
                    <div class="form-group">
                        <label for="availability">Disponibilidad de Tiempo Estimada</label>
                        <select id="availability" name="availability">
                            <option value="Fines de semana">Fines de semana (Sábados o Domingos)</option>
                            <option value="Jueves en las tardes / Charlas">Jueves en las tardes (Charlas de Propósito)</option>
                            <option value="Días entre semana (Flexible)">Días entre semana (Horario flexible)</option>
                            <option value="Por actividades o eventos puntuales">Por actividades o eventos puntuales</option>
                            <option value="Virtual / Remoto">Apoyo Virtual / A distancia</option>
                        </select>
                    </div>

                    <!-- Mensaje Opcional (del Word) -->
                    <div class="form-group">
                        <label for="message">Mensaje Opcional o Comentarios Adicionales</label>
                        <textarea id="message" name="message" rows="3" placeholder="Si deseas contarnos algo más sobre tus expectativas o disponibilidad, escríbelo aquí..."></textarea>
                    </div>

                    <div class="form-group" style="margin-top: 1.5rem; margin-bottom: 1rem;">
                        <label style="font-size: 0.88rem; color: #64748b; display: flex; align-items: flex-start; gap: 10px; cursor: pointer; line-height: 1.4;">
                            <input type="checkbox" name="habeas_data" value="1" required checked style="margin-top: 2px; accent-color: var(--primary);">
                            <span>Autorizo el tratamiento de mis datos personales conforme a la <a href="privacidad" target="_blank" style="color: var(--primary); text-decoration: underline;">Política de Privacidad</a> (Ley 1581 de 2012).</span>
                        </label>
                    </div>

                    <div style="margin-top: 2rem; text-align: center;">
                        <button type="submit" id="btnSubmitVoluntario" class="btn btn-primary" style="padding: 1rem 2.5rem; font-size: 1.05rem; width: 100%; max-width: 360px; justify-content: center;">
                            <i class="fas fa-paper-plane" style="margin-right: 8px;"></i> Enviar mi Postulación
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
    <script>
        function togglePreviousDetails(show) {
            const group = document.getElementById('groupPreviousDetails');
            if (group) {
                group.style.display = show ? 'block' : 'none';
            }
        }

        // Envío asíncrono con feedback instantáneo
        const form = document.getElementById('formVoluntario');
        const btn = document.getElementById('btnSubmitVoluntario');
        const alertSuccess = document.getElementById('formAlertSuccess');
        const alertError = document.getElementById('formAlertError');
        const errorMessage = document.getElementById('errorMessage');

        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                alertSuccess.style.display = 'none';
                alertError.style.display = 'none';

                // Validar al menos una casilla de áreas seleccionadas
                const checkedAreas = form.querySelectorAll('input[name="collaboration_areas[]"]:checked');
                if (checkedAreas.length === 0) {
                    errorMessage.innerText = 'Por favor selecciona al menos un área en la que te gustaría colaborar.';
                    alertError.style.display = 'block';
                    alertError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }

                btn.disabled = true;
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i> Enviando...';

                try {
                    const formData = new FormData(form);
                    const response = await fetch('send_form.php', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const data = await response.json();

                    if (data.success) {
                        alertSuccess.style.display = 'block';
                        form.reset();
                        togglePreviousDetails(false);
                        alertSuccess.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    } else {
                        errorMessage.innerText = data.message || 'Ocurrió un inconveniente al enviar tu postulación. Por favor intenta de nuevo.';
                        alertError.style.display = 'block';
                        alertError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                } catch (err) {
                    errorMessage.innerText = 'Error de conexión con el servidor. Puedes escribirnos directamente a info@fundacionadndeamor.org o por WhatsApp.';
                    alertError.style.display = 'block';
                    alertError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } finally {
                    btn.disabled = false;
                    btn.innerHTML = originalHtml;
                }
            });
        }
    </script>
</body>
</html>
