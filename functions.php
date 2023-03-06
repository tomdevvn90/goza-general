<?php
/**
 * Theme functions and definitions
 *
 * @package gozagutenberg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'goza_gutenberg_VERSION', '2.6.1' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'goza_gutenberg_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function goza_gutenberg_setup() {
		if ( is_admin() ) {
			goza_maybe_update_theme_version_in_db();
		}

		$hook_result = apply_filters_deprecated( 'gutenberg_goza_theme_load_textdomain', [ true ], '2.0', 'goza_gutenberg_load_textdomain' );
		if ( apply_filters( 'goza_gutenberg_load_textdomain', $hook_result ) ) {
			load_theme_textdomain( 'goza-main', get_template_directory() . '/languages' );
		}

		$hook_result = apply_filters_deprecated( 'gutenberg_goza_theme_register_menus', [ true ], '2.0', 'goza_gutenberg_register_menus' );
		if ( apply_filters( 'goza_gutenberg_register_menus', $hook_result ) ) {
			register_nav_menus( [ 'menu-1' => __( 'Header', 'goza-main' ) ] );
			register_nav_menus( [ 'menu-2' => __( 'Footer', 'goza-main' ) ] );
		}

		$hook_result = apply_filters_deprecated( 'gutenberg_goza_theme_add_theme_support', [ true ], '2.0', 'goza_gutenberg_add_theme_support' );
		if ( apply_filters( 'goza_gutenberg_add_theme_support', $hook_result ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			$hook_result = apply_filters_deprecated( 'gutenberg_goza_theme_add_woocommerce_support', [ true ], '2.0', 'goza_gutenberg_add_woocommerce_support' );
			if ( apply_filters( 'goza_gutenberg_add_woocommerce_support', $hook_result ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'goza_gutenberg_setup' );

function goza_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'goza_theme_version';
	// The theme version saved in the database.
	$goza_theme_db_version = get_option( $theme_version_option_name );

	// If the 'goza_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $goza_theme_db_version || version_compare( $goza_theme_db_version, goza_gutenberg_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, goza_gutenberg_VERSION );
	}
}

if ( ! function_exists( 'goza_gutenberg_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function goza_gutenberg_scripts_styles() {
		$enqueue_basic_style = apply_filters_deprecated( 'gutenberg_goza_theme_enqueue_style', [ true ], '2.0', 'goza_gutenberg_enqueue_style' );
		$min_suffix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'goza_gutenberg_enqueue_style', $enqueue_basic_style ) ) {
			wp_enqueue_style(
				'goza-main',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				goza_gutenberg_VERSION
			);
		}

		if ( apply_filters( 'goza_gutenberg_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'goza-gutenberg-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				goza_gutenberg_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'goza_gutenberg_scripts_styles' );

if ( ! function_exists( 'goza_gutenberg_register_gutenberg_locations' ) ) {
	/**
	 * Register gutenberg Locations.
	 *
	 * @param gutenbergPro\Modules\ThemeBuilder\Classes\Locations_Manager $gutenberg_theme_manager theme manager.
	 *
	 * @return void
	 */
	function goza_gutenberg_register_gutenberg_locations( $gutenberg_theme_manager ) {
		$hook_result = apply_filters_deprecated( 'gutenberg_goza_theme_register_gutenberg_locations', [ true ], '2.0', 'goza_gutenberg_register_gutenberg_locations' );
		if ( apply_filters( 'goza_gutenberg_register_gutenberg_locations', $hook_result ) ) {
			$gutenberg_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'gutenberg/theme/register_locations', 'goza_gutenberg_register_gutenberg_locations' );

if ( ! function_exists( 'goza_gutenberg_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function goza_gutenberg_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'goza_gutenberg_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'goza_gutenberg_content_width', 0 );

/**
 * Include customizer registration functions
*/
function goza_register_customizer_functions() {
	if ( is_customize_preview() ) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'goza_register_customizer_functions' );

if ( ! function_exists( 'goza_gutenberg_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function goza_gutenberg_check_hide_title( $val ) {
		if ( defined( 'gutenberg_VERSION' ) ) {
			$current_doc = gutenberg\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'goza_gutenberg_page_title', 'goza_gutenberg_check_hide_title' );

/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'goza_gutenberg_body_open' ) ) {
	function goza_gutenberg_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}

/**
 * Theme install
 */
require get_template_directory() . '/install/plugin-required.php';
require  get_template_directory() . '/install/import-pack/functions.php';