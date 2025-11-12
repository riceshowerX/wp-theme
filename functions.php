<?php
/**
 * Titecho Theme Functions
 *
 * @package Titecho
 */

/**
 * Theme version
 */
define( 'TITECHO_VERSION', '1.0.1' );

/**
 * Define theme constants for better organization
 */
define( 'TITECHO_DIR', get_template_directory() );
define( 'TITECHO_URI', get_template_directory_uri() );
define( 'TITECHO_ASSETS', TITECHO_URI . '/assets' );

/**
 * Load theme includes
 */
function titecho_load_includes() {
    // Load theme options
    if ( file_exists( TITECHO_DIR . '/inc/theme-options.php' ) ) {
        require_once TITECHO_DIR . '/inc/theme-options.php';
    }
    
    // Load custom post type registrations
    titecho_register_custom_post_types();
    
    // Load custom taxonomies
    titecho_register_custom_taxonomies();
}
add_action( 'after_setup_theme', 'titecho_load_includes' );

/**
 * Register custom post types
 */
function titecho_register_custom_post_types() {
    // Register Product custom post type
    $product_labels = array(
        'name'                  => esc_html__( 'Products', 'titecho' ),
        'singular_name'         => esc_html__( 'Product', 'titecho' ),
        'menu_name'             => esc_html__( 'Products', 'titecho' ),
        'name_admin_bar'        => esc_html__( 'Product', 'titecho' ),
        'add_new'               => esc_html__( 'Add New', 'titecho' ),
        'add_new_item'          => esc_html__( 'Add New Product', 'titecho' ),
        'new_item'              => esc_html__( 'New Product', 'titecho' ),
        'edit_item'             => esc_html__( 'Edit Product', 'titecho' ),
        'view_item'             => esc_html__( 'View Product', 'titecho' ),
        'all_items'             => esc_html__( 'All Products', 'titecho' ),
        'search_items'          => esc_html__( 'Search Products', 'titecho' ),
        'parent_item_colon'     => esc_html__( 'Parent Products:', 'titecho' ),
        'not_found'             => esc_html__( 'No products found.', 'titecho' ),
        'not_found_in_trash'    => esc_html__( 'No products found in Trash.', 'titecho' )
    );

    $product_args = array(
        'labels'             => $product_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-products',
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'comments' ),
        'taxonomies'         => array( 'product_category' ),
        'show_in_rest'       => true,
        'rest_base'          => 'products',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    );

    register_post_type( 'product', $product_args );
}

/**
 * Register custom taxonomies
 */
function titecho_register_custom_taxonomies() {
    // Register Product Category taxonomy
    $category_labels = array(
        'name'              => esc_html__( 'Product Categories', 'titecho' ),
        'singular_name'     => esc_html__( 'Product Category', 'titecho' ),
        'search_items'      => esc_html__( 'Search Product Categories', 'titecho' ),
        'all_items'         => esc_html__( 'All Product Categories', 'titecho' ),
        'parent_item'       => esc_html__( 'Parent Product Category', 'titecho' ),
        'parent_item_colon' => esc_html__( 'Parent Product Category:', 'titecho' ),
        'edit_item'         => esc_html__( 'Edit Product Category', 'titecho' ),
        'update_item'       => esc_html__( 'Update Product Category', 'titecho' ),
        'add_new_item'      => esc_html__( 'Add New Product Category', 'titecho' ),
        'new_item_name'     => esc_html__( 'New Product Category Name', 'titecho' ),
        'menu_name'         => esc_html__( 'Categories', 'titecho' ),
    );

    $category_args = array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-category' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'product_category', array( 'product' ), $category_args );
}

/**
 * Enqueue scripts and styles with optimization
 */
