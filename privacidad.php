<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Política de Tratamiento de Datos Personales y Privacidad | Fundación ADN de Amor</title>
    <meta name="description" content="Conoce la Política de Tratamiento de Datos Personales y Privacidad de la Fundación ADN de Amor en cumplimiento de la Ley 1581 de 2012 y el Decreto 1377 de 2013 de Colombia.">
    <link rel="canonical" href="https://fundacionadndeamor.org/privacidad">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Preconnect fuentes y assets externos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <link rel="stylesheet" href="styles.css?v=<?= @filemtime(__DIR__ . '/styles.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Inter:wght@400;500;600&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .privacy-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 4rem 1.5rem;
        }
        .privacy-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 3rem;
            box-shadow: 0 4px 20px rgba(0, 16, 62, 0.05);
            border: 1px solid rgba(0, 16, 62, 0.08);
            line-height: 1.8;
            color: #2d3748;
        }
        .privacy-card h1 {
            font-size: 2.2rem;
            color: var(--secondary);
            margin-bottom: 0.8rem;
            font-weight: 800;
        }
        .privacy-card h2 {
            font-size: 1.4rem;
            color: var(--secondary);
            margin-top: 2rem;
            margin-bottom: 0.8rem;
            font-weight: 700;
            border-bottom: 2px solid rgba(234, 90, 0, 0.2);
            padding-bottom: 0.4rem;
        }
        .privacy-card h3 {
            font-size: 1.15rem;
            color: var(--primary);
            margin-top: 1.2rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .privacy-card ul {
            padding-left: 1.5rem;
            margin: 1rem 0;
        }
        .privacy-card li {
            margin-bottom: 0.5rem;
        }
        .privacy-badge {
            display: inline-block;
            background: rgba(234, 90, 0, 0.1);
            color: var(--primary);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .info-box {
            background: #f8fafc;
            border-left: 4px solid var(--primary);
            padding: 1.25rem 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            font-size: 0.95rem;
        }
        @media (max-width: 768px) {
            .privacy-card {
                padding: 1.8rem 1.2rem;
            }
            .privacy-card h1 {
                font-size: 1.8rem;
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

                <a href="/#contacto" class="btn btn-primary">Contacto</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main style="background: #f8fafc; padding-top: 100px; padding-bottom: 3rem;">
        <div class="privacy-container">
            <div class="privacy-card">
                <span class="privacy-badge"><i class="fas fa-shield-alt"></i> Cumplimiento Ley 1581 de 2012</span>
                <h1>Política de Tratamiento de Datos Personales</h1>
                <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 2rem;">Última actualización: Septiembre de 2026 | Santa Rosa de Cabal, Risaralda, Colombia</p>

                <div class="info-box">
                    <strong>Compromiso Institucional:</strong> La <strong>Fundación ADN de Amor</strong>, comprometida con el respeto, la transparencia y la legalidad, adopta la presente Política para garantizar la debida recolección, uso, almacenamiento, circulación y protección de los datos personales de sus usuarios, padrinos, voluntarios, practicantes, donantes, empresas aliadas y beneficiarios, en estricto cumplimiento de la <strong>Ley Estatutaria 1581 de 2012</strong>, el <strong>Decreto 1377 de 2013</strong> y demás normas concordantes de la República de Colombia.
                </div>

                <h2>1. Identificación del Responsable del Tratamiento</h2>
                <ul>
                    <li><strong>Razón Social:</strong> Fundación ADN de Amor</li>
                    <li><strong>Domicilio Principal y Finca Social:</strong> Vereda Guacas, sector Mirador del Café, Santa Rosa de Cabal, Risaralda - Colombia</li>
                    <li><strong>Correo Electrónico Oficial:</strong> <a href="mailto:info@fundacionadndeamor.org" style="color: var(--primary); font-weight: 600;">info@fundacionadndeamor.org</a></li>
                    <li><strong>Línea de Atención / WhatsApp:</strong> <a href="https://wa.me/573162522445" target="_blank" style="color: var(--primary); font-weight: 600;">+57 316 252 2445</a></li>
                    <li><strong>Sitio Web Oficial:</strong> <a href="https://fundacionadndeamor.org" style="color: var(--primary); font-weight: 600;">https://fundacionadndeamor.org</a></li>
                </ul>

                <h2>2. Finalidades del Tratamiento de Datos</h2>
                <p>Los datos personales suministrados a través de nuestros formularios web (Contacto, Apadrinamiento, Voluntariado, Prácticas y Empresas) serán recolectados y utilizados exclusivamente para el desarrollo de los fines misionales y benéficos de la Fundación, específicamente para:</p>
                <ul>
                    <li><strong>Atención y Contacto:</strong> Responder a solicitudes de información, preguntas e inquietudes formuladas por los usuarios.</li>
                    <li><strong>Programa de Apadrinamiento:</strong> Gestionar el vínculo, entrega de reportes pedagógicos, cartas, fotografías y seguimiento del apadrinamiento de niños, niñas y adolescentes.</li>
                    <li><strong>Gestión de Voluntariado:</strong> Coordinar perfiles, disponibilidad, asignación de actividades en el Centro de Desarrollo de Talentos (CDT) y brigadas comunitarias.</li>
                    <li><strong>Prácticas y Colaboradores Profesionales:</strong> Evaluar perfiles académicos o profesionales pro bono, formalizar convenios institucionales y coordinar el plan de trabajo formativo.</li>
                    <li><strong>Alianzas Empresariales y Donaciones:</strong> Tramitar acuerdos de Responsabilidad Social Empresarial (RSE), coordinar donaciones en especie o económicas y expedir certificaciones.</li>
                    <li><strong>Comunicaciones Institucionales:</strong> Enviar invitaciones a las "Charlas con Propósito de los Jueves", eventos de integración comunitaria, convocatorias de Misión Chocó y boletines informativos.</li>
                </ul>

                <p><strong>Bajo ninguna circunstancia</strong> la Fundación ADN de Amor vende, alquila ni comparte bases de datos con terceros con fines comerciales o publicitarios ajenos a nuestra misión social.</p>

                <h2>3. Derechos de los Titulares (Habeas Data)</h2>
                <p>De conformidad con el artículo 8 de la Ley 1581 de 2012, usted, como titular de los datos personales, cuenta con los siguientes derechos:</p>
                <ul>
                    <li><strong>Conocer, actualizar y rectificar</strong> sus datos personales frente a la Fundación ADN de Amor.</li>
                    <li><strong>Solicitar prueba</strong> de la autorización otorgada para el tratamiento de sus datos.</li>
                    <li><strong>Ser informado</strong> previa solicitud respecto del uso que se le ha dado a sus datos personales.</li>
                    <li><strong>Presentar quejas</strong> ante la Superintendencia de Industria y Comercio (SIC) por infracciones a la normatividad de protección de datos.</li>
                    <li><strong>Revocar la autorización</strong> y/o solicitar la supresión de sus datos cuando considere que no se respetan los principios, derechos y garantías constitucionales.</li>
                    <li><strong>Acceder en forma gratuita</strong> a sus datos personales que hayan sido objeto de tratamiento.</li>
                </ul>

                <h2>4. Procedimiento para Consultas, Rectificaciones y Supresiones</h2>
                <p>Para ejercer cualquiera de sus derechos, el titular o su representante legal puede remitir una comunicación escrita al correo electrónico:</p>
                <div style="text-align: center; margin: 1.5rem 0;">
                    <a href="mailto:info@fundacionadndeamor.org?subject=Solicitud%20Habeas%20Data%20-%20Protecci%C3%B3n%20de%20Datos" class="btn btn-primary" style="display: inline-block;">
                        <i class="fas fa-envelope"></i> Enviar Solicitud a info@fundacionadndeamor.org
                    </a>
                </div>
                <p>La solicitud debe contener: nombre completo del titular, número de identificación, correo electrónico o dirección de contacto, descripción clara de la petición (consulta, actualización, rectificación o supresión) y los documentos que la respalden. Las solicitudes serán atendidas en un plazo máximo de diez (10) a quince (15) días hábiles conforme a lo estipulado por la Ley 1581 de 2012.</p>

                <h2>5. Datos de Menores de Edad y Datos Sensibles</h2>
                <p>La Fundación ADN de Amor reconoce la especial prevalencia de los derechos de los niños, niñas y adolescentes. En caso de recolección de información relacionada con menores de edad en el marco de programas de apadrinamiento o acompañamiento educativo, el tratamiento se realiza siempre con la autorización previa, expresa e informada de sus padres o representantes legales, velando en todo momento por su seguridad, dignidad e interés superior.</p>

                <h2>6. Seguridad y Confidencialidad</h2>
                <p>La Fundación adopta las medidas técnicas, humanas y administrativas necesarias para brindar seguridad a los registros y evitar su adulteración, pérdida, consulta, uso o acceso no autorizado o fraudulento, implementando protocolos seguros de cifrado SSL/HTTPS en el sitio web y acceso restringido al panel administrativo.</p>

                <h2>7. Vigencia de la Política</h2>
                <p>La presente Política de Tratamiento de Datos Personales rige a partir de su publicación en el portal web y las bases de datos tendrán una vigencia equivalente al tiempo durante el cual subsistan las finalidades sociales y legales para las cuales fueron recolectados los datos.</p>

                <div style="text-align: center; margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
                    <a href="/" class="btn btn-outline" style="border-color: var(--secondary); color: var(--secondary); margin-right: 10px;">
                        <i class="fas fa-arrow-left"></i> Volver al Inicio
                    </a>
                    <a href="https://wa.me/573162522445" target="_blank" class="btn btn-primary">
                        <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
</body>

</html>
