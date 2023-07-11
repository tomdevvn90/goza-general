<?php
/**
 * Displays page titlebar in events default template
 *
 * @package WordPress
 * @subpackage goza
 * @since goza 7.0
 */

// if( ! goza_get_option( 'site_titlebar' ) ) {
// 	return;
// }

$events_hero_icon = get_field('goza_events_icon','option');
$events_hero_bg = get_field('goza_events_bg_image','option');

$hero_bg = !empty($events_hero_bg)? 'background-image: url('. $events_hero_bg .')' : '';

?>

<?php if( is_post_type_archive( 'tribe_events' ) ) { ?>
	<div class="page-titlebar" style="<?php echo $hero_bg; ?>">
		<div class="page-titlebar--bg-overlay" style=""></div>
		<div class="container">
			<div class="page-titlebar-content">
				<?php if( !empty($events_hero_icon) ): ?>
					<div class="page-icon"><img src="<?php echo $events_hero_icon; ?>" ></div>
				<?php endif; ?>
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">','</div>' );
					}
				?>
			</div>
		</div>
	</div>
<?php } ?>
