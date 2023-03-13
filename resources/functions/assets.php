<?php

add_action('wp_enqueue_scripts', function () {

	// lib slick
	wp_enqueue_script( 'be-goza-slick', get_template_directory_uri() . '/resources/assets/lib/slick/slick.min.js', ['jquery'], THEME_VERSION, true );
	wp_enqueue_style( 'be-goza-slick', get_template_directory_uri() . '/resources/assets/lib/slick/slick.css', [], THEME_VERSION );

	wp_localize_script( 'app-scripts', 'php_data', [
		'admin_logged' => in_array( 'administrator', wp_get_current_user()->roles ) ? 'yes' : 'no',
		'ajax_url'     => admin_url( 'admin-ajax.php' )
	] );
	$upload_dir = wp_upload_dir();

	//Global
	wp_enqueue_style('goza-theme-general-styles', $upload_dir['baseurl'] . '/styles_uploads/variable-css.css', [], THEME_VERSION);
	wp_enqueue_style('app-styles', get_template_directory_uri() . '/dist/css/theme.css', [], THEME_VERSION);
	wp_enqueue_script('manifest-scripts', get_template_directory_uri() . '/dist/js/manifest.js', ['jquery'], THEME_VERSION, true);
	wp_enqueue_script('vendor-scripts', get_template_directory_uri() . '/dist/js/vendor.js', ['jquery'], THEME_VERSION, true);
	wp_enqueue_script('app-scripts', get_template_directory_uri() . '/dist/js/theme.js', ['jquery'], THEME_VERSION, true);

	wp_localize_script('app-scripts', 'php_data', [
		'admin_logged' => in_array('administrator', wp_get_current_user()->roles) ? 'yes' : 'no',
		'ajax_url'     => admin_url('admin-ajax.php')
	]);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
});

if (!function_exists('goza_load_fonts')) {
	/**
	 * Load custom font family
	 */
	function goza_load_fonts()
	{
		//wp_enqueue_style( 'primary-font', get_template_directory_uri() . '/resources/assets/fonts/fonts.css', false, THEME_VERSION );
	}
}

add_action('admin_enqueue_scripts', 'goza_load_fonts');

