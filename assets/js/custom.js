// Custom JavaScript for Titecho Theme

jQuery(document).ready(function($) {
    // Sticky Header - Single implementation
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });
    
    // Mobile Menu Toggle
    $('.menu-toggle').click(function() {
        $('#primary-menu').toggleClass('toggled');
        $(this).find('.menu-toggle-text').text(function(i, text) {
            return text === 'Menu' ? 'Close' : 'Menu';
        });
        $(this).find('i').toggleClass('fa-bars fa-times');
    });
    
    // Close mobile menu when clicking a menu item
    $('#primary-menu a').on('click', function() {
        if ($(window).width() <= 992) {
            $('#primary-menu').removeClass('toggled');
            $('.menu-toggle .menu-toggle-text').text('Menu');
            $('.menu-toggle i').removeClass('fa-times').addClass('fa-bars');
        }
    });
    
    // Close mobile menu when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.main-navigation').length && 
            $(window).width() <= 992 && 
            $('#primary-menu').hasClass('toggled')) {
            $('#primary-menu').removeClass('toggled');
            $('.menu-toggle .menu-toggle-text').text('Menu');
            $('.menu-toggle i').removeClass('fa-times').addClass('fa-bars');
        }
    });
    
    // Fix mobile menu on resize
    $(window).on('resize', function() {
        if ($(window).width() > 992) {
            $('#primary-menu').removeClass('toggled');
            $('.menu-toggle .menu-toggle-text').text('Menu');
            $('.menu-toggle i').removeClass('fa-times').addClass('fa-bars');
        }
    });
    
    // Scroll effect is handled by the single implementation above
    
    // Smooth Scrolling for Anchor Links
    $('a[href^="#"]').on('click', function(e) {
        // Prevent default anchor behavior
        e.preventDefault();
        
        // Store hash
        var hash = this.hash;
        
        // Scroll to hash with offset to account for fixed header
        $('html, body').animate({
            scrollTop: $(hash).offset().top - 80
        }, 800, function() {
            // Add hash to URL after scroll
            if (history.pushState) {
                history.pushState(null, null, hash);
            } else {
                window.location.hash = hash;
            }
        });
    });
    
    // Support for scroll-smooth class (backwards compatibility)
    $('.scroll-smooth').on('click', function(e) {
        // Let the a[href^="#"] handler take care of it
    });
    
    // Initialize Slick Slider for Testimonials
    if ($('.testimonial-slider').length) {
        $('.testimonial-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false
                    }
                }
            ]
        });
    }
    
    // Animate elements on scroll
    function animateOnScroll() {
        var elements = $('.animate-on-scroll');
        
        elements.each(function() {
            var element = $(this);
            var elementPosition = element.offset().top;
            var windowHeight = $(window).height();
            var scrollPosition = $(window).scrollTop();
            
            if (scrollPosition > elementPosition - windowHeight + 100) {
                element.addClass('animated');
            }
        });
    }
    
    // Initial check for elements in view
    animateOnScroll();
    
    // Check for elements in view on scroll
    $(window).scroll(function() {
        animateOnScroll();
    });
    
    // Form Validation for Contact Form
    if ($('.contact-form').length) {
        $('.contact-form').submit(function(e) {
            var isValid = true;
            var requiredFields = $(this).find('[required]');
            
            requiredFields.each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    $(this).addClass('error');
                    $(this).siblings('.error-message').text('This field is required');
                } else {
                    $(this).removeClass('error');
                    $(this).siblings('.error-message').text('');
                }
            });
            
            // Email validation
            var emailField = $(this).find('input[type="email"]');
            if (emailField.length) {
                var email = emailField.val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (!emailRegex.test(email)) {
                    isValid = false;
                    emailField.addClass('error');
                    emailField.siblings('.error-message').text('Please enter a valid email address');
                }
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    // Product Filtering (if needed)
    $('.product-filter').on('click', 'button', function() {
        var category = $(this).data('category');
        
        $(this).addClass('active').siblings().removeClass('active');
        
        if (category === 'all') {
            $('.product-card').show();
        } else {
            $('.product-card').hide();
            $('.product-card[data-category="' + category + '"]').show();
        }
    });
    
    // Back to Top Button - Using jQuery for consistency
    var backToTopButton = $('<button>', {
        class: 'back-to-top',
        html: '↑',
        title: 'Back to top'
    }).appendTo('body');
    
    // Hide back to top button initially
    backToTopButton.hide();
    
    // Show/hide back to top button based on scroll position
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            backToTopButton.fadeIn(300);
        } else {
            backToTopButton.fadeOut(300);
        }
    });
    
    // Smooth scroll to top when button is clicked
    backToTopButton.on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
    });
    
    // Product Quick View (if needed)
    $('.quick-view').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');
        // Here you would typically load product details via AJAX
        alert('Quick view for product ID: ' + productId);
    });
    
    // Initialize any Google Maps (if needed)
    function initMap() {
        if ($('#map').length) {
            // Replace with your actual map initialization code
            console.log('Map container found, initialize map here');
        }
    }
    
    // Only check for Google Maps API if map element exists
    if ($('#map').length) {
        if (typeof google !== 'undefined' && typeof google.maps !== 'undefined') {
            initMap();
        } else {
            // Google Maps API not loaded yet
            console.log('Map element found but Google Maps API not loaded');
        }
    }
});

// Back to top button styles
// Back to top button functionality will use styles from CSS file
