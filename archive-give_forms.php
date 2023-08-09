<?php
/**
 * The template for displaying archive give pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage goza
 * @since goza 
 */

get_header();

/**
* Hook: goza_page_titlebar_archive
*
* @hooked goza_page_titlebar_archive_template - 10
*/
do_action( 'goza_page_titlebar_archive' );


?>

<div id="content" class="site-content">
	<div id="primary" class="content-area archive-donation-page-template has-sidebar right-sidebar">
		<div class="container responsive">
			<main id="main" class="site-main">

					<?php if ( have_posts() ) { ?>

						<section class="give-forms-list <?php echo esc_attr( $pagination_type ); ?>">
							<?php
							// Load posts loop.
							while ( have_posts() ) {
								the_post();
									get_template_part( 'give/content-give-form' );
							}
							?>
						</section> 

						<?php
							// Load more button
							global $wp_query;
							if (  $wp_query->max_num_pages > 1 ) {
								echo '<div class="give-forms-loadmore">
										<a class="btn-loadmore" href="#">' . esc_html__('More Post', 'goza') . '</a>
									</div>';
								
							}

					} else {

						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content/content', 'none' );

					}
					?>


			</main><!-- .site-main -->

			<?php get_sidebar( 'give' ); ?>

		</div>
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
