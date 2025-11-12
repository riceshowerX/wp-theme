<?php
/**
 * Template Name: Products
 *
 * This template displays the products showcase page.
 */

get_header(); ?>

<section class="products-section" id="products">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">Our Products</h2>
            <div class="section-description">
                <p>Discover our innovative solutions designed to meet your needs with cutting-edge technology and exceptional quality.</p>
            </div>
        </div>

        <div class="products-grid">
            <?php
            // 检查是否有产品文章类型或使用自定义查询
            $args = array(
                'post_type' => 'product', // 如果使用WooCommerce
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            
            // 如果没有使用WooCommerce，可以使用自定义文章类型或普通文章
            $products_query = new WP_Query($args);
            
            // 如果没有产品文章，使用示例产品数据
            if (!$products_query->have_posts()) {
                // 示例产品数据
                $example_products = array(
                    array(
                        'title' => 'Smart Home Controller',
                        'description' => 'Intelligent home automation system that simplifies your daily routines with advanced voice control and scheduling features.',
                        'image' => get_template_directory_uri() . '/images/placeholder-product1.jpg',
                        'features' => array(
                            'Voice control with multiple assistants',
                            'Energy saving optimization',
                            'Easy installation and setup',
                            'Compatible with 500+ devices',
                            'Mobile app remote access'
                        )
                    ),
                    array(
                        'title' => 'Wireless Earbuds Pro',
                        'description' => 'Premium wireless earbuds with active noise cancellation, spatial audio, and all-day battery life for the ultimate audio experience.',
                        'image' => get_template_directory_uri() . '/images/placeholder-product2.jpg',
                        'features' => array(
                            'Industry-leading noise cancellation',
                            'Spatial audio with head tracking',
                            '8-hour battery + 32-hour case',
                            'IPX7 water resistance',
                            'High-fidelity sound quality'
                        )
                    ),
                    array(
                        'title' => 'Fitness Tracking Watch',
                        'description' => 'Advanced health monitoring smartwatch that tracks your fitness goals, sleep patterns, and overall wellness metrics.',
                        'image' => get_template_directory_uri() . '/images/placeholder-product3.jpg',
                        'features' => array(
                            '24/7 health monitoring',
                            '14-day battery life',
                            'Sleep stage analysis',
                            '50+ sports modes',
                            'Waterproof up to 50m'
                        )
                    ),
                    array(
                        'title' => 'Portable Power Station',
                        'description' => 'Compact yet powerful portable power station for outdoor adventures, emergency backup, and charging multiple devices simultaneously.',
                        'image' => get_template_directory_uri() . '/images/placeholder-product4.jpg',
                        'features' => array(
                            '1000W output capacity',
                            'Multiple charging ports',
                            'Solar panel compatible',
                            'LED display and lighting',
                            'Compact and lightweight design'
                        )
                    )
                );
                
                // 输出示例产品
                foreach ($example_products as $product) :
            ?>
                <div class="product-card animate-on-scroll">
                    <div class="product-image-container">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" class="product-image">
                        <div class="product-overlay">
                            <a href="#" class="btn btn-primary product-btn">Learn More</a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title"><?php echo $product['title']; ?></h3>
                        <p class="product-description"><?php echo $product['description']; ?></p>
                        <ul class="product-features">
                            <?php foreach ($product['features'] as $feature) : ?>
                                <li><?php echo $feature; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; } else {
                // 使用WordPress循环显示产品
                while ($products_query->have_posts()) : $products_query->the_post();
                    $product_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$product_image) {
                        $product_image = get_template_directory_uri() . '/images/placeholder-product.jpg';
                    }
                    
                    // 这里可以从自定义字段获取产品特性等信息
                    $product_features = get_post_meta(get_the_ID(), 'product_features', true);
                    if (!is_array($product_features)) {
                        $product_features = array(
                            'High quality materials',
                            'Industry leading technology',
                            'Exceptional performance',
                            'Reliable customer support',
                            'Competitive pricing'
                        );
                    }
            ?>
                <div class="product-card animate-on-scroll">
                    <div class="product-image-container">
                        <img src="<?php echo $product_image; ?>" alt="<?php the_title(); ?>" class="product-image">
                        <div class="product-overlay">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary product-btn">Learn More</a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title"><?php the_title(); ?></h3>
                        <p class="product-description"><?php the_excerpt(); ?></p>
                        <ul class="product-features">
                            <?php foreach ($product_features as $feature) : ?>
                                <li><?php echo $feature; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
