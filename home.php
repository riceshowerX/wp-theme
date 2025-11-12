<?php
/**
 * The template for displaying the homepage
 *
 * This is the template that displays the homepage of the site.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Titecho
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!-- Hero Section -->
			<section class="hero-section">
				<div class="hero-bg-pattern"></div>
				<div class="hero-gradient"></div>
				<div class="container">
					<div class="hero-content">
						<h1 class="hero-title"><?php echo wp_kses_post( titecho_get_option( 'titecho_hero_title', 'Advanced AC Motors & Water Pumps' ) ); ?></h1>
						<p class="hero-subtitle"><?php echo wp_kses_post( titecho_get_option( 'titecho_hero_subtitle', 'Techo Electrical & Mechanical (Taizhou) Co., Ltd. - Professional manufacturer of high-quality AC motors and water pumps under the brand "titecho"' ) ); ?></p>
						<div class="hero-cta">
							<a href="<?php echo esc_url( titecho_get_option( 'titecho_hero_cta_url', '#products' ) ); ?>" class="btn btn-primary scroll-smooth"><?php echo esc_html( titecho_get_option( 'titecho_hero_cta_text', 'Explore Products' ) ); ?></a>
							<a href="#contact" class="btn btn-secondary scroll-smooth">Contact Us</a>
						</div>
					</div>
				</div>
			</section>

			<!-- Features Section -->
			<section class="features-section">
				<div class="container">
					<h2 class="section-title">Our Key Advantages</h2>
					<div class="row">
						<div class="col-md-4 feature-item animate-on-scroll">
							<div class="feature-icon">
								<i class="fas fa-industry"></i>
							</div>
							<h3 class="feature-title">Advanced Manufacturing</h3>
							<p class="feature-description">Utilizing state-of-the-art production facilities to ensure precision and consistency in every product.</p>
						</div>
						<div class="col-md-4 feature-item animate-on-scroll delay-1">
							<div class="feature-icon">
								<i class="fas fa-cogs"></i>
							</div>
							<h3 class="feature-title">Quality Engineering</h3>
							<p class="feature-description">Our products are engineered to meet the highest industry standards for performance and reliability.</p>
						</div>
						<div class="col-md-4 feature-item animate-on-scroll delay-2">
							<div class="feature-icon">
								<i class="fas fa-globe-asia"></i>
							</div>
							<h3 class="feature-title">Global Reach</h3>
							<p class="feature-description">Supplying our products to customers worldwide with efficient logistics and excellent customer service.</p>
						</div>
					</div>
				</div>
			</section>

			<!-- Products Section -->
			<section id="products" class="products-section">
				<div class="container">
					<h2 class="section-title">Our Products</h2>
					<div class="row">
						<div class="col-md-6">
							<div class="product-card animate-on-scroll">
								<div class="product-icon">
									<i class="fas fa-motorcycle"></i>
								</div>
								<h3 class="product-title">AC Motors</h3>
								<p class="product-description">High-performance AC motors designed for efficiency and durability in various industrial applications. Our motors are available in different specifications to meet your specific requirements.</p>
								<a href="#" class="btn">View AC Motors</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="product-card animate-on-scroll delay-1">
								<div class="product-icon">
									<i class="fas fa-tint"></i>
								</div>
								<h3 class="product-title">Water Pumps</h3>
								<p class="product-description">Reliable water pumps for residential, commercial, and industrial use. Our pumps are engineered for optimal performance and energy efficiency in various water transfer applications.</p>
								<a href="#" class="btn">View Water Pumps</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- About Section -->
			<section class="about-section">
				<div class="container">
					<div class="row">
						<div class="col-md-6 animate-on-scroll">
							<h2 class="section-title text-left">About Titecho</h2>
							<div class="about-content">
								<p>Techo Electrical & Mechanical (Taizhou) Co., Ltd. is a professional manufacturer of AC motors and water pumps under the brand name "titecho". With years of experience in the industry, we have established ourselves as a reliable supplier of high-quality electrical and mechanical products.</p>
								<p>Our commitment to quality, innovation, and customer satisfaction has helped us build strong relationships with clients both domestically and internationally. We continuously invest in research and development to ensure our products meet the evolving needs of our customers.</p>
								<a href="#" class="btn">Learn More About Us</a>
							</div>
						</div>
						<div class="col-md-6 animate-on-scroll delay-1">
							<div class="company-stats">
								<div class="stat-item">
									<div class="stat-number">10+</div>
									<div class="stat-label">Years of Experience</div>
								</div>
								<div class="stat-item">
									<div class="stat-number">50+</div>
									<div class="stat-label">Countries Served</div>
								</div>
								<div class="stat-item">
									<div class="stat-number">200+</div>
									<div class="stat-label">Happy Customers</div>
								</div>
								<div class="stat-item">
									<div class="stat-number">100+</div>
									<div class="stat-label">Product Varieties</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Testimonials Section -->
			<section class="testimonials-section">
				<div class="container">
					<h2 class="section-title">What Our Customers Say</h2>
					<div class="testimonial-slider">
						<div class="testimonial-item">
							<i class="fas fa-quote-left"></i>
							<p class="testimonial-text">Titecho's AC motors have been instrumental in improving the efficiency of our production line. Their products are reliable, and their customer service is exceptional.</p>
							<div class="testimonial-author">— John Smith, Manufacturing Director</div>
						</div>
						<div class="testimonial-item">
							<i class="fas fa-quote-left"></i>
							<p class="testimonial-text">We've been using Titecho water pumps for our commercial building for over three years now, and we're extremely satisfied with their performance and durability.</p>
							<div class="testimonial-author">— Sarah Johnson, Facilities Manager</div>
						</div>
						<div class="testimonial-item">
							<i class="fas fa-quote-left"></i>
				<p class="testimonial-text">As an international distributor, we value partners like Titecho who consistently deliver quality products on time. Their global shipping capabilities are impressive.</p>
							<div class="testimonial-author">— Michael Chen, International Sales Director</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Contact Section -->
			<section id="contact" class="contact-section">
				<div class="container">
					<h2 class="section-title">Contact Us</h2>
					<div class="row">
						<div class="col-md-6 animate-on-scroll">
							<div class="contact-form">
								<form id="contactForm">
									<div class="form-group">
										<label for="name">Your Name</label>
										<input type="text" class="form-control" id="name" name="name" required>
										<div class="error-message"></div>
									</div>
									<div class="form-group">
										<label for="email">Email Address</label>
										<input type="email" class="form-control" id="email" name="email" required>
										<div class="error-message"></div>
									</div>
									<div class="form-group">
										<label for="subject">Subject</label>
										<input type="text" class="form-control" id="subject" name="subject" required>
										<div class="error-message"></div>
									</div>
									<div class="form-group">
										<label for="message">Your Message</label>
										<textarea class="form-control" id="message" name="message" rows="5" required></textarea>
										<div class="error-message"></div>
									</div>
									<button type="submit" class="btn">Send Message</button>
								</form>
							</div>
						</div>
						<div class="col-md-6 animate-on-scroll delay-1">
							<div class="contact-info">
								<h3>Get in Touch</h3>
								<ul class="contact-details">
									<li>
						<i class="fas fa-map-marker-alt"></i>
						<span><?php echo esc_html( get_theme_mod( 'titecho_address', 'No. 123, Industrial Zone, Taizhou City, Zhejiang Province, China' ) ); ?></span>
					</li>
					<li>
						<i class="fas fa-phone"></i>
						<span><?php echo esc_html( get_theme_mod( 'titecho_phone', '+86 123 4567 8910' ) ); ?></span>
					</li>
					<li>
						<i class="fas fa-envelope"></i>
						<span><?php echo esc_html( get_theme_mod( 'titecho_email', 'info@titecho.com' ) ); ?></span>
					</li>
									<li>
										<i class="fas fa-clock"></i>
										<span>Monday - Friday: 9:00 AM - 6:00 PM</span>
									</li>
								</ul>
								<div class="social-links">
									<a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
									<a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
									<a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
									<a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
