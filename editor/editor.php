<?php
function goza_block_assets()
{

	wp_register_style('goza-block-style-css', get_template_directory_uri(). '/editor/dist/blocks.style.build.css', is_admin() ? array('wp-editor') : null, null);
	wp_register_script('goza-block-js', get_template_directory_uri(). '/editor/dist/blocks.build.js', array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), null,  true);
	wp_register_style('goza-block-editor-css', get_template_directory_uri(). '/editor/dist/blocks.editor.build.css', array('wp-edit-blocks'), null );

	register_block_type('goza/block-my-block',
		array(
			'style'         => 'goza-block-style-css',
			'editor_script' => 'goza-block-js',
			'editor_style'  => 'goza-block-editor-css',
		)
	);
}
add_action('init', 'goza_block_assets');
