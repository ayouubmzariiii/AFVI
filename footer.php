<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <!-- Footer Logo (above grid, centered) -->
        <div class="footer-logo-wrap">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
                <?php
                $footer_logo = get_theme_mod('afvi_footer_logo');
                if (!empty($footer_logo)) :
                    $footer_logo_url = is_numeric($footer_logo) ? wp_get_attachment_image_url($footer_logo, 'full') : $footer_logo;
                ?>
                    <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo-img">
                <?php elseif (has_custom_logo()) :
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo-img">
                <?php else : ?>
                    <span class="site-logo-text">A<span>FVI</span></span>
                <?php endif; ?>
            </a>
        </div>

        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-brand">
                <p><?php echo esc_html__('AFVI est une école trilingue (FR – EN – AR), de la maternelle au lycée, dédiée à l\'épanouissement de chaque élève. Grandir, apprendre & s\'épanouir.', 'afvi'); ?></p>
                <div class="footer-social">
                    <?php if ($fb = afvi_get('afvi_facebook', '#')) : ?>
                        <a href="<?php echo esc_url($fb); ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if ($ig = afvi_get('afvi_instagram', '#')) : ?>
                        <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if ($yt = afvi_get('afvi_youtube', '#')) : ?>
                        <a href="<?php echo esc_url($yt); ?>" target="_blank" rel="noopener" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    <?php endif; ?>
                    <?php if ($li = afvi_get('afvi_linkedin', '#')) : ?>
                        <a href="<?php echo esc_url($li); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-column">
                <h4><?php echo esc_html__('Liens Rapides', 'afvi'); ?></h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Accueil', 'afvi'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php echo esc_html__('À propos', 'afvi'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/programs')); ?>"><?php echo esc_html__('Programmes', 'afvi'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/admissions')); ?>"><?php echo esc_html__('Admissions', 'afvi'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php echo esc_html__('Actualités', 'afvi'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php echo esc_html__('Contact', 'afvi'); ?></a></li>
                </ul>
            </div>

            <!-- Programs -->
            <div class="footer-column">
                <h4><?php echo esc_html__('Nos Programmes', 'afvi'); ?></h4>
                <ul>
                    <li><a href="#"><?php echo esc_html__('Maternelle', 'afvi'); ?></a></li>
                    <li><a href="#"><?php echo esc_html__('Primaire', 'afvi'); ?></a></li>
                    <li><a href="#"><?php echo esc_html__('Collège', 'afvi'); ?></a></li>
                    <li><a href="#"><?php echo esc_html__('Lycée', 'afvi'); ?></a></li>
                    <li><a href="#"><?php echo esc_html__('Activités Parascolaires', 'afvi'); ?></a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-column">
                <h4><?php echo esc_html__('Contact', 'afvi'); ?></h4>
                <div class="footer-contact-item">
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <span><?php echo esc_html(afvi_get('afvi_address', 'Lot Agdal n°39 Q, Casablanca, Morocco')); ?></span>
                </div>
                <div class="footer-contact-item">
                    <span class="icon"><i class="fas fa-phone-alt"></i></span>
                    <a href="tel:<?php echo esc_attr(afvi_get('afvi_phone', '+212 5XX-XXXXXX')); ?>" style="color: inherit;"><?php echo esc_html(afvi_get('afvi_phone', '+212 5XX-XXXXXX')); ?></a>
                </div>
                <div class="footer-contact-item">
                    <span class="icon"><i class="fas fa-envelope"></i></span>
                    <a href="mailto:<?php echo esc_attr(afvi_get('afvi_email', 'contact@afvi.edu')); ?>" style="color: inherit;"><?php echo esc_html(afvi_get('afvi_email', 'contact@afvi.edu')); ?></a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> AFVI. <?php echo esc_html__('Tous droits réservés.', 'afvi'); ?></p>
            <div>
                <a href="#"><?php echo esc_html__('Politique de confidentialité', 'afvi'); ?></a>
                <a href="#"><?php echo esc_html__('Mentions légales', 'afvi'); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
