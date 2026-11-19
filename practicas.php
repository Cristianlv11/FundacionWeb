<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prácticas y Colaboradores Profesionales | Fundación ADN de Amor</title>
    <meta name="description" content="Realiza tus prácticas profesionales o colabora como profesional pro bono en la Fundación ADN de Amor. Desarrolla tus talentos y transforma vidas en Colombia.">
    <link rel="canonical" href="https://fundacionadndeamor.org/practicas">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Open Graph / Redes Sociales -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fundacionadndeamor.org/practicas">
    <meta property="og:title" content="Prácticas y Colaboradores Profesionales | Fundación ADN de Amor">
    <meta property="og:description" content="Realiza tus prácticas profesionales o colabora como profesional pro bono en la Fundación ADN de Amor. Desarrolla tus talentos y transforma vidas en Colombia.">
    <meta property="og:image" content="https://fundacionadndeamor.org/FOTOS%20BANNERS/FOTO%20GRUPO%20JOVENES.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://fundacionadndeamor.org/practicas">
    <meta property="twitter:title" content="Prácticas y Colaboradores Profesionales | Fundación ADN de Amor">
    <meta property="twitter:description" content="Realiza tus prácticas profesionales o colabora como profesional pro bono en la Fundación ADN de Amor. Desarrolla tus talentos y transforma vidas en Colombia.">
    <meta property="twitter:image" content="https://fundacionadndeamor.org/FOTOS%20BANNERS/FOTO%20GRUPO%20JOVENES.png">

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
            background: linear-gradient(135deg, rgba(0, 16, 62, 0.92) 0%, rgba(0, 80, 133, 0.88) 100%), url('FOTOS BANNERS/FOTO GRUPO JOVENES.png');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            position: relative;
        }
        .page-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at center, rgba(234, 90, 0, 0.18) 0%, transparent 70%);
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
        .areas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.8rem;
            margin-top: 2.5rem;
        }
        .area-card {
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
        .area-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 4px;
            background: var(--primary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .area-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(0, 16, 62, 0.12);
            border-color: rgba(234, 90, 0, 0.3);
        }
        .area-card:hover::before {
            opacity: 1;
        }
        .area-icon {
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
        .area-card h3 {
            font-size: 1.3rem;
            color: var(--secondary);
            margin-bottom: 0.8rem;
            font-weight: 700;
        }
        .area-card p {
            color: #4a5568;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .why-us-box {
            background: #ffffff;
            border-radius: 16px;
            padding: 3rem 2.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.06);
            margin: 3rem 0;
        }
        .why-us-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
            list-style: none;
            padding: 0;
        }
        .why-us-list li {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            font-size: 1rem;
            color: #2d3748;
        }
        .why-us-list li i {
            color: var(--primary);
            font-size: 1.25rem;
            margin-top: 3px;
            flex-shrink: 0;
        }
        @media (max-width: 768px) {
            .page-hero h1 { font-size: 2.2rem; }
            .page-hero p { font-size: 1.05rem; }
            .why-us-box { padding: 2rem 1.5rem; }
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
            <p class="loader-text">Abriendo oportunidades profesionales con sentido humano...</p>
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
                
                <a href="#contacto-practicas" class="btn btn-primary">Postularme</a>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container" style="position: relative; z-index: 2;">
            <h1>Prácticas y Colaboradores Profesionales</h1>
            <p>Pon tu vocación, talento y conocimiento al servicio de la infancia y las familias más vulnerables. Ya seas estudiante en busca de prácticas profesionales o profesional graduado que desea aportar su experiencia pro bono, hay un lugar para ti en nuestro equipo.</p>
            <a href="#contacto-practicas" class="btn btn-primary btn-large" style="box-shadow: 0 4px 15px rgba(234, 90, 0, 0.4);">
                <span>Postula tu Perfil Ahora</span> <i class="fas fa-arrow-down" style="margin-left: 8px;"></i>
            </a>
        </div>
    </section>

    <!-- Áreas de Práctica y Voluntariado -->
    <section class="section">
        <div class="container">
            <div class="section-header text-center">
                <span class="badge" style="background: rgba(234, 90, 0, 0.1); color: var(--primary); padding: 6px 16px; border-radius: 20px; font-weight: 600; font-size: 0.9rem; text-transform: uppercase;">Campos de Acción</span>
                <h2 style="margin-top: 0.8rem;">¿En qué áreas puedes realizar tus prácticas o colaborar?</h2>
                <p style="max-width: 750px; margin: 0 auto; color: #64748b;">Buscamos estudiantes comprometidos y profesionales graduados con vocación social en diversas disciplinas.</p>
            </div>

            <div class="areas-grid">
                <div class="area-card">
                    <div class="area-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Centro de Talentos (CDT)</h3>
                    <p>Licenciaturas, educación infantil, artes plásticas, música, danza, deportes, robótica y enseñanza de idiomas (inglés). Talleres experienciales con niños y jóvenes.</p>
                </div>

                <div class="area-card">
                    <div class="area-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3>Psicología y Trabajo Social</h3>
                    <p>Acompañamiento psicosocial individual y grupal, caracterización familiar, escuelas de padres, prevención de riesgos y fortalecimiento emocional en la comunidad.</p>
                </div>

                <div class="area-card">
                    <div class="area-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3>Comunicación y Diseño</h3>
                    <p>Diseño gráfico, producción y edición audiovisual, periodismo, fotografía, gestión de redes sociales y estrategias de marketing solidario y recaudación.</p>
                </div>

                <div class="area-card">
                    <div class="area-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Sistemas, Admin y Gestión</h3>
                    <p>Ingeniería de sistemas, desarrollo web, optimización de procesos administrativos, formulación de proyectos sociales y gestión de alianzas estratégicas.</p>
                </div>
            </div>

            <!-- Beneficios de practicar en ADN de Amor -->
            <div class="why-us-box">
                <div class="split-layout" style="align-items: center;">
                    <div class="split-content">
                        <h3 style="font-size: 1.8rem; color: var(--secondary); margin-bottom: 1rem; font-weight: 700;">¿Por qué colaborar o hacer tus prácticas con nosotros?</h3>
                        <p style="color: #4a5568; line-height: 1.6;">En la Fundación ADN de Amor valoramos tu talento y te brindamos un entorno donde tus ideas se convierten en proyectos reales de transformación:</p>
                        
                        <ul class="why-us-list">
                            <li>
                                <i class="fas fa-file-signature"></i>
                                <span><strong>Convenio y Certificación Oficial:</strong> Avalamos tus horas de práctica o servicio social según los requerimientos de tu institución.</span>
                            </li>
                            <li>
                                <i class="fas fa-user-graduate"></i>
                                <span><strong>Mentoría y Aprendizaje Real:</strong> Trabaja junto a profesionales experimentados en el campo social, educativo y comunitario.</span>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <span><strong>Flexibilidad de Horarios:</strong> Opciones presenciales (Santa Rosa de Cabal / Risaralda), híbridas o virtuales según tu disciplina.</span>
                            </li>
                            <li>
                                <i class="fas fa-smile-beam"></i>
                                <span><strong>Impacto Social Verdadero:</strong> Tu esfuerzo diario cambia directamente la realidad y el futuro de cientos de niños y familias.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="split-image">
                        <div class="organic-img-2">
                            <img src="FOTOS BANNERS/FOTO GRUPO JOVENES.png" alt="Jóvenes practicantes y voluntarios" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulario de Contacto Especializado para Prácticas y Colaboradores -->
    <section id="contacto-practicas" class="section bg-light">
        <div class="container" style="max-width: 820px; margin: 0 auto;">
            <div class="section-header text-center">
                <h2>Postula tu Perfil Profesional o de Prácticas</h2>
                <p>Completa el formulario y nos comunicaremos contigo para coordinar una entrevista y evaluar juntos las posibilidades de vinculación.</p>
            </div>
            
            <form class="contact-form modern-card" id="form-practicas" action="send_form.php" method="POST">
                <input type="hidden" name="form_type" value="practicas">
                <!-- Honeypot anti-spam invisible para humanos -->
                <div style="display:none !important; position:absolute; left:-9999px;">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                    <div class="form-alert" style="display:block; margin-bottom: 1.5rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem; background: #e6f4ea; color: #137333; border: 1px solid #ceead6;">
                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i> <?= htmlspecialchars($_GET['msg'] ?? '¡Postulación enviada con éxito! Revisaremos tu perfil.') ?>
                    </div>
                <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                    <div class="form-alert" style="display:block; margin-bottom: 1.5rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem; background: #fce8e6; color: #c5221f; border: 1px solid #fad2cf;">
                        <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i> <?= htmlspecialchars($_GET['msg'] ?? 'Error al enviar la postulación.') ?>
                    </div>
                <?php else: ?>
                    <div class="form-alert" style="display:none; margin-bottom: 1.5rem; padding: 12px 16px; border-radius: 8px; font-size: 0.95rem;"></div>
                <?php endif; ?>

                <div class="form-group" style="background: #ffffff; padding: 16px; border-radius: 10px; border: 1px solid rgba(0, 16, 62, 0.1); margin-bottom: 1.5rem;">
                    <label style="font-weight: 700; color: var(--secondary); margin-bottom: 8px; display: block;">Tipo de Postulación *</label>
                    <div style="display: flex; gap: 1.5rem; flex-wrap: wrap;">
                        <label style="display: inline-flex; align-items: center; gap: 0.5rem; cursor: pointer; font-weight: 600; color: var(--secondary);">
                            <input type="radio" name="profile_type" value="Estudiante" checked onchange="toggleProfileFields(this.value)">
                            <span>🎓 Estudiante Universitario (Prácticas Profesionales)</span>
                        </label>
                        <label style="display: inline-flex; align-items: center; gap: 0.5rem; cursor: pointer; font-weight: 600; color: var(--secondary);">
                            <input type="radio" name="profile_type" value="Profesional" onchange="toggleProfileFields(this.value)">
                            <span>💼 Profesional Graduado (Colaborador / Asesoría Pro Bono)</span>
                        </label>
                    </div>
                </div>

                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label>Nombre y Apellidos Completos *</label>
                        <input type="text" name="name" placeholder="Ej. Mateo Velásquez" required autocomplete="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico *</label>
                        <input type="email" name="email" placeholder="ejemplo@correo.com" required autocomplete="email" class="form-control">
                    </div>
                </div>
                
                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label>Teléfono o WhatsApp de Contacto *</label>
                        <input type="tel" name="phone" placeholder="+57 316 252 2445" required autocomplete="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ciudad de Residencia *</label>
                        <input type="text" name="location" placeholder="Ej. Santa Rosa de Cabal, Pereira, Manizales" required autocomplete="address-level2" class="form-control">
                    </div>
                </div>

                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label id="label-university">Universidad o Institución Educativa *</label>
                        <input type="text" id="input-university" name="university" placeholder="Ej. UTP, Libre, Areandina, UNAD, SENA" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label id="label-career">Carrera o Programa Académico *</label>
                        <input type="text" id="input-career" name="career" placeholder="Ej. Psicología, Artes Plásticas, Licenciatura" required class="form-control">
                    </div>
                </div>

                <div class="grid-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                    <div class="form-group">
                        <label>Área de Interés Principal *</label>
                        <select name="modality" class="form-control" required style="cursor: pointer;">
                            <option value="">Selecciona un área...</option>
                            <option value="CDT - Arte, Música o Danza">Centro de Talentos: Arte, Música o Danza</option>
                            <option value="CDT - Inglés e Idiomas">Centro de Talentos: Inglés e Idiomas</option>
                            <option value="CDT - Deportes y Recreación">Centro de Talentos: Deportes y Recreación</option>
                            <option value="Psicología y Salud Mental">Psicología y Acompañamiento Psicosocial</option>
                            <option value="Trabajo Social y Familias">Trabajo Social y Desarrollo Comunitario</option>
                            <option value="Comunicaciones y Redes">Comunicaciones, Prensa y Redes Sociales</option>
                            <option value="Diseño Gráfico y Audiovisual">Diseño Gráfico y Producción Audiovisual</option>
                            <option value="Sistemas y Tecnología">Sistemas, Desarrollo Web y Tecnología</option>
                            <option value="Administración y Proyectos">Administración, Finanzas y Gestión Social</option>
                            <option value="Otra Área">Otra Área de Interés</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Disponibilidad de Tiempo *</label>
                        <select name="availability" class="form-control" required style="cursor: pointer;">
                            <option value="">Selecciona tu disponibilidad...</option>
                            <option value="Tiempo Completo">Tiempo Completo</option>
                            <option value="Medio Tiempo">Medio Tiempo (Mañanas o Tardes)</option>
                            <option value="Fines de Semana">Fines de Semana (Sábados/Domingos)</option>
                            <option value="Modalidad Virtual/Híbrida">Modalidad Virtual o Híbrida</option>
                            <option value="Voluntariado Flexible">Horas Libres / Asesoría Flexible</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Carta de Motivación / Cuéntanos sobre ti (Semestre o experiencia, áreas donde deseas aportar y expectativas)</label>
                    <textarea name="message" placeholder="Escribe aquí tu motivación, áreas de especialidad o cualquier detalle relevante..." class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group" style="margin-top: 1rem; margin-bottom: 1.25rem;">
                    <label style="font-size: 0.85rem; color: #64748b; display: flex; align-items: flex-start; gap: 8px; cursor: pointer; line-height: 1.4;">
                        <input type="checkbox" name="habeas_data" value="1" required checked style="margin-top: 2px; accent-color: var(--primary);">
                        <span>Autorizo el tratamiento de mis datos personales conforme a la <a href="privacidad" target="_blank" style="color: var(--primary); text-decoration: underline;">Política de Privacidad</a> (Ley 1581 de 2012).</span>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-large btn-block" style="font-size: 1.1rem; padding: 1.2rem; cursor: pointer;">
                    <span>Enviar Postulación</span> <i class="fas fa-paper-plane" style="margin-left: 8px;"></i>
                </button>
            </form>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
    <script>
        function toggleProfileFields(profileType) {
            const labelUniversity = document.getElementById('label-university');
            const inputUniversity = document.getElementById('input-university');
            const labelCareer = document.getElementById('label-career');
            const inputCareer = document.getElementById('input-career');

            if (profileType === 'Profesional') {
                labelUniversity.textContent = 'Universidad o Institución de Egreso';
                inputUniversity.placeholder = 'Ej. UTP, Libre, Areandina (opcional)';
                inputUniversity.required = false;

                labelCareer.textContent = 'Profesión o Especialidad *';
                inputCareer.placeholder = 'Ej. Psicología, Contaduría, Ingeniería';
                inputCareer.required = true;
            } else {
                labelUniversity.textContent = 'Universidad o Institución Educativa *';
                inputUniversity.placeholder = 'Ej. UTP, Libre, Areandina, UNAD, SENA';
                inputUniversity.required = true;

                labelCareer.textContent = 'Carrera o Programa Académico *';
                inputCareer.placeholder = 'Ej. Psicología, Artes Plásticas, Licenciatura';
                inputCareer.required = true;
            }
        }
    </script>
</body>
</html>
