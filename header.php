<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Titecho
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'titecho' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-link">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="site-logo" />
					<?php endif; ?>
				</a>
				<?php
					$titecho_description = get_bloginfo( 'description', 'display' );
					if ( $titecho_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo esc_html( $titecho_description ); ?></p>
						<?php
					endif;
					?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<i class="fas fa-bars"></i>
					<span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'titecho' ); ?></span>
				</button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => 'div',
					'container_class' => 'menu-container',
					'menu_class'     => 'nav-menu',
					'fallback_cb'    => 'wp_page_menu',
				) );
				?>
			</nav><!-- #site-navigation -->
		</div><!-- .container -->
	</header><!-- #masthead -->

<!-- Hero Section -->
<section id="hero" class="hero-section">
    <div class="hero-bg-pattern"></div>
    <div class="hero-gradient"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title"><span class="hero-title-animation"><?php echo wp_kses_post( titecho_get_option( 'titecho_hero_title', 'High-Performance AC Motors & Water Pumps' ) ); ?></span></h1>
                <p class="hero-description"><span class="hero-description-animation"><?php echo wp_kses_post( titecho_get_option( 'titecho_hero_subtitle', 'Leading manufacturer providing reliable, energy-efficient electrical solutions for industrial and commercial applications.' ) ); ?></span></p>
                <div class="hero-buttons">
                    <a href="<?php echo esc_url( titecho_get_option( 'titecho_hero_cta_url', '#products' ) ); ?>" class="btn btn-primary scroll-smooth"><?php echo esc_html( titecho_get_option( 'titecho_hero_cta_text', 'Explore Products' ) ); ?></a>
                    <a href="#contact" class="btn btn-secondary scroll-smooth">Contact Us</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="hero-image-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-product.jpg" alt="AC Motor and Water Pump" class="hero-product-image">
                </div>
            </div>
        </div>
    </div>
</section><!-- #hero -->

	<div id="content" class="site-content">
