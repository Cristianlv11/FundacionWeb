    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <!-- Logo & Social -->
            <div class="footer-col-1">
                <img src="LOGO Y VISUAL WEB BOTONES/logo ADN_de_Amor_color_rectangulo.png" class="footer-logo-white" alt="ADN de Amor" loading="lazy" decoding="async">
                <div class="social-icons-left">
                    <a href="https://wa.me/573162522445?text=Hola,%20quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20la%20Fundaci%C3%B3n" target="_blank" rel="noopener noreferrer" title="WhatsApp Oficial"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://maps.app.goo.gl/xvSyBJBfQMuL4wGF7" target="_blank" rel="noopener noreferrer" title="Ubicación en Google Maps"><i class="fas fa-map-marked-alt"></i></a>
                    <a href="mailto:info@fundacionadndeamor.org" title="Correo Electrónico"><i class="fas fa-envelope"></i></a>
                </div>
            </div>

            <div class="footer-divider"></div>

            <!-- Contáctanos -->
            <div class="footer-col-2">
                <h3>Contáctanos</h3>
                <ul>
                    <li><a href="https://maps.app.goo.gl/xvSyBJBfQMuL4wGF7" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: none;" title="Ver ubicación en Google Maps"><i class="fas fa-map-marker-alt"></i> Santa Rosa de Cabal, Risaralda - Colombia</a></li>
                    <li><a href="tel:+573162522445" style="color: inherit; text-decoration: none;"><i class="fas fa-phone-alt"></i> +57 316 252 2445</a></li>
                    <li><a href="mailto:info@fundacionadndeamor.org" style="color: inherit; text-decoration: none;"><i class="fas fa-envelope"></i> info@fundacionadndeamor.org</a></li>
                </ul>
            </div>

            <div class="footer-divider"></div>

            <!-- Síguenos -->
            <div class="footer-col-3">
                <h3>Atención Directa</h3>
                <div class="social-icons-center">
                    <a href="https://wa.me/573162522445" target="_blank" rel="noopener noreferrer" title="WhatsApp Atención"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://maps.app.goo.gl/xvSyBJBfQMuL4wGF7" target="_blank" rel="noopener noreferrer" title="Google Maps"><i class="fas fa-map-marker-alt"></i></a>
                    <a href="mailto:info@fundacionadndeamor.org" title="Escríbenos por Email"><i class="fas fa-envelope"></i></a>
                </div>
            </div>

            <div class="footer-divider"></div>

            <!-- Text and Heart -->
            <div class="footer-col-4">
                <p class="footer-slogan"><?= get_site_content($pdo, 'footer_slogan', 'Amor que inspira,<br>acciones que transforman') ?></p>
                <svg viewBox="0 0 100 100" width="80" height="80">
                    <path d="M50,85 C50,85 10,55 10,30 C10,15 25,10 35,20 C45,30 50,40 50,40 C50,40 55,30 65,20 C75,10 90,15 90,30 C90,55 50,85 50,85 Z" fill="none" stroke="#E63946" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>

        <div style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding: 1.5rem 2rem 0.5rem 2rem; max-width: 1200px; margin: 2rem auto 0 auto; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; font-size: 0.85rem; color: rgba(255, 255, 255, 0.7);">
            <div>
                &copy; <?= date('Y') ?> Fundación ADN de Amor. Todos los derechos reservados.
            </div>
            <div style="display: flex; gap: 1.5rem; flex-wrap: wrap;">
                <a href="privacidad" style="color: rgba(255, 255, 255, 0.85); text-decoration: underline;">
                    <i class="fas fa-shield-alt" style="margin-right: 4px; color: var(--primary);"></i> Política de Tratamiento de Datos (Ley 1581)
                </a>
                <a href="programas#donde-estamos" style="color: rgba(255, 255, 255, 0.85); text-decoration: none;">
                    <i class="fas fa-map-marker-alt" style="margin-right: 4px; color: var(--primary);"></i> Vereda Guacas, Santa Rosa de Cabal
                </a>
            </div>
        </div>
    </footer>

    <!-- Datos Estructurados (Schema.org) para Google -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NGO",
        "name": "Fundación ADN de Amor",
        "alternateName": "ADN de Amor",
        "url": "https://fundacionadndeamor.org/",
        "logo": "https://fundacionadndeamor.org/LOGO%20Y%20VISUAL%20WEB%20BOTONES/logo%20ADN_de_Amor_color_rectangulo.png",
        "description": "Fundación sin ánimo de lucro que acompaña a niños, niñas, adolescentes, jóvenes y madres cabeza de familia en situación de vulnerabilidad en Colombia.",
        "hasMap": "https://maps.app.goo.gl/xvSyBJBfQMuL4wGF7",
        "email": "info@fundacionadndeamor.org",
        "telephone": "+573162522445",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Santa Rosa de Cabal",
            "addressRegion": "Risaralda",
            "addressCountry": "CO"
        },
        "areaServed": "CO",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+57-316-252-2445",
            "contactType": "customer service",
            "email": "info@fundacionadndeamor.org",
            "availableLanguage": "Spanish"
        }
    }
    </script>

    <!-- Botón Flotante de WhatsApp (una página puede definir $wa_float antes de incluir el pie) -->
    <?php
        $waf = array_merge([
            'url'   => 'https://wa.me/573162522445?text=Hola,%20quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20la%20Fundaci%C3%B3n%20ADN%20de%20Amor',
            'label' => '316 252 2445',
        ], isset($wa_float) && is_array($wa_float) ? $wa_float : []);
    ?>
    <a href="<?= htmlspecialchars($waf['url']) ?>" target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="Escríbenos por WhatsApp" title="Escríbenos por WhatsApp">
        <div class="whatsapp-icon-box">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div class="whatsapp-text-box">
            <span class="whatsapp-label">WhatsApp</span>
            <span class="whatsapp-number"><?= htmlspecialchars($waf['label']) ?></span>
        </div>
    </a>
