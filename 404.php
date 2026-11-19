<?php 
http_response_code(404);
require_once 'includes/db.php'; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página No Encontrada (404) | Fundación ADN de Amor</title>
    <meta name="description" content="La página que buscas no está disponible en Fundación ADN de Amor. Vuelve a nuestro inicio para conocer nuestros programas y cómo ayudar.">
    <meta name="robots" content="noindex, follow">

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
        .error-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 1.5rem 4rem 1.5rem;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            text-align: center;
        }
        .error-card {
            max-width: 680px;
            margin: 0 auto;
            background: #ffffff;
            padding: 3.5rem 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 16, 62, 0.06);
            border: 1px solid rgba(0, 16, 62, 0.08);
        }
        .error-number {
            font-family: 'Outfit', sans-serif;
            font-size: 5.5rem;
            font-weight: 800;
            line-height: 1;
            background: linear-gradient(135deg, var(--primary) 0%, #00103E 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }
        .error-badge {
            display: inline-block;
            background: rgba(234, 90, 0, 0.1);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .error-card h1 {
            font-size: 2rem;
            color: var(--secondary);
            margin-bottom: 1rem;
            font-weight: 700;
        }
        .error-card p {
            font-size: 1.1rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 2.2rem;
        }
        .error-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        @media (max-width: 768px) {
            .error-card {
                padding: 2.5rem 1.5rem;
            }
            .error-number {
                font-size: 4.2rem;
            }
            .error-card h1 {
                font-size: 1.6rem;
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

    <!-- Error Section -->
    <main class="error-section">
        <div class="error-card">
            <div class="error-number">404</div>
            <span class="error-badge"><i class="fas fa-heart-broken"></i> Página No Encontrada</span>
            <h1>Esta página no está disponible, pero la esperanza siempre continúa</h1>
            <p>El enlace que intentaste abrir no existe, cambió de dirección o se encuentra temporalmente fuera de servicio. No te preocupes, puedes volver a navegar o ponerte en contacto con nosotros.</p>
            
            <div class="error-buttons">
                <a href="/" class="btn btn-primary btn-large">
                    <i class="fas fa-home" style="margin-right: 6px;"></i> Volver al Inicio
                </a>
                <a href="https://wa.me/573162522445" target="_blank" class="btn btn-large" style="background: linear-gradient(135deg, #E63946 0%, #00103E 100%); color: #ffffff; border: none;">
                    <i class="fab fa-whatsapp" style="margin-right: 6px;"></i> Escríbenos a WhatsApp
                </a>
                <a href="programas" class="btn btn-outline" style="border-color: var(--secondary); color: var(--secondary);">
                    Conoce Qué Hacemos
                </a>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
</body>

</html>
