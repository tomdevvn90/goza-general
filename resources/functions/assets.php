<?php

add_action('wp_enqueue_scripts', function () {
	$upload_dir = wp_upload_dir();

	//Global
	wp_enqueue_style('goza-theme-general-styles', $upload_dir['baseurl'] . '/styles_uploads/variable-css.css', [], THEME_VERSION);
	wp_enqueue_style('icoions', get_template_directory_uri() . '/dist/css/ionicons.min.css', [], THEME_VERSION);
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
	 * Load assets backend
	 */
	function goza_load_fonts()
	{
		$upload_dir = wp_upload_dir();
		wp_enqueue_style('awesome-font', get_template_directory_uri() . '/dist/css/theme-editor.css', [], THEME_VERSION);
		wp_enqueue_style('admin-font', get_template_directory_uri() . '/resources/assets/fonts/fonts.css', [], THEME_VERSION);
		wp_enqueue_style('goza-theme-general-styles', $upload_dir['baseurl'] . '/styles_uploads/variable-css.css', [], THEME_VERSION);
	}
}

add_action('admin_enqueue_scripts', 'goza_load_fonts');


if (!function_exists('goza_block_assets')) {
	function goza_block_assets()
	{
		// Register block styles for both frontend + backend.
		wp_register_style('goza-cgb-style-css',  get_template_directory_uri() . "/editor/dist/blocks.style.build.css", is_admin() ? array('wp-editor') : null, THEME_VERSION);

		// Register block editor script for backend.
		wp_register_script('goza-cgb-block-js', get_template_directory_uri() . "/editor/dist/blocks.build.js", array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), THEME_VERSION, true);

		// Register block editor styles for backend.
		wp_register_style('goza-cgb-block-editor-css', get_template_directory_uri() . "/editor/dist/blocks.editor.build.css", array('wp-edit-blocks'), THEME_VERSION);
		register_block_type(
			'cgb/block-goza',
			array(
				'style'         => 'goza-cgb-style-css',
				'editor_script' => 'goza-cgb-block-js',
				'editor_style'  => 'goza-cgb-block-editor-css'
			)
		);
	}
	// Hook: Block assets.
	add_action('init', 'goza_block_assets');
}
