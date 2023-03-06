<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Customizer controls which add gutenberg deeplinks
 *
 * @return void
 */
add_action( 'customize_register', 'goza_customizer_register' );
function goza_customizer_register( $wp_customize ) {
	require get_template_directory() . '/includes/customizer/gutenberg-upsell.php';

	$wp_customize->add_section(
		'goza_theme_options',
		[
			'title' => __( 'Header &amp; Footer', 'goza-main' ),
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_setting(
		'goza-gutenberg-header-footer',
		[
			'sanitize_callback' => false,
			'transport' => 'refresh',
		]
	);

	$wp_customize->add_control(
		new gozagutenberg\Includes\Customizer\gutenberg_Upsell(
			$wp_customize,
			'goza-gutenberg-header-footer',
			[
				'section' => 'goza_theme_options',
				'priority' => 20,
			]
		)
	);
}


/**
 * Enqueue Customiser CSS
 *
 * @return string HTML to use in the customizer panel
 */
add_action( 'admin_enqueue_scripts', 'goza_customizer_print_styles' );
function goza_customizer_print_styles() {

	$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style(
		'goza-gutenberg-customizer',
		get_template_directory_uri() . '/customizer' . $min_suffix . '.css',
		[],
		goza_gutenberg_VERSION
	);
}