function titecho_scripts() {
    // Enqueue main stylesheet with cache buster
    wp_enqueue_style( 'titecho-style', get_stylesheet_uri(), array(), TITECHO_VERSION );
    
    // Enqueue custom CSS if it exists
    if ( file_exists( TITECHO_DIR . '/assets/css/custom.css' ) ) {
        wp_enqueue_style( 'titecho-custom', TITECHO_ASSETS . '/css/custom.css', array(), TITECHO_VERSION );
    }
    
    // Enqueue Font Awesome for icons - using the latest version
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
    
    // Enqueue jQuery (already included by WordPress)
    wp_enqueue_script( 'jquery' );
    
    // Create an array of localized data for JavaScript
    $localized_data = array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'theme_url' => TITECHO_URI,
        'nonce' => wp_create_nonce( 'titecho_ajax_nonce' ),
        'is_mobile' => wp_is_mobile(),
    );
    
    // Enqueue custom JavaScript with defer and localized data
    wp_enqueue_script( 'titecho-custom', TITECHO_ASSETS . '/js/custom.js', array( 'jquery' ), TITECHO_VERSION, array( 
        'strategy' => 'defer',
        'in_footer' => true
    ) );
    
    // Localize the script with our data
    wp_localize_script( 'titecho-custom', 'titechoData', $localized_data );
    
    // Only load slick carousel on pages that need it (front page and products page)
    if ( is_front_page() || is_page_template( 'products.php' ) || is_post_type_archive( 'product' ) ) {
        wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1' );
        wp_enqueue_style( 'slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '1.8.1' );
        wp_enqueue_script( 'slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array( 'jquery' ), '1.8.1', array( 
            'strategy' => 'defer',
            'in_footer' => true
        ) );
    }
    
    // Add JavaScript for animations and scroll effects
    wp_enqueue_script( 'titecho-animations', TITECHO_ASSETS . '/js/animations.js', array( 'jquery' ), TITECHO_VERSION, array( 
        'strategy' => 'defer',
        'in_footer' => true
    ) );
    
    // Add support for HTML5 shiv for IE8 and below
    wp_enqueue_script( 'html5-shiv', 'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3', false );
    wp_script_add_data( 'html5-shiv', 'conditional', 'lt IE 9' );
    
    // Add JavaScript for comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
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
 * Custom excerpt more with read more link
 */
function titecho_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s"> %2$s</a>',
            get_permalink( get_the_ID() ),
            esc_html__( 'Read more', 'titecho' )
        );
    }
    return $more;
}
add_filter( 'excerpt_more', 'titecho_excerpt_more' );

/**
 * Performance optimization - Remove unnecessary WordPress features
 */
function titecho_remove_unnecessary_features() {
    // Remove emoji scripts
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    
    // Remove REST API link and other WordPress tags
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'index_rel_link' );
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'wp_generator' );
    
    // Disable self-pingback
    add_filter( 'xmlrpc_methods', function( $methods ) {
        unset( $methods['pingback.ping'] );
        return $methods;
    });
    
    // Remove query strings from static resources for better caching
    add_filter( 'script_loader_src', 'titecho_remove_query_strings', 15, 1 );
    add_filter( 'style_loader_src', 'titecho_remove_query_strings', 15, 1 );
}
add_action( 'after_setup_theme', 'titecho_remove_unnecessary_features' );

/**
 * Remove query strings from static resources
 */
