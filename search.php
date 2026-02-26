<?php
/**
 * Search results template
 * @package AFVI
 */
get_header(); ?>

<div class="page-banner">
    <div class="container">
        <h1><?php printf(esc_html__('Résultats pour : « %s »', 'afvi'), get_search_query()); ?></h1>
        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Accueil', 'afvi'); ?></a>
            <span>/</span>
            <span><?php echo esc_html__('Recherche', 'afvi'); ?></span>
        </div>
    </div>
</div>

<div class="content-area">
    <div class="container">
        <div class="content-grid">
            <main>
                <?php if (have_posts()) : ?>
                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                    <article class="news-card reveal">
                        <div class="news-card-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('afvi-news-card'); ?>
                            <?php else : ?>
                                <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--color-secondary),var(--color-primary));display:flex;align-items:center;justify-content:center;">
                                    <i class="fas fa-search" style="font-size:3rem;color:rgba(255,255,255,0.3);"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="news-card-body">
                            <h3 class="news-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="news-card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="news-card-readmore">
                                <?php echo esc_html__('Lire la suite', 'afvi'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    <?php endwhile; ?>
                </div>

                <div class="pagination">
                    <?php
                    the_posts_pagination(array(
                        'prev_text' => '<i class="fas fa-chevron-left"></i>',
                        'next_text' => '<i class="fas fa-chevron-right"></i>',
                    ));
                    ?>
                </div>
                <?php else : ?>
                <div class="text-center" style="padding:var(--space-4xl) 0;">
                    <h2><?php echo esc_html__('Aucun résultat trouvé', 'afvi'); ?></h2>
                    <p style="margin-bottom:var(--space-xl);"><?php echo esc_html__('Essayez une recherche différente.', 'afvi'); ?></p>
                    <?php get_search_form(); ?>
                </div>
                <?php endif; ?>
            </main>
            <aside class="sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</div>

<?php get_footer(); ?>
