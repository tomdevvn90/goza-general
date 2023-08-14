<?php
/**
 * Displays page titlebar in events default template
 *
 * @package WordPress
 * @subpackage goza
 * @since goza 7.0
 */
$events_hero_icon = __get_field('goza_single_icon','option') ? : get_template_directory_uri(). '/resources/assets/images/iocn-hero-default.png';
$events_hero_bg   = __get_field('goza_single_bg_image','option');
$hero_bg          = !empty($events_hero_bg) ? $events_hero_bg : get_template_directory_uri(). '/resources/assets/images/bg-img-hero-default.jpg';
?>

<?php if( is_post_type_archive( 'tribe_events' ) ) { ?>
	<div class="page-titlebar" style="background-image: url('<?php echo esc_url($hero_bg) ?>')">
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
