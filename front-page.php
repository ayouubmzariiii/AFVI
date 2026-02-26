<?php
/**
 * Template Name: Front Page
 * Homepage for AFVI School
 *
 * @package AFVI
 */

get_header();

$hero_image = get_theme_mod('afvi_hero_image_1') ?: AFVI_URI . '/img/hero-bg-wide.jpg';
?>

<!-- HERO: Immersive full-width background -->
<section class="home-hero immersive-hero" id="hero" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
    <div class="home-hero-overlay"></div>
    <div class="home-hero-inner container text-center">
        <div class="home-hero-content mx-auto">
            <h1 class="home-hero-title">
                <?php echo esc_html(afvi_get('afvi_hero_title', 'Façonner les leaders de demain.')); ?>
            </h1>
            <p class="home-hero-desc">
                <?php echo esc_html(afvi_get('afvi_hero_description', 'Une éducation d\'excellence, multilingue et résolument tournée vers l\'avenir. Rejoignez une communauté où la réussite de chaque élève est notre priorité absolue.')); ?>
            </p>
            <div class="home-hero-actions justify-center">
                <a href="<?php echo esc_url(home_url('/admissions')); ?>" class="btn btn-accent"><?php echo esc_html__('Inscriptions', 'afvi'); ?> <i class="fas fa-arrow-right"></i></a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-hero-outline"><?php echo esc_html__('En savoir plus', 'afvi'); ?></a>
            </div>
        </div>
    </div>
    <a href="#stats" class="home-hero-scroll" aria-label="<?php echo esc_attr__('Défiler', 'afvi'); ?>"><i class="fas fa-chevron-down"></i></a>
</section>

<!-- STATS: Chiffres clés -->
<section class="home-stats" id="stats">
    <div class="container container-wide">
        <h2 class="sr-only"><?php echo esc_html__('Chiffres Clés', 'afvi'); ?></h2>
        <ul class="home-stats-grid">
            <li class="home-stats-item">
                <span class="home-stats-num" data-target="<?php echo esc_attr(afvi_get('afvi_students_count', '1200')); ?>">0</span>
                <span class="home-stats-label"><?php echo esc_html__('Élèves de Maternelle au Lycée', 'afvi'); ?></span>
            </li>
            <li class="home-stats-item">
                <span class="home-stats-num" data-target="<?php echo esc_attr(afvi_get('afvi_teachers_count', '150')); ?>">0</span>
                <span class="home-stats-label"><?php echo esc_html__('Enseignants Qualifiés', 'afvi'); ?></span>
            </li>
            <li class="home-stats-item">
                <span class="home-stats-num" data-target="<?php echo esc_attr(afvi_get('afvi_programs_count', '100')); ?>">0</span>
                <span class="home-stats-num-suffix">%</span>
                <span class="home-stats-label"><?php echo esc_html__('Réussite au Baccalauréat', 'afvi'); ?></span>
            </li>
            <li class="home-stats-item">
                <span class="home-stats-num" data-target="<?php echo esc_attr(afvi_get('afvi_years_count', '3')); ?>">0</span>
                <span class="home-stats-label"><?php echo esc_html__('Langues Enseignées (FR-EN-AR)', 'afvi'); ?></span>
            </li>
        </ul>
    </div>
</section>

<!-- ABOUT: Mot de bienvenue -->
<section class="home-about" id="about">
    <div class="container text-center">
        <div class="home-about-content mx-auto" style="max-width: 800px;">
            <span class="home-about-eyebrow"><?php echo esc_html__('Mot de la Direction', 'afvi'); ?></span>
            <h2 class="home-about-title"><?php echo esc_html__('L\'Excellence, Notre Engagement Quotidien', 'afvi'); ?></h2>
            <p class="home-about-lead"><?php echo esc_html__('Le Groupe Scolaire AFVI s\'est fixé pour mission d\'offrir un enseignement d\'excellence s\'adressant à toutes les intelligences. Notre ambition est de cultiver l\'esprit critique, la créativité et le sens des responsabilités chez nos élèves afin d\'en faire des citoyens du monde accomplis.', 'afvi'); ?></p>
            <p class="home-about-desc mt-3"><?php echo esc_html__('Grâce à une infrastructure ultramoderne et un corps enseignant dévoué, nous garantissons un environnement d\'apprentissage stimulant où chaque élève est accompagné individuellement vers sa propre réussite.', 'afvi'); ?></p>
            <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-outline-dark mt-4"><?php echo esc_html__('Découvrir notre histoire', 'afvi'); ?> <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- PROGRAMS: Établissements -->
