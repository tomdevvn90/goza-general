<?php

add_action('wp_enqueue_scripts', function () {

	// // lib slick
	// wp_enqueue_script( 'be-goza-slick', get_template_directory_uri() . '/resources/assets/lib/slick/slick.min.js', ['jquery'], THEME_VERSION, true );
	wp_enqueue_style( 'be-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css', [], THEME_VERSION );

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
		$upload_dir = wp_upload_dir();
		
		wp_enqueue_style( 'fontawesome-font', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css?ver=1.0', [], THEME_VERSION );
		wp_enqueue_style( 'admin-font', get_template_directory_uri() . '/resources/assets/fonts/fonts.css', [], THEME_VERSION );
		wp_enqueue_style('goza-theme-general-styles', $upload_dir['baseurl'] . '/styles_uploads/variable-css.css', [], THEME_VERSION);
	}
}

add_action('admin_enqueue_scripts', 'goza_load_fonts');

function my_block_cgb_block_assets() { // phpcs:ignore
	// Register block styles for both frontend + backend.
	wp_register_style(
		'goza-cgb-style-css', // Handle.
		get_template_directory_uri() . "/editor/dist/blocks.style.build.css", // Block style CSS.
		is_admin() ? array( 'wp-editor' ) : null, // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
	);

	// Register block editor script for backend.
	wp_register_script(
		'goza-cgb-block-js', // Handle.
		get_template_directory_uri() . "/editor/dist/blocks.build.js", // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'goza-cgb-block-editor-css', // Handle.
		get_template_directory_uri() . "/editor/dist/blocks.editor.build.css", // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);

	/**
	 * Register Gutenberg block on server-side.
	 *
	 * Register the block on server-side to ensure that the block
	 * scripts and styles for both frontend and backend are
	 * enqueued when the editor loads.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
	 * @since 1.16.0
	 */
	register_block_type(
		'cgb/block-goza', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'goza-cgb-style-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'goza-cgb-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'goza-cgb-block-editor-css',
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'my_block_cgb_block_assets' );