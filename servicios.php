<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Digitales con Causa: Páginas Web, Apps y Redes Sociales | Fundación ADN de Amor</title>
    <meta name="description"
        content="Páginas web, aplicaciones a la medida, gestión de redes sociales, videos, diseño de posts y SEO. Con cada proyecto, una parte se destina a los programas de la Fundación ADN de Amor en Santa Rosa de Cabal.">
    <link rel="canonical" href="https://fundacionadndeamor.org/servicios">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fundacionadndeamor.org/servicios">
    <meta property="og:title" content="Servicios Digitales con Causa | Fundación ADN de Amor">
    <meta property="og:description" content="Páginas web, apps, redes sociales, videos y SEO. Tu proyecto digital también apoya a niños y jóvenes.">
    <meta property="og:image" content="https://fundacionadndeamor.org/uploads/servicios/fundacion-adn-de-amor.jpg">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

    <!-- Preconnect fuentes y assets externos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="styles.css?v=<?= @filemtime(__DIR__ . '/styles.css') ?>">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Inter:wght@400;500;600;700&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .store-hero {
            padding-top: 140px;
            padding-bottom: 50px;
            background: linear-gradient(180deg, #ffffff 0%, #fbfcfe 100%);
            text-align: center;
        }
        .store-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(230, 57, 70, 0.08);
            color: var(--primary);
            padding: 8px 24px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: 1px solid rgba(230, 57, 70, 0.15);
            margin-bottom: 1.5rem;
        }
        .store-hero-title {
            font-size: 3rem;
            color: var(--secondary);
            margin-bottom: 1rem;
            font-family: var(--font-heading);
            font-weight: 800;
            line-height: 1.2;
        }
        .store-hero-desc {
            font-size: 1.15rem;
            color: var(--text-dark);
            max-width: 780px;
            margin: 0 auto 2rem auto;
            line-height: 1.8;
        }

        .btn-buy {
            width: 100%;
            background: linear-gradient(135deg, #E63946 0%, #00103e 100%);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            padding: 0.85rem;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.6rem;
            transition: all 0.25s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(230, 57, 70, 0.28);
        }
        .btn-buy:hover {
            background: linear-gradient(135deg, #ff4d5a 0%, #001859 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(230, 57, 70, 0.4);
            color: #ffffff;
        }
        /* Atajos del encabezado */
        .store-hero-actions { display: flex; gap: 0.8rem; justify-content: center; flex-wrap: wrap; }
        .store-hero-actions a { display: inline-flex; align-items: center; gap: 0.5rem; }
        .btn-hero-outline { background: #ffffff; border: 2px solid var(--secondary); color: var(--secondary); }
        .btn-hero-outline:hover { background: var(--secondary); color: #ffffff; transform: translateY(-2px); }

        /* Servicios digitales con causa */
        .services-section {
            background: #ffffff;
            padding: 5rem 0 5.5rem 0;
            border-top: 1px solid #eef1f5;
            scroll-margin-top: 90px;
        }
        .services-head { text-align: center; max-width: 760px; margin: 0 auto 3rem auto; }
        .services-head h2 {
            font-family: var(--font-heading);
            color: var(--secondary);
            font-size: 2.4rem;
            font-weight: 800;
            line-height: 1.2;
            margin: 0 0 1rem 0;
        }
        .services-head p { color: var(--text-dark); font-size: 1.08rem; line-height: 1.75; margin: 0; }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.6rem;
        }
        .service-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 1.9rem 1.7rem;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        }
        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px -12px rgba(0, 16, 62, 0.18);
            border-color: rgba(230, 57, 70, 0.3);
        }
        .service-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(230, 57, 70, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            margin-bottom: 1.1rem;
        }
        .service-card h3 {
            font-family: var(--font-heading);
            color: var(--secondary);
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0 0 0.55rem 0;
        }
        .service-card > p { color: #4b5563; font-size: 0.95rem; line-height: 1.6; margin: 0 0 1rem 0; }
        .service-card ul { list-style: none; padding: 0; margin: 0 0 1.4rem 0; display: grid; gap: 0.45rem; }
        .service-card li { color: var(--text-dark); font-size: 0.92rem; line-height: 1.45; display: flex; gap: 0.55rem; }
        .service-card li i { color: var(--primary); font-size: 0.8rem; margin-top: 0.3rem; }
        .service-card .btn-buy { margin-top: auto; }
        .services-impact {
            margin-top: 3rem;
            background: #fff5f5;
            border: 1px solid rgba(230, 57, 70, 0.18);
            border-radius: 18px;
            padding: 1.6rem 1.8rem;
            display: flex;
            gap: 1.2rem;
            align-items: center;
        }
        .services-impact i { color: var(--primary); font-size: 1.8rem; flex-shrink: 0; }
        .services-impact p { margin: 0; color: var(--text-dark); line-height: 1.65; }

        .store-hero { padding-bottom: 60px; }

        /* Trabajos realizados */
        .works-section { background: #f8fafc; padding: 5rem 0 5.5rem 0; scroll-margin-top: 90px; }
        .works-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.8rem; }
        .work-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .work-card:hover { transform: translateY(-4px); box-shadow: 0 16px 30px -12px rgba(0, 16, 62, 0.2); }
        .work-shot { aspect-ratio: 16 / 10; background: #e2e8f0; border-bottom: 1px solid #e2e8f0; overflow: hidden; }
        .work-shot img { width: 100%; height: 100%; object-fit: cover; object-position: top; display: block; transition: transform 0.6s ease; }
        .work-card:hover .work-shot img { transform: scale(1.04); }
        .work-body { padding: 1.4rem 1.5rem 1.6rem 1.5rem; display: flex; flex-direction: column; flex-grow: 1; }
        .work-tag { font-size: 0.78rem; font-weight: 700; letter-spacing: 0.8px; text-transform: uppercase; color: var(--primary); margin-bottom: 0.35rem; }
        .work-body h3 { font-family: var(--font-heading); color: var(--secondary); font-size: 1.2rem; font-weight: 700; margin: 0 0 0.5rem 0; }
        .work-body p { color: #4b5563; font-size: 0.93rem; line-height: 1.6; margin: 0 0 1.1rem 0; }
        .work-link { margin-top: auto; font-weight: 700; color: var(--secondary); text-decoration: none; display: inline-flex; align-items: center; gap: 0.45rem; font-size: 0.95rem; }
        .work-link:hover { color: var(--primary); }
        .work-link.is-private { color: #6b7280; font-weight: 600; }
        .works-more { text-align: center; margin-top: 2.5rem; }

        /* Cierre */
        .services-cta { background: #ffffff; padding: 4.5rem 0 5rem 0; }
        .services-cta .services-impact { margin-top: 0; margin-bottom: 2.2rem; }
        .cta-box {
            background: linear-gradient(135deg, #00103e 0%, #002266 100%);
            border-radius: 24px;
            padding: 3rem;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            flex-wrap: wrap;
        }
        .cta-box h3 { font-family: var(--font-heading); font-size: 1.9rem; color: #ffffff; margin: 0 0 0.6rem 0; }
        .cta-box p { color: rgba(255, 255, 255, 0.85); margin: 0; max-width: 620px; line-height: 1.7; }
        .cta-box .btn-buy { width: auto; padding: 0.95rem 1.8rem; background: var(--primary); }

        @media (max-width: 768px) {
            .store-hero-title { font-size: 2.3rem; }
            .services-section { padding: 3.5rem 0 4rem 0; }
            .services-head h2 { font-size: 1.9rem; }
            .services-grid, .works-grid { grid-template-columns: 1fr; }
            .services-impact { flex-direction: column; text-align: center; padding: 1.4rem 1.2rem; }
            .works-section { padding: 3.5rem 0 4rem 0; }
            .cta-box { padding: 2rem 1.5rem; text-align: center; justify-content: center; }
            .cta-box .btn-buy { width: 100%; }
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

                <a href="servicios" style="font-weight: 600; color: var(--primary); text-decoration: none;">
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

    <!-- Encabezado -->
    <section class="store-hero">
        <div class="container">
            <div class="store-badge">
                <i class="fas fa-laptop-code"></i> Servicios Digitales con Causa
            </div>
            <h1 class="store-hero-title">
                Tu proyecto digital también <br><span style="font-family: 'Great Vibes', cursive; font-weight: 400; color: var(--primary); font-size: 3.8rem;">transforma vidas</span>
            </h1>
            <p class="store-hero-desc">
                Desde la fundación ofrecemos <strong>páginas web, aplicaciones, gestión de redes sociales, videos, diseño de posts y SEO</strong> para negocios, emprendedores y organizaciones. Recibes un trabajo profesional y, con cada proyecto, una parte de lo que pagas se queda en la fundación para sostener el <strong>Centro de Desarrollo de Talentos (CDT)</strong>.
            </p>
            <div class="store-hero-actions">
                <a href="#servicios" class="btn btn-primary"><i class="fas fa-list-check"></i> Ver servicios</a>
                <a href="#trabajos" class="btn btn-hero-outline"><i class="fas fa-briefcase"></i> Ver trabajos realizados</a>
            </div>
        </div>
    </section>

    <?php
        $servicios = [
            ['fa-globe', 'Páginas web',
                'Sitios para negocios, emprendimientos, iglesias y fundaciones, pensados para que te encuentren y te escriban.',
                ['Diseño adaptado a celular y computador', 'Botón de WhatsApp y formularios de contacto', 'Dominio, hosting y correo corporativo', 'Panel para que actualices tus textos y fotos']],
            ['fa-mobile-screen-button', 'Aplicaciones a la medida',
                'Apps web y móviles que ordenan tu operación: menos papel, menos Excel y menos mensajes perdidos.',
                ['Pedidos, inventarios, citas y reservas', 'Paneles de administración con reportes', 'Tiendas en línea y catálogos', 'Acompañamiento y soporte después de entregar']],
            ['fa-hashtag', 'Gestión de redes sociales',
                'Nos encargamos de tus redes para que publiques con constancia y una imagen coherente.',
                ['Plan de contenidos mensual', 'Publicación en Instagram, Facebook y TikTok', 'Textos y hashtags para cada publicación', 'Informe mensual de resultados']],
            ['fa-video', 'Videos para redes',
                'Reels, TikToks y videos promocionales con ritmo, subtítulos y música para que la gente se quede viéndolos.',
                ['Edición de tus grabaciones', 'Subtítulos, música y efectos', 'Formatos vertical, cuadrado y horizontal', 'Videos de producto y de lanzamiento']],
            ['fa-palette', 'Posts y diseño gráfico',
                'Piezas listas para publicar con tus colores, tu logo y un mensaje claro.',
                ['Posts, carruseles e historias', 'Flyers y piezas para campañas', 'Plantillas con tu identidad visual', 'Material para eventos y fechas especiales']],
            ['fa-magnifying-glass-chart', 'SEO y posicionamiento',
                'Te ayudamos a aparecer cuando buscan lo que ofreces en Google y en los mapas.',
                ['Perfil de Google Business optimizado', 'Palabras clave y textos para buscadores', 'Velocidad y SEO técnico de tu página', 'Registro en Google Search Console']],
        ];
    ?>
    <section class="services-section" id="servicios">
        <div class="container">
            <div class="services-head">
                <h2>¿Qué podemos <span style="color: var(--primary);">hacer por ti?</span></h2>
                <p>Elige el servicio que necesitas y escríbenos por WhatsApp. Te respondemos con una propuesta y una cotización a la medida.</p>
            </div>

            <div class="services-grid">
                <?php foreach ($servicios as [$sIcon, $sTitle, $sDesc, $sItems]): ?>
                    <?php $sWa = 'https://wa.me/573104467692?text=' . urlencode("¡Hola! Vi en la web de la Fundación ADN de Amor el servicio de {$sTitle}. ¿Me puedes dar más información y una cotización?"); ?>
                    <article class="service-card">
                        <div class="service-icon"><i class="fas <?php echo $sIcon; ?>"></i></div>
                        <h3><?php echo htmlspecialchars($sTitle); ?></h3>
                        <p><?php echo htmlspecialchars($sDesc); ?></p>
                        <ul>
                            <?php foreach ($sItems as $sItem): ?>
                                <li><i class="fas fa-check"></i> <span><?php echo htmlspecialchars($sItem); ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo htmlspecialchars($sWa); ?>" target="_blank" rel="noopener noreferrer" class="btn-buy">
                            <i class="fab fa-whatsapp"></i> Cotizar este servicio
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- Trabajos realizados -->
    <?php
        $trabajos = [
            ['fundacion-adn-de-amor.jpg', 'Página web', 'Fundación ADN de Amor',
                'Sitio de la fundación con tienda solidaria, apadrinamiento, blog y panel para editar textos y fotos.', '/', 'Estás aquí'],
            ['vg-personalizados.jpg', 'Tienda en línea', 'VG Personalizados',
                'Tienda de productos sublimados en Pereira con catálogo, carrito y pedidos por WhatsApp.', 'https://sublimadosvg.shop', 'Ver tienda'],
            ['totalagro.jpg', 'Página web corporativa', 'Total Agro',
                'Sitio de maquinaria agrícola con catálogo de productos, red de distribuidores y SEO.', 'https://totalagro.com.co', 'Ver sitio'],
            ['dulces-con-amor.jpg', 'Tienda en línea', 'Dulces con Amor',
                'E-commerce de desayunos sorpresa con carrito, pagos en línea y gestión de pedidos.', 'https://dulcesconamor.com', 'Ver tienda'],
            ['control-produccion.jpg', 'Aplicación a la medida', 'Control de Producción',
                'Sistema en la nube para una empresa manufacturera: órdenes, tiempos por operario, métricas y tickets.', '', 'Sistema interno de la empresa'],
            ['calculadora-fpc.jpg', 'Aplicación web', 'Calculadora FPC',
                'App de estadísticas del fútbol colombiano: probabilidades, simulador de partidos y tabla en vivo.', 'https://cristianlopez.online/apps/fpc', 'Ver app'],
        ];
    ?>
    <section class="works-section" id="trabajos">
        <div class="container">
            <div class="services-head">
                <h2>Trabajos <span style="color: var(--primary);">realizados</span></h2>
                <p>Algunos de los proyectos que hemos construido para negocios y organizaciones de la región.</p>
            </div>

            <div class="works-grid">
                <?php foreach ($trabajos as [$wImg, $wTag, $wTitle, $wDesc, $wUrl, $wLink]): ?>
                    <article class="work-card">
                        <div class="work-shot">
                            <img src="uploads/servicios/<?php echo $wImg; ?>" alt="<?php echo htmlspecialchars($wTitle); ?>" loading="lazy" decoding="async" width="800" height="500">
                        </div>
                        <div class="work-body">
                            <span class="work-tag"><?php echo htmlspecialchars($wTag); ?></span>
                            <h3><?php echo htmlspecialchars($wTitle); ?></h3>
                            <p><?php echo htmlspecialchars($wDesc); ?></p>
                            <?php if ($wUrl === '/'): ?>
                                <span class="work-link is-private"><i class="fas fa-location-dot"></i> <?php echo $wLink; ?></span>
                            <?php elseif ($wUrl): ?>
                                <a class="work-link" href="<?php echo htmlspecialchars($wUrl); ?>" target="_blank" rel="noopener"><?php echo $wLink; ?> <i class="fas fa-arrow-up-right-from-square"></i></a>
                            <?php else: ?>
                                <span class="work-link is-private"><i class="fas fa-lock"></i> <?php echo $wLink; ?></span>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="works-more">
                <a href="https://cristianlopez.online" target="_blank" rel="noopener" class="btn btn-hero-outline"><i class="fas fa-folder-open"></i> Ver más proyectos</a>
            </div>
        </div>
    </section>

    <!-- Cierre -->
    <section class="services-cta">
        <div class="container">
            <div class="services-impact">
                <i class="fas fa-hand-holding-heart"></i>
                <p>
                    <strong>¿Cómo apoya tu proyecto a la fundación?</strong> Cotizamos cada trabajo según lo que necesitas y, del valor de cada proyecto, una parte se destina a los programas de la Fundación ADN de Amor. Así tu página, tu app o tus redes también ayudan a niños y jóvenes de Santa Rosa de Cabal.
                </p>
            </div>
            <div class="cta-box">
                <div>
                    <h3>¿Tienes un proyecto en mente?</h3>
                    <p>Cuéntanos qué necesitas: una página, una app, tus redes o tus videos. Te respondemos por WhatsApp con una propuesta sin compromiso.</p>
                </div>
                <a href="https://wa.me/573104467692?text=<?php echo urlencode('¡Hola! Vi en la web de la Fundación ADN de Amor los servicios digitales y quiero contarte mi proyecto.'); ?>" target="_blank" rel="noopener noreferrer" class="btn-buy">
                    <i class="fab fa-whatsapp"></i> Cuéntanos tu proyecto
                </a>
            </div>
        </div>
    </section>

    <?php
        // En esta página el botón flotante va al WhatsApp de servicios digitales
        $wa_float = [
            'url'   => 'https://wa.me/573104467692?text=' . urlencode('¡Hola! Vi en la web de la Fundación ADN de Amor los servicios digitales y quiero más información.'),
            'label' => '310 446 7692',
        ];
        include 'includes/footer.php';
    ?>

    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
</body>
</html>
