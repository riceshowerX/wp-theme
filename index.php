<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Titecho
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- Products Showcase Section -->
        <section id="products" class="products-section section">
            <div class="container">
                <h2 class="section-title">Our Products</h2>
                <p class="section-description">High-quality AC motors and water pumps designed for efficiency, reliability, and optimal performance in various industrial applications.</p>

                <div class="products-grid">
                    <!-- AC Motors Product Card -->
                    <div class="product-card">
                        <div class="product-image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ac-motor.svg" alt="AC Motors" class="product-image">
                            <div class="product-overlay">
                                <a href="#" class="btn btn-primary product-btn">View Details</a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">AC Motors</h3>
                            <p class="product-description">Energy-efficient, high-performance AC motors designed for industrial applications with reliable operation and long service life.</p>
                            <ul class="product-features">
                                <li>High efficiency ratings</li>
                                <li>Durable construction</li>
                                <li>Low noise operation</li>
                                <li>Various power ratings available</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Water Pumps Product Card -->
                    <div class="product-card">
                        <div class="product-image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/water-pump.svg" alt="Water Pumps" class="product-image">
                            <div class="product-overlay">
                                <a href="#" class="btn btn-primary product-btn">View Details</a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">Water Pumps</h3>
                            <p class="product-description">Reliable, high-capacity water pumps engineered for various applications including industrial, agricultural, and commercial use.</p>
                            <ul class="product-features">
                                <li>High flow rates</li>
                                <li>Corrosion resistant materials</li>
                                <li>Energy efficient designs</li>
                                <li>Easy maintenance access</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Company Information Section -->
        <section class="company-info-section">
            <div class="container">
                <div class="company-info-content">
                    <div class="company-info-text">
                        <h2 class="section-title">About Titecho</h2>
                        <p>Techo Electrical & Mechanical (Taizhou) Co., Ltd. is a leading manufacturer and supplier of high-quality AC motors and water pumps under the brand name "titecho". With years of experience in the industry, we have established ourselves as a trusted provider of reliable, efficient, and durable electrical and mechanical equipment.</p>
                        <p>Our state-of-the-art manufacturing facilities, combined with our team of experienced engineers and technicians, enable us to deliver products that meet the highest standards of quality and performance. We are committed to continuous innovation and improvement, ensuring that our products remain at the forefront of technology.</p>
                        <p>At Titecho, we pride ourselves on our customer-centric approach. We work closely with our clients to understand their specific needs and provide tailored solutions that exceed their expectations. Our products are used in a wide range of applications across various industries, including manufacturing, agriculture, construction, and HVAC.</p>
                    </div>
                    <div class="company-info-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/company-facility.svg" alt="Titecho Manufacturing Facility" class="company-image">
                    </div>
                </div>
            </div>
        </section>

        <!-- Value Propositions Section -->
        <section class="value-propositions-section">
            <div class="container">
                <h2 class="section-title">Why Choose Titecho</h2>
                <p class="section-description">We are committed to providing our customers with the highest quality products and exceptional service. Here are the key reasons why businesses around the world choose Titecho:</p>
                
                <div class="value-propositions-grid">
                    <!-- Quality Excellence -->
                    <div class="value-card">
                        <div class="value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60" height="60" fill="none" stroke="#3498db" stroke-width="2">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path>
                            </svg>
                        </div>
                        <h3 class="value-title">Quality Excellence</h3>
                        <p class="value-description">Our products undergo rigorous quality control processes to ensure they meet and exceed international standards.</p>
                    </div>
                    
                    <!-- Technical Expertise -->
                    <div class="value-card">
                        <div class="value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60" height="60" fill="none" stroke="#3498db" stroke-width="2">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 6 2 12 8 18"></polyline>
                            </svg>
                        </div>
                        <h3 class="value-title">Technical Expertise</h3>
                        <p class="value-description">Our team of engineers has extensive knowledge and experience in developing innovative solutions for various applications.</p>
                    </div>
                    
                    <!-- Custom Solutions -->
                    <div class="value-card">
                        <div class="value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60" height="60" fill="none" stroke="#3498db" stroke-width="2">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </div>
                        <h3 class="value-title">Custom Solutions</h3>
                        <p class="value-description">We can customize our products to meet your specific requirements, ensuring optimal performance for your unique applications.</p>
                    </div>
                    
                    <!-- Global Support -->
                    <div class="value-card">
                        <div class="value-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60" height="60" fill="none" stroke="#3498db" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                        </div>
                        <h3 class="value-title">Global Support</h3>
                        <p class="value-description">We provide comprehensive support services to our customers worldwide, from pre-sales consultation to after-sales service.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php
        // Only show the blog posts section if it's not the front page
        if ( is_home() && ! is_front_page() ) :
            if ( have_posts() ) :
                ?>
                <header class="blog-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
                <?php

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_type() );

                    endwhile;

                    the_posts_navigation();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
