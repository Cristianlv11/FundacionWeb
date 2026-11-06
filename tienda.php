<?php 
require_once 'includes/db.php'; 

$products = [];
try {
    // 1. Asegurar columnas de categoría, descripción y personalizable en la base de datos
    $existingCols = [];
    $colStmt = $pdo->query("SHOW COLUMNS FROM products");
    while ($row = $colStmt->fetch(PDO::FETCH_ASSOC)) {
        $existingCols[] = strtolower($row['Field']);
    }

    if (!in_array('category', $existingCols)) {
        $pdo->exec("ALTER TABLE products ADD COLUMN category VARCHAR(50) DEFAULT 'general'");
    }
    if (!in_array('description', $existingCols)) {
        $pdo->exec("ALTER TABLE products ADD COLUMN description TEXT NULL");
    }
    if (!in_array('is_customizable', $existingCols)) {
        $pdo->exec("ALTER TABLE products ADD COLUMN is_customizable TINYINT(1) DEFAULT 0");
    }

    // Actualizar enlaces antiguos para que todos apunten al número oficial 573162522445
    $pdo->exec("UPDATE products SET whatsapp_link = REPLACE(whatsapp_link, '573000000000', '573162522445') WHERE whatsapp_link LIKE '%573000000000%'");
    $pdo->exec("UPDATE products SET whatsapp_link = REPLACE(whatsapp_link, '573219602652', '573162522445') WHERE whatsapp_link LIKE '%573219602652%'");

    // 1b. Migración única (nov 2026): fotos reales, quitar productos de ejemplo y productos nuevos.
    // Se registra en site_migrations para no pisar cambios hechos después desde el panel.
    $pdo->exec("CREATE TABLE IF NOT EXISTS site_migrations (name VARCHAR(100) PRIMARY KEY, applied_at DATETIME DEFAULT CURRENT_TIMESTAMP)");
    $migName = 'tienda_fotos_reales_2026_11';
    $done = $pdo->prepare("SELECT COUNT(*) FROM site_migrations WHERE name = ?");
    $done->execute([$migName]);
    if ((int)$done->fetchColumn() === 0) {
        // Productos de ejemplo del primer montaje (julio 2026)
        $pdo->exec("DELETE FROM products WHERE id IN (1,2,3,4,5) AND name IN ('Camiseta Solidaria Blanca','Mug ADN de Amor','Agenda de Gratitud 2025','Pulsera Fe y Esperanza','Kit Navidad Solidaria')");
        $pdo->exec("UPDATE products SET name = 'Pulsera de Amor' WHERE name = 'Pulcera de Amor'");

        $img = $pdo->prepare("UPDATE products SET image = ? WHERE name = ?");
        foreach ([
            'Camiseta Solidaria Personalizable'                => 'uploads/tienda/real_camiseta_carinito.jpg',
            'Mug Cerámico Personalizado (11 oz)'               => 'uploads/tienda/vg_mug.jpg',
            'Termo Metálico Deportivo Personalizable'          => 'uploads/tienda/vg_termo.jpg',
            'Rompecabezas Personalizado con Foto (120 piezas)' => 'uploads/tienda/vg_rompecabezas.jpg',
            'Rompecabezas Familiar Solidario (300 piezas)'     => 'uploads/tienda/vg_rompecabezas_detalle.jpg',
            'Rompecabezas Infantil Educativo (48 piezas)'      => 'uploads/tienda/vg_rompecabezas_detalle.jpg',
        ] as $pName => $pImg) {
            $img->execute([$pImg, $pName]);
        }

        // Precios de aliado: VG Personalizados le deja cada producto a la fundación $5.000 por debajo
        // de su precio de venta, y la fundación lo vende $5.000 por encima (p. ej. camiseta 25.000 → 30.000).
        $precio = $pdo->prepare("UPDATE products SET price = ?, discount = NULL WHERE name = ?");
        foreach ([
            'Camiseta Solidaria Personalizable'                => 30000, // VG 25.000
            'Mug Cerámico Personalizado (11 oz)'               => 30000, // VG 25.000
            'Termo Metálico Deportivo Personalizable'          => 40000, // VG 35.000
            'Rompecabezas Personalizado con Foto (120 piezas)' => 35000, // VG 30.000
        ] as $pName => $pPrice) {
            $precio->execute([$pPrice, $pName]);
        }

        $exists = $pdo->prepare("SELECT COUNT(*) FROM products WHERE name = ?");
        $ins = $pdo->prepare("INSERT INTO products (name, price, discount, whatsapp_link, image, category, description, is_customizable) VALUES (?, ?, NULL, ?, ?, ?, ?, 1)");
        foreach ([
            ['Tula Personalizada con tu Diseño', 30000, 'uploads/tienda/real_tula_maria_paz.jpg', 'accesorios',
                'Tula en lona color crudo con asas largas, estampada con el nombre, personaje o diseño que elijas. Ideal para el colegio, regalos de cumpleaños y fechas especiales.'],
            ['Cojín Personalizado con Fotos', 47000,'uploads/tienda/vg_cojin.jpg', 'accesorios',
                'Cojín en felpa suave con relleno incluido. Estampa tus fotos familiares, una dedicatoria o tu diseño favorito; los colores no se borran con los lavados.'],
            ['Libreta Personalizada de Pasta Dura', 50000,'uploads/tienda/vg_libreta.jpg', 'accesorios',
                'Libreta con anillado metálico y portada en pasta dura personalizada con tu nombre, frase, logo o diseño. Perfecta para el colegio, la oficina o como regalo.'],
        ] as [$pName, $pPrice, $pImg, $pCat, $pDesc]) {
            $exists->execute([$pName]);
            if ((int)$exists->fetchColumn() === 0) {
                $msg = "¡Hola Fundación ADN de Amor! Lo quiero: me gustaría personalizar el producto \"{$pName}\". ¿Cómo les envío mi foto o diseño?";
                $ins->execute([$pName, $pPrice, 'https://wa.me/573162522445?text=' . urlencode($msg), $pImg, $pCat, $pDesc]);
            }
        }

        $pdo->prepare("INSERT INTO site_migrations (name) VALUES (?)")->execute([$migName]);
    }

    // 1c. Migración única: fotos reales de VG Personalizados editadas en estilo estudio + productos nuevos.
    $migName2 = 'tienda_fotos_estudio_2026_11b';
    $done->execute([$migName2]);
    if ((int)$done->fetchColumn() === 0) {
        $img = $pdo->prepare("UPDATE products SET image = ? WHERE name = ?");
        foreach ([
            'Camiseta Solidaria Personalizable'       => 'uploads/tienda/studio_camiseta_carinito.jpg',
            'Mug Cerámico Personalizado (11 oz)'      => 'uploads/tienda/studio_mug.jpg',
            'Termo Metálico Deportivo Personalizable' => 'uploads/tienda/studio_termo.jpg',
            'Cojín Personalizado con Fotos'           => 'uploads/tienda/studio_cojin.jpg',
            'Tula Personalizada con tu Diseño'        => 'uploads/tienda/studio_tula_maria_paz.jpg',
        ] as $pName => $pImg) {
            $img->execute([$pImg, $pName]);
        }

        $exists = $pdo->prepare("SELECT COUNT(*) FROM products WHERE name = ?");
        $ins = $pdo->prepare("INSERT INTO products (name, price, discount, whatsapp_link, image, category, description, is_customizable) VALUES (?, ?, NULL, ?, ?, 'ropa', ?, ?)");
        foreach ([
            ['Camiseta Oficial Fundación ADN de Amor', 30000, 'uploads/tienda/studio_camiseta_oficial_adn.jpg', 0,
                'La camiseta de nuestra fundación, con el logo ADN de Amor estampado al frente. Llévala con orgullo y apoya directamente a los niños del Centro de Desarrollo de Talentos.',
                '¡Hola Fundación ADN de Amor! Lo quiero: me interesa la Camiseta Oficial ADN de Amor. ¿Qué tallas tienen disponibles?'],
            ['Camiseta con la Foto de tu Mascota', 30000, 'uploads/tienda/studio_camiseta_mascota.jpg', 1,
                'Estampamos a tu perro o gato con su nombre en una camiseta negra o blanca. Envíanos una foto nítida y nosotros armamos el diseño para que lo apruebes antes de estampar.',
                '¡Hola Fundación ADN de Amor! Lo quiero: me gustaría una Camiseta con la Foto de mi Mascota. ¿Cómo les envío la foto?'],
        ] as [$pName, $pPrice, $pImg, $pCustom, $pDesc, $pMsg]) {
            $exists->execute([$pName]);
            if ((int)$exists->fetchColumn() === 0) {
                $ins->execute([$pName, $pPrice, 'https://wa.me/573162522445?text=' . urlencode($pMsg), $pImg, $pDesc, $pCustom]);
            }
        }

        $pdo->prepare("INSERT INTO site_migrations (name) VALUES (?)")->execute([$migName2]);
    }

    // 1d. Migración única: el buzo usa los básicos del catálogo del proveedor de VG (buzo franela en colores).
    $migName3 = 'tienda_buzo_basicos_2026_11c';
    $done->execute([$migName3]);
    if ((int)$done->fetchColumn() === 0) {
        $pdo->prepare("UPDATE products SET image = ? WHERE name = ?")
            ->execute(['uploads/tienda/studio_buzo_basicos.jpg', 'Buzo / Hoodie con Capota Personalizable']);
        $pdo->prepare("INSERT INTO site_migrations (name) VALUES (?)")->execute([$migName3]);
    }

    // 2. Verificar si existen rompecabezas o productos personalizables; si no, inicializar
    $checkPuzzles = $pdo->query("SELECT COUNT(*) FROM products WHERE category = 'rompecabezas'")->fetchColumn();
    if ($checkPuzzles == 0 && file_exists(__DIR__ . '/admin/setup_tienda_personalizada.php')) {
        // Ejecutar configuración de catálogo de forma silenciosa
        ob_start();
        include __DIR__ . '/admin/setup_tienda_personalizada.php';
        ob_end_clean();
    }

    $stmt = $pdo->query("SELECT * FROM products ORDER BY is_customizable DESC, id ASC");
    if ($stmt) {
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    // Silencioso, si la base de datos tuviera algún problema momentáneo
}

// Catálogo de respaldo completo por seguridad (para garantizar 100% de disponibilidad)
if (empty($products)) {
    $wa_phone = '573162522445';
    $products = [
        [
            'id' => 101,
            'name' => 'Camiseta Solidaria Personalizable',
            'price' => 30000,
            'discount' => null,
            'category' => 'ropa',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/studio_camiseta_carinito.jpg',
            'description' => 'Camiseta en algodón 100% peinado premium (180g). Personalízala con tu foto, frase o logo. Tallas de niño a adulto (XS a XL).',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me interesa personalizar la Camiseta Solidaria. ¿Cómo les envío mi diseño o foto?")
        ],
        [
            'id' => 102,
            'name' => 'Buzo / Hoodie con Capota Personalizable',
            'price' => 75000,
            'discount' => 68000,
            'category' => 'ropa',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/studio_buzo_basicos.jpg',
            'description' => 'Buzo térmico perchado de suave textura con capota y bolsillo. Estampado duradero con tu diseño, mensaje o iniciales.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me gustaría encargar un Buzo/Hoodie Personalizado. ¿Qué tallas y colores tienen?")
        ],
        [
            'id' => 103,
            'name' => 'Gorra Solidaria Personalizable',
            'price' => 28000,
            'discount' => 24000,
            'category' => 'ropa',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/gorra_personalizada.jpg',
            'description' => 'Gorra ajustable tipo drill o trucker con excelente acabado. Personalizada con tu nombre, iniciales o logo.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, quiero personalizar una Gorra Solidaria. ¿Cómo puedo hacer el pedido?")
        ],
        [
            'id' => 104,
            'name' => 'Mug Cerámico Personalizado (11 oz)',
            'price' => 30000,
            'discount' => null,
            'category' => 'vasos',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/studio_mug.jpg',
            'description' => 'Taza de cerámica blanca brillante premium (11 oz). Impresión a full color apta para microondas y lavavajillas con tu foto o dedicatoria.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, quiero pedir un Mug Cerámico Personalizado con foto. ¿Cómo se los envío?")
        ],
        [
            'id' => 105,
            'name' => 'Mug Mágico Térmico Personalizado',
            'price' => 28000,
            'discount' => 24000,
            'category' => 'vasos',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/mug_magico.jpg',
            'description' => 'Taza que revela tu foto o dedicatoria mágica cuando viertes café o líquido caliente. ¡El regalo sorpresa perfecto!',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me interesa el Mug Mágico Personalizado. ¿Me explican cómo enviar la foto?")
        ],
        [
            'id' => 106,
            'name' => 'Termo Metálico Deportivo Personalizable',
            'price' => 40000,
            'discount' => null,
            'category' => 'vasos',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/studio_termo.jpg',
            'description' => 'Botella térmica de 600ml en acero inoxidable con tapa hermética y mosquetón. Grabado o estampado duradero con tu nombre o logo.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, quiero encargar un Termo Metálico Deportivo Personalizado. ¿Qué colores tienen?")
        ],
        [
            'id' => 107,
            'name' => 'Rompecabezas Personalizado con Foto (120 piezas)',
            'price' => 35000,
            'discount' => null,
            'category' => 'rompecabezas',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/vg_rompecabezas.jpg',
            'description' => 'Rompecabezas en cartón rígido brillante con acabado perlado. Personalizado con tu foto familiar favorita. Incluye caja personalizada.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, quiero encargar un Rompecabezas Personalizado con Foto de 120 piezas. ¿Cuál es el procedimiento?")
        ],
        [
            'id' => 108,
            'name' => 'Rompecabezas Familiar Solidario (300 piezas)',
            'price' => 48000,
            'discount' => 42000,
            'category' => 'rompecabezas',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/vg_rompecabezas_detalle.jpg',
            'description' => 'Rompecabezas de gran formato (300 piezas) para armar y disfrutar en familia, convirtiendo tus fotos en un juego con propósito.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me gustaría el Rompecabezas Familiar de 300 piezas. ¿A qué resolución debe ser la foto?")
        ],
        [
            'id' => 109,
            'name' => 'Rompecabezas Infantil Educativo (48 piezas)',
            'price' => 26000,
            'discount' => 22000,
            'category' => 'rompecabezas',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/vg_rompecabezas_detalle.jpg',
            'description' => 'Diseñado para niños pequeños con piezas grandes y cartón extra resistente. Personalízalo con el nombre del niño o motivos didácticos.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me interesa el Rompecabezas Infantil Educativo de 48 piezas personalizado.")
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Solidaria y Productos Personalizables | Fundación ADN de Amor</title>
    <meta name="description"
        content="Tienda Solidaria ADN de Amor: ropa, vasos, mugs y rompecabezas 100% personalizables con tu foto o mensaje. Cada compra financia el Centro de Desarrollo de Talentos (CDT) y apoya a niños y familias vulnerables.">
    <link rel="canonical" href="https://fundacionadndeamor.org/tienda">

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

        /* Guía de Personalización */
        .custom-steps-section {
            background: #ffffff;
            padding: 2.5rem 0 3.5rem 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .custom-steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.8rem;
        }
        .step-box {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1.8rem 1.5rem;
            text-align: center;
            border: 1px solid #e2e8f0;
            position: relative;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .step-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            border-color: rgba(230, 57, 70, 0.3);
        }
        .step-num {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0 auto 1rem auto;
            box-shadow: 0 4px 10px rgba(230, 57, 70, 0.3);
        }
        .step-box h4 {
            color: var(--secondary);
            font-size: 1.15rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }
        .step-box p {
            color: var(--text-dark);
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Sección de Productos */
        .store-main-section {
            background-color: #f8fafc;
            padding: 4rem 0 6rem 0;
        }

        /* Barra de Filtros */
        .category-filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            justify-content: center;
            margin-bottom: 3rem;
        }
        .filter-btn {
            background: #ffffff;
            border: 1px solid #d1d5db;
            color: var(--text-dark);
            padding: 0.65rem 1.4rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .filter-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: rgba(230, 57, 70, 0.04);
        }
        .filter-btn.active {
            background: var(--secondary);
            color: #ffffff;
            border-color: var(--secondary);
            box-shadow: 0 4px 12px rgba(0, 16, 62, 0.2);
        }
        .filter-btn .count-badge {
            background: rgba(0, 0, 0, 0.08);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
        }
        .filter-btn.active .count-badge {
            background: rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        /* Product Cards */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 2.2rem;
        }
        .product-card {
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }
        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 30px -10px rgba(0, 0, 0, 0.12);
            border-color: #cbd5e1;
        }
        .product-img-wrapper {
            position: relative;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            background: #f1f5f9;
        }
        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            transition: transform 0.6s ease;
        }
        .product-card:hover .product-img {
            transform: scale(1.06);
        }
        .badge-custom {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(135deg, #ea5a00 0%, #e63946 100%);
            color: white;
            padding: 0.35rem 0.85rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            z-index: 2;
            box-shadow: 0 4px 10px rgba(230, 57, 70, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .badge-offer {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #111827;
            color: white;
            padding: 0.3rem 0.75rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.7rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            z-index: 2;
        }
        .product-content {
            padding: 1.6rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .product-category-tag {
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary);
            margin-bottom: 0.4rem;
            display: inline-block;
        }
        .product-title {
            font-family: var(--font-heading);
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 0.6rem;
            line-height: 1.35;
        }
        .product-desc {
            font-size: 0.92rem;
            color: #4b5563;
            line-height: 1.55;
            margin-bottom: 1.2rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .product-price-wrapper {
            display: flex;
            align-items: baseline;
            gap: 0.8rem;
            margin-bottom: 1.4rem;
            margin-top: auto;
        }
        .price-current {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--primary);
        }
        .price-old {
            font-size: 0.95rem;
            text-decoration: line-through;
            color: #9ca3af;
            font-weight: 500;
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
        .btn-buy.btn-custom-action {
            background: linear-gradient(135deg, #E63946 0%, #00103e 100%);
            border: none;
        }
        .btn-buy.btn-custom-action:hover {
            background: linear-gradient(135deg, #ff4d5a 0%, #001859 100%);
        }

        /* Banner Corporativo */
        .store-corporate-box {
            background: linear-gradient(135deg, #00103e 0%, #002266 100%);
            border-radius: 24px;
            padding: 3.5rem 3rem;
            color: white;
            margin-top: 5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2.5rem;
            flex-wrap: wrap;
            box-shadow: 0 15px 35px rgba(0, 16, 62, 0.2);
        }
        .store-corporate-box h3 {
            font-size: 2rem;
            color: #ffffff;
            margin-bottom: 0.8rem;
            font-family: var(--font-heading);
            font-weight: 700;
        }
        .store-corporate-box p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1.05rem;
            line-height: 1.7;
            max-width: 650px;
            margin: 0;
        }
        .store-corporate-box .corp-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        /* Vista ampliada del producto */
        .product-img-wrapper, .product-title { cursor: pointer; }
        .product-img-wrapper::after {
            content: "\f00e";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            right: 1rem;
            bottom: 1rem;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.92);
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.25s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
        }
        .product-card:hover .product-img-wrapper::after { opacity: 1; }
        .pv-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 16, 62, 0.72);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 16px;
            z-index: 10000;
        }
        .pv-overlay.open { display: flex; animation: fadeIn 0.25s ease; }
        .pv-box {
            background: #fff;
            border-radius: 20px;
            max-width: 960px;
            width: 100%;
            max-height: calc(100vh - 32px);
            overflow: auto;
            display: grid;
            grid-template-columns: 1.15fr 1fr;
            position: relative;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
        }
        .pv-img { background: #f1f5f9; display: flex; align-items: center; justify-content: center; }
        .pv-img img { width: 100%; height: 100%; max-height: 80vh; object-fit: contain; display: block; }
        .pv-info { padding: 2.2rem 2rem; display: flex; flex-direction: column; gap: 0.9rem; }
        .pv-info h3 { font-family: var(--font-heading); color: var(--secondary); font-size: 1.6rem; line-height: 1.3; margin: 0; }
        .pv-info p { color: #4b5563; line-height: 1.7; margin: 0; }
        .pv-info .product-price-wrapper { margin: 0.4rem 0 0.6rem 0; }
        .pv-close {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: rgba(255, 255, 255, 0.95);
            color: var(--secondary);
            font-size: 1.1rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 2;
        }
        body.pv-lock { overflow: hidden; }

        @media (max-width: 768px) {
            .pv-box { grid-template-columns: 1fr; }
            .pv-img img { max-height: 55vh; }
            .pv-info { padding: 1.5rem 1.25rem; }
            .pv-info h3 { font-size: 1.3rem; }
            .store-hero-title {
                font-size: 2.3rem;
            }
            .store-corporate-box {
                padding: 2rem 1.5rem;
                text-align: center;
                justify-content: center;
            }
            .store-corporate-box .corp-actions {
                justify-content: center;
                width: 100%;
            }
            .store-corporate-box .corp-actions a {
                width: 100%;
            }
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

                <a href="tienda" style="font-weight: 600; color: var(--primary); text-decoration: none;">
                    <i class="fas fa-shopping-bag nav-icon"></i>
                    <span class="nav-text">Tienda Solidaria</span>
                </a>
                
                <a href="blog" style="font-weight: 600; color: var(--text-dark); text-decoration: none;">
                    <i class="fas fa-newspaper nav-icon"></i>
                    <span class="nav-text">Blog</span>
                </a>

                <a href="/#contacto" class="btn btn-primary">Contacto</a>
            </nav>
        </div>
    </header>

    <!-- Tienda Hero -->
    <section class="store-hero">
        <div class="container">
            <div class="store-badge">
                <i class="fas fa-heart"></i> Tienda Solidaria ADN de Amor
            </div>
            <h1 class="store-hero-title">
                Productos con Causa y <br><span style="font-family: 'Great Vibes', cursive; font-weight: 400; color: var(--primary); font-size: 3.8rem;">Personalizables</span>
            </h1>
            <p class="store-hero-desc">
                Transforma tus regalos, recuerdos y dotaciones en oportunidades de vida. Personaliza <strong>ropa, vasos, termos y rompecabezas</strong> con tu foto familiar, nombre o mensaje inspirador. Con cada compra financias la formación de niños y jóvenes en el <strong>Centro de Desarrollo de Talentos (CDT)</strong>.
            </p>
        </div>
    </section>

    <!-- Paso a Paso para Personalizar -->
    <section class="custom-steps-section">
        <div class="container">
            <div style="text-align: center; margin-bottom: 2.5rem;">
                <h3 style="color: var(--secondary); font-size: 1.8rem; font-weight: 700; margin-bottom: 0.5rem;">
                    ¿Cómo personalizar tu producto?
                </h3>
                <p style="color: var(--text-dark); font-size: 1.05rem; margin: 0;">Un proceso sencillo, rápido y con impacto social directo:</p>
            </div>

            <div class="custom-steps-grid">
                <!-- Paso 1 -->
                <div class="step-box">
                    <div class="step-num">1</div>
                    <h4>Elige tu Producto</h4>
                    <p>Selecciona tu prenda, mug, termo o rompecabezas favorito en el catálogo de abajo.</p>
                </div>

                <!-- Paso 2 -->
                <div class="step-box">
                    <div class="step-num">2</div>
                    <h4>Envía tu Diseño o Foto</h4>
                    <p>Haz clic en el botón de WhatsApp y compártenos tu foto, frase o idea especial.</p>
                </div>

                <!-- Paso 3 -->
                <div class="step-box">
                    <div class="step-num">3</div>
                    <h4>Aprobación Previa</h4>
                    <p>Te enviamos una simulación digital para que des tu visto bueno antes de estampar.</p>
                </div>

                <!-- Paso 4 -->
                <div class="step-box">
                    <div class="step-num">4</div>
                    <h4>Entrega y Esperanza</h4>
                    <p>Recibe en tu puerta o recoge en nuestra sede. ¡Tu compra transforma una vida!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Catálogo de Productos -->
    <section class="store-main-section">
        <div class="container">
            
            <!-- Barra de Filtros por Categoría -->
            <div class="category-filter-bar">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-th-large"></i> Todos los Productos <span class="count-badge"><?php echo count($products); ?></span>
                </button>
                <button class="filter-btn" data-filter="ropa">
                    <i class="fas fa-tshirt"></i> Ropa Personalizable
                </button>
                <button class="filter-btn" data-filter="vasos">
                    <i class="fas fa-mug-hot"></i> Vasos y Mugs
                </button>
                <button class="filter-btn" data-filter="rompecabezas">
                    <i class="fas fa-puzzle-piece"></i> Rompecabezas
                </button>
                <button class="filter-btn" data-filter="accesorios">
                    <i class="fas fa-gift"></i> Accesorios y Otros
                </button>
            </div>

            <!-- Grid de productos -->
            <div class="product-grid" id="productGrid">
                <?php foreach ($products as $prod): ?>
                    <?php 
                        $name = $prod['name'] ?? '';
                        $image = $prod['image'] ?? '';
                        $price = isset($prod['price']) ? (float)$prod['price'] : 0.0;
                        $discount = !empty($prod['discount']) ? (float)$prod['discount'] : null;
                        $description = !empty($prod['description']) ? $prod['description'] : '';
                        $category = !empty($prod['category']) ? strtolower($prod['category']) : 'general';
                        $is_customizable = !empty($prod['is_customizable']) ? true : false;
                        
                        // Si la categoría no está seteada pero el nombre la sugiere
                        if ($category === 'general') {
                            if (stripos($name, 'Camiseta') !== false || stripos($name, 'Buzo') !== false || stripos($name, 'Gorra') !== false) {
                                $category = 'ropa';
                                $is_customizable = true;
                            } elseif (stripos($name, 'Mug') !== false || stripos($name, 'Termo') !== false || stripos($name, 'Vaso') !== false) {
                                $category = 'vasos';
                                $is_customizable = true;
                            } elseif (stripos($name, 'Rompecabezas') !== false || stripos($name, 'Puzzle') !== false) {
                                $category = 'rompecabezas';
                                $is_customizable = true;
                            } else {
                                $category = 'accesorios';
                            }
                        }

                        $target_wa = '573162522445';
                        $db_link = $prod['whatsapp_link'] ?? '';

                        // Extraer o generar el mensaje contextual
                        $msg = '';
                        if (!empty($db_link) && preg_match('/text=(.*)$/i', $db_link, $matches)) {
                            $msg = urldecode($matches[1]);
                        }

                        if (empty($msg) || stripos($msg, 'interesa') !== false || stripos($msg, 'quiero') === false) {
                            if ($is_customizable) {
                                $msg = "¡Hola Fundación ADN de Amor! Lo quiero: me gustaría personalizar el producto \"{$name}\". ¿Cómo les envío mi foto o diseño?";
                            } else {
                                $msg = "¡Hola Fundación ADN de Amor! Lo quiero: me interesa adquirir el producto \"{$name}\".";
                            }
                        }

                        // Enlace directo al WhatsApp oficial proporcionado: +57 316 252 2445
                        $wa_link = "https://wa.me/{$target_wa}?text=" . urlencode($msg);
                        
                        // Placeholder si la imagen estuviese vacía
                        if (empty($image)) {
                            $image = 'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=600&q=80'; 
                        }
                    ?>
                    <div class="product-card" data-category="<?php echo htmlspecialchars($category); ?>"
                        data-name="<?php echo htmlspecialchars($name); ?>"
                        data-image="<?php echo htmlspecialchars($image); ?>"
                        data-desc="<?php echo htmlspecialchars($description); ?>"
                        data-wa="<?php echo htmlspecialchars($wa_link); ?>"
                        data-price="$<?php echo number_format($discount ?: $price, 0, ',', '.'); ?> COP"
                        data-old="<?php echo $discount ? '$' . number_format($price, 0, ',', '.') . ' COP' : ''; ?>">
                        <div class="product-img-wrapper" role="button" tabindex="0" aria-label="Ver <?php echo htmlspecialchars($name); ?> en grande">
                            <img class="product-img" src="<?php echo htmlspecialchars($image); ?>" loading="lazy" decoding="async" alt="<?php echo htmlspecialchars($name); ?>">
                            
                            <?php if ($is_customizable): ?>
                                <div class="badge-custom">
                                    <i class="fas fa-magic"></i> Personalizable
                                </div>
                            <?php endif; ?>

                            <?php if ($discount): ?>
                                <div class="badge-offer">Oferta</div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="product-content">
                            <span class="product-category-tag">
                                <?php 
                                    switch ($category) {
                                        case 'ropa': echo '👕 Ropa Personalizada'; break;
                                        case 'vasos': echo '☕ Vasos y Mugs'; break;
                                        case 'rompecabezas': echo '🧩 Rompecabezas'; break;
                                        default: echo '✨ Colección Solidaria'; break;
                                    }
                                ?>
                            </span>

                            <h3 class="product-title" role="button" tabindex="0"><?php echo htmlspecialchars($name); ?></h3>

                            <?php if (!empty($description)): ?>
                                <p class="product-desc"><?php echo htmlspecialchars($description); ?></p>
                            <?php endif; ?>
                            
                            <div class="product-price-wrapper">
                                <?php if ($discount): ?>
                                    <span class="price-current">$<?php echo number_format($discount, 0, ',', '.'); ?> COP</span>
                                    <span class="price-old">$<?php echo number_format($price, 0, ',', '.'); ?> COP</span>
                                <?php else: ?>
                                    <span class="price-current">$<?php echo number_format($price, 0, ',', '.'); ?> COP</span>
                                <?php endif; ?>
                            </div>
                            
                            <a href="<?php echo htmlspecialchars($wa_link); ?>" target="_blank" rel="noopener noreferrer" class="btn-buy">
                                <i class="fab fa-whatsapp"></i> Lo quiero
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Banner para Empresas y Pedidos al por Mayor -->
            <div class="store-corporate-box">
                <div>
                    <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); padding: 5px 16px; border-radius: 20px; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 1rem;">
                        <i class="fas fa-building"></i> Empresas y Colegios
                    </div>
                    <h3>¿Buscas dotación o regalos corporativos con impacto social?</h3>
                    <p>
                        Diseñamos camisetas, buzos, mugs térmicos y recuerdos institucionales personalizados al por mayor para tu empresa, iglesia o colegio. Cada producto cuenta con beneficio tributario y apoya directamente los talleres artísticos de nuestros niños en el CDT.
                    </p>
                </div>
                <div class="corp-actions">
                    <a href="empresas" class="btn btn-primary" style="background: var(--primary); border: none; padding: 0.9rem 1.8rem;">
                        <i class="fas fa-handshake"></i> Ver Alianzas Empresariales
                    </a>
                    <a href="https://wa.me/573162522445?text=Hola%20Fundaci%C3%B3n%20ADN%20de%20Amor,%20deseo%20cotizar%20un%20pedido%20corporativo%20de%20productos%20personalizados" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="border-color: rgba(255,255,255,0.4); color: #fff; padding: 0.9rem 1.8rem;">
                        <i class="fab fa-whatsapp"></i> Cotizar al por Mayor
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Vista ampliada del producto -->
    <div class="pv-overlay" id="pvOverlay" role="dialog" aria-modal="true" aria-labelledby="pvName">
        <div class="pv-box">
            <button class="pv-close" id="pvClose" aria-label="Cerrar"><i class="fas fa-times"></i></button>
            <div class="pv-img"><img id="pvImg" src="" alt=""></div>
            <div class="pv-info">
                <span class="product-category-tag" id="pvCat"></span>
                <h3 id="pvName"></h3>
                <p id="pvDesc"></p>
                <div class="product-price-wrapper">
                    <span class="price-current" id="pvPrice"></span>
                    <span class="price-old" id="pvOld"></span>
                </div>
                <a id="pvWa" href="#" target="_blank" rel="noopener noreferrer" class="btn-buy">
                    <i class="fab fa-whatsapp"></i> Lo quiero
                </a>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="main.js?v=<?= @filemtime(__DIR__ . '/main.js') ?>"></script>
    <script>
        // Vista ampliada al pulsar la foto o el nombre del producto
        document.addEventListener('DOMContentLoaded', () => {
            const ov = document.getElementById('pvOverlay');
            const $ = id => document.getElementById(id);
            let lastFocus = null;

            const open = card => {
                const d = card.dataset;
                $('pvImg').src = d.image;
                $('pvImg').alt = d.name;
                $('pvName').textContent = d.name;
                $('pvCat').textContent = card.querySelector('.product-category-tag').textContent.trim();
                $('pvDesc').textContent = d.desc;
                $('pvDesc').style.display = d.desc ? '' : 'none';
                $('pvPrice').textContent = d.price;
                $('pvOld').textContent = d.old;
                $('pvWa').href = d.wa;
                lastFocus = document.activeElement;
                ov.classList.add('open');
                document.body.classList.add('pv-lock');
                $('pvClose').focus();
            };
            const close = () => {
                ov.classList.remove('open');
                document.body.classList.remove('pv-lock');
                if (lastFocus) lastFocus.focus();
            };

            document.querySelectorAll('.product-card').forEach(card => {
                card.querySelectorAll('.product-img-wrapper, .product-title').forEach(el => {
                    el.addEventListener('click', () => open(card));
                    el.addEventListener('keydown', e => {
                        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(card); }
                    });
                });
            });
            $('pvClose').addEventListener('click', close);
            ov.addEventListener('click', e => { if (e.target === ov) close(); });
            document.addEventListener('keydown', e => { if (e.key === 'Escape' && ov.classList.contains('open')) close(); });
        });
    </script>
    <script>
        // Filtrado dinámico por categorías
        document.addEventListener('DOMContentLoaded', () => {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const productCards = document.querySelectorAll('.product-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remover clase activa
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const filter = btn.getAttribute('data-filter');

                    productCards.forEach(card => {
                        const category = card.getAttribute('data-category');
                        if (filter === 'all' || category === filter) {
                            card.style.display = 'flex';
                            card.style.animation = 'fadeIn 0.4s ease forwards';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
