<?php

/**
 * Hooks.
 */

function add_file_types_to_uploads($file_types)
{
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$new_filetypes['json'] = 'application/json';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


/**
 * Header template
 * @return void
 */
add_action('goza_hook_header', 'goza_header_template');
function goza_header_template()
{
	$goza_layout_header = __get_field('goza_layout_header', 'option');
	$template_name = (isset($goza_layout_header) && !empty($goza_layout_header)) ? $goza_layout_header : 'general';
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
	$template_name = (isset($goza_layout_footer) && !empty($goza_layout_footer)) ? $goza_layout_footer : 'general';
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
 * Search template
 * @return void
 */
add_action('goza_hook_search', 'goza_search_template');
function goza_search_template()
{
	$goza_header_search = __get_field('goza_header_search', 'option');
	if (!isset($goza_header_search) || !$goza_header_search) return;
	load_template(get_template_directory() . '/template-parts/modal-search.php', false);
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


/**
 * blog hero section template
 * @return void
 */
add_action( 'goza_hook_blog_hero_section', 'goza_blog_hero_section_template' );

/**
 * navigation template
 * @return void
 */
add_action( 'goza_hook_blog_posts_navigation', 'goza_blog_posts_navigation' );


add_filter('previous_posts_link_attributes', 'prev_posts_link_attributes_func');
function prev_posts_link_attributes_func() {
	return 'class="prev page-button"';
}

add_filter('next_posts_link_attributes', 'next_posts_link_attributes_func');
function next_posts_link_attributes_func() {
  return 'class="next page-button"';
}

// customize the archive title
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = get_the_author();
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

// single template
add_action( 'goza_hook_single', 'goza_single_template' );

// single post navigation
add_action( 'goza_hook_single_post_navigation', 'goza_single_post_navigation' );

// single post related
add_action( 'goza_hook_single_post_related', 'goza_single_post_related' );

