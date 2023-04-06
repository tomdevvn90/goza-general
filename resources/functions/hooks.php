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
	$template_name = (isset($goza_layout_header) && !empty($goza_layout_header)) ? $goza_layout_header : 'default';
	load_template(get_template_directory() . '/template-parts/headers/header-' . $template_name . '.php', false);
}

/**
 * Footer template
 * @return void
 */
add_action('goza_hook_footer', 'goza_footer_template');
function goza_footer_template()
{
	$goza_layout_footer = __get_field('goza_layout_footer', 'option');
	$template_name = (isset($goza_layout_footer) && !empty($goza_layout_footer)) ? $goza_layout_footer : 'default';
	load_template(get_template_directory() . '/template-parts/footers/footer-' . $template_name . '.php', false);
}


/**
 * Topbar template
 * @return void
 */
add_action('goza_hook_topbar', 'goza_topbar_template');
function goza_topbar_template()
{
	$goza_layout_topbar = __get_field('goza_topbar_options', 'option');
	$template_name = (isset($goza_layout_topbar['goza_layout_top_bar']) && !empty($goza_layout_topbar['goza_layout_top_bar'])) ? $goza_layout_topbar['goza_layout_top_bar'] : 'default';
	load_template(get_template_directory() . '/template-parts/topbar/topbar-' . $template_name . '.php', false);
}

/**
 * Preloader template
 * @return void
 */
add_action('goza_hook_preloader', 'goza_preloader_template');
function goza_preloader_template()
{
	$goza_enable_preloader = __get_field('goza_enable_preloader', 'option');
	if (!isset($goza_enable_preloader) || !$goza_enable_preloader) return;
	load_template(get_template_directory() . '/template-parts/preloader.php', false);
}

/**
 * Menu Mobile template
 * @return void
 */
add_action('goza_hook_menu_mobile', 'goza_menu_mobile_template');
function goza_menu_mobile_template()
{
	load_template(get_template_directory() . '/template-parts/menu-mobile.php', false); 
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
