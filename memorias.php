<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memorias de Nuestra Labor | Fundación ADN de Amor</title>
    <meta name="description"
        content="Memorias de nuestra labor familiar previa a la constitución formal de la Fundación ADN de Amor. Más de 15 años sembrando amor, educación y esperanza en Chocó y el Eje Cafetero.">
    <link rel="canonical" href="https://fundacionadndeamor.org/memorias">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">
    <link rel="apple-touch-icon" href="LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_cuadrado.png">

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

    <!-- Memorias Hero -->
    <section class="section" style="padding-top: 140px; padding-bottom: 40px; text-align: center;">
        <div class="container" style="max-width: 960px;">
            <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(230, 57, 70, 0.08); padding: 8px 24px; border-radius: 50px; margin-bottom: 1.5rem; border: 1px solid rgba(230, 57, 70, 0.15);">
                <i class="fas fa-heart" style="color: var(--primary); font-size: 0.95rem;"></i>
                <span style="color: var(--primary); font-weight: 700; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Vocación y Legado Familiar</span>
            </div>

            <h1 style="font-size: 3.2rem; color: var(--secondary); margin-bottom: 0.5rem; line-height: 1.2;">
                Memorias <span style="font-family: 'Great Vibes', cursive; font-weight: 400; color: var(--primary); font-size: 4.5rem;">de Nuestra Labor</span>
                <i class="far fa-heart" style="color: var(--primary); font-size: 1.5rem; margin-left: 5px;"></i>
            </h1>
            <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin-bottom: 2.5rem;">
                <div style="height: 1px; width: 60px; background: rgba(230, 57, 70, 0.4);"></div>
                <i class="far fa-heart" style="color: var(--primary);"></i>
                <div style="height: 1px; width: 60px; background: rgba(230, 57, 70, 0.4);"></div>
            </div>
            
            <p style="font-size: 1.3rem; color: var(--secondary); line-height: 1.6; font-weight: 700; margin-bottom: 1.8rem;">
                Una historia de servicio, solidaridad y fe que nació en el seno de nuestra familia y que hoy da el paso hacia su constitución formal.
            </p>
            
            <div style="background: #ffffff; border-radius: 20px; padding: 2.5rem 2.2rem; box-shadow: var(--shadow); text-align: left; border-left: 5px solid var(--primary); margin-bottom: 2rem;">
                <p style="font-size: 1.1rem; color: var(--text-dark); line-height: 1.8; margin-bottom: 1.2rem;">
                    Aunque actualmente nos encontramos en el proceso de <strong>constituir formalmente la Fundación ADN de Amor</strong>, nuestra labor no comienza en un papel: <strong>nace del corazón y la siembra viva de nuestra familia</strong>. Inspirados en el ejemplo imborrable de amor al prójimo, fe y generosidad de nuestra madre y abuela, la señora <strong>Nidia López de Giraldo</strong>, durante más de 15 años hemos caminado de manera cercana con niños, niñas, jóvenes y familias en condición de vulnerabilidad en el Chocó y el Eje Cafetero.
                </p>
                <p style="font-size: 1.1rem; color: var(--text-dark); line-height: 1.8; margin-bottom: 0;">
                    Mucho antes de contar con una estructura jurídica formal, pusimos a disposición nuestros propios recursos, tiempo, talentos y hogares para impartir <strong>talleres formativos de artes, música, inglés, apoyo escolar, entrega de alimentos, ropa y celebraciones navideñas</strong>. Estas memorias son el testimonio fotográfico y humano de esa siembra familiar desinteresada que hoy decidimos consolidar como <strong>Fundación ADN de Amor</strong> para multiplicar nuestro alcance, formalizar alianzas y transformar juntos muchas más historias de vida.
                </p>
            </div>
        </div>
    </section>

    <!-- De la Labor Familiar a la Fundación Formal -->
    <section class="section" style="padding-top: 0; padding-bottom: 40px;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                
                <!-- Columna 1 -->
                <div style="background: #ffffff; border-radius: 18px; padding: 2rem; box-shadow: var(--shadow); display: flex; flex-direction: column; border-top: 4px solid var(--secondary);">
                    <div style="width: 55px; height: 55px; border-radius: 12px; background: rgba(0, 16, 62, 0.08); display: flex; align-items: center; justify-content: center; margin-bottom: 1.2rem;">
                        <i class="fas fa-heart" style="font-size: 1.5rem; color: var(--secondary);"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; color: var(--secondary); margin-bottom: 0.8rem;">1. Legado de Doña Nidia</h4>
                    <p style="font-size: 0.98rem; color: var(--text-dark); line-height: 1.7; margin: 0;">
                        Pionera en llevar esperanza, brigadas y vivienda a Gingarabá (Chocó) y en centros carcelarios del Eje Cafetero (1980–2008), sembrando en sus hijos y nieta la vocación del servicio cristiano desinteresado.
                    </p>
                </div>

                <!-- Columna 2 -->
                <div style="background: #ffffff; border-radius: 18px; padding: 2rem; box-shadow: var(--shadow); display: flex; flex-direction: column; border-top: 4px solid var(--primary);">
                    <div style="width: 55px; height: 55px; border-radius: 12px; background: rgba(230, 57, 70, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 1.2rem;">
                        <i class="fas fa-hands-helping" style="font-size: 1.5rem; color: var(--primary);"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; color: var(--primary); margin-bottom: 0.8rem;">2. Más de 15 Años de Labor Familiar</h4>
                    <p style="font-size: 0.98rem; color: var(--text-dark); line-height: 1.7; margin: 0;">
                        Talleres formativos de música, inglés, artes plásticas, entrega periódica de mercados, brigadas solidarias y navidades comunitarias sostenidas con recursos propios y profundo compromiso.
                    </p>
                </div>

                <!-- Columna 3 -->
                <div style="background: #ffffff; border-radius: 18px; padding: 2rem; box-shadow: var(--shadow); display: flex; flex-direction: column; border-top: 4px solid #2a9d8f;">
                    <div style="width: 55px; height: 55px; border-radius: 12px; background: rgba(42, 157, 143, 0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 1.2rem;">
                        <i class="fas fa-building-columns" style="font-size: 1.5rem; color: #2a9d8f;"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; color: var(--secondary); margin-bottom: 0.8rem;">3. Constitución Formal y Futuro</h4>
                    <p style="font-size: 0.98rem; color: var(--text-dark); line-height: 1.7; margin: 0;">
                        Hoy formalizamos legalmente la Fundación ADN de Amor para consolidar el Centro de Desarrollo de Talentos (CDT en Vereda Guacas), formalizar convenios empresariales y recibir voluntarios y practicantes.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Actividades -->
    <section class="section" style="padding-top: 20px; padding-bottom: 50px;">
        <div class="container">
            <h3 style="text-align: center; color: var(--secondary); font-size: 2rem; margin-bottom: 0.8rem;">Ejes de Nuestra Labor Familiar</h3>
            <p style="text-align: center; color: var(--text-dark); font-size: 1.05rem; max-width: 750px; margin: 0 auto 3rem auto;">
                Iniciativas que hemos desarrollado directamente con las familias y que hoy integran los programas oficiales de la Fundación:
            </p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
                <!-- Card 1 -->
                <div style="display: flex; gap: 1.5rem; align-items: flex-start; background: #fff; padding: 1.8rem; border-radius: 15px; box-shadow: var(--shadow);">
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: rgba(230, 57, 70, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 2px solid rgba(230, 57, 70, 0.3);">
                        <i class="fas fa-palette" style="font-size: 1.8rem; color: var(--primary);"></i>
                    </div>
                    <div>
                        <h4 style="color: var(--secondary); font-size: 1.25rem; margin-bottom: 0.6rem;">Formación en Talentos</h4>
                        <p style="color: var(--text-dark); font-size: 1rem; line-height: 1.6; margin: 0;">Talleres prácticos de inglés, arte, música, danza y valores para fortalecer las habilidades cognitivas, expresivas y proyectos de vida en niños y adolescentes.</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div style="display: flex; gap: 1.5rem; align-items: flex-start; background: #fff; padding: 1.8rem; border-radius: 15px; box-shadow: var(--shadow);">
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: rgba(230, 57, 70, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 2px solid rgba(230, 57, 70, 0.3);">
                        <i class="fas fa-hand-holding-heart" style="font-size: 1.8rem; color: var(--primary);"></i>
                    </div>
                    <div>
                        <h4 style="color: var(--secondary); font-size: 1.25rem; margin-bottom: 0.6rem;">Programa Esperanza y Familia</h4>
                        <p style="color: var(--text-dark); font-size: 1rem; line-height: 1.6; margin: 0;">Acompañamiento cercano a familias vulnerables y madres cabeza de hogar mediante entrega de alimentos, ropa, calzado y celebraciones navideñas comunitarias.</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div style="display: flex; gap: 1.5rem; align-items: flex-start; background: #fff; padding: 1.8rem; border-radius: 15px; box-shadow: var(--shadow);">
                    <div style="width: 70px; height: 70px; border-radius: 50%; background: rgba(230, 57, 70, 0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0; border: 2px solid rgba(230, 57, 70, 0.3);">
                        <i class="fas fa-map-location-dot" style="font-size: 1.8rem; color: var(--primary);"></i>
                    </div>
                    <div>
                        <h4 style="color: var(--secondary); font-size: 1.25rem; margin-bottom: 0.6rem;">Presencia en Comunidades</h4>
                        <p style="color: var(--text-dark); font-size: 1rem; line-height: 1.6; margin: 0;">Visitas y jornadas solidarias en sectores vulnerables de Pereira, Santa Rosa de Cabal y la histórica labor social y humanitaria en Gingarabá (Chocó).</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galería en Carruseles -->
    <section class="section" style="padding-top: 0; padding-bottom: 50px;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
                
                <!-- Carrusel 1: Talleres y Talentos -->
                <div style="text-align: center; display: flex; flex-direction: column; background: #fff; padding: 1.5rem; border-radius: 20px; box-shadow: var(--shadow);">
                    <div style="position: relative; display: flex; align-items: center; justify-content: center; border-radius: 15px; margin-bottom: 1.2rem;">
                        <button onclick="this.parentElement.querySelector('.carousel-container').scrollBy({left: -320, behavior: 'smooth'})" style="position: absolute; left: -12px; z-index: 10; width: 38px; height: 38px; border-radius: 50%; background: var(--secondary); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.25);"><i class="fas fa-chevron-left"></i></button>
                        
                        <div class="carousel-container" style="display: flex; overflow-x: auto; scroll-snap-type: x mandatory; scrollbar-width: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.08); width: 100%;">
                            <img src="FOTOS BANNERS/CDT_ingles_clase_real.webp" alt="Clase de inglés" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                            <img src="FOTOS BANNERS/CDT_arte_nina_pintura.webp" alt="Taller de arte y creatividad" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                            <img src="FOTOS BANNERS/CDT_musica_nino_guitarra.webp" alt="Taller de música" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                            <img src="FOTOS BANNERS/CDT_talentos_completo_ninos.webp" alt="Desarrollo de Talentos" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                        </div>

                        <button onclick="this.parentElement.querySelector('.carousel-container').scrollBy({left: 320, behavior: 'smooth'})" style="position: absolute; right: -12px; z-index: 10; width: 38px; height: 38px; border-radius: 50%; background: var(--secondary); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.25);"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    
                    <div class="carousel-dots" style="display: flex; justify-content: center; gap: 8px; margin-bottom: 12px;">
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: var(--secondary); cursor: pointer; transition: background 0.3s;"></div>
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: rgba(0,16,62,0.2); cursor: pointer; transition: background 0.3s;"></div>
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: rgba(0,16,62,0.2); cursor: pointer; transition: background 0.3s;"></div>
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: rgba(0,16,62,0.2); cursor: pointer; transition: background 0.3s;"></div>
                    </div>
                    <p style="color: var(--secondary); font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-size: 1.1rem; margin-top: auto; margin-bottom: 0;">
                        <i class="fas fa-palette" style="color: var(--primary);"></i> Talleres y Formación de Talentos
                    </p>
                </div>

                <!-- Carrusel 2: Navidades y Familias -->
                <div style="text-align: center; display: flex; flex-direction: column; background: #fff; padding: 1.5rem; border-radius: 20px; box-shadow: var(--shadow);">
                    <div style="position: relative; display: flex; align-items: center; justify-content: center; border-radius: 15px; margin-bottom: 1.2rem;">
                        <button onclick="this.parentElement.querySelector('.carousel-container').scrollBy({left: -320, behavior: 'smooth'})" style="position: absolute; left: -12px; z-index: 10; width: 38px; height: 38px; border-radius: 50%; background: var(--secondary); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.25);"><i class="fas fa-chevron-left"></i></button>
                        
                        <div class="carousel-container" style="display: flex; overflow-x: auto; scroll-snap-type: x mandatory; scrollbar-width: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.08); width: 100%;">
                            <img src="FOTOS BANNERS/FOTO BANNER NAVIDADES SELECCION.webp" alt="Jornadas Navideñas" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                            <img src="FOTOS BANNERS/foto prinicpal 2 niños banner final.webp" alt="Acompañamiento a la infancia" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                            <img src="FOTOS BANNERS/foto sandra guamos banner final mejor.webp" alt="Acompañamiento comunitario" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                        </div>

                        <button onclick="this.parentElement.querySelector('.carousel-container').scrollBy({left: 320, behavior: 'smooth'})" style="position: absolute; right: -12px; z-index: 10; width: 38px; height: 38px; border-radius: 50%; background: var(--secondary); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.25);"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    
                    <div class="carousel-dots" style="display: flex; justify-content: center; gap: 8px; margin-bottom: 12px;">
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: var(--secondary); cursor: pointer; transition: background 0.3s;"></div>
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: rgba(0,16,62,0.2); cursor: pointer; transition: background 0.3s;"></div>
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: rgba(0,16,62,0.2); cursor: pointer; transition: background 0.3s;"></div>
                    </div>
                    <p style="color: var(--secondary); font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-size: 1.1rem; margin-top: auto; margin-bottom: 0;">
                        <i class="fas fa-gift" style="color: var(--primary);"></i> Jornadas Navideñas y Apoyo Familiar
                    </p>
                </div>

                <!-- Carrusel 3: Chocó y Comunidades -->
                <div style="text-align: center; display: flex; flex-direction: column; background: #fff; padding: 1.5rem; border-radius: 20px; box-shadow: var(--shadow);">
                    <div style="position: relative; display: flex; align-items: center; justify-content: center; border-radius: 15px; margin-bottom: 1.2rem;">
                        <button onclick="this.parentElement.querySelector('.carousel-container').scrollBy({left: -320, behavior: 'smooth'})" style="position: absolute; left: -12px; z-index: 10; width: 38px; height: 38px; border-radius: 50%; background: var(--secondary); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.25);"><i class="fas fa-chevron-left"></i></button>
                        
                        <div class="carousel-container" style="display: flex; overflow-x: auto; scroll-snap-type: x mandatory; scrollbar-width: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.08); width: 100%;">
                            <img src="FOTOS BANNERS/mision_choco_ninos_limpio.webp" alt="Misión Chocó Gingarabá" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                            <img src="FOTOS BANNERS/foto leo chicos mejorada ia.webp" alt="Acompañamiento comunitario" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                            <img src="FOTOS BANNERS/FOTO GRUPO JOVENES.webp" alt="Liderazgo y jóvenes" style="flex: 0 0 100%; width: 100%; height: 280px; object-fit: cover; scroll-snap-align: center;" loading="lazy" decoding="async">
                        </div>

                        <button onclick="this.parentElement.querySelector('.carousel-container').scrollBy({left: 320, behavior: 'smooth'})" style="position: absolute; right: -12px; z-index: 10; width: 38px; height: 38px; border-radius: 50%; background: var(--secondary); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 5px 15px rgba(0,0,0,0.25);"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    
                    <div class="carousel-dots" style="display: flex; justify-content: center; gap: 8px; margin-bottom: 12px;">
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: var(--secondary); cursor: pointer; transition: background 0.3s;"></div>
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: rgba(0,16,62,0.2); cursor: pointer; transition: background 0.3s;"></div>
                        <div class="dot" style="width: 10px; height: 10px; border-radius: 50%; background: rgba(0,16,62,0.2); cursor: pointer; transition: background 0.3s;"></div>
                    </div>
                    <p style="color: var(--secondary); font-weight: 700; display: flex; align-items: center; justify-content: center; gap: 0.5rem; font-size: 1.1rem; margin-top: auto; margin-bottom: 0;">
                        <i class="fas fa-earth-americas" style="color: var(--primary);"></i> Misión Chocó y Labor Comunitaria
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Banner Final -->
    <section class="section" style="padding-top: 10px; padding-bottom: 80px;">
        <div class="container">
            <div style="background: linear-gradient(135deg, rgba(230, 57, 70, 0.08) 0%, rgba(0, 16, 62, 0.05) 100%); border-radius: 24px; padding: 3rem; display: flex; align-items: center; justify-content: space-between; gap: 3rem; flex-wrap: wrap; border: 1px solid rgba(230, 57, 70, 0.15);">
                
                <div style="display: flex; align-items: center; gap: 2rem; flex: 1; min-width: 300px;">
                    <!-- Icono Corazon y Cruz -->
                    <div style="position: relative; color: var(--secondary); flex-shrink: 0; display: flex; align-items: center; justify-content: center; width: 90px; height: 90px; background: #fff; border-radius: 50%; box-shadow: 0 8px 20px rgba(0,0,0,0.08);">
                        <i class="far fa-heart" style="font-size: 3.5rem; color: var(--primary);"></i>
                        <i class="fas fa-plus" style="position: absolute; font-size: 1.4rem; top: 50%; left: 50%; transform: translate(-50%, -50%); color: var(--secondary);"></i>
                    </div>

                    <!-- Texto -->
                    <div>
                        <h4 style="color: var(--secondary); font-size: 1.35rem; margin-bottom: 0.5rem;">Una labor viva que sigue creciendo</h4>
                        <p style="color: var(--text-dark); font-size: 1.05rem; line-height: 1.6; margin: 0; font-weight: 500;">
                            Cada sonrisa compartida, cada niño abrazado y cada semilla sembrada en familia durante estos años nos impulsan a seguir adelante. Hoy, con la constitución formal de la <strong>Fundación ADN de Amor</strong>, renovamos nuestra fe y abrimos los brazos para caminar junto a ti.
                        </p>
                    </div>
                </div>

                <!-- Cursiva y Botones -->
                <div style="flex-shrink: 0; text-align: center; display: flex; flex-direction: column; align-items: center; gap: 1.2rem;">
                    <div style="position: relative;">
                        <span style="font-family: 'Great Vibes', cursive; font-size: 3.2rem; color: var(--primary); line-height: 1.1; display: block;">¡Seguimos <br>caminando juntos!</span>
                        <i class="far fa-heart" style="color: var(--primary); font-size: 1.2rem; position: absolute; bottom: 5px; right: -15px;"></i>
                    </div>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
                        <a href="programas#donde-estamos" class="btn btn-outline" style="font-size: 0.88rem; padding: 8px 18px;">Dónde Estamos</a>
                        <a href="/#donar" class="btn btn-primary" style="font-size: 0.88rem; padding: 8px 18px;">Apoya Nuestra Labor</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
    <script>
        document.querySelectorAll('.carousel-container').forEach(container => {
            const dots = container.closest('div[style*="text-align: center"]').querySelectorAll('.dot');
            
            // Scroll listener to update active dot
            container.addEventListener('scroll', () => {
                const index = Math.round(container.scrollLeft / container.clientWidth);
                dots.forEach((dot, i) => {
                    dot.style.background = i === index ? 'var(--secondary)' : 'rgba(0,16,62,0.2)';
                });
            });

            // Click listener on dots
            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => {
                    container.scrollTo({
                        left: i * container.clientWidth,
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>

</html>
