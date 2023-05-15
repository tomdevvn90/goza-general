<?php

/**
 * Helpers
 */

function dump($data)
{
	print "<pre style=' background: rgba(0, 0, 0, 0.1); margin-bottom: 1.618em; padding: 1.618em; overflow: auto; max-width: 100%; '>==========================\n";
	if (is_array($data)) {
		print_r($data);
	} elseif (is_object($data)) {
		var_dump($data);
	} else {
		var_dump($data);
	}
	print "===========================</pre>";
}

if (!function_exists('export_acf_from_local_field')) {
	function export_acf_from_local_field()
	{
		$groups = acf_get_local_field_groups();
		$json   = [];

		foreach ($groups as $group) {
			// Fetch the fields for the given group key
			$fields = acf_get_local_fields($group['key']);

			// Remove unecessary key value pair with key "ID"
			unset($group['ID']);

			// Add the fields as an array to the group
			$group['fields'] = $fields;

			// Add this group to the main array
			$json[] = $group;
		}

		$json = json_encode($json, JSON_PRETTY_PRINT);

		// Write output to file for easy import into ACF.
		// The file must be writable by the server process. In this case, the file is located in
		// the current theme directory.
		$file = get_template_directory() . '/acf-import.json';
		file_put_contents($file, $json);

		return true;
	}
}

if (!function_exists('goza_svg_icon')) {

	/**
	 * @param $icon
	 *
	 * @return mixed|string
	 */
	function goza_svg_icon($icon)
	{
		$icons = require(__DIR__ . '/svg.php');

		return $icons[$icon] ? $icons[$icon] : 'Icon not support!';
	}
}

if (!function_exists('goza_the_posts_navigation')) {
	function goza_the_posts_navigation($args = array(), $base = false, $query = false)
	{
		$args = wp_parse_args($args, array(
			'prev_text'          => __('Older posts'),
			'next_text'          => __('Newer posts'),
			'screen_reader_text' => __('Posts navigation'),
			'aria_label'         => __('Posts'),
			'class'              => 'posts-navigation',
		));

		$wp_query = $query ? $query : $GLOBALS['wp_query'];

		// Don't print empty markup if there's only one page.
		if ($wp_query->max_num_pages < 2) {
			return;
		}
		$paged        = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
		$pagenum_link = html_entity_decode(get_pagenum_link());
		if ($base) {
			$orig_req_uri           = $_SERVER['REQUEST_URI'];
			$_SERVER['REQUEST_URI'] = $base;
			$pagenum_link           = get_pagenum_link($paged - 1);
			$_SERVER['REQUEST_URI'] = $orig_req_uri;
		}

		$query_args = array();
		$url_parts  = explode('?', $pagenum_link);
		if (isset($url_parts[1])) {
			wp_parse_str($url_parts[1], $query_args);
		}

		$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
		$pagenum_link = trailingslashit($pagenum_link) . '%_%';
		$format       = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
		$format       .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links(array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'add_args'  => array_map('urlencode', $query_args),
			'prev_text' => $args['prev_text'],
			'next_text' => $args['next_text'],
		));

		if ($links) : ?>
			<nav class="navigation paging-navigation">
				<span class="screen-reader-text"><?= $args['screen_reader_text']; ?></span>
				<?php echo '<div class="pagination loop-pagination">' . $links . '</div><!-- .pagination -->' ?>
			</nav><!-- .navigation -->
<?php
		endif;
	}
}

if (!function_exists('__get_field')) {
	function __get_field($selector, $post_id = false, $format_value = true)
	{
		if (function_exists('get_field')) {
			return get_field($selector, $post_id, $format_value);
		}

		return false;
	}
}
if (!function_exists('__get_fields')) {
	function __get_fields($post_id = false, $format_value = true)
	{
		if (function_exists('get_fields')) {
			return get_fields($post_id, $format_value);
		}

		return [];
	}
}


//check home by variable GET
function goza_check_variable_home()
{
	$classes = '';
	if (isset($_GET['h']) && $_GET['h'] == 'ngo') {
		$classes = 'home-ngo-styles';
	}

	return $classes;
}

// blog hero section template
if ( !function_exists('goza_blog_hero_section_template') ) {
	function goza_blog_hero_section_template()
	{
		$page_for_posts_id = get_option( 'page_for_posts' );
		$page_for_posts_obj = get_post( $page_for_posts_id );

		$heading_field_option = get_field('goza_blog_heading', 'option');
		$icon_field_option = get_field('goza_blog_icon', 'option')? get_field('goza_blog_icon', 'option') : get_template_directory_uri(). '/resources/assets/images/leaf-solid.png';
		$bg_field_option = get_field('goza_blog_bg_image', 'option');

		$heading_blog = !empty( $heading_field_option )? $heading_field_option : $page_for_posts_obj->post_title;
		$blog_heading = ( is_archive() )? get_the_archive_title() : $heading_blog;

		$bg_image_style = !empty( $bg_field_option )? 'background-image: url('.$bg_field_option.');' : '';
		?>
		<section class="blog-hero-section" style="<?php echo $bg_image_style; ?>">
			<div class="blog-hero-section--bg-overlay"></div>
			<div class="blog-hero-section--content container">
				<div class="blog-hero-section-inner">

					<?php if ( !empty( $icon_field_option ) ): ?>
					<div class="blog-hero-section-inner__icon">
						<img src="<?php echo esc_url( $icon_field_option ); ?>" alt="<?php echo __('icon', 'goza'); ?>">   
					</div>  
					<?php endif; ?>  

					<h2 class="blog-hero-section-inner__heading"><?php echo $blog_heading; ?></h2>
				
					<?php if ( function_exists( 'yoast_breadcrumb' ) ): ?>
						<div class="blog-hero-section-inner__breadcrumb" style="<?php echo $breadcrumb_color_style; ?>">
							<?php yoast_breadcrumb(); ?>  
						</div> 
					<?php endif; ?>   
					
				</div>       
			</div>

		</section>
		<?php
	}
}

// the posts navigation template
if ( !function_exists('the_posts_navigation_template') ) {
	function the_posts_navigation_template()
	{
		global $wp_query;

		if ( $wp_query->max_num_pages > 1) {
		?>
		<div class="navigation paging-navigation">
			<?php 
			
			$animation = 'data-aos="fade-up" data-aos-duration="1000"';

			$pre_text = '<i class="fa fa-angle-left"></i> <strong>Newer</strong>';
			$next_text = '<strong>Older</strong> <i class="fa fa-angle-right"></i>'; 

			$args = array(
				'format' => '/page/%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'prev_next'          => false,
			);

			$pre_button = '<a href="javascript:void(0)" class="prev page-button disabled">' . __( $pre_text, 'goza') . '</a>';
			$next_button = '<a href="javascript:void(0)" class="next page-button disabled">' . __( $next_text, 'goza') . '</a>';

			$html = get_previous_posts_link( $pre_text );
			$html .= '<div class="pagination-numbers-wrap">'.paginate_links( $args ).'</div>';  
			$html .= get_next_posts_link( $next_text );

			$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

			if ( 1 === $paged) {
				$html = $pre_button . $html;    
			}

			if ( $wp_query->max_num_pages ==  $paged   ) {
				$html = $html . $next_button; 
			}

			echo '<div class="pagination loop-pagination" '.$animation.'>';
			echo    $html;
			echo '</div>';

			?>
		</div>
		<?php

		}
	}
}

