<?php
/**
 * London Pentecostal Church — functions.php
 * Theme setup, enqueue scripts/styles, custom post types, widgets
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LPC_VERSION', '1.0.0' );
define( 'LPC_DIR', get_template_directory() );
define( 'LPC_URI', get_template_directory_uri() );

/* ==========================================================================
   THEME SETUP
   ========================================================================== */

function lpc_theme_setup() {
    load_theme_textdomain( 'lpc', LPC_DIR . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption','style','script' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 100,
        'width'       => 100,
        'flex-width'  => true,
        'flex-height' => true,
    ]);
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );

    register_nav_menus([
        'primary' => __( 'Primary Navigation', 'lpc' ),
        'footer'  => __( 'Footer Navigation',  'lpc' ),
        'social'  => __( 'Social Links',        'lpc' ),
    ]);

    // Image sizes
    add_image_size( 'sermon-thumb',  800, 450, true );
    add_image_size( 'news-featured', 900, 500, true );
    add_image_size( 'pastor-photo',  400, 400, true );
}
add_action( 'after_setup_theme', 'lpc_theme_setup' );

/* ==========================================================================
   ENQUEUE STYLES & SCRIPTS
   ========================================================================== */

function lpc_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'lpc-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600;1,700&family=Lato:wght@300;400;700&display=swap',
        [],
        null
    );

    // Tabler Icons (lightweight icon font)
    wp_enqueue_style(
        'tabler-icons',
        'https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css',
        [],
        '3.0.0'
    );

    // Main stylesheet
    wp_enqueue_style(
        'lpc-style',
        get_stylesheet_uri(),
        [ 'lpc-fonts', 'tabler-icons' ],
        LPC_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'lpc-main',
        LPC_URI . '/js/main.js',
        [],
        LPC_VERSION,
        true
    );

    // Pass data to JS
    wp_localize_script( 'lpc-main', 'lpcData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'lpc_nonce' ),
    ]);

    // Comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'lpc_enqueue_assets' );

/* ==========================================================================
   CUSTOM POST TYPES
   ========================================================================== */

