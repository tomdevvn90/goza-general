<?php

/**
 * Hooks.
 */

/**
 * Allow upload json file
 */
add_filter('upload_mimes', function ($mime_types) {
	$mime_types['json'] = 'application/json'; // Adding .json extension

	return $mime_types;
}, 1);

/**
 * Header template
 * @return void
 */
add_action('goza_hook_header', 'goza_header_template');
function goza_header_template()
{
	$goza_layout_header = __get_field('goza_layout_header', 'option');
	load_template(get_template_directory() . '/template-parts/headers/header-' . $goza_layout_header . '.php', false);
}

/**
 * Footer template
 * @return void
 */
add_action('goza_hook_footer', 'goza_footer_template');
function goza_footer_template()
{
	$goza_layout_footer = __get_field('goza_layout_footer', 'option');
	load_template(get_template_directory() . '/template-parts/footers/footer-' . $goza_layout_footer . '.php', false);
}

/**
 * Post loop item template
 *
 * @param Int $post_id
 *
 * @return void
 */
add_action('goza_hook_post_loop_item', 'goza_post_loop_item_template', 20, 2);
function goza_post_loop_item_template($post_id, $index)
{
	set_query_var('post_id', $post_id);
	$v  = ($index) % 3;
	$vT = ceil($v);

	$anm = 'data-aos="fade-up" data-aos-duration="' . (($v !== 0 ? $vT : 3) * 400) . '"';
?>
	<article <?= $anm; ?> <?php post_class('item post-loop-item col-md-4') ?>>
		<?php goza_post_item() ?>
	</article>
<?php
}


function goza_child_deregister_styles()
{
	wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'goza_child_deregister_styles', 20);
