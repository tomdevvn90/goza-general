<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package gozagutenberg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'gutenberg_theme_do_location' ) || ! gutenberg_theme_do_location( 'footer' ) ) {
	if ( did_action( 'gutenberg/loaded' ) && goza_header_footer_experiment_active() ) {
		get_template_part( 'template-parts/dynamic-footer' );
	} else {
		get_template_part( 'template-parts/footer' );
	}
}
?>

<?php wp_footer(); ?>

</body>
</html>
