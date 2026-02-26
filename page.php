<?php
/**
 * Generic page template
 * @package AFVI
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<section class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php the_title(); ?></h1>
        <nav class="breadcrumb" aria-label="<?php echo esc_attr__('Fil d\'Ariane', 'afvi'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Accueil', 'afvi'); ?></a>
            <span>/</span>
            <span><?php the_title(); ?></span>
        </nav>
    </div>
</section>

<div class="content-area full-width">
    <div class="container">
        <div class="content-grid">
            <main>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </main>
        </div>
    </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
