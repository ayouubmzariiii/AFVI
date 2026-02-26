<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <a href="tel:<?php echo esc_attr(afvi_get('afvi_phone', '+212 5XX-XXXXXX')); ?>">
                <i class="fas fa-phone-alt"></i>
                <?php echo esc_html(afvi_get('afvi_phone', '+212 5XX-XXXXXX')); ?>
            </a>
            <a href="mailto:<?php echo esc_attr(afvi_get('afvi_email', 'contact@afvi.edu')); ?>">
                <i class="fas fa-envelope"></i>
                <?php echo esc_html(afvi_get('afvi_email', 'contact@afvi.edu')); ?>
            </a>
        </div>
        <div class="top-bar-right">
            <div class="social-links">
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
    </div>
</div>

<!-- Header -->
<header class="site-header" id="site-header">
    <div class="container">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <?php if (has_custom_logo()) :
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
            ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>" class="custom-logo">
            <?php else : ?>
                <span class="site-logo-text">A<span>FVI</span></span>
            <?php endif; ?>
        </a>

        <nav class="main-nav" id="main-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'afvi_fallback_menu',
                'walker'         => new AFVI_Nav_Walker(),
            ));
            ?>
        </nav>

        <button class="menu-toggle" id="menu-toggle" aria-label="Toggle mobile menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<!-- Mobile overlay -->
<div class="mobile-overlay" id="mobile-overlay"></div>
