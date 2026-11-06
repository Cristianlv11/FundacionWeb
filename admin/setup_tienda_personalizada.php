<?php
// admin/setup_tienda_personalizada.php
require_once __DIR__ . '/../includes/db.php';

header('Content-Type: text/html; charset=utf-8');

echo "<h2>Iniciando Configuración de Productos Personalizables...</h2>";

try {
    // 1. Asegurar columnas en tabla products
    $existingCols = [];
    $colStmt = $pdo->query("SHOW COLUMNS FROM products");
    while ($row = $colStmt->fetch(PDO::FETCH_ASSOC)) {
        $existingCols[] = strtolower($row['Field']);
    }

    if (!in_array('category', $existingCols)) {
        $pdo->exec("ALTER TABLE products ADD COLUMN category VARCHAR(50) DEFAULT 'general'");
        echo "<p>✅ Columna <code>category</code> agregada con éxito.</p>";
    } else {
        echo "<p>ℹ️ Columna <code>category</code> ya existe.</p>";
    }

    if (!in_array('description', $existingCols)) {
        $pdo->exec("ALTER TABLE products ADD COLUMN description TEXT NULL");
        echo "<p>✅ Columna <code>description</code> agregada con éxito.</p>";
    } else {
        echo "<p>ℹ️ Columna <code>description</code> ya existe.</p>";
    }

    if (!in_array('is_customizable', $existingCols)) {
        $pdo->exec("ALTER TABLE products ADD COLUMN is_customizable TINYINT(1) DEFAULT 0");
        echo "<p>✅ Columna <code>is_customizable</code> agregada con éxito.</p>";
    } else {
        echo "<p>ℹ️ Columna <code>is_customizable</code> ya existe.</p>";
    }

    // 2. Actualizar productos existentes
    $pdo->exec("UPDATE products SET category = 'ropa', is_customizable = 1 WHERE name LIKE '%Camiseta%' AND (category IS NULL OR category = 'general')");
    $pdo->exec("UPDATE products SET category = 'vasos', is_customizable = 1 WHERE (name LIKE '%Mug%' OR name LIKE '%Termo%') AND (category IS NULL OR category = 'general')");
    $pdo->exec("UPDATE products SET category = 'accesorios', is_customizable = 0 WHERE (name LIKE '%Pulsera%' OR name LIKE '%Pulcera%' OR name LIKE '%Agenda%' OR name LIKE '%Kit%' OR name LIKE '%Cuaderno%') AND (category IS NULL OR category = 'general')");

    $wa_phone = '573162522445';

    // 3. Catálogo de Productos Personalizables a Insertar
    $customizable_products = [
        // ROPA
        [
            'name' => 'Camiseta Solidaria Personalizable',
            'price' => 35000,
            'discount' => 30000,
            'category' => 'ropa',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/real_camiseta_carinito.jpg',
            'description' => 'Camiseta en algodón 100% peinado premium (180g). Personalízala con tu foto familiar, frase inspiradora o logo. Tallas de niño a adulto (XS a XL).',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me interesa personalizar la Camiseta Solidaria. ¿Cómo les envío mi diseño o foto?")
        ],
        [
            'name' => 'Buzo / Hoodie con Capota Personalizable',
            'price' => 75000,
            'discount' => 68000,
            'category' => 'ropa',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/hoodie_personalizado.jpg',
            'description' => 'Buzo térmico perchado de textura suave con capota y bolsillo frontal. Estampado en vinilo textil o serigrafía de alta durabilidad con tu mensaje o diseño.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me gustaría encargar un Buzo/Hoodie Personalizado. ¿Qué tallas y colores tienen disponibles?")
        ],
        [
            'name' => 'Gorra Solidaria Personalizable',
            'price' => 28000,
            'discount' => 24000,
            'category' => 'ropa',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/gorra_personalizada.jpg',
            'description' => 'Gorra ajustable tipo drill o trucker con excelente acabado. Personalizada con tu nombre, iniciales o logo con causa solidaria.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, quiero personalizar una Gorra Solidaria. ¿Cómo puedo hacer el pedido?")
        ],

        // VASOS
        [
            'name' => 'Mug Cerámico Personalizado (11 oz)',
            'price' => 22000,
            'discount' => 18000,
            'category' => 'vasos',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/vg_mug.jpg',
            'description' => 'Taza de cerámica blanca brillante de alta calidad (11 oz). Impresión sublimada a full color resistente a microondas y lavavajillas con tu foto, mensaje o nombre.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, quiero pedir un Mug Cerámico Personalizado con foto. ¿Cómo se los envío?")
        ],
        [
            'name' => 'Mug Mágico Térmico Personalizado',
            'price' => 28000,
            'discount' => 24000,
            'category' => 'vasos',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/mug_magico.jpg',
            'description' => 'Taza de cerámica termosensible que revela tu foto o dedicatoria mágica cuando viertes café o líquido caliente. ¡El regalo sorpresa ideal!',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me interesa el Mug Mágico Personalizado. ¿Me explican cómo enviar la foto?")
        ],
        [
            'name' => 'Termo Metálico Deportivo Personalizable',
            'price' => 45000,
            'discount' => 38000,
            'category' => 'vasos',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/vg_termo.jpg',
            'description' => 'Botella térmica de 600ml en acero inoxidable con tapa hermética y mosquetón para llevar al colegio o gym. Grabado o estampado duradero.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, quiero encargar un Termo Metálico Deportivo Personalizado. ¿Qué colores tienen?")
        ],

        // ROMPECABEZAS
        [
            'name' => 'Rompecabezas Personalizado con Foto (120 piezas)',
            'price' => 34000,
            'discount' => 29000,
            'category' => 'rompecabezas',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/vg_rompecabezas.jpg',
            'description' => 'Rompecabezas rectangular en cartón prensado brillante de alta densidad con acabado perlado. Personalizado con tu foto familiar o diseño preferido. Incluye caja personalizada.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, quiero encargar un Rompecabezas Personalizado con Foto de 120 piezas. ¿Cuál es el procedimiento?")
        ],
        [
            'name' => 'Rompecabezas Familiar Solidario (300 piezas)',
            'price' => 48000,
            'discount' => 42000,
            'category' => 'rompecabezas',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/vg_rompecabezas_detalle.jpg',
            'description' => 'Rompecabezas de gran formato (300 piezas) para armar y disfrutar en familia. Inmortaliza tus mejores momentos mientras apoyas los proyectos del CDT.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me gustaría el Rompecabezas Familiar de 300 piezas. ¿A qué resolución debe ser la foto?")
        ],
        [
            'name' => 'Rompecabezas Infantil Educativo (48 piezas)',
            'price' => 26000,
            'discount' => 22000,
            'category' => 'rompecabezas',
            'is_customizable' => 1,
            'image' => 'uploads/tienda/vg_rompecabezas_detalle.jpg',
            'description' => 'Diseñado especialmente para niños pequeños con piezas grandes y cartón extra resistente. Personalízalo con el nombre del niño o motivos didácticos alegres.',
            'whatsapp_link' => "https://wa.me/{$wa_phone}?text=" . urlencode("Hola Fundación ADN de Amor, me interesa el Rompecabezas Infantil Educativo de 48 piezas personalizado.")
        ],
    ];

    $insertStmt = $pdo->prepare("INSERT INTO products (name, price, discount, category, is_customizable, image, description, whatsapp_link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $checkStmt = $pdo->prepare("SELECT id FROM products WHERE name = ?");

    $insertedCount = 0;
    foreach ($customizable_products as $prod) {
        $checkStmt->execute([$prod['name']]);
        if (!$checkStmt->fetch()) {
            $insertStmt->execute([
                $prod['name'],
                $prod['price'],
                $prod['discount'],
                $prod['category'],
                $prod['is_customizable'],
                $prod['image'],
                $prod['description'],
                $prod['whatsapp_link']
            ]);
            $insertedCount++;
            echo "<p>➕ Producto insertado: <strong>{$prod['name']}</strong> ({$prod['category']})</p>";
        } else {
            // Actualizar datos si ya existe
            $upStmt = $pdo->prepare("UPDATE products SET category = ?, is_customizable = ?, image = ?, description = ?, whatsapp_link = ? WHERE name = ?");
            $upStmt->execute([
                $prod['category'],
                $prod['is_customizable'],
                $prod['image'],
                $prod['description'],
                $prod['whatsapp_link'],
                $prod['name']
            ]);
            echo "<p>🔄 Producto actualizado: <strong>{$prod['name']}</strong></p>";
        }
    }

    echo "<h3 style='color:green;'>¡Configuración completada exitosamente! Se procesaron los productos personalizables.</h3>";
    echo "<p><a href='/tienda' target='_blank'>Ir a la Tienda Solidaria</a> | <a href='productos.php'>Ir al Panel de Productos</a></p>";

} catch (Exception $e) {
    echo "<h3 style='color:red;'>Error durante la configuración: " . htmlspecialchars($e->getMessage()) . "</h3>";
}
