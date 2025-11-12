<?php
/**
 * Theme Options
 *
 * This file defines the theme options using WordPress Customizer API.
 *
 * @package Titecho
 */

/**
 * Add theme options to the WordPress Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function titecho_theme_options( $wp_customize ) {
    // Add custom logo support
    $wp_customize->add_setting( 'site_logo', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'site_logo', array(
        'label'    => esc_html__( 'Logo', 'titecho' ),
        'section'  => 'title_tagline',
        'settings' => 'site_logo',
        'mime_type' => 'image',
    ) ) );

    // Add custom header section
    $wp_customize->add_section( 'titecho_header_section', array(
        'title'       => esc_html__( 'Header Options', 'titecho' ),
        'description' => esc_html__( 'Customize your header settings', 'titecho' ),
        'priority'    => 30,
    ) );

    // Header phone number
    $wp_customize->add_setting( 'titecho_header_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'titecho_header_phone', array(
        'label'    => esc_html__( 'Phone Number', 'titecho' ),
        'section'  => 'titecho_header_section',
        'settings' => 'titecho_header_phone',
        'type'     => 'text',
    ) );

    // Header email
    $wp_customize->add_setting( 'titecho_header_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'titecho_header_email', array(
        'label'    => esc_html__( 'Email Address', 'titecho' ),
        'section'  => 'titecho_header_section',
        'settings' => 'titecho_header_email',
        'type'     => 'text',
    ) );

    // Add custom hero section
    $wp_customize->add_section( 'titecho_hero_section', array(
        'title'       => esc_html__( 'Hero Section', 'titecho' ),
        'description' => esc_html__( 'Customize your hero section', 'titecho' ),
        'priority'    => 40,
    ) );

    // Hero title
    $wp_customize->add_setting( 'titecho_hero_title', array(
        'default'           => esc_html__( 'High-Performance AC Motors & Water Pumps', 'titecho' ),
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'titecho_hero_title', array(
        'label'    => esc_html__( 'Hero Title', 'titecho' ),
        'section'  => 'titecho_hero_section',
        'settings' => 'titecho_hero_title',
        'type'     => 'text',
    ) );

    // Hero subtitle
    $wp_customize->add_setting( 'titecho_hero_subtitle', array(
        'default'           => esc_html__( 'Reliable industrial solutions for your business needs', 'titecho' ),
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'titecho_hero_subtitle', array(
        'label'    => esc_html__( 'Hero Subtitle', 'titecho' ),
        'section'  => 'titecho_hero_section',
        'settings' => 'titecho_hero_subtitle',
        'type'     => 'textarea',
    ) );

    // Hero CTA text
    $wp_customize->add_setting( 'titecho_hero_cta_text', array(
        'default'           => esc_html__( 'Explore Products', 'titecho' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'titecho_hero_cta_text', array(
        'label'    => esc_html__( 'CTA Button Text', 'titecho' ),
        'section'  => 'titecho_hero_section',
        'settings' => 'titecho_hero_cta_text',
        'type'     => 'text',
    ) );

    // Hero CTA URL
    $wp_customize->add_setting( 'titecho_hero_cta_url', array(
        'default'           => '#products',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'titecho_hero_cta_url', array(
        'label'    => esc_html__( 'CTA Button URL', 'titecho' ),
        'section'  => 'titecho_hero_section',
        'settings' => 'titecho_hero_cta_url',
        'type'     => 'url',
    ) );

    // Hero background image
    $wp_customize->add_setting( 'titecho_hero_bg_image', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'titecho_hero_bg_image', array(
        'label'    => esc_html__( 'Background Image', 'titecho' ),
        'section'  => 'titecho_hero_section',
        'settings' => 'titecho_hero_bg_image',
        'mime_type' => 'image',
    ) ) );

    // Add company info section
    $wp_customize->add_section( 'titecho_company_section', array(
        'title'       => esc_html__( 'Company Info', 'titecho' ),
        'description' => esc_html__( 'Customize your company information', 'titecho' ),
        'priority'    => 50,
    ) );

    // Company description
    $wp_customize->add_setting( 'titecho_company_description', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'titecho_company_description', array(
        'label'    => esc_html__( 'Company Description', 'titecho' ),
        'section'  => 'titecho_company_section',
        'settings' => 'titecho_company_description',
        'type'     => 'textarea',
    ) );

    // Add footer section
    $wp_customize->add_section( 'titecho_footer_section', array(
        'title'       => esc_html__( 'Footer Options', 'titecho' ),
        'description' => esc_html__( 'Customize your footer settings', 'titecho' ),
        'priority'    => 90,
    ) );

    // Copyright text
    $wp_customize->add_setting( 'titecho_copyright_text', array(
        'default'           => sprintf( esc_html__( '© %s Techo Electrical & Mechanical (Taizhou) Co., Ltd. All Rights Reserved.', 'titecho' ), date( 'Y' ) ),
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'titecho_copyright_text', array(
        'label'    => esc_html__( 'Copyright Text', 'titecho' ),
        'section'  => 'titecho_footer_section',
        'settings' => 'titecho_copyright_text',
        'type'     => 'textarea',
    ) );

    // Footer address
    $wp_customize->add_setting( 'titecho_footer_address', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'titecho_footer_address', array(
        'label'    => esc_html__( 'Company Address', 'titecho' ),
        'section'  => 'titecho_footer_section',
        'settings' => 'titecho_footer_address',
        'type'     => 'textarea',
    ) );

    // Footer phone
    $wp_customize->add_setting( 'titecho_footer_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'titecho_footer_phone', array(
        'label'    => esc_html__( 'Phone Number', 'titecho' ),
        'section'  => 'titecho_footer_section',
        'settings' => 'titecho_footer_phone',
        'type'     => 'text',
    ) );

    // Footer email
    $wp_customize->add_setting( 'titecho_footer_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'titecho_footer_email', array(
        'label'    => esc_html__( 'Email Address', 'titecho' ),
        'section'  => 'titecho_footer_section',
        'settings' => 'titecho_footer_email',
        'type'     => 'text',
    ) );

    // Social media links
    $social_media = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'instagram' => 'Instagram',
        'linkedin'  => 'LinkedIn',
        'youtube'   => 'YouTube',
    );

    foreach ( $social_media as $key => $name ) {
        $wp_customize->add_setting( 'titecho_social_' . $key, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( 'titecho_social_' . $key, array(
            'label'    => esc_html__( $name, 'titecho' ),
            'section'  => 'titecho_footer_section',
            'settings' => 'titecho_social_' . $key,
            'type'     => 'url',
        ) );
    }

    // Add color scheme section
    $wp_customize->add_section( 'titecho_color_section', array(
        'title'       => esc_html__( 'Color Scheme', 'titecho' ),
        'description' => esc_html__( 'Customize your theme colors', 'titecho' ),
        'priority'    => 60,
    ) );

    // Primary color
    $wp_customize->add_setting( 'titecho_primary_color', array(
        'default'           => '#3498db',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'titecho_primary_color', array(
        'label'    => esc_html__( 'Primary Color', 'titecho' ),
        'section'  => 'titecho_color_section',
        'settings' => 'titecho_primary_color',
    ) ) );

    // Secondary color
    $wp_customize->add_setting( 'titecho_secondary_color', array(
        'default'           => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'titecho_secondary_color', array(
        'label'    => esc_html__( 'Secondary Color', 'titecho' ),
        'section'  => 'titecho_color_section',
        'settings' => 'titecho_secondary_color',
    ) ) );
}
add_action( 'customize_register', 'titecho_theme_options' );

/**
 * Output customizer CSS to header
 */
function titecho_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'titecho_primary_color', '#3498db' ) ); ?>;
            --secondary-color: <?php echo esc_html( get_theme_mod( 'titecho_secondary_color', '#2c3e50' ) ); ?>;
        }

        .btn-primary, .nav-link:hover, .nav-link.active, 
        .product-card:hover .product-details, 
        .social-link:hover {
            background-color: var(--primary-color);
        }

        .site-footer, .nav-dropdown {
            background-color: var(--secondary-color);
        }

        .section-title::after, .footer-column-title::after {
            background-color: var(--primary-color);
        }

        a, .social-link, .contact-icon, .footer-links a::before {
            color: var(--primary-color);
        }
    </style>
    <?php
}
add_action( 'wp_head', 'titecho_customizer_css' );

/**
 * Helper function to get theme option with fallback
 *
 * @param string $option_name Option name.
 * @param mixed  $default     Default value.
 *
 * @return mixed Option value or default.
 */
function titecho_get_option( string $option_name, $default = '' ) {
    $option_value = get_theme_mod( $option_name, $default );
    return $option_value;
}
