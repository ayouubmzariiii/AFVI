<?php
/**
 * Template Name: Programs Page
 * @package AFVI
 */

get_header();
?>

<section class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php echo esc_html__('Nos programmes', 'afvi'); ?></h1>
        <nav class="breadcrumb" aria-label="<?php echo esc_attr__('Fil d\'Ariane', 'afvi'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Accueil', 'afvi'); ?></a>
            <span>/</span>
            <span><?php echo esc_html__('Programmes', 'afvi'); ?></span>
        </nav>
    </div>
</section>

<section class="inner-section programs-intro">
    <div class="container">
        <div class="inner-section-head">
            <span class="section-subtitle"><?php echo esc_html__('Un parcours complet', 'afvi'); ?></span>
            <h2 class="section-title"><?php echo esc_html__('De la maternelle au lycée', 'afvi'); ?></h2>
            <p><?php echo esc_html__('AFVI propose un parcours scolaire complet et cohérent pour accompagner chaque élève à chaque étape de sa scolarité.', 'afvi'); ?></p>
        </div>

        <?php
        $programs_data = array(
            array(
                'title' => __('Maternelle', 'afvi'),
                'ages'  => __('3-5 ans', 'afvi'),
                'icon'  => 'fa-child',
                'color' => '#2AA5A0',
                'slug'  => 'maternelle',
                'image' => AFVI_URI . '/img/maternelle.png',
                'desc'  => __('Notre programme de maternelle offre un environnement chaleureux et stimulant où les tout-petits développent leur curiosité. À travers le jeu, l\'exploration et les activités créatives, nous posons les bases essentielles de l\'apprentissage.', 'afvi'),
                'features' => array(
                    __('Éveil aux langues (français et arabe)', 'afvi'),
                    __('Activités motrices et artistiques', 'afvi'),
                    __('Découverte du monde et des sciences', 'afvi'),
                    __('Socialisation et vivre ensemble', 'afvi'),
                    __('Initiation au numérique', 'afvi'),
                ),
            ),
            array(
                'title' => __('Primaire', 'afvi'),
                'ages'  => __('6-11 ans', 'afvi'),
                'icon'  => 'fa-book-open',
                'color' => '#1B3A5C',
                'slug'  => 'primaire',
                'image' => AFVI_URI . '/img/primaire.png',
                'desc'  => __('Le cycle primaire consolide les apprentissages fondamentaux et développe l\'autonomie. Un enseignement structuré et bienveillant permet à chaque enfant de progresser à son rythme.', 'afvi'),
                'features' => array(
                    __('Maîtrise de la lecture et de l\'écriture', 'afvi'),
                    __('Mathématiques et raisonnement logique', 'afvi'),
                    __('Enseignement bilingue renforcé', 'afvi'),
                    __('Sciences expérimentales', 'afvi'),
                    __('Éducation physique et sportive', 'afvi'),
                ),
            ),
            array(
                'title' => __('Collège', 'afvi'),
                'ages'  => __('12-14 ans', 'afvi'),
                'icon'  => 'fa-flask',
                'color' => '#d4a910',
                'slug'  => 'college',
                'image' => AFVI_URI . '/img/college.png',
                'desc'  => __('Au collège, les élèves approfondissent leurs connaissances et développent leur esprit critique. Notre programme prépare la transition vers le lycée tout en favorisant l\'épanouissement personnel.', 'afvi'),
                'features' => array(
                    __('Programme national enrichi', 'afvi'),
                    __('Langues vivantes (anglais, espagnol)', 'afvi'),
                    __('Laboratoires de sciences modernes', 'afvi'),
                    __('Projets interdisciplinaires', 'afvi'),
                    __('Préparation aux examens régionaux', 'afvi'),
                ),
            ),
            array(
                'title' => __('Lycée', 'afvi'),
                'ages'  => __('15-18 ans', 'afvi'),
                'icon'  => 'fa-graduation-cap',
                'color' => '#2AA5A0',
                'slug'  => 'lycee',
                'image' => AFVI_URI . '/img/lycee.png',
                'desc'  => __('Le lycée prépare les élèves aux études supérieures avec un programme exigeant et des orientations diversifiées. Accompagnement personnalisé pour construire son projet d\'avenir.', 'afvi'),
                'features' => array(
                    __('Filières scientifiques et littéraires', 'afvi'),
                    __('Préparation au baccalauréat', 'afvi'),
                    __('Orientation et conseil universitaire', 'afvi'),
                    __('Stages et partenariats entreprises', 'afvi'),
                    __('Préparation aux concours d\'accès', 'afvi'),
                ),
            ),
        );

        foreach ($programs_data as $index => $prog) :
            $reverse = $index % 2 !== 0;
        ?>
        <article id="<?php echo esc_attr($prog['slug']); ?>" class="program-detail-block <?php echo $reverse ? 'program-detail-block--reverse' : ''; ?>">
            <div class="program-detail-media" style="--prog-color: <?php echo esc_attr($prog['color']); ?>">
                <?php if (!empty($prog['image'])) : ?>
                <img src="<?php echo esc_url($prog['image']); ?>" alt="<?php echo esc_attr($prog['title']); ?>">
                <?php else : ?>
                <div class="program-detail-placeholder">
                    <i class="fas <?php echo esc_attr($prog['icon']); ?>"></i>
                </div>
                <?php endif; ?>
                <span class="program-detail-ages"><?php echo esc_html($prog['ages']); ?></span>
            </div>
            <div class="program-detail-content">
                <span class="program-detail-meta"><?php echo esc_html($prog['ages']); ?></span>
                <h2 class="program-detail-title"><?php echo esc_html($prog['title']); ?></h2>
                <p class="program-detail-desc"><?php echo esc_html($prog['desc']); ?></p>
                <ul class="program-detail-features">
                    <?php foreach ($prog['features'] as $feat) : ?>
                    <li><?php echo esc_html($feat); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo esc_url(home_url('/admissions')); ?>" class="btn btn-primary">
                    <?php echo esc_html__('S\'inscrire', 'afvi'); ?> <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="cta-block">
    <div class="container">
        <div class="cta-block-inner">
            <h2 class="cta-block-title"><?php echo esc_html__('Trouvez le programme adapté à votre enfant', 'afvi'); ?></h2>
            <p class="cta-block-text"><?php echo esc_html__('Nos conseillers pédagogiques sont à votre disposition pour vous guider.', 'afvi'); ?></p>
            <div class="cta-block-actions">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent"><?php echo esc_html__('Prendre rendez-vous', 'afvi'); ?> <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
