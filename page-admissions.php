<?php
/**
 * Template Name: Admissions Page
 * @package AFVI
 */

get_header();
?>

<section class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php echo esc_html__('Admissions', 'afvi'); ?></h1>
        <nav class="breadcrumb" aria-label="<?php echo esc_attr__('Fil d\'Ariane', 'afvi'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Accueil', 'afvi'); ?></a>
            <span>/</span>
            <span><?php echo esc_html__('Admissions', 'afvi'); ?></span>
        </nav>
    </div>
</section>

<section class="inner-section admissions-intro">
    <div class="container">
        <div class="inner-section-head">
            <span class="section-subtitle"><?php echo esc_html__('Rejoignez-nous', 'afvi'); ?></span>
            <h2 class="section-title"><?php echo esc_html__('Processus d\'inscription', 'afvi'); ?></h2>
            <p><?php echo esc_html__('L\'inscription à AFVI se fait en quelques étapes simples. Notre équipe vous accompagne tout au long du processus.', 'afvi'); ?></p>
        </div>

        <ol class="admissions-steps-list">
            <?php
            $steps = array(
                array('title' => __('Demande d\'information', 'afvi'), 'desc' => __('Remplissez le formulaire de contact ou appelez-nous pour recevoir les informations sur nos programmes et tarifs.', 'afvi')),
                array('title' => __('Visite du campus', 'afvi'), 'desc' => __('Planifiez une visite guidée pour découvrir nos installations et rencontrer notre équipe pédagogique.', 'afvi')),
                array('title' => __('Dossier d\'inscription', 'afvi'), 'desc' => __('Constituez le dossier de candidature : bulletins scolaires, pièce d\'identité et photos.', 'afvi')),
                array('title' => __('Test d\'évaluation', 'afvi'), 'desc' => __('Un test de positionnement peut être organisé selon le niveau pour proposer le meilleur accompagnement.', 'afvi')),
                array('title' => __('Confirmation', 'afvi'), 'desc' => __('Après acceptation, finalisez l\'inscription et recevez le kit de bienvenue AFVI.', 'afvi')),
            );
            foreach ($steps as $i => $step) :
            ?>
            <li class="admissions-step-item">
                <span class="admissions-step-num" aria-hidden="true"><?php echo $i + 1; ?></span>
                <div class="admissions-step-body">
                    <h3 class="admissions-step-title"><?php echo esc_html($step['title']); ?></h3>
                    <p class="admissions-step-desc"><?php echo esc_html($step['desc']); ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<section class="inner-section alt admissions-docs">
    <div class="container">
        <div class="inner-section-head">
            <span class="section-subtitle"><?php echo esc_html__('Documents requis', 'afvi'); ?></span>
            <h2 class="section-title"><?php echo esc_html__('Pièces à fournir', 'afvi'); ?></h2>
        </div>
        <ul class="admissions-docs-list">
            <?php
            $docs = array(
                array('icon' => 'fa-id-card', 'text' => __('Copie de la carte nationale d\'identité', 'afvi')),
                array('icon' => 'fa-file-alt', 'text' => __('Bulletins scolaires des 2 dernières années', 'afvi')),
                array('icon' => 'fa-camera', 'text' => __('4 photos d\'identité récentes', 'afvi')),
                array('icon' => 'fa-certificate', 'text' => __('Certificat de scolarité de l\'ancien établissement', 'afvi')),
                array('icon' => 'fa-file-medical', 'text' => __('Certificat médical de l\'enfant', 'afvi')),
                array('icon' => 'fa-baby', 'text' => __('Extrait d\'acte de naissance', 'afvi')),
            );
            foreach ($docs as $doc) :
            ?>
            <li class="admissions-doc-item">
                <span class="admissions-doc-icon"><i class="fas <?php echo esc_attr($doc['icon']); ?>"></i></span>
                <span class="admissions-doc-text"><?php echo esc_html($doc['text']); ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="cta-block">
    <div class="container">
        <div class="cta-block-inner">
            <h2 class="cta-block-title"><?php echo esc_html__('Prêt à inscrire votre enfant ?', 'afvi'); ?></h2>
            <p class="cta-block-text"><?php echo esc_html__('Contactez-nous pour démarrer le processus d\'inscription ou pour toute question.', 'afvi'); ?></p>
            <div class="cta-block-actions">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-accent"><?php echo esc_html__('Nous contacter', 'afvi'); ?> <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