<section class="home-programs section-alt" id="programs">
    <div class="container container-wide">
        <header class="home-programs-head text-left">
            <h2 class="section-title"><?php echo esc_html__('Nos Établissements', 'afvi'); ?></h2>
        </header>
        <?php
        $programs = array(
            array('title' => __('Maternelle', 'afvi'), 'ages' => __('Dès 2 ans', 'afvi'), 'slug' => 'maternelle', 'image' => AFVI_URI . '/img/maternelle.png'),
            array('title' => __('Elémentaire', 'afvi'), 'ages' => __('Primaire', 'afvi'), 'slug' => 'primaire', 'image' => AFVI_URI . '/img/primaire.png'),
            array('title' => __('Collège', 'afvi'), 'ages' => __('12-14 ans', 'afvi'), 'slug' => 'college', 'image' => AFVI_URI . '/img/college.png'),
            array('title' => __('Lycée', 'afvi'), 'ages' => __('15-18 ans', 'afvi'), 'slug' => 'lycee', 'image' => AFVI_URI . '/img/lycee.png'),
        );
        ?>
        <div class="home-programs-grid gsr-program-grid">
            <?php foreach ($programs as $prog) : ?>
            <article class="home-program-card gsr-card" style="background-image: url('<?php echo esc_url($prog['image']); ?>');">
                <a href="<?php echo esc_url(home_url('/programs/#' . $prog['slug'])); ?>" class="gsr-card-link">
                    <div class="gsr-card-overlay"></div>
                    <div class="gsr-card-content">
                        <span class="home-program-card-ages"><?php echo esc_html($prog['ages']); ?></span>
                        <h3 class="home-program-card-title"><?php echo esc_html($prog['title']); ?></h3>
                        <span class="home-program-card-cta"><?php echo esc_html__('En savoir plus', 'afvi'); ?> <i class="fas fa-arrow-right"></i></span>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- WHY CHOOSE US: Pourquoi choisir AFVI ? -->
