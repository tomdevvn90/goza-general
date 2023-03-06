<?php

namespace gozagutenberg\Includes\Customizer;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class gutenberg_Upsell extends \WP_Customize_Control {

	// Whitelist content parameter
	public $content = '';

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   2.4.0
	 * @return  void
	 */
	public function render_content() {
		$this->print_customizer_upsell();

		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . wp_kses_post( $this->description ) . '</span>';
		}
	}

	private function print_customizer_upsell() {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$customizer_content = '';

		// Get Plugins
		$plugins = get_plugins();

		if ( ! isset( $plugins['gutenberg/gutenberg.php'] ) ) {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'Install gutenberg', 'goza-main' ),
				__( 'Create a cross-site Header and Footer using gutenberg & goza theme.', 'goza-main' ),
				wp_nonce_url(
					add_query_arg(
						[
							'action' => 'install-plugin',
							'plugin' => 'gutenberg',
						],
						admin_url( 'update.php' )
					),
					'install-plugin_gutenberg'
				),
				__( 'Install &amp; Activate', 'goza-main' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} elseif ( ! defined( 'gutenberg_VERSION' ) ) {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'Activate gutenberg', 'goza-main' ),
				__( 'Create a cross-site Header and Footer using gutenberg & goza theme.', 'goza-main' ),
				wp_nonce_url( 'plugins.php?action=activate&plugin=gutenberg/gutenberg.php', 'activate-plugin_gutenberg/gutenberg.php' ),
				__( 'Activate gutenberg', 'goza-main' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} elseif ( defined( 'gutenberg_VERSION' ) && version_compare( gutenberg_VERSION, '3.0.12', '<' ) ) {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'Update gutenberg', 'goza-main' ),
				__( 'You need gutenberg version 3.1.0 or above to create a cross-site Header and Footer.', 'goza-main' ),
				wp_nonce_url( 'update-core.php' ),
				__( 'Update gutenberg', 'goza-main' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} elseif ( ! goza_header_footer_experiment_active() ) {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'Set Your Header &amp; Footer', 'goza-main' ),
				__( 'Create cross-site Header and Footer using gutenberg & goza theme.', 'goza-main' ),
				wp_nonce_url( 'admin.php?page=gutenberg#tab-experiments' ),
				__( 'Activate Now', 'goza-main' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		} else {
			$customizer_content .= $this->get_customizer_upsell_html(
				__( 'Set Your Header &amp; Footer', 'goza-main' ),
				__( 'Create cross-site Header and Footer using gutenberg & goza theme.', 'goza-main' ),
				wp_nonce_url( 'post.php?post=' . get_option( 'gutenberg_active_kit' ) . '&action=gutenberg' ),
				__( 'Start Here', 'goza-main' ),
				get_template_directory_uri() . '/assets/images/go-pro.svg'
			);
		}

		echo wp_kses_post( $customizer_content );
	}

	private function get_customizer_upsell_html( $title, $text, $url, $button_text, $image ) {
		return sprintf( '
			<div class="customize-control-header-footer-holder">
				<img src="%5$s">
				<div class="gutenberg-nerd-box-message">
					<p class="gutenberg-panel-heading-title gutenberg-section-title">%1$s</p>
					<p class="gutenberg-section-body">%2$s</p>
				</div>
				<a class="button button-primary" target="_blank" href="%3$s">%4$s</a>
			</div>',
			$title,
			$text,
			$url,
			$button_text,
			$image
		);
	}
}