function lpc_register_post_types() {

    // Sermons CPT
    register_post_type( 'sermon', [
        'labels' => [
            'name'               => __( 'Sermons', 'lpc' ),
            'singular_name'      => __( 'Sermon', 'lpc' ),
            'add_new_item'       => __( 'Add New Sermon', 'lpc' ),
            'edit_item'          => __( 'Edit Sermon', 'lpc' ),
            'menu_name'          => __( 'Sermons', 'lpc' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => [ 'slug' => 'sermons' ],
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'menu_icon'    => 'dashicons-video-alt3',
        'show_in_rest' => true,
    ]);

    // Branches CPT
    register_post_type( 'branch', [
        'labels' => [
            'name'               => __( 'Branches', 'lpc' ),
            'singular_name'      => __( 'Branch', 'lpc' ),
            'add_new_item'       => __( 'Add New Branch', 'lpc' ),
            'edit_item'          => __( 'Edit Branch', 'lpc' ),
            'menu_name'          => __( 'Branches', 'lpc' ),
        ],
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => [ 'slug' => 'branches' ],
        'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ],
        'menu_icon'    => 'dashicons-building',
        'show_in_rest' => true,
    ]);

    // Pastors CPT
    register_post_type( 'pastor', [
        'labels' => [
            'name'               => __( 'Pastors & Ministers', 'lpc' ),
            'singular_name'      => __( 'Pastor', 'lpc' ),
            'add_new_item'       => __( 'Add New Pastor', 'lpc' ),
            'menu_name'          => __( 'Pastors', 'lpc' ),
        ],
        'public'       => true,
        'has_archive'  => false,
        'rewrite'      => [ 'slug' => 'pastors' ],
        'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ],
        'menu_icon'    => 'dashicons-groups',
        'show_in_rest' => true,
    ]);

    // Ministries CPT
    register_post_type( 'ministry', [
        'labels' => [
            'name'               => __( 'Ministries', 'lpc' ),
            'singular_name'      => __( 'Ministry', 'lpc' ),
            'add_new_item'       => __( 'Add New Ministry', 'lpc' ),
            'menu_name'          => __( 'Ministries', 'lpc' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => [ 'slug' => 'ministries' ],
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'menu_icon'    => 'dashicons-heart',
        'show_in_rest' => true,
    ]);
}
add_action( 'init', 'lpc_register_post_types' );

/* ==========================================================================
   CUSTOM TAXONOMIES
   ========================================================================== */

function lpc_register_taxonomies() {

    // Sermon series
    register_taxonomy( 'sermon_series', 'sermon', [
        'labels'       => [ 'name' => __( 'Series', 'lpc' ), 'singular_name' => __( 'Series', 'lpc' ) ],
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'sermon-series' ],
        'show_in_rest' => true,
    ]);

    // Sermon language
    register_taxonomy( 'sermon_language', 'sermon', [
        'labels'       => [ 'name' => __( 'Language', 'lpc' ), 'singular_name' => __( 'Language', 'lpc' ) ],
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'sermon-language' ],
        'show_in_rest' => true,
    ]);

    // Announcement category
    register_taxonomy( 'announcement_type', 'post', [
        'labels'       => [ 'name' => __( 'Announcement Type', 'lpc' ), 'singular_name' => __( 'Type', 'lpc' ) ],
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'announcement' ],
        'show_in_rest' => true,
    ]);
}
add_action( 'init', 'lpc_register_taxonomies' );

/* ==========================================================================
   CUSTOM FIELDS (meta boxes — no ACF required for basics)
   ========================================================================== */

function lpc_add_meta_boxes() {
    add_meta_box( 'lpc_sermon_meta',  __( 'Sermon Details', 'lpc' ),  'lpc_sermon_meta_cb',  'sermon',  'normal', 'high' );
    add_meta_box( 'lpc_branch_meta',  __( 'Branch Details', 'lpc' ),  'lpc_branch_meta_cb',  'branch',  'normal', 'high' );
    add_meta_box( 'lpc_pastor_meta',  __( 'Pastor Details', 'lpc' ),  'lpc_pastor_meta_cb',  'pastor',  'normal', 'high' );
}
add_action( 'add_meta_boxes', 'lpc_add_meta_boxes' );

function lpc_sermon_meta_cb( $post ) {
    wp_nonce_field( 'lpc_sermon_nonce', '_lpc_sermon_nonce' );
    $youtube  = get_post_meta( $post->ID, '_lpc_youtube_url',  true );
    $date     = get_post_meta( $post->ID, '_lpc_sermon_date',  true );
    $pastor   = get_post_meta( $post->ID, '_lpc_pastor_name',  true );
    $language = get_post_meta( $post->ID, '_lpc_language',     true );
    ?>
    <table class="form-table" style="font-family:sans-serif;">
      <tr><th><label for="lpc_youtube_url">YouTube URL</label></th>
          <td><input type="url" id="lpc_youtube_url" name="lpc_youtube_url" value="<?php echo esc_attr($youtube); ?>" class="regular-text" placeholder="https://youtube.com/watch?v=..."></td></tr>
      <tr><th><label for="lpc_sermon_date">Date</label></th>
          <td><input type="date" id="lpc_sermon_date" name="lpc_sermon_date" value="<?php echo esc_attr($date); ?>"></td></tr>
      <tr><th><label for="lpc_pastor_name">Pastor / Speaker</label></th>
          <td><input type="text" id="lpc_pastor_name" name="lpc_pastor_name" value="<?php echo esc_attr($pastor); ?>" class="regular-text"></td></tr>
      <tr><th><label for="lpc_language">Language</label></th>
          <td><select id="lpc_language" name="lpc_language">
            <option value="English"   <?php selected($language,'English'); ?>>English</option>
            <option value="Malayalam" <?php selected($language,'Malayalam'); ?>>Malayalam</option>
            <option value="Hindi"     <?php selected($language,'Hindi'); ?>>Hindi</option>
          </select></td></tr>
    </table>
    <?php
}

function lpc_branch_meta_cb( $post ) {
    wp_nonce_field( 'lpc_branch_nonce', '_lpc_branch_nonce' );
    $address   = get_post_meta( $post->ID, '_lpc_address',      true );
    $postcode  = get_post_meta( $post->ID, '_lpc_postcode',     true );
    $sun_time  = get_post_meta( $post->ID, '_lpc_sunday_time',  true );
    $languages = get_post_meta( $post->ID, '_lpc_languages',    true );
    $colour    = get_post_meta( $post->ID, '_lpc_brand_colour', true );
    $css_class = get_post_meta( $post->ID, '_lpc_css_class',    true );
    $logo_url  = get_post_meta( $post->ID, '_lpc_logo_url',     true );
    ?>
    <table class="form-table" style="font-family:sans-serif;">
      <tr><th><label for="lpc_address">Address</label></th>
          <td><input type="text" id="lpc_address" name="lpc_address" value="<?php echo esc_attr($address); ?>" class="regular-text"></td></tr>
      <tr><th><label for="lpc_postcode">Postcode</label></th>
          <td><input type="text" id="lpc_postcode" name="lpc_postcode" value="<?php echo esc_attr($postcode); ?>" style="width:120px;"></td></tr>
      <tr><th><label for="lpc_sunday_time">Sunday Service Times</label></th>
          <td><input type="text" id="lpc_sunday_time" name="lpc_sunday_time" value="<?php echo esc_attr($sun_time); ?>" class="regular-text" placeholder="e.g. 10:00 AM · 12:30 PM"></td></tr>
      <tr><th><label for="lpc_languages">Languages</label></th>
          <td><input type="text" id="lpc_languages" name="lpc_languages" value="<?php echo esc_attr($languages); ?>" class="regular-text" placeholder="e.g. English · Malayalam"></td></tr>
      <tr><th><label for="lpc_brand_colour">Brand Colour (hex)</label></th>
          <td><input type="color" id="lpc_brand_colour" name="lpc_brand_colour" value="<?php echo esc_attr($colour ?: '#8a3020'); ?>"></td></tr>
      <tr><th><label for="lpc_css_class">CSS Class</label></th>
          <td><input type="text" id="lpc_css_class" name="lpc_css_class" value="<?php echo esc_attr($css_class); ?>" placeholder="e.g. branch-bpc"><br>
          <small>Use: branch-lpc, branch-bpc, branch-cpc, branch-hpc, branch-slpc</small></td></tr>
      <tr><th><label for="lpc_logo_url">Logo URL</label></th>
          <td><input type="url" id="lpc_logo_url" name="lpc_logo_url" value="<?php echo esc_attr($logo_url); ?>" class="regular-text"></td></tr>
    </table>
    <?php
}

function lpc_pastor_meta_cb( $post ) {
    wp_nonce_field( 'lpc_pastor_nonce', '_lpc_pastor_nonce' );
    $role      = get_post_meta( $post->ID, '_lpc_role',        true );
    $scripture = get_post_meta( $post->ID, '_lpc_scripture',   true );
    $branch    = get_post_meta( $post->ID, '_lpc_branch',      true );
    $email     = get_post_meta( $post->ID, '_lpc_email',       true );
    ?>
    <table class="form-table" style="font-family:sans-serif;">
      <tr><th><label for="lpc_role">Role / Title</label></th>
          <td><input type="text" id="lpc_role" name="lpc_role" value="<?php echo esc_attr($role); ?>" class="regular-text" placeholder="e.g. Senior Pastor"></td></tr>
      <tr><th><label for="lpc_scripture">Favourite Scripture</label></th>
          <td><input type="text" id="lpc_scripture" name="lpc_scripture" value="<?php echo esc_attr($scripture); ?>" class="regular-text"></td></tr>
      <tr><th><label for="lpc_branch">Branch</label></th>
          <td><input type="text" id="lpc_branch" name="lpc_branch" value="<?php echo esc_attr($branch); ?>" class="regular-text" placeholder="e.g. Chadwell Heath"></td></tr>
      <tr><th><label for="lpc_email">Contact Email</label></th>
          <td><input type="email" id="lpc_email" name="lpc_email" value="<?php echo esc_attr($email); ?>" class="regular-text"></td></tr>
    </table>
    <?php
}

// Save meta
function lpc_save_meta( $post_id ) {
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // Sermon
    if ( isset($_POST['_lpc_sermon_nonce']) && wp_verify_nonce($_POST['_lpc_sermon_nonce'], 'lpc_sermon_nonce') ) {
        $fields = ['lpc_youtube_url','lpc_sermon_date','lpc_pastor_name','lpc_language'];
        foreach ( $fields as $field ) {
            if ( isset($_POST[$field]) ) {
                update_post_meta( $post_id, '_' . $field, sanitize_text_field($_POST[$field]) );
            }
        }
    }
    // Branch
    if ( isset($_POST['_lpc_branch_nonce']) && wp_verify_nonce($_POST['_lpc_branch_nonce'], 'lpc_branch_nonce') ) {
        $fields = ['lpc_address','lpc_postcode','lpc_sunday_time','lpc_languages','lpc_brand_colour','lpc_css_class','lpc_logo_url'];
        foreach ( $fields as $field ) {
            if ( isset($_POST[$field]) ) {
                update_post_meta( $post_id, '_' . $field, sanitize_text_field($_POST[$field]) );
            }
        }
    }
    // Pastor
    if ( isset($_POST['_lpc_pastor_nonce']) && wp_verify_nonce($_POST['_lpc_pastor_nonce'], 'lpc_pastor_nonce') ) {
        $fields = ['lpc_role','lpc_scripture','lpc_branch','lpc_email'];
        foreach ( $fields as $field ) {
            if ( isset($_POST[$field]) ) {
                update_post_meta( $post_id, '_' . $field, sanitize_text_field($_POST[$field]) );
            }
        }
    }
}
add_action( 'save_post', 'lpc_save_meta' );

/* ==========================================================================
   WIDGETS
   ========================================================================== */

function lpc_register_widgets() {
    register_sidebar([
        'name'          => __( 'Footer Widget Area', 'lpc' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets to the footer.', 'lpc' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-heading">',
        'after_title'   => '</h3>',
    ]);
}
add_action( 'widgets_init', 'lpc_register_widgets' );

/* ==========================================================================
   THEME CUSTOMIZER
   ========================================================================== */

function lpc_customizer( $wp_customize ) {

    $wp_customize->add_panel('lpc_panel', [
        'title'    => __( 'LPC Theme Options', 'lpc' ),
        'priority' => 30,
    ]);

    // Hero section
    $wp_customize->add_section('lpc_hero', [
        'title' => __( 'Hero Section', 'lpc' ),
        'panel' => 'lpc_panel',
    ]);
    $fields = [
        'lpc_hero_eyebrow'  => [ 'label' => 'Eyebrow Text',   'default' => 'Welcome · London Pentecostal Church' ],
        'lpc_hero_title'    => [ 'label' => 'Hero Title',      'default' => 'A Place of Peace, Hope & Belonging.' ],
        'lpc_hero_subtitle' => [ 'label' => 'Hero Subtitle',   'default' => 'Come as you are. You are welcomed, loved, and expected.' ],
        'lpc_hero_btn1'     => [ 'label' => 'Button 1 Text',   'default' => 'Plan Your Visit' ],
        'lpc_hero_btn1_url' => [ 'label' => 'Button 1 URL',    'default' => '/contact' ],
        'lpc_hero_btn2'     => [ 'label' => 'Button 2 Text',   'default' => 'Watch a Sermon' ],
        'lpc_hero_btn2_url' => [ 'label' => 'Button 2 URL',    'default' => '/sermons' ],
    ];
    foreach ( $fields as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( $key, [ 'label' => $args['label'], 'section' => 'lpc_hero', 'type' => 'text' ] );
    }

    // Service times
    $wp_customize->add_section('lpc_times', [
        'title' => __( 'Service Times', 'lpc' ),
        'panel' => 'lpc_panel',
    ]);
    $times = [
        'lpc_time_english'   => [ 'label' => 'English Service',   'default' => 'Sunday · 10:00 AM' ],
        'lpc_time_malayalam' => [ 'label' => 'Malayalam Service',  'default' => 'Sunday · 12:30 PM' ],
        'lpc_time_hindi'     => [ 'label' => 'Hindi Service',      'default' => 'Sunday · 3:00 PM'  ],
        'lpc_time_bible'     => [ 'label' => 'Bible Study',        'default' => 'Wednesday · 7:00 PM' ],
    ];
    foreach ( $times as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( $key, [ 'label' => $args['label'], 'section' => 'lpc_times', 'type' => 'text' ] );
    }

    // Contact info
    $wp_customize->add_section('lpc_contact', [
        'title' => __( 'Contact Information', 'lpc' ),
        'panel' => 'lpc_panel',
    ]);
    $contact = [
        'lpc_address'   => [ 'label' => 'Address',        'default' => 'Oasis Centre, Essex Road, Chadwell Heath, Romford RM6' ],
        'lpc_email'     => [ 'label' => 'Email',           'default' => 'info@londonpentecostalchurch.org' ],
        'lpc_phone'     => [ 'label' => 'Phone',           'default' => '' ],
        'lpc_youtube'   => [ 'label' => 'YouTube Channel URL', 'default' => 'https://www.youtube.com/@LondonPentecostalChurch' ],
        'lpc_facebook'  => [ 'label' => 'Facebook URL',    'default' => '' ],
        'lpc_instagram' => [ 'label' => 'Instagram URL',   'default' => '' ],
    ];
    foreach ( $contact as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( $key, [ 'label' => $args['label'], 'section' => 'lpc_contact', 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'lpc_customizer' );

/* ==========================================================================
   HELPER FUNCTIONS
   ========================================================================== */

function lpc_get( $key, $fallback = '' ) {
    return get_theme_mod( $key, $fallback );
}

function lpc_youtube_embed_url( $url ) {
    if ( empty($url) ) return '';
    preg_match( '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $m );
    return isset($m[1]) ? 'https://www.youtube.com/embed/' . $m[1] . '?rel=0' : '';
}

function lpc_youtube_thumb( $url ) {
    preg_match( '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $m );
    return isset($m[1]) ? 'https://img.youtube.com/vi/' . $m[1] . '/hqdefault.jpg' : '';
}

function lpc_get_sermons( $count = 3, $lang = '' ) {
    $args = [
        'post_type'      => 'sermon',
        'posts_per_page' => $count,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];
    if ( $lang ) {
        $args['tax_query'] = [[
            'taxonomy' => 'sermon_language',
            'field'    => 'slug',
            'terms'    => sanitize_title($lang),
        ]];
    }
    return new WP_Query( $args );
}

function lpc_get_branches() {
    return new WP_Query([
        'post_type'      => 'branch',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ]);
}

function lpc_branch_css_var( $post_id ) {
    $colour = get_post_meta( $post_id, '_lpc_brand_colour', true );
    if ( $colour ) {
        return 'style="--branch-color:' . esc_attr($colour) . ';"';
    }
    return '';
}

/* ==========================================================================
   EXCERPT LENGTH
   ========================================================================== */

add_filter( 'excerpt_length', fn() => 25 );
add_filter( 'excerpt_more',   fn() => '&hellip;' );

/* ==========================================================================
   BODY CLASSES
   ========================================================================== */

function lpc_body_classes( $classes ) {
    if ( is_front_page() ) $classes[] = 'lpc-home';
    if ( is_page()       ) $classes[] = 'lpc-page';
    if ( is_singular('sermon') ) $classes[] = 'lpc-sermon-single';
    return $classes;
}
add_filter( 'body_class', 'lpc_body_classes' );

/* ==========================================================================
   SECURITY
   ========================================================================== */

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
add_filter( 'the_generator', '__return_empty_string' );

require_once LPC_DIR . '/inc/nav-walker.php';