<section class="home-features text-center" id="why-us">
    <div class="container container-wide">
        <header class="home-features-head mb-5">
            <span class="section-subtitle"><?php echo esc_html__('Nos Piliers', 'afvi'); ?></span>
            <h2 class="section-title"><?php echo esc_html__('Pourquoi choisir AFVI ?', 'afvi'); ?></h2>
        </header>
        <div class="home-features-grid">
            <div class="feature-item">
                <div class="feature-icon"><i class="fas fa-award"></i></div>
                <h3 class="feature-title"><?php echo esc_html__('Excellence Académique', 'afvi'); ?></h3>
                <p class="feature-desc"><?php echo esc_html__('Un programme rigoureux qui prépare nos élèves aux meilleures études supérieures nationales et internationales.', 'afvi'); ?></p>
            </div>
            <div class="feature-item">
                <div class="feature-icon"><i class="fas fa-globe"></i></div>
                <h3 class="feature-title"><?php echo esc_html__('Citoyenneté Internationale', 'afvi'); ?></h3>
                <p class="feature-desc"><?php echo esc_html__('Un apprentissage linguistique renforcé (Français, Anglais, Arabe) pour former des individus ouverts sur le monde.', 'afvi'); ?></p>
            </div>
            <div class="feature-item">
                <div class="feature-icon"><i class="fas fa-seedling"></i></div>
                <h3 class="feature-title"><?php echo esc_html__('Épanouissement Personnel', 'afvi'); ?></h3>
                <p class="feature-desc"><?php echo esc_html__('Des infrastructures sportives et culturelles de premier plan pour développer tous les talents de nos élèves.', 'afvi'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- NEWS + EVENTS -->
<section class="home-news-events section-alt" id="news-events">
    <div class="container container-wide">
        <div class="home-news-events-grid gsr-news-grid">
            <div class="home-news-col">
                <header class="home-news-head">
                    <h2 class="section-title"><?php echo esc_html__('Restez informés', 'afvi'); ?></h2>
                </header>
                <div class="home-news-list">
                    <?php
                    $news_query = new WP_Query(array('posts_per_page' => 3, 'post_status' => 'publish'));
                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) : $news_query->the_post();
                    ?>
                    <article class="home-news-item">
                        <a href="<?php the_permalink(); ?>" class="home-news-item-link">
                            <span class="home-news-item-date"><?php echo get_the_date('d.m.Y'); ?></span>
                            <h3 class="home-news-item-title"><?php the_title(); ?></h3>
                        </a>
                    </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        for ($i = 0; $i < 3; $i++) :
                    ?>
                    <article class="home-news-item">
                        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="home-news-item-link">
                            <span class="home-news-item-date"><?php echo date('d.m.Y'); ?></span>
                            <h3 class="home-news-item-title"><?php echo esc_html__('Actualité à venir', 'afvi'); ?></h3>
                        </a>
                    </article>
                    <?php endfor; endif; ?>
                </div>
                <p class="home-news-more mt-4">
                    <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-gsr-link"><?php echo esc_html__('Voir tout', 'afvi'); ?> <i class="fas fa-arrow-right"></i></a>
                </p>
            </div>
            
            <div class="home-events-col">
                <header class="home-events-head">
                    <h2 class="section-title"><?php echo esc_html__('Évènements à venir', 'afvi'); ?></h2>
                </header>
                <ul class="home-events-list">
                    <?php
                    $events_query = new WP_Query(array(
                        'post_type'      => 'afvi_event',
                        'posts_per_page' => 3,
                        'meta_key'       => '_event_date',
                        'orderby'        => 'meta_value',
                        'order'          => 'ASC',
                        'meta_query'     => array(array('key' => '_event_date', 'value' => date('Y-m-d'), 'compare' => '>=')),
                    ));
                    if ($events_query->have_posts()) :
                        while ($events_query->have_posts()) : $events_query->the_post();
                            $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                            $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                            $date_obj = $event_date ? DateTime::createFromFormat('Y-m-d', $event_date) : null;
                    ?>
                    <li class="home-event-item">
                        <a href="<?php the_permalink(); ?>" class="home-event-item-link">
                            <time class="home-event-date" datetime="<?php echo esc_attr($event_date); ?>">
                                <span class="day"><?php echo $date_obj ? $date_obj->format('d') : '--'; ?></span>
                                <span class="month"><?php echo $date_obj ? strtoupper($date_obj->format('M')) : '---'; ?></span>
                            </time>
                            <div class="home-event-info">
                                <h4><?php the_title(); ?></h4>
                                <?php if ($event_location) : ?><span class="home-event-loc"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($event_location); ?></span><?php endif; ?>
                            </div>
                        </a>
                    </li>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        $placeholders = array(
                            array('day' => '15', 'month' => 'MAR', 'title' => __('Journée Portes Ouvertes', 'afvi'), 'loc' => 'Campus AFVI'),
                            array('day' => '22', 'month' => 'MAR', 'title' => __('Réunion Parents-Professeurs', 'afvi'), 'loc' => 'Salles de classe'),
                            array('day' => '05', 'month' => 'AVR', 'title' => __('Fête du Printemps', 'afvi'), 'loc' => 'Cour principale'),
                        );
                        foreach ($placeholders as $evt) :
                    ?>
                    <li class="home-event-item">
                        <div class="home-event-item-link">
                            <time class="home-event-date">
                                <span class="day"><?php echo esc_html($evt['day']); ?></span>
                                <span class="month"><?php echo esc_html($evt['month']); ?></span>
                            </time>
                            <div class="home-event-info">
                                <h4><?php echo esc_html($evt['title']); ?></h4>
                                <span class="home-event-loc"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($evt['loc']); ?></span>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; endif; ?>
                </ul>
                <p class="home-news-more mt-4">
                    <a href="<?php echo esc_url(home_url('/events')); ?>" class="btn-gsr-link"><?php echo esc_html__('Voir tout', 'afvi'); ?> <i class="fas fa-arrow-right"></i></a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="home-cta text-center" id="cta">
    <div class="container container-wide">
        <div class="home-cta-inner mx-auto">
            <h2 class="home-cta-title" style="font-size: 2.5rem; margin-bottom: 2rem;"><?php echo esc_html__('Grandir avec AFVI', 'afvi'); ?></h2>
            <div class="home-cta-actions justify-center">
                <a href="<?php echo esc_url(home_url('/admissions')); ?>" class="btn btn-accent meta-link"><?php echo esc_html__('Inscription 2026-2027', 'afvi'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
