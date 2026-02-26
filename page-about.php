<?php
/**
 * Template Name: About Page
 * @package AFVI
 */

get_header();
?>

<section class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php echo esc_html__('À propos d\'AFVI', 'afvi'); ?></h1>
        <nav class="breadcrumb" aria-label="<?php echo esc_attr__('Fil d\'Ariane', 'afvi'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Accueil', 'afvi'); ?></a>
            <span>/</span>
            <span><?php echo esc_html__('À propos', 'afvi'); ?></span>
        </nav>
    </div>
</section>

<section class="inner-section about-intro-block">
    <div class="container">
        <div class="about-intro-layout">
            <div class="about-intro-media">
                <img src="<?php echo esc_url(AFVI_URI . '/img/welcome.png'); ?>" alt="<?php echo esc_attr__('Campus AFVI', 'afvi'); ?>">
                <div class="about-intro-badge">
                    <span class="about-intro-badge-num"><?php echo esc_html(afvi_get('afvi_years_count', '25')); ?></span>
                    <span class="about-intro-badge-txt"><?php echo esc_html__('Ans d\'excellence', 'afvi'); ?></span>
                </div>
            </div>
            <div class="about-intro-copy">
                <span class="section-subtitle"><?php echo esc_html__('Notre mission', 'afvi'); ?></span>
                <h2 class="about-intro-heading"><?php echo esc_html__('Former les leaders de demain', 'afvi'); ?></h2>
                <p class="about-intro-lead">
                    <?php echo esc_html__('Depuis sa fondation, AFVI s\'engage à offrir une éducation de qualité exceptionnelle, combinant excellence académique, développement personnel et ouverture sur le monde.', 'afvi'); ?>
                </p>
                <p>
                    <?php echo esc_html__('Notre approche pédagogique place l\'élève au centre de son apprentissage. Nous cultivons la curiosité intellectuelle, l\'esprit critique et la créativité pour préparer nos élèves aux défis du XXIe siècle.', 'afvi'); ?>
                </p>
                <ul class="about-intro-list">
                    <li><i class="fas fa-check" aria-hidden="true"></i> <?php echo esc_html__('Pédagogie innovante et personnalisée', 'afvi'); ?></li>
                    <li><i class="fas fa-check" aria-hidden="true"></i> <?php echo esc_html__('Enseignement trilingue (FR / AR / EN)', 'afvi'); ?></li>
                    <li><i class="fas fa-check" aria-hidden="true"></i> <?php echo esc_html__('Accompagnement individualisé', 'afvi'); ?></li>
                    <li><i class="fas fa-check" aria-hidden="true"></i> <?php echo esc_html__('Infrastructures modernes et sécurisées', 'afvi'); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="inner-section alt about-values-block">
    <div class="container">
        <div class="inner-section-head">
            <span class="section-subtitle"><?php echo esc_html__('Ce qui nous définit', 'afvi'); ?></span>
            <h2 class="section-title"><?php echo esc_html__('Nos valeurs fondamentales', 'afvi'); ?></h2>
        </div>
        <ul class="about-values-list">
            <?php
            $values = array(
                array('icon' => 'fa-star', 'title' => __('Excellence', 'afvi'), 'desc' => __('Nous visons l\'excellence dans chaque aspect de l\'éducation.', 'afvi')),
                array('icon' => 'fa-heart', 'title' => __('Bienveillance', 'afvi'), 'desc' => __('Un environnement chaleureux où chaque élève se sent valorisé.', 'afvi')),
                array('icon' => 'fa-lightbulb', 'title' => __('Innovation', 'afvi'), 'desc' => __('Méthodes pédagogiques modernes et outils au service de l\'apprentissage.', 'afvi')),
                array('icon' => 'fa-globe-africa', 'title' => __('Ouverture', 'afvi'), 'desc' => __('Éducation multiculturelle pour des citoyens du monde responsables.', 'afvi')),
                array('icon' => 'fa-users', 'title' => __('Communauté', 'afvi'), 'desc' => __('Parents, enseignants et élèves collaborent pour la réussite de tous.', 'afvi')),
                array('icon' => 'fa-shield-alt', 'title' => __('Intégrité', 'afvi'), 'desc' => __('Honnêteté, respect et responsabilité comme fondements du caractère.', 'afvi')),
            );
            foreach ($values as $val) :
            ?>
            <li class="about-value-item">
                <span class="about-value-icon"><i class="fas <?php echo esc_attr($val['icon']); ?>"></i></span>
                <h3 class="about-value-title"><?php echo esc_html($val['title']); ?></h3>
                <p class="about-value-desc"><?php echo esc_html($val['desc']); ?></p>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="inner-section about-timeline-block">
    <div class="container">
        <div class="inner-section-head">
            <span class="section-subtitle"><?php echo esc_html__('Notre parcours', 'afvi'); ?></span>
            <h2 class="section-title"><?php echo esc_html__('Les grandes étapes', 'afvi'); ?></h2>
        </div>
        <ol class="about-timeline-list">
            <?php
            $milestones = array(
                array('year' => '1999', 'title' => __('Fondation', 'afvi'), 'desc' => __('Création de l\'établissement avec une vision ambitieuse pour l\'éducation.', 'afvi')),
                array('year' => '2005', 'title' => __('Expansion primaire', 'afvi'), 'desc' => __('Ouverture du cycle primaire complet et nouveaux bâtiments.', 'afvi')),
                array('year' => '2010', 'title' => __('Cycle secondaire', 'afvi'), 'desc' => __('Lancement du collège et du lycée avec laboratoires de pointe.', 'afvi')),
                array('year' => '2018', 'title' => __('Campus numérique', 'afvi'), 'desc' => __('Transformation digitale avec salles connectées et e-learning.', 'afvi')),
                array('year' => '2024', 'title' => __('25 ans d\'excellence', 'afvi'), 'desc' => __('Plus de 1500 élèves et un taux de réussite de 98%.', 'afvi')),
            );
            foreach ($milestones as $ms) :
            ?>
            <li class="about-timeline-item">
                <span class="about-timeline-year"><?php echo esc_html($ms['year']); ?></span>
                <div class="about-timeline-content">
                    <h3><?php echo esc_html($ms['title']); ?></h3>
                    <p><?php echo esc_html($ms['desc']); ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="stats-strip">
    <div class="container">
        <ul class="stats-strip-grid">
            <li class="stats-strip-item">
                <span class="stats-strip-number" data-target="<?php echo esc_attr(afvi_get('afvi_students_count', '1500')); ?>">0</span>
                <span class="stats-strip-label"><?php echo esc_html__('Élèves', 'afvi'); ?></span>
            </li>
            <li class="stats-strip-item">
                <span class="stats-strip-number" data-target="<?php echo esc_attr(afvi_get('afvi_teachers_count', '120')); ?>">0</span>
                <span class="stats-strip-label"><?php echo esc_html__('Enseignants', 'afvi'); ?></span>
            </li>
            <li class="stats-strip-item">
                <span class="stats-strip-number" data-target="98">0</span>
                <span class="stats-strip-label"><?php echo esc_html__('% Réussite', 'afvi'); ?></span>
            </li>
            <li class="stats-strip-item">
                <span class="stats-strip-number" data-target="<?php echo esc_attr(afvi_get('afvi_years_count', '25')); ?>">0</span>
                <span class="stats-strip-label"><?php echo esc_html__('Ans d\'expérience', 'afvi'); ?></span>
            </li>
        </ul>
    </div>
