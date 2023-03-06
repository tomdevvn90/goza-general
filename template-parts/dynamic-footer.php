<?php
/**
 * The template for displaying footer.
 *
 * @package gozagutenberg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['gutenberg-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'gutenberg/loaded' ) ? esc_attr( goza_get_footer_layout_class() ) : '';
$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
] );
?>
<footer id="site-footer" class="site-footer dynamic-footer <?php echo esc_attr( $footer_class ); ?>" role="contentinfo">
	<div class="footer-inner">
		<div class="site-branding show-<?php echo esc_attr( goza_gutenberg_get_setting( 'goza_footer_logo_type' ) ); ?>">
			<?php if ( has_custom_logo() && ( 'title' !== goza_gutenberg_get_setting( 'goza_footer_logo_type' ) || $is_editor ) ) : ?>
				<div class="site-logo <?php echo esc_attr( goza_show_or_hide( 'goza_footer_logo_display' ) ); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;

			if ( $site_name && ( 'logo' !== goza_gutenberg_get_setting( 'goza_footer_logo_type' ) ) || $is_editor ) : ?>
				<h4 class="site-title <?php echo esc_attr( goza_show_or_hide( 'goza_footer_logo_display' ) ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'goza-main' ); ?>" rel="home">
						<?php echo esc_html( $site_name ); ?>
					</a>
				</h4>
			<?php endif;

			if ( $tagline || $is_editor ) : ?>
				<p class="site-description <?php echo esc_attr( goza_show_or_hide( 'goza_footer_tagline_display' ) ); ?>">
					<?php echo esc_html( $tagline ); ?>
				</p>
			<?php endif; ?>
		</div>

		<?php if ( $footer_nav_menu ) : ?>
			<nav class="site-navigation <?php echo esc_attr( goza_show_or_hide( 'goza_footer_menu_display' ) ); ?>" role="navigation">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $footer_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
		<?php endif; ?>

		<?php if ( '' !== goza_gutenberg_get_setting( 'goza_footer_copyright_text' ) || $is_editor ) : ?>
			<div class="copyright <?php echo esc_attr( goza_show_or_hide( 'goza_footer_copyright_display' ) ); ?>">
				<p><?php echo wp_kses_post( goza_gutenberg_get_setting( 'goza_footer_copyright_text' ) ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</footer>
