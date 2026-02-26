<?php
/**
 * Single post template
 * @package AFVI
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<div class="page-banner">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Accueil', 'afvi'); ?></a>
            <span>/</span>
            <a href="<?php echo esc_url(home_url('/blog')); ?>"><?php echo esc_html__('Actualités', 'afvi'); ?></a>
            <span>/</span>
            <span><?php the_title(); ?></span>
        </div>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-grid">
            <main>
                <article class="single-post">
                    <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom: var(--space-2xl); border-radius: var(--radius-lg); overflow: hidden;">
                        <?php the_post_thumbnail('large', array('style' => 'width:100%; height:auto;')); ?>
                    </div>
                    <?php endif; ?>

                    <div style="display:flex; align-items:center; gap:var(--space-lg); margin-bottom:var(--space-2xl); font-size:0.875rem; color:var(--color-text-light);">
                        <span><i class="far fa-calendar-alt" style="margin-right:var(--space-xs);"></i> <?php echo get_the_date('d F Y'); ?></span>
                        <span><i class="far fa-user" style="margin-right:var(--space-xs);"></i> <?php the_author(); ?></span>
                        <?php if (has_category()) : ?>
                        <span><i class="far fa-folder" style="margin-right:var(--space-xs);"></i> <?php the_category(', '); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <?php if (has_tag()) : ?>
                    <div style="margin-top:var(--space-2xl); padding-top:var(--space-xl); border-top:1px solid var(--color-border);">
                        <strong><?php echo esc_html__('Tags:', 'afvi'); ?></strong>
                        <?php the_tags('', ', '); ?>
                    </div>
                    <?php endif; ?>

                    <!-- Post Navigation -->
                    <div style="display:flex; justify-content:space-between; margin-top:var(--space-2xl); padding-top:var(--space-xl); border-top:1px solid var(--color-border);">
                        <div><?php previous_post_link('%link', '<i class="fas fa-arrow-left"></i> %title'); ?></div>
                        <div><?php next_post_link('%link', '%title <i class="fas fa-arrow-right"></i>'); ?></div>
                    </div>
                </article>
            </main>
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