</section>

<section class="inner-section alt about-why-block">
    <div class="container">
        <div class="about-why-layout">
            <div class="about-why-copy">
                <span class="section-subtitle"><?php echo esc_html__('Pourquoi AFVI ?', 'afvi'); ?></span>
                <h2 class="about-why-heading"><?php echo esc_html__('Une éducation d\'exception', 'afvi'); ?></h2>
                <p><?php echo esc_html__('AFVI se distingue par son approche holistique : rigueur académique et développement personnel. Nos élèves bénéficient d\'un encadrement qui les prépare à exceller dans tous les domaines.', 'afvi'); ?></p>
                <ul class="about-why-features">
                    <li>
                        <span class="about-why-ficon"><i class="fas fa-chalkboard-teacher"></i></span>
                        <div>
                            <strong><?php echo esc_html__('Enseignants qualifiés', 'afvi'); ?></strong>
                            <span><?php echo esc_html__('Professeurs expérimentés et passionnés', 'afvi'); ?></span>
                        </div>
                    </li>
                    <li>
                        <span class="about-why-ficon"><i class="fas fa-laptop-code"></i></span>
                        <div>
                            <strong><?php echo esc_html__('Technologie avancée', 'afvi'); ?></strong>
                            <span><?php echo esc_html__('Salles équipées des dernières technologies', 'afvi'); ?></span>
                        </div>
                    </li>
                    <li>
                        <span class="about-why-ficon"><i class="fas fa-futbol"></i></span>
                        <div>
                            <strong><?php echo esc_html__('Activités parascolaires', 'afvi'); ?></strong>
                            <span><?php echo esc_html__('Sport, art, musique et clubs variés', 'afvi'); ?></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="about-why-cards">
                <div class="about-why-card">
                    <i class="fas fa-award"></i>
                    <h4><?php echo esc_html__('Certifié', 'afvi'); ?></h4>
                    <p><?php echo esc_html__('Accréditations nationales et internationales', 'afvi'); ?></p>
                </div>
                <div class="about-why-card">
                    <i class="fas fa-hands-helping"></i>
                    <h4><?php echo esc_html__('Partenariats', 'afvi'); ?></h4>
                    <p><?php echo esc_html__('Collaborations avec des institutions prestigieuses', 'afvi'); ?></p>
                </div>
                <div class="about-why-card">
                    <i class="fas fa-seedling"></i>
                    <h4><?php echo esc_html__('Développement durable', 'afvi'); ?></h4>
                    <p><?php echo esc_html__('Programme écoresponsable', 'afvi'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-block">
    <div class="container">
        <div class="cta-block-inner">
            <h2 class="cta-block-title"><?php echo esc_html__('Rejoignez notre communauté', 'afvi'); ?></h2>
            <p class="cta-block-text"><?php echo esc_html__('Offrez à votre enfant une éducation d\'excellence. Prenez rendez-vous pour une visite du campus.', 'afvi'); ?></p>
            <div class="cta-block-actions">
                <a href="<?php echo esc_url(home_url('/admissions')); ?>" class="btn btn-accent"><?php echo esc_html__('Demander une inscription', 'afvi'); ?> <i class="fas fa-arrow-right"></i></a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-cta-outline"><?php echo esc_html__('Nous contacter', 'afvi'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
