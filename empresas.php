<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas y Aliados con Propósito | Fundación ADN de Amor</title>
    <meta name="description" content="Suma a tu empresa a la transformación social. Alianzas estratégicas, voluntariado corporativo y responsabilidad social empresarial con la Fundación ADN de Amor.">
    <link rel="canonical" href="https://fundacionadndeamor.org/empresas">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fundacionadndeamor.org/empresas">
    <meta property="og:title" content="Empresas y Aliados con Propósito | Fundación ADN de Amor">
    <meta property="og:description" content="Suma a tu empresa a la transformación social. Alianzas estratégicas, voluntariado corporativo y responsabilidad social con Fundación ADN de Amor.">
    <meta property="og:image" content="https://fundacionadndeamor.org/FOTOS%20BANNERS/foto%20leo%20chicos%20mejorada%20ia.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fundacionadndeamor.org/empresas">
    <meta property="twitter:title" content="Empresas y Aliados con Propósito | Fundación ADN de Amor">
    <meta property="twitter:description" content="Suma a tu empresa a la transformación social. Alianzas estratégicas, voluntariado corporativo y responsabilidad social con Fundación ADN de Amor.">
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
            background: linear-gradient(135deg, rgba(0, 16, 62, 0.95) 0%, rgba(0, 80, 133, 0.9) 100%), url('FOTOS BANNERS/foto leo chicos mejorada ia.png');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            position: relative;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at center, rgba(234, 90, 0, 0.15) 0%, transparent 70%);
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
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }
        .alliance-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.8rem;
            margin-top: 2.5rem;
        }
        .alliance-card {
            background: var(--white);
            border-radius: 14px;
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
        .alliance-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 4px;
            background: var(--primary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .alliance-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(0, 16, 62, 0.12);
            border-color: rgba(234, 90, 0, 0.3);
        }
        .alliance-card:hover::before {
            opacity: 1;
        }
        .alliance-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: rgba(234, 90, 0, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }
        .alliance-card h3 {
            font-size: 1.3rem;
            color: var(--secondary);
            margin-bottom: 0.8rem;
            font-weight: 700;
        }
        .alliance-card p {
            color: #4a5568;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .benefits-section {
            background: #ffffff;
            border-radius: 16px;
            padding: 3rem 2.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.06);
            margin: 3rem 0;
        }
        .benefits-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
            list-style: none;
            padding: 0;
        }
        .benefits-list li {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            font-size: 1rem;
            color: #2d3748;
        }
        .benefits-list li i {
            color: var(--primary);
            font-size: 1.25rem;
            margin-top: 3px;
            flex-shrink: 0;
        }
        @media (max-width: 768px) {
            .page-hero h1 { font-size: 2.2rem; }
            .page-hero p { font-size: 1.05rem; }
            .benefits-section { padding: 2rem 1.5rem; }
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
            <p class="loader-text">Conectando empresas con impacto social...</p>
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
                
                <a href="#contacto-empresa" class="btn btn-primary">Contáctanos</a>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container" style="position: relative; z-index: 2;">
            <h1>Empresas y Aliados con Propósito</h1>
            <p>Conectamos el compromiso social y la responsabilidad corporativa de tu organización con el bienestar integral de cientos de niños, jóvenes y familias en Risaralda y el Chocó.</p>
            <a href="#contacto-empresa" class="btn btn-primary btn-large" style="box-shadow: 0 4px 15px rgba(234, 90, 0, 0.4);">
                <span>Conviértete en Empresa Aliada</span> <i class="fas fa-arrow-down" style="margin-left: 8px;"></i>
            </a>
        </div>
    </section>

    <!-- Modalidades de Colaboración -->
    <section class="section">
        <div class="container">
            <div class="section-header text-center">
                <span class="badge" style="background: rgba(234, 90, 0, 0.1); color: var(--primary); padding: 6px 16px; border-radius: 20px; font-weight: 600; font-size: 0.9rem; text-transform: uppercase;">Alianzas Corporativas</span>
                <h2 style="margin-top: 0.8rem;">¿Cómo puede vincularse tu organización?</h2>
                <p style="max-width: 750px; margin: 0 auto; color: #64748b;">Diseñamos modelos de cooperación adaptados a los objetivos de sostenibilidad, cultura y responsabilidad social empresarial (RSE) de tu entidad.</p>
            </div>

            <div class="alliance-grid">
                <div class="alliance-card">
                    <div class="alliance-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Voluntariado Corporativo</h3>
                    <p>Involucra a tus colaboradores en jornadas de impacto directo, mentorías, talleres de formación o actividades recreativas en nuestro Centro de Desarrollo de Talentos (CDT).</p>
                </div>

                <div class="alliance-card">
                    <div class="alliance-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h3>Donación en Especie</h3>
                    <p>Apoya con insumos pedagógicos, equipos tecnológicos, instrumentos musicales, dotaciones escolares, prendas de vestir o alimentos no perecederos para nuestras sedes y misiones.</p>
                </div>

                <div class="alliance-card">
                    <div class="alliance-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3>Patrocinio de Proyectos</h3>
                    <p>Financia aulas formativas en el CDT, becas educativas de inglés o música, o proyectos integrales de desarrollo comunitario en Santa Rosa de Cabal y el Chocó.</p>
                </div>

                <div class="alliance-card">
                    <div class="alliance-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <h3>Alianzas Estratégicas y RSE</h3>
                    <p>Crea campañas de co-branding solidario, redondeo de compras, programas de bienestar o iniciativas a la medida alineadas con los Objetivos de Desarrollo Sostenible (ODS).</p>
                </div>
            </div>

            <!-- Beneficios para la empresa -->
            <div class="benefits-section">
                <div class="split-layout" style="align-items: center;">
                    <div class="split-content">
                        <h3 style="font-size: 1.8rem; color: var(--secondary); margin-bottom: 1rem; font-weight: 700;">Beneficios de ser un Aliado ADN</h3>
                        <p style="color: #4a5568; line-height: 1.6;">Trabajar de la mano con la Fundación ADN de Amor genera valor tangible para la sociedad y fortalece la identidad institucional de tu empresa:</p>
                        
                        <ul class="benefits-list">
                            <li>
                                <i class="fas fa-certificate"></i>
                                <span><strong>Certificado de Donación:</strong> Accede a los beneficios tributarios vigentes según el Estatuto Tributario de Colombia.</span>
                            </li>
                            <li>
                                <i class="fas fa-chart-line"></i>
                                <span><strong>Transparencia y Reportes:</strong> Recibe informes de impacto social periódicos, indicadores y evidencia audiovisual.</span>
                            </li>
                            <li>
                                <i class="fas fa-users"></i>
                                <span><strong>Clima y Sentido de Pertenencia:</strong> Motiva a tu equipo de trabajo viviendo experiencias humanas transformadoras.</span>
                            </li>
                            <li>
                                <i class="fas fa-award"></i>
                                <span><strong>Visibilidad y Reconocimiento:</strong> Posicionamiento de marca ética en nuestros canales digitales, memorias y eventos.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="split-image">
                        <div class="organic-img-2">
                            <img src="FOTOS BANNERS/foto leo chicos mejorada ia.png" alt="Empresas con propósito" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulario de Contacto Especializado para Empresas -->
    <section id="contacto-empresa" class="section bg-light">
        <div class="container" style="max-width: 820px; margin: 0 auto;">
            <div class="section-header text-center">
                <h2>Construyamos una Alianza con Futuro</h2>
                <p>Completa el formulario y nuestro equipo de gestión y alianzas se comunicará con tu organización para coordinar una reunión y presentarles opciones a la medida.</p>
            </div>
            
            <form class="contact-form modern-card" id="form-empresa" action="send_form.php" method="POST">
                <input type="hidden" name="form_type" value="empresa">
                <!-- Honeypot anti-spam invisible para humanos -->
                <div style="display:none !important; position:absolute; left:-9999px;">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                    <div class="form-alert" style="display:block; margin-bottom: 1.5rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem; background: #e6f4ea; color: #137333; border: 1px solid #ceead6;">
                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i> <?= htmlspecialchars($_GET['msg'] ?? '¡Propuesta enviada con éxito! Nuestro equipo se pondrá en contacto.') ?>
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
                        <label>Nombre de la Empresa u Organización *</label>
                        <input type="text" name="company" placeholder="Ej. Argos, Bancolombia, Pyme Local" required autocomplete="organization" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nombre del Representante o Contacto *</label>
                        <input type="text" name="name" placeholder="Ej. Carolina Gómez" required autocomplete="name" class="form-control">
                    </div>
                </div>
                
                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label>Cargo o Rol en la Empresa</label>
                        <input type="text" name="position" placeholder="Ej. Gerente de RSE, Gestión Humana, Director" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico Corporativo *</label>
                        <input type="email" name="email" placeholder="contacto@tuempresa.com" required autocomplete="email" class="form-control">
                    </div>
                </div>

                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label>Teléfono o WhatsApp de Contacto *</label>
                        <input type="tel" name="phone" placeholder="+57 316 252 2445" required autocomplete="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ciudad y País *</label>
                        <input type="text" name="location" placeholder="Ej. Pereira, Bogotá, Medellín, Colombia" required autocomplete="address-level2" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tipo de Alianza o Colaboración de Interés *</label>
                    <select name="modality" class="form-control" required style="cursor: pointer;">
                        <option value="">Selecciona una opción...</option>
                        <option value="Voluntariado Corporativo">Voluntariado Corporativo con Empleados</option>
                        <option value="Donación en Especie">Donación en Especie (Tecnología, Insumos, Dotación)</option>
                        <option value="Patrocinio de Proyectos CDT">Patrocinio de Programas y Aulas CDT</option>
                        <option value="Alianza Estratégica / RSE">Alianza Estratégica Integral / RSE</option>
                        <option value="Campaña Comercial Solidaria">Campaña de Co-Branding Solidario</option>
                        <option value="Otra Forma de Colaboración">Otra Forma de Colaboración</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Propuesta o Comentarios (Cuéntanos sobre tu empresa y qué esperan lograr juntos)</label>
                    <textarea name="message" placeholder="Escribe aquí los detalles de la colaboración, número aproximado de participantes, o inquietudes..." class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group" style="margin-top: 1rem; margin-bottom: 1.25rem;">
                    <label style="font-size: 0.85rem; color: #64748b; display: flex; align-items: flex-start; gap: 8px; cursor: pointer; line-height: 1.4;">
                        <input type="checkbox" name="habeas_data" value="1" required checked style="margin-top: 2px; accent-color: var(--primary);">
                        <span>Autorizo el tratamiento de datos institucionales y de contacto conforme a la <a href="privacidad" target="_blank" style="color: var(--primary); text-decoration: underline;">Política de Privacidad</a> (Ley 1581 de 2012).</span>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-large btn-block" style="font-size: 1.1rem; padding: 1.2rem; cursor: pointer;">
                    <span>Enviar Propuesta de Alianza</span> <i class="fas fa-handshake" style="margin-left: 8px;"></i>
                </button>
            </form>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
</body>
</html>
