<?php
/**
 * AFVI School Theme Functions
 *
 * @package AFVI
 * @version 1.0.0
 */

if (!defined('ABSPATH')) exit;

define('AFVI_VERSION', '1.0.0');
define('AFVI_DIR', get_template_directory());
define('AFVI_URI', get_template_directory_uri());

/* ------------------------------------------------
   1. THEME SETUP
   ------------------------------------------------ */
function afvi_setup() {
    // Title tag support
    add_theme_support('title-tag');

    // Featured images
    add_theme_support('post-thumbnails');
    add_image_size('afvi-hero', 1920, 800, true);
    add_image_size('afvi-news-card', 600, 400, true);
    add_image_size('afvi-program', 600, 600, true);

    // Custom logo
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // HTML5 support
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary'     => __('Primary Navigation', 'afvi'),
        'footer'      => __('Footer Navigation', 'afvi'),
    ));

    // Content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'afvi_setup');

/* ------------------------------------------------
   2. ENQUEUE STYLES & SCRIPTS
   ------------------------------------------------ */
function afvi_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'afvi-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Font Awesome for icons
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Main stylesheet
    wp_enqueue_style(
        'afvi-style',
        get_stylesheet_uri(),
        array('afvi-google-fonts', 'font-awesome'),
        AFVI_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'afvi-main',
        AFVI_URI . '/js/main.js',
        array(),
        AFVI_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'afvi_enqueue_assets');

/* Output logo heights as CSS custom properties */
function afvi_logo_inline_css() {
    $logo_height = get_theme_mod('afvi_logo_height', 70);
    $footer_logo_height = get_theme_mod('afvi_footer_logo_height', 100);
    echo '<style>:root { --logo-height: ' . absint($logo_height) . 'px; --footer-logo-height: ' . absint($footer_logo_height) . 'px; }</style>';
}
add_action('wp_head', 'afvi_logo_inline_css', 100);

