\u003c?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Titecho
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">\u003c?php esc_html_e( 'Nothing Found', 'titecho' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		\u003c?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

			<p class="mt-5 mb-5 text-center">\u003c?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'titecho' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
				?></p>

			\u003c?php elseif ( is_search() ) :
				?>

				<p class="text-center mb-5">\u003c?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'titecho' ); ?></p>
				\u003c?php
			
get_search_form();

			else :
				?>

				<p class="text-center mb-5">\u003c?php esc_html_e( 'It seems we can't find what you're looking for. Perhaps searching can help.', 'titecho' ); ?></p>
				\u003c?php
			
get_search_form();

			endif;
			?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
