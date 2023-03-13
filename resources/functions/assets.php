<?php

add_action('wp_enqueue_scripts', function () {

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


function pearl_update_custom_styles()
{

	global $wp_filesystem;

	if (empty($wp_filesystem)) {
		require_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();
	}

	/*Generate custom css*/
	$custom_css = '';
	//Disable theme HB styles if HB plugin enabled

	$custom_css .= 'a{color: blue;}';
	

	/*Create dir or update*/
	$upload_dir = wp_upload_dir();

	if (!$wp_filesystem->is_dir($upload_dir['basedir'] . '/stm_uploads')) {
		wp_mkdir_p($upload_dir['basedir'] . '/stm_uploads');
	}

	$custom_style_file = $upload_dir['basedir'] . '/stm_uploads/skin-custom.css';

	/*Update V*/
	$current_v = get_option('stm_custom_styles_v', 1) + 1;
	update_option('stm_custom_styles_v', $current_v);

	$wp_filesystem->put_contents($custom_style_file, $custom_css, FS_CHMOD_FILE);

}

pearl_update_custom_styles();

