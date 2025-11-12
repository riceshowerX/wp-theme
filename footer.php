<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Titecho
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<div class="footer-top">
		<div class="container">
			<div class="footer-content">
			<!-- Company Info Column -->
			<div class="footer-column company-info-column">
				<div class="footer-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="120" height="40" viewBox="0 0 120 40">
								<rect x="0" y="0" width="120" height="40" rx="5" fill="#3498db"/>
								<text x="60" y="25" font-family="Arial, sans-serif" font-size="18" font-weight="bold" fill="white" text-anchor="middle">TITECHO</text>
							</svg>
						<?php endif; ?>
					</a>
				</div>
				<p class="footer-description">
					<?php echo wp_kses_post( titecho_get_option( 'titecho_company_description', 'Techo Electrical & Mechanical (Taizhou) Co., Ltd. is a leading manufacturer and supplier of high-quality AC motors and water pumps under the brand name "titecho".' ) ); ?>
				</p>
				<div class="social-links">
					<?php if ( titecho_get_option( 'titecho_social_facebook' ) ) : ?>
						<a href="<?php echo esc_url( titecho_get_option( 'titecho_social_facebook' ) ); ?>" class="social-link" aria-label="Facebook" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
								<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( titecho_get_option( 'titecho_social_twitter' ) ) : ?>
						<a href="<?php echo esc_url( titecho_get_option( 'titecho_social_twitter' ) ); ?>" class="social-link" aria-label="Twitter" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
								<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( titecho_get_option( 'titecho_social_linkedin' ) ) : ?>
						<a href="<?php echo esc_url( titecho_get_option( 'titecho_social_linkedin' ) ); ?>" class="social-link" aria-label="LinkedIn" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
								<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
								<rect x="2" y="9" width="4" height="12"></rect>
								<circle cx="4" cy="4" r="2"></circle>
							</svg>
						</a>
					<?php endif; ?>
					<?php if ( titecho_get_option( 'titecho_social_youtube' ) ) : ?>
						<a href="<?php echo esc_url( titecho_get_option( 'titecho_social_youtube' ) ); ?>" class="social-link" aria-label="YouTube" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
								<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
								<triangle points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></triangle>
							</svg>
						</a>
					<?php endif; ?>
				</div>
			</div>

				<!-- Quick Links Column -->
				<div class="footer-column quick-links-column">
					<h3 class="footer-column-title">Quick Links</h3>
					<ul class="footer-links">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a></li>
						<li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>">Products</a></li>
						<li><a href="<?php echo esc_url( home_url( '/products/ac-motors/' ) ); ?>">AC Motors</a></li>
						<li><a href="<?php echo esc_url( home_url( '/products/water-pumps/' ) ); ?>">Water Pumps</a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a></li>
					</ul>
				</div>

				<!-- Product Categories Column -->
				<div class="footer-column product-categories-column">
					<h3 class="footer-column-title">Product Categories</h3>
					<ul class="footer-links">
						<li><a href="<?php echo esc_url( home_url( '/products/three-phase-ac-motors/' ) ); ?>">Three-Phase AC Motors</a></li>
						<li><a href="<?php echo esc_url( home_url( '/products/single-phase-ac-motors/' ) ); ?>">Single-Phase AC Motors</a></li>
						<li><a href="<?php echo esc_url( home_url( '/products/high-efficiency-motors/' ) ); ?>">High-Efficiency Motors</a></li>
						<li><a href="<?php echo esc_url( home_url( '/products/centrifugal-pumps/' ) ); ?>">Centrifugal Pumps</a></li>
						<li><a href="<?php echo esc_url( home_url( '/products/submersible-pumps/' ) ); ?>">Submersible Pumps</a></li>
						<li><a href="<?php echo esc_url( home_url( '/products/custom-solutions/' ) ); ?>">Custom Solutions</a></li>
					</ul>
				</div>

				<!-- Contact Us Column -->
				<div class="footer-column contact-column">
					<h3 class="footer-column-title">Contact Us</h3>
					<ul class="contact-details">
						<li class="contact-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" class="contact-icon">
								<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
								<polyline points="9 22 9 12 15 12 15 22"></polyline>
							</svg>
							<span class="contact-text"><?php echo esc_html( titecho_get_option( 'titecho_footer_address', 'Economic Development Zone, Taizhou City, Zhejiang Province, China' ) ); ?></span>
						</li>
						<li class="contact-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" class="contact-icon">
								<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
							</svg>
							<span class="contact-text"><?php echo esc_html( titecho_get_option( 'titecho_footer_phone', '+86 576 8888 8888' ) ); ?></span>
						</li>
						<li class="contact-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" class="contact-icon">
								<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
								<polyline points="22,6 12,13 2,6"></polyline>
							</svg>
							<span class="contact-text"><?php echo esc_html( titecho_get_option( 'titecho_footer_email', 'sales@titecho.com' ) ); ?></span>
						</li>
						<li class="contact-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" class="contact-icon">
								<circle cx="12" cy="12" r="10"></circle>
								<polyline points="12 6 12 12 16 14"></polyline>
							</svg>
							<span class="contact-text"><?php echo esc_html( titecho_get_option( 'footer_hours', 'Mon - Fri: 9:00 AM - 6:00 PM' ) ); ?></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom-content">
				<p class="copyright">© <?php echo date('Y'); ?> <?php echo wp_kses_post( titecho_get_option( 'titecho_copyright_text', 'Techo Electrical & Mechanical (Taizhou) Co., Ltd. All rights reserved.' ) ); ?></p>
				<div class="footer-bottom-links">
						<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>
						<a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>">Terms of Service</a>
						<a href="<?php echo esc_url( home_url( '/cookie-policy/' ) ); ?>">Cookie Policy</a>
					</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
