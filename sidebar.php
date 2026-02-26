<?php
/**
 * Sidebar template
 * @package AFVI
 */

if (!is_active_sidebar('blog-sidebar')) {
    // Fallback sidebar content
    ?>
    <div class="widget">
        <h3 class="widget-title"><?php echo esc_html__('Recherche', 'afvi'); ?></h3>
        <?php get_search_form(); ?>
    </div>

    <div class="widget">
        <h3 class="widget-title"><?php echo esc_html__('Catégories', 'afvi'); ?></h3>
        <ul>
            <?php wp_list_categories(array('title_li' => '')); ?>
        </ul>
    </div>

    <div class="widget">
        <h3 class="widget-title"><?php echo esc_html__('Articles Récents', 'afvi'); ?></h3>
        <ul>
            <?php
            $recent = new WP_Query(array('posts_per_page' => 5));
            while ($recent->have_posts()) : $recent->the_post();
            ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php
    return;
}

dynamic_sidebar('blog-sidebar');
