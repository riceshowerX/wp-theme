<?php
/**
 * Titecho Theme Functions
 *
 * @package Titecho
 */

/**
 * Theme version
 */
define( 'TITECHO_VERSION', '1.0.0' );

/**
 * Load theme includes
 */
function titecho_load_includes() {
    // Load theme options
    require_once get_template_directory() . '/inc/theme-options.php';
}
add_action( 'after_setup_theme', 'titecho_load_includes' );

/**
 * Enqueue scripts and styles.
 */
function titecho_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style( 'titecho-style', get_stylesheet_uri(), array(), TITECHO_VERSION );
    
    // Enqueue custom CSS
    wp_enqueue_style( 'titecho-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), TITECHO_VERSION );
    
    // Enqueue Font Awesome for icons
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0' );
    
    // Enqueue jQuery
    wp_enqueue_script( 'jquery' );
    
    // Enqueue custom JavaScript
    wp_enqueue_script( 'titecho-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), TITECHO_VERSION, true );
    
    // Enqueue slick for sliders
    wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1' );
    wp_enqueue_style( 'slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '1.8.1' );
    wp_enqueue_script( 'slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array( 'jquery' ), '1.8.1', true );
    
    // Add support for HTML5 shiv for IE8 and below
    wp_enqueue_script( 'html5-shiv', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3', false );
    wp_script_add_data( 'html5-shiv', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'titecho_scripts' );

/**
 * Set up theme defaults and register support for various WordPress features.
 */
function titecho_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'titecho', get_template_directory() . '/languages' );
    
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );
    
    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    
    // Set default Post Thumbnail size.
    set_post_thumbnail_size( 1200, 675, true );
    
    // Register navigation menus.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'titecho' ),
        'footer'  => esc_html__( 'Footer Menu', 'titecho' ),
    ) );
    
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    
    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'titecho_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );
    
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );
    
    // Add support for wide alignment.
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'titecho_setup' );

/**
 * Register widget area.
 */
function titecho_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'titecho' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'titecho' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'titecho' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'titecho' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'titecho' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'titecho' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'titecho' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'titecho' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'titecho_widgets_init' );

/**
 * Custom navigation walker for primary menu
 */
class Titecho_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class='sub-menu dropdown-menu'>\n";
    }
}

/**
 * Custom excerpt length
 */
function titecho_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'titecho_excerpt_length', 999 );

/**
 * Custom excerpt more
 */
function titecho_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'titecho_excerpt_more' );

/**
 * Add customizer settings - This is redundant with theme-options.php, but kept for compatibility
 * Note: Main customizer settings should be managed in inc/theme-options.php
 */
// Commented out to avoid duplication with theme-options.php
/* function titecho_customize_register( $wp_customize ) {
    // Add company info section
    $wp_customize->add_section( 'titecho_company_info', array(
        'title'    => esc_html__( 'Company Info', 'titecho' ),
        'priority' => 30,
    ) );
    
    // Add phone number setting
    $wp_customize->add_setting( 'titecho_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'titecho_phone', array(
        'label'    => esc_html__( 'Phone Number', 'titecho' ),
        'section'  => 'titecho_company_info',
        'settings' => 'titecho_phone',
        'type'     => 'text',
    ) );
    
    // Add email setting
    $wp_customize->add_setting( 'titecho_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );
    
    $wp_customize->add_control( 'titecho_email', array(
        'label'    => esc_html__( 'Email Address', 'titecho' ),
        'section'  => 'titecho_company_info',
        'settings' => 'titecho_email',
        'type'     => 'email',
    ) );
    
    // Add address setting
    $wp_customize->add_setting( 'titecho_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    
    $wp_customize->add_control( 'titecho_address', array(
        'label'    => esc_html__( 'Address', 'titecho' ),
        'section'  => 'titecho_company_info',
        'settings' => 'titecho_address',
        'type'     => 'textarea',
    ) );
} */
// Commented out to avoid duplication with theme-options.php
// add_action( 'customize_register', 'titecho_customize_register' );
