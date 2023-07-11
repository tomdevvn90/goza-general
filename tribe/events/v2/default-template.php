<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

get_header();

/**
* Hook: goza_tribe_events_page_titlebar_archive
*
* @hooked goza_tribe_events_page_titlebar_archive_template - 10
*/
do_action( 'goza_tribe_events_page_titlebar_archive' );

$classes = 'archive-tribe-events-template';
if( is_singular( 'tribe_events' ) ) {
	$classes = 'single-tribe-events-template';
}

?>

<div id="content" class="site-content">
	<div id="primary" class="content-area <?php echo esc_attr($classes); ?>">
		<div class="container responsive">
			<main id="main" class="site-main">
				<?php // echo tribe( Template_Bootstrap::class )->get_view_html(); ?>
				<section class="goza-section-space">
					<div class="list-tab-event">
						<ul class="nav nav-tabs">
							<li class="active">
								<a class="tab-item" href="#tab-happening" data-toggle="tab" aria-expanded="true">Happening</a>
							</li>
							<li>
								<a class="tab-item" href="#tab-upcoming" data-toggle="tab" aria-expanded="true">Upcoming</a>
							</li>
							<li>
								<a class="tab-item" href="#tab-expired" data-toggle="tab" aria-expanded="true">Expired</a>
							</li>
						</ul>
						<div class="tab-content bt-list-event">
							<div role="tabpanel" class="tab-panel fade active in" id="tab-happening" tabindex="-1">
								<?php tribe_event_happening_list(); ?>
							</div>
							<div role="tabpanel" class="tab-panel fade" id="tab-upcoming" tabindex="-1">
								<?php tribe_event_upcoming_list(); ?>
							</div>
							<div role="tabpanel" class="tab-panel fade" id="tab-expired" tabindex="-1">
								<?php tribe_event_expired_list(); ?>
							</div>
						</div>
					</div>
				</section>

			</main><!-- .site-main -->
		</div>
	</div><!-- #primary -->
</div><!-- #content -->

<?php

get_footer();
