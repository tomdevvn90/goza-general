<?php

function tribe_event_happening_list(){
    global $post;

    $past_events = [];
    $get_past_events = tribe_get_events( [
        'end_date' => 'now',
    ], false );

    if ( $get_past_events ) {
        foreach ( $get_past_events as $past_event ) {
            $past_events[] = $past_event->ID;
        }
    }

    $format = 'Y-m-d G:i:s';

    $args_event = [
        'post_status' => 'publish',
        'post__not_in' => $past_events,
        'posts_per_page' => 3,
        'eventDisplay' => 'day',
    ];

    $events = tribe_get_events( $args_event );

    foreach ( $events as $post ) {
        setup_postdata( $post );
        $event_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $event_thumb_bg = !empty($event_thumb_url)? 
            'background: url('.$event_thumb_url.') no-repeat center center / cover, #fafafa;' : '';
        
        $start_day   = tribe_get_start_date(get_the_ID(), true, 'd');
        $start_month = tribe_get_start_date(get_the_ID(), true, 'F');
        $time_start  = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $time_end    = tribe_get_end_date(get_the_ID(), true, 'G:i a');
        $venue       = tribe_get_venue(get_the_ID());

        ?>
        <div <?php post_class( 'item-event', $post ); ?> >
            <div class="item-event--inner">
                <div class="item-event--bg"></div>              
                <div class="item-event--featured-image-wrap">
                    <div class="event-thumbnail" style="<?php echo $event_thumb_bg; ?>">
                        <div class="event-thumbnail-overlay"></div>
                    </div>
                </div>
                <div class="item-event--event-date">
                    <?php if( !empty($start_day) && !empty($start_month) ): ?>
                        <div class="event-month-day">
                            <span><?php echo $start_day; ?></span>
                            <?php echo $start_month; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty($start_day) && !empty($start_month) ): ?>
                        <div class="event-time">
                            <?php echo $time_start ?> 
                            -
                            <?php echo $time_end ?> 
                        </div>
                    <?php endif; ?>
                </div>
                <div class="item-event--content-entry">
                    <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="title-link" title="">
                        <?php echo get_the_title(); ?>
                    </a>
                    <?php if( !empty($venue) ): ?>
                        <div class="venue-empty"><?php echo $venue; ?></div>
                    <?php endif; ?>
                </div>
                <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="readmore-link">
                    <?php esc_html_e('View Details', 'goza'); ?>
                </a>
            </div>
        </div>
        <?php

    }

    wp_reset_postdata(  );

}
function tribe_event_upcoming_list(){
    global $post;

    $args_event = [
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'eventDisplay' => 'upcoming',
    ];

    $events = tribe_get_events( $args_event );

    foreach ( $events as $post ) {
        setup_postdata( $post );
        $event_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $event_thumb_bg = !empty($event_thumb_url)? 
            'background: url('.$event_thumb_url.') no-repeat center center / cover, #fafafa;' : '';
        
        $start_day   = tribe_get_start_date(get_the_ID(), true, 'd');
        $start_month = tribe_get_start_date(get_the_ID(), true, 'F');
        $time_start  = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $time_end    = tribe_get_end_date(get_the_ID(), true, 'G:i a');
        $venue       = tribe_get_venue(get_the_ID());

        ?>
        <div <?php post_class( 'item-event', $post ); ?> >
            <div class="item-event--inner">
                <div class="item-event--bg"></div>              
                <div class="item-event--featured-image-wrap">
                    <div class="event-thumbnail" style="<?php echo $event_thumb_bg; ?>">
                        <div class="event-thumbnail-overlay"></div>
                    </div>
                </div>
                <div class="item-event--event-date">
                    <?php if( !empty($start_day) && !empty($start_month) ): ?>
                        <div class="event-month-day">
                            <span><?php echo $start_day; ?></span>
                            <?php echo $start_month; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty($start_day) && !empty($start_month) ): ?>
                        <div class="event-time">
                            <?php echo $time_start ?> 
                            -
                            <?php echo $time_end ?> 
                        </div>
                    <?php endif; ?>
                </div>
                <div class="item-event--content-entry">
                    <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="title-link" title="">
                        <?php echo get_the_title(); ?>
                    </a>
                    <?php if( !empty($venue) ): ?>
                        <div class="venue-empty"><?php echo $venue; ?></div>
                    <?php endif; ?>
                </div>
                <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="readmore-link">
                    <?php esc_html_e('View Details', 'goza'); ?>
                </a>
            </div>
        </div>
        <?php

    }

    wp_reset_postdata(  );
}
function tribe_event_expired_list(){
    global $post;

    $past_events = [];
    $get_past_events = tribe_get_events( [
        'end_date' => 'now',
    ], false );

    if ( $get_past_events ) {
        foreach ( $get_past_events as $past_event ) {
            $past_events[] = $past_event->ID;
        }
    }

    $args_event = [
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'post__in' => $past_events ? $past_events : [ 0 ],
        'eventDisplay' => 'past',
        'order' => 'ASC',
        'order_by' => 'event_date',
        'tribe_suppress_query_filters' => true,
    ];

    $events = tribe_get_events( $args_event );

    foreach ( $events as $post ) {
        setup_postdata( $post );
        $event_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        $event_thumb_bg = !empty($event_thumb_url)? 
            'background: url('.$event_thumb_url.') no-repeat center center / cover, #fafafa;' : '';
        
        $start_day   = tribe_get_start_date(get_the_ID(), true, 'd');
        $start_month = tribe_get_start_date(get_the_ID(), true, 'F');
        $time_start  = tribe_get_start_date(get_the_ID(), true, 'G:i a');
        $time_end    = tribe_get_end_date(get_the_ID(), true, 'G:i a');
        $venue       = tribe_get_venue(get_the_ID());

        ?>
        <div <?php post_class( 'item-event', $post ); ?> >
            <div class="item-event--inner">
                <div class="item-event--bg"></div>              
                <div class="item-event--featured-image-wrap">
                    <div class="event-thumbnail" style="<?php echo $event_thumb_bg; ?>">
                        <div class="event-thumbnail-overlay"></div>
                    </div>
                </div>
                <div class="item-event--event-date">
                    <?php if( !empty($start_day) && !empty($start_month) ): ?>
                        <div class="event-month-day">
                            <span><?php echo $start_day; ?></span>
                            <?php echo $start_month; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty($start_day) && !empty($start_month) ): ?>
                        <div class="event-time">
                            <?php echo $time_start ?> 
                            -
                            <?php echo $time_end ?> 
                        </div>
                    <?php endif; ?>
                </div>
                <div class="item-event--content-entry">
                    <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="title-link" title="">
                        <?php echo get_the_title(); ?>
                    </a>
                    <?php if( !empty($venue) ): ?>
                        <div class="venue-empty"><?php echo $venue; ?></div>
                    <?php endif; ?>
                </div>
                <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="readmore-link">
                    <?php esc_html_e('View Details', 'goza'); ?>
                </a>
            </div>
        </div>
        <?php

    }

    wp_reset_postdata(  );
}

function tribe_event_pagination(){
    
    global $wp_query;

}
