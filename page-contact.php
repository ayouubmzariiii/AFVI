<?php
/**
 * Template Name: Contact Page
 * @package AFVI
 */

get_header();
?>

<section class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php echo esc_html__('Contactez-nous', 'afvi'); ?></h1>
        <nav class="breadcrumb" aria-label="<?php echo esc_attr__('Fil d\'Ariane', 'afvi'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Accueil', 'afvi'); ?></a>
            <span>/</span>
            <span><?php echo esc_html__('Contact', 'afvi'); ?></span>
        </nav>
    </div>
</section>

<section class="inner-section contact-page-block">
    <div class="container">
        <div class="contact-page-layout">
            <div class="contact-page-info">
                <span class="section-subtitle"><?php echo esc_html__('Nous rejoindre', 'afvi'); ?></span>
                <h2 class="contact-page-heading"><?php echo esc_html__('Coordonnées', 'afvi'); ?></h2>
                <p class="contact-page-intro"><?php echo esc_html__('Notre équipe est à votre disposition pour toute question concernant les inscriptions, nos programmes ou nos services.', 'afvi'); ?></p>
                <ul class="contact-page-cards">
                    <li class="contact-page-card">
                        <span class="contact-page-card-icon"><i class="fas fa-map-marker-alt"></i></span>
                        <div>
                            <strong><?php echo esc_html__('Adresse', 'afvi'); ?></strong>
                            <span><?php echo esc_html(afvi_get('afvi_address', 'Lot Agdal n°39 Q, Casablanca, Morocco')); ?></span>
                        </div>
                    </li>
                    <li class="contact-page-card">
                        <span class="contact-page-card-icon"><i class="fas fa-phone-alt"></i></span>
                        <div>
                            <strong><?php echo esc_html__('Téléphone', 'afvi'); ?></strong>
                            <a href="tel:<?php echo esc_attr(afvi_get('afvi_phone', '+212 5XX-XXXXXX')); ?>"><?php echo esc_html(afvi_get('afvi_phone', '+212 5XX-XXXXXX')); ?></a>
                        </div>
                    </li>
                    <li class="contact-page-card">
                        <span class="contact-page-card-icon"><i class="fas fa-envelope"></i></span>
                        <div>
                            <strong><?php echo esc_html__('Email', 'afvi'); ?></strong>
                            <a href="mailto:<?php echo esc_attr(afvi_get('afvi_email', 'contact@afvi.edu')); ?>"><?php echo esc_html(afvi_get('afvi_email', 'contact@afvi.edu')); ?></a>
                        </div>
                    </li>
                    <li class="contact-page-card">
                        <span class="contact-page-card-icon"><i class="fas fa-clock"></i></span>
                        <div>
                            <strong><?php echo esc_html__('Horaires', 'afvi'); ?></strong>
                            <span><?php echo esc_html__('Lun – Ven : 8h00 – 17h00', 'afvi'); ?><br><?php echo esc_html__('Sam : 8h00 – 12h00', 'afvi'); ?></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="contact-page-form-wrap">
                <h3 class="contact-page-form-title"><?php echo esc_html__('Envoyez-nous un message', 'afvi'); ?></h3>
                <?php
                if (function_exists('shortcode_exists') && shortcode_exists('contact-form-7')) {
                    echo do_shortcode('[contact-form-7 title="Contact"]');
                } else {
                ?>
                <form action="#" method="post" class="contact-page-form">
                    <label>
                        <?php echo esc_html__('Nom complet', 'afvi'); ?> *
                        <input type="text" name="name" required placeholder="<?php echo esc_attr__('Votre nom', 'afvi'); ?>">
                    </label>
                    <label>
                        <?php echo esc_html__('Email', 'afvi'); ?> *
                        <input type="email" name="email" required placeholder="<?php echo esc_attr__('votre@email.com', 'afvi'); ?>">
                    </label>
                    <label>
                        <?php echo esc_html__('Téléphone', 'afvi'); ?>
                        <input type="tel" name="phone" placeholder="<?php echo esc_attr__('+212 6XX-XXXXXX', 'afvi'); ?>">
                    </label>
                    <label>
                        <?php echo esc_html__('Sujet', 'afvi'); ?>
                        <select name="subject">
                            <option value=""><?php echo esc_html__('Choisir un sujet', 'afvi'); ?></option>
                            <option value="inscription"><?php echo esc_html__('Inscriptions', 'afvi'); ?></option>
                            <option value="info"><?php echo esc_html__('Demande d\'information', 'afvi'); ?></option>
                            <option value="visite"><?php echo esc_html__('Visite du campus', 'afvi'); ?></option>
                            <option value="autre"><?php echo esc_html__('Autre', 'afvi'); ?></option>
                        </select>
                    </label>
                    <label>
                        <?php echo esc_html__('Message', 'afvi'); ?> *
                        <textarea name="message" required placeholder="<?php echo esc_attr__('Écrivez votre message...', 'afvi'); ?>" rows="5"></textarea>
                    </label>
                    <button type="submit" class="btn btn-primary btn-block"><?php echo esc_html__('Envoyer', 'afvi'); ?> <i class="fas fa-paper-plane"></i></button>
                </form>
                <?php } ?>
            </div>
        </div>

        <div class="contact-page-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106376.72691942684!2d-7.6513!3d33.5731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!5e0!3m2!1sfr!2sma!4v1"
                width="100%"
                height="360"
                style="border:0; border-radius: var(--radius-lg);"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="<?php echo esc_attr__('Carte', 'afvi'); ?>">
            </iframe>
        </div>
    </div>
</section>

<?php get_footer(); ?>