/* Customizer live preview for logo heights */
function afvi_customizer_preview_js() {
    wp_add_inline_script('customize-preview', '
        wp.customize("afvi_logo_height", function(value) {
            value.bind(function(newval) {
                document.documentElement.style.setProperty("--logo-height", newval + "px");
            });
        });
        wp.customize("afvi_footer_logo_height", function(value) {
            value.bind(function(newval) {
                document.documentElement.style.setProperty("--footer-logo-height", newval + "px");
            });
        });
    ');
}
add_action('customize_preview_init', 'afvi_customizer_preview_js');

/* ------------------------------------------------
   3. REGISTER WIDGET AREAS
   ------------------------------------------------ */
function afvi_widgets_init() {
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'afvi'),
        'id'            => 'blog-sidebar',
        'description'   => __('Widgets in the blog sidebar.', 'afvi'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 1', 'afvi'),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 2', 'afvi'),
        'id'            => 'footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'afvi_widgets_init');

/* ------------------------------------------------
   4. CUSTOM POST TYPE: EVENTS
   ------------------------------------------------ */
function afvi_register_events() {
    register_post_type('afvi_event', array(
        'labels' => array(
            'name'               => __('Events', 'afvi'),
            'singular_name'      => __('Event', 'afvi'),
            'add_new'            => __('Add New Event', 'afvi'),
            'add_new_item'       => __('Add New Event', 'afvi'),
            'edit_item'          => __('Edit Event', 'afvi'),
            'view_item'          => __('View Event', 'afvi'),
            'all_items'          => __('All Events', 'afvi'),
            'search_items'       => __('Search Events', 'afvi'),
            'not_found'          => __('No events found.', 'afvi'),
            'not_found_in_trash' => __('No events in trash.', 'afvi'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-calendar-alt',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'      => array('slug' => 'events'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'afvi_register_events');

/* Event Meta Boxes */
function afvi_event_meta_boxes() {
    add_meta_box('afvi_event_details', __('Event Details', 'afvi'), 'afvi_event_meta_callback', 'afvi_event', 'side');
}
add_action('add_meta_boxes', 'afvi_event_meta_boxes');

function afvi_event_meta_callback($post) {
    wp_nonce_field('afvi_event_meta', 'afvi_event_nonce');
    $date     = get_post_meta($post->ID, '_event_date', true);
    $location = get_post_meta($post->ID, '_event_location', true);
    ?>
    <p>
        <label for="event_date"><strong><?php _e('Event Date:', 'afvi'); ?></strong></label><br>
        <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($date); ?>" style="width:100%">
    </p>
    <p>
        <label for="event_location"><strong><?php _e('Location:', 'afvi'); ?></strong></label><br>
        <input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($location); ?>" style="width:100%">
    </p>
    <?php
}

function afvi_save_event_meta($post_id) {
    if (!isset($_POST['afvi_event_nonce']) || !wp_verify_nonce($_POST['afvi_event_nonce'], 'afvi_event_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
    }
    if (isset($_POST['event_location'])) {
        update_post_meta($post_id, '_event_location', sanitize_text_field($_POST['event_location']));
    }
}
add_action('save_post_afvi_event', 'afvi_save_event_meta');

/* ------------------------------------------------
   5. THEME CUSTOMIZER
   ------------------------------------------------ */
function afvi_customize_register($wp_customize) {

    /* --- Logo Settings --- */
    $wp_customize->add_section('afvi_logo_settings', array(
        'title'    => __('Logo Settings', 'afvi'),
        'priority' => 25,
    ));

    $wp_customize->add_setting('afvi_logo_height', array(
        'default'           => 70,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('afvi_logo_height', array(
        'label'       => __('Logo Height (px)', 'afvi'),
        'description' => __('Adjust the logo size in the header. Default: 70px.', 'afvi'),
        'section'     => 'afvi_logo_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 40,
            'max'  => 120,
            'step' => 5,
        ),
    ));

    // Footer Logo (separate from header)
    $wp_customize->add_setting('afvi_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'afvi_footer_logo', array(
        'label'       => __('Footer Logo', 'afvi'),
        'description' => __('Upload a separate logo for the footer. If not set, the header logo will be used.', 'afvi'),
        'section'     => 'afvi_logo_settings',
    )));

    // Footer Logo Height
    $wp_customize->add_setting('afvi_footer_logo_height', array(
        'default'           => 100,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control('afvi_footer_logo_height', array(
        'label'       => __('Footer Logo Height (px)', 'afvi'),
        'description' => __('Adjust the footer logo size. Default: 100px.', 'afvi'),
        'section'     => 'afvi_logo_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 40,
            'max'  => 200,
            'step' => 5,
        ),
    ));

    /* --- Hero Section --- */
    $wp_customize->add_section('afvi_hero', array(
        'title'    => __('Hero Section', 'afvi'),
        'priority' => 30,
    ));

    // Hero background image (homepage)
    $wp_customize->add_setting('afvi_hero_image_1', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'afvi_hero_image_1', array(
        'label'       => __('Hero Background Image', 'afvi'),
        'description' => __('Image used as the full-width hero background on the homepage. Recommended: 1920×1080 or larger.', 'afvi'),
        'section'     => 'afvi_hero',
    )));

    // Hero Image 2
    $wp_customize->add_setting('afvi_hero_image_2', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'afvi_hero_image_2', array(
        'label'   => __('Hero Image 2', 'afvi'),
        'section' => 'afvi_hero',
    )));

    // Hero Image 3
    $wp_customize->add_setting('afvi_hero_image_3', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'afvi_hero_image_3', array(
        'label'   => __('Hero Image 3', 'afvi'),
        'section' => 'afvi_hero',
    )));

    // Hero Title
    $wp_customize->add_setting('afvi_hero_title', array(
        'default'           => 'Bienvenue à AFVI',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('afvi_hero_title', array(
        'label'   => __('Hero Title', 'afvi'),
        'section' => 'afvi_hero',
        'type'    => 'text',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('afvi_hero_subtitle', array(
        'default'           => 'Former les leaders de demain',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('afvi_hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'afvi'),
        'section' => 'afvi_hero',
        'type'    => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('afvi_hero_description', array(
        'default'           => 'Un établissement d\'excellence dédié à l\'épanouissement et à la réussite de chaque élève.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('afvi_hero_description', array(
        'label'   => __('Hero Description', 'afvi'),
        'section' => 'afvi_hero',
        'type'    => 'textarea',
    ));

    /* --- Contact Info Section --- */
    $wp_customize->add_section('afvi_contact_info', array(
        'title'    => __('Contact Information', 'afvi'),
        'priority' => 35,
    ));

    $contact_fields = array(
        'phone'     => array('Phone Number', '+212 5XX-XXXXXX'),
        'email'     => array('Email Address', 'contact@afvi.edu'),
        'address'   => array('Address', 'Lot Agdal n°39 Q, Casablanca, Morocco'),
    );

    foreach ($contact_fields as $key => $field) {
        $wp_customize->add_setting("afvi_{$key}", array(
            'default'           => $field[1],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("afvi_{$key}", array(
            'label'   => __($field[0], 'afvi'),
            'section' => 'afvi_contact_info',
            'type'    => 'text',
        ));
    }

    /* --- Social Media --- */
    $wp_customize->add_section('afvi_social', array(
        'title'    => __('Social Media Links', 'afvi'),
        'priority' => 40,
    ));

    $socials = array('facebook', 'instagram', 'youtube', 'linkedin');
    foreach ($socials as $social) {
        $wp_customize->add_setting("afvi_{$social}", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("afvi_{$social}", array(
            'label'   => ucfirst($social) . ' URL',
            'section' => 'afvi_social',
            'type'    => 'url',
        ));
    }

    /* --- Statistics Section --- */
    $wp_customize->add_section('afvi_stats', array(
        'title'    => __('Key Statistics', 'afvi'),
        'priority' => 45,
    ));

    $stats = array(
        array('students_count', 'Number of Students', '+1500'),
        array('teachers_count', 'Number of Teachers', '120'),
        array('programs_count', 'Number of Programs', '15'),
        array('years_count', 'Years of Excellence', '25'),
    );

    foreach ($stats as $stat) {
        $wp_customize->add_setting("afvi_{$stat[0]}", array(
            'default'           => $stat[2],
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("afvi_{$stat[0]}", array(
            'label'   => __($stat[1], 'afvi'),
            'section' => 'afvi_stats',
            'type'    => 'text',
        ));
    }
}
add_action('customize_register', 'afvi_customize_register');

/* ------------------------------------------------
   6. HELPER FUNCTIONS
   ------------------------------------------------ */

// Get customizer value with fallback
function afvi_get($key, $default = '') {
    return get_theme_mod($key, $default);
}

// Custom excerpt length
function afvi_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'afvi_excerpt_length');

function afvi_excerpt_more($more) {
    return '&hellip;';
}
add_filter('excerpt_more', 'afvi_excerpt_more');

// Custom Walker for navigation (adds submenu toggle for mobile)
class AFVI_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="sub-menu">';
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = implode(' ', $item->classes);
        $has_children = in_array('menu-item-has-children', $item->classes);

        $output .= '<li class="' . esc_attr($classes) . '">';
        $output .= '<a href="' . esc_url($item->url) . '">';
        $output .= esc_html($item->title);
        $output .= '</a>';

        if ($has_children && $depth === 0) {
            $output .= '<button class="submenu-toggle" aria-label="Toggle submenu"><i class="fas fa-chevron-down"></i></button>';
        }
    }
}

// Fallback menu
function afvi_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Accueil</a></li>';
    echo '<li><a href="#">À propos</a></li>';
    echo '<li><a href="#">Programmes</a></li>';
    echo '<li><a href="#">Admissions</a></li>';
    echo '<li><a href="#">Actualités</a></li>';
    echo '<li><a href="#">Contact</a></li>';
    echo '</ul>';
}
//////teeeeeeeets