function titecho_remove_query_strings( $src ) {
    if ( strpos( $src, '?ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}

/**
 * Add security headers
 */
function titecho_security_headers() {
    header( 'X-Content-Type-Options: nosniff' );
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-XSS-Protection: 1; mode=block' );
    header( 'Referrer-Policy: strict-origin-when-cross-origin' );
    // Add Content Security Policy header
    header( "Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com; img-src 'self' data: https:; font-src 'self' https://cdnjs.cloudflare.com;", false );
}

/**
 * Add back to top button functionality
 */
function titecho_back_to_top() {
    echo '<button id="back-to-top" class="back-to-top" aria-label="Back to top">
            <i class="fas fa-arrow-up"></i>
          </button>';
}
add_action( 'wp_footer', 'titecho_back_to_top' );

/**
 * Add preload links for critical assets
 */
function titecho_preload_critical_assets() {
    // Preload main stylesheet
    echo '<link rel="preload" href="' . get_stylesheet_uri() . '" as="style">';
    
    // Preload Font Awesome
    echo '<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style">';
    
    // Preload critical JavaScript
    echo '<link rel="preload" href="' . TITECHO_ASSETS . '/js/custom.js" as="script">';
}
add_action( 'wp_head', 'titecho_preload_critical_assets', 1 );

/**
 * Optimize database on a schedule
 */
function titecho_optimize_database() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    
    global $wpdb;
    
    // Optimize tables
    $tables = $wpdb->get_col( 'SHOW TABLES' );
    foreach ( $tables as $table ) {
        $wpdb->query( "OPTIMIZE TABLE $table" );
    }
}

/**
 * Add responsive image sizes with srcset support
 */
function titecho_responsive_image_sizes() {
    // Remove default image sizes
    remove_image_size( 'medium_large' );
    
    // Update default sizes
    update_option( 'thumbnail_size_w', 150 );
    update_option( 'thumbnail_size_h', 150 );
    update_option( 'thumbnail_crop', 1 );
    update_option( 'medium_size_w', 300 );
    update_option( 'medium_size_h', 300 );
    update_option( 'large_size_w', 1024 );
    update_option( 'large_size_h', 768 );
    
    // Add responsive image sizes with different aspect ratios
    add_image_size( 'titecho-featured-mobile', 640, 400, true ); // Mobile featured image
    add_image_size( 'titecho-featured-tablet', 960, 600, true ); // Tablet featured image
    add_image_size( 'titecho-featured-desktop', 1200, 675, true ); // Desktop featured image
    add_image_size( 'titecho-product-small', 300, 300, true ); // Small product image
    add_image_size( 'titecho-product-medium', 600, 600, true ); // Medium product image
    add_image_size( 'titecho-product-large', 800, 800, true ); // Large product image
    add_image_size( 'titecho-product-thumbnail', 150, 150, true ); // Product thumbnail
    
    // Add srcset support for better responsive images
    add_filter( 'max_srcset_image_width', function() { return 2000; } ); // Allow larger srcset images
}
add_action( 'send_headers', 'titecho_security_headers' );

/**
 * Optimize image sizes and add custom image sizes
 */
function titecho_image_sizes() {
    // Add custom image sizes
    add_image_size( 'titecho-featured', 1200, 675, true ); // Featured image
    add_image_size( 'titecho-product', 600, 600, true );   // Product image
    add_image_size( 'titecho-testimonial', 100, 100, true ); // Testimonial avatar
}
add_action( 'after_setup_theme', 'titecho_image_sizes' );

/**
 * Add breadcrumb functionality
 */
function titecho_breadcrumb() {
    if ( is_front_page() ) {
        return;
    }
    
    $delimiter = ' <span class="breadcrumb-separator">/</span> ';
    $before = ' <span class="breadcrumb-current">';
    $after = '</span>';
    
    echo '<nav class="breadcrumb" aria-label="Breadcrumb">';
    echo '<a href="' . home_url() . '" class="breadcrumb-home">' . esc_html__( 'Home', 'titecho' ) . '</a>' . $delimiter;
    
    if ( is_category() || is_single() ) {
        if ( is_single() ) {
            the_category( $delimiter );
            echo $delimiter . $before . get_the_title() . $after;
        } elseif ( is_category() ) {
            echo $before . single_cat_title( '', false ) . $after;
        }
    } elseif ( is_page() ) {
        echo $before . get_the_title() . $after;
    } elseif ( is_search() ) {
        echo $before . esc_html__( 'Search results for: ', 'titecho' ) . get_search_query() . $after;
    } elseif ( is_404() ) {
        echo $before . esc_html__( 'Error 404', 'titecho' ) . $after;
    }
    
    echo '</nav>';
}

/**
 * Custom pagination
 */
function titecho_pagination() {
    global $wp_query;
    
    if ( $wp_query->max_num_pages <= 1 ) {
        return;
    }
    
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    
    if ( $paged > 1 ) {
        $previous_url = get_pagenum_link( $paged - 1 );
        echo '<a href="' . esc_url( $previous_url ) . '" class="pagination-previous">' . esc_html__( '&larr; Previous', 'titecho' ) . '</a>';
    }
    
    for ( $i = 1; $i <= $max; $i++ ) {
        if ( $i == $paged ) {
            echo '<span class="pagination-current">' . $i . '</span>';
        } else {
            $page_url = get_pagenum_link( $i );
            echo '<a href="' . esc_url( $page_url ) . '" class="pagination-link">' . $i . '</a>';
        }
    }
    
    if ( $paged < $max ) {
        $next_url = get_pagenum_link( $paged + 1 );
        echo '<a href="' . esc_url( $next_url ) . '" class="pagination-next">' . esc_html__( 'Next &rarr;', 'titecho' ) . '</a>';
    }
}

/**
 * Add body classes for better styling control
 */
function titecho_body_classes( $classes ) {
    // Add class based on page template
    if ( is_page_template() ) {
        $template = get_page_template_slug();
        $template = str_replace( '.php', '', $template );
        $template = str_replace( '/', '-', $template );
        $classes[] = 'template-' . $template;
    }
    
    // Add class if sidebar is active
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'has-sidebar';
    }
    
    // Add class for mobile devices
    if ( wp_is_mobile() ) {
        $classes[] = 'is-mobile';
    }
    
    return $classes;
}
add_filter( 'body_class', 'titecho_body_classes' );
