<?php
/**
 * 404 Error Page
 * @package AFVI
 */
get_header(); ?>

<div class="page-banner">
    <div class="container">
        <h1><?php echo esc_html__('Page Non Trouvée', 'afvi'); ?></h1>
    </div>
</div>

<div class="error-404">
    <div class="container">
        <div class="error-code">404</div>
        <h2><?php echo esc_html__('Oups ! Page introuvable.', 'afvi'); ?></h2>
        <p><?php echo esc_html__('La page que vous recherchez n\'existe pas ou a été déplacée. Vérifiez l\'URL ou retournez à la page d\'accueil.', 'afvi'); ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
            <i class="fas fa-home"></i> <?php echo esc_html__('Retour à l\'accueil', 'afvi'); ?>
        </a>
        <div style="margin-top:var(--space-2xl); max-width:500px; margin-left:auto; margin-right:auto;">
            <?php get_search_form(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